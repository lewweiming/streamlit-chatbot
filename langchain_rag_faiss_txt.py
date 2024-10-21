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

DOC_PATH = "samples/travelobby.txt"  # Update to your plain text file
FOLDER_PATH = "faiss_vector_store"
MODEL_NAME = 'bert-base-nli-mean-tokens'

# Load your plain text document
with open(DOC_PATH, 'r', encoding='utf-8') as file:
    text = file.read()

# Method to chunk by sentences
def chunkBySentences(text):
    # Use regular expressions to split text by punctuation marks (e.g., '.', '!', '?')
    chunks = re.split(r'(?<=[.!?]) +', text)
    return chunks    

def chunkByHeadings(markdown_text):

    # Split based on Markdown headings (#, ##, ###)
    chunks = re.split(r'(#+ .+)', markdown_text)
    # Combine headings with their following content
    chunked_markdown = [''.join([chunks[i], chunks[i+1]]) for i in range(0, len(chunks) - 1, 2)]
    return chunked_markdown

# Split the text into chunks (you can adjust the chunking strategy as needed)
# For example, splitting by paragraphs or sentences, here we assume split by '\n\n'
chunks = chunkByHeadings(text)

# Create Document objects from the extracted chunks
# documents = [Document(page_content=chunk, metadata={"chunk_number": i + 1}) for i, chunk in enumerate(chunks) if chunk.strip()]


# Initialize HuggingFace embeddings model
embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

# Create VectorStore with FAISS
# vector_store = FAISS.from_documents(documents, embedding_function)
vector_store = FAISS.from_texts(chunks, embedding_function)

# Or Load from existing path
# vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)

# Save the FAISS index to a file
# vector_store.save_local(folder_path=FOLDER_PATH)

# # Example User Query

# ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
results = vector_store.similarity_search_with_score('What is Travelobby?')
# print(results)

# # generate an answer based on given user query and retrieved context information
context_text = "\n\n".join([doc.page_content for doc, _score in results])
print(context_text)

# Now you can combine context_text with LLM for further processing
