<?php 
$koneksi = mysqli_connect("localhost","root","","gba_task");
$nama = $_POST['nama'];
$part = $_POST['part'];
$week = $_POST['week'];
$type = $_POST['type'];
$model = $_POST['model'];
$place = $_POST['place'];
$issue = $_POST['issue'];
$cause = $_POST['cause'];
$sample_recieve = $_POST['sample_recieve'];
$sample_analyze = $_POST['sample_analyze'];
$status = $_POST['status'];
date_default_timezone_set("Asia/Jakarta");
$rand = date("Y.m.d_H.i.s");
$issue_id = date("mdHis");
$timestamp = date("Y.m.d_H.i.s")."_".$_SERVER['REMOTE_ADDR'];
$ekstensi =  array('png','jpg','jpeg','gif','pdf','doc','docx');
$filename = $_FILES['report']['name'];
$ukuran = $_FILES['report']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($ukuran > 0){		
	$xx = $rand.'_'.$filename;
	move_uploaded_file($_FILES['report']['tmp_name'], 'file/'.$rand.'_'.$filename);
	mysqli_query($koneksi,"INSERT INTO task VALUES('', '$issue_id', '$nama', '$week', '$type', '$model',  '$place','$issue', '$cause', '$sample_recieve', '$sample_analyze', '$xx', '$status', '$timestamp', '$part')"); 
	header("location:active_issue.php?alert=berhasil_disimpan");
}else{
	mysqli_query($koneksi,"INSERT INTO task VALUES('', '$issue_id', '$nama', '$week', '$type', '$model',  '$place','$issue', '$cause', '$sample_recieve', 'N/A', '', '$status', '$timestamp', '$part')"); 
	header("location:active_issue.php?alert=berhasil_disimpan_tanpa_attachment");
}
?>