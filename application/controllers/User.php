<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('User_model');
    }

    public function index()
    {

        $data = array(
            'title'     => 'Data Users',
            'data_user' => $this->User_model->getUser()
        );

        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('pages/users/user.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambahUser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required');
        $this->form_validation->set_rules('role_id', 'Jabatan', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $no = $this->input->post('no_hp');
            $profile = $_FILES['profile']['name'];
            $password = $this->input->post('password');
            $alamat = $this->input->post('alamat');
            $role = $this->input->post('role_id');
            $is_a = $this->input->post('is_active');

            $date = date('Y-m-d');
            $d2 = trim($date);
            //acak nama gambar
            $extensi1 = explode('.', $profile);
            //mengubah huruf menjadi kecil semua=
            $extensi = strtolower(end($extensi1));
            //script acak angka
            $acak_angka =  rand(1, 999);
            //script acak nama gmbar
            $nama_gambar = uniqid($acak_angka);
            //nama gamabr baru
            $nama_baru = 'ProfilePegawai' . $nama_gambar . $d2 . '.' .  $extensi;

            if ($profile == null) {
                $data = array(
                    'username'      => $username,
                    'nama'          => $nama,
                    'no_hp'         => $no,
                    'profile'       => 'default.png',
                    'password'      => password_hash($password, PASSWORD_DEFAULT),
                    'alamat'        => $alamat,
                    'role_id'       => $role,
                    'is_active'     => $is_a,
                    'tgl_input'     => date('Y-m-d H:i:s')
                );

                $this->User_model->inputuser($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
                redirect('data-user', 'refresh');
            } else {
                $data = array(
                    'username'      => $username,
                    'nama'          => $nama,
                    'no_hp'         => $no,
                    'profile'       => $nama_baru,
                    'password'      => password_hash($password, PASSWORD_DEFAULT),
                    'alamat'        => $alamat,
                    'role_id'       => $role,
                    'is_active'     => $is_a,
                    'tgl_input'     => date('Y-m-d H:i:s')
                );
                $config['upload_path'] = './assets/profile/'; //folder penyimpanana gambar
                $config['file_name'] = $nama_baru;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF|SVG|JFIF|jfif';
                $config['max_size'] = '3024';
                $config['remove_space'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('profile')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect(base_url('data-user'), 'refresh');
                } else {
                    $this->upload->data();
                    $this->User_model->inputuser($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
                    redirect('data-user', 'refresh');
                }
            }
        }
    }

    public function editprofile($id)
    {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $no = $this->input->post('no_hp');
        $profile = $_FILES['profile']['name'];
        $pL = $this->input->post('profileLama');
        $alamat = $this->input->post('alamat');
        $role = $this->input->post('role_id');
        $is_a = $this->input->post('is_active');

        $date = date('Y-m-d');
        $d2 = trim($date);
        //acak nama gambar
        $extensi1 = explode('.', $profile);
        //mengubah huruf menjadi kecil semua=
        $extensi = strtolower(end($extensi1));
        //script acak angka
        $acak_angka =  rand(1, 999);
        //script acak nama gmbar
        $nama_gambar = uniqid($acak_angka);
        //nama gamabr baru
        $nama_baru = 'Profile' . $nama_gambar . $d2 . '.' .  $extensi;

        if ($profile == null) {
            $data = array(
                'username'      => $username,
                'nama'          => $nama,
                'no_hp'         => $no,
                'profile'       => $pL,
                'alamat'        => $alamat,
                'role_id'       => $role,
                'is_active'     => $is_a,
                'tgl_input'     => date('Y-m-d H:i:s')
            );

            $this->User_model->updateuser($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di simpan !</div>');
            redirect('data-user', 'refresh');
        } else {
            $data = array(
                'username'      => $username,
                'nama'          => $nama,
                'no_hp'         => $no,
                'profile'       => $nama_baru,
                'alamat'        => $alamat,
                'role_id'       => $role,
                'is_active'     => $is_a,
                'tgl_input'     => date('Y-m-d H:i:s')
            );
            $config['upload_path'] = './assets/profile/'; //folder penyimpanana gambar
            $config['file_name'] = $nama_baru;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF|SVG|JFIF|jfif';
            $config['max_size'] = '3024';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('profile')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect(base_url('data-user'), 'refresh');
            } else {
                $this->upload->data();
                $this->User_model->updateuser($data, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
                redirect('data-user', 'refresh');
            }
        }
    }

    public function hapus($id)
    {
        $this->User_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di hapus !</div>');
        redirect('data-user', 'refresh');
    }

    public function password($id)
    {
        $pass = $this->input->post('password');

        $data = array(
            'password'  => password_hash($pass, PASSWORD_DEFAULT)
        );
        $this->User_model->pass($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di edit !</div>');
        redirect('data-user', 'refresh');
    }

    public function passworduser($id)
    {
        $pass = $this->input->post('password');

        $data = array(
            'password'  => password_hash($pass, PASSWORD_DEFAULT)
        );
        $this->User_model->passuser($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di edit !</div>');
        redirect('profiles-user', 'refresh');
    }

    public function editfoto($id)
    {
        $profile = $_FILES['profile']['name'];

        $date = date('Y-m-d');
        $d2 = trim($date);
        //acak nama gambar
        $extensi1 = explode('.', $profile);
        //mengubah huruf menjadi kecil semua=
        $extensi = strtolower(end($extensi1));
        //script acak angka
        $acak_angka =  rand(1, 999);
        //script acak nama gmbar
        $nama_gambar = uniqid($acak_angka);
        //nama gamabr baru
        $nama_baru = 'Profile' . $nama_gambar . $d2 . '.' .  $extensi;

        $data = array(
            'profile'   => $nama_baru
        );

        $config['upload_path'] = './assets/profile/'; //folder penyimpanana gambar
        $config['file_name'] = $nama_baru;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPG|JPEG|GIF|SVG|JFIF|jfif';
        $config['max_size'] = '3024';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('profile')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect(base_url('profiles-user'), 'refresh');
        } else {
            $this->upload->data();
            $this->User_model->profileupdate($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di edit !</div>');
            redirect('profiles-user', 'refresh');
        }
    }
}
