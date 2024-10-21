# Uses Hugging Face Embeddings Model
# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
from langchain_community.vectorstores import FAISS
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.documents import Document
from langchain_community.document_loaders import PyPDFLoader
import numpy as np

DOC_PATH = "samples/travelobby.pdf"
FOLDER_PATH = "faiss_vector_store"
MODEL_NAME = 'bert-base-nli-mean-tokens'

# Load your PDF document
loader = PyPDFLoader(DOC_PATH)
pages = loader.load()

# Create Document objects from the extracted pages
documents = [Document(page_content=page.page_content, metadata={"page_number": i + 1}) for i, page in enumerate(pages)]

# Initialize HuggingFace embeddings model
embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

# Create VectorStore with FAISS
vector_store = FAISS.from_documents(documents, embedding_function) 

# Or Load from existing path
# vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)

# Save the FAISS index to a file
# vector_store.save_local(folder_path=FOLDER_PATH)

# # Example User Query

# ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
results = vector_store.similarity_search_with_score('Do you have a free plan?')
# print(results)

# # generate an answer based on given user query and retrieved context information
context_text = "\n\n".join([doc.page_content for doc, _score in results])
print(context_text)

# Now you can combine context_text with LLM for further processing