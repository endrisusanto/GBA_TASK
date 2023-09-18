<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=GBA_All.xls");
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
	<title>Export Data Ke Excel</title>
</head>
<body>
<table  border="1">
		<thead>
			<tr>
				<th style="text-align:center;" class="disableSort">No.</th>
				<th  class="disableSort">ID Issue</th>
				<th hidden class="disableSort">Week</th>
				<th style="text-align:center;" class="disableSort">Type Submission</th>
				<th class="disableSort">AP VERSION</th>
				<th class="disableSort">CP VERSION</th>
				<th class="disableSort">CSC VERSION</th>
				<th style="text-align:center;" class="disableSort">Previous ID</th>
				<th class="disableSort">Status</th>
				<th class="disableSort">Progress</th>
				<th class="disableSort">Request Date</th>
				<th class="disableSort">Submission Date</th>	
				<th class="disableSort">Ontime Submission</th>
				<th class="disableSort">Deadline</th>		
				<th class="disableSort">Approved Date</th>		
				<th class="disableSort">Ontime approved</th>			
				<th style="text-align:center;"  class="disableSort">Submission ID</th>
				<th style="text-align:center;"  class="disableSort">Reviewer</th>
				<th class="disableSort disableFilterBy">GBA Letter</th>					
				<th class="disableSort">Note</th>
				<th style="text-align:center;" class="disableSort">PIC</th>
                <th class="disableSort">Timestamp_IP HOST</th>
			</tr>
		</thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
$pengguna = $_SESSION['name'];
$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE 1 ORDER BY `task`.`id` DESC ");
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
	$kodewarna = $data['status'];
	
if($data['report'] > 1){
	$filename='<span class="glyphicon glyphicon-eye-open"></span>';
	$file = 'http://107.102.39.55/tkdn/file/'.$data['report'];
}
else{
	$filename='';
	$file='';

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
		echo "<tbody>";
		echo "<tr>";
		echo "<td style='text-align:center;'>".$nomor++."</td>";
		echo "<td style='text-align:center;'>".$data['issue_id']."</td>";
		echo "<td style='text-align:center;'>".$data['week']."</td>";
		echo "<td style='text-align:center;'>".$data['type']."</td>";
		echo "<td style='text-align:center;'>".$data['ap']."</td>";
		echo "<td style='text-align:center;'>".$data['cp']."</td>";
		echo "<td style='text-align:center;'>".$data['csc']."</td>";
		echo "<td style='text-align:center;'>"."'".$data['baseid']."</td>";
		echo "<td style='text-align:center;' bgcolor=$warna>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['progress']."</td> ";
		echo "<td style='text-align:center;'>".$data['request_date']."</td> ";
		echo "<td style='text-align:center;'>".$data['submission_date']."</td> ";
		echo "<td style='text-align:center;'>".$data['ontime_submission']."</td> ";
		echo "<td style='text-align:center;'>".$data['deadline']."</td> ";
		echo "<td style='text-align:center;'>".$data['approved_date']."</td> ";
		echo "<td style='text-align:center;'>".$data['ontime_approved']."</td> ";
		echo "<td style='text-align:center;'>"."'".$data['sid']."</td> ";
		echo "<td style='text-align:center;'>".$data['reviewer']."</td> ";
		echo "<td>".$file."</td>";
		echo "<td style='text-align:center;'>".$data['note']."</td>";
		echo "<td style='text-align:center;'>".$data['nama']."</td>";
        echo "<td style='text-align:center;'>".$data['timestamp']."</td>";
		echo "</tr>";		
		echo "</tbody>";
		?>
		<?php } ?>
	</table>
</body>
</html>