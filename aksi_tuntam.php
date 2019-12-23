<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['idKaryawan'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	if( $idKaryawan==''||$keterangan==''||$tgl==''||$jumlah==''){
		header('location:tuntam.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into tuntams(idKaryawan,jumlah,keterangan,tanggal) values ('$idKaryawan','$jumlah','$keterangan','$tgl')");
		if($simpan){
			header('location:tuntam.php?e=sukses');
		}else{
			
		// echo var_dump($simpan);die();
			header('location:tuntam.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
	$idKaryawan = $_POST['idKaryawan'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	if( $idKaryawan==''||$keterangan==''||$tgl==''||$jumlah==''){
	
		header('location:tuntam.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update tuntams set idKaryawan='$idKaryawan',jumlah='$jumlah',keterangan='$keterangan',tanggal='$tgl' where id='$_GET[id]'");
		if($update){
			header('location:tuntam.php?e=sukses');
		}else{
			header('location:tuntam.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from tuntams where idKaryawan = '$_GET[id]'");
	if($hapus){
		
		header('location:tuntam.php?e=sukses');
	}else{
		// echo var_dump("delete from kasbons where idKaryawan = '$_GET[id]'");die();
		header('location:tuntam.php?e=gagal');
	}
}
}
?>