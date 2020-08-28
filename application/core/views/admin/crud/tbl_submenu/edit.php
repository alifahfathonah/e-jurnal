    <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
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
        <!-- ############################ BEGIN OF CONTENT ############################### -->
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <a href="<?= base_url('admin/crud/tbl-submenu') ?>" class="btn btn-success">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="<?= base_url('admin/crud/tbl-submenu/edit'); ?>">
              <div class="form-group">
                <input type="hidden" value="<?= $submenu['id_submenu']; ?>" name="id_submenu">
                <label for="nama_submenu">Nama Submenu</label>
                <input value="<?= $submenu['nama_submenu'] ?>" type="" id="nama_submenu" class="form-control" name="nama_submenu">
              </div>
              <div class="form-group">
                <label for="icon_submenu">Icon</label>
                <input value="<?= $submenu['icon_submenu'] ?>" type="" id="icon_submenu" class="form-control" name="icon_submenu">
              </div>
              <div class="form-group">
                <label for="url_submenu">Url Submenu</label>
                <input value="<?= $submenu['url_submenu'] ?>" type="" id="url_submenu" class="form-control" name="url_submenu">
              </div>
              <div class="form-group">
                <label for="s">Level</label>
                
                <select name="menu_id" id="s" class="form-control">
                  <?php if ($all_menu): ?>
                    <?php foreach ($all_menu as $menu): ?>
                    <option value="<?= $menu['id_menu'] ?>"><?= $menu['nama_menu'] ?></option>  
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option>Kosong</option>
                  <?php endif; ?>
                </select>

              </div>

              <div class="form-group">
                <label for="st">Status</label>
                
                <select name="is_active" id="st" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>  
                 </select>

              </div>
              <div class="form-group">
              <button class="btn btn-primary" type="submit">Update</button>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->