<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
 if ($_GET['act']=='update'){
	$angkaLembaga = $_POST['angkaLembaga'] ;
	$angkaKaryawan = $_POST['angkaKaryawan'] ;

	$id = $_POST['id'];
	if($angkaLembaga==''||$angkaKaryawan==''){
		header('location:bpjs.php?view=tambah&e=bl');

	}else{
		$update = mysqli_query($konek,"update bpjs_kes set angkaKaryawan='$angkaKaryawan' , angkaLembaga='$angkaLembaga' where id='$id'");

		if($update){
			header('location:bpjs.php?e=sukses');
		}else{

			header('location:bpjs.php?e=gagal');
		}
	}
}

}


?>