<?php

require_once __DIR__ . '/Feature/Drink.php';
require_once __DIR__ . '/Feature/Food.php';
require_once __DIR__ . '/Feature/Snack.php';

use Feature\Food;
use Feature\Drink;
use Feature\Snack;

$menu = [
    'food' => [
        new Food('Nasi Goreng', 10000, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 5),
    ],
    'drink' => [

    ],
    'snack' => [

    ],
];




