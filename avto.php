<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="1; url=main.php">
  <title>Document</title>
</head>
<body>
</body>
</html>
<?php
require "connect.php";
$username = $_POST['username']; 
$email = $_POST['email'];
$password = $_POST['password'];

$sql_insert = "INSERT INTO users (username,password,email) 
     VALUES ('$username', '$password',  '$email')"; 
  $db->query($sql_insert);
?>