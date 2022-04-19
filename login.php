<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="./styles/signup.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    
  <?php
  
    require('config.php');
    session_start();
    if (isset($_POST['email'])){
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($conn, $email);
      $mdp = stripslashes($_REQUEST['mdp']);
      $mdp = mysqli_real_escape_string($conn, $mdp);
        $query = "SELECT * FROM `users` WHERE email='$email' and mdp='".hash('sha256', $mdp)."'";
      $result = mysqli_query($conn,$query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      if($rows==1){
          $_SESSION['email'] = $email;
          header("Location: home.php");
      }else{
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      }
    }
  ?>
    <div class="login-box">
      <h1>Se connecter</h1>
      <form method="post">
        <label><b>Email</b></label>
        <input type="email" placeholder="Taper votre email" />
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer votre mot de passe" name="mdp" id="mdp" required>
        <input type="button" value="Connexion" />
      </form>
    </div>
    <p class="para-2">
      Vous n'avez pas de compte? <a href="signup.php">Créez-en un</a>
    </p>
  </body>
</html>