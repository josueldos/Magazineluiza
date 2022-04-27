<?php
// Dependencias
use Gufy\PdfToHtml\Config;
include('vendor/autoload.php');
function wget($address,$filename){file_put_contents($filename,file_get_contents($address));}

//Função Selecionar API
function apiselecionada($conexao){
    $query = "SELECT * FROM `configuracoes` where id = 1";
    $resultado = mysqli_query($conexao,$query);
    $querymaxapi = "SELECT * FROM `apimp`";
    $resultadomaxapi = mysqli_query($conexao, $querymaxapi);
    $maxapi = mysqli_num_rows($resultadomaxapi);

    while($exibe = mysqli_fetch_assoc($resultado)){
        $initialapi = $exibe['initialapi'];     
    };
    if($initialapi < $maxapi){
        $novoinitial = $initialapi + 1;
        $querynovo = "UPDATE `configuracoes` SET `initialapi` = '{$novoinitial}' WHERE `configuracoes`.`id` = 1;";
        mysqli_query($conexao, $querynovo);
    }else if($initialapi == $maxapi){
        $queryzerar = "UPDATE `configuracoes` SET `initialapi` = '1' WHERE `configuracoes`.`id` = 1;";
        mysqli_query($conexao, $queryzerar);
    };
    //Pegando Proxima API
    $selecionarapi = "SELECT * FROM `apimp` where id = '{$initialapi}'";
    $resultadoapiselecionada = mysqli_query($conexao, $selecionarapi);
    while($exibe = mysqli_fetch_assoc($resultadoapiselecionada)){
        $apiselecionada = $exibe['api'];
        return $apiselecionada;
    };
};

function laranjaselecionada($conexao){
    $query = "SELECT * FROM `configuracoes` where id = 1";
    $resultado = mysqli_query($conexao,$query);
    $querymaxlara = "SELECT * FROM `laramp`";
    $resultadomaxlara = mysqli_query($conexao, $querymaxlara);
    $maxalara = mysqli_num_rows($resultadomaxlara);

    while($exibe = mysqli_fetch_assoc($resultado)){
        $initiallara = $exibe['initiallara'];       
    };
    if($initiallara < $maxalara){
        //echo $initiallara;
        $novoinitial = $initiallara + 1;
        $querynovo = "UPDATE `configuracoes` SET `initiallara` = '{$novoinitial}' WHERE `configuracoes`.`id` = 1;";
        mysqli_query($conexao, $querynovo);
    }else if($initiallara == $maxalara){
        $queryzerar = "UPDATE `configuracoes` SET `initiallara` = '1' WHERE `configuracoes`.`id` = 1;";
        mysqli_query($conexao, $queryzerar);
        //echo $initiallara;
    };
    $selecionarlara = "SELECT * FROM `laramp` where id = '{$initiallara}'";
    $resultadolaraselecionada = mysqli_query($conexao, $selecionarlara);
    while($exibe = mysqli_fetch_assoc($resultadolaraselecionada)){
        $laraselecionada = $exibe['email'];
        return $laraselecionada;
    };
}
//Função De Vencimento Do Boleto

//Gerar Boleto
function gerarboletoapi($api,$lara,$vencimento,$preco,$nomeproduto,$primeironome,$segundonome,$cpf,$cep,$rua,$numero,$bairro,$cidade,$estado){

    $unique = md5(time());
    // Requisição Do Boleto
    $mp = new MP ("$api");
    $dadospagamento = array(
        "date_of_expiration"=> $vencimento."T21:52:49.000-04:00",
        "transaction_amount"=> $preco,
        "description"=> "$nomeproduto",
        "payment_method_id"=> "bolbradesco",
        "payer"=> array(
            "email"=> "$lara",
            "first_name"=> "$primeironome",
            "last_name"=> "$segundonome",
            "identification"=> array(
                "type"=> "CPF",
                "number"=> "$cpf",
            ),
            "address"=> array(
                "zip_code"=> "$cep",
                "street_name"=> "$rua",
                "street_number"=> "$numero",
                "neighborhood"=> "$bairro",
                "city"=> "$cidade",
                "federal_unit"=> "$estado"

            ),
        ),
);
// Download Do Boleto
    $pagamento = $mp->post("/v1/payments", $dadospagamento); // ARRAY Resultado Pagamento
   $UrlBoleto = $pagamento['response']['transaction_details']['external_resource_url']; // URL Do Boleto
  // $UrlBoleto = ;
 wget($UrlBoleto,'Boleto_'.$unique.'.pdf'); // Download Do PDF
//Transformando Boleto Em HTML

    $pdf = new Gufy\PdfToHtml\Pdf('Boleto_'.$unique.'.pdf');
    $html = $pdf->html();
    \Gufy\PdfToHtml\Config::set('pdftohtml.bin', '/usr/bin/pdftohtml');
    \Gufy\PdfToHtml\Config::set('pdfinfo.bin', '/usr/bin/pdfinfo');

    //Config::set('pdftohtml.bin', '/usr/bin/pdftohtml');
    //Config::set('pdfinfo.bin', '/usr/bin/pdfinfo');
    //$pdf = new Gufy\PdfToHtml\Pdf('Boleto_'.$unique.'.pdf');
    //$html = $pdf->html();

//Selecionando Linha Digitavel
    $pesquisa = "/<p style=\"position:absolute;top:87px;left:56px;white-space:nowrap\" class=\"ft00\">Linha Digitável:(.*?)<\/p>/";
    $matches = array();
    $resultado = preg_match_all($pesquisa, $html, $matches);
    $linhacrua = implode(",", $matches[1]);
    $s1 = str_replace('.', '', $linhacrua);
    $linhadigitavel = str_replace(' ', '', $s1);

    return substr($linhadigitavel, 2);
};

