<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Post a Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4" style="background:#1a1a2e;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🎓 AlumniNet</a>
        <a href="/jobs" class="btn btn-outline-light btn-sm">← Back to Jobs</a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h4 class="fw-bold mb-1">Post a Job Referral</h4>
                <p class="text-muted small mb-4">Help fellow alumni get into your company</p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/jobs">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Job Title</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="e.g. Software Engineer"
                                   value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Company</label>
                            <input type="text" name="company" class="form-control"
                                   placeholder="e.g. Google"
                                   value="{{ old('company') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Location</label>
                            <input type="text" name="location" class="form-control"
                                   placeholder="e.g. Bangalore / Remote"
                                   value="{{ old('location') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Job Type</label>
                            <select name="type" class="form-select" required>
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Job Description</label>
                            <textarea name="description" class="form-control" rows="5"
                                      placeholder="Describe the role, requirements, perks..."
                                      required>{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Apply Link <span class="text-muted">(optional)</span>
                            </label>
                            <input type="url" name="apply_link" class="form-control"
                                   placeholder="https://careers.company.com/job-link"
                                   value="{{ old('apply_link') }}">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input type="checkbox" name="is_referral"
                                       class="form-check-input" id="referral" checked>
                                <label class="form-check-label fw-semibold" for="referral">
                                    I can provide a referral for this position
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-dark px-5 py-2 fw-bold">
                                <i class="bi bi-send"></i> Post Job
                            </button>
                            <a href="/jobs" class="btn btn-outline-secondary px-4 py-2 ms-2">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>