
$(function() {	
	
	$("#login_form").submit(function() {

		$.ajax({
			type: "post",
			url: BASE_URL + "administrator/Login/ajax_login",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#login100-form-btn").parent().siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(json) {
				if (json["status"] == 1) {
					clearErrors();
					$("#btn_login").parent().siblings(".help-block").html(loadingImg("Logando..."));
					window.location = BASE_URL + "administrator/Home";
				} else {
					showErrorsModal(json["error_list"]);
				}
			},
			error: function(response) {
				showErrorsModal(response["error_list"]);
			}
		})

		return false;
	})

})