<div class="modal fade" id="modal_tariff_rule_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-size-60" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar nova regra tarifária
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
            &times;
            </span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-5 col-xl-5">
                  <form id="form_create_tariff_rule">
                     <div class="form-group">
                       <label class="form-control-label">
                       Subclasse:
                       </label>
                       <select class="form-control m-input m-input--square" id="tariff_rule_subclass_create">
                         <option value="">Selecione…</option>
                         <!-- listagem dinâmica de subclasses -->
                     </select>
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Modalidade tarifária:
                        </label>
                        <select class="form-control m-input m-input--square" id="tariff_rule_tariff_modality_create">
                          <option value="">Selecione…</option>
                          <!-- listagem dinâmica de modalidades tarifárias -->
											</select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Tarifa:
                        </label>
                        <select class="form-control m-input m-input--square" id="tariff_rule_tariff_create">
                          <option value="">Selecione…</option>
                          <!-- listagem dinâmica de tarifas -->
											</select>
                     </div>
               </div>
               <div class="col-md-7 col-xl-7">
               <span class="m--font-bolder">
                 Regras tarifárias cadastradas <small> (Subclasse + Modalidade tarifária = Tarifa)</small>
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_tariff_rules_created" class="box">

                 <!-- listagem dinâmica de regras tarifárias -->
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

<div class="modal fade" id="modal_tariff_rule_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-size-60" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar regra tarifária
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
            &times;
            </span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
              <div class="col-md-5 col-xl-5">
                 <form id="form_edit_tariff_rule">
                   <input type="hidden" id="tariff_rule_id_edit">
                    <div class="form-group">
                      <label class="form-control-label">
                      Subclasse:
                      </label>
                      <select class="form-control m-input m-input--square" id="tariff_rule_subclass_edit">
                        <option value="">Selecione...</option>
                        <!-- listagem dinâmica de subclasses -->
                    </select>
                   </div>
                    <div class="form-group">
                       <label for="recipient-name" class="form-control-label">
                       Modalidade tarifária:
                       </label>
                       <select class="form-control m-input m-input--square" id="tariff_rule_tariff_modality_edit">
                         <option value="">Selecione...</option>
                         <!-- listagem dinâmica de modalidades tarifárias -->
                     </select>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Tarifa:
                       </label>
                       <select class="form-control m-input m-input--square" id="tariff_rule_tariff_edit">
                         <option value="">Selecione...</option>
                         <!-- listagem dinâmica de tarifas -->
                     </select>
                    </div>
              </div>
               <div class="col-md-7 col-xl-7">
               <span class="m--font-bolder">
                 Regras tarifárias cadastradas <small> (Subclasse + Modalidade tarifária = Tarifa)</small>
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_tariff_rules_edit" class="box">
                 <!-- listagem dinâmica de regras tarifárias -->
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


     $('#modal_tariff_rule_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveTariffRules();
     });

     $('#modal_tariff_rule_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar regra tarifária");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar regra tarifária");
       }

         clearEditInputs();
         retrieveTariffRules();
     });


     function clearCreateInputs(){
       //iniciar com form limpo
       $("#form_create_tariff_rule").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#tariff_rule_subclass_create option:not(:first)').remove();
       $('#tariff_rule_tariff_modality_create option:not(:first)').remove();
       $('#tariff_rule_tariff_create option:not(:first)').remove();
     };

     function clearEditInputs(){
       //iniciar com form limpo
       $("#form_edit_tariff_rule").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#tariff_rule_subclass_edit option:not(:first)').remove();
       $('#tariff_rule_tariff_modality_edit option:not(:first)').remove();
       $('#tariff_rule_tariff_edit option:not(:first)').remove();
     };

     function retrieveTariffRules(){

       $.ajax({
         url: BASE_URL+'api/tariff-rules',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_tariff_rules_created").empty();
             $("#div_tariff_rules_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["tariffRules"].length > 0) {

               //sort
               // response["tariffRules"].sort(function(obj1, obj2) { return obj1.tariffRuleId + obj1.tariffRuleId;});

               $.each(response["tariffRules"], function(i, tariffRule){
                 $("#div_tariff_rules_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+tariffRule.subclassName+'</code> + <code>'+tariffRule.tariffRuleId+". "+tariffRule.tariffModalityName+'</code> = <code>'+tariffRule.tariffValue+'</code></div>');
                 $("#div_tariff_rules_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+tariffRule.tariffRuleId+'" data-subclass-id="'+tariffRule.subclassId+'" data-tariff-modality-id="'+tariffRule.tariffModalityId+'" data-tariff-id="'+tariffRule.tariffId+'"><code>'+tariffRule.tariffRuleId+". "+tariffRule.subclassName+'</code> + <code>'+tariffRule.tariffModalityName+'</code> = <code>'+tariffRule.tariffValue+'</code></a></div>');
               });

             }else{
               $("#div_tariff_rules_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma regra tarifária cadastrada</code></div>');
               $("#div_tariff_rules_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma regra tarifária cadastrada</code></div>');
             }

             $.each(response["subclasses"], function(i, subclass){
               $("#tariff_rule_subclass_create").append($("<option />").val(this.subclassId).text(this.subclassName));
               $("#tariff_rule_subclass_edit").append($("<option />").val(this.subclassId).text(this.subclassName));
             });

             $.each(response["tariffModalities"], function(i, tariffModality){

               $("#tariff_rule_tariff_modality_create").append($("<option />").val(this.tariffModalityId).text(this.tariffModalityName));
               $("#tariff_rule_tariff_modality_edit").append($("<option />").val(this.tariffModalityId).text(this.tariffModalityName));
             });

             $.each(response["tariffs"], function(i, tariff){
               $("#tariff_rule_tariff_create").append($("<option />").val(this.tariffId).text(this.tariffValue));
               $("#tariff_rule_tariff_edit").append($("<option />").val(this.tariffId).text(this.tariffValue));
             });

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_tariff_rule").off().submit(function (event) {

         var valSubclass = $("#tariff_rule_subclass_create").val();
         var valTariffModality = $("#tariff_rule_tariff_modality_create").val();
         var valTariff = $("#tariff_rule_tariff_create").val();

         if (valSubclass == "") {

           toastr.error("Selectione a subclasse");
           return false;
         }

         if (valTariffModality == "") {

           toastr.error("Selecione a Modalidade tarifária");
           return false;
         }

         if (valTariff == "") {

           toastr.error("Selecione a tarifa");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-tariff-rule',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({subclassId: valSubclass,
                                tariffModalityId: valTariffModality,
                                tariffId: valTariff}),
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

              retrieveTariffRules();

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

     $('#div_tariff_rules_edit').delegate('a', 'click', function(e) {
       var tariff_rule_to_edit = $(this);

       $("#tariff_rule_subclass_edit").val(tariff_rule_to_edit.data("subclass-id"));
       $("#tariff_rule_tariff_modality_edit").val(tariff_rule_to_edit.data("tariff-modality-id"));
       $("#tariff_rule_tariff_edit").val(tariff_rule_to_edit.data("tariff-id"));

       $("#tariff_rule_id_edit").val(tariff_rule_to_edit.data("id"));

       // desselecionar todos os options antes de selectionar a opção escolhida
       $('#tariff_rule_subclass_edit option').removeAttr("selected");
       $('#tariff_rule_tariff_modality_edit option').removeAttr("selected");
       $('#tariff_rule_tariff_edit option').removeAttr("selected");

       // selectionar as escolhas corretas
       $('#tariff_rule_subclass_edit option[value="'+tariff_rule_to_edit.data("subclass-id")+'"]').attr("selected",true);
       $('#tariff_rule_tariff_modality_edit option[value="'+tariff_rule_to_edit.data("tariff-modality-id")+'"]').attr("selected",true);
       $('#tariff_rule_tariff_edit option[value="'+tariff_rule_to_edit.data("tariff-id")+'"]').attr("selected",true);

       e.preventDefault();

       $("#form_edit_tariff_rule").off().submit(function (event) {

           var valTariffRule = $("#tariff_rule_id_edit").val();
           var valSubclass = $("#tariff_rule_subclass_edit").val();
           var valTariffModality = $("#tariff_rule_tariff_modality_edit").val();
           var valTariff = $("#tariff_rule_tariff_edit").val();

           if (valSubclass == "") {

             toastr.error("Selectione a subclasse");
             return false;
           }

           if (valTariffModality == "") {

             toastr.error("Selecione a Modalidade tarifária");
             return false;
           }

           if (valTariff == "") {

             toastr.error("Selecione a tarifa");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-tariff-rule',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({subclassId: valSubclass,
                                  tariffModalityId: valTariffModality,
                                  tariffId: valTariff,
                                  tariffRuleId : valTariffRule}),
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

                retrieveTariffRules();

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
