<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsulanBarang extends Model
{
    protected $table = 'tbl_usulan';
    protected $primaryKey = 'id_';
    protected $allowedFields = [
        'id_pengusul',
        'namaBarang',
        'jmlBarang',
        'kiraHarga',
        'jmlHarga',
        'keperluan',
        'status'
    ];

    public function allData()
    {
        return $this->orderBy('id_', 'DESC')->findAll();
    }

    public function getDataByUserId($userId)
    {
        return $this->where('id_pengusul', $userId)->orderBy('id_', 'DESC')->findAll();
    }

    public function add($data)
    {
        return $this->insert($data);
    }

    public function deleteData($data)
    {
        return $this->delete($data['id_']);
    }

    public function updateStatus($id_, $status)
    {
        return $this->update($id_, ['status' => $status]);
    }
}
