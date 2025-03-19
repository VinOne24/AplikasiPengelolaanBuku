<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $buku = Buku::all();

        return view('buku.index',compact('buku'));

    }
    public function create(){
        return view('buku.create');
    }
    public function store(Request $request){
        $kategori = $request->input('kategori');
        if($kategori == 'lainnya'){
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_terbit' => 'required',
                'kode_buku' => 'required',
                'kategoriLainnya' => 'required',
            ],[
            'judul.require' => '*Judul Buku Tidak Boleh Kosong',
            'penulis.require' => '*penulis tidak boleh kosong',
            'tahun_terbit' => '*tahun terbit tidak boleh kosong',
            'kategoriLainnya' => '*kategori Lainnya Harus Diisi',
            ]);
            $kategori = $request->input('kategoriLainnya');
        }else{
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_terbit' => 'required',
                'kode_buku' => 'required',
                'kategori' => 'required',
            ],[
            'judul.require' => '*Judul Buku Tidak Boleh Kosong',
            'penulis.require' => '*penulis tidak boleh kosong',
            'tahun_terbit' => '*tahun terbit tidak boleh kosong',
            'kategori' => '*kategori tidak boleh kosong',
            ]);
        }

        // $judul = $request->input('judul');
        // $penulis = $request->input('penulis');
        // $tahun = $request->input('tahun_terbit');
        // $kode = $request->input('kode_buku');
        // dd($judul,$penulis, $tahun, $kode, $kategori);
        $buku = Buku::create([
            'judul' => $request['judul'],
            'penulis' =>$request['penulis'],
            'tahun_terbit' => $request['tahun_terbit'],
            'buku_id' => $request['kode_buku'],
            'kategori' => $kategori,
        ]);
        $request->session()->flash('pesan', 'Berhasil Menambah data Buku');
        return redirect('/tambahbuku');
    }
}
