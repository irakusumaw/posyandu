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
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Ubah Data Pasien Ibu Hamil</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('User/dataIbuHamil') ?>">Daftar Pasien Ibu Hamil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Data Pasien Ibu Hamil</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Ubah Data Pasien</div>
                  <form role="form" action="<?php echo base_url('User/editPasienIbuAct') ?>" method="post">
                  <hr>
                  <div class="card-title font-weight-bold">Lengkapi Data:</div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap Pasien</label>
                <input type="hidden" class="form-control" placeholder="Nama Lengkap Pasien" name="nik_ibuhamil" value="<?php echo $nik_ibuhamil ?>" readonly required>
                <input type="hidden" class="form-control" placeholder="Nama Lengkap Pasien" name="id_ibuhamil" value="<?php echo $this->uri->segment(3); ?>" readonly required>
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
                <label class="form-label">Tinggi Badan (Dalam Cm)</label>
                <input type="number" class="form-control" placeholder="Tinggi Badan" name="tinggi_ibuhamil" value="<?php echo $tinggi_ibuhamil ?>" required>
              </div>
            </div>   
            <div class="col-sm-6 col-md-6">
            <?php 												
											$date1=date_create($tgllhr);
											$date2=date_create();
											$diff=date_diff($date1,$date2);
										?>
              <div class="form-group">
                <label class="form-label">Usia</label>
                <input type="number" class="form-control" placeholder="Usia" value="<?php echo $diff->format("%Y"); ?>" name="umur" required disabled>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Kandungan Ke-</label>
                <input type="number" class="form-control" placeholder="Kandungan Ke - " name="kandunganke" value="<?php echo $kandunganke?>" required>
              </div>
            </div>               
          <!-- <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label">Tanggal Kematian</label>
              <input type="date" class="form-control" placeholder="Tanggal Kematian"  name="tanggalkematian_ibuhamil">
            </div>
          </div> -->
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
              <!-- <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a> -->
        </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>