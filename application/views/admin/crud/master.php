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
        
        <div class="list-group mb-4">
          <a href="#" class="list-group-item list-group-item-action active">
            List Tabel
          </a>
          <a href="<?= base_url('admin/crud/tbl-absen') ?>" class="list-group-item list-group-item-action">Absen</a>
          <a href="<?= base_url('admin/crud/tbl-access-menu') ?>" class="list-group-item list-group-item-action">Access menu</a>
          <a href="<?= base_url('admin/crud/tbl-admin') ?>" class="list-group-item list-group-item-action">Admin</a>
          <a href="<?= base_url('admin/crud/tbl-chat') ?>" class="list-group-item list-group-item-action">Chat</a>
          <a href="<?= base_url('admin/crud/tbl-jurusan') ?>" class="list-group-item list-group-item-action">Jurusan</a>
          <a href="<?= base_url('admin/crud/tbl-kelas') ?>" class="list-group-item list-group-item-action">Kelas</a>
          <a href="<?= base_url('admin/crud/tbl-keterangan') ?>" class="list-group-item list-group-item-action">Keterangan</a>
          <a href="<?= base_url('admin/crud/tbl-kontak') ?>" class="list-group-item list-group-item-action">Kontak</a>
          <!-- <a href="#" class="list-group-item list-group-item-action">Menu</a>
          <a href="#" class="list-group-item list-group-item-action">Pembimbing</a>
          <a href="#" class="list-group-item list-group-item-action">Role</a>
          <a href="#" class="list-group-item list-group-item-action">Siswa</a>
          <a href="#" class="list-group-item list-group-item-action">Submenu</a>
          <a href="#" class="list-group-item list-group-item-action">User</a> -->
          <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">#E-JURNAL</a>
        </div>
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->