<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\peminjaman;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $buku = Buku::where('user_id',$user_id)->get();

        return view('buku.index',compact('buku'));

    }
    public function create(){
        return view('buku.create');
    }
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $kategori = $request->input('kategori');
        if($kategori == 'lainnya'){
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_terbit' => 'required',
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
                'kategori' => 'required',
            ],[
            'judul.require' => '*Judul Buku Tidak Boleh Kosong',
            'penulis.require' => '*penulis tidak boleh kosong',
            'tahun_terbit' => '*tahun terbit tidak boleh kosong',
            'kategori' => '*kategori tidak boleh kosong',
            ]);
        }
        $buku = Buku::create([
            'judul' => $request['judul'],
            'penulis' =>$request['penulis'],
            'tahun_terbit' => $request['tahun_terbit'],
            'buku_id' => $user_id,
            'kategori' => $kategori,
        ]);
        $request->session()->flash('pesan', 'Berhasil Menambah data Buku');
        return redirect('/tambahbuku');
    }
    public function edit($id){
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $kategori = $request->input('kategori');
        if($kategori == 'lainnya'){
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_terbit' => 'required',
                'kategoriLainnya' => 'required',
            ],[
            'judul.require' => '*Judul Buku Tidak Boleh Kosong',
            'penulis.require' => '*penulis tidak boleh kosong',
            'tahun_terbit.require' => '*tahun terbit tidak boleh kosong',
            'kategoriLainnya.require' => '*kategori Lainnya Harus Diisi',
            ]);
            $kategori = $request->input('kategoriLainnya');
        }else{
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_terbit' => 'required',
                'kategori' => 'required',
            ],[
            'judul.require' => '*Judul Buku Tidak Boleh Kosong',
            'penulis.require' => '*penulis tidak boleh kosong',
            'tahun_terbit.require' => '*tahun terbit tidak boleh kosong',
            'kategori.require' => '*kategori tidak boleh kosong',
            ]);
        }
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->buku_id = $user_id;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->kategori = $kategori;
        $buku->save();
        $request->session()->flash('pesan', 'Berhasil Mengedit data Buku');
        return redirect('/index');
    }

    public function cari(){
        $buku = Buku::all();
        return view('buku.cari',compact('buku'));
    }
    public function pinjam($id){
        $buku = Buku::find($id);
        return view('buku.pinjam', compact('buku'));
    }
    public function peminjaman(Request $request){
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ],[
        'tanggal_pinjam.require' => '*tanggal_pinjam Buku Tidak Boleh Kosong',
        'tanggal_kembali.require' => '*tanggal_kembali Buku tidak boleh kosong',
        ]);

        $pinjam = peminjaman::create([
            'nama_peminjam' => $request['nama_peminjam'],
            'user_id' => $request['id_peminjam'],
            'judul' => $request['judul'],
            'penulis' =>$request['penulis'],
            'tanggal_pinjam' =>$request['tanggal_pinjam'],
            'tanggal_kembali' =>$request['tanggal_kembali'],
            'tahun_terbit' => $request['tahun_terbit'],
            'buku_id' => $request['id'],
            'kategori' => $request['kategori'],
            'kode_buku' => $request['user_id'],
        ]);
        $request->session()->flash('pesan', 'Berhasil Menambah data pinjam Buku');
        return redirect('/caribuku');

    }
    public function peminjamanindex(){
        $user_id = Auth::user()->id;
        $pinjam = Peminjaman::where('user_id',$user_id)->get();
        $peminjam = Peminjaman::where('kode_buku',$user_id)->get();

        return view('buku.peminjaman',compact('pinjam','peminjam'));
    }
}
