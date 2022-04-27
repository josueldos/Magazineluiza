<?php
include("../conexao.php");
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];
$sourcedesktop = $_POST['desktop'];
$sourcemobile = $_POST['mobile'];

$query = "INSERT INTO `produtos` (`id`, `nome`, `source`, `preco`, `imgsource`, `sourcem`) VALUES (NULL, '{$nome}', '{$sourcedesktop}', '{$preco}', '{$imagem}', '{$sourcemobile}');";
    if(mysqli_query($conexao,$query)){        
        header ("Location: adicionarproduto.php?adicionado=ok");

    } else {
        echo "Falha Ao Adicionar Produto";
        echo mysqli_error($conexao);
    };