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
	$tgl = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	if( $idKaryawan==''||$keterangan==''||$tgl==''||$jumlah==''){
		header('location:lain.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into lainlains(idKaryawan,jumlah,keterangan,tgl) values ('$idKaryawan','$jumlah','$keterangan','$tgl')");
		if($simpan){
			header('location:lain.php?e=sukses');
		}else{
			
		// echo var_dump($simpan);die();
			header('location:lain.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$idKaryawan = $_POST['idKaryawan'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	if( $idKaryawan==''||$keterangan==''||$tgl==''||$jumlah==''){
	
		header('location:lain.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update lainlains set idKaryawan='$idKaryawan',jumlah='$jumlah',keterangan='$keterangan',tgl='$tgl' where idKaryawan='$idKaryawan'");
		if($update){
			header('location:lain.php?e=sukses');
		}else{
			header('location:lain.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from lainlains where idKaryawan = '$_GET[id]'");
	if($hapus){
		
		header('location:lain.php?e=sukses');
	}else{
		// echo var_dump("delete from kasbons where idKaryawan = '$_GET[id]'");die();
		header('location:lain.php?e=gagal');
	}
}
}
?>