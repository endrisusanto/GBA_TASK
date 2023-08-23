<?php 
$koneksi = mysqli_connect("localhost","root","","gba_task");
$nama = $_POST['nama'];
$week = $_POST['week'];
$type = $_POST['type'];
$ap = $_POST['ap'];
$cp = $_POST['cp'];
$csc = $_POST['csc'];
$request_date = $_POST['request_date'];
$deadline = $_POST['deadline'];
$status = $_POST['status'];
date_default_timezone_set("Asia/Jakarta");
$rand = date("Y.m.d_H.i.s");
$issue_id = date("dmY_His");
$timestamp = date("Y.m.d_H.i.s")."_".$_SERVER['REMOTE_ADDR'];

if($ap > 0){		
	mysqli_query($koneksi,"INSERT INTO task VALUES('', '$issue_id', '$nama', '$week', '$type', '$ap',  '$cp','$csc', '','$status', '$request_date', 'N/A', 'N/A', '$deadline', '', '', '','',  '$timestamp')"); 
	header("location:active_task.php?alert=berhasil_disimpan");
}else{ 
	header("location:input.php?alert=data_tidak_boleh_kosong");
}
?>