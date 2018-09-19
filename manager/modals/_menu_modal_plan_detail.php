<div class="modal fade" id="modal_plan_detail_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar novo item
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
                  <form id="form_create_plan_detail">
                     <div class="form-group">
                        <label class="form-control-label">
                        Descrição:
                        </label>
                        <input type="text" placeholder="Ex: Contrato de 12 meses" class="form-control" id="plan_detail_description_create">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Plano:
                        </label>
                        <select class="form-control m-input m-input--square" id="plan_detail_plan_create">
                          <option value="">Selecione…</option>
                          <!-- listagem dinâmica de planos -->
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Itens cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_plan_details_created" class="box">
                 <!-- listagem dinâmica de itens do plano -->
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

<div class="modal fade" id="modal_plan_detail_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar item
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
                  <form id="form_edit_plan_detail">
                    <input type="hidden" id="plan_detail_id_edit">
                    <div class="form-group">
                       <label class="form-control-label">
                       Descrição:
                       </label>
                       <input type="text" placeholder="Ex: Contrato de 12 meses" class="form-control" id="plan_detail_description_edit">
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Plano:
                       </label>
                       <select class="form-control m-input m-input--square" id="plan_detail_plan_edit">
                         <option value="">Selecione…</option>
                         <!-- listagem dinâmica de planos -->
                     </select>
                    </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Itens cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_plan_details_edit" class="box">
                 <!-- listagem dinâmica de itens do plano -->
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


     $('#modal_plan_detail_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrievePlanDetails();
     });

     $('#modal_plan_detail_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar item");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar item");
       }
         clearCreateInputs();
         retrievePlanDetails();
     });

     function clearCreateInputs(){
       //iniciar com form limpo
       $("#form_create_plan_detail").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#plan_detail_plan_create option:not(:first)').remove();
     };

     function clearEditInputs(){
       //iniciar com form limpo
       $("#form_edit_plan_detail").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#plan_detail_plan_edit option:not(:first)').remove();
     };


     function retrievePlanDetails(){

       $.ajax({
         url: BASE_URL+'api/plan-details',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_plan_details_created").empty();
             $("#div_plan_details_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["planDetails"].length > 0) {

               $.each(response["planDetails"], function(i, planDetail){
                 $("#div_plan_details_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+planDetail.planDetailId+". "+planDetail.planDetailDescription+' <small>('+planDetail.planName+')</small></code></div>');
                 $("#div_plan_details_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+planDetail.planDetailId+'" data-description="'+planDetail.planDetailDescription+'" data-plan-id="'+planDetail.planId+'"><code>'+planDetail.planDetailId+". "+planDetail.planDetailDescription+' <small>('+planDetail.planName+')</small></code></a></div>');
               });

               $.each(response["plans"], function(i, plan){
                 $("#plan_detail_plan_create").append($("<option />").val(this.planId).text(this.planName));
                 $("#plan_detail_plan_edit").append($("<option />").val(this.planId).text(this.planName));
               });

             }else{
               $("#div_plan_details_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum item cadastrado</code></div>');
               $("#div_plan_details_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum item cadastrado</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_plan_detail").off().submit(function (event) {

         var valPlanDetailDescription = $("#plan_detail_description_create").val();
         var valPlanDetailPlan = $("#plan_detail_plan_create").val();

         if (valPlanDetailDescription == "") {

           toastr.error("Insira a descrição do item");
           return false;
         }

         if (valPlanDetailPlan == "") {

           toastr.error("Selectione o plano");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-plan-detail',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({planDetailDescription: valPlanDetailDescription,
                                planId: valPlanDetailPlan}),
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

              retrievePlanDetails();

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

     $('#div_plan_details_edit').delegate('a', 'click', function(e) {
       var plan_detail_to_edit = $(this);
       $("#plan_detail_description_edit").val(plan_detail_to_edit.data("description"));
       $("#plan_detail_id_edit").val(plan_detail_to_edit.data("id"));

       // desselecionar todos os options antes de selectionar plano do item
       $('#plan_detail_plan_edit option').removeAttr("selected");

       // selectionar o plano correto
       $('#plan_detail_plan_edit option[value="'+plan_detail_to_edit.data("plan-id")+'"]').attr("selected",true);

       e.preventDefault();

       $("#form_edit_plan_detail").off().submit(function (event) {

           var valPlanDetailId = $("#plan_detail_id_edit").val();
           var valPlanDetailDescription = $("#plan_detail_description_edit").val();
           var valPlanDetailPlan = $("#plan_detail_plan_edit").val();

           if (valPlanDetailDescription == "") {

             toastr.error("Insira a descrição do item");
             return false;
           }

           if (valPlanDetailPlan == "") {

             toastr.error("Selectione o plano");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-plan-detail',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({planDetailId: valPlanDetailId,
                                  planDetailDescription: valPlanDetailDescription,
                                  planId: valPlanDetailPlan}),
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

                retrievePlanDetails();

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
