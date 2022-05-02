<?php
require_once("./connect.php");
$user_id=intval($_COOKIE["user"]);
  $req="select * from client where id_client='$user_id';";
  $res=mysqli_query($con,$req) or die(mysqli_error($con));
  $t=mysqli_fetch_array($res);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/navbar.css">
</head>
<body>
  <nav class="navbar">
      <img src="./assets//logo.png" alt="gtek_logo" />
       <div class="navbar-input-group">
       <input placeholder="Search" />
       <span><i class="fas fa-search"></i></span>
       </div>
        <div class="nav-btns">       
            <p class="connected-nav-np"><?php echo $t['nom'] ?> <?php echo $t['prenom'] ?></p>
            <div class="rgb-border">
          <a href="/route/dashboard.php">Dashboard</a>
          </div>
          <div class="rgb-border">
          <a href="/route/disconnect.php">Déconnexion</a>
          </div>
        </div>
  </nav>

</body>
</html>