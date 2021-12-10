<?php

namespace App\Feature;

class Drink extends Menu
{
    private $type;
    private $topping=[];

    public function __construct(string $code, string $name, string $description, float $price, string $image, string $type)
    {
        Parent::__construct($code, $name, $description, $price, $image);
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getTopping()
    {
        return $this->topping;
    }

    public function setTopping(string $topping)
    {
        $this->topping [] = $topping;
    }
}