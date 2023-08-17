<?php 
$koneksi = mysqli_connect("localhost","root","","gba_task");
$id = $_POST['id'];
$nama = $_POST['nama'];
$week = $_POST['week'];
$type = $_POST['type'];
$model = $_POST['model'];
$place = $_POST['place'];
$issue = $_POST['issue'];
$cause = $_POST['cause'];
$sample_recieve = $_POST['sample_recieve'];
$sample_analyze = $_POST['sample_analyze'];
$status = $_POST['status'];
$issue_id = $_POST['issue_id'];
date_default_timezone_set("Asia/Jakarta");
$rand = date("Y.m.d_H.i.s");
$timestamp = date("Y.m.d_H.i.s")."_".$_SERVER['REMOTE_ADDR'];
$ekstensi =  array('png','jpg','jpeg','gif','pdf','doc','docx');
$filename = $_FILES['report']['name'];
$ukuran = $_FILES['report']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$xx = $rand.'_'.$filename;

if($ukuran > 0 ){		
move_uploaded_file($_FILES['report']['tmp_name'], 'file/'.$rand.'_'.$filename);
mysqli_query($koneksi,"UPDATE analisa SET issue_id='$issue_id',nama='$nama',week='$week',type='$type',model='$model',place='$place',issue='$issue',cause='$cause',sample_recieve='$sample_recieve',sample_analyze='$sample_analyze',report='$xx',status='$status',timestamp='$timestamp' WHERE id='$id'");
header("location:active_issue.php?pesan=update");
}
else{    
    if($sample_analyze >0){
        mysqli_query($koneksi,"UPDATE analisa SET issue_id='$issue_id',nama='$nama',week='$week',type='$type',model='$model',place='$place',issue='$issue',cause='$cause',sample_recieve='$sample_recieve',sample_analyze='$sample_analyze',status='$status',timestamp='$timestamp' WHERE id='$id'");
        header("location:active_issue.php?pesan=update_berhasil");    
    }
    else{
        mysqli_query($koneksi,"UPDATE analisa SET issue_id='$issue_id',nama='$nama',week='$week',type='$type',model='$model',place='$place',issue='$issue',cause='$cause',sample_recieve='$sample_recieve',sample_analyze='N/A',status='$status',timestamp='$timestamp' WHERE id='$id'");
        header("location:active_issue.php?pesan=update_berhasil");
    }
}
?>