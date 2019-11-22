    <?php include"header.php";?>
       
    <br>
    <br>

        <?php 
        $view =isset($_GET['view']) ? $_GET['view'] :null;


        switch ($view) {
            default:
            ?>
            
             <div class="row m-t-10">
                <div class="col-md-12">
                 <div class="table-responsive m-b-30">
                <table style="width: 40%" class="table table-borderless table-data1" >
                    <thead>
                        <tr>
                            <th align='center'>No</th>
                            <th align='center'>Id</th>
                            <th align='center'>Nama Karyawan</th>
                            <th align='center'>Card Number</th>
                            <th align='center'>Jabatan</th>
                            <th align='center'>Status</th>
                            <th align='center'>Tempat Jabatan</th>
                            <th align='center'>Tanggal Masuk</th>
                            <th align='center'>Tanggal Keluar</th>
                            <th align='center'>BPJS Kesehatan</th>
                            <th align='center'>BPJS Ketenagakerjaan</th>
                            <th align='center'>Aksi</th>                                                                                                
                        </tr>
                         </thead>
                        <?php
                        $sql = mysqli_query($konek,"select * from karyawans ");
                        $no=1;
                        while($d= mysqli_fetch_array($sql)){
                            echo 
                            "<tr>
                                <td width='40px' align='center'>$no</td>
                                <td align='center'>$d[id]</td>
                                <td align='center'>$d[nama]</td>
                                <td align='center'>$d[CardNumber]</td>
                                <td align='center'>$d[jabatan]</td>
                                <td align='center'>$d[status]</td>
                                <td align='center'>$d[tempatJabatan]</td>
                                <td align='center'>$d[tglMasuk]</td>
                                <td align='center'>$d[tglKeluar]</td>
                                <td align='center'>$d[bpjsKes]</td>
                                <td align='center'>$d[bpjsKet]</td>
                                <td width='40px' align='center'>
                                <a class='btn btn-warning btn-sm' href='karyawan.php?view=edit&id=$d[id]'>Edit</a>
                                <a class='btn btn-warning btn-sm' href='karyawan.php?act=del&id=$d[id]'>Hapus</a>
                                </td>
                            </tr>";
                            $no;
                        }
                        ?>
                   
                    <tbody>
                 
            </div>
        </div>
    </div>
    </div>


            <?php
            
        }
        ?>
        
                          
      <?php include"footer.php";?>