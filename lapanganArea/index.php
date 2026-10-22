<?php
require "koneksi.php";
$hasil = mysqli_query($koneksi, "SELECT * FROM lapangan");
$pesanan = mysqli_query($koneksi,
    "SELECT pesanan.id_pesanan, pesanan.nama_penyewa, lapangan.nama_lapangan
     FROM pesanan
     JOIN lapangan ON pesanan.id_lapangan = lapangan.id_lapangan
     ORDER BY pesanan.id_pesanan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Penyewaan Lapangan Olahraga</title>
</head>
<body>
    <div class="header">
        <h1>Penyewaan Lapangan Olahraga</h1>
        <p>Pilih lapangan favoritmu dan main bareng teman</p>
    </div>
    <div class="kotak">
        <h2>Daftar Lapangan</h2>
        <table class="tabel">
            <tr>
                <th>Nama Lapangan</th>
                <th>Jenis Rumput</th>
                <th>Ukuran</th>
                <th>Status Fisik</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
                <tr>
                    <td><?= $row["nama_lapangan"] ?></td>
                    <td><?= $row["jenis_rumput"] ?></td>
                    <td><?= $row["ukuran"] ?></td>
                    <td><?= $row["status_fisik"] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="kotak">
        <h2>Daftar Pesanan</h2>
        <table class="tabel">
            <tr>
                <th>Nama Penyewa</th>
                <th>Lapangan</th>
                <th>Aksi</th>
            </tr>
            <?php if (mysqli_num_rows($pesanan) == 0) { ?>
                <tr>
                    <td colspan="3">Belum ada pesanan.</td>
                </tr>
            <?php } ?>
            <?php while ($p = mysqli_fetch_assoc($pesanan)) { ?>
                <tr>
                    <td><?= htmlspecialchars($p["nama_penyewa"]) ?></td>
                    <td><?= $p["nama_lapangan"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $p["id_pesanan"] ?>" class="aksi aksi-edit">Edit</a>
                        <a href="hapus.php?id=<?= $p["id_pesanan"] ?>" class="aksi aksi-hapus"
                           onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="kotak tengah">
        <p class="pengantar">Lapangannya berkualitas, bersih, dan nyaman buat main. Yuk, tunggu apa lagi? Pesan sekarang sebelum kehabisan!</p>
        <a href="tambah.php" class="tombol">Pesan Sekarang</a>
    </div>

</body>
</html>