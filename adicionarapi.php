<?php
include('cabecalho.php');
include('../conexao.php');
$query = "select * from apimp";
$resultado = mysqli_query($conexao,$query);
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Adiconar API</div>
        <div class="card-body">
            <div class="form-group">
                <form action="addapi.php" method="post">

                    <div class="">
                        <label for="numeroboleto" class="form-control-label">API:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="api" id="api" placeholder="APP-8352008363336425-121121-974bbdf64b6fafb237098cb1a09714dc-365979018">
                        </div>
                    </div>

                    <div class="">
                        <label for="single-select">Lista De API'S:</label>
                        <div class="input-group input-group-lg mb-3">

                            <select id="multi-select" class="form-control" multiple="">
                                <?php
                                while($exibe = mysqli_fetch_assoc($resultado)){
                                    echo '<option>';
                                    echo $exibe['api'];
                                    echo '</option>';
                                };
                                ?>
                            </select>
                            <button type="submit" class="btn btn-block btn-success">Adicionar</button>
                        </div>




                    </div>

                </form></div>

        </div>
    </div>
</div>
<?php
include('rodape.php');
?>
