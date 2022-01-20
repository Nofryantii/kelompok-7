<?php
include 'koneksi.php';

$koneksi = mysqli_connect("localhost","root","","dbuntals");


			function registrasi($data){
				global $koneksi;
				
				$nama = strtolower(stripcslashes($data["nama"]));
				$username = strtolower(stripcslashes($data["username"]));
				$password = mysqli_real_escape_string($koneksi,$data["password"]);
				$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
				$email = $data["email"];


				//ekstensi user
				$result = mysqli_query($koneksi, "SELECT username FROM users WHERE username ='$username'");
				if (mysqli_fetch_assoc($result)){
					echo "
					<script>
					alert ('Username sudah ada. silahakan buat username lain!')
					</script>
					";

					return false;
				}

				//cek konfimasi password
				if($password !== $password2){
					echo"<script>
					alert('konfirmasi password tidak sesuai!');
					</script>";

					return false;
				}

				//enkripsi pass
				$password = password_hash($password, PASSWORD_DEFAULT);


				//tambahkan user ke database
				mysqli_query($koneksi, "INSERT INTO users VALUES ('','$nama','$username','$email','$password')");
				
				return mysqli_affected_rows($koneksi);

			}


			function booking()
			
?>
 