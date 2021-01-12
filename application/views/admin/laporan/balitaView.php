<div class="side-app">
	<!--Page Header-->
	<div class="page-header">
		<h4 class="page-title"><i class="fe fe-grid mr-1"></i> Laporan Kegiatan Posyandu</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>"> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Laporan kegiatan posyandu Balita</li>
		</ol>
	</div>
	<!--page header-->

	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Laporan Kegiatan Posyandu Balita</div>
				</div>
				<div class="card-body">
				<form role="form" action="<?php echo site_url('admin/laporan_balita_act') ?>" method="post">
					<div class="row mb-2">
						<div class="col-xs-auto ml-1">
							<div class="input-group">
				              <!-- <label class="form-label"></label> -->
				              <input type="date" class="form-control fc-datepicker" placeholder="Start Date" name="start_date" id="start-date">
				            </div>
				        </div>
				        <div class="col-sm-auto h6 mt-3">to</div>
                        <div class="col-xs-auto">
				            <div class="input-group">
				              <!-- <label class="form-label">Tanggal Lahir</label> -->
				              <input type="date" class="form-control fc-datepicker" placeholder="End Date" name="end_date" id="end-date">
				            </div>
				        </div>
				        <!--<div class="col-xs-auto ml-1">
				              <!-- <label class="form-label">Jenis Imunisasi</label>
				          	<div class="form-group">      
					          <select class="form-control select2" name="id_imun" data-placeholder="Choose one (with optgroup)" required>
					            <optgroup> <?php foreach ($data_imunisasi as $data){ ?> 
									<option value="<?php echo $data->id_imun; ?>">
										<?php echo $data->id_imun; ?> || <?php echo $data->nama_imun; ?>
									</option> 
									<?php } ?>
					            </optgroup>
					          </select>
					        </div> 
				        </div> -->
				        <div class="col-xs-auto ml-1">
                            <button class="btn btn-sm btn-gray" type="submit" style="height:35px" id="btn-go"><i class="fas fa-filter"></i></button>
                        </div>
					</div>
				</form>					
					<div class="panel panel-primary">
						<div class=" tab-menu-heading">
							<div class="tabs-menu1 ">
								<!-- Tabs -->
								<ul class="nav panel-tabs">
									<li class=""><a href="#tab5" class="active" data-toggle="tab">Daftar Pemeriksaan</a></li>
									<li><a href="#tab6" data-toggle="tab">Daftar Pemberian Vitamin</a></li>
									<li><a href="#tab7" data-toggle="tab">Daftar Pemberian Imunisasi</a></li>
									<li><a href="#tab8" data-toggle="tab">Daftar Kematian</a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body tabs-menu-body">
							<div class="tab-content">
								<div class="tab-pane active " id="tab5">
									<div class="table-responsive">
										<table id="example" class="table table-bordered key-buttons text-nowrap" >
											<thead>
												<tr>
													<th class="border-bottom-0">No</th>
													<th class="border-bottom-0">Nama Pasien Balita</th>
													<th class="border-bottom-0">Nama Ibu</th>
													<th class="border-bottom-0">Berat Badan</th>
													<th class="border-bottom-0">Tinggi Badan</th>
													<th class="border-bottom-0">Tgl Pemeriksaan</th>
													<th class="border-bottom-0">Hasil</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_penimb_bayi)){
											$no = 1;
											foreach ($laporan_penimb_bayi as $data):
											$umur = $data->usia_bayi;
											$beratupdate = $data->bb_bayi;
											if($umur <= 12){
											$beratideal = ((($umur*1000) / 2) + 4000);
											
											if((int)$beratupdate <= ($beratideal - 1000)){ 
												$status = 'Berat Badan Kurang';
											 } elseif((int)$beratupdate >= ($beratideal + 500)){ 
												$status = 'Berat Badan Berlebih';
											 } else{ 
												$status = 'Berat Badan Normal';
											 }
											}else{
												$beratideal = (((($umur*1000) / 12) * 2) + 8000);
											if((int)$beratupdate < ($beratideal - 1000)){ 
												$status = 'Berat Badan Kurang';
											 } elseif((int)$beratupdate > ($beratideal + 1000)){ 
												$status = 'Berat Badan Berlebih';
											 } else{ 
												$status = 'Berat Badan Normal';
											 }
											}
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_bayi ?></td>
													<td><?php echo $data->nama_ibu ?> </td>
													<td><?php echo $data->bb_bayi ?> G</td>
													<td><?php echo $data->tinggi_bayi ?> Cm</td>
													<td><?php echo $data->tgl_penimb_bayi ?></td>
													<td><?php echo $status ?></td>
												</tr>
												<?php 
														endforeach;
													}else{
													?>
														<tr>
														<td colspan="6" class="text-center"><h4>Data kosong</h4></td>
														</tr>
													<?php
													}
													?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane " id="tab6">
									<div class="table-responsive">
										<table id="example2" class="table table-bordered key-buttons text-nowrap" >
											<thead>
												<tr>
													<th class="border-bottom-0">No</th>
													<th class="border-bottom-0">Nama Pasien Balita</th>
													<th class="border-bottom-0">Nama Ibu</th>
													<th class="border-bottom-0">Jenis Vitamin</th>
													<th class="border-bottom-0">Tgl Pemberian</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_vit_bayi)){
											$no = 1;
											foreach ($laporan_vit_bayi as $data):
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_bayi ?></td>
													<td><?php echo $data->nama_ibu ?></td>
													<td><?php echo $data->nama_vit ?></td>
													<td><?php echo $data->tgl_pem ?></td>
												</tr>
												<?php 
														endforeach;
													}else{
													?>
														<tr>
														<td colspan="6" class="text-center"><h4>Data kosong</h4></td>
														</tr>
													<?php
													}
													?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane " id="tab7">
									<div class="table-responsive">
										<table id="example3" class="table table-bordered key-buttons text-nowrap" >
											<thead>
												<tr>
													<th class="border-bottom-0">No</th>
													<th class="border-bottom-0">Nama Pasien Balita</th>
													<th class="border-bottom-0">Nama Ibu</th>
													<th class="border-bottom-0">Jenis Imunisasi</th>
													<th class="border-bottom-0">Tgl Pemberian</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_imun_bayi)){
											$no = 1;
											foreach ($laporan_imun_bayi as $data):
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_bayi ?></td>
													<td><?php echo $data->nama_ibu ?></td>
													<td><?php echo $data->nama_imun ?></td>
													<td><?php echo $data->tgl_pem ?></td>
												</tr>
												<?php 
														endforeach;
													}else{
													?>
														<tr>
														<td colspan="6" class="text-center"><h4>Data kosong</h4></td>
														</tr>
													<?php
													}
													?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane " id="tab8">
									<div class="table-responsive">
										<table id="example4" class="table table-bordered key-buttons text-nowrap" >
											<thead>
												<tr>
													<th class="border-bottom-0">No</th>
													<th class="border-bottom-0">Nama Pasien Balita</th>
													<th class="border-bottom-0">Nama Ibu</th>
													<th class="border-bottom-0">TTL</th>
													<th class="border-bottom-0">Alamat</th>
													<th class="border-bottom-0">Tgl Kematian</th>
													<th class="border-bottom-0">Penyebab</th>
													<!-- <th class="border-bottom-0">Keterangan</th> -->
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_kematian_bayi)){
											$no = 1;
											foreach ($laporan_kematian_bayi as $data):
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_bayi ?></td>
													<td><?php echo $data->nama_ibu ?></td>
													<td><?php echo $data->tempatlhr_bayi ?>, <?php echo $data->tanggallhr_bayi ?></td>
													<td><?php echo $data->alamat_bayi ?></td>
													<td><?php echo $data->tgl_kematian ?></td>
													<td><?php echo $data->penyebab?></td>
												</tr>
												<?php 
														endforeach;
													}else{
													?>
														<tr>
														<td colspan="6" class="text-center"><h4>Data kosong</h4></td>
														</tr>
													<?php
													}
													?>
											</tbody>
										</table>
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