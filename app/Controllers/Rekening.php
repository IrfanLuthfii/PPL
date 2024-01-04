<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRekening;

class Rekening extends BaseController
{

    public function __construct()
    {
        $this->ModelRekening = new ModelRekening();
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekening Bank',
            'menu' => 'rekening',
            'submenu' => '',
            'page' => 'v_rekening',
            'rek' => $this->ModelRekening->AllData(),
            'kode' => $this->ModelRekening->getKode()
        ];
        return view('v_template_admin', $data);
    }
    // public function InsertData()
    // {
    //     $kd = $this->request->getPost('kode');
    //     $no =  $this->request->getPost('no_rek');
    //     $validate = $this->ModelRekening->getkode1($kd);
    //         $data = [
    //         'kode' => $kd,
    //         'no_rek' => $no,
    //         'atas_nama' => $this->request->getPost('atas_nama'),
    //     ];
    //     if($no in $validate['no_rek'] ){
    //     $this->ModelRekening->InsertData($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
    //     return redirect()->to(base_url('Rekening'));
    // }else{
    //     session()->setFlashdata('pesan', 'Data Sudah Ada!!!!!!!!');
    //     return redirect()->to(base_url('Rekening'));
    // }
    // }
    public function InsertData()
{
    $kd = $this->request->getPost('kode');
    $no =  $this->request->getPost('no_rek');
    $validate = $this->ModelRekening->getKode1($kd);

    // Mengecek apakah nomor rekening sudah ada dalam database
    $existingNoRek = array_column($validate, 'no_rek');
    if (!in_array($no, $existingNoRek)) {
        $data = [
            'kode' => $kd,
            'no_rek' => $no,
            'atas_nama' => $this->request->getPost('atas_nama'),
        ];

        $this->ModelRekening->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to(base_url('Rekening'));
    } else {
        session()->setFlashdata('pesan', 'Nomor Rekening Sudah Ada!');
        return redirect()->to(base_url('Rekening'));
    }
}

    public function UpdateData($id_rekening)
    {
        $data = [
            'id_rekening' => $id_rekening,

            'no_rek' => $this->request->getPost('no_rek'),
            'atas_nama' => $this->request->getPost('atas_nama'),
        ];
        $this->ModelRekening->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('Rekening'));
    }

    public function DeleteData($id_rekening)
    {
        $data = [
            'id_rekening' => $id_rekening,
        ];
        $this->ModelRekening->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Didelete !!');
        return redirect()->to(base_url('Rekening'));
    }
}
