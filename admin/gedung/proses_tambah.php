<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $nama_gedung   = $_POST['nama_gedung'];
  $deskripsi     = $_POST['deskripsi'];
  $alamat    = $_POST['alamat'];
  $harga    = $_POST['harga'];
  $lokasi    = $_POST['lokasi'];
  $chat    = $_POST['chat'];
  $foto = $_FILES['foto']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO tbl_gedung (nama_gedung, deskripsi, alamat, harga, chat, lokasi, foto) VALUES ('$nama_gedung', '$deskripsi', '$alamat', '$harga', '$chat', '$lokasi', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  $_SESSION["nama_gedung"] = $row["nama_gedung"];
                  $_SESSION["harga"] = $row["harga"];
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='gedung.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO tbl_gedung (nama_gedung, deskripsi, alamat, harga, chat, lokasi, foto) VALUES ('$nama_gedung', '$deskripsi', '$alamat', '$harga', '$chat', '$lokasi null)";
                  $result = mysqli_query($koneksi, $query);
    
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {

                    //jalankan sesi
                    // if( mysqli_num_rows($result) === 1){
                    //   $row = mysqli_fetch_assoc($result);
                    //   $_SESSION["id_gedung"] = $row["id_gedung"];
                    //   $_SESSION["nama_gedung"] = $row["nama_gedung"];
                    //   $_SESSION["harga"] = $row["harga"];
                    //   }  

                                                        
                              
                      
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}

 