<?php 
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location:index.php");
  exit;
}
require"function.php";

  if (isset($_POST["submit"])){
    if(add($_POST)>0){
      echo "<script>
      alert('Anda Berhasil Menambahkan Data');
        document.location.href='utama.php';
      </script>";
    }
    else{
     echo "<script>
      alert('Anda Gagal Menambahkan Data'); 
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

    <title>Tambah Data</title>
  </head>
  <body>
    

  <div class="container">
    <p class="display-4 text-center">Tambahkan Data</p>
    <div class="add">
      <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama">Nama Laptop</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="brand">Brand Laptop</label>
          <input type="text" class="form-control" id="brand" name="brand" placeholder="Masukkan brand" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="processor">Processor</label>
          <input type="text" class="form-control" id="processor" name="processor" placeholder="Masukkan Processor" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="ram">RAM</label>
          <input type="text" class="form-control" id="ram" name="ram" placeholder="Masukkan RAM" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="vga">VGA</label>
          <input type="text" class="form-control" id="vga" name="vga" placeholder="Masukkan VGA" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="gambar">Masukkan Gambar</label>
          <input type="file" class="form-control-file" id="gambar" name="gambar" >
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
        <a href="utama.php" class="btn btn-danger btn-md hover" role="button" aria-pressed="true">Kembali</a>
      </form>
    </div>
  </div>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>