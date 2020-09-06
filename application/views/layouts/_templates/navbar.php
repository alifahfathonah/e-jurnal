  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-user"></i>
                  <!-- <span class="badge badge-warning navbar-badge"></span> -->
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-fw fa-envelope mr-2"></i> 4 new messages
                  </a> -->
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-fw fa-user mr-2"></i> <?= $user['username'] ?>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url('logout') ?>" class="dropdown-item">
                      <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Logout
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer"><?= $user['email'] ?></a>
              </div>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->