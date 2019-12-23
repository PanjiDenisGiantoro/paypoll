<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['idKaryawan'];
	$tglBuat = $_POST['tglBuat'];
	$idPotongan = $_POST['idPotongan'];
	$idGapok = $_POST['idGapok'];
	$idTunjangan = $_POST['idTunjangan'];
	$total = $_POST['total'];
	if( $idKaryawan==''||$tglBuat==''||$idPotongan==''||$idTunjangan==''||$total==''){

		header('location:gaji.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into head_gajis(idKaryawan,tglBuat,idPotongan,idGapok,idTunjangan,total) values ('$idKaryawan','$tglBuat','$idPotongan','$idGapok','$idTunjangan','$total')");
		if($simpan){
			header('location:gaji.php?e=sukses');
		}else{
			header('location:gaji.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$idKaryawan = $_POST['idKaryawan'];
	$nama = $_POST['nama'];
	$jumlahKasbon = $_POST['jumlahKasbon'];
	$tglKasbon = $_POST['TanggalKasbon'];
	$keterangan = $_POST['keterangan'];
	if( $idKaryawan==''||$nama==''||$keterangan==''||$tglKasbon==''||$jumlahKasbon==''){
		
		header('location:kasbon.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update kasbons set idKaryawan='$idKaryawan',namaKaryawan='$nama',jumlahKasbon='$jumlahKasbon',keterangan='$keterangan',tgl='$tglKasbon' where idKaryawan='$idKaryawan'");
		if($update){
			header('location:kasbon.php?e=sukses');
		}else{
			header('location:kasbon.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from head_gajis where id = '$_GET[id]'");
	if($hapus){
		
		header('location:gaji.php?e=sukses');
	}else{
		header('location:gaji.php?e=gagal');
	}
}
}
?>