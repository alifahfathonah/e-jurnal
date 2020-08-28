    <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <?= $this->session->flashdata('message'); ?>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">Tambah Submenu</h1>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <form action="<?= base_url('Admin/Crud/Tbl_menu/tambah_submenu/').$menu_id ?>" method="post">
                <div class="form-group">
                  <label for="nama_submenu">Nama Submenu</label>
                  <input placeholder="" class="form-control" id="nama_submenu" name="nama_submenu"></input>
                </div>
                <div class="form-group">
                    <label for="icon_submenu">Icon Submenu</label>
                  <input placeholder="" class="form-control" id="icon_submenu" name="icon_submenu"></input>
                </div>
                <div class="form-group">
                    <label for="url_submenu">Url Submenu</label>
                  <input placeholder="" class="form-control" id="url_submenu" name="url_submenu"></input>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>

              <div class="col-md-6">
                
              </div>
            </div>
            <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->











