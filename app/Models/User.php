<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = "user";
    protected $primaryKey = "email";
    protected $allowedFields = ['username', 'password', 'nama_lengkap', 'token'];

    /**
     * untuk ambil data
     */
    public function getData($parameter)
    {
        $builder = $this->table($this->table); // this->table yang pertama adalah fungsi CI4
        $builder->where('username', $parameter); // where dan orWhere merupakan fungsi query CI4
        $builder->orWhere('email', $parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }

    /**
     * untuk update / simpan data
     */
    public function updateData($data)
    {
        $builder = $this->table($this->table);
        if ($builder->save($data)) {
            return true;
        } else {
            return false;
        }
    }
}