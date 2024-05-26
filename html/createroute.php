<?php 
session_start();
include("../phpscripts/bdconnect.php");
if($_SESSION['id']){
    $userid = $_SESSION['id'];
    $id_routes = mysqli_query($bdconnect, "SELECT * FROM `favorites` WHERE `user_id` =". $userid);
    $id_routes = mysqli_fetch_all($id_routes);
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
    <script src="https://api-maps.yandex.ru/v3/?apikey=f4f5e5e9-e2ff-4717-93f7-02042ad547f6&lang=ru_RU"></script>
    <script>
        
        initMap();
        ymaps3.ready.then(() => {
  // Copy your api key for routes from the developer's dashboard and paste it here
  ymaps3.getDefaultConfig().setApikeys({router: 'f4f5e5e9-e2ff-4717-93f7-02042ad547f6'});
});
 async function fetchRoute(startCoordinates, endCoordinates) {
  // Request a route from the Router API with the specified parameters.
  const routes = await ymaps3.route({
    points: [startCoordinates, endCoordinates], // Start and end points of the route LngLat[]
    type: 'driving', // Type of the route
    bounds: true // Flag indicating whether to include route boundaries in the response
  });

  // Check if a route was found
  if (!routes[0]) return;

  // Convert the received route to a RouteFeature object.
  const route = routes[0].toRoute();

  // Check if a route has coordinates
  if (route.geometry.coordinates.length == 0) return;

  return route;
}

        async function initMap() {
            await ymaps3.ready;
            ymaps3.import;

            const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker, YMapFeature, YMapControls } = ymaps3;
            const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');
            const map = new YMap(
                document.getElementById('ymap3'),
                {
                    location: {
                        center: [30.315473, 59.938991],
                        zoom: 13,
                        // showScaleInCopyrights: true
                    },
                }


            );

            map.addChild(new YMapDefaultSchemeLayer());

            // Добавьте слой для маркеров
            map.addChild(new YMapDefaultFeaturesLayer());

            // Создайте DOM-элемент для содержимого маркера.
            // Важно это сделать до инициализации маркера!
            // Элемент можно создавать пустым. Добавить HTML-разметку внутрь можно после инициализации маркера.
            const content = document.createElement('section');

            // Инициализируйте маркер
            const marker = new YMapMarker(
                {
                    coordinates: [30.315473, 59.938991],
                    draggable: true
                },
                content
            );

            <?php 
            $points = mysqli_query($bdconnect, "SELECT * FROM `points`");
            $points = mysqli_fetch_all($points);
            $add="map";

        foreach ($points as $point) {
            $add=$add.".addChild(point".$point[0].")";
            $coordnates = explode(",", $point[3]);
            $coordnates=$coordnates[1].",".$coordnates[0];
            print_r(" const point".$point[0]." = new YMapDefaultMarker({
                coordinates:[". $coordnates."],
                title: '".$point[1]."',
                subtitle:'".$point[0]." - номер точки'
              });");
         }
            ?>
            // Добавьте маркер на карту
            map.addChild(marker);
            <?php 
         print_r($add);
            ?>

            

        // Get and process data about the initial route
        fetchRoute(pointA.coordinates, pointB.coordinates)


        }
    </script>
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
            <h1 class="inner-first-screen_heading">СОЗДАТЬ МАРШРУТ</h1>
            <p class="inner-first-screen_lead">Создавайте свои собственные маршруты, добавляйте любимые места и делитесь ими с другими! </div>
    </section> 

   
    <section class="modal-form">
        
      <p class="modal-form_heading">Создание маршрута</p>
      <form action="../phpscripts/createuserroute.php" method="post" class="form-modal-form">

        <div class="form-inner_wrapper">
          <label for="name" class="form_label">
            Название маршрута*
            <input name="name" id="name" type="text" class="form_input">
          </label>
          <label for="width" class="form_label">
            Точки маршрута - (1,4,3)*
            <input name="points" id="width" type="text" class="form_input" placeholder="Через запятую">
        </label>
        </div>
        <div id="ymap3" ></div>   
        <label for="text" class="form_label">
          Описание*
          <textarea name="description" id="text" cols="30" rows="5" class="form_textarea"></textarea>
        </label>

        <div class="form-button_wrapper">
          <button class="button" type="submit">Создать маршрут</button>
        </div>
        
      </form>
    </section> 
   

    


    <?php
  include("footer.php");
  ?>


  
  


    <script src="./../js/main.js"></script>
    <script src="./../js/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
     <!-- Initialize Swiper -->
  

  </body>
</html>
