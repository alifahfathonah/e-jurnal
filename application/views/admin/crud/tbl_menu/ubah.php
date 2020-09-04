    <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <?= $this->session->flashdata('message'); ?>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">Update</h1>
                        <form method="post" action="<?= base_url('admin/crud/Tbl_Menu/update');?> ">
                          <div class="form-group"><hr>
                            <label>Name Menu</label>
                          <input type="hidden" name="id_menu" class="form-control col-sm-6" value="<?= $menu ['id_menu']?>" >
                          <input type="text" name="nama_menu" class="form-control col-sm-6" value="<?= $menu ['nama_menu']?>" ><br>
                          <div class="form-group">
                           <input type="number" min="1" value="<?= $menu['no_urut_menu'] ?>" name="no_urut_menu" class="form-control" placeholder="No Urut Menu" >
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                       
              </div>
            </div>
            <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->











