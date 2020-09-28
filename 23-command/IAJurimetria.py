import sys
import pandas as pd
from numpy import random
from sklearn.neighbors import KNeighborsClassifier

random.seed(1234);
fileName = '..\\30-data\\JFRNSupervisionado.csv'
df = pd.read_csv(fileName)
rec = df[['CÃ³digo da classe processual','CÃ³digo do Assunto','Valor da Causa','Processo PrioritÃ¡rio','DescriÃ§Ã£o do Evento']]
rec = rec.dropna()
rec.loc[rec['Processo PrioritÃ¡rio'] == 'N','Processo PrioritÃ¡rio'] = 0
rec.loc[rec['Processo PrioritÃ¡rio'] == 'S','Processo PrioritÃ¡rio'] = 1
rec.loc[rec['DescriÃ§Ã£o do Evento'] == 'Julgado procedente o pedido','DescriÃ§Ã£o do Evento'] = 2
rec.loc[rec['DescriÃ§Ã£o do Evento'] == 'Julgado procedente em parte do pedido','DescriÃ§Ã£o do Evento'] = 1
rec.loc[rec['DescriÃ§Ã£o do Evento'] == 'Julgado improcedente o pedido','DescriÃ§Ã£o do Evento'] = 0
data = rec[['CÃ³digo da classe processual','CÃ³digo do Assunto','Valor da Causa','Processo PrioritÃ¡rio']]
data=data.astype('int')
target = rec['DescriÃ§Ã£o do Evento']
target=target.astype('int')
knn = KNeighborsClassifier(n_neighbors=6)
knn.fit(data, target)
codClasseProcessual = int(sys.argv[1])
codAssunto = int(sys.argv[2])
valor = float(sys.argv[3])
processoPrioritario = int(sys.argv[4])
predicao = knn.predict_proba([[codClasseProcessual,codAssunto,valor,processoPrioritario]])[0]
print(predicao[0])
print(predicao[1])
print(predicao[2])
