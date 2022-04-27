<?php
include('cabecalho.php');
include('../conexao.php');
$query = "select * from laramp";
$resultado = mysqli_query($conexao,$query);
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Adiconar Laranja</div>
        <div class="card-body">
            <div class="form-group">
                <form action="addlara.php" method="post">

                    <div class="">
                        <label for="numeroboleto" class="form-control-label">Email:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email" placeholder="EMAILDOLARA@GMAIL.COM">
                        </div>
                    </div>

                    <div class="">
                        <label for="single-select">Lista De Laras:</label>
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
