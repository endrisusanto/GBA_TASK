<?php
//inisialisasi session
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gba_task";

// $activeUserCount = 0;


// foreach ($_SESSION as $key => $value){
// 	$activeUserCount++;
// }

// echo "jumlah :" .$activeUserCount;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Menghitung jumlah total request
	$query = "SELECT COUNT(status) AS count FROM task"; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$total = $row['count'];
}
	
//Menghitung jumlah total yang approved
	$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%Task Baru !%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$baru = $row['count'];
}
	
//Menghitung jumlah total yang progress
	$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%progress%' or status LIKE '%FEEDBACK%' or status LIKE '%FEEDBACK SENT%'"; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$progress = $row['count'];
}
	
//Menghitung jumlah total yang progress
	$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%APPROVED%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$approved = $row['count'];
}
//Menghitung jumlah submited yang progress
$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%SUBMITED%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$submited = $row['count'];
}

//Menghitung jumlah submited yang drop
$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%DROP%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$drop = $row['count'];
}
//Menghitung jumlah submited yang DELAY
$query = "SELECT COUNT(ontime_approved) AS count FROM task WHERE ontime_approved LIKE '%DELAY%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$delay = $row['count'];
}
//Menghitung jumlah submited yang ONTIME
$query = "SELECT COUNT(ontime_approved) AS count FROM task WHERE ontime_approved LIKE '%ONTIME%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$ontime = $row['count'];
}
// Tanggal sekarang
$today = new DateTime();

// Jumlah hari kedepan yang ingin dihitung
$daysToAdd = 7; // Ganti angka sesuai kebutuhan

// Menambahkan hari kedepan ke tanggal sekarang
$futureDate = clone $today;
$futureDate->modify("+" . $daysToAdd . " days");

// Menghitung selisih tanggal
$interval = $today->diff($futureDate);


?>
<!DOCTYPE html>
<html>
	
<head>
<title>GOOGLE BUILD APPROVAL</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/x-icon" href="file/pe.ico">
<meta property="og:image" content="http://107.102.39.55/pe_analisa/file/2.jpg" />
<meta property="og:title" content="GOOGLE BUILD APPROVAL" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="active_task.php">GOOGLE BUILD APPROVAL</a>
		</div>
		<ul class="nav navbar-nav navbar-right">      
			<li class="dropdown"><a class="dropdown-toggle thick" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hi , <?php if( !isset($_SESSION['name']) ){    echo "Selamat Datang . Loginnya dimari" ;}   else{    echo $_SESSION['name']." [".$_SESSION['level']."]" ;}    ?>
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="active_task.php"><span class="glyphicon glyphicon-log-in"></span><?php if( !isset($_SESSION['name']) ){    echo " LOGIN" ;}   else{   echo " MANAGE TASK" ;}    ?></a></li>
					<li><a href="#"><span class="glyphicon glyphicon-signal"></span> <?php echo "YOUR IP : " . $_SERVER['REMOTE_ADDR'];?> </a></li>
					<li><a href="export_gba.php"><span class="glyphicon glyphicon-link"></span> EXCEL ASSIGN</a></li>
					<li><?php if( !isset($_SESSION['name']) ){    echo "<a href='password.php'><span class='glyphicon glyphicon-cog'></span> SETTING</a>" ;}   else{   echo "<a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LOGOUT</a>" ;}    ?></li>
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
	background-color: #f7f7f7;
	
}
.container { margin: 150px auto; max-width: 960px; }
a {

	text-decoration: none;
}
table {
	width: 100%;
	border-collapse: collapse;
	margin-top: 20px;
	margin-bottom: 20px;
	
}
table, th, td {
	border: 1px solid #bbb;
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
			font-size: 12px;
		}
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
.panel-body.drop {
	padding-top:80px;
	height: 240px;
	background:#9e9e9e;
	font-size: 40px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.submited {
	padding-top:80px;
	height: 240px;
	background:#86cb4f;
	font-size: 40px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.total {
	padding-top:80px;
	height: 240px;
	background:#33b5e5;
	font-size: 40px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.baru {
	padding-top:80px;
	height: 240px;
	background:#ff8a80;
	font-size: 40px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.jalan {
	padding-top:80px;
	height: 240px;
	background:#ffd180;
	font-size: 40px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.approved {
	padding-top:80px;
	height: 240px;
	background:#46BFBD;
	font-size: 40px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-heading{
	font-size: 13px;
	}
.profil {
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
		.callout {
  position: fixed;
  top: 60px;
  left: 10px;
  margin-left: 20px;
  max-width: 550px;
}

.callout-header {
  padding: 25px 15px;
  background: #555;
  font-size: 20px;
  color: white;
}

.callout-container {
  padding: 15px;
  background-color: lightgrey;
  color: black
}

.closebtn {
  position: absolute;
  top: 5px;
  right: 15px;
  color: white;
  font-size: 60px;
  cursor: pointer;
}

.closebtn:hover {
  color: lightgrey;
}
</style>
<body>
<div class="container-fluid">
<div class="panel panel-default">
	<div class="panel-body status">
		<div class="col-sm-2" style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>TOTAL TASK</b></div>
					<div class="panel-body total"><?php echo $total ?></div>
			</div>
		</div> 
		<div class="col-sm-2"style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>TASK BARU</b></div>
					<div class="panel-body baru"><?php echo $baru ?></div>
			</div>
		</div> 
		<div class="col-sm-2"style="width:9%" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>PROGRESS</b></div>
					<div class="panel-body jalan"><?php echo $progress ?></div>
			</div>
		</div> 
		<div class="col-sm-2" style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>SUBMITED</b></div>
					<div class="panel-body submited"><?php echo $submited ?></div>
			</div>
		</div>
		
		<div class="col-sm-2" style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>APPROVED</b></div>
					<div class="panel-body approved"><?php echo $approved ?></div>
			</div>
		</div> 
		<div class="col-sm-2" style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>DROP / CANCEL</b></div>
					<div class="panel-body drop"><?php echo $drop ?></div>
			</div>
		</div>
		<div class="col-sm-2" style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>DELAY</b></div>
					<div class="panel-body baru"><?php echo $delay ?></div>
			</div>
		</div>
		<div class="col-sm-2" style="width:9%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b>ONTIME</b></div>
					<div class="panel-body total"><?php echo $ontime ?></div>
			</div>
		</div>
		<div class="col-sm-3" style="width:28%">
			<div class="panel panel-default">
				<div class="panel-heading center"><b><?php echo "TASK WEEK #".date("W");?></b></div>
				<canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
			</div>
		</div>
	</div> 
</div>
      <div class="panel-body status">
                    <div class="col-sm-2" >
          <div class="panel panel-default">
            <div class="panel-heading center"><img src="images/brazil.png" alt="HTML tutorial" style="width:42px;"> SRBR</div>
            <div class="panel-body india">
				<p class='clock' id="BrazilTime"></p>
			</div>
          </div>
        </div> 
          		<div class="col-sm-2" >
          <div class="panel panel-default">
            <div class="panel-heading center"><img src="images/india.png" alt="HTML tutorial" style="width:42px;"> SRI-N</div>
            <div class="panel-body india">
				<p class='clock' id="IndiaTime"></p>
			</div>
          </div>
        </div> 
        <div class="col-sm-2" >
          <div class="panel panel-default">
            <div class="panel-heading center"><img src="images/indonesia.png" alt="HTML tutorial" style="width:42px;"> SEIN</div>
            <div class="panel-body indonesia">
				<p class='clock' id="JakartaTime"></p>					
			</div>
          </div>
        </div> 
			<div class="col-sm-2" >
          <div class="panel panel-default">
            <div class="panel-heading center"><img src="images/vietnam.png" alt="HTML tutorial" style="width:42px;"> SRV</div>
            <div class="panel-body vietnam">
				<p class='clock' id="VietnamTime"></p>
			</div>
          </div>
        </div> 
		<div class="col-sm-2" >
          <div class="panel panel-default">
            <div class="panel-heading center"><img src="images/flag_china.png" alt="HTML tutorial" style="width:42px; "> SRC-G</div>
            <div class="panel-body korea">
				<p class='clock' id="NewyorkTime"></p>
			</div>
          </div>               
      </div>
			<div class="col-sm-2" >
          <div class="panel panel-default">
            <div class="panel-heading center"><img src="images/korea.png" alt="HTML tutorial" style="width:42px; "> HQ</div>
            <div class="panel-body korea">
				<p class='clock' id="SeoulTime"></p>
			</div>
          </div>
        </div> 
		
    </div>
  </div>  
  <div class="container-fluid">
	<table  class="tablemanager">
		<thead>
			<tr>
			<th style="text-align:center;" class="disableSort">No.</th>
				<th hidden class="disableSort disableFilterBy" >ID</th>
				<th class="disableSort ">PIC</th>
				<th class="disableSort">Week</th>
				<th style="text-align:center;" class="disableSort">Type Submission</th>
				<th style="text-align:center;" class="disableSort">AP VERSION</th>
				<th style="text-align:center;" class="disableSort">CP VERSION</th>
				<th style="text-align:center;" class="disableSort">CSC VERSION</th>
				<th style="text-align:center;" class="disableSort">Previous ID</th>
				<th class="disableSort">Progress</th>
				<th style='text-align:center;' class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort">Request Date</th>
				<th style="text-align:center;" class="disableSort">Submission Date</th>	
				<th style="text-align:center;" class="disableSort">Deadline</th>	
				<th style="text-align:center;" class="disableSort">Ontime Submission</th>	
				<th style="text-align:center;" class="disableSort">Ontime approved</th>
				<th style="text-align:center;" class="disableSort">Submission ID</th>
				<th style="text-align:center;" class="disableSort">Reviewer</th>
				<th class="disableSort">Note</th>	
			</tr>
		</thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE status NOT LIKE 'APPROVED%' AND status NOT LIKE 'DROP/CANCEL%' AND status NOT LIKE 'FAILED%' AND status NOT LIKE 'DROP%' AND status NOT LIKE 'CANCEL%' ORDER BY `task`.`id` DESC ");
$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='DHANAR' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskDhanar[] = $row['numRecords'];

$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='ENDRI' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskEndri[] = $row['numRecords'];

$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='LUTFI' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskLutfi[] = $row['numRecords'];

$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='FAZLUR' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskFazlur[] = $row['numRecords'];
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
	$kodewarna1 = $data['ontime_submission'];
	$kodewarna2 = $data['ontime_approved'];
	$kodewarna = $data['status'];
	$kodewarnapic = $data['nama'];
	$kodewarnatype = $data['type'];
	$file = 'file/'.$data['report'];


if($data['report'] > 1){
	$filename='<span class="glyphicon glyphicon-eye-open"></span>';
}
else{
    $filename='';
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
	$loading =$data['progress'];
    $loading1 = explode(',',$loading);
	$totalElements = count($loading1)-'1';
	$percentage = ($totalElements / $persentype) * 100;
	$persen = number_format($percentage) . '%';

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
	else{
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

	$date1 = new DateTime();;
    $date2 = new DateTime($data['deadline']);    
    $interval = $date1->diff($date2);
    $difference_approved = $interval->days;
	if ($difference_approved != 0){
		$sign2 = ($date1 > $date2) ? 'delay ' : '';
		$sign3 = ($date1 > $date2) ? ' days' : ' days left';
		$warnasign1 = ($date1 > $date2) ? '#F6635C' : '#7fb765';
		$beda_approved = $difference_approved;
	}
	else{
		$sign2 = 'Deadline ';
		$sign3 = 'Today';
		$warnasign1 = '#F6635C';
		$beda_approved = '';}

	if($data['ontime_approved'] == 'TBD'){
		$ontimeapproved = 'hidden';
		$ontimeapproved1= '';
	}
	else {
		$ontimeapproved = '';
		$ontimeapproved1 = 'hidden';
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
	$warnatype='#ff6868';
  }

  if(strpos($kodewarna1,'ONTIME')!==false){
	$warna1='#428bca';
  }
  elseif(strpos($kodewarna1,'DELAY')!==false){
	$warna1='red';
  }
  else{
	$warna1='#ff6868';
  }

  if(strpos($kodewarna2,'ONTIME')!==false){
	$warna2='#428bca';
  }
  elseif(strpos($kodewarna2,'DELAY')!==false){
	$warna2='red';
  }
  else{
	$warna2='#ff6868';
  }
		echo "<tbody>";
		echo "<tr>";
		echo "<td style='text-align:center;'>".$nomor++."</td>";
		echo "<td hidden>".$data['issue_id']."</td>";	
		echo "<td>"."<p style='display: inline-flex;color:white;background-color: $warnapic;border-radius: 10px;padding-right:15px;text-align:left;font-weight: bold'><img style='border-radius: 40%;' float:left height='30px' width='25px' src='../tkdn/images/".$data['nama'].".jpg'>".$data['nama']."</p>"."</td>";
		echo "<td style='text-align:center;width:4%'>".$data['week']."</td>";
		echo "<td style='text-align:center;'> "."<p style='display: inline-flex;color:white;background-color: $warnatype;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['type']."</td>";
        echo "<td style='text-align:center;font-weight: bold'>".$data['ap']."</td>";
		echo "<td style='text-align:center;font-weight: lighter'>".$data['cp']."</td>";
		echo "<td style='text-align:center;font-weight: lighter'>".$data['csc']."</td>";
		echo "<td>"."<p style='text-align:center;font-weight: lighter'>".$data['baseid']."</p>"."</td>";

		echo "<td style='width:6%'>"."<div class='w3-round-xlarge w3-container' style='padding-left: 0px;padding-right: 0px;background-color:#b5b5b5'>
	<div class=' w3-dark-blue progress-bar-striped w3-round-xlarge active progress-bar' style='width:$persen;'>". $persen."</div>
	 </div>"."</td>";
		echo "<td style='width:6% ; text-align:center;'>"."<p style='display: inline-flex;color:white;background-color: $warna;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight: bold'>".$data['status']."</td>";
		echo "<td style='text-align:center;width:4%'>".$data['request_date']."</td> ";
		echo "<td style='text-align:center;width:4%'>".$submited."</td>";
		echo "<td style='text-align:center;width:4%'>".$data['deadline']."</td>";
		echo "<td style='text-align:center;' $ontimesubmited>"."<p style='display: inline-flex;color:white;background-color:$warna1 ;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_submission']."</td> ";
		echo "<td style='text-align:center;' $ontimesubmited1>"."<p style='display: inline-flex;color:white;background-color: $warnasign;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign .$beda_submited. $sign1."</td>";
		echo "<td style='text-align:center;' $ontimeapproved>"."<p style='display: inline-flex;color:white;background-color:$warna2 ;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_approved']."</td> ";
  		echo "<td style='text-align:center;' $ontimeapproved1>"."<p style='display: inline-flex;color:white;background-color: $warnasign1;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign2 .$beda_approved. $sign3."</td>";
		echo "<td style='text-align:center;'>".$data['sid']."</td> ";
		echo "<td style='text-align:right;'>".$data['reviewer']."</td> ";
		echo "<td style='width:7%'>".$data['note']."</td>";
		echo "</tr>";		
		echo "</tbody>";
		?>
		<?php } ?>
	</table>
	</div>
	</div>

<!-- batas notif ///////////////////////////////////////////////////////// -->

	<!-- <div class="callout">
  <div class="callout-header">Notice : current mandatory tools & GMS version</div>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
  <div class="callout-container">
  <table style="width: 529px; height: 171px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<colgroup>
<col style="width: 94px;">
</colgroup>
<colgroup>
<col style="width: 428px;">
</colgroup>
<colgroup>
<col style="width: 46px;">
</colgroup>
<tbody>
<tr style="height: 22px;">
<td style="border: 1px solid black; width: 94px; height: 22px; background-color: rgb(32, 57, 164);"><strong><span style="color: rgb(255, 255, 255); font-size: 13px;">&nbsp;Test
  Suite</span></strong></td>
<td style="border-width: 1px 1px 1px 0px; border-style: solid solid solid none; border-color: black; width: 380.88px; background-color: white;"><strong><span style="font-family: Arial; font-size: 13px;">Official
  versions</span></strong></td>
<td style="border-width: 1px 1px 1px 0px; border-style: solid solid solid none; border-color: black; width: 40.22px; background-color: transparent;">Dev</td>
</tr>
<tr style="height: 22px;">
<td style="border-width: 0px 1px 1px; border-style: none solid solid; border-color: white black black; width: 95px; height: 22px; background-color: rgb(32, 57, 164);"><strong><span style="color: rgb(255, 255, 255); font-size: 13px;">&nbsp;CTS&nbsp;/ CTS-V</span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: rgb(0, 37, 222) black black rgb(0, 37, 222); width: 380.88px; background-color: white;">
<p><span style="color: rgb(0, 37, 222);"><strong style="font-size: 13px;">&nbsp;13_r5 / 12.1_r7 / 12_r9 /</strong></span></p>
<p><span style="color: rgb(0, 37, 222);"><strong style="font-size: 13px;"> 11<strong style="font-size: 13px; color: rgb(0, 22, 134);"><a style="color: blue;" href="https://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/29923705/?category_srl=11979740&amp;page=1"><span style="color: rgb(0, 37, 222); font-family: &quot;맑은 고딕&quot;; font-size: 10pt;">_r</span></a>13</strong><strong style="font-size: 13px;">&nbsp;/&nbsp;10</strong><a style="font-size: 13px; color: blue;" href="https://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/29923724/?category_srl=11979740&amp;page=1"><span style="color: rgb(0, 37, 222); font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><strong>_r</strong></span></a><span style="font-size: 13px;">16</span><strong style="font-size: 13px;">&nbsp;/&nbsp;</strong><a style="font-size: 13px; color: blue;" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/25405755"><span style="color: rgb(0, 37, 222); font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><strong>9.0_r</strong></span></a><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;">20</span><strong style="font-size: 13px;">&nbsp;/&nbsp;<span style="color: blue; font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><a style="color: blue;" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/25405800"><span style="color: rgb(0, 37, 222);">8.1_r</span></a></span><span style="font-family: &quot;맑은 고딕&quot;;"><span style="color: blue; font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);">25</span></span></span>&nbsp;/&nbsp;</strong><a style="font-size: 13px; color: blue;" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/25405827"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);"><strong>8.0_r</strong></span></span></a><strong style="font-size: 13px;"><span style="color: rgb(0, 22, 134); font-size: 10pt;"><span style="font-family: &quot;맑은 고딕&quot;;"><span style="color: blue; font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);">26&nbsp;</span></span></span></span></strong></strong></span></p></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: black; width: 40.22px; background-color: transparent;"><a style="color: blue;" href="https://mobilerndhub.sec.samsung.net/hub/page/filesharing/d/a9727bd27b/"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);"><strong>&nbsp;</strong><span style="color: rgb(0, 0, 0); font-size: 16px;">▷</span></span></span></a></td>
</tr>
<tr style="height: 22px;">
<td style="border-width: 0px 1px 1px; border-style: none solid solid; border-color: white black black; width: 95px; height: 22px; background-color: rgb(32, 57, 164);"><strong><span style="font-size: 13px;"><span style="color: rgb(255, 255, 255);">&nbsp;</span><span style="color: rgb(255, 240, 0);">GTS</span></span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: rgb(162, 136, 15) black black rgb(162, 136, 15); width: 380.88px; background-color: white;"><span style="color: rgb(162, 136, 15); font-size: 13px;"><strong>&nbsp;11_r1 / 10_r4 /&nbsp;</strong><strong><span style="font-family: &quot;맑은 고딕&quot;;">9.1_r2 / 8.0_r2 /</span></strong>&nbsp;<strong style="color: rgb(27, 116, 0); font-size: 10pt;"><strong style="font-size: 10pt;"><span style="font-family: &quot;맑은 고딕&quot;;"><span style="color: rgb(162, 136, 15); font-family: &quot;맑은 고딕&quot;;">7</span></span></strong></strong><strong style="color: rgb(27, 116, 0); font-size: 10pt;"><strong style="font-size: 10pt;"><span style="font-family: &quot;맑은 고딕&quot;;"><span style="color: rgb(162, 136, 15);">.0_r2</span></span></strong></strong><strong style="color: rgb(27, 116, 0); font-size: 10pt;"><strong style="font-size: 10pt;"><span style="font-family: &quot;맑은 고딕&quot;;"><span style="color: rgb(162, 136, 15); font-family: &quot;맑은 고딕&quot;;">&nbsp;/ 6.0_r1 /&nbsp;<a style="color: rgb(162, 136, 15);" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/22548165"><span style="font-family: &quot;맑은 고딕&quot;;">5.0_r2</span></a> / <span style="color: rgb(162, 136, 15); font-family: &quot;맑은 고딕&quot;;"><a style="color: rgb(162, 136, 15);" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/20550735">3.0_r</a>6</span></span></span></strong></strong></span></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: black; width: 40.22px; background-color: transparent;"><a style="color: blue;" href="https://mobilerndhub.sec.samsung.net/hub/page/filesharing/d/e5a52f7d97/"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);"><strong>&nbsp;</strong><span style="color: rgb(0, 0, 0); font-size: 16px;">▷</span></span></span></a></td>
</tr>
<tr style="height: 22px;">
<td style="border-width: 0px 1px 1px; border-style: none solid solid; border-color: white black black; width: 95px; height: 22px; background-color: rgb(32, 57, 164);"><strong><span style="font-size: 13px;"><span style="color: rgb(255, 255, 255);">&nbsp;</span><span style="color: rgb(52, 222, 0);">VTS</span></span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: rgb(0, 22, 134) black black rgb(0, 22, 134); width: 380.88px; background-color: white;"><span style="font-size: 13px;"><span style="color: rgb(0, 22, 134);"><strong>&nbsp;13_r5 / 12.1_r7 / 12_r9 / </strong><strong><span style="font-family: &quot;맑은 고딕&quot;;">11_r13 / <span style="color: rgb(0, 0, 0);">10_r16 / </span></span></strong><a style="color: rgb(27, 116, 0); font-size: 10pt;" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/25405623"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><strong><span style="color: rgb(0, 0, 0);">9.0_r</span></strong></span></a><strong style="color: rgb(0, 22, 134); font-size: 10pt;"><span style="color: blue; font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 0, 0);">19 /&nbsp;</span></span></strong><a style="color: rgb(27, 116, 0); font-size: 10pt;" href="http://mobilerndhub.sec.samsung.net/hub/site/gcim/board/tool/view/25281418"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><strong><span style="color: rgb(0, 0, 0);">8.1_r</span></strong></span></a><strong style="color: rgb(0, 22, 134); font-size: 10pt;"><span style="color: blue; font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 0, 0);">14&nbsp;/</span></span></strong><strong style="color: rgb(0, 22, 134); font-size: 10pt;"><span style="color: blue; font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 0, 0);">&nbsp;</span></span></strong><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><strong><span style="color: rgb(0, 0, 0);">8.0_r13</span></strong></span></span></span></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: black; width: 40.22px; background-color: transparent;"><a style="color: blue;" href="https://mobilerndhub.sec.samsung.net/hub/page/filesharing/d/d113767b16/"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);"><strong>&nbsp;</strong><span style="color: rgb(0, 0, 0); font-size: 16px;">▷</span></span></span></a></td>
</tr>
<tr style="height: 22px;">
<td style="border-width: 0px 1px 1px; border-style: none solid solid; border-color: rgb(244, 176, 132) black black; width: 95px; height: 20px; background-color: rgb(32, 57, 164);"><strong><span style="font-size: 13px;"><span style="color: rgb(244, 176, 132);">&nbsp;WTS</span></span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: rgb(0, 22, 134) black black rgb(0, 22, 134); width: 380.88px; background-color: white; height: 20px;"><strong><span style="color: rgb(0, 22, 134); font-size: 13px;">&nbsp;KR1 / IR3　</span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: black; width: 40.22px; background-color: transparent; height: 20px;"><a style="color: blue;" href="https://mobilerndhub.sec.samsung.net/hub/page/filesharing/d/5090b0a409/"><span style="font-family: &quot;맑은 고딕&quot;; font-size: 10pt;"><span style="color: rgb(0, 37, 222);"><strong>&nbsp;</strong><span style="color: rgb(0, 0, 0); font-size: 16px;">▷</span></span></span></a></td>
</tr>
<tr style="height: 22px;">
<td style="border: 1px solid black; width: 94px; height: 21px; background-color: rgb(32, 57, 164);"><strong><span style="font-size: 13px;"><span style="color: rgb(255, 255, 255);">&nbsp;</span><span style="color: rgb(150, 222, 254);">GMS&nbsp;</span></span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: rgb(27, 116, 0) black black rgb(27, 116, 0); width: 380.88px; height: 21px; background-color: white;"><strong><span style="color: rgb(27, 116, 0); font-size: 13px;">&nbsp;</span></strong><strong><span style="color: rgb(27, 116, 0); font-size: 13px;">13_202304 /&nbsp;</span></strong><strong style="font-size: 10pt;"><span style="color: rgb(27, 116, 0); font-size: 13px;">12_202304 / 11_202203&nbsp;/ 10_202102 / 9_202001 / 8.1_201812 / 8.0_201812</span></strong></td>
<td style="border-width: 0px 1px 1px 0px; border-style: none solid solid none; border-color: black; width: 40.22px; height: 21px; background-color: transparent;">　</td>
</tr>
</tbody>
</table>
<p style="font-family: malengodic;"><strong><span style="color: rgb(255, 0, 0); font-family: &quot;Courier New&quot;; font-size: 11pt;">* By deadline, the previous versions can be acceptable. Required-use Date	
  2023/09/01</span><span style="color: rgb(255, 0, 0); font-family: &quot;Courier New&quot;; font-size: 12pt;"> </span></strong><br></p>  </div>
</div> -->

<!-- batas notif ///////////////////////////////////////////////////////// -->




</body>
<script type="text/javascript" src="./tableManager.js"></script>
	<script type="text/javascript">
		// basic usage
		$('.tablemanager').tablemanager({
			appendFilterby: true,
			vocabulary: {
    voc_filter_by: 'Filter By ',
	voc_type_here_filter: 'Cari . . .',
    voc_show_rows: 'Rows Per Page '
  },
			pagination: true,
			showrows: [5,10,20,50,100],
			disableFilterBy: [1]
		});
		// $('.tablemanager').tablemanager();
	</script>
<script>
var xValues = ["Dhanar", "Endri", "Lutfi", "Fazlur"];
var yValues = [<?php echo json_encode($taskDhanar); ?>, <?php echo json_encode($taskEndri); ?>, <?php echo json_encode($taskLutfi); ?>, <?php echo json_encode($taskFazlur); ?>];
var barColors = [
  "#ffd180",
  "#ff8a80",
  "#86cb4f",
  "#33b5e5"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Task Ratio"
    }
  }
});
</script>
<script>
	var getJakartaTime = function(){
		document.getElementById("JakartaTime").innerHTML = new Date().toLocaleString("en-Us",{timeZone:'Asia/Jakarta',timeStyle:'medium',hourCycle:'h24'});
	}
	getJakartaTime();
	setInterval(getJakartaTime,1000);
	
		var getVietnamTime = function(){
		document.getElementById("VietnamTime").innerHTML = new Date().toLocaleString("en-Us",{timeZone:'Asia/Jakarta',timeStyle:'medium',hourCycle:'h24'});
	}
	getVietnamTime();
	setInterval(getVietnamTime,1000);
	
		var getSeoulTime = function(){
		document.getElementById("SeoulTime").innerHTML = new Date().toLocaleString("en-Us",{timeZone:'Asia/Seoul',timeStyle:'medium',hourCycle:'h24'});
	}
	getSeoulTime();
	setInterval(getSeoulTime,1000);
	
		var getIndiaTime = function(){
		document.getElementById("IndiaTime").innerHTML = new Date().toLocaleString("en-Us",{timeZone:'Asia/Kolkata',timeStyle:'medium',hourCycle:'h24'});
	}
	getIndiaTime();
	setInterval(getIndiaTime,1000);
    
    		var getBrazilTime = function(){
		document.getElementById("BrazilTime").innerHTML = new Date().toLocaleString("en-Us",{timeZone:'America/Sao_Paulo',timeStyle:'medium',hourCycle:'h24'});
	}
	getBrazilTime();
	setInterval(getBrazilTime,1000);
    
    
    		var getNewyorkTime = function(){
		document.getElementById("NewyorkTime").innerHTML = new Date().toLocaleString("en-Us",{timeZone:'Asia/Shanghai',timeStyle:'medium',hourCycle:'h24'});
	}
	getNewyorkTime();
	setInterval(getNewyorkTime,1000);
	

	</script>
</html>