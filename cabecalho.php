<?php
session_start();

require_once 'init.php';

require 'check.php';
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sean Mack - Admin</title>
    <link rel="stylesheet" href="./vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <style type="text/css">
        ion-icon {
            font-size: 18px;
        }/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>
<script src="https://unpkg.com/ionicons@4.1.2/dist/ionicons.js"></script>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <img src="./imgs/logo.png" alt="logo">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">




            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none"><?php echo $_SESSION['user_name']; ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">


                    <a href="logout.php" class="dropdown-item">
                        <i class="fa fa-lock"></i> Sair
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">Navigation</li>

                    <li class="nav-item">
                        <a href="home.php" class="nav-link">
                            <i class="icon icon-home"></i>Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="informacoes.php" class="nav-link">
                            <i class="icon icon-credit-card"></i>Informações
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-basket"></i>Produtos<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="listarprodutos.php" class="nav-link">
                                    <i class="icon icon-basket-loaded"></i>Listar Produtos</a>
                            </li>

                            <li class="nav-item">
                                <a href="adicionarproduto.php" class="nav-link">
                                    <i class="icon icon-basket-loaded"></i>Adicionar Produto</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-docs"></i>Boletos<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="adicionarboleto.php" class="nav-link">
                                    <i class="icon icon-doc"></i>Adicionar Boleto</a>
                            </li>

                            <li class="nav-item">
                                <a href="listarboletos.php" class="nav-link">
                                    <i class="icon icon-doc"></i>Listar Boletos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon-calculator"></i>API MercadoPago<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="adicionarapi.php" class="nav-link">
                                    <i class="icon icon-calculator"></i>Adicionar API</a>
                            </li>

                            <li class="nav-item">
                                <a href="adicionarlara.php" class="nav-link">
                                    <i class="icon icon-calculator"></i>Adicionar Conta Lara</a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-notebook"></i>Ferramentas<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="extrairemails.php" class="nav-link">
                                    <i class="icon icon-note"></i>Extrator De Emails</a>
                            </li>
                            <li class="nav-item">
                                <a href="extrairinfos.php" class="nav-link">
                                    <i class="icon icon-note"></i>Extrator De Info</a>
                            </li>
                            <li class="nav-item">
                                <a href="extrairemailsenha.php" class="nav-link">
                                    <i class="icon icon-note"></i>Extrator De Email|Senha</a>
                            </li>
                            <li class="nav-item">
                                <a href="adicionarx9.php" class="nav-link">
                                    <i class="icon icon-note"></i>Adicionar X9</a>
                            </li>
                            <li class="nav-item">
                                <a href="apagar.php" class="nav-link">
                                    <i class="icon icon-note"></i>Excluir Pastas</a>
                            </li>
                          </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-diamond"></i>Cobranças<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="cobraremail.php" class="nav-link">
                                    <i class="icon icon-basket-loaded"></i>Cobrar Email</a>
                            </li>

                            <li class="nav-item">
                                <a href="cobrarsms.php" class="nav-link">
                                    <i class="icon icon-basket-loaded"></i>Cobrança SMS</a>
                            </li>

                            <li class="nav-item">
                                <a href="cobrarwpp.php" class="nav-link">
                                    <i class="icon icon-basket-loaded"></i>Cobrança Whatsapp</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="configuracoes.php" class="nav-link">
                            <i class="icon icon-wrench"></i>Configurações
                        </a>
                    </li>







                </ul>
            </nav>
        </div>

        <div class="content">

            <div class="container-fluid">
