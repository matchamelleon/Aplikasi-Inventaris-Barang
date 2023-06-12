<?php
class Produk_model extends CI_Model
{
    public function getSatuan()
    {
        $this->db->order_by('id_satuan', 'DESC');
        return $this->db->get('satuan')->result();
    }

    public function getKategori()
    {
        $this->db->order_by('id_kategori', 'DESC');
        return $this->db->get('kategori')->result();
    }

    public function inputproduk($data)
    {
        $this->db->insert('produk', $data);
    }

    public function getProduk()
    {
        $this->db->order_by('id_produk', 'DESC');
        $this->db->join('satuan', 'satuan.id_satuan=produk.id_satuan');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        return $this->db->get('produk')->result();
    }

    public function hapusProduk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    public function editProduk($data, $id)
    {
        $this->db->where('id_produk', $id);
        $this->db->set($data);
        $this->db->update('produk');
    }
}
