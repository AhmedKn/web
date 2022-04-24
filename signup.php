<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up </title>
    <link rel="stylesheet" href="./styles/signup.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <script type="text/javascript">
function verif_formulaire()
{/*
 if(document.getElementById("nom").value== "")  {
  alert("Veuillez entrer votre nom!");
   document.formulaire.nom_agent.focus();
   return false;
  }
 if(document.getElementById("prenom").value == "")  {
   alert("Veuillez entrer un prénom!");
   document.formulaire.prenom.focus();
   return false;
  }
 if(document.getElementById("email").value == "") {
   alert("Veuillez entrer votre adresse électronique!");
   document.formulaire.email.focus();
   return false;
  }
 if(document.getElementById("email").value.indexOf('@') == -1) {
   alert("Ce n'est pas une adresse électronique!");
   document.formulaire.email.focus();
   return false;
  }
  if(document.getElementById("email").value.indexOf('.') == -1) {
   alert("Ce n'est pas une adresse électronique!");
   document.formulaire.email.focus();
   return false;
  }
  if(document.getElementById("mdp").value == "")  {
   alert("Veuillez entrer un mot de passe!");
   document.formulaire.mdp.focus();
   return false;
  }
 if(document.getElementById("mdp").value.length < 8) {
   alert("Veuillez entrer au moins 8 caractères !");
   document.formulaire.mdp.focus();
   return false;
  }
  if(document.getElementById("cmdp").value == "")  {
   alert("Veuillez confirmer mot de passe!");
   document.formulaire.cmdp.focus();
   return false;
  }
  if(document.getElementById("mdp").value != document.getElementById("cmdp").value )  {
   alert("Verif  mot de passe incorrect!");
   document.formulaire.mdp.focus();
   document.formulaire.cmdp.focus();
   return false;
  }*/
  if(document.getElementById("ville").value == "")  {
   alert("Veuillez entrer une ville!");
   document.formulaire.ville.focus();
   return false;
  }
  if(document.getElementById("code_postal").value == "")  {
   alert("Veuillez entrer un code postal!");
   document.formulaire.code_postal.focus();
   return false;
  }
  if(isNaN(document.getElementById("code_postal").value)) {
   alert("Veuillez entrer des chiffres !");
   document.formulaire.code_postal.focus();
   return false;
  }
  if(document.getElementById("code_postal").value.length != 4) {
   alert("Veuillez entrer 4 chiffres !");
   document.formulaire.code_postal.focus();
   return false;
  }
  if(document.getElementById("adresse").value == "")  {
   alert("Veuillez entrer une adresse!");
   document.formulaire.adresse.focus();
   return false;
  }
  if(document.getElementById("telephone").value == "")  {
   alert("Veuillez entrer un numero de telephone!");
   document.formulaire.telephone.focus();
   return false;
  }
  if(isNaN(document.getElementById("telephone").value)) {
   alert("Veuillez entrer des chiffres !");
   document.formulaire.telephone.focus();
   return false;
  }
  if(document.getElementById("telephone").value.length != 8) {
   alert("Veuillez entrer un numero de 8 chiffres !");
   document.formulaire.telephone.focus();
   return false;
  }
 }
</script>
  </head>
  <body>
    <div class="signup-box">
      <h1>Créer un compte</h1>
      
      <form name="formulaire_agent" method="post" >
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre nom " id ="nom" name="nom" required>
        <label><b>Prénom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre prénom " id ="prenom" name="prenom" required>
        <label><b>Email</b></label>
        <input type="email" placeholder="Taper votre email" id ="email" name="email" />
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer votre mot de passe" id ="mdp" name="mdp" required>
        <label><b>Confirmer mot de passe</b></label>
        <input type="password" placeholder="Confirmer votre mot de passe" id ="cmdp" name="cmdp" required>
        <label><b>Ville</b></label>
        <input type="text" placeholder="Entrer votre ville "id ="ville" name="ville" required>
        <label><b>Code postal</b></label>
        <input type="text" placeholder="Entrer votre code postal "id ="code_postal" name="code_postal" required>
        <label><b>Adresse</b></label>
        <input type="text" placeholder="Entrer votre adresse "id ="adresse" name="adresse" required>
        <label><b>Téléphone</b></label>
        <input type="tel" name="telephone" id ="telephone" length="8" required/>  
        
        <input type="submit" value="Créer un compte" onclick="verif_formulaire()">
      </form>
      <p>
        En cliquant sur créer un compte,vous acceptez nos <br />
        <a href="#">Conditions générales</a> et notre <a href="#">Politique de confidentialité</a>
      </p>
    </div>
    <p class="para-2">
      Vous avez déjà un compte? <a href="login.php">Connectez-vous !</a>
    </p>
  </body>
</html>

<?php
/*
extract($_POST);
include("gtek.sql");
$sql=mysqli_query($con,"SELECT * FROM register where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else(isset($_POST['save']))
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="upload/";
    $new_file_name = strtolower($file);
    $final_file=str_replace(' ','-',$new_file_name);
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $query="INSERT INTO register(First_Name, Last_Name, Email, mdp, File ) VALUES ('$first_name', '$last_name', '$email', 'md5($pass)', '$final_file')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: login.php?status=success");
    }
    else 
    {
		echo "Error.Please try again";
	}
}
*/
?>
<?php
require('connect.php');
if (isset($_POST['nom'],$_POST['prenom'], $_POST['email'], $_POST['mdp'])){
  // récupérer le nom d'utilisateur 
  $nom = $_POST['nom'];
  
   // récupérer le prenom d'utilisateur  
  $prenom = $_POST['prenom'];
  // récupérer l'email 
  $email =$_POST['email'];
  // récupérer le mot de passe 
  $mdp =$_POST['mdp'];
   // récupérer la ville 
   $ville =$_POST['ville'];
   // récupérer le code postal 
  $code_postal =$_POST['code_postal'];
   // récupérer l'adresse d'utilisateur 
   $adresse =$_POST['adresse'];
  // récupérer num tel d'utilisateur 
   $telephone =$_POST['telephone'];
  //requéte SQL + mot de passe crypté
    $query = "INSERT into client (nom, prenom, email, mdp, ville, code_postal, adresse, telephone)
              VALUES ('$nom','$prenom', '$email', '$mdp', '$ville', '$code_postal', '$adresse', '$telephone')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($con, $query);
    if($res){
            header("Location: home.php");
            exit();
            // ki ta3mel home page mta3 user connected nbadlou location
    }
}
/*
else{
?>
   <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
*/



