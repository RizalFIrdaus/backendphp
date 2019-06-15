<?php 
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location:index.php");
  exit;
}



require"function.php";
$laptop = query("SELECT * FROM product_laptops ");
// Search
if ( isset($_POST["search"]) ){
    
  $laptop = search($_POST["Keyword"]);

}


 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-4.3.1/css/bootstrap.css">
    <title>Laptop Product</title>
    <style>
      .loader{
        width: 40px;
        opacity: 0;

      }
    </style>
  </head>
  <body>



  <div class="container">
      <div class="judul"><h1 class="text-center display-4">Laptop Product</h1></div>
      <nav class="navbar navbar-light bg-light">
       <a href="add.php" class="badge badge-primary add">Tambah Data</a>
        <a href="logout.php" class="badge badge-primary add">Logout</a>
        <form class="form-inline" method="post">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Keyword" aria-label="Search" autocomplete="off" autofocus id="Keyword">
          <img src="img/loader.gif" class="loader">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search" id="search">Search</button>
        </form>
      </nav>
      <div id="container">
        <table class="table table-hover">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Gambar</th>
            <th scope="col">Edit</th>
            <th scope="col">Nama Laptop</th>
            <th scope="col">Brand</th>
            <th scope="col">Processor</th>
            <th scope="col">RAM</th>
            <th scope="col">VGA</th>
          </tr>
        
            <?php $i = 1; ?>

            <?php foreach($laptop as $lap) :?>
            <tr>
              <td scope="row"><?= $i; ?></td>
              <td><img src="img/<?= $lap["gambar"]; ?>" width="200" class="img-thumbnail"></td>
              <td class="edit">
                <a href="update.php?id=<?= $lap["id"]; ?>" class="badge badge-primary">Ubah</a> |
                <a href="del.php?id=<?= $lap["id"]; ?>" class="badge badge-primary">Hapus</a>
              </td>
              <td><?= $lap["nama"]; ?></td>
              <td><?= $lap["brand"]; ?></td>
              <td><?= $lap["processor"]; ?></td>
              <td><?= $lap["ram"]; ?></td>
              <td><?= $lap["vga"]; ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>

        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>