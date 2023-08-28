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


input.largerCheckbox {
    width: 20px;
    height: 20px;
    }
    table {
			width: 100%;
		}
		th {
			background-color: #ddd;
            border-radius:20px;
            font-size:15px;
            color:#7e7e7e;	
            text-align:center;
		}
		td {
			padding-top: 20px;
			padding-bottom: 20px;	
            text-align:center;
            color:#fff;
            font-size:25px;
            
        }
            p {
            margin: 0 0 0px;}
            a {
            padding-top:0px;
            padding-right:10px;
            padding-left:5px;
            border-radius: 10px;
            margin:auto;
            background-color: #767676;
            font-weight:normal;
            box-shadow: 5px 10px #ddd;
		    }
            button{
                box-shadow: 5px 10px #ddd;   
            }
    .glow {
		animation: glow 1s ease-in-out infinite alternate;
		}

		@-webkit-keyframes glow {
		from {
		box-shadow: 
		0 0 10px red, 
		0 0 5px red;
		}

		to {
		box-shadow: 
		0 0 20px red,
		0 0 30px red;
		}
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
    $progress =$data['progress'];
    $progress1 = explode(",", $progress);
    $type =$data['type'];
    $type1 = explode(",", $type);

	?>
        <section class="container-fluid mb-10">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-10 col-sm-10 col-md-10">			
                <form class="form-container" action="update.php" method="post" enctype="multipart/form-data">
                    <h4 class="text-center font-weight-bold"> UPDATE DATA </h4>
                    <br>
					<div class="row">
                        <input hidden type="text" class="form-control" id="di" name="id" value="<?php echo $data['id'] ?>">
                        <input hidden type="text" class="form-control" id="issue_id" name="issue_id" value="<?php echo $data['issue_id'] ?>">
                        
                    <div class="col-sm-2">
					<label for="name">AP VERSION</label>
                        <input type="text" class="form-control" id="ap" name="ap" value="<?php echo $data['ap'] ?>">
                    </div>  
                    <div class="col-sm-2">
					<label for="name">CP VERSION</label>
                        <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $data['cp'] ?>">
                    </div>
                    <div class="col-sm-2">
					<label for="name">CSC VERSION</label>
                        <input type="text" class="form-control" id="csc" name="csc" value="<?php echo $data['csc'] ?>">
                    </div> 
                    <div class="col-sm-2">
                        <label for="name">PIC</label>
                        <select  id="hide"  class="form-control" name="nama" id="resizing_select">
                        <optgroup label="Current Data">
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
                        <label for="name">TYPE</label>
						<select class="form-control" name="type" id="optionsDropdown" onchange="showNumber()" onchange="showConfirm()>
                        <optgroup label="Current Data" >
								<option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
                        </optgroup>
                        <optgroup label="Option Update" <?php
                                if ($pic_level=='member')
                                {
                                echo "hidden";
                                }
                            ?>>
								<option value="NORMAL EXCEPTION">NORMAL EXCEPTION</option>
								<option value="SMR">SMR</option>
								<option value="SIMPLE EXCEPTION">SIMPLE EXCEPTION</option>
                                <option value="REGULAR">REGULAR</option>
                        </optgroup>
						</select>
                    </div>	
                    <div hidden class="col-sm-2">
                        <label for="name">WEEK</label>
                        <input readonly onkeydown="return false" type="week" class="form-control" id="week" name="week" placeholder="Masukkan WEEK" value="<?php echo $data['week'] ?>">
                    </div>	                   
                     
                    <div class="col-sm-2">
					<label for="status">STATUS</label>
							<select class="form-control glow" name="status" id="status" onchange="changeFunc(value)">
                            <optgroup label="Current Data">
								<option value="<?php echo $data['status'] ?>"><?php echo $data['status'] ?></option>
                                </optgroup>
                            <optgroup label="Option Update">
								<option value="PROGRESS">PROGRESS</option>
								<option value="SUBMITED">SUBMITED</option>
								<option value="APPROVED">APPROVED</option>
								<option value="PASSED">PASSED</option>
                                <option value="DROP/CANCEL">DROP/CANCEL</option>
                            </optgroup>
							</select>
                    </div>
                    </div>

                    <div class="row">  					
                    <div class="col-sm-2">
                        <label for="name">REQUEST DATE</label>
                        <input onkeydown="return false" type="date" class="form-control" id="request_date" name="request_date" value="<?php echo $data['request_date'] ?>">
                    </div> 
                    <div class="col-sm-2">
                        <label for="name">SUBMISSION DATE</label>
                        <input onkeydown="return false" type="date" class="form-control" id="submission_date" name="submission_date" value="<?php echo $data['submission_date'] ?>" >
                    </div>       
                    <div class="col-sm-2">
                        <label for="name">ONTIME SUBMITED</label>
                        <input readonly onkeydown="return false" type="text" class="form-control" id="ontime_submission" name="ontime_submission" value="<?php echo $data['ontime_submission'] ?>">
                    </div>  
                    <div class="col-sm-2">
                        <label for="name">DEADLINE</label>
                        <input onkeydown="return false" type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $data['deadline'] ?>">
                    </div>
                    <div class="col-sm-2">
                        <label for="name">APPROVED DATE</label>
                        <input onkeydown="return false" type="date" class="form-control" id="approved_date" name="approved_date" value="<?php echo $data['approved_date'] ?>">
                    </div>  
                    <div class="col-sm-2">
                        <label for="name">ONTIME APPROVED</label>
                        <input readonly onkeydown="return false" type="text" class="form-control" id="ontime_approved" name="ontime_approved" value="<?php echo $data['ontime_approved'] ?>">
                    </div>              
					</div>
                    <div class="row">  					
                    <div class="col-sm-4">
                        <label for="name">PREVIOUS ID</label>
                        <input type="text" class="form-control" id="baseid" name="baseid" value="<?php echo $data['baseid'] ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="name">SUBMISSION ID (XID)</label>
                        <input type="text" class="form-control" id="sid" name="sid" value="<?php echo $data['sid'] ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="name">REVIEWER</label>
                        <input type="text" class="form-control" id="reviewer" name="reviewer" value="<?php echo $data['reviewer'] ?>">
                    </div>
                    </div>
                    
<table>
    <tr>
    <th colspan="11">GBA TEST SUITE</th>
  </tr>
  <tr>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?>><a  id="ctsbox">
                            <input type="checkbox" class="largerCheckbox" id="cts" name="progress[]" value="cts"
                            <?php
                                if (in_array('cts',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?>>
                            
                            <label for="cts">CTS</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?>><a  id="gtsbox">
                            <input type="checkbox" class="largerCheckbox" id="gts" name="progress[]" value="gts" 
                            <?php
                                if (in_array('gts',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="gts">GTS</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="ctsvbox">
                            <input type="checkbox" class="largerCheckbox"id="ctsv" name="progress[]" value="ctsv"
                            <?php
                                if (in_array('ctsv',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="ctsv">CTS V</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="gtsvbox" >
                            <input type="checkbox" class="largerCheckbox"id="gtsv" name="progress[]" value="gtsv"
                            <?php
                                if (in_array('gtsv',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="gtsv">GTS V</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="bvtbox">
                            <input type="checkbox" class="largerCheckbox"id="bvt" name="progress[]" value="bvt"
                            <?php
                                if (in_array('bvt',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="bvt">BVT</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="getpropbox">
                            <input type="checkbox" class="largerCheckbox"id="getprop" name="progress[]" value="getprop"
                            <?php
                                if (in_array('getprop',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="getprop">GETPROP</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="sdtbox" >
                            <input type="checkbox" class="largerCheckbox"id="sdt" name="progress[]" value="sdt"
                            <?php
                                if (in_array('sdt',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="sdt">SDT</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="svtbox">
                            <input type="checkbox" class="largerCheckbox"id="svt" name="progress[]" value="svt"
                            <?php
                                if (in_array('svt',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="svt">SVT</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('SMR',$type1))
                                {
                                echo "hidden";
                                }?>><a id="bootimagebox">
                            <input type="checkbox"  class="largerCheckbox"id="bootimage" name="progress[]" value="bootimage"
                            <?php
                                if (in_array('bootimage',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('SMR',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="bootimage">BOOT IMAGE</label>
                        </td></a>
                        <td <?php if (in_array('SIMPLE EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?><?php if (in_array('NORMAL EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?>><a id="scatbox">
                            <input type="checkbox" class="largerCheckbox"id="scat" name="progress[]" value="scat"
                            <?php
                                if (in_array('scat',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('SIMPLE EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?><?php if (in_array('NORMAL EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="scat">SCAT</label>
                        </td></a>
                        <td <?php if (in_array('NORMAL EXCEPTION',$type1))
                                {
                                echo "hidden";
                                }?>><a id="stsbox">
                            <input type="checkbox"class="largerCheckbox"id="sts" name="progress[]" value="sts"
                            <?php
                                if (in_array('sts',$progress1))
                                {
                                echo "checked";
                                }
                            ?><?php if (in_array('NORMAL EXCEPTION',$type1))
                            {
                            echo "disabled";
                            }?>>
                            <label for="sts">STS</label>
                        </td></a>
                        </tr>
                        <input type="checkbox" class="largerCheckbox"id="checked" name="progress[]" value="inprogress" hidden checked >
                            </table>
				
                            <div class="row">
					<div class="col-sm-12">
                        <label for="note">NOTE</label><br>
						<textarea name="note" rows="4" cols="100%"><?php echo $data['note'] ?></textarea>
                    </div>					
					
					</div>
    <input type="text" name="berubah" id="numberInput" hidden >
                    
					
					<div class="row">
                    <div class="col-sm-12">
                        <label for="name">REPORT</label>
                        <input type="file" class="form-control" id="report" name="report" value="<?php echo $data['report'] ?>">
                    </div>
					</div>
                    <div class="row">
					<div class="col-sm-6">
                    <button type="submit" name="submit" value="Simpan" class="btn btn-primary custom">Update</button> 
					</div>
					<div class="col-sm-6">
					<a href="active_task.php"  class="btn btn-danger custom">Cancel</a>
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
<script>
        function showNumber() {
            var dropdown = document.getElementById("optionsDropdown");
            var selectedValue = dropdown.value;
            var inputField = document.getElementById("numberInput");
            if (selectedValue) {
                var confirmed = confirm("Anda yakin ingin memilih opsi ini? \nPerubahan akan mereset semua progress !");
                
                if (confirmed) {
                    // Lanjutkan dengan tindakan sesuai pilihan opsi
                    inputField.value = "1";
                    updateInputField(selectedValue);
                } else {
                    dropdown.value = ""; // Reset pilihan dropdown
                    inputField.value = "";
                }
            }
            
        }
    </script>
<!-- <script>
function updatestatus(){
    var dropdown = document.getElementById("status");
    var selectedValue = dropdown.value;
    var inputText = document.getElementById("SUBMITED")   
    document.getElementById("ontime_approved").value = "DROP";   
    document.getElementById("ontime_submission").value = "DROP";

}
</script> -->
<script>
function changeFunc($status) {

if ($status == 'APPROVED' ) {
  document.getElementById ("approved_date").value = "<?php echo date("Y-m-d");?>";
  var date3 = new Date( document.getElementById("request_date").value);
  var date4 = new Date(document.getElementById("deadline").value);
  var Difference_In_Time = date4.getTime() - date3.getTime();
  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = true;
  }
    
  if (Difference_In_Days<=10)  {
       document.getElementById("ontime_approved").value = "ONTIME";
      }
    else{
       document.getElementById("ontime_approved").value = "DELAY";
      }
}
else if ($status == 'SUBMITED' ) {
        
  document.getElementById ("submission_date").value = "<?php echo date("Y-m-d");?>";
  var date1 = new Date( document.getElementById("deadline").value);
  var date2 = new Date(document.getElementById("submission_date").value);
  var Difference_In_Time = date2.getTime() - date1.getTime();
  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = true;
  }
    
  if (Difference_In_Days<=1)  {
       document.getElementById("ontime_submission").value = "ONTIME";
       document.getElementById("ontime_approved").value = "TBD";
      }
    else{
       document.getElementById("ontime_submission").value = "DELAY";
       document.getElementById("ontime_approved").value = "TBD";
      }
 
//document.getElementById("ontimesubmit").value = Difference_In_Days;
      
    
} 
else if ($status == 'DROP/CANCEL' ) {  
          document.getElementById("ontime_submission").value = "DROP/CANCEL";   
          document.getElementById("ontime_approved").value = "DROP/CANCEL";
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = false;
  }
     }
else if ($status == 'PASSED' ) {  
    document.getElementById("ontime_submission").value = "TBD";   
    document.getElementById("ontime_approved").value = "TBD";
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = false;
  }
}
}
</script>


    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>