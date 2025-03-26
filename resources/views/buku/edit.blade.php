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
    <h1>Form Edit Buku</h1>
    <form action="/buku/{{$buku->id}}/update" method="post">
        {{ csrf_field() }}


        <div class="form-group">
            <label for="judul">Judul Buku:</label>
            @error('judul')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <input type="text" id="judul" name="judul" value="{{ old('judul',$buku->judul) }}">
        </div>

        <div class="form-group">
            <label for="penulis">Penulis:</label>
            @error('penulis')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis',$buku->penulis) }}">
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            @error('tahun_terbit')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input type="date" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit',$buku->tahun_terbit) }}">
        </div>

        <div class="form-group">
            <label for="kode_buku">Kode Buku:</label>
            @error('buku_id')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <input disabled type="text" id="buku_id" name="buku_id" value="{{ old('buku_id',$buku->buku_id) }}">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori (Pilih lainnya jika kategori tidak tersedia):</label>
            @error('kategori')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            @error('kategoriLainnya')
            <div class="error-message"> {{ $message }}</div>
            @enderror
            <select id="kategori" name="kategori" onchange="toggleInputLainnya()">
                <option value="{{ old('kategori',$buku->kategori) }}">{{$buku->kategori}}</option>
                <option value="fiksi">Fiksi</option>
                <option value="non-fiksi">Non-Fiksi</option>
                <option value="sains">Sains</option>
                <option value="sejarah">Sejarah</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <!-- Field input tambahan yang akan muncul saat "Lainnya" dipilih -->
        <div class="form-group" id="inputLainnya" style="display: none;">
            <label for="kategoriLainnya">Masukkan kategori lainnya:</label>
            <input type="text" id="kategoriLainnya" name="kategoriLainnya" placeholder="Masukkan kategori Buku Yang Sesuai">
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
<script>
    function toggleInputLainnya() {
        const selectKategori = document.getElementById('kategori');
        const inputLainnya = document.getElementById('inputLainnya');

        if (selectKategori.value === 'lainnya') {
            inputLainnya.style.display = 'block';
        } else {
            inputLainnya.style.display = 'none';
        }
    }

    // Menggabungkan nilai sebelum form dikirim
    document.querySelector('form').addEventListener('submit', function(event) {
        const selectKategori = document.getElementById('kategori');
        const inputLainnya = document.getElementById('kategoriLainnya');

        // Jika "Lainnya" dipilih dan ada input, ganti nilai select dengan input
        if (selectKategori.value === 'lainnya' && inputLainnya.value.trim() !== '') {
            selectKategori.value = inputLainnya.value.trim();
        }
    });
</script>
@endsection
