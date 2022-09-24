<!DOCTYPE html>

<?php

session_start();

if(isset($_SESSION['usuario'])){
	header("Location:../admin/index.php");
}


?>

<html lang="pt-br">
<head>
  <meta charset="UTF">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/png" sizes="16x16"  href="../favicons/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="./style.css">
  
  <script src="./script.js" defer></script>

  <title>Login - CDT</title>
</head>
<body>

  <main>
    <section class="login">
<form action="../BD/loginBD.php" method="post"> 
      <div class="wrapper">
        

        <h1 class="login__title">Fazer login</h1>
    
        <label class="login__label">
          <span>nome de usuario</span>
          <input type="text" name="username" class="input">
        </label>
  
        <label class="login__label">
          <span>senha</span>
          <input type="password" name="password" class="input">
        </label>
  
  

      </div>

      <div class="wrapper">
        <button type="submit" class="login__button">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/>
          </svg>
        </button>

        <a href="../index.php" class="login__link">voltar</a>
      </div>
  </form>
    </section>

    <section class="wallpaper"></section>
  </main>
  <?php 
									if(isset($_SESSION['loginErro'])){
									                ?>
									<script>
alert('<?php echo $_SESSION['loginErro']; ?>')
</script>
									                <?php
									unset($_SESSION['loginErro']);
									}
									                ?>
</body>
</html>
