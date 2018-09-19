<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <!-- BEGIN: Subheader -->
   <div class="m-subheader ">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
               Indique clientes
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
               <li class="m-nav__item">
                  <a href="" class="m-nav__link">
                  <span class="m-nav__link-text">
                  Indicação de novas empresas
                  </span>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- END: Subheader -->
   <div class="m-content">

     <div class="row">
       <div class="col-md-12 col-lg-12">
         <div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Dados da empresa à indicar
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" id="form_create_registry">
										<div class="m-portlet__body">
                      <div class="form-group m-form__group m--margin-top-10">
                        <!-- <label for="">O programa de indicações premia com 2% de desconto somado ao seu desconto do plano, para cada cliente indicado, com o máximo de 3 indicações por período.</label> -->
												<div class="alert m-alert m-alert--default" role="alert">
													Seu código de referência para indicações é
													<code id="label_company_refferal_code">
												</code>
											</div>
										</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-3 col-form-label">
													Nome da empresa:
												</label>
												<div class="col-lg-6">
                          <div class="input-group input-group-md m-input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="la la-font"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control m-input" placeholder="Nome da empresa" id="company_receiver_name">
                          </div>
													<span class="m-form__help">
														Insira o nome da empresa que deseja indicar como cliente
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-3 col-form-label">
													E-mail do destinatário:
												</label>
												<div class="col-lg-6">
                          <div class="input-group input-group-md m-input-group">
    												<div class="input-group-prepend">
    													<span class="input-group-text" id="basic-addon1">
    														<i class="la la-at"></i>
    													</span>
    												</div>
    												<input type="text" class="form-control m-input" placeholder="E-mail do destinatário" id="company_receiver_email">
    											</div>
													<span class="m-form__help">
														Digite um e-mail válido para a indicação
													</span>
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-12">
														<button type="submit" class="btn btn-primary pull-right">
															Enviar convite
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
       </div>
     </div>

     <div class="row">
       <div class="col-md-12 col-lg-12">
         <div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Convites enviados
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<!--begin::Section-->
										<div class="m-section">
											<div class="m-section__content">
												<!--begin::Preview-->
												<div class="m-demo">
													<div class="m-demo__preview">
														<div class="m-list-timeline">
															<div class="m-list-timeline__items" id="div_referral_registries">
                                <!-- lista dinâmica de empresas convidadas -->
															</div>
														</div>
													</div>
												</div>
												<!--end::Preview-->
											</div>
										</div>
										<!--end::Section-->
									</div>
								</div>
       </div>
     </div>

   </div>
</div>
<script>
   $(document).ready(function() {

     // --------------------------------------------------------------------------------
     //BASE URL

     var BASE_URL = null;

      if ((window.location.hostname) == "localhost") {
          BASE_URL = window.location.protocol + "//" + window.location.hostname + "/meusol/";
      }else{
          BASE_URL = window.location.protocol + "//" + window.location.hostname + "/";
      }

     if(sessionStorage.getItem("user")){
        var user = JSON.parse(sessionStorage.getItem("user"));
     }

     if(sessionStorage.getItem("company")){
        var company = JSON.parse(sessionStorage.getItem("company"));
     }

     if(sessionStorage.getItem("contract")){
        var contract = JSON.parse(sessionStorage.getItem("contract"));
     }

     $("#label_company_refferal_code").text(company.companyReferralCode);

     retrieveReferralRegistries();

     function retrieveReferralRegistries(){

       $.ajax({
         url: BASE_URL+'api/referral/retrieve-referral-registries/'+company.companyId,
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_referral_registries").empty();

             if (response["referralRegistries"].length > 0) {

               $.each(response["referralRegistries"], function(i, referralRegistry){

                 $("#div_referral_registries").append('<div class="m-list-timeline__item"><span class="m-list-timeline__badge"></span><span class="m-list-timeline__text"><strong>'+referralRegistry.referralRegistryCompanyName+'</strong> <mark> <small>('+referralRegistry.referralRegistryEmail+')</small> </mark></span><span class="m-list-timeline__time">'+convertDateYMDtoDMY(referralRegistry.referralRegistryDate)+'</span></div>');
               });

             }else{
               $("#div_referral_registries").append('<div class="m-list-timeline__item"><span class="m-list-timeline__badge"></span><span class="m-list-timeline__text"> Você ainda não enviou nenhum convite</span><span class="m-list-timeline__time"></span></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_registry").off().submit(function (event) {

         var valCompanyReceiverName = $("#company_receiver_name").val();
         var valCompanyReceiverEmail = $("#company_receiver_email").val();

         if (valCompanyReceiverName == "" || valCompanyReceiverEmail == "") {

 					if (valCompanyReceiverName == "") {
 						toastr.error("Insira o nome da empresa");
 					}

 					if (valCompanyReceiverEmail == "") {
 						toastr.error("Insira o e-mail do destinatário");
 					}

          return false;
         }

         $.ajax({
     			url: BASE_URL+'api/referral/create-registry',
     			type: 'POST',
     			contentType: 'application/json',
     			dataType:"json",
     			async: true,
     			data: JSON.stringify({companyReceiverName: valCompanyReceiverName,
                                companyReceiverEmail: valCompanyReceiverEmail,
                                companySenderName: company.companyName,
                                companySenderId: company.companyId,
                                companySenderReferralCode: company.companyReferralCode}),
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

              retrieveReferralRegistries();

     				}else if(response["status"] == 2){

              swal({
                 type: response["feedbackStatus"],
                 title: response["feedbackTitle"],
                 text: response["feedbackMessage"],
                 showConfirmButton: 1,
                 timer: 0
              })

     				}
     			}, error: function (result) {
 						toastr.error("Erro no servidor. Tente novamente mais tarde.");
     			}
     	 });

       $('#form_create_registry').trigger("reset");
       event.preventDefault();

     });


  });
</script>
