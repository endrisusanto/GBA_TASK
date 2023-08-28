<?php
//inisialisasi session
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gba_task";

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
	$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%progress%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$progress = $row['count'];
}
	
//Menghitung jumlah total yang progress
	$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%finish%' "; 
$query_result = mysqli_query($conn,$query); 
while($row = mysqli_fetch_assoc($query_result)){
	$finish = $row['count'];
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
			<li class="dropdown"><a class="dropdown-toggle thick" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hi , <?php if( !isset($_SESSION['name']) ){    echo "Selamat Datang" ;}   else{    echo $_SESSION['name']." [".$_SESSION['level']."]" ;}    ?>
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="active_task.php"><span class="glyphicon glyphicon-log-in"></span><?php if( !isset($_SESSION['name']) ){    echo " LOGIN" ;}   else{   echo " MANAGE TASK" ;}    ?></a></li>
					<li><a href="#"><span class="glyphicon glyphicon-signal"></span> <?php echo "YOUR IP : " . $_SERVER['REMOTE_ADDR'];?> </a></li>
					<li><?php if( !isset($_SESSION['name']) ){    echo "<a href='password.php'><span class='glyphicon glyphicon-cog'></span> SETTING</a>" ;}   else{   echo "<a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LOGOUT</a>" ;}    ?></li>
				</ul>
			</li>
			<li><a href="export_all.php"><span class="glyphicon glyphicon-link"></span>  EKSPORT EXCEL</a></li>
			<li><a href="../gba_task/weekly_chart.php"><span class="glyphicon glyphicon-signal"></span> WEEKLY CHART</a></li>
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
	text-align: left;
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
.panel-body.total {
	padding-top:45px;
	height: 290px;
	background:#33b5e5;
	font-size: 125px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.baru {
	padding-top:45px;
	height: 290px;
	background:#ff8a80;
	font-size: 125px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.jalan {
	padding-top:45px;
	height: 290px;
	background:#ffd180;
	font-size: 125px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.finish {
	padding-top:45px;
	height: 290px;
	background:#86cb4f;
	font-size: 125px;
	text-align: center;
	color: white;
	font-weight: 1000;}
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
<div class="panel panel-default">
	<div class="panel-body status">
		<div class="col-sm-2" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>TOTAL TASK</b></div>
					<div class="panel-body total"><?php echo $total ?></div>
			</div>
		</div> 
		<div class="col-sm-2" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>TASK BARU</b></div>
					<div class="panel-body baru"><?php echo $baru ?></div>
			</div>
		</div> 
		<div class="col-sm-2" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>PROGRESS</b></div>
					<div class="panel-body jalan"><?php echo $progress ?></div>
			</div>
		</div> 
		
		<div class="col-sm-2" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>FINISH</b></div>
					<div class="panel-body finish"><?php echo $finish ?></div>
			</div>
		</div> 
		<div class="col-sm-4" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b><?php echo "TASK WEEK #".date("W");?></b></div>
				<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
			</div>
		</div>
	</div> 
</div>

	<table  class="tablemanager" style="margin-bottom: 2px;">
		<thead>
			<tr>
			<th style="text-align:center;" class="disableSort">No.</th>
				<th hidden class="disableSort">ID</th>
				<th hidden class="disableSort">Week</th>
				<th style="text-align:center;" class="disableSort">Type Submission</th>
				<th style="text-align:center;" class="disableSort">AP VERSION</th>
				<th style="text-align:center;" class="disableSort">CP VERSION</th>
				<th style="text-align:center;" class="disableSort">CSC VERSION</th>
				<th style="text-align:center;" class="disableSort">Previous ID</th>
				<th class="disableSort">Progress</th>
				<th class="disableSort">Status</th>
				<th style="text-align:center;"  class="disableSort">Request Date</th>
				<th style="text-align:center;"  class="disableSort">Submission Date</th>	
				<th style="text-align:center;"  class="disableSort">Ontime Submission</th>	
				<th style="text-align:center;" class="disableSort">Ontime approved</th>
				<th style="text-align:center;"  class="disableSort">Deadline</th>	
				<th style="text-align:center;"  class="disableSort">Submission ID</th>
				<th style="text-align:center;"  class="disableSort">Reviewer</th>
				<th class="disableSort">Note</th>	
				<th class="disableSort disableFilterBy">PIC</th>
			</tr>
		</thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE status NOT LIKE 'APPROVED%' AND status NOT LIKE 'DROP/CANCEL%' ORDER BY `task`.`issue_id` DESC ");
$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Dhanar Kurnia' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskDhanar[] = $row['numRecords'];

$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Endri Susanto' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskEndri[] = $row['numRecords'];

$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Lutfi Bukhori' AND WEEK(request_date)=WEEK(CURDATE())");
$row = $query->fetch_array();    
$taskLutfi[] = $row['numRecords'];

$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Fazlur Rahman' AND WEEK(request_date)=WEEK(CURDATE())");
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
elseif($type == 'NORMAL EXCEPTION'){
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
	$sign = ($date1 > $date2) ? 'delay ' : '';
	$sign1 = ($date1 > $date2) ? ' days' : ' days left';
	$warnasign = ($date1 > $date2) ? '#F6635C' : '#7fb765';
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
		$sign2 = 'Deadline is ';
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
	$warna='#3e8339';
  }
  elseif(strpos($kodewarna,'PASSED')!==false){
	$warna='#3e8339';
  }
  else{
	$warna= 'red';
  }	
  if(strpos($kodewarnapic,'Endri Susanto')!==false){
	$warnapic='#7A86B6';
  }
  elseif(strpos($kodewarnapic,'Lutfi Bukhori')!==false){
	$warnapic='#647E68';
  }
  elseif(strpos($kodewarnapic,'Fazlur Rahman')!==false){
	$warnapic='#C996CC';
  }
  else{
	$warnapic='#D27685';
  }	
  if(strpos($kodewarnatype,'SMR')!==false){
	$warnatype='#ff6928';
  }
  elseif(strpos($kodewarnatype,'NORMAL EXCEPTION')!==false){
	$warnatype='#7fb765';
  }
  elseif(strpos($kodewarnatype,'SIMPLE EXCEPTION')!==false){
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
	$warna2='darkred';
  }
  else{
	$warna2='#ff6868';
  }
		echo "<tbody>";
		echo "<tr>";
		echo "<td style='text-align:center;'>".$nomor++."</td>";
		echo "<td hidden>".$data['issue_id']."</td>";	
		echo "<td hidden>".$data['week']."</td>";
		echo "<td style='text-align:center;'> "."<p style='display: inline-flex;color:white;background-color: $warnatype;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['type']."</td>";
        echo "<td style='text-align:center;font-weight: bold'>".$data['ap']."</td>";
		echo "<td style='text-align:center;font-weight: bold'>".$data['cp']."</td>";
		echo "<td style='text-align:center;font-weight: bold'>".$data['csc']."</td>";
		echo "<td>"."<p style='text-align:center;font-weight: bold'>".$data['baseid']."</p>"."</td>";

		echo "<td style='width:8%'>"."<div class='w3-round-xlarge w3-container' style='padding-left: 0px;padding-right: 0px;background-color:#b5b5b5'>
	<div class=' w3-dark-gray progress-bar-striped w3-round-xlarge active progress-bar' style='width:$persen;'>". $persen."</div>
	 </div>"."</td>";
		echo "<td>"."<p style='display: inline-flex;color:white;background-color: $warna;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight: bold'>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['request_date']."</td> ";
		echo "<td style='text-align:center;'>".$submited."</td>";
		echo "<td style='text-align:center;' $ontimesubmited>"."<p style='display: inline-flex;color:white;background-color:$warna1 ;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_submission']."</td> ";
		echo "<td style='text-align:center;' $ontimesubmited1>"."<p style='display: inline-flex;color:white;background-color: $warnasign;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign . abs($difference_submited). $sign1."</td>";
		echo "<td style='text-align:center;' $ontimeapproved>"."<p style='display: inline-flex;color:white;background-color:$warna2 ;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_approved']."</td> ";
  		echo "<td style='text-align:center;' $ontimeapproved1>"."<p style='display: inline-flex;color:white;background-color: $warnasign1;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign2 .$beda_approved. $sign3."</td>";
		echo "<td style='text-align:center;'>".$data['deadline']."</td>";
		echo "<td style='text-align:center;'>".$data['sid']."</td> ";
		echo "<td style='text-align:center;'>".$data['reviewer']."</td> ";
		echo "<td>".$data['note']."</td>";
		echo "<td>"."<p style='display: inline-flex;color:white;background-color: $warnapic;border-radius: 10px;padding-right:15px;text-align:left;font-weight: bold'><img src='../GBA_TASK/file/pe.ico' float:left height='25px' width='25px'>".$data['nama']."</p>"."</td>";
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
    voc_filter_by: 'Filter By ',
	voc_type_here_filter: 'Cari . . .',
    voc_show_rows: 'Rows Per Page '
  },
			pagination: true,
			showrows: [10,20,50,100],
			disableFilterBy: [1]
		});
		// $('.tablemanager').tablemanager();
	</script>
<script>
var xValues = ["Dhanar", "Endri", "Lutfi", "Fazlur"];
var yValues = [<?php echo json_encode($taskDhanar); ?>, <?php echo json_encode($taskEndri); ?>, <?php echo json_encode($taskLutfi); ?>, <?php echo json_encode($taskFazlur); ?>];
var barColors = [
  "#33b5e5",
  "#ff8a80",
  "#ffd180",
  "#86cb4f"
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
</html>