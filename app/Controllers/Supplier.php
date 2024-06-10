<?php

namespace App\Controllers;
use App\Models\M_supplier;

class Supplier extends BaseController
{
    // public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    // {
    //     parent::initController($request, $response, $logger);
    // }

    public function __construct(){
        $this->M_supplier = new M_supplier();
    }

    function index()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/supplier/index',
            'menu'              => 'supplier',
            'title'             => 'Data Supplier',
            'datasupplier'        => $this->M_supplier->getData(),
        ];

        // $data ['page'] = 'admin/index';
        // $data ['menu'] = 'home';

        return view('templates/index', $data);
    }

    function d_tambah(){
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('supplier/');
        }

        $data = [
            'page'              => 'admin/supplier/v_tambah',
            'menu'              => 'supplier',
            'title'             => 'Tambah Data Supplier',
        ];
        
        return view('templates/index', $data);
    }
    
    function tambah(){
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('supplier/');
        }

        $nama_supplier = $this->request->getVar('nama_supplier');
		$no_telp = $this->request->getVar('no_telp');

        // Validasi keunikan username dan password
        $cek = $this->M_supplier->CekData($nama_supplier);

        // Validasi panjang username dan password
        if ($cek) {
            session()->setFlashdata('pesan', 'Data supplier sudah ada');
            session()->setFlashdata('nama_supplier', 'Nama Supplier sudah terdaftar.');
            return redirect()->to('supplier/d_tambah/');
        }

        $this->M_supplier->insertData($nama_supplier, $no_telp);
        session()->setFlashdata('pesan', 'Data Supplier berhasil ditambahkan!');

        return redirect()->to('supplier/');
    }

    function d_edit($id_supplier){
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('supplier/');
        }
        
        $data = [
            'page'              => 'admin/supplier/v_edit',
            'menu'              => 'supplier',
            'title'             => 'Edit Data Supplier',
            'datasupplier'        => $this->M_supplier->getEdit($id_supplier)
        ];
        
        return view('templates/index', $data);
    }

    function edit(){
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('supplier/');
        }

        $nama_supplier = $this->request->getVar('nama_supplier');
		$no_telp = $this->request->getVar('no_telp');
		$id_supplier = $this->request->getVar('id_supplier');

        $this->M_supplier->updateData($nama_supplier, $no_telp, $id_supplier);
        session()->setFlashdata('pesan', 'Data Supplier berhasil diubah!');

        return redirect()->to('supplier/');
    }

    function delete($id_supplier){
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('supplier/');
        }
        
        $this->M_supplier->deleteData($id_supplier);
        session()->setFlashdata('pesan', 'Data Supplier berhasil dihapus!');

        return redirect()->to('supplier/');
    }
}
