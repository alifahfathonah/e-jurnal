<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $judul; ?></h1>
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
        
        <div class="col-lg-6 mb-2">
        
          <div class="card card-dark">
            <div class="card-header">Edit Total Hari</div>
            <div class="card-body">
              <form method="post" action="<?= base_url('pembimbing/Bulan_Prakerin_Siswa/edit_total_hari/'.$bulan['id_bulan']) ?>">
                <input type="hidden" class="form-control" name="id_bulan" value="<?= $bulan['id_bulan'] ?>">
              <div class="form-group">
                <label>Bulan</label>
                <input class="form-control" value="<?= $bulan['nama_bulan'] ?>" disabled></input>
              </div>
              <div class="form-group">
                <label for="total_hari">Total Hari</label>
                <input type="number" id="total_hari" min="28" max="31" name="total_hari"  class="form-control" value="<?= $bulan['total_hari'] ?>"></input>
                <?= form_error('total_hari','<small class="text-danger">','</small>') ?>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit">KONFIRMASI</button>
              </div>
              </form>
            </div>
          </div>      
        
        </div>

        <div class="col-lg-6">
        
          
        </div>

      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper