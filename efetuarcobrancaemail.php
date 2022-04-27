<?php
//Bibliotecas De EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../dist/PHPMailer/src/Exception.php';
require '../dist/PHPMailer/src/PHPMailer.php';
require '../dist/PHPMailer/src/SMTP.php';

include('../conexao.php');
$loginsmtp = $_POST['email'];
$senhasmtp = $_POST['senha'];
$querycobranca = "SELECT * FROM `cobrancaemail` WHERE `enviado`= 0";
$resultadocobranca = mysqli_query($conexao, $querycobranca);
while($exibe=mysqli_fetch_assoc($resultadocobranca)){
    //SMTP
    $Mailer = new PHPMailer();
    //Define que será usado SMTP
    $Mailer->IsSMTP();
    //Enviar e-mail em HTML
    $Mailer->isHTML(true);
    //Aceitar carasteres especiais
    $Mailer->Charset = 'UTF-8';
    //Configurações
    $Mailer->SMTPAuth = true;
    $Mailer->SMTPSecure = 'ssl';
    //nome do servidor
    $Mailer->Host = 'smtp.gmail.com';
    //Porta de saida de e-mail
    $Mailer->Port = 465;
    //Dados do e-mail de saida - autenticação
    $Mailer->Username = $loginsmtp;
    $Mailer->Password = $senhasmtp;
    //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
    $Mailer->From = $loginsmtp;
    //Nome do Remetente
    $Mailer->FromName = 'Magazineluiza';
    //Assunto da mensagem
    $Mailer->Subject = 'Ola '.$exibe['primeironome'].' Estamos aguardando o pagamento do seu boleto!';
    //Corpo da Mensagem
    $Mailer->Body = $exibe['corpo'];
    //Corpo da mensagem em texto
    $Mailer->AltBody = 'conteudo do E-mail em texto';
    //Destinatario
    $Mailer->AddAddress($exibe['email']);
    $Mailer->Send();

    //Atualiza o status da cobrança
    $querymudar = "UPDATE `cobrancaemail` SET `enviado` = '1' WHERE `cobrancaemail`.`id` = {$exibe['id']};";
    mysqli_query($conexao, $querymudar);
};
header('Location: cobraremail.php?sucesso=1');