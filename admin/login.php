<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="../styles/signup.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    
  <?php
  
    require('../connect.php');
    if (isset($_POST['email'])){
      $email = $_POST['email'];
      $mdp = $_POST['mdp'];
     $query = "SELECT * FROM admin WHERE email='$email' and mdp='$mdp'";
      $result = mysqli_query($con,$query) or die(mysqli_error($con));
      $res=mysqli_fetch_array($result);
      $rows = mysqli_num_rows($result);
      if($rows==1){
        setcookie("admin", $res['id_admin'], time() + 2 * 24 * 60 * 60);
          header("Location: home.php");
      }else{
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      }
    }
  ?>
    <div class="login-box">
      <h1>Se connecter</h1>
      <form method="post" action="">
        <label><b>Email</b></label>
        <input type="email" name="email" placeholder="Taper votre email" />
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer votre mot de passe" name="mdp" id="mdp" required>
        <input type="submit" value="Connexion" />
      </form>
    </div>
    <p class="para-2">
      Vous n'avez pas de compte? <a href="signup.php">Créez-en un</a>
    </p>
  </body>
</html>