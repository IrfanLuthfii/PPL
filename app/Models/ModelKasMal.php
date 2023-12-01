<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasMal extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_zakatmal')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_zakatmal')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }

    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_zakatmal')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kas_zakatmal')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_kas_zakatmal')
            ->where('id_kas_zakatmal', $data['id_kas_zakatmal'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kas_zakatmal')
            ->where('id_kas_zakatmal', $data['id_kas_zakatmal'])
            ->delete($data);
    }


    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_zakatmal')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }
}
