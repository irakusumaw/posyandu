<div class="side-app">
  <!--Page Header-->
  <div class="page-header">
    <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Daftar Data Pasien</h4>
    <ol class="breadcrumb">
      <!-- <li class="breadcrumb-item"><a href="#"> Tables</a></li> -->
      <li class="breadcrumb-item active" aria-current="page">Daftar Pasien Bayi</li>
    </ol>
  </div>
  <!--page header-->

  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
    <div class="col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title col-md-6">Daftar Pasien Bayi</div>
          <!-- <div class="card-title col-md-6 text-right"><a href="<?php echo base_url('pasien/Add-Pasien-Bayi.html') ?>" class="btn btn-secondary" style="color: #fff;">Tambah Pasien</a></div> -->
        </div>
        <div class="card-body">
          <div class="table-responsive ">
            <table id="example-2" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No. </th>
                  <th>NIK Ortu </th>
                  <th>Nama Lengkap </th>
                  <th>TTL </th>
                  <th>Jenis Kelamin</th>
                  <!-- <th>Umur </th> -->
                  <th>Nama Ibu </th>
                  <th>Nama Bapak </th>                  
                  <th>Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_bayi as $data):
                 ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?php echo $data->nik_ortu ?></td>
                  <td><?php echo $data->nama_bayi ?></td>
                  <td><?php echo $data->tempatlhr_bayi ?>, <?php echo date('d-m-Y',strtotime($data->tanggallhr_bayi)); ?></td>
                  <td><?php echo $data->jenis_kelamin ?></td>
                  <!-- <td><?php echo $data->usia_bayi ?> Bulan</td> -->
                  <td><?php echo $data->nama_ibu ?></td>
                  <td><?php echo $data->nama_ayah ?></td>   
                  <td class="text-center">
                    <a href="<?php echo base_url('User/detailDataBayi/').$data->id_balita; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fe fe-file text-dark fs-16"></i></a>
                    <a href="<?php echo base_url('User/editDataBayi/').$data->id_balita; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fe fe-edit-2 text-dark fs-16"></i></a><!-- 
                    <a href="#" onclick="return confirm('Apakah anda yakin untuk menghapus?');" class="mr-3" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fe fe-trash-2 text-dark fs-16"></i></a>
                    <a href="<?php echo base_url('User/posyanduPasienBayi'); ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Posyandu"><i class="fe fe-shield text-dark fs-16"></i></a> -->
                  </td>
                </tr>
              <?php endforeach ?>
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