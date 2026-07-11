<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .navbar-brand { font-weight: 700; font-size: 22px; }
        .hero { background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: white; padding: 50px 0; }
        .hero h1 { font-size: 36px; font-weight: 700; }
        .hero p  { font-size: 16px; opacity: 0.8; }
        .alumni-card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: transform .2s, box-shadow .2s; }
        .alumni-card:hover { transform: translateY(-6px); box-shadow: 0 8px 30px rgba(0,0,0,0.15); }
        .avatar { width: 72px; height: 72px; border-radius: 50%; background: linear-gradient(135deg, #1a1a2e, #4a4e8e); color: white; font-size: 26px; font-weight: 700; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
        .badge-branch { background: #eef0ff; color: #3c3c8e; font-weight: 500; border-radius: 20px; padding: 4px 12px; font-size: 12px; }
        .connect-btn { border-radius: 50px; font-size: 13px; font-weight: 600; padding: 7px 20px; }
        .filter-card { border: none; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
        .no-results { text-align: center; padding: 60px 0; color: #888; }
        @media (max-width: 576px) {
            .hero h1 { font-size: 24px; }
            .hero p  { font-size: 14px; }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#1a1a2e;">
    <div class="container">
        <a class="navbar-brand" href="#">🎓 AlumniNet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="/alumni">Directory</a></li>
                <li class="nav-item"><a class="nav-link" href="/jobs">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="/connections">Connections</a></li>
            </ul>
            <div class="d-flex gap-2 ms-3">
                @auth
                    <span class="text-light small my-auto">Hi, {{ Auth::user()->name }}</span>
                    <form method="POST" action="/logout" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                @else
                    <a href="/login"    class="btn btn-outline-light btn-sm">Login</a>
                    <a href="/register" class="btn btn-warning btn-sm fw-bold">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero -->
<div class="hero">
    <div class="container text-center">
        <h1>🎓 Alumni Directory</h1>
        <p class="mb-4">Connect with alumni working across top companies worldwide</p>

        <!-- Search Form -->
        <form method="GET" action="/alumni">
            <div class="row justify-content-center g-2">
                <div class="col-md-5">
                    <input type="text"
                           name="search"
                           class="form-control form-control-lg"
                           placeholder="Search name, company, role..."
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
                @if(request()->hasAny(['search','branch','batch','company']))
                <div class="col-md-1">
                    <a href="/alumni" class="btn btn-outline-light btn-lg w-100">✕</a>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Filters + Results -->
<div class="container py-4">
    <div class="row g-4">

        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <div class="card filter-card p-3">
                <h6 class="fw-bold mb-3"><i class="bi bi-funnel"></i> Filters</h6>
                <form method="GET" action="/alumni">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <!-- Branch Filter -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Branch</label>
                        <select name="branch" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Branches</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch }}"
                                    {{ request('branch') == $branch ? 'selected' : '' }}>
                                    {{ $branch }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Batch Filter -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Batch Year</label>
                        <select name="batch" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Batches</option>
                            @foreach($batches as $batch)
                                <option value="{{ $batch }}"
                                    {{ request('batch') == $batch ? 'selected' : '' }}>
                                    {{ $batch }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Company Filter -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Company</label>
                        <select name="company" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Companies</option>
                            @foreach($companies as $company)
                                <option value="{{ $company }}"
                                    {{ request('company') == $company ? 'selected' : '' }}>
                                    {{ $company }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <a href="/alumni" class="btn btn-outline-secondary btn-sm w-100">Clear Filters</a>
                </form>
            </div>
        </div>

        <!-- Alumni Cards -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold text-muted">
                    {{ $alumni->count() }} Alumni Found
                    @if(request()->hasAny(['search','branch','batch','company']))
                        <span class="badge bg-warning text-dark ms-2">Filtered</span>
                    @endif
                </h6>
            </div>

            @if($alumni->count() > 0)
            <div class="row g-4">
                @foreach($alumni as $person)
                <div class="col-sm-6 col-lg-4">
                    <div class="card alumni-card h-100 text-center p-3">
                        <div class="card-body">
                            <div class="avatar">
                                {{ strtoupper(substr($person->name, 0, 1)) }}
                            </div>
                            <h6 class="fw-bold mb-1">{{ $person->name }}</h6>
                            <p class="text-muted small mb-1">{{ $person->role ?? 'Alumni' }}</p>
                            <p class="fw-semibold text-dark mb-2">
                                <i class="bi bi-building"></i>
                                {{ $person->company ?? 'Not specified' }}
                            </p>
                            <span class="badge-branch">{{ $person->branch }}</span>
                            <p class="text-muted small mt-2 mb-3">
                                <i class="bi bi-mortarboard"></i> Batch {{ $person->batch }}
                            </p>
                            <div class="d-flex gap-2 justify-content-center">
                                @auth
                                    <form method="POST" action="/connect/{{ $person->id }}">
                                        @csrf
                                        <button class="btn btn-dark connect-btn">
                                            <i class="bi bi-person-plus"></i> Connect
                                        </button>
                                    </form>
                                @else
                                    <a href="/login" class="btn btn-dark connect-btn">Login to Connect</a>
                                @endauth
                                <button class="btn btn-outline-secondary connect-btn">
                                    <i class="bi bi-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="no-results">
                <i class="bi bi-search" style="font-size:48px;opacity:0.3"></i>
                <p class="mt-3 fw-semibold">No alumni found matching your search</p>
                <a href="/alumni" class="btn btn-dark btn-sm mt-2">Clear Search</a>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center py-4" style="background:#1a1a2e;margin-top:40px">
    <span style="color:#aaa">© 2026 AlumniNet — Connecting Alumni Worldwide</span>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>