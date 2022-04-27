<?php
include('../conexao.php');
$hoje = date("Y-m-d");
$queryconf = "select * from configuracoes";
$resultadoconf = mysqli_query($conexao,$queryconf);
while($exibe = mysqli_fetch_assoc($resultadoconf)){
    $diasboleto = $exibe['diasboleto'];
}
$vencimento = date('Y-m-d', strtotime($hoje. ' + '.$diasboleto.' days'));
$numeroboleto = $_POST['numeroboleto'];
$idprotudo = $_POST['idproduto'];

$query = "INSERT INTO `boletos` (`id`, `numero`, `vencimento`, `idproduto`, `usado`) VALUES (NULL, '{$numeroboleto}', '{$vencimento}', '{$idprotudo}', '0');";

if(mysqli_query($conexao,$query)){
    echo '<script type="text/javascript">alert("Adicionado Com Sucesso");</script>';
    header ("Location: adicionarboleto.php?adicionado=ok");

} else {
    echo "Falha Ao Adicionar Produto";
    echo mysqli_error($conexao);
};
