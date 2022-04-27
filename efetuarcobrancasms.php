<?php
include('../conexao.php');
require_once '../vendor/autoload.php';
//Bibliotecas De EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Bitly\BitlyClient;
require '../dist/PHPMailer/src/Exception.php';
require '../dist/PHPMailer/src/PHPMailer.php';
require '../dist/PHPMailer/src/SMTP.php';

$key = $_POST['key'];
$secret = $_POST['secret'];
$bitly = $_POST['bitly'];

$querycobranca = "SELECT * FROM `cobrancasms` WHERE `enviado`= 0";
$resultadocobranca = mysqli_query($conexao, $querycobranca);
while($exibe=mysqli_fetch_assoc($resultadocobranca)){
    //encurta o link
    $bitlyClient = new BitlyClient($bitly);
    $options = [
        'longUrl' => $exibe['link'],
        'format' => 'json' // pass json, xml or txt
    ];

    $response = $bitlyClient->shorten($options);
    $linkcurto = $response->data->url;
    //envia a mensagem
    $basic  = new \Nexmo\Client\Credentials\Basic($key, $secret);
    $client = new \Nexmo\Client($basic);
    $message = $client->message()->send([
        'to' => $exibe['numero'],
        'from' => 'Magazineluiza',
        'text' => 'Ola '.$exibe['nome'].', voce comprou um '.$exibe['nomeproduto'].', Valor de R$ '.$exibe['preco'].', aguardando pagamento do boleto bancario: '.$linkcurto
    ]);
    //Atualiza o status da cobrança
    $querymudar = "UPDATE `cobrancasms` SET `enviado` = '1' WHERE `cobrancasms`.`id` = {$exibe['id']};";
    mysqli_query($conexao, $querymudar);
};
header('Location: cobrarsms.php?sucesso=1');