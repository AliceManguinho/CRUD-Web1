<?php
require 'auth.php';

$fp = fopen('livraria.csv', 'r');
$id = uniqid();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <h1>Lista de livros</h1>




    <br>
    <div>
        <table>
            <tr>
                <th>Nome </th>
                <th>Endereço</th>
                <th>Número de livros</th>
            </tr>

            <?php while (($rom = fgetcsv($fp)) !== false) : ?>
                <tr>
                    <td> <?= $rom[1] ?></td>
                    <td> <?= $rom[2] ?></td>
                    <td> <?= $rom[3] ?></td>
                    <td> <?= $rom[4] ?></td>
                    <td>
                        <form action="delete.php">
                            <input type="hidden" name="id" value="<?= $rom[0] ?>">
                            <button>Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="edit.php">
                            <input type="hidden" name="id" value="<?= $rom[0] ?>">
                            <button>Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile ?>
        </table>

        <form action="create.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="endereco" placeholder="Endereço" required>
            <label for="genero">Gênero:</label>
            <select required name="genero">
                <option value="ficcao">Ficção</option>
                <option value="nao_ficcao">Não ficção</option>
                <option value="infantil">Infantil</option>
            </select>
            <input type="number" name="numero_livros" min="1" max="5" placeholder="Quantidade" required>
            <button>Adicionar</button>
        </form>

        <a href="index.php">Inicio</a>
    </div>
</body>

</html>