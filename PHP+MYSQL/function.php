<?php 
$db = mysqli_connect("localhost","root","","laptops");

// Function connect to database MySQL
function query($que){
	global $db;
	$result = mysqli_query($db,$que);
	$product = [];
	while($laptops = mysqli_fetch_assoc($result)){
		$product[] = $laptops;
	}
	return $product	;
} 


function add($postData){
	global $db;

	$nama = htmlspecialchars($postData["nama"]);
	$brand = htmlspecialchars($postData["brand"]);
	$processor = htmlspecialchars($postData["processor"]);
	$ram = htmlspecialchars($postData["ram"]);
	$vga = htmlspecialchars($postData["vga"]);
	$gambar = upload();
	if (!$gambar){
		return false;
	}

	$que = "INSERT INTO product_laptops VALUES('','$nama','$brand','$processor','$ram','$vga','$gambar')";
	mysqli_query($db,$que);

	return mysqli_affected_rows($db);

}

function del($id){
	global $db;
	$que = "DELETE FROM product_laptops WHERE id=$id";
	mysqli_query($db,$que);
	return mysqli_affected_rows($db);
}


function update($postData){
	global $db;
	$id = $_GET["id"];
	$nama = htmlspecialchars($postData["nama"]);
	$brand = htmlspecialchars($postData["brand"]);
	$processor = htmlspecialchars($postData["processor"]);
	$ram = htmlspecialchars($postData["ram"]);
	$vga = htmlspecialchars($postData["vga"]);
	$gambarlama = htmlspecialchars($postData["gambarlama"]);
	if( $_FILES["gambar"]["error"] == 4 ){
		$gambar = $gambarlama;
	}else{
		$gambar = upload();
	}
	


	$que = "UPDATE product_laptops SET nama='$nama',brand='$brand',processor='$processor',ram='$ram',vga='$vga',gambar='$gambar' WHERE id='$id' ";

	mysqli_query($db,$que);

	return mysqli_affected_rows($db);

}

function search($keyword){

	global $db;

	$que = "SELECT * FROM product_laptops WHERE 
			nama LIKE '%$keyword%' OR 
			brand LIKE '%$keyword%' OR 
			processor LIKE '%$keyword%' OR 
			ram LIKE '%$keyword%' OR 
			vga LIKE '%$keyword%' 
			";

	mysqli_query($db,$que);

	return query($que);
}


function upload (){

	// Membuat variabel untuk menangani upload gambar
	$namaGambar = $_FILES["gambar"]["name"];
	$tmpNama = $_FILES["gambar"]["tmp_name"];
	$error = $_FILES["gambar"]["error"];
	$size = $_FILES["gambar"]["size"];


	// Untuk mengangani error dengan file $error
	if ( $error == 4 ){
		echo "<script>
		      alert('Anda belum upload gambar');
		      </script>";
		return false;
	}

	// melakukan pengecekan apakah gambar yang di kirim atau bukan 
	$ekstensiGambarValid = ["jpeg","png","jpg","gif"];
	$ekstensiGambar = explode(".",$namaGambar);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	$ekstensiGambarB = uniqid();
	$ekstensiGambarB .=".";
	$ekstensiGambarB .="$ekstensiGambar";
	$Gambar = $ekstensiGambarB;
	// pengecekannya
	if( !in_array($ekstensiGambar,$ekstensiGambarValid) ){
		echo "<script>
		      alert('Yang anda upload bukan gambar !');
		      </script>";
		return false;
	}

	if ( $size > 1000000 ){
		echo "<script>
		      alert('Gambar yang anda masukkan terlalu besar (MAX 1MB)');
		      </script>";
		return false;
	}

	// Jika lolos pengecekan pada 3 kondisi diatas ,artinya siap di upload 
	move_uploaded_file($tmpNama ,"img/".$Gambar);
	return $Gambar;

}

function registration($data) {
	global $db;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($db,$data["password"]);
	$email = mysqli_real_escape_string($db,$data["email"]);
	$confirmPw = mysqli_real_escape_string($db,$data["password2"]);


	if ($username === "" || $password ==="" || $email ==="" ){
		echo "<script>
		      alert('Anda belum memasukkan data !');
		      </script>";
		return false;
	}

	if ( $password !== $confirmPw ){
		echo "<script>
		      alert('Konfirmasi passowrd tidak sama !');
		      </script>";
		return false;
	}

	$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username' ");
	if ( mysqli_fetch_assoc($result) ){
		echo "<script>
		      alert('Username sudah terdaftar');
		      </script>";
		return false;
	}
	$result2 = mysqli_query($db, "SELECT email FROM users WHERE email = '$email' ");
	if ( mysqli_fetch_assoc($result2) ){
		echo "<script>
		      alert('Email sudah terdaftar');
		      </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($db , "INSERT INTO users VALUES('','$username','$email','$password')");

	return mysqli_affected_rows($db);
}






 ?>