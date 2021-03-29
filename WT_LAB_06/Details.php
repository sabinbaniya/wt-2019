<?php

require_once("./Employee.php");
require_once("./Company.php");

$gces = new Company;

$gces->name = "Gandaki College of Engineering & Science";
$gces->address = "Lamachour, Pokhara";

array_push($gces->employees, new Employee("Nishal","Mustang-Chowk"));
array_push($gces->employees, new Employee("Hari","Pokhara"));
array_push($gces->employees, new Employee("Sita","KTM"));

$emp = array($employees);
var_dump $emp;


echo "<table border='1'>";
        foreach( $gces->employees as $employee)
        {
            echo "<tr>";
                echo "<td>" .$employee->name. "</td>";
                echo "<td>" .$employee->address. "</td>";
            echo "</tr>";
        }
echo "</table>";


?>
