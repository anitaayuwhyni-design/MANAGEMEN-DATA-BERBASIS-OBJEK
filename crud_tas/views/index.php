<?php
require_once "../config/Database.php";
require_once "../models/Tas.php";

$db = new Database();
$conn = $db->connect();
$tas = new Tas($conn);

if (isset($_GET['hapus'])) {
    $tas->delete($_GET['hapus']);
    header("Location: index.php");
}

$data = $tas->getAll();
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Tas</title>
<style>
body { font-family: Arial; background:#f4f6f9; }
.container {
    width:80%; margin:auto;
    background:white; padding:20px;
    border-radius:10px;
}
h2 { text-align:center; }

a {
    padding:8px 12px;
    color:white;
    border-radius:5px;
    text-decoration:none;
}
.btn-tambah { background:#28a745; }
.btn-edit { background:#007bff; }
.btn-hapus { background:#dc3545; }

table {
    width:100%;
    margin-top:15px;
    border-collapse:collapse;
}
th {
    background:#343a40;
    color:white;
    padding:10px;
}
td {
    padding:10px;
    text-align:center;
}
tr:nth-child(even){ background:#eee; }
</style>
</head>

<body>
<div class="container">
<h2>👜 Data Tas</h2>

<a href="tambah.php" class="btn-tambah">+ Tambah Tas</a>

<table border="1">
<tr>
<th>No</th>
<th>Nama Tas</th>
<th>Merk</th>
<th>Warna</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama_tas'] ?></td>
<td><?= $row['merk'] ?></td>
<td><?= $row['warna'] ?></td>
<td>Rp <?= number_format($row['harga']) ?></td>
<td><?= $row['stok'] ?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
<a href="?hapus=<?= $row['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
</td>
</tr>
<?php } ?>

</table>
</div>
</body>
</html>