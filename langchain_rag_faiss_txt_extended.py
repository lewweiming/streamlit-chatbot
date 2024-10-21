# In this scenario, more source files are used and chunks combined
# Adapted to load txt files instead of pdf
# Uses Hugging Face Embeddings Model
# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
from langchain_community.vectorstores import FAISS
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.documents import Document
from sklearn.cluster import KMeans
import re
import os

DOC_PATH = "travelgowhere/receipt.txt"
DOC_PATH_2 = "travelgowhere/checkout.txt"
FOLDER_PATH = "faiss_vector_store"
MODEL_NAME = 'bert-base-nli-mean-tokens'

# Load your plain text document
with open(DOC_PATH, 'r', encoding='utf-8') as file:
    text = file.read()

# Load your plain text document
with open(DOC_PATH_2, 'r', encoding='utf-8') as file:
    text_2 = file.read()    

# Chunking Methods
## By Paragraphs
def chunkByParagraphs(text):
    chunks = text.split('\n\n')
    return chunks

# List to hold all chunks from multiple files
all_chunks = []

# Split the text into chunks (you can adjust the chunking strategy as needed)
# For example, splitting by paragraphs or sentences, here we assume split by '\n\n'
chunks = chunkByParagraphs(text)
chunks_2 = chunkByParagraphs(text_2)
all_chunks.extend(chunks)  # Add the chunks from this file to the list
all_chunks.extend(chunks_2)  # Add the chunks from this file to the list

# Initialize HuggingFace embeddings model
embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

# Create VectorStore with FAISS
# vector_store = FAISS.from_documents(documents, embedding_function)
vector_store = FAISS.from_documents(all_chunks, embedding_function)

# Or Load from existing path
# vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)

# Save the FAISS index to a file
vector_store.save_local(folder_path=FOLDER_PATH)

# # Example User Query

# ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
results = vector_store.similarity_search_with_score('Car Rental Checkout for Travelgowhere')
# print(results)

# # generate an answer based on given user query and retrieved context information
context_text = "\n\n".join([doc.page_content for doc, _score in results])
print(context_text)

# Now you can combine context_text with LLM for further processing
