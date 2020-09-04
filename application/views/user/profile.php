  <div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
      <h2> Profile Saya</h2>
    </div>
    </div>
    <div class="row mt-2">      
      <div class="col-md-5">
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
  </div>
</div>