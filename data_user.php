<?php
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
<title>MANAGE TASK</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/x-icon" href="file/pe.ico">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	a.thick {
  font-weight: bold;
}
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GOOGLE BUILD APPROVAL</a>
    </div>
      <ul class="nav navbar-nav navbar-right">      
	  <li class="dropdown"><a class="dropdown-toggle thick" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hi , <?php if( !isset($_SESSION['name']) ){    echo "Selamat Datang !" ;}   else{    echo $_SESSION['name']." [".$_SESSION['level']."]" ;}    ?>
        <ul class="dropdown-menu">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> DASHBOARD</a></li>
            <li><a href="active_task.php"><span class="glyphicon glyphicon-exclamation-sign"></span> ACTIVE TASK</a></li>
            <li><a href="password.php"><span class="glyphicon glyphicon-user"></span> SETTING</a></li>
      		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
        </ul>
      </li>
	  <li><a href="export_user.php"><span class="glyphicon glyphicon-link"></span>  EKSPORT EXCEL</a></li>
      <a class="btn btn-success navbar-btn" href="input.php">Tambah Data</a>
    </ul>
  </div>
</nav>
<style type="text/css">
a {
  color: black;
}
.glyphicon {
	font-size: 16px;
     }
body {
			font-family: "Roboto Condensed", Helvetica, sans-serif;
			background-color: #f7f7f7;
		}
		.container { margin: 150px auto; max-width: 960px; }
		a {

			text-decoration: none;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		table, th, td {
		   border: 1px solid #bbb;
		   text-align: left;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		th {
			background-color: #ddd;
		}
		th,td {
			padding: 5px;
		}
		button {
			cursor: pointer;
		}
		/*Initial style sort*/
		.tablemanager th.sorterHeader {
			cursor: pointer;
		}
		.tablemanager th.sorterHeader:after {
			content: " \f0dc";
			font-family: "FontAwesome";
		}
		/*Style sort desc*/
		.tablemanager th.sortingDesc:after {
			content: " \f0dd";
			font-family: "FontAwesome";
		}
		/*Style sort asc*/
		.tablemanager th.sortingAsc:after {
			content: " \f0de";
			font-family: "FontAwesome";
		}
		/* Style disabled
		.tablemanager th.disableSort {

		} */
		#for_numrows {
			padding: 10px;
			float: left;
		}
		#for_filter_by {
			padding: 10px;
			float: right;
		}
		#pagesControllers {
			display: block;
			text-align: center;
		}
</style>
<body>
<div class="container-fluid">
	<table  class="tablemanager">
		<thead>
			<tr>
				<th style="text-align:center;" class="disableSort">No.</th>
				<th class="disableSort">ID Issue</th>
				<th class="disableSort">Week</th>
				<th class="disableSort">Type</th>
				<th class="disableSort">AP VERSION</th>
				<th class="disableSort">CP VERSION</th>
				<th class="disableSort">CSC VERSION</th>
				<th class="disableSort">Cause</th>
				<th class="disableSort">Sample Recieve</th>
				<th class="disableSort">Sample Analyzed</th>
				<th style="text-align:center;" class="disableSort">Report</th>	
				<th class="disableSort">Status</th>
				<th style="text-align:center;" class="disableSort">PIC</th>
				<?php
					$level = $_SESSION['level'];
					if ($level=="super user"){
					echo "<th style='text-align:center;' class='disableSort'>"."ACTION"."</th>";
					}
					// <th style="text-align:center;" class="disableSort">ACTION</th>
				?>
			</tr>
            
            </thead>	
		<?php 



$koneksi = mysqli_connect("localhost","root","","gba_task");
if ($_SESSION['level']=='super user'){
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE 1 ORDER BY `task`.`week` DESC ");
}
else{
	$pengguna = $_SESSION['name'];
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM `task` WHERE nama='$pengguna'  ORDER BY `task`.`week` DESC ");	
}
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
	$level = $_SESSION['level'];
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
		echo "<td>".$data['issue_id']."</td>";
		echo "<td>".$data['week']."</td>";
		echo "<td>".$data['type']."</td>";
		echo "<td>".$data['model']."</td>";
		echo "<td>".$data['place']."</td>";
		echo "<td>".$data['issue']."</td>";
		echo "<td style='width: 20%';>".$data['cause']."</td>";
		echo "<td>".$data['sample_recieve']."</td>";
		echo "<td>".$data['sample_analyze']."</td> ";
		echo "<td style='text-align:center;'><a href='$file'>".$filename."</a></td>";
		echo "<td bgcolor=$warna>".$data['status']."</td>";
		echo "<td style='text-align:center;'>".$data['nama']."</td>";	
		if ($level=="super user"){
			echo "<td style='text-align:center;'>";	
			echo "<a class='btn btn-warning' href='edit.php?id=$data[id]'>Update</a> ";	
			echo "<a onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger' href='hapus.php?id=$data[id]'>Delete</a>";
			echo "</td>";
		}	        			
echo "</tr>";
echo "</tbody>";
?>
<?php } ?>	
</table>

</div>
</body>
<script type="text/javascript" src="./tableManager.js"></script>
	<script type="text/javascript">
		// basic usage
		$('.tablemanager').tablemanager({
			appendFilterby: true,
			vocabulary: {
                voc_filter_by: 'Filter By',
                voc_type_here_filter: 'Cari . . .',
                voc_show_rows: 'Rows Per Page'
  },
			pagination: true,
			showrows: [20,50,100],
			disableFilterBy: [1]
		});
		// $('.tablemanager').tablemanager();
</script>

</html>