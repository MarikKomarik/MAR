<?php
   session_start();
include("phpscripts/bdconnect.php");
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Маршруты по Санкт-Петербургу</title>
    <link rel="shortcut icon" href="./img/src/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./swiper-bundle.min.css">
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
  <?php
  include("html/header.php");
  ?>
    <aside class="left-bar">
      <div class="logo">
        <img src="./img/src/logo1.svg" alt="logo" class="logo__img" />
      </div>
      <button class="jsLeftBarButton button">Создать маршрут</button>
    </aside>
    
      <!-- Swiper -->
      <div class="swiper mySwiper indexSwiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
              <section class="first-screen">
                <img class="first-screen_image" src="./img/src/fon.jpg" alt="fon">
                    <div class="first-screen_inner-wrapper">
                      <h1 class="first-screen_heading">МАРШРУТЫ ПО САНКТ-ПЕТЕРБУРГУ</h1>
                      <ul class="first-screen_list">
                      <li class="first-screen_item">
                          ПОДРОБНОЕ ОПИСАНИЕ МАРШРУТОВ C ИНТЕРАКТИВНОЙ КАРТОЙ
                        </li>
              
                        <li class="first-screen_item">ИНТЕРЕСНЫЕ И ЗАВОРАЖИВАЮЩИЕ МЕСТА</li>
                        
                        <li class="first-screen_item">
                          ВОЗМОЖНОСТЬ СОЗДАВАТЬ ИНДИВИДУАЛЬНЫЕ МАРШРУТЫ
                        </li>
                  
                      </ul>
                      <button class="first-screen_button"><a href="/html/routes.php">Маршруты</a></button>
                    </div>
                </section>
          </div>

          <div class="swiper-slide">
            <section class="first-screen">
              <img class="first-screen_image" src="./img/src/fon2.jpg" alt="fon">
                  <div class="first-screen_inner-wrapper">
                    <h1 class="first-screen_heading">Категории</h1>
                    <ul class="first-screen_list">
                      <li class="first-screen_item">ВЫБЕРИ КАТЕОГОРИЮ</li>
                      <li class="first-screen_item">
                        ВЫБЕРИ МАРШРУТ
                      </li>
                      <li class="first-screen_item">
                        ОТКРЫВАЙ ИНТЕРАКТИВНУЮ КАРТУ
                      </li>
                      <li class="first-screen_item">
                        ЧИТАЙ ОПИСАНИЕ ДОСТОПРИМЕЧАТЕЛЬНСТЕЙ
                      </li>
                    </ul>
                    <button class="first-screen_button"><a href="/html/categories.php">Категории</a></button>
                  </div>
              </section>
          </div>

          <div class="swiper-slide">
            <section class="first-screen">
              <img class="first-screen_image" src="./img/src/fon3.jpg" alt="fon">
                  <div class="first-screen_inner-wrapper">
                    <h1 class="first-screen_heading">СОЗДАВАТЬ СОБСВЕННЫЙ МАРШРУТ</h1>
                    <ul class="first-screen_list">
                      <li class="first-screen_item">ВЫБЕРИ ТОЧКИ НА ИНТЕРАКТИВНОЙ КАРТЕ</li>
                      <li class="first-screen_item">
                        СОЗДАЙ МАРШРУТ
                      </li>
                      <li class="first-screen_item">
                        ПОЛЬЗУЙСЯ ИМ В РАЗДЕЛЕ "МОИ МАРШРУТЫ"
                      </li>
                    </ul>
                    <button class="first-screen_button"><a href="/html/createroute.php">СОЗДАТЬ МАРШРУТ</a></button>
                  </div>
              </section>
          </div>
          <div class="swiper-slide">
            <section class="first-screen">
              <img class="first-screen_image" src="./img/src/fon5.jpeg" alt="fon">
                  <div class="first-screen_inner-wrapper">
                    <h1 class="first-screen_heading">ВЫБЕРИ ЖИЗНЬ</h1>
                    <ul class="first-screen_list">
                      <li class="first-screen_item">Выбирай работу. Выбирай карьеру. Выбирай семью. Выбирай большие телевизоры, стиральные машины, автомобили, компакт-диск плэйеры, электрические консевные ножи. Выбирай хорошее здоровье, низкий уровень холестерина и стоматологическую страховку. Выбирай недвижимость и аккуратно выплачивай взносы. Выбери свой первый дом. Выбирай своих друзей. Выбери себе курорт и шикарные чемоданы. Выбери костюм-тройку лучшей фирмы и самого дорогого материала. Выбери набор "Сделай сам", чтобы было чем заняться воскресным утром. Выбери удобный диван, чтобы развалиться на нем и смотреть отупляющее шоу. Набивай свое брюхо всякой всячиной. Выбери загнивание в конце всего и вспомни со стыдом напоследок своих дружков-подонков, которых ты заложил чтобы выкарабкаться. Выбирай будущее. Выбирай жизнь.</li>
                    </ul>
                  </div>
              </section>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
  <?php
  include("html/footer.php");
  // if (isset($_SESSION["id"])) {
  //   echo'<script > window.onload= function(){mainMenu.classList.toggle("jsMenuVisually")};</script>';
  // }
  ?>


  
  


    <script src="./js/main.js"></script>
    <script src="./js/swiper-bundle.min.js"></script>
     <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
      },
    });
  
  </script>
  </body>
</html>
