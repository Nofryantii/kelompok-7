<?php
include ('navbar.php');
 // mengecek apakah di url ada nilai GET id
 if (isset($_GET['id_gedung'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_gedung = ($_GET["id_gedung"]);
}



?>

<div class="container">
<header class="catalog pt-5">
            <div class="container">
                <div class="catalog-heading text-uppercase text-center" style="padding-top:6rem;"><br>Detail</div>
            </div>
        </header>
        <div class="container text-center d-flex justify-content-center py-5 ">
                                <?php

                                include ('koneksi.php');
                                // jalankan query untuk menampilkan semua data diurutkan berdasarkan ID
                                $query = "SELECT * FROM tbl_gedung where id_gedung='$id_gedung'";
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
                    
                                <form action="proses_booking.php" method="POST"></form>
                                    <div class="card" style="width: 40rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    <img class="card-img-top" src="admin/gedung/gambar/<?php echo $row['foto']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['nama_gedung']; ?></h5>
                                        <p class="card-text"><?php echo substr($row['deskripsi'], 0, 100); ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item "><?php echo substr($row['alamat'], 0, 50); ?></li>
                                        <li class="list-group-item text-center text-danger">Rp <?php echo number_format($row['harga'],0,',','.'); ?></li>
                                    </ul>
                                    <div class="card-body ">
                                        <div class="container center-block">
                                            <input type="hidden" name="hidden_name" value="<?php echo $row['nama_gedung']; ?>"/>
                                            <input type="hidden" name="hidden_harga" value="<?php echo $row['harga']; ?>"/>
                                            <input name="id_gedung" value="<?php echo $data['id_gedung']; ?>"  hidden />
                                        <!-- <a href="#" class="btn btn-danger btn-sm">Booking</a> -->
                                        <a href="pemesanan.php?id_gedung=<?php echo $row['id_gedung']; ?>" class="btn btn-info btn-lg btn-danger">Booking</a>
                                        <a href="<?php echo $row['chat'];?>" class="btn btn-teal btn-lg">Chat</a>
                                        <a href="<?php echo $row['lokasi'];?>" class="btn btn-dark btn-lg">Lokasi</a>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                                </div>
                                    
</div>
<?php } ?>
        </div>
</div>