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
        <form method="POST" action="<?= base_url('pembimbing/Identitas/store') ?>">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">Lengkapi data dengan benar</div>
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" value="<?= $user['id_user'] ?>" name="user_id">
                  <input required="" class="form-control" placeholder="Nama Lengkap" name="nama_pembimbing"></input>
                </div>
                <div class="form-group">
                  <input required="" class="form-control" placeholder="Nip" name="nip"></input>
                </div>
                <div class="form-group">
                  <input required="" class="form-control" placeholder="No Telepon" name="no_telp_pembimbing"></input>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">KONFIRMASI</button>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>
        </div>
        </form>  
          
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->