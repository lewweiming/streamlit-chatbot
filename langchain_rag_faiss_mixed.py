# In this scenario, different chunking methods are used to provide different context for the LLM
# Adapted to load txt files instead of pdf
# Uses Hugging Face Embeddings Model
# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
from langchain_community.vectorstores import FAISS
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.documents import Document
from sklearn.cluster import KMeans
import re

DOC_PATH = "travelgowhere/receipt.txt"
DOC_PATH_2 = "travelgowhere/checkout.txt"
DOC_PATH_3 = "travelgowhere/controller.txt"
FOLDER_PATH = "faiss_vector_store"
MODEL_NAME = 'bert-base-nli-mean-tokens'

# Load your plain text document
with open(DOC_PATH, 'r', encoding='utf-8') as file:
    text = file.read()

# Load your plain text document
with open(DOC_PATH_2, 'r', encoding='utf-8') as file:
    text_2 = file.read()    

# Load your plain text document
with open(DOC_PATH_3, 'r', encoding='utf-8') as file:
    text_3 = file.read()    


# Chunking Methods
## By Paragraphs
def chunkByParagraphs(text):
    chunks = text.split('\n\n')
    return chunks

def chunkByFunctionsOrMethods(code):
    # Use a regex pattern to match PHP functions including their full definition
    pattern = r'function\s+(\w+)\s*\((.*?)\)\s*\{(.*?)\}'
    matches = re.findall(pattern, code, re.DOTALL)

    # Format the matches into full function definitions
    full_definitions = []
    for match in matches:
        function_name = match[0]
        parameters = match[1].strip()  # Get parameters
        body = match[2].strip()  # Get function body
        full_definitions.append(f"function {function_name}({parameters}) {{{body}}}")

    return full_definitions

# List to hold all chunks from multiple files
all_chunks = []
code_chunks = []
semantic_chunks = []

# You'll need to identify how each source file is chunked

# Code Chunks
code_chunks = chunkByFunctionsOrMethods(text_3)
# print(code_chunks)

# Semantic Chunks
semantic_chunks = chunkByParagraphs(text)
chunk_text_2 = chunkByParagraphs(text_2)
semantic_chunks.extend(chunk_text_2)  # Add the chunks from this file to the list

# Add code chunks with metadata
for i, chunk in enumerate(code_chunks):
    all_chunks.append(Document(page_content=chunk, metadata={"type": "code", "chunk_number": i + 1}))

# Add semantic meaning chunks with metadata
for i, chunk in enumerate(semantic_chunks):
    all_chunks.append(Document(page_content=chunk, metadata={"type": "semantic", "chunk_number": i + 1}))

# Initialize HuggingFace embeddings model
embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

# Create VectorStore with FAISS
# vector_store = FAISS.from_documents(documents, embedding_function)
vector_store = FAISS.from_documents(all_chunks, embedding_function)

# Or Load from existing path
# vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)

# Save the FAISS index to a file
# vector_store.save_local(folder_path=FOLDER_PATH)

# # Example User Query

# ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
results = vector_store.similarity_search_with_score('submitSelection in Travelgowhere Controller')

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

# Print the gathered context for verification
print(context_text)

# Now you can pass the context_text to your LLM for further processing

# Example LLM call (this is pseudocode; adapt it to your LLM library/method)
# response = llm.generate_response(context_text)