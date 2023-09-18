<?php 
$koneksi = mysqli_connect("localhost","root","","gba_task");
$nama = $_POST['nama'];
$week = $_POST['week'];
$type = $_POST['type'];
$ap = $_POST['ap'];
$cp = $_POST['cp'];
$csc = $_POST['csc'];
$baseid = $_POST['baseid'];
$request_date = $_POST['request_date'];
$deadline = $_POST['deadline'];
$status = $_POST['status'];
$note = $_POST['note'];
date_default_timezone_set("Asia/Jakarta");
$rand = date("Y.m.d_H.i.s");
$issueid = date("ymd_His");
$timestamp = date("Y.m.d_H.i.s")."_".$_SERVER['REMOTE_ADDR'];
if($type == 'NORMAL'){
	$issue_id = 'N'.$issueid;
}
else if ($type == 'SMR'){
	$issue_id = 'M'.$issueid;
}
else if ($type == 'SIMPLE'){
	$issue_id = 'S'.$issueid;
}
else {
	$issue_id = 'R'.$issueid;
}

if($ap > '0'){		
	if($cp > '0'){
		mysqli_query($koneksi,"INSERT INTO task VALUES('', '$issue_id', '$nama', '$week', '$type', '$ap',  '$cp','$csc', '$baseid', '', '', '','$status', '$request_date', 'TBD', 'TBD', '$deadline', 'TBD', 'TBD', '$note','',  '$timestamp')"); 
		header("location:active_task.php?alert=berhasil_disimpan");
	}
	else{
	mysqli_query($koneksi,"INSERT INTO task VALUES('', '$issue_id', '$nama', '$week', '$type', '$ap',  '-','$csc', '$baseid', '', '', '','$status', '$request_date', 'TBD', 'TBD', '$deadline', 'TBD', 'TBD', '$note','',  '$timestamp')"); 
	header("location:active_task.php?alert=berhasil_disimpan");
	}
}else{ 
	header("location:input.php?alert=data_tidak_boleh_kosong");
}
?>