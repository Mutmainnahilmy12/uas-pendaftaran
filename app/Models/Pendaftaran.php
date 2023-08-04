<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pendaftaran';
    protected $primaryKey       = 'Id_pendaftar';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['Id_Pendaftar', 'Alamat', 'Tanggal Pendaftaran', 'Tanggal Verifikasi'];

}
