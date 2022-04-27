<?php
include("cabecalho.php");
include("admin.php");
//Query Para Visualizar Os Produtos
$query = 'select * from produtos';
$resultado = mysqli_query($conexao,$query);
if(isset($_GET['adicionado'])) {
    echo '<div class="alert alert-success">Adicionado Com Sucesso!</div>';
};
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Adiconar Produto</div>
        <div class="card-body">
            <div class="form-group">
                <form action="addboleto.php" method="post">

                    <div class="">
                    <label for="numeroboleto" class="form-control-label">Numero do Boleto <small>(Sem Pontos)</small>:</label>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" name="numeroboleto" id="numeroboleto" placeholder="00197200020003021223700634704381011131600001233">
                    </div>
                    </div>

                    <div class="">
                    <label for="single-select">Selecione o Produto:</label>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    <select id="idproduto" name="idproduto" class="form-control">
                        <?php
                        while($exibe = mysqli_fetch_assoc($resultado)){
                            echo '<option value="'.$exibe['id'].'">';
                            echo $exibe['nome'];
                            echo '</option>';
                        };

                        ?>
                    </select>
                    </div>


                            <button type="submit" class="btn btn-block btn-success">Adicionar</button>
                            <button type="reset" class="btn btn-block btn-danger">Limpar</button>

                    </div>

                </form></div>

        </div>
    </div>
</div>

<?php
include("rodape.php");
?>
