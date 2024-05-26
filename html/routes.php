<?php
session_start();
include("../phpscripts/bdconnect.php");
if (isset($_SESSION['id'])) {
  $user_id = $_SESSION['id'];
  $userid = $_SESSION['id'];
}
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
  <link rel="stylesheet" href="./../style.css" />
</head>

<body>
  <?php
  include("header.php");
  ?>

  <section class="inner-first-screen">

    <img src="./../img/src/fonGL.jpg" alt="fon" class="main-image">

    <div class="inner-first-screen_wrapper">
      <ul class="inner-first-screen_breadcrumbs">
        <li class="inner-first-screen_breadcrumbs_item">Главная</li>
        <li class="inner-first-screen_breadcrumbs_item">Маршруты</li>
      </ul>
      <h1 class="inner-first-screen_heading">МАРШРУТЫ</h1>
      <p class="inner-first-screen_lead">Добавляй маршрут в избранное, чтобы не потерять
    </div>
  </section>


  <div class="container">

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
                
              </li>
              <li class="types_marshruts-numbers">
                <!-- Сколько часов -->
                <span class="types_marshruts-head-numbers"><?= $route[5] ?></span>часов
                
              </li>
              <form class="form" id="form">
                <input type="hidden" name="route_id" value="<?= $route[0] ?>">
                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                <input type="submit" id='button' class="button" name="submit" value="Добавить в избранное">
              </form>
            </ul>

          </div>


          <div class="col-1">
            <ul class="types_marshruts-slides">
              <?php
              $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = " . $route[0]);
              $points = mysqli_fetch_all($searchpoints);
              foreach ($points as $point) {
                $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =" . $point[3]);
                $qery = mysqli_fetch_assoc($qery);
                echo '<li class="types_marshruts-slide">
    <img class="types-icon" src="' . $qery['pathtoicon'] . '" alt="">' . $qery['name'] . '</li>';
              }
              ?>

            </ul>
          </div>


          <div class="col-4">

            <div class="swiper typesSwiper">
              <div class="swiper-wrapper">
                <?php $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = " . $route[0]);
                $points = mysqli_fetch_all($searchpoints);
                foreach ($points as $point) {
                  $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =" . $point[3]);
                  $qery = mysqli_fetch_assoc($qery);
                  echo '<div class="swiper-slide">
    <img src="' . $qery['pathtophoto'] . '" alt="фото" class="types_marshruts-image">
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





    </div>
    </div>




  <?php
  include("footer.php");
  ?>


  <script src="./../js/main.js"></script>
  <script src="./../js/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- Initialize Swiper -->
  <script>
    $(document).ready(function() {
      $(".form").submit(function(e) { // Устанавливаем событие отправки для формы с класс=form
        e.preventDefault();
        var form_data = $(this).serialize();
        var $text = $(this).closest(".col-6").find(".types_marshruts-heading").text();
        $.ajax({

          type: "POST", // Метод отправки
          url: "../phpscripts/addToFavorites.php", // Путь до php файла отправителя
          data: form_data,
          success: function() {
            // Код в этом блоке выполняется при успешной отправке сообщения
            alert("Маршрут '" + $text + " '  Успешно добавлен в избранное");
          },

          error: function(response) {
            // Код в этом блоке выполняется при ошибке отправки сообщения
            alert("Произошла ошибка. Маршрут '" + $text + "' не был добавлен в избранное");
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