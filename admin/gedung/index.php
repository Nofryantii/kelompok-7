<?php

session_start();

if(!isset($_SESSION["admin"])){
  header ("location:../../login.php");
  exit;
}

include 'navbar.php';

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<h1>SELAMAT DATANG ADMIN</hi>

</body>
</html>
