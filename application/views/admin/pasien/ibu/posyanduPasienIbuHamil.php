<?php
foreach($data_ibuhamil as $data){
  $id_ibuhamil = $data->id_ibuhamil;
} ?>
<div class="side-app">
  <!--Page Header-->
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Pasien Ibu Hamil</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html') ?>">Daftar Pasien Ibu Hamil</a></li>
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
			<div class="card-body p-6">
				<div class="panel panel-primary">
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
							    <form role="form" action="<?php echo site_url('Admin/inputpenibuhamil_act') ?>" method="post">
							    	<div class="row">
							    		<?php if($cek_kematian->tgl_kematian == 0){ ?>
										<?php if($cek_tgl_penimb == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          <div class="form-group">
								            <label class="form-label">Berat Badan</label>
											<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
								            <input type="number" class="form-control" placeholder="Berat Badan" name="bb_ibu" required>
								          </div>
								        </div>
								        <div class="col-sm-6 col-md-6">
								          <div class="form-group">
								            <label class="form-label">Lingkar Lengan</label>
								            <input type="number" class="form-control" placeholder="Lingkar Lengan" name="lingleng" required>
								          </div>
								        </div>
								        <div class="col-sm-6 col-md-2">
								          <div class="form-group">
								            <label class="form-label">Tekanan Darah Sistolik</label>
								            <input type="number" class="form-control" placeholder="atas" name="sistol" required>
								          </div>
								        </div>
								        <div class="col-sm-6 col-md-2">
								          <div class="form-group">
								            <label class="form-label">Diastolik</label>
								            <input type="number" class="form-control" placeholder="bawah" name="diastol" required>
								          </div>
								        </div>
								        
								        <div class="col-sm-6 col-md-2">
								          <div class="form-group">
								            <label class="form-label">Detak Bayi</label>
								            <input type="number" class="form-control" placeholder="detak bayi" name="dbayi" required>
								          </div>
								        </div>
								        <div class="col-sm-3 col-md-3">
								          <div class="form-group">
            							    <label class="form-label">Posisi Bayi</label>
            							    <select class="form-control" name="posisi" required>
            							      <optgroup label="">
            							      	<option value="-">-</option>
            							        <option value="Anterior">Anterior</option>
            							        <option value="Posterior">Posterior</option>
            							        <option value="Sungsang">Sungsang</option>
            							        <option value="Melintang">Melintang</option>
            							      </optgroup>
           							     	</select>
            							  </div>
								        </div>
								        <!--<div class="col-sm-6 col-md-6">
								          <div class="form-group">
								            <label class="form-label">Keluhan</label>
								            <input type="text" class="form-control" placeholder="bawah" name="keluhan" required>
								          </div>
								        </div> -->
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
							            <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a>
							      </div>
							    </form>
							</div>
							<div class="tab-pane " id="tab6">
								<div class="card-title font-weight-bold">Tambah Data Pemberian Vitamin:</div>
							    <form role="form" action="<?php echo site_url('Admin/inputpemvitibu_act') ?>" method="post">
								<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
							    	<div class="row">
							    	<?php if($cek_kematian->tgl_kematian == 0){ ?>
									<?php if($cek_tgl_vit == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          <div class="form-group">
					                          <label class="form-label">Jenis Vitamin </label>
					                          <select class="form-control select2" name="id_vit" id="id_vit" data-placeholder="Choose one (with optgroup)" required>
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
								            <!-- <input type="number" class="form-control" placeholder="Lingkar Lengan" name="lingleng" required> -->
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
							            <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a>
							      </div>
							    </form>
							</div>
							<div class="tab-pane " id="tab7">
								<div class="card-title font-weight-bold">Tambah Data Pemberian Imunisasi:</div>
							    <form role="form" action="<?php echo site_url('Admin/inputpemimunibu_act') ?>" method="post">
								<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
							    	<div class="row">
							    	<?php if($cek_kematian->tgl_kematian == 0){ ?>
									<?php if($cek_tgl_imun == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          <div class="form-group">
					                          <label class="form-label">Jenis Imunisasi </label>
					                          <select class="form-control select2" name="id_imun" data-placeholder="Choose one (with optgroup)" required>
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
										<h2 class="center">Pemberian Imunisasi Hari Ini Sudah Ada</h2>
										<?php } ?>
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
							    <form role="form" action="<?php echo site_url('Admin/inputkematian_act') ?>?>" method="post">
							    	<div class="row">
							    		<?php if($cek_kematian->tgl_kematian == 0){ ?>
							    		<div class="col-sm-6 col-md-6">
								          	<div class="form-group">
					                          	<div class="col-sm-6 col-md-6">
									                <div class="form-group">
														<label class="form-label">Tanggal Kematian</label>
														<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
										                <input type="date" class="form-control" placeholder="Tanggal Kematian" name="tanggal_kematian">
										            </div>
										        </div>
										        <div class="col-sm-12 col-md-12">
									                <div class="form-group">
														<label class="form-label">Penyebab Kematian</label>
														<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
										                <textarea class="form-control" placeholder="Penyebab Kematian" name="penyebab"></textarea>
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
							            <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a>
								    </div>
							    </form>
							</div>
							<div class="tab-pane " id="tab9">
								<div class="card-title font-weight-bold">Input Penyuluhan :</div>
							    <form role="form" action="<?php echo site_url('Admin/inputpelayananbumil_act') ?>?>" method="post">
							    	<div class="row">
							    		<div class="col-sm-6 col-md-6">
								          	<div class="form-group">
					                          	<div class="col-sm-6 col-md-6">
									                <div class="form-group">
														<label class="form-label">Keluhan</label>
														<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
										                <textarea class="form-control" placeholder="Keluhan Pasien" name= "keluhan"></textarea>
										            </div>
										        </div>
										        <div class="col-sm-12 col-md-12">
									                <div class="form-group">
														<label class="form-label">Nasihat</label>
														<input type="hidden" class="form-control" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>">
										                <textarea class="form-control" placeholder="Penyuluhan yang diberikan" name= "nasihat"></textarea>
										            </div>
										        </div>
					                        </div>
								        </div>								        
							    	</div>
							        
							        <hr>
								    <div class="text-center">
							            <button type="submit" class="btn btn-primary">Simpan</button>
							            <a href="<?php echo base_url('pasien/detailPasienIbuHamil'); ?>" class="btn btn-secondary">Cancel</a>
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