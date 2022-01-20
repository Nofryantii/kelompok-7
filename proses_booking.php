    

<?php
include 'koneksi.php';

session_start();


//mengambil data dari form input
$kegiatan   = $_POST['kegiatan'];
$start      = $_POST['start'];
$end    = $_POST['end'];
// $id_g = $_POST['id_gedung'];


$id_user =    $_SESSION["id"];
$id_g =    $_SESSION["id_gedung"];


//membuat koneksi ke databases
$koneksi = mysqli_connect('localhost', 'root', '', 'dbuntals');

//insert data ke dalam database
$result = mysqli_query($koneksi, "INSERT INTO booking set id='$id_user', id_gedung='$id_g', kegiatan='$kegiatan', start='$start', end='$end' ");

echo "<script>alert('Data tidak ditemukan pada database');window.location='resi.php';</script>";

header("location: resi.php");
?>