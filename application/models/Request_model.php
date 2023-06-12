<?php
class Request_model extends CI_Model
{
    public function getProduk()
    {
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get('produk')->result();
    }

    public function getPemasok()
    {
        $this->db->order_by('id_pemasok', 'DESC');
        $this->db->where('is_active_pemasok', '1');
        $this->db->join('produk', 'produk.id_produk=pemasok.id_produk');
        return $this->db->get('pemasok')->result();
    }

    public function inputdata($data)
    {
        $this->db->insert('request_produk', $data);
    }

    public function getRequest()
    {
        $this->db->order_by('request_produk.id_request_produk', 'DESC');
        $this->db->join('pemasok', 'pemasok.id_pemasok=request_produk.id_pemasok');
        $this->db->join('produk', 'produk.id_produk=request_produk.id_produk');
        return $this->db->get('request_produk')->result();
    }

    public function editdata($data, $id)
    {
        $this->db->where('id_request_produk', $id);
        $this->db->set($data);
        $this->db->update('request_produk');
    }

    public function hapusdata($id)
    {
        $this->db->where('id_request_produk', $id);
        $this->db->delete('request_produk');
    }

    public function updateStatus($data, $id)
    {
        $this->db->where('id_request_produk', $id);
        $this->db->set($data);
        $this->db->update('request_produk');
    }
}
