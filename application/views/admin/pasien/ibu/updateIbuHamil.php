<?php 
foreach ($data_ibuhamil as $data){
	$id_ibuhamil = $data->id_ibuhamil;
	$nik_ibuhamil = $data->nik_ibuhamil;
	$namaibu = $data->nama_ibuhamil;
	$namasuami = $data->nama_suami;
	$tmptlhr = $data->tempatlhr_ibuhamil;
	$tgllhr = $data->tanggallhr_ibuhamil;
	$umur = $data->umur;
  $tinggi_ibuhamil = $data->tinggi_ibuhamil;
  $alamat = $data->alamat_ibu;
  $kandunganke = $data->kandunganke;
}
?>

<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Pasien</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html') ?>">Daftar Pasien Ibu Hamil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data Pasien</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Edit Data Pasien:</div>
                  <form role="form" action="<?php echo site_url('admin/updatePasienIbuHamilAct') ?>" method="post">
                  <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                          <label class="form-label">Nomor Induk Kependudukan / NIK </label>
                          <input class="form-control" type="hidden" id="id_ibuhamil" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>" required>
                          <input type="text" class="form-control" placeholder="Nomor Induk Kependudukan / NIK" name="nik" value="<?php echo $nik_ibuhamil ?>" disabled>
                        </div>
                      </div>                      
                  </div>
                  <hr>
                  <div class="card-title font-weight-bold">Lengkapi Data:</div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" name="nama_ibuhamil" value="<?php echo $namaibu ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Suami Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Suami Pasien" name="nama_suami" value="<?php echo $namasuami ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlhr_ibuhamil" value="<?php echo $tmptlhr ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggallhr_ibuhamil" value="<?php echo $tgllhr ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tinggi Badan (dalam M)</label>
                <input type="number" class="form-control" placeholder="Tinggi Badan" name="tinggi_ibuhamil" value="<?php echo $tinggi_ibuhamil ?>" required>
              </div>
            </div>   
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Usia</label>
                <?php 												
												$date1=date_create($tgllhr);
												$date2=date_create();
                        $diff=date_diff($date1,$date2);
                ?>
                <input type="number" class="form-control" placeholder="Usia" name="umur" value="<?php echo $diff->format("%Y"); ?>" required disabled>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Kandungan Ke-</label>
                <input type="number" class="form-control" placeholder="Kandungan Ke - " name="kandunganke" value="<?php echo $kandunganke?>" required>
              </div>
            </div>                               
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Alamat Lengkap</label>
              <textarea class="form-control" name="alamat_ibu" rows="6" placeholder="Alamat Lengkap" required><?php echo $alamat ?></textarea>
              <!-- <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
            </div>
          </div> 
          </div>
          <hr>
        <div class="text-center">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a>
        </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>