<?php
/**
 * interface with abstract method
 */
interface Shape {
    function draw();
 }

//class defination implements interface
class Rectangle implements Shape {

    function draw() {
       echo"\nRectangle draw";
    }
 }

 //class defination implements interface
class Square implements Shape {

    function draw() {
       echo"\n Square draw";
    }
 }

//class defination implements interface
class Circle implements Shape {

    function draw() {
       echo"\n Circle draw";
    }
 }


/**
 * class for implementation of all types of class in single
 */
class ShapeMaker {
 
    function _construct() {
    }
 
    function drawCircle(){
       $circle = new Circle();
       $circle->draw();
    }
    function drawRectangle(){
       $rectangle = new Rectangle();
       $rectangle->draw();
    }
    function drawSquare(){
       $square = new Square();
       $square->draw();
    }
 }

 $shapeMaker = new ShapeMaker();
      $shapeMaker->drawCircle();
      $shapeMaker->drawRectangle();
      $shapeMaker->drawSquare();	
?>