<?php include "header.php"; ?>

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
                                            <li class="list-inline-item">Status Karyawan</li>
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
                                        <strong>Status</strong>
                                        <small> Tambah</small>
                                    </div>
                                    <div style='margin-left:30px;'>
                                    <div class="card-body card-block row">
                                    	<form action="" method="post" class="form-horizontal">
                                     <!--    <div class="form-group">
                                            <label for="Id_Karyawan" class=" form-control-label">Company</label>
                                            <input type="text" id="company" placeholder="Enter your company name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">VAT</label>
                                            <input type="text" id="vat" placeholder="DE1234567890" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Street</label>
                                            <input type="text" id="street" placeholder="Enter street name" class="form-control">
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">City</label>
                                                    <input type="text" id="city" placeholder="Enter your city" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Postal Code</label>
                                                    <input type="text" id="postal-code" placeholder="Postal Code" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class=" form-control-label">Country</label>
                                            <input type="text" id="country" placeholder="Country name" class="form-control">
                                        </div> -->
                                    </div>
                                    <table  width="900px">
                                    	<tr>
                                    		<td>
	                                    	<div class="form-group">
	                                            <label for="Id_Status" class=" form-control-label">Id Status</label>
	                                            <input type="text" id="Id_Status" placeholder="Masukkan ID Status" class="form-control"style="width: 400px">
                                        	</div>

                                   			</td>
                                       		
                                        </tr>
                                        <tr>
                                        	<td>
	                                    	<div class="form-group">
	                                            <label for="Nama_Status" class=" form-control-label">Nama Status</label>
	                                            <input type="text" id="Nama_Status"  placeholder="Masukkan Nama Status Anda" class="form-control"style="width: 400px" >
	                                               
                                        	</div>

                                   		
                                        </tr>
                                     
                                    </table>
                                     <div class="card-body">
                                        <button type="button" class="btn btn-primary btn-sm">Simpan</button>
                                        <button type="button" class="btn btn-danger btn-sm">Keluar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                       <div class="row m-t-30">
        </div>
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id Status</th>
                                                <th>Nama Status</th>
                                               
                                                <th>Aksi</th>                                                                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>Mobile</td>
                                                <td>iPhone X 64Gb Grey</td>
                                               
                                            </tr>
                                            <tr>
                                                <td>2018-09-28 01:22</td>
                                                <td>Mobile</td>
                                                <td>Samsung S8 Black</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>2018-09-27 02:12</td>
                                                <td>Game</td>
                                              	<td>Samsung S8 Black</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-26 23:06</td>
                                                <td>Mobile</td>
                                              	<td>Samsung S8 Black</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-25 19:03</td>
                                                <td>Accessories</td>
                                               	<td>Samsung S8 Black</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>Accesories</td>
                                                <td>Smartwatch 4.0 LTE Wifi</td>
                                              
                                            </tr>
                                            <tr>
                                                <td>2018-09-24 19:10</td>
                                                <td>Camera</td>
                                                <td>Camera C430W 4k</td>
                                               
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>


<?php include "footer.php"; ?>
													