<?php
function cek_login()
{
    $CI = &get_instance();
    if ($CI->session->userdata('role_id') == null || $CI->session->userdata('id_user') == null) {
        $CI->session->set_flashdata('message', '<div class="alert alert-info text-center" role="alert">Anda tidak memiliki akses, silahkan untuk melakukan Login !</div>');

        redirect('Login', 'refresh');
    }
}
