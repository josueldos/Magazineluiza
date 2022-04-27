<?php
include("cabecalho.php");
include("../conexao.php");
include("admin.php");
if(isset($_GET['adicionado'])) {
    echo '<div class="alert alert-success">Adicionado Com Sucesso!</div>';
};
$query = "select * from produtos";
$resultado = mysqli_query($conexao, $query);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">Adiconar Produto</div>
            <div class="card-body">
                <div class="form-group">
                <form action="addproduto.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome" class="form-control-label">Nome Do Produto</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="preco" class="form-control-label">Preço</label>
                                <input type="text" class="form-control" id="preco" name="preco">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imagem" class="form-control-label">URL Da Imagem</label>
                                <input type="text" class="form-control" id="imagem" name="imagem">
                            </div>
                        </div>

                    </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desktop">Source Desktop</label>
                            <textarea id="desktop" class="form-control" rows="10" name="desktop"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Source Mobile</label>
                            <textarea id="mobile" class="form-control" rows="10" name="mobile"></textarea>
                        </div>
                    </div>

                </div>

                    <div class="row">
                        <button type="submit" class="btn btn-block btn-success">Adicionar</button>
                        <button type="reset" class="btn btn-block btn-danger">Limpar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
include("rodape.php");
?>