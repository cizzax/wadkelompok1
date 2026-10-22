<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = $_POST["nama_penyewa"];
    $lapangan = $_POST["id_lapangan"];

    $sql = "INSERT INTO pesanan (nama_penyewa, id_lapangan) VALUES (?, ?)";
    mysqli_execute_query($koneksi, $sql, [$nama, $lapangan]);

    header("Location: index.php");
    exit;
}

$daftar = mysqli_query($koneksi, "SELECT * FROM lapangan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulir Penyewaan Lapangan</title>
</head>
<body>
    <div class="header">
        <h1>Formulir Penyewaan Lapangan</h1>
        <p>Isi data di bawah ini untuk memesan lapangan</p>
    </div>
    <div class="kotak">
        <form class="form" method="POST">
            <h2>Isi form berikut:</h2>

            <div class="form-group">
                <label for="nama">Nama Anda:</label>
                <input type="text" id="nama" name="nama_penyewa" placeholder="Contoh: Raffi Arka Pradiva" required>
            </div>

            <div class="form-group">
                <label for="lapangan">Sewa Lapangan:</label>
                <select id="lapangan" name="id_lapangan" required>
                    <?php while ($l = mysqli_fetch_assoc($daftar)) { ?>
                        <option value="<?= $l["id_lapangan"] ?>"><?= $l["nama_lapangan"] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group form-centang">
                <input type="checkbox" id="setuju" required>
                <label for="setuju">Saya setuju dengan aturan penyewaan</label>
            </div>

            <button type="submit" class="tombol">Kirim Pesanan</button>
        </form>

        <div class="tengah">
            <a href="index.php" class="link-kembali">&larr; Kembali ke daftar lapangan</a>
        </div>
    </div>

</body>
</html>