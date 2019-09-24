import requests
from bs4 import BeautifulSoup

url = "https://www.crazydeals.co.ke"
r = requests.get(url)

soup = BeautifulSoup(r.content)
links = soup.find_all("a")

for link in links:
	if "http" in link.get("href"):
		print ((link.get("href"), link.text))
		#print ("<a href='%s' > %s</a >" %(link.get("href"), link.text))



