<?php

require_once __DIR__ . '/src/Feature/Menu.php';
// require_once __DIR__ . '/src/Feature/Drink.php';
// require_once __DIR__ . '/src/Feature/Food.php';
require_once __DIR__ . '/src/Model/Item.php';
require_once __DIR__ . '/src/helpers.php';
require_once __DIR__ . '/src/connection.php';

use App\Feature\Menu;

?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
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

      .logo-container {
        margin: 40px 0 0 0;
      }

      .menu-item-title {
        font-family: 'Luxurious Script', sans-serif;
        font-size: 48px;
        color: #293233;
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

      .menu-item-image {
        border-radius: 5px;
      }

      .icon-spiciness {
        width: 20px;
      }
      .form-control-inline {
        min-width: 0;
        width: 25%;
        display: inline;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    .gate {
      width: 50%;
      display: inline-block;
      position: absolute;
      padding: 10px 0 10px 15px;
      font-family: "Monsterrat", sans;
      font-weight: 700;
      color: #ffffff;
      background: #7AB893;
      border: 0;
      border-radius: 3px;
      outline: 0;
      text-indent: 5%;
      left: 30%;
      transition: all .3s ease-in-out;
    }
    .gate::-webkit-input-placeholder {
      color: #efefef;
      text-indent: 0;
      font-weight: 300;
    }
    .gate + label {
      display: inline-block;
      position: absolute;
      top: 0;
      left: 30%;
      padding: 10px 15px;
      text-shadow: 0 1px 0 rgba(19, 74, 70, 0.4);
      background: #377D6A;
      transition: all .4s ease-in-out;
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
      transform-origin: left bottom;
      transform: rotate(-66deg);
      z-index: 99;
    }
    .gate + label:before, .gate + label:after {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      border-radius: 3px;
      background: #377D6A;
      transform-origin: left bottom;
      transition: all .4s ease-in-out;
      pointer-events: none;
      z-index: -1;
    }
    .gate:focus::-webkit-input-placeholder,
    .gate:active::-webkit-input-placeholder {
      color: #aaa;
    }

    .item-price {
      padding-left: 10%;
      padding-right: 5%;
    }

    .sticky-header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
    }
    </style>

    </head>
    <body>
      <header class="sticky-header">
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
                <input type="text" id="menu-search" class="form-control" onkeyup="searchMenu()" placeholder="Find Menu...">
              </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
      </header>

      <main>
        <div class="row">
          <div class="row logo-container">
            <div class="container text-center p-0">
              <h1 class="logo">Melancholia Cafe</h1>
            </div>
          </div>
        </div>

        <section class="p-0 text-center container">
          <div class="row p-0">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h5 class="text-center">Total Pesanan: <?php echo Menu::getCount() ?> Menu</h5>
              <p>
                <a href="#" id="menu" class="menu btn btn-dark my-3">All Menu</a>
                <a href="#" id="menu-food" class="menu-food btn btn-primary my-3">Food</a>
                <a href="#" id="menu-drink" class="menu-drink btn btn-primary my-3">Drink</a>
                <a href="#" id="menu-dessert" class="menu-dessert btn btn-primary my-3">Snack & Dessert</a>
              </p>
            </div>
          </div>
        </section>

        <form method="POST" action="confirm.php">
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="menu-items-container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 menu-items" id="menu-items">
                <?php
                $count = 0;
                foreach ($menus as $menu):
                  $count += 1; ?>
                  <div class="col menu-item-container">
                    <div class="card shadow-sm menu-item">
                      <img src="<?php echo $menu->getImage() ?>">
                      <div class="card-body">
                        <div class="text-center">
                          <a class="menu-item-title" href="show.php?name=<?php echo $menu->getCode() ?>">
                            <span class="text-center menu-name"><?php echo $menu->getName() ?></span>
                          </a>
                        </div>
                        <p class="card-text"><?php echo $menu->getDescription() ?></p>
                        <div class="row d-flex text-center">
                            <div class="row card border-light" style="margin-top: 20px;">
                              <span>
                                  <input id="class" class="gate item-price" type="text" value="<?php echo formatIdr($menu->getPrice()); ?>" disabled/>
                                  <label for="class">Price</label>
                              </span>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 50px;">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="col">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="itemNote(<?php echo $count?>)">Catatan</button>
                              </div>
                            </div>
                            <div class="col parent">
                              <div class="container d-flex justify-content-end no-gutters p-1">
                                <span class="input-group-btn">
                                    <button style="color:#dc3545" type="button" class="p-1 btn btn-primary-outline btn-number" data-type="minus" data-field="quant[<?php echo $count ?>]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input style="width: 50px;" name="quant[<?php echo $count ?>]" class="text-center rounded-5 input-number form-control" type="text" placeholder=- value="-" min="0" max="100"/>
                                <span class="input-group-btn">
                                    <button style="color:#28a745;" type="button" class="p-1 no-padding btn btn-primary-outline btn-number" data-type="plus" data-field="quant[<?php echo $count ?>]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="item-note-container" id="item-note-container">
                            <textarea style="display: none;" name="note[<?php echo $count?>]" id="note[<?php echo $count?>]" type="textarea" class="form-control" placeholder="catatan pesanan..."></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <input type="submit" value="Pesan">
          </div>
        </div>
        </form>
      </main>

    </body>
    <footer>

    </footer>
  </html>

  <script src="Resource/Css/Bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script type="text/javascript">
    $('.btn-number').click(function(e){
      e.preventDefault();
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
          if(type == 'minus') {
              if(currentVal > input.attr('min')) {
                  input.val(currentVal - 1).change();
              } 
              if(parseInt(input.val()) == input.attr('min')) {
                  $(this).attr('disabled', true);
              }

          } 
          else if(type == 'plus') {
              if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
              }
              if(parseInt(input.val()) == input.attr('max')) {
                  $(this).attr('disabled', true);
              }

          }
      } else {
          input.val(0);
      }
  });
  $('.input-number').focusin(function(){
    $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function() {
      
      minValue =  parseInt($(this).attr('min'));
      maxValue =  parseInt($(this).attr('max'));
      valueCurrent = parseInt($(this).val());
      
      name = $(this).attr('name');
      if(valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
          $(this).val($(this).data('oldValue'));
      }
      if(valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
          $(this).val($(this).data('oldValue'));
      }
  });
  $(".input-number").keydown(function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
              // Allow: Ctrl+A
              (e.keyCode == 65 && e.ctrlKey === true) || 
              // Allow: home, end, left, right
              (e.keyCode >= 35 && e.keyCode <= 39)) {
                  // let it happen, don't do anything
                  return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });
  </script>
  <script>
    function itemNote(item) {
      var x = document.getElementsByName("note[" +item+ "]")[0];
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function searchMenu() {
      var input, filter, item, txtValue;
      input = document.getElementById('menu-search');
      filter = input.value.toUpperCase();
      items = document.getElementById('menu-items');
      menu = items.getElementsByClassName('menu-item-container')

      for (i=0;i<menu.length;i++) {
        item = menu[i].getElementsByClassName('menu-name')[0];
        txtValue = item.textContent || item.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          menu[i].style.display = "";
        } else {
          menu[i].style.display = "none";
        }
      }
    }
  </script>