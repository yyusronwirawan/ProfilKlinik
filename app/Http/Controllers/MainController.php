<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Dokter;
use App\Models\Elibrary;
use App\Models\Fasilitas_Layanan;
use App\Models\Folder;
use App\Models\JadwalDokter;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Galeri;
use App\Models\Layanan_poliklinik;
use App\Models\LayananImage;
use App\Models\Partnership;
use App\Models\KategoriGaleri;
use App\Models\YtLink;

class MainController extends Controller
{
    public function index()
    {
        return view('/beranda', [
            'tittle' => 'Beranda',
            'posts' => Blog::latest()->paginate(3),
            'banners' => Banner::all(),
            'galeris' => Galeri::paginate(6),
            'partnership' => Partnership::paginate(6),
            'links' => YtLink::paginate(1),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function tentang()
    {
        return view('/tentang', [
            'tittle' => 'Tentang Kami',
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function profilDokter()
    {
        return view('dokter/profilDokter', [
            'tittle' => "Profil Dokter",
            'datas' => Dokter::paginate(6),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function jadwalDokter()
    {
        return view('dokter/jadwal', [
            'tittle' => 'Jadwal Dokter',
            'dokters' => Dokter::latest()->filter(request(['search', 'poliklinik']))->paginate(7),
            'poliklinik' => Layanan_poliklinik::all(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function profilDokterDetail(Dokter $dokter)
    {
        return view('dokter/profilDokterSingle', [
            'tittle' => "profil Dokter",
            'jadwal' => JadwalDokter::where('dokter_id', $dokter->id)->first(),
            'data' => $dokter,
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    // bagian layanan

    public function layananIndex()
    {
        return view('layanan/layananData', [
            'tittle' => 'Layanan',
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    // layanan poliklinik

    public function layananPoliklinik()
    {
        return view('layanan/layananPoliklinik', [
            'tittle' => 'Layanan',
            'poliklinik' => Layanan_poliklinik::all(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function layananPoliklinikDetail(Layanan_poliklinik $layanan_poliklinik)
    {
        return view('layanan/layananPoliklinikDetail', [
            'tittle' => 'Layanan',
            'poliklinik' => $layanan_poliklinik,
            'dokters' => Dokter::where('poliklinik_id', $layanan_poliklinik->id)->get(),
            'images' => LayananImage::where('layanan_id', $layanan_poliklinik->id)->get(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    // fasilitas layanan
    public function fasilitasLayanan()
    {
        return view('layanan/fasilitaslayanan', [
            'tittle' => 'Layanan',
            'fasilitas' => Fasilitas_Layanan::latest()->filter(request(['search']))->paginate(6),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    // elibrary
    public function elibraryIndex()
    {
        return view('elibrary/elibrary', [
            'tittle' => 'E-Library',
            'libraries' => Elibrary::latest()->filter(request(['search']))->paginate(6),
            'folder' => Folder::all(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }


    // karir
    public function karirIndex()
    {
        return view('karir/karirGuest', [
            'tittle' => 'Karir',
            'lowongan' => Lowongan::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function karirShow(Lowongan $lowongan)
    {
        return view('karir/karirGuestDetail', [
            'tittle' => 'Karir',
            'lowongan' => $lowongan,
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_pelamar' => 'required|max:255',
            'lowongan_id' => 'required',
            'no_hp' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
            'tentang_pelamar' => 'required|max:500',
            'cv' => 'required|file|max:2048|mimes:pdf',
        ]);

        $fileName = time() . '.' . $request->cv->extension();
        $request->cv->move(public_path('file/file-lamaran'), $fileName);

        Lamaran::create([
            'nama_pelamar' => $request->nama_pelamar,
            'lowongan_id' => $request->lowongan_id,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tentang_pelamar' => $request->tentang_pelamar,
            'cv' => $fileName,
        ]);

        Lamaran::create($validatedData);

        return redirect('/karir')->with('pesan', 'Lamaran Berhasil di Apply');
    }

    public function galeriIndex()
    {
        return view('galeri/galeriGuest', [
            'tittle' => 'Galeri',
            'galeris' => Galeri::latest()->filter(request(['search']))->paginate(9)->withQueryString(),
            'kategories' => KategoriGaleri::all(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }

    public function partnerIndex()
    {
        return view('partnership/partnership', [
            'tittle' => 'Our Partnership',
            'partnership' => Partnership::all(),
            'lyn' => Layanan_poliklinik::paginate(5)
        ]);
    }
}
