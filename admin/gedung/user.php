<?php

  session_start();
  if(!isset($_SESSION["admin"])){
    header ("location:../../login.php");
    exit;
  }
  include('../../koneksi.php'); 
  include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
      <div class="container">
                    <div class="table-responsive">
                      <div class="table-wrapper">
                        <div class="table-title">
                          <div class="row">
                           
                              <h2>Daftar User</h2>
                        </div>
</div>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Pengguna</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                      <?php
                      // jalankan query untuk menampilkan semua data diurutkan
                      $query = "SELECT * FROM users ORDER BY id ASC";
                      $result = mysqli_query($koneksi, $query);
                      //mengecek apakah ada error ketika menjalankan query
                      if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                      }
                    
                      //buat perulangan untuk element tabel
                      $no = 1; //variabel untuk membuat nomor urut
                      // hasil query akan disimpan dalam variabel dalam bentuk array
                      // kemudian dicetak dengan perulangan while
                      while($row = mysqli_fetch_assoc($result))
                      {
                      ?>
                            <tr>
                              
                              <td><?php echo $no; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><a href="proses_hapus.php?id=<?php echo $row['id']; ?>" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
                            </tr>
                              
                    <?php
                      $no++; //untuk nomor urut terus bertambah 1
                    }
                    ?>
                          </tbody>
                        </table>
                    </div>
      </div> 
  </body>
</html>


