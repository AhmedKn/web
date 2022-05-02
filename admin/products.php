<?php 
    require_once("../connect.php");
    $req="SELECT * FROM products;";
    $res=mysqli_query($con,$req) or die(mysqli_error($con));

    if(isset($_POST['idd'])){
        $idd=$_POST['idd'];
        $rep="DELETE FROM products where id_produit=$idd";
        $reg=mysqli_query($con,$rep) or die(mysqli_error($con));
        if($reg==1){
            header("Refresh:0");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="./styles/prod.css">
    <title>Document</title>
</head>
<body>
<header>
        <a class="arrow-prec" href="/route/admin/home.php"><img src="../assets/arrow.png" /></a>
        <a class="ajouter" href="/route/admin/ajouter.php">ajouter</a>
    </header>
    <main>
    <?php
        if(mysqli_num_rows($res)==0){
    ?>
        <h1>Pas de produits !</h1>
    <?php
        }else{
    ?>
        <h1>Mes Produits !</h1>
        <table>
        <thead>
        <tr>
            <th>Num Produit</th>
            <th>Prix</th>
            <th>Prix promo</th>
            <th>Libelle</th>
            <th>Stock</th>
            <th>consulter</th>
            <th>Supprimer</th>
        </tr>
        <?php 
            while($t=mysqli_fetch_array($res)){
        ?>
        <tr>
            <td><?php echo $t['id_produit']; ?></td>
            <td><?php echo $t['prix']; ?><small> TND</small></td>
            <td><?php echo $t['promoprix']; ?><small>TND</small></td>
            <td><?php echo $t['lib']; ?></td>
            <td><?php echo $t['stock']; ?></td>
            <td><a class="referrer" href="/route/admin/detailprod.php?id=<?php echo $t['id_produit']; ?>">Modifier</a></td>
            <td>
                <form method="post">
                    <input type="hidden" name="idd" value="<?php echo $t['id_produit']; ?>" />
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php }?>
    </thead>
        </table>
    <?php 
        }
    ?>
    </main>
</body>
</html>