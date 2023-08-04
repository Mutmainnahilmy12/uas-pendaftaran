<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\pendaftarModel;

class pendaftar extends BaseController
{
    protected $am;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->am = new pendaftarModel();

        $this->menu =[
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=>'',
            ],
            'pendaftar' => [
                'title' => 'pendaftar',
                'link' => base_url() . '/pendaftar',
                'icon' => 'fa-solid fa-person',
                'aktif'=>'active',
            ],
            'pendaftaran' => [
                'title' => 'Pendaftaran',
                'link' => base_url() . '/pendaftaran',
                'icon' => 'fa-solid fa-book',
                'aktif'=>'',
            ],
        ];

        $this->rules = [
            'id_pendaftar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id pendaftar tidak boleh kosong',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat tidak boleh kosong',
                ]
            ],
            'tanggal daftar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal daftar tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ]
            ],
        ];
    }

    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">pendaftar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href ="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item active">Pendaftar</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumn'] = $breadcrumb;
        $data['title_card'] = "Data Pendaftar";

        $query = $this->am->find();
        $data ['data_pendaftar'] = $query;
        return view('pendaftar/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">pendaftar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href ="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/pendaftar">pendaftar</a></li>
                                <li class="breadcrumb-item active">Tambah pendaftar</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah pendaftar';
        $data['action'] = base_url() . '/pendaftar/simpan';
        return view('pendaftar/input', $data);
    }

    public function simpan()
    {
        
        if (! $this->request->is('post')) {
            
            return redirect()->back()->withInput();
        }

        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->am->insert($dt);
            return redirect()->to('pendaftar')->with('success', 'Data berhasil disimpan');

        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }    
    }

    public function hapus($id) 
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan');
        }

        try {
            $this->am->delete($id);
            return redirect()->to('pendaftar')->with('success', 'Data pendaftar dengan kode '.$id.'berhasil dihapus');

        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            return redirect()->to('pendaftar')->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">pendaftar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href ="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/pendaftar">pendaftar</a></li>
                                <li class="breadcrumb-item active">Edit pendaftar</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit pendaftar';
        $data['action'] = base_url() . '/pendaftar/update';

        $data['edit_data'] =$this->am->find($id);
        return view('pendaftar/input', $data);
    }

    public function update() {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['password']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withinput();
        }

        if (empty($dtEdit['password'])) {
            unset($dtEdit['password']);
        }

        try {
            $this->am->update($param, $dtEdit);
            return redirect()->to('pendaftar')->with('success', 'Data berhasil di Update');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirec()->back()->withInput();
        }
    }
}
