    

<?php
include 'koneksi.php';

session_start();


//mengambil data dari form input
$kegiatan   = $_POST['kegiatan'];
$start      = $_POST['start'];
$end    = $_POST['end'];

$id_user =    $_SESSION["id"];
$id_g =    $_SESSION["id_gedung"];

//insert data ke dalam database
$result = mysqli_query($koneksi, "INSERT INTO booking set id='$id_user', id_gedung='$id_g', kegiatan='$kegiatan', start='$start', end='$end' ");
header("location: resi.php");
?>