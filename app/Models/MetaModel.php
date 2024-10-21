<?php

namespace App\Models;

use CodeIgniter\Model;

class MetaModel extends Model
{
    protected $table = 'tb_meta';
    protected $primaryKey = 'id_seo';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_halaman', 'meta_title', 'meta_description', 'canonical_url'];

    public function getMetaByPageName($nama_halaman)
    {
        return $this->where('nama_halaman', $nama_halaman)->first();
    }
}
