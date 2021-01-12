<div class="side-app">
  <!--Page Header-->
  <div class="page-header">
    <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Kelola Pasien</h4>
    <ol class="breadcrumb">
      <!-- <li class="breadcrumb-item"><a href="#"> Tables</a></li> -->
      <li class="breadcrumb-item active" aria-current="page">Daftar Pasien Ibu Hamil</li>
    </ol>
  </div>
  <!--page header-->

  <div class="row">
    <?php echo $this->session->userdata('success'); $this->session->unset_userdata('success'); ?>
    <?php echo $this->session->userdata('danger'); $this->session->unset_userdata('danger'); ?>
    <div class="col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title col-md-6">Daftar Pasien Ibu Hamil</div>
          <div class="card-title col-md-6 text-right"><a href="<?php echo base_url('pasien/Add-Pasien-Ibu-Hamil.html') ?>" class="btn btn-secondary" style="color: #fff;">Tambah Pasien</a></div>
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
                  <th> Nama Lengkap </th>
                  <th> Nama Suami </th>
                  <th> TTL </th>
                  <th> Kandungan Ke</th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              foreach ($data_ibuhamil as $data):
              ?>
              <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td><?php echo $data->nik_ibuhamil ?></td>
                <td><?php echo $data->nama_ibuhamil ?></td>
                <td><?php echo $data->nama_suami ?></td>
                <td><?php echo $data->tempatlhr_ibuhamil ?>, <?php echo date('d-m-Y',strtotime($data->tanggallhr_ibuhamil)); ?></td>
                <td> <?php echo $data->kandunganke; ?></td>
                <td class="text-center">
                  <a href="<?php echo base_url('Admin/detailPasienIbuHamil/').$data->id_ibuhamil; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fe fe-file text-dark fs-16"></i></a>
                  <a href="<?php echo base_url('Admin/updatePasienIbuHamil/').$data->id_ibuhamil; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fe fe-edit-2 text-dark fs-16"></i></a>
                  <a href="<?php echo base_url('Admin/deletePasienIbuHamil/').$data->id_ibuhamil; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?');" class="mr-3" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fe fe-trash-2 text-dark fs-16"></i></a>
                  <a href="<?php echo base_url('Admin/posyanduPasienIbuHamil/').$data->id_ibuhamil; ?>" class="mr-3" data-toggle="tooltip" title="" data-original-title="Cek Posyandu"><i class="fe fe-shield text-dark fs-16"></i></a>
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