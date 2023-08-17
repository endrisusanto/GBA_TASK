<?php
//inisialisasi session
session_start();

//mengecek username pada session
if( !isset($_SESSION['name']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
require('koneksi.php');

$query ="SELECT `name` FROM users";
$pic_level = $_SESSION['level'];
$pic='member';
$result = $con->query($query);
if($result->num_rows> 0){
  $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PE QUALITY PORTAL</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="file/pe.ico">

<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
<style>
body {
    padding-top: 2vh;
	padding-bottom: 2vh;

}
.custom {
    width: 100% !important;
	align:center;
}
.form-control {
	padding: 3px;
}
</style>
<body> 

        <section class="container-fluid mb-10">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-10 col-sm-10 col-md-10">			
                <form class="form-container" action="input-aksi.php" method="post" enctype="multipart/form-data">
                    <h4 class="text-center font-weight-bold"> TAMBAH DATA </h4>
                  <br>
                    

					<div class="row">
					<div style="display:none" class="col-sm-1">
					<label for="name">PIC</label>
                        <input readonly type="text" class="form-control" id="part" name="part" placeholder="Masukkan Part Group Member" value="<?php echo  $_SESSION['part'] ?>">
                    </div>
                    <div class="col-sm-3">
                        <label for="name">PIC</label>
                        <select  id="hide"  class="form-control" name="nama" id="resizing_select">
                        <optgroup label="Current User Session">
                            <option value="<?php echo  $_SESSION['name'] ?>"><?php echo  $_SESSION['name'] ?></option>
                        </optgroup>
                        <optgroup label="Option Update">
                                <?php 
                                foreach ($options as $option) {
                                ?>
                            <option><?php echo $option['name']; ?> </option>
                                <?php 
                                }
                                ?>
                        </optgroup>
						</select>
                        <select  id="hide2"  class="form-control" id="resizing_select">
                            <option value="<?php echo  $_SESSION['name'] ?>"><?php echo  $_SESSION['name'] ?></option>
						</select>
                    </div> 
					<div class="col-sm-3">
					<label for="name">MODEL</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="Masukkan Model Device">
                    </div>
										
						<div class="col-sm-2">
					<label for="name">TYPE</label>
						<div>
							<select  class="form-control" name="type">
								<option>Etc.</option>
								<option>HW</option>
								<option>MECHA</option>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
					<label for="name">PLACE</label>
						<div>
							<select  class="form-control" name="place">
								<option>Etc.</option>
								<option>OQC</option>
								<option>MARKET</option>
								<option>PROCESS</option>
							</select>
						</div>					
					</div>
					<div class="col-sm-2">
						<label for="name">WEEK</label>
                        <input onkeydown="return false" type="week" class="form-control" id="week" name="week" value="<?php echo date('Y').'-W'.date('W');?>" placeholder="<?php echo date('Y').'-W'.date('W');?>">
					</div>				
					</div>
					<br>
					<div class="row">
					<div class="col-sm-6">
                        <label for="name">ISSUE</label><br>
						<textarea name="issue" rows="10" cols="100%"></textarea>
                    </div>					
					<div class="col-sm-6">
						<label for="name">CAUSE</label><br>
						<textarea name="cause" rows="10" cols="100%"></textarea>
                    </div>
					</div>

					<div class="row">
					<div class="col-sm-6">
						<label for="name">SAMPLE RECIEVE</label>
                        <input onkeydown="return false" type="date" class="form-control" id="sample_recieve" name="sample_recieve"  value="<?php echo date("Y-m-d");?>" placeholder="<?php echo date("Y-m-d");?>">
                    </div>
					<!-- <div class="col-sm-6"> -->
						<!-- <label for="name">SAMPLE ANALIZED</label> -->
                        <input type="text" class="form-control" id="sample_analyze" name="sample_analyze"  value="N/A"hidden>					
					<!-- </div> -->
					<div class="col-sm-6">
                        <label for="name">STATUS</label>
                        <input type="text" class="form-control" id="status" name="status" value="Issue Baru" readonly >
                    </div>
					</div>

					
					
					
					<div class="form-group">
                        <label for="name">REPORT</label>
                        <input type="file" class="form-control" id="report" name="report">
                    </div>
					
					<div class="row">
					<div class="col-sm-6">
                    <button type="submit" name="submit" value="Simpan" class="btn btn-success custom">Submit</button> 
					</div>
					<div class="col-sm-6">
					<a href="index.php"  class="btn btn-danger custom">Cancel</a>
					</div>
					</div>
</form>
<!-- <?php echo $_SESSION['level'] ?> -->
</section>
</section>
</section>
<script>
var a = "<?php echo $_SESSION['level'] ?>";
if(a=="super user"){
    console.log(a); 
    document.getElementById('hide').style.display = 'block';
    document.getElementById('hide2').style.display = 'none';
}
else{
    console.log(a); 
    document.getElementById('hide').style.display = 'none';
    document.getElementById('hide2').style.display = 'block';
}
</script>
</body>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>



