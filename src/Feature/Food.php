<?php

namespace App\Feature;

class Food extends Menu
{
    private $spiciness;

    public function __construct(string $code, string $name, string $description, float $price, string $image, int $spiciness=0)
    {
        Parent::__construct($code, $name, $description, $price, $image);
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