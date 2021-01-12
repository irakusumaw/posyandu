<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Pasien</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html') ?>">Daftar Pasien Ibu Hamil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data Pasien</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Tambah Data Pasien:</div>
                  <form role="form" action="<?php echo site_url('admin/inputPasienIbuHamilAct') ?>" method="post">
                  <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                          <label class="form-label">Nomor Induk Kependudukan / NIK </label>
                          <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="nik_ibuhamil" required>
                            <optgroup label="Pilih NIK dari user">
                                <?php foreach ($nik_user as $data){ ?> 
                                  <option value="<?php echo $data->nik; ?>">
                                    <?php echo $data->nik; ?> || <?php echo $data->nama_lengkap; ?>
                                  </option> 
                                <?php } ?>
                            </optgroup>
                          </select>
                        </div>
                      </div>                      
                  </div>
                  <hr>
                  <div class="card-title font-weight-bold">Lengkapi Data:</div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap Pasien" name="nama_ibuhamil" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Suami Pasien</label>
                <input type="text" class="form-control" placeholder="Nama Suami Pasien" name="nama_suami" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlhr_ibuhamil" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggallhr_ibuhamil" required>
              </div>
            </div>
            <!-- <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Usia</label>
                <input type="number" class="form-control" placeholder="Tinggi Badan" name="usia" required>
              </div>
            </div> -->
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Kandungan Ke-</label>
                <input type="number" class="form-control" placeholder="Kandungan Ke - " name="kandunganke" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tinggi Badan (dalam M)</label>
                <input type="number" class="form-control" placeholder="Tinggi Badan" name="tinggi_ibuhamil" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat_ibu" rows="6" placeholder="Alamat Lengkap" required></textarea>
                <!-- <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
              </div>
            </div>
          </div>
        
          <hr>
        <div class="text-center">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url('pasien/Pasien-Ibu-Hamil.html'); ?>" class="btn btn-secondary">Cancel</a>
        </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>