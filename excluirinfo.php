<?php
include('../conexao.php');
$id = $_GET['id'];
$query = "DELETE FROM `informacoes` WHERE `informacoes`.`id` = {$id}";
if(mysqli_query($conexao, $query)){
    echo '<script type="text/javascript">alert("Excluido Com Sucesso");</script>';
    header ("Location: informacoes.php?excluido=ok");
}else{
    echo "Falha Ao Excluir Informacoes<br>";
    echo mysqli_error($conexao);
};