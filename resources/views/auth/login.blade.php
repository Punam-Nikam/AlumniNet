<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a1a2e, #16213e); min-height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 16px; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .brand { color: white; font-size: 28px; font-weight: 700; text-align: center; margin-bottom: 24px; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="brand">🎓 AlumniNet</div>
            <div class="card p-4">
                <h4 class="fw-bold mb-1">Welcome Back</h4>
                <p class="text-muted small mb-4">Login to your alumni account</p>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Login</button>
                </form>
                <p class="text-center mt-3 text-muted small">New alumni? <a href="/register">Register here</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>