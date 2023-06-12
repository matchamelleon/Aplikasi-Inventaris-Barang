      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Daftar Data Produk</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="<?= base_url('data-produk') ?>">Daftar Data Produk</a></div>
                      <div class="breadcrumb-item">Data</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Produk</h2>
              </div>
          </section>



          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <di class="card-header">
                          Data Produk
                      </di>
                      <div class="card-body">
                          <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#tambahproduk"><i class="fas fa-plus-circel"></i>Tambah Data</button>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <div class="table-responsive">
                              <table id="data-produk" class="table table-bordered text-center" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Aksi</th>
                                          <th>Kategori</th>
                                          <th>Satuan</th>
                                          <th>Kode Produk</th>
                                          <th>Nama</th>
                                          <th>Harga</th>
                                          <th>Stok</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($produk as $data) { ?>
                                          <tr>
                                              <td><?= $n; ?></td>
                                              <td>
                                                  <div class="btn-group">
                                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data->id_produk ?>"><i class="fas fa-trash-alt"></i></button>
                                                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $data->id_produk ?>"><i class="fas fa-edit"></i></button>
                                                  </div>
                                              </td>

                                              <!-- Modal Modal -->
                                              <div class="modal fade" id="hapus<?= $data->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger text-white">
                                                              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="alert alert-warning text-center text-dark">
                                                                  <p><b>Apakah anda yakin akan menghapus data ini ?</b></p>
                                                                  <b><?= $data->kode_produk ?></b>
                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                              <a href="<?= base_url('hapus-produk/') . $data->id_produk ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus Data</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>


                                              <!-- Modal Edit -->
                                              <div class="modal fade" id="edit<?= $data->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="row">
                                                                  <div class="col-lg-12">
                                                                      <form action="<?= base_url('edit-produk/') . $data->id_produk ?>" method="post" enctype="multipart/form-data">
                                                                          <div class="row">
                                                                              <div class="col-md-6">
                                                                                  <div class="form-group">
                                                                                      <label for="">Kategori</label>
                                                                                      <select name="id_kategori" id="" class="form-control">
                                                                                          <option value="" selected disabled>-- PILIH KATEGORI --</option>
                                                                                          <?php foreach ($kategori as $data_k) { ?>
                                                                                              <option value="<?= $data_k->id_kategori ?>" <?= $data_k->id_kategori == $data->id_kategori ? 'selected' : '' ?>><?= $data_k->nama_kategori ?></option>
                                                                                          <?php } ?>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Satuan</label>
                                                                                      <select name="id_satuan" id="" class="form-control">
                                                                                          <option value="" selected disabled>-- PILIH SATUAN --</option>
                                                                                          <?php foreach ($satuan as $data_s) { ?>
                                                                                              <option value="<?= $data_s->id_satuan ?>" <?= $data_s->id_satuan == $data->id_satuan ? 'selected' : '' ?>><?= $data_s->nama_satuan ?></option>
                                                                                          <?php } ?>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Kode Produk</label>
                                                                                      <input type="text" name="kode_produk" value="<?= $data->kode_produk ?>" class="form-control" readonly>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6">
                                                                                  <div class="form-group">
                                                                                      <label for="">Nama Produk</label>
                                                                                      <input type="text" name="nama_produk" value="<?= $data->nama_produk ?>" class="form-control">
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Harga Produk</label>
                                                                                      <input type="number" name="harga" value="<?= $data->harga ?>" class="form-control">
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Stok Produk</label>
                                                                                      <input type="number" name="stok" value="<?= $data->stok ?>"  class="form-control" readonly>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="form-group">
                                                                                  <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                                                              </div>
                                                                          </div>
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>


                                              <td><?= $data->nama_kategori ?></td>
                                              <td><?= $data->nama_satuan ?></td>
                                              <td><?= $data->kode_produk ?></td>
                                              <td><?= $data->nama_produk ?></td>
                                              <td>Rp. <?= number_format($data->harga, 0, ".", ".") ?></td>
                                              <td><?= $data->stok ?></td>
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
          <div class="modal fade" id="tambahproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bg-success">
                          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Produk</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-lg-12">
                                  <form action="<?= base_url('tambah-produk') ?>" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="">Kategori</label>
                                                  <select name="id_kategori" id="" class="form-control">
                                                      <option value="" selected disabled>-- PILIH KATEGORI --</option>
                                                      <?php foreach ($kategori as $data_k) { ?>
                                                          <option value="<?= $data_k->id_kategori ?>"><?= $data_k->nama_kategori ?></option>
                                                      <?php } ?>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Satuan</label>
                                                  <select name="id_satuan" id="" class="form-control">
                                                      <option value="" selected disabled>-- PILIH SATUAN --</option>
                                                      <?php foreach ($satuan as $data_s) { ?>
                                                          <option value="<?= $data_s->id_satuan ?>"><?= $data_s->nama_satuan ?></option>
                                                      <?php } ?>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Kode Produk</label>
                                                  <input type="text" name="kode_produk" value="<?= 'HNV' . date('Ymdis') ?>" class="form-control" readonly>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="">Nama Produk</label>
                                                  <input type="text" name="nama_produk" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Harga Produk</label>
                                                  <input type="number" name="harga" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Stok Produk</label>
                                                  <input type="number" name="stok" value="0" class="form-control" readonly>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>




      </div>