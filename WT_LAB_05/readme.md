This is the theory for Strings, Arrays & DOM manipulation in javascript for the lab session that took place on 2021/03/18.

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

Array methods in JS:

1. toString():: This method converts array to string of comma separated array values in JS.
2. join():: This method joins all the items in array to form a string. We can also add any special characters or anything that we would like to have between our arrays joined, such as '+' or '*' anything that we would like between our items.
3. pop():: This method pops off (removes) the last item in the array.
4. push():: This method adds new element to the array at the end.
5. shift():: This method removes the first item of the array and pushes other items to lower index of array as well as returns the shifted item.
6. unshift():: This method addes new element to the array at the beginning.

DOM ( Document Object Model ) in JS

We can make many changes such as attributes, elements, css styling etc in an html page with the help of DOM manipulation with JS.

Document:

Document object represents a web page. If we want to access any element in an HTML page we always start by writing document, the after that we write syntax.

The getElementById method:
The most common way of accessing a element of HTML is by refrencing through it's id.

we can also get element by tag name and class name etc.
