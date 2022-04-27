<?php
include('cabecalho.php');
include('../conexao.php');
$query = 'SELECT * FROM `cobrancasms`WHERE enviado = 0';
$resultado = mysqli_query($conexao,$query);
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Cobrança Por SMS(NEXMO)</div>
        <div class="card-body">
            <div class="form-group">
                <form action="efetuarcobrancasms.php" method="post">

                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Key Nexmo:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
                            </div>
                            <input type="text" class="form-control" name="key" id="key" placeholder="xxxxxxxx" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Secret Key:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="secret" id="secret" placeholder="****************" required>
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
