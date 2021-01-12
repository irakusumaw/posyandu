<div class="side-app">
	<!--Page Header-->
	<div class="page-header">
		<h4 class="page-title"><i class="fe fe-grid mr-1"></i> Laporan Kegiatan Posyandu</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>"> Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Laporan kegiatan posyandu Ibu Hamil</li>
		</ol>
	</div>
	<!--page header-->

	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Laporan Kegiatan Posyandu Ibu Hamil</div>
				</div>
				<div class="card-body">
				<form role="form" action="<?php echo site_url('admin/laporan_ibu_act') ?>" method="post">
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
													<th class="border-bottom-0">Nama Pasien Ibu Hamil</th>
													<th class="border-bottom-0">Berat Badan</th>
													<th class="border-bottom-0">Lingkar Lengan</th>
													<th class="border-bottom-0">Tgl Pemeriksaan</th>
													<th class="border-bottom-0">Hasil</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_penimb_ibu)){
											$no = 1;
											foreach ($laporan_penimb_ibu as $data):
												$beratbadan = $data->bb_ibu;
												$tinggibadan = $data->tinggi_ibuhamil;

												$imt = (($beratbadan *1000) / (($tinggibadan * $tinggibadan) /100));

												if($imt < 185){ 
													$status = 'Berat Badan Kurang';
												 } elseif($imt > 185 && $imt <= 249 ){ 
													$status = 'Berat Badan Normal';
												 } elseif($imt > 250 && $imt <= 299 ){ 
													$status = 'Berat Badan Berlebih (Cenderung Obesitas)';
												 } else{ 
													$status = 'Obesitas';
												 }
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_ibuhamil ?></td>
													<td><?php echo $data->bb_ibu ?> Kg</td>
													<td><?php echo $data->lingleng ?> Cm</td>
													<td><?php echo $data->tgl_penimb_ibu ?></td>
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
													<th class="border-bottom-0">Nama Pasien Ibu Hamil</th>
													<th class="border-bottom-0">Jenis Vitamin</th>
													<th class="border-bottom-0">Tgl Pemberian</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_vit_ibu)){
											$no = 1;
											foreach ($laporan_vit_ibu as $data):
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_ibuhamil ?></td>
													<td><?php echo $data->nama_vit ?></td>
													<td><?php echo $data->tgl_pem_vit ?></td>
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
													<th class="border-bottom-0">Nama Pasien Ibu Hamil</th>
													<th class="border-bottom-0">Jenis Imunisasi</th>
													<th class="border-bottom-0">Tgl Pemberian</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_imun_ibu)){
											$no = 1;
											foreach ($laporan_imun_ibu as $data):
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_ibuhamil ?></td>
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
													<th class="border-bottom-0">Nama Pasien</th>
													<th class="border-bottom-0">Nama Suami</th>
													<th class="border-bottom-0">TTL</th>
													<th class="border-bottom-0">Alamat</th>
													<th class="border-bottom-0">Tgl Kematian</th>
													<th class="border-bottom-0">Penyebab</th>
													<!-- <th class="border-bottom-0">Keterangan</th> -->
												</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($laporan_kematian_ibu)){
											$no = 1;
											foreach ($laporan_kematian_ibu as $data):
											?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $data->nama_ibuhamil ?></td>
													<td><?php echo $data->nama_suami ?></td>
													<td><?php echo $data->tempatlhr_ibuhamil ?>, <?php echo $data->tanggallhr_ibuhamil ?></td>
													<td><?php echo $data->alamat_ibu ?></td>
													<td><?php echo $data->tgl_kematian ?></td>
													<td><?php echo $data->penyebab ?></td>
													<!-- <td>??</td> -->
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