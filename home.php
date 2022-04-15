<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gtek</title>
</head>
<body>
    <header>
        <?php
            if (isset($_COOKIE["user"]) && $_COOKIE["user"]=="true")
            {
                require_once("./navbar.php");
            }
            else
            {
                require_once("./navbarnot.php");
            }
        ?>
    </header>
</body>
</html>