<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function Agenda()
    {
        return $this->db->table('tbl_agenda')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }

    public function AllDataKelompok()
    {
        return $this->db->table('tbl_kelompok')
            ->join('tbl_tahun', 'tbl_tahun.id_tahun = tbl_kelompok.id_tahun', 'left')
            ->where('tahun_m', date('Y'))
            ->get()->getResultArray();
    }

    public function AllDataKasMasjid()
    {
        return $this->db->table('tbl_kas_masjid')
        ->get()->getResultArray();
    }

    public function AllDataKasSosial()
    {
        return $this->db->table('tbl_kas_sosial')
        ->get()->getResultArray();
    }

    public function AllDataKasZakatMal()
    {
        return $this->db->table('tbl_kas_zakatmal')
        ->get()->getResultArray();
    }

    public function AllDataKasZakatPenghasilan()
    {
        return $this->db->table('tbl_kas_zakatpenghasilan')
        ->get()->getResultArray();
    }

    public function InsertDonasi($data)
    {
        $this->db->table('tbl_donasi')->insert($data);
    }
}
