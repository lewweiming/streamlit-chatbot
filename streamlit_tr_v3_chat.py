# This app enables you to chat with the TR V3 FAISS Vector Store
# To limit tokens sent to LLM, ask it to summarise the chat history in as few words as possible while retaining context
# I.e Condense the chat history below to reduce token count:
# I.e Use system instructions to make LLM reply as JSON with Chat History

import pprint
import streamlit as st
import time
from langchain_community.vectorstores import FAISS
from langchain_core.messages import AIMessage, HumanMessage
from langchain_huggingface import HuggingFaceEndpoint
from langchain_huggingface import HuggingFaceEmbeddings
from langchain_core.output_parsers import StrOutputParser
from langchain_core.prompts import ChatPromptTemplate

# Define function to retrieve response from RAG + LLM    

FOLDER_PATH = "faiss_vector_store"
MODEL_NAME = 'bert-base-nli-mean-tokens'
QUERY_1 = "I need a Controllers / Methods overview for Travelgowhere Modules"
QUERY_2 = "What is the code behind the submitSelection method in Travelgowhere Controller for Car Rentals"

# Or Load from existing path, skips loading of PDF document, so should be faster
def load_vector_store():

    # Initialize HuggingFace embeddings model
    embedding_function = HuggingFaceEmbeddings(model_name=MODEL_NAME)

    vector_store = FAISS.load_local(folder_path=FOLDER_PATH, allow_dangerous_deserialization=True, embeddings=embedding_function)
    return vector_store


# Get Vector Store either from existing or new
vector_store = load_vector_store()

# Initialize your LLM model
hub_llm = HuggingFaceEndpoint(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")


# Template / System Instructions
# Define the template outside the function
template = """
You are a  travel assistant chatbot your name is Travelgowhere.AI designed to help users plan their trips and provide travel-related information.

Reply as a customer service agent.

Do not include your thoughts, context or chat history. Only reply.

Chat history:
{chat_history}

User question:
{user_question}

RAG Context:
{context_text}
"""

# Definie a Chat Prompt Template
prompt = ChatPromptTemplate.from_template(template)

# Generate an answer using the LLM
def get_response(query, chat_history):

    # ## Retrieve top 5 most relevant (closest) chunks to the query vector (vector store)
    results = vector_store.similarity_search_with_score(query)
    # print(results)

    # Initialize an empty context list
    context_chunks = []

    # Process results
    for doc, score in results:
        if doc.metadata["type"] == "code":
            context_chunks.append(f"**Code Chunk:**\n{doc.page_content}\n")
        elif doc.metadata["type"] == "semantic":
            context_chunks.append(f"**Semantic Meaning:**\n{doc.page_content}\n")

    # Combine context chunks into a single context string
    context_text = "\n".join(context_chunks)
    

    # Now you can combine context_text with LLM for further processing    
    chain = prompt | hub_llm | StrOutputParser()

    response = chain.invoke({
        "chat_history": chat_history, ## From Session State
        "user_question": query, ## From User Input
        "context_text": context_text
    })

    return response

# Define Streamlit App

def chat_process(query):

    # Store user message in chat history
    st.session_state.chat_history.append(HumanMessage(content=query))

    with st.chat_message("user"):
        st.write(query)

    response = get_response(query, st.session_state.chat_history)

    with st.chat_message("assistant"):
        
        st.write_stream(stream_data(response))

    st.session_state.chat_history.append(AIMessage(content=response)) 

    # pprint.pp(st.session_state.chat_history)



def stream_data(text):
    for word in text.split(" "):
        yield word + " "
        time.sleep(0.02)

st.title("Welcome to TR V3 Code Chat")

if st.button(QUERY_1):

    chat_process(QUERY_1)

if st.button(QUERY_2):

    chat_process(QUERY_2)       


user_query = st.chat_input("Say something")
if user_query:

    chat_process(user_query)     

## Initialize session state.
if "chat_history" not in st.session_state:
    st.session_state.chat_history = []    