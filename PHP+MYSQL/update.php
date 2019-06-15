<?php 
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location:index.php");
  exit;
}
require"function.php";
$id = $_GET["id"];
$updates = query("SELECT * FROM product_laptops WHERE id=$id");
if (isset($_POST["submit"])){
    if(update($_POST)>0){
      echo "<script>
      alert('Anda Berhasil Update Data');
        document.location.href='utama.php';
      </script>";
    }
    else{
     echo "<script>
      alert('Anda Gagal Update Data');
      </script>";
    }

  }

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="css/styleadd.css">

    <title>Ubah Data</title>
  </head>
  <body>
    

  <div class="container">
    <p class="display-4 text-center">Ubah Data</p>
    <div class="add">
      <?php foreach($updates as $update) :?>
      <form  method="post" enctype="multipart/form-data">
        <input type="hidden" name="gambarlama" value="<?= $update["gambar"] ?>">
        <div class="form-group">
          <label for="nama">Nama Laptop</label>
          <input type="text" class="form-control" id="nama" name="nama"  required value="<?= $update['nama'] ?>">
        </div>
        <div class="form-group">
          <label for="brand">Brand Laptop</label>
          <input type="text" class="form-control" id="brand" name="brand" value="<?= $update['brand'] ?>" >
        </div>
        <div class="form-group">
          <label for="processor">Processor</label>
          <input type="text" class="form-control" id="processor" name="processor" value="<?= $update['processor'] ?>" >
        </div>
        <div class="form-group">
          <label for="ram">RAM</label>
          <input type="text" class="form-control" id="ram" name="ram" value="<?= $update['ram'] ?>" >
        </div>
        <div class="form-group">
          <label for="vga">VGA</label>
          <input type="text" class="form-control" id="vga" name="vga" value="<?= $update['vga'] ?>">
        </div>
        <div class="form-group">
          <label for="gambar">Masukkan Gambar</label><br>
          <img src="img/<?= $update["gambar"] ?>" width="93" class="img-thumbnail">
          <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        <a href="utama.php" class="btn btn-danger btn-md hover" role="button" aria-pressed="true">Kembali</a>
      </form>
    <?php endforeach ?>
    </div>
  </div>
