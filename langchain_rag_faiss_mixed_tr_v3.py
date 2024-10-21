# This code builds the vector store for TR V3 Source code
# Takes about 15 minutes to vectorise the data and save it
# In this scenario, different chunking methods are used to provide different context for the LLM
# Adapted to load txt files instead of pdf
# Uses Hugging Face Embeddings Model
# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
from langchain_community.vectorstores import FAISS
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.documents import Document
import json
import os
import re
from bs4 import BeautifulSoup

SOURCE_PATH = './source/tr_v3'
FOLDER_PATH = "faiss_vector_store"
MODEL_NAME = 'bert-base-nli-mean-tokens'


# Load your file list JSON
with open('file_list.json', 'r', encoding='utf-8') as json_file:
    file_list = json.load(json_file)

# List to hold all chunks from multiple files
all_chunks = []
md_chunks = []
code_chunks = []
html_chunks = []    

# Chunking Methods
def chunkByHeadings(markdown_text):
    chunks = re.split(r'(#+ .+)', markdown_text)
    chunked_markdown = [''.join([chunks[i], chunks[i + 1]]) for i in range(0, len(chunks) - 1, 2)]
    return chunked_markdown

def chunkByParagraphs(text):
    chunks = text.split('\n\n')
    return chunks

def chunkByPHPBlocks(php_code):
    pattern = r'(function\s+\w+\(.*?\)\s*{.*?}|class\s+\w+\s*{.*?}|<\?php.*?\?>|{\s*.*?\s*})'
    chunks = re.findall(pattern, php_code, re.DOTALL)
    remaining_code = re.sub(pattern, '', php_code, flags=re.DOTALL).strip()
    if remaining_code:
        chunks.append(remaining_code)
    return chunks

def chunkByHTMLBlocks(html_content):
    soup = BeautifulSoup(html_content, 'html.parser')
    block_elements = soup.find_all(['div', 'section', 'article', 'header', 'footer', 'main', 'aside'])
    chunks = [str(block) for block in block_elements if block]
    return chunks

def read_file_with_fallback(filepath):
    try:
        with open(filepath, 'r', encoding='utf-8') as file:
            return file.read()
    except UnicodeDecodeError:
        # Attempt to read with 'latin-1' encoding or ignore errors
        with open(filepath, 'r', encoding='latin-1') as file:
            return file.read()
    except FileNotFoundError:
        print(f"File not found: {filepath}")
        return None

# Iterate over each file in the file list
for file_info in file_list:
    filename = file_info['filename']
    relative_path = file_info['relative_path']
    file_type = file_info['file_type']
    
    # Construct the full file path
    full_path = os.path.join(SOURCE_PATH, relative_path)

    # Load the file content based on the file type
    file_content = read_file_with_fallback(full_path)
    if file_content is None:
        continue  # Skip if the file was not found

    # Apply chunking based on file type
    if file_type == 'html':
        html_chunks.extend(chunkByHTMLBlocks(file_content))
    elif file_type == 'php':
        code_chunks.extend(chunkByPHPBlocks(file_content))
    elif file_type in ['md', 'markdown']:
        md_chunks.extend(chunkByHeadings(file_content))
    else:  # For all other file types
        md_chunks.extend(chunkByParagraphs(file_content))

# You'll need to identify how each source file is chunked

# Add code chunks with metadata
for i, chunk in enumerate(code_chunks):
    all_chunks.append(Document(page_content=chunk, metadata={"type": "code", "chunk_number": i + 1}))

# Add semantic meaning chunks with metadata
for i, chunk in enumerate(md_chunks):
    all_chunks.append(Document(page_content=chunk, metadata={"type": "markdown", "chunk_number": i + 1}))

# Add html chunks with metadata
for i, chunk in enumerate(html_chunks):
    all_chunks.append(Document(page_content=chunk, metadata={"type": "html", "chunk_number": i + 1}))    

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
results = vector_store.similarity_search_with_score('submitSelection in Travelgowhere Controller')

# Initialize an empty context list
context_chunks = []

# Process results
for doc, score in results:
    if doc.metadata["type"] == "code":
        context_chunks.append(f"**Code Chunk:**\n{doc.page_content}\n")
    elif doc.metadata["type"] == "markdown":
        context_chunks.append(f"**Documentation:**\n{doc.page_content}\n")
    elif doc.metadata["type"] == "html":
        context_chunks.append(f"**Semantic Meaning:**\n{doc.page_content}\n")

# Combine context chunks into a single context string
context_text = "\n".join(context_chunks)

# Print the gathered context for verification
print(context_text)

# Now you can pass the context_text to your LLM for further processing

# Example LLM call (this is pseudocode; adapt it to your LLM library/method)
# response = llm.generate_response(context_text)