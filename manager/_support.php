<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <!-- BEGIN: Subheader -->
   <div class="m-subheader ">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
               Suporte
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
               <li class="m-nav__item">
                  <a href="" class="m-nav__link">
                  <span class="m-nav__link-text">
                  Problemas ou dúvidas
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
													Novo chamado de suporte
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" id="form_create_support">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label class="col-lg-3 col-form-label">
													Área de suporte:
												</label>
												<div class="col-lg-6">
                          <div class="input-group input-group-md m-input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="la la-sitemap"></i>
                              </span>
                            </div>
                            <select class="form-control m-input m-input--square" id="support_subject_select">
                              <option value="" data-description="" data-icon="la la-info-circle">Selecione...</option>
    											</select>
                          </div>
													<span class="m-form__help">
                            <label>
                              <i class="text-metal" id="icon_support_subject_description"></i>
														<span class="text-metal" id="label_support_subject_description" style="vertical-align:top"></span>
													</label>
													</span>
												</div>
											</div>
                      <div class="form-group m-form__group row">
												<label class="col-lg-3 col-form-label">
													Urgência:
												</label>
												<div class="col-lg-6">
                          <div class="input-group input-group-md m-input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="la la-fire-extinguisher"></i>
                              </span>
                            </div>
                            <select class="form-control m-input m-input--square" id="support_urgency">
                              <option value="">Selecione...</option>
                              <option value="0">Baixo</option>
                              <option value="1">Normal</option>
                              <option value="2">Alto</option>
                              <option value="3">Urgente</option>
                          </select>
                          </div>
													<span class="m-form__help">
														Selecione a urgência de seu chamado. Prioridades altas e urgentes remetem a problemas que impossibilitam o uso da plataforma.
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-3 col-form-label">
													Mensagem:
												</label>
												<div class="col-lg-6">
                          <div class="input-group input-group-md m-input-group">
    												<div class="input-group-prepend">
    													<span class="input-group-text">
    														<i class="la la-font"></i>
    													</span>
    												</div>
    												<textarea rows="5" class="form-control m-input" placeholder="" id="support_message"></textarea>
    											</div>
													<span class="m-form__help">
														Entre com o máximo de informações possíveis para solução rápida de seu chamado
													</span>
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-12">
														<button type="submit" class="btn btn-primary pull-right">
															Criar chamado
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
													Chamados criados
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
															<div class="m-list-timeline__items" id="div_supports">
                                <!-- lista dinâmica de chamados criados -->
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

     retrieveSupports();

     function retrieveSupports(){

       $.ajax({
         url: BASE_URL+'api/support/retrieve-supports/'+company.companyId,
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_supports").empty();

             if (response["supports"].length > 0) {

               $.each(response["supports"], function(i, support){

                 var solved = support.supportSolved == 1 ? "Resolvido" : "Não-resolvido";
                 var message = clipText(support.supportMessage, 100);

                 $("#div_supports").append('<div class="m-list-timeline__item"><span class="m-list-timeline__badge"></span><span class="m-list-timeline__text"><span class="m-badge m-badge--primary m-badge--wide m-badge--rounded"> '+support.supportSubjectName+' </span> '+message+' <mark> <small>('+solved+')</small> </mark></span><span class="m-list-timeline__time">'+convertDateYMDtoDMY(support.supportDate)+'</span></div>');
               });

             }else{
               $("#div_supports").append('<div class="m-list-timeline__item"><span class="m-list-timeline__badge"></span><span class="m-list-timeline__text"> Nenhum chamado de suporte criado</span><span class="m-list-timeline__time"></span></div>');
             }

             $.each(response["supportSubjects"], function(i, discount){
               $("#support_subject_select").append($("<option />").val(this.supportSubjectId).text(this.supportSubjectName).attr("data-description", this.supportSubjectDescription).attr("data-icon", "la la-info-circle"));
             });

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_support").off().submit(function (event) {

         var valSupportSubject = $("#support_subject_select").val();
         var valSupportMessage = $("#support_message").val();
         var valSupportUrgency = $("#support_urgency").val();

         if (valSupportSubject == "" || valSupportMessage == "" || valSupportUrgency == "") {

 					if (valSupportSubject == "") {
 						toastr.error("Selecione a área de suporte");
 					}

 					if (valSupportMessage == "") {
 						toastr.error("Insira uma mensagem para criar o chamado de suporte");
 					}

          if (valSupportUrgency == "") {
 						toastr.error("Selecione a urgência do chamado de suporte");
 					}

          return false;
         }

         $.ajax({
     			url: BASE_URL+'api/create-support',
     			type: 'POST',
     			contentType: 'application/json',
     			dataType:"json",
     			async: true,
     			data: JSON.stringify({subjectId: valSupportSubject,
                                supportMessage: valSupportMessage,
                                supportUrgency: valSupportUrgency,
                                companyId : company.companyId}),
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

              retrieveSupports();

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

       $('#form_create_support').trigger("reset");
       event.preventDefault();

     });

     $('#support_subject_select').delegate(null,'change', function() {
       $('#label_support_subject_description').html($(this).find("option:selected").data("description"));
       $('#icon_support_subject_description').addClass($(this).find("option:selected").data("icon"));

       if ($(this).find("option:selected").data("description") == "") {
        $('#icon_support_subject_description').removeClass("la la-info-circle");
        console.log("oi");
       }

     });


  });
</script>
