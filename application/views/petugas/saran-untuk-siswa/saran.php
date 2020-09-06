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

      <form method="post" action="<?= base_url('petugas/Saran_Siswa/store'); ?>">
      <div class="row">
        <div class="col-lg-6">
          <textarea id="ckeditor" name="isi_saran">
          </textarea>

          <button class="btn btn-primary mt-2 mb-2 ">kirim</button>      
        </div>


        <div class="col-lg-6">
          <div class="card">
            <div class="card-header"><p>Nama Siswa</p></div>
            <div class="card-body">
              <div class="form-group">
                <input type="" class="form-control bg-dark" value="<?= $nama['nama_siswa']; ?>" readonly>
              </div>
                <input type="hidden" class="form-control" value="<?= $nama['id_siswa']; ?>" name="siswa_id">
                <input type="hidden" class="form-control" value="<?= $id_petugas; ?>" name="petugas_id" >
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div>
    </form>
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->