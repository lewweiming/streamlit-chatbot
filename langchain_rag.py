# Based on https://medium.com/@drjulija/how-i-built-a-basic-rag-for-pdf-qa-in-a-few-lines-of-python-code-9849c32e59f0

# import os
from langchain_community.document_loaders import PyPDFLoader
from langchain_community.vectorstores import Chroma
from langchain_huggingface import HuggingFaceEmbeddings
from langchain.text_splitter import RecursiveCharacterTextSplitter

# OPENAI_API_KEY = os.getenv('OPENAI_API_KEY')
DOC_PATH = "samples/alphabet_10K_2022.pdf"
CHROMA_PATH = "your_db_name" 

# Step 1: load your pdf doc
loader = PyPDFLoader(DOC_PATH)
pages = loader.load()

# Step 2: Chunking. Chunks will be embedded later
## split the doc into smaller chunks i.e. chunk_size=500
text_splitter = RecursiveCharacterTextSplitter(chunk_size=500, chunk_overlap=50)
chunks = text_splitter.split_documents(pages)

# Step 3: Load Embedding Model
model_name = "sentence-transformers/all-mpnet-base-v2"
model_kwargs = {'device': 'cpu'}
encode_kwargs = {'normalize_embeddings': False}
embeddings_hf = HuggingFaceEmbeddings(
    model_name=model_name,
    model_kwargs=model_kwargs,
    encode_kwargs=encode_kwargs
)

# Step 4: Embed Chunks as Vectors and Load
## This step may take some time as it's CPU Intensive
db_chroma = Chroma.from_documents(chunks, embeddings_hf, persist_directory=CHROMA_PATH)

# Step 5: Testing
## this is an example of a user question (query)
query = 'what are the top risks mentioned in the document?'

## retrieve context - top 5 most relevant (closests) chunks to the query vector 
## (by default Langchain is using cosine distance metric)
docs_chroma = db_chroma.similarity_search_with_score(query, k=5)

# generate an answer based on given user query and retrieved context information
# context_text = "\n\n".join([doc.page_content for doc, _score in docs_chroma])



#### THEN COMBINE INFO WITH LLM 
