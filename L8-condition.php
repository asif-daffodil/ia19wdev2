<?php
$age = -50;

if ($age <= 12 && $age > 0) {
    echo "You are a baby";
} elseif ($age < 20 && $age > 12) {
    echo "You are a teenager";
} elseif ($age < 30 && $age >= 20) {
    echo "you are a young person";
} elseif ($age < 50 && $age >= 30) {
    echo "you are a middle-aged person";
} elseif ($age >= 50 && $age < 200) {
    echo "you are an old person";
} else {
    echo "You are not in this world!";
}

/* 
if ($age <= 12 && $age > 0) {
    echo "ha ha";
} else {
    echo "ho ho";
}

echo ($age <= 12 && $age > 0) ? "ha ha" : "ho ho"; 


if (isset($bd)) {
    echo $bd;
} else {
    echo null;
}

echo $bd ?? null;
*/
