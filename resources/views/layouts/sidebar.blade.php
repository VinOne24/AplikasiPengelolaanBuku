
<div class="sidebar" id="sidebar">
    <div class="small">Login Sebagai: </div>
                    <div class="u-text">
                        <h4>{{ Auth::user()->name }}

                        </h4>
                        <p class="">{{ Auth::user()->email }}</p>

                    </div>
    <h2 class="mt-2">Dashboard</h2>
    <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Profil</a></li>
        <li><a href="#">Laporan</a></li>
        <li><a href="#">Pengaturan</a></li>
    </ul>
</div>



