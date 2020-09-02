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
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('siswa/home') ?>">Home</a></li>
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

            <div class="row">
                <div class="col-lg-6">

                    <div class="card card-primary card-outline mb-3">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="m-0"><?= $petugas_saran['nama_petugas_monitoring'] ?></h5>
                                <h6 class="" style="margin-left: auto;"><?= $saran['tanggal_saran'] ?></h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"></h6>

                            <p class="card-text"><?= $saran['isi_saran'] ?></p>
                        </div>
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