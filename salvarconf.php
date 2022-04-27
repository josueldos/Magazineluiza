<?php
include('../conexao.php');
$boleto = $_POST['funcaoboleto'];
$bloqueado = $_POST['bloquear'];
$diasboleto = $_POST['diasboleto'];
$url = $_POST['url'];
$smtp = $_POST['smtp'];
$loginsmtp = $_POST['loginsmtp'];
$senhasmtp = $_POST['senhasmtp'];
$senhacc = $_POST['senhacc'];
$apimp = $_POST['funcaoapi'];
$query = "UPDATE `configuracoes` SET `boleto` = '{$boleto}',`apimp` = '{$apimp}', `diasboleto` = '{$diasboleto}', `bloqueado` = '{$bloqueado}', `url` = '{$url}', `smtp` = '{$smtp}', `loginsmtp` = '{$loginsmtp}', `senhasmtp` = '{$senhasmtp}', `senha4` = '{$senhacc}' WHERE `configuracoes`.`id` = 1;";
if(mysqli_query($conexao,$query)){
    header ("Location: configuracoes.php?salvo=ok");

} else {
    echo "Falha Ao Adicionar Produto";
    echo mysqli_error($conexao);
};
