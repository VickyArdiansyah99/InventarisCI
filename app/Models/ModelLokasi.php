<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    protected $table = 'tbl_lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $allowedFields = ['nm_lokasi'];

    public function allData()
    {
        return $this->orderBy('id_lokasi', 'DESC')->findAll();
    }

    public function add($data)
    {
        return $this->insert($data);
    }

    public function edit($data)
    {
        return $this->update($data['id_lokasi'], $data);
    }

    public function deleteData($id_lokasi)
    {
        return $this->delete($id_lokasi);
    }
}
