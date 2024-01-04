<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRekening extends Model
{
    public function AllData()
{
    return $this->db->table('tbl_rekening')
        ->join('kode_rekening', 'kode_rekening.id = tbl_rekening.kode')
        ->get()
        ->getResultArray();
}

    public function getKode(){
        return $this->db->table('kode_rekening')
        ->get()->getResultArray();
    }
    public function getKode1($kd){
        return $this->db->table('tbl_rekening')
        ->where('kode',$kd)
        ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $this->db->table('tbl_rekening')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_rekening')
            ->where('id_rekening', $data['id_rekening'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_rekening')
            ->where('id_rekening', $data['id_rekening'])
            ->delete($data);
    }
}
