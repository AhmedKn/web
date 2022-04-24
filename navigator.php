<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/navigator.css">
</head>
<body>
    <?php
        require_once("./connect.php");
        $req="select * from categorie where home=1;";
        $res=mysqli_query($con,$req) or die("request is not working;");
        $req2="select * from marque";
        $res2=mysqli_query($con,$req2) or die(mysqli_error($con));

        if(mysqli_num_rows($res)!=0){
            
    ?>
    <ul class="navigator">
        <li><a href="/route"><i class="fas fa-home"></i></a></li>
        <?php while($t=mysqli_fetch_array($res)){  ?>
            <li class="cat"><a  href="/route/categorie.php?id=<?php echo $t['id_categorie'] ?>"><?php echo $t['libelle'] ?></a></li>
        <?php }} ?>
        <!-- <?php 
            if(mysqli_num_rows($res2)!=0){            
        ?>
        <li class='marque'><a href='/route'>Marque <i class='fas fa-angle-down'></i></a>
                <div> -->
                    <!-- <?php while($m=mysqli_fetch_array($res2)){  ?>
                        <a href="/route/marque.php?id=<?php echo$m['id_marque'] ?>"><?php echo $m['brand'] ?></a>
                    <?php } ?>
                </div>
        </li>
        <?php  } ?> -->

        <li><a href="/route/panier.php"><i class="fas fa-shopping-cart"></i></a></li>
            
    </ul>
</body>
</html>