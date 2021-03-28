<?php
echo "String functions in PHP";
echo "</br>";

echo "count length of string: ";echo "</br>";
$string = "Hello World";
echo strlen($string);
echo "</br>";

echo "reverse a string: ";echo "</br>";
echo strrev($string);
echo "</br>";

echo "word count of a string: ";echo "</br>";
echo str_word_count($string);
echo "</br>";

echo "find position of specific character or word in a string: ";echo "</br>";
$string = "Hello World , World Hello";
echo strpos($string, "World");
echo "</br>";

echo "replace a char or word with another word or char in a string: ";echo "</br>";
$string = "Hello World";
echo str_replace("World","sir", $string);
echo "</br>";
echo "</br>";

echo "Array function in PHP";
echo "</br>";

echo "count length of array: ";echo "</br>";
$new = array("Apple", "Ball", "Cat");
echo count($new);
echo "</br>";

echo "check if a variable is array or not: ";echo "</br>";
echo is_array($new);
echo "</br>";

echo "check if a variable is inside array or not: ";echo "</br>";
echo in_array("Ball", $new);
echo "</br>";

echo "Merge two arays together: ";echo "</br>";
$arr1 = array("apple", "ball", "cat");
$arr2 = array("Dog", "Monkey", "Donkey");
$merged = array_merge($arr1, $arr2);
foreach ($merged as $mergedArr) {
    echo $mergedArr;
    echo"</br>";
}
echo "</br>";

echo "Print key value of aray: ";echo "</br>";
$keys = array_keys($merged);
foreach ($keys as $key) {
    echo $key;
    echo"</br>";
}
echo "</br>";

?>