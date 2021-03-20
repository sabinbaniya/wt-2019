This is the theory for Strings & DOM manipulation in javascript for the lab session that took place on 2021/03/18.

Strings in javascript:
Strings in javascript are just like string in any other programming language such as c or c++.
They refer to the combination of different letters to form word as well as combination of different word to form sentences then called as strings.

Strings are declared in javascript similar to how any other variable are declared in javascript.
such as:: var/let string = "Our new string";

String methods in JS:

1. string.length :: This method of string in JS returns an integer value of length of string.
2. indexof() :: This method returns the integer value of the string that is given in the code to search for.Note:: This method returns the value of the first occurence of the string.
3. lastindexof() ::  This method returns the integer value of the string as per its last occurent that is given in the code to search for.

Arrays in javascript:
In javascript arrays are used to store multiple values in a samevariable name just like in any other languages we have learned.

Declaring Arrays in JS:
var/let arrayName = ["item1","item2","item3"...];
Spaces and line breaks are not important. A declaration can span multiple lines.

OR

var/let arrayName = new Array('item1','item2'...);

Accessing array items in JS:
Items in array can be accessed by writing the array name and its respective index such as: arrayName[2];

Changing items in array in JS:
Items in array can be modified after it is accessed such as: arrayName[2] = newItem;

Array Methods in JS:

arrayName.length:: Just like string.length function we wrote above this function does the same for array, It returns the integer value of length of array.
