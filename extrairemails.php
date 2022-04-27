<?php
include('../conexao.php');
include('cabecalho.php');
$query = "select * from informacoes";
$resultado = mysqli_query($conexao,$query);
?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">Extrator De Emails</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="textarea">Emails Extraidos:</label>
                        <textarea id="textarea" class="form-control" rows="6"><?php while($exibe=mysqli_fetch_assoc($resultado)){echo "{$exibe['email']} \n";};?>
                        </textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
include('rodape.php');
?>