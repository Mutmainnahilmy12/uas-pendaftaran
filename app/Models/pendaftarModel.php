<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pendaftar';
    protected $primaryKey       = 'id_Pendaftar';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_Pendaftar', 'nama', 'alamat', 'Asal Sekolah', 'password'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

}
