<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN BARANG</h2>
		<h4>WWW.MALASNGODING.COM</h4>

	</center>

	<?php 
	include 'koneksi/koneksi.php';
	?>

	<table border="1">
		<tr>
			<th width="1%">No</th>
			<th align='center'>Nama Karyawan</th>
			<th align='center'>Jumlah Kasbon</th>
			<th align='center'>Keterangan</th>
			<th align='center'>Tanggal Absen</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($konek,"SELECT a.nama AS nama,b.idKaryawan AS idKaryawan,b.keterangan AS keterangan,a.id AS id,b.tgl AS tgl,b.`jumlah` AS `jumlah` FROM karyawans a JOIN lainlains b ON a.id = b.idKaryawan order by nama");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['keterangan']; ?></td>
			<td><?php echo $data['tgl']; ?></td>
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