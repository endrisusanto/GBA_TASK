<?php 
$koneksi = mysqli_connect("localhost","root","","gba_task");
$id = $_POST['id'];
$note = $_POST['note'];
$nama = $_POST['nama'];
$week = $_POST['week'];
$type = $_POST['type'];
$ap = $_POST['ap'];
$cp = $_POST['cp'];
$csc = $_POST['csc'];
$baseid = $_POST['baseid'];
$sid = $_POST['sid'];
$reviewer = $_POST['reviewer'];
$status = $_POST['status'];
$request_date = $_POST['request_date'];
$submission_date = $_POST['submission_date'];
$ontime_submission = $_POST['ontime_submission'];
$deadline = $_POST['deadline'];
$approved_date = $_POST['approved_date'];
$ontime_approved = $_POST['ontime_approved'];
$lang = $_POST['progress'];
$lang1 = implode(",",$lang);
$issue_id = $_POST['issue_id'];
date_default_timezone_set("Asia/Jakarta");
$rand = date("Y.m.d_H.i.s");
$timestamp = date("Y.m.d_H.i.s")."_".$_SERVER['REMOTE_ADDR'];
$ekstensi =  array('png','jpg','jpeg','gif','pdf','doc','docx');
$filename = $_FILES['report']['name'];
$ukuran = $_FILES['report']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$xx = $rand.'_'.$filename;
$typeberubah = $_POST['berubah'];

if($ukuran > 0 ){		
move_uploaded_file($_FILES['report']['tmp_name'], 'file/'.$rand.'_'.$filename);
mysqli_query($koneksi,"UPDATE task SET issue_id='$issue_id',nama='$nama',week='$week',type='$type',ap='$ap',cp='$cp',csc='$csc',baseid='$baseid',sid='$sid',reviewer='$reviewer',progress='$lang1',status='$status',request_date='$request_date',submission_date='$submission_date',ontime_submission='$ontime_submission',deadline='$deadline',approved_date='$approved_date',ontime_approved='$ontime_approved',note='$note',report='$xx',timestamp='$timestamp'  WHERE id='$id'");
header("location:active_task.php?pesan=update");
}
else{    
    if($typeberubah > 0){
        mysqli_query($koneksi,"UPDATE task SET issue_id='$issue_id',nama='$nama',week='$week',type='$type',ap='$ap',cp='$cp',csc='$csc',baseid='$baseid',sid='$sid',reviewer='$reviewer',progress='',status='Task Baru !',request_date='$request_date',submission_date='N/A',ontime_submission='N/A',deadline='$deadline',approved_date='$approved_date',ontime_approved='$ontime_approved',note='$note',timestamp='$timestamp',report=''  WHERE id='$id'");
        header("location:active_task.php?pesan=update_berhasil");    
    }
    else{
        mysqli_query($koneksi,"UPDATE task SET issue_id='$issue_id',nama='$nama',week='$week',type='$type',ap='$ap',cp='$cp',csc='$csc',baseid='$baseid',sid='$sid',reviewer='$reviewer',progress='$lang1',status='$status',request_date='$request_date',submission_date='$submission_date',ontime_submission='$ontime_submission',deadline='$deadline',approved_date='$approved_date',ontime_approved='$ontime_approved',note='$note',timestamp='$timestamp'  WHERE id='$id'");
        header("location:active_task.php?pesan=update_berhasil");
    }
}
?>