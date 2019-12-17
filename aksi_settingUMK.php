<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
 if ($_GET['act']=='update'){
	$UMK = $_POST['UMK'];
	$id = $_POST['id'];
	if($UMK==''){
		header('location:settingUMK.php?view=tambah&e=bl');

	}else{
		$update = mysqli_query($konek,"update umk set UMK='$UMK' where id='$id'");

		if($update){
			header('location:settingUMK.php?e=sukses');
		}else{

			header('location:settingUMK.php?e=gagal');
		}
	}
}

}


?>