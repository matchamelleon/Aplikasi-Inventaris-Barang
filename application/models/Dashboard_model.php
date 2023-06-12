<?php

class Dashboard_model extends CI_Model
{
    public function satuan()
    {
        return $this->db->get('satuan')->num_rows();
    }

    public function kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }


    public function produk()
    {
        return $this->db->get('produk')->num_rows();
    }

    public function  masuk()
    {
        return $this->db->get('produk_masuk')->num_rows();
    }

    public function  keluar()
    {
        return $this->db->get('produk_keluar')->num_rows();
    }

    public function  user()
    {
        return $this->db->get('users')->num_rows();
    }

    public function  pemasok()
    {
        return $this->db->get('pemasok')->num_rows();
    }

    public function  request()
    {
        return $this->db->get('request_produk')->num_rows();
    }


    public function stoktipis()
    {
        $this->db->order_by('produk.id_produk', 'DESC');
        $this->db->where('stok <=', '3');
        $this->db->join('satuan', 'satuan.id_satuan=produk.id_satuan');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        return $this->db->get('produk')->result();
    }

    public function data_request()
    {
        $this->db->order_by('id_request_produk', 'DESC');
        $this->db->where('status !=', 6);
        $this->db->join('pemasok', 'pemasok.id_pemasok=request_produk.id_pemasok');
        $this->db->join('produk', 'produk.id_produk=request_produk.id_produk');
        return $this->db->get('request_produk')->result();
    }
}
