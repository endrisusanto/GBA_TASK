<?php
//inisialisasi session
session_start();

//mengecek username pada session
if( !isset($_SESSION['name']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>GOOGLE BUILD APPROVAL</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
<style>
.custom {
    width: 49% !important;
}
</style>
<body>
	

	<?php
	//mengatasi error notice dan warning
	//error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	//koneksi ke database
	$con = new mysqli("localhost", "root", "", "gba_task");
	if ($con->connect_errno) {
		echo die("Failed to connect to MySQL: " . $con->connect_error);
	}
	
	//proses jika tombol rubah di klik
	if($_POST['submit']){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($password_lama);
        // $pass  = password_hash($password_lama, PASSWORD_DEFAULT);
		// $password_lama	= $password_lama;
		$cek = $con->query("SELECT password FROM users WHERE password='$password_lama'");
		
		if($cek->num_rows){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 4 karakter
			if(strlen($password_baru) >= 1){
				//jika password baru sudah 4 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($password_baru);
                    // $pass_new  = password_hash($password_baru, PASSWORD_DEFAULT);
					// $password_baru 	= $password_baru;
					$username 		= $_SESSION['username']; //ini dari session saat login
					
					$update 		= $con->query("UPDATE users SET password='$password_baru' WHERE username='$username'");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						echo "<script>alert('Password berhasil diubah');
                        location.href = 'index.php';
                        </script>";
					}else{
						//kondisi jika proses query gagal
						echo "<script>alert('Gagal merubah password');</script>";
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					echo "<script>alert('Konfirmasi password tidak cocok');</script>";
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 4 karakter
				echo "<script>alert('Minimal password baru adalah 4 karakter');</script>";
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			echo "<script>alert('Password lama tidak cocok');</script>";
		}
	}
	?>
	
	<!-- mulai form rubah password -->
    <section class="container-fluid mb-4">
    <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
    <section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" method="post" action="">
            <h4 class="text-center font-weight-bold"> Ganti Password </h4>
            
            <div class="form-group">
                <label for="InputPassword">Password Lama</label>
                <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama" required>
            </div>

            <div class="form-group">
                <label for="InputPassword">Password Baru</label>
                <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru" required>
            </div>

            <div class="form-group">
                <label for="InputPassword">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Re-Password" required>
            </div>
            <button type="submit" name="submit" value="Rubah" class="btn btn-primary custom">Ganti</button> 
            <a href="index.php"  class="btn btn-danger custom">Cancel</a>

        </form>
    </section>
    </section>
</section>
	<!-- selesai form rubah password -->
</body>
</html> 