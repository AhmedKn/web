<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php require_once("./navbar.php"); ?>
    </header>
    <main>
        <section id="client_dash">
            <div class="rgb-border">
            <a href="./route/profile"><i class="fas fa-user-circle"></i> Mes Informations</a>
            </div>
            <div class="rgb-border">
            <a href="/route/commande.php"><i class="fas fa-truck"></i> Mes Commandes</a>
            </div>
            <div class="rgb-border">
            <a href="/route/disconnect.php"><i class="fas fa-sign-out-alt"></i> Deconnexion</a>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once("./footer.php"); ?>
    </footer>
</body>
</html>