<?php

require_once __DIR__ . '/Feature/Menu.php';
require_once __DIR__ . '/Feature/Food.php';
// use Feature\Menu;
use Feature\Food;

$food = new Food('Hamburger', 27000, 3);

var_dump($food->getPrice());