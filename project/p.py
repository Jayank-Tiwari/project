import pandas as pd
a={"year":[2010,2010,2012,2010],"month":["jan","mar","jan","dec"],"pessenger":[25,50,35,55]}
b=pd.DataFrame(a)
c = b.iloc[0,2]
print(c)