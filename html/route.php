<?php
session_start();
include("../phpscripts/bdconnect.php");
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $route = mysqli_query($bdconnect, "SELECT * FROM `routes` WHERE `id` =". $id);
    $route = mysqli_fetch_assoc($route);
    $searchpoints = mysqli_query($bdconnect, "SELECT * FROM `route_points` WHERE `route_id` = ".$route['id']);
    $points = mysqli_fetch_all($searchpoints);
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Маршрут</title>
    <link rel="shortcut icon" href="./../img/src/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./../swiper-bundle.min.css">
    <link rel="stylesheet" href="./../style.css"/>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=f4f5e5e9-e2ff-4717-93f7-02042ad547f6" type="text/javascript"></script>
    <script >
        function init() {
    /**
     * Создаем мультимаршрут.
     * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
     */
    multiRoute = new ymaps.multiRouter.MultiRoute({
        referencePoints: [
            //точки маршрута
            <?php 
            if(!empty($points)){
                foreach ($points as $point) { 
                    $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =". $point[3]);
                $qery = mysqli_fetch_assoc($qery); 
                   echo '"'.$qery['coordinates'].'",';
                }
                
            }
            ?>
        ],
        params: {
            //Тип маршрутизации - пешеходная маршрутизация.
            routingMode: 'pedestrian',
        }
    }, {
        // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
        boundsAutoApply: true
    });
    // Создаем карту 
    var myMap = new ymaps.Map('map', {
        center: [59.938991, 30.315473],
        zoom: 12,
        controls: []
    }, {
        buttonMaxWidth: 300
    });

    // Добавляем мультимаршрут на карту.
    myMap.geoObjects.add(multiRoute);
}

ymaps.ready(init);

    </script>
	<style>
        html, body {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
        #map {
            width: 50%; height: 70%; padding: 0; margin: 0;
            margin-left: auto;
    margin-right: auto;
        }
    </style>
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
            <h1 class="inner-first-screen_heading"><?= $route['name'] ?></h1>
        </div>
        

        
    </section> 
     <div class="sidebar">
    <h3>Содержание</h3>
    <ul> 
    <li><a href="#map">Карта маршрута</a></li>
    <?php 
            if(!empty($points)){
                $i=65;
                foreach ($points as $point) { 
                    $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =". $point[3]);
                $qery = mysqli_fetch_assoc($qery); 
                   echo '<li><a href="#'.$qery['name'].'">'.$qery['name'].' - &#'.$i.';'.'</a></li>';
                   $i=$i+1;
                }
                
            }
            ?>
    </ul>
  </div>
    <section class="place">
        <h2 class="place-header">
            Карта маршрута<hr></h2>
    </section>
    <!-- Карта -->
    <div id="map"></div>
    <?php 
            if(!empty($points)){
                foreach ($points as $point) { 
                    $qery = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` =". $point[3]);
                $qery = mysqli_fetch_assoc($qery); 
                $int = 101;
                   echo '<section class="place" id="'.$qery['name'].'">
                   <h2 class="place-header">'.
                   $qery['name'].'<hr></h2>
                   <div class="place-about">'.$qery['description'] .'
                   </div>
                   <div class="place-foto">
                       <img src="'.$qery['pathtophoto'].'" alt="foto">
                   </div>
               </section> ';
                }
                
            }
            ?>
    
    <?php
  include("footer.php");
  ?>

    
  




   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="./../js/main.js"></script>
    <script src="./../js/swiper-bundle.min.js"></script>

  </script>
  <script>
    var swiper = new Swiper(".typesSwiper", {
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  </body>
</html>
