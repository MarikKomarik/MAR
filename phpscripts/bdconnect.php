<?php
$bdconnect = mysqli_connect('127.0.0.1', 'root', '', 'MAR');
mysqli_select_db($bdconnect, "MAR");//выбор базы данных
mysqli_query($bdconnect,'SET NAMES "utf8"');