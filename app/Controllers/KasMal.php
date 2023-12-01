<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasMal;
use App\Models\ModelAdmin;

class KasMal extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMal = new ModelKasMal;
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Zakat Mal',
            'subjudul' => '',
            'menu' => 'kas-zakat-mal',
            'submenu' => 'rekap-kas',
            'page' => 'kas-zakat-mal/v_rekap_kas_zakatmal',
            'kas' => $this->ModelKasMal->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Zakat Mal Masuk',
            'subjudul' => '',
            'menu' => 'kas-zakat-mal',
            'submenu' => 'kas-masuk',
            'page' => 'kas-zakat-mal/v_kas_zakatmal_masuk',
            'kas' => $this->ModelKasMal->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Zakat Mal Keluar',
            'subjudul' => '',
            'menu' => 'kas-zakat-mal',
            'submenu' => 'kas-keluar',
            'page' => 'kas-zakat-mal/v_kas_zakatmal_keluar',
            'kas' => $this->ModelKasMal->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertKasMasuk()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status' => 'Masuk',
        ];
        $this->ModelKasMal->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasMal/KasMasuk'));
    }

    public function InsertKasKeluar()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'status' => 'Keluar',
        ];
        $this->ModelKasMal->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasMal/KasKeluar'));
    }

    public function UpdateKasMasuk($id_kas_zakatmal)
    {
        $data = [
            'id_kas_zakatmal' => $id_kas_zakatmal,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasMal->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasMal/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_zakatmal)
    {
        $data = [
            'id_kas_zakatmal' => $id_kas_zakatmal,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasMal->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasMal/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_zakatmal)
    {
        $data = [
            'id_kas_zakatmal' => $id_kas_zakatmal,
        ];
        $this->ModelKasMal->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasMal/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_zakatmal)
    {
        $data = [
            'id_kas_zakatmal' => $id_kas_zakatmal,
        ];
        $this->ModelKasMal->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasMal/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Zakat Mal',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-zakatmal',
            'page' => 'kas-zakat-mal/v_laporan_kas_zakatmal',
            'masjid' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasMal->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-zakat-mal/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
