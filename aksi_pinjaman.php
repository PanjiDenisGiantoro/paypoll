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
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$sisaPinjaman = $_POST['sisaPinjaman'];
	$tgl = $_POST['tgl'];
	if( $idKaryawan==''||$nama==''||$jumlahPinjam==''||$sisaPinjaman==''||$tgl==''){

		header('location:pinjaman.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into pinjamen(idKaryawan,namaKaryawan,jumlahPinjam,sisaPinjaman,tgl) values ('$idKaryawan','$nama','$jumlahPinjam','$sisaPinjaman','$tgl')");
		if($simpan){
			header('location:pinjaman.php?e=sukses');
		}else{
			header('location:pinjaman.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$idKaryawan = $_POST['idKaryawan'];
	$idKaryawan = $_POST['idKaryawan'];
	$nama = $_POST['nama'];
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$sisaPinjaman = $_POST['sisaPinjaman'];
	$tgl = $_POST['tgl'];
	if( $idKaryawan==''||$nama==''||$jumlahPinjam==''||$sisaPinjaman==''||$tgl==''){

		header('location:pinjaman.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update pinjamen set idKaryawan='$idKaryawan',namaKaryawan='$nama',jumlahPinjam='$jumlahPinjam',sisaPinjaman='$sisaPinjaman',tgl='$tgl' where idKaryawan='$idKaryawan'");
		if($update){
			header('location:pinjaman.php?e=sukses');
		}else{
			header('location:pinjaman.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from pinjamen where idKaryawan = '$_GET[id]'");
	if($hapus){
		header('location:pinjaman.php?e=sukses');
	}else{
		header('location:pinjaman.php?e=gagal');
	}
}
}
?>