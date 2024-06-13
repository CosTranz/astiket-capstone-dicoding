<?php

namespace App\Models;

use CodeIgniter\Model;

class PlaceModel extends Model
{
    public function getAllData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        return $builder->get()->getResult();
    }

    public function insertData($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        return $builder->insert($data);
    }
    public function getDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        $builder->where('id_place', $id);
        return $builder->get()->getRow();
    }
    public function updateData($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        $builder->where('id_place', $id);
        return $builder->update($data);
    }
    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        $builder->where('id_place', $id);
        return $builder->delete();
    }
    public function getGameDetailsById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        $builder->select('*');
        $builder->where('id_place', $id);
        return $builder->get()->getRow();
    }
    public function getAllIdAndName()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_place');
        $builder->select('id_place, name_place');
        return $builder->get()->getResultArray();
    }
    
    
}
