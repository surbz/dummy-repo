<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
Source - https://www.youtube.com/watch?v=5YaF8xTmxs4

As you read thtrough these notes keep uncommenting code and check results
OOPs - allows us to model functions and attributes inside classes.

attributes - properties like a man has hair = black, skin = white.

functions - abilities the man has like he can walk(), work(), sleep(), eat().
Man being the class.

Class - is the blueprint for creating attributes and properties which can be used by objects.

Object - is used to instantiate a class and defined by keyword new Classname();

Static methods - can be called directly and we dont need a object to call them use the keyword static like #1.

Inheritance - Suppose there is a main class which is very general say Animal and there is a class which is Dog and is
more specific like a Dog have all features of an Animal additiobnally some dog specific features so we can say
Class Dog would inherit everything from Class Animal if it extends it #2

Encapsulation - the idea of limiting access of attributes and functions to within the classes is called encapulation.
Priavte  - only accessible within the class
public - accessible anywhere throughout
protected - only accessible with in the class and the child class that extends that class.

Override - is the mechanism of rewriting a function so that now its doing somethings which it was not previously doing.#3

Interface - any class that implemnets an inteface signs a contract that it would define the methods being declared in interface. #5
#11

Ploymorphism - #4 PHP supports class based polymorphism and not argument based ploymorphism means that the o/p depends on the
object of the class php distinguises b/w the oject of the class being called though the argument was changed

constructors - called automatically anytime an object is created for a class. #6 by either keyword __construct or name same as class name

desctructors - called when all references to an object are destroyed.#7

How to call static methods and properties - #1 , #8

Final Keyword - is used if we dont want other classes to overwrite that method but just simply use it. #9

Abstract Classes and Abstract Methods* - Methods defined as abstract simply declare the method's signature - they cannot define the implementation.

What is the difference b/w Interface and Abstract Class - Interface all the methods are declared and none is defined in abstract class atleast one method is
decalred and with keyword abstract others are

Can we have non abstract methods inside an abstract class -
An abstract class can have non abstract methods. In fact, it can even have properties, and properties couldn't be abstract.

Magic methods, getters and setters - anything method that is prefixed by __ is a maigc method

Some keywords like -
clone -
instanceof - is used to check which class to an object belongs #10

@todo:*
how to call protected props ,
Overloading ,
Diff b/w methods/functions - When you create a function outside of a class, you can call it a function but when you create a function inside a class, you can call it a method.
are contructor, desc magic methods - yes
and how are magic methods called ,
what is counterpart of static :: self

Tye hinting , type casting - 

Interview   Questions On OOPs
*/

Class Animal implements Singable {
  protected $name;

  protected function animalmake() {
    echo $this->name . "Has inherired its make from Animal Class";
  }

  #8
  static $number_of_animal = 0;
  #5
  function sings(){
    echo $this->name . "sings Grr Grr Grr";
  }

  function getName() {
    return $this->name;
  }

  //#1
  static function getSum($number1, $number2) {
    return "Sum ". ($number1+$number2) . "</br>";
  }

  #6
  /*function Animal() {
    #8
    Animal::$number_of_animal++;
    echo "I am contructor of Class Animal";
  }*/

  #7
  /*function __destruct() {
    echo "I am descrtuctor of Class Animal";
  }*/

  function __set($name, $value) {

    switch($name){

        case "name":
          $this->name = $value;
          break;
    }

  }

  #3
  function run () {
    echo $this->name . "runs </br>";
  }

  final function what_is_good() {
    echo "Running is good <br>";
  }
}

#5
Interface Singable {
  public function sings();
}

Class Panda //implements Singable #11
{

}

Class Dog extends Animal implements Singable {
  #5
  function sings(){
    echo $this->name . "sings Bow bow bow";
  }

  #3
  function run () {
    echo $this->name . "runs like a dog </br>";
  }

  #6
  /*function __construct () {
        echo "I am contructor of Class Dog";
  }*/
}


$animal_one = new Animal();
$animal_two = new Dog();

//$animal_one->name = "Spot";
//$animal_two->name = "Dog";

#3
//animal_one->run();
//$animal_two->run();

//$animal_one->sings();
//$animal_two->sings();


function make_them_sing(Singable $singing_animal) {

  $singing_animal->sings();
}

function animal_sing(Animal $singing_animal) {

  $singing_animal->sings();
}

#5
//animal_sing($animal_one);
//animal_sing($animal_two);
#5
//make_them_sing($animal_one);
//make_them_sing($animal_two);

//#1
$sum = Animal::getSum(2,3);
//echo $sum;

#9
//$animal_two->what_is_good();

#10
$tell_me_type = ($animal_two instanceof Panda) ? "1" : "0";
echo $tell_me_type;
?>
