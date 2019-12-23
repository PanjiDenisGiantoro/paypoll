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
<a href="kasbon.php?view=tambah" class="btn btn-primary" style="float: right; margin-right: 30px ; margin-top: 40px" >Tambah Data kasbon Karyawan</a>
<table  class="table " >
</div>
<thead>
<tr>
<th align='center'>No</th>
<th align='center'>Nama Karyawan</th>
<th align='center'>Tanggal Absen</th>
<th align='center' style="width: 100px;">Aksi</th>                                                                                    
</tr>
</thead>
<?php
$sql = mysqli_query($konek,"SELECT b.id as id ,a.nama AS nama,b.idKaryawan AS idKaryawan,b.keterangan AS keterangan,a.id AS ids,b.tgl AS tgl,b.`jumlahKasbon` AS `jumlahKasbon` FROM karyawans a JOIN kasbons b ON a.id = b.idKaryawan");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[nama]</td>
<td align='center'>$d[tgl]</td>
<td width='50px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='kasbon.php?view=edit&id=$d[id]' ></a>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_kasbon.php?act=del&id=$d[id]'></a>
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
<li class="list-inline-item">Tambah Kasbon</li>
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
<strong>kasbon</strong>
<small> Tambah</small>
</div>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form method="post" action="aksi_kasbon.php?act=insert" class="form-horizontal">
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
        $jsArray .= "dtMhs['".$row['id']."'] = {
          nama:'".addslashes($row['nama'])."'
        };\n";   
    }     
    ?>   
        </select>
    </td>
    <td>
         <div class="form-group">
  <label for="id" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" class="form-control"style="width: 400px"/>
    </td>
      </tr>
      <tr>
       <td>
        <div class="form-group">
  <label for="jumlahKasbon" class=" form-control-label">jumlah Kasbon</label>
      <input type="number" name="jumlahKasbon" id="jumlahKasbon" class="form-control"style="width: 400px"/></td>
       <td>
        <div class="form-group">
        <label for="TanggalKasbon" class=" form-control-label">Tanggal Kasbon</label>
        <input type="date"name="TanggalKasbon" id="TanggalKasbon" value="<?php echo date('Y-m-d') ?>" class="form-control" style="width: 400px"/>
        </td>
    </div>
      </tr>
      <tr>
      <tr>
          <td>
                  <label for="keterangan" class="form-control-label">Keterangan</label>
                  <textarea rows="5" class="form-control" id="keterangan" name="keterangan" style="width: 400px">
                  </textarea>
          </td>
          <td>
            
         <div class="form-group">
  <label for="id" class=" form-control-label">Nama Karyawan</label>
      <!-- <input type="text" name="nama" id="nama" class="form-control"style="width: 400px"/> -->
       <input type="text" id="buah" name="buah" placeholder="Nama Buah" value="">
          </td>
      </tr>
    </table>
      <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id){ 
    document.getElementById('nama').value = dtMhs[id].nama;
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
$sqlEdit = mysqli_query($konek,"select * from kasbons a join karyawans b on a.idKaryawan = b.id where a.id='$_GET[id]'");
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
<style type="text/css">
   input[type=text] {
                border: 2px solid #bdbdbd;
                font-family: 'Roboto', Arial, Sans-serif;
                font-size: 15px;
                font-weight: 400;
                padding: .5em .75em;
                width: 300px;
            }
            input[type=text]:focus {
                border: 2px solid #757575;
                outline: none;
            }
            .autocomplete-suggestions {
                border: 1px solid #999;
                background: #FFF;
                overflow: auto;
            }
            .autocomplete-suggestion {
                padding: 2px 5px;
                white-space: nowrap;
                overflow: hidden;
            }
            .autocomplete-selected {
                background: #F0F0F0;
            }
            .autocomplete-suggestions strong {
                font-weight: normal;
                color: #3399FF;
            }
            .autocomplete-group {
                padding: 2px 5px;
            }
            .autocomplete-group strong {
                display: block;
                border-bottom: 1px solid #000;
            }
</style>
<div style='margin-left:30px;'>
<div class="card-body card-block row">
<form action="aksi_kasbon.php?act=update" method="post" class="form-horizontal">
</div>
  <table  width="900px">
       <tr>
        <td>
            <div class="form-group">
                <label for="idKaryawan" class=" form-control-label">Id Karyawan</label>
           <input type="text" name="idKaryawan" id="idKaryawan" value="<?php echo $e['idKaryawan']?>" readonly class="form-control"style="width: 400px"/>
    </td>
    <td>
         <div class="form-group">
  <label for="id" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" value="<?php echo $e['nama']?>" class="form-control" readonly style="width: 400px"/>
    </td>
      </tr>
      <tr>
       <td>
        <div class="form-group">
  <label for="jumlahKasbon" class=" form-control-label">jumlah Kasbon</label>
      <input type="number" name="jumlahKasbon" id="jumlahKasbon" value="<?php echo $e['jumlahKasbon']?>"  class="form-control"style="width: 400px"/></td>
       <td>
        <div class="form-group">
        <label for="TanggalKasbon" class=" form-control-label">Tanggal Kasbon</label>
        <input type="date"name="TanggalKasbon" id="TanggalKasbon" value="<?php echo $e['tgl']?>" class="form-control" style="width: 400px"/>
        </td>
    </div>
     
      <tr>
          <td>
              <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea rows="5" class="form-control" id="keterangan" name="keterangan" style="width: 400px"><?php echo $e['keterangan']?>
              </textarea>
          </td>
      </tr>
    </table>
<div class="card-body">
<input type="submit" class="btn btn-primary" value="simpan">
<a class="btn btn-danger" href="kasbon.php">kembali</a>
<input type="checkbox" id="sitem" name="sitem"  style="width: 30px;height: 30px;" >
          <span>Mode Edit</span>
<script type="text/javascript">
  
     $(function () {
                $( "#jumlahKasbon" ).prop( "disabled", true );
                 $( "#TanggalKasbon" ).prop( "disabled", true );
                 $( "#keterangan" ).prop( "disabled", true );
                 $('#sitem').change(function(){
                    if ($(this).is(':checked')) {
                       $( "#jumlahKasbon" ).prop( "disabled", false );
                 $( "#TanggalKasbon" ).prop( "disabled", false );
                 $( "#keterangan" ).prop( "disabled", false );
                       $( "#jumlahKasbon" ).prop( "clear", true );
                       $( "#TanggalKasbon" ).prop( "clear", true );
                       $( "#keterangan" ).prop( "clear", true );
                    }else if(!$(this).is(':checked')){
                        $( "#jumlahKasbon" ).prop( "disabled", true );
                 $( "#TanggalKasbon" ).prop( "disabled", true );
                 $( "#keterangan" ).prop( "disabled", true );
                    }
                });
               });
 
    </script>
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