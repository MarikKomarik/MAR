<?php
    include("../phpscripts/bdconnect.php"); // подключаемся к базе
    $id=$_POST['id'];
    mysqli_query($bdconnect,"DELETE FROM `favorites` WHERE `favorites`.`id` = '$id'");
    ?>