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

    <!-- =========================================================== -->
    
        <div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tugas & Materi</span>
                <span class="info-box-number"><?= $total_materi; ?></span>

                <!-- <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span> -->
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-6 col-12">
            <form method="get" action="<?= base_url('siswa/tugas') ?>">
              <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control bg-dark" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    <h5 class="mb-2">Tugas & Materi</h5>
    <div class="col-md-6 mb-2">
        
    </div>
    
    <div class="row">    
    <?php foreach($materi as $m) : ?>
    <?php $tbl_pembimbing = $this->db->get_where('tbl_pembimbing',['id_pembimbing'=>$m['pembimbing_id']])->result_array();?>
    <?php foreach($tbl_pembimbing as $pembimbing) :?>
    
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-dark">
                <span class="info-box-icon bg-primary "><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                <div class="card-text text-bold"><?= $m['judul_tugas_siswa'] ?></div>
                <span class="info-box-text"><?= $pembimbing['nama_pembimbing'];?></span>
                <span class="info-box-text">Tanggal : <?= date('d-m-Y',strtotime($m['created_at'])) ?></span>
                <a href="<?= base_url('Siswa/tugas/detail_tugas/'.$m['id_tugas']);?>" class="btn btn-primary mt-3">Lihat</a>
              </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
    <?php endforeach; ?>
    <?php endforeach; ?>
    
    </div>
        
        <div>
            <?= $this->pagination->create_links() ?>
        </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

