<?php

namespace App;

class CheckAge
{
    public $age;

    function provideBirthYear(int $year): void
    {
        $this->age = 2021 - $year;
    }
    function getAge(): int
    {
        return $this->age;
    }
}
