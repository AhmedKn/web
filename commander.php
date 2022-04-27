<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/promotion.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/panier.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            if (isset($_COOKIE["user"]) && $_COOKIE["user"]=="null" || !isset($_COOKIE["user"]))
            {
                require_once("./navbarnot.php");
            }
            else
            {
                require_once("./navbar.php");
            }
            require_once("./navigator.php");
        ?>
    </header>
        <main>
            <div id="idsec">
                <?php $cost=$_GET["cost"];
                $bol=true;
                $prod=$_GET['prod'];
                $obj = json_decode($prod);
                
                require_once("./connect.php");
                $user_id=$_GET["id"];
                $req="select * from client where id_client='$user_id';";
                $res=mysqli_query($con,$req) or die(mysqli_error($con));
                $t=mysqli_fetch_array($res);
                if(isset($_POST["confirm"])){
                    $date = date('Y-m-d H:i:s');
                    $query="INSERT INTO commande (id_client,montant,date_enregistrement,etat) VALUES ('$user_id', '$cost',  '$date','livré');";
                    $rest = mysqli_query($con, $query) or die(mysqli_error($con));
                    $quer=mysqli_query($con,"SELECT * FROM commande where id_client='$user_id' AND montant='$cost' AND date_enregistrement='$date'") or die(mysqli_error($con));
                    $restt=mysqli_fetch_array($quer);
                    $id_com=$restt['id_commande'];
                    foreach($obj as $item) {
                        $quantity=$item->quantite;

                        $id_prod=$item->id;
                        if($item->prixpromo>0){
                            $prix=$item->prixpromo;
                            
                        }
                        else{
                            $prix=$item->prix;
                        }
                        $prixtot=floatval($prix)*intval($quantity);
                        $que="INSERT INTO details_commande(id_commande,id_produit,quantite,prix_unitaire,prix_tot) VALUES ('$id_com','$id_prod','$quantity','$prix','$prixtot')"; //inserting values here
                        $result=mysqli_query($con,$que) or die(mysqli_error($con));
                    }
                    if($rest){
                        $bol=false;
                        echo "<script>localStorage.setItem('PANIER',null);</script>";
                    }
                }              
                ?>
                <?php if($bol){ ?>
                <section class="panier-section" id="cmnd-sec"> 
            <h1>Confirmation :</h1>
           <form method="POST">
           <p>le paiment est seulement a la livraison</p><br>
           <div class="cart-content-conf">
                <p class="total-cost">Le total de votre commande est <?php echo $cost; ?>TND</p>
                <input type="submit" value="Confirmer" name="confirm" />
            </div>
           </form>
        </section>
        <?php }
        else{ ?>
            <section class="panier-section-validated" id="cmnd-sec"> 
                <i class="fas fa-check-circle"></i>
                <h2>Commande Confirmé Avec Succés</h2>
                <a href="/route/commande.php">Voir Commande</a>
        </section>
        <?php } ?>
            </div>
        </main>
    <footer>
        <?php require_once("./footer.php"); ?>
    </footer>
    <script src="./scripts/commander.js"></script>
</body>
</html>