<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id       = $_POST["id_pesanan"];
    $nama     = $_POST["nama_penyewa"];
    $lapangan = $_POST["id_lapangan"];

    $sql = "UPDATE pesanan SET nama_penyewa = ?, id_lapangan = ? WHERE id_pesanan = ?";
    mysqli_execute_query($koneksi, $sql, [$nama, $lapangan, $id]);

    header("Location: index.php");
    exit;
}

$id = $_GET["id"];
$hasil = mysqli_execute_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = ?", [$id]);
$row = mysqli_fetch_assoc($hasil);

$daftar = mysqli_query($koneksi, "SELECT * FROM lapangan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Pesanan</title>
</head>
<body>
    <div class="header">
        <h1>Edit Pesanan</h1>
        <p>Ubah data pesanan lalu simpan</p>
    </div>
    <div class="kotak">
        <form class="form" method="POST">
            <h2>Ubah data berikut:</h2>

            <input type="hidden" name="id_pesanan" value="<?= $row["id_pesanan"] ?>">

            <div class="form-group">
                <label for="nama">Nama Anda:</label>
                <input type="text" id="nama" name="nama_penyewa" value="<?= htmlspecialchars($row["nama_penyewa"]) ?>" required>
            </div>

            <div class="form-group">
                <label for="lapangan">Sewa Lapangan:</label>
                <select id="lapangan" name="id_lapangan" required>
                    <?php while ($l = mysqli_fetch_assoc($daftar)) { ?>
                        <option value="<?= $l["id_lapangan"] ?>"
                            <?= $l["id_lapangan"] == $row["id_lapangan"] ? "selected" : "" ?>>
                            <?= $l["nama_lapangan"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="tombol">Simpan Perubahan</button>
        </form>

        <div class="tengah">
            <a href="index.php" class="link-kembali">&larr; Kembali ke daftar lapangan</a>
        </div>
    </div>

</body>
</html>