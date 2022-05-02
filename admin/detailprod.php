<?php
require_once('../connect.php');
$id=$_GET['id'];
$req="SELECT * FROM categorie;";
$res=mysqli_query($con,$req) or die(mysqli_error($con));

$rek="SELECT * FROM products WHERE id_produit=$id;";
$result=mysqli_query($con,$rek) or die(mysqli_error($con));

if(isset($_POST['reference']) && isset($_POST['lib']) && isset($_POST['description']) && isset($_POST['photo']) && isset($_POST['prix']) && isset($_POST['promoprix']) && isset($_POST['stock'])){
    $ref=$_POST['reference']; 
    $lib=$_POST['lib']; 
    $des=$_POST['description']; 
    $p=$_POST['photo']; 
    $prix=$_POST['prix']; 
    $promo=$_POST['promoprix']; 
    $s=$_POST['stock'];  
    $reo="UPDATE products set reference=$ref,lib='$lib',description='$des',photo='$p',prix=$prix,promoprix=$promo,stock=$s where id_produit=$id;";
    $ree=mysqli_query($con,$reo) or die(mysqli_error($con));
    if($ree==1){
        header("Location: products.php");
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
    <link rel="stylesheet" href="./styles/products.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <header>
        <a class="arrow-prec" href="/route/admin/products.php"><img src="../assets/arrow.png" /></a>
    </header>
    <main>
    <h1>Modifier Produit</h1>
    <form method="post">  
        <?php while($o=mysqli_fetch_array($result)){ ?>
            <p>Reference:</p>
        <input placeholder="Reference" name="reference" value="<?php echo $o['reference']; ?>" />
        <p>Libelle</p>
        <input placeholder="Name" name="lib" value="<?php echo $o['lib']; ?>" />
        <p>Description:</p>
        <input placeholder="Description" name="description" value="<?php echo $o['description']; ?>" />
        <p>Photo:</p>
        <input placeholder="Photo URL" name="photo" value="<?php echo $o['photo']; ?>" />
        <p>Prix</p>
        <input placeholder="Prix" name="prix" value="<?php echo $o['prix']; ?>" />
        <p>Prix Pormotion</p>
        <input placeholder="Prix Promotion" name="promoprix" value="<?php echo $o['promoprix']; ?>" />
        <p>Stock</p>
        <input placeholder="Stock" name="stock" value="<?php echo $o['stock']; ?>" />
        <?php } ?>
    <button type="submit">Modifier</button>
    </form>
    </main>
    <script>
        function check(){
            let x=document.getElementById('home');
        if(x.checked){
            console.log(x.value);
            console.log("checked");
            x.value=1;
            console.log(x.value);
        }
        else{
            console.log(x.value);
            console.log("! checked");
            x.value=0;
            console.log(x.value);
        }
        }
    </script>
</body>
</html>