<?php
  include('../../koneksi.php'); 
  include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>daftar gedung</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="container">
                    <div class="table-responsive">
                      <div class="table-wrapper">
                        <div class="table-title">
                          <div class="row">
                            <div class="col-xs-6">
                              <h2>Daftar Pesanan</h2>
                            </div>
                      
                          </div>
                        </div>
                    
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama User</th>
                              <th>Gedung</th>
                              <th>Kegiatan</th>
                              <th>Mulai</th>
                              <th>Akhir</th>
                             <th>Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tbody>
                  
                      <?php
                      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                      $query = "SELECT * FROM booking 
                      INNER JOIN tbl_gedung ON booking.id_gedung=tbl_gedung.id_gedung 
                      INNER JOIN users ON booking.id=users.id ";
                      $result = mysqli_query($koneksi, $query);
                      //mengecek apakah ada error ketika menjalankan query
                      if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                      }
                    
                      //buat perulangan untuk element tabel dari data mahasiswa
                      $no = 1; //variabel untuk membuat nomor urut
                      // hasil query akan disimpan dalam variabel $data dalam bentuk array
                      // kemudian dicetak dengan perulangan while
                      while($row = mysqli_fetch_assoc($result))
                      {
                      ?>
                            <tr>
                              
                              <td><?php echo $no; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['nama_gedung']; ?></td>
                              <td><?php echo $row['kegiatan']; ?></td>
                              <td><?php echo $row['start']; ?></td>
                              <td><?php echo $row['end']; ?></td>
                             <td>
                                <a href="proses_hapus.php?id_pesan=<?php echo $row['id_pesan']; ?>" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                              </td>
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
