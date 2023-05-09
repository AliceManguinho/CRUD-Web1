<?php


require 'auth.php';

//troque os atributos
if( !isset($_POST['id']) ||!isset($_POST['nome']) || !isset($_POST['endereco']) || !isset($_POST['genero']) || (!isset($_POST['numero_livros']))) {
    header('location: home.php'); 
    exit();
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$genero = $_POST['genero'];
$numero_livros = $_POST['numero_livros'];

$tempFile = tempnam(".", "");

$fpOriginal =  fopen("livraria.csv", "r");
$fpTemp = fopen($tempFile, 'w');

while (($row =  fgetcsv($fpOriginal)) !== false) {
    if ($row[0] != $id) {
        fputcsv($fpTemp, $row);
        continue;
    }
    fputcsv($fpTemp, [$id, $nome, $endereco, $genero, $numero_livros]);
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'livraria.csv');

header('location: home.php');