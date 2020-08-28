    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('siswa/home') ?>">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <?php $this->load->view('layouts/components/alert-bootstrap'); ?>

        <div class="row">
          <div class="col-md-6">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/templates/Admin/') ?>dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $siswa['nama_siswa'] ?></h3>

                <p class="text-muted text-center"></p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-6">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Identitas Lengkap</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user mr-1"></i> Nama Lengkap</strong>

                <p class="text-muted">
                  <?= $siswa['nama_siswa'] ?>                  
                </p>

                <hr>

                <strong><i class="fas fa-circle mr-1"></i> Tempat Tgl Lahir</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?= $siswa['tempat_lahir'] ?></span>,
                  <span class="tag tag-success"><?= date('d M Y',strtotime($siswa['tanggal_lahir']))  ?></span>
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Nis</strong>

                <p class="text-muted">
                  <?= $siswa['nis'] ?>                  
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Siswa</strong>

                <p class="text-muted"><?= $siswa['alamat_siswa'] ?></p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> No Telepon</strong>

                <p class="text-muted"><?= $siswa['no_telp_siswa'] ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
          
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->