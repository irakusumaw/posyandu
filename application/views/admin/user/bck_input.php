<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Kelola Users </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-6"><h4 class="card-title">Input Data User</h4></div>
                    <div class="col-md-12" style="padding-top: 30px;">
                      <form class="form-horizontal" action = "<?php echo base_url(). 'auth/register_auth'; ?>" method = "post">
                        <div class="md-form mb-5">
                          <label>Username</label>
                          <input name="username" id="username" type="text" class="form-control" required>
                        </div>
                        <div class="md-form mb-5">
                          <label>Nama Lengkap</label>
                          <input name="nama_lengkap" id="nama_lengkap" type="text" class="form-control" required>
                        </div>
                        <div class="md-form mb-5">
                          <label>Email</label>
                          <input name="email" id="email" type="email" class="form-control" required>
                        </div>
                        <div class="md-form mb-5">
                          <label>Password</label>
                          <input name="password" id="password" type="password" class="form-control" required>
                        </div>          
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-primary" id="inputButton">Input</button>
                        </div>
                      </form>
                    </div>                    
                  </div>
                </div>
            </div>
            </div>
</div>
            
