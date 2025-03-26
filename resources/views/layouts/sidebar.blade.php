
<div class="sidebar" id="sidebar">
    <div class="small">Login Sebagai: </div>
                    <div class="u-text">
                        <h4>{{ Auth::user()->name }}

                        </h4>
                        <p class="">{{ Auth::user()->email }}</p>

                    </div>
                    <a href="/home" style="text-decoration: none;color: inherit;">
                        <h2 class="mt-2">Dashboard</h2>
                    </a>
    <ul>
        <li><a href="/tambahbuku">Tambah Buku</a></li>
        <li><a href="/caribuku">Cari Buku</a></li>
        <li><a href="/index">Kelola Buku</a></li>
        <li><a href="/peminjaman-index">Pinjam Buku</a></li>
    </ul>
</div>



