  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
          <img src="<?= base_url(); ?>assets/img/background/smk-c.png" alt="SMK-YPC-LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">E-Jurnal</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('assets/templates/Admin/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?= $user['username'] ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  
                  <?php 
                  $role_id=$user['role_id'];
                  $tbl_menu=$this->db->select('tbl_menu.*,tbl_access_menu.*')
                  ->from('tbl_menu')
                  ->join('tbl_access_menu','tbl_menu.id_menu=tbl_access_menu.menu_id')
                  ->where('tbl_access_menu.role_id',$role_id)
                  ->order_by('tbl_menu.no_urut_menu','ASC')->get()->result_array(); ?>
                  <?php foreach ($tbl_menu as $menu): ?>
                  <?php 
                    $menu_url = $this->uri->segment(1);
                    if ($menu['nama_menu']==strtoupper($menu_url)):
                  ?>
                    <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                  <?php else: ?>
                    <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">  
                  <?php endif ?>
                  
                    
                      <i class="nav-icon far fa-circle"></i>
                      <p>
                        <?= $menu['nama_menu'] ?>
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                  
                    <?php 
                    $menu_id=$menu['id_menu'];
                    $tbl_submenu=$this->db->select('tbl_submenu.*,tbl_menu.*')
                    ->from('tbl_submenu')
                    ->join('tbl_menu','tbl_submenu.menu_id=tbl_menu.id_menu')
                    ->where('tbl_submenu.menu_id',$menu_id)
                    ->where('tbl_submenu.is_active',1)
                    ->get()->result_array();
                     ?>
                      <?php foreach ($tbl_submenu as $submenu): ?>  
                      
                      <li class="nav-item">
                        <?php if ($submenu['nama_submenu']==$judul): ?>
                        <a href="<?= base_url($submenu['url_submenu']) ?>" class="nav-link active">
                        <?php else: ?>
                        <a href="<?= base_url($submenu['url_submenu']) ?>" class="nav-link">
                        <?php endif; ?>
                        
                          <i class="<?= $submenu['icon_submenu'] ?>"></i>
                          <p><?= $submenu['nama_submenu'] ?></p>
                        </a>
                      </li>
                      <?php endforeach; ?>

                    </ul>
                  </li>  
                  <?php endforeach; ?>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>