<?php 
    require_once("./connect.php");
    $id=$_COOKIE['user'];
    $req="SELECT * from commande where id_client=$id";
    $rek=mysqli_query($con,$req) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/commande.css">
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
        <section id="commande-sec">
            <h1>Mes Commandes :</h1>
                <?php
                    if(mysqli_num_rows($rek)!=0){
                ?>
                    <div class="commande-container">
                        <?php
                            while($t=mysqli_fetch_array($rek)){  
                        ?>
                        <div class="cmnd">
                            <p>Commande N°<?php echo $t['id_commande']; ?></p>
                            <p>Montant: <?php echo $t['montant']; ?></p>
                            <p>status: <?php echo $t['etat']; ?></p>
                            <a href="/route/detail.php?id=<?php echo$t['id_commande']; ?>">Consulter</a>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                <?php
                    }
                    else{
                ?>
                    <div class="empty-commande-container">
                        <h2>Pas de Commande !</h2>
                    </div>
                <?php 
                    }
                ?>
            
        </section>
    </main>
    <footer>
        <?php require_once("./footer.php"); ?>
    </footer>
</body>
</html>