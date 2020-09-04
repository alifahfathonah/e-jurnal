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
              
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <?php $this->load->view('layouts/components/alert-bootstrap') ?>

        <div class="jumbotron bg-dark">
          <h4 class="display">Selamat datang di E-JURNAL, 
            <?php if ($user['role_id']=='1'): ?>
            <?= $user['username']; ?> !  
            <?php elseif($user['role_id']=='2'): ?>
            <?= $user['username']; ?> !
            <?php elseif($user['role_id']=='3'): ?>
            <?= $user['username']; ?> !
            <?php elseif($user['role_id']=='4'): ?>
              <?php if ($siswa_exists): ?>
                <?= $siswa['nama_siswa'] ?>
              <?php else: ?>
                <?= $user['username'] ?>
              <?php endif ?>
            <?php else: ?>
              <?php redirect('logout'); ?>
            <?php endif; ?>
            </h4>
          <hr class="bg-light">
          <p class="lead">E-JURNAL adalah WEBSITE sistem prakerin berbasis WEB , yang bertujuan untuk memudahkan para siswa/siswi dalam melaksanakan Magang/Prakerin Secara Online.</p>
          <hr class="my-4 bg-light">
          
          
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->