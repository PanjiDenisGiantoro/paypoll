<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['idKaryawan'];
	$tglAbsen = $_POST['tgl'];
	$keterangan = $_POST['Keterangan'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	$fotobaru = date('dmYHis').$foto;
	$path = "img/".$fotobaru;
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	if( $idKaryawan==''||$tglAbsen==''||$keterangan==''){
	// echo var_dump("insert into absens(idKaryawan,tglAbsen,keterangan,Gambar) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru')");die();

		header('location:absensi.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into absens(idKaryawan,tglAbsen,keterangan,Gambar) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru')");

		if($simpan){
			header('location:absensi.php?e=sukses');
		}else{
			echo var_dump("insert into absens(idKaryawan,tglAbsen,keterangan,Gambar) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru')");die();
			header('location:absensi.php?e=gagal');
		}
	}
}
}
else if ($_GET['act']=='update'){
	$idKaryawan = $_POST['idKaryawan'];
	$tglAbsen = $_POST['tgl'];
	$keterangan = $_POST['Keterangan'];
	if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
 
  // Proses upload
  
	if($idKaryawan==''||$tglAbsen==''||$keterangan==''){
		header('location:absensi.php?view=tambah&e=bl');

	}else{
		 $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;

  // Set path folder tempat menyimpan fotonya
  $path = "img/".$fotobaru;
		if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  	$query = "SELECT * FROM absens WHERE id='$_GET[id]'";
    $sql = mysqli_query($konek, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql);
 if(is_file("img/".$data['foto'])){ // Jika foto ada
      unlink("img/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images

		$update = mysqli_query($konek,"update absens set tglAbsen='$tglAbsen',keterangan='$keterangan',Gambar='$fotobaru' where id='$_GET['id']'");

		if($update){
			header('location:absensi.php?e=sukses');
		}else{

			header('location:absensi.php?e=gagal');
		}
	}
}
}
}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from absens where id = '$_GET[id]'");

	if($hapus){
		// echo var_dump("delete from absens where idKaryawan = '$_GET[id]'");die();

		header('location:absensi.php?e=sukses');
	}else{
		header('location:absensi.php?e=gagal');
	}
}
}


?>