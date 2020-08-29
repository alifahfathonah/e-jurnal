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
        <div class="row mb-3">
          <div class="col-lg-7">
            <div class="card">
              <div class="card-header">Kehadiran siswa prakerin hari ini | <?= date('d-m-Y') ?></div>
              <div class="card-body">
                <table class="table table-dark" id="datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Ket</th>
                      <th scope="col">Konfirmasi Kehadiran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($all_kehadiran_this_day as $kehadiran): ?>                
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $kehadiran['nama_siswa'] ?></td>
                        <td><?= $kehadiran['badge_keterangan_absensi'] ?></td>
                        <td>
                          <a href="" class="badge badge-primary">Konfirmasi</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <a href="<?= base_url('pembimbing/kehadiran-siswa/konfirmasi-kehadiran') ?>" class="btn btn-primary">Konfirmasi semua</a>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            
          </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper