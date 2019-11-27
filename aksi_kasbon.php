<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['idKaryawan'];
	$nama = $_POST['nama'];
	$jumlahKasbon = $_POST['jumlahKasbon'];
	$tglKasbon = $_POST['TanggalKasbon'];
	$keterangan = $_POST['keterangan'];
	if( $idKaryawan==''||$nama==''||$keterangan==''||$tglKasbon==''||$jumlahKasbon==''){

		header('location:kasbon.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into kasbons(idKaryawan,namaKaryawan,jumlahKasbon,keterangan,tgl) values ('$idKaryawan','$nama','$jumlahKasbon','$keterangan','$tglKasbon')");
		if($simpan){
			header('location:kasbon.php?e=sukses');
		}else{
			header('location:kasbon.php?e=gagal');
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
	$hapus = mysqli_query($konek,"delete from kasbons where idKaryawan = '$_GET[id]'");
	if($hapus){
		
		header('location:kasbon.php?e=sukses');
	}else{
		header('location:kasbon.php?e=gagal');
	}
}
}
?>