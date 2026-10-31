<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 550px;">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-1">Edit Member</h3>
            <p class="text-muted mb-4">Perbarui informasi pelanggan.</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"
                    value="{{ old('nama', $pelanggan->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                    value="{{ old('email', $pelanggan->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="nomor" class="form-control"
                    value="{{ old('nomor', $pelanggan->nomor) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Level Member</label>
                    <select name="levelmember" class="form-select" required>
                        <option value="Basic" @selected(old('levelmember', $pelanggan->levelmember) == 'Basic')>Basic</option>
                        <option value="Gold" @selected(old('levelmember', $pelanggan->levelmember) == 'Gold')>Gold</option>
                        <option value="VIP" @selected(old('levelmember', $pelanggan->levelmember) == 'VIP')>VIP</option>
                    </select>
                </div>

                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
