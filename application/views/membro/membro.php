<body class="profile-page">

    <div class="profile-content">
        <div class="container">

            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="profile">
                        <div class="avatar">
                            <img src="<?= (isset($foto)) ?  $foto : base_url('assets/img/faces/christian.jpg') ?>" alt="Circle Image" class="img-circle img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title"><?= @$nome ?></h3>
                            <h6>
                                <?= @$especialidade ?>
                            </h6>
                            <?php if (isset($facebook)) { ?>
                                <a href="<?= $facebook ?>" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook"></i></a>
                            <?php } elseif (isset($twiter)) { ?>
                                <a href="<?= $twiter ?>" class="btn btn-just-icon btn-simple btn-twitter"><i class="fa fa-twitter"></i></a>
                            <?php } elseif (isset($google)) { ?>
                                <a href="<?= $google ?>" class="btn btn-just-icon btn-simple btn-google"><i class="fa fa-google"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 follow">
                    <button class="btn btn-fab btn-primary" rel="tooltip" title="Follow this user">
                        <i class="material-icons">add</i>
                    </button>
                </div>
            </div>


            <div class="description text-center">
                <p><?= @$descricao ?></p>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-icons" role="tablist">
                                <li class="active">
                                    <a href="#minhas_sessoes" role="tab" data-toggle="tab">
                                        <i class="material-icons">palette</i>
                                        Minhas Sessões
                                    </a>
                                </li>
                                <li>
                                    <a href="#meus_cupons" role="tab" data-toggle="tab">
                                        <i class="material-icons">people</i>
                                        meus Cupons
                                    </a>
                                </li>
                                <li>
                                    <a href="#nossos_especialistas" role="tab" data-toggle="tab">
                                        <i class="material-icons">camera</i>
                                        Nossos Especialistas
                                    </a>
                                </li>
                                <li>
                                    <a href="#planos" role="tab" data-toggle="tab">
                                        <i class="material-icons">camera</i>
                                        Planos
                                    </a>
                                </li>
                            </ul>


                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active work" id="minhas_sessoes">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h4 class="title">Minhas Consultas</h4>
                            <div class="row collections">
                                <!--                 tables -->
                                <div id="tables">
                                    <div class="col-md-3 col-md-offset-1">
                                        <a href="<?= base_url('especialistas') ?>" class="btn btn-primary btn-round">Agendar Consulta</a>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="table-responsive">
                                                <table class="table  table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Termos de Atendimento</th>
                                                            <th>Contrato Paciente/Psicólogo</th>
                                                            <th>Anamnese</th>
                                                            <th class="text-right">Encaminhamento</th>
                                                            <th class="text-right">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Andrew Mike</td>
                                                            <td class="text-center">1</td>
                                                            <td>Develop</td>
                                                            <td>2013</td>
                                                            <td class="text-right">&euro; 99,225</td>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>John Doe</td>
                                                            <td class="text-center">2</td>
                                                            <td>Design</td>
                                                            <td>2012</td>
                                                            <td class="text-right">&euro; 89,241</td>
                                                            <td class="td-actions text-right">

                                                                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alex Mike</td>
                                                            <td class="text-center">3</td>
                                                            <td>Design</td>
                                                            <td>2010</td>
                                                            <td class="text-right">&euro; 92,144</td>
                                                            <td class="td-actions text-right">

                                                                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mike Monday</td>
                                                            <td class="text-center">4</td>
                                                            <td>Marketing</td>
                                                            <td>2013</td>
                                                            <td class="text-right">&euro; 49,990</td>
                                                            <td class="td-actions text-right">

                                                                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Paul Dickens</td>
                                                            <td class="text-center">5</td>
                                                            <td>Communication</td>
                                                            <td>2015</td>
                                                            <td class="text-right">&euro; 69,201</td>
                                                            <td class="td-actions text-right">

                                                                <button type="button" rel="tooltip" class="btn btn-success btn-round">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!--                 end tables -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane connections" id="meus_cupons">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="<?= base_url("assets/img/faces/avatar.jpg") ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">Gigi Hadid</h4>
                                        <h6 class="category text-muted">Model</h6>

                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human
                                            foundation in truth...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="<?= base_url("assets/img/faces/marc.jpg") ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">Marc Jacobs</h4>
                                        <h6 class="category text-muted">Designer</h6>

                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human
                                            foundation in truth...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="<?= base_url("assets/img/faces/kendall.jpg") ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">Kendall Jenner</h4>
                                        <h6 class="category text-muted">Model</h6>

                                        <p class="card-description">
                                            I love you like Kanye loves Kanye. Don't be scared of the truth.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="<?= base_url("assets/img/faces/card-profile2-square.jpg") ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">George West</h4>
                                        <h6 class="category text-muted">Model/DJ</h6>

                                        <p class="card-description">
                                            I love you like Kanye loves Kanye.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane text-center gallery" id="nossos_especialistas">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3">
                            <img src="<?= base_url("assets/img/examples/chris4.jpg") ?>" class="img-rounded" />
                            <img src="<?= base_url("assets/img/examples/chris6.jpg") ?>" class="img-rounded" />
                        </div>
                        <div class="col-md-3">
                            <img src="<?= base_url("assets/img/examples/chris7.jpg") ?>" class="img-rounded" />
                            <img src="<?= base_url("assets/img/examples/chris5.jpg") ?>" class="img-rounded" />
                            <img src="<?= base_url("assets/img/examples/chris9.jpg") ?>" class="img-rounded" />
                        </div>
                    </div>
                </div>
                <div class="tab-pane text-center gallery" id="planos">
                    <div class="pricing-4" id="pricing-4">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <h2 class="title">Conheça nossos planos</h2>
                                    <h5 class="description">Tenha acesso a conteúdos e benefícios exclusivos</h5>
                                    <div class="section-space"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-pricing card-plain">
                                        <div class="card-content">
                                            <h6 class="category">7 Dias</h6>
                                            <h1 class="card-title"><small>$</small>0</h1>
                                            <ul>
                                                <li><i class="material-icons text-success">check</i> ACESSO A TODAS AS FUNCIONALIDADES
                                                </li>
                                                <li><i class="material-icons text-danger">close</i> Design Tools
                                                </li>
                                                <li><i class="material-icons text-danger">close</i> Private Messages
                                                </li>
                                                <li><i class="material-icons text-danger">close</i> Personal Brand
                                                </li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-danger btn-round">
                                                Plano 7 dias Grátis
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card card-pricing card-raised">
                                        <div class="card-content content-success">
                                            <h6 class="category">Small Company</h6>
                                            <h1 class="card-title"><small>$</small>89</h1>
                                            <ul>
                                                <li><i class="material-icons text-success">check</i> Sharing Tools
                                                </li>
                                                <li><i class="material-icons text-success">check</i> Design Tools
                                                </li>
                                                <li><i class="material-icons text-danger">close</i> Private Messages
                                                </li>
                                                <li><i class="material-icons text-danger">close</i> Personal Brand
                                                </li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-white btn-raise disabled btn-round">
                                                Current Plan
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card card-pricing card-plain">
                                        <div class="card-content">
                                            <h6 class="category">Large Company</h6>
                                            <h1 class="card-title"><small>$</small>189</h1>
                                            <ul>
                                                <li><i class="material-icons text-success">check</i> Sharing Tools
                                                </li>
                                                <li><i class="material-icons text-success">check</i> Design Tools
                                                </li>
                                                <li><i class="material-icons text-success">check</i> Private
                                                    Messages</li>
                                                <li><i class="material-icons text-danger">close</i> Personal Brand
                                                </li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-success btn-round">
                                                Upgrade Plan
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card card-pricing card-plain">
                                        <div class="card-content">
                                            <h6 class="category">Enterprise</h6>
                                            <h1 class="card-title"><small>$</small>389</h1>
                                            <ul>
                                                <li><i class="material-icons text-success">check</i> Sharing Tools
                                                </li>
                                                <li><i class="material-icons text-success">check</i> Design Tools
                                                </li>
                                                <li><i class="material-icons text-success">check</i> Private
                                                    Messages</li>
                                                <li><i class="material-icons text-success">check</i> Personal Brand
                                                </li>
                                            </ul>
                                            <a href="#pablo" class="btn btn-success btn-round">
                                                Upgrade Plan
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>