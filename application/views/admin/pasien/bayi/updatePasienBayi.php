<?php 
foreach ($data_bayi as $data){
  $id_balita = $data->id_balita;
  $nik_ortu = $data->nik_ortu;
  $nama_ibu = $data->nama_ibu;
  $nama_ayah = $data->nama_ayah;
  $nama_bayi = $data->nama_bayi;
  $tmptlhr = $data->tempatlhr_bayi;
  $tgllhr = $data->tanggallhr_bayi;
  $umur = $data->usia_bayi;
  $jenis_kelamin = $data->jenis_kelamin;
  $panjang_lahir = $data->panjang_lahir;
  $berat_lahir = $data->berat_lahir;
  $alamat = $data->alamat_bayi;
}
?>

<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Pasien</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Bayi.html') ?>">Daftar Pasien Bayi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Data Pasien</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Ubah Data Pasien:</div>
                  <form role="form" action="<?php echo base_url('Admin/updatePasienBayiAct') ?>" method="post">
                  <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                          <label class="form-label">Nomor Induk Kependudukan / NIK </label>
                          <input class="form-control" type="hidden" id="id_balita" name="id_balita" value="<?php echo $this->uri->segment(3); ?>" required>
                          <input type="text" class="form-control" placeholder="Nomor Induk Kependudukan / NIK" name="nik" value="<?php echo $nik_ortu ?>" disabled>
                        </div>
                      </div>                      
                  </div>
                  <hr>
                  <div class="card-title font-weight-bold">Lengkapi Data:</div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" name="nama_bayi" value="<?php echo $nama_bayi ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Ibu Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Ibu Pasien" name="nama_ibu" value="<?php echo $nama_ibu ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Bapak Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Bapak Pasien" value="<?php echo $nama_ayah ?>" name="nama_ayah" required>
              </div>
            </div>
            <!-- <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Umur</label>
                <input type="number" class="form-control" placeholder="Umur" name="umur" required>
              </div>
            </div> -->
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                  <optgroup label="Categories">
                    <option data-select2-id="5" disabled selected>--Jenis Kelamin--</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </optgroup>
                </select>
              </div>
            </div> -->
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlhr_bayi" value="<?php echo $tmptlhr ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $tgllhr ?>" name="tanggallhr_bayi" required>
              </div>
            </div>            
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                  <optgroup label="Categories">
                    <option data-select2-id="5" disabled selected>--Jenis Kelamin--</option>
                    <option <?php echo ($jenis_kelamin == 'Laki-Laki'?'selected':'') ?>>Laki-Laki</option>
                    <option <?php echo ($jenis_kelamin == 'Perempuan'?'selected':'') ?>>Perempuan</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Panjang Lahir</label>
                <input type="number" class="form-control" placeholder="Panjang Lahir" name="panjang_lahir" value="<?php echo $panjang_lahir ?>" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Berat Lahir</label>
                <input type="number" class="form-control" placeholder="Berat Lahir" value="<?php echo $berat_lahir ?>" name="berat_lahir" required>
              </div>
            </div>            
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Usia Bayi</label>
                <input type="number" class="form-control" placeholder="Usia Bayi" value="<?php echo $umur ?>" name="usia_bayi" required>
              </div>
            </div>           
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat_bayi" rows="6" placeholder="Alamat Lengkap" required><?php echo $alamat ?></textarea>
                <!-- <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
              </div>
            </div>      
          </div>
          <hr>
        <div class="text-center">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url('pasien/Pasien-Bayi.html'); ?>" class="btn btn-secondary">Cancel</a>
        </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>