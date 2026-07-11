<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Job Referrals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .navbar-brand { font-weight: 700; font-size: 22px; }
        .hero { background: linear-gradient(135deg, #1a1a2e, #16213e); color: white; padding: 40px 0; }
        .job-card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: transform .2s; }
        .job-card:hover { transform: translateY(-4px); }
        .company-badge { width: 48px; height: 48px; border-radius: 12px; background: #1a1a2e; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; flex-shrink: 0; }
        .type-badge { font-size: 11px; padding: 3px 10px; border-radius: 99px; font-weight: 600; }
        .referral-badge { background: #e8f5e9; color: #2e7d32; }
        .fulltime-badge { background: #e3f2fd; color: #1565c0; }
        .intern-badge { background: #fff3e0; color: #e65100; }
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
                <li class="nav-item"><a class="nav-link" href="/alumni">Directory</a></li>
                <li class="nav-item"><a class="nav-link active" href="/jobs">Jobs</a></li>
            </ul>
            <div class="d-flex gap-2 ms-3">
                @auth
                    <a href="/jobs/create" class="btn btn-warning btn-sm fw-bold">
                        <i class="bi bi-plus-circle"></i> Post a Job
                    </a>
                    <form method="POST" action="/logout" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero -->
<div class="hero">
    <div class="container text-center">
        <h1 class="fw-bold">💼 Job Referrals</h1>
        <p class="mb-0" style="opacity:.8">Alumni-exclusive job referrals from top companies</p>
    </div>
</div>

<!-- Job Listings -->
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success rounded-3">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">{{ $jobs->count() }} Jobs Available</h5>
        <a href="/jobs/create" class="btn btn-dark btn-sm">
            <i class="bi bi-plus"></i> Post Job
        </a>
    </div>

    @forelse($jobs as $job)
    <div class="card job-card mb-3 p-3">
        <div class="card-body">
            <div class="d-flex gap-3 align-items-start">

                <!-- Company Icon -->
                <div class="company-badge">
                    {{ strtoupper(substr($job->company, 0, 1)) }}
                </div>

                <!-- Job Details -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $job->title }}</h5>
                            <p class="text-muted mb-1">
                                <i class="bi bi-building"></i> {{ $job->company }} &nbsp;
                                <i class="bi bi-geo-alt"></i> {{ $job->location }}
                            </p>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            @if($job->is_referral)
                                <span class="type-badge referral-badge">🤝 Referral</span>
                            @endif
                            <span class="type-badge
                                {{ $job->type == 'internship' ? 'intern-badge' : 'fulltime-badge' }}">
                                {{ ucfirst($job->type) }}
                            </span>
                        </div>
                    </div>

                    <p class="text-muted small mt-2 mb-3">
                        {{ Str::limit($job->description, 150) }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="bi bi-person-circle"></i>
                            Posted by <strong>{{ $job->alumni->name }}</strong>
                            · {{ $job->created_at->diffForHumans() }}
                        </small>
                        <div class="d-flex gap-2">
                            <a href="/jobs/{{ $job->id }}"
                               class="btn btn-dark btn-sm">
                                View &amp; Apply
                            </a>
                            @if(Auth::id() == $job->alumni_id)
                                <form method="POST" action="/jobs/{{ $job->id }}"
                                      onsubmit="return confirm('Delete this job post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="text-center py-5 text-muted">
        <i class="bi bi-briefcase" style="font-size:48px;opacity:.3"></i>
        <p class="mt-3 fw-semibold">No job posts yet</p>
        <a href="/jobs/create" class="btn btn-dark btn-sm">Post the first job!</a>
    </div>
    @endforelse
</div>

<footer class="text-center py-4" style="background:#1a1a2e;margin-top:40px">
    <span style="color:#aaa">© 2026 AlumniNet — Connecting Alumni Worldwide</span>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>