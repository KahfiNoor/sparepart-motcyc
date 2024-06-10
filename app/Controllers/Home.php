<?php

namespace App\Controllers;
use App\Models\M_barang;
use App\Models\M_supplier;
use App\Models\M_transaksi;
use App\Models\M_user;

class Home extends BaseController
{
    // public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    // {
    //     parent::initController($request, $response, $logger);
    // }

    public function __construct(){
        $this->M_barang = new M_barang();
        $this->M_supplier = new M_supplier();
        $this->M_transaksi = new M_transaksi();
        $this->M_user = new M_user();
    }

    public function index()
    {
        $data = [
            'page'              => 'admin/index',
            'menu'              => 'home',
            'title'             => 'Beranda',
            'total_barang'      => $this->M_barang->totalBarang(),
            'info_barang'       => 'Barang',
            'total_transaksi'   => $this->M_transaksi->totalTransaksi(),
            'info_transaksi'    => 'Transaksi',
            'total_supplier'    => $this->M_supplier->totalSupplier(),
            'info_supplier'     => 'Supplier',
            'total_user'        => $this->M_user->totalUser(),
            'info_user'         => 'Karyawan',
            'barang_terbanyak'  => $this->M_transaksi->getBarangTerbanyak(),
            'pendapatan'        => $this->M_transaksi->getPendapatan(),
        ];

        // $data ['page'] = 'admin/index';
        // $data ['menu'] = 'home';

        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        return view('templates/index', $data);
    }
}
