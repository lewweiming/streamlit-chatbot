from dotenv import load_dotenv
from langchain_community.llms import HuggingFaceHub

load_dotenv()  ## Load environment variables from .env file

# Initialize the model from HuggingFace Hub
hub_llm = HuggingFaceHub(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")

# Define the input prompt
prompt = "Explain the main features of Langchain."

# Run the model (use .call() instead of .run())
response = hub_llm(prompt)

# Output the result
print(response)
