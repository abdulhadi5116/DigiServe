<?php

namespace App\Feature;

class Menu
{

    protected $name;
    protected $price;
    protected static $count=0;
    protected $orderCount = 0;

    public function __construct(string $name, float $price, string $image=null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        self::$count++;
    }

    public function getName()
    {
        return $this->name;
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