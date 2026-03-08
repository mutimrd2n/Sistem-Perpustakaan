<!DOCTYPE html>
<html>
<head>
<title>Data Anggota</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>📚 Data Anggota Perpustakaan</h1>

<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];

mysqli_query($conn,"INSERT INTO anggota VALUES(NULL,'$nama','$alamat','$no_hp')");
}
?>

<div class="form-box">

<h2>Input Anggota</h2>

<form method="POST">

<label>Nama</label>
<input type="text" name="nama">

<label>Alamat</label>
<input type="text" name="alamat">

<label>No HP</label>
<input type="text" name="no_hp">

<button name="simpan">Simpan</button>

</form>

</div>


<div class="table-box">

<h2>Daftar Anggota</h2>

<table>
<tr>
<th>No</th>
<th>Nama</th>
<th>Alamat</th>
<th>Nomor HP</th>
</tr>

<?php
$data=mysqli_query($conn,"SELECT * FROM anggota");

while($d=mysqli_fetch_array($data)){
?>

<tr>
<td><?php echo $d['id_anggota']; ?></td>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['alamat']; ?></td>
<td><?php echo $d['no_hp']; ?></td>
</tr>

<?php } ?>

</table>

</div>

<br>
<a href="index.php" class="btn">⬅ Kembali</a>

</div>

</body>
</html>