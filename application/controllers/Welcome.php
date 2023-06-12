<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Dashboard',
			'satuan'		=> $this->Dashboard_model->satuan(),
			'kategori'		=> $this->Dashboard_model->kategori(),
			'produk'		=> $this->Dashboard_model->produk(),
			'masuk'			=> $this->Dashboard_model->masuk(),
			'keluar'		=> $this->Dashboard_model->keluar(),
			'user'			=> $this->Dashboard_model->user(),
			'pemasok'		=> $this->Dashboard_model->pemasok(),
			'request'		=> $this->Dashboard_model->request(),
			'cekstok'		=> $this->Dashboard_model->stoktipis(),
			'datarequest'		=> $this->Dashboard_model->data_request()
		);

		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('pages/dashboard.php', $data);
		$this->load->view('template/footer.php');
	}
}
