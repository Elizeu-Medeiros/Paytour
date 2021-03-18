

$(function () {

	$("#btn_upload_usuario_photo").change(function () {

		uploadImg($(this), $("#foto"), $("#foto_id"), $("#pk_usuario").val());

	});




	// Edita ou deleta usuários
	function active_btn_user() {

		$(".btn-edit-user").click(function () {
			$.ajax({
				type: "POST",
				url: BASE_URL + "administrator/Usuarios/ajax_get_user_data",
				dataType: "json",
				data: { "user_id": $(this).attr("user_id") },
				success: function (response) {
					clearErrors();
					$("#form_user")[0].reset();
					$("#pk_nivel_acesso").val("");
					$.each(response["input"], function (id, value) {
						$("#" + id).val(value);
					});
					$("#foto").attr("src", response.img.foto);
					$("#modal_user").modal();
				}
			})
		});

		$(".btn-del-user").click(function () {

			user_id = $(this);
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
						url: BASE_URL + "administrator/Usuarios/ajax_delete_user_data",
						dataType: "json",
						data: { "user_id": user_id.attr("user_id") },
						success: function (response) {
							swal("Sucesso!", "Ação executada com sucesso", "success");
							lt_user.ajax.reload();
						}
					})
				}
			})

		});
	}

	// EXIBIR MODAIS
	$("#btn_add_user").click(function () {
		clearErrors();

		//$("#form_user")[0].reset();

		$("#modal_usuario").modal();

	});


	//enviar dados do form
	$("#form_conta").submit(function () {
		$.ajax({
			type: "POST",
			url: BASE_URL + "membro/Usuarios/ajax_save_user",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_salvar_conta").siblings(".help-block").html(loadingImg("Salvando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
				} else {
					showErrorsModal(response["error_list"]);
					swal("Here's a message!");

				}
			}
		})

		return false;
	});


})