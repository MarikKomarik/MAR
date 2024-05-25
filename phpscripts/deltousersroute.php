<?php
    include("../phpscripts/bdconnect.php"); // подключаемся к базе
    $id=$_POST['id'];
    mysqli_query($bdconnect,"DELETE FROM users_routes WHERE `users_routes`.`id` = '$id'");
    echo"привет";
    ?>