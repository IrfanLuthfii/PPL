<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;
use App\Models\ModelKasMal;
use App\Models\ModelKasPenghasilan;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
        $this->ModelKasMal = new ModelKasMal();
        $this->ModelKasPenghasilan = new ModelKasPenghasilan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_dashboard',
            'kas_m' => $this->ModelKasMasjid->AllData(),
            'kas_s' => $this->ModelKasSosial->AllData(),
            'kas_zm' => $this->ModelKasMal->AllData(),
            'kas_zp' => $this->ModelKasPenghasilan->AllData(),
            'kasmasjid' => $this->ModelAdmin->AllDataKasMasjid(),
            'kaszakatmal' => $this->ModelAdmin->AllDataKasZakatMal(),
            'kaszakatpenghasilan' => $this->ModelAdmin->AllDataKasZakatPenghasilan(),
        ];
        return view('v_template_admin', $data);
    }

    public function Setting()
    {
        $url = 'https://api.myquran.com/v1/sholat/kota/semua';
        $kota = json_decode(file_get_contents($url), true);
        $data = [
            'judul' => 'Setting',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->ViewSetting(),
            'kota' => $kota,
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_masjid' => $this->request->getPost('nama_masjid'),
            'id_kota' => $this->request->getPost('id_kota'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->ModelAdmin->UpdateSetting($data);
        session()->setFlashdata('pesan', 'Setting Berhasil Diupdate !!');
        return redirect()->to(base_url('Admin/Setting'));
    }

    public function DonasiMasuk()
    {
        $data = [
            'judul' => 'Infaq dan zakat masuk',
            'menu' => 'donasi',
            'submenu' => '',
            'page' => 'v_donasi_masuk',
            'donasi' => $this->ModelAdmin->AllDonasi(),
        ];
        return view('v_template_admin', $data);
    }
}
