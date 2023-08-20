
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/x-icon" href="/file/pe.ico">
<link rel="icon" type="image/x-icon" href="file/pe.ico">
    <meta property="og:image" content="http://107.102.39.55/pe_analisa/file/2.jpg" />
    <meta property="og:title" content="SOLUTION ANALISA" />

    <title>GOOGLE BUILD APPROVAL</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
 <style>
body {
    padding-top: 2vh;

}
    </style>  
<body>
<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();


$error = '';
$validate = '';
$validatePIN = '';
if( isset($_SESSION['email']) ) header('Location: index.php');
//mengecek apakah data username yang diinpukan user kosong atau tidak
if( isset($_POST['submit']) ){
        
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, $username);
        $name     = stripslashes($_POST['name']);
        $name     = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);
        $level   = stripslashes($_POST['level']);
        $level   = mysqli_real_escape_string($con, $level);
        $pin = stripslashes($_POST['pin']);
        $repin   = stripslashes($_POST['repin']);


        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
        //cek apakah nilai yang diinputkan pada form user atau super user
        if($level == 'super user'){
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
            //mengecek apakah pin yang diinputkan sama dengan re-pin yang diinputkan kembali
                if($pin == $repin){

                //memanggil method cek_email untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($email,$con) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    // $pass  = password_hash($password, PASSWORD_DEFAULT);
                    $pass 	= md5($password);
                    //insert data ke database
                    $query = "INSERT INTO users (username,name,email, password, level ) VALUES ('$username','$name','$email','$pass','$level')";
                    $result   = mysqli_query($con, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['name'] = $name;
                        $_SESSION['level'] = $level;
                       
                        header('Location: index.php');
                    
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !';
                    }
                }else{
                        $error =  'Email sudah terdaftar !';
                }
            }else{
                $validatePIN = 'PIN SALAH !!!';
            }
            
            }else{
                $validate = 'Password tidak sama !!';
            }
        }
        else{

            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
                    //memanggil method cek_email untuk mengecek apakah user sudah terdaftar atau belum
                    if( cek_nama($email,$con) == 0 ){
                        //hashing password sebelum disimpan didatabase
                        // $pass  = password_hash($password, PASSWORD_DEFAULT);
                        $pass 	= md5($password);
                        //insert data ke database
                        $query = "INSERT INTO users (username,name,email, password, level ) VALUES ('$username','$name','$email','$pass','$level')";
                        $result   = mysqli_query($con, $query);
                        //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                        if ($result) {
                            $_SESSION['name'] = $name;
                            $_SESSION['level'] = $level;
                           
                            header('Location: index.php');
                        
                        //jika gagal maka akan menampilkan pesan error
                        } else {
                            $error =  'Register User Gagal !';
                        }
                    }else{
                            $error =  'Email sudah terdaftar !';
                    }
                }else{
                    $validate = 'Password tidak sama !';
                }
        }    
    
    }
    else {
            $error =  'Data tidak boleh kosong !';
        }
    }
    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($email,$con){
        $email = mysqli_real_escape_string($con, $email);
        $query = "SELECT * FROM users WHERE email = '$email'";
        if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
    }
?>
        <section class="container-fluid mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold"><a href="index.php"> Sign-Up </a></h4>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                   
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" >
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Alamat Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan Email Samsung" >
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" >
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Re-Password</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Ketik Ulang Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="row">
                        <!-- <div class="col-sm-6">
                        <label>Group Part</label>
                            <div >
                                <select  class="form-control" name="part">
                                    <option>Etc.</option>
                                    <option>PE SOLUTION</option>
                                    <option>MECHA</option>
                                    <option>PE PROCESS</option>
                                </select>
                            </div>					
                        </div> -->
                    
                    <!-- //BAGIAN PIN-------------------------------------------------------------------------------------- -->
                    <div class="col-sm-4">
                    <label>Authority User</label>
                    <?php if($validatePIN != '') {?>
                            <p class="text-danger"><?= $validatePIN; ?></p>
                    <?php }?><br>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="radio" name="level" onclick="yesnoCheck();" id="level" value="super user"  >
                        <label>SUPER USER</label>
                    </div>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input form-check-inline"  type="radio" name="level"  onclick="yesnoCheck();" id="level" value="member" checked>
                        <label >MEMBER</label>
                    </div>
                    </div>

                    <div class="col-sm-8" style="display :none">
                        <label>PIN</label>
                        <input  type="password" class="form-control" id="InputPIN" name="pin" value="2023">
                        <?php if($validatePIN != '') {?>
                            <p class="text-danger"><?= $validatePIN; ?></p>
                        <?php }?>
                    </div>
                    <br><br><br>
                    <div class="col-sm-8" id="hide" style="display :none">
                        <label>Masukkan PIN Authentication</label>
                        <input  type="password" class="form-control" id="hide" name="repin" placeholder="Contact: endri.s@samsung.com">
                    </div></div>
                    <!-- //BAGIAN PIN-------------------------------------------------------------------------------------- -->
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </section>
            </section>
        </section>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
function yesnoCheck() {
        if (document.getElementById('level').checked) {
        document.getElementById('hide').style.display = 'block';
        } else {
        document.getElementById('hide').style.display = 'none';
        }
    }
</script>
</body>
</html>