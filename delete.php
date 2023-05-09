<?php 

require 'auth.php';

if(!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$nome = $_GET['id'];

$tempFile = tempnam(".", "");

$fpOriginal =  fopen("livraria.csv", "r");
$fpTemp = fopen($tempFile, 'w');

while (($row =  fgetcsv($fpOriginal)) !== false) {
    if($row[0] !== $nome) {
        fputcsv($fpTemp, $row);
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'livraria.csv');

header('location: home.php');

?>