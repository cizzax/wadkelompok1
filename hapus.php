<?php
require "koneksi.php";

$id = $_GET["id"] ?? 0;

mysqli_execute_query($koneksi, "DELETE FROM pelanggan WHERE id = ?", [$id]);

header("Location: index.php");
exit;
?>