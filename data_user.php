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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/x-icon" href="file/pe.ico">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	a.thick {
  font-weight: bold;
}
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GOOGLE BUILD APPROVAL</a>
    </div>
      <ul class="nav navbar-nav navbar-right">      
	  <li class="dropdown"><a class="dropdown-toggle thick" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hi , <?php if( !isset($_SESSION['name']) ){    echo "Selamat Datang !" ;}   else{    echo $_SESSION['name']." [".$_SESSION['level']."]" ;}    ?>
        <ul class="dropdown-menu">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> DASHBOARD</a></li>
            <li><a href="active_task.php"><span class="glyphicon glyphicon-exclamation-sign"></span> ACTIVE TASK</a></li>
            <li><a href="password.php"><span class="glyphicon glyphicon-user"></span> SETTING</a></li>
      		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
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
			font-size: 11px;		}
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
				<th style="text-align:center;" class="disableSort">PIC</th>
				<th class="disableSort">AP VERSION</th>
				<th class="disableSort">CP VERSION</th>
				<th class="disableSort">CSC VERSION</th>				
				<th hidden class="disableSort disableFilterBy">ID Issue</th>
				<th hidden class="disableSort">Week</th>
				<th style="text-align:center;" class="disableSort">Previous ID</th>
				<th style="text-align:center;" class="disableSort">Progress</th>
				<th style="text-align:center;" class="disableSort">Type Submission</th>
				<th style="text-align:center;" class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort disableFilterBy">Request Date</th>
				<th style="text-align:center;" class="disableSort disableFilterBy">Submission Date</th>	
				<th style="text-align:center;" class="disableSort disableFilterBy">Deadline</th>		
				<th style="text-align:center;" class="disableSort disableFilterBy">Approved Date</th>	
				<th style="text-align:center;" class="disableSort disableFilterBy">Ontime Submission</th>	
				<th style="text-align:center;" class="disableSort disableFilterBy">Ontime approved</th>			
				<th style="text-align:center;" class="disableSort">Submission ID</th>
				<th style="text-align:center;" class="disableSort disableFilterBy">Reviewer</th>
				<th style="text-align:center;" class="disableSort disableFilterBy">GBA Letter</th>					
				<th class="disableSort">Note</th>
				<?php
					$level = $_SESSION['level'];
					if ($level=="super user"){
					echo "<th style='text-align:center;' class='disableSort disableFilterBy'>"."ACTION"."</th>";
					}
					else{
					echo "<th style='text-align:center;' class='disableSort disableFilterBy'>"."ACTION"."</th>";	
					}
					// <th style="text-align:center;" class="disableSort">ACTION</th>
				?>
			</tr>
            
            </thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
if ($_SESSION['level']=='super user'){
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE 1 ORDER BY `task`.`id` DESC ");
}
else{
		$pengguna = $_SESSION['name'];
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE 1  ORDER BY `task`.`id` DESC ");	
	}
// else{
// 	$pengguna = $_SESSION['name'];
// 	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE nama='$pengguna'  ORDER BY `task`.`id` DESC ");	
// }
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
	$level = $_SESSION['level'];
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
  echo "<td>"."<p style='display: inline-flex;color:white;background-color: $warnapic;border-radius: 10px;padding-right:15px;text-align:left;font-weight: bold'><img style='border-radius: 40%;' float:left height='30px' width='25px' src='../tkdn/images/".$data['nama'].".jpg'>".$data['nama']."</p>"."</td>";	
  echo "<td>".$data['ap']."</td>";
  echo "<td>".$data['cp']."</td>";
  echo "<td>".$data['csc']."</td>";  
  echo "<td hidden>".$data['issue_id']."</td>";
  echo "<td hidden>".$data['week']."</td>";
  
  echo "<td>"."<p style='text-align:center;font-weight: bold'>".$data['baseid']."</p>"."</td>";
  echo "<td style='width:6%;'>"."<div class='w3-round-xlarge w3-container' style='padding-left: 0px;padding-right: 0px;background-color:#b5b5b5'>
<div class='w3-dark-blue progress-bar-striped w3-round-xlarge active progress-bar' style='width:$persen'>". $persen."</div>
</div>"."</td>";
  echo "<td style='text-align:center;'> "."<p style='display: inline-flex;color:white;background-color: $warnatype;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['type']."</td>";


  echo "<td style='text-align:center;'>"."<p style='display: inline-flex;color:white;background-color: $warna;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight: bold'>".$data['status']."</td>";
  echo "<td style='text-align:center;width:4%'>".$data['request_date']."</td> ";
  echo "<td style='text-align:center;width:4%'>".$submited."</td> ";
  echo "<td style='text-align:center;width:4%'>".$data['deadline']."</td> ";
  echo "<td style='text-align:center;width:4%'>".$approved."</td> ";
  echo "<td style='text-align:center;' $ontimesubmited>"."<p style='display: inline-flex;color:white;background-color:$warna1;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_submission']."</td> ";
  echo "<td style='text-align:center;' $ontimesubmited1>"."<p style='display: inline-flex;color:white;background-color: $warnasign;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign . $beda_submited. $sign1."</td>";
  
  echo "<td style='text-align:center;' $ontimeapproved>"."<p style='display: inline-flex;color:white;background-color:$warna2 ;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$data['ontime_approved']."</td> ";
  echo "<td style='text-align:center;' $ontimeapproved1>"."<p style='display: inline-flex;color:white;background-color: $warnasign1;border-radius: 10px;padding-left:15px;padding-right:15px;text-align:center;font-weight:bold'>".$sign2 . $beda_approved. $sign3."</td>";
  echo "<td style='text-align:center;'>".$data['sid']."</td> ";
  echo "<td style='text-align:right;'>".$data['reviewer']."</td> ";
  echo "<td style='text-align:center;'><a href='$file'>".$filename."</a></td>";
  echo "<td style='width:6%'>".$data['note']."</td>";
  if ($level=="super user"){
	
	echo "<td style='text-align:center;'>";	
	echo "<a class='btn btn-warning' href='edit.php?id=$data[id]'><span class='glyphicon glyphicon-edit'></span></a> ";	
	echo "<a onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger' href='hapus.php?id=$data[id]'><span class='glyphicon glyphicon-trash'></span></a>";
	echo "</td>";
}	
else{
	if($pengguna == $data['nama']){
	echo "<td style='text-align:center;'>";	
	echo "<a class='btn btn-warning' href='edit.php?id=$data[id]'><span class='glyphicon glyphicon-edit'></span></a> ";	
	echo "</td>";
}
else{
	echo "<td style='text-align:center;'>";	
	echo "<a class='btn btn-warning' href='view.php?id=$data[id]'><span class='glyphicon glyphicon-edit'></span></a> ";	
	echo "</td>";
}
}		
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
			disableFilterBy: [0]
		});
		// $('.tablemanager').tablemanager();
</script>

</html>