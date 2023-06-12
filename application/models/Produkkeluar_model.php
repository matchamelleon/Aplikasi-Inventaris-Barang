<?php
class Produkkeluar_model extends CI_Model
{
    public function getProduk()
    {
        $this->db->order_by('id_produk', 'DESC');
        $this->db->where('stok !=', 0);
        return $this->db->get('produk')->result();
    }

    public function getProdukKeluar()
    {
        $this->db->order_by('id_produk_keluar', 'DESC');
        $this->db->join('produk', 'produk.id_produk=produk_keluar.id_produk');
        return $this->db->get('produk_keluar')->result();
    }

    public function inputPK($data)
    {
        $this->db->insert('produk_keluar', $data);
    }

    public function hapusprodukkeluar($id)
    {
        $this->db->where('id_produk_keluar', $id);
        $this->db->delete('produk_keluar');
    }
}
