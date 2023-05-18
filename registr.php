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
  <h2>Регистрация</h2>
  <form action="avto.php" method="POST">
    <div class="user-box">
      <input type="text" name="username" id="username" required>
      <label>Имя</label>
    </div>
    <div class="user-box">
      <input type="email" name="email" id="email" required>
      <label>Почта</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" id="password" required>
      <label>Пароль</label>
    </div>
    <input type="submit" class="submit" value="Войти">
  </form>
</div>
</body>
</html>