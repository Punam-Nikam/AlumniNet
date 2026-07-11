<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — All Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .sidebar { background: #1a1a2e; min-height: 100vh; color: white; padding: 24px 16px; }
        .sidebar .brand { font-size: 20px; font-weight: 700; margin-bottom: 32px; }
        .sidebar a { color: #aaa; text-decoration: none; display: block; padding: 10px 12px; border-radius: 8px; margin-bottom: 4px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <div class="brand">🎓 AlumniNet</div>
            <p class="text-muted small">Admin Panel</p>
            <a href="/admin/dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
            <a href="/admin/alumni" class="active"><i class="bi bi-people me-2"></i>All Alumni</a>
            <a href="/alumni"><i class="bi bi-grid me-2"></i>Directory</a>
            <hr style="border-color:#333">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm w-100">Logout</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <h4 class="fw-bold mb-4">
                All Approved Alumni
                <span class="badge bg-dark ms-2">{{ $alumni->count() }}</span>
            </h4>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Branch</th>
                                <th>Batch</th>
                                <th>Company</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alumni as $person)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $person->name }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ $person->branch }}</td>
                                <td>{{ $person->batch }}</td>
                                <td>{{ $person->company ?? '—' }}</td>
                                <td>{{ $person->role ?? '—' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No approved alumni yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>