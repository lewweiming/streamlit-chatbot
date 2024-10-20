# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

from sentence_transformers import SentenceTransformer
import faiss
from langchain_community.vectorstores import FAISS
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_community.docstore import InMemoryDocstore
from langchain_core.documents import Document

# Load Test Dataset

document_1 = Document(page_content="Python is a popular programming language for data science.", metadata={"baz": "bar"})
document_2 = Document(page_content="thud", metadata={"bar": "baz"})
document_3 = Document(page_content="i will be deleted :(")

documents = [document_1, document_2, document_3]
ids = ["1", "2", "3"]

# Create an array (list) of sentences by extracting the page_content
sentences = [doc.page_content for doc in [document_1, document_2, document_3]]

# initialize sentence transformer model
model_name = 'bert-base-nli-mean-tokens'
model = SentenceTransformer(model_name)
# create sentence embeddings
sentence_embeddings = model.encode(sentences)
sentence_embeddings.shape

# Prepare the FAISS index (TRICKY: What should the index be?)
d = sentence_embeddings.shape[1]
index = faiss.IndexFlatL2(d)

# Initialize the vector store with the index
embedding_function = HuggingFaceEmbeddings(model_name=model_name)

# The faiss_index
vector_store = FAISS(
    embedding_function=embedding_function,
    index=index,
    docstore=InMemoryDocstore(),
    index_to_docstore_id={}
)

# Add content to Vector Store
vector_store.add_documents(documents=documents, ids=ids)

# Example User Query
query = "What is python?"

## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
docs_faiss = vector_store.similarity_search_with_score(query,k=5)

# generate an answer based on given user query and retrieved context information
context_text = "\n\n".join([doc.page_content for doc, _score in docs_faiss])
print(context_text)

# Now you can combine context_text with LLM for further processing