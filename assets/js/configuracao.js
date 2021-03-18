$(document).ready(function () {

	$('#cep').mask('00000000');
	$('#data_nasc').mask('00/00/0000');
	$('#celular').mask('(00)00000-0000');
	$('#telefone').mask('(00)0000-0000');
	$('#valor_consulta_online').mask('#.##0,00', { reverse: true });
	$('#valor_consulta_presencial').mask('#.##0,00', { reverse: true });

	var carregar = $.ajax({
		type: "POST",
		url: BASE_URL + "membro/Configuracao/ajax_get_configuracao",
		dataType: "json",
		success: function (response) {
			clearErrors();
			$("#form_dados")[0].reset();
			$("#pk_configuracao").val("");
			$.each(response["input"], function (id, value) {
				$("#" + id).val(value);
				if (value) {
					$("#" + id).parent().addClass("is-filled");
				}
			});

			$.each(response["checkbox"], function (id, value) {
				if (value == 1) {
					$('#' + id).prop('checked', true);
				}
			});

			$("#tmp_consulta").selectpicker("refresh");
			$("#tmp_antecedencia").selectpicker("refresh");
			$("#cod_banco").selectpicker("refresh");
			$("#tipo_conta").selectpicker("refresh");
			$("#tmp_cortesia").selectpicker("refresh");
		}
	})

	//enviar dados do form
	$("#form_dados").on('submit', function (e) {
		e.preventDefault();

		var dados = new FormData(this);
		dados.append("pk_configuracao", $("#pk_configuracao").val());

		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Configuracao/ajax_dados",
			dataType: "json",
			data: dados,
			processData: false,
			cache: false,
			contentType: false,
			beforeSend: function () {
				clearErrors();
				$("#btn_save").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					if (response["banco"] == 2) {
						swal("Sucesso!", "Dados atualizado com sucesso!", "success");
					} else {
						swal("Sucesso!", "Dados salvo com sucesso!", "success");
						$("#pk_configuracao").val(response["pk_configuracao"]);
					}
				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});

	//enviar conta do form
	$("#form_conta").on('submit', function (e) {
		e.preventDefault();

		var dados = new FormData(this);
		dados.append("pk_configuracao", $("#pk_configuracao").val());

		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Configuracao/ajax_conta",
			dataType: "json",
			data: dados,
			processData: false,
			cache: false,
			contentType: false,
			beforeSend: function () {
				clearErrors();
				$("#btn_save").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();

				if (response["status"]) {
					if (response["banco"] == 2) {
						swal("Sucesso!", "Dados atualizado com sucesso!", "success");
					} else {
						swal("Sucesso!", "Dados salvo com sucesso!", "success");
						$("#pk_configuracao").val(response["pk_configuracao"]);
					}

				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});

	//enviar conta do form
	$("#form_cortesia").on('submit', function (e) {
		e.preventDefault();

		var arr = [];
		$("input:checkbox[name=corteisa]:checked").each(function () {
			arr.push($(this).val());
		});

		console.log(arr);

		var dados = new FormData(this);
		dados.append("pk_configuracao", $("#pk_configuracao").val());

		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Configuracao/ajax_cortesia",
			dataType: "json",
			data: dados,
			processData: false,
			cache: false,
			contentType: false,
			beforeSend: function () {
				clearErrors();
				$("#btn_save").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();

				if (response["status"]) {
					if (response["banco"] == 2) {
						swal("Sucesso!", "Dados atualizado com sucesso!", "success");
					} else {
						swal("Sucesso!", "Dados salvo com sucesso!", "success");
						$("#pk_configuracao").val(response["pk_configuracao"]);
					}

				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});

	//enviar conta do form
	$("#form_libras").on('submit', function (e) {
		e.preventDefault();

		var arr = [];
		$("input:checkbox[name=libras]:checked").each(function () {
			arr.push($(this).val());
		});

		console.log(arr);

		var dados = new FormData(this);
		dados.append("pk_configuracao", $("#pk_configuracao").val());

		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Configuracao/ajax_libras",
			dataType: "json",
			data: dados,
			processData: false,
			cache: false,
			contentType: false,
			beforeSend: function () {
				clearErrors();
				$("#btn_save").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();

				if (response["status"]) {
					if (response["banco"] == 2) {
						swal("Sucesso!", "Dados atualizado com sucesso!", "success");
					} else {
						swal("Sucesso!", "Dados salvo com sucesso!", "success");
						$("#pk_configuracao").val(response["pk_configuracao"]);
					}

				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});

	//enviar conta do form
	$("#form_desconto").on('submit', function (e) {
		e.preventDefault();

		var arr = [];
		$("input:checkbox[name=desconto]:checked").each(function () {
			arr.push($(this).val());
		});

		console.log(arr);

		var dados = new FormData(this);
		dados.append("pk_configuracao", $("#pk_configuracao").val());

		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Configuracao/ajax_desconto",
			dataType: "json",
			data: dados,
			processData: false,
			cache: false,
			contentType: false,
			beforeSend: function () {
				clearErrors();
				$("#btn_save").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();

				if (response["status"]) {
					if (response["banco"] == 2) {
						swal("Sucesso!", "Dados atualizado com sucesso!", "success");
					} else {
						swal("Sucesso!", "Dados salvo com sucesso!", "success");
						$("#pk_configuracao").val(response["pk_configuracao"]);
					}

				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});

	//Ferias
	$("#form_ferias").on('submit', function (e) {
		e.preventDefault();

		var arr = [];
		$("input:checkbox[name=ferias]:checked").each(function () {
			arr.push($(this).val());
		});

		var dados = new FormData(this);
		dados.append("pk_configuracao", $("#pk_configuracao").val());

		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Configuracao/ajax_ferias",
			dataType: "json",
			data: dados,
			processData: false,
			cache: false,
			contentType: false,
			beforeSend: function () {
				clearErrors();
				$("#btn_save").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();

				if (response["status"]) {
					if (response["banco"] == 2) {
						swal("Sucesso!", "Dados atualizado com sucesso!", "success");
					} else {
						swal("Sucesso!", "Dados salvo com sucesso!", "success");
						$("#pk_configuracao").val(response["pk_configuracao"]);
					}

				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});




})