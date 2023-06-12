      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Data User</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="<?= base_url('data-user') ?>">User</a></div>
                      <div class="breadcrumb-item">Data</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data User</h2>
              </div>
          </section>
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Data User</h4>
                      </div>
                      <div class="card-body">
                          <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#tambahData"><i class="fas fa-plus-circle"></i> Tambah Data User</button>
                          <div class="flashdata" id="flashdata" onload="clearmy()">
                              <?= $this->session->flashdata('message'); ?>
                          </div>
                          <div class="table-responsive">
                              <table id="user" class="table table-bordered text-center overflow-auto" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Aksi</th>
                                          <th>Status</th>
                                          <th>Username</th>
                                          <th>Nama</th>
                                          <th>Nomor Hp</th>
                                          <th>Profil</th>
                                          <th>Alamat</th>
                                          <th>Role</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $n = 1;
                                        foreach ($data_user as $us) {
                                        ?>
                                          <tr>
                                              <td><?= $n ?></td>
                                              <td>
                                                  <div class="btn-group">
                                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $us->id_user ?>"><i class="fas fa-trash-alt"></i></button>
                                                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $us->id_user ?>"><i class="fas fa-edit"></i></button>
                                                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#key<?= $us->id_user ?>"><i class="fas fa-key"></i></button>
                                                  </div>


                                                  <!-- Modal -->
                                                  <div class="modal fade" id="hapus<?= $us->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header bg-danger">
                                                                  <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <div class="alert alert-warning text-center">
                                                                      <p><b>Apakah anda yakin akan menghapus data ini ?</b></p>
                                                                      <b><?= $us->nama ?></b>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                                                                  <a href="<?= base_url('hapus-user/') . $us->id_user ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus Data</a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>


                                              </td>


                                              <!-- Modal -->
                                              <div class="modal fade" id="key<?= $us->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-danger">
                                                              <h5 class="modal-title text-white" id="exampleModalLabel">Edit Password</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <form action="<?= base_url('password-edit/') . $us->id_user ?>" method="POST" enctype="multipart/form-data">
                                                                  <div class="form-group">
                                                                      <label for="">Password Baru</label>
                                                                      <input type="password" name="password" class="form-control" required>
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>



                                              <!-- Modal Edit -->
                                              <div class="modal fade" id="edit<?= $us->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header bg-warning text-white">
                                                              <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="row">
                                                                  <div class="col-lg-12">
                                                                      <form action="<?= base_url('edit-user/') . $us->id_user ?>" method="POST" enctype="multipart/form-data">
                                                                          <div class="row">
                                                                              <div class="col-lg-6">
                                                                                  <div class="form-group">
                                                                                      <label for="">Username</label>
                                                                                      <input type="text" name="username" value="<?= $us->username ?>" class="form-control">
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Nama Lengkap</label>
                                                                                      <input type="text" name="nama" value="<?= $us->nama ?>" class="form-control">
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Nomor Hp</label>
                                                                                      <input type="text" name="no_hp" value="<?= $us->no_hp ?>" class="form-control">
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Alamat</label>
                                                                                      <textarea name="alamat" id="" cols="30" rows="15" class="form-control"><?= $us->alamat ?></textarea>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-lg-6">
                                                                                  <div class="form-group">
                                                                                      <label for="">Foto Profil</label>
                                                                                      <br>
                                                                                      <img src="<?= base_url('./assets/profile/') . $us->profile ?>" alt="profiel-user" class="rounded-circle mb-2 mt-2" style="width:20%">
                                                                                      <input type="file" name="profile" class="form-control">
                                                                                      <input type="hidden" name="profileLama" value="<?= $us->profile ?>" class="form-control">
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Jabatan</label>
                                                                                      <select name="role_id" id="" class="form-control">
                                                                                          <option value="" disabled selected>-- PILIH JABATAN --</option>
                                                                                          <option value="1" <?= $us->role_id == '1' ? 'selected' : '' ?>>Owner</option>
                                                                                          <option value="3" <?= $us->role_id == '3' ? 'selected' : '' ?>>Supplier</option>
                                                                                          <option value="4" <?= $us->role_id == '4' ? 'selected' : '' ?>>Admin</option>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div class="form-group">
                                                                                      <label for="">Aktiv</label>
                                                                                      <br>
                                                                                      <input type="radio" name="is_active" value="1" <?= $us->is_active == '1' ? 'checked' : '' ?>>&nbsp;Aktif
                                                                                      <br>
                                                                                      <input type="radio" name="is_active" value="0" <?= $us->is_active == '0' ? 'checked' : '' ?>>&nbsp;Tidak Aktif
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




                                              <td><?= $us->is_active == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                              <td><?= $us->username ?></td>
                                              <td><?= $us->nama ?></td>
                                              <td><?= $us->no_hp ?></td>
                                              <td>
                                                  <img src="<?= base_url('./assets/profile/') . $us->profile ?>" alt="profiel-user" class="rounded-circle" style="width:30%">
                                              </td>
                                              <td><?= $us->alamat ?></td>
                                              <td>
                                                  <?= $us->role_id == '1' ? 'Owner' : '' ?>
                                                  <?= $us->role_id == '3' ? 'Supplier' : '' ?>
                                                  <?= $us->role_id == '4' ? 'Admin' : '' ?>
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



      </div>


      <!-- Modal Tambah -->
      <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header bg-success text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-12">
                              <form action="<?= base_url('tambah-user') ?>" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="">Username</label>
                                              <input type="text" name="username" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label for="">Nama Lengkap</label>
                                              <input type="text" name="nama" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label for="">Nomor Hp</label>
                                              <input type="text" name="no_hp" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label for="">Password</label>
                                              <input type="password" name="password" class="form-control">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="">Alamat</label>
                                              <textarea name="alamat" id="" cols="30" rows="15" class="form-control"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Foto Profile</label>
                                              <input type="file" name="profile" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label for="">Jabatan</label>
                                              <select name="role_id" id="" class="form-control">
                                                  <option value="" disabled selected>-- PILIH JABATAN --</option>
                                                  <option value="1">Owner</option>
                                                  <option value="3">Supplier</option>
                                                  <option value="4">Admin</option>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="">Aktive</label>
                                              <br>
                                              <input type="radio" name="is_active" value="1">&nbsp;Aktif
                                              <br>
                                              <input type="radio" name="is_active" value="0">&nbsp;Tidak Aktif
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