<?php
include("cabecalho.php");
include("../conexao.php");
include("admin.php");
$query = "select * from produtos";
$resultado = mysqli_query($conexao, $query);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">Produtos</div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="10%"></th>
                        <th width="61%">Nome Do Produto</th>
                        <th width="10%">Preço</th>
                        <th width="19%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($exibe = mysqli_fetch_assoc($resultado)){ ?>
                        <tr>
                        <td><img width="61px" height="46px" src="<?=$exibe['imgsource'];?>"></td>
                        <td><?=wordwrap($exibe['nome'], 15);?></td>
                        <td>R$ <?=$exibe['preco'];?></td>
                        <td> <button class="btn btn-rounded btn-danger"><ion-icon name="trash"></ion-icon></button>
                            <button class="btn btn-rounded btn-info"><ion-icon name="hammer"></ion-icon></button>
                            <a href="../produto.php?id=<?=$exibe['id']?>&titulo=<?=str_replace(' ','-',$exibe['nome']) ?>" class="btn btn-rounded btn-success"><ion-icon name="eye"></a></a></td>
                    </tr>
                  <?php  }; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php
include("rodape.php");
?>