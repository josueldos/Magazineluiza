<?php
include('../conexao.php');
$ip = $_POST['ip'];
$query = "INSERT INTO `x9` (`id`, `ip`) VALUES (NULL, '{$ip}');";
if(mysqli_query($conexao,$query)){
    header ("Location: adicionarx9.php?adicionado=ok");

} else {
    echo "Falha Ao Adicionar X9";
    echo mysqli_error($conexao);
};
