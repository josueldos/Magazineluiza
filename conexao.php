<?php
$host = 'localhost';
$usuario = 'root';
$senhadb = '';
$banco = 'magazine17';

$conexao = mysqli_connect($host,$usuario,$senhadb,$banco);
mysqli_set_charset($conexao,"utf8");
?>