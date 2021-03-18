$(function() {

	//Lista todos os Usuários
	var lt_logradouro = $("#lt_logradouro").DataTable({
		
		"oLanguage": DATATABLE_PTBR,
		"autoWidth": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "membro/Logradouro/ajax_list_logradouro",
			"type": "POST",
		},
		"columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
			{
				//	'targets': [6], /* column index */
				'orderable': false, /* true or false */
			}
		],
		"drawCallback": function () {
			active_btn_logradouro();
		}
	})

	// Edita ou deleta usuários
	function active_btn_logradouro() {

		$(".btn-edit-logradouro").click(function () {
			$.ajax({
				type: "POST",
				url: BASE_URL + "membro/Logradouro/ajax_get_logradouro_data",
				dataType: "json",
				data: { "logradouro_id": $(this).attr("logradouro_id") },
				success: function (response) {
					clearErrors();
					$("#form_logradouro")[0].reset();
					$("#pk_nivel_acesso").val("");
					$.each(response["input"], function (id, value) {
						$("#" + id).val(value);
					});
					$("#foto").attr("src", response.img.foto);
					$("#modal_logradouro").modal();
				}
			})
		});

		$(".btn-del-logradouro").click(function () {

			logradouro_id = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja deletar esse usuário ?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtontext: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "membro/Lograouro/ajax_delete_logradouro_data",
						dataType: "json",
						data: { "logradouro_id": logradouro_id.attr("logradouro_id") },
						success: function (response) {
							swal("Sucesso!", "Ação executada com sucesso", "success");
							lt_logradouro.ajax.reload();
						}
					})
				}
			})

		});
	}

	// EXIBIR MODAIS
	$("#btn_add_logradouro").click(function () {
		clearErrors();

		//$("#form_logradouro")[0].reset();

		$("#modal_usuario").modal();

	});


	//enviar dados do form
	$("#form_logradouro").submit(function () {
		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Logradouro/ajax_save_logradouro",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_logradouro").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_logradouro").modal("hide");
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
					lt_logradouro.ajax.reload();
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
			url: BASE_URL + "membro/Logradouro/ajax_save_logradouro",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_logradouro").siblings(".help-block").html(loadingImg("Salvando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_usuario").modal("hide");
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
					lt_logradouro.ajax.reload();
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
			url: BASE_URL + "membro/Logradouro/ajax_save_minha_conta",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_logradouro").siblings(".help-block").html(loadingImg("Salvando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_usuario").modal("hide");
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
					lt_logradouro.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});



})