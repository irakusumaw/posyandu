<?php
foreach ($data_vitamin as $data) {
    $id_vit = $data->id_vit;
    $nama_vit = $data->nama_vit;
    $ket = $data->ket;
}
?>

<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Jenis Vitamin</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('vitamin/Vitamin.html') ?>">Daftar Jenis Vitamin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Data Vitamin</li>
    </ol>
  </div>
  <div class="row">
    <!-- <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?> -->
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Detail Data Vitamin:</div>
                  <form role="form" action="<?php echo site_url('admin/vitaminInputAction') ?>" method="post">
                      <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label class="form-label">Nama Vitamin</label>
                          <input class="form-control" type="hidden" id="user_id" name="user_id" value="<?= $this->uri->segment(3); ?>" required>
                          <input type="text" readonly class="form-control" placeholder="Nama Vitamin" value="<?= $nama_vit; ?>" name="nama_vit" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-label">Keterangan</label>
                          <!-- <input type="textarea" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
                          <textarea readonly class="form-control" name="ket" rows="6" placeholder="Keterangan Vitamin"><?= $ket; ?></textarea>
                        </div>
                      </div>
                      <hr>
                    <div class="text-center">
                          <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                          <a href="<?php echo base_url('vitamin/Vitamin.html'); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>