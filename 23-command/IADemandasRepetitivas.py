import sys
import pandas as pd
from numpy import random
from sklearn.cluster import KMeans

random.seed(1234);
fileName = '..\\30-data\\output_JFRN.csv'
df = pd.read_csv(fileName)
rec = df[['CÃ³digo da classe processual','CÃ³digo do Assunto','Valor da Causa','Processo PrioritÃ¡rio']]
rec = rec.dropna()
rec.loc[rec['Processo PrioritÃ¡rio'] == 'N','Processo PrioritÃ¡rio'] = 0
rec.loc[rec['Processo PrioritÃ¡rio'] == 'S','Processo PrioritÃ¡rio'] = 1
model = KMeans(n_clusters=500)
model.fit(rec)
codClasseProcessual = int(sys.argv[1])
codAssunto = int(sys.argv[2])
valor = float(sys.argv[3])
processoPrioritario = int(sys.argv[4])
predicao = model.predict([[codClasseProcessual,codAssunto,valor,processoPrioritario]])[0]
print(predicao)

tst = df
tst.loc[tst['Processo PrioritÃ¡rio'] == 'N','Processo PrioritÃ¡rio'] = 0
tst.loc[tst['Processo PrioritÃ¡rio'] == 'S','Processo PrioritÃ¡rio'] = 1
tst['resultado'] = tst.apply(lambda x: model.predict([[x['CÃ³digo da classe processual'],x['CÃ³digo do Assunto'],x['Valor da Causa'],x['Processo PrioritÃ¡rio']]])[0], axis=1)
rectst = tst[['DescriÃ§Ã£o da classe processual','DescriÃ§Ã£o do Assunto','Valor da Causa','Processo PrioritÃ¡rio','resultado']]
rectst = rectst.groupby('resultado')['Valor da Causa'].count().reset_index(name='count')
rectst = rectst[rectst['count'] > 50]['resultado']
list = rectst.tolist()
print(predicao in list)
