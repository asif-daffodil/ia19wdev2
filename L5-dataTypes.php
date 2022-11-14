<?php
// string
$x = "My name is Asif";
var_dump($x);
echo "<br>";

//integer
$x = 123;
var_dump($x);
echo "<br>";

//float
$x = 123.45;
var_dump($x);
echo "<br>";

//boolean
$x = true;
var_dump($x);
echo "<br>";

//null
$x = null;
var_dump($x);
echo "<br>";

//array
$x = ["Kamal", "Jamal", "Tomal"];
var_dump($x);
echo "<br>";

//object
class myClass
{
    public $myName = "Asif";
}
$x = new myClass;

var_dump($x);
echo "<br>";

//resource
