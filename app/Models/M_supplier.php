<?php

namespace App\Models;

use CodeIgniter\Model;

class M_supplier extends Model
{   
    function getData()
    {
        return $this->db->table('tbl_supplier_211149')->Get()->getResultArray();
    }

    public function cekData($nama_supplier)
    {
        return $this->db->table('tbl_supplier_211149')
            ->where('211149_namasupplier', $nama_supplier)
            ->get()
            ->getRowArray();
    }

    function totalSupplier() {
        return $this->db->table('tbl_supplier_211149')->countAllResults();
    }

    function getEdit($id_supplier)
    {
        return $this->db->table('tbl_supplier_211149')->where('211149_idsupplier', $id_supplier)->Get()->getResultArray();
    }

    function insertData($nama_supplier, $no_telp){
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "INSERT INTO tbl_supplier_211149(211149_namasupplier, 211149_notelp) VALUES('$nama_supplier', '$no_telp')";

        $query = $this->db->query($sql);
        return $query;
    }

    function updateData($nama_supplier, $no_telp, $id_supplier){
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "UPDATE tbl_supplier_211149 SET 211149_namasupplier = '$nama_supplier', 211149_notelp = '$no_telp' WHERE 211149_idsupplier=$id_supplier";

        $query = $this->db->query($sql);
        return $query;
    }

    function deleteData($id_supplier)
    {
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "DELETE FROM tbl_supplier_211149 WHERE 211149_idsupplier = '$id_supplier'";

        $query = $this->db->query($sql);
        return $query;
    }
}
