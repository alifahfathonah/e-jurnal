    <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <?= $this->session->flashdata('message'); ?>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= $judul; ?></h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- ############################ BEGIN OF CONTENT ############################### -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url('admin/crud/Tbl_absen/tambah') ?>" class="btn btn-primary">Tambah</a>
                        <a href="<?= base_url('admin/crud/Tbl_absen/clear') ?>" class="btn btn-danger">Kosongkan</a>
                    </div>
                </div>


                <table class="table mt-2">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA SISWA</th>
                            <th>KETERANGAN</th>
                            <th> Created Att</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($absen as $abs) {

                        ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $abs['nis']; ?></td>
                                <td><?= $abs['nama_siswa']; ?></td>
                                <td><?= $abs['nama_keterangan']; ?></td>
                                <td><?= $abs['created_at']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/crud/Tbl_Absen/'); ?>hapus/<?= $abs['id_absensi']; ?>">hapus</a>
                                    ||
                                    <a href="<?= base_url('admin/crud/Tbl_Absen/'); ?>ubah/<?= $abs['id_absensi']; ?>">ubah</a>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <!-- /.card -->

    </div>
    <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->