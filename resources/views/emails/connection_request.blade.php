<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header { background: #1a1a2e; color: white; padding: 32px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .body { padding: 32px; }
        .body h2 { color: #1a1a2e; margin-bottom: 8px; }
        .body p { color: #555; line-height: 1.7; }
        .sender-card { background: #f0f2f5; border-radius: 12px; padding: 20px; margin: 20px 0; }
        .sender-card h3 { margin: 0 0 8px; color: #1a1a2e; }
        .sender-card p { margin: 4px 0; color: #666; font-size: 14px; }
        .btn { display: inline-block; background: #1a1a2e; color: white; padding: 12px 28px; border-radius: 8px; text-decoration: none; font-weight: bold; margin-top: 16px; }
        .footer { background: #f0f2f5; padding: 20px; text-align: center; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎓 AlumniNet</h1>
            <p style="margin:8px 0 0;opacity:.8">Alumni Network & Job Referral Platform</p>
        </div>
        <div class="body">
            <h2>New Connection Request!</h2>
            <p>Hi <strong>{{ $receiver->name }}</strong>,</p>
            <p>A fellow alumni wants to connect with you on AlumniNet!</p>

            <div class="sender-card">
                <h3>{{ $sender->name }}</h3>
                <p>📧 {{ $sender->email }}</p>
                <p>🏢 {{ $sender->role ?? 'Alumni' }} at {{ $sender->company ?? 'N/A' }}</p>
                <p>🎓 {{ $sender->branch }} · Batch {{ $sender->batch }}</p>
            </div>

            <p>Login to AlumniNet to accept or reject this connection request.</p>
            <a href="http://127.0.0.1:8000/connections" class="btn">
                View Connection Request
            </a>
        </div>
        <div class="footer">
            © 2026 AlumniNet — Connecting Alumni Worldwide<br>
            You received this email because you are a registered alumni.
        </div>
    </div>
</body>
</html>