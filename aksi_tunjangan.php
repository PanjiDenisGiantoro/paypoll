<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['idKaryawan'];
	$id_jabatan = $_POST['id_jabatan'];
	$fungsional = $_POST['fungsional'];
	$keluarga = $_POST['keluarga'];
	$transport = $_POST['Transport'];
		$idTunjangan = $_POST['jumlah'];
	$makanFas = $_POST['makanFas'];
	$lemburUmum = $_POST['lemburUmum'];
	$lemburKhusus = $_POST['lemburKhusus'];
	$bpjskes = $_POST['bpjsKes'];
	$bpjsKet = $_POST['bpjsKet'];
	if( $id_jabatan==''||$fungsional==''||$keluarga==''||$transport==''||$bpjsKet==''||$bpjskes==''){
		
		header('location:tunjangan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into tunjangans(id_jabatan,fungsional,keluarga,transport,idTunjangan,makanFas,lemburKhusus,lemburUmum,bpjsKet,bpjskes,idKaryawan) values ('$id_jabatan','$fungsional','$keluarga','$transport','$idTunjangan','$makanFas','$lemburUmum','$lemburKhusus','$bpjskes','$bpjsKet','$idKaryawan')");
		if($simpan){
			header('location:tunjangan.php?e=sukses');
		}else{
			echo var_dump("insert into tunjangans(id_jabatan,fungsional,keluarga,transport,idTunjangan,makanFas,lemburKhusus,lemburUmum,bpjsKet,bpjskes,idKaryawan) values ('$id_jabatan','$fungsional','$keluarga','$transport','$idTunjangan','$makanFas','$lemburUmum','$lemburKhusus','$bpjskes','$bpjsKet','$idKaryawan')");die();
			header('location:tunjangan.php?e=gagal');
		}
	}
}
// else if ($_GET['act']=='update'){
// $id = $_POST['id'];
// 	$id_jabatan = $_POST['id_jabatan'];
// 	$fungsional = $_POST['fungsional'];
// 	$keluarga = $_POST['keluarga'];
// 	$transport = $_POST['transport'];
// 		$idTunjangan = $_POST['idTunjangan'];
// 	$makanFas = $_POST['makanFas'];
// 	$lemburUmum = $_POST['lemburUmum'];
// 	$lemburKhusus = $_POST['lemburKhusus'];
// 	$bpjskes = $_POST['bpjskes'];
// 	$bpjsKet = $_POST['bpjsKet'];
// 	if( $id==''||$id_jabatan==''||$fungsional==''||$keluarga==''||$transport==''$idTunjangan==''||$makanFas==''||$lemburUmum==''||$lemburKhusus==''||$bpjsKet==''||$bpjskes==''){
// 		header('location:tunjangan.php?view=tambah&e=bl');
// 	}else{
// 		$update = mysqli_query($konek,"update tunjangans set idKaryawan='$idKaryawan',namaKaryawan='$nama',jumlahPinjam='$jumlahPinjam',sisaPinjaman='$sisaPinjaman',tgl='$tgl' where idKaryawan='$idKaryawan'");
// 		if($update){
// 			header('location:tunjangan.php?e=sukses');
// 		}else{
// 			header('location:tunjangan.php?e=gagal');
// 		}
// 	}
// }
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from tunjangans where id = '$_GET[id]'");
	if($hapus){
		header('location:tunjangan.php?e=sukses');
	}else{
		header('location:tunjangan.php?e=gagal');
	}
}
}
?>