<?php
require_once "../config/Database.php";
require_once "../models/Tas.php";

$db = new Database();
$conn = $db->connect();
$tas = new Tas($conn);

$id = $_GET['id'];
$data = mysqli_fetch_assoc($tas->getById($id));

if (isset($_POST['update'])) {
    $tas->update(
        $id,
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
    background:#007bff; color:white;
}
</style>
</head>

<body>
<div class="box">
<h2>Edit Tas</h2>

<form method="POST">
<input type="text" name="nama" value="<?= $data['nama_tas'] ?>">
<input type="text" name="merk" value="<?= $data['merk'] ?>">
<input type="text" name="warna" value="<?= $data['warna'] ?>">
<input type="number" name="harga" value="<?= $data['harga'] ?>">
<input type="number" name="stok" value="<?= $data['stok'] ?>">
<button name="update">Update</button>
</form>
</div>
</body>
</html>