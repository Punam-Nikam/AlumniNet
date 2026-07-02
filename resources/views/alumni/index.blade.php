<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniNet — Directory</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f6f9; color: #333; }

        /* Navbar */
        .navbar { background: #1a1a2e; padding: 16px 32px; color: white; font-size: 22px; font-weight: bold; }

        /* Search bar */
        
        .search-section { padding: 32px; text-align: center; }
        .search-section h2 { font-size: 28px; margin-bottom: 16px; color: #1a1a2e; }
        .search-box { padding: 12px 20px; width: 400px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; }
        .search-btn { padding: 12px 24px; background: #1a1a2e; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; margin-left: 8px; }

        /* Cards grid */
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 24px; padding: 0 32px 40px; }

        /* Single card */
        .card { background: white; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); text-align: center; }
        .avatar { width: 72px; height: 72px; border-radius: 50%; background: #1a1a2e; color: white; font-size: 28px; font-weight: bold; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
        .card h3 { font-size: 18px; margin-bottom: 6px; }
        .card .role { color: #666; font-size: 14px; margin-bottom: 4px; }
        .card .company { color: #1a1a2e; font-weight: bold; font-size: 14px; margin-bottom: 4px; }
        .card .batch { font-size: 13px; color: #999; margin-bottom: 16px; }
        .connect-btn { background: #1a1a2e; color: white; border: none; padding: 8px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">🎓 AlumniNet</div>

    <!-- Search Section -->
    <div class="search-section">
        <h2>Alumni Directory</h2>
        <input type="text" class="search-box" placeholder="Search by name, company, branch...">
        <button class="search-btn">Search</button>
    </div>

    <!-- Alumni Cards -->
    <div class="cards-grid">
        @foreach($alumni as $person)
        <div class="card">
            <div class="avatar">{{ strtoupper(substr($person['name'], 0, 1)) }}</div>
            <h3>{{ $person['name'] }}</h3>
            <div class="role">{{ $person['role'] }}</div>
            <div class="company">{{ $person['company'] }}</div>
            <div class="batch">{{ $person['branch'] }} • Batch {{ $person['batch'] }}</div>
            <button class="connect-btn">Connect</button>
        </div>
        @endforeach
    </div>

</body>
</html>