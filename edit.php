<?php
//inisialisasi session
session_start();

//mengecek username pada session
if( !isset($_SESSION['name']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
//menyertakan file program koneksi.php pada register
require('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>GOOGLE BUILD APPROVAL</title>
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
#resizing_select {
  width: 100%;
  height: 50%;
} 
</style>
<body> 
	<?php 
	$koneksi = mysqli_connect("localhost","root","","gba_task");
	$id = $_GET['id'];
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM task WHERE id='$id'");
	$nomor = 1;  
    $query ="SELECT `name` FROM users";
    $pic_level = $_SESSION['level'];
    $pic='member';
    $result = $con->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
	while($data = mysqli_fetch_array($query_mysql)){
	?>
        <section class="container-fluid mb-10">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-10 col-sm-10 col-md-10">			
                <form class="form-container" action="update.php" method="post" enctype="multipart/form-data">
                    <h4 class="text-center font-weight-bold"> UPDATE DATA </h4>
                    <br>
					<div class="row">
					<div class="col-sm-2">
                        <label for="name">ISSUE ID</label>
                        <input hidden type="text" class="form-control" id="di" name="id" value="<?php echo $data['id'] ?>">
                        <input readonly type="text" class="form-control" id="issue_id" name="issue_id" value="<?php echo $data['issue_id'] ?>">
                    </div>
                    <div class="col-sm-2">
                        <label for="name">PIC</label>
                        <select  id="hide"  class="form-control" name="nama" id="resizing_select">
                        <optgroup label="Last Data">
                            <option value="<?php echo $data['nama'] ?>"><?php echo $data['nama'] ?></option>
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
                            <option value="<?php echo $data['nama'] ?>"><?php echo $data['nama'] ?></option>
						</select>
                    </div>    
                    <div class="col-sm-2">
					<label for="name">MODEL</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?php echo $data['model'] ?>">
                    </div>   
                    <div class="col-sm-2">
                        <label for="name">WEEK</label>
                        <input onkeydown="return false" type="week" class="form-control" id="week" name="week" placeholder="Masukkan WEEK" value="<?php echo $data['week'] ?>">
                    </div>             
					<div class="col-sm-2">
                        <label for="name">TYPE</label>
						<select class="form-control" name="type" id="resizing_select">
                        <optgroup label="Last Data">
								<option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
                        </optgroup>
                        <optgroup label="Option Update">
								<option>NORMAL EXCEPTION</option>
								<option>SMR</option>
								<option>SIMPLE EXCEPTION</option>
                                <option>REGULAR</option>
                        </optgroup>
						</select>
                    </div>					
					<div class="col-sm-2">
					<label for="place">PLACE</label>
							<select class="form-control" name="place" id="resizing_select">
                            <optgroup label="Last Data">
								<option value="<?php echo $data['place'] ?>"><?php echo $data['place'] ?></option>
                                </optgroup>
                            <optgroup label="Option Update">
								<option>Etc.</option>
								<option>OQC</option>
								<option>MARKET</option>
								<option>PROCESS</option>
                            </optgroup>
							</select>
                    </div>
					</div>
					
					<br>
										
					<div class="row">
					<div class="col-sm-6">
                        <label for="name">SAMPLE RECIEVER</label>
                        <input onkeydown="return false" type="date" class="form-control" id="sample_recieve" name="sample_recieve"  value="<?php echo $data['sample_recieve'] ?>">
                    </div>
					<div class="col-sm-6">
                        <label for="name">SAMPLE ANALIZED</label>
                        <input onkeydown="return false" type="date" class="form-control" id="sample_analyze" name="sample_analyze" onchange="myFunction()" >
                    </div>
					</div>
                    <div class="row">
					<div class="col-sm-6">
                        <label for="name">ISSUE</label>
						<textarea name="issue" rows="4" cols="100%"><?php echo $data['issue'] ?></textarea>
                    </div>
					<div class="col-sm-6">
                        <label for="name">CAUSE</label>
						<textarea name="cause" rows="4" cols="100%"><?php echo $data['cause'] ?></textarea>
                    </div>
					</div>
					<br>
					<div class="form-group">
                        <label for="name">STATUS</label>
                        <input readonly type="text" class="form-control" id="status" name="status" placeholder="Masukkan Status" value="Progress">
                    </div>
					
					<div class="form-group">
                        <label for="name">REPORT</label>
                        <input type="file" class="form-control" id="report" name="report" value="<?php echo $data['report'] ?>">
                    </div>
					
                    <div class="row">
					<div class="col-sm-6">
                    <button type="submit" name="submit" value="Simpan" class="btn btn-primary custom">Update</button> 
					</div>
					<div class="col-sm-6">
					<a href="index.php"  class="btn btn-danger custom">Cancel</a>
					</div>
					</div>

</form>
</section>
</section>
</section>
	<?php } ?>
</body>
<script>
function myFunction() {
  txt ="Finish";
  document.getElementById("status").value = txt;
  return confirm('Apakah Analisa Sudah Selesai ?')
}
</script>
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
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>