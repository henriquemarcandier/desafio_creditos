<?php
$url = $_SERVER['REQUEST_URI'];
$vet = explode("/", $url);
array_shift($vet);
array_shift($vet);
if ($_SERVER['HTTP_HOST'] == 'localhost'){
    array_shift($vet);
    $link = "https://localhost/desafio_creditos/public/";
}
else{
    $link = "https://desafiocredito.bhcommerce.com.br/";
}
if($vet[0]){
$link .= $vet[0]."/";
}
if ($vet[1]){
$link .= $vet[1]."/";
}
if ($vet[2]){
$link .= $vet[2]."/";
}
header('location: '.$link);
?>
