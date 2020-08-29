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
        <div class="mb-3">

        <?php if ($pembimbing) : ?>
            <table class="table table-dark" id="datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Tgl Upload</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($all_tugas_siswa_by_pembimbing as $tugas): ?>                
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $tugas['judul_tugas_siswa'] ?></td>
                    <td><?= date('d-m-Y',strtotime($tugas['created_at'])) ?></td>
                    <td>
                      <a href="<?= base_url('pembimbing/tugas-siswa/delete/'.$tugas['id_tugas']) ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            
          <?php endif ?>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper