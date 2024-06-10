<?php

namespace App\Controllers;

use App\Models\M_barang;

class Barang extends BaseController
{
    // public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    // {
    //     parent::initController($request, $response, $logger);
    // }

    public function __construct()
    {
        $this->M_barang = new M_barang();
    }

    function index()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/barang/index',
            'menu'              => 'barang',
            'title'             => 'Data Barang',
            'databarang'        => $this->M_barang->getData(),
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

        if (session()->get('level') != "Owner") {
            return redirect()->to('barang/');
        }

        $data = [
            'page'              => 'admin/barang/v_tambah',
            'menu'              => 'barang',
            'title'             => 'Tambah Data Barang',
            'databarang'        => $this->M_barang->getSupplier(),
        ];

        return view('templates/index', $data);
    }

    function tambah()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('barang/');
        }

        $nama_barang = $this->request->getVar('nama_barang');
        $jenis_barang = $this->request->getVar('jenis_barang');
        $harga = $this->request->getVar('harga');
        $stok = $this->request->getVar('stok');
        $id_supplier = $this->request->getVar('id_supplier');
        $foto = $this->request->getFile('foto');
        $ket = $this->request->getVar('ket');
        // Konversi karakter baris baru menjadi <br>
        // $ket = nl2br($ket);

        // Ganti karakter baris baru (\n) dengan satu tag <br> saja
        $ket = str_replace("\n", "<br>", $ket);

        // Validasi keunikan username dan password
        $cek = $this->M_barang->CekData($nama_barang);

        // Validasi panjang username dan password
        if ($cek) {
            session()->setFlashdata('pesan', 'Data barang sudah ada');
            session()->setFlashdata('nama_barang', 'Nama barang sudah ada.');
            return redirect()->to('barang/d_tambah/');
        }

        // Menggunakan nilai default jika tidak ada file yang dimasukkan
        $namaFoto = 'default.png';

        if (!empty($foto) && $foto->isValid()) {
            // Ubah format nama barang menjadi md5
            $nama_barang_md5 = md5($nama_barang);

            // Pastikan file ada sebelum mencoba upload
            // Tentukan direktori upload
            $uploadPath = './dist/img/';

            // Cek ekstensi file
            $ext = $foto->getClientExtension();
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (in_array($ext, $allowedExtensions)) {
                // Pindahkan file ke direktori upload dengan nama file format md5 dan ekstensi yang sesuai
                $foto->move($uploadPath, $nama_barang_md5 . '.' . $ext);

                // Dapatkan nama file setelah di-upload
                $namaFoto = $nama_barang_md5 . '.' . $ext;
            } else {
                // Tipe file tidak diizinkan, Anda bisa memberikan respon atau tindakan sesuai kebijakan aplikasi
                session()->setFlashdata('pesan', 'File hanya boleh format jpg, jpeg, atau png');
                return redirect()->to('barang/d_tambah/');
            }
        }

        $this->M_barang->insertData($nama_barang, $jenis_barang, $harga, $stok, $id_supplier, $namaFoto, $ket);


        session()->setFlashdata('pesan', 'Data barang berhasil ditambahkan!');

        return redirect()->to('barang/');
    }

    function d_edit($id_barang)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('barang/');
        }

        $data = [
            'page'              => 'admin/barang/v_edit',
            'menu'              => 'barang',
            'title'             => 'Edit Data Barang',
            'datasupplier'      => $this->M_barang->getSupplier(),
            'namasupplier'      => $this->M_barang->getDetail($id_barang),
            'databarang'        => $this->M_barang->getEdit($id_barang)
        ];
        // print_r($data); die;

        return view('templates/index', $data);
    }

    public function edit()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('barang/');
        }

        $id_barang = $this->request->getPost('id_barang');
        $nama_barang = $this->request->getPost('nama_barang');
        $jenis_barang = $this->request->getPost('jenis_barang');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $id_supplier = $this->request->getPost('id_supplier');
        $ket = $this->request->getPost('ket');
        $foto = $this->request->getFile('foto');
        $foto_old = $this->request->getPost('foto_old');
        $namaFoto = $foto_old; // Inisialisasi $namaFoto dengan foto lama

        // Ganti karakter baris baru (\n) dengan satu tag <br> saja
        $ket = str_replace("\n", "<br>", $ket);

        // Validasi foto baru
        if (!empty($foto) && $foto->isValid()) {
            // Ubah format nama barang menjadi md5
            $nama_barang_md5 = md5($nama_barang);

            // Tentukan direktori upload
            $uploadPath = './dist/img/';

            // Cek ekstensi file
            $ext = $foto->getClientExtension();
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (in_array($ext, $allowedExtensions)) {
                // Hapus file foto lama jika bukan default.png
                if ($foto_old != 'default.png') {
                    $filePath = $uploadPath . $foto_old;

                    if (file_exists($filePath)) {
                        unlink($filePath); // Hapus file lama dari folder
                    }
                }

                // Pindahkan file ke direktori upload dengan nama file format md5 dan ekstensi yang sesuai
                $foto->move($uploadPath, $nama_barang_md5 . '.' . $ext);

                // Dapatkan nama file setelah di-upload
                $namaFoto = $nama_barang_md5 . '.' . $ext;
            } else {
                // Tipe file tidak diizinkan
                session()->setFlashdata('pesan', 'File hanya boleh format jpg, jpeg, atau png');
                return redirect()->to('barang/d_edit/' . $id_barang . '/');
            }
        }

        // Panggil model untuk melakukan update
        $this->M_barang->editData($id_barang, $nama_barang, $jenis_barang, $harga, $stok, $id_supplier, $namaFoto, $ket);

        // Tampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data barang berhasil diubah!');

        // Redirect ke halaman barang
        return redirect()->to('barang/');
    }


    function d_detail($id_barang)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/barang/v_detail',
            'menu'              => 'barang',
            'title'             => 'Detail Data Barang',
            'databarang'        => $this->M_barang->getDetail($id_barang)
        ];

        return view('templates/index', $data);
    }

    function d_stok($id_barang)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/barang/v_stok',
            'menu'              => 'barang',
            'title'             => 'Tambah Stok Barang',
            'databarang'        => $this->M_barang->getEdit($id_barang)
        ];
        // print_r($data); die;

        return view('templates/index', $data);
    }

    public function tambahStok()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $id_barang = $this->request->getPost('id_barang');
        $stok_lama = $this->request->getPost('stok_lama');
        $tambah_stok = $this->request->getPost('stok');
        $stok = $stok_lama + $tambah_stok;
        // Panggil model untuk melakukan update
        $this->M_barang->stokData($id_barang, $stok);

        // Tampilkan pesan sukses
        session()->setFlashdata('pesan', 'Stok Berhasil Ditambah!');

        // Redirect ke halaman barang
        return redirect()->to('barang/');
    }

    function delete($id_barang, $foto)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('barang/');
        }

        $this->M_barang->deleteData($id_barang);

        // Hapus file foto dari folder jika namanya bukan "default.png"
        if ($foto && $foto !== 'default.png') {
            $uploadPath = './dist/img/';
            $filePath = $uploadPath . $foto;

            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file dari folder
            }
        }
        session()->setFlashdata('pesan', 'Data barang berhasil dihapus!');

        return redirect()->to('barang/');
    }
}
