Content Wrapper. Contains page content -->
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
            <li class="breadcrumb-item"><a href="<?= base_url('siswa/kehadiran') ?>">Kembali</a></li>
          </ol>
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
            <form action="<?= base_url('siswa/kehadiran/storeAbsensi') ?>" method="post">
              <div class="card-header"></div>
              <div class="card-body">
                <input type="hidden" name="slug_bulan" value="<?= $slug_bulan ?>" class="form-control">
                <input type="hidden" name="siswa_id" value="<?= $siswa['id_siswa'] ?>" class="form-control">
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="text" name="tanggal_absensi" id="tanggal" class="form-control" value="<?= date('d-m-Y') ?>" readonly>
                </div>
                <div class="form-group">
                  <select name="keterangan_absensi_id" id="keterangan_absensi_id" class="form-control">
                    <?php foreach ($all_keterangan_absensi as $keterangan) : ?>
                      <option value="<?= $keterangan['id_keterangan_absensi'] ?>"><?= $keterangan['nama_keterangan'] ?></option>
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

        <?php if ($count_kehadiran_saya) : ?>
            <table class="table table-dark" id="datatable">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Tgl</th>
                  <th scope="col">Ket</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($kehadiran_saya as $kehadiran) : ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= date('d', strtotime($kehadiran['tanggal_absensi'])) ?></td>
                    <td><?= $kehadiran['badge_keterangan_absensi'] ?></td>
                    <td></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          <?php else : ?>
            
          <?php endif ?>

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper