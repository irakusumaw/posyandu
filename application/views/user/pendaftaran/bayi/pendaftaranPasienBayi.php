<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i>Pendaftaran Pasien Bayi</h3>
    <ol class="breadcrumb">
      <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Bayi.html') ?>">Daftar Pasien Bayi</a></li> -->
      <li class="breadcrumb-item active" aria-current="page">Pendaftaran Pasien</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
          <div class="card-body">
              <div class="card-title font-weight-bold">Tambah Data Pasien:</div>
              <form role="form" action="<?php echo base_url('User/inputPasienBayiAct') ?>" method="post">
              <hr>
              <!-- <div class="card-title font-weight-bold">Lengkapi Data:</div> -->
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Nama Lengkap Pasien</label>
                      <input type="hidden" class="form-control" placeholder="Nama Lengkap Pasien" name="nik_ortu" value="<?php echo $this->session->userdata('nik')?>" required>
                      <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" name="nama_bayi" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Nama Ibu Pasien</label>
                      <input type="text" class="form-control" placeholder="Nama Ibu Pasien" name="nama_ibu" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Nama Bapak Pasien</label>
                      <input type="text" class="form-control" placeholder="Nama Bapak Pasien" name="nama_ayah" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlhr_bayi" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggallhr_bayi" required>
                    </div>
                  </div>            
                  <div class="col-md-6">
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
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Panjang Lahir</label>
                      <input type="number" class="form-control" placeholder="Panjang Lahir" name="panjang_lahir" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Berat Lahir</label>
                      <input type="number" class="form-control" placeholder="Berat Lahir" name="berat_lahir" required>
                    </div>
                  </div>            
                  <!-- <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="form-label">Usia Bayi</label>
                      <input type="number" class="form-control" placeholder="Usia Bayi" name="usia_bayi" required>
                    </div>
                  </div> -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Alamat Lengkap</label>
                      <textarea class="form-control" name="alamat_bayi" rows="6" placeholder="Alamat Lengkap" required></textarea>
                      <!-- <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
                    </div>
                  </div>            
                </div>
              <hr>
                <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <!-- <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a> -->
                </div>                      
              </form>
          </div>
        </div>
      </div>   
    </div>
  </div>
</div>