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
<a href="jabatan.php?view=tambah" class="btn btn-primary" style="float: right; margin-right: 30px ; margin-top: 40px" >Tambah Data Jabatan Karyawan</a>
<table  class="table " >
</div>
<thead>
<tr>
<th align='center'>No</th>
<th align='center'>Id Jabatan</th>
<th align='center'>Nama Jabatan</th>
<th align='center'>Gaji Pokok</th>
<th align='center'>Fungsional</th>
<th align='center' style="width: 100px;">Aksi</th>                                                                                    
</tr>
</thead>
<?php
$sql = mysqli_query($konek,"SELECT * from jabatan");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[id]</td>
<td align='center'>$d[namajabatan]</td>
<td align='center'>$d[gapok]</td>
<td align='center'>$d[fungsional]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='Jabatan.php?view=edit&id=$d[id]' ></a>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_jabatan.php?act=del&id=$d[id]'></a>
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
$query = "SELECT max(id) as id FROM jabatan";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $noUrut;
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
<li class="list-inline-item">Tambah Jabatan</li>
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
<strong>Jabatan</strong>
<small> Tambah</small>
</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form method="post" action="aksi_jabatan.php?act=insert" class="form-horizontal">
</div>
    <table  width="900px">
      <tr>
      
       <td>
        <div class="form-group">
        <label for="namajabatan" class=" form-control-label">Nama Jabatan</label>
        <input type="text"name="namajabatan" id="namajabatan"  class="form-control" style="width: 400px"/>
        </td>
    </div>
      </tr>
      <tr>
        <td>
          <div class="form-group">
        <label for="gapok" class=" form-control-label">Gaji Pokok</label>
        <input type="number"name="gapok" id="gapok"  class="form-control" style="width: 400px"/>
      </div>
        </td>
         
      </tr>
      <tr>
        <td>
           <div class="form-group">
        <label for="fungsional" class=" form-control-label">Gaji fungsional</label>
        <input type="number"name="fungsional" id="fungsional"  class="form-control" style="width: 400px"/>
      </div>
        </td>
      </tr>
    </table>

<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="Jabatan.php">kembali</a>
</div>
</div>
</div>
</form>
</div>
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from jabatan where a.id='$_GET[id]'");
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
<li class="list-inline-item">Edit Jabatan Karyawan</li>
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
<strong>Jabatan</strong>
<small> edit</small>
</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form action="aksi_jabatan.php?act=update" method="post" class="form-horizontal">
</div>
  <table  width="900px">
       <tr>
    
    <td>
         <div class="form-group">
  <label for="namajabatan" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="namajabatan" id="namajabatan" value="<?php echo $e['nama']?>" class="form-control" readonly style="width: 400px"/>
    </td>
      </tr>
      <tr>
        <td>
           <div class="form-group">
  <label for="gapok" class=" form-control-label">Gaji Pokok</label>
      <input type="text" name="gapok" id="gapok" value="<?php echo $e['gapok']?>" class="form-control" readonly style="width: 400px"/>
        </td>
      </tr>
      <tr>
        <td>
           <div class="form-group">
  <label for="fungsional" class=" form-control-label">Fungsional</label>
      <input type="text" name="fungsional" id="fungsional" value="<?php echo $e['fungsional']?>" class="form-control" readonly style="width: 400px"/>
    </div>
        </td>
      </tr>
    </table>
<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="Jabatan.php">kembali</a>
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

