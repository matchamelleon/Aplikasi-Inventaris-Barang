<?php
class Pemasok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Pemasok_model');
        $this->load->library('form_validation');
    }


    public function index()
    {

        $data = array(
            'title'     => 'Data Pemasok',
            'user'      => $this->Pemasok_model->getUserPemasok(),
            'produk'    => $this->Pemasok_model->getproduk(),
            'pemasok'   => $this->Pemasok_model->getPemasok()
        );


        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/pemasok/data_pemasok.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_user', 'User', 'required');
        $this->form_validation->set_rules('id_produk', 'Produk', 'required');
        $this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
        $this->form_validation->set_rules('alamat_pemasok', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp_pemasok', 'Nomor Hp', 'required');
        $this->form_validation->set_rules('is_active', 'Status Aktif', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_u = $this->input->post('id_user');
            $id_produk = $this->input->post('id_produk');
            $nama = $this->input->post('nama_pemasok');
            $alamat = $this->input->post('alamat_pemasok');
            $no_hp = $this->input->post('no_hp_pemasok');
            $is_active = $this->input->post('is_active_pemasok');

            $data = array(
                'id_user'               => $id_u,
                'id_produk'             => $id_produk,
                'nama_pemasok'          => $nama,
                'alamat_pemasok'        => $alamat,
                'no_hp_pemasok'         => $no_hp,
                'is_active_pemasok'     => $is_active,
                'tgl_input'             => date("Y-m-d H:i:s")
            );
            $this->Pemasok_model->inputdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
            redirect(base_url('pemasok'), 'refresh');
        }
    }

    public function edit($id)
    {
        $id_u = $this->input->post('id_user');
        $id_produk = $this->input->post('id_produk');
        $nama = $this->input->post('nama_pemasok');
        $alamat = $this->input->post('alamat_pemasok');
        $no_hp = $this->input->post('no_hp_pemasok');

        $data = array(
            'id_user'               => $id_u,
            'id_produk'             => $id_produk,
            'nama_pemasok'          => $nama,
            'alamat_pemasok'        => $alamat,
            'no_hp_pemasok'         => $no_hp,
            'tgl_update'             => date("Y-m-d H:i:s")
        );
        $this->Pemasok_model->editdata($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
        redirect(base_url('pemasok'), 'refresh');
    }

    public function hapus($id)
    {
        $this->Pemasok_model->hapusdata($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus !</div>');
        redirect(base_url('pemasok'), 'refresh');
    }

    public function aktif($id)
    {
        $s = $this->input->get('aktif');

        $data = array(
            'is_active_pemasok'    => $s
        );
        $this->Pemasok_model->active($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
        redirect(base_url('pemasok'), 'refresh');
    }
}
