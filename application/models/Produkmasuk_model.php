<?php
class Produkmasuk_model extends CI_Model
{
    public function getProduk()
    {
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get('produk')->result();
    }

    public function getProdukMasuk()
    {
        $this->db->order_by('id_produk_masuk', 'DESC');
        $this->db->join('produk', 'produk.id_produk=produk_masuk.id_produk');
        return $this->db->get('produk_masuk')->result();
    }

    public function inputPM($data)
    {
        $this->db->insert('produk_masuk', $data);
    }

    public function hapusprodukmasuk($id)
    {
        $this->db->where('id_produk_masuk', $id);
        $this->db->delete('produk_masuk');
    }
}
