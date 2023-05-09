<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Sistema literário</h1>

    <?php if (!isset($_SESSION['auth']) ||  $_SESSION['auth'] !== true) : ?>
        <h2>Autentique-se</h2>
        <form action="autenticar.php" method="POST">
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="senha" required>
            <button>Autenticar</button>
        </form>
    <?php else : ?>
        <h2>Você está logado</h2>
        <a href="home.php"><button>Ver CRUD</button></a>
        <br><br>
        <a href="logout.php"> <button>Sair</button></a>
    <?php endif ?>

</body>

</html>