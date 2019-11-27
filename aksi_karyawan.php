<?php
session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['login'])){
	header('location:login.php');
	
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$CardNumber = $_POST['CardNumber'];
	$jabatan = $_POST['jabatan'];
	$status = $_POST['status'];
	$tempatJabatan = $_POST['tempatJabatan'];
	$tglMasuk = $_POST['tglMasuk'];
	$tglKeluar = $_POST['tglKeluar'];
	$bpjsKes = $_POST['bpjsKes'];
	$bpjsKet = $_POST['bpjsKet'];
	
	if($id==''|| $nama==''||$CardNumber==''||$jabatan==''||$status==''||$tempatJabatan==''||$tglMasuk==''||$bpjsKes==''||$bpjsKet==''){
		header('location:karyawan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into karyawans(id,nama,CardNumber,jabatan,status,tempatJabatan,tglMasuk,tglKeluar,bpjsKes,bpjsKet) values ('$id','$nama','$CardNumber','$jabatan','$status','$tempatJabatan','$tglMasuk','$tglKeluar','$bpjsKes','$bpjsKet')");
		if($simpan){
			header('location:karyawan.php?e=sukses');
		}else{
			header('location:karyawan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$CardNumber = $_POST['CardNumber'];
	$jabatan = $_POST['jabatan'];
	$status = $_POST['status'];
	$tempatJabatan = $_POST['tempatJabatan'];
	$tglMasuk = $_POST['tglMasuk'];
	$tglKeluar = $_POST['tglKeluar'];
	$bpjsKes = $_POST['bpjsKes'];
	$bpjsKet = $_POST['bpjsKet'];
	
	if($id==''|| $nama==''||$CardNumber==''||$jabatan==''||$status==''||$tempatJabatan==''||$tglMasuk==''||$bpjsKes==''||$bpjsKet==''){
		// $update = ("update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar',bpjsKes='$bpjsKes',bpjsKet='$bpjsKet' where id='$id '");
		// echo var_dump("update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar',bpjsKes='$bpjsKes',bpjsKet='$bpjsKet' where id='$id '");die();
		header('location:karyawan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar',bpjsKes='$bpjsKes',bpjsKet='$bpjsKet' where id='$id '");
		if($update){
			header('location:karyawan.php?e=sukses');
		}else{
			header('location:karyawan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from karyawans where id = '$_GET[id]'");
	if($hapus){
		header('location:karyawan.php?e=sukses');
	}else{
		header('location:karyawan.php?e=gagal');
	}
}
else if($_GET['act'] == 'resign'){
	$id = $_POST['id'];
	$tglKeluar = $_POST['tglKeluar'];
	if($id==''||$tglKeluar==''){
		header('location:karyawan.php?view=tambah&e=bl');
	}else{
		$resign = mysqli_query($konek,"update karyawans set tglKeluar='$tglKeluar' where id='$id'");
		if($resign){
			header('location:karyawan.php?e=sukses');
		}else{
			header('location:karyawan.php?e=gagal');
		}
	}
}
}
?>