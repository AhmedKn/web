<?php
    require_once("../connect.php");
    $req="SELECT * from commande c,client l where c.id_client=l.id_client and etat!='livré'";
    $rek=mysqli_query($con,$req) or die(mysqli_error($con));
    if(isset($_POST['idd'])){
        $idd=$_POST['idd'];
        $reo="DELETE FROM details_commande where id_commande=$idd";
        $rei=mysqli_query($con,$reo) or die(mysqli_error($con));
        $rep="DELETE FROM commande where id_commande=$idd";
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
    <link rel="stylesheet" href="./styles/commandes.css">
    <title>Document</title>
</head>
<body>
    <header>
        <a class="arrow-prec" href="/route/admin/home.php"><img src="../assets/arrow.png" /></a>
    </header>
    <main>
        <div>
            <?php  if(mysqli_num_rows($rek)!=0){ ?>
            <h1>Mes Commandes</h1>
        <table>
        <thead>
        <tr>
            <th>Num commande</th>
            <th>Prix Tot</th>
            <th>Adresse</th>
            <th>Client</th>
            <th>Etat</th>
            <th>consulter</th>
            <th>Supprimer</th>
        </tr>
        <?php 
            while($t=mysqli_fetch_array($rek)){
        ?>
        <tr>
            <td><?php echo $t['id_commande']; ?></td>
            <td><?php echo $t['montant']; ?><small> TND</small></td>
            <td><?php echo $t['adresse']; ?></td>
            <td><?php echo $t['nom']; ?>.<?php echo $t['prenom']; ?></td>
            <td><?php echo $t['etat']; ?></td>
            <td><a class="referrer" href="/route/admin/detail.php?id=<?php echo $t['id_commande']; ?>">Consulter</a></td>
            <td>
                <form method="post">
                    <input type="hidden" name="idd" value="<?php echo $t['id_commande']; ?>" />
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php }?>
    </thead>
        </table>
        <?php }else{?>
            <h1>Pas de Commande !</h1>
        <?php }?>
        </div>
    </main>
</body>
</html>