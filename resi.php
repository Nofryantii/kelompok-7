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
                  
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                            $query = "SELECT * FROM booking 
                            INNER JOIN tbl_gedung ON booking.id_gedung=tbl_gedung.id_gedung
                            WHERE id='$id'";

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
                              <td><?php echo $row['nama_gedung']; ?></td>
                              <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
                              <td><?php echo $row['kegiatan']; ?></td>
                              <td><?php echo $row['start']; ?></td>
                              <td><?php echo $row['end']; ?></td>
                
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