<?php
include 'navbar.php';
include 'koneksi.php';
session_start();
?>

<body>
<header class="catalog pt-5">
            <div class="container">
                <div class="catalog-heading text-uppercase text-center" style="padding-top:6rem;"><br>Daftar Pesanan</div>
            </div>
        </header>

      <div class="container pt-5">
                    <div class="table-responsive">
                      <div class="table-wrapper">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Gedung</th>
                              <th>Harga / Hari</th>
                              <th>kegiatan</th>
                              <th>Mulai</th>
                              <th>Akhir</th>
                            </tr>
                          </thead>
                          <tbody>
                      <?php
                      $id =   $_SESSION["id"] ;

                            $query = "SELECT * FROM booking 
                            INNER JOIN tbl_gedung ON booking.id_gedung=tbl_gedung.id_gedung
                            WHERE id='$id'";

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
                              <td><?php echo $row['kegiatan']; ?></td>
                              <td><?php echo $row['start']; ?></td>
                              <td><?php echo $row['end']; ?></td>
                
                            </tr>        
                    <?php
                      $no++;
                    }
                    ?>
                          </tbody>
                        </table>
                    </div>
      </div> 
  </body>