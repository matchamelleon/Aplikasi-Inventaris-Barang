<?php
class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Request_model');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data = array(
            'title'     => 'Request Produk',
            'produk'    => $this->Request_model->getProduk(),
            'pemasok'   => $this->Request_model->getPemasok(),
            'request'   => $this->Request_model->getRequest()
        );
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/produk/request_produk.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_produk', 'Produk', 'required');
        $this->form_validation->set_rules('id_pemasok', 'Pemasok', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tanggal_kirim', 'Tanggal Kirim', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_produk = $this->input->post('id_produk');
            $id_pemasok = $this->input->post('id_pemasok');
            $jml = $this->input->post('jumlah');
            $tgl = $this->input->post('tanggal_kirim');
            $status = 1;

            $data = array(
                'id_produk'         => $id_produk,
                'id_pemasok'        => $id_pemasok,
                'jumlah'            => $jml,
                'tanggal_kirim'    => $tgl,
                'status'            => $status,
                'tgl_input'         => date("Y-m-d H:i:s")
            );
            $this->Request_model->inputdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
            redirect(base_url('request-produk'), 'refresh');
        }
    }

    public function edit($id)
    {
        $id_produk = $this->input->post('id_produk');
        $id_pemasok = $this->input->post('id_pemasok');
        $jml = $this->input->post('jumlah');
        $tgl = $this->input->post('tanggal_kirim');

        $data = array(
            'id_produk'         => $id_produk,
            'id_pemasok'        => $id_pemasok,
            'jumlah'            => $jml,
            'tanggal_kirim'     => $tgl,
            'tgl_update'        => date("Y-m-d H:i:s")
        );
        $this->Request_model->editdata($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
        redirect(base_url('request-produk'), 'refresh');
    }

    public function hapus($id)
    {
        $this->Request_model->hapusdata($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus !</div>');
        redirect(base_url('request-produk'), 'refresh');
    }

    public function updatestatus($id)
    {
        $status = $this->input->post('status');

        $data = array(
            'status'    => $status
        );
        $this->Request_model->updateStatus($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil di update !</div>');
        redirect(base_url('request-produk'), 'refresh');
    }
}
