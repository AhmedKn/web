<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gtek</title>
    <link rel="stylesheet" href="./styles/index.css">
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
        
            require_once("./carousel.php");

        ?>
    </main>
</body>
</html>