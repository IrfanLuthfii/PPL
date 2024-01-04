<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\ModelKasMal;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasPenghasilan;
use App\Models\ModelKasSosial;
use App\Models\ModelRekening;

use App\Helpers\TelegramHelper;
class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
        $this->ModelRekening = new ModelRekening();
        $this->ModelKasMal = new ModelKasMal();
        $this->ModelKasPenghasilan = new ModelKasPenghasilan();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();

        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            // 'waktu' => $waktu,
            'kas_m' => $this->ModelKasMasjid->AllData(),
            'kas_s' => $this->ModelKasSosial->AllData(),
            'kas_zm' => $this->ModelKasMal->AllData(),
            'kas_zp' => $this->ModelKasPenghasilan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Agenda()
    {
        $data = [
            'judul' => 'Agenda',
            'page' => 'front-end/v_agenda',
            'agenda' => $this->ModelHome->Agenda(),
        ];
        return view('v_template', $data);
    }

    public function RekapKasMasjid()
    {
        $data = [
            'judul' => 'Rekap Kas Masjid',
            'page' => 'front-end/v_rekap_kas',
            'kas' => $this->ModelHome->AllDataKasMasjid(),
        ];
        return view('v_template', $data);
    }

    public function RekapKasSosial()
    {
        $data = [
            'judul' => 'Rekap Kas Zakat Fitrah',
            'page' => 'front-end/v_rekap_kas zakat',
            'kas' => $this->ModelHome->AllDataKasSosial(),
        ];
        return view('v_template', $data);
    }

    public function RekapKasZakatMal()
    {
        $data = [
            'judul' => 'Rekap Kas Zakat Mal',
            'page' => 'front-end/v_rekap_kas zakat',
            'kas' => $this->ModelHome->AllDataKasZakatMal(),
        ];
        return view('v_template', $data);
    }

    public function RekapKasZakatPenghasilan()
    {
        $data = [
            'judul' => 'Rekap Kas Zakat Penghasilan',
            'page' => 'front-end/v_rekap_kas zakat',
            'kas' => $this->ModelHome->AllDataKasZakatPenghasilan(),
        ];
        return view('v_template', $data);
    }


    public function Donasi()
    {
        $data = [
            'judul' => 'Infaq dan zakat',
            'page' => 'front-end/v_donasi',
            'rek' => $this->ModelRekening->AllData(),
            'validation' =>  \Config\Services::validation(),
        ];
        return view('v_template', $data);
    }

    public function About()
    {
        $data = [
            'judul' => 'About',
            'page' => 'front-end/v_about',
            'about' => $this->ModelHome->About(),
        ];
        return view('v_template', $data);
    }


    public function KirimDonasi()
    {
        var_dump($this->request->getPost());
        if ($this->validate([
            'bukti' => [
                'label' => 'Bukti Transfer',
                'rules' => 'uploaded[bukti]|max_size[bukti,1500]|mime_in[bukti,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Belum Di Pilih !',
                    'max_size' => '{field} Max 1500 KB !',
                    'mime_in' => 'Format {field} Wajib JPG, PNG JPEG',
                ]
            ],
        ])) {
            $bukti = $this->request->getFile('bukti');
            $nama_file = $bukti->getRandomName();
            $data = [
                'id_rekening' => $this->request->getPost('id_rekening'),
                'nama_bank' => $this->request->getPost('nama_bank'),
                'no_rek' => $this->request->getPost('no_rek'),
                'nama_pengirim' => $this->request->getPost('nama_pengirim'),
                'jumlah' => $this->request->getPost('jumlah'),
                'jenis_donasi' => $this->request->getPost('jenis_donasi'),
                'bukti' => $nama_file,
                'tgl' => date('Y-m-d'),
                
            ];
            $time = date('Y-m-d H:i:s');
            $url = 'https://api.telegram.org/bot6457196603:AAFxpq7RIQwYLNdB-8Sqk6keGYFb4Uet4K8/sendMessage?chat_id=-4089032099&text=Ada+Transferan+Masuk!!!!!!+%0A%0ADonasi+:+'.$data['jenis_donasi'].'+%0AAtas+Nama+:+'.$data['nama_pengirim'].'%0AJumlah+:+Rp+'.number_format($data['jumlah'],0, ',','.') .'%0AMelalui+'. $data['nama_bank']. '%0ANo+Rek+:+' .$data['no_rek'].'%0A%0A' .$time.'&parse_mode=html';
$response = file_get_contents($url);
echo $response;
            $bukti->move('bukti', $nama_file);
            $this->ModelHome->InsertDonasi($data);
            if ($this->request->getPost('jenis_donasi') == "ZakatFitrah"){
                $sosial = [
                    'tanggal' => date('Y-m-d'),
                    'ket' =>$this->request->getPost('nama_pengirim'),
                    'kas_masuk' => $this->request->getPost('jumlah'),
                    'kas_keluar' => 0,
                    'validasi' => 'tidak',
                    'status' => 'Masuk',
                ];
//                 $url = 'https://api.telegram.org/bot6457196603:AAFxpq7RIQwYLNdB-8Sqk6keGYFb4Uet4K8/sendMessage?chat_id=-4089032099&text=masuk+mas+ke+rekening+dari+'.$sosial['ket'].'+jumlahnya+Rp+'.$sosial['kas_masuk'].'+mas&parse_mode=html';
// $response = file_get_contents($url);
// echo $response;

                $this->ModelKasSosial->InsertData($sosial);
                session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
                return redirect()->to(base_url('Home/Donasi'));
            }elseif($this->request->getPost('jenis_donasi') == "ZakatMal"){
                $mal = [
                    'tanggal' => date('Y-m-d'),
                    'ket' =>$this->request->getPost('nama_pengirim'),
                    'kas_masuk' => $this->request->getPost('jumlah'),
                    'kas_keluar' => 0,
                    'validasi' => 'tidak',
                    'status' => 'Masuk',
                    ];
                    $this->ModelKasMal->InsertData($mal);
                    session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
                return redirect()->to(base_url('Home/Donasi'));
            }elseif($this->request->getPost('jenis_donasi') == "ZakatPenghasilan"){
                $penghasilan = [
                    'tanggal' => date('Y-m-d'),
                    'ket' =>$this->request->getPost('nama_pengirim'),
                    'kas_masuk' => $this->request->getPost('jumlah'),
                    'kas_keluar' => 0,
                    'validasi' => 'tidak',
                    'status' => 'Masuk',
                ];
                $this->ModelKasPenghasilan->InsertData($penghasilan);
                session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
                return redirect()->to(base_url('Home/Donasi'));
            }elseif($this->request->getPost('jenis_donasi') == "Masjid"){
                $masjid = [
                    'tanggal' => date('Y-m-d'),
                    'ket' =>$this->request->getPost('nama_pengirim'),
                    'kas_masuk' => $this->request->getPost('jumlah'),
                    'kas_keluar' => 0,
                    'validasi' => 'tidak',
                    'status' => 'Masuk',
                ];
                $this->ModelKasMasjid->InsertData($masjid);
                session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
                return redirect()->to(base_url('Home/Donasi'));
            }else{
                return 0;
            }
            
           
            
           
            $token = '';
            $chatId = '-4089032099';
            $message = 'ada pesan masuk';
    
            // Use the TelegramHelper to send a message
            TelegramHelper::sendMessage($token, $chatId, $message);
            session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
            return redirect()->to(base_url('Home/Donasi'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/Donasi'))->withInput('validation', \Config\Services::validation());
        }
    }
}
