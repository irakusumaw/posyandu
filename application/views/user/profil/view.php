 <!-- <?php foreach($profile as $a){

	$user_id = $a->user_id;
	$nama_lengkap = $a->nama_lengkap;
	$nik = $a->nik;
	$no_hp = $a->no_hp;
	$alamat = $a->alamat;
	$kota = $a->alamat_kota;
	$kode_pos = $a->kode_pos;
	$kelamin = $a->jenis_kelamin;
	$password = $a->password;
	$tempat_lahir = $a->tempat_lahir;
	$tgl_lahir = $a->tgl_lahir;
	$email = $a->email;

}
?> -->
	 
<div class="side-app">
						<!--Page Header-->
						<div class="page-header">
							<h4 class="page-title"><i class="fe fe-life-buoy mr-1"></i>Edit Profile</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
							</ol>
						</div>
						<!--page header-->

						<div class="row">
						<?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
							<div class="col-xl-4  col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Password</div>
									</div>
									<form method="POST" onSubmit="return validate();" action="<?php echo base_url('user/updatePassword'); ?>">
									<div class="card-body">
										<div class="form-group">
											<label class="form-label">Email </label>
											<input type="hidden" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user_id ?>" name="user_id">
											<input type="email" class="form-control" value="<?php echo $email ?>" disabled>
										</div>
										<div class="form-group">
											<label class="form-label">New Password</label>
											<input type="password" class="form-control" id="password" name="password" onkeyup='check();' value="password" title="Min 8 Karakter dan Terdiri dari kombinasi" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" >
										</div>
										<div class="form-group">
											<label class="form-label">Confirm Password</label>
											<input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup='check();' value="password" title="Min 8 Karakter dan Terdiri dari kombinasi" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" >
										</div>
										<span id='message'></span>
									</div>
									<div class="card-footer text-right">
									<button type="submit" class="btn btn-primary">Update</button>
									</div>
									</form>
								</div>
							</div>
							<div class="col-xl-8  col-md-12">
								<div class="card">
									<div class="card-header text-right"><div class="card-title">Edit Data Diri</div>
									</div>
									<form method="POST" action="<?php echo base_url('user/updateProfile'); ?>">
									<div class="card-body">
										<div class="row">											
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Nama Lengkap</label>
														<input type="hidden" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user_id ?>" name="user_id">
														<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required value="<?php echo $nama_lengkap ?>">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Nomor Induk Kependudukan / NIK</label>
														<input type="number" class="form-control" placeholder="NIK" name="nik" value="<?php echo $nik ?>" disabled>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="form-label">Nomor Telepon</label>
														<input type="number" class="form-control" placeholder="Nomor Telepon" name="no_hp" value="<?php echo $no_hp ?>">
													</div>
												</div>
												<div class="col-sm-6 col-md-3">
													<div class="form-group">
														<label class="form-label">Tempat Lahir</label>
														<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir ?>">
													</div>
												</div>
												<div class="col-sm-6 col-md-3">
													<div class="form-group">
														<label class="form-label">Tanggal Lahir</label>
														<input type="date" min="1950-01-01" max="<?php date_default_timezone_set('Asia/Jakarta'); echo $date = date('Y-m-d'); ?>" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?php echo $tgl_lahir ?>">
													</div>
												</div>
												<div class="col-sm-6 col-md-12">
													<div class="form-group">
														<label class="form-label">Alamat Lengkap</label>
														<input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="<?php echo $alamat ?>">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Kota</label>
														<input type="text" class="form-control" name="alamat_kota" placeholder="Kota" value="<?php echo $kota ?>">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Kode POS</label>
														<input type="number" class="form-control" name="kode_pos" placeholder="Alamat Lengkap" value="<?php echo $kode_pos ?>">
													</div>
												</div>

										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update</button>
										<!-- <a href="#" class="btn btn-secondary">Cancel</a> -->
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--Sidebar-right