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
              <div class="card-header">Bulan <?= $bulan['nama_bulan'] ?></div>
              <div class="card-body table-responsive ">
                <table class="table table-dark" id="datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tgl</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <?php 
                  $calendar = CAL_JULIAN;
                  $year = date('Y');
                  $total_hari = cal_days_in_month($calendar,$bulan['id_bulan'],$year);
                   ?>
                  <tbody>
                    <?php for($i=1; $i<=$total_hari; $i++) : ?> 
                      <tr>
                        <th scope="row">#</th>
                        <td><?= $i; ?></td>
                        <td>
                          <a href="<?= base_url('Pembimbing/Kehadiran_Siswa/detail_kehadiran_per_bulan/'.$bulan['id_bulan'].'/').'0'.$i.$bulan['no_bulan'].date('Y'); ?>" class="btn btn-primary"><i class="fa-fw fas fa-info"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endfor; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            


          </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper