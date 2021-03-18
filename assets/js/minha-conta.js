$(function () {

	//enviar dados do form
	$("#form_minhaconta").submit(function () {
		$.ajax({
			type: "POST",
			url: BASE_URL + "administrator/Usuarios/ajax_save_minha_conta",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_user").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					swal("Sucesso!", "Dados salvo com sucesso!", "success");
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});


})