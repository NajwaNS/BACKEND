<?php

namespace App\Models;

class BeritaBerbahasa extends Berita
{
    // Tambahkan properti atau metode tambahan di sini
    protected $language;

    public function setLanguage($lang)
    {
        $this->language = $lang;
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
