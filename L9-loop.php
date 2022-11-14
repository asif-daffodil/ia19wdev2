<?php
// start point
// increment
// end point

$x = 0;
while ($x < 10) {
    echo $x;
    $x++;
}

echo "<br>";

for ($i = 0; $i < 10; $i++) {
    echo $i;
}

echo "<br>";

$k = 2;
for ($j = 1; $j <= 10; $j++) {
    echo "$k x $j = " . $k * $j . "<br>";
}


for ($l = 1; $l <= 100; $l++) {
    if ($l % 7 == 0) {
        echo $l . ", ";
    }
}

echo "<br>";

$a = 15;
do {
    echo $a;
    ++$a;
} while ($a < 10);
