<div class="side-app">
  <!--Page Header-->
  <div class="page-header">
    <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Kelola Jenis Vitamin</h4>
    <ol class="breadcrumb">
      <!-- <li class="breadcrumb-item"><a href="#"> Tables</a></li> -->
      <li class="breadcrumb-item active" aria-current="page">Daftar Data Vitamin</li>
    </ol>
  </div>
  <!--page header-->

  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
    <div class="col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title col-md-6">Daftar Data Vitamin</div>
          <div class="card-title col-md-6 text-right"><a href="<?php echo base_url('vitamin/Input-Vitamin.html') ?>" class="btn btn-secondary" style="color: #fff;">Tambah Data Vitamin</a></div>
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
                  <th> Nama Vitamin </th>
                  <th> Keterangan </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $no = 1;
                  foreach($data_vitamin as $data):
                ?>
                  <tr>
                    <td> <?php echo $no++ ?> </td>
                    <td><?php echo $data->nama_vit ?></td>
                    <td><?php echo $data->ket ?></td>                    
                    <td>
                      <a href="<?php echo base_url('Admin/vitaminDetail/').$data->id_vit; ?>" class="btn btn-sm btn-success text-neutral">Detail</a>
                      <a href="<?php echo base_url('Admin/vitaminEdit/').$data->id_vit; ?>" class="btn btn-sm btn-info text-neutral">Edit</a>
                      <a href="<?php echo base_url('Admin/vitaminHapus/').$data->id_vit; ?>" class="btn btn-sm btn-danger text-neutral" onclick="return confirm('Apakah anda yakin untuk menghapus?');">Hapus</a>
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