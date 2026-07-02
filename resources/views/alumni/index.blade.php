<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Directory</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .navbar-brand { font-weight: 700; font-size: 22px; }
        .hero { background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: white; padding: 50px 0; }
        .hero h1 { font-size: 36px; font-weight: 700; }
        .hero p  { font-size: 16px; opacity: 0.8; }
        .search-box { border-radius: 50px; padding: 12px 24px; border: none; font-size: 15px; }
        .search-btn { border-radius: 50px; padding: 12px 28px; font-weight: 600; }
        .alumni-card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: transform .2s, box-shadow .2s; }
        .alumni-card:hover { transform: translateY(-6px); box-shadow: 0 8px 30px rgba(0,0,0,0.15); }
        .avatar { width: 72px; height: 72px; border-radius: 50%; background: linear-gradient(135deg, #1a1a2e, #4a4e8e); color: white; font-size: 26px; font-weight: 700; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
        .badge-branch { background: #eef0ff; color: #3c3c8e; font-weight: 500; border-radius: 20px; padding: 4px 12px; font-size: 12px; }
        .connect-btn { border-radius: 50px; font-size: 13px; font-weight: 600; padding: 7px 20px; }
        .section-title { font-size: 22px; font-weight: 700; color: #1a1a2e; margin-bottom: 24px; }
   
   
        /* Mobile responsiveness */
@media (max-width: 576px) {
    .hero h1 { font-size: 24px; }
    .hero p  { font-size: 14px; }
    .search-box { font-size: 14px; }
    .alumni-card { margin-bottom: 8px; }
    .avatar { width: 60px; height: 60px; font-size: 22px; }
}

/* Tablet */
@media (max-width: 768px) {
    .hero { padding: 30px 0; }
    .hero h1 { font-size: 28px; }
}
   </style>
</head>
<body>

<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#1a1a2e;">
    <div class="container">
        <a class="navbar-brand" href="#">🎓 AlumniNet</a>

        <!-- Hamburger button (shows on mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav links (collapses on mobile) -->
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Directory</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
            </ul>
            <div class="d-flex gap-2 ms-3">
                <a href="#" class="btn btn-outline-light btn-sm">Login</a>
                <a href="#" class="btn btn-warning btn-sm fw-bold">Register</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <div class="container text-center">
        <h1>🎓 Alumni Directory</h1>
        <p class="mb-4">Connect with your college alumni working across top companies worldwide</p>
        <!-- Search Bar -->
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="input-group shadow">
                    <input type="text" class="form-control search-box" placeholder="Search by name, company, branch...">
                    <button class="btn btn-warning search-btn">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Badges -->
<!-- Filter Badges — scrollable on mobile -->
<div class="container mt-4 mb-2">
    <div class="d-flex gap-2 flex-nowrap overflow-auto pb-2" style="-webkit-overflow-scrolling:touch;">
        <span class="badge rounded-pill bg-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">All</span>
        <span class="badge rounded-pill bg-light text-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">Computer Science</span>
        <span class="badge rounded-pill bg-light text-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">Electronics</span>
        <span class="badge rounded-pill bg-light text-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">Mechanical</span>
        <span class="badge rounded-pill bg-light text-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">Civil</span>
        <span class="badge rounded-pill bg-light text-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">Batch 2020</span>
        <span class="badge rounded-pill bg-light text-dark px-3 py-2 flex-shrink-0" style="cursor:pointer">Batch 2021</span>
    </div>
</div>

<!-- Alumni Cards -->
<div class="container py-4">
    <div class="section-title">{{ count($alumni) }} Alumni Found</div>
    <div class="row g-4">
        @foreach($alumni as $person)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alumni-card h-100 text-center p-3">
                <div class="card-body">
                    <div class="avatar">{{ strtoupper(substr($person['name'], 0, 1)) }}</div>
                    <h6 class="fw-bold mb-1">{{ $person['name'] }}</h6>
                    <p class="text-muted small mb-1">{{ $person['role'] }}</p>
                    <p class="fw-semibold text-dark mb-2">
                        <i class="bi bi-building"></i> {{ $person['company'] }}
                    </p>
                    <span class="badge-branch">{{ $person['branch'] }}</span>
                    <p class="text-muted small mt-2 mb-3">
                        <i class="bi bi-mortarboard"></i> Batch {{ $person['batch'] }}
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-dark connect-btn">
                            <i class="bi bi-person-plus"></i> Connect
                        </button>
                        <button class="btn btn-outline-secondary connect-btn">
                            <i class="bi bi-envelope"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="text-center py-4 text-muted small" style="background:#1a1a2e;color:white!important;margin-top:40px">
    <span style="color:#aaa">© 2026 AlumniNet — Connecting Alumni Worldwide</span>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>