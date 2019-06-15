<?php 
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location:index.php");
  exit;
}
require"function.php";
$id = $_GET["id"];

if( del($id) > 0 ){
	 echo "<script>
      alert('Anda Berhasil Menghapus Data');
        document.location.href='utama.php';
      </script>";
}
else{
     echo "<script>
      alert('Anda Gagal Menghapus Data');
        document.location.href='utama.php';
      </script>";
    }



 ?>