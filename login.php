<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
<div class="login-box">
  <h2>Авторизация</h2>
  <form action="login.php" method="post">
    <div class="user-box">
      <input type="text" name="username" id="username" required>
      <label>Имя</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" id="password" required>
      <label>Пароль</label>
    </div>
    <input type="submit" class="submit" value="Войти">
  </form>
  <br>
  <p>Нет аккаунта? <a href="registr.php" class="registr">Создайте</a></p>
</div>
<?php
require "connect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = array_key_exists('username', $_POST) ? $_POST['username'] : null;
$password = array_key_exists('password', $_POST) ? $_POST['password'] : null;
  $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
  $result1 = $db->query($sql);
  $user1 = $result1->fetchAll(); // Конвертируем в массив
  if(count($user1)){
    $new_url = 'main.php';
    header('Location: '.$new_url);
  }else{
    echo "<p class='pclass'>Логин или пароль введены неверно</p>";
  }
}
?>
</body>
</html>