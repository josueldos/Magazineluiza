<?php
$id = $_GET['id'];
$dist = $_GET['dist'];
$querry = "select * from produtos where id= {$id}";
$resultado = mysqli_query($conexao, $querry);
$hoje = date('Y-m-d');
$hojeformatado = date('d/m/Y',strtotime($hoje));
#Variaveis Dos Produtos
while($exibe = mysqli_fetch_assoc($resultado)){
    $contentm = $exibe["sourcem"];
    $nome = $exibe["nome"];
    $preco = number_format($exibe["preco"], 2, ',', '.');
    $precoa = number_format($exibe["preco"], 2, '.', '.');
    $precoc = $exibe['preco'];
    $imagem = $exibe["imgsource"];
    $content = $exibe["source"];
    $nomelink = str_replace(' ','-',$nome);
    $precodeza = $preco / 10;
    $precodez = number_format($precodeza, 2, ',', '.');
    $precoantigoa = $preco * 1.71;
    $precoantigo = number_format($precoantigoa, 2, ',', '.');
    $nomea = Explode(" ",$nome);
    $nomecurto = $nomea[0].' '.$nomea[1].' '.$nomea[2].' '.$nomea[3];
};