<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\MetaModel;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;

class Productsctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'en';
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(), // Mengambil semua data produk, termasuk meta_title, meta_description, slug_id, dan slug_en
            'lang' => $lang
        ];

        // Ambil meta data untuk halaman 'Produk'
        $data['meta'] = $this->MetaModel->getMetaByPageName('Produk');
        $data['canonicalUrl'] = base_url('/products');

        helper('text');

        if (session('lang') === 'in') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);

            $data['Title'] = 'Produk';
            $teks = "Produk dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

            $data['Title'] = 'Products';
            $teks = "Products of $nama_perusahaan. $deskripsi_perusahaan";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/products/index', $data); // Mengirim data lengkap produk ke view
    }

    public function detail($slug)
    {
        $lang = session()->get('lang') ?? 'id';  // Set default language to Indonesian if no session is found.

        // Cari produk berdasarkan slug
        $produk = $this->ProdukModel->where('slug_id', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        // Jika produk tidak ditemukan, tampilkan halaman 404
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan slug $slug tidak ditemukan");
        }

        // Tentukan prefix berdasarkan bahasa (artikel untuk 'id' dan article untuk 'en')
        $url_prefix = $lang === 'id' ? 'produk' : 'product';

        // Memilih slug berdasarkan prefix URL
        $correct_slug_id = $produk->slug_id;
        $correct_slug_en = $produk->slug_en;

        // Jika slug tidak sesuai dengan slug dalam bahasa saat ini, redirect ke slug yang benar
        if ($lang === 'id' && $slug !== $correct_slug_id) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_id}"));
        } elseif ($lang === 'en' && $slug !== $correct_slug_en) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_en}"));
        }

        // Ambil produk berdasarkan slug
        $data['profil'] = $this->ProfilModel->findAll();
        $lang = session()->get('lang') ?? 'en';

        // Ambil produk berdasarkan slug yang sesuai
        if ($lang === 'id') {
            $data['tbproduk'] = $this->ProdukModel->where('slug_id', $slug)->first();
        } else {
            $data['tbproduk'] = $this->ProdukModel->where('slug_en', $slug)->first();
        }

        // Cek apakah produk ditemukan
        if (!$data['tbproduk']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan.');
        }

        helper('text');

        // Menentukan meta title dan description dari produk yang diambil
        $data['meta_title'] = $data['tbproduk']->meta_title ?? 'Produk Default Title';
        $data['meta_description'] = $data['tbproduk']->meta_description ?? 'Deskripsi default untuk produk.';

        if (session('lang') === 'in') {
            $nama_produk = $data['tbproduk']->nama_produk_in;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_in);

            $data['Title'] = $data['tbproduk']->nama_produk_in ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        } else {
            $nama_produk = $data['tbproduk']->nama_produk_en;
            $deskripsi_produk = strip_tags($data['tbproduk']->deskripsi_produk_en);

            $data['Title'] = $data['tbproduk']->nama_produk_en ?? '';
            $teks = "$nama_produk. $deskripsi_produk";
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/products/detail', $data); // Mengirim data lengkap produk ke view detail
    }
}
