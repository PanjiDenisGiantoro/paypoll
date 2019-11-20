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
                                            <li class="list-inline-item">Employee Karyawan</li>
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
	                                            <label for="Id_Karyawan" class=" form-control-label">Id Karyawan</label>
	                                            <input type="text" id="Id_Karyawan" placeholder="Masukkan ID Karyawan" class="form-control"style="width: 400px">
                                        	</div>

                                   			</td>
                                       		<td> 
                                       		<div class="form-group">
                                            	<label for="Nama_Karyawan" class=" form-control-label">Nama Karyawan</label>
                                           		<input type="text" id="Nama_Karyawan" placeholder="Masukkan Nama Karyawan" class="form-control"style="width: 400px">
                                        	</div>
                                        	</td>
                                        </tr>
                                        <tr>
                                        	<td>
	                                    	<div class="form-group">
	                                            <label for="datepicker" class=" form-control-label">Tanggal Masuk</label>
	                                            <input type="text" id="datepicker"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control"style="width: 400px" >
	                                               
                                        	</div>

                                   			</td>
                                       		<td> 
                                       		<div class="form-group">
                                            	<label for="TglPengangkatan" class=" form-control-label">Tanggal Pengangkatan</label>
                                           		<input type="text" id="TglPengangkatan" placeholder="Masukkan Tanggal Pengangkatan Anda" class="form-control datepicker"style="width: 400px">
                                        	</div>
                                        	</td>
                                        </tr>
                                        <tr>
                                        	<td>
	                                    	<div class="form-group">
	                                            <label for="Status" class=" form-control-label">Status</label>
	                                            <input type="text" id="Status" placeholder="Masukkan Status Anda" class="form-control"style="width: 400px">
                                        	</div>

                                   			</td>
                                   			<td>
	                                    	<div class="form-group">
	                                            <label for="Jabatan" class=" form-control-label">Jabatan</label>
	                                            <input type="text" id="Jabatan" placeholder="Masukkan Jabatan Anda" class="form-control"style="width: 400px">
                                        	</div>

                                   			</td>
                                       		
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

<?php include "footer.php"; ?>
													