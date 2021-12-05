<?php

require_once __DIR__ . '/src/Feature/Menu.php';
require_once __DIR__ . '/src/Feature/Drink.php';
require_once __DIR__ . '/src/Feature/Food.php';
require_once __DIR__ . '/src/Model/Item.php';
use App\Feature\Menu;
use App\Feature\Drink;
use App\Feature\food;

?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="generator" content="Hugo 0.88.1">
      <title>Robo Serve</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&display=swap" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet"> 
      <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
      <link href="Resource/Css/Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="Resource/Css/FontAwesome/css/all.css" rel="stylesheet">

      <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .search::placeholder {
        color: white !important;
        opacity: 1;
      }

      .has-search .form-control {
        padding-left: 2.375rem;
      }

      .has-search .form-control-feedback {
          position: absolute;
          z-index: 2;
          display: block;
          width: 2.375rem;
          height: 2.375rem;
          line-height: 2.375rem;
          text-align: center;
          pointer-events: none;
          color: #aaa;
      }
      .logo {
        font-family: 'Luxurious Script', sans-serif;
        font-size: 48px;
        color: #293233;
        display: inline-block;
        padding: 20px 16px;
        margin: 20px 0;
        border-right: 5px solid #42c7c1;
        border-left: 5px solid #42c7c1;
      }
      .menu-wrapper {
        margin-bottom: 60px;
        text-align: center;
      }

      .menu-item-name {
        line-height: 1.7;
        font-size: 25px;
        margin-top: 15px;
        color: #4ac0b9;
      }

      .menu-item-type {
        font-size: 14px;
      }

      .price {
        margin: 15px 0;
        font-size: 18px;
        color: #322f33;
      }

      .menu-items {
        margin-bottom: 60px;
      }

      .menu-item {
        display: inline-block;
        width: 40%;
        padding: 20px;
        margin-top: 40px;
      }

      .menu-item-image {
        border-radius: 5px;
      }

      .icon-spiciness {
        width: 20px;
      }

      .menu-item span {
        font-size: 16px;
      }
    </style>

    </head>
    <body>
      <header>
        <div class="collapse bg-dark" id="navbarHeader">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-md-7 py-4">
                <h4 class="text-white">About</h4>
                <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
              </div>
              <div class="col-sm-4 offset-md-1 py-4">
                <h4 class="text-white">Contact</h4>
                <ul class="list-unstyled">
                  <li><a href="#" class="text-white">Follow on Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container">
              <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Cari Menu...">
              </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div> 
      </header>

      <main>
        <div class="row">
          <div class="row">
            <div class="container text-center">
              <h1 class="logo">Melancholia Cafe</h1>
            </div>
          </div>
          <div class="row">
            <div class="menu-wrapper container">
            <h3>Jumlah Menu terpilih: <?php echo Menu::getCount() ?></h3>
              <form method="post" action="confirm.php">
                <div class="menu-items">
                  <?php foreach ($menus as $menu): ?>
                    <div class="menu-item">
                      <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
                      <h3 class="menu-item-name">
                        <a href="show.php ">
                          <?php echo $menu->getName() ?>
                        </a>
                      </h3>
                      <?php if ($menu instanceof Drink): ?>
                        <p class="menu-item-type"><?php echo $menu->getType() ?></p>
                      <?php else: ?>
                        <?php for ($i=0; $i<$menu->getSpiciness(); $i++): ?>
                          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
                        <?php endfor ?>
                      <?php endif ?>
                      <p class="price">$<?php echo $menu->getPrice() ?> (termasuk pajak)</p>
                      <span>Qty: </span>
                      <input type="text" value="0" name="<?php echo $menu->getName() ?>">
                    </div>
                  <?php endforeach ?>
                </div>
                <input type="submit" value="Pesan">
              </form>
            </div>
          </div>
        </div>
      </main>

    </body>
    <footer>
      <script src="Resource/Css/Bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </footer>
  </html>