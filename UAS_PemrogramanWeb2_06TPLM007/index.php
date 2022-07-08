<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM data ORDER BY id ASC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 2px 8px;
 text-decoration: none;
 border-radius: 2px;
 }
 </style>
 
<a href="tambah.html">Add New Data</a><br/><br/>
 <a target="_blank" href="cetak.php">Cetak Laporan</a>
        </div>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Jenis Zakat</td>
		<td>Nominal</td>
		<td>Nama Lengkap</td>
		<td>Nomor HP</td>
        <td>Alamat Email</td>
        <td>Nama Bank</td>
        <td>Nomor Rekening</td>
	</tr>
	<?php 
	 function rupiah($angka){
	
		$hasil_rupiah = "Rp." . number_format($angka,2,',','.');
		return $hasil_rupiah;
	 
	}
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['jenis_zakat']."</td>";
		echo "<td>".rupiah($res['rp'])."</td>";
		echo "<td>".$res['nama_lengkap']."</td>";	
        echo "<td>".$res['nomor_hp']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "<td>".$res['nama_bank']."</td>";
        echo "<td>".$res['nomor_rekening']."</td>";
		echo "<td><center><a href=\"edit.php?id=$res[id]\">Edit</a>
		<br><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";		
	}
	?>
	</table>
</body>
</html>