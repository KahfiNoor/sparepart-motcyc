<?php

namespace App\Models;

use CodeIgniter\Model;

class M_barang extends Model
{
    protected $table            = 'tbl_barang_211149';
    protected $primaryKey       = '211149_idbarang'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['211149_namabarang', '211149_jenisbarang', '211149_harga', '211149_stok', '211149_idsupplier','211149_foto'];

    function getData()
    {
        $sql = "SELECT DISTINCT
            tbl_barang_211149.211149_idbarang,
            tbl_barang_211149.211149_namabarang,
            tbl_barang_211149.211149_jenisbarang,
            tbl_supplier_211149.211149_namasupplier,
            tbl_supplier_211149.211149_notelp,
            tbl_barang_211149.211149_harga,
            tbl_barang_211149.211149_stok,
            tbl_barang_211149.211149_foto,
            tbl_barang_211149.211149_ket
        FROM
            tbl_barang_211149
        LEFT JOIN tbl_supplier_211149 ON tbl_barang_211149.211149_idsupplier = tbl_supplier_211149.211149_idsupplier";

        $query = $this->db->query($sql);

        // Mengembalikan hasil query dalam bentuk array
        return $query->getResultArray();
    }

    public function cekData($nama_barang)
    {
        return $this->db->table('tbl_barang_211149')
            ->where('211149_namabarang', $nama_barang)
            ->get()
            ->getRowArray();
    }

    function totalBarang() {
        return $this->db->table('tbl_barang_211149')->countAllResults();
    }

    function getSupplier()
    {
        return $this->db->table('tbl_supplier_211149')->Get()->getResultArray();
    }

    public function getEdit($id_barang = false)
    {
        if ($id_barang == false) {
            return $this->findAll();
        }
        return $this->where(['211149_idbarang' => $id_barang])->first();
    }

    public function getDetail($id_barang)
    {
        $sql = "SELECT DISTINCT
                tbl_barang_211149.211149_idbarang,
                tbl_barang_211149.211149_namabarang,
                tbl_barang_211149.211149_jenisbarang,
                tbl_supplier_211149.211149_namasupplier,
                tbl_supplier_211149.211149_notelp,
                tbl_barang_211149.211149_harga,
                tbl_barang_211149.211149_stok,
                tbl_barang_211149.211149_foto,
                tbl_barang_211149.211149_ket
            FROM
                tbl_barang_211149
            LEFT JOIN tbl_supplier_211149 ON tbl_barang_211149.211149_idsupplier = tbl_supplier_211149.211149_idsupplier
            WHERE 211149_idbarang = $id_barang";

        $query = $this->db->query($sql);

        // Mengembalikan hasil query dalam bentuk array
        return $query->getResultArray();
    }

    function insertData($nama_barang, $jenis_barang, $harga, $stok, $id_supplier, $namaFoto, $ket)
    {
        // Lakukan pengolahan nilai $ket dengan nl2br()
        // $ket = nl2br($ket);
        $sql = "INSERT INTO tbl_barang_211149(211149_namabarang, 211149_jenisbarang, 211149_harga, 211149_stok, 211149_idsupplier, 211149_foto, 211149_ket) VALUES('$nama_barang', '$jenis_barang', '$harga', '$stok', '$id_supplier', '$namaFoto', '$ket')";

        $query = $this->db->query($sql);
        return $query;
    }


    function editData($id_barang, $nama_barang, $jenis_barang, $harga, $stok, $id_supplier, $namaFoto, $ket)
    {
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "UPDATE tbl_barang_211149 SET 211149_namabarang = '$nama_barang', 211149_jenisbarang = '$jenis_barang', 211149_harga = '$harga', 211149_stok = '$stok', 211149_idsupplier = '$id_supplier', 211149_foto = '$namaFoto', 211149_ket = '$ket' WHERE 211149_idbarang = '$id_barang'";

        $query = $this->db->query($sql);
        return $query;
    }
    
    function stokData($id_barang, $stok)
    {
        $sql = "UPDATE tbl_barang_211149 SET 211149_stok = '$stok' WHERE 211149_idbarang = '$id_barang'";

        $query = $this->db->query($sql);
        return $query;
    }

    function deleteData($id_barang)
    {
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "DELETE FROM tbl_barang_211149 WHERE 211149_idbarang = '$id_barang'";

        $query = $this->db->query($sql);
        return $query;
    }
}
