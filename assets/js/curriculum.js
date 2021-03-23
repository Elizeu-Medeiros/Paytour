$(document).ready(function () {



	$('#telefone').mask('(00)0000-0000');

	//Carregar meus dados
	$.ajax({
		type: "POST",
		url: BASE_URL + "Curriculum/pessoaCurriculum",
		dataType: "json",
		success: function (response) {
			clearErrors();
			$("#form_dados")[0].reset();

			$.each(response["input"], function (id, value) {
				$("#" + id).val(value);
				if (value) {
					$("#" + id).parent().addClass("is-filled");
				}
			});

			if (response["div"].preview) {
				$(".fileinput").removeClass("fileinput-new");
				$(".fileinput").addClass("fileinput-exists");

				$(".thumbnail").html(response["div"].preview);
			} else {
				$(".fileinput").removeClass("fileinput-exists");
				$(".fileinput").addClass("fileinput-new");

				$(".thumbnail").html();
			}

			$("#escolaridade").selectpicker("refresh");
		}
	})

	//enviar dados do form
	$("#form_dados").submit(function () {

		$.ajax({
			type: "POST",
			url: BASE_URL + "Curriculum/ajax_save_dados",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_save_user").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if (response["status"]) {

					swal("Sucesso!", "Usuário salvo com sucesso!", "success");

				} else {
					showErrorsModal(response["error_list"])
				}

			}
		})

		return false;
	});


	$("#form_doc").submit(function (e) {
		e.preventDefault();
		var formData = new FormData(this);
		formData.append('pk_pessoa', $("#pk_pessoa").val());

		$.ajax({
			url: BASE_URL + "Curriculum/ajax_enviar_doc",
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (response) {
				clearErrors();
				$("form_doc")[0].reset();

				if (response["status"]) {
					swal("Sucesso!", "Usuário salvo com sucesso!", "success");
				} else {
					showErrorsModal(response["error_list"])
				}

			}
		});

		return false;
	});

	$("#remover").click(function () {

		var formData = new FormData();
		formData.append('pk_pessoa', $("#pk_pessoa").val());

		$.ajax({
			url: BASE_URL + "Curriculum/ajax_remover_doc",
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (response) {
				clearErrors();
				$("form_doc")[0].reset();

				if (response["status"]) {
					swal("Sucesso!", "Curriculum removido com sucesso!", "success");
				} else {
					showErrorsModal(response["error_list"])
				}

			}

		});

	});




	$("#dataPicker").val('default');
	$("#dataPicker").selectpicker("refresh");


})