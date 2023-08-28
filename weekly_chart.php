<?php
//inisialisasi session
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gba_task";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);

$label = ["WEEK 1","WEEK 2","WEEK 3","WEEK 4","WEEK 5","WEEK 6","WEEK 7","WEEK 8","WEEK 9","WEEK 10","WEEK 11","WEEK 12","WEEK 13","WEEK 14","WEEK 15","WEEK 16","WEEK 17","WEEK 18","WEEK 19","WEEK 20","WEEK 21","WEEK 22","WEEK 23","WEEK 24","WEEK 25","WEEK 26","WEEK 27","WEEK 28","WEEK 29","WEEK 30","WEEK 31","WEEK 32","WEEK 33","WEEK 34","WEEK 35","WEEK 36","WEEK 37","WEEK 38","WEEK 39","WEEK 40","WEEK 41","WEEK 42","WEEK 43","WEEK 44","WEEK 45","WEEK 46","WEEK 47","WEEK 48","WEEK 49","WEEK 50","WEEK 51","WEEK 52","WEEK 53"];


for($minggu = 1;$minggu < 54;$minggu++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Endri Susanto' AND type='NORMAL EXCEPTION'  AND WEEK(request_date)='$minggu'");
    $row = $query->fetch_array();    
	$jumlah_produk[] = $row['numRecords'];
}

for($minggu1 = 1;$minggu1 < 54;$minggu1++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Dhanar Kurnia' AND type='NORMAL EXCEPTION' AND WEEK(request_date)='$minggu1'");
    $row = $query->fetch_array();    
	$jumlah_produk1[] = $row['numRecords'];
}

for($minggu2 = 1;$minggu2 < 54;$minggu2++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Lutfi Bukhori' AND type='NORMAL EXCEPTION' AND WEEK(request_date)='$minggu2'");
    $row = $query->fetch_array();    
	$jumlah_produk2[] = $row['numRecords'];
}
for($minggu8 = 1;$minggu8 < 54;$minggu8++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Fazlur Rahman' AND type='NORMAL EXCEPTION' AND WEEK(request_date)='$minggu8'");
    $row = $query->fetch_array();    
	$jumlah_produk7[] = $row['numRecords'];
}



for($minggu3 = 1;$minggu3 < 54;$minggu3++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE WEEK(request_date)='$minggu3'");
    $row = $query->fetch_array();    
	$jumlah_produk3[] = $row['numRecords'];
}



for($minggu4 = 1;$minggu4 < 54;$minggu4++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Endri Susanto' AND type='SMR'  AND WEEK(request_date)='$minggu4'");
    $row = $query->fetch_array();    
	$jumlah_produk4[] = $row['numRecords'];
}

for($minggu5 = 1;$minggu5 < 54;$minggu5++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Dhanar Kurnia' AND type='SMR' AND WEEK(request_date)='$minggu5'");
    $row = $query->fetch_array();    
	$jumlah_produk5[] = $row['numRecords'];
}

for($minggu6 = 1;$minggu6 < 54;$minggu6++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Lutfi Bukhori' AND type='SMR' AND WEEK(request_date)='$minggu6'");
    $row = $query->fetch_array();    
	$jumlah_produk6[] = $row['numRecords'];
}

for($minggu7 = 1;$minggu7 < 54;$minggu7++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Fazlur Rahman' AND type='SMR' AND WEEK(request_date)='$minggu7'");
    $row = $query->fetch_array();    
	$jumlah_produk8[] = $row['numRecords'];
}






for($hehe1 = 1;$hehe1 < 54;$hehe1++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Endri Susanto' AND type='SIMPLE EXCEPTION'  AND WEEK(request_date)='$hehe1'");
    $row = $query->fetch_array();    
	$jumlah_produk10[] = $row['numRecords'];
}

for($hehe2 = 1;$hehe2 < 54;$hehe2++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Dhanar Kurnia' AND type='SIMPLE EXCEPTION' AND WEEK(request_date)='$hehe2'");
    $row = $query->fetch_array();    
	$jumlah_produk11[] = $row['numRecords'];
}

for($hehe3 = 1;$hehe3 < 54;$hehe3++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Lutfi Bukhori' AND type='SIMPLE EXCEPTION' AND WEEK(request_date)='$hehe3'");
    $row = $query->fetch_array();    
	$jumlah_produk12[] = $row['numRecords'];
}

for($hehe4 = 1;$hehe4 < 54;$hehe4++)
{
	$query = mysqli_query($koneksi,"SELECT count(*) as numRecords, WEEK(`request_date`) as weekNum FROM task WHERE nama='Fazlur Rahman' AND type='SIMPLE EXCEPTION' AND WEEK(request_date)='$hehe4'");
    $row = $query->fetch_array();    
	$jumlah_produk13[] = $row['numRecords'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="img/logo.ico"/>
<script type="text/javascript" src="Chart.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task TEST</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/x-icon" href="file/pe.ico">
<meta property="og:image" content="http://107.102.39.55/pe_analisa/file/2.jpg" />
<meta property="og:title" content="GOOGLE BUILD APPROVAL" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>

	table{
	border-collapse: collapse;
    border-radius: 7px;
    background-color:white;
    text-align: center;
    font-size: 12px;
    }
   th {
    text-align: center;
   }
a {
    text-transform: uppercase;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:0px solid #ccc;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>
<body style="background-color:#343a40;" >
<ul>
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> DASHBOARD</a></li>
	  <li><a href="export_all.php"><span class="glyphicon glyphicon-link"></span>  EKSPORT EXCEL</a></li>
</ul>
</div>
</div>           
</div>    
<div class="parent-grid"> 
  <div class="parent-table">
  	<div class="child-table grid1">
		<div style="width: 99%;">
		<canvas id="myChart"></canvas>
	</div>	
	</div>
  </div> 
  </div>
</body>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($label); ?>,
        datasets: [{
            label: 'TOTAL/WEEK',
            
            data: <?php echo json_encode($jumlah_produk3); ?>,
            type: 'line',
            backgroundColor: 'rgba(162, 218, 77, 0)',  
            borderColor:'rgba(255, 255, 255, 1)',
            borderWidth:1,
            pointRadius:4,
            pointBorderWidth:2,
            pointStyle:'line'
        },{
            
            label: 'Endri NORMAL',
            data: <?php echo json_encode($jumlah_produk); ?>,
            backgroundColor: 'rgba(33, 108, 155, 1)',
           
            stack:'stack 0'
            
        },{
          label: 'Endri SMR',
            data: <?php echo json_encode($jumlah_produk4); ?>,
            backgroundColor: 'rgba(77, 162, 218, 1)',
            stack:'stack 0',
            borderWidth:1,
            borderColor:'rgba(255, 255, 255, 1)'
        },{
          label: 'Endri SIMPLE',
            data: <?php echo json_encode($jumlah_produk10); ?>,
            backgroundColor: 'rgba(255, 255,255, 1)',
            stack:'stack 0',
            borderWidth:0,
            borderColor:'rgba(255, 255, 255, 1)'
        },{
            label: 'Dhanar NORMAL',
            data: <?php echo json_encode($jumlah_produk1); ?>,
            backgroundColor:'rgba(249, 0, 49, 1)',
            
            stack:'stack 1'
        },{
          label: 'Dhanar SMR',
            data: <?php echo json_encode($jumlah_produk5); ?>,
            backgroundColor:'rgba(255, 99, 132, 1)',
            stack:'stack 1',
            borderWidth:1,
            borderColor:'rgba(255, 255, 255, 1)'
        },{
          label: 'Dhanar SIMPLE',
            data: <?php echo json_encode($jumlah_produk11); ?>,
            backgroundColor: 'rgba(255, 255,255, 1)',
            stack:'stack 0',
            borderWidth:0,
            borderColor:'rgba(255, 255, 255, 1)'
        },{
            label: 'Lutfi NORMAL',
            data: <?php echo json_encode($jumlah_produk2); ?>,
            backgroundColor: 'rgba(108, 155, 33, 1)',  
            
            stack:'stack 2'





          },{
            
           
       
            label: 'Lutfi SMR',
            data: <?php echo json_encode($jumlah_produk6); ?>,
            backgroundColor: 'rgba(162, 218, 77, 1)', 
            stack:'stack 2',
            borderWidth:1,
            borderColor:'rgba(255, 255, 255, 1)'
          },{
            label: 'Lutfi SIMPLE',
            data: <?php echo json_encode($jumlah_produk12); ?>,
            backgroundColor: 'rgba(255, 255,255, 1)',
            stack:'stack 0',
            borderWidth:0,
            borderColor:'rgba(255, 255, 255, 1)'
        },{

            label: 'Fazlur NORMAL',
            data: <?php echo json_encode($jumlah_produk7); ?>,
            backgroundColor: 'rgba(241, 155, 33, 1)',              
            stack:'stack 3'
          },{            
            label: 'Fazlur SMR',
            data: <?php echo json_encode($jumlah_produk8); ?>,
            backgroundColor: 'rgba(247, 234, 23, 1)', 
            stack:'stack 3',
            borderWidth:1,
            borderColor:'rgba(255, 255, 255, 1)'  
          },{  
            label: 'Fazlur SIMPLE',
            data: <?php echo json_encode($jumlah_produk13); ?>,
            backgroundColor: 'rgba(255, 255,255, 1)',
            stack:'stack 0',
            borderWidth:0,
            borderColor:'rgba(255, 255, 255, 1)'
        }]
        
    },
    options: {

        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</html>