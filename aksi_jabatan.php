<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$namajabatan = $_POST['namajabatan'];
	if( $namajabatan==''){

		header('location:Jabatan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into jabatan(nama_jabatan) values ('$namajabatan')");
		if($simpan){
			header('location:Jabatan.php?e=sukses');
		}else{
			$simpan =("insert into jabatan(namajabatan) values ('$namajabatan')");
			echo var_dump($simpan);die();
			header('location:Jabatan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$idKaryawan = $_POST['idKaryawan'];
	$namajabatan = $_POST['namajabatan'];
	if( $namajabatan==''){
		header('location:Jabatan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update jabatan set nama_jabatan='$namajabatan' where id='$id'");
		if($update){
			header('location:Jabatan.php?e=sukses');
		}else{
			header('location:Jabatan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from jabatan where id = '$_GET[id]'");
	if($hapus){
		
		header('location:Jabatan.php?e=sukses');
	}else{
		header('location:Jabatan.php?e=gagal');
	}
}
}
?>