  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('backend/home_mybus') ?>">
        <img src="<?php echo base_url('assets/img/mybus.png') ?>" width="90">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <?php if ($this->session->userdata('level') == '2') { ?>
        <a class="nav-link" href="<?php echo base_url() ?>backend/home_mybus">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span></a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoOrderPending" aria-expanded="true" aria-controls="collapseTwoOrderPending">
          <i class="fas fa-clock"></i>
            <span>List Pending Order</span>
        </a>
        <div id="collapseTwoOrderPending" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('backend/pending_mybus') ?>">Individu</a>
            <a class="collapse-item" href="<?php echo base_url('backend/pending_mybus/index2') ?>">Institusi</a>
          </div>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoOrder" aria-expanded="true" aria-controls="collapseTwoOrder">
          <i class="fas fa-list-alt"></i>
            <span>List Order</span>
        </a>
        <div id="collapseTwoOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('backend/order_mybus') ?>">Individu</a>
            <a class="collapse-item" href="<?php echo base_url('backend/order_mybus/index2') ?>">Institusi</a>
          </div>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoTiket" aria-expanded="true" aria-controls="collapseTwoTiket">
          <i class="fas fa-qrcode"></i>
            <span>List Tiket Terjual</span>
        </a>
        <div id="collapseTwoTiket" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('backend/tiket_mybus') ?>">Individu</a>
            <a class="collapse-item" href="<?php echo base_url('backend/tiket_mybus/index2') ?>">Institusi</a>
          </div>
        </div>

        <a class="nav-link" href="<?php echo base_url() ?>backend/jadwal_mybus">
          <i class="fas fa fa-clipboard-list"></i>
          <span>Jadwal & Harga</span></a>
        <a class="nav-link" href="<?php echo base_url() ?>backend/rute_mybus">
          <i class="fas fa fa-compass"></i>
          <span>Rute</span></a>
        <a class="nav-link" href="<?php echo base_url() ?>backend/bus_mybus">
          <i class="fas fa fa-bus"></i>
          <span>Bus</span></a>
        <?php }else{ } ?>

        <?php if ($this->session->userdata('level') == '1') { ?>
        <a class="nav-link" href="<?php echo base_url() ?>backend/home_mybus">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span></a>
        <a class="nav-link" href="<?php echo base_url() ?>backend/bank_mybus">
          <i class="fas fa fa-link"></i>
          <span>Data Bank</span></a>
        <a class="nav-link" href="<?php echo base_url() ?>backend/laporan_mybus">
          <i class="fa fa fa-file"></i>
          <span>Laporan</span></a>
          <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-users"></i>
              <span>Management User</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('backend/pelanggan_mybus') ?>">List Pelanggan</a>
                <a class="collapse-item" href="<?php echo base_url('backend/admin_mybus') ?>">List User</a>
              </div>
            </div>
        <?php }else{ } ?>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-danger" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-danger">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">August 12, 2022</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">August 7, 2022</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">November 2, 2022</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama_admin'); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/backend/img/default2.png') ?>">
                <!-- <img class="img-profile rounded-circle" src="<?php echo base_url($this->session->userdata('img_admin')) ?>"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  About Apps
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
