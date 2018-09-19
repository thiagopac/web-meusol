<div class="modal fade" id="modal_contract_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-size-60" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar novo contrato
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
            &times;
            </span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6 col-xl-6">
                  <form id="form_create_contract">
                     <div class="form-group">
                        <label class="form-control-label">
                        Início:
                        </label>
                        <div class="input-group date">
                          <input type="text" class="form-control m-input" readonly id="contract_start_create"/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-calendar-check-o"></i>
                            </span>
                          </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Fim:
                        </label>
                        <div class="input-group date">
                          <input type="text" class="form-control m-input" readonly id="contract_end_create"/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-calendar-check-o"></i>
                            </span>
                          </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Empresa:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_company_create">
                          <option>Selecione…</option>
                          <!-- listagem dinâmica de empresas -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Plano:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_plan_create">
                          <option>Selecione…</option>
                          <!-- listagem dinâmica de planos -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Regra tarifária:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_tariff_rule_create">
                          <option>Selecione…</option>
                          <!-- listagem dinâmica de regras tarifárias -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Status:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_status_create">
                          <option>Selecione…</option>
                          <option value="0">Inativo</option>
                          <option value="1">Ativo</option>
                          <option value="2">Cancelado</option>
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Contratos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_contracts_created" class="box">
                 <!-- listagem dinâmica de contratos -->
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">
           Fechar
         </button>
         <button type="submit" class="btn btn-primary">
           Cadastrar
         </button>
         </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal_contract_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-size-60" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar contrato
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
            &times;
            </span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6 col-xl-6">
                  <form id="form_edit_contract">
                    <input type="hidden" id="contract_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Início:
                        </label>
                        <div class="input-group date">
                          <input type="text" class="form-control m-input" readonly id="contract_start_edit"/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-calendar-check-o"></i>
                            </span>
                          </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Fim:
                        </label>
                        <div class="input-group date">
                          <input type="text" class="form-control m-input" readonly id="contract_end_edit"/>
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="la la-calendar-check-o"></i>
                            </span>
                          </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Empresa:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_company_edit">
                          <option>Selecione…</option>
                          <!-- listagem dinâmica de empresas -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Plano:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_plan_edit">
                          <option>Selecione…</option>
                          <!-- listagem dinâmica de planos -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Regra tarifária:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_tariff_rule_edit">
                          <option>Selecione…</option>
                          <!-- listagem dinâmica de regras tarifárias -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Status:
                        </label>
                        <select class="form-control m-input m-input--square" id="contract_status_edit">
                          <option>Selecione…</option>
                          <option value="0">Inativo</option>
                          <option value="1">Ativo</option>
                          <option value="2">Cancelado</option>
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Contratos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_contracts_edit" class="box">
                 <!-- listagem dinâmica de contratos -->
               </div>
               </div>
               </div>
               </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">
           Fechar
         </button>
         <button type="submit" class="btn btn-primary">
           Salvar
         </button>
         </form>
         </div>
      </div>
   </div>
</div>
<script src="assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
   $(document).ready(function() {

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


     $('#modal_contract_create').on('shown.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         $("#contract_start_create").datepicker({
                     todayHighlight: !0,
                     format: "dd/mm/yyyy",
                     autoclose: true,
                     orientation: "bottom left",
                     templates: {
                         leftArrow: '<i class="la la-angle-left"></i>',
                         rightArrow: '<i class="la la-angle-right"></i>'
                     }
                 });

         $("#contract_end_create").datepicker({
                     todayHighlight: 0,
                     format: "dd/mm/yyyy",
                     autoclose: true,
                     orientation: "bottom left",
                     templates: {
                         leftArrow: '<i class="la la-angle-left"></i>',
                         rightArrow: '<i class="la la-angle-right"></i>'
                     }
                 });

         clearCreateInputs();
         retrieveContracts();
     });

     $('#modal_contract_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar contrato");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar contrato");
       }

       $("#contract_start_edit").datepicker({
                   todayHighlight: 0,
                   format: "dd/mm/yyyy",
                   useCurrent: true,
                   autoclose: true,
                   orientation: "bottom left",
                   templates: {
                       leftArrow: '<i class="la la-angle-left"></i>',
                       rightArrow: '<i class="la la-angle-right"></i>'
                   }
               });

       $("#contract_end_edit").datepicker({
                   todayHighlight: 0,
                   format: "dd/mm/yyyy",
                   useCurrent: true,
                   autoclose: true,
                   orientation: "bottom left",
                   templates: {
                       leftArrow: '<i class="la la-angle-left"></i>',
                       rightArrow: '<i class="la la-angle-right"></i>'
                   }
               });

         clearCreateInputs();
         retrieveContracts();
     });

     function clearCreateInputs(){
       //iniciar com form limpo
       $("#form_create_contract").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#contract_company_create option:not(:first)').remove();
       $('#contract_plan_create option:not(:first)').remove();
       $('#contract_tariff_rule_create option:not(:first)').remove();
     };

     function clearEditInputs(){
       //iniciar com form limpo
       $("#form_edit_contract").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#contract_company_edit option:not(:first)').remove();
       $('#contract_plan_edit option:not(:first)').remove();
       $('#contract_tariff_rule_edit option:not(:first)').remove();
     };


     function retrieveContracts(){

       $.ajax({
         url: BASE_URL+'api/contracts',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_contracts_created").empty();
             $("#div_contracts_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["contracts"].length > 0) {

               $.each(response["contracts"], function(i, contract){
                 $("#div_contracts_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+contract.contractId+". "+'<small>Contrato:</small> '+contract.companyName+'</code></div>');
                 $("#div_contracts_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+contract.contractId+'" data-start="'+convertDateYMDtoDMY(contract.contractStart)+'" data-end="'+convertDateYMDtoDMY(contract.contractEnd)+'" data-company-id="'+contract.companyId+'" data-plan-id="'+contract.planId+'" data-tariffrule-id="'+contract.tariffRuleId+'" data-status="'+contract.contractStatus+'"><code>'+contract.contractId+". "+'<small>Contrato:</small> '+contract.companyName+'</code></a></div>');

               });

               $.each(response["companies"], function(i, company){
                 $("#contract_company_create").append($("<option />").val(this.companyId).text(this.companyName));
                 $("#contract_company_edit").append($("<option />").val(this.companyId).text(this.companyName));
               });

               $.each(response["plans"], function(i, plan){
                 $("#contract_plan_create").append($("<option />").val(this.planId).text(this.planName));
                 $("#contract_plan_edit").append($("<option />").val(this.planId).text(this.planName));
               });

               $.each(response["tariffRules"], function(i, tariffRule){
                 $("#contract_tariff_rule_create").append($("<option />").val(this.tariffRuleId).text(this.tariffRuleId +". "+ this.subclassName +' + '+ this.tariffModalityName +" = "+ this.tariffValue));
                 $("#contract_tariff_rule_edit").append($("<option />").val(this.tariffRuleId).text(this.tariffRuleId +". "+ this.subclassName +' + '+ this.tariffModalityName +" = "+ this.tariffValue));
               });

             }else{
               $("#div_contracts_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum contrato cadastrado</code></div>');
               $("#div_contracts_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum contrato cadastrado</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_contract").off().submit(function (event) {

         var valStart = $("#contract_start_create").val();
         var valEnd = $("#contract_end_create").val();
         var valCompany = $("#contract_company_create").val();
         var valPlan = $("#contract_plan_create").val();
         var valTariffRule = $("#contract_tariff_rule_create").val();
         var valStatus = $("#contract_status_create").val();

         if (valStart == "") {

           toastr.error("Insira o início do contrato");
           return false;
         }

         if (valEnd == "") {

           toastr.error("Insira o fim do contrato");
           return false;
         }

         if (valCompany == "") {

           toastr.error("Selecione a empresa para o contrato");
           return false;
         }

         if (valPlan == "") {

           toastr.error("Selecione o plano para o contrato");
           return false;
         }

         if (valTariffRule == "") {

           toastr.error("Selecione a regra tarifária para o contrato");
           return false;
         }

         if (valStatus == "") {

           toastr.error("Selecione o status do contrato");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-contract',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({contractStart: convertDateDMYtoYMD(valStart),
                                contractEnd: convertDateDMYtoYMD(valEnd),
                                companyId: valCompany,
                                planId: valPlan,
                                tariffRuleId: valTariffRule,
                                contractStatus: valStatus}),
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

              retrieveContracts();

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

       event.preventDefault();

     });

     $('#div_contracts_edit').delegate('a', 'click', function(e) {
       var contract_to_edit = $(this);
       $("#contract_id_edit").val(contract_to_edit.data("id"));
       $("#contract_start_edit").val(contract_to_edit.data("start"));
       $("#contract_end_edit").val(contract_to_edit.data("end"));
       $("#contract_company_edit").val(contract_to_edit.data("company-id"));
       $("#contract_plan_edit").val(contract_to_edit.data("plan-id"));
       $("#contract_tariff_rule_edit").val(contract_to_edit.data("tariffrule-id"));
       $("#contract_status_edit").val(contract_to_edit.data("status"));

       // desselecionar todos os options antes de selectionar dos dados do contrato
       $('#contract_company_edit option').removeAttr("selected");
       $('#contract_plan_edit option').removeAttr("selected");
       $('#contract_tariff_rule_edit option').removeAttr("selected");
       $('#contract_status_edit option').removeAttr("selected");

       // selectionar os dados corretos
       $('#contract_company_edit option[value="'+contract_to_edit.data("company-id")+'"]').attr("selected",true);
       $('#contract_plan_edit option[value="'+contract_to_edit.data("plan-id")+'"]').attr("selected",true);
       $('#contract_tariff_rule_edit option[value="'+contract_to_edit.data("tariffrule-id")+'"]').attr("selected",true);
       $('#contract_status_edit option[value="'+contract_to_edit.data("status")+'"]').attr("selected",true);

       $("#contract_start_edit").datepicker("setDate",contract_to_edit.data("start"));
       $("#contract_end_edit").datepicker("setDate",contract_to_edit.data("end"));

       e.preventDefault();

       $("#form_edit_contract").off().submit(function (event) {

           var valContractId = $("#contract_id_edit").val();
           var valStart = $("#contract_start_edit").val();
           var valEnd = $("#contract_end_edit").val();
           var valCompany = $("#contract_company_edit").val();
           var valPlan = $("#contract_plan_edit").val();
           var valTariffRule = $("#contract_tariff_rule_edit").val();
           var valStatus = $("#contract_status_edit").val();

           if (valStart == "") {

             toastr.error("Insira o início do contrato");
             return false;
           }

           if (valEnd == "") {

             toastr.error("Insira o fim do contrato");
             return false;
           }

           if (valCompany == "") {

             toastr.error("Selecione a empresa para o contrato");
             return false;
           }

           if (valPlan == "") {

             toastr.error("Selecione o plano para o contrato");
             return false;
           }

           if (valTariffRule == "") {

             toastr.error("Selecione a regra tarifária para o contrato");
             return false;
           }

           if (valStatus == "") {

             toastr.error("Selecione o status do contrato");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-contract',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({contractId: valContractId,
                                  contractStart: convertDateDMYtoYMD(valStart),
                                  contractEnd: convertDateDMYtoYMD(valEnd),
                                  companyId: valCompany,
                                  planId: valPlan,
                                  tariffRuleId: valTariffRule,
                                  contractStatus: valStatus}),
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

                retrieveContracts();

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

         event.preventDefault();

       });
});


   });
</script>
