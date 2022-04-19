
<?php
/*
    //Location of your site which contains route.php
    $site_url = 'http://localhost/route/';


    <?php
    */
// Informations d'identification

$servername = "localhost";
$username = "root";
$password = "";
$bd_name = "gtek";
// Connexion à la base de données MySQL 
$conn = mysqli_connect($servername, $username, $password, $bd_name);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>