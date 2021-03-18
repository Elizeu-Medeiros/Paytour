<div class="content">
    <div class="container-fluid">
        <div class="page-categories">


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
                                            <input type="text" name="nome" id="nome" class="form-control">
                                            <input type="hidden" name="pk_pessoa" id="pk_pessoa">
                                            <input type="hidden" name="pk_endereco" id="pk_endereco">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Usuário</label>
                                            <input type="text" class="form-control" name="login" id="login">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Nome Completo</label>
                                            <input type="text" name="nome_completo" id="nome_completo" class="form-control">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Data Nascimento</label>
                                            <input type="text" name="data_nasc" id="data_nasc" class="form-control" >
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group input-group-prepend is-filled">
                                            <label class="bmd-label-floating"> Sexo </label>
                                            <select name="sexo" id="sexo" class="selectpicker" data-style="select-with-transition">
                                                <option disabled selected>SELECIONE</option>
                                                <option value="M">
                                                    MASCULINO
                                                </option>
                                                <option value="F">
                                                    FEMININO
                                                </option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group input-group-prepend is-filled">
                                            <label class="bmd-label-floating"> Estado Civil </label>
                                            <select name="estado_civil" id="estado_civil" class="selectpicker" data-style="select-with-transition">
                                                <option disabled selected>SELECIONE</option>
                                                <?php
                                                foreach ($estadoCivil as $row) {
                                                    $selecionado = "";
                                                    if (@$id != "") {
                                                        if (@$id == @$row->pk_estado_civil) {
                                                            $selecionado = " selected ";
                                                        }
                                                    }
                                                    echo "<option" . $selecionado . " value=" . $id = @$row->pk_estado_civil . ">";
                                                    echo @$row->estado_civil;
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">CPF</label>
                                            <input type="text" name="cpf" id="cpf" class="form-control" value="<?= @$minhaConta[0]->usu_nome ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Telefone</label>
                                            <input type="text" name="telefone" id="telefone" class="form-control" value="<?= @$minhaConta[0]->usu_telefone ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Celular</label>
                                            <input type="text" name="celular" id="celular" class="form-control" value="<?= @$minhaConta[0]->usu_celular ?>">
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
                                            <input type="text" name="cidade" id="cidade" class="form-control" value="<?= @$minhaConta[0]->end_cidade ?>" readonly="readonly">
                                            <input type="hidden" name="cidade_id" id="cidade_id" value="<?= @$minhaConta[0]->id_cidade ?>">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">CEP</label>
                                            <input type="text" name="cep" id="cep" class="form-control" value="<?= @$minhaConta[0]->end_cep ?>" readonly="readonly">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Bairro</label>
                                            <input type="text" name="bairro" id="bairro" class="form-control" value="<?= @$minhaConta[0]->end_bairro ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Endereço</label>
                                            <input type="text" name="endereco" id="endereco" class="form-control" value="<?= @$minhaConta[0]->end_logradouro ?>">
                                            <input type="hidden" name="logradouro_id" id="logradouro_id" class="form-control" value="<?= @$minhaConta[0]->id_logradouro ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Número</label>
                                            <input type="text" name="numero" id="numero" class="form-control" value="<?= @$minhaConta[0]->end_numero ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Complemento</label>
                                            <input type="text" name="complemento" id="complemento" class="form-control" value="<?= @$minhaConta[0]->end_complemento ?>">
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


    </div>
</div>