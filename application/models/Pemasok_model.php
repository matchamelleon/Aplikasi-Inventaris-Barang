<?php
class Pemasok_model extends CI_Model
{

    public function getUserPemasok()
    {
        // $query = "SELECT * FROM users WHERE id_user NOT IN(SELECT id_user FROM pemasok) AND role_id = 3";
        // return $this->db->query($query)->result();
        $this->db->order_by('id_user', 'DESC');
        $this->db->where('role_id', 3);
        return $this->db->get('users')->result();
    }

    public function getProduk()
    {
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get('produk')->result();
    }

    public function inputdata($data)
    {
        $this->db->insert('pemasok', $data);
    }

    public function getPemasok()
    {
        $this->db->order_by('id_pemasok', 'DESC');
        $this->db->join('produk', 'produk.id_produk=pemasok.id_produk');
        $this->db->join('users', 'users.id_user=pemasok.id_user');
        return $this->db->get('pemasok')->result();
    }

    public function editdata($data, $id)
    {
        $this->db->where('id_pemasok', $id);
        $this->db->set($data);
        $this->db->update('pemasok');
    }

    public function hapusdata($id)
    {
        $this->db->where('id_pemasok', $id);
        $this->db->delete('pemasok');
    }

    public function active($data, $id)
    {
        $this->db->where('id_pemasok', $id);
        $this->db->set($data);
        $this->db->update('pemasok');
    }
}
