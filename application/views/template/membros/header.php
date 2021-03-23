<!--
=========================================================
Material Dashboard PRO - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard-pro
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/icons/cropped-favicon-192x192.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?= $empresa . " - " . $title ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= base_url() ?>assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url() ?>assets/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        #ui-id-1 {
            z-index: 9999;
        }

        .ui-autocomplete {
            position: absolute;
            cursor: default;
            z-index: 9999 !important;
        }

        input {
            text-transform: uppercase;
        }

        span.help-block {
            background-color: brown;
            color: #FFFFFF;
        }

        .modal-full {
            min-width: 80%;
            margin-left: 20;
        }

        .modal-full .modal-content {
            min-height: 100vh;
        }

        .hint {
            position: absolute;
            left: 5px;
            right: auto;
            bottom: 0px;
            font-size: 14px;
            line-height: 14px;
            transition: all 0.3s cubic-bezier(0.55, 0, 0.55, 0.2);
            color: grey;
        }
    </style>
</head>

<body class="sidebar-mini">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="<?= base_url() ?>assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="<?= base_url("restrito") ?>" class="simple-text logo-mini">
                    <img src="<?= $logo ?>" width="20">
                </a>
                <a href="<?= base_url("restrito") ?>" class="simple-text logo-normal">
                    <img src="<?= $logo2 ?>" width="80">
                </a>
            </div>

            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?= @$usuario->photoURL ?>" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
                            <span>
                                <?= @$usuario->usu_nome ?>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="nav-item  <?= ($menu == "person") ? 'active' : '' ?>">
                                    <a class=" nav-link" href="<?= base_url("meuperfil") ?>">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal"> Meu Perfil </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"> CA </span>
                                        <span class="sidebar-normal"> Convidar Amigos </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("logoff") ?>">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> Sair </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item  <?= ($menu == "dashboard") ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Painel de Controle</p>
                        </a>
                    </li>

                    <li class="nav-item <?= ($menu == "library_books") ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('curriculum') ?>">
                            <i class="material-icons">library_books</i>
                            <p>Meu Curriculum</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>