<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasPenghasilan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_zakatpenghasilan')
            ->get()->getResultArray();
    }

    public function getTotalKasMasuk()
    {
        return $this->db->table('tbl_kas_zakatpenghasilan')
        ->selectSum('kas_masuk')->where('validasi', 'ya')->get()->getRowArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_zakatpenghasilan')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_zakatpenghasilan')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kas_zakatpenghasilan')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_kas_zakatpenghasilan')
            ->where('id_kas_zakatpenghasilan', $data['id_kas_zakatpenghasilan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kas_zakatpenghasilan')
            ->where('id_kas_zakatpenghasilan', $data['id_kas_zakatpenghasilan'])
            ->delete($data);
    }


    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_zakatpenghasilan')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
