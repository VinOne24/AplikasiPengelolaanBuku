{{-- <style>
    .sb-topnav.navbar.navbar-expand {
    background-color: #2c3e50; /* Warna latar belakang */
    /* color: #fff; Warna teks (opsional, agar teks terlihat jelas) */
    border-radius: 1px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      /* color: black; */
      padding: 12px 16px;
      text-decoration: none;

    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }
  </style>
<nav class="sb-topnav navbar navbar-expand ">
    <a class="navbar-brand ps-3" href="/dashboard">APLIKASI PENGELOLAAN BUKU
    </a>

    {{-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> --}}

    <div class="dropdown">
        <button class="dropbtn btn btn-dark" onclick="toggleDropdown()"><i class="dropbtn fas fa-user fa-fw" onclick="toggleDropdown()"></i></button>
        <div class="dropdown-content" id="myDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
        </div>
      </div>
</nav>
<script>
    function toggleDropdown() {
      var dropdown = document.getElementById("myDropdown");
      if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
      } else {
        dropdown.style.display = "none";
      }
    }

    // Tutup dropdown jika klik di luar dropdown
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.style.display === "block") {
            openDropdown.style.display = "none";
          }
        }
      }
    }
  </script>
<script>
    window.addEventListener('DOMContentLoaded', event => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
