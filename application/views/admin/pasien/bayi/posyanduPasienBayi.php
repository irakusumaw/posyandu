<div class="side-app">
  <!--Page Header-->
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Pasien Bayi</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Bayi.html') ?>">Daftar Pasien Bayi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Posyandu Pasien</li>
    </ol>
  </div>

  <div class="row"> 
  	<?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
  	<div class="col-md-12 col-lg-12">
  		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Posyandu</h3>
			</div>
			<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="expanel expanel-default mb-0">
								<div class="expanel-heading">
									<h3 class="expanel-title">Informasi Pemberian Vitamin</h3>
								</div>
								<div class="expanel-body">								
									<div class="row">
										<div class="table-responsive">
											<table class="table card-table table-vcenter table-bordered">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th>Nama Vitamin</th>
														<th width="40%">Keterangan</th>
														<th width="15%">Tgl Pemberian</th>
														<!-- <th>Nama Imunisasi</th>
														<th width="20%">Keterangan</th>
														<th>Tanggal Pemberian</th> -->
													</tr>
												</thead>
												<tbody>
												<?php
													$no=1;
													foreach($data_vit as $data): 
												?>
													<tr>
														<th scope="row"><?php echo $no++ ?></th>
														<td><?php echo $data->nama_vit ?></td>
														<td><?php  echo $data->tgl_pem ?></td>
														<td><?php echo $data->ket ?></td>
														<!-- <td>Anti Corona</td>
														<td>Biar kebal dari corona</td>
														<td>DD-MM-YYYY</td> -->
													</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>								
									</div>						
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="expanel expanel-default mb-0">
								<div class="expanel-heading">
									<h3 class="expanel-title">Informasi Pemberian Imun</h3>
								</div>
								<div class="expanel-body">								
									<div class="row">
										<div class="table-responsive">
											<table class="table card-table table-vcenter table-bordered">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th>Nama Imunisasi</th>
														<th width="15%">Tgl Pemberian</th>
														<th width="40%">Keterangan</th>
													</tr>
												</thead>
												<tbody>
												<?php
													$no=1;
													foreach($data_imun as $data): 
												?>
													<tr>
														<th scope="row"><?php echo $no++ ?></th>
														<td><?php echo $data->nama_imun ?></td>
														<td><?php  echo $data->tgl_pem ?></td>
														<td><?php echo $data->ket ?></td>
														<!-- <td>Anti Corona</td>
														<td>Biar kebal dari corona</td>
														<td>DD-MM-YYYY</td> -->
													</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>								
									</div>						
								</div>
							</div>
						</div>	
					</div>
					<br>
					<div class=" tab-menu-heading">
						<div class="tabs-menu1 ">
							<!-- Tabs -->
							<ul class="nav panel-tabs">
								<li class=""><a href="#tab5" class="active" data-toggle="tab">Pemeriksaan</a></li>
								<li><a href="#tab6" data-toggle="tab">Pemberian Vitamin</a></li>
								<li><a href="#tab7" data-toggle="tab">Pemberian Imunisasi</a></li>
								<li><a href="#tab8" data-toggle="tab">Tanggal Kematian</a></li>
								<li><a href="#tab9" data-toggle="tab">Input Penyuluhan</a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body tabs-menu-body">
						<div class="tab-content">
							<div class="tab-pane active " id="tab5">
								<div class="card-title font-weight-bold">Tambah Data Pemeriksaan:</div>
							    <form role="form" action="<?php echo base_url('Admin/inputPenimBayiAct') ?>" method="post">
						    		<div class="row">
						    		<?php if($cek_kematian->tgl_kematian == 0){ ?>
									<?php if($cek_tgl_penimb == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          <div class="form-group">
								            <label class="form-label">Berat Badan (dalam Gram)</label>
								            <input type="hidden" class="form-control" id="id_balita" name="id_balita" value="<?php echo $this->uri->segment(3); ?>">
								            <input type="number" class="form-control" placeholder="Berat Badan" name="bb_bayi" required>
								          </div>
								        </div>
								        <div class="col-sm-6 col-md-6">
								          <div class="form-group">
								            <label class="form-label">Tinggi Badan (dalam Cm)</label>
								            <input type="number" class="form-control" placeholder="Tinggi Bayi" name="tinggi_bayi" required>
								            <!-- <textarea class="form-control" name="ket" rows="6" placeholder="Keterangan Imunisasi"></textarea> -->
								          </div>
								        </div>
								        <div class="col-sm-6 col-md-6">
								          <div class="form-group">
								            <label class="form-label">Lingkar Kepala</label>
								            <input type="number" class="form-control" placeholder="Lingkar Kepala" name="lingkep" required>
								            <!-- <textarea class="form-control" name="ket" rows="6" placeholder="Keterangan Imunisasi"></textarea> -->
								          </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Tes Daya Dengar</label>
            							    <select class="form-control" name="tdd" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Baik">Baik</option>
            							        <option value="Kurang">Kurang</option>
            							        <option value="Rujuk">Rujuk</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Tes Daya Lihat</label>
            							    <select class="form-control" name="tdl" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Baik">Baik</option>
            							        <option value="Kurang">Kurang</option>
            							        <option value="Rujuk">Rujuk</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Skrining Perkembangan</label>
            							    <select class="form-control" name="kpsp" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Sesuai">Sesuai</option>
            							        <option value="Meragukan">Meragukan</option>
            							        <option value="Penyimpangan">Penyimpangan</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Perilaku Emosional</label>
            							    <select class="form-control" name="kmpe" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Sesuai">Sesuai</option>
            							        <option value="Meragukan">Meragukan</option>
            							        <option value="Penyimpangan">Penyimpangan</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Pemeriksaan Autishm</label>
            							    <select class="form-control" name="mchat" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Sesuai">Sesuai</option>
            							        <option value="Meragukan">Meragukan</option>
            							        <option value="Penyimpangan">Penyimpangan</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Pemusatan Perhatian</label>
            							    <select class="form-control" name="gpph" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Sesuai">Sesuai</option>
            							        <option value="Meragukan">Meragukan</option>
            							        <option value="Penyimpangan">Penyimpangan</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <?php }else{ ?>
										<h2 class="center">Penimbangan Hari Ini Sudah Ada</h2>
										<?php } ?>		
										<?php }else{ ?>
										<h2 class="center">Pasien telah Meninggal</h2>
										<?php } ?>								        
							    	</div>							        
							        <hr>
								    <div class="text-center">
							            <button type="submit" class="btn btn-primary">Simpan</button>
							            <a href="<?php echo base_url('pasien/Pasien-Bayi.html'); ?>" class="btn btn-secondary">Cancel</a>
								    </div>
							    </form>
							</div>
							<div class="tab-pane " id="tab6">
								<div class="card-title font-weight-bold">Tambah Data Pemberian Vitamin:</div>
							    <form role="form" action="<?php echo base_url('Admin/inputPemVitBayiAct') ?>" method="post">
							    	<input type="hidden" class="form-control" id="id_balita" name="id_balita" value="<?php echo $this->uri->segment(3); ?>">
							    	<div class="row">
							    	<?php if($cek_kematian->tgl_kematian == 0){ ?>
									<?php if($cek_tgl_vit == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          <div class="form-group">
					                          <label class="form-label">Jenis Vitamin </label>
					                          <select class="form-control select2" name="id_vit" data-placeholder="Choose one (with optgroup)" required>
					                            <optgroup> <?php foreach ($data_vitamin as $data){ ?> 
													<option value="<?php echo $data->id_vit; ?>">
														<?php echo $data->id_vit; ?> || <?php echo $data->nama_vit; ?>
													</option> 
													<?php } ?>
					                            </optgroup>
					                          </select>
					                        </div>
								        </div>
								        <div class="col-sm-12 col-md-12">
								          <div class="form-group">
								            <label class="form-label">Keterangan</label>
								            <textarea class="form-control" name="ket" rows="6" placeholder="Keterangan Vitamin"></textarea>
								          </div>
								        </div>
								        <?php }else{ ?>
										<h2 class="center">Pemberian Vitamin Hari Ini Sudah Ada</h2>
										<?php } ?>
										<?php }else{ ?>
										<h2 class="center">Pasien telah Meninggal</h2>
										<?php } ?>
							    	</div>
							        
							        <hr>
							      <div class="text-center">
							            <button type="submit" class="btn btn-primary">Simpan</button>
							            <a href="<?php echo base_url('pasien/Pasien-Bayi.html'); ?>" class="btn btn-secondary">Cancel</a>
							      </div>
							    </form>
							</div>
							<div class="tab-pane " id="tab7">
								<div class="card-title font-weight-bold">Tambah Data Pemberian Imunisasi:</div>
							    <form role="form" action="<?php echo base_url('Admin/inputPemImunBayiAct') ?>" method="post">
							    	<input type="hidden" class="form-control" id="id_balita" name="id_balita" value="<?php echo $this->uri->segment(3); ?>">
							    	<div class="row">
							    	<?php if($cek_kematian->tgl_kematian == 0){ ?>
									
							    		<div class="col-sm-6 col-md-6">
								          <div class="form-group">
					                          <label class="form-label">Jenis Imunisasi </label>
					                          <select class="form-control select2" name="id_imun" data-placeholder="Imunisasi Selesai" required>
					                            <optgroup> <?php foreach ($data_imunisasi as $data){ ?> 
													<option value="<?php echo $data->id_imun; ?>">
														<?php echo $data->id_imun; ?> || <?php echo $data->nama_imun; ?>
													</option> 
													<?php } ?>
					                            </optgroup>
					                          </select>
					                        </div>
								        </div>
								        <div class="col-sm-12 col-md-12">
								          <div class="form-group">
								            <label class="form-label">Keterangan</label>
								            <!-- <input type="number" class="form-control" placeholder="Lingkar Lengan" name="lingleng" required> -->
								            <textarea class="form-control" name="ket" rows="6" placeholder="Keterangan Vitamin"></textarea>
								          </div>
								        </div>
								        
										<?php }else{ ?>
										<h2 class="center">Pasien telah Meninggal</h2>
										<?php } ?>
							    	</div>
							        
							        <hr>
							      <div class="text-center">
							            <button type="submit" class="btn btn-primary">Simpan</button>
							            <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a>
							      </div>
							    </form>
							</div>
							<div class="tab-pane " id="tab8">
								<div class="card-title font-weight-bold">Tanggal Kematian:</div>
							    <form role="form" action="<?php echo base_url('Admin/inputKematianAct') ?>" method="post">
							    	<input type="hidden" class="form-control" id="id_balita" name="id_balita" value="<?php echo $this->uri->segment(3); ?>">
							    	<div class="row">
							    		<?php if($cek_kematian->tgl_kematian == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          	<div class="form-group">
					                          	<div class="col-sm-6 col-md-6">
									                <div class="form-group">
										                <label class="form-label">Tanggal Kematian</label>
										                <input type="date" class="form-control" placeholder="Tanggal Kematian" name="tgl_kematian">
										            </div>
										        </div>
										        <div class="col-sm-12 col-md-12">
								    		      <div class="form-group">
								    		        <label class="form-label">Penyebab</label>
								    		        <!-- <input type="number" class="form-control" placeholder="Lingkar Lengan" 		name="lingleng" required> -->
								    		        <textarea class="form-control" name="penyebab" rows="6" placeholder="Penyebab Kematian"></textarea>
								    		      </div>
								    		    </div>

					                        </div>
								        </div>	
								        <?php }else{ ?>
										<h2 class="center">Pasien telah Meninggal</h2>
										<?php } ?>							        
							    	</div>
							        
							        <hr>
								    <div class="text-center">
							            <button type="submit" class="btn btn-primary">Simpan</button>
							            <a href="<?php echo base_url('pasien/Pasien-Bayi.html'); ?>" class="btn btn-secondary">Cancel</a>
								    </div>
							    </form>
							    </div>
							<div class="tab-pane " id="tab9">
								<div class="card-title font-weight-bold">Input Penyuluhan:</div>
							    <form role="form" action="<?php echo base_url('Admin/inputPelayananBayiAct') ?>" method="post">
							    	<input type="hidden" class="form-control" id="id_balita" name="id_balita" value="<?php echo $this->uri->segment(3); ?>">
							    	<div class="row">
							    		<div class="col-sm-6 col-md-6">
								          	<div class="form-group">
					                          	<div class="col-sm-12 col-md-12">
									                <div class="form-group">
										                <label class="form-label">Keluhan</label>
										                <textarea class="form-control" name="keluhan" rows="6" placeholder="Keluhan"></textarea>
										            </div>
										        </div>
										        <div class="col-sm-12 col-md-12">
								    		      <div class="form-group">
								    		        <label class="form-label">Penyuluhan</label>
								    		        <!-- <input type="number" class="form-control" placeholder="Lingkar Lengan" 		name="lingleng" required> -->
								    		        <textarea class="form-control" name="nasihat" rows="6" placeholder="Penyuluhan"></textarea>
								    		      </div>
								    		    </div>

					                        </div>
								        </div>								        
							    	</div>
							        
							        <hr>
								    <div class="text-center">
							            <button type="submit" class="btn btn-primary">Simpan</button>
							            <a href="<?php echo base_url('pasien/detailPasienBayi'); ?>" class="btn btn-secondary">Cancel</a>
								    </div>
							    </form>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</div>
  </div>
</div>