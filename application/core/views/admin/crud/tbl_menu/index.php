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
                    <ul class="list-group">
                        <?php foreach ($tbl_menu as $menu): ?>
                      <li class="list-group-item"><?=$menu['nama_menu']?>
                      <div class="row float-right mr-2">
                        <a href="<?= base_url('Admin/Crud/Tbl_menu/tambah_submenu/').$menu['id_menu']; ?>" class="btn btn-primary mr-2">tambah submenu</a>
                        <a href="<?= base_url('Admin/Crud/Tbl_menu/'); ?>ubah/<?= $menu['id_menu']; ?>" class="btn btn-success mr-2">Edit</a>
                        <a href="<?= base_url('Admin/Crud/Tbl_menu/'); ?>hapus/<?= $menu['id_menu'];?>"class="btn btn-danger mr-2">Hapus</a>
                        </div>
                      </li>

                        <?php endforeach ?>
                    </ul>

            </div>
            <!-- /.card -->

    </div>
    <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->