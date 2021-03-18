<div class="content">
    <div class="container-fluid">
        <div class="page-categories">

            <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                        <i class="material-icons">info</i> Dados Profissionais
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                        <i class="material-icons">location_on</i> Recebimento
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                        <i class="material-icons">gavel</i> Convênios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#link4" role="tablist">
                        <i class="material-icons">help_outline</i> Pacotes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#link5" role="tablist">
                        <i class="material-icons">help_outline</i> Cortesia
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#link6" role="tablist">
                        <i class="material-icons">help_outline</i> Libras
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#link7" role="tablist">
                        <i class="material-icons">help_outline</i> Desconto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#link8" role="tablist">
                        <i class="material-icons">help_outline</i> Aviso de férias
                    </a>
                </li>

            </ul>

            <input type="hidden" name="pk_configuracao" id="pk_configuracao">
            
            <div class="tab-content tab-space tab-subcategories">

                <div class="tab-pane active" id="link1">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Dados Profissionais</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form_dados" enctype="multipart/form-data">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating">Tempo de consulta</label>
                                                    <select name="tmp_consulta" id="tmp_consulta" class="selectpicker" data-style="select-with-transition">

                                                      <option value=''>Selecione</option>
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="30">30</option>
                                                        <option value="40">40</option>
                                                        <option value="50">50</option>
                                                        <option value="60">60</option>
                                                        <option value="70">70</option>
                                                        <option value="80">80</option>
                                                        <option value="90">90</option>
                                                        <option value="100">100</option>
                                                        <option value="120">120</option>

                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Valor da Consulta online</label>
                                                    <input type="text" name="valor_consulta_online" id="valor_consulta_online" class="form-control">

                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Valor da consulta
                                                        presencial</label>
                                                    <input type="text" class="form-control" name="valor_consulta_presencial" id="valor_consulta_presencial" >

                                                    <span class=" help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating">Tempo limite de antecedência para agendamentos</label>
                                                    <select name="tmp_antecedencia" id="tmp_antecedencia" class="selectpicker" data-style="select-with-transition">
                                                        <option value=''>Selecione</option>

                                                        <option value="1">1 hora</option>
                                                        <option value="2">2 horas</option>
                                                        <option value="3">3 horas</option>
                                                        <option value="4">4 horas</option>
                                                        <option value="5">5 horas</option>
                                                        <option value="6">6 horas</option>
                                                        <option value="7">7 horas</option>
                                                        <option value="8">8 horas</option>
                                                        <option value="9">9 horas</option>
                                                        <option value="10">10 horas</option>
                                                        <option value="11">11 horas</option>
                                                        <option value="12">12 horas</option>
                                                        <option value="13">13 horas</option>
                                                        <option value="14">14 horas</option>
                                                        <option value="15">15 horas</option>
                                                        <option value="16">16 horas</option>
                                                        <option value="17">17 horas</option>
                                                        <option value="18">18 horas</option>
                                                        <option value="19">19 horas</option>
                                                        <option value="20">20 horas</option>
                                                        <option value="21">21 horas</option>
                                                        <option value="22">22 horas</option>
                                                        <option value="23">23 horas</option>
                                                        <option value="24">24 horas</option>
                                                    </select>
                                                    <span class="help-block"></span>
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
                            <div class="card-avatar">
                                <div class="card card-profile">

                                    <div class="card-body">
                                        <h6 class="card-category text-gray"></h6>
                                        <h4 class="card-title">Dicas sobre como cobrar</h4>
                                        <p class="card-description">
                                            É importante que o valor da consulta online seja menor do que o da consulta
                                            presencial.
                                            Afinal não estão presentes vários custos relativos a estrutura física de um
                                            consultório
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Recebimento das Consultas</h4>
                                    <p class="card-category">
                                        Incluir a conta bancária apenas do titular. Contas de terceiros não
                                        serão aceitas.</p>
                                </div>
                                <div class="card-body">
                                    <form id="form_conta">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating">Tipo de conta</label>
                                                    <select name="tipo_conta" id="tipo_conta" class="selectpicker" data-style="select-with-transition">
                                                        <option value=''>Selecione</option>

                                                        <option value="corrente">Conta Corrente</option>
                                                        <option value="poupanca">Conta Poupança</option>

                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group input-group-prepend is-filled">
                                                    <label class="bmd-label-floating">Banco</label>
                                                    <select name="cod_banco" id="cod_banco" class="selectpicker" data-style="select-with-transition">
                                                        <option value=''>Selecione </option>

                                                        <?php
                                                        foreach ($bancos as $row) {
                                                            $selecionado = "";
                                                            if (@$id != "") {
                                                                if (@$id == $row->cod) {
                                                                    $selecionado = " selected ";
                                                                }

                                                            }
                                                            echo "<option" . $selecionado . " value=" .  $id = $row->cod . ">";
                                                            echo @$row->banco;
                                                            echo "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Agência</label>
                                                    <input type="text" name="agencia" id="agencia" class="form-control">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Conta</label>
                                                    <input type="text" name="conta" id="conta" class="form-control">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Digito</label>
                                                    <input type="text" name="digito" id="digito" class="form-control">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Favorecido</label>
                                                    <input type="text" name="favorecido" id="favorecido"  class="form-control" disabled>
                                                   
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>


                                        </div>
                                        <button type="submit" id="btn_save" class="btn btn-primary pull-right">Salvar</button>
                                        <span class="help-block"></span>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card-avatar">
                                <div class="card card-profile">

                                    <div class="card-body">
                                        <h6 class="card-category text-gray"></h6>
                                        <h4 class="card-title">Informações sobre taxas</h4>
                                        <p class="card-description">
                                            Será descontado uma taxa do cartão de crédito de 2,75%
                                            Valor fixo de R$ 2,70 taxa de desconto para pagamento em boleto bancário
                                            Contas que não são do Bradesco e Next terão um desconto fixo de R$ 3,67
                                            referente a taxa de TED do Saque.
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div class="card-avatar">
                                <div class="card card-profile">

                                    <div class="card-body">
                                        <h6 class="card-category text-gray"></h6>
                                        <h4 class="card-title">Informações sobre taxas</h4>
                                        <p class="card-description">
                                            Será descontado uma taxa do cartão de crédito de 2,75%
                                            Valor fixo de R$ 2,70 taxa de desconto para pagamento em boleto bancário
                                            Contas que não são do Bradesco e Next terão um desconto fixo de R$ 3,67
                                            referente a taxa de TED do Saque.
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div class="card-avatar">
                                <div class="card card-profile">

                                    <div class="card-body">
                                        <h6 class="card-category text-gray"></h6>
                                        <h4 class="card-title"></h4>
                                        <p class="card-description">
                                            Incorreções nos dados bancários informados poderão acarretar atrasos na data
                                            de repasse e cobranças de
                                            tarifas pelo Pagar.me por transação.
                                            Sua chave PIX deve ser referente a mesma conta cadastrada para facilitar o
                                            pagamento.
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Convênios</h4>
                            <p class="card-category">
                                Em breve será implementado o sistema de convênios.
                            </p>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link4">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Pacotes</h4>
                            <p class="card-category">
                                O Portal Psipro oferece a oportunidade para os psicólogos disponibilizar pacotes de
                                descontos com valores mais acessíveis para fidelizar os pacientes.
                                Ao marcar as opções abaixo você aceita oferecer os valores estipulados.
                                O desconto será aplicado automaticamente quando um paciente for identificado pelo
                                sistema.
                                Marque os pacotes que deseja oferecer abaixo:</p>
                        </div>

                        <div class="card-body">
                            <form id="form_pacotes">
                                <div class="row justify-content-md-center">

                                    <div class="col-md-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="pacote30" id="pacote30">
                                                Pacote com 2 consultas por 30% de desconto cada.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="pacote40" id="pacote40">
                                                Pacote com 3 consultas por 40% de desconto cada.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="pacote50" id="pacote50">
                                                Pacote com 4 consultas por 50% de desconto cada.
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" id="btn_save" class="btn btn-primary pull-right">Salvar</button>
                                <span class="help-block"></span>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Primeira Consulta Cortesia</h4>
                            <p class="card-category">
                                Quando um paciente novo se cadastrar e não realizar consultas em um determinado tempo,
                                será disponibilizado para ele um voucher com uma consulta cortesia, sem custo, a ser
                                direcionado para os psicólogos que marcarem essa opção.
                                Este serviço é um atendimento psicológico pontual, focado em um problema específico.
                                O paciente receberá do psicólogo um aconselhamento ou orientação,
                                com o objetivo de direcionar e ajudar a lidar com aquele problema.</p>
                        </div>
                        <div class="card-body">
                            <form id="form_cortesia">

                                <div class="row justify-content-md-center">

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="cortesia" id="cortesia">
                                                Habilitar opção para uma primeira consulta cortesia dos novos pacientes
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Quantidade de consultas cortesia por
                                                mês</label>
                                            <input type="number" name="qtd_cortesia_mes" id="qtd_cortesia_mes" class="form-control">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group input-group-prepend is-filled">
                                            <label class="bmd-label-floating">Tempo da consulta cortesia
                                                (minutos):</label>
                                            <select name="tmp_cortesia" id="tmp_cortesia" class="selectpicker" data-style="select-with-transition">
                                                <option>Selecione</option>
                                                <option value="20">20 minutos</option>
                                                <option value="30">30 minutos</option>
                                                <option value="40">40 minutos</option>
                                                <option value="50">50 minutos</option>
                                                <option value="60">60 minutos</option>
                                                <option value="70">70 minutos</option>
                                                <option value="80">80 minutos</option>
                                                <option value="90">90 minutos</option>
                                                <option value="100">100 minutos</option>
                                                <option value="110">110 minutos</option>
                                                <option value="120">120 minutos</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>

                                    </div>

                                </div>
                                <button type="submit" id="btn_save" class="btn btn-primary pull-right">Salvar</button>
                                <span class="help-block"></span>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Atendimento por Libras</h4>
                            <p class="card-category">
                                Habilitando essa informação você aparecerá como psicólogo que atende fluentemente em Libras.</p>
                        </div>
                        <div class="card-body">
                            <form id="form_libras">

                                <div class="row justify-content-md-center">

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="libras" id="libras">
                                                Confirmar que atende em libras
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" id="btn_save" class="btn btn-primary pull-right">Salvar</button>
                                <span class="help-block"></span>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Consulta com desconto de R$40,00</h4>
                            <p class="card-category">
                                Habilitando essa opção será concedido um desconto de R$40,00 aleatório distribuído pelo sistema.
                                Exemplo: se você atende por R$ 90,00, com o desconto aplicado pelo cliente você irá receber R$ 50,00.</p>
                        </div>
                        <div class="card-body">
                            <form id="form_desconto">
                                <div class="row justify-content-md-center">

                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="desconto" id="desconto" >
                                                Habilitar desconto de R$40,00
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Quantidade de consultas com desconto por mês:</label>
                                            <input type="number" name="desconto_mes" id="desconto_mes" class="form-control">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" id="btn_save" class="btn btn-primary pull-right">Salvar</button>
                                <span class="help-block"></span>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="link8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Aviso de férias</h4>
                            <p class="card-category">
                                Se marcado essa opção todos seus horários ficarão inativos, impossibilitando um possível agendamento de paciente.
                                Essa opção é geralmente utilizada quando o psicólogo vai sair de férias.
                                A sua assinatura no Psicologia Viva não será pausada as cobranças das mensalidades vão ocorrer da mesma forma.
                            </p>
                        </div>
                        <div class="card-body">
                            <form id="form_ferias">

                                <div class="row justify-content-md-center">

                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="ferias" name="ferias">
                                                Retirar agenda do perfil de forma temporária
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" id="btn_save" class="btn btn-primary pull-right">Salvar</button>
                                <span class="help-block"></span>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>