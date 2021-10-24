 <?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'function.php';

if(isset($_POST["submit"]) ) {


	if (tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";

	} else{
		echo "
			<script>
				alert('Data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" >
		
	<label for="judul" class="text-info">judul:</label>
    <input type="text" name="judul" autocomplete="off"> <br>

    <label for="deskripsi" class="text-info">deskripsi:</label>
    <input type="text" name="deskripsi" autocomplete="off"> <br>

    <label for="harga" class="text-info">harga:</label>
    <input type="text" name="harga" autocomplete="off"> <br>

    <label for="genre" class="text-info">genre:</label>
    <input type="text" name="genre" autocomplete="off"> <br>

    <label for="penulis" class="text-info">penulis:</label>
    <input type="text" name="penulis" autocomplete="off"> <br>

    <label for="penerbit" class="text-info">penerbit:</label>
    <input type="text" name="penerbit" autocomplete="off"> <br>

	<label for="gambar" class="text-info">gambar:</label>
    <input type="file" name="gambar" autocomplete="off"> <br>

	 <button type="submit" name="submit" value="submit">tambah</button>



	</form>
		<a href="index.php">kembali?</a>
</body>
</html>