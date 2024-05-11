<?php
session_start();
include("phpscripts/bdconnect.php");
$devices = mysqli_query($bdconnect, "SELECT * FROM `points`");
$devices = mysqli_fetch_all($devices);
if(!empty($devices)){
    foreach ($devices as $device) { 
        echo '"'.$device[2].'",';
    }
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>Построение пешеходного мультимаршрута</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--
        Укажите свой API-ключ. Тестовый ключ НЕ БУДЕТ работать на других сайтах.
        Получить ключ можно в Кабинете разработчика: https://developer.tech.yandex.ru/keys/
    -->
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
            if(!empty($devices)){
                foreach ($devices as $device) { 
                    echo '"'.$device[2].'",';
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
    // Создаем карту с добавленной на нее кнопкой.
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
        html, body, #map {
            width: 80%; height: 80%; padding: 0; margin: 0;
        }
    </style>
</head>

<body>
<div id="map"></div>

</body>

</html>
