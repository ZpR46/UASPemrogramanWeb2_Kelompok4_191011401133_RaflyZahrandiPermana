<html>
<head>
	<title>Zakat</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Simpan'])) {	
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
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO data(jenis_zakat,rp,nama_lengkap,nomor_hp,email,nama_bank,nomor_rekening) VALUES('$jenis_zakat','$rp','$nama_lengkap','$nomor_hp','$email','$nama_bank','$nomor_rekening')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>