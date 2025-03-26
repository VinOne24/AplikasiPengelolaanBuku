@extends('layouts.app')

@section('content')
<style>
    .form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    margin:  auto; /* membuat container menjadi di tengah (0 auto; akan membuat margin top dan bottom menjadi 0px)*/
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        border-style: dashed;
    }

    /* button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    } */
    .error-message {
    color: red; /* Warna teks merah */
    font-size: 14px; /* Ukuran font */
    margin-top: 5px; /* Jarak dari elemen di atasnya */
    }
</style>
<div class="form-container">
    <div>
        @if(session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
    </div>
    <h1>Form Peminjaman Buku</h1>
    <form action="/pinjambuku/peminjaman" method="post">
        @csrf

        <input id="id" name="id" type="text" hidden value="{{$buku->id}}">
        <input id="id" name="id_peminjam" type="text" hidden value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="tahun_terbit">Lama Peminjaman:</label>
            @error('tanggal_pinjam')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Tanggal mulai peminjaman">
            << Sampai Dengan >>
            @error('tanggal_kembali')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="date" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal mulai peminjaman">
        </div>

        <div class="form-group">
            <label for="judul">Nama Peminjam:</label>
            @error('judul')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="text" id="nama_peminjam" name="nama_peminjam" readonly value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <label for="judul">Judul Buku:</label>
            @error('judul')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="text" id="judul" name="judul" readonly value="{{ $buku->judul }}">
        </div>
        <div class="form-group">
            <label for="penulis">Penulis:</label>
            @error('penulis')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input type="text" id="penulis" name="penulis" readonly value="{{ $buku->penulis }}">
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            @error('tahun_terbit')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input type="date" id="tahun_terbit" name="tahun_terbit" readonly value="{{ $buku->tahun_terbit }}">
        </div>

        <div class="form-group">
            <label for="buku_id">Kode Buku:</label>
            @error('user_id')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input type="text" id="user_id" name="user_id" readonly value="{{ $buku->user_id }}">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori (Pilih lainnya jika tidak ada kategori):</label>
            @error('kategori')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            @error('kategoriLainnya')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <select readonly id="kategori" name="kategori" onchange="toggleInputLainnya()">
                <option value="{{$buku->kategori}}">{{$buku->kategori}}</option>
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

@endsection
