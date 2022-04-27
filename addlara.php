<?php
include('../conexao.php');
$email = $_POST['email'];
$query = "INSERT INTO `laramp` (`id`, `email`) VALUES (NULL, '{$email}');";
if(mysqli_query($conexao,$query)){
    header ("Location: adicionarlara.php?adicionado=ok");

} else {
    echo "Falha Ao Adicionar X9";
    echo mysqli_error($conexao);
};
