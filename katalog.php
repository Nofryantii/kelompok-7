<?php
include 'navbar.php';
?>


<?php
session_start();

if(!isset($_SESSION["login"])){
  header ("location:login.php");
  exit;
}

if(isset($_GET["id_gedung"])){
    $nama_gedung = $_POST["hidden_name"];
    $harga_gedung = $_POST["hidden_harga"];
    
    $result = mysqli_query($koneksi, "SELECT * FROM tbl_gedung WHERE  nama_gedung = '$nama_gedung'");
    if( mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result)  ;
    $_SESSION["id_gedung"] = $row["id_gedung"];
    $_SESSION["nama_gedung"] = $row["nama_gedung"];
    $_SESSION["harga"] = $row["harga"];
    header ("location:pemesanan.php");
    }
}
?>

<body>
         <header class="catalog pt-5">
            <div class="container">
                <div class="catalog-heading text-uppercase text-center" style="padding-top:6rem;"><br>Catalog</div>
            </div>
        </header>


<div class="container mt-5">
        <div class="row">
                    <?php

                        include ('koneksi.php');
                        // jalankan query untuk menampilkan semua data diurutkan berdasarkan ID
                        $query = "SELECT * FROM tbl_gedung ORDER BY id_gedung ASC";
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
        
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <form action="proses_booking.php" method="POST"></form>
                                    <div class="card " style="width: 20rem;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
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
                                        <a href="pemesanan.php?id_gedung=<?php echo $row['id_gedung']; ?>" class="btn btn-info btn-sm btn-danger">Booking</a>
                                        <a href="detail.php?id_gedung=<?php echo $row['id_gedung']; ?>" class="btn btn-info btn-sm">Details</a>
                                        <a href="<?php echo $row['chat'];?>" class="btn btn-teal btn-sm">Chat</a>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                                    
                            </div>

                    <?php
                        $no++; //untuk nomor urut terus bertambah 1
                    }?>

        </div>
</div>



<footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

                </body>