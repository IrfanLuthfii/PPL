<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasSosial;
use App\Models\ModelAdmin;

class KasSosial extends BaseController
{

    public function __construct()
    {
        $this->ModelKasSosial = new ModelKasSosial;
        $this->ModelAdmin = new ModelAdmin;
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Zakat',
            'subjudul' => '',
            'menu' => 'kas-sosial',
            'submenu' => 'rekap-kas-sosial',
            'page' => 'kas-sosial/v_rekap_kas_sosial',
            
            'kas' => $this->ModelKasSosial->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Zakat Masuk',
            'subjudul' => '',
            'menu' => 'kas-sosial',
            'submenu' => 'kas-sosial-masuk',
            'page' => 'kas-sosial/v_kas_sosial_masuk',
            'all' => $this->ModelKasSosial->getTotalKasMasuk(),
            'kas' => $this->ModelKasSosial->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Zakat Keluar',
            'subjudul' => '',
            'menu' => 'kas-sosial',
            'submenu' => 'kas-sosial-keluar',
            'page' => 'kas-sosial/v_kas_sosial_keluar',
            'kas' => $this->ModelKasSosial->AllDataKasKeluar(),
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
        $this->ModelKasSosial->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function InsertKasKeluar()
    {   if ($this->validate([
            
        'bukti' => [
            'label' => 'Bukti Transfer',
            'rules' => 'uploaded[bukti]|max_size[bukti,15000]|mime_in[bukti,image/png,image/jpg,image/jpeg]',
            'errors' => [
                'uploaded' => '{field} Belum Di Pilih !',
                'max_size' => '{field} Max 15000 KB !',
                'mime_in' => 'Format {field} Wajib JPG, PNG JPEG',
            ]
        ],
    ])){
       
        $bukti = $this->request->getFile('bukti');
        
        $nama_file = $bukti->getRandomName();
        $bukti->move('bukti', $nama_file);
     
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'status' => 'Keluar',
        
        'bukti' => $nama_file,
    ];

        
        $this->ModelKasSosial->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }}

    public function UpdateKasMasuk($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'validasi' => $this->request->getPost('validasi')
        ];
        $this->ModelKasSosial->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasSosial->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
        ];
        $this->ModelKasSosial->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasSosial/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_sosial)
    {
        $data = [
            'id_kas_sosial' => $id_kas_sosial,
        ];
        $this->ModelKasSosial->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasSosial/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Zakat',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-sosial',
            'page' => 'kas-sosial/v_laporan_kas_sosial',
            'masjid' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasSosial->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-sosial/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
