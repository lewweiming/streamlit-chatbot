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

## Chat With TR V3 Vector Store

```
streamlit run streamlit_tr_v3_chat.py
```

## RAG

- Different chunking methods can be employed.

## FAISS Project

**langchain_rag_faiss_mixed_tr_v3.py**

- langchain_rag_faiss_mixed_tr_v3.py is the culmination of days spent understanding what RAG via FAISS does. It trains and creates a vector store of embeddings based on source code from TR.