<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=>'',
            ],
            'pendaftar' => [
                'title' => 'Pendaftar',
                'link' => base_url() . '/anggota',
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

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumn'] = $breadcrumb;
        $data['title_card'] = "Welcome to Online Registration School";
        $data['Selamat_datang'] = "Selamat Datang di Aplikasi Pendaftaran Sekolah Online";
        return view('template/content', $data);
    }
    
}
