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
      <div class="swiper mySwiper">
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
                      <button class="first-screen_button"><a href="#about">Подробнее</a></button>
                    </div>
                </section>
          </div>

          <div class="swiper-slide">
            <section class="first-screen">
              <img class="first-screen_image" src="./img/src/fon2.jpg" alt="fon">
                  <div class="first-screen_inner-wrapper">
                    <h1 class="first-screen_heading">МАРШРУТЫ ПО САНКТ-ПЕТЕРБУРГУ</h1>
                    <ul class="first-screen_list">
                      <li class="first-screen_item">ИНТЕРЕСНЫЕ И ЗАВОРАЖИВАЮЩИЕ МЕСТА</li>
                      <li class="first-screen_item">
                        ПОДРОБНОЕ И ПОНЯТНОЕ ОПИСАНИЕ МАРШРУТОВ
                      </li>
                      <li class="first-screen_item">
                        ВОЗМОЖНОСТЬ СОЗДАВАТЬ ИНДИВИДУАЛЬНЫЕ МАРШРУТЫ
                      </li>
                    </ul>
                    <button class="first-screen_button">Подробнее</button>
                  </div>
              </section>
          </div>

          <div class="swiper-slide">
            <section class="first-screen">
              <img class="first-screen_image" src="./img/src/fon3.jpg" alt="fon">
                  <div class="first-screen_inner-wrapper">
                    <h1 class="first-screen_heading">МАРШРУТЫ ПО САНКТ-ПЕТЕРБУРГУ</h1>
                    <ul class="first-screen_list">
                      <li class="first-screen_item">ИНТЕРЕСНЫЕ И ЗАВОРАЖИВАЮЩИЕ МЕСТА</li>
                      <li class="first-screen_item">
                        ПОДРОБНОЕ И ПОНЯТНОЕ ОПИСАНИЕ МАРШРУТОВ
                      </li>
                      <li class="first-screen_item">
                        ВОЗМОЖНОСТЬ СОЗДАВАТЬ ИНДИВИДУАЛЬНЫЕ МАРШРУТЫ
                      </li>
                    </ul>
                    <button class="first-screen_button">Подробнее</button>
                  </div>
              </section>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    
        <section class="about" id="about">
            <div class="about-zag">
                <h1 class="about_heading">МАРШРУТЫ</h1>
            </div>
            <div class="about-pharagraph">
                <p class="about_lead">
                    <h2>Познайте красоту Санкт-Петербурга через интерактивную карту, 
                      которая поможет вам легко найти достопримечательности и создать свой собственный маршрут.</h2>
                </p>
                <p class="pharagraph">
                Уникальные достопримечательности:
   Изучайте историю и культуру города благодаря описаниям уникальных достопримечательностей Санкт-Петербурга.
                </p>
                <p class="pharagraph">
                Собственный маршрут:
   Путешествуйте по городу ,
    выбирая из списка достопримечательности и создавая уникальный опыт.
                </p>

                <p class="pharagraph">
                Откройте новые места:
   Позвольте себе открыть для себя скрытые жемчужины города,
    следуя по рекомендованным маршрутам или создавая свои собственные.
                </p>
            </div>   
    </section>
    <div class="container-category">
    <section class="category">
      <h2 class="category_heading">Категории маршрутов по районам</h2>
      <ul class="category_list">
        <li class="category_item">
          <div class="category_img-wrapper">
          <img
            src="./img/src/categories/category 0.jpg"
            alt="category"
            class="category_img"
          />
        </div>
        <a href="" class="category_sub-heading">
          <h3>По центральным улицам</h3>
        </a>
          
          <ul class="category_sub-list">
            <li class="category_sub-item">Интересные и завораживающие места</li>
            <li class="category_sub-item">Уютная атмосфера</li>
            <li class="category_sub-item">Невероятные впечатления</li>
          </ul>
        </li>

        <li class="category_item">
          <div class="category_img-wrapper">
          <img
            src="./img/src/categories/category 08.jpg"
            alt="category"
            class="category_img"
          /></div>
          <a href="#" class="category_sub-heading">
            <h3>По Васильевскому острову</h3>
          </a>      
          <ul class="category_sub-list">
            <li class="category_sub-item">Интересные и завораживающие места</li>
            <li class="category_sub-item">Уютная атмосфера</li>
            <li class="category_sub-item">Невероятные впечатления</li>
          </ul>
        </li>
        <li class="category_item">
          <div class="category_img-wrapper">
          <img
            src="./img/src/categories/category 07.jpg"
            alt="category"
            class="category_img"
          /></div>
          <a href="#" class="category_sub-heading">
            <h3>По Петроградской стороне</h3>
          </a>
          
          <ul class="category_sub-list">
            <li class="category_sub-item">Интересные и завораживающие места</li>
            <li class="category_sub-item">Уютная атмосфера</li>
            <li class="category_sub-item">Невероятные впечатления</li>
          </ul>
        </li>
      </ul>
    </section>
    
    </div>
    <div class="videos-wrapper">
      <div class="container-videos">
        <section class="videos">
          <h2 class="videos_haeding">Видео</h2>
              <div class="videos_item">
                    <img
                      src="./img/src/videos/video 02.jpg"
                      alt="video1"
                      class="videos_preview"
                      />
                <button class="videos_play">
                <img
                 src="./img/src/videos/play.svg"
                  alt="play"
                  class="videos_play-icon"
                />
              </button>
              <h3 class="videos_video-heading">Видео или картинка1</h3>
            </div>
              <div class="videos_item">
                <img
                  src="./img/src/videos/video 01.jpg"
                  alt="video2"
                  class="videos_preview"
                /> 
              
                <button class="videos_play">
                <img
                    src="./img/src/videos/play.svg"
                    alt="play"
                    class="videos_play-icon"
                />
                </button>
                <h3 class="videos_video-heading">Видео или картинка2</h3>
           </div> 
            
        </section>
      </div> 
    </div>
    
  <?php
  include("html/footer.php");
  ?>


  <div class="modal-form_wrapper jsVisually-hidden">
    <section class="modal-form">
      <button aria-label="Закрыть" class="jsModalClose modal-form_close">Закрыть</button>
      <p class="modal-form_heading">Создавайте свои собственные маршруты, добавляйте любимые места и делитесь ими с другими!</p>
      <form action="send.php" class="form-modal-form">

        <div class="form-inner_wrapper">
          <label for="name" class="form_label">
            Название маршрута*
            <input name="name" id="name" type="text" class="form_input">
          </label>
          <label for="width" class="form_label">
            Протяжённость маршрута*
            <input name="width" id="width" type="text" class="form_input">
        </label>
        </div>
        <label for="text" class="form_label">
          Описание*
          <textarea name="opisanie" id="text" cols="30" rows="5" class="form_textarea"></textarea>
        </label>

        <div class="form-button_wrapper">
          <button class="button">Создать маршрут</button>
        </div>
        
      </form>
    </section>
</div>
  


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
