# Simple Example to utilise Hugging Face Endpoint on a specified model for inteference

from dotenv import load_dotenv
from langchain_huggingface import HuggingFaceEndpoint

load_dotenv()  ## Load environment variables from .env file

# Initialize the model from HuggingFace Hub
hub_llm = HuggingFaceEndpoint(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")

# Define the input prompt
prompt = "Explain the main features of Langchain."

# Run the model (use .call() instead of .run())
response = hub_llm.invoke(prompt)

# Output the result
print(response)
