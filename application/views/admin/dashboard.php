
<div class="side-app">
            <!--Page Header-->
            <div class="page-header">
              <h3 class="page-title"><i class="fe fe-home mr-1"></i> Dashboard</h3>
              <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>
            <!--Page Header-->
            <div class="row">
        <div class="col-xl-4 col-md-6 ">
          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <span class="mini-stat-icon bg-primary-transparent"><i class="si si-cloud-upload text-primary"></i></span>
              </div>
              <div class="dash3">
                <h5 class="text-muted">Users</h5>
                <h4 class="counter font-weight-extrabold num-font"><?= $jml_user ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <span class="mini-stat-icon bg-secondary-transparent"><i class="si si-share-alt text-secondary"></i></span>
              </div>
              <div class="dash3">
                <h5 class="text-muted">Vitamin</h5>
                <h4 class="counter num-font font-weight-extrabold"><?= $jml_vit ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <span class="mini-stat-icon bg-pink-transparent"><i class="si si-bubble text-pink"></i></span>
              </div>
              <div class="dash3">
                <h5 class="text-muted">Imunisasi</h5>
                <h4 class="counter num-font font-weight-extrabold"><?= $jml_imun ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="float-right">
                <span class="mini-stat-icon bg-warning-transparent"><i class="si si-eye text-warning"></i></span>
              </div>
              <div class="dash3">
                <h5 class="text-muted">Pasien Ibu Hamil</h5>
                <h4 class="counter num-font font-weight-extrabold"><?= $jml_pibu ?></h4>
              </div>
            </div>
          </div>
              </div>
              <div class="col-xl-6 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="float-right">
              <span class="mini-stat-icon bg-warning-transparent"><i class="si si-eye text-warning"></i></span>
            </div>
            <div class="dash3">
              <h5 class="text-muted">Pasien Bayi</h5>
              <h4 class="counter num-font font-weight-extrabold"><?= $jml_pbayi ?></h4>
            </div>
          </div>
        </div>
        </div>
              
      <!-- <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Chart Data Kematian</h3>
          </div>
          <div class="card-body">
            <canvas id="pieChart" class="h-300"></canvas>
          </div>
        </div>
      </div> -->
        </div>
</div>
</div>
