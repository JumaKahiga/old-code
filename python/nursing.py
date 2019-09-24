import math
import webpy

#Calculating tablets
print ("Calculating number of tablets...")

Dosage = int(input('Enter the desired dosage in mg:  '))
Stock_strength = int(input('Enter the stock strength in mg:  '))
Number_of_tablets = (Dosage/ Stock_strength)

print ("Give ", Number_of_tablets, " tablets")


#Calculating mixtures and solutions
print ("Calculating mixtures and solutions...")

Dose = int(input('Enter the desired dosage in mg/ml:   '))
Strength_of_stock = int(input('Enter the stock strength in mg/ml:  '))
Stock_volume = int(input('Enter the stock volume in mg/ml:  '))
Mixtures_and_Solutions = (Dose/ Strength_of_stock) * Stock_volume

print ("Mixtures and Solutions = ", Mixtures_and_Solutions)

#Calculating IV rates: mls per hours (& minute)
print ('Calculating IV rates in mls per hour...')

IV_Volume= int(input('Enter the total volume of IV to be infused in milliliters (1 liter = 1000ml):   '))
Infusion_Time= int(input('Enter the period in hours for this infusion:   '))
IV_Rate= (IV_Volume/ Infusion_Time)

print ('Set the IV Pump for ', IV_Rate, 'mls/hour')
