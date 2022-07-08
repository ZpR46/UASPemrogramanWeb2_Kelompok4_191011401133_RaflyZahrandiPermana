<!DOCTYPE html>
<html>
<head>
 <title>Laporan Pembayaran Zakat</title>
</head>
<body>
<h3 style="text-align: center;"> Data Pembayaran Zakat </h3>
 <h3 style="text-align: center;"> <?php 
 date_default_timezone_set('Asia/Jakarta');
 echo date('d-m-Y H:i:s')
?></h3>
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
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
 <table>
 <tr>
 <th>No.</th>   
 <th>Jenis Zakat</th>
 <th>Nominal</th>
 <th>Nama Lengkap</th>
 <th>Nomor HP</th>
 <th>Alamat Email</th>
 <th>Nama Bank</th>
 <th>Nomor Rekening</th>
</tr>
 <?php 
 function rupiah($angka){
	
	$hasil_rupiah = "Rp." . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
 // koneksi database
 include_once("config.php");
$noUrut=0;
 // menampilkan data pegawai
 $result = mysqli_query($mysqli, "SELECT * FROM data ORDER BY id ASC"); // using mysqli_query instead
 while($d = mysqli_fetch_array($result)) {
    $noUrut++;
 ?>
 <tr>
 <td style='text-align: center;'><?php echo $noUrut ?></td>
 <td><?php echo $d['jenis_zakat']; ?></td>
 <td><?php echo rupiah($d['rp']); ?></td>
 <td><?php echo $d['nama_lengkap']; ?></td>
 <td><?php echo $d['nomor_hp']; ?></td>
 <td><?php echo $d['email']; ?> </td>
 <td><?php echo $d['nama_bank']; ?> </td> 
 <td><?php echo $d['nomor_rekening']; ?> </td>
</tr>
 <?php 
 }
 ?>
    </table>
    <script>
 window.print();
 </script>
</body>
</html>