<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$id = $_POST['id'];
	$idKaryawan = $_POST['idKaryawan'];
	$tglAbsen = $_POST['tglAbsen'];
	$keterangan = $_POST['keterangan'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$path = "img/".$fotobaru;
	$fotobaru = date('dmYHis').$foto;
	if( $idKaryawan==''||$tglAbsen==''||$keterangan==''){
	

		header('location:absensi.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into absens(idKaryawan,tglAbsen,keterangan,Gambar) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru')");

		if($simpan){
			header('location:absensi.php?e=sukses');
		}else{
			header('location:absensi.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
	$idKaryawan = $_POST['idKaryawan'];
	$tglAbsen = $_POST['tglAbsen'];
	$keterangan = $_POST['keterangan'];
	if($idKaryawan==''||$tglAbsen==''||$keterangan==''){
		header('location:absensi.php?view=tambah&e=bl');

	}else{
		$update = mysqli_query($konek,"update absens set tglAbsen='$tglAbsen',keterangan='$keterangan' where idKaryawan='$idKaryawan'");

		if($update){
			header('location:absensi.php?e=sukses');
		}else{

			header('location:absensi.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from absens where idKaryawan = '$_GET[id]'");

	if($hapus){
		// echo var_dump("delete from absens where idKaryawan = '$_GET[id]'");die();

		header('location:absensi.php?e=sukses');
	}else{
		header('location:absensi.php?e=gagal');
	}
}
}


?>
