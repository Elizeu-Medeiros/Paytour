function uploadImg(input_file, img, input_path, pk_usuario) {

	src_before = img.attr("src");
	img_file = input_file[0].files[0];
	form_data = new FormData();

	form_data.append("image_file", img_file);
	form_data.append("pk_usuario", pk_usuario);

	$.ajax({
		url: BASE_URL + "restrict/ajax_import_image",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "POST",
		beforeSend: function() {
			clearErrors();
			input_path.siblings(".help-block").html(loadingImg("Carregando imagem..."));
		},
		success: function(response) {
			clearErrors();
			if (response["status"]) {
				img.attr("src", response["foto"]);
				input_path.val(response["foto"]);
			} else {
				img.attr("src", src_before);
				input_path.siblings(".help-block").html(response["error"]);
			}
		},
		error: function() {
			img.attr("src", src_before);
		}
	})
	return false;
}



