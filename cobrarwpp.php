<?php
include('cabecalho.php');
include('../conexao.php');
$query = 'SELECT * FROM `cobrancawpp`WHERE enviado = 0';
$resultado = mysqli_query($conexao,$query);
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Cobrança Por Whatspp(Waboxapp)</div>
        <div class="card-body">
            <div class="form-group">
                <form action="efetuarcobrancawpp.php" method="post">

                    <div class="">
                        <label for="numeroboleto" class="form-control-label">API Token:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
                            </div>
                            <input type="text" class="form-control" name="token" id="token" placeholder="8d125b9021e57ff506cd6b14f7358f3a5b7ee2d7847e8" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Numero Do Whatsapp:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="556193985739" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Bitly Token:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-link"></i></span>
                            </div>
                            <input type="text" class="form-control" name="bitly" id="bitly" placeholder="2d9cf6x4581cc732x3f15e4xf4e4c88seb2ebfff">
                        </div>
                    </div>
                    <div class="">
                        <label for="single-select">Cobranças Pendentes:</label>
                        <div class="input-group input-group-lg mb-3">

                            <select id="multi-select" class="form-control" multiple="">
                                <?php
                                while($exibe = mysqli_fetch_assoc($resultado)){
                                    echo '<option>';
                                    echo $exibe['numero'];
                                    echo '</option>';
                                };
                                ?>
                            </select>
                            <button type="submit" class="btn btn-block btn-success btn-lg">Efetuar Cobranças</button>
                        </div>
                    </div>

                </form></div>

        </div>
    </div>
</div>
<?php
include('rodape.php');
?>
