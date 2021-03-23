$(document).ready(function () {

	$('#cep').mask('00000000');
	$('#data_nasc').mask('00/00/0000');
	$('#celular').mask('(00)00000-0000');
	$('#telefone').mask('(00)0000-0000');
	$('#cpf').mask('000.000.000-00');


	if ($('#uf').val() != "") {
		$('#cidade').prop('readonly', false);
	} else {
		$('#cidade').prop('readonly', false);
	}

	if ($('#cidade').val() != "") {
		$('#cidade').prop('readonly', false);
	} else {
		$('#cidade').prop('readonly', true);
	}

	if ($('#cep').val() != "") {
		$('#cep').prop('readonly', false);
	} else {
		$('#cep').prop('readonly', true);
	}

	if ($('#bairro').val() != "") {
		$('#bairro').prop('readonly', false);
	} else {
		$('#bairro').prop('readonly', true);
	}

	$("#uf").change(function () {

		if ($('#uf').val() !== "") {
			$('#cidade').prop('readonly', false);
		} else {
			$('#cidade').prop('readonly', true);
		}
	})



	$("#cidade").change(function () {

		if ($('#cidade').val() !== "") {
			$('#cep').prop('readonly', false);
			$('#bairro').prop('readonly', false);
		} else {
			$('#cep').prop('readonly', true);
			$('#bairro').prop('readonly', true);
		}
	})

	//Carregar minhas conta
	$.ajax({
		type: "POST",
		url: BASE_URL + "Usuarios/ajax_minha_conta",
		dataType: "json",
		//	data: { "user_id": $(this).attr("user_id") },
		success: function (response) {
			clearErrors();
			$("#meu_perfil")[0].reset();
			$.each(response["input"], function (id, value) {
				$("#" + id).val(value);
				if (value) {
					$("#" + id).parent().addClass("is-filled");
				}
			});
			$("#sexo").selectpicker("refresh");
			$("#estado_civil").selectpicker("refresh");
			$("#uf").selectpicker("refresh");

		//	$("#foto").attr("src", response.img.foto);
			//$("#modal_user").modal();
		}
	})



	$("#btn_upload_usuario_photo").change(function () {

		uploadImg($(this), $("#foto"), $("#foto_id"), $("#pk_usuario").val());

	});


	$("#dataPicker").val('default');
	$("#dataPicker").selectpicker("refresh");




	// EXIBIR MODAIS
	$("#btn_add_user").click(function () {
		clearErrors();

		//$("#form_user")[0].reset();

		$("#modal_usuario").modal();

	});


	//enviar dados do form
	$("#form_user").submit(function () {
		
		$.ajax({
			type: "POST",
			url: BASE_URL + "administrator/Usuarios/ajax_save_user",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_user").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_user").modal("hide");
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
					lt_user.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}

				if (response["alert"] != 0) {
					swal("Atenção!"
						, "Você não tem permissão para salvar usuário nesse nível!"
						, "warning");
				}

			}
		})

		return false;
	});

	//enviar dados do form
	$("#form_usuario").submit(function () {
		$.ajax({
			type: "POST",
			url: BASE_URL + "administrator/Usuarios/ajax_save_user",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_user").siblings(".help-block").html(loadingImg("Salvando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_usuario").modal("hide");
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
					lt_user.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});

	//enviar dados do form
	$("#meu_perfil").submit(function () {
		$.ajax({
			type: "POST",
			url: BASE_URL + "Usuarios/ajax_save_minha_conta",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_user").siblings(".help-block").html(loadingImg("Salvando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					$("#pk_pessoa").val(response["pk_pessoa"]);
					$("#pk_endereco").val(response["pk_endereco"]);
					//recarregar select picker
					$("#dataPicker").val('default');
					$("#dataPicker").selectpicker("refresh");

					swal("Sucesso!", "Dados salvo com sucesso!", "success");
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});



})