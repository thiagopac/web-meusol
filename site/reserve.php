<!DOCTYPE html>
<html>
  <head>
    <title>Meu Sol - Fazenda Solar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/indent.css">
    <link rel="stylesheet" href="fonts/fi/flaticon.css">
    <link rel="stylesheet" href="rs-plugin/css/settings.css">
    <link rel="stylesheet" href="rs-plugin/css/layers.css">
    <link rel="stylesheet" href="rs-plugin/css/navigation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.10/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="img/favicon.ico/manifest.json">
  </head>
  <body>
    <!-- header page-->
    <header>
      <!-- Navigation panel-->
      <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
          <!-- Logo ( * your text or image into link tag *)-->
          <div class="nav-logo-wrap local-scroll"><a href="index.html" class="logo"><img src="img/logo-meusol.png" data-at2x="img/logo-meusol@2x.png" alt><img src="img/logo-meusol-sticky.png" data-at2x="img/logo-meusol-sticky@2x.png" alt class="sticky-logo"></a></div>
          <!-- Main Menu-->
          <div class="inner-nav desktop-nav">
            <ul class="clearlist">
              <!-- Item With Sub-->
              <li><a href="index#inicio" class="mn-has-sub">INÍCIO</a></li>
              <!-- End Item With Sub-->
              <!-- Item With Sub-->
              <li><a href="index#comofunciona" class="mn-has-sub">COMO FUNCIONA</a></li>
              <!-- End Item With Sub-->
              <!-- Item With Sub-->
              <li><a href="index#planos" class="mn-has-sub">PLANOS</i></a></li>
              <!-- End Item With Sub-->
              <!-- Item With Sub-->
              <li><a href="index#simulador" class="mn-has-sub">SIMULADOR</a></li>
              <!-- End Item With Sub-->
              <!-- Item With Sub-->
              <li><a href="../manager/" class="mn-has-sub">ÁREA DO CLIENTE</a></li>
              <!-- End Item With Sub-->
              <!-- Item-->
              <li><a href="./reserve"><div class="cws-button alt reserve">RESERVE AQUI</div></a></li>
              <!-- End Item-->
            </ul>
          </div>
          <!-- End Main Menu-->
        </div>
      </nav>
      <!-- End Navigation panel-->
    </header>
    <!-- ! header page-->
    <!-- page section about-->
    <section class="page-section pb-100 bg-gray bg-reserve" id="reserve">
      <div class="container">
        <!-- section title-->
        <h2 class="title-section mt-0 mb-0 text-center">Reserve aqui</h2>
        <!-- ! section title-->
        <div class="divider mt-20 mb-25"></div>
        <p class="mb-50 text-center">Faça sua reserva preenchendo os campos do formulário abaixo</p>
        <div class="row">
          <div class="col-md-12">
            <div class="widget-contact-form pb-0">
              <!-- contact-form-->
              <form id="form-booking" class="form alt clearfix" method="post">
                <div class="form-group col-md-6">
                  <label>CNPJ da Empresa</label>
                  <input id="booking_cnpj" type="text" name="booking_cnpj" value="" size="40" placeholder="Ex: 12.345.678/0001-00" aria-invalid="false" aria-required="true" width="400" class="form-row" style="width:100% !important;">
                </div>
                <div class="form-group col-md-6">
                  <label>N° da instalação ou Unidade consumidora</label>
                  <input id="booking_installation_consumer" type="text" name="booking_installation_consumer" value="" size="40" placeholder="Ex: 3000000000" aria-required="true" class="form-row" style="width:100% !important;">
                </div>
                <div class="form-group col-md-12">
                  <label>Empresa</label>
                  <input id="booking_company_name" type="text" name="booking_company_name" value="" size="100" placeholder="Nome da Empresa" aria-required="true" class="form-row" style="width:100% !important;">
                </div>
                <div class="form-group col-md-4">
                  <label>Subclasse</label> (Ver na conta de luz)
                  <select id="booking_subclass" name="booking_subclass" class="form-row input reserve-dropdown">
                    <option value="">Selecione…</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Modalidade tarifária</label> (Ver na conta de luz)
                  <select id="booking_tariff_modality" name="booking_tariff_modality" class="form-row input reserve-dropdown">
                    <option value="">Selecione…</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Plano escolhido</label>
                  <select id="booking_plan" name="booking_plan" class="form-row input reserve-dropdown">
                    <option value="">Selecione…</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label>Responsável pela reserva</label>
                  <input id="booking_responsible_name" type="text" name="booking_responsible_name" value="" size="40" placeholder="Nome completo" aria-required="true" class="form-row" style="width:100% !important;">
                </div>
                <div class="form-group col-md-12">
                  <label>E-mail do responsável</label>
                  <input id="booking_responsible_email" type="text" name="booking_responsible_email" value="" size="40" placeholder="seu@email.com" aria-required="true" class="form-row" style="width:100% !important;">
                </div>
                <div class="form-group col-md-12">
                  <label>Telefone de contato</label>
                  <input id="booking_responsible_phone" type="text" name="booking_responsible_phone" value="" size="40" placeholder="(✕✕)✕✕✕✕-✕✕✕✕" aria-required="true" class="form-row" style="width:100% !important;">
                </div>

                <input type="submit" value="Reservar" class="cws-button pull-right  ">
              </form>
              <!-- /contact-form-->
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- ! page section about-->

    <!-- footer-->
    <footer class="footer">
      <div class="container">
        <div class="row cws-multi-col">
          <div class="col-md-3 col-sm-6 mb-md-50">
            <div class="widget-footer text">

            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-md-50">
            <div class="widget-footer">

            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-sm-50">
            <div class="widget-footer">

            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget-footer">

            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <p>Copyright © 2018 - Meu Sol - Fazenda Solar</p>
            </div>
            <div class="col-sm-4 text-right"><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social flaticon-social-network106"></a></div>
          </div>
        </div>
      </div>
    </footer>
    <div id="scroll-top"><i class="fa fa-angle-up"></i></div>
    <!-- ! footer-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="../manager/js/utils.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.10/sweetalert2.min.js"></script>

  </body>
</html>
<script>
  $(document).ready(function(){

    $("#booking_cnpj").mask('00.000.000/0000-00', {reverse: true});

    var BASE_URL = null;

    if ((window.location.hostname) == "localhost") {
        BASE_URL = window.location.protocol + "//" + window.location.hostname + "/meusol/";
    }else{
        BASE_URL = window.location.protocol + "//" + window.location.hostname + "/";
    }

    $.ajax({
      url: BASE_URL+'api/subclass-tariffmodality-plan',
      type: 'GET',
      contentType: 'application/json',
      dataType:"json",
      async: true,
      success: function (result) {
        var response = result;

        // console.log(response);

        if(response["status"] == 1){

          subclasses = response["subclasses"];
          tariffModalities = response["tariffModalities"];
          plans = response["plans"];

          //simulator subclass
          $.each(subclasses, function() {
            $("#booking_subclass").append($("<option />").val(this.subclassId).text(this.subclassName));
          });

          $.each(tariffModalities, function() {
            $("#booking_tariff_modality").append($("<option />").val(this.tariffModalityId).text(this.tariffModalityName));
          });

          $.each(plans, function() {
            $("#booking_plan").append($("<option />").val(this.planId).text(this.planName));
          });

        }else if(response["status"] == 2){
          //status error
        }
      }, error: function (result) {
          //network error
      }
    });

    $("#form-booking").off().submit(function (event) {

        var valBookingCnpj = $("#booking_cnpj").val();
        var valBookingInstallationConsumer = $("#booking_installation_consumer").val();
        var valBookingCompanyName = $("#booking_company_name").val();
        var valBookingSubclassId = $("#booking_subclass").prop('selectedIndex');
        var valBookingTariffModalityId = $("#booking_tariff_modality").prop('selectedIndex');
        var valBookingPlanId = $("#booking_plan").prop('selectedIndex');
        var valBookingResponsibleName = $("#booking_responsible_name").val();
        var valBookingResponsibleEmail = $("#booking_responsible_email").val();
        var valBookingResponsiblePhone = $("#booking_responsible_phone").val();

        if (valBookingCnpj == "" || valBookingInstallationConsumer == "" || valBookingCompanyName == "" || valBookingSubclassId == "" || valBookingTariffModalityId == "" || valBookingPlanId == "" || valBookingResponsibleName == "" || valBookingResponsibleEmail == "" || valBookingResponsiblePhone == "") {
          swal({
             type: "error",
             title: "Atenção",
             text: "Preencha todos os campos do formulário para efetuar sua reserva",
             showConfirmButton: 1,
             timer: 0
         })

         return false;
        }

        if (validateCnpj(valBookingCnpj) == false) {

          swal({
             type: "error",
             title: "Atenção",
             text: "Este CNPJ não é válido. Verifique o valor informado e insira CNPJ corretamente.",
             showConfirmButton: 1,
             timer: 0
          })

          return false;
        }

        var cleanCnpj = cnpjToString(valBookingCnpj);

        $.ajax({
    			url: BASE_URL+'api/booking/create-booking',
    			type: 'POST',
    			contentType: 'application/json',
    			dataType:"json",
    			async: true,
    			data: JSON.stringify({cnpj: cleanCnpj,
                               installationConsumer: valBookingInstallationConsumer,
                               companyName: valBookingCompanyName,
                               subclassId: valBookingSubclassId,
                               tariffModalityId: valBookingTariffModalityId,
                               planId: valBookingPlanId,
                               responsibleName: valBookingResponsibleName,
                               responsibleEmail: valBookingResponsibleEmail,
                               responsiblePhone: valBookingResponsiblePhone}),
    			success: function (result) {
    				var response = result;

    				// console.log(response);

    				if(response["status"] == 1){

              swal({
                 type: response["feedbackStatus"],
                 title: response["feedbackTitle"],
                 text: response["feedbackMessage"],
                 showConfirmButton: 1,
                 timer: 0
             })


    				}else if(response["status"] == 2){

    				}
    			}, error: function (result) {

    			}
    	 });

      $('#form-simulator').trigger("reset");
      event.preventDefault();

    });


  });
</script>
