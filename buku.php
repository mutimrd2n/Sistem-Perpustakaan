<!DOCTYPE html>
<html>
<head>
<title>Data Buku</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>📚 Data Buku Perpustakaan</h1>

<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];

mysqli_query($conn,"INSERT INTO buku VALUES(NULL,'$judul','$penulis','$tahun','$stok')");
}
?>

<div class="form-box">

<h2>Input Buku</h2>

<form method="POST">

<label>Judul Buku</label>
<input type="text" name="judul">

<label>Penulis</label>
<input type="text" name="penulis">

<label>Tahun Terbit</label>
<input type="text" name="tahun">

<label>Stok</label>
<input type="text" name="stok">

<button name="simpan">Simpan</button>

</form>

</div>

<hr>

<div class="table-box">

<h2>Daftar Buku</h2>

<table>

<tr>
<th>No</th>
<th>Judul</th>
<th>Penulis</th>
<th>Tahun</th>
<th>Stok</th>
</tr>

<?php

$data = mysqli_query($conn,"SELECT * FROM buku");

while($d = mysqli_fetch_array($data)){
?>

<tr>
<td><?php echo $d['id_buku']; ?></td>
<td><?php echo $d['judul']; ?></td>
<td><?php echo $d['penulis']; ?></td>
<td><?php echo $d['tahun_terbit']; ?></td>
<td><?php echo $d['stok']; ?></td>
</tr>

<?php } ?>

</table>

</div>

<br>
<a href="index.php" class="btn">⬅ Kembali</a>

</div>

</body>
</html>