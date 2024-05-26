<?php 
session_start();
include("../phpscripts/bdconnect.php");
if($_SESSION['id']){
    $userid = $_SESSION['id'];
    $id_routes = mysqli_query($bdconnect, "SELECT * FROM `favorites` WHERE `user_id` =". $userid);
    $id_routes = mysqli_fetch_all($id_routes);
    $id_routesuser = mysqli_query($bdconnect, "SELECT * FROM `users_routes` WHERE `user_id` =". $userid);
    $id_routesuser = mysqli_fetch_all($id_routesuser);

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Мои маршруты</title>
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
                <li class="inner-first-screen_breadcrumbs_item">Мои маршруты</li>
            </ul>
            <h1 class="inner-first-screen_heading">МОИ МАРШРУТЫ</h1>
            <p class="inner-first-screen_lead">Сохраненные и созданные маршруты маршруты отображаются здесь </div>
    </section> 



    <div class="container">

<div class="types_marshruts-item">
<?php 
if($_SESSION['id']){
  if (empty($id_routesuser) && empty($id_routes)) 
  {
      echo '<p class="fig about_lead" > Добавьте свой первый маршрут <img  class="cats" src="./../img/src/pictures/cat.png" alt="fon"></p>';
      
  }
foreach ($id_routesuser as $id_routeus) {
  $route=mysqli_query($bdconnect, "SELECT * FROM `users_routes` WHERE `id` =". $id_routeus[1]);
  $route = mysqli_fetch_assoc($route);

?>
    <div class="row"> 

        <div class="col-6">
            <a href="/html/route.php?usid=<?=$id_routeus[0]?>" class="types_marshruts-head">
            <!-- Название маршрута -->
                <h2 class="types_marshruts-heading"><?=$id_routeus[2]?></h2>
            </a>
            <!-- Описание маршрута -->
            <p class="types_marshruts-lead"> <?=$id_routeus[3]?></p>
            <ul class="types_marshruts-list">
                <form  class="us_form"  id="form"> 
                    <input type="hidden" name="id" value= "<?=$id_routeus[0]?>" >
                    <input type="submit" id='button' class="button"  name="submit" value="Удалить маршрут">
                    </form>
            </ul>
            
        </div>


        <div class="col-1">
            <ul class="types_marshruts-slides">
                <?php 
                $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `user_route_id` = ".$id_routeus[0]);
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
            <?php $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `user_route_id` = ".$id_routeus[0]);
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
}}
?>



<?php 
if($_SESSION['id']){
 
foreach ($id_routes as $id_route) {
  $route=mysqli_query($bdconnect, "SELECT * FROM `routes` WHERE `id` =". $id_route[1]);
  $route = mysqli_fetch_assoc($route);

?>
    <div class="row"> 

        <div class="col-6">
            <a href="/html/route.php?id=<?= $route['id'] ?>" class="types_marshruts-head">
            <!-- Название маршрута -->
                <h2 class="types_marshruts-heading"><?= $route['name'] ?></h2>
            </a>
            <!-- Описание маршрута -->
            <p class="types_marshruts-lead"> <?= $route['discription'] ?></p>
            <ul class="types_marshruts-list">
                <li class="types_marshruts-numbers"> 
                    <!-- Сколько км -->
                    <span class="types_marshruts-head-numbers"><?= $route['length'] ?></span>км
                </li>
                <li class="types_marshruts-numbers"> 
                    <!-- Сколько часов -->
                    <span class="types_marshruts-head-numbers"><?= $route['hours'] ?></span>часов
                    
                </li>
                <form  class="form" id="form"> 
                    <input type="hidden" name="id" value= "<?=$id_route[0]?>" >
                    <input type="submit" id='button' class="button"  name="submit" value="Удалить из избранного">
                    </form>
            </ul>
            
        </div>


        <div class="col-1">
            <ul class="types_marshruts-slides">
                <?php 
                $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = ".$route['id']);
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
            <?php $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = ".$route['id']);
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
}}else{
  echo '<p class="fig about_lead" > Войдите и добавьте свой первый маршрут <img  class="cats" src="./../img/src/pictures/cat.png" alt="fon"></p>';
  
}
?>




</div >
</div >


    


<?php
  include("footer.php");
  ?>



  
  


    <script src="./../js/main.js"></script>
    <script src="./../js/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
     <!-- Initialize Swiper -->
  <script>
     $(document).ready(function () {
        $(".form").submit(function (e) { // Устанавливаем событие отправки для формы с класс=form
           e.preventDefault();
           var $row = event.target.closest('.row'); // Находим ближайший родительский элемент с классом 'row'
            var form_data = $(this).serialize();
            var $text= $(this).closest(".col-6").find(".types_marshruts-heading").text();
            let $vopros = confirm("Вы дейтсвительно хотите удалить '"+$text+"' из избранного?");
            if ($vopros){
            $.ajax({
              
                type: "POST", // Метод отправки
                url: "../phpscripts/delToFavorites.php", // Путь до php файла отправителя
                data: form_data,
                success: function () {
                    // Код в этом блоке выполняется при успешной отправке сообщения
                    alert("Маршрут '"+$text+" '  Успешно удален из избранного");
    $row.style.display = 'none'; // Скрываем найденный элемент
                },

                error: function () {
        // Код в этом блоке выполняется при ошибке отправки сообщения
        alert("Произошла ошибка. Маршрут '"+$text+"' не был удален из избранного");
      
    }
            });
          }
            
        });
    });  
    
    
    $(document).ready(function () {
        $(".us_form").submit(function (e) { // Устанавливаем событие отправки для формы с класс=form
           e.preventDefault();
           var $row = event.target.closest('.row'); // Находим ближайший родительский элемент с классом 'row'
            var form_data = $(this).serialize();
            var $text= $(this).closest(".col-6").find(".types_marshruts-heading").text();
            let $vopros = confirm("Вы дейтсвительно хотите удалить '"+$text+"' навсегда?");
            if ($vopros){
            $.ajax({
              
                type: "POST", // Метод отправки
                url: "../phpscripts/deltousersroute.php", // Путь до php файла отправителя
                data: form_data,
                success: function () {
                    // Код в этом блоке выполняется при успешной отправке сообщения
                    alert("Маршрут '"+$text+" '  Успешно удален");
    $row.style.display = 'none'; // Скрываем найденный элемент
                },

                error: function () {
        // Код в этом блоке выполняется при ошибке отправки сообщения
        alert("Произошла ошибка. Маршрут '"+$text+"' не был удален");
      
    }
            });
          }
            
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
