<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nomor = $_POST["no_telp"];
    $levelmember = $_POST["level_member"];

    $sql = "INSERT INTO pelanggan (nama, email, nomor, levelmember)
            VALUES (?, ?, ?, ?)";
    mysqli_execute_query($koneksi, $sql, [$nama, $email, $nomor, $levelmember]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 550px;">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-1">Tambah Member Baru</h3>
            <p class="text-muted mb-4">Masukkan informasi pelanggan.</p>

            <form action="tambah.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Level Member</label>
                    <select name="level_member" class="form-select" required>
                        <option value="">Pilih level member</option>
                        <option value="Basic">Basic</option>
                        <option value="Gold">Gold</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>