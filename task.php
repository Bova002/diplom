<!-- <!DOCTYPE html>
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
</html> -->
<?php
require "connect.php";
$title = $_POST['title']; 
$message = $_POST['message'];
$dedline = $_POST['dedline'];
$employe = $_POST['employe'];

$sql_insert = "INSERT INTO task (title,description,employe,dedline) 
     VALUES ('$title', '$message', '$employe','$dedline')"; 
  $db->query($sql_insert);
?>