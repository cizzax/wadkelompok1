<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Pelanggan & Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 450px;">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-1">Login Admin</h3>
            <p class="text-muted mb-4">Masuk untuk mengelola data pelanggan.</p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username"
                           class="form-control" value="{{ old('username') }}"
                           required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password"
                           class="form-control" required>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" id="remember" name="remember"
                           class="form-check-input" value="1">
                    <label for="remember" class="form-check-label">
                        Ingat saya
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Masuk
                </button>

                <a href="{{ route('pelanggan.index') }}"
                   class="btn btn-outline-secondary w-100 mt-2">
                    Kembali ke Daftar Pelanggan
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
