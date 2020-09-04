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

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <?php $this->load->view('layouts/components/alert-bootstrap'); ?>
      <div class="row">
        <div class="col-lg-6">
            
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <?php $role=$this->db->get_where('tbl_role',['id_role' => $user['role_id']])->row_array(); ?>
                  <?php echo $role['nama_role']; ?>
                   <h5 class="widget-user-desc"><?= $user['username']; ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?= base_url('assets/'); ?>img/profile/<?= $user['image'] ?>">
              </div>
              <div class="card-footer" style="background-color: gray;">
                <div class="description-block">
                      <h5 class="description-header">Email</h5>
                      <span class="description-text"><?= $user['email']; ?></span>
                    </div>
              </div>
            </div>
            <!-- /.widget-user -->
        
        </div>  
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper