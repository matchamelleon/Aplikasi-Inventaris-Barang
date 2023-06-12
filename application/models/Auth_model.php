<?php
class Auth_model extends CI_Model
{
    public function cekdataLogin($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }
}
