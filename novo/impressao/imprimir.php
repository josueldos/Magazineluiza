<?php
include('../../../conexao.php');
$id = $_GET['unique'];
$query = "SELECT * FROM `segundavia` WHERE id = '{$id}'";
$resultado = mysqli_query($conexao, $query);
while($exibe = mysqli_fetch_assoc($resultado)){
    $nomecliente = $exibe['nomecliente'];
    $cpf = $exibe['cpf'];
    $vencimento = $exibe['vencimento'];
    $hoje = $exibe['hoje'];
    $preco = $preco = number_format($exibe["preco"], 2, ',', '.');
    $numeroboleto = $exibe['numeroboleto'];
    $endereco = $exibe['endereco'];
    $numero = $exibe['numero'];
    $bairro = $exibe['bairro'];
    $cidade = $exibe['cidade'];
    $estado = $exibe['estado'];
    $cep = $exibe['cep'];
};

//Conteudo do boleto
$conteudo = file_get_contents('../../../dist/boleto.html');
//Substituições
$s1 = str_replace('{$VENCIMENTO}', $vencimento, $conteudo);
$s2 = str_replace('{$HOJE}', $hoje, $s1);
$s3 = str_replace('{$PRECO}', $preco, $s2);
$s4 = str_replace('{$NOMECLIENTE}', $nomecliente, $s3);
$s5 = str_replace('{$CPF}', $cpf, $s4);
$s6 = str_replace('{$NUMEROBOLETO}', $numeroboleto, $s5);
$s7 = str_replace('{$ENDERECO}', $endereco, $s6);
$s8 = str_replace('{$NUMERO}', $numero, $s7);
$s9 = str_replace('{$BAIRRO}', $bairro, $s8);
$s10 = str_replace('{$CIDADE}', $cidade, $s9);
$s11 = str_replace('{$ESTADO}', $estado, $s10);
$s12 = str_replace('{$CEP}', $cep, $s11);

echo $s12;
?>