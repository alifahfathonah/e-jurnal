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
        <div class="row mb-3">
          <div class="col-lg-8 mb-2">
            <div class="card">
              <div class="card-header">Kehadiran siswa prakerin hari ini | <?= date('d-m-Y') ?></div>
              <div class="card-body table-responsive ">
                <table class="table table-dark" id="datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Ket</th>
                      <th scope="col">Paraf</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $data=[]; $no=1; foreach ($all_kehadiran_this_day as $kehadiran): ?>                
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $kehadiran['nama_siswa'] ?></td>
                        <td><?= $kehadiran['badge_keterangan_absensi'] ?></td>
                        <td>
                          <?php $data[]=$kehadiran['id_absensi']; ?>
                          <?php if ($kehadiran['is_active']<1): ?>
                          <a href="<?= base_url('pembimbing/kehadiran-siswa/konfirmasi-kehadiran/'.$kehadiran['id_absensi']) ?>" class="badge badge-primary">Konfirmasi</a>
                          <?php else: ?>
                            <span class="badge badge-primary"><i class="fas fa-check"></i></span>
                          <?php endif ?>
                        </td>
                        <td>
                            <?php 
                              if ($kehadiran['is_active']>0) {
                                $status="<span class='badge badge-success'>dikonfirmasi</span>";
                              }else{
                                $status="<span class='badge badge-danger'>belum dikonfirmasi</span>";
                              }
                              echo $status;
                            ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <?php if ($count_kehadiran>0): ?>
                  <?php if ($count_confirmed_kehadiran_this_day>1): ?>
                  
                  <?php else: ?>
                    <a href="<?= base_url('pembimbing/kehadiran-siswa/konfirmasi-semua-kehadiran') ?>" class="btn btn-primary">Konfirmasi semua</a>
                  <?php endif; ?>
                
                <?php else: ?>
                
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            
            <div class="card card-primary card-outline mb-3">
            <div class="list-group">
              <span class="list-group-item list-group-item-action">
                Bulan
              </span>
              <?php foreach ($bulan_aktif as $bulan): ?>
                <?php if ($bulan_sekarang==$bulan['no_bulan']): ?>
                  <a href="<?= base_url('pembimbing/Kehadiran_Siswa/bulan/').$bulan['id_bulan']; ?>" class="list-group-item list-group-item-action bg-dark"><?= $bulan['nama_bulan'] ?></a>
                <?php else: ?>
                  <a href="<?= base_url('pembimbing/Kehadiran_Siswa/bulan/').$bulan['id_bulan']; ?>" class="list-group-item list-group-item-action"><?= $bulan['nama_bulan'] ?></a>
                <?php endif ?>
              <?php endforeach; ?>
            </div>
            </div>

          </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->