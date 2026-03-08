<!DOCTYPE html>
<html>
<head>
<title>Peminjaman Buku</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>📚 Transaksi Peminjaman Buku</h1>

<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

$id_anggota = $_POST['anggota'];
$id_buku = $_POST['buku'];
$tgl_pinjam = $_POST['pinjam'];
$tgl_kembali = $_POST['kembali'];

mysqli_query($conn,"INSERT INTO peminjaman VALUES(NULL,'$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali')");
}
?>

<div class="form-box">

<h2>Input Peminjaman</h2>

<form method="POST">

<label>Anggota</label>
<select name="anggota">

<?php
$a = mysqli_query($conn,"SELECT * FROM anggota");

while($d = mysqli_fetch_array($a)){
?>

<option value="<?php echo $d['id_anggota']; ?>">
<?php echo $d['nama']; ?>
</option>

<?php } ?>

</select>

<label>Buku</label>
<select name="buku">

<?php
$b = mysqli_query($conn,"SELECT * FROM buku");

while($d = mysqli_fetch_array($b)){
?>

<option value="<?php echo $d['id_buku']; ?>">
<?php echo $d['judul']; ?>
</option>

<?php } ?>

</select>

<label>Tanggal Pinjam</label>
<input type="date" name="pinjam">

<label>Tanggal Kembali</label>
<input type="date" name="kembali">

<br><br>

<button name="simpan">Simpan</button>

</form>

</div>

<hr>

<div class="table-box">

<h2>Data Peminjaman</h2>

<table>

<tr>
<th>No</th>
<th>Nama Anggota</th>
<th>Judul Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
</tr>

<?php

$query = mysqli_query($conn,"
SELECT peminjaman.id_pinjam, anggota.nama, buku.judul, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali
FROM peminjaman
JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
JOIN buku ON peminjaman.id_buku = buku.id_buku
");

$no = 1;
while($data = mysqli_fetch_array($query)){
?>

<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $data['nama']; ?></td>
<td><?php echo $data['judul']; ?></td>
<td><?php echo date('d/m/Y', strtotime($data['tanggal_pinjam'])); ?></td>
<td><?php echo date('d/m/Y', strtotime($data['tanggal_kembali'])); ?></td>
</tr>

<?php } ?>

</table>

</div>

<br>
<a href="index.php" class="btn">⬅ Kembali</a>

</div>

</body>
</html>