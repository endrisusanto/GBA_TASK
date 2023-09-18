<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=GBA_TASK_MONITOR.xls");
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
				<!-- <th class="disableSort">AP VERSION</th>
				<th class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort">PIC</th>
				<th class="disableSort">Request Date</th> -->
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
		echo "<td style='text-align:center;'>".$data['ap']."</td>";
		echo "<td style='text-align:center;' bgcolor=$warna>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['nama']."</td>";
		echo "<td style='text-align:center;'>".$data['request_date']."</td> ";
		echo "</tr>";		
		echo "</tbody>";
		?>
		<?php } ?>
	</table>
</body>
</html>