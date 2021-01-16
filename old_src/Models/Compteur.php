<?php

namespace App\Models;

class Compteur
{
    public function additionner(int $a, int $b): int
    {
        return $a + $b;
    }
}