<?php
foreach ($data_user as $data) {
    $user_id = $data->user_id;
    $username = $data->username;
    $nama_lengkap = $data->nama_lengkap;
    $password = $data->password;
    $email = $data->email;
    $nik = $data->nik;
    $tempat_lahir = $data->tempat_lahir;
    $tgl_lahir = $data->tgl_lahir;
    $no_hp = $data->no_hp;
    $alamat = $data->alamat;
    $alamat_kota = $data->alamat_kota;
    $kode_pos = $data->kode_pos;
    // $jenis_kelamin = $data->jenis_kelamin;
    // $pemilik_barang = $data->pemilik_barang;
    // $nama_barang = $data->nama_barang;
    // $jenis_barang = $data->jenis_barang;
    // $batas_tebus_barang = $data->batas_tebus_barang;
}
?>
<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola Data User</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('Kelola-User.html') ?>">Daftar Data User</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Data User</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Detail Data User:</div>
                  <form role="form" action="<?= base_url(). 'Admin/user_edit_action'; ?>" method="post">
                  <!-- <div class="row">
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                 <input class="form-control" type="hidden" id="user_id" name="user_id" value="<?= $this->uri->segment(3); ?>" required>
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $email; ?>" required>
              </div>
                      </div> -->
                      <!-- <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" value="<?= $password; ?>" name="password" required>
              </div>
            </div> -->
                  <!-- </div>
                  <hr> -->
          <div class="row">
            <!-- <div class="col-sm-6 col-md-6">
              <div class="form-group"> -->
                 <input class="form-control" type="hidden" id="user_id" name="user_id" value="<?= $this->uri->segment(3); ?>" required>
                <!-- <label class="form-label">Email address</label>
                <input readonly type="email" class="form-control" placeholder="Email" name="email" value="<?= $email; ?>" required>
              </div>
            </div> -->
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input readonly type="text" class="form-control" placeholder="Nama Lengkap" value="<?= $nama_lengkap; ?>" name="nama_lengkap" required>
              </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nomor Induk Kependudukan / NIK</label>
                <input readonly type="number" class="form-control" placeholder="No KTP" value="<?= $nik; ?>" name="nik" readonly>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Username</label>
                <input readonly type="text" class="form-control" placeholder="Username" value="<?= $username; ?>" name="username" required>
              </div>
            </div>
            <!-- <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <input readonly type="text" class="form-control" placeholder="Username" value="<?= $jenis_kelamin; ?>" name="username" required>
              </div>
            </div> -->
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <input readonly type="text" class="form-control" placeholder="Tempat Lahir" value="<?= $tempat_lahir; ?>" name="tempat_lahir" required>
              </div>
            </div>
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input readonly type="date" class="form-control" placeholder="Tanggal Lahir" value="<?= $tgl_lahir; ?>" name="tanggal_lahir" required>
              </div>
            </div>
            
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nomor Telepon</label>
                <input readonly type="number" class="form-control" placeholder="Nomor Telepon" value="<?= $no_hp; ?>" name="no_hp" required>
              </div>
                      </div>
                     
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label">Alamat Lengkap</label>
                <!-- <input readonly type="textarea" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
                <textarea class="form-control" name="alamat" rows="6" readonly placeholder="Alamat Lengkap"><?= $alamat; ?></textarea>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label class="form-label">Kota</label>
                <input readonly type="text" class="form-control" value="<?= $alamat_kota; ?>" placeholder="Kota" name="alamat_kota" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <label class="form-label">Kode Pos</label>
                <input readonly type="number" class="form-control" placeholder="Kode POS" value="<?= $kode_pos; ?>" name="kode_pos" required>
              </div>
            </div>
          </div>
        
          <hr>
        <div class="text-center">
              <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
              <a href="<?php echo base_url('Kelola-User.html'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
                      
        </div>
        </form>
      </div>
    </div>  
  </div>
</div>