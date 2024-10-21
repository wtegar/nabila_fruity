<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;
use App\Models\MetaModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {
        $lang = session()->get('lang') ?? 'id';

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
            'lang' => $lang
        ];

        // Ambil meta data untuk halaman 'home'
        $data['meta'] = $this->MetaModel->getMetaByPageName('Artikel');

        $data['canonicalUrl'] = base_url('/');

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set default title
        $data['Title'] = 'Artikel';

        return view('user/artikel/index', $data);
    }

    public function detail($slug)
    {
        $lang = session()->get('lang') ?? 'id'; // Default ke 'id' jika session lang tidak ada

        // Cari artikel berdasarkan slug_id atau slug_en
        $artikel = $this->ArtikelModel
            ->where('slug_id', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan slug $slug tidak ditemukan");
        }

        // Tentukan prefix berdasarkan bahasa (artikel untuk 'id' dan article untuk 'en')
        $url_prefix = $lang === 'id' ? 'artikel' : 'article';

        // Memilih slug berdasarkan prefix URL
        $correct_slug_id = $artikel->slug_id;
        $correct_slug_en = $artikel->slug_en;

        // Jika slug tidak sesuai dengan slug dalam bahasa saat ini, redirect ke slug yang benar
        if ($lang === 'id' && $slug !== $correct_slug_id) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_id}"));
        } elseif ($lang === 'en' && $slug !== $correct_slug_en) {
            return redirect()->to(base_url("{$lang}/{$url_prefix}/{$correct_slug_en}"));
        }

        // Tentukan judul dan deskripsi artikel sesuai bahasa yang dipilih
        if ($lang === 'id') {
            $judul_artikel = $artikel->judul_artikel; // Judul untuk bahasa Indonesia
            $deskripsi_artikel = $artikel->deskripsi_artikel; // Deskripsi untuk bahasa Indonesia
            $artikel_lain = $this->ArtikelModel->where('slug_id !=', $slug)->limit(4)->findAll(); // Artikel lain untuk bahasa Indonesia
        } else {
            $judul_artikel = $artikel->judul_artikel_en; // Judul untuk bahasa Inggris
            $deskripsi_artikel = $artikel->deskripsi_artikel_en; // Deskripsi untuk bahasa Inggris
            $artikel_lain = $this->ArtikelModel->where('slug_en !=', $slug)->limit(4)->findAll(); // Artikel lain untuk bahasa Inggris
        }

        // Set data untuk diteruskan ke view
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $artikel_lain, // Artikel lainnya berdasarkan bahasa
            'lang' => $lang,
            'judul_artikel' => $judul_artikel, // Menyesuaikan judul berdasarkan bahasa
            'deskripsi_artikel' => $deskripsi_artikel // Menyesuaikan deskripsi berdasarkan bahasa
        ];

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set default title berdasarkan judul artikel
        $data['Title'] = isset($judul_artikel) ? $judul_artikel : 'Detail Artikel';

        return view('user/artikel/detail', $data);
    }



    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'in' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = session('lang') === 'in' ?
            "Artikel dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Articles of $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
