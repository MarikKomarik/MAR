<?php
session_start();
include("../phpscripts/bdconnect.php"); // подключаемся к базе
if (isset($_SESSION["id"])){
$userid= $_SESSION["id"];
}else{
    $_SESSION['message'] = 'Вы не авторизованы';
      header("Location: " . $_SERVER["HTTP_REFERER"]);
      exit;
}
$name=$_POST['name'];
$points=$_POST['points'];
$description=$_POST['description'];

if (empty($name) or empty($points) or empty($description)) 
{
   $_SESSION['message'] = 'Заполните все поля';
   header("Location: " . $_SERVER["HTTP_REFERER"]);
   exit;
}

if (!preg_match('/^[\d,]+$/', $points)) {
    $_SESSION['message'] = 'Вводите точки только через запятую, Пример (1,4,3)';
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
} 
$pointstest = explode(",", $points);
// Проверяем, чтобы было введено как минимум 2 числа
if(count($pointstest) < 2) {
    $_SESSION['message'] = 'Введите минимум 2 точки для маршрута';
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
} 
foreach ($pointstest as $point) {
    $result = mysqli_query($bdconnect, "SELECT * FROM `points` WHERE `id` = ". $point[0]);
    $result = mysqli_fetch_all($result);
    if (empty($result)) {
        $_SESSION['message'] = 'Вы ввели несуществующий номер точки , попробуйте еще раз. Несуществуюущая точка- '.$point[0].'';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
   exit;
    } 
}
$qery=mysqli_query($bdconnect, "INSERT INTO `users_routes` (`id`, `user_id`, `name`, `discription`) 
VALUES (NULL, '$userid', '$name', '$description')");

if ($qery) {
    $last_inserted_id = mysqli_insert_id($bdconnect);
} else {
    $_SESSION['message'] = "Ошибка при выполнении запроса: ";
    header("Location: " . $_SERVER["HTTP_REFERER"]);
   exit;
}
$points= explode(",", $points);
foreach ($pointstest as $point) {
    $qery=mysqli_query($bdconnect, "INSERT INTO `route_points` (`id`, `route_id`, `user_route_id`, `point_id`) 
    VALUES (NULL, NULL, '$last_inserted_id', '$point[0]')");
}
if ($qery == 'TRUE') {
    $_SESSION['message'] = "Маршрут успешно добавлен";
    header("Location: " . $_SERVER["HTTP_REFERER"]);
 } else {
    $_SESSION['message'] = 'Ошибка';
      header("Location: " . $_SERVER["HTTP_REFERER"]);
 }
 ?>
?>
