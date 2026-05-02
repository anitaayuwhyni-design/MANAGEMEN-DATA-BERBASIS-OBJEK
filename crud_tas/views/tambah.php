<?php
require_once "../config/Database.php";
require_once "../models/Tas.php";

$db = new Database();
$conn = $db->connect();
$tas = new Tas($conn);

if (isset($_POST['simpan'])) {
    $tas->create(
        $_POST['nama'],
        $_POST['merk'],
        $_POST['warna'],
        $_POST['harga'],
        $_POST['stok']
    );
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body { font-family:Arial; background:#f4f6f9; }
.box {
    width:400px; margin:80px auto;
    background:white; padding:20px;
    border-radius:10px;
}
input {
    width:100%; padding:8px;
    margin:8px 0;
}
button {
    width:100%; padding:10px;
    background:#28a745; color:white;
}
</style>
</head>

<body>
<div class="box">
<h2>Tambah Tas</h2>

<form method="POST">
<input type="text" name="nama" placeholder="Nama Tas">
<input type="text" name="merk" placeholder="Merk">
<input type="text" name="warna" placeholder="Warna">
<input type="number" name="harga" placeholder="Harga">
<input type="number" name="stok" placeholder="Stok">
<button name="simpan">Simpan</button>
</form>
</div>
</body>
</html>