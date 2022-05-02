<?php
require_once('../connect.php');
$req="SELECT * FROM categorie;";
$res=mysqli_query($con,$req) or die(mysqli_error($con));
if(isset($_POST['reference']) && isset($_POST['lib']) && isset($_POST['description']) && isset($_POST['photo']) && isset($_POST['prix']) && isset($_POST['promoprix']) && isset($_POST['stock']) && isset($_POST['home']) && isset($_POST['id_categorie'])){
    $ref=$_POST['reference']; 
    $lib=$_POST['lib']; 
    $des=$_POST['description']; 
    $p=$_POST['photo']; 
    $prix=$_POST['prix']; 
    $promo=$_POST['promoprix']; 
    $s=$_POST['stock']; 
    $h=$_POST['home']; 
    $iddd=$_POST['id_categorie'];
    $reo="INSERT INTO products (reference,lib,description,photo,prix,promoprix,stock,home,id_categorie,id_marque) VALUES($ref,'$lib','$des','$p',$prix,$promo,$s,$h,$iddd,1);";
    $ree=mysqli_query($con,$reo) or die(mysqli_error($con));
    if($ree==1){
        header("Location: home.php");
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
        <a class="arrow-prec" href="/route/admin/home.php"><img src="../assets/arrow.png" /></a>
    </header>
    <main>
    <h1>Ajouter Produit</h1>
    <form method="post">  
        <input placeholder="Reference" name="reference" value="" />
        <input placeholder="Name" name="lib" value="" />
        <input placeholder="Description" name="description" value="" />
        <input placeholder="Photo URL" name="photo" value="" />
        <input placeholder="Prix" name="prix" value="" />
        <input placeholder="Prix Promotion" name="promoprix" value="" />
        <input placeholder="Stock" name="stock" value="" />
        <div>
        <input onclick="check()" type="checkbox" id="home" name="home" value="0"><p>Bestseller</p>
        </div>
        <select name="id_categorie" id="monselect">
            <option>--Choisir catégorie--</option>
            <?php 
                while($t=mysqli_fetch_array($res)){
            ?>
            <option value="<?php echo $t['id_categorie']; ?>"><?php echo $t['libelle']; ?></option>
        
        <?php }?>
    </select>
    <button type="submit">Ajouter</button>
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