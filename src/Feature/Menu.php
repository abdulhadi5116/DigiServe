<?php

namespace App\Feature;

class Menu
{

    protected $name;
    protected $price;
    protected static $count=0;
    protected $orderCount = 0;

    public function __construct(string $code, string $name, string $description, float $price, string $image=null)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        self::$count++;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getCount()
    {
        return self::$count;
    }

    public function getOrderCount()
    {
        return $this->orderCount;
    }

    public function setOrderCount(int $orderCount)
    {
        $this->orderCount = $orderCount;
    }

    public function getTotalPrice()
    {
        return $this->price * $this->orderCount;
    }
}