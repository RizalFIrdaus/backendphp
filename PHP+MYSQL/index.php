<?php 
session_start();
require"function.php";

if( isset($_COOKIE["kid"]) && isset($_COOKIE["urnm"]) ){
    
    $kid = $_COOKIE["kid"];
    $urnm = $_COOKIE["urnm"];

    $result = mysqli_query($db,"SELECT username FROM users WHERE id='$kid'");
    $user = mysqli_fetch_assoc($result);

    if ( $urnm === hash("tiger128,3",$user["username"]) ){
        $_SESSION["login"] = true;
    }

}

if( isset($_SESSION["login"]) ){
  header("Location:utama.php");
  exit;
}



if( isset($_POST["login"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db , "SELECT * FROM users WHERE username = '$username' ");

  if ( mysqli_num_rows($result) == 1 ){

    $user = mysqli_fetch_assoc($result);
    if ( password_verify($password, $user["password"]) ){
        
      $_SESSION["login"] = true;


      if ( isset($_POST["remember"]) ){

          setcookie("kid",$user["id"],time()+60);
          setcookie("urnm",hash("tiger128,3",$user["username"]),time()+60);

      }

      header("location: utama.php");
      exit;
    }
  }
  $error = true;

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
          height: 40px;
          float: right;
      }
      .add p {
        line-height: 20px;
      }
    </style>
    <title>Registration</title>
  </head>
  <body>
  <div class="container">
    <p class="display-4 text-center">Login</p>
    <div class="regis">
      <form method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">  
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember" >Remember me</label>
        </div>
        <?php if(isset($error)) : ?>
            <p style="color:red;font-style: italic;">Username atau password salah!</p>
          <?php endif ?>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <a href="registration.php" class="badge badge-primary add"><p>Registration</p></a>
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