
<title>Combobox</title>

<p></p>
    <table width="451" border="0" align="center">
      <tr>
        <td width="118">id</td>
        <td width="323"><select name="id" id="id" onchange="changeValue(this.value)" >
        <option value=0>-Pilih-</option>
         <?php
         $konek = mysqli_connect("localhost","root","","payrol");
    $result = mysqli_query($konek,"SELECT a.id as id,a.nama as nama , a.jabatan as jabatan from karyawans a join absens b on a.id = b.idKaryawan");   
    $jsArray = "var dtMhs = new Array();\n";       
    while ($row = mysqli_fetch_array($result)) {   
        echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';   
        $jsArray .= "dtMhs['".$row['id']."'] = {nama:'".addslashes($row['nama'])."',jabatan:'".addslashes($row['jabatan'])."'};\n";   
    }     
    ?>   
        </select>
    </td>
      </tr>
      <tr>
        <td>Nama Mahasiswa</td>
        <td><input type="text" name="nama" id="nama"/></td>
      </tr>
      <tr>
        <td>Jurusan</td>
        <td><input type="text" name="jabatan" id="jabatan"/></td>
      </tr>
    </table>
      <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id){ 
    document.getElementById('nama').value = dtMhs[id].nama; 
    document.getElementById('jabatan').value = dtMhs[id].jabatan; 
    }; 
    </script>