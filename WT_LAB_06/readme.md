PHP Basics

Associative array in PHP:

Classes and Objects
A class is a template for objects, and an object is an instance of class. A class is defined by using the class keyword, followed by the name of the class and a pair of curly braces ({}). All its properties and methods go inside the braces:

<?php 

class Class_name
{
  
}

?>
We can create multiple objects from a class. Each object has all the properties and methods defined in the class, but they will have different property values. Objects of a class is created using the new keyword.

$object_name = new Class_name;
Associative Array
Associative arrays are used to store key value pairs. The associative arrays are very similar to numeric arrays in term of functionality but they are different in terms of their index. Associative array will have their index as string so that you can establish a strong association between key and values.

$age = array("ABC"=>"3", "DEFG"=>"4", "HJIKL"=>"5");
Foreach Loop
The foreach loop works only on arrays and objects, and is used to loop through each key/value pair in an array.

foreach( $array as $key => $element) {
    // PHP Code
}
Array Functions and String Functions
    Array Functions
    The array functions allow you to access and manipulate arrays. Simple and multi-dimensional arrays are supported.

    Function               Usage

    array()               used to create a new array

    array_pop()       deletes the last element of an array

    array_push()     insert new element to the end of an array

    sort()                 sort the elements of the array in ascending alphabetical order

    String Functions
    The string functions allows you to access and manipulate strings.

    Function                 Usage

    echo()             outputs one or more strings

    strcmp()         compares two strings

    strlen()           returns the length of a string

    strtolower()   converts string to lower case

Array Sort
The elements in an array can be sorted in alphabetical or numerical order, descending or ascending.

Function             Usage

sort()                 sort arrays in ascending order

rsort()               sort arrays in descending order

asort()             sort associative arrays in ascending order, according to the value

ksort()             sort associative arrays in ascending order, according to the key
