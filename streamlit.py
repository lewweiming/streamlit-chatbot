# This example creates a simple travel chatbot using HuggingFace model + Streamlit + Langchain
# Based on https://www.analyticsvidhya.com/blog/2024/07/build-a-travel-assistant-chatbot/

from dotenv import load_dotenv
import streamlit as st
from langchain_huggingface import ChatHuggingFace,HuggingFaceEndpoint
from langchain_core.messages import AIMessage, HumanMessage
from langchain_core.output_parsers import StrOutputParser
from langchain_core.prompts import ChatPromptTemplate

## Load environment variables from .env file
load_dotenv()

st.title("Welcome to My Streamlit Travel Chatbot Based on Mistral")

# Template / System Instructions
# Define the template outside the function
template = """
You are a  travel assistant chatbot your name is Travelgowhere.AI designed to help users plan their trips and provide travel-related information. Here are some scenarios you should be able to handle:

1. Booking Flights: Assist users with booking flights to their desired destinations. Ask for departure city, destination city, travel dates, and any specific preferences (e.g., direct flights, airline preferences). Check available airlines and book the tickets accordingly.

2. Booking Hotels: Help users find and book accommodations. Inquire about city or region, check-in/check-out dates, number of guests, and accommodation preferences (e.g., budget, amenities). 

3. Booking Rental Cars: Facilitate the booking of rental cars for travel convenience. Gather details such as pickup/drop-off locations, dates, car preferences (e.g., size, type), and any additional requirements.

4. Destination Information: Provide information about popular travel destinations. Offer insights on attractions, local cuisine, cultural highlights, weather conditions, and best times to visit.

5. Travel Tips: Offer practical travel tips and advice. Topics may include packing essentials, visa requirements, currency exchange, local customs, and safety tips.

6. Weather Updates: Give current weather updates for specific destinations or regions. Include temperature forecasts, precipitation chances, and any weather advisories.

7. Local Attractions: Suggest local attractions and points of interest based on the user's destination. Highlight must-see landmarks, museums, parks, and recreational activities.

8. Customer Service: Address customer service inquiries and provide assistance with travel-related issues. Handle queries about bookings, cancellations, refunds, and general support.

Please ensure responses are informative, accurate, and tailored to the user's queries and preferences. Use natural language to engage users and provide a seamless experience throughout their travel planning journey.

Chat history:
{chat_history}

User question:
{user_question}
"""

# Definie a Chat Prompt Template
prompt = ChatPromptTemplate.from_template(template)

# Function to get a response from the model
def get_response(user_query, chat_history):

    # Initialize the model from HuggingFace Hub
    hub_llm = HuggingFaceEndpoint(repo_id="mistralai/Mixtral-8x7B-Instruct-v0.1")
    # chat = ChatHuggingFace(llm=hub_llm, verbose=True)

    # Define the input prompt
    # prompt = user_query

    # messages = [
    #     ("system", "You are a helpful translator. Translate the user sentence to French."),
    #     ("human", "I love programming."),
    # ]

    # messages = [
    #     ("human", user_query)
    # ]

    # Using Invoke command to interface with model
    # response = chat.invoke(messages)

    # return response.content

    chain = prompt | hub_llm | StrOutputParser()

    response = chain.invoke({
        "chat_history": chat_history, ## From Session State
        "user_question": user_query, ## From User Input
    })

    return response

# Handle Chat History

## Initialize session state.
if "chat_history" not in st.session_state:
    st.session_state.chat_history = [
        AIMessage(content="Hello, I am Travelgowhere.AI How can I help you?"),
    ]

## Display chat history.
for message in st.session_state.chat_history:
    if isinstance(message, AIMessage):
        with st.chat_message("AI"):
            st.write(message.content)
    elif isinstance(message, HumanMessage):
        with st.chat_message("Human"):
            st.write(message.content)


# User Chat Interface
user_query = st.chat_input("Type your message here...")

# Chat Input Event Binding
if user_query is not None and user_query != "":

    # Store user message in chat history
    st.session_state.chat_history.append(HumanMessage(content=user_query))

    # Add message to UI Chat
    with st.chat_message("Human"):
        st.markdown(user_query)

    # Get the model response
    response = get_response(user_query, st.session_state.chat_history)

    with st.chat_message("AI"):
        st.write(response)

    st.session_state.chat_history.append(AIMessage(content=response)) 