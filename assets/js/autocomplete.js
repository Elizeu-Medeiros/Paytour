$(document).ready(function () {


    if ($('#uf').val() != "") {
		$('#cidade').prop('readonly', false);
	} else {
		$('#cidade').prop('readonly', false);
	}

    $("#uf").change(function () {

		if ($('#uf').val() !== "") {
			$('#cidade').prop('readonly', false);
		} else {
			$('#cidade').prop('readonly', true);
		}
	})
    
    //Cidade Endereço
    $('#cep').autocomplete({
        autoFocus: true,
        source: function (request, response) {
            $.ajax({
                url: BASE_URL + "Autocomplete/cep",
                //contentType: 'application/json; charset=utf-8;',
                dataType: "json",
                data: {
                    term: request.term,
                    cidade_id: $("#cidade_id").val()
                },
                beforeSend: function () {
                    $("#cep").siblings(".help-block").html(loadingImg("Procurando..."));
                },
                // quando completar faça isso
                complete: function () {
                    clearErrors();
                },
                // se ouver erro faça isso
                error: function () {
                    $("#cep").siblings(".help-block").html(loadingImg("cep não encontrada."));
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            $("#logradouro_id").val(ui.item.id_logradouro);
            $("#endereco").val(ui.item.descricao);
            $("#endereco").parent().parent().addClass("is-filled");
            $("#bairro").val(ui.item.descricao_bairro);
            $("#bairro").parent().parent().addClass("is-filled");
        }
    });

    //Cidade Endereço
    $('#cidade').autocomplete({
        autoFocus: true,
        source: function (request, response) {
            $.ajax({
                url: BASE_URL + "Autocomplete/cidade",
                //contentType: 'application/json; charset=utf-8;',
                dataType: "json",
                data: {
                    term: request.term,
                    uf: $("#uf").val()
                },
                beforeSend: function () {
                    $("#cidade").siblings(".help-block").html(loadingImg("Procurando..."));
                },
                // quando completar faça isso
                complete: function () {
                    clearErrors();
                },
                // se ouver erro faça isso
                error: function () {
                    $("#bairro").siblings(".help-block").html(loadingImg("Cidade não encontrada."));
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            $("#cidade_id").val(ui.item.id_cidade);
        }
    });

    //Bairro Endereço
    $('#bairro').autocomplete({
        autoFocus: true,
        source: function (request, response) {
            $.ajax({
                url: BASE_URL + "Autocomplete/bairro",
                //contentType: 'application/json; charset=utf-8;',
                dataType: "json",
                data: {
                    term: request.term,
                    cidade_id: $("#cidade_id").val()
                },
                beforeSend: function () {
                    $("#bairro").siblings(".help-block").html(loadingImg("Procurando..."));
                },
                // quando completar faça isso
                complete: function () {
                    clearErrors();
                },
                // se ouver erro faça isso
                error: function () {
                    $("#bairro").siblings(".help-block").html(loadingImg("Bairro não encontrado."));
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            $("#logradouro_id").val(ui.item.id_logradouro);
        }
    });


    //Bairro Endereço
    $('#logradouro').autocomplete({
        autoFocus: true,
        source: function (request, response) {
            $.ajax({
                url: BASE_URL + "autocomplete/logradouro",
                //contentType: 'application/json; charset=utf-8;',
                dataType: "json",
                data: {
                    term: request.term,
                    bairro_id: $('#bairro_id').val()
                },
                beforeSend: function () {
                    $("#logradouro_id").val('');
                },
                // quando completar faça isso
                complete: function () {
                    $('#carregando').show();
                },
                // se ouver erro faça isso
                error: function () {
                    $("#logradouro").val();
                    $("#logradouro_id").val();
                },
                success: function (data) {
                    $('#carregando').hide();
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            $("#logradouro_id").val(ui.item.CD_LOGRADOURO);
            $("#logradouro").val(ui.item.DS_LOGRADOURO);
            $("#cep").val(ui.item.cep);
        }
    });

    //Autocomplete Programa
    /*
    $("#fk_programa").change(function () {
        $.ajax({
            url: BASE_URL + "AutoComplete/autoProgramaId",
            dataType: "json",
            data: {
                id: $("#fk_programa").val()
            },
            beforeSend: function () {
                clearErrors();
                $("#fk_tematica").siblings(".help-block").html(loadingImg("Verificando..."));
                $("#fk_aspecto").siblings(".help-block").html(loadingImg("Verificando..."));
            },
            success: function (data) {
                clearErrors();
                $("#fk_aspecto").val(data[0].fk_aspecto);
                $("#fk_tematica").val(data[0].fk_tematica);
            }
        });
    })

    //Autocomplete Projeto
    $("#fk_projetos").change(function () {
        $.ajax({
            url: BASE_URL + "AutoComplete/autoProjetoId",
            dataType: "json",
            data: {
                id: $("#fk_projetos").val()
            },
            beforeSend: function () {
                clearErrors();
                $("#fk_tematica").siblings(".help-block").html(loadingImg("Verificando..."));
                $("#fk_aspecto").siblings(".help-block").html(loadingImg("Verificando..."));
            },
            success: function (data) {
                clearErrors();
                $("#fk_aspecto").val(data[0].fk_aspecto);
                $("#fk_tematica").val(data[0].fk_tematica);
            }
        });
    })
    */

    //Autocomplete Projeto
    $("#fk_tematica").change(function () {
        $("#cod_tematica").val($(this).val());
        $.ajax({
            url: BASE_URL + "AutoComplete/tematicaAspecto",
            dataType: "json",
            data: { id: $(this).val() },
            beforeSend: function () {
                clearErrors();
                $("#fk_tematica").siblings(".help-block").html(loadingImg("Verificando..."));
                $("#fk_aspecto").siblings(".help-block").html(loadingImg("Verificando..."));
            },
            success: function (data) {
                clearErrors();
                $("#fk_aspecto").html("");
                $("#cod_aspecto").val("");
                $("#fk_aspecto").prop("disabled", true);
                $("#fk_aspecto").append('<option value="">SELECIONE</option>');
                $.each(data, function () {
                    if (this.aspecto != null) {
                        $("#fk_aspecto").prop("disabled", false);
                        $("#fk_aspecto").append('<option value="' + this.pk_aspecto + '">' + this.aspecto + '</option>');
                    }
                })
            }
        });
    })

    $("#fk_aspecto").change(function () {
        $("#cod_aspecto").val($(this).val());
    })

    //Bairro Endereço
    $('#dados').autocomplete({
        autoFocus: true,
        source: function (request, response) {
            $.ajax({
                url: BASE_URL + "AutoComplete/dados",
                //contentType: 'application/json; charset=utf-8;',
                dataType: "json",
                data: {
                    term: request.term
                },
                beforeSend: function () {
                    clearErrors();
                    $("#dados").siblings(".help-block").html(loadingImg("Verificando..."));
                },
                // se ouver erro faça isso
                error: function () {
                    clearErrors();
                    $("#dados").siblings(".help-block").html(loadingImg("Erro na consulta SQL."));
                },
                success: function (data) {
                    clearErrors();
                    response(data);
                }
            });
        },
        minLength: 1,
        select: function (event, ui) {
            swal({
                title: "Atenção!",
                text: "Qualquer alteração nesse dado terá efeito nos indicadores que usam o mesmo!",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Estou ciente!",
                //closeOnConfirm: false
            });
            $("#pk_dados").val(ui.item.pk_dados);
            $("#fk_indicador_dados").val(ui.item.fk_indicador);
            $("#tipo_dado").val(ui.item.tipo_dado);
            $("#descricao_dados").val(ui.item.descricao);
            $("#fk_unidade_medida").val(ui.item.fk_unidade_medida);
            $("#status").val(ui.item.status);
            $("#data_inatividade").val(ui.item.data_inatividade);
            $("#autor_manutencao").val(ui.item.autor_manutencao);
            $("#data_atualizacao").val(ui.item.data_atualizacao);
            $("#observacao").val(ui.item.observacao);
        }
    });


})

