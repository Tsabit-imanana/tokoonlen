<?php 
require 'admin/function.php';
$conn = mysqli_connect("localhost","root","","toko_online");

$buku = query("SELECT * FROM buku ");


if (isset($_POST["cari"])) {
	$buku = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
<a href="admin/login.php">Login as admin? </a>
<center>
	<form action ="" method="post">	
		<input type="text" name="keyword" size="45" autofocus placeholder="Cari namamu!"
		autocomplete="off">
		<button type="submit" name="cari">Search!</button>
	</form>
</center>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>judul</th>
		<th>gambar</th>
		<th>Deskripsi</th>
		<th>genre</th>
		<th>penulis</th>
		<th>Penerbit</th>
		<th>Harga</th>
	</tr>
<?php foreach( $buku as $row): ?>
	<tr>
		<th><?php echo $row["judul"] ?></th>
		<td><img src="admin/img/<?php echo $row["gambar"] ?>"width= 50></td>
		<td><?php echo $row["deskripsi"] ?></td>
		<td><?php echo $row["genre"] ?></td>
		<td><?php echo $row["penulis"] ?></td>
		<td><?php echo $row["penerbit"] ?></td>
		<td><?php echo $row["harga"] ?></td>
	</tr>


<?php endforeach ?>

</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>