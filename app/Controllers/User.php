<?php

namespace App\Controllers;

use App\Models\M_user;

class User extends BaseController
{
    // public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    // {
    //     parent::initController($request, $response, $logger);
    // }

    public function __construct()
    {
        $this->M_user = new M_user();
    }

    function index()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/user/index',
            'menu'              => 'user',
            'title'             => 'Data User',
            'user'              => 'Administrator',
            'datauser'          => $this->M_user->getData(),
        ];

        // $data ['page'] = 'admin/index';
        // $data ['menu'] = 'home';

        return view('templates/index', $data);
    }

    function d_tambah()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/user/v_tambah',
            'menu'              => 'user',
            'title'             => 'Tambah Data User',
            'user'              => 'Administrator',
        ];

        return view('templates/index', $data);
    }

    function tambah()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $nama_user = $this->request->getVar('nama_user');
        $no_telp = $this->request->getVar('no_telp');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email');

        // Validasi keunikan username dan password
        $cekEmail = $this->M_user->cekEmail($email);
        $cekUsername = $this->M_user->cekUsername($username);

        // Validasi panjang username dan password
        if (strlen($username) < 8 && strlen($password) < 8) {
            session()->setFlashdata('pesan', 'Username dan Password harus memiliki panjang 8 karakter.');
            session()->setFlashdata('username', 'Username harus memiliki panjang 8 karakter.');
            session()->setFlashdata('password', 'Password harus memiliki panjang 8 karakter.');
            return redirect()->to('user/d_tambah/');
        } elseif (strlen($username) < 8) {
            session()->setFlashdata('pesan', 'Username harus memiliki panjang 8 karakter.');
            session()->setFlashdata('username', 'Username harus memiliki panjang 8 karakter.');
            return redirect()->to('user/d_tambah/');
        } elseif (strlen($password) < 8) {
            session()->setFlashdata('pesan', 'Password harus memiliki panjang 8 karakter.');
            session()->setFlashdata('password', 'Password harus memiliki panjang 8 karakter.');
            return redirect()->to('user/d_tambah/');
        } elseif ($cekEmail) {
            session()->setFlashdata('email_already', 'email sudah ada');
            return redirect()->to('user/d_tambah/');
        } elseif ($cekUsername) {
            session()->setFlashdata('username_already', 'username sudah ada');
            return redirect()->to('user/d_tambah/');
        } else {
            $this->M_user->insertData($nama_user, $no_telp, $email, $username, $password);
            session()->setFlashdata('pesan', 'Data User berhasil ditambah!');
        }

        return redirect()->to('user/');
    }

    function d_edit($id_user)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('supplier/');
        }

        $data = [
            'page'              => 'admin/user/v_edit',
            'menu'              => 'user',
            'title'             => 'Edit Data User',
            'datauser'        => $this->M_user->getEdit($id_user)
        ];

        return view('templates/index', $data);
    }

    function edit()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('user/');
        }

        $nama_user = $this->request->getVar('nama_user');
        $no_telp = $this->request->getVar('no_telp');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $level = $this->request->getVar('level');
        $id_user = $this->request->getVar('id_user');

        $this->M_user->updateData($nama_user, $no_telp, $email, $username, $password, $level, $id_user);
        session()->setFlashdata('pesan', 'Data User berhasil diubah!');

        return redirect()->to('user/');
    }

    function delete($id_user)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('user/');
        }

        $this->M_user->deleteData($id_user);
        session()->setFlashdata('pesan', 'Data User berhasil dihapus!');

        return redirect()->to('user/');
    }
}
