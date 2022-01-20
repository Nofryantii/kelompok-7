<?php 

include 'function.php';
include 'koneksi.php';

session_start();

if(isset($_SESSION["login"])){
  header ("location:index.php");
  exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
  

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE  username = '$username'");

    if($username=="nofryanti"){
     
      // buat session login dan username
      $_SESSION["admin"] = true;
      // alihkan ke halaman dashboard admin
      header("location:admin/gedung/index.php");
    }elseif( mysqli_num_rows($result) === 1){

     //cek password
     $row = mysqli_fetch_assoc($result)  ;
      if(password_verify($password, $row["password"]) ) {
          $_SESSION["id"] = $row["id"];
          $_SESSION["name"] = $row["name"];
          $_SESSION["login"] = true;
          header("location:index.php");
          exit;
      } 
     
     }
     $error =true;
     
  } 


?>

<!DOCTYPE HTML>
<html lang="eng">
    <head>
      <link rel="stylesheet" href="ccs.css">
        <title>Login</title>
    </head>

    <body style="background-image:url('img/bglogin.jpg')">
        <div class="container">
          <h1>Login</h1>
          
<?php if(isset($error) ) : ?>
    <p style="color: red; font-style: italic;">usename / password salah</p>
    <?php endif; ?>
            <form action="" method="post">
              
              <input type="text" name="username" id="username" placeholder="Username" required>
              <input type="password" name="password" id="password" placeholder="Password" required>
                <button  type="submit" name="login" id="login">Log in</button>
                <p> Belum punya akun?
                  <a href="register.php">Register di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>