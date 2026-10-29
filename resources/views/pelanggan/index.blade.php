<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modul Pelanggan & Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Pelanggan & Member</h2>
            <p class="text-muted mb-0">
                Pengelolaan data pelanggan dan level member.
            </p>
        </div>

        @auth
            <a href="{{ route('pelanggan.tambah') }}" class="btn btn-primary">
                + Tambah Member
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">
                Login Admin
            </a>
        @endauth
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Level</th>
                            @auth
                                <th>Aksi</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nomor }}</td>
                                <td>
                                    @php
                                        $warna = match ($row->levelmember) {
                                            'Basic' => 'primary',
                                            'Gold' => 'warning',
                                            'VIP' => 'success',
                                            default => 'secondary',
                                        };
                                    @endphp

                                    <span class="badge bg-{{ $warna }}">
                                        {{ $row->levelmember }}
                                    </span>
                                </td>

                                @auth
                                    <td class="text-nowrap">
                                        <a href="{{ route('pelanggan.edit', $row->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('pelanggan.hapus', $row->id) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    Belum ada data pelanggan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @auth
        <div class="text-end mt-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-sm">
                    Logout
                </button>
            </form>
        </div>
    @endauth
</div>

</body>
</html>
