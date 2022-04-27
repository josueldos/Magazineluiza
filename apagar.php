<?php
include("../conexao.php");
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
};
$query = "SELECT * FROM `antiphishing`";
$resultado = mysqli_query($conexao,$query);
while($pasta = mysqli_fetch_assoc($resultado)){
    $nome = str_replace('/','',$pasta['pasta']);
    $apagar = $nome;
    delTree($apagar);
    echo $apagar.' Deletada com sucesso! <br>';
    $querysql = "DELETE FROM `antiphishing` WHERE `antiphishing`.`id` = '{$pasta['id']}'";
    mysqli_query($conexao,$querysql);
};
 header ("Location: home.php?excluido=ok");