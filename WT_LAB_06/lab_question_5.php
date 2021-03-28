<?php

//sorting methods of array in PHP
//sort = sorts array in ascending alphabetical/numerical order 

$arr = array("ball","cat","apple","dog","zebra","monkey");
sort($arr);

foreach($arr as $key => $value)
{
    echo " " .$key. " = " .$value;
    echo "</br>";

}
    echo"</br>";
 

//rsort = sorts in descending order

rsort($arr);

foreach($arr as $key => $value)
{
    echo " " .$key. " = " .$value;
    echo "</br>";

}
    echo "</br>";


//ksort = sorts in ascending order according to key value
$arr = array('2' => 'apple', '1' => 'banana', '0' => 'cat' );
ksort($arr);
foreach($arr as $key => $value)
{
    echo " " .$key. " = " .$value;

    echo "</br>";
}
    echo "</br>";

//krsort = sorts in reverse order of items key value
$arr = array('2' => 'apple', '1' => 'banana', '0' => 'cat' );
krsort($arr);
foreach($arr as $key => $value)
{
    echo " " .$key. " = " .$value;

    echo "</br>";
}
    echo "</br>";

//asort = sorts in ascending order of value
$arr = array('1' => 'zapple', '2' => 'danana', '0' => 'cat' );
asort($arr);
foreach($arr as $key => $value)
{
    echo " " .$key. " = " .$value;

    echo "</br>";
}
    echo "</br>";

//arsort = sorts in descending order of value
$arr = array('1' => 'zapple', '2' => 'danana', '0' => 'cat' );
arsort($arr);
foreach($arr as $key => $value)
{
    echo " " .$key. " = " .$value;

    echo "</br>";
}
    echo "</br>";
?>