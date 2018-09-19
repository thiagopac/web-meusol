<div class="modal fade" id="modal_tariff_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar nova tarifa
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
                  <form id="form_create_tariff">
                     <div class="form-group">
                        <label class="form-control-label">
                        Valor:
                        </label>
                        <input type="text" placeholder="Ex: 0.123" class="form-control" id="tariff_value_create">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Tarifas cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_tariffs_created" class="box">
                 <!-- listagem dinâmica de tarifas -->
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

<div class="modal fade" id="modal_tariff_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar tarifa
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
                  <form id="form_edit_tariff">
                    <input type="hidden" id="tariff_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Valor:
                        </label>
                        <input type="text" placeholder="Escolha uma tarifa ao lado para editar" class="form-control" data-id="" id="tariff_value_edit">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Tarifas cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_tariffs_edit" class="box">
                 <!-- listagem dinâmica de tarifas -->
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


     $('#modal_tariff_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveTariffs();
     });

     $('#modal_tariff_edit').on('shown.bs.modal', function (e) {

        var dataType = $(this).data('type');

        if (dataType == "view"){

          $(this).removeData('type');
          $("form[id*='edit'] :input").prop("disabled", true);
          $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
          $(":input[type=submit]").prop('disabled', true);
          $(".settings-window").html("Visualizar tarifa");

        }else if(dataType == "edit"){

          $(this).removeData('type');
          $("form[id*='edit'] :input").prop("disabled", false);
          $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
          $(":input[type=submit]").prop('disabled', false);
          $(".settings-window").html("Editar tarifa");
        }

         clearEditInputs();
         retrieveTariffs();
     });

     function clearCreateInputs(){
       $("#form_create_tariff").each(function() { this.reset() });
     };

     function clearEditInputs(){
       $("#form_edit_tariff").each(function() { this.reset() });
     };


     function retrieveTariffs(){

       $.ajax({
         url: BASE_URL+'api/tariffs',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_tariffs_created").empty();
             $("#div_tariffs_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["tariffs"].length > 0) {

               $.each(response["tariffs"], function(i, tariff){

                 $("#div_tariffs_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+tariff.tariffId+". "+tariff.tariffValue+'</code></div>');
                 $("#div_tariffs_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+tariff.tariffId+'" data-value="'+tariff.tariffValue+'"><code>'+tariff.tariffId+". "+tariff.tariffValue+'</code></a></div>');
               });

             }else{
               $("#div_tariffs_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma tarifa cadastrada</code></div>');
               $("#div_tariffs_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma tarifa cadastrada</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_tariff").off().submit(function (event) {

         var valTariffValue = $("#tariff_value_create").val();

         if (valTariffValue == "") {

           toastr.error("Insira o valor da tarifa");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-tariff',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({tariffValue: valTariffValue}),
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

              retrieveTariffs();

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

     $('#div_tariffs_edit').delegate('a', 'click', function(e) {
       var tariff_to_edit = $(this);
       $("#tariff_value_edit").val(tariff_to_edit.data("value"));
       $("#tariff_id_edit").val(tariff_to_edit.data("id"));
       e.preventDefault();

       $("#form_edit_tariff").off().submit(function (event) {

           var valTariffValue = $("#tariff_value_edit").val();
           var valTariffId = $("#tariff_id_edit").val();

           if (valTariffValue == "") {

             toastr.error("Insira o valor da tarifa");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-tariff',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({tariffValue: valTariffValue, tariffId : valTariffId}),
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

                retrieveTariffs();

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
