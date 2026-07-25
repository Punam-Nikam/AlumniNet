<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Join Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a1a2e, #16213e); min-height: 100vh; padding: 40px 0; }
        .card { border: none; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .brand { color: white; font-size: 28px; font-weight: 700; text-align: center; margin-bottom: 24px; }
        .section-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #888; margin: 16px 0 10px; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="brand"> AlumniNet</div>
            <div class="card p-4">
                <h4 class="fw-bold mb-1">Join AlumniNet</h4>
                <p class="text-muted small mb-4">Connect with alumni from your institution instantly — no approval needed!</p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>• {{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf

                    <!-- Personal Info -->
                    <div class="section-label">Personal Information</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="e.g. Rahul Sharma"
                                   value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address *</label>
                            <input type="email" name="email" class="form-control"
                                   placeholder="your@email.com"
                                   value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Password *</label>
                            <input type="password" name="password" class="form-control"
                                   placeholder="Minimum 6 characters" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirm Password *</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control" placeholder="Repeat password" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                   placeholder="Your phone number"
                                   value="{{ old('phone') }}">
                        </div>
                    </div>

                    <!-- Academic Info -->
                    <div class="section-label mt-3">Academic Information</div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Institute / University / College *</label>
                            <input type="text" name="institute" class="form-control"
                                   placeholder="e.g. MIT College of Engineering, Pune"
                                   value="{{ old('institute') }}" required>
                            <div class="form-text">Enter your full college/university name</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Branch / Department *</label>
                            <select name="branch" class="form-select" required>
                                <option value="">Select Branch</option>
                                <option {{ old('branch')=='Computer Science' ? 'selected':'' }}>Computer Science</option>
                                <option {{ old('branch')=='Information Technology' ? 'selected':'' }}>Information Technology</option>
                                <option {{ old('branch')=='Electronics' ? 'selected':'' }}>Electronics</option>
                                <option {{ old('branch')=='Mechanical' ? 'selected':'' }}>Mechanical</option>
                                <option {{ old('branch')=='Civil' ? 'selected':'' }}>Civil</option>
                                <option {{ old('branch')=='Electrical' ? 'selected':'' }}>Electrical</option>
                                <option {{ old('branch')=='MBA' ? 'selected':'' }}>MBA</option>
                                <option {{ old('branch')=='MCA' ? 'selected':'' }}>MCA</option>
                                <option value="Other" {{ old('branch')=='Other' ? 'selected':'' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Graduation Year *</label>
                            <select name="batch" class="form-select" required>
                                <option value="">Select Year</option>
                                @for($y = 2026; $y >= 2000; $y--)
                                    <option {{ old('batch')==$y ? 'selected':'' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- Professional Info -->
                    <div class="section-label mt-3">Professional Information (Optional)</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Current Company</label>
                            <input type="text" name="company" class="form-control"
                                   placeholder="e.g. Google, TCS, Infosys"
                                   value="{{ old('company') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Current Role / Position</label>
                            <input type="text" name="role" class="form-control"
                                   placeholder="e.g. Software Engineer"
                                   value="{{ old('role') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Short Bio</label>
                            <textarea name="bio" class="form-control" rows="3"
                                      placeholder="Tell fellow alumni about yourself...">{{ old('bio') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-dark w-100 py-2 fw-bold fs-5">
                             Join AlumniNet — Free!
                        </button>
                    </div>
                </form>
                <p class="text-center mt-3 text-muted small">
                    Already a member? <a href="/login" class="fw-bold">Login here</a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>