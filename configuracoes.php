<?php
include("cabecalho.php");
include("admin.php");
//Query Para Visualizar Os Produtos
if(isset($_GET['salvo'])) {
    echo '<div class="alert alert-success">Configurações Salvas com Sucesso!</div>';
};


$queryconf = "select * from configuracoes";
$resultadoconf = mysqli_query($conexao,$queryconf);
while($exibe = mysqli_fetch_assoc($resultadoconf)){
    $boletoativo = $exibe['boleto'];
    $bloqueado = $exibe['bloqueado'];
    $diasboleto = $exibe['diasboleto'];
    $url = $exibe['url'];
    $smtp = $exibe['smtp'];
    $loginsmtp = $exibe['loginsmtp'];
    $senhasmtp = $exibe['senhasmtp'];
    $senha4 = $exibe['senha4'];
    $apimp = $exibe['apimp'];
}
if($boletoativo == 1 & $apimp == 1){
    echo '<div class="alert alert-warning">FUNÇÕES DE BOLETO EM CONFLITO!</div>';
};
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-light">Configurações Da Pagina</div>
        <div class="card-body">
            <div class="form-group">
                <form action="salvarconf.php" method="post">

                    <div class="">
                        <label for="singleselect">Link do Site:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                            </div>
                            <input type="text" name="url" id="url" value="<?=$url?>" class="form-control">
                        </div>

                        <label for="single-select">Função Boleto: <small>NÃO ATIVAR AS DUAS FUNÇÕES!</small></label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                            </div>
                            <select id="funcaoboleto" name="funcaoboleto" class="form-control">
                                <?php
                                if($boletoativo == 1){
                                    echo '<option value="1" selected="selected">Ativado</option>
                                       <option value="0">Desativado</option>';
                                }else{
                                    echo '<option value="1">Ativado</option>
                                        <option value="0" selected="selected">Desativado</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <label for="single-select">API MercadoPago Boleto: <small>NÃO ATIVAR AS DUAS FUNÇÕES!</small></label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                            </div>
                            <select id="funcaoapi" name="funcaoapi" class="form-control">
                                <?php
                                if($apimp == 1){
                                    echo '<option value="1" selected="selected">Ativado</option>
                                       <option value="0">Desativado</option>';
                                }else{
                                    echo '<option value="1">Ativado</option>
                                        <option value="0" selected="selected">Desativado</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <?php
                        if($boletoativo == 1 & $apimp == 0 OR $boletoativo == 0 &$apimp == 1){
                            ?>
                            <label for="singleselect">Dias Vencimento Boleto:</label>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="number" name="diasboleto" id="diasboleto" value="<?=$diasboleto?>" class="form-control">
                            </div>
                        <?php
                        }else{
                           ?>
                            <label for="singleselect">Dias Vencimento Boleto:</label>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="hidden" name="diasboleto" id="diasboleto" value="<?=$diasboleto?>">
                                <input type="number" disabled="disabled" name="desativado" id="desativado" value="<?=$diasboleto?>" class="form-control">
                            </div>
                        <?php
                        };
                        ?>

                        <label for="singleselect">Bloquear Acessos:</label>
                        <div class="input-group input-group-lg mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-lock"></i></span>
                          </div>
                          <select id="bloquear" name="bloquear" class="form-control">
                              <?php
                              if($bloqueado == 1){
                                  echo '<option value="1" selected="selected">Ativado</option>
                                     <option value="0">Desativado</option>';
                              }else{
                                  echo '<option value="1">Ativado</option>
                                      <option value="0" selected="selected">Desativado</option>';
                              }
                              ?>
                          </select>

                        </div>

                        <label for="singleselect">Cobrança por Email:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <select id="smtp" name="smtp" class="form-control">
                                <?php
                                if($smtp == 1){
                                    echo '<option value="1" selected="selected">Ativado</option>
                                     <option value="0">Desativado</option>';
                                }else{
                                    echo '<option value="1">Ativado</option>
                                      <option value="0" selected="selected">Desativado</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <?php
                        if($smtp == 1){
                            ?>
                            <label for="singleselect">Usuario GMAIL:</label>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" name="loginsmtp" id="loginsmtp" value="<?=$loginsmtp?>" class="form-control">
                            </div>

                            <label for="singleselect">Senha GMAIL:</label>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" name="senhasmtp" id="senhasmtp" value="<?=$senhasmtp?>" class="form-control">
                            </div>
                            <?php
                        }else{
                            ?>
                            <label for="singleselect">Usuario GMAIL:</label>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="hidden" name="loginsmtp" id="loginsmtp" value="<?=$loginsmtp?>">
                                <input type="text" name="loginsmtpd" disabled="disabled" id="loginsmtpd" value="<?=$loginsmtp?>" class="form-control">
                            </div>

                            <label for="singleselect">Senha GMAIL:</label>
                            <div class="input-group input-group-lg mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="hidden" name="senhasmtp" id="senhasmtp" value="<?=$senhasmtp?>">
                                <input type="text" name="senhasmtpd" disabled="disabled" id="senhasmtpd" value="<?=$senhasmtp?>" class="form-control">
                            </div>
                            <?php
                        };
                        ?>

                        <label for="singleselect">Senha Cartão:</label>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <select id="senhacc" name="senhacc" class="form-control">
                                <?php
                                if($senha4 == 1){
                                    echo '<option value="1" selected="selected">Ativado</option>
                                     <option value="0">Desativado</option>';
                                }else{
                                    echo '<option value="1">Ativado</option>
                                      <option value="0" selected="selected">Desativado</option>';
                                }
                                ?>
                            </select>

                        <button type="submit" class="btn btn-block btn-success">Salvar</button>


                    </div>

                </form></div>

        </div>
    </div>
</div>

<?php
include("rodape.php");
?>
