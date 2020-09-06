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
        <div class="col-lg-6">

        <div class="card card-dark">
            <form action="<?= base_url('pembimbing/tugas-siswa/store') ?>" method="post">
              <div class="card-header"></div>
              <div class="card-body">
                <input required="" type="hidden" name="pembimbing_id" value="<?= $pembimbing['id_pembimbing'] ?>" class="form-control">
                <div class="form-group">
                  <label for="judul">Judul Tugas</label>
                  <input required="" type="text" name="judul_tugas_siswa" id="judul" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="deskripsi_tugas">Deskripsi</label>
                  <textarea required="" class="form-control" name="deskripsi_tugas" id="ckeditor"></textarea>
                </div>
                <div class="form-group">
                  <label>Kirim File</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <small class="text-muted"><i>kosongkan jika tidak perlu</i></small>
                </div>  
                <div class="form-group">
                  <label for="tipe_tugas">Tipe Tugas</label>
                  <select required="" name="tipe_tugas_siswa_id" id="tipe_tugas" class="form-control">
                    <?php foreach ($all_tipe_tugas as $tipe_tugas): ?>
                      <option value="<?= $tipe_tugas['id_tipe_tugas_siswa'] ?>"><?= $tipe_tugas['nama_tipe_tugas'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">KONFIRMASI</button>
                </div>
              </div>
            </form>
          </div>  

        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6 table-responsive">

        

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper