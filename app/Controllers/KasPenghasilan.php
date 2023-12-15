<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasPenghasilan;
use App\Models\ModelAdmin;

class KasPenghasilan extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasPenghasilan = new ModelKasPenghasilan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Zakat Penghasilan',
            'subjudul' => '',
            'menu' => 'kas-zakat-penghasilan',
            'submenu' => 'rekap-kas',
            'page' => 'kas-zakat-penghasilan/v_rekap_kas_zakatpenghasilan',
            'kas' => $this->ModelKasPenghasilan->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Zakat Penghasilan Masuk',
            'subjudul' => '',
            'menu' => 'kas-zakat-penghasilan',
            'submenu' => 'kas-masuk',
            'page' => 'kas-zakat-penghasilan/v_kas_zakatpenghasilan_masuk',
            'all' => $this->ModelKasPenghasilan->getTotalKasMasuk(),
            'kas' => $this->ModelKasPenghasilan->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Zakat Penghasilan Keluar',
            'subjudul' => '',
            'menu' => 'kas-zakat-penghasilan',
            'submenu' => 'kas-keluar',
            'page' => 'kas-zakat-penghasilan/v_kas_zakatpenghasilan_keluar',
            'kas' => $this->ModelKasPenghasilan->AllDataKasKeluar(),
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
        $this->ModelKasPenghasilan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasPenghasilan/KasMasuk'));
    }

    public function InsertKasKeluar()
    {if ($this->validate([
            
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
       
        $this->ModelKasPenghasilan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasPenghasilan/KasKeluar'));
    }}

    public function UpdateKasMasuk($id_kas_zakatpenghasilan)
    {
        $data = [
            'id_kas_zakatpenghasilan' => $id_kas_zakatpenghasilan,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'validasi' => $this->request->getPost('validasi')
        ];
        $this->ModelKasPenghasilan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasPenghasilan/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_zakatpenghasilan)
    {
        $data = [
            'id_kas_zakatpenghasilan' => $id_kas_zakatpenghasilan,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasPenghasilan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasPenghasilan/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_zakatpenghasilan)
    {
        $data = [
            'id_kas_zakatpenghasilan' => $id_kas_zakatpenghasilan,
        ];
        $this->ModelKasPenghasilan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasPenghasilan/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_zakatpenghasilan)
    {
        $data = [
            'id_kas_zakatpenghasilan' => $id_kas_zakatpenghasilan,
        ];
        $this->ModelKasPenghasilan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasPenghasilan/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Penghasilan',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-zakatpenghasilan',
            'page' => 'kas-zakat-penghasilan/v_laporan_kas_zakatpenghasilan',
            'masjid' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasPenghasilan->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-zakat-penghasilan/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
