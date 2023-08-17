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
	$query = "SELECT COUNT(status) AS count FROM task WHERE status LIKE '%Issue Baru%' "; 
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

?>
<!DOCTYPE html>
<html>
	
<head>
<title>GOOGLE BUILD APPROVAL</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/x-icon" href="file/pe.ico">
<meta property="og:image" content="http://107.102.39.55/pe_analisa/file/2.jpg" />
<meta property="og:title" content="PE QUALITY PORTAL" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="index.php">GOOGLE BUILD APPROVAL</a>
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
			<a class="btn btn-success navbar-btn" href="input.php">Tambah Data</a>
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
	padding: 5px;
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
	background:#33b5e5;
	font-size: 30px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.baru {
	background:#ff8a80;
	font-size: 30px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.jalan {
	background:#ffd180;
	font-size: 30px;
	text-align: center;
	color: white;
	font-weight: 1000;}
.panel-body.finish {
	background:#86cb4f;
	font-size: 30px;
	text-align: center;
	color: white;
	font-weight: 1000;}
</style>
<body>
<div class="container-fluid">
<div class="panel panel-default">
	<div class="panel-body status">
		<div class="col-sm-3" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>TOTAL TASK</b></div>
					<div class="panel-body total"><?php echo $total ?></div>
			</div>
		</div> 
		<div class="col-sm-3" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>TASK BARU</b></div>
					<div class="panel-body baru"><?php echo $baru ?></div>
			</div>
		</div> 
		<div class="col-sm-3" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>PROGRESS</b></div>
					<div class="panel-body jalan"><?php echo $progress ?></div>
			</div>
		</div> 
		
		<div class="col-sm-3" >
			<div class="panel panel-default">
				<div class="panel-heading center"><b>FINISH</b></div>
					<div class="panel-body finish"><?php echo $finish ?></div>
			</div>
		</div> 
	</div> 
</div>

	<table  class="tablemanager">
		<thead>
			<tr>
				<th style="text-align:center;" class="disableSort">No.</th>
				<th class="disableSort">Issue ID</th>
				<th class="disableSort">Week</th>
				<th class="disableSort">Type</th>
                <th class="disableSort">Model</th>
				<th class="disableSort">Place</th>
				<th class="disableSort">Issue</th>
				<th class="disableSort">Cause</th>
				<th class="disableSort">Sample Recieve</th>
				<th class="disableSort">Sample Analyzed</th>
				<th style="text-align:center;" class="disableSort">Report</th>	
				<th class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort">PIC</th>
				<!-- <th style="text-align:center;" class="disableSort">Member</th> -->
			</tr>
		</thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE 1 ORDER BY `task`.`sample_recieve` DESC ");
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
	$kodewarna = $data['status'];
	$file = 'file/'.$data['report'];
if($data['report'] > 1){
	$filename='<span class="glyphicon glyphicon-eye-open"></span>';
}
else{
	$filename='';
}
if(strpos($kodewarna,'Progress')!==false){
	$warna='#fff200';
  }
  elseif(strpos($kodewarna,'Issue Baru')!==false){
	$warna='#ff6928';
  }
  elseif(strpos($kodewarna,'Finish')!==false){
	$warna='#7fb765';
  }
  else{
	$warna='white';
  }		
		echo "<tbody>";
		echo "<tr>";
		echo "<td style='text-align:center;'>".$nomor++."</td>";
		echo "<td>".$data['issue_id']."</td>";
		echo "<td>".$data['week']."</td>";
		echo "<td>".$data['type']."</td>";
        echo "<td>".$data['model']."</td>";
		echo "<td>".$data['place']."</td>";
		echo "<td>".$data['issue']."</td>";
		echo "<td style='width: 20%;'>".$data['cause']."</td>";
		echo "<td>".$data['sample_recieve']."</td>";
		echo "<td>".$data['sample_analyze']."</td> ";
		echo "<td style='text-align:center;'><a href='$file'>".$filename."</a></td>";
		echo "<td bgcolor=$warna>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['nama']."</td>";
		// echo "<td style='text-align:center;'>".$data['part']."</td>";
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
			showrows: [15,20,50,100],
			disableFilterBy: [1]
		});
		// $('.tablemanager').tablemanager();
	</script>
</html>