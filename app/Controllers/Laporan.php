<?php

namespace App\Controllers;

use App\Models\M_barang;
use App\Models\M_supplier;
use App\Models\M_transaksi;
use App\Models\M_user;


use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->M_barang = new M_barang();
        $this->M_supplier = new M_supplier();
        $this->M_transaksi = new M_transaksi();
        $this->M_user = new M_user();
    }

    function index()
    {
        if (session()->get('log') != true) {
            return redirect()->to('auth/');
        }

        $data = [
            'page'              => 'admin/laporan/index',
            'menu'              => 'laporan',
            'title'             => 'Laporan',
            'titleData'         => [
                'barang'    => 'Data Barang', 
                'transaksi' => 'Data Transaksi', 
                'supplier'  => 'Data Supplier', 
                'user'      => 'Data User'
            ],
            'databarang'        => $this->M_barang->getData(),
            'datatransaksi'     => $this->M_transaksi->getData(),
            'transaksitotal'     => $this->M_transaksi->getDataLaporan(),
            'datasupplier'      => $this->M_supplier->getData(),
            'datauser'          => $this->M_user->getData(),
        ];

        return view('templates/index', $data);
    }

    public function barangPdf()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Retrieve data from the database
        $data = [
            'databarang' => $this->M_barang->getData(),
            'title'      => 'Data Barang',
        ]; // Replace with your actual model method

        // HTML template for PDF
        $html = view('admin/laporan/barang_pdf', ['databarang' => $data['databarang'], 'title' => $data['title']]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();

        $dompdf->stream('laporan_barang_sparepart.pdf', ['Attachment' => 0]);
    }

    public function transaksiPdf()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Retrieve data from the database
        $data = [
            'datatransaksi' => $this->M_transaksi->getData(),
            'title'      => 'Data Transaksi',
        ]; // Replace with your actual model method

        // HTML template for PDF
        $html = view('admin/laporan/transaksi_pdf', ['datatransaksi' => $data['datatransaksi'], 'title' => $data['title']]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('laporan_transaksi_sparepart.pdf', ['Attachment' => 0]);
    }

    public function supplierPdf()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Retrieve data from the database
        $data = [
            'datasupplier' => $this->M_supplier->getData(),
            'title'        => 'Data Supplier',
        ]; // Replace with your actual model method

        // HTML template for PDF
        $html = view('admin/laporan/supplier_pdf', ['datasupplier' => $data['datasupplier'], 'title' => $data['title']]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('laporan_supplier_sparepart.pdf', ['Attachment' => 0]);
    }

    public function userPdf()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Retrieve data from the database
        $data = [
            'datauser' => $this->M_user->getData(),
            'title'        => 'Data User',
        ]; // Replace with your actual model method

        // HTML template for PDF
        $html = view('admin/laporan/user_pdf', ['datauser' => $data['datauser'], 'title' => $data['title']]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('laporan_user_sparepart.pdf', ['Attachment' => 0]);
    }
}
