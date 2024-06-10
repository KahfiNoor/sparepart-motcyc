<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{   
    function  getData()
    {
        return $this->db->table('tbl_user_211149')->Get()->getResultArray();
    }
    
    function totalUser() {
        return $this->db->table('tbl_user_211149')->where('211149_level', 'Karyawan')->countAllResults();
    }

    function getEdit($id_user)
    {
        return $this->db->table('tbl_user_211149')->where('211149_iduser', $id_user)->Get()->getResultArray();
    }

    public function signin($username, $password)
    {
        return $this->db->table('tbl_user_211149')
            ->where([
                '211149_username' => $username,
                '211149_password' => $password,
            ])
            ->get()
            ->getRowArray();
    }

    public function cekEmail($email)
    {
        return $this->db->table('tbl_user_211149')
            ->where([
                '211149_email'    => $email
            ])
            ->get()
            ->getRowArray();
    }

    public function cekUsername($username)
    {
        return $this->db->table('tbl_user_211149')
            ->where([
                '211149_username'    => $username
            ])
            ->get()
            ->getRowArray();
    }

    function insertData($nama_user, $no_telp, $email, $username, $password){
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "INSERT INTO tbl_user_211149(211149_nama, 211149_notelp, 211149_email, 211149_username, 211149_password, 211149_level) VALUES('$nama_user', '$no_telp', '$email', '$username', '$password', 'Karyawan')";

        $query = $this->db->query($sql);
        return $query;
    }

    function regisModel($nama_user, $no_telp, $email, $username, $password){
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "INSERT INTO tbl_user_211149(211149_nama, 211149_notelp, 211149_email, 211149_username, 211149_password, 211149_level) VALUES('$nama_user', '$no_telp', '$email', '$username', '$password', 'Owner')";

        $query = $this->db->query($sql);
        return $query;
    }

    function updateData($nama_user, $no_telp, $email, $username, $password, $level, $id_user){
        // $sql = $this->db->table('tbl_user_211149')->insert($nama_user, $no_telp, $username, $password, $level);
        $sql = "UPDATE tbl_user_211149 SET 211149_nama = '$nama_user', 211149_notelp = '$no_telp', 211149_email = '$email', 211149_username = '$username', 211149_password = '$password', 211149_level = '$level' WHERE 211149_iduser=$id_user";

        $query = $this->db->query($sql);
        return $query;
    }

    function deleteData($id_user)
    {
        $sql = "DELETE FROM tbl_user_211149 WHERE 211149_iduser = '$id_user'";

        $query = $this->db->query($sql);
        return $query;
    }
}
