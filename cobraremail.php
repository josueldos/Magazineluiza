<?php
include('cabecalho.php');
include('../conexao.php');
$query = "select * from cobrancaemail where enviado = 0";
$resultado = mysqli_query($conexao,$query);
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Cobrança Por Email</div>
        <div class="card-body">
            <div class="form-group">
                <form action="efetuarcobrancaemail.php" method="post">

                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Usuario GMAIL:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email" placeholder="seanmack@gmail.com" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Senha GMAIL:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="********" required>
                        </div>
                    </div>

                    <div class="">
                        <label for="single-select">Cobranças Pendentes:</label>
                        <div class="input-group input-group-lg mb-3">

                            <select id="multi-select" class="form-control" multiple="">
                                <?php
                                while($exibe = mysqli_fetch_assoc($resultado)){
                                    echo '<option>';
                                    echo $exibe['email'];
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
