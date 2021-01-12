<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Kelola Users </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Daftar Users</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-6"><h4 class="card-title">Daftar Users</h4></div>
                    <div class="col-md-6 text-right"><a class="btn btn-gradient-primary btn-fw" href="<?php echo base_url('admin/user_input') ?>">Tambah Users</a></div>
                    </div>
                    <table class="table table">
                      
                      <thead>
                        <tr>
                          <th> No. </th>
                          <th> Username </th>
                          <th> Nama Lengkap </th>
                          <th> Password </th>
                          <th> Email </th>
                          <th> Level </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                $no = 1;
                foreach($data_user as $data):
              ?>
                        <tr>
                          <td> <?php echo $no++ ?> </td>
                          <td><?php echo $data->username ?></td>
                          <td><?php echo $data->nama_lengkap ?></td>
                          <td>******</td>
                          <td><?php echo $data->email ?></td>
                          <td><?php if($data->level==1){
                  echo "Admin";
                }else if($data->level==2){
                  echo "User";
                }
                ?></td>
                          <td><a href="<?php echo base_url('Admin/user_detail/').$data->user_id; ?>" class="btn btn-sm btn-success text-neutral">Detail</a>
                  <a href="<?php echo base_url('Admin/user_edit/').$data->user_id; ?>" class="btn btn-sm btn-neutral text-success">Edit</a>
                  <a href="<?php echo base_url('Admin/user_hapus/').$data->user_id; ?>" class="btn btn-sm btn-danger text-neutral" onclick="return confirm('Apakah anda yakin untuk menghapus?');">Hapus</a>
                </td>
                          <td></td>
                        </tr>           
                      </tbody>
                      <?php 
                endforeach
              ?>
                    </table>
                  </div>
                </div>
            </div>
            </div>
</div>
            
