<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Folder;
use App\Models\Galeri;
use App\Models\Elibrary;
use App\Models\JadwalDokter;
use App\Models\LayananImage;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use App\Models\Fasilitas_Layanan;
use App\Models\KategoriGaleri;
use App\Models\Layanan_poliklinik;
use App\Models\Partnership;
use App\Models\YtLink;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Dev User
        User::create([
            'nama' => 'Cha Eun Woo',
            'role' => '1',
            'email' => 'mahkotonagano@gmail.com',
            'username' => 'kusuka',
            'image' => '1676100893.jpg',
            'password' => bcrypt('123456')
        ]);

        Layanan_poliklinik::create([
            'poliklinik' => 'Spesialis Bedah Anak',
            'slug' => 'spesialis-bedah-anak',
            'ket' => '<div>ini poliklinik spesialis bedah anak</div>',
        ]);
        Layanan_poliklinik::create([
            'poliklinik' => 'Spesialis Urologi',
            'slug' => 'spesialis-urologi',
            'ket' => '<div>ini poliklinik spesialis urologi</div>',
        ]);


        // folder
        Folder::create([
            'nama_folder' => 'Tips kesehatan'
        ]);
        Folder::create([
            'nama_folder' => 'Buku Pembelajaran'
        ]);


        // gallery Categories
        KategoriGaleri::create([
            'galeri_kategori' => 'Pelatihan BTCLS',
        ]);
        KategoriGaleri::create([
            'galeri_kategori' => 'Penanggulangan Covid-19',
        ]);
        KategoriGaleri::create([
            'galeri_kategori' => 'Vaksin Booster',
        ]);
        KategoriGaleri::create([
            'galeri_kategori' => 'Pengabdian Masyarakat',
        ]);

        // kategori post
        PostCategory::create([
            'kategori' => 'Info kesehatan',
            'slug' => 'info-kesehatan'
        ]);
        PostCategory::create([
            'kategori' => 'Tips kesehatan',
            'slug' => 'tips-kesehatan'
        ]);
        PostCategory::create([
            'kategori' => 'Hot News',
            'slug' => 'hot-news'
        ]);

        YtLink::create([
            'title' => 'Pencegahan Hidrosefalus',
            'embed_link' => 'https://www.youtube.com/embed/VGtIP0iQmcY',
        ]);
    }
}
