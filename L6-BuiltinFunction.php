<?php
$x = "Dhaka is the capital of Bangladesh";
echo strlen($x) . "<br>";
echo str_word_count($x) . "<br>";
echo strrev($x) . "<br>";
echo substr($x, 0, 5) . "<br>";
echo substr($x, -10) . "<br>";
echo substr($x, 13, 7) . "<br>";
echo str_replace("Dhaka", "Noyakhali", $x) . "<br>";
echo strtoupper("bhammonbaria") . "<br>";
echo strtolower("BARISAL") . "<br>";
echo ucfirst("bogura") . "<br>";
echo random_int(1000, 9999) . "<br>";
echo str_shuffle($x) . "<br>";
echo uniqid() . "<br>";
echo rand(1000, 9999) . "<br>";

echo max(25, 22, 23, 15, 35, 45) . "<br>";
echo min(25, 22, 23, 15, 35, 45) . "<br>";
echo ceil(2.1) . "<br>";
echo round(2.5) . "<br>";
echo floor(2.9) . "<br>";
echo abs(-5) . "<br>";
