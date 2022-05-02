<?php
setcookie("admin", "null", time() - 3600);
header("Location: login.php");
?>