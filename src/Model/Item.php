<?php

namespace App\Model;

require_once __DIR__ . '/../Feature/Drink.php';
require_once __DIR__ . '/../Feature/Food.php';
require_once __DIR__ . '/../Feature/Snack.php';

use App\Feature\Drink;
use App\Feature\Food;
use App\Feature\Snack;

$menus = [
        new Food('Nasi Goreng', 15000, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 5),
        new Drink('Kopi', 7000, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 'panas'),
        new Snack('Risoles', 1000, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 'gorengan'),
];






