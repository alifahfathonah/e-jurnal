<div class="row">
<div class="col lg-6">

          </div>
        </div>

            <div class="alert alert-danger">
              Belum mengisi kehadiran
            </div>
  

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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

      <div class="col-lg-6">
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
                <?php $no=1; foreach ($kehadiran_siswa_per_bulan as $kehadiran) : ?>
                <?php $keterangan = $this->db->get_where('tbl_keterangan_absensi',['id_keterangan_absensi'=>$kehadiran['keterangan_absensi_id']])->result_array(); ?>
                <?php foreach ($keterangan as $ket): ?>
                  
               
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= date('d', strtotime($kehadiran['tanggal_absensi'])) ?></td>
                    <td><?= $ket['prefix_keterangan'] ?></td>
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
                 <?php endforeach ?>
              </tbody>
            </table>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper