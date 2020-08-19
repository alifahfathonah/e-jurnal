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
        <?php $this->load->view('layouts/components/alert-bootstrap'); ?>
        <div class="card">
          <div class="card-header bg-dark"></div>
          <div class="card-body">
            <form method="POST" action="<?= base_url('user/settings/change-password'); ?>">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" placeholder="Masukan password" id="password" name="password"></input>
              <?= form_error('password','<small class="text-danger">','</small>') ?>
            </div>
            <button class="btn btn-primary" type="submit">Konfirmasi</button>
            </form>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->