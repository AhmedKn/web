<?php
 require_once("./connect.php");
 $id=$_GET['id'];
 $re="SELECT * FROM products where id_produit=$id";
 $r=mysqli_query($con,$re) or die(mysqli_error($con));

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
    <link rel="stylesheet" href="./styles/product.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
      <?php 
            while($t=mysqli_fetch_array($r)){
      ?>
      <div class="image-cont">
          <img src="<?php echo $t['photo']; ?>" />
      </div>
      <div class="cont">
          <h2><?php echo $t['lib']; ?></h2>
          <img class="logo" src="./assets/logo.png"/>
          <?php if($t['promoprix']<$t['prix']){
              ?>
              <div class="price"><p class="des">Prix: </p><p><?php echo $t['promoprix']; ?> <small>TND</small></p><p><?php echo $t['prix']; ?><small>TND</small></p></div>
          <?php }else{ ?>
            <div class="pricet"><p class="norm"><span>Prix:</span><?php echo $t['prix']; ?> <small>TND</small></p></div>
            <?php }?>
            <div class="descr"><p><span>Description:</span><?php echo $t['description']; ?></p></div>
            <?php if($t['stock']>0){
              ?>
                <p class="stock"><span>Stock:</span><i class="fas fa-check"></i> EN STOCK</p>
              <?php } else{ ?>
                    <p class="stock"><span>Stock:</span><i class="fas fa-times-circle"></i> RUPTURE DE STOCK</p>
                <?php } ?>
                <p class="ret">Retrait en magasin ou livraison gratuite</p>
                <button onclick="disp({id:<?php echo$t['id_produit']; ?>,lib:'<?php echo$t['lib']; ?>',prix:<?php echo$t['prix']; ?>,prixpromo:<?php echo$t['promoprix']; ?>,img:'<?php echo$t['photo']; ?>',quantite:1})"  class="read-more">Ajouter</button>
                <table>
                    <caption>
                        Nos Magasins
                    </caption>
                    <tr>
                        <td>Magasin Ariana</td>
                        <td class="green">Disponible</td>
                    </tr>
                    <tr>
                        <td>Magasin Charguia</td>
                        <td class="green">Disponible</td>
                    </tr>
                    <tr>
                        <td>Magasin Urbain Nord</td>
                        <td class="green">Disponible</td>
                    </tr>
                    <tr>
                        <td>Magasin Centre ville</td>
                        <td class="red">Non Disponible</td>
                    </tr>
                </table>

                <table class="fac">
                    <caption>
                        Facilité de paiement
                    </caption>
                    <tr>
                        <th>4 mois</th>
                        <th>6 mois</th>
                        <th>12 mois</th>
                    </tr>
                    <tr>
                        <td>30%</td>
                        <td>20%</td>
                        <td>14%</td>
                    </tr>
                </table>
            </div>
      <?php }?>
    </main>
        <footer>
            <?php require_once("./footer.php"); ?>
        </footer>
        <script src="./scripts/panier.js"></script>
</body>
</html>