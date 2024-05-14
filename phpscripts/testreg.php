<?php
session_start(); // если пустые , то уничтожаем переменные
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
} 
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
if (empty($login) or empty($password)) 
{
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../html/profil.php');
    exit;
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);//удаляем лишние пробелы
$password = trim($password);
$password = md5($password);
// подключаемся к базе
include("../phpscripts/bdconnect.php"); // подключаемся к базе
$result = mysqli_query($bdconnect, "SELECT * FROM users WHERE login='$login'"); 
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password'])) {
    //если пользователя с введенным логином не существует
    header('Location: ../html/profil.php');
    $_SESSION['message'] = 'Пользователя не существует';
    exit;
} else {
    //если существует, то сверяем пароли
    if ($myrow['password'] == $password) {
        //если пароли совпадают, то запускаем сессию
        $_SESSION['login'] = $myrow['login'];
        $_SESSION['name'] = $myrow['name'];
        $_SESSION['id'] = $myrow['id']; //эти данные будет "носить с собой" вошедший пользователь
        $_SESSION['area'] = $myrow['area'];
        $_SESSION['message'] = 'Вы успешно вошли';
        header('Location: ../html/profil.php');
    } else {//если пароли не сошлись
        $_SESSION['message'] = 'Неверный пароль.';
        header('Location: ../html/profil.php');
        exit;
    }
}
