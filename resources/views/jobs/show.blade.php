<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — {{ $job->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .poster-card { background: #1a1a2e; color: white; border-radius: 16px; padding: 24px; }
        .avatar { width: 56px; height: 56px; border-radius: 50%; background: #f0a500; color: #1a1a2e; font-size: 22px; font-weight: 700; display: flex; align-items: center; justify-content: center; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4" style="background:#1a1a2e;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🎓 AlumniNet</a>
        <a href="/jobs" class="btn btn-outline-light btn-sm">← Back to Jobs</a>
    </div>
</nav>

<div class="container pb-5">
    <div class="row g-4">

        <!-- Job Details -->
        <div class="col-md-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h3 class="fw-bold mb-1">{{ $job->title }}</h3>
                        <p class="text-muted mb-0">
                            <i class="bi bi-building"></i> {{ $job->company }} &nbsp;
                            <i class="bi bi-geo-alt"></i> {{ $job->location }}
                        </p>
                    </div>
                    <span class="badge bg-dark px-3 py-2">{{ ucfirst($job->type) }}</span>
                </div>

                @if($job->is_referral)
                    <div class="alert alert-success py-2">
                        🤝 <strong>Referral Available</strong> —
                        {{ $job->alumni->name }} can refer you directly!
                    </div>
                @endif

                <hr>
                <h6 class="fw-bold mb-3">Job Description</h6>
                <p style="line-height:1.8; white-space: pre-line;">{{ $job->description }}</p>

                <hr>
                <!-- Apply Section -->
                <h6 class="fw-bold mb-3">Apply for this Position</h6>
                <div class="d-flex gap-3 flex-wrap">
                    @if($job->apply_link)
                        <a href="{{ $job->apply_link }}" target="_blank"
                           class="btn btn-dark px-4 py-2 fw-bold">
                            <i class="bi bi-box-arrow-up-right"></i> Apply on Company Site
                        </a>
                    @endif
                    <a href="mailto:{{ $job->alumni->email }}?subject=Referral Request for {{ $job->title }} at {{ $job->company }}&body=Hi {{ $job->alumni->name }},%0D%0A%0D%0AI am interested in the {{ $job->title }} position at {{ $job->company }}. Could you please help me with a referral?%0D%0A%0D%0AThank you!"
                       class="btn btn-outline-dark px-4 py-2 fw-bold">
                        <i class="bi bi-envelope"></i> Request Referral via Email
                    </a>
                </div>
            </div>
        </div>

        <!-- Posted By Card -->
        <div class="col-md-4">
            <div class="poster-card">
                <p class="text-muted small mb-3">Posted by</p>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="avatar">
                        {{ strtoupper(substr($job->alumni->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-bold">{{ $job->alumni->name }}</div>
                        <div style="color:#aaa;font-size:13px">
                            {{ $job->alumni->role }} at {{ $job->alumni->company }}
                        </div>
                    </div>
                </div>
                <div style="color:#aaa;font-size:13px">
                    <i class="bi bi-mortarboard"></i>
                    {{ $job->alumni->branch }} · Batch {{ $job->alumni->batch }}
                </div>
                <hr style="border-color:#333">
                <div style="color:#aaa;font-size:12px">
                    Posted {{ $job->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>