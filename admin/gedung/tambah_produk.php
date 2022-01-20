<?php
  include('../../koneksi.php');//agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
   
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