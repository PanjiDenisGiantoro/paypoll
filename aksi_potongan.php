<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$zakat = $_POST['gapok'];
	$idPinjaman = $_POST['sisaPinjaman'];
	$idKasbon = $_POST['jumlahKasbon'];
	$idLainlain = $_POST['jumlah'];
	$makan = $_POST['makan'];
	$bpjsKes = $_POST['bpjsKes'];
	$idKaryawan = $_POST['idKaryawan'];
	$bpjsKet = $_POST['bpjsKet'];
	$tanggalPotongan = $_POST['tanggalPotongan'];

	if( $zakat==''||$idPinjaman==''||$idKasbon==''||$idLainlain==''||$makan==''||$bpjsKes==''||$bpjsKet==''){
		
		header('location:potongan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into potongans(zakat,Pinjaman,Kasbon,Lainlain,makan,bpjsKes,bpjsKet,tanggal_p,idKaryawan) values ('$zakat','$idPinjaman','$idKasbon','$idLainlain','$makan','$bpjsKes','$bpjsKet','$tanggalPotongan','$idKaryawan')");
		if($simpan){
			header('location:potongan.php?e=sukses');
		}else{
			header('location:potongan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$id = $_POST['id'];
	$zakat = $_POST['gapok'];
	$idPinjaman = $_POST['sisaPinjaman'];
	$idKasbon = $_POST['jumlahKasbon'];
	$idLainlain = $_POST['jumlah'];
	$makan = $_POST['makan'];
	$bpjsKes = $_POST['bpjsKes'];
	$idKaryawan = $_POST['idKaryawan'];
	$bpjsKet = $_POST['bpjsKet'];
	$tanggalPotongan = $_POST['tanggalPotongan'];
	if( $zakat==''||$idPinjaman==''||$idKasbon==''||$idLainlain==''||$makan==''||$bpjsKes==''||$bpjsKet==''){
		header('location:potongan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update potongans set zakat='$zakat',Pinjaman='$idPinjaman',Kasbon='$idKasbon',Lainlain='$idLainlain',makan='$makan',bpjsKes='$bpjsKes',bpjsKet='bpjsKet',tanggalPotongan = '$tanggalPotongan',idKaryawan='$idKaryawan' where id='$id'");
		if($update){
			header('location:potongan.php?e=sukses');
		}else{
			header('location:potongan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from potongans where id = '$_GET[id]'");
	if($hapus){
		header('location:potongan.php?e=sukses');
	}else{
		header('location:potongan.php?e=gagal');
	}
}
}
?>