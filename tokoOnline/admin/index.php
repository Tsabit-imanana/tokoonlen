<?php 
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
$buku = query("SELECT * FROM buku ");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="tambah.php">Tambah buku</a>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>judul</th>
		<th>gambar</th>
		<th>Deskripsi</th>
		<th>genre</th>
		<th>penulis</th>
		<th>Penerbit</th>
		<th>Harga</th>
		<td>ubah/hapus</td>
	</tr>
<?php foreach( $buku as $row): ?>
	<tr>
		<th><?php echo $row["judul"] ?></th>
		<td><img src="img/<?php echo $row["gambar"] ?>"width= 50></td>
		<td><?php echo $row["deskripsi"] ?></td>
		<td><?php echo $row["genre"] ?></td>
		<td><?php echo $row["penulis"] ?></td>
		<td><?php echo $row["penerbit"] ?></td>
		<td><?php echo $row["harga"] ?></td>
		<td>
			<a href="Edit.php?ID=<?php echo $row["id"]; ?>" >Edit</a> |
			<a href="hapus.php?ID= <?php echo $row["id"]; ?>" >Delete</a>
		</td>
	</tr>


<?php endforeach ?>

</table>
	<a href="logout.php">Logout?</a>
</body>
</html>