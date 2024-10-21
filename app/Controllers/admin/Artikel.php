<?php

namespace App\Controllers\admin;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    private $artikelModel;

    private function generateSlug($string)
    {
        // Mengubah judul menjadi huruf kecil
        $slug = strtolower($string);

        // Menghapus karakter yang tidak diinginkan (selain huruf, angka, dan spasi)
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

        // Mengganti spasi dengan tanda hubung
        $slug = preg_replace('/[\s-]+/', '-', trim($slug));

        return $slug;
    }


    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'artikels' => $this->artikelModel->findAll(),
        ];

        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        return view('admin/artikel/tambah', [
            'validation' => $this->validator
        ]);
    }

    public function proses_tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        if (!$this->validate([
            'foto_artikel' => [
                'rules' => 'uploaded[foto_artikel]|is_image[foto_artikel]|max_dims[foto_artikel,572,572]|mime_in[foto_artikel,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 572x572 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $file_foto = $this->request->getFile('foto_artikel');
            $currentDateTime = date('dmYHis');
            $newFileName = "{$currentDateTime}.{$file_foto->getExtension()}";
            $file_foto->move('asset-user/images', $newFileName);

            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'judul_artikel_en' => $this->request->getPost('judul_artikel_en'),
                'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
                'deskripsi_artikel_en' => $this->request->getPost('deskripsi_artikel_en'),
                'foto_artikel' => $newFileName,
                'slug_id' => $this->generateSlug($this->request->getPost('judul_artikel')), 
                'slug_en' => $this->generateSlug($this->request->getPost('judul_artikel_en')),
                'meta_title_id' => $this->request->getPost('meta_title_id'),
                'meta_description_id' => $this->request->getPost('meta_description_id'),
                'meta_title_en' => $this->request->getPost('meta_title_en'),
                'meta_description_en' => $this->request->getPost('meta_description_en'),
            ];

            $this->artikelModel->insert($data);

            return redirect()->to(base_url('admin/artikel'));
        }
    }

    public function edit($id_artikel)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $artikelData = $this->artikelModel->find($id_artikel);
        $validation = \Config\Services::validation();

        return view('admin/artikel/edit', [
            'artikelData' => $artikelData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_artikel = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        if (!$id_artikel) {
            return redirect()->back();
        }

        $file_foto = $this->request->getFile('foto_artikel');

        if ($file_foto->isValid()) {
            $artikelData = $this->artikelModel->find($id_artikel);
            $oldFilePath = 'asset-user/images/' . $artikelData->foto_artikel;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $newFileName = $file_foto->getRandomName();
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            $artikelData = $this->artikelModel->find($id_artikel);
            $newFileName = $artikelData->foto_artikel;
        }

        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'deskripsi_artikel' => $this->request->getPost('deskripsi_artikel'),
            'judul_artikel_en' => $this->request->getPost('judul_artikel_en'),
            'deskripsi_artikel_en' => $this->request->getPost('deskripsi_artikel_en'),
            'foto_artikel' => $newFileName,
            'slug_id' => $this->generateSlug($this->request->getPost('judul_artikel')), 
            'slug_en' => $this->generateSlug($this->request->getPost('judul_artikel_en')),
            'meta_title_id' => $this->request->getPost('meta_title_id'),
            'meta_description_id' => $this->request->getPost('meta_description_id'),
            'meta_title_en' => $this->request->getPost('meta_title_en'),
            'meta_description_en' => $this->request->getPost('meta_description_en'),
        ];

        $this->artikelModel->update($id_artikel, $data);

        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function delete($id = false)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $data = $this->artikelModel->find($id);
        unlink('asset-user/images/' . $data->foto_artikel);
        $this->artikelModel->delete($id);

        return redirect()->to(base_url('admin/artikel/index'));
    }
}
