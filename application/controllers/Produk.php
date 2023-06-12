<?php
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Produk_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Data Produk',
            'satuan'    => $this->Produk_model->getSatuan(),
            'kategori'  => $this->Produk_model->getKategori(),
            'produk'    => $this->Produk_model->getProduk()
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/produk/data_produk.php', $data);
        $this->load->view('template/footer.php');
    }


    public function tambahproduk()
    {
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required|integer');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_k = $this->input->post('id_kategori');
            $id_s = $this->input->post('id_satuan');
            $kd = $this->input->post('kode_produk');
            $nama = $this->input->post('nama_produk');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');

            $data = array(
                'id_kategori'   => $id_k,
                'id_satuan'     => $id_s,
                'kode_produk'   => $kd,
                'nama_produk'   => $nama,
                'harga'         => $harga,
                'stok'          => $stok,
                'tgl_input'     => date('Y-m-d H:i:s')
            );
            $this->Produk_model->inputproduk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
            redirect(base_url('data-produk'), 'refresh');
        }
    }

    public function hapusproduk($id)
    {
        $this->Produk_model->hapusProduk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');
        redirect(base_url('data-produk'), 'refresh');
    }

    public function editproduk($id)
    {
        $id_k = $this->input->post('id_kategori');
        $id_s = $this->input->post('id_satuan');
        $kd = $this->input->post('kode_produk');
        $nama = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'id_kategori'   => $id_k,
            'id_satuan'     => $id_s,
            'kode_produk'   => $kd,
            'nama_produk'   => $nama,
            'harga'         => $harga,
            'stok'          => $stok,
            'tgl_update'     => date('Y-m-d H:i:s')
        );
        $this->Produk_model->editProduk($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
        redirect(base_url('data-produk'), 'refresh');
    }
}
