<?php
include("cabecalho.php");
include("../conexao.php");
include("admin.php");
$query = "SELECT * FROM `boletos`";
$resultado = mysqli_query($conexao, $query);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">Boletos</div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="35%">Produto</th>
                        <th width="40%">Numero Boleto</th>
                        <th width="15%">Preço</th>
                        <th width="10%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                          <?php
                          while($exibe = mysqli_fetch_assoc($resultado)){
                              $queryproduto = "select * from produtos where id = {$exibe['idproduto']}";
                              $resultadoproduto = mysqli_query($conexao,$queryproduto);
                              while($exibeproduto=mysqli_fetch_assoc($resultadoproduto)){
                                  $nomeproduto=$exibeproduto['nome'];
                                  $precoproduto=$exibeproduto['preco'];
                              };
                              echo '<tr>';
                              echo '<td>'.substr($nomeproduto, 0, 33).'</td>';
                              echo '<td>'.$exibe['numero'].'</td>';
                              echo '<td>R$'.$precoproduto.'</td>';
                              echo '<td><button class="btn btn-rounded btn-danger"><ion-icon name="trash"></ion-icon></td>';
                              echo '</tr>';
                          };
                          ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php
include("rodape.php");
?>