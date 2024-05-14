<?php
   session_start();
   //заносим данные в переменные если пустые, то уничтожаем переменные
   if (isset($_POST['name'])) {
      $name = $_POST['name'];
      if ($name == '') {
         unset($name);
      }
   }
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
   if (empty($login) or empty($password) or empty($name)) 
   {
      $_SESSION['message'] = 'Заполните все поля';
      header('Location: ../html/profil.php');
      exit;
   }
   if (!preg_match("/^(([a-zA-Z' -]{1,30})|([а-яА-ЯЁёІіЇїҐґЄєыЫйЙ' -]{1,30}))$/u",$name)) {
       $_SESSION['message'] = "Введите корректное имя";
       header('Location: ../html/profil.php');
      exit;
    }
    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['message'] = "Некорректно введён email";
       header('Location: ../html/profil.php');
      exit;
     }
   $login = stripslashes($login);//обрабатываем их, чтобы теги и скрипты не работали
   $login = htmlspecialchars($login);
   $password = stripslashes($password);
   $password = htmlspecialchars($password);
   $login = trim($login);//удаляем лишние пробелы
   $password = trim($password);
   $password = md5($password);//хеширование
   include("../phpscripts/bdconnect.php"); // подключаемся к базе
   $result = mysqli_query($bdconnect, "SELECT id FROM users WHERE login='$login'");
   $myrow = mysqli_fetch_array($result);
   if (!empty($myrow['id'])) {
      $_SESSION['message'] = 'Логин занят';
      header('Location: ../html/profil.php');
      exit;
   }
   // если такого нет, то сохраняем данные
   $result2 = mysqli_query($bdconnect, "INSERT INTO users (`login`, `password`, `name`, `area`) VALUES('$login','$password','$name', 'Не задано')");
   // Проверяем, есть ли ошибки
   if ($result2 == 'TRUE') {
      $_SESSION['message'] = 'Вы успешно зарегестрированы';
      header('Location: ../index.php');
   } else {
      $_SESSION['message'] = 'Ошибка';
      header('Location: ../html/profil.php');
   }
   ?>