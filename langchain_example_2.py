# Import the necessary module
from langchain_core.output_parsers import StrOutputParser

# Create an instance of the parser
parser = StrOutputParser()

# Example input: Let's assume we received some output from an AI model
ai_output = "The weather is sunny with a slight breeze."

# Use the parser to convert the AI output into a string format (essentially what it already is)
parsed_output = parser.parse(ai_output)

# Print the parsed output
print(parsed_output)
