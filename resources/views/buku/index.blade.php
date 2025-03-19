@extends('layouts.app')

@section('content')
<div class="card mb-4">

    <table id="example" class="table table-striped" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">ID</th>
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
                <td>{{$item->id}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->penulis}}</td>
                <td>{{$item->tahun_terbit}}</td>
                <td>{{$item->kategori}}</td>
                <td>
                    <a href="/tambahbuku" type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                    <button type="button" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus
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
@endsection
