<?php
$bdconnect = mysqli_connect('127.0.0.1', 'root', '', 'MAR');
mysqli_select_db($bdconnect, "MAR");//выбор базы данных
mysqli_query($bdconnect,'SET NAMES "utf8"');

// <?php
// $bdconnect = mysqli_connect('127.0.0.1', 'u2654499_default', 'Td4880Q4lRNAwRa8', 'u2654499_default');
// mysqli_select_db($bdconnect, "u2654499_default");//выбор базы данных
// mysqli_query($bdconnect,'SET NAMES "utf8"');