<?php

namespace App\Feature;

class Food extends Menu
{
    private $spiciness;

    public function __construct(string $name, float $price, string $image, int $spiciness=0)
    {
        Parent::__construct($name, $price, $image);
        $this->spiciness = $spiciness;
    }

    public function getSpiciness()
    {
        return $this->spiceness;
    }

    public function setSpiciness(int $spiciness)
    {
        return $this->spiceness = $spiciness;
    }
}