<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',
        );

        $this->load->view('template/header.php', $data);
        $this->load->view('auth/login.php', $data);
    }

    public function proseslogin()
    {
        $this->form_validation->set_rules(
            'username',
            'username',
            'required',
            [
                'required'  => 'Username harus di isi !'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            [
                'required'  => 'Password tidak boleh kososng !'
            ]
        );

        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $cekData = $this->Auth_model->cekdataLogin($username);

        if (!empty($cekData->username) && $cekData->username) {
            if (password_verify($password, $cekData->password)) {
                if ($cekData->is_active == 1) {
                    $session = array(
                        'id_user'   => $cekData->id_user,
                        'username'  => $cekData->username,
                        'nama'      => $cekData->nama,
                        'profile'   => $cekData->profile,
                        'role_id'   => $cekData->role_id,
                        'is_login'  => 'login'
                    );
                    $this->session->set_userdata($session);
                    redirect('dashboard', 'refresh');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-info text-center" role="alert">Akun anda saat ini tidak aktif !</div>');
                    redirect('Login', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Passsword anda salah ! !</div>');
                redirect('Login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Username anda salah atau tidak terdaftar ! !</div>');
            redirect('Login', 'refresh');
        }
    }

    public function Logout()
    {
        session_unset();
        session_destroy();

        redirect(base_url('Login'), 'refresh');
    }
}
