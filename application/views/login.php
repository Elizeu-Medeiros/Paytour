<body class="login-page">
    <div class="page-header header-filter" style="background-image: url(<?= base_url('assets/img/bg7.jpg') ?>); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="" action="">
                            <div class="header header-primary text-center">
                                <h4 class="card-title">Conecte-se</h4>
                                <div class="social-line">
                                    <a href="<?= base_url("Social/auth/Facebook") ?>" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="<?= base_url("Social/auth/Google") ?>" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="description text-center">ou conecte-se com</p>
                            <div class="card-content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Email..." disabled>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" placeholder="Senha..." class="form-control" disabled/>
                                </div>

                            </div>
                            <div class="footer text-center">
                                <a href="#" class="btn btn-primary btn-simple btn-wd btn-lg">Iniciar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>