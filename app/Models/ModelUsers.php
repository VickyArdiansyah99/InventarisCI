<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsers extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user', 'username', 'password', 'level', 'foto'];

    public function allData()
    {
        return $this->orderBy('id_user', 'DESC')
            ->findAll();
    }

    public function add($data)
    {
        return $this->insert($data);
    }

    public function edit($data)
    {
        return $this->update($data['id_user'], $data);
    }

    public function delete_data($id_user)
    {
        return $this->delete($id_user);
    }
}
