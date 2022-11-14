<?php
function myStudent($name = "Ananta Jalil", $age = 48)
{
    return "Name : $name, Age : $age<br>";
}

echo myStudent("Solaiman", 20);
echo myStudent("Ashique", 20);
echo myStudent();
echo myStudent(age: 30, name: "Mahfuzur Rahman");

echo "<br>";

function mySum($num1, $num2)
{
    return $num1 + $num2;
}

echo mySum(2, 5);
