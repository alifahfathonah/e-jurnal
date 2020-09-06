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

        <div class="row">
          <div class="col-lg-8">
            
            <div class="card card-primary card-outline mb-3">
              <div class="card-header">
                <h5 class="m-0"><?= $detail_materi['judul_tugas_siswa'];?></h5>
              </div>
              <div class="card-body">
                <p class="card-text"><?= $detail_materi['deskripsi_tugas'];?></p>
              </div>
            </div>

            <div class="form-group">
                  <label>Kirim File</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <small class="text-muted"><i>kosongkan jika tidak perlu</i></small>
                </div>
          
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">

            <?php $this->load->view('layouts/components/chat-tugas-siswa') ?>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->