<?php

namespace App\Models;

use CodeIgniter\Model;

class M_transaksi extends Model
{
    protected $table            = 'tbl_transaksi_211149';
    protected $primaryKey       = '211149_idtransaksi'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['211149_idtransaksi', '211149_iduser', '211149_idbarang', '211149_jumlah', '211149_tgltransaksi', '211149_total', '211149_dibayar', '211149_kembalian'];

    function totalTransaksi()
    {
        return $this->db->table('tbl_transaksi_211149')->countAllResults();
    }

    public function getBarangTerbanyak()
    {
        return $this->db->table('tbl_transaksi_211149')->select('211149_namabarang as nama_barang, SUM(211149_jumlah) as total_jumlah')->join('tbl_barang_211149', 'tbl_transaksi_211149.211149_idbarang = tbl_barang_211149.211149_idbarang', 'left')->groupBy('211149_namabarang')->orderBy('total_jumlah', 'DESC')->limit(1)->get()->getRow();
    }

    public function getPendapatan()
    {
        return $this->db->table('tbl_transaksi_211149')->select('SUM(211149_total) as totalpendapatan')->get()->getRow();
    }

    function getData()
    {
        $sql = "SELECT DISTINCT
            tbl_transaksi_211149.211149_idtransaksi,
            tbl_user_211149.211149_nama,
            tbl_barang_211149.211149_namabarang,
            tbl_supplier_211149.211149_namasupplier,
            tbl_transaksi_211149.211149_jumlah,
            tbl_transaksi_211149.211149_tgltransaksi,
            tbl_transaksi_211149.211149_total,
            tbl_transaksi_211149.211149_dibayar,
            tbl_barang_211149.211149_stok,
            tbl_transaksi_211149.211149_kembalian
        FROM
            tbl_transaksi_211149
        LEFT JOIN tbl_user_211149 ON tbl_transaksi_211149.211149_iduser = tbl_user_211149.211149_iduser
        LEFT JOIN tbl_barang_211149 ON tbl_transaksi_211149.211149_idbarang = tbl_barang_211149.211149_idbarang
        LEFT JOIN tbl_supplier_211149 ON tbl_barang_211149.211149_idsupplier = tbl_supplier_211149.211149_idsupplier";

        $query = $this->db->query($sql);

        // Mengembalikan hasil query dalam bentuk array
        return $query->getResultArray();
    }

    function getDataLaporan()
    {
        $sql = "SELECT SUM(tbl_transaksi_211149.211149_total) AS total_pendapatan FROM tbl_transaksi_211149;";

        $query = $this->db->query($sql);

        // Mengembalikan hasil query dalam bentuk array
        return $query->getResultArray();
    }

    function getBarang()
    {
        $sql = "SELECT DISTINCT
            tbl_barang_211149.211149_idbarang,
            tbl_barang_211149.211149_namabarang,
            tbl_supplier_211149.211149_namasupplier,
            tbl_barang_211149.211149_harga,
            tbl_barang_211149.211149_stok,
            tbl_barang_211149.211149_foto
        FROM
            tbl_barang_211149
        LEFT JOIN tbl_supplier_211149 ON tbl_barang_211149.211149_idsupplier = tbl_supplier_211149.211149_idsupplier";

        $query = $this->db->query($sql);

        // Mengembalikan hasil query dalam bentuk array
        return $query->getResultArray();
    }

    function bayar($id_user, $id_barang, $jumlah, $total, $dibayar, $kembalian)
    {
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "INSERT INTO tbl_transaksi_211149(211149_iduser, 211149_idbarang, 211149_jumlah, 211149_total, 211149_dibayar, 211149_kembalian) VALUES($id_user, $id_barang, $jumlah, $total, $dibayar, $kembalian)";

        $query = $this->db->query($sql);
        return $query;
    }

    function kurangiStok($id_barang, $jumlah)
    {
        $sql = "UPDATE tbl_barang_211149 SET 211149_stok = 211149_stok - $jumlah WHERE 211149_idbarang = $id_barang";
        $query = $this->db->query($sql);

        return $query;
    }

    function deleteData($id_transaksi)
    {
        $sql = "DELETE FROM tbl_transaksi_211149 WHERE 211149_idtransaksi = '$id_transaksi'";

        $query = $this->db->query($sql);
        return $query;
    }
}
