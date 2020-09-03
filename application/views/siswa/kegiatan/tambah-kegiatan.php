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
      <div class="col-12">
      
        <div class="card card-dark">
          <div class="card-header"></div>
          <div class="card-body">
            <form action="<?= base_url('Siswa/Kegiatan/save'); ?>" method="post">
              <input type="hidden" class="form-control" value="<?= $siswa['id_siswa'] ?>" name="siswa_id">
              <input type="hidden" class="form-control" value="<?= date('dmy'); ?>" name="id_grup_kegiatan">
              <div class="form-group">
                <label>TANGGAL</label>
                <input type="date" class="form-control" name="tgl">
              </div>
              <div class="form-group">
                <label>JAM MASUK</label>
                <input type="time" class="form-control" name="jam_masuk">
              </div>
              <div class="form-group">
                <label>JAM PULANG</label>
                <input type="time" class="form-control" name="jam_pulang">
              </div>
              <div class="form-group">
                <label>URAIAN KEGIATAN</label>
                <textarea name="uraian_kegiatan" id="ckeditor" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      
      </div>

    </div><!-- /.container-fluid -->
  </div>
</div>
<!-- /.content-wrapper -->