<?php

class argentina
{
    protected function __construct()
    {
        return;
    }

    public static string $final = "Argentina final khelbe";
    public const final = "Argebtina cup jitbe";

    public static function jajabor(int $num1 = 2, int $num2 = 1): int
    {
        return $num1 + $num2;
    }
}

echo argentina::$final . " " . argentina::final . "<br><hr>" . argentina::jajabor();
