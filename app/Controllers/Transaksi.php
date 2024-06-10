<?php

namespace App\Controllers;

use App\Models\M_barang;
use App\Models\M_transaksi;

class Transaksi extends BaseController
{
    // public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    // {
    //     parent::initController($request, $response, $logger);
    // }

    public function __construct()
    {
        $this->M_barang = new M_barang();
        $this->M_transaksi = new M_transaksi();
    }

    function index()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $databarang = $this->M_transaksi->getBarang();

        foreach ($databarang as $ds) {
            if ($ds['211149_stok'] == 0) {
                $ds['211149_stok'];
                $ds['211149_disabled'] = true;
            } else {
                $ds['211149_stok'] = $ds['211149_stok'];
                $ds['211149_disabled'] = false;
            }
        }

        $data = [
            'page'              => 'admin/transaksi/index',
            'menu'              => 'transaksi',
            'title'             => 'Transaksi',
            'databarang'        => $databarang,
        ];

        // $data ['page'] = 'admin/index';
        // $data ['menu'] = 'home';

        return view('templates/index', $data);
    }

    function d_pesan($id_barang)
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/transaksi/v_pesan',
            'menu'              => 'transaksi',
            'title'             => 'Pesanan',
            'databarang'        => $this->M_barang->getEdit($id_barang)
        ];
        // print_r($data); die;

        return view('templates/index', $data);
    }

    function bayar()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $id_user = session()->get('id_user');
        $id_barang = $this->request->getVar('id_barang');
        $jumlah = $this->request->getVar('jumlah');
        $harga = $this->request->getVar('harga');
        $total = $harga * $jumlah;
        $dibayar = $this->request->getVar('dibayar');
        $kembalian = $dibayar - $total;

        // Mengurangi stok barang
        $this->M_transaksi->kurangiStok($id_barang, $jumlah);

        $this->M_transaksi->bayar($id_user, $id_barang, $jumlah, $total, $dibayar, $kembalian);
        session()->setFlashdata('pesan', 'Transaksi Berhasil!');

        return redirect()->to('transaksi/');
    }

    function riwayat()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }
        $data = [
            'page'              => 'admin/transaksi/v_riwayat',
            'menu'              => 'riwayat',
            'title'             => 'Riwayat Transaksi',
            'datatransaksi'        => $this->M_transaksi->getData(),
        ];

        // $data ['page'] = 'admin/index';
        // $data ['menu'] = 'home';

        return view('templates/index', $data);
    }

    function delete($id_transaksi){
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        if (session()->get('level') != "Owner") {
            return redirect()->to('transaksi/riwayat/');
        }
        
        $this->M_transaksi->deleteData($id_transaksi);
        session()->setFlashdata('pesan', 'Data Transaksi berhasil dihapus!');

        return redirect()->to('transaksi/riwayat/');
    }
}
