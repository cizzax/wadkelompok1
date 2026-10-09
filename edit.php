<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nomor = $_POST["no_telp"];
    $levelmember = $_POST["level_member"];

    $sql = "UPDATE pelanggan
            SET nama = ?, email = ?, nomor = ?, levelmember = ?
            WHERE id = ?";
    mysqli_execute_query($koneksi, $sql, [$nama, $email, $nomor, $levelmember, $id]);

    header("Location: index.php");
    exit;
}

$id = $_GET["id"] ?? 0;
$hasil = mysqli_execute_query($koneksi, "SELECT * FROM pelanggan WHERE id = ?", [$id]);
$row = mysqli_fetch_assoc($hasil);

if (!$row) {
    die("Data pelanggan tidak ditemukan.");
}
?>

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

            <form action="edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $row["id"] ?>">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"
                           value="<?= htmlspecialchars($row["nama"]) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= htmlspecialchars($row["email"]) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control"
                           value="<?= htmlspecialchars($row["nomor"]) ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Level Member</label>
                    <select name="level_member" class="form-select" required>
                        <option value="Basic" <?= $row["levelmember"] == "Basic" ? "selected" : "" ?>>Basic</option>
                        <option value="Gold" <?= $row["levelmember"] == "Gold" ? "selected" : "" ?>>Gold</option>
                        <option value="VIP" <?= $row["levelmember"] == "VIP" ? "selected" : "" ?>>VIP</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>