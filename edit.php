<?php

require 'auth.php';

if (!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$id = $_GET['id'];

$fp = fopen('livraria.csv', 'r');
$data = [];

while (($rom = fgetcsv($fp)) !== false) {
    if ($rom[0] == $id) {
        $data = $rom;
        break;
    }
}

if (sizeof($data) == 0) {
    header('location: home.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar opções</title>
</head>

<body>

    <h1>Editar : <?= $data[1] ?></h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data[0] ?>">
        <input type="text" name= "nome"  value="<?= $data[1] ?>"required>
        <input type="text" name="endereco" value="<?= $data[2] ?>" required>
        <label for="genero">Gênero:</label>
        <select required value="<?= $data[3] ?>" name="genero">
            <option value="ficcao">Ficção</option>
            <option value="nao_ficcao">Não ficção</option>
            <option value="infantil">Infantil</option>
        </select>
        <input type="number" name = "numero_livros" min="1" max="5"  value="<?= $data[4] ?>"  required>
        <button>Editar</button>
    </form>

</body>

</html>
