<?php
    require_once("../connect.php");
    $id=$_GET['id'];
    $id_client=$_COOKIE['user'];
    $reqe="SELECT * FROM commande c,details_commande d,products p WHERE c.id_commande=$id and c.id_commande=d.id_commande and d.id_produit=p.id_produit";
    $rese=mysqli_query($con,$reqe) or die(mysqli_error($con));
    $reqes="SELECT * FROM commande c,details_commande d,products p WHERE c.id_commande=$id and c.id_commande=d.id_commande and d.id_produit=p.id_produit";
    $reses=mysqli_query($con,$reqe) or die(mysqli_error($con));
    $cmnd=mysqli_fetch_array($reses);
    $reqest="SELECT * from client where id_client=$id_client";
    $reset=mysqli_query($con,$reqest) or die(mysqli_error($con));
    $client=mysqli_fetch_array($reset);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/detail.css">
</head>
<body>
    <header>
        <a class="arrow-prec" href="/route/admin/commandes.php"><img src="../assets/arrow.png" /></a>
    </header>
            <main>
                <section id="product-detail">
                <h1>Commande N°<?php echo $_GET['id']; ?></h1>
                    <div id="details">
                <h1>Mes Informations:</h1>
                <p><span>Nom:</span> <?php echo $client['nom']; ?></p>
                <p><span>Prénom:</span> <?php echo $client['prenom']; ?></p>
                <p><span>Téléphone:</span> <?php echo $client['telephone']; ?></p>
                <p><span>Email:</span> <?php echo $client['email']; ?></p>
                <p><span>Adresse:</span> <?php echo $client['adresse']; ?>, <?php echo $client['code_postal']; ?>, <?php echo $client['ville']; ?></p>
                <p><span>Etat commande:</span> <?php echo $cmnd['etat']; ?></p>
                <div>
                    <p><span>Montant TTC:</span></p>
                    <p><?php echo $cmnd['montant']; ?>TND</p>
                </div>
                    </div>
                    <div class="prod-cont">
                        <?php 
                            while($s=mysqli_fetch_array($rese)){
                        ?>
                            <div class="prod">
                                <img src="<?php echo $s['photo']; ?>" />
                                <p><?php echo $s['lib'] ?></p>
                                <p><span>Montant unit:</span> <?php echo $s['prix_unitaire']; ?></p>
                                <p><span>Montant total:</span> <?php echo $s['prix_tot']; ?></p>
                                <p><span>Qunatite:</span> <?php echo $s['quantite']; ?></p>
                            </div>
                        <?php
                            }
                        ?> 
                    </div>
                </section>
            </main>
</body>
</html>