<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-book-half"></i> Perpustakaan
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDataBuku"
            aria-controls="navbarDataBuku" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarDataBuku">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-journal-bookmark-fill"></i> Data Buku
                    </a>
                </li>

                <!-- Logout Button -->
                <div class="col-md-1 d-flex justify-content-end" style="margin-left: 3cm;">
                    <a href="{{ route('logout') }}" class="text-white" style="text-decoration: none;">
                        Logout
                    </a>
                </div>




            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
