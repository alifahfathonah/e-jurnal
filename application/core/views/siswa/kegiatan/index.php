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
      <div class="col-12">
        <form action="<?= base_url('Siswa/Kegiatan/save'); ?>" method="post">
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
            <textarea name="uraian" id="ckeditor" cols="30" rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
      <hr>

      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">TANGGAL</th>
            <th scope="col">JAM MASUK</th>
            <th scope="col">JAM PULANG</th>
            <th scope="col">URAIAN KEGIATAN</th>
            <th scope="col">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kegiatan as $kg) : ?>
            <tr>
              <th><?= $kg['tanggal']; ?></th>
              <td><?= $kg['jam_masuk']; ?></td>
              <td><?= $kg['jam_pulang']; ?></td>
              <td><?= $kg['uraian_kegiatan']; ?></td>
              <td></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper