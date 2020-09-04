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
          <div class="col-lg-7">
            <div class="card">
              <div class="card-header">Kegiatan siswa prakerin hari ini | <?= date('d-m-Y') ?></div>
              <div class="card-body table-responsive">
                <table class="table table-dark" id="datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Paraf</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $data=[]; $no=1; foreach ($all_kegiatan_today as $kegiatan): ?>                
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $kegiatan['nama_siswa'] ?></td>
                        <td>
                          <?php $data[]=$kegiatan['id_kegiatan']; ?>
                          <?php if ($kegiatan['is_active']<1): ?>
                          <a href="<?= base_url('pembimbing/Kegiatan_Siswa/confirmKegiatanSiswa/'.$kegiatan['id_kegiatan']) ?>" class="badge badge-primary">konfirmasi</a>
                          <?php else: ?>
                            <span class="badge badge-primary"><i class="fas fa-check"></i></span>
                          <?php endif; ?>
                        </td>
                        <td>
                            <?php 
                              if ($kegiatan['is_active']>0) {
                                $status="<span class='badge badge-success'>dikonfirmasi</span>";
                              }else{
                                $status="<span class='badge badge-danger'>belum dikonfirmasi</span>";
                              }
                              echo $status;
                            ?>
                        </td>
                        <td>
                          <a href="" class="btn btn-primary"><i class="fas fa-info-circle">
                          </i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <?php if ($count_kegiatan_today): ?>
                  
                  <?php if ($count_unconfirmed_kegiatan_today>1): ?>
                    <a href="<?= base_url('pembimbing/Kegiatan_Siswa/confirmAllKegiatanSiswa') ?>" class="btn btn-primary">Konfirmasi semua</a>
                  <?php else: ?>
                    
                  <?php endif ?>
                
                <?php else: ?>
                  
                <?php endif; ?>
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