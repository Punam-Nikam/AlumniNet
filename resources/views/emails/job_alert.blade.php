<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header { background: #1a1a2e; color: white; padding: 32px; text-align: center; }
        .body { padding: 32px; }
        .job-card { background: #f0f2f5; border-radius: 12px; padding: 20px; margin: 20px 0; }
        .job-card h3 { margin: 0 0 8px; color: #1a1a2e; }
        .job-card p { margin: 4px 0; color: #666; font-size: 14px; }
        .btn { display: inline-block; background: #f0a500; color: #1a1a2e; padding: 12px 28px; border-radius: 8px; text-decoration: none; font-weight: bold; margin-top: 16px; }
        .footer { background: #f0f2f5; padding: 20px; text-align: center; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 AlumniNet</h1>
            <p style="margin:8px 0 0;opacity:.8">New Job Referral Alert!</p>
        </div>
        <div class="body">
            <h2>💼 New Job Posted!</h2>
            <p>A new job referral has been posted on AlumniNet:</p>

            <div class="job-card">
                <h3>{{ $job->title }}</h3>
                <p>🏢 {{ $job->company }}</p>
                <p>📍 {{ $job->location }}</p>
                <p>⏱ {{ ucfirst($job->type) }}</p>
                @if($job->is_referral)
                    <p>🤝 Referral available from {{ $job->alumni->name }}</p>
                @endif
            </div>

            <a href="http://127.0.0.1:8000/jobs" class="btn">
                View Job & Apply
            </a>
        </div>
        <div class="footer">
            © 2026 AlumniNet — Connecting Alumni Worldwide
        </div>
    </div>
</body>
</html>