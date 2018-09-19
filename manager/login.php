<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Meu Sol - Fazenda Solar
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
    <!--begin::Base Styles -->
		<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="css/important.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="../site/img/favicon.ico/favicon.ico" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="#">
										<img src="assets/app/media/img/logos/logo.png" width="300">
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title" id="login-feedback"></h3>
									</div>
									<form class="m-login__form m-form" id="form_login">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="CNPJ" name="login_cnpj" id="login_cnpj">
											<div id="login_cnpj_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="E-mail" name="login_email" id="login_email">
											<div id="login_email_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Senha" name="login_password" id="login_password">
											<div id="login_password_error" class="form-control-feedback"></div>
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<a href="javascript:;" id="m_login_forget_password" class="m-m-link m-link--state m-link--primary">
													Esqueceu a senha?
												</a>
											</div>
											<div class="col m--align-right">
												<!-- <label class="m-checkbox m-checkbox--primary">
													<input type="checkbox" name="remember">
													Manter logado
													<span></span>
												</label> -->
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="login_button" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air">
												Login
											</button>
										</div>
									</form>
								</div>
								<div class="m-login__signup">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Novo usuário
										</h3>
										<div class="m-login__desc">
											Cadastrar novo acesso para empresa cliente
										</div>
									</div>
									<form class="m-login__form m-form" id="form_signup">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="CNPJ" name="signup_cnpj" id="signup_cnpj">
											<div id="signup_cnpj_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="N° da instalação ou Unidade consumidora" name="signup_installation_consumer" id="signup_installation_consumer">
											<div id="signup_installation_consumer_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="E-mail" name="signup_email" id="signup_email">
											<div id="signup_email_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="password" placeholder="Senha" name="signup_password" id="signup_password" autocomplete="off">
											<div id="signup_password_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirme a senha" name="signup_password_confirm" id="signup_password_confirm" autocomplete="off">
											<div id="signup_password_confirm_error" class="form-control-feedback"></div>
										</div>
										<div class="m-login__form-action">
											<button id="signup_button" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air">
												Cadastrar
											</button>
											<button id="m_login_signup_cancel" class="btn btn-outline-primary  m-btn m-btn--pill m-btn--custom">
												Cancelar
											</button>
										</div>
									</form>
								</div>
								<div class="m-login__forget-password">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Esqueceu a senha ?
										</h3>
										<div class="m-login__desc">
											Insira o CNPJ da empresa e seu e-mail para redefinir sua senha
										</div>
									</div>
									<form class="m-login__form m-form" id="form_forgot">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="CNPJ" name="forgot-cnpj" id="forgot_cnpj">
											<div id="forgot_cnpj_error" class="form-control-feedback"></div>
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="E-mail" name="forgot-email" id="forgot_email">
											<div id="forgot_email_error" class="form-control-feedback"></div>
										</div>
										<div class="m-login__form-action">
											<button id="forgot_button" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air">
												Redefinir
											</button>
											<button id="m_login_forget_password_cancel" class="btn btn-outline-primary m-btn m-btn--pill m-btn--custom">
												Cancelar
											</button>
										</div>
									</form>
								</div>
								<div class="m-stack__item m-stack__item--center">
									<div class="m-login__account">
										<span class="m-login__account-msg">
											Novo usuário?
										</span>
										&nbsp;&nbsp;
										<a href="javascript:;" id="m_login_signup" class="m-link m-link--primary m-login__account-link">
											Cadastrar
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content login-background">
					<div class="m-grid__item m-grid__item--middle">
						<h4 class="m-login__welcome welcome-label login-label">
							Conectando a energia ao mundo digital
						</h4>
						<p class="m-login__msg">
							Economize na conta de luz
							<br>
							Simples e sem custo
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
        <!--begin::Page Snippets -->
		<script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
		<script src="js/jquery.mask.js" type="text/javascript"></script>
		<script src="js/utils.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
<script>
  $(document).ready(function(){
		$("#login_cnpj").mask('00.000.000/0000-00', {reverse: true});
		$("#forgot_cnpj").mask('00.000.000/0000-00', {reverse: true});
		$("#signup_cnpj").mask('00.000.000/0000-00', {reverse: true});

		// --------------------------------------------------------------------------------
		//BASE URL

		var BASE_URL = null;

    if ((window.location.hostname) == "localhost") {
        BASE_URL = window.location.protocol + "//" + window.location.hostname + "/meusol/";
    }else{
        BASE_URL = window.location.protocol + "//" + window.location.hostname + "/";
    }

		$("#form_login").off().submit(function (event) {

        var valLoginCnpj = $("#login_cnpj").val();
        var valLoginEmail = $("#login_email").val();
        var valLoginPassword = $("#login_password").val();

				//tirando do CNPJ os caracteres especiais
				var cleanLoginCnpj = cnpjToString(valLoginCnpj);

        if (valLoginCnpj == "" || valLoginEmail == "" || valLoginPassword == "") {

					if (valLoginCnpj == "") {
						$("#login_cnpj_error").text("Preencha o CNPJ")
					}else{
						$("#login_cnpj_error").text("")
					}

					if (valLoginEmail == "") {
						$("#login_email_error").text("Preencha o e-mail")
					}else{
						$("#login_email_error").text("")
					}

					if (valLoginPassword == "") {
						$("#login_password_error").text("Preencha a senha")
					}else{
						$("#login_password_error").text("")
					}

         return false;
        }

        $.ajax({
    			url: BASE_URL+'api/manager/login',
    			type: 'POST',
    			contentType: 'application/json',
    			dataType:"json",
    			async: true,
    			data: JSON.stringify({companyCnpj: cleanLoginCnpj,
                               userEmail: valLoginEmail,
                               userPassword: valLoginPassword}),
    			success: function (result) {
    				var response = result;

    				// console.log(response);

    				if(response["status"] == 1){

							user = response["user"];
							sessionStorage.setItem("user",JSON.stringify(user));

              company = response["company"];
							sessionStorage.setItem("company",JSON.stringify(company));

							contract = response["contract"];
							sessionStorage.setItem("contract",JSON.stringify(contract));

            	location.href = "./main?page=panel";

    				}else if(response["status"] == 2){
							toastr.options = { "positionClass": "toast-top-left" }
							toastr[response["feedbackStatus"]](response["feedbackMessage"]);
    				}
    			}, error: function (result) {
						toastr.options = { "positionClass": "toast-top-left" }
						toastr[response["feedbackStatus"]](response["feedbackMessage"]);
    			}
    	 });

      $('#form_login').trigger("reset");
      event.preventDefault();

    });

		$("#form_forgot").off().submit(function (event) {

        var valForgotCnpj = $("#forgot_cnpj").val();
        var valForgotEmail = $("#forgot_email").val();

				//tirando do CNPJ os caracteres especiais
				var cleanForgotCnpj = cnpjToString(valForgotCnpj);

        if (valForgotCnpj == "" || valForgotEmail == "") {

					if (valForgotCnpj == "") {
						$("#forgot_cnpj_error").text("Preencha o CNPJ")
					}else{
						$("#forgot_cnpj_error").text("")
					}

					if (valForgotEmail == "") {
						$("#forgot_email_error").text("Preencha o e-mail")
					}else{
						$("#forgot_email_error").text("")
					}

         return false;
        }

        $.ajax({
    			url: BASE_URL+'api/manager/forgot-password',
    			type: 'POST',
    			contentType: 'application/json',
    			dataType:"json",
    			async: true,
    			data: JSON.stringify({companyCnpj: cleanForgotCnpj,
                               userEmail: valForgotEmail}),
    			success: function (result) {
    				var response = result;

    				// console.log(response);

    				if(response["status"] == 1){
							toastr.options = { "positionClass": "toast-top-left" };
							toastr[response["feedbackStatus"]](response["feedbackMessage"]);

    				}else if(response["status"] == 2){
							toastr.options = { "positionClass": "toast-top-left" };
							toastr[response["feedbackStatus"]](response["feedbackMessage"]);
    				}
    			}, error: function (result) {
						toastr.options = { "positionClass": "toast-top-left" };
						toastr.error("Erro no servidor. Tente novamente mais tarde.");
    			}
    	 });

      $('#form_forgot').trigger("reset");
      event.preventDefault();

    });

		$("#form_signup").off().submit(function (event) {

        var valSignupCnpj = $("#signup_cnpj").val();
				var valSignupInstallationConsumer = $("#signup_installation_consumer").val();
        var valSignupEmail = $("#signup_email").val();
				var valSignupPassword = $("#signup_password").val();
				var valSignupPasswordConfirm = $("#signup_password_confirm").val();

				//tirando do CNPJ os caracteres especiais
				var cleanSignupCnpj = cnpjToString(valSignupCnpj);

        if (valSignupCnpj == "" || valSignupInstallationConsumer == "" || valSignupEmail == "" || valSignupPassword == "" || valSignupPasswordConfirm == "") {

					if (valSignupCnpj == "") {
						$("#signup_cnpj_error").text("Preencha o CNPJ")
					}else{
						$("#signup_cnpj_error").text("")
					}

					if (valSignupInstallationConsumer == "") {
						$("#signup_installation_consumer_error").text("Preencha o N° da instalação ou Unidade consumidora")
					}else{
						$("#signup_installation_consumer_error").text("")
					}

					if (valSignupEmail == "") {
						$("#signup_email_error").text("Preencha o e-mail")
					}else{
						$("#signup_email_error").text("")
					}

					if (valSignupPassword == "") {
						$("#signup_password_error").text("Preencha o campo senha")
					}else{
						$("#signup_password_error").text("")
					}

					if (valSignupPasswordConfirm == "") {
						$("#signup_password_confirm_error").text("Preencha o campo confirmação de senha")
					}else{
						$("#signup_password_confirm_error").text("")
					}

         return false;
        }

				if (valSignupPassword != valSignupPasswordConfirm) {
					$("#signup_password_error").text("Defina uma senha")
					$("#signup_password_confirm_error").text("A confirmação de senha deve ser igual ao campo de senha")

					return false;
				}

        $.ajax({
    			url: BASE_URL+'api/manager/create-user',
    			type: 'POST',
    			contentType: 'application/json',
    			dataType:"json",
    			async: true,
    			data: JSON.stringify({companyCnpj: cleanSignupCnpj,
															 companyInstallationConsumer : valSignupInstallationConsumer,
                               userEmail: valSignupEmail,
														 	 userPassword : valSignupPassword}),
    			success: function (result) {
    				var response = result;

    				// console.log(response);

    				if(response["status"] == 1){
							toastr.options = { "positionClass": "toast-top-left" };
							toastr[response["feedbackStatus"]](response["feedbackMessage"]);

    				}else if(response["status"] == 2){
							toastr.options = { "positionClass": "toast-top-left" };
							toastr[response["feedbackStatus"]](response["feedbackMessage"]);
    				}
    			}, error: function (result) {
						toastr.options = { "positionClass": "toast-top-left" };
						toastr.error("Erro no servidor. Tente novamente mais tarde.");
    			}
    	 });

      $('#form_signup').trigger("reset");
      event.preventDefault();

    });

	});
</script>
