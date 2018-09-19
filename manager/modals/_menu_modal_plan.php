<div class="modal fade" id="modal_plan_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar novo plano
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
                  <form id="form_create_plan">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Ex: BASIC" class="form-control" id="plan_name_create">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Duração: <small>(em meses)</small>
                        </label>
                        <input placeholder="Ex: 12 para 1 ano" class="form-control" id="plan_duration_create" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Desconto:
                        </label>
                        <select class="form-control m-input m-input--square" id="plan_discount_create">
                          <option value="">Selecione…</option>
                          <!-- listagem dinâmica de descontos -->
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Planos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_plans_created" class="box">
                 <!-- listagem dinâmica de planos -->
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

<div class="modal fade" id="modal_plan_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar plano
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
                  <form id="form_edit_plan">
                    <input type="hidden" id="plan_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Escolha um plano ao lado para editar" class="form-control" data-id="" id="plan_name_edit">
                     </div>
                     <div class="form-group">
                       <label class="form-control-label">
                       Duração: <small>(em meses)</small>
                       </label>
                       <input placeholder="Escolha um plano ao lado para editar" class="form-control" id="plan_duration_edit" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Desconto:
                        </label>
                        <select class="form-control m-input m-input--square" id="plan_discount_edit">
                          <option value="">Selecione...</option>
                          <!-- listagem dinâmica de descontos -->
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Planos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_plans_edit" class="box">
                 <!-- listagem dinâmica de planos -->
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


     $('#modal_plan_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrievePlans();
     });

     $('#modal_plan_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar plano");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar plano");
       }
         clearCreateInputs();
         retrievePlans();
     });

     function clearCreateInputs(){
       //iniciar com form limpo
       $("#form_create_plan").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#plan_discount_create option:not(:first)').remove();
     };

     function clearEditInputs(){
       //iniciar com form limpo
       $("#form_edit_plan").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#plan_discount_edit option:not(:first)').remove();
     };


     function retrievePlans(){

       $.ajax({
         url: BASE_URL+'api/plans',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_plans_created").empty();
             $("#div_plans_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["plans"].length > 0) {

               $.each(response["plans"], function(i, plan){
                 $("#div_plans_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+plan.planId+". "+plan.planName+'</code></div>');
                 $("#div_plans_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+plan.planId+'" data-discount-id="'+plan.discountId+'" data-duration="'+plan.planDuration+'" data-name="'+plan.planName+'"><code>'+plan.planId+". "+plan.planName+'</code></a></div>');
               });

               $.each(response["discounts"], function(i, discount){
                 $("#plan_discount_create").append($("<option />").val(this.discountId).text(this.discountName));
                 $("#plan_discount_edit").append($("<option />").val(this.discountId).text(this.discountName));
               });

             }else{
               $("#div_plans_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum plano cadastrado</code></div>');
               $("#div_plans_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum plano cadastrado</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_plan").off().submit(function (event) {

         var valPlanName = $("#plan_name_create").val();
         var valPlanDuration = $("#plan_duration_create").val();
         var valPlanDiscount = $("#plan_discount_create").val();

         if (valPlanName == "") {

           toastr.error("Insira o nome do plano");
           return false;
         }

         if (valPlanDuration == "") {

           toastr.error("Insira a duração do plano");
           return false;
         }

         if (valPlanDiscount == "") {

           toastr.error("Insira o desconto do plano");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-plan',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({planName: valPlanName,
                                planDuration: valPlanDuration,
                                discountId: valPlanDiscount}),
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

              retrievePlans();

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

     $('#div_plans_edit').delegate('a', 'click', function(e) {
       var plan_to_edit = $(this);
       $("#plan_name_edit").val(plan_to_edit.data("name"));
       $("#plan_duration_edit").val(plan_to_edit.data("duration"));
       $("#plan_id_edit").val(plan_to_edit.data("id"));

       // desselecionar todos os options antes de selectionar o desconto do plano
       $('#plan_discount_edit option').removeAttr("selected");

       // selectionar o desconto correto
       $('#plan_discount_edit option[value="'+plan_to_edit.data("discount-id")+'"]').attr("selected",true);

       e.preventDefault();

       $("#form_edit_plan").off().submit(function (event) {

           var valPlanId = $("#plan_id_edit").val();
           var valPlanName = $("#plan_name_edit").val();
           var valPlanDuration = $("#plan_duration_edit").val();
           var valPlanDiscount = $("#plan_discount_edit").val();

           if (valPlanName == "") {

             toastr.error("Insira o nome do plano");
             return false;
           }

           if (valPlanDuration == "") {

             toastr.error("Insira a duração do plano");
             return false;
           }

           if (valPlanDiscount == "") {

             toastr.error("Insira o desconto do plano");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-plan',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({planId: valPlanId,
                                  planName: valPlanName,
                                  planDuration: valPlanDuration,
                                  discountId: valPlanDiscount}),
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

                retrievePlans();

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
