<body>
    <!--     *********     HEADER 3      *********      -->

    <div class="header-3">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/img/logo.png" width="50">

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navigation-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li <?= ($menu == 'home') ? 'class="active"' : "" ?>>
                            <a href="home">
                                Início
                            </a>
                        </li>
                        <li <?= ($menu == 'sobre') ? 'class="active"' : "" ?>>
                            <a href="sobre">
                                Quem Somos
                            </a>
                        </li>
                        <li <?= ($menu == 'terapeutas') ? 'class="active"' : "" ?>>
                            <a href="profissionais">
                                Profissionais
                            </a>
                        </li>
                        <li <?= ($menu == 'signup') ? 'class="active"' : "" ?>>
                            <a href="signup">
                                Cadastre-se
                            </a>
                        </li>
                        <li <?= ($menu == 'login') ? 'class="active"' : "" ?>>
                            <?php ($this->session->userdata("usuario")) ? $login = "restrito" : $login = "entrar" ?>
                            <a href="<?= $login ?>">
                                <?= ($login == "restrito") ? "logado" : "entrar" ?>
                            </a>
                        </li>
                        <li <?= ($menu == 'contato') ? 'class="active"' : "" ?>>
                            <a href="contato">
                                Contato
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?= @$slider ?>

    </div>

    <!--     *********    END HEADER 3      *********      -->