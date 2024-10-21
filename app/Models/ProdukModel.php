<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tb_produk'; // Nama tabel
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    
    // Tambahkan semua kolom yang diinginkan ke dalam allowedFields
    protected $allowedFields = [
        'nama_produk_in', 
        'nama_produk_en', 
        'deskripsi_produk_in', 
        'deskripsi_produk_en', 
        'foto_produk',
        'meta_title',          // Menambahkan meta_title
        'meta_title_en',       // Menambahkan meta_title_en
        'meta_description',    // Menambahkan meta_description
        'meta_description_en', // Menambahkan meta_description_en
        'slug_id',             // Menambahkan slug_id
        'slug_en'              // Menambahkan slug_en
    ];

    // Method untuk generate slug
    public function generateSlug($nama_produk)
    {
        return url_title($nama_produk, '-', true);
    }

    // Override fungsi insert untuk memastikan slug di-generate sebelum disimpan
    public function insert($data = null, bool $returnID = true)
    {
        if (isset($data['nama_produk_in'])) {
            $data['slug_id'] = $this->generateSlug($data['nama_produk_in']);
        }

        if (isset($data['nama_produk_en'])) {
            $data['slug_en'] = $this->generateSlug($data['nama_produk_en']);
        }

        return parent::insert($data, $returnID);
    }

    // Override fungsi update untuk memastikan slug di-generate jika nama produk berubah
    public function update($id = null, $data = null): bool
    {
        if (isset($data['nama_produk_in'])) {
            $data['slug_id'] = $this->generateSlug($data['nama_produk_in']);
        }

        if (isset($data['nama_produk_en'])) {
            $data['slug_en'] = $this->generateSlug($data['nama_produk_en']);
        }

        return parent::update($id, $data); // Memanggil method parent agar tetap kompatibel
    }
}
