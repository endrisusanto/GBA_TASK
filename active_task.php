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
            <li><a href="password.php"><span class="glyphicon glyphicon-cog"></span> SETTING</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-signal"></span> <?php echo "YOUR IP : " . $_SERVER['REMOTE_ADDR'];?> </a></li>
      		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
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
				<th hidden class="disableSort">Week</th>
				<th hidden class="disableSort">ID</th>
				<th style="text-align:center;" class="disableSort">Type Submission</th>
				<th style="text-align:center;" class="disableSort">AP Version</th>
				<th style="text-align:center;" class="disableSort">CP Version</th>
				<th style="text-align:center;" class="disableSort">CSC Version</th>
				<th style="text-align:center;" class="disableSort">Previous ID</th>
				<th style="text-align:center;" class="disableSort">Email</th>
				<th style="text-align:center;" class="disableSort">Progress</th>
				<th style="text-align:center;" class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort">Request Date</th>
				<th style="text-align:center;" class="disableSort">Submission Date</th>	
				<th style="text-align:center;" class="disableSort">Ontime Submission</th>
				<th style="text-align:center;" class="disableSort">Deadline</th>		
				<th style="text-align:center;"  class="disableSort">Submission ID</th>
				<th style="text-align:center;"  class="disableSort">Reviewer</th>
				<th class="disableSort disableFilterBy">GBA Letter</th>	
				<th class="disableSort disableFilterBy">NOTE</th>	
				<th style="text-align:center;" class="disableSort disableFilterBy">Action</th>	

			</tr>
            
            </thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
if ($_SESSION['level']=='super user'){
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE status NOT LIKE 'APPROVED%' AND status NOT LIKE 'DROP/CANCEL%' ORDER BY `task`.`issue_id` DESC ");
}
else{
	$pengguna = $_SESSION['name'];
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE nama='$pengguna' AND status NOT LIKE 'APPROVED%' AND status NOT LIKE 'DROP/CANCEL%' ORDER BY `task`.`issue_id` DESC ");	
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
	$baseid =$data['baseid'];
	$loading =$data['progress'];
    $loading1 = explode(',',$loading);
	$totalElements = count($loading1)-'1';
	$percentage = ($totalElements / $persentype) * 100;
	$persen = number_format($percentage) . '%';
	$date1 = new DateTime();
    $date2 = new DateTime($data['deadline']);    
    $interval = $date1->diff($date2);
    $difference = $interval->days;
	$sign = ($date1 > $date2) ? 'delay ' : '';
	$sign1 = ($date1 > $date2) ? ' days' : ' days left';
	$warnasign = ($date1 > $date2) ? '#ff6928' : '#7fb765';
	if($data['submission_date'] == 0){
		$submited = 'TBD';
	}
	else {
		$submited = $data['submission_date'];
	}
	if($data['ontime_submission'] == 'TBD'){
		$ontime = 'hidden';
		$ontime1= '';
	}
	else {
		$ontime = '';
		$ontime1 = 'hidden';
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
	$warnatype='#ff5b5b';
  }
		echo "<tbody>";
		echo "<tr>";
		echo "<td style='text-align:center;'>".$nomor++."</td>";
		echo "<td>"."<p style='display: inline-flex;color:white;background-color: $warnapic;border-radius: 10px;padding-right:15px;text-align:left;font-weight: bold'><img src='../GBA_TASK/file/pe.ico'  height='25px' width='25px'>".$data['nama']."</p>"."</td>";	
		echo "<td hidden>".$data['issue_id']."</td>";
		echo "<td hidden>".$data['week']."</td>";
		echo "<td style='text-align:center;'> "."<p style='display: inline-flex;color:white;background-color: $warnatype;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['type']."</td>";
		echo "<td style='text-align:center;'>".$data['ap']."</td>";
		echo "<td style='text-align:center;'>".$data['cp']."</td>";
		echo "<td style='text-align:center;'>".$data['csc']."</td>";
		// echo "<td>"."<p style='text-align:center;font-weight: bold'>".$data['baseid']."</p>"."</td>";
		echo "<td style='text-align:center;'>"."<button style='background: none;border: none;text-decoration: none;' type='button' email='$baseid' onclick='salin(this)'>".$baseid."</button>"."</td> ";
		echo "<td style='text-align:center;'>"."<button style='background: none;border: none;text-decoration: none;' type='button' email='endri.s@samsung.com,fazlur.r@samsung.com,lufti.b@samsung.com,danar.kurnia@samsung.com,aulia.am@samsung.com' onclick='salin(this)'><span class='glyphicon glyphicon-envelope'></span></button>"."</td> ";
		echo "<td style='width:6%'>"."<div class='w3-round-xlarge w3-container' style='padding-left: 0px;padding-right: 0px;background-color:#b5b5b5'>
	<div class='w3-dark-grey w3-normal progress-bar-striped w3-round-xlarge active progress-bar' style='width:$persen'>". $persen."</div>
	 </div>"."</td>";
		echo "<td style='text-align:center;'>"."<p style='display: inline-flex;color:white;background-color: $warna;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight: bold'>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['request_date']."</td> ";
		echo "<td style='text-align:center;'>".$submited."</td> ";
		echo "<td style='text-align:center;' $ontime>"."<p style='display: inline-flex;color:white;background-color:$warnasubmission;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_submission']."</td> ";
		echo "<td style='text-align:center;' $ontime1>"."<p style='display: inline-flex;color:white;background-color: $warnasign;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign . abs($difference). $sign1."</td>";
		echo "<td style='text-align:center;'>".$data['deadline']."</td> ";
		echo "<td style='text-align:center;'>".$data['sid']."</td> ";
		echo "<td style='text-align:center;'>".$data['reviewer']."</td> ";
		echo "<td style='text-align:center;'><a href='$file'>".$filename."</a></td>";
        echo "<td>".$data['note']."</td>";
		echo "<td style='text-align:center;'>";	
		echo "<a class='btn btn-warning' href='edit.php?id=$data[id]'>Update</a> ";			
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
	textArea.focus({preventScroll: true});
    setTimeout(() => {
        btn.innerHTML = tmp;
        btn.disabled = false;
    }, 1500);
};
</script>
</html>