<?php 
session_start();

$_SESSION["login"]=[];
session_unset();
session_destroy();

setcookie("kid","",time()-3600);
setcookie("urnm","",time()-3600);
header("Location:index.php");
exit;



 ?>