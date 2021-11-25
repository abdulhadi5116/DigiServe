<?php

namespace Feature;

class Snack extends Menu
{
    private $type;

    public function __construct(string $name, float $price, string $image, string $type)
    {
        Parent::__construct($name, $price, $image);
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