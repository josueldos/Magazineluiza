<?php
include('../conexao.php');
require_once '../vendor/autoload.php';
use Bitly\BitlyClient;
require '../dist/PHPMailer/src/Exception.php';
require '../dist/PHPMailer/src/PHPMailer.php';
require '../dist/PHPMailer/src/SMTP.php';
$token = $_POST['token'];
$numero = $_POST['numero'];
$bitly = $_POST['bitly'];
$random = rand(5, 15);
$bitlyClient = new BitlyClient($bitly);

$querycobranca = "SELECT * FROM `cobrancawpp` WHERE `enviado`= 0";
$resultadocobranca = mysqli_query($conexao, $querycobranca);

while($exibe = mysqli_fetch_assoc($resultadocobranca)){
    $options = [
        'longUrl' => $exibe['link'],
        'format' => 'json' // pass json, xml or txt
    ];

    $response = $bitlyClient->shorten($options);
    $linkcurto = $response->data->url;
    $content = http_build_query (array (
        'token' => $token,
        'uid' => $numero,
        'to' => $exibe['numero'],
        'custom_uid ' => 'msg-88'.$random.'51',
        'text' => 'Olá *'.$exibe['nome'].'*, estamos muito feliz por te-lo conosco! Seja bem vindo a *MagazineLuiza*,  seu pedido foi realizado com sucesso!
Pedido Numero: *98752325563*
Produto Comprado: *'.$exibe['produto'].'*
Valor da Compra: R$ *'.$exibe['preco'].'*
Forma de Pagamento: *Boleto Bancario*
Numero do Boleto: *'.$exibe['numeroleto'].'*
Acesse: '.$linkcurto.' e saiba mais!
'
    ));

    $context = stream_context_create (array (
        'http' => array (
            'method' => 'POST',
            'content' => $content,
        )
    ));

    $result = file_get_contents('https://www.waboxapp.com/api/send/chat', null, $context);
    //Atualiza o status da cobrança
    $querymudar = "UPDATE `cobrancawpp` SET `enviado` = '1' WHERE `cobrancawpp`.`id` = {$exibe['id']};";
    mysqli_query($conexao, $querymudar);
    mysqli_close($conexao);
};
header('Location: cobrarwpp.php?sucesso=1');