<?php 
session_start(); 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="./../js/modernizr.js"></script> <!-- Modernizr -->
<header class="main-header">
      <nav class="main-header__navigation">
        <button class="jsButtonMainMenu main-header_mobile-menu">
          <img src="/img/src/mobile-menu.svg" alt="mobile-menu" />
        </button>
        <ul class="main-menu">
        <li class="main-menu__item">
        <img  class="footer-logo-black" src="../img/src/icons/logoprojectsblack.svg" alt="Логотип">
          </li>
        <li class="main-menu__item">
            <a href="/index.php" class="main-menu__link">ГЛАВНАЯ</a>
          </li>
          <li class="main-menu__item">
            <a href="/html/categories.php" class="main-menu__link">КАТЕГОРИИ</a>
          </li>
          <li class="main-menu__item">
            <a href="/html/routes.php" class="main-menu__link">МАРШРУТЫ</a>
          </li>
         
          <li class="main-menu__item">
            <a href="/html/myRoutes.php" class="main-menu__link">МОИ МАРШРУТЫ</a>
          </li>
          <li class="main-menu__item">
            <a href="/html/createroute.php" class="main-menu__link">СОЗДАТЬ МАРШРУТ</a>
          </li>
          <!-- <li class="main-menu__item">
            <a href="/html/profil.php" class="main-menu__link">ПРОФИЛЬ</a>
          </li> -->
        </ul>
      </nav>
      <div class="main-nav">
        <?php 
          if(isset($_SESSION['id'])){
          $name = $_SESSION['name'];
          $login=$_SESSION['login'];
          $words = explode(" ", $name);
          $namedig = "";
          foreach ($words as $w) {
            $namedig .= mb_substr($w, 0, 1);
          }
          $usid = $_SESSION['id'];
          $favor = mysqli_query($bdconnect, "SELECT * FROM `favorites` WHERE `user_id` =". $usid);
    $favor = mysqli_fetch_all($favor);
    $k=0;
    foreach ($favor as $route) {
$k++;
    }

    $favor = mysqli_query($bdconnect, "SELECT * FROM `users_routes` WHERE `user_id` =". $usid);
    $favor = mysqli_fetch_all($favor);
    $i=0;
    foreach ($favor as $route) {
$i++;
    }
         ?> 
           <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn"><?=$namedig?></button>
              <div id="myDropdown" class="dropdown-content">
              <a href="#"><?=$name?></a>
                <a href="#"><?=$login?></a>
                <a href="#">Сохраненных маршрутов:<?=$k?></a>
                <a href="#">Созданных маршрутов:<?=$i?></a>
                <a class="logout" href="/phpscripts/logout.php">Выйти</a>
              </div>
            </div> <?php } else{?>
                <button class="button cd-signin">Войти</button> 
                <?php }?>
            
</div>
    </header>

    <div class="cd-user-modal"> <!-- все формы на фоне затемнения-->
		<div class="cd-user-modal-container"> <!-- основной контейнер -->
			<ul class="cd-switcher">
				<li><a href="#0">Вход</a></li>
				<li><a href="#0">Регистрация</a></li>
			</ul>
			<div id="cd-login"> <!-- форма входа -->
				<form action="../phpscripts/testreg.php" method="post" class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" name="login" id="signin-email" type="email" placeholder="E-mail">
					</p>
					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Пароль</label>
						<input class="full-width has-padding has-border"  name="password" id="signin-password" type="password"  placeholder="Пароль">
						<a href="#0" class="hide-password"></a>
					</p>
			
					<p class="fieldset">
						<input class="full-width" type="submit" value="Войти">
					</p>
				</form>                             
				
			</div> <!-- конец блока с формой входа -->
			<div id="cd-signup"> <!-- блок с формой регистрации -->
			   <form action="../phpscripts/save_user.php" method="post" class="cd-form">
				  <p class="fieldset">
					 <label class="image-replace cd-username" for="signup-username">Имя пользователя</label>
					 <input class="full-width has-padding has-border"  name="name" id="signup-username" type="text" placeholder="Имя пользователя">
				  </p>
				  <p class="fieldset">
					  <label class="image-replace cd-email" for="signup-email">E-mail</label>
					  <input class="full-width has-padding has-border" name="login" id="signup-email" type="email" placeholder="E-mail">
				   </p>
				   <p class="fieldset">
					   <label class="image-replace cd-password" for="signup-password">Пароль</label>
					   <input class="full-width has-padding has-border"  name="password" id="signup-password" type="password"  placeholder="Пароль">
					   <a href="#0" class="hide-password"></a>
					</p>
					
					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Создать аккаунт">
					</p>
				</form>
					<!-- <a href="#0" class="cd-close-form">Закрыть</a> -->
			</div> <!-- cd-signup -->
			
					<a href="#0" class="cd-close-form">Закрыть</a>
			</div> <!-- cd-user-modal-container -->
	 </div> <!-- cd-user-modal -->
    <script src="./../js/main.js"></script>
    <?php 
     if (isset($_SESSION['message'])) {
      echo '<script>
      window.onload= function(){ alert("'.$_SESSION['message'].'")};</script>';
      unset($_SESSION['message']);
  }?>