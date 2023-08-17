<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=PE_Analisa_Data_User.xls");
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
				<th class="disableSort">ID Issue</th>
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
				<th style="text-align:center;" class="disableSort">Member</th>
                <th class="disableSort">Timestamp_IP HOST</th>
			</tr>
		</thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
$pengguna = $_SESSION['name'];
$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE nama='$pengguna' ORDER BY `task`.`id` ASC ");
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
		echo "<td style='text-align:center;'>".$data['issue_id']."</td>";
		echo "<td style='text-align:center;'>".$data['week']."</td>";
		echo "<td style='text-align:center;'>".$data['type']."</td>";
		echo "<td style='text-align:center;'>".$data['place']."</td>";
		echo "<td style='text-align:center;'>".$data['model']."</td>";
		echo "<td style='text-align:center;'>".$data['issue']."</td>";
		echo "<td style='text-align:center;'>".$data['cause']."</td>";
		echo "<td style='text-align:center;'>".$data['sample_recieve']."</td>";
		echo "<td style='text-align:center;'>".$data['sample_analyze']."</td> ";
		echo "<td>".$data['report']."</td>";
		echo "<td style='text-align:center;' bgcolor=$warna>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['nama']."</td>";
		echo "<td style='text-align:center;'>".$data['part']."</td>";
        echo "<td style='text-align:center;'>".$data['timestamp']."</td>";
		echo "</tr>";		
		echo "</tbody>";
		?>
		<?php } ?>
	</table>
</body>
</html>