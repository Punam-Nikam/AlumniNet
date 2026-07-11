<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Connections</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4" style="background:#1a1a2e;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🎓 AlumniNet</a>
        <div class="d-flex gap-2">
            <a href="/alumni" class="btn btn-outline-light btn-sm">Directory</a>
            <a href="/jobs"   class="btn btn-outline-light btn-sm">Jobs</a>
            <form method="POST" action="/logout" class="d-inline">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container pb-5">
    <h4 class="fw-bold mb-4">My Connections</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">

        <!-- Received Requests -->
        <div class="col-md-6">
            <div class="card p-3">
                <h6 class="fw-bold mb-3">
                    📥 Received Requests
                    <span class="badge bg-warning text-dark ms-1">
                        {{ $received->where('status','pending')->count() }}
                    </span>
                </h6>
                @forelse($received as $conn)
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                    <div>
                        <div class="fw-semibold">{{ $conn->sender->name }}</div>
                        <div class="text-muted small">
                            {{ $conn->sender->company ?? 'N/A' }} ·
                            Batch {{ $conn->sender->batch }}
                        </div>
                    </div>
                    @if($conn->status == 'pending')
                        <div class="d-flex gap-1">
                            <form method="POST" action="/connections/accept/{{ $conn->id }}">
                                @csrf
                                <button class="btn btn-success btn-sm">✅</button>
                            </form>
                            <form method="POST" action="/connections/reject/{{ $conn->id }}">
                                @csrf
                                <button class="btn btn-danger btn-sm">❌</button>
                            </form>
                        </div>
                    @else
                        <span class="badge bg-{{ $conn->status == 'accepted' ? 'success' : 'danger' }}">
                            {{ ucfirst($conn->status) }}
                        </span>
                    @endif
                </div>
                @empty
                <p class="text-muted small">No connection requests received yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Sent Requests -->
        <div class="col-md-6">
            <div class="card p-3">
                <h6 class="fw-bold mb-3">📤 Sent Requests</h6>
                @forelse($sent as $conn)
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                    <div>
                        <div class="fw-semibold">{{ $conn->receiver->name }}</div>
                        <div class="text-muted small">
                            {{ $conn->receiver->company ?? 'N/A' }} ·
                            Batch {{ $conn->receiver->batch }}
                        </div>
                    </div>
                    <span class="badge bg-{{ $conn->status == 'accepted' ? 'success' : ($conn->status == 'rejected' ? 'danger' : 'warning text-dark') }}">
                        {{ ucfirst($conn->status) }}
                    </span>
                </div>
                @empty
                <p class="text-muted small">No connection requests sent yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>