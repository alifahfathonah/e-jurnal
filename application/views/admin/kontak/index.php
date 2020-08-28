<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center bg-dark">
          <a href="<?= base_url('admin/kontak/kontak_siswa'); ?>">Kontak Siswa</a>
          <span class="badge badge-primary badge-pill"><?= $total_siswa; ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center bg-dark">
          <a href="<?= base_url('admin/kontak/kontak_pembimbing'); ?>">Kontak Pembimbing</a>
          <span class="badge badge-primary badge-pill"><?= $total_pembimbing; ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center bg-dark">
          <a href="<?= base_url('admin/kontak/kontak_petugas'); ?>">Kontak Petugas Monitoring</a>
          <span class="badge badge-primary badge-pill"><?= $total_petugas; ?></span>
        </li>
      </ul>

    </section>
    <!-- /.content -->