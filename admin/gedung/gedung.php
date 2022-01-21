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
                              <h2>Daftar Gedung</h2>
                            </div>
                                  <div class="col-xs-6">
                                      <a href="tambah_produk.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> Tambah Gedung</a>
                                    </div>
                          </div>
                        </div>
                    
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Gedung</th>
                              <th>Harga</th>
                              <th>Alamat</th>
                              <th>deskripsi</th>
                              <th>Gambar</th>
                              <th>lokasi & Chat</th>
                              <th>Opsi</th>
                            </tr>
                          </thead>
                          <tbody>

                                  <?php
                                  $query = "SELECT * FROM tbl_gedung ORDER BY id_gedung ASC";
                                  $result = mysqli_query($koneksi, $query);
                              
                                  if(!$result){
                                    die ("Query Error: ".mysqli_errno($koneksi).
                                    " - ".mysqli_error($koneksi));
                                  }                  
                                  $no = 1;
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                  ?>
                            <tr>
                              
                              <td><?php echo $no; ?></td>
                              <td><?php echo $row['nama_gedung']; ?></td>
                              <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
                              <td><?php echo substr($row['alamat'], 0, 30); ?></td>
                              <td><?php echo $row['deskripsi']; ?></td>
                              <td style="text-align: center;"><img src="gambar/<?php echo $row['foto'];?>" style="width:100px; height:100px"></td>
                              <td>
                                <a href="<?php echo $row['lokasi']; ?>" class="lokasi" ><i class="material-icons" title="Lokasi">&#xe0c8;</i></a>
                                <a href="<?php echo $row['chat']; ?>" class="delete" ><i class="material-icons" title="chat">&#xe0bf;</i></a>
                              </td>
                              <td>
                                <a href="edit_produk.php?id_gedung=<?php echo $row['id_gedung']; ?>" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="proses_hapus.php?id_gedung=<?php echo $row['id_gedung']; ?>" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
