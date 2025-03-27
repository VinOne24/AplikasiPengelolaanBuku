@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div>
        @if(session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
    </div>
    <div class="">
        Tabel pinjam Buku Buku
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Judul Buku</th>
                <th style="text-align: center">Pemilik Buku</th>
                <th style="text-align: center">Tanggal Pinjam</th>
                <th style="text-align: center">Tanggal Kembali</th>
                <th style="text-align: center">Kategori</th>
                <th style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pinjam as $key => $item)

            <tr>
                <th scope="row">{{$key + 1}}</th>
                @php
                // Ambil semua user
                $users = \App\Models\User::where('id',$item->kode_buku)->first();
                $kode = $users->name;
                // dd($users);
                @endphp
                <td>{{$item->judul}}</td>
                <td>{{$kode}}</td>
                <td>{{$item->tanggal_pinjam}}</td>
                <td>{{$item->tanggal_kembali}}</td>
                <td>{{$item->kategori}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infomodal{{ $item->id }}">
                        <i class="fas fa-plus"></i>Info
                    </button>
                    <a href="#" type="button" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </td>
            </tr>

            <div class="modal fade" id="infomodal{{ $item->id }}" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="bookModalLabel">
                                <i class="fas fa-book me-2"></i>Detail Buku
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <!-- Kolom Kover Buku -->
                                <div class="col-md-4 text-center">
                                    <img src="{{ $item->cover_url ?? 'https://via.placeholder.com/200x300?text=No+Cover' }}"
                                         class="img-fluid rounded shadow mb-3"
                                         alt="Cover Buku"
                                         style="max-height: 300px;">
                                    <div class="badge bg-info text-dark fs-6 mb-2">
                                        {{ $item->kategori->nama ?? 'Umum' }}
                                    </div>
                                </div>

                                <!-- Kolom Informasi Buku -->
                                <div class="col-md-8">
                                    <h3 class="fw-bold text-primary">{{ $item->judul }}</h3>
                                    <p class="text-muted">
                                        <i class="fas fa-user-edit me-1"></i>
                                        <span class="fw-semibold">Penulis:</span>
                                        {{ $item->penulis ?? 'Penulis Tidak Diketahui' }}
                                    </p>

                                    <div class="book-details mt-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span><i class="fas fa-calendar-alt me-2"></i>Tahun Terbit</span>
                                                <span class="badge bg-warning text-dark">{{ $item->tahun_terbit }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span><i class="fas fa-id-badge me-2"></i>Kode Buku</span>
                                                <span class="font-monospace">{{ $item->kode_buku ?? '-' }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span><i class="fas fa-building me-2"></i>Penerbit</span>
                                                <span>{{ $item->penerbit ?? 'Tidak Diketahui' }}</span>
                                            </li>
                                            @php
                                                $buku = \App\Models\Buku::where('id',$item->buku_id)->first();
                                                $kode = $buku->deskripsi;
                                                // dd($kode);
                                            @endphp
                                            <li class="list-group-item">
                                                <span><i class="fas fa-align-left me-2"></i>Deskripsi</span>
                                                <p class="mt-2">{{ $kode ?? 'Tidak ada deskripsi' }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Tutup
                            </button>
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-1"></i> Pinjam Buku
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @empty

            @endforelse
            <!-- Tambahkan baris data lainnya di sini -->
        </tbody>

    </table>
</div>


<div class="card mb-4">
    <div>
        @if(session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
    </div>
    <div class="">
        Tabel Peminjaman Buku
    </div>
    <table id="example1" class="table table-striped" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Nama Peminjam</th>
                <th style="text-align: center">Pemilik Buku</th>
                <th style="text-align: center">Judul</th>
                <th style="text-align: center">Penulis</th>
                <th style="text-align: center">Tahun Terbit</th>
                <th style="text-align: center">Kategori</th>
                <th style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peminjam as $key => $item)

            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->nama_peminjam}}</td>
                @php
                // Ambil semua user
                $users = \App\Models\User::where('id',$item->kode_buku)->first();
                $kode = $users->name;
                // dd($users);
                @endphp
                <td>{{$kode}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->penulis}}</td>
                <td>{{$item->tahun_terbit}}</td>
                <td>{{$item->kategori}}</td>
                <td>
                    <a href="" type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Acc
                    </a>
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Tolak
                    </button>
                </td>
            </tr>
            @empty

            @endforelse
            <!-- Tambahkan baris data lainnya di sini -->
        </tbody>

    </table>
</div>

<!-- Sertakan jQuery dan DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            paging: true, // Aktifkan pagination
            searching: true, // Aktifkan fitur pencarian
            ordering: true, // Aktifkan pengurutan
            info: true, // Tampilkan informasi jumlah data
            responsive: true // Aktifkan responsif
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            paging: true, // Aktifkan pagination
            searching: true, // Aktifkan fitur pencarian
            ordering: true, // Aktifkan pengurutan
            info: true, // Tampilkan informasi jumlah data
            responsive: true // Aktifkan responsif
        });
    });
</script>
@endsection
