$(function() {

	$("#login_form").submit(function() {
		$.ajax({
			type: "post",
			url: BASE_URL + "login-ajax",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_login").parent().siblings(".help-block").html(loadingImg("Verificando..."));
			},
		})
		.done(function(json){
			if (json["status"] == 1) {
				clearErrors();
				$("#btn_login").parent().siblings(".help-block").html(loadingImg("Entrando..."));
				window.location = BASE_URL;
			} else {
				showErrors(json["error_list"]);
			}
		})
		.fail(function(json){
			console.log(json);
		})

		return false;
	})

})