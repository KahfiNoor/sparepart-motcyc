<?php

namespace App\Controllers;

use App\Models\M_user;

class Auth extends BaseController
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

        // $data ['page'] = 'admin/index';
        // $data ['menu'] = 'home';

        if (session()->get('log') == true) {
            return redirect()->to('home/');
        }
        return view('auth');
    }

    function login()
    {
        $username = $this->request->getpost('username');
        $password = $this->request->getPost('password');

        // Validasi keunikan username dan password
        $cek_login = $this->M_user->signin($username, $password);

        if ($cek_login) {
            session()->set([
                'log' => true,
                'nama' => $cek_login['211149_nama'],
                'id_user' => $cek_login['211149_iduser'],
                'level' => $cek_login['211149_level'],
            ]);
            return redirect()->to('home/');
        } else {
            session()->setFlashdata('pesan', 'Username atau Password Salah.');
            return redirect()->to('auth/');
        }
    }

    function regis()
    {
        if (session()->get('log') == true) {
            return redirect()->to('home/');
        }
        return view('regis');
    }

    function aksi_regis()
    {
        if (session()->get('log') == true) {
            return redirect()->to('home/');
        }

        $nama_user = $this->request->getVar('nama_user');
        $no_telp = $this->request->getVar('no_telp');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $no_telp = $this->request->getVar('no_telp');
        $email = $this->request->getVar('email');

        // Validasi keunikan username dan password
        $cekEmail = $this->M_user->cekEmail($email);
        $cekUsername = $this->M_user->cekUsername($username);

        // Validasi panjang username dan password
        if (strlen($username) < 8 && strlen($password) < 8) {
            session()->setFlashdata('pesan', 'Username dan Password harus memiliki panjang 8 karakter.');
            session()->setFlashdata('username', 'Username harus memiliki panjang 8 karakter.');
            session()->setFlashdata('password', 'Password harus memiliki panjang 8 karakter.');
            return redirect()->to('auth/regis/');
        } elseif (strlen($username) < 8) {
            session()->setFlashdata('pesan', 'Username harus memiliki panjang 8 karakter.');
            session()->setFlashdata('username', 'Username harus memiliki panjang 8 karakter.');
            return redirect()->to('auth/regis/');
        } elseif (strlen($password) < 8) {
            session()->setFlashdata('pesan', 'Password harus memiliki panjang 8 karakter.');
            session()->setFlashdata('password', 'Password harus memiliki panjang 8 karakter.');
            return redirect()->to('auth/regis/');
        } elseif ($cekEmail) {
            session()->setFlashdata('email_already', 'email sudah ada');
            return redirect()->to('auth/regis/');
        } elseif ($cekUsername) {
            session()->setFlashdata('email_already', 'username sudah ada');
            return redirect()->to('auth/regis/');
        } else {
            // Send email
            $mail = service('email');
            $mail->setTo($email);
            $mail->setSubject('Registrasi Akun Owner Sparepart');
            $mail->setMessage("
                Selamat Owners! <br>
                Anda berhasil melakukan registrasi pada sparepart. <br>
                Username : $username <br>
                Email : $email <br><br>
                SIlahkan login menggunakan username anda!.
                ");

            try {
                if ($mail->send()) {
                    $this->M_user->regisModel($nama_user, $no_telp, $email, $username, $password);
                    session()->setFlashdata('berhasil', 'Registrasi berhasil. Silahkan cek email anda!.');
                } else {
                    session()->setFlashdata('pesan', 'Terjadi kesalahan saat melakukan registrasi dan mengirim email. Silahkan Periksa Koneksi Internet Anda!.');
                    log_message('error', 'Gagal mengirim email: ' . $mail->printDebugger(['headers']));
                }
            } catch (\Exception $e) {
                session()->setFlashdata('pesan', 'Terjadi kesalahan saat melakukan registrasi dan mengirim email. Silahkan Periksa Koneksi Internet Anda!.');
                log_message('error', 'Exception: ' . $e->getMessage());
            }
        }
        return redirect()->to('auth/regis/');
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('auth/');
    }
}
