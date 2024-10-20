# This example uses Hugging Face Embeddings
# See https://python.langchain.com/v0.2/docs/integrations/text_embedding/text_embeddings_inference/

from dotenv import load_dotenv
from langchain_huggingface import HuggingFaceEndpointEmbeddings

load_dotenv()  # Load environment variables from .env file

model = "sentence-transformers/all-mpnet-base-v2"
embeddings = HuggingFaceEndpointEmbeddings(
    model=model,
    task="feature-extraction"
)

# # Define the input text for which you want to generate embeddings
text = "Explain the main features of Langchain."

# # Generate embeddings (you may need to use .call() or a specific method based on your library version)
query_result = embeddings.embed_query(text) # I.e [0.018113142, 0.00302585, -0.049911194]

# # Output the embeddings
print(query_result)
