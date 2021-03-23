<div class="content">
    <div class="container-fluid">
    <input type="hidden" name="pk_pessoa" id="pk_pessoa">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Dados Profissionais</h4>
                    </div>
                    <div class="card-body">
                        <form id="form_dados" enctype="multipart/form-data">

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nome</label>
                                        <input type="text" name="nome_completo" id="nome_completo" class="form-control">
                                       
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-7">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Telefone</label>
                                        <input type="text" class="form-control" name="telefone" id="telefone">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Cargo Desejado</label>
                                        <input type="text" class="form-control" name="cargo" id="cargo">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group input-group-prepend is-filled">
                                        <label class="bmd-label-floating">Escolaridade</label>
                                        <select name="escolaridade" id="escolaridade" class="selectpicker"
                                            data-style="select-with-transition">
                                            <option value=''>Selecione</option>
                                            <option value="EF"> Ensino Fudamental </option>
                                            <option value="EM"> Ensino Médio </option>
                                            <option value="NT"> Nível Técnico </option>
                                            <option value="NS"> Nível Superior </option>
                                            <option value="M"> Mestrado </option>
                                            <option value="D"> Doutorado </option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group input-group-prepend is-filled">
                                        <label class="control-label"> Observações </label>
                                        <textarea class="form-control" id="obs" name="obs" rows="5"></textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" id="btn_save_dados" class="btn btn-primary pull-right">Salvar</button>
                            <span class="help-block"></span>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Curriculum</h4>
                    </div>
                    <div class="card-body">
                     

                            <h6 class="card-category text-gray"></h6>
                            <h4 class="card-title">Dicas para envio</h4>
                            <p class="card-description">
                                Envie o arquivo numa das nas seguintes extensões: .doc, .docx ou .pdf.
                                O tamanho máximo do arquivo é de 1MB.
                            </p>

                            <!-- 	            file uploader -->
                            <div class="row">
                                <div class="col-md-12">
                                    <form name="form_doc" id="form_doc">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                            <div class="fileinput-preview fileinput-exists thumbnail" >
                                            </div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Selecione o arquivo</span>
                                                    <i class="material-icons">attach_file</i>
                                                    <span class="fileinput-exists">Mudar</span>
                                                    <input type="hidden"><input type="file" 
                                                        accept=".doc,.docx,.pdf,application/msword,application/pdf"
                                                        name="file">
                                                    <div class="ripple-container"></div>
                                                </span>
                                                <a href="" id="remover" class="btn btn-danger btn-round fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>

                                            </div>
                                            <button type="submit" id="btn_enviar_doc"
                                                class="btn btn-primary pull-center">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                    </div>

                </div>
            </div>



        </div>
    </div>



</div>


</div>