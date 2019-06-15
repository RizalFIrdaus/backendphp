<?php 
require"function.php";

if( isset($_POST["registration"]) ){

  if( registration($_POST) > 0 ){
    echo "<script>
          alert('Anda berhasil registrasi');
          document.location.href='index.php';
          </script>";
  }
  else{
    echo mysqli_error($db);
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
    <style>
      .regis{
        width: 500px;
        height: auto;
        margin-right: auto;
        margin-left: auto;
      }
      .add{
          padding: 10px;
          font-weight: 400;
          height: 30px;
      }
      .add p {
        line-height: 25px;
      }
    </style>
    <title>Registration</title>
  </head>
  <body>
  <div class="container">
    <p class="display-4 text-center">Registration</p>
    <div class="regis">
      <form method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">  
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
        </div>
        <div class="form-group">
          <label for="password2">Konfirmasi Password</label>
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan ulang Password">
        </div>
        <button type="submit" class="btn btn-primary" name="registration">Registration</button>
        <a href="index.php" class="badge badge-danger add">Kembali</a>
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