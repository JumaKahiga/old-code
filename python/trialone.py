import turtle
import math

def drawStickFigure():
    win = GraphWin("Stick figure")
    head = Circle(Point(100, 60), 20).draw(win)
    body = Line(Point(100, 80), Point(100, 120)).draw(win)
    arms= Line(Point(60, 100), Point(140, 100)).draw(win)
    leg1 = Line(Point(100,120), Point(60,160)).draw(win)
    leg2 = Line(Point(100,120), Point(140,160)).draw(win)  

  
drawStickFigure()