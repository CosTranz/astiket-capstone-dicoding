<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\PlaceModel;
use TCPDF;

class Transaksi extends BaseController
{
    public function index()
    {
        helper('form');
        $model = new TransaksiModel();
        $data = [
            'title' => 'Transaction',
            'content' => 'v_transaksi',
            'getData' => $model->getAllDataWithRelation(),
        ];

        return view('layout/template', $data);
    }

    public function tiketadd($id_place)
    {
        helper('form');
        $model = new PlaceModel();
        $data = [
            'title' => 'Tiket',
            'content' => 'mainpages/tiket_add',
            'placeDetail' => $model->getDataById($id_place),
        ];

        return view('mainpages/template', $data);
    }

    public function submit()
    {
        helper('form');
        $id = $this->request->getPost('id_transaksi');
        $model = new TransaksiModel();

        $tanggal = date('Y-m-d');

        $data = [
            'id_transaksi' => $id,
            'id_place' => $this->request->getPost('id_place'),
            'customer' => $this->request->getPost('customer'),
            'metode' => $this->request->getPost('metode'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $tanggal,
        ];

        $result = $model->insertData($data);

        if ($result) {
            // Pesan keberhasilan
            session()->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Pesan kesalahan
            session()->setFlashdata('error', 'Data gagal disimpan.');
        }

        return redirect()->to('Main/tiket');
    }

    public function delete($id)
    {
        $id = $this->request->uri->getSegment(3);
        $model = new TransaksiModel();
        $result = $model->deleteData($id);

        if ($result) {
            // Pesan keberhasilan
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            // Pesan kesalahan
            session()->setFlashdata('error', 'Data gagal dihapus.');
        }

        return redirect()->to('Transaksi');
    }

    public function generateTicketPDF($id)
    {
        $model = new TransaksiModel();
        $placeModel = new PlaceModel();

        // Ambil data transaksi
        $transaksi = $model->getDataById($id);

        if ($transaksi) {
            // Ambil data tempat
            $place = $placeModel->getDataById($transaksi->id_place);

            if ($place) {
                // Hitung jumlah tiket berdasarkan harga tiket
                $harga_tiket = $transaksi->jumlah;
                $jumlah_tiket = 1;

                if ($harga_tiket == 40000) {
                    $jumlah_tiket = 1;
                } elseif ($harga_tiket == 70000) {
                    $jumlah_tiket = 2;
                } elseif ($harga_tiket == 120000) {
                    $jumlah_tiket = 3;
                } elseif ($harga_tiket == 160000) {
                    $jumlah_tiket = 4;
                }

                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Your Name');
                $pdf->SetTitle('Ticket');

                $pdf->SetMargins(10, 10, 10);
                $pdf->SetHeaderMargin(0);
                $pdf->SetFooterMargin(0);

                $pdf->AddPage();
                $pdf->SetFont('dejavusans', '', 12);

                $html = '<h1>Ticket</h1>';
                $html .= '<p>ID Transaksi: ' . $transaksi->id_transaksi . '</p>';
                $html .= '<p>Nama Tempat: ' . $place->name_place . '</p>';
                $html .= '<p>Customer: ' . $transaksi->customer . '</p>';
                $html .= '<p>Metode Pembayaran: ' . $transaksi->metode . '</p>';
                $html .= '<p>Total: ' . $transaksi->jumlah . '</p>';
                $html .= '<p>Jumlah Tiket: ' . $jumlah_tiket . '</p>';
                $html .= '<p>Tanggal: ' . $transaksi->tanggal . '</p>';

                $pdf->writeHTML($html, true, false, true, false, '');


                $pdf->Output('ticket.pdf', 'D');
            } else {
                echo "Data tempat tidak ditemukan.";
            }
        } else {
            echo "Data transaksi tidak ditemukan.";
        }
    }
}