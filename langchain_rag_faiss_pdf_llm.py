# This is the full example that connects RAG context (FAISS) to an LLM
# 'save' mode loads the document to create a vector store and saves the vector store locally
# 'load' mode loads an existing vector store and query it for context
# 'new' mode creates a new vector store but doesn't save it
# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
from langchain_community.vectorstores import FAISS
from langchain_huggingface import ChatHuggingFace,HuggingFaceEndpoint
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.documents import Document
from langchain_community.document_loaders import PyPDFLoader
from langchain_core.prompts import PromptTemplate
import numpy as np

DOC_PATH = "samples/travelobby.pdf"
FOLDER_PATH = "faiss_vector_store"
USER_QUERY = 'Tell me more about The Checkout page in Travelgowhere for Car Rentals' # I.e What is Travelobby
MODEL_NAME = 'bert-base-nli-mean-tokens'
MODE = 'load'

# Creates a new vector store
def new_vector_store():

    # Load your PDF document
    loader = PyPDFLoader(DOC_PATH)
    pages = loader.load()

    # Create Document objects from the extracted pages
    documents = [Document(page_content=page.page_content, metadata={"page_number": i + 1}) for i, page in enumerate(pages)]

    # Initialize HuggingFace embeddings model
    embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

    # Create VectorStore with FAISS
    vector_store = FAISS.from_documents(documents, embedding_function) 
    return vector_store

# Creates a new vector store and saves it locally
def save_vector_store():

    # Load your PDF document
    loader = PyPDFLoader(DOC_PATH)
    pages = loader.load()

    # Create Document objects from the extracted pages
    documents = [Document(page_content=page.page_content, metadata={"page_number": i + 1}) for i, page in enumerate(pages)]

    # Initialize HuggingFace embeddings model
    embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

    # Create VectorStore with FAISS
    vector_store = FAISS.from_documents(documents, embedding_function) 

    # Save the FAISS index to a file
    vector_store.save_local(folder_path=FOLDER_PATH)
    return vector_store
    
# Or Load from existing path, skips loading of PDF document, so should be faster
def load_vector_store():

    # Initialize HuggingFace embeddings model
    embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

    vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)
    return vector_store

# Mode conditionals
def get_vector_store(mode):

    if mode == 'new':
        vector_store = new_vector_store()
        return vector_store

    elif mode == 'save':
        vector_store = save_vector_store()
        return vector_store

    elif mode == 'load':
        vector_store = load_vector_store()
        return vector_store
    
    else:
        print("Invalid mode")
        exit();

# Get Vector Store either from existing or new
vector_store = get_vector_store(MODE)

# # Example User Query

# ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
results = vector_store.similarity_search_with_score(USER_QUERY)
# print(results)

# # generate an answer based on given user query and retrieved context information
context_text = "\n\n".join([doc.page_content for doc, _score in results])
# print(context_text)

# Now you can combine context_text with LLM for further processing

# Initialize your LLM model
hub_llm = HuggingFaceEndpoint(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")

# Combine user query and retrieved context to create a prompt
prompt = f"User Query: {USER_QUERY}\n\nContext:\n{context_text}\n\nGenerate a detailed answer based on the context above:"

# Generate an answer using the LLM
response = hub_llm.invoke(prompt)
print(response)