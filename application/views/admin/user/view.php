<div class="side-app">
  <!--Page Header-->
  <div class="page-header">
    <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Kelola User</h4>
    <ol class="breadcrumb">
      <!-- <li class="breadcrumb-item"><a href="#"> Tables</a></li> -->
      <li class="breadcrumb-item active" aria-current="page">Daftar Data Users</li>
    </ol>
  </div>
  <!--page header-->

  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
    <div class="col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title col-md-6">Daftar Data Users</div>
          <div class="card-title col-md-6 text-right"><a href="<?php echo base_url('admin/user_input') ?>" class="btn btn-secondary" style="color: #fff;">Tambah User</a></div>
        </div>
        <div class="card-body">
          <div class="table-responsive ">
            <table id="example-2" class="table table-striped table-bordered">
              <thead>
                <!-- <tr>
                  <th class="wd-15p border-bottom-0">First name</th>
                  <th class="wd-15p border-bottom-0">Last name</th>
                  <th class="wd-20p border-bottom-0">Position</th>
                  <th class="wd-15p border-bottom-0">Start date</th>
                  <th class="wd-10p border-bottom-0">Salary</th>
                  <th class="wd-25p border-bottom-0">E-mail</th>
                </tr> -->
                <tr>
                  <th> No. </th>
                  <th> NIK </th>
                  <th> Username </th>
                  <th> Nama Lengkap </th>
                  <th> Tanggal Lahir </th>
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
                    <td><?php echo $data->nik ?></td>
                    <td><?php echo $data->username ?></td>
                    <td><?php echo $data->nama_lengkap ?></td>
                    <td><?php echo date('d-m-Y',strtotime($data->tgl_lahir)); ?></td>
                    <td><?php echo $data->email ?></td>
                    <td><?php if($data->level==1){
                        echo "Admin";
                      }else if($data->level==2){
                        echo "User";
                      }
                      ?>                                
                    </td>
                    <td>
                      <a href="<?php echo base_url('Admin/user_detail/').$data->user_id; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fe fe-file text-dark fs-16"></i></a>
                      <a href="<?php echo base_url('Admin/user_edit/').$data->user_id; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fe fe-edit-2 text-dark fs-16"></i></a>
                      <a href="<?php echo base_url('Admin/user_hapus/').$data->user_id; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?');" class="mr-3" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fe fe-trash-2 text-dark fs-16"></i></a>
                    </td>
                  </tr>    
                  <?php 
                endforeach
              ?>       
              </tbody>
            </table>
          </div>
        </div>
        <!-- table-wrapper -->
      </div>
      <!-- section-wrapper -->
    </div>
  </div>
</div>