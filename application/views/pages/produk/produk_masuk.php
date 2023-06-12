      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Produk Masuk</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="<?= base_url('produk-masuk') ?>">Produk Masuk</a></div>
                      <div class="breadcrumb-item">Data</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Produk Masuk</h2>
              </div>
          </section>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <di class="card-header">
                          Data Produk Masuk
                      </di>
                      <div class="card-body">
                          <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#tambahmasuk"><i class="fas fa-plus-circel"></i>Tambah Data</button>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <div class="table-responsive">
                              <table id="produk-keluar" class="table table-bordered text-center" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Aksi</th>
                                          <th>Nama Produk</th>
                                          <th>Jumlah</th>
                                          <th>Tanggal</th>
                                          <th>Bulan</th>
                                          <th>Tahun</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($data_masuk as $masuk) { ?>
                                          <tr>
                                              <td><?= $n; ?></td>
                                              <td>
                                                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $masuk->id_produk_masuk ?>"><i class="fas fa-trash-alt"></i></button>
                                              </td>

                                              <!-- Modal Hapus -->
                                              <div class="modal fade" id="hapus<?= $masuk->id_produk_masuk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="alert alert-warning text-center" role="alert">

                                                                  <p><b>Apakah anda yakin ingin menghapus data ini ?</b></p>
                                                                  <b class="text-dark"><?= $masuk->nama_produk ?></b>

                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                              <a href="<?= base_url('hapus-produk-masuk/') . $masuk->id_produk_masuk ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus Data</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                              <td><?= $masuk->nama_produk ?></td>
                                              <td><?= $masuk->jumlah ?></td>
                                              <td><?= $masuk->tanggal ?></td>
                                              <td><?= $masuk->bulan ?></td>
                                              <td><?= $masuk->tahun ?></td>
                                          </tr>
                                      <?php $n++;
                                        } ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


          <!-- Modal Tambah -->
          <div class="modal fade" id="tambahmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header bg-success">
                          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Masuk</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="rpw">
                              <div class="col-lg-12">
                                  <form action="<?= base_url('tambah-produk-masuk') ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label for="pk">Pilih Produk</label>
                                          <select name="id_produk" id="pk" class="form-control">
                                              <option value="" selected disabled>-- PILIH PRODUK --</option>
                                              <?php foreach ($produk as $pro) { ?>
                                                  <option value="<?= $pro->id_produk ?>"><?= $pro->nama_produk ?> | <?= $pro->kode_produk ?> | Stok <?= $pro->stok ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="jml">Jumlah</label>
                                          <input type="number" name="jumlah" id="jml" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="tgl">Tanggal</label>
                                          <input type="text" name="tanggal" value="<?= date('Y-m-d') ?>" id="tgl" class="form-control" readonly>
                                      </div>
                                      <div class="form-group">
                                          <div class="row">
                                              <div class="col-6">
                                                  <label for="bln"><b>Bulan</b></label>
                                                  <input type="text" name="bulan" value="<?= date('m') ?>" id="bln" class="form-control" readonly>
                                              </div>
                                              <div class="col-6">
                                                  <label for="thn"><b>Tahun</b></label>
                                                  <input type="text" name="tahun" value="<?= date('Y') ?>" id="thn" class="form-control" readonly>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


      </div>