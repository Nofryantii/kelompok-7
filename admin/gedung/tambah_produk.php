<?php
  include('../../koneksi.php');//agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
   
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
      <center>
        <h1>Tambah Gedung</h1>
</center>
      <div class="container">
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >




    <div class="row">
      <div class="col-25">
        <label>Nama Gedung</label>
      </div>
      <div class="col-75">
      <input type="text" name="nama_gedung" placeholder="Nama Gedung.."  autofocus="" required="">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Harga</label>
      </div>
      <div class="col-75">
        <input type="text" name="harga" required="" placeholder="Harga Gedung..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Lokasi</label>
      </div>
      <div class="col-75">
        <input type="text" name="lokasi" required="" placeholder="Lokasi gedung berupa link..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Whatsapp</label>
      </div>
      <div class="col-75">
        <input type="text" name="chat" required="" placeholder="Whatsapp berupa link..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label>Alamat</label>
      </div>
      <div class="col-75">
      <textarea  name="alamat" placeholder="Tuliskan alamat gedung.." style="height:100px"></textarea>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label>Deskripsi</label>
        </div>
        <div class="col-75">
        <textarea  name="deskripsi" placeholder="Write something.." style="height:200px"></textarea>
        </div>
   
  
      
        
    <div class="row">
      <div class="col-25">
        <label>Gambar Gedung</label>
      </div>
      <div class="col-75">
       <input type="file" name="foto" required=""  placeholder="Lokasi gedung berupa link..">
      </div>
    </div>


        <div>
         <button type="submit" name="tambah" id="tambah">Simpan</button>
        </div>
      </form>
  </body>
</html>