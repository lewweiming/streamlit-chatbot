# Handles Mixed context results
# Only supports loading of existing Vector DB
# This is the full example that connects RAG context (FAISS) to an LLM
# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
from langchain_community.vectorstores import FAISS
from langchain_huggingface import ChatHuggingFace,HuggingFaceEndpoint
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.documents import Document
from langchain_community.document_loaders import PyPDFLoader
from langchain_core.prompts import PromptTemplate
import numpy as np

FOLDER_PATH = "faiss_vector_store"
USER_QUERY = 'I need a Controllers / Methods overview for Travelgowhere Modules' # I.e What is the code behind the submitSelection method in Travelgowhere Controller for Car Rentals
MODEL_NAME = 'bert-base-nli-mean-tokens'

# Or Load from existing path, skips loading of PDF document, so should be faster
def load_vector_store():

    # Initialize HuggingFace embeddings model
    embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

    vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)
    return vector_store


# Get Vector Store either from existing or new
vector_store = load_vector_store()

# # Example User Query

# ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
results = vector_store.similarity_search_with_score(USER_QUERY)
# print(results)

# Initialize an empty context list
context_chunks = []

# Process results
for doc, score in results:
    if doc.metadata["type"] == "code":
        context_chunks.append(f"**Code Chunk:**\n{doc.page_content}\n")
    elif doc.metadata["type"] == "semantic":
        context_chunks.append(f"**Semantic Meaning:**\n{doc.page_content}\n")

# Combine context chunks into a single context string
context_text = "\n".join(context_chunks)
# print(context_text)

# Now you can combine context_text with LLM for further processing

# Initialize your LLM model
hub_llm = HuggingFaceEndpoint(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")

# Combine user query and retrieved context to create a prompt
prompt = f"""User Query: {USER_QUERY}

Context:
{context_text}

Please generate a detailed answer based on the context above, ensuring all relevant information is included. You may present your answer in paragraphs or bullet points as appropriate."""


# Generate an answer using the LLM
response = hub_llm.invoke(prompt)
print(response)