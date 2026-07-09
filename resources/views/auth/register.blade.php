<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Register</title>
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
        <div class="col-md-7">
            <div class="brand">🎓 AlumniNet</div>
            <div class="card p-4">
                <h4 class="fw-bold mb-1">Create Account</h4>
                <p class="text-muted small mb-4">Registration requires admin approval</p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Branch</label>
                            <select name="branch" class="form-select" required>
                                <option value="">Select Branch</option>
                                <option>Computer Science</option>
                                <option>Electronics</option>
                                <option>Mechanical</option>
                                <option>Civil</option>
                                <option>IT</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Batch Year</label>
                            <select name="batch" class="form-select" required>
                                <option value="">Select Batch</option>
                                @for($y = 2024; $y >= 2010; $y--)
                                    <option>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Current Company <span class="text-muted">(optional)</span></label>
                            <input type="text" name="company" class="form-control" value="{{ old('company') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Current Role <span class="text-muted">(optional)</span></label>
                            <input type="text" name="role" class="form-control" value="{{ old('role') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Phone <span class="text-muted">(optional)</span></label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
                                Register — Pending Approval
                            </button>
                        </div>
                    </div>
                </form>
                <p class="text-center mt-3 text-muted small">Already registered? <a href="/login">Login here</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>