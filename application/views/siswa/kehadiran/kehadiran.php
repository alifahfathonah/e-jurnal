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

      <div class="row">
        <div class="col-lg-6">
        <?php if ($no_bulan==date('m')): ?>
          <div class="card card-dark">
            <form action="<?= base_url('siswa/Kehadiran/storeAbsensi') ?>" method="post">
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
                <input type="hidden" value="<?= $id_bulan; ?>" name="bulan_id">
                <input type="hidden" value="<?= date('dmY'); ?>" name="id_grup_absensi">
                <div class="form-group">
                  <button class="btn btn-primary">KONFIRMASI</button>
                </div>
              </div>
            </form>
          </div>  
        <?php else: ?>
            <div class="card card-primary card-outline mb-3">
              <div class="card-header">
                <h5 class="m-0"></h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Kehadiran Bulan Agustus</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn btn-primary">Total Kehadiran : Example</a>
              </div>
            </div>
        <?php endif; ?>

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
                <?php endforeach ?>
              </tbody>
            </table>
          <?php else : ?>
            <div class="alert alert-danger">
              Tidak ada data kehadiran
            </div>
          <?php endif; ?>

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper