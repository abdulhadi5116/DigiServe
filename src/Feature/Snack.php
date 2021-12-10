<?php

namespace App\Feature;

class Snack extends Menu
{
    private $type;

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
}