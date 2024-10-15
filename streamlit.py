import streamlit as st
from dotenv import load_dotenv
from langchain_community.llms import HuggingFaceHub
from langchain_community.llms import HuggingFaceEndpoint

load_dotenv()  ## Load environment variables from .env file

st.title("Welcome to My Streamlit app")

# Get Response Function

# Function to get a response from the model
def get_response(user_query):

    # Initialize the model from HuggingFace Hub
    hub_llm = HuggingFaceHub(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")

    # Define the input prompt
    prompt = "Explain the main features of Langchain."

    # Run the model (use .call() instead of .run())
    response = hub_llm(prompt)

    print(response)

    return response

# Connecting to LLM

# Handle Chat History

# User Chat Interface
user_query = st.chat_input("Type your message here...")

# Chat Input Event Binding
if user_query is not None and user_query != "":

    # Chat Message Test
    with st.chat_message("Human"):
        st.markdown(user_query)

    # st.session_state.chat_history.append(HumanMessage(content=user_query))

    # with st.chat_message("Human"):
    #     st.markdown(user_query)

    response = get_response(user_query)

    # response = get_response(user_query, st.session_state.chat_history)

    # with st.chat_message("AI"):
    #     st.write(response)

    # st.session_state.chat_history.append(AIMessage(content=response)) 