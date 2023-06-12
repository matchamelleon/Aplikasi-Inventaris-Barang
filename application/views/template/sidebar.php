  <div id="app">
      <div class="main-wrapper main-wrapper-3">
          <div class="navbar-bg"></div>
          <nav class="navbar navbar-expand-lg main-navbar">
              <form class="form-inline mr-auto">
                  <ul class="navbar-nav mr-3">
                      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                  </ul>
                  <h6 class="text-left text-white mt-3">Manajemen Data Barang HOONIVERSE</h6>
              </form>
              <ul class="navbar-nav navbar-right">
                  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                          <img alt="image" src="<?= base_url('./assets/profile/') . $this->session->userdata('profile'); ?>" class="rounded-circle mr-1">
                          <div class="d-sm-none d-lg-inline-block mr-1">Hallo, <?= $this->session->userdata('nama'); ?></div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                          <a href="<?= base_url('profiles-user') ?>" class="dropdown-item has-icon">
                              <i class="far fa-user"></i> Profil
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
                              <i class="fas fa-sign-out-alt"></i> Logout
                          </a>
                      </div>
                  </li>
              </ul>
          </nav>
          <div class="main-sidebar sidebar-style-2">
              <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                      <a href="<?= base_url('dashboard') ?>"><b>HOONIVERSE</b></a>
                  </div>
                  <div class="sidebar-brand sidebar-brand-sm">
                      <a href="<?= base_url('dashboard') ?>">HOONIVERSE</a>
                  </div>
                  <ul class="sidebar-menu">
                      <li class="menu-header">Dashboard</li>
                      <li class="dropdown <?= $this->uri->segment('1') == 'dashboard' ? 'active' : '' ?>">
                          <a href="<?= base_url('dashboard'); ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                      </li>
                  </ul>
                  <?php if ($this->session->userdata('role_id') == 1) { ?>
                      <ul class="sidebar-menu">
                          <li class="menu-header">PRODUK</li>
                          <li class="<?= $this->uri->segment('1') == 'satuan' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('satuan') ?>"><i class="far fa-square"></i> <span>Satuan</span></a></li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'kategori-produk' || $this->uri->segment('1') == 'data-produk' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'kategori-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url("kategori-produk") ?>">Kategori</a></li>
                                  <li class="<?= $this->uri->segment('1') == 'data-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url("data-produk") ?>">Daftar Data Produk</a></li>
                              </ul>
                          </li>

                          <li class="<?= $this->uri->segment('1') == 'produk-masuk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('produk-masuk') ?>"><i class="fas fa-boxes"></i> <span>Produk Masuk</span></a></li>
                          <li class="<?= $this->uri->segment('1') == 'produk-keluar' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('produk-keluar') ?>"><i class="fas fa-box-open"></i> <span>Produk Keluar</span></a></li>
                          <li class="menu-header">Request Produk</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'request-produk' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span>Request Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'request-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('request-produk'); ?>">Data Request Produk</a></li>
                              </ul>
                          </li>

                          <li class="menu-header">Laporan</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'cetak-laporan' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-download"></i> <span>Cetak Laporan</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'cetak-laporan' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('cetak-laporan'); ?>">Cetak Laporan</a></li>
                              </ul>
                          </li>

                          <li class="menu-header">Supplier</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'pemasok' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-people-carry"></i> <span>Supplier Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'pemasok' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('pemasok'); ?>">Daftar Data Supplier</a></li>
                              </ul>
                          </li>

                          <li class="menu-header">User</li>
                          <li class="dropdown">
                              <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="<?= base_url('data-user') ?>">Data User</a></li>
                              </ul>
                          </li>
                      </ul>
                  <?php } else if ($this->session->userdata('role_id') == 3) { ?>
                      <ul class="sidebar-menu">
                          <li class="menu-header">Supplier</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'pemasok' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-people-carry"></i> <span>Supplier Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'pemasok' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('pemasok'); ?>">Daftar Data Supplier</a></li>
                              </ul>
                          </li>
                          <li class="menu-header">Request Produk</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'request-produk' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span>Request Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'request-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('request-produk'); ?>">Data Request Produk</a></li>
                              </ul>
                          </li>
                      </ul>
                  <?php } else if ($this->session->userdata('role_id') == 4) { ?>
                      <ul class="sidebar-menu">
                      <li class="<?= $this->uri->segment('1') == 'satuan' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('satuan') ?>"><i class="far fa-square"></i> <span>Satuan</span></a></li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'kategori-produk' || $this->uri->segment('1') == 'data-produk' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'kategori-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url("kategori-produk") ?>">Kategori</a></li>
                                  <li class="<?= $this->uri->segment('1') == 'data-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url("data-produk") ?>">Daftar Data Produk</a></li>
                              </ul>
                          </li>
                          <li class="<?= $this->uri->segment('1') == 'produk-masuk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('produk-masuk') ?>"><i class="fas fa-boxes"></i> <span>Produk Masuk</span></a></li>
                          <li class="<?= $this->uri->segment('1') == 'produk-keluar' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('produk-keluar') ?>"><i class="fas fa-box-open"></i> <span>Produk Keluar</span></a></li>
                          <li class="menu-header">Request Produk</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'request-produk' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span>Request Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'request-produk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('request-produk'); ?>">Data Request Produk</a></li>
                              </ul>
                          </li>
                          <li class="menu-header">Supplier</li>
                          <li class="dropdown <?= $this->uri->segment('1') == 'pemasok' ? 'active' : '' ?>">
                              <a href="#" class="nav-link has-dropdown"><i class="fas fa-people-carry"></i> <span>Supplier Produk</span></a>
                              <ul class="dropdown-menu">
                                  <li class="<?= $this->uri->segment('1') == 'pemasok' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('pemasok'); ?>">Daftar Data Supplier</a></li>
                              </ul>
                          </li>
                      </ul>
                  <?php } ?>
              </aside>
          </div>