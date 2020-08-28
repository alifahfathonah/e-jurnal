<div class="login-box" style="margin-left: auto; margin-right: 90px;">
  <!-- /.login-logo -->
<?php $this->load->view('layouts/components/alert-bootstrap'); ?>

  <div class="card">
    <div class="card-body login-card-body">
      <div class="row">
        <div class="col">
          <img src="<?= base_url('assets/img/') ?>background/auth/download.png" width="60">
        </div>
      </div>
      <h3 align="center" style="margin-top:-50px;">E-jurnal</h3>
      <p class="login-box-msg text-primary"></p>

      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Email atau Username" name="email" value="<?= set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
        <div class="input-group mt-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', ' <small class="text-danger">', '</small>') ?>
        <a href="<?= base_url('Auth/Forgot_Password') ?>" style="margin-left: 160px; margin-bottom: 0px;">forgot password?</a>
        <!-- /.col -->
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block  mt-3">LOGIN</button>
        </div>

        <!-- /.col -->
    </div>
    </form>