<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-dark"><b>Welcome, <?= $this->session->userdata('username') ?></b></h5>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('role_id') == 1) { ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data User</h4>
                            </div>
                            <div class="card-body">
                                <?= $user ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kategori</h4>
                            </div>
                            <div class="card-body">
                                <?= $kategori ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Request</h4>
                            </div>
                            <div class="card-body">
                                <?= $request ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Supplier</h4>
                            </div>
                            <div class="card-body">
                                <?= $pemasok ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-square"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Satuan</h4>
                            </div>
                            <div class="card-body">
                                <?= $satuan ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-th"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Produk</h4>
                            </div>
                            <div class="card-body">
                                <?= $produk ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Produk Masuk</h4>
                            </div>
                            <div class="card-body">
                                <?= $masuk ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Produk Keluar</h4>
                            </div>
                            <div class="card-body">
                                <?= $keluar ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body rounded-0">
                            <h6><b>Data Stok Produk Menipis</b></h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="cek-stok" class="table table-bordered text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
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
                                                foreach ($cekstok as $data) { ?>
                                                    <tr>
                                                        <td><?= $n; ?></td>
                                                        <td><?= $data->nama_kategori ?></td>
                                                        <td><?= $data->nama_satuan ?></td>
                                                        <td><?= $data->kode_produk ?></td>
                                                        <td><?= $data->nama_produk ?></td>
                                                        <td>Rp. <?= number_format($data->harga, 0, ".", ".") ?></td>
                                                        <td><span class="badge badge-danger"><?= $data->stok ?></span></td>
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
            </div>


        <?php } else if ($this->session->userdata('role_id') == 3) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Request</h4>
                            </div>
                            <div class="card-body">
                                <?= $request ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Supplier</h4>
                            </div>
                            <div class="card-body">
                                <?= $pemasok ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body rounded-0">
                            <h6><b>Data Request Masuk</b></h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="request-masuk" class="table table-bordered text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $n = 1;
                                                foreach ($datarequest as $data) { ?>
                                                    <tr>
                                                        <td><?= $n; ?></td>
                                                        <td><?= $data->nama_produk ?></td>
                                                        <td><?= $data->nama_pemasok ?></td>
                                                        <td><?= $data->jumlah ?></td>
                                                        <td><?= $data->tanggal_kirim ?></td>
                                                        <td>
                                                            <?php
                                                            if ($data->status == 0) {
                                                                echo '<span class="badge badge-danger">Menunggu Dikonfirmasi</span>';
                                                            } else if ($data->status == 1) {
                                                                echo '<span class="badge badge-danger">Stock Kosong</span>';
                                                            } else if ($data->status == 2) {
                                                                echo '<span class="badge badge-warning">Dikonfirmasi</span>';
                                                            } else if ($data->status == 3) {
                                                                echo '<span class="badge badge-primary">Menunggu Dikirim</span>';
                                                            } else if ($data->status == 4) {
                                                                echo '<span class="badge badge-info">Dikirim</span>';
                                                            } else if ($data->status == 5) {
                                                                echo '<span class="badge badge-success">Diterima</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger">Not Found !</span>';
                                                            } ?>
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
            </div>
        <?php } else if ($this->session->userdata('role_id') == 4) { ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-square"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Satuan</h4>
                            </div>
                            <div class="card-body">
                                <?= $satuan ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kategori</h4>
                            </div>
                            <div class="card-body">
                                <?= $kategori ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-th"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Produk</h4>
                            </div>
                            <div class="card-body">
                                <?= $produk ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Produk Masuk</h4>
                            </div>
                            <div class="card-body">
                                <?= $masuk ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Produk Keluar</h4>
                            </div>
                            <div class="card-body">
                                <?= $keluar ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body rounded-0">
                            <h6><b>Data Stok Produk Menipis</b></h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="cek-stok" class="table table-bordered text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
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
                                                foreach ($cekstok as $data) { ?>
                                                    <tr>
                                                        <td><?= $n; ?></td>
                                                        <td><?= $data->nama_kategori ?></td>
                                                        <td><?= $data->nama_satuan ?></td>
                                                        <td><?= $data->kode_produk ?></td>
                                                        <td><?= $data->nama_produk ?></td>
                                                        <td>Rp. <?= number_format($data->harga, 0, ".", ".") ?></td>
                                                        <td><span class="badge badge-danger"><?= $data->stok ?></span></td>
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
            </div>
        <?php } else { ?>
            <?php
            $this->session->set_falashdata('message', '<div class="akert alert-info" role="alert">Maaf, anda tidak memiliki akses. Silahkan Login!</div>');
            redirect('Login', 'refresh');
            ?>
        <?php } ?>

    </section>
</div>