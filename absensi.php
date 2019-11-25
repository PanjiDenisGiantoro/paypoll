<?php include"header.php";?>

<br/>
<br/>
<br/>


<?php 
$view =isset($_GET['view']) ? $_GET['view'] :null;


switch ($view) {
default:
?>
<!-- menampilkan pesan -->


<div class="row m-t-8">

<div class="col-md-12">
<div class="table-responsive m-b-50">


<style type="text/css">
th{
font-size: 12px;
text-align: center;s
}
td{
font-size: 12px;
}
</style>
<div class="card-body" >
 <?php
if(isset($_GET['e']) && $_GET['e']=='sukses'){
?>
<div class="alert alert-success" role="alert" style="margin-top: 30px">
Selamat <strong>Proses Berhasil</strong>
</div>

<?php
}else if(isset($_GET['e']) && $_GET['e']=='gagal'){
?>
<div class="alert alert-danger" role="alert"  style="margin-top: 30px">
Error <strong>Proses Gagal</strong>
</div>

<?php
}
?>
<a href="absensi.php?view=tambah" class="btn btn-primary" style="float: right; margin-right: 30px ; margin-top: 40px" >Tambah Data Absensi Karyawan</a>
<table  class="table " >
</div>
<thead>
<tr>

<th align='center'>No</th>
<th align='center'>Id Karyawan</th>
<th align='center'>Nama Karyawan</th>
<th align='center'>Jabatan</th>
<th align='center'>Tanggal Absen</th>
<th align='center'>Keterangan</th>
<th align='center' style="width: 100px;">Aksi</th>                                                                                                
</tr>
</thead>
<?php

$sql = mysqli_query($konek,"SELECT a.nama as nama ,a.jabatan as jabatan ,b.idKaryawan as idKaryawan,b.tglAbsen as tglAbsen,b.keterangan as keterangan,a.id as id from karyawans a join absens b on a.id = b.idKaryawan  ");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[idKaryawan]</td>
<td align='center'>$d[nama]</td>
<td align='center'>$d[jabatan]</td>
<td align='center'>$d[tglAbsen]</td>
<td align='center'>$d[keterangan]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='absensi.php?view=edit&id=$d[id]' ></a>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_absensi.php?act=del&id=$d[id]'></a>
</td>
</tr>";
$no++;
}
?>
</table>
<tbody>

</div>
</div>
</div>
</div>
<?php
break;
case "tambah";  
$query = "SELECT max(id) as id FROM absens";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$kodeBarang =$noUrut;
?>
<?php
if(isset($_GET['e']) && $_GET['e']=='bl'){
 ?>
<div class="alert alert-danger" role="alert">
Peringatan<strong>Form Belum Lengkap</strong>
</div>
 <?php
}
?>
<section class="au-breadcrumb m-t-75">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="au-breadcrumb-content">
<div class="au-breadcrumb-left">
<span class="au-breadcrumb-span">You are here:</span>
<ul class="list-unstyled list-inline au-breadcrumb__list">
<li class="list-inline-item active">
<a href="#">Dashboard</a>
</li>
<li class="list-inline-item seprate">
<span>/</span>
</li>
<li class="list-inline-item">Tambah Absensi</li>

</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<br>
<div class="col-lg-11">
<div class="card">
<div class="card-header">
<strong>Absensi</strong>
<small> Tambah</small>
</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form method="post" action="aksi_absensi.php?act=insert" class="form-horizontal">
</div>
    <table  width="900px">
      <tr>
        <td>
            <div class="form-group">
                <label for="idKaryawan" class=" form-control-label">Id Karyawan</label>
            <select name="idKaryawan" id="idKaryawan" class=" form-control" onchange="changeValue(this.value)" style="width: 400px" >
        <option value=0>-Pilih-</option>
         <?php
         $konek = mysqli_connect("localhost","root","","payrol");
    $result = mysqli_query($konek,"SELECT * from karyawans");   
    $jsArray = "var dtMhs = new Array();\n";       
    while ($row = mysqli_fetch_array($result)) {   
        echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';   
        $jsArray .= "dtMhs['".$row['id']."'] = {nama:'".addslashes($row['nama'])."',jabatan:'".addslashes($row['jabatan'])."'};\n";   
    }     
    ?>   
        </select>
    </td>
    <td>
<div class="form-group">
<label for="tglAbsen" class=" form-control-label">Tanggal Absen</label>
<input type="date" name="tglAbsen"  placeholder="Masukkan Tanggal Absen Anda" class="form-control"style="width: 400px" >
</div>
</td>
   
      </tr>
      <tr>
        <td>
        <div class="form-group">
  <label for="nama" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" class="form-control"style="width: 400px"/></td>
       <td>
        <div class="form-group">
  <label for="id" class=" form-control-label">jabatan Karyawan</label>
      <input type="text" name="jabatan" id="jabatan" class="form-control"style="width: 400px"/></td>
    </div>
      </tr>
      <tr>
        <td>
        <div class="form-group">
        <label for="keterangan" class=" form-control-label">keterangan absen</label>
        <textarea name="keterangan" id="keterangan" rows="9" placeholder="Content..." class="form-control" style="width: 400px"></textarea>
        </td>
      </tr>
    </table>
      <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id){ 
    document.getElementById('nama').value = dtMhs[id].nama; 
    document.getElementById('jabatan').value = dtMhs[id].jabatan; 
    }; 
    </script>
<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">


<a class="btn btn-danger" href="absensi.php">kembali</a>
</div>
</div>
</div>

</form>

</div>
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from absens a join karyawans b on a.idKaryawan = b.id where a.idKaryawan='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
$query = "SELECT max(id) as id FROM karyawans";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $char . sprintf("%03s", $noUrut);
?>
<section class="au-breadcrumb m-t-75">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="au-breadcrumb-content">
<div class="au-breadcrumb-left">
<span class="au-breadcrumb-span">You are here:</span>
<ul class="list-unstyled list-inline au-breadcrumb__list">
<li class="list-inline-item active">
<a href="#">Dashboard</a>
</li>
<li class="list-inline-item seprate">
<span>/</span>
</li>
<li class="list-inline-item">Edit Absensi Karyawan</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<br>
<div class="col-lg-11">
<div class="card">
<div class="card-header">
<strong>Karyawan</strong>
<small> edit</small>

</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form action="aksi_absensi.php?act=update" method="post" class="form-horizontal">
</div>
  <table  width="900px">
      <tr>
        <td>
            <div class="form-group">
                <label for="idKaryawan" class=" form-control-label">Id Karyawan</label>
            <input type="text" name="idKaryawan" value="<?php echo $e['idKaryawan']?>"readonly  placeholder="Masukkan Nama Karyawan" class="form-control"style="width: 400px">
    </td>
    <td>
<div class="form-group">
<label for="tglAbsen" class=" form-control-label">Tanggal Absen</label>
<input type="date" name="tglAbsen"  value="<?php  echo $e['tglAbsen']?>" placeholder="Masukkan Tanggal Absen Anda" class="form-control"style="width: 400px" >
</div>
</td>
   
      </tr>
      <tr>
        <td>
        <div class="form-group">
  <label for="id" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" value="<?php echo $e['nama']?>" readonly class="form-control"style="width: 400px"/>
        </td>
       <td>
        <div class="form-group">
  <label for="id" class=" form-control-label">jabatan Karyawan</label>
      <input type="text" name="jabatan" id="jabatan" value="<?php echo $e['jabatan']?>"readonly class="form-control"style="width: 400px"/>
  </td>
    </div>
      </tr>
      <tr>
        <td>
        <div class="form-group">
        <label for="keterangan" class=" form-control-label">keterangan absen</label>
        <textarea name="keterangan" id="keterangan"rows="9" placeholder="Content..." class="form-control" style="width: 400px"><?php echo $e['keterangan']?></textarea>
        </td>
      </tr>
    </table>
    
<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="absensi.php">kembali</a>
</div>
</div>
</div>
</form>
</div>
<?php
break;
}
?>

<?php include"footer.php";?>

