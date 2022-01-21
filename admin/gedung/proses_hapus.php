<?php
include '../../koneksi.php';
$id_gedung = $_GET["id_gedung"];
$id = $_GET["id"];
$id_pesan = $_GET["id_pesan"];
//mengambil id yang ingin dihapus

    //hapus gedung
    $query = "DELETE FROM tbl_gedung WHERE id_gedung='$id_gedung' ";
    $hasil_query = mysqli_query($koneksi, $query);

    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='gedung.php';</script>";
    }


    //hapus user
    $hapus = "DELETE FROM users WHERE id='$id' ";
    $hasil_hapus = mysqli_query($koneksi, $hapus);

    if(!$hasil_hapus) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('User berhasil dihapus.');window.location='user.php';</script>";
      header("location:user.php");

    }

    //hapus pesanan
    $lapar = "DELETE FROM booking WHERE id_pesan='$id_pesan' ";
    $makan = mysqli_query($koneksi, $lapar);

    if(!$makan) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='pesanan.php';</script>";
      header("location:pesanan.php");
    }