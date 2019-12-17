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
<table  class="table " >
</div>
<thead>
<tr>
<th align='center'>No</th>
<th align='center'>UMK</th>
<th align='center' style="width: 100px;">Aksi</th>                                                                                    
</tr>
</thead>
<?php
$sql = mysqli_query($konek,"SELECT * from umk");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td style='width:20px' align='center'>$no</td>
<td align='center'>$d[UMK]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='settingUMK.php?view=edit&id=$d[id]' ></a>
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
case "edit";  
$sqlEdit = mysqli_query($konek,"select * from umk where id='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
$query = "SELECT max(id) as id FROM umk";
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
<li class="list-inline-item">Setting UMK</li>
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
<strong></strong>
<small> UMK</small>
</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form method="post" action="aksi_settingUMK.php?act=update" class="form-horizontal">
</div>
    <table  width="900px">
      <tr>
      <td>
         <div class="form-group">
        <label for="id" class=" form-control-label">UMK</label>
        <input type="text"name="id" id="id" value="<?php echo $e['id']?>" readonly class="form-control" style="width: 400px"/>
        </div>
      </td>
       <td>
        <div class="form-group">
        <label for="UMK" class=" form-control-label">UMK</label>
        <input type="text"name="UMK" id="UMK" value="<?php echo $e['UMK']?>"  class="form-control" style="width: 400px"/>
        </td>
    </div>
      </tr>
     
    </table>

<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="settingUMK.php">kembali</a>
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

