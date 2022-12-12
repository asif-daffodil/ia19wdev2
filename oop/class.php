<?php
class amaderClass
{
    public $personName = "Messi";
    public $personAge = 35;
    protected $mohsin = "mohsin er ki kosto!";
    private $secret = "Jadu tona kore";

    public function country()
    {
        return "Argentina " . strtoupper($this->secret);
    }

    public function __construct()
    {
        echo "Ami First<br>";
    }
}

$amaderObj = new amaderClass;
// echo $tomaderObj->mohsin;
echo "$amaderObj->personName ($amaderObj->personAge) - " . $amaderObj->country() . "<br><hr>";

// $hackorsi = new amaderClass;

class tomaderClass extends amaderClass
{
    public function player()
    {
        return "$this->mohsin $this->personName ($this->personAge) - " . $this->country();
    }

    public function __destruct()
    {
        echo "<br>Ami Last";
    }
}

$tomaderObj = new tomaderClass;
echo $tomaderObj->player();
