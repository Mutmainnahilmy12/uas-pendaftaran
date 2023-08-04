<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PendaftaranModel;

class Pendaftaran extends BaseController
{
    protected $pm;
    private $menu;
    public function __construct()
    {
        $this->pm = new PendaftaranModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=>'',
            ],
            'pendaftar' => [
                'title' => 'Pendaftar',
                'link' => base_url() . '/pendaftar',
                'icon' => 'fa-solid fa-person',
                'aktif'=>'',
            ],
            'asal sekolah' => [
                'title' => 'tanggal pendaftaran',
                'link' => base_url() . '/tanggal Pendaftaran',
                'icon' => 'fa-solid fa-sheet-plastic',
                'aktif'=>'active',
            ]

            'tanggal pendaftaran' => [
                    'title' => 'tanggal pendaftaran',
                    'link' => base_url() . '/tanggal pendaftaran',
                    'icon' => 'fa-regular fa-clock ',
                    'aktif'=>'active',
            ],
        ];    
    }

    public function index()
    {
        

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Pendaftaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href ="' . base_url() . '">Pendaftaran</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumn'] = $breadcrumb;
        $data['title_card'] = "Data Pendaftaran";

        $query = $this->pm->find();
        $data['Data_Pendaftaran'] = $query;
        return view('Pendaftaran/content', $data);
    }

    function tambah()
    { 
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Pendaftaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href ="' . base_url() . '">Pendaftaran</a></li>
                            <li class="breadcrumb-item">< a href="' . base_url() . '">Pendaftaran</a></li>
                            <li class="breadcrumb-item active">Tambah data Pendaftaran</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Data pendaftaran';
        $data['action'] = base_url() . '/pendaftaran/simpan';
        return view('pendaftaran/input', $data);
    }

    public function simpan()
    {
        $dt = $this->request->getPost();
        dd($dt);
    }
}
