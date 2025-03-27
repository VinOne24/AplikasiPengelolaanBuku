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
    <table id="example" class="table table-striped" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Kode Buku : Pemilik</th>
                <th style="text-align: center">Judul</th>
                <th style="text-align: center">Penulis</th>
                <th style="text-align: center">Tahun Terbit</th>
                <th style="text-align: center">Kategori</th>
                <th style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $key => $item)

            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$item->user_id}}:{{ Auth::user()->name }}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->penulis}}</td>
                <td>{{$item->tahun_terbit}}</td>
                <td>{{$item->kategori}}</td>
                <td>
                    <a href="/tambahbuku" type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                    <a href="/buku/{{ $item->id }}/edit" type="button" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $item->id }}">
                        <i
                    class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="deletemodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah kamu yakin utuk menghapus data Buku {{$item->judul}}?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Setelah menghapus Data Buku kamu tidak dapat mengembalikannya !!!
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="/buku/{{ $item->id }}/delete" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit"
                            value="Delete"class="btn btn-danger btn-border">
                    </form>
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
@endsection
