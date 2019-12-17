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
	$nama = $_POST['nama'];
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$tgl = $_POST['tgl'];
	$query = "select sisaPinjaman from pinjamen where idKaryawan ='$idKaryawan'"; 
    $result = mysqli_query($konek, $query); 
    $row = mysqli_num_rows($result); 
          
	// $cek1 = $cek['sisaPinjaman'];
	if( $idKaryawan==''||$nama==''||$jumlahPinjam==''||$tgl==''){
		
		header('location:pinjaman.php?view=tambah&e=bl');
	}else if($row > 0 ){
				header('location:pinjaman.php?e=hutang');
	}else{
	
		$simpan = mysqli_query($konek,"insert into pinjamen(idKaryawan,namaKaryawan,jumlahPinjam,sisaPinjaman,tgl) values ('$idKaryawan','$nama','$jumlahPinjam','$jumlahPinjam','$tgl')");
		if($simpan){
			header('location:pinjaman.php?e=sukses');
		}else {
			header('location:pinjaman.php?e=gagal');
		}
	}
		// echo var_dump("select sisaPinjaman from pinjamen where idKaryawan ='$idKaryawan' limit 1");die();
		// echo var_dump($cek);die();
	}


else if ($_GET['act']=='update'){
$id = $_POST['id'];	
$idKaryawan = $_POST['idKaryawan'];
	$idKaryawan = $_POST['idKaryawan'];
	$nama = $_POST['nama'];
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$sisaPinjaman = $_POST['sisaPinjaman'];
	$tgl = $_POST['tgl'];
	if( $idKaryawan==''||$nama==''||$jumlahPinjam==''||$sisaPinjaman==''||$tgl==''){
		header('location:pinjaman.php?view=tambah&e=bl');
	}else{
		echo var_dump("update pinjamen set idKaryawan='$idKaryawan',namaKaryawan='$nama',jumlahPinjam='$jumlahPinjam',sisaPinjaman='$sisaPinjaman',tgl='$tgl' where id='$id'");die();
		$update = mysqli_query($konek,"update pinjamen set idKaryawan='$idKaryawan',namaKaryawan='$nama',jumlahPinjam='$jumlahPinjam',sisaPinjaman='$sisaPinjaman',tgl='$tgl' where id='$id'");
		if($update){
			header('location:pinjaman.php?e=sukses');
		}else{
			header('location:pinjaman.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){

	$hapus = mysqli_query($konek,"delete from pinjamen where id = '$_GET[id]'");
	if($hapus){
		header('location:pinjaman.php?e=sukses');
	}else{

		header('location:pinjaman.php?e=gagal');
	}
}
}
?>