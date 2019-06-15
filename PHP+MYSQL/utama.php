<?php 
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location:index.php");
  exit;
}



require"function.php";

// Pegination
if ( !isset($_POST["search"])){
$halamanTampil = 5;
$jmlData = count(query("SELECT * FROM product_laptops"));
$jmlHalaman = ceil($jmlData / $halamanTampil) ;
if ( isset($_GET["page"]) ){
  $halamanAktif = $_GET["page"];
}else{
  $halamanAktif = 1;
}
$dataAwal = ($halamanTampil * $halamanAktif ) - $halamanTampil;
$laptop = query("SELECT * FROM product_laptops LIMIT $dataAwal , $halamanTampil");
}


// Search
if ( isset($_POST["search"]) ){
  $halamanTampil = 5;
  
  if ( isset($_GET["page"]) ){
    $halamanAktif = $_GET["page"];
  }else{
    $halamanAktif = 1;
  }
  $dataAwal = ($halamanTampil * $halamanAktif ) - $halamanTampil;
  $laptop = query("SELECT * FROM product_laptops ");
  
   $jmlData = count($laptop);
    $jmlHalaman = ceil($jmlData / $halamanTampil);
    
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
    <style>
      .pagination{
        margin-right: auto;
        margin-left: auto;
        padding: 10px;
      }
      .pagination button a {
        color: white;
        text-decoration: none;

      }
      .gtlt{
        font-size: 30px;
        margin-top: -7px;
        margin-left: 10px; 
        margin-right: 10px;
      }
    </style>
    <title>Laptop Product</title>
  </head>
  <body>



  <div class="container">
      <div class="judul"><h1 class="text-center display-4">Laptop Product</h1></div>
      <nav class="navbar navbar-light bg-light">
       <a href="add.php" class="badge badge-primary add">Tambah Data</a>
        <a href="logout.php" class="badge badge-primary add">Logout</a>
        <form class="form-inline" method="post">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Keyword" aria-label="Search" autocomplete="off" autofocus id="Keyword">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Search</button>
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
              <td scope="row"><?= $i+$dataAwal; ?></td>
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
    <!-- pagination -->

    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group pagination" role="group" aria-label="First group">
        <?php if ( !isset($_POST["search"]) ): ?>
            <?php if($halamanAktif > 1) :?>
              <a href="?page=<?= $halamanAktif-1 ?>" class="gtlt">&laquo;</a>
            <?php endif; ?>
            
            <?php for($i = 1 ; $i <= $jmlHalaman; $i++) :?>
              <?php if($i == $halamanAktif): ?>
              <a href="?page=<?= $i ?>"><button type="button" class="btn btn-primary" style="background-color: #0056D8"><?= $i ?></button></a>
              <?php else : ?>
              <a href="?page=<?= $i ?>"><button type="button" class="btn btn-primary"><?= $i ?></button></a>
              <?php endif; ?>
            <?php endfor ;?>

            <?php if($halamanAktif < $jmlHalaman) :?>
              <a href="?page=<?= $halamanAktif+1 ?>" class="gtlt">&raquo;</a>
            <?php endif; ?>
         <?php endif; ?> 
      </div>
    </div>
  </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/script.js"></script>
  </body>
</html>