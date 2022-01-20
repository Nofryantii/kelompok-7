<?php
  // memanggil file koneksi.php untuk membuat koneksi
include '../../koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_gedung'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_gedung = ($_GET["id_gedung"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tbl_gedung WHERE id_gedung='$id_gedung'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>

  
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <style>
          * {
            box-sizing: border-box;
          }

          input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
          }

          label {
            padding: 12px 12px 12px 0;
            display: inline-block;
          }

          button[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
          }

          button[type=submit]:hover {
            background-color: #45a049;
          }

          .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            margin : 20px;
            padding: 20px;
          }

          .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
          }

          .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
          }

          /* Clear floats after the columns */
          .row:after {
            content: "";
            display: table;
            clear: both;
          }

          /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
          @media screen and (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
              width: 100%;
              margin-top: 0;
            }
          }
</style>

  </head>
  <body>
  <center>
        <h1>Edit Gedung <?php echo $data['nama_gedung']; ?></h1>
        </center>
      <div class="container">  
         <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
           
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_gedung" value="<?php echo $data['id_gedung']; ?>"  hidden />




    <div class="row">
      <div class="col-25">
        <label>Nama Gedung</label>
      </div>
      <div class="col-75">
      <input type="text" name="nama_gedung" value="<?php echo $data['nama_gedung']; ?>" placeholder="Nama Gedung.."  autofocus="" required="">
      </div>
    </div>






    <div class="row">
      <div class="col-25">
        <label>Harga</label>
      </div>
      <div class="col-75">
        <input type="text" name="harga" required="" value="<?php echo $data['harga']; ?>" placeholder="Harga Gedung..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Lokasi</label>
      </div>
      <div class="col-75">
        <input type="text" name="lokasi"  value="<?php echo $data['lokasi']; ?>" placeholder="Lokasi gedung berupa link..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Whatsapp</label>
      </div>
      <div class="col-75">
        <input type="text" name="chat"  value="<?php echo $data['chat']; ?>" placeholder="Whatsapp berupa link..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Alamat</label>
      </div>
      <div class="col-75">
      <textarea name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Tuliskan alamat gedung.." style="height:100px"></textarea>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label>Deskripsi</label>
        </div>
        <div class="col-75">
        <textarea  name="deskripsi"  value="<?php echo $data['deskripsi']; ?>" style="height:200px"></textarea>
        </div>
   
  
      
        
    <div class="row">
      <div class="col-25">
        <label>Gambar Gedung</label>
      </div>
      <div class="col-75">
      <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;"/>
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
      </div>
    </div>


        <div>
         <button type="submit">Simpan</button>
        </div>
      </form>
  </body>
</html>