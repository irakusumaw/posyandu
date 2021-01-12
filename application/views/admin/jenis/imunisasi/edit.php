<?php
foreach ($data_imun as $data) {
    $id_imun = $data->id_imun;
    $nama_imun = $data->nama_imun;
    $ket = $data->ket;
}
?>

<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Jenis Imunisasi</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('imunisasi/Imunisasi.html') ?>">Daftar Jenis Imunisasi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Data Imunisasi</li>
    </ol>
  </div>
  <div class="row">
    <!-- <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?> -->
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Detail Data Imunisasi:</div>
                  <form role="form" action="<?php echo site_url('admin/imunisasiEditAction') ?>" method="post">
                      <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label class="form-label">Nama Imunisasi</label>
                          <input class="form-control" type="hidden" id="id_vit" name="id_imun" value="<?= $this->uri->segment(3); ?>" required>
                          <input type="text" class="form-control" placeholder="Nama Vitamin" value="<?= $nama_imun; ?>" name="nama_imun" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-label">Keterangan</label>
                          <!-- <input type="textarea" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
                          <textarea class="form-control" name="ket" rows="6" placeholder="Keterangan Vitamin"><?= $ket; ?></textarea>
                        </div>
                      </div>
                      <hr>
                    <div class="text-center">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a href="<?php echo base_url('vitamin/Vitamin.html'); ?>" class="btn btn-secondary">Cancel</a>
                    </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>