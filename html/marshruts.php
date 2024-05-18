<?php 
session_start();
include("../phpscripts/bdconnect.php");
if($_SESSION['id']){
    $user_id=$_SESSION['id'];
}
$userid = $_SESSION['id'];
    $routes = mysqli_query($bdconnect, "SELECT * FROM `routes`");
    $routes = mysqli_fetch_all($routes);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Маршруты</title>
    <link rel="shortcut icon" href="./../img/src/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./../swiper-bundle.min.css">
    <link rel="stylesheet" href="./../style.css"/>
  </head>
  <body>
  <?php
  include("header.php");
  ?>


    <section class="inner-first-screen">

        <img src="./../img/src/fonGL.jpg" alt="fon"class="main-image" >

        <div class="inner-first-screen_wrapper">
            <ul class="inner-first-screen_breadcrumbs">
                <li class="inner-first-screen_breadcrumbs_item">Главная</li>
                <li class="inner-first-screen_breadcrumbs_item">Маршруты</li>
            </ul>
            <h1 class="inner-first-screen_heading">МАРШРУТЫ</h1>
            <p class="inner-first-screen_lead">Выбирай любую категорию маршрутов, сохраняй себе, чтобы не забыть пройти именно его и наслаждайся видами и историей мимо проходящих мест! </div>
    </section> 


    <section class="types_marshruts">

        <div class="types_marshruts-item">
        <?php 
    foreach ($routes as $route) {
       

?>
            <div class="row"> 

                <div class="col-6">
                    <a href="/html/route.php?id=<?= $route[0] ?>" class="types_marshruts-head">
                    <!-- Название маршрута -->
                        <h2 class="types_marshruts-heading"><?= $route[1] ?></h2>
                    </a>
                    <!-- Описание маршрута -->
                    <p class="types_marshruts-lead"> <?= $route[3] ?></p>
                    <ul class="types_marshruts-list">
                        <li class="types_marshruts-numbers"> 
                            <!-- Сколько км -->
                            <span class="types_marshruts-head-numbers"><?= $route[4] ?></span>километров
                            длиной
                        </li>
                        <li class="types_marshruts-numbers"> 
                            <!-- Сколько часов -->
                            <span class="types_marshruts-head-numbers"><?= $route[5] ?></span>часов
                            длительность
                        </li>
                    <form  class="form" id="form"> 
                    <input type="hidden" name="route_id" value= "<?=$route[0]?>" >
                    <input type="hidden" name="user_id" value= "<?=$user_id?>" >
                    <input type="submit" id='button' class="button"  name="submit" value="Добавить в избранное">
                    </form>
                    </ul>
                    
                </div>


                <div class="col-1">
                    <ul class="types_marshruts-slides">
                        <?php 
                        $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = ".$route[0]);
                        $points = mysqli_fetch_all($searchpoints);
 foreach ($points as $point) {
    $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =". $point[3]);
    $qery = mysqli_fetch_assoc($qery); 
    echo '<li class="types_marshruts-slide">
    <img class="types-icon" src="'.$qery['pathtoicon'].'" alt="">'.$qery['name'].'</li>';
}
                        ?>
                        
                    </ul>
                </div>


            <div class="col-4">

                <div class="swiper typesSwiper">
                    <div class="swiper-wrapper">
                    <?php $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = ".$route[0]);
                        $points = mysqli_fetch_all($searchpoints);
 foreach ($points as $point) {
    $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =". $point[3]);
    $qery = mysqli_fetch_assoc($qery); 
    echo '<div class="swiper-slide">
    <img src="'.$qery['pathtophoto'].'" alt="фото" class="types_marshruts-image">
</div>';
 }
    ?>
                        
                       
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>   
                </div>
                
            </div>
                
        </div>
        <?php 
    }
?>

        

       

    </section>
    



    <div class="container_footer">
      <footer class="main-footer">
          <div class="logo-footer">
            <img src="./../img/src/logo-footer.svg" alt="logo" class="logo__img" />
          </div>
        <ul class="main-menu">
          <li class="main-menu__item">
            <a href="./categories.html" class="main-menu__link">КАТЕГОРИИ</a>
          </li>
          <li class="main-menu__item">
            <a href="./marshruts.html" class="main-menu__link">МАРШРУТЫ</a>
          </li>
          <li class="main-menu__item">
            <a href="./../index2.html" class="main-menu__link">ГЛАВНАЯ</a>
          </li>
          <li class="main-menu__item">
            <a href="./myMarshruts.html" class="main-menu__link">МОИ МАРШРУТЫ</a>
          </li>
          <li class="main-menu__item">
            <a href="#" class="main-menu__link">ПРОФИЛЬ</a>
          </li>
        </ul>
    </footer>
  </div>


    <div class="main-footer_last-line">
          <p class="main-footer_pharagraph">
            (С) Машруты по Санкт-Петербургу 2024. Все права защищены
          </p>
          <div class="soc-links-footer">
              <ul class="soc-links">
              <li class="soc-links__item">
                <a href="#" class="soc-links__link">
                  <svg viewBox="0 0 20 20" width="20" height="20"  fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="20" height="20" fill="url(#pattern0_46_406)"/>
                    <defs>
                    <pattern id="pattern0_46_406" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_46_406" transform="scale(0.0078125)"/>
                    </pattern>
                    <image id="image0_46_406" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                </a>
              </li>
              <li class="soc-links__item">
                <a href="#" class="soc-links__link">
                  <svg viewBox="0 0 20 20" 
                    width="20" height="20"  
                    fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="20" height="20" fill="url(#pattern0_46_405)"/>
                    <defs>
                    <pattern id="pattern0_46_405" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_46_405" transform="scale(0.0078125)"/>
                    </pattern>
                    <image id="image0_46_405" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                    
                </a>
              </li>
              <li class="soc-links__item">
                <a href="#" class="soc-links__link">
                  <svg viewBox="0 0 20 20" width="20" height="20"  fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="20" height="20" fill="url(#pattern0_46_404)"/>
                    <defs>
                    <pattern id="pattern0_46_404" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_46_404" transform="scale(0.0078125)"/>
                    </pattern>
                    <image id="image0_46_404" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                    </defs>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
          
    </div>


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
  


    <script src="./../js/main.js"></script>
    <script src="./../js/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
     <!-- Initialize Swiper -->
  <script>
     $(document).ready(function () {
        $(".form").submit(function (e) { // Устанавливаем событие отправки для формы с класс=form
           e.preventDefault();
            var form_data = $(this).serialize();
            var $text= $(this).closest(".col-6").find(".types_marshruts-heading").text();
            $.ajax({
              
                type: "POST", // Метод отправки
                url: "../phpscripts/addToFavorites.php", // Путь до php файла отправителя
                data: form_data,
                success: function () {
                    // Код в этом блоке выполняется при успешной отправке сообщения
                    alert("Маршрут '"+$text+" '  Успешно добавлен в избранное");
                },

                error: function () {
        // Код в этом блоке выполняется при ошибке отправки сообщения
        alert("Произошла ошибка. Маршрут '"+$text+"' не был добавлен в избранное");
    }
            });
            
        });
    });    
    var swiper = new Swiper(".typesSwiper", {
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

  </body>
</html>