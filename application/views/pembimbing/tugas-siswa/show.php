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
        
        <?php $this->load->view('layouts/components/alert-bootstrap') ?>

        <div class="row">
          <div class="col-lg-8">
            
            <div class="card card-primary card-outline mb-3">
              <div class="card-header">
                <div class="float-left">
                  <h5 class="m-0"><?= $detail_tugas['judul_tugas_siswa']; ?></h5>  
                </div>
                <div class="float-right">
                  <a href="<?= base_url('pembimbing/tugas-siswa/edit/').$detail_tugas['id_tugas']; ?>" class="btn btn-primary"><i class="fas fa-edit fa-fw"></i></a>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text"><?= $detail_tugas['deskripsi_tugas'];?></p>
              </div>
            </div>
          
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">

            <?php $this->load->view('layouts/components/chat-tugas-siswa') ?>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->