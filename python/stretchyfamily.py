
#-----Statement of Authorship----------------------------------------#
#
#  This is an individual assessment item.  By submitting this
#  code I agree that it represents my own work.  I am aware of
#  the University rule that a student must not act in a manner
#  which constitutes academic dishonesty as stated and explained
#  in QUT's Manual of Policies and Procedures, Section C/5.3
#  "Academic Integrity" and Section E/2.1 "Student Code of Conduct".
#
#    Student no: PUT YOUR STUDENT NUMBER HERE
#    Student name: PUT YOUR NAME HERE
#
#  NB: Files submitted without a completed copy of this statement
#  will not be marked.  All files submitted will be subjected to
#  software plagiarism analysis using the MoSS system
#  (http://theory.stanford.edu/~aiken/moss/).
#
#--------------------------------------------------------------------#



#-----Assignment Description-----------------------------------------#
#
#  MY STRETCHY FAMILY
#
#  This assignment tests your skills at defining functions, processing
#  data stored in lists and performing the arithmetic calculations
#  necessary to display a complex visual image.  The incomplete
#  Python script below is missing a crucial function, "draw_portrait".
#  You are required to complete this function so that when the
#  program is run it produces a portrait of a stick figure family in
#  the style of the car window stickers that have become popular in
#  recent years, using data stored in a list to determine the
#  locations and heights of the figures.  See the instruction
#  sheet accompanying this file for full details.
#
#  Note that this assignment is in two parts, the second of which
#  will be released only just before the final deadline.  This
#  template file will be used for both parts and you will submit
#  only your final solution, whether or not you complete both
#  parts.
#
#--------------------------------------------------------------------#  



#-----Preamble-------------------------------------------------------#
#
# This section imports necessary functions and defines constant
# values used for drawing the background.  You should not change any
# of the code in this section.
#

# Import the functions needed to complete this assignment.  You
# should not need to import any other modules for your solution.

import turtle
from turtle import *
from math import *

# Define constant values used in the main program that sets up
# the drawing canvas.  Do not change any of these values.

window_height = 550 # pixels
window_width = 900 # pixels
grass_height = 200 # pixels
grass_offset = -100 # pixels
location_width = 150 # pixels
num_locations = 5

#
#--------------------------------------------------------------------#



#-----Functions for Drawing the Background---------------------------#
#
# The functions in this section are called by the main program to
# draw the background and the locations where the individuals in the
# portrait are required to stand.  You should not change any of
# the code in this section.  Note that each of these functions
# leaves the turtle's pen up.
#


# Draw the grass as a big green rectangle
def draw_grass():
    
    penup()
    goto(-window_width / 2, grass_offset) # start at the bottom-left
    setheading(90) # face north
    fillcolor('pale green')
    begin_fill()
    forward(grass_height)
    right(90) # face east
    forward(window_width)
    right(90) # face south
    forward(grass_height)
    right(90) # face west
    forward(window_width)
    end_fill()


# Draw the locations where the individuals must stand
def draw_locations(locations_on = True):

    # Only draw the locations if the argument is True
    if locations_on:

        # Define a small gap at each end of each location
        gap_size = 5 # pixels
        location_width_less_gaps = location_width - (gap_size * 2) # pixels

        # Start at the far left, facing east
        penup()
        goto(-num_locations * location_width / 2, 0)
        setheading(0) 
  
        # Draw each location as a thick line with a gap at each end
        color('dark khaki')
        for location in range(num_locations):
            penup()
            forward(gap_size)
            pendown()
            width(5) # draw a thick line
            forward(location_width_less_gaps)
            width(1)
            penup()
            forward(gap_size)


# Draw the numeric labels on the locations
def draw_labels(labels_on = True):

    # Only draw the labels if the argument is True
    if labels_on:
    
        font_size = 16 # size of characters for the labels

        # Start in the middle of the left-hand location, facing east
        penup()
        goto(-((num_locations - 1) * location_width) / 2,
             -font_size * 2)
        setheading(0) 

        # Walk to the right, print the labels as we go
        color('dark khaki')
        for label in range(num_locations):
            write(label, font = ('Arial', font_size, 'bold'))
            forward(location_width)


# As a debugging aid, mark certain absolute coordinates on the canvas
def mark_coords(marks_on = True):

    # Only mark the coordinates if the argument is True
    if marks_on:

        # Mark the "home" coordinate
        home()
        width(1)
        color('black')
        dot(3)
        write('0, 0', font = ('Arial', 10, 'normal'))

        # Mark the centre point of each individual's location
        max_x = (num_locations - 1) * location_width / 2
        penup()
        for x_coord in range(-max_x, max_x + location_width, location_width):
            for y_coord in [0, 400]:
                goto(x_coord, y_coord)
                dot(3)
                write(str(x_coord) + ', ' + str(y_coord),
                      font = ('Arial', 10, 'normal'))
                
#
#--------------------------------------------------------------------#



#-----Test data------------------------------------------------------#
#
# These are the data sets you will use to test your code.
# Each of the data sets is a list specifying the positions for
# the people in the portrait:
#
# 1. The name of the individual, from 'Person A' to 'Person D' or 'Pet'
# 2. The place where that person/pet must stand, from location 0 to 4
# 3. How much to stretch the person/pet vertically, from 0.5 to 1.5
#    times their normal height
# 4. A mystery value, either '*' or '-', whose purpose will be
#    revealed only in the second part of the assignment
#
# Each data set does not necessarily include all people and sometimes
# they require the same person to be drawn more than once.  You
# can assume, however, that they never put more than one person in
# the same location.
#
# You may add additional data sets but you may not change any of the
# given data sets below.
#

# The following data set doesn't require drawing any people at
# all.  You may find it useful as a dummy argument when you
# first start developing your "draw_portrait" function.

portrait_00 = []

# The following data sets each draw just one of the individuals
# at their default height.

portrait_01 = [['Person A', 2, 1.0, '-']]

portrait_02 = [['Person B', 3, 1.0, '-']]

portrait_03 = [['Person C', 1, 1.0, '-']]

portrait_04 = [['Person D', 0, 1.0, '-']]

portrait_05 = [['Pet', 4, 1.0, '-']]

# The following data sets each draw just one of the individuals
# but multiple times and at different sizes.

portrait_06 = [['Person A', 3, 1.0, '-'],
               ['Person A', 1, 0.75, '-'],
               ['Person A', 2, 0.5, '-'],
               ['Person A', 4, 1.4, '-']]

portrait_07 = [['Person B', 0, 0.5, '-'],
               ['Person B', 2, 1.0, '-'],
               ['Person B', 3, 1.5, '-']]

portrait_08 = [['Person C', 0, 0.5, '-'],
               ['Person C', 1, 0.75, '-'],
               ['Person C', 2, 1.0, '-'],
               ['Person C', 3, 1.25, '-'],
               ['Person C', 4, 1.5, '-']]

portrait_09 = [['Person D', 3, 1.25, '-'],
               ['Person D', 1, 0.8, '-'],
               ['Person D', 0, 1.0, '-']]

portrait_10 = [['Pet', 1, 1.3, '-'],
               ['Pet', 2, 1.0, '-'],
               ['Pet', 3, 0.7, '-']]

# The following data sets each draw a family portrait with all
# individuals at their default sizes.  These data sets create
# "natural" looking portraits.  Notably, the first two both
# show the full family.

portrait_11 = [['Person A', 0, 1.0, '-'],
               ['Person B', 1, 1.0, '-'],
               ['Person C', 2, 1.0, '*'],
               ['Person D', 3, 1.0, '-'],
               ['Pet', 4, 1.0, '-']]

portrait_12 = [['Person A', 2, 1.0, '-'],
               ['Person B', 3, 1.0, '*'],
               ['Person C', 1, 1.0, '-'],
               ['Person D', 4, 1.0, '-'],
               ['Pet', 0, 1.0, '-']]

portrait_13 = [['Person B', 1, 1.0, '-'],
               ['Pet', 2, 1.0, '-'],
               ['Person C', 3, 1.0, '*']]

portrait_14 = [['Person C', 0, 1.0, '-'],
               ['Pet', 1, 1.0, '-'],
               ['Person A', 2, 1.0, '*'],
               ['Person D', 3, 1.0, '-'],
               ['Person B', 4, 1.0, '-']]

portrait_15 = [['Person D', 4, 1.0, '*'],
               ['Person A', 3, 1.0, '-'],
               ['Person B', 2, 1.0, '-']]

portrait_16 = [['Person D', 1, 1.0, '-'],
               ['Person C', 0, 1.0, '-'],
               ['Person A', 2, 1.0, '-'],
               ['Person B', 3, 1.0, '*']]

# The following data sets draw all five individuals at their
# minimum and maximum heights.

portrait_17 = [['Person A', 0, 0.5, '-'],
               ['Person B', 1, 0.5, '-'],
               ['Person C', 2, 0.5, '*'],
               ['Person D', 3, 0.5, '-'],
               ['Pet', 4, 0.5, '-']]

portrait_18 = [['Person A', 4, 1.5, '-'],
               ['Person B', 3, 1.5, '*'],
               ['Person C', 2, 1.5, '-'],
               ['Person D', 1, 1.5, '-'],
               ['Pet', 0, 1.5, '-']]

# The following data sets each draw a family portrait with
# various individuals at varying sizes.

portrait_19 = [['Person A', 0, 0.5, '*'],
               ['Person B', 1, 0.8, '-'],
               ['Person C', 2, 1.5, '-'],
               ['Person D', 3, 1.5, '-'],
               ['Pet', 4, 0.5, '-']]

portrait_20 = [['Person B', 1, 0.8, '*'],
               ['Pet', 2, 1.4, '-'],
               ['Person C', 3, 0.7, '-']]

portrait_21 = [['Person C', 0, 1.5, '-'],
               ['Pet', 1, 1.0, '-'],
               ['Person A', 2, 1.5, '-'],
               ['Person D', 3, 1.5, '*'],
               ['Person B', 4, 1.5, '-']]

portrait_22 = [['Person D', 4, 1.2, '-'],
               ['Person A', 3, 1.0, '*'],
               ['Person B', 2, 0.8, '-']]

portrait_23 = [['Person D', 1, 1.1, '-'],
               ['Person C', 2, 0.9, '-'],
               ['Person A', 0, 1.1, '*'],
               ['Person B', 3, 0.9, '-']]

# ***** If you want to create your own data sets you can add them here
# ***** (but your code must still work with all the data sets above plus
# ***** any other data sets in this style).

#
#--------------------------------------------------------------------#



#-----Student's Solution---------------------------------------------#
#
#  Complete the assignment by replacing the dummy function below with
#  your own "draw_portrait" function.
#

# Draw the stick figures as per the provided data set
def draw_person():
    turtle.penup()
    turtle.setpos(-300, 280)
    turtle.pendown()
    turtle.pensize(3)
    turtle.circle(6)
    turtle.left(270)
    turtle.pensize(60)
    turtle.pencolor('Purple')
    turtle.forward(200)
    turtle.left(30)
    turtle.pensize(4)
    turtle.forward(60)
    turtle.penup()
    turtle.backward(60)
    turtle.pendown()
    turtle.right(60)
    turtle.forward(60)
    turtle.penup()
    turtle.backward(60)
    turtle.pendown()
    turtle.right(150)
    turtle.forward(180)
    turtle.right(180)
    turtle.right(30)
    turtle.forward(45)
    turtle.backward(45)
    turtle.left(60)
    turtle.forward(45)
    turtle.backward(45)
    turtle.penup()
    turtle.setpos(-327, 350)
    turtle.pendown()
    turtle.dot(5, "blue")
    turtle.penup()
    turtle.setpos(-273, 350)
    turtle.pendown()
    turtle.dot(5, "blue")


    #Second character
    turtle.penup()
    turtle.setpos(-150, 260)
    turtle.pendown()
    turtle.pensize(3)
    turtle.circle(40)
    turtle.penup()
    turtle.setpos(-110,240)
    turtle.pendown()
    turtle.pencolor('red')
    turtle.pensize(6)
    turtle.right(30)
    turtle.forward(160)
    turtle.left(30)
    turtle.pensize(3)
    turtle.forward(60)
    turtle.penup()
    turtle.backward(60)
    turtle.pendown()
    turtle.right(60)
    turtle.forward(60)
    turtle.penup()
    turtle.backward(60)
    turtle.pendown()
    turtle.right(150)
    turtle.pensize(6)
    turtle.forward(140)
    turtle.right(180)
    turtle.right(30)
    turtle.forward(45)
    turtle.backward(45)
    turtle.left(60)
    turtle.forward(45)
    turtle.backward(45)
    turtle.penup()
    turtle.setpos(-130, 280)
    turtle.pendown()
    turtle.pensize(2)
    turtle.dot(5, "blue")
    turtle.penup()
    turtle.setpos(-95, 280)
    turtle.pendown()
    turtle.dot(5, "blue")

    #third person

    turtle.penup()
    turtle.setpos(0, 120)
    turtle.pendown()
    turtle.pensize(2)
    turtle.pencolor('black')
    turtle.circle(20)
    turtle.penup()
    turtle.setpos(20,110)
    turtle.pendown()
    turtle.right(30)
    turtle.pensize(4)
    turtle.pencolor('green')
    turtle.forward(60)
    turtle.left(30)
    turtle.pensize(2)
    turtle.forward(20)
    turtle.penup()
    turtle.backward(20)
    turtle.pendown()
    turtle.right(60)
    turtle.forward(20)
    turtle.penup()
    turtle.backward(20)
    turtle.pendown()
    turtle.right(150)
    turtle.forward(30)
    turtle.right(180)
    turtle.right(30)
    turtle.forward(10)
    turtle.backward(10)
    turtle.left(60)
    turtle.forward(10)
    turtle.backward(10)
    turtle.penup()
    turtle.setpos(15, 130)
    turtle.pendown()
    turtle.pensize(1)
    turtle.dot(4, "blue")
    turtle.penup()
    turtle.setpos(25, 130)
    turtle.pendown()
    turtle.dot(4, "blue")

    #Big Brother
    turtle.penup()
    turtle.setpos(150, 160)
    turtle.pendown()
    turtle.pensize(3)
    turtle.pencolor('black')
    turtle.circle(25)
    turtle.penup()
    turtle.setpos(175,150)
    turtle.pendown()
    turtle.right(30)
    turtle.pensize(5)
    turtle.pencolor('orange')
    turtle.forward(90)
    turtle.left(30)
    turtle.forward(35)
    turtle.penup()
    turtle.backward(35)
    turtle.pendown()
    turtle.right(60)
    turtle.forward(35)
    turtle.penup()
    turtle.backward(35)
    turtle.pendown()
    turtle.right(150)
    turtle.forward(60)
    turtle.right(180)
    turtle.right(30)
    turtle.forward(25)
    turtle.backward(25)
    turtle.left(60)
    turtle.forward(25)
    turtle.backward(25)
    turtle.penup()
    turtle.setpos(165, 170)
    turtle.pendown()
    turtle.dot(5, "blue")
    turtle.penup()
    turtle.setpos(185, 170)
    turtle.pendown()
    turtle.dot(5, "blue")

    #Mary's turtle

    turtle.penup()
    turtle.setpos(300, 100)
    turtle.pendown()
    turtle.pensize(2)
    turtle.pencolor('black')
    turtle.circle(10)
    turtle.penup()
    turtle.setpos(310, 90)
    turtle.right(30)
    turtle.pensize(3)
    turtle.pencolor('brown')
    turtle.penup()
    turtle.setpos(250, 45)
    turtle.pendown()
    turtle.circle(50)

    #Crowning Me
    turtle.penup()
    turtle.setpos(230,196)
    turtle.pendown()
    turtle.left(90)
    turtle.color('black', 'black')
    turtle.begin_fill()
    turtle.backward(120)
    #turtle.left(180)
    #turtle.forward(120)
    turtle.right(180)
    turtle.backward(20)
    turtle.right(90)
    turtle.forward(40)
    turtle.right(90)
    turtle.forward(80)
    turtle.right(90)
    turtle.forward(40)
    turtle.end_fill()



   

#
#--------------------------------------------------------------------#



#-----Main Program---------------------------------------------------#
#
# This main program sets up the background, ready for you to start
# drawing your stick figures.  Do not change any of this code except
# where indicated by comments marked '*****'.
#
    
# Set up the drawing window with a blue background representing
# the sky, and with the "home" coordinate set to the middle of the
# area where the stick figures will stand
setup(window_width, window_height)
setworldcoordinates(-window_width / 2, grass_offset,
                    window_width / 2, window_height + grass_offset)
bgcolor('sky blue')

# Draw the grass (with animation turned off to make it faster)
tracer(False)
draw_grass()

# Give the window a title
# ***** Replace this title with one that describes your choice
# ***** of individuals
title("My Stretchy Family (There is father, mother, Mary, Me and Mary's turtle)")

# Control the drawing speed
# ***** Modify the following argument if you want to adjust
# ***** the drawing speed
speed('fastest')

# Draw the locations to stand, their labels and selected coordinates
# ***** If you don't want to display these background elements,
# ***** to make your portrait look nicer, change the corresponding
# ***** argument(s) below to False
draw_locations(True)
draw_labels(True)
mark_coords(True)

# Call the student's function to display the stick figures
# ***** If you want to turn off animation while drawing your
# ***** stick figures, to make your program draw faster, change
# ***** the following argument to False
tracer(True)
# ***** Change the argument to this function to test your
# ***** code with different data sets
draw_person()



# Exit gracefully by hiding the cursor and releasing the window
#tracer(True)
#hideturtle()
#done()

turtle.exitonclick()
print ("Thank you for watching My Stretchy Family")

#
#--------------------------------------------------------------------#

