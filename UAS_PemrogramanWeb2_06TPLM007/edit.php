<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$jenis_zakat = mysqli_real_escape_string($mysqli, $_POST['jenis_zakat']);
	$rp = mysqli_real_escape_string($mysqli, $_POST['rp']);
	$nama_lengkap = mysqli_real_escape_string($mysqli, $_POST['nama_lengkap']);
     $nomor_hp = mysqli_real_escape_string($mysqli, $_POST['nomor_hp']);
     $email = mysqli_real_escape_string($mysqli, $_POST['email']);
     $nama_bank = mysqli_real_escape_string($mysqli, $_POST['nama_bank']);
     $nomor_rekening = mysqli_real_escape_string($mysqli, $_POST['nomor_rekening']);
	
	// checking empty fields
	if(empty($jenis_zakat) || empty($rp) || empty($nama_lengkap) || empty($nomor_hp) || empty($email) || empty($nama_bank) || empty($nomor_rekening)) {
			
		if(empty($jenis_zakat)) {
			echo "<font color='red'>Jenis Zakat field is empty.</font><br/>";
		}
		
		if(empty($rp)) {
			echo "<font color='red'>Nominal field is empty.</font><br/>";
		}
		
		if(empty($nama_lengkap)) {
			echo "<font color='red'>Nama Lengkap field is empty.</font><br/>";
		}
		
          if(empty($nomor_hp)) {
			echo "<font color='red'>Nomor Hp field is empty.</font><br/>";
		}

          if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

          if(empty($nama_bank)) {
			echo "<font color='red'>Nama Bank field is empty.</font><br/>";
		}

          if(empty($nomor_rekening)) {
			echo "<font color='red'>Nomor Rekening field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE data SET jenis_zakat='$jenis_zakat',rp='$rp',nama_lengkap='$nama_lengkap',nomor_hp='$nomor_hp',email='$email',nama_bank='$nama_bank',nomor_rekening='$nomor_rekening' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM data WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$jenis_zakat = $res['jenis_zakat'];
	$rp = $res['rp'];
	$nama_lengkap = $res['nama_lengkap'];
    $nomor_hp = $res['nomor_hp'];
    $email = $res['email'];
    $nama_bank = $res['nama_bank'];
    $nomor_rekening = $res['nomor_rekening'];
}
?>
<!DOCTYPE HTML>  
<html>  
<head>  
     <title>Zakat</title>  
     <style>
       table {
       font-family: arial, sans-serif;
       border-collapse: collapse;
       width: 100%;
       }

       td, th {
       border: 1px solid #dddddd;
       text-align: left;
       padding: 8px;
       }

       tr:nth-child(even) {
       background-color: #dddddd;
       }
       </style>
</head>  
<body>  
<h2>Data Pembayaran Zakat</h2>  
<hr>  
<form action="edit.php" method="post" name="form1">  
<table width="100%" border="0">  
<tr>  
     <td width="120">Pilih Jenis Zakat</td>  
     <td width="5">:</td>  
     <td>  
          <select name="jenis_zakat">  
          <option value="Zakat Penghasilan"> Zakat Penghasilan </option>  
          <option value="Zakat Maal"> Zakat Maal </option>  
          <option value="Zakat Fitrah"> Zakat Fitrah </option>  
        
          </select>  
     </td>  
</tr>  
<tr>  
     <td width="120">Rp.</td>  
     <td width="5">:</td>  
     <td>  
          <input type="text" name="rp" size="30">  
     </td>  
</tr>
<tr>  
     <td width="120">Nama Lengkap</td>  
     <td width="5">:</td>  
     <td>  
          <input type="text" name="nama_lengkap" size="30">  
     </td>  
</tr>
<tr>  
     <td width="120">Nomor HP</td>  
     <td width="5">:</td>  
     <td>  
          <input type="text" name="nomor_hp" size="30">  
     </td>  
</tr>  
<tr>  
     <td width="120">Alamat Email</td>  
     <td width="5">:</td>  
     <td>  
          <input type="text" name="email" size="30">  
     </td>  
</tr>
<tr>  
     <td width="120">Transfer dari Nama Bank</td>  
     <td width="5">:</td>  
     <td>  
          <input type="text" name="nama_bank" size="30">  
     </td>  
</tr>
<tr>  
     <td width="120">Nomor Rekening Bank</td>  
     <td width="5">:</td>  
     <td>  
          <input type="text" name="nomor_rekening" size="30">  
     </td>  
</tr>  
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
