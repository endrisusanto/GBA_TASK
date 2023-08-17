<?php 
$koneksi = mysqli_connect("localhost","root","","gba_task");
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM task WHERE id='$id'"); 
header("location:active_task.php?pesan=berhasil_hapus");
?>