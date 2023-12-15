<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;
use App\Models\ModelAdmin;

class KasMasjid extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekap Kas Masjid',
            'subjudul' => '',
            'menu' => 'kas-masjid',
            'submenu' => 'rekap-kas',
            'page' => 'kas-masjid/v_rekap_kas_masjid',
            'kas' => $this->ModelKasMasjid->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Masjid Masuk',
            'subjudul' => '',
            'menu' => 'kas-masjid',
            'submenu' => 'kas-masuk',
            'page' => 'kas-masjid/v_kas_masjid_masuk',
            'all' => $this->ModelKasMasjid->getTotalKasMasuk(),
            'kas' => $this->ModelKasMasjid->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Masjid Keluar',
            'subjudul' => '',
            'menu' => 'kas-masjid',
            'submenu' => 'kas-keluar',
            'page' => 'kas-masjid/v_kas_masjid_keluar',
            'kas' => $this->ModelKasMasjid->AllDataKasKeluar(),
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
        $this->ModelKasMasjid->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function InsertKasKeluar()
    {   //batas atas
    
        // var_dump($this->request->getPost()); 
        
         if ($this->validate([
            
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
        
         
         $this->ModelKasMasjid->InsertData($data);
         echo 'After InsertData';
         session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }}

    public function UpdateKasMasuk($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'validasi' => $this->request->getPost('validasi')
        ];
        $this->ModelKasMasjid->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function UpdateKasKeluar($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasMasjid->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function DeleteKasMasuk($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
        ];
        $this->ModelKasMasjid->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasMasjid/KasMasuk'));
    }

    public function DeleteKasKeluar($id_kas_masjid)
    {
        $data = [
            'id_kas_masjid' => $id_kas_masjid,
        ];
        $this->ModelKasMasjid->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('KasMasjid/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Masjid',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-masjid',
            'page' => 'kas-masjid/v_laporan_kas_masjid',
            'masjid' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {

        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasMasjid->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('kas-masjid/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
