<div class="content">
    <div class="container-fluid">
        <div class="page-categories">

            <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link7" role="tablist">
                        <i class="material-icons">assignment_ind</i> Meu Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
                        <i class="material-icons">document_scanner</i> Dados Profissionais
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                        <i class="material-icons">location_on</i> Endereço Profissional
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" data-toggle="tab" href="#link10" role="tablist">
                        <i class="material-icons">help_outline</i> Help Center
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-space tab-subcategories">
                <div class="tab-pane active" id="link7">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Editar Perfil</h4>
                                    <p class="card-category">Complete seu Perfil</p>
                                </div>
                                <div class="card-body">
                                    <form id="meu_perfil">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Nome</label>
                                                    <input type="text" name="nome" id="nome" value="<?= $minhaConta[0]->usu_nome ?>" class="form-control">
                                                    <input type="hidden" name="pk_pessoa" id="pk_pessoa" value="<?= $minhaConta[0]->pk_pessoa ?>">
                                                    <input type="hidden" name="pk_endereco" id="pk_endereco" value="<?= $minhaConta[0]->pk_endereco ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Usuário</label>
                                                    <input type="text" class="form-control" name="login" id="login" value="<?= $minhaConta[0]->usu_login ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="<?= $minhaConta[0]->usu_email ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Nome Completo</label>
                                                    <input type="text" name="nome_completo" id="nome_completo" class="form-control" value="<?= $minhaConta[0]->pes_nome ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Data Nascimento</label>
                                                    <input type="text" name="data_nasc" id="data_nasc" class="form-control" value="<?= $minhaConta[0]->usu_data_nascimento ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating"> Sexo </label>
                                                    <select name="sexo" id="sexo" class="selectpicker" data-style="select-with-transition">
                                                        <option disabled selected>SELECIONE</option>
                                                        <option value="M" <?= ($minhaConta[0]->usu_sexo == "M") ? "selected" : "" ?>>
                                                            MASCULINO
                                                        </option>
                                                        <option value="F" <?= ($minhaConta[0]->usu_sexo == "F") ? "selected" : "" ?>>
                                                            FEMININO
                                                        </option>
                                                        <option value="O" <?= ($minhaConta[0]->usu_sexo == "O") ? "selected" : "" ?>>
                                                            OUTRO
                                                        </option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating"> Estado Civil </label>
                                                    <select name="estado_civil" id="estado_civil" class="selectpicker" data-style="select-with-transition">
                                                        <option disabled selected>SELECIONE</option>
                                                        <?php
                                                        foreach ($estadoCivil as $row) {
                                                            $selecionado = "";
                                                            if (@$id != "") {
                                                                if (@$id == $row->pk_estado_civil) {
                                                                    $selecionado = " selected ";
                                                                }
                                                            }
                                                            echo "<option" . $selecionado . " value=" . $id = $row->pk_estado_civil . ">";
                                                            echo @$row->estado_civil;
                                                            echo "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">CPF</label>
                                                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $minhaConta[0]->usu_nome ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Identidade</label>
                                                    <input type="text" name="identidade" id="identidade" class="form-control" value="<?= $minhaConta[0]->usu_nome ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Telefone</label>
                                                    <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $minhaConta[0]->usu_telefone ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Celular</label>
                                                    <input type="text" name="celular" id="celular" class="form-control" value="<?= $minhaConta[0]->usu_celular ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating">UF</label>
                                                    <select name="uf" id="uf" class="selectpicker" data-style="select-with-transition">
                                                        <option>Selecione</option>
                                                        <option value="AC">AC</option>
                                                        <option value="AL">AL</option>
                                                        <option value="AP">AP</option>
                                                        <option value="AM">AM</option>
                                                        <option value="BA">BA</option>
                                                        <option value="CE">CE</option>
                                                        <option value="DF">DF</option>
                                                        <option value="ES">ES</option>
                                                        <option value="GO">GO</option>
                                                        <option value="MA">MA</option>
                                                        <option value="MT">MT</option>
                                                        <option value="MS">MS</option>
                                                        <option value="MG">MG</option>
                                                        <option value="PA">PA</option>
                                                        <option value="PB">PB</option>
                                                        <option value="PR">PR</option>
                                                        <option value="PE">PE</option>
                                                        <option value="PI">PI</option>
                                                        <option value="RJ">RJ</option>
                                                        <option value="RN">RN</option>
                                                        <option value="RS">RS</option>
                                                        <option value="RO">RO</option>
                                                        <option value="RR">RR</option>
                                                        <option value="SC">SC</option>
                                                        <option value="SP">SP</option>
                                                        <option value="SE">SE</option>
                                                        <option value="TO">TO</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Cidade</label>
                                                    <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $minhaConta[0]->end_cidade ?>" readonly="readonly">
                                                    <input type="hidden" name="cidade_id" id="cidade_id" value="<?= $minhaConta[0]->id_cidade ?>">

                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">CEP</label>
                                                    <input type="text" name="cep" id="cep" class="form-control" value="<?= $minhaConta[0]->end_cep ?>" readonly="readonly">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Bairro</label>
                                                    <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $minhaConta[0]->end_bairro ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Endereço</label>
                                                    <input type="text" name="endereco" id="endereco" class="form-control" value="<?= $minhaConta[0]->end_logradouro ?>">
                                                    <input type="hidden" name="logradouro_id" id="logradouro_id" class="form-control" value="<?= $minhaConta[0]->id_logradouro ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Número</label>
                                                    <input type="text" name="numero" id="numero" class="form-control" value="<?= $minhaConta[0]->end_numero ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Complemento</label>
                                                    <input type="text" name="complemento" id="complemento" class="form-control" value="<?= $minhaConta[0]->end_complemento ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" id="btn_save_user" class="btn btn-primary pull-right">Salvar</button>
                                        <span class="help-block"></span>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card-avatar">
                                <div class="card card-profile">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <form id="UploadFoto" enctype="multipart/form-data">
                                            <div class="fileinput-new thumbnail img-circle img-raised">
                                                <img id="foto" name="foto" class="img" src="<?= ($usuario->photoURL) ? $usuario->photoURL : base_url() ?>">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="max-height: 200px; max-height: 200px"></div>
                                            <div>
                                                <span class="btn btn-raised btn-round btn-default btn-file">
                                                    <span id="btn_upload_usuario_photo" class="fileinput-new">Add
                                                        Foto</span>
                                                    <span class="fileinput-exists">Trocar</span>
                                                    <input type="file" name="..." /></span>
                                                <br />
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>

                                            </div>
                                            <img id="foto" src="" class="rounded mx-auto d-block" style="max-height: 200px; max-height: 200px">
                                            <br />
                                            <label class="btn btn-block btn-info">
                                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar foto
                                                <input type="file" id="btn_upload_usuario_photo" accept="image/*" style="display: none;">
                                            </label>
                                            <span class="help-block"></span>
                                        </form>
                                    </div>

                                    <div class="card-body">
                                        <h6 class="card-category text-gray"></h6>
                                        <h4 class="card-title"></h4>
                                        <p class="card-description">

                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="link8">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Dados Profissionais</h4>
                                    <p>Para acessar o seu termo basta: Acessar https://e-psi.cfp.org.br/
                                        --> clicar no menu Participe do e-psi (mesmo se ja possuir um cadastro)
                                        --> Preencha seu CPF e a região do seu CRP --> Aparecerá uma mensagem informando que ja possui o cadastro
                                        --> Clique no botão Reenviar termo por e-mail --> Prontinho! Possuímos o prazo de 24 h para aprovação!
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form id="meu_dados_prof">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Número de inscrição no CRP</label>
                                                    <input type="text" name="num_crp" id="num_crp" value="<?= $minhaConta[0]->usu_nome ?>" class="form-control">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating">Região do seu CRP</label>
                                                    <select name="crp_regiao" id="crp_regiao" class="selectpicker" data-style="select-with-transition">
                                                        <option value="CRP – 1º Região">CRP – 1º Região</option>
                                                        <option value="CRP – 2º Região">CRP – 2º Região</option>
                                                        <option value="CRP – 3º Região">CRP – 3º Região</option>
                                                        <option value="CRP – 4º Região">CRP – 4º Região</option>
                                                        <option value="CRP – 5º Região">CRP – 5º Região</option>
                                                        <option value="CRP – 6º Região">CRP – 6º Região</option>
                                                        <option value="CRP – 7º Região">CRP – 7º Região</option>
                                                        <option value="CRP – 8º Região">CRP – 8º Região</option>
                                                        <option value="CRP – 9º Região">CRP – 9º Região</option>
                                                        <option value="CRP – 10º Região">CRP – 10º Região</option>
                                                        <option value="CRP – 11º Região">CRP – 11º Região</option>
                                                        <option value="CRP – 12º Região">CRP – 12º Região</option>
                                                        <option value="CRP – 13º Região">CRP – 13º Região</option>
                                                        <option value="CRP – 14º Região">CRP – 14º Região</option>
                                                        <option value="CRP – 15º Região">CRP – 15º Região</option>
                                                        <option value="CRP – 16º Região">CRP – 16º Região</option>
                                                        <option value="CRP – 17º Região">CRP – 17º Região</option>
                                                        <option value="CRP – 18º Região">CRP – 18º Região</option>
                                                        <option value="CRP – 19º Região">CRP – 19º Região</option>
                                                        <option value="CRP – 20º Região">CRP – 20º Região</option>
                                                        <option value="CRP – 21º Região">CRP – 21º Região</option>
                                                        <option value="CRP – 22º Região">CRP – 22º Região</option>
                                                        <option value="CRP – 23º Região">CRP – 23º Região</option>
                                                    </select>

                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Status</label>
                                                    <input type="text" class="form-control" name="login" id="login" value="<?= $minhaConta[0]->usu_login ?>" disabled="disabled">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">


                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Termo do e-Psi</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="<?= $minhaConta[0]->usu_email ?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" id="btn_save_user" class="btn btn-primary pull-right">Salvar</button>
                                        <span class="help-block"></span>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card-avatar">
                                <div class="card card-profile">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <form id="UploadFoto" enctype="multipart/form-data">
                                            <div class="fileinput-new thumbnail img-circle img-raised">
                                                <img id="foto" name="foto" class="img" src="<?= ($usuario->photoURL) ? $usuario->photoURL : base_url() ?>">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="max-height: 200px; max-height: 200px"></div>
                                            <div>
                                                <span class="btn btn-raised btn-round btn-default btn-file">
                                                    <span id="btn_upload_usuario_photo" class="fileinput-new">Add
                                                        CRP</span>
                                                    <span class="fileinput-exists">Trocar</span>
                                                    <input type="file" name="..." /></span>
                                                <br />
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>

                                            </div>
                                            <img id="foto" src="" class="rounded mx-auto d-block" style="max-height: 200px; max-height: 200px">
                                            <br />
                                            <label class="btn btn-block btn-info">
                                                <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar CRP
                                                <input type="file" id="btn_upload_usuario_photo" accept="image/*" style="display: none;">
                                            </label>
                                            <span class="help-block"></span>
                                        </form>
                                    </div>

                                    <div class="card-body">
                                        <h6 class="card-category text-gray"></h6>
                                        <h4 class="card-title"></h4>
                                        <p class="card-description">
                                            Este documento é exigido pelo CFP para certificar da formação dos profissionais em psicologia.
                                            Seu perfil somente será publicado após a conferência dos seu CRP
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="link9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Endereço Profissional</h4>
                            <p class="card-category">
                                More information here
                            </p>
                        </div>
                        <div class="card-body">
                            Completely synergize resource taxing relationships via premier niche markets. Professionally
                            cultivate one-to-one customer service with robust ideas.
                            <br>
                            <br>Dynamically innovate resource-leveling customer service for state of the art customer
                            service.
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="link10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Help center</h4>
                            <p class="card-category">
                                More information here
                            </p>
                        </div>
                        <div class="card-body">
                            From the seamless transition of glass and metal to the streamlined profile, every detail was
                            carefully considered to enhance your experience. So while its display is larger, the phone
                            feels
                            just right.
                            <br>
                            <br> Another Text. The first thing you notice when you hold the phone is how great it feels
                            in
                            your hand. The cover glass curves down around the sides to meet the anodized aluminum
                            enclosure
                            in a remarkable, simplified design.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>