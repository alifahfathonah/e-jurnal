<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <?php $this->load->view('layouts/components/alert-bootstrap'); ?>
      <div class="row">
        
        <div class="col-lg-6 mb-2">
          <div class="card card-dark">
            <div class="card-header">List Bulan Prakerin</div>
            <div class="card-body table-responsive">
              <table class="table table-dark" id="datatable2">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Bulan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($all_bulan as $bulan): ?>
                  <tr>
                    <th scope="row">#</th>
                    <td><?= $bulan['nama_bulan'] ?></td>
                    <td>
                      <?php if ($bulan['is_active']==1): ?>
                        <span class="badge badge-primary">aktif</span>
                      <?php else: ?>
                        <span class="badge badge-danger">nonaktif</span>
                      <?php endif ?>
                    </td>
                    <td>
                      <?php if ($bulan['is_active']==1): ?>
                        <a href="<?= base_url('pembimbing/Bulan_Prakerin_Siswa/nonActivateBulanPrakerin/').$bulan['id_bulan'] ?>" class="badge badge-danger">nonaktifkan
                        </a>
                      <?php else: ?>
                        <a href="<?= base_url('pembimbing/Bulan_Prakerin_Siswa/activateBulanPrakerin/').$bulan['id_bulan'] ?>" class="badge badge-primary">aktifkan
                        </a>
                      <?php endif ?>
                      <a href="<?= base_url('Pembimbing/Bulan_Prakerin_Siswa/edit_total_hari/').$bulan['id_bulan'] ?>" class="badge badge-success">total hari
                      </a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>  
        </div>

        <div class="col-lg-6">
        
          <div class="card card-dark">
            <div class="card-header">Bulan Prakerin Aktif</div>
            <div class="card-body">
              <table class="table table-dark" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Bulan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($bulan_aktif as $bulan): ?>
                  <tr>
                    <th scope="row">#</th>
                    <td><?= $bulan['nama_bulan'] ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper