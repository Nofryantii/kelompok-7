<?php
require 'function.php';

if (isset ($_POST["register"])){
    if (registrasi ($_POST) > 0){
        echo "<script>
                alert ('Registrasi akun berhasil. Silahkan LOGIN');
                </script>";
    } else {
        echo mysqli_error($koneksi);
    }
    
}

?>


<!DOCTYPE HTML>
<html lang="eng">
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="ccs.css">
    </head>

    <body style="background-image:url('img/bglogin.jpg')">
        <div class="container">
          <h1>Register</h1>
          <form  action="" method="POST">
                      
                        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama">
           
            
                        <input type="text" id="username" name="username" placeholder="Masukkan username">
          
               
                        <input type="email" id="email" name="email" aria-describeby="emailHelp" placeholder="Masukkan email">
          
               
                        <input type="password"  id="password" name="password" placeholder="Password">
          
             
                        <input type="password" id="password2" name="password2" placeholder="Re-Password">
            
                <button type="submit" name="register">Register</button>
                <p> Sudah punya akun?
                  <a href="login.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>