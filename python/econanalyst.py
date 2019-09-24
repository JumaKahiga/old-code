import numpy as np
import pandas as pd 
import scipy as sc
from pandas import DataFrame
import matplotlib as plt
from operator import add
from mpmath import findroot
import csv
import xlrd


x = []
input_file = open('dataSET.csv')
for line in input_file:
	if (line.split(';')[0] != 'age'):
		x.extend([eval(line.split(';') [1])])
		for row in input_file:
			print row

for row in input_file:
	x.append(row)

table = DataFrame(input_file, columns =['age', 'rooms' 'cost06'])

Header = x[0]
x.pop(0)

x.sort()
number_categories = 3
total = sum(x)
x.extend([total])

summed = number_categories
categories = range(0, number_categories)

print pd.DataFrame(x, columns= [Header])

opener = []
opener = input_file.read()

popAge = []
popRooms = []
popCost06 = []
for i in range(len(opener)):
	popAge.append(int(opener[i][1]))
	popRooms.append(int(opener[i][2]))
	popCost06.append(int(opener[i][3]))


popageAVG= np.mean(popAge)
popRoomsAVG = np.mean(popRooms)
popCost06AVG = np.mean(popCost06)

print popageAVG
print popRoomsAVG
print popCost06AVG

def histoData(popAge):
	print "Max: %d" % (np.amax(popAge))
	print "Min: %d" % (np.amin(popAge))
	print "average: %d" % (np.mean(popAge))
	print "Stdev: %d" % (np.std(popAge))

histoData(popAge)

def histoData(popRooms):
	print "Max: %d" % (np.amax(popRooms))
	print "Min: %d" % (np.amin(popRooms))
	print "average: %d" % (np.mean(popRooms))
	print "Stdev: %d" % (np.std(popRooms))

histoData(popRooms)

def histoData(popCost06):
	print "Max: %d" % (np.amax(popCost06))
	print "Min: %d" % (np.amin(popCost06))
	print "average: %d" % (np.mean(popCost06))
	print "Stdev: %d" % (np.std(popCost06))

histoData(popCost06)

plt.hist(popAge, bins=7)
plt.hist(popRooms, bins=7)
plt.hist(popCost06, bins=7)

table.mean()

plt.plot(input_file['age'], db['rooms'], db['cost06'], 'bo')

def regData(input_file):
	regressionline = sc.stats.linregress(input_file['age'], input_file['rooms'], input_file['cost06'])
	m= regressionline[0]
	b= regressionline[1]
	x= np.linspace(1, 3000, 19)
	plt.plot(x, m*x + b)
	plt.show

print regData('input_file')





