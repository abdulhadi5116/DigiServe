<?php

namespace Feature;

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

    protected function getName()
    {
        return $this->name;
    }

    protected function getImage()
    {
        return $this->image;
    }

    protected function getPrice()
    {
        return $this->price;
    }

    public function getCount()
    {
        return self::$count;
    }

    protected function getOrderCount()
    {
        return $this->orderCount;
    }

    protected function setOrderCount(int $orderCount)
    {
        $this->orderCount = $orderCount;
    }

    protected function getTotalPrice()
    {
        return $this->price * $this->orderCount;
    }
}