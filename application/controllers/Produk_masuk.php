<?php
class Produk_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Produkmasuk_model');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data = array(
            'title'             => 'Produk Masuk',
            'produk'            => $this->Produkmasuk_model->getProduk(),
            'data_masuk'        => $this->Produkmasuk_model->getProdukMasuk()
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/produk/produk_masuk.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah()
    {
        $id_produk  = $this->input->post('id_produk');
        $jml        = $this->input->post('jumlah');
        $tgl        =  $this->input->post('tanggal');
        $bln        = $this->input->post('bulan');
        $thn        = $this->input->post('tahun');

        $data = array(
            'id_produk'     => $id_produk,
            'jumlah'        => $jml,
            'tanggal'       => $tgl,
            'bulan'         => $bln,
            'tahun'         => $thn,
            'tgl_input'     => date('Y-m-d H:i:s')
        );
        $this->Produkmasuk_model->inputPM($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
        redirect(base_url('produk-masuk'), 'refresh');
    }

    public function hapus($id)
    {
        $this->Produkmasuk_model->hapusprodukmasuk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus !</div>');
        redirect(base_url('produk-masuk'), 'refresh');
    }
}
