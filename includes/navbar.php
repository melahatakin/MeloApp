<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="image/logo2.png" alt="Logo" class="navbar-logo">
            <span class="navbar-text ms-2">MELO</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="kadın.php" id="kadınDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kadın</a>
                    <ul class="dropdown-menu" aria-labelledby="kadınDropdown">
                        <li><a class="dropdown-item" href="kadın/yenigelen.php">Yeni Gelenler</a></li>
                        <li><a class="dropdown-item" href="kadın/ustgiyim.php">Üst Giyim</a></li>
                        <li><a class="dropdown-item" href="kadın/altgiyim.php">Alt Giyim</a></li>
                        <li><a class="dropdown-item" href="kadın/aksesuar.php">Aksesuar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="erkek.php" id="erkekDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Erkek</a>
                    <ul class="dropdown-menu" aria-labelledby="erkekDropdown">
                        <li><a class="dropdown-item" href="erkek/yenigelen.php">Yeni Gelenler</a></li>
                        <li><a class="dropdown-item" href="erkek/ustgiyim.php">Üst Giyim</a></li>
                        <li><a class="dropdown-item" href="erkek/altgiyim.php">Alt Giyim</a></li>
                        <li><a class="dropdown-item" href="erkek/aksesuar.php">Aksesuar</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="çocuk.php" id="çocukDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Çocuk</a>
                    <ul class="dropdown-menu" aria-labelledby="çocukDropdown">
                        <li><a class="dropdown-item" href="çocuk/yenigelen.php">Yeni Gelenler</a></li>
                        <li><a class="dropdown-item" href="çocuk/ustgiyim.php">Üst Giyim</a></li>
                        <li><a class="dropdown-item" href="çocuk/altgiyim.php">Alt Giyim</a></li>
                        <li><a class="dropdown-item" href="çocuk/aksesuar.php">Aksesuar</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="indirimler.php">İndirimler</a>
                </li>
            </ul>
            <form class="d-flex mx-auto" action="index.php" method="GET" style="width: 50%;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="favorites.php">Favorilerim</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Giriş Yap</a>
                    <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                        <li><a class="dropdown-item" href="login.php">Giriş Yap</a></li>
                        <li><a class="dropdown-item" href="register.php">Kayıt Ol</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <img src="image/sepet.png" alt="Sepet" width="24">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>