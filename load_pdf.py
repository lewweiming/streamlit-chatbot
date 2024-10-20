# Simple example to load and parse PDF documents into sentences

from langchain_community.document_loaders import PyPDFLoader
from langchain.text_splitter import RecursiveCharacterTextSplitter

DOC_PATH = "samples/sample.pdf"

# Load your PDF document
loader = PyPDFLoader(DOC_PATH)
pages = loader.load()

# Chunking. Chunks will be embedded later
text_splitter = RecursiveCharacterTextSplitter(chunk_size=500, chunk_overlap=50)
chunks = text_splitter.split_documents(pages)

# Convert the text chunks into embeddings
chunk_texts = [chunk.page_content for chunk in chunks]  # Extract text content from chunks
# sentence_embeddings = model.encode(chunk_texts)  # This returns a 2D array of embeddings