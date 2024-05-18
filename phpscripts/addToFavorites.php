<?php
    include("../phpscripts/bdconnect.php"); // подключаемся к базе
    $route_id=$_POST['route_id'];
    $user_id=$_POST['user_id'];
    mysqli_query($bdconnect,"INSERT INTO `favorites` (`route_id`, `user_id`) VALUES ('$route_id', '$user_id')");
    ?>