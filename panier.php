<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/index.css">
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
        <section class="panier-section"> 
            <h1>Votre Panier :</h1>
            <div class="cart-content">
                
            </div>
        </section>
    </main>
    <footer>
        <?php require_once("./footer.php"); ?>
    </footer>
    <script src="./scripts/panier.js"></script>
</body>
</html>