# Basic FAISS example based on https://www.pinecone.io/learn/series/faiss/faiss-tutorial/

import requests
from io import StringIO
import pandas as pd
from sentence_transformers import SentenceTransformer
import faiss

# Load Test Dataset

res = requests.get('https://raw.githubusercontent.com/brmson/dataset-sts/master/data/sts/sick2014/SICK_train.txt')
# create dataframe
data = pd.read_csv(StringIO(res.text), sep='\t')
data.head()

# we take all samples from both sentence A and B
sentences = data['sentence_A'].tolist()
sentences[:5]

print(sentences)

# we take all samples from both sentence A and B
sentences = data['sentence_A'].tolist()
sentence_b = data['sentence_B'].tolist()
sentences.extend(sentence_b)  # merge them
len(set(sentences))  # together we have ~4.5K unique sentences

# We actually need more unique sentences (but skipping this part)

# we build our dense vector representations of each sentence using the sentence-BERT library.

# remove duplicates and NaN
sentences = [word for word in list(set(sentences)) if type(word) is str]

# initialize sentence transformer model
model = SentenceTransformer('bert-base-nli-mean-tokens')
# create sentence embeddings
sentence_embeddings = model.encode(sentences)
sentence_embeddings.shape

# Using FAISS
d = sentence_embeddings.shape[1]

index = faiss.IndexFlatL2(d)
print(index.is_trained) # true

# Add Sentence Emeddings
index.add(sentence_embeddings)
print(index.ntotal)

# Find close matches to query

# Then search given a query `xq` and number of nearest neigbors to return `k`.
k = 4
xq = model.encode(["Someone sprints with a football"])

D, I = index.search(xq, k)  # search
print(I)

# Here we're returning indices `1301`, `292`, `3148`, and `2035`, which returns:
print(data['sentence_A'].iloc[[1301, 292, 3148, 2035]])