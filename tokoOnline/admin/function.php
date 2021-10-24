<?php 

	$conn = mysqli_connect("localhost","root","","toko_online");


function query($query){
	global $conn;
	
	$result = mysqli_query($conn, $query);
	$rows = []; 
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;

	}
		return $rows;
}


function tambah($data){
	
			global $conn;
				//htmlspecialchars(); aman.. memastikan yang masuk adalah spc char

			$judul = htmlspecialchars($data["judul"]);
			$deskripsi = htmlspecialchars($data["deskripsi"]);
			$harga = htmlspecialchars($data["harga"]);
			$genre = htmlspecialchars($data["genre"]);
			$penulis = htmlspecialchars($data["penulis"]);
			$penerbit = htmlspecialchars($data["penerbit"]);

			$gambar = upload();
			if ( !$gambar ) {
				return false;
			}


					//insert into untuk menambah
			$query = "INSERT INTO buku
						VALUES 
						('', '$judul', '$deskripsi','$gambar','$harga','$genre','$penulis','$penerbit')
						";
			mysqli_query($conn, $query);


		return mysqli_affected_rows($conn);

}
function upload(){
		$printNama = $_FILES['gambar']['name'];
		$printUkuran=$_FILES['gambar']['size'];
		$printError = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		//cek upload foto
		if ($printError === 4) {
			echo 	"<script>
						alert('Pilh gambar terlebih dahulu');
					</script>";
			return false;
		}

		//Hanya upload gambar
		//delimiter untuk memecah 

			//ValidExt dari default dev
			//EctFoto dari upload user



		$ValidExt = ['jpg','jpeg','png'];
		$ExtFoto = explode('.', $printNama);
		$ExtFoto = strtolower(end($ExtFoto));

		if ( !in_array($ExtFoto, $ValidExt)) {
			echo 	"<script>
						alert('Tolong upload gambar!');
					</script>";
			return false;
		}

		//jika ukurannya terlalu besar

		if ($printUkuran > 1000000) {
			echo 	"<script>
						alert('ukuran gambar terlalu besar');
					</script>";
			return false;
		}

		//lolos syarat
		//generate nama baru
		$newName = uniqid();
		$newName .='.';
		$newName .= $ExtFoto;


		move_uploaded_file($tmpName, 'img/' . $newName);

		return $newName;


}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM buku
		 WHERE 
		 judul LIKE '%$keyword%' OR 
		 penulis LIKE '%$keyword%' OR
		 penerbit LIKE '%$keyword%'
	";}

 ?>