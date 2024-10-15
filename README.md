# Streamlit Chatbot

> Based on https://www.analyticsvidhya.com/blog/2024/07/build-a-travel-assistant-chatbot/

## Background

> The idea is to use LangChain, Mistral, Hugging Face and Streamlit.

- The model is loaded via HuggingFaceEndpoint() 
- get_response() is used to engage the model and retrieve a response based on chat history and user input
- st.chat_input is used to collect user input
- Conditional binding is used on st.chat_input to update the Chat UI

## Usage

```
streamlit run streamlit.py
```