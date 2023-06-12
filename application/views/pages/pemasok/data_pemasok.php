      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Data Supplier</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="<?= base_url('supplier') ?>">Supplier</a></div>
                      <div class="breadcrumb-item">Data</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Supplier</h2>
              </div>
          </section>



          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <di class="card-header">
                          Data Supplier
                      </di>
                      <div class="card-body">
                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                              <!-- jika role id user yang login == 4 atau gudang maka tampilkan button tambah request -->
                              <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#tambahpemasok"><i class="fas fa-plus-circel"></i>Tambah Data</button>
                          <?php } ?>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <small class="text-danger">
                              <?= form_error('id_user'); ?>
                              <?= form_error('id_produk'); ?>
                              <?= form_error('nama_pemasok'); ?>
                              <?= form_error('alamat_pemasok'); ?>
                              <?= form_error('no_hp_pemasok'); ?>
                              <?= form_error('is_active'); ?>
                          </small>
                          <div class="table-responsive">
                              <table id="data-pemasok" class="table table-bordered text-center" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Aksi</th>
                                          <th>Nama</th>
                                          <th>Produk</th>
                                          <th>Nama Supplier</th>
                                          <th>Alamat</th>
                                          <th>No Hp</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($pemasok as $dataP) { ?>
                                          <tr>
                                              <td><?= $n; ?></td>
                                              <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $dataP->id_pemasok ?>"><i class="fas fa-trash-alt"></i></button>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $dataP->id_pemasok ?>"><i class="fas fa-edit"></i></button>
                                                  </div>
                                              </td>




                                              <!-- Modal Hapus -->
                                              <div class="modal fade" id="hapus<?= $dataP->id_pemasok ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="alert alert-warning text-center" role="alert">

                                                                  <p><b>Apakah anda yakin ingin menghapus data ini ?</b></p>
                                                                  <p class="text-dark"><b><?= $dataP->nama ?></b></p>

                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                              <a href="<?= base_url('hapus-supplier/') . $dataP->id_pemasok ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus Data</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>





                                              <!-- Modal -->
                                              <div class="modal fade" id="edit<?= $dataP->id_pemasok ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-success">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Supplier</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="row">
                                                                  <div class="col-lg-12">
                                                                      <form action="<?= base_url('edit-supplier/') . $dataP->id_pemasok ?>" method="post" enctype="multipart/form-data">
                                                                          <div class="row">
                                                                              <div class="col-lg-6">
                                                                                  <div class="form-group">
                                                                                      <label for="up">Pilih User Supplier</label>
                                                                                      <select name="id_user" id="up" class="form-control">
                                                                                          <option value="" selected disabled>-- PILIH SUPPLIER --</option>
                                                                                          <?php foreach ($user as $us) { ?>
                                                                                              <option value="<?= $us->id_user ?>" <?= $us->id_user == $dataP->id_user ? 'selected' : '' ?>> <?= $us->nama ?></option>
                                                                                          <?php } ?>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="sd">Pilih Produk</label>
                                                                                      <select name="id_produk" id="sd" class="form-control">
                                                                                          <option value="" selected disabled>-- PILIH PRODUK --</option>
                                                                                          <?php foreach ($produk as $pr) { ?>
                                                                                              <option value="<?= $pr->id_produk ?>" <?= $pr->id_produk == $dataP->id_produk ? 'selected' : '' ?>> <?= $pr->nama_produk ?> | <?= $pr->kode_produk ?></option>
                                                                                          <?php } ?>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Nama Supplier</label>
                                                                                      <input type="text" name="nama_pemasok" value="<?= $dataP->nama_pemasok ?>" id="" class="form-control">
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-lg-6">
                                                                                  <div class="form-group">
                                                                                      <label for="">Alamat Supplier</label>
                                                                                      <textarea name="alamat_pemasok" id="" cols="30" rows="10" class="form-control"><?= $dataP->alamat_pemasok ?></textarea>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Nomor Telepon</label>
                                                                                      <input type="number" name="no_hp_pemasok" value="<?= $dataP->no_hp_pemasok ?>" class="form-control">
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
                                              <td><?= $dataP->nama ?></td>
                                              <td><?= $dataP->nama_produk ?></td>
                                              <td><?= $dataP->nama_pemasok ?></td>
                                              <td><?= $dataP->alamat_pemasok ?></td>
                                              <td><?= $dataP->no_hp_pemasok ?></td>
                                              <td>
                                                  <span class="badge badge-<?= $dataP->is_active_pemasok == 1 ? 'success' : 'danger' ?>"><?= $dataP->is_active_pemasok == 1 ? 'Aktif' : 'Tidak Aktif' ?></span>
                                                  <br>
                                                  <div class="btn-group">
                                                      <form action="<?= base_url('active/') . $dataP->id_pemasok . '?aktif=' . 1 ?>" method="post" enctype="multipart/form-data">
                                                          <button class="btn btn-<?= $dataP->is_active_pemasok == 1 ? 'success' : 'light' ?> btn-sm mt-2">On</button>
                                                      </form>
                                                      <form action="<?= base_url('active/') . $dataP->id_pemasok . '?aktif=' . 0  ?>" method="post" enctype="multipart/form-data">
                                                          <button class="btn btn-<?= $dataP->is_active_pemasok == 0 ? 'danger' : 'light' ?> btn-sm mt-2">Off</button>
                                                      </form>
                                                  </div>
                                              </td>
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
          <!-- Modal -->
          <div class="modal fade" id="tambahpemasok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bg-success">
                          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Supplier</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-lg-12">
                                  <form action="<?= base_url('tambah-pemasok') ?>" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label for="up">Pilih User Supplier</label>
                                                  <select name="id_user" id="up" class="form-control">
                                                      <option value="" selected disabled>-- PILIH SUPPLIER --</option>
                                                      <?php foreach ($user as $us) { ?>
                                                          <option value="<?= $us->id_user ?>"> <?= $us->nama ?></option>
                                                      <?php } ?>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="sd">Pilih Produk</label>
                                                  <select name="id_produk" id="sd" class="form-control">
                                                      <option value="" selected disabled>-- PILIH PRODUK --</option>
                                                      <?php foreach ($produk as $pr) { ?>
                                                          <option value="<?= $pr->id_produk ?>"> <?= $pr->nama_produk ?> | <?= $pr->kode_produk ?></option>
                                                      <?php } ?>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Nama Supplier</label>
                                                  <input type="text" name="nama_pemasok" id="" class="form-control">
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label for="">Alamat Supplier</label>
                                                  <textarea name="alamat_pemasok" id="" cols="30" rows="10" class="form-control"></textarea>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Nomor Telepon</label>
                                                  <input type="number" name="no_hp_pemasok" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="a">Status Aktif</label>
                                                  <select name="is_active" id="a" class="form-control">
                                                      <option value="" selected disabled>-- PILIH STATUS AKTIF --</option>
                                                      <option value="1">Aktif</option>
                                                      <option value="0">Tidak Aktif</option>
                                                  </select>
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