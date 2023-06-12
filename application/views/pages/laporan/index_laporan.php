      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Cetak Laporan</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="<?= base_url('cetak-laporan') ?>">Cetak Laporan</a></div>
                      <div class="breadcrumb-item">Data</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Cetak Laporan</h2>

              </div>
          </section>


          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12">
                          <h5 class="ml-2 mt-2 mb2"><b>Cetak Laporan Produk Masuk</b></h5>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6><b>Cetak Bulanan</b></h6>
                                          <form action="<?= base_url('produk-masuk-bulanan') ?>" method="post" enctype="multipart/form-data" target="_blank">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="row">
                                                              <div class="col-6">
                                                                  <label for="bl">Bulan</label>
                                                                  <select name="bulan" id="bl" class="form-control">
                                                                      <option value="" disabled selected>-- PILIH BULAN --</option>
                                                                      <option value="1">Januari</option>
                                                                      <option value="2">Februari</option>
                                                                      <option value="3">Maret</option>
                                                                      <option value="4">April</option>
                                                                      <option value="5">Mei</option>
                                                                      <option value="6">Juni</option>
                                                                      <option value="7">Juli</option>
                                                                      <option value="8">Agustus</option>
                                                                      <option value="9">September</option>
                                                                      <option value="10">Oktober</option>
                                                                      <option value="11">November</option>
                                                                      <option value="12">Desember</option>
                                                                  </select>
                                                              </div>
                                                              <div class="col-6">
                                                                  <label for="thn">Tahun</label>
                                                                  <select name="tahun" id="thn" class="form-control">
                                                                      <option value="" disabled selected>-- PILIH TAHUN --</option>
                                                                      <?php
                                                                        for ($i = date('Y'); $i >= date('Y') - 10; $i -= 1) {
                                                                            echo "<option value='$i'> $i </option>";
                                                                        }
                                                                        ?>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <button type="submit" class="btn btn-block btn-warning"><i class="fas fa-download"></i> Cetak Laporan</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6><b>Cetak Tahunan</b></h6>
                                          <div class="row">
                                              <div class="col-lg-12">
                                                  <form action="<?= base_url('produk-masuk-tahunan') ?>" method="post" enctype="multipart/form-data" target="_blank">
                                                      <div class="form-group">
                                                          <label for="thn">Tahun</label>
                                                          <select name="tahun" id="thn" class="form-control">
                                                              <option value="" disabled selected>-- PILIH TAHUN --</option>
                                                              <?php
                                                                for ($i = date('Y'); $i >= date('Y') - 10; $i -= 1) {
                                                                    echo "<option value='$i'> $i </option>";
                                                                }
                                                                ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group">
                                                          <button type="submit" class="btn btn-block btn-warning"><i class="fas fa-download"></i> Cetak Laporan</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <h5 class="ml-2 mt-2 mb2"><b>Cetak Laporan Produk Keluar</b></h5>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6><b>Cetak Bulanan</b></h6>
                                          <form action="<?= base_url('produk-keluar-bulanan') ?>" method="post" enctype="multipart/form-data" target="_blank">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="row">
                                                              <div class="col-6">
                                                                  <label for="bl">Bulan</label>
                                                                  <select name="bulan" id="bl" class="form-control">
                                                                      <option value="" disabled selected>-- PILIH BULAN --</option>
                                                                      <option value="01">Januari</option>
                                                                      <option value="02">Februari</option>
                                                                      <option value="03">Maret</option>
                                                                      <option value="04">April</option>
                                                                      <option value="05">Mei</option>
                                                                      <option value="06">Juni</option>
                                                                      <option value="07">Juli</option>
                                                                      <option value="08">Agustus</option>
                                                                      <option value="09">September</option>
                                                                      <option value="10">Oktober</option>
                                                                      <option value="11">November</option>
                                                                      <option value="12">Desember</option>
                                                                  </select>
                                                              </div>
                                                              <div class="col-6">
                                                                  <label for="thn">Tahun</label>
                                                                  <select name="tahun" id="thn" class="form-control">
                                                                      <option value="" disabled selected>-- PILIH TAHUN --</option>
                                                                      <?php
                                                                        for ($i = date('Y'); $i >= date('Y') - 10; $i -= 1) {
                                                                            echo "<option value='$i'> $i </option>";
                                                                        }
                                                                        ?>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <button type="submit" class="btn btn-block btn-warning"><i class="fas fa-download"></i> Cetak Laporan</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6><b>Cetak Tahunan</b></h6>
                                          <div class="row">
                                              <div class="col-lg-12">
                                                  <form action="<?= base_url('produk-keluar-tahunan') ?>" method="POST" enctype="multipart/form-data" target="_blank">
                                                      <div class="form-group">
                                                          <label for="thn">Tahun</label>
                                                          <select name="tahun" id="thn" class="form-control">
                                                              <option value="" disabled selected>-- PILIH TAHUN --</option>
                                                              <?php
                                                                for ($i = date('Y'); $i >= date('Y') - 10; $i -= 1) {
                                                                    echo "<option value='$i'> $i </option>";
                                                                }
                                                                ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group">
                                                          <button type="submit" class="btn btn-block btn-warning"><i class="fas fa-download"></i> Cetak Laporan</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>



      </div>