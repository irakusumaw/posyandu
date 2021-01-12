<?php 
foreach ($data_ibuhamil as $data){
	$nik = $data->nik_ibuhamil;
	$namaibu = $data->nama_ibuhamil;
	$namasuami = $data->nama_suami;
	$tmptlhr = $data->tempatlhr_ibuhamil;
	$tgllhr = $data->tanggallhr_ibuhamil;
	$umur = $data->umur;
	$tinggi_ibuhamil = $data->tinggi_ibuhamil;
	$alamat = $data->alamat_ibu;
	$kandunganke = $data->kandunganke;
	$tglkematian = $data->tgl_kematian;
}
?>
<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Pasien Ibu Hamil</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html') ?>">Daftar Pasien Ibu Hamil</a></li>
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
					<a href="" onclick="window.print();" class="btn btn-secondary" style="cursor:pointer;">Cetak</a>
					</div>
					<div class="col-md-1 text-right">
					<a href="<?php echo base_url('admin/posyanduPasienIbuHamil/').$data->id_ibuhamil; ?>" class="btn btn-secondary" data-toggle="tooltip" title="" data-original-title="Input Penyuluhan">Input Penyuluhan</a>
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
									</div><br>
									<div class="form-group">
										<p class="h5">Tempat Lahir:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $tmptlhr ?></span></p>
									</div><br>
									<div class="form-group">
										<p class="h5">Kandungan Ke:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $kandunganke ?></span></p>
									</div><br>
									<div class="col-lg-12">
									<div class="form-group">
										<p class="h5">Alamat:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $alamat ?></span></p>
									</div>	
								</div>																	
								</div>
								<div class="col-lg-4 ">									
									<div class="form-group">
										<p class="h5">Nama Pasien Ibu Hamil:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $namaibu ?></span></p>
									</div>	
									<br>
									<div class="form-group">
										<p class="h5">Tanggal Lahir:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo date('d-m-Y',strtotime($tgllhr)) ?></span></p>
									</div>
									<br>
									<div class="form-group">
										<p class="h5">Tanggal Kematian:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php if ($tglkematian == 0000-00-00 ) {
											echo "-";
										} else {
											echo $tglkematian;
										}
										 ?></span></p>									
									</div>															
								</div>
								<div class="col-lg-4 ">								
									<div class="form-group">
										<p class="h5">Nama Suami Pasien:</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $namasuami ?></span></p>
									</div>
									<br>
									<div class="form-group">
										<p class="h5">Tinggi Badan (dalam M):</p>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $tinggi_ibuhamil ?></span></p>
									</div>
									<br>
									<div class="form-group">
										<p class="h5">Umur:</p>
										<?php 												
											$date1=date_create($tgllhr);
											$date2=date_create();
											$diff=date_diff($date1,$date2);
										?>
										<p class="mb-1"><span class="font-weight-semibold"><?php echo $diff->format("%Y"); ?> Tahun</span></p>
									</div>								
								</div>
							</div>							
						</div>
					</div>
				</div>							
			</div><br>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="expanel expanel-default mb-0">
						<div class="expanel-heading">
							<h3 class="expanel-title">Informasi Kehamilan</h3>
						</div>
						<div class="expanel-body">
							<div class="row">
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
												<th>Lingkar Lengan</th>
												<th>Darah Sistol</th>
												<th>Darah Diastol</th>
												<th>Tanggal Pemeriksaan</th>
												<th>Hasil</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$no=1;
											foreach($data_ibuhamil as $data): 

												$beratbadan = $data->bb_ibu;
												$tinggibadan = $data->tinggi_ibuhamil;

												$imt = (($beratbadan *1000) / (($tinggibadan * $tinggibadan) /100));

												if($imt < 185){ 
													$status = 'Berat Badan Kurang';
												 } elseif($imt >= 185 && $imt <= 249 ){ 
													$status = 'Berat Badan Normal';
												 } elseif($imt >= 250 && $imt <= 299 ){ 
													$status = 'Berat Badan Berlebih (Cenderung Obesitas)';
												 } else{ 
													$status = 'Obesitas';
												 }
										?>
											<tr>
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->bb_ibu ?> Kg</td>
												<td><?php echo $data->lingleng ?> Cm</td>
												<td><?php echo $data->sistol ?></td>
												<td><?php echo $data->diastol ?></td>
												<!--<td><?php echo $data->keluhan ?></td>-->
												<td><?php echo date('d-m-Y',strtotime($data->tgl_penimb_ibu)); ?></td>
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
							<h3 class="expanel-title">Perkembangan Bayi</h3>
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
												<th>Detak Bayi</th>
												<th>Posisi</th>
												<th>Tanggal Pemeriksaan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($data_ibuhamil as $data): 
										?>
											<tr>
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->dbayi ?></td>
												<td><?php echo $data->posisi ?></td>
												<td><?php echo $data->tgl_penimb_ibu ?></td>
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
											foreach($data_pelibu as $data): 
										?>
											<tr>
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->tgl_pel ?></td>
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
										<?php
											$no=1;
											foreach($data_vit as $data): 
										?>
										<tbody>
											<tr>
												<th scope="row"><?php echo $no++ ?></th>
												<td><?php echo $data->nama_vit ?></td>
												<td><?php echo $data->tgl_pem_vit ?></td>
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