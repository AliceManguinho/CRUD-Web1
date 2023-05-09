<?php 

require 'auth.php';

if( !isset($_POST['id']) ||!isset($_POST['nome']) || !isset($_POST['endereco']) || !isset($_POST['genero']) || (!isset($_POST['numero_livros']))) {
    header('location: home.php'); 
    exit();
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$genero = $_POST['genero'];
$numero_livros = $_POST['numero_livros'];

$fp = fopen('livraria.csv', 'r');
while (($row =  fgetcsv($fp)) !== false) {
    if($row[1] == $nome) {
        header('location: home.php');
        exit();
    }
}

$fp = fopen('livraria.csv', 'a');
fputcsv($fp, [$id, $nome, $endereco, $genero, $numero_livros]);

header('location: home.php');