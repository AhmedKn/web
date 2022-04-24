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
                $prod='[{"id":2,"lib":"Pc sur Mesure ALPHA-OSCAR I","prix":2300,"prixpromo":2999,"img":"https://www.scoopgaming.com.tn/15113-thickbox_default/pc-sur-mesure-alpha-oscar-i-i3-10eme-8go-gtx-1050-ti.jpg","quantite":1},{"id":3,"lib":"Ecran Gamer MSI Optix","prix":800,"prixpromo":699,"img":"https://www.scoopgaming.com.tn/12133-thickbox_default/ecran-gamer-msi-optix-g24c4-24-fhd-1ms-144hz.jpg","quantite":1}]';
                $obj = json_decode($prod);
                foreach($obj as $item) {
                    echo $item->id;
                    echo $item->lib;
                }
                require_once("./connect.php");
                $user_id=$_GET["id"];
                $req="select * from client where id_client='$user_id';";
                $res=mysqli_query($con,$req) or die(mysqli_error($con));
                $t=mysqli_fetch_array($res);
                if(isset($_POST["confirm"])){
                    $query="INSERT INTO commande (id_client,montant,date_enregistrement,etat) VALUES ('$user_id', '$cost',  '2022-04-01','livré');";
                    $rest = mysqli_query($con, $query) or die(mysqli_error($con));

                    if($rest){
                        $bol=false;
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