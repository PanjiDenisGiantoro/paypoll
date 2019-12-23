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
<a href="potongan.php?view=tambah" class="btn btn-primary" style="float: right; margin-right: 30px ; margin-top: 40px" >Tambah Data potongan Karyawan</a>
<table  class="table " >
</div>
<thead>
<tr>
<th align='center'>No</th>
<th align='center'>Nama Karyawan</th>
<th align='center'>Tanggal Potongan</th>
<th align='center'>Zakat</th>
<th align='center'>Pinjaman</th>
<th align='center'>Kasbon</th>
<th align='center'>Pinjaman Lain Lain</th>
<th align='center'>Makan</th>
<th align='center'>BPJS Kesehatan</th>
<th align='center'>BPJS Ketenagakerjaan </th>
<th align='center' style="width: 100px;">Aksi</th>                                                                                    
</tr>
</thead>
<?php
$sql = mysqli_query($konek,"SELECT a.*, b.nama FROM potongans a JOIN karyawans b ON a.idKaryawan = b.id");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[nama]</td>
<td align='center'>$d[tanggal_p]</td>
<td align='center'>$d[zakat]</td>
<td align='center'>$d[Pinjaman]</td>
<td align='center'>$d[Kasbon]</td>
<td align='center'>$d[Lainlain]</td>
<td align='center'>$d[makan]</td>
<td align='center'>$d[bpjsKes]</td>
<td align='center'>$d[bpjsKet]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='potongan.php?view=edit&id=$d[id]' ></a>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_potongan.php?act=del&id=$d[id]'></a>
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
<li class="list-inline-item">Tambah potongan</li>
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
<strong>potongan</strong>
<small> Tambah</small>
</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form method="post" action="aksi_potongan.php?act=insert" class="form-horizontal">
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
    $result = mysqli_query($konek,"
                       
 SELECT a.nama , a.id,sum(b.jumlahKasbon) as jumlahKasbon,c.jumlah,d.sisaPinjaman,e.namajabatan,e.gapok  
                        FROM karyawans a JOIN kasbons b ON  a.id = b.idKaryawan
                        JOIN lainlains c ON c.idKaryawan = a.id
                        JOIN pinjamen d ON d.idKaryawan = a.id
                        JOIN jabatan e ON a.jabatan = e.namajabatan 
");   
    $jsArray = "var dtMhs = new Array();\n";       
    while ($row = mysqli_fetch_array($result)) {   
        echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';   
        $jsArray .= "dtMhs['".$row['id']."'] = {nama:'".addslashes($row['nama'])."',jumlahKasbon:'".addslashes($row['jumlahKasbon'])."',sisaPinjaman:'".addslashes($row['sisaPinjaman'])."',jumlah:'".addslashes($row['jumlah'])."',gapok:'".$row['gapok']."'};\n";
    }     
    ?>   
        </select>
    </div>  
    </td>
    <td>
              <div class="form-group">
  <label for="nama" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" class="form-control"style="width: 400px"/>
    </div>
    </td>
      </tr>
      <tr>
       <td>
        <div class="form-group">
  <label for="tanggalPotongan" class=" form-control-label">Tanggal Potongan</label>
      <input type="date" name="tanggalPotongan" id="tanggalPotongan"  value="<?php echo date('Y-m-d') ?>" class="form-control"style="width: 400px"/></td>
       <td>
        <div class="form-group">
        <label for="gapok" class=" form-control-label">Zakat</label>
        <input type="number"name="gapok" id="gapok"  class="form-control" style="width: 400px"/>
        </td>
    </div>
      </tr>
      <tr>
      <tr>
          <td>
                  <label for="makan" class="form-control-label">makan</label>
                  <input type="number"name="makan" id="makan"  class="form-control" style="width: 400px"/>
          </td>
          <td>
              <label for="sisaPinjaman" class="form-control-label">Biaya Pinjaman</label>
                  <input type="number"name="sisaPinjaman" id="sisaPinjaman"  class="form-control" style="width: 400px"/>
          </td>
      </tr>
      <tr>
          <td>

              <label for="bpjsKes" class="form-control-label">BPJS Kesehatan</label>

                    <?php
            $bpjs = mysqli_query($konek,"select *from bpjs_kes limit 1");
            $bpjs1 =mysqli_fetch_array($bpjs);
            $bpjskes=$bpjs1['angkaKaryawan']; 
            ?>
                 <select name="bpjsKes"  class="form-control-sm form-control" style="width: 400px">
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
          </td>
          <td>
              <label for="bpjsKet" class="form-control-label">BPJS Ketenagakerjaan</label>
            <?php
            $bpjs = mysqli_query($konek,"select *from bpjs_kets limit 1");
            $bpjs1 =mysqli_fetch_array($bpjs);
            $bpjskes=$bpjs1['angkaKaryawan']; 
            ?>
                 <select name="bpjsKet"  class="form-control-sm form-control" style="width: 400px">
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
          </td>
      </tr>
      <tr>
          <td>
              <label for="jumlahKasbon" class="form-control-label">biaya Kasbon</label>
                  <input type="number"name="jumlahKasbon" id="jumlahKasbon"  class="form-control" style="width: 400px"/>
          </td>
          <td>
              <label for="jumlah" class="form-control-label">Pinjaman Lain lain</label>
                  <input type="number"name="jumlah" id="jumlah"  class="form-control" style="width: 400px"/>
          </td>
      </tr>
    </table>
       <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id){ 
    document.getElementById('nama').value = dtMhs[id].nama;
    document.getElementById('jumlahKasbon').value = dtMhs[id].jumlahKasbon;
    document.getElementById('sisaPinjaman').value = dtMhs[id].sisaPinjaman;
    document.getElementById('jumlah').value = dtMhs[id].jumlah;
    document.getElementById('gapok').value = dtMhs[id].gapok * 0.025;
    }; 
    </script>
<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="kasbon.php">kembali</a>
</div>
</div>
</div>
</form>
</div>
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from kasbons a join karyawans b on a.idKaryawan = b.id where a.idKaryawan='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
$query = "SELECT max(id) as id FROM pinjamen";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $noUrut;
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
<form action="aksi_kasbon.php?act=update" method="post" class="form-horizontal">
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
    $result = mysqli_query($konek,"
                       
 SELECT a.nama , a.id,sum(b.jumlahKasbon) as jumlahKasbon,c.jumlah,d.sisaPinjaman,e.namajabatan,e.gapok  
                        FROM karyawans a JOIN kasbons b ON  a.id = b.idKaryawan
                        JOIN lainlains c ON c.idKaryawan = a.id
                        JOIN pinjamen d ON d.idKaryawan = a.id
                        JOIN jabatan e ON a.jabatan = e.namajabatan 
");   
    $jsArray = "var dtMhs = new Array();\n";       
    while ($row = mysqli_fetch_array($result)) {   
        echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';   
        $jsArray .= "dtMhs['".$row['id']."'] = {nama:'".addslashes($row['nama'])."',jumlahKasbon:'".addslashes($row['jumlahKasbon'])."',sisaPinjaman:'".addslashes($row['sisaPinjaman'])."',jumlah:'".addslashes($row['jumlah'])."',gapok:'".$row['gapok']."'};\n";
    }     
    ?>   
        </select>
    </div>  
    </td>
    <td>
              <div class="form-group">
  <label for="nama" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" class="form-control"style="width: 400px"/>
    </div>
    </td>
      </tr>
      <tr>
       <td>
        <div class="form-group">
  <label for="tanggalPotongan" class=" form-control-label">Tanggal Potongan</label>
      <input type="date" name="tanggalPotongan" id="tanggalPotongan"  value="<?php echo date('Y-m-d') ?>" class="form-control"style="width: 400px"/></td>
       <td>
        <div class="form-group">
        <label for="gapok" class=" form-control-label">Zakat</label>
        <input type="number"name="gapok" id="gapok"  class="form-control" style="width: 400px"/>
        </td>
    </div>
      </tr>
      <tr>
      <tr>
          <td>
                  <label for="makan" class="form-control-label">makan</label>
                  <input type="number"name="makan" id="makan"  class="form-control" style="width: 400px"/>
          </td>
          <td>
              <label for="sisaPinjaman" class="form-control-label">Biaya Pinjaman</label>
                  <input type="number"name="sisaPinjaman" id="sisaPinjaman"  class="form-control" style="width: 400px"/>
          </td>
      </tr>
      <tr>
          <td>
              <label for="bpjsKes" class="form-control-label">BPJS Kesehatan</label>
                  <input type="number"name="bpjsKes" id="bpjsKes"  class="form-control" style="width: 400px"/>
          </td>
          <td>
              <label for="bpjsKet" class="form-control-label">BPJS Ketenagakerjaan</label>
                  <input type="number"name="bpjsKet" id="bpjsKet"  class="form-control" style="width: 400px"/>
          </td>
      </tr>
      <tr>
          <td>
              <label for="jumlahKasbon" class="form-control-label">biaya Kasbon</label>
                  <input type="number"name="jumlahKasbon" id="jumlahKasbon"  class="form-control" style="width: 400px"/>
          </td>
          <td>
              <label for="jumlah" class="form-control-label">Pinjaman Lain lain</label>
                  <input type="number"name="jumlah" id="jumlah"  class="form-control" style="width: 400px"/>
          </td>
      </tr>
    </table>
<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="kasbon.php">kembali</a>
</div>
<script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id){ 
    document.getElementById('nama').value = dtMhs[id].nama;
    document.getElementById('jumlahKasbon').value = dtMhs[id].jumlahKasbon;
    document.getElementById('sisaPinjaman').value = dtMhs[id].sisaPinjaman;
    document.getElementById('jumlah').value = dtMhs[id].jumlah;
    document.getElementById('gapok').value = dtMhs[id].gapok * 0.025;
    }; 
    </script>
</div>
</div>
</form>
</div>
<?php
break;
}
?>
<?php include"footer.php";?>

