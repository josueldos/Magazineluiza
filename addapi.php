<?php
include('../conexao.php');
$api = $_POST['api'];
$query = "INSERT INTO `apimp` (`id`, `api`) VALUES (NULL, '{$api}');";
if(mysqli_query($conexao,$query)){
    header ("Location: adicionarapi.php?adicionado=ok");

} else {
    echo "Falha Ao Adicionar X9";
    echo mysqli_error($conexao);
};
