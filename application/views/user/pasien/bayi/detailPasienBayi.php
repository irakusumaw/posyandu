<?php 
foreach ($data_bayi as $data){
	$nik = $data->nik_ortu;
	$nama_bayi = $data->nama_bayi;
	$nama_ibu = $data->nama_ibu;
	$nama_ayah = $data->nama_ayah;
	$tmptlhr = $data->tempatlhr_bayi;
	$tgllhr = $data->tanggallhr_bayi;
	$umur = $data->usia_bayi;
	$jenis_kelamin = $data->jenis_kelamin;
	$alamat = $data->alamat_bayi;
	$berat_lahir = $data->berat_lahir;
	$panjang_lahir = $data->panjang_lahir;
	$tglkematian = $data->tgl_kematian;

	// $alamat = $data->alamat;
	// $kota = $data->alamat_kota;
	// $kode_pos = $data->kode_pos;

}
?>
<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Detail Data Pasien Bayi</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('User/dataBayi') ?>">Daftar Pasien Bayi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Data Pasien</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="card">
		<div class="card-body">			
			<div class="row">				
					<div class="col-md-6">
						<h4 class="pl-2">Detail Data Pasien</h4>
					</div>
					<div class="col-md-6 text-right">
					<a href="" class="btn btn-secondary" title="Print Screen" alt="Print Screen" onclick="window.print();" class="btn btn-secondary" style="cursor:pointer;">Cetak</a>
					</div>									
			</div>				
			<br>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="expanel expanel-default mb-0">
						<div class="expanel-heading">
							<h3 class="expanel-title">Informasi Dasar</h3>
						</div>
						<div class="expanel-body">
							<div class="row">
								<div class="col-lg-4 ">
									<div class="form-group">
										<p class="h5">Nomor Induk Kependudukan:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $nik ?></span></p>
									</div>									
																			
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 ">
									<div class="form-group">
										<p class="h5">Nama Pasien:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $nama_bayi ?></span></p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<p class="h5">Tempat, Tanggal Lahir:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $tmptlhr ?>, <?php echo date('d-m-Y',strtotime($tgllhr)) ?></span></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<p class="h5">Nama Ibu Pasien:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $nama_ibu ?></span></p>
									</div>
									<?php 												
											$date1=date_create($tgllhr);
											$date2=date_create();
											$diff=date_diff($date1,$date2);
										?>
									<div class="form-group">
										<p class="h5">Umur:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $diff->format("%m"); ?> Bulan</span></p>
									</div>
									<div class="form-group">
										<p class="h5">Tanggal Kematian:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php if ($tglkematian == 0000-00-00) {
											echo "-";
										} else {
											echo $tglkematian;
										}
										 ?></span></p>
									</div>									
								</div>
								<div class="col-lg-4 ">								
									<div class="form-group">
										<p class="h5">Nama Bapak Pasien:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $nama_ayah ?></span></p>
									</div>
									<div class="form-group">
										<p class="h5">BB Lahir:</p>

										<p class="mb-1"><span class="font-weight-semibold"><?php echo $berat_lahir ?> G</span></p>
									</div>															
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<p class="h5">Alamat:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $alamat ?></span></p>
									</div>
									<div class="form-group">
										<p class="h5">TB Lahir:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $panjang_lahir ?> cm</span></p>
									</div>
								</div>
							</div>
								
						</div>							
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="expanel expanel-default mb-0">
						<div class="expanel-heading">
							<h3 class="expanel-title">Informasi Penimbangan</h3>
						</div>
						<div class="expanel-body">
							<div class="row">
								<!-- <div class="col-lg-6 ">
									<div class="form-group">
										<p class="mb-1"><span class="font-weight-semibold">Panjang Lahir : </span>60 Cm</p>	
										<p class="mb-1"><span class="font-weight-semibold">Berat Lahir : </span> 12 Kg</p>
										</div>
								</div> -->
								<div class="col-lg-6 text-right">
									<div class="form-group">
										
									</div>
								</div>									
							</div>	
							<div class="row">
								<div class="table-responsive">
									<table class="table card-table table-vcenter table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>Berat Badan</th>
												<th>Tinggi Badan</th>
												<th>Lingkar Kepala</th>
												<th>Tanggal Pemeriksaan</th>
												<th>Hasil</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$no=1;
											foreach($data_bayi as $data):
												
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
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->bb_bayi ?> G</td>
												<td><?php echo $data->tinggi_bayi ?> Cm</td>
												<td><?php echo $data->lingkep ?> Cm</td>
												<td><?php echo $data->tgl_penimb_bayi ?></td>
												<td><?php echo $status ?></td>
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
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="expanel expanel-default mb-0">
						<div class="expanel-heading">
							<h3 class="expanel-title">Deteksi Intervensi Dini Tumbuh Kembang</h3>
						</div>
						<div class="expanel-body">
							<div class="row">
								<!-- <div class="col-lg-6 ">
									<div class="form-group">
										<p class="mb-1"><span class="font-weight-semibold">Panjang Lahir : </span>60 Cm</p>	
										<p class="mb-1"><span class="font-weight-semibold">Berat Lahir : </span> 12 Kg</p>
										</div>
								</div> -->
								<div class="col-lg-6 text-right">
									<div class="form-group">
										
									</div>
								</div>									
							</div>	
							<div class="row">
								<div class="table-responsive">
									<table class="table card-table table-vcenter table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>Daya Dengar (TDD)</th>
												<th>Daya Lihat (TDL)</th>
												<th>Skrining Perkembangan (KPSP)</th>
												<th>Perilaku Emosional (KMPE)</th>
												<th>Pemeriksaan Autism (MCHAT)</th>
												<th>Pemusatan Perhatian (GPPH)</th>
												<th>Tanggal Pemeriksaan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($data_bayi as $data): 
										?>
											<tr>
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->tdd ?></td>
												<td><?php echo $data->tdl ?></td>
												<td><?php echo $data->kpsp ?></td>
												<td><?php echo $data->kmpe ?></td>
												<td><?php echo $data->mchat ?></td>
												<td><?php echo $data->gpph ?></td>
												<td><?php echo $data->tgl_penimb_bayi ?></td>
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
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="expanel expanel-default mb-0">
						<div class="expanel-heading">
							<h3 class="expanel-title">Informasi Data Penyuluhan</h3>
						</div>
						<div class="expanel-body">
							<div class="row">
								<!-- <div class="col-lg-6 ">
									<div class="form-group">
										<p class="mb-1"><span class="font-weight-semibold">Panjang Lahir : </span>60 Cm</p>	
										<p class="mb-1"><span class="font-weight-semibold">Berat Lahir : </span> 12 Kg</p>
										</div>
								</div> -->
								<div class="col-lg-6 text-right">
									<div class="form-group">
										
									</div>
								</div>									
							</div>	
							<div class="row">
								<div class="table-responsive">
									<table class="table card-table table-vcenter table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Keluhan</th>
												<th>Nasihat</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($data_pelbayi as $data): 
										?>
											<tr>
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->tgl_pelbayi ?></td>
												<td><?php echo $data->keluhan ?></td>
												<td><?php echo $data->nasihat ?></td>
												
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
												<th width="15%">Tgl Pemberian</th>
												<th width="40%">Keterangan</th>
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
		</div>
		</div>			
	</div>   
  </div>
</div>