<div class="side-app">
  <div class="page-header">
    <h3 class="page-title"><i class="fe fe-home mr-1"></i> Kelola User</h3>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('Kelola-User.html') ?>">Daftar Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data User</li>
    </ol>
  </div>
  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <div class="col-md-12">
      <div class="card-group mb-0">
        <div class="card p-4">
              <div class="card-body">
                  <div class="card-title font-weight-bold">Tambah Data User:</div>
                  <form role="form" action="<?php echo site_url('admin/user_input_action') ?>" method="post">
                  <div class="row">
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
              </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
            </div>
                  </div>
                  <hr>
                  <div class="card-title font-weight-bold">Lengkapi Data:</div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
              </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nomor Induk Kependudukan / NIK</label>
                <input type="number" class="form-control" placeholder="No KTP" name="nik" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
              </div>
                      </div>
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
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
              </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
              </div>
            </div>
            
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" placeholder="Nomor Telepon" name="no_hp" required>
              </div>
                      </div>
                     
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label">Alamat Lengkap</label>
                <!-- <input type="textarea" class="form-control" placeholder="Alamat Lengkap" name="alamat" required> -->
                <textarea class="form-control" name="alamat" rows="6" placeholder="Alamat Lengkap"></textarea>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control" placeholder="Kota" name="alamat_kota" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <label class="form-label">Kode Pos</label>
                <input type="number" class="form-control" placeholder="Kode POS" name="kode_pos" required>
              </div>
            </div>
          </div>
        
          <hr>
        <div class="text-center">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url('Kelola-User.html'); ?>" class="btn btn-secondary">Cancel</a>
        </div>
                      
        </div>
        </form>
      </div>
    </div>   
  </div>
</div>