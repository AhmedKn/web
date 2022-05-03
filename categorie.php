<?php 
 require_once("./connect.php");
 $id=$_GET['id'];
 $re="SELECT * FROM products where id_categorie=$id";
 $r=mysqli_query($con,$re) or die(mysqli_error($con));
    $gg="SELECT * FROM categorie WHERE id_categorie=$id";
    $kk=mysqli_query($con,$gg);
    $y=mysqli_fetch_row($kk)

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/promotion.css">
    <link rel="stylesheet" href="./styles/footer.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./styles/categorie.css">
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
        <h1><?php echo $y[1]; ?></h1>
            <section>
                <?php 
                    if(mysqli_num_rows($r)==0){
                        echo "<h2>Pas de Produits ! </h2>";
                    }
                    else{
                ?>
                <?php while($t=mysqli_fetch_array($r)){ ?>
                    <div class="prod">
                    <div class="img">
                        <img src="<?php echo $t['photo']; ?>" />
                    </div>
                    <a href="/route/product.php?id=<?php echo $t['id_produit']; ?>" class="tit"><?php echo $t['lib']; ?></a>
                    <div class="desc">
                        <p><?php echo $t['description']; ?></p>
                    </div>
                    <?php if($t['prix']>$t['promoprix']){ ?>
                        <p class="price"><?php echo $t['promoprix'] ?><small>TND</small></p>
                        <?php }else{ ?>
                            <p class="price"><?php echo $t['prix'] ?><small>TND</small></p>
                            <?php } ?>
                            <button onclick="disp({id:<?php echo$t['id_produit']; ?>,lib:'<?php echo$t['lib']; ?>',prix:<?php echo$t['prix']; ?>,prixpromo:<?php echo$t['promoprix']; ?>,img:'<?php echo$t['photo']; ?>',quantite:1})" class="ajouter">Ajouter</button>
                </div>
                <?php }} ?>
            </section>
    </main>
        <footer>
            <?php require_once("./footer.php"); ?>
        </footer>
        <script src="./scripts/panier.js"></script>
</body>
</html>