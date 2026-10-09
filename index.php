<?php
require "koneksi.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

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
            <p class="text-muted mb-0">Pengelolaan data pelanggan dan level member.</p>
        </div>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Member</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row["nama"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["nomor"]) ?></td>
                            <td>
                                <?php
                                $level = $row["levelmember"];
                                $warna = "secondary";
                                if ($level == "Basic") $warna = "primary";
                                elseif ($level == "Gold") $warna = "warning";
                                elseif ($level == "VIP") $warna = "success";
                                ?>
                                <span class="badge bg-<?= $warna ?>">
                                    <?= htmlspecialchars($level) ?>
                                </span>
                            </td>
                            <td class="text-nowrap">
                                <a href="edit.php?id=<?= $row["id"] ?>"
                                   class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus.php?id=<?= $row["id"] ?>"
                                   onclick="return confirm('Yakin hapus data ini?')"
                                   class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>