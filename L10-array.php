<?php
// $arrName = array("Kamal", "Jamal", "Tomal");

//indexed array
$arrName = ["Kamal", "Jamal", "Tomal", "Akmal"];
echo count($arrName);

echo "<pre>";
print_r($arrName);
echo "</pre>";

echo $arrName[1] . "<br>";

for ($i = 0; $i < count($arrName); $i++) {
    echo $arrName[$i] . " ";
}
echo "<br>";

$arr = ["Dhaka", "Rajshahi", "Khulna", "Rongpur", "Dinajpur", "Bogura"];

foreach ($arr as $ar) {
    echo $ar . "<br>";
}

// associative array
$personData = ["name" => "Abul Mia", "father" => "Babul Mia", "city" => "Kabul", "age" => 30];
$personData["country"] = "Bangladesh";
echo $personData["name"];
echo "<pre>";
print_r($personData);
echo "</pre>";

foreach ($personData as $name => $data) {
    echo ucfirst($name) . " : " . $data . "<br>";
}

// multidimontional array

$students = [
    ["Masud", "Dhaka", 32],
    ["Kabir", "Khulna", 25],
    ["Salma", "Kuakata", 45],
    ["Abbas", "Kustia", 15]
];

echo $students[3][2];
echo "<pre>";
print_r($students);
echo "</pre>";


foreach ($students as $student) {
    foreach ($student as $std) {
        echo $std . " ";
    }
    echo "<br>";
}
