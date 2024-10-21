<?php

namespace App\Controllers\admin;

use App\Models\MetaModel;
use App\Models\ProdukModel;

class MetaController extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $metamodel = new MetaModel();
        $meta = $metamodel->findAll();
        $validation = \Config\Services::validation();
        return view('admin/meta/index', [
            'meta' => $meta,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $metamodel = new MetaModel();
        $meta = $metamodel->findAll();
        $validation = \Config\Services::validation();
        return view('admin/meta/tambah', [
            'meta' => $meta,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }


        $metaModel = new MetaModel();
        $data = [
            'nama_halaman' => $this->request->getVar("nama_halaman"),
            'meta_title' => $this->request->getVar("meta_title"),
            'meta_description' => $this->request->getVar("meta_description"),
            'canonical_url' => $this->request->getVar("canonical_url"),

        ];
        $metaModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/meta/index'));
    }

    // Meta.php (Controller)

    public function edit($id_seo)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }

        $metaModel = new MetaModel();
        $metaData = $metaModel->find($id_seo);
        $validation = \Config\Services::validation();

        // Jika data meta tidak ditemukan
        if (!$metaData) {
            session()->setFlashdata('error', 'Data Meta tidak ditemukan.');
            return redirect()->to(base_url('admin/meta/index'));
        }

        return view('admin/meta/edit', [
            'metaData' => $metaData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_seo = null)
    {
        // Jika ID Meta tidak ada, kembalikan ke halaman sebelumnya
        if (!$id_seo) {
            return redirect()->back();
        }

        $metaModel = new MetaModel();
        $metaData = $metaModel->find($id_seo);

        // Jika data meta tidak ditemukan
        if (!$metaData) {
            session()->setFlashdata('error', 'Data Meta tidak ditemukan.');
            return redirect()->to(base_url('admin/meta/index'));
        }

        // Validasi input form
        $validation = $this->validate([
            'nama_halaman' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            
        ]);

        if (!$validation) {
            session()->setFlashdata('error', 'Terdapat kesalahan pada input. Silakan cek kembali.');
            return redirect()->back()->withInput();
        }

        // Ambil data yang dimasukkan pengguna
        $nama_halaman = $this->request->getVar("nama_halaman");
        $meta_title = $this->request->getVar("meta_title");
        $meta_description = $this->request->getVar("meta_description");
        $canonical_url = $this->request->getVar("canonical_url");

        // Persiapkan data untuk diupdate
        $data = [
            'nama_halaman' => $nama_halaman,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'canonical_url' => $canonical_url
        ];

        // Update data meta di database
        $metaModel->where('id_seo', $id_seo)->set($data)->update();

        // Flash success message dan redirect
        session()->setFlashdata('success', 'Meta berhasil diperbarui.');
        return redirect()->to(base_url('admin/meta/index'));
    }





    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $produkModel = new ProdukModel();

        $data = $produkModel->find($id);

        unlink('asset-user/images/' . $data->foto_produk);

        $produkModel->delete($id);

        return redirect()->to(base_url('admin/produk/index'));
    }
}
