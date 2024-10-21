# This script chunks file_list.json into markdown chunks, code chunks, html chunks
# This script is created before creating the langchain_rag_faiss_mixed_tr_v3.py script

import json
import os
import re
from bs4 import BeautifulSoup

# Define the source path
SOURCE_PATH = './source/tr_v3'

# Load your file list JSON
with open('file_list.json', 'r', encoding='utf-8') as json_file:
    file_list = json.load(json_file)

# Container to hold chunks
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

# Now md_chunks, code_chunks, and html_chunks contain the respective chunks
print("Markdown Chunks:")
print(md_chunks)

print("\nPHP Code Chunks:")
print(code_chunks)

print("\nHTML Chunks:")
print(html_chunks)
