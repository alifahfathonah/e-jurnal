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
              <div class="col-lg-6">
                <form action="<?= base_url('admin/crud/Tbl_Menu/tambah_submenu/').$menu_id ?>" method="post">
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
                <div class="form-group">
                    <label for="url_submenu">No Urut Submenu Submenu</label>
                  <input placeholder="" class="form-control" id="url_submenu" name="no_urut_submenu"></input>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>

              <div class="col-lg-6">
                <table class="table table-dark" id="datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Menu</th>
                          <th scope="col">No Urut</th>
                          <th scope="col">Edit No Urut</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($submenu_menu as $submenu): ?>
                        <tr>
                          <th scope="row"><?= $no++ ?></th>
                          <td><?=$submenu['nama_submenu']?></td>
                          <td><?=$submenu['no_urut_submenu']?></td>
                          <td>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#submenu<?= $submenu['id_submenu'] ?>">
                              <i class="fas fa-edit fa-fw"></i>
                            </a>
                          </td>

                          <!-- Modal -->
                            <div class="modal fade" id="submenu<?= $submenu['id_submenu']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nama Submenu : <?= $submenu['nama_submenu'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" action="<?= base_url('admin/crud/Tbl_Menu/update_no_urut_submenu/').$submenu['id_submenu'].'/'.$menu_id; ?>">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <input type="" class="form-control" value="<?= $submenu['no_urut_submenu'] ?>" name="no_urut_submenu">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->