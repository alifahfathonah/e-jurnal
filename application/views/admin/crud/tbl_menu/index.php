    <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <?= $this->session->flashdata('message'); ?>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Menu</h1>
                        <hr>
                        <a href="<?= base_url('Admin/Crud/Tbl_menu/tambah'); ?>" class="btn btn-primary">tambah</a>

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
                <!-- <div class="row">
                    <div class="col">
                        <a href="<?= base_url('Admin/Crud/Tbl_menu/tambah') ?>" class="btn btn-primary">Tambah</a>
                    </div>
                </div>-->
                    <table class="table table-dark" id="datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Menu</th>
                          <th scope="col">No Urut</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($tbl_menu as $menu): ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?=$menu['nama_menu']?></td>
                          <td><?=$menu['no_urut_menu']?></td>
                          <td>
                            <!-- <div class="row"> -->
                                <a href="<?= base_url('Admin/Crud/Tbl_menu/tambah_submenu/').$menu['id_menu']; ?>" class="btn btn-primary mr-2">tambah submenu</a>
                                <a href="<?= base_url('Admin/Crud/Tbl_menu/'); ?>ubah/<?= $menu['id_menu']; ?>" class="btn btn-success mr-2">Edit</a>
                                <a href="<?= base_url('Admin/Crud/Tbl_menu/'); ?>hapus/<?= $menu['id_menu'];?>"class="btn btn-danger mr-2">Hapus</a>
                            <!-- </div> -->
                          </td>
                        </tr>
                        <?php endforeach; ?>
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