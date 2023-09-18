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
<title>MANAGE TASK</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/x-icon" href="file/pe.ico">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GOOGLE BUILD APPROVAL TEST</a>
    </div>
      <ul class="nav navbar-nav navbar-right">      
	  <li class="dropdown"><a class="dropdown-toggle thick" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hi , <?php if( !isset($_SESSION['name']) ){    echo "Selamat Datang !" ;}   else{    echo $_SESSION['name']." [".$_SESSION['level']."]" ;}    ?>
        <ul class="dropdown-menu">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> HOMEPAGE</a></li>
			<li><a href="data_user.php"><span class="glyphicon glyphicon-list-alt"></span> SUMMARY TASK</a></li>
            <li><a href="password.php"><span class="glyphicon glyphicon-cog"></span> CHANGE PASSWORD</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-signal"></span> <?php echo "YOUR IP : " . $_SERVER['REMOTE_ADDR'];?> </a></li>
      		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
        </ul>
      </li>
	  <li><a href="export_all.php"><span class="glyphicon glyphicon-link"></span>  EXPORT</a></li>
			<li><a href="../tkdn/weekly_chart.php"><span class="glyphicon glyphicon-signal"></span> WEEKLY CHART</a></li>
      <a class="btn btn-success navbar-btn" href="input.php">Request Baru</a>
    </ul>
  </div>
</nav>
<style type="text/css">
	a.thick {
  font-weight: bold;
}
.glyphicon {
	font-size: 16px;
     }
body {
			font-family: "Roboto Condensed", Helvetica, sans-serif;
			background-color: #fff;
		}
		.container { margin: 150px auto; max-width: 960px; }
		a {

			text-decoration: none;
		}
		table {
			width: 100%;
		}
		table, th, td {
		   border: 1px solid #bbb;
		   margin: 5px auto 10px auto;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		th {
			background-color: #ddd;
		}
		th,td {
			padding-top: 3px;
			padding-bottom: 3px;
			padding-left: 4px;
			padding-right: 4px;		
			font-size: 12px;		}
		button {
			cursor: pointer;
		}
		/*Initial style sort*/
		.tablemanager th.sorterHeader {
			cursor: pointer;
		}
		.tablemanager th.sorterHeader:after {
			content: " \f0dc";
			font-family: "FontAwesome";
		}
		/*Style sort desc*/
		.tablemanager th.sortingDesc:after {
			content: " \f0dd";
			font-family: "FontAwesome";
		}
		/*Style sort asc*/
		.tablemanager th.sortingAsc:after {
			content: " \f0de";
			font-family: "FontAwesome";
		}
		/* Style disabled
		.tablemanager th.disableSort {

		} */
		#for_numrows {
			padding: 10px;
			float: left;
		}
		#for_filter_by {
			padding: 10px;
			float: right;
		}
		#pagesControllers {
			display: block;
			text-align: center;
		}
		img {
			padding-right: 2px;
			border-radius: 50%;
		}
		p {
		margin: 0 0 0px;
		}
		.glow {
		color: #fff;
		animation: glow 1s ease-in-out infinite alternate;
		}

		@-webkit-keyframes glow {
		from {
		box-shadow: 
		0 0 10px #ff8a80, 
		0 0 5px #33b5e5;
		}

		to {
		box-shadow: 
		0 0 5px #ff8a80,
		0 0 10px #33b5e5;
		}
		}
</style>
<body>
<div class="container-fluid">
	<table  class="tablemanager">
		<thead>
			<tr>
				<th style="text-align:center;" class="disableSort disableFilterBy">No.</th>
				<th class="disableSort">PIC</th>
				<th hidden class="disableSort disableFilterBy">Week</th>
				<th hidden class="disableSort disableFilterBy">ID</th>
				<th style="text-align:center;" class="disableSort">Type Submission</th>
				<th style="text-align:center;" class="disableSort">AP Version</th>
				<th style="text-align:center;" class="disableSort">CP Version</th>
				<th style="text-align:center;" class="disableSort">CSC Version</th>
				<th style="text-align:center;" class="disableSort">Previous ID</th>
				<th style="text-align:center;" class="disableSort disableFilterBy">Email</th>
				<th style="text-align:center;" class="disableSort">Progress</th>
				<th style="text-align:center;" class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort">Request Date</th>
				<th style="text-align:center;" class="disableSort">Accept Task</th>
				<th style="text-align:center;" class="disableSort">Submission Date</th>	
				<th style="text-align:center;" class="disableSort">Deadline</th>		
				<th style="text-align:center;" class="disableSort">Ontime Submission</th>
				<th style="text-align:center;"  class="disableSort">Submission ID</th>
				<th style="text-align:center;"  class="disableSort">Reviewer</th>
				<th hidden class="disableSort disableFilterBy">GBA Letter</th>	
				<th class="disableSort">NOTE</th>	
				<th style="text-align:center;" class="disableSort disableFilterBy">Action</th>	

			</tr>
            
            </thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
if ($_SESSION['level']=='super user'){
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE status NOT LIKE 'APPROVED%' AND status NOT LIKE 'DROP/CANCEL%' AND status NOT LIKE 'FAILED%' AND status NOT LIKE 'DROP%' AND status NOT LIKE 'CANCEL%' ORDER BY `task`.`id` DESC ");
}
else{
	$pengguna = $_SESSION['name'];
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE nama='$pengguna' AND status NOT LIKE 'APPROVED%' AND status NOT LIKE 'FAILED%' AND status NOT LIKE 'DROP/CANCEL%' AND status NOT LIKE 'DROP%' AND status NOT LIKE 'CANCEL%' ORDER BY `task`.`id` DESC ");	
}
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
	$kodewarna = $data['status'];
	$kodewarnapic = $data['nama'];
	$kodewarnatype = $data['type'];
	$kodewarnasubmission = $data['ontime_submission'];
	$type = $data['type'];
	$file = 'file/'.$data['report'];
if($data['report'] > 1){
	$filename='<span class="glyphicon glyphicon-eye-open"></span>';
}
else{
    $filename='';
}

$terima = $data['accept_date'];
if($terima == 'TBD'){
	$submit = 'Accept';
	$submit1 = 'danger';
	$submit2 =  "onclick='tombol()'" ;
}
else{
	$submit = 'Update';
	$submit1 = 'warning';
	$submit2 =  '' ;
}

$type = $data['type'];
if($type == 'SMR'){
	$persentype = '4';
}
elseif($type == 'NORMAL'){
	$persentype = '9';
}
elseif($type == 'REGULAR'){
	$persentype = "11";
}
else{
	$persentype = "1";
}
	$baseid =$data['baseid'];
	$loading =$data['progress'];
    $loading1 = explode(',',$loading);
	$totalElements = count($loading1)-'1';
	$percentage = ($totalElements / $persentype) * 100;
	$persen = number_format($percentage) . '%';
	// $date1 = new DateTime();
    // $date2 = new DateTime($data['deadline']);    
    // $interval = $date1->diff($date2);
    // $difference = $interval->days;
	// $sign = ($date1 > $date2) ? 'delay ' : '';
	// $sign1 = ($date1 > $date2) ? ' days' : ' days left';
	// $warnasign = ($date1 > $date2) ? '#ff6928' : '#7fb765';
	// if($data['submission_date'] == 0){
	// 	$submited = 'TBD';
	// }
	// else {
	// 	$submited = $data['submission_date'];
	// }
	// if($data['ontime_submission'] == 'TBD'){
	// 	$ontime = 'hidden';
	// 	$ontime1= '';
	// }
	// else {
	// 	$ontime = '';
	// 	$ontime1 = 'hidden';
	// }
	$date1 = new DateTime();;
    $date2 = new DateTime($data['deadline']);    
    $interval = $date1->diff($date2);
	$difference_submited = $interval->days;
	if ($difference_submited != 0){
		$sign = ($date1 > $date2) ? 'delay ' : '';
		$sign1 = ($date1 > $date2) ? ' days' : ' days left';
		$warnasign = ($date1 > $date2) ? '#F6635C' : '#7fb765';
		$beda_submited = $difference_submited;
	}
	else {
		$sign = 'Deadline ';
		$sign1 = 'Today';
		$warnasign = '#F6635C';
		$beda_submited = '';}

	if($data['ontime_submission'] == 'TBD'){
		$ontimesubmited = 'hidden';
		$ontimesubmited1= '';
	}
	else {
		$ontimesubmited = '';
		$ontimesubmited1 = 'hidden';
	}
	if(strpos($kodewarnasubmission,'ONTIME')!==false){
		$warnasubmission='#428bca';
	  }
	  elseif(strpos($kodewarnasubmission,'DELAY')!==false){
		$warnasubmission='red';
	  }
	  else{
		$warnasubmission= 'red';
	  }	
	if($data['submission_date'] == 0){
		$submited = 'TBD';
	}
	else {
		$submited = $data['submission_date'];
	}
	if($data['approved_date'] == 0){
		$approved = 'TBD';
	}
	else {
		$approved = $data['submission_date'];
	}
if(strpos($kodewarna,'PROGRESS')!==false){
	$warna='#F0B86E';
  }
  elseif(strpos($kodewarna,'Task Baru !')!==false){
	$warna='#F6635C';
  }
  elseif(strpos($kodewarna,'APPROVED')!==false){
	$warna='#428bca';
  }
  elseif(strpos($kodewarna,'SUBMITED')!==false){
	$warna='#7fb765';
  }
  elseif(strpos($kodewarna,'PASSED')!==false){
	$warna='#3e8339';
  }
  elseif(strpos($kodewarna,'FEEDBACK SENT')!==false){
	$warna='#7fb765';
  }
  else{
	$warna= 'red';
  }	
  if(strpos($kodewarnapic,'ENDRI')!==false){
	$warnapic='#ff8a80';
  }
  elseif(strpos($kodewarnapic,'LUTFI')!==false){
	$warnapic='#86cb4f';
  }
  elseif(strpos($kodewarnapic,'FAZLUR')!==false){
	$warnapic='#33b5e5';
  }
  else{
	$warnapic='#ffd180';
  }	
  if(strpos($kodewarnatype,'SMR')!==false){
	$warnatype='#ff6928';
  }
  elseif(strpos($kodewarnatype,'NORMAL')!==false){
	$warnatype='#7fb765';
  }
  elseif(strpos($kodewarnatype,'SIMPLE')!==false){
	$warnatype='#428bca';
  }
  else{
	$warnatype='#ff5b5b';
  }
		echo "<tbody>";
		echo "<tr>";
		echo "<td style='text-align:center;'>".$nomor++."</td>";
		echo "<td>"."<p style='display: inline-flex;color:white;background-color: $warnapic;border-radius: 10px;padding-right:15px;text-align:left;font-weight: bold'><img style='border-radius: 40%;' float:left height='30px' width='25px' src='../tkdn/images/".$data['nama'].".jpg'>".$data['nama']."</p>"."</td>";	
		echo "<td hidden>".$data['issue_id']."</td>";
		echo "<td hidden>".$data['week']."</td>";
		echo "<td style='text-align:center;'> "."<p style='display: inline-flex;color:white;background-color: $warnatype;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['type']."</td>";
		echo "<td style='text-align:center;'>"."<p style='font-weight: 400'>".$data['ap']."</p>"."</td>";
		echo "<td style='text-align:center;'>".$data['cp']."</td>";
		echo "<td style='text-align:center;'>".$data['csc']."</td>";
		echo "<td>"."<p style='text-align:center;font-weight: 600'>".$data['baseid']."</p>"."</td>";
		// echo "<td style='text-align:center;'>"."<button style='background: none;border: none;text-decoration: none;' type='button' onclick='copyToClipboard(baseid)'>".$baseid."</button>"."</td> ";
		echo "<td style='text-align:center;'>"."<button style='background: none;border: none;text-decoration: none;' type='button' onclick='copyToClipboard(email)'><span class='glyphicon glyphicon-envelope'></span></button>"."</td> ";
		echo "<td style='width:9%'>"."<div class='w3-round-xlarge w3-container' style='padding-left: 0px;padding-right: 0px;background-color:#b5b5b5'>
	<div class='w3-green w3-tiny progress-bar-striped w3-round-xlarge active progress-bar' style='width:$persen'>". $persen."</div>
	 </div>"."</td>";
		echo "<td style='text-align:center;'>"."<p style='display: inline-flex;color:white;background-color: $warna;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight: bold'>".$data['status']."</td>";
		echo "<td style='text-align:center;width:4%'>".$data['request_date']."</td> ";
		echo "<td style='text-align:center;width:4%'>".$data['accept_date']."</td> ";
		echo "<td style='text-align:center;width:4%'>".$submited."</td> ";
		echo "<td style='text-align:center;width:4%'>".$data['deadline']."</td> ";
		echo "<td style='text-align:center;' $ontimesubmited>"."<p style='display: inline-flex;color:white;background-color:$warnasubmission;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_submission']."</td> ";
		echo "<td style='text-align:center;' $ontimesubmited1>"."<p style='display: inline-flex;color:white;background-color: $warnasign;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign .$beda_submited. $sign1."</td>";
		echo "<td style='text-align:center;'>".$data['sid']."</td> ";
		echo "<td style='text-align:right;'>".$data['reviewer']."</td> ";
		echo "<td hidden style='text-align:center;'><a href='$file'>".$filename."</a></td>";
        echo "<td style='width:7%'>".$data['note']."</td>";
		echo "<td style='text-align:center;'>";	
		echo "<a class='btn btn-$submit1' $submit2 href='edit.php?id=$data[id]'>".$submit."</a> ";			
        echo "</td>";        			
echo "</tr>";
echo "</tbody>";
?>
<?php } ?>	
</table>

</div>
</body>
<script type="text/javascript" src="./tableManager.js"></script>
	<script type="text/javascript">
		// basic usage
		$('.tablemanager').tablemanager({
			appendFilterby: true,
			vocabulary: {
                voc_filter_by: 'Filter By',
                voc_type_here_filter: 'Cari . . .',
                voc_show_rows: 'Rows Per Page'
  },
			pagination: true,
			showrows: [20,50,100],
			disableFilterBy: [1]
		});
		// $('.tablemanager').tablemanager();
</script>
<script type="text/javascript">
function yesnoCheck() {
        if (document.getElementById('level').checked) {
        document.getElementById('hide').style.display = 'block';
        } else {
        document.getElementById('hide').style.display = 'none';
        }
    }
</script>
<script>
const salin = (btn) => {
    navigator.clipboard.writeText(btn.getAttribute('email'));
    let tmp = btn.innerHTML;
    btn.innerHTML = 'Tersalin';
    btn.disabled = true;

    setTimeout(() => {
        btn.innerHTML = tmp;
        btn.disabled = false;
    }, 1500);
};
</script>
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
<script>
function tombol() {
  alert ("YAKIN MAU ACCEPT KERJAANNYA SEKARANG ?");
}
</script>

<p hidden id='email'>endri.s@samsung.com,fazlur.r@samsung.com,lufti.b@samsung.com,danar.kurnia@samsung.com,aulia.am@samsung.com</p>
</html>