<div class="modal fade" id="modal_tariff_modality_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar nova modalidade tarifária
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
                  <form id="form_create_tariff_modality">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Ex: Convencional B3" class="form-control" id="tariff_modality_name_create">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Modalidades tarifárias cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_tariff_modalities_created" class="box">
                 <!-- listagem dinâmica de modalidades tarifárias -->
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

<div class="modal fade" id="modal_tariff_modality_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar modalidade tarifária
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
                  <form id="form_edit_tariff_modality">
                    <input type="hidden" id="tariff_modality_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Escolha uma modalidade tarifária ao lado para editar" class="form-control" data-id="" id="tariff_modality_name_edit">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Modalidades tarifárias cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_tariff_modalityies_edit" class="box">
                 <!-- listagem dinâmica de modalidades tarifárias -->
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


     $('#modal_tariff_modality_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveTariffModalities();
     });

     $('#modal_tariff_modality_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar modalidade tarifária");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar modalidade tarifária");
       }

         clearEditInputs();
         retrieveTariffModalities();
     });

     function clearCreateInputs(){
       $("#form_create_tariff_modality").each(function() { this.reset() });
     };

     function clearEditInputs(){
       $("#form_edit_tariff_modality").each(function() { this.reset() });
     };


     function retrieveTariffModalities(){

       $.ajax({
         url: BASE_URL+'api/tariff-modalities',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_tariff_modalities_created").empty();
             $("#div_tariff_modalityies_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["tariffModalities"].length > 0) {

               $.each(response["tariffModalities"], function(i, tariffModality){

                 $("#div_tariff_modalities_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+tariffModality.tariffModalityId+". "+tariffModality.tariffModalityName+'</code></div>');
                 $("#div_tariff_modalityies_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+tariffModality.tariffModalityId+'" data-name="'+tariffModality.tariffModalityName+'"><code>'+tariffModality.tariffModalityId+". "+tariffModality.tariffModalityName+'</code></a></div>');
               });

             }else{
               $("#div_tariff_modalities_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma modalidade tarifária cadastrada</code></div>');
               $("#div_tariff_modalityies_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma modalidade tarifária cadastrada</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_tariff_modality").off().submit(function (event) {

         var valTariffModalityName = $("#tariff_modality_name_create").val();

         if (valTariffModalityName == "") {

           toastr.error("Insira o nome da modalidade tarifária");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-tariff-modality',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({tariffModalityName: valTariffModalityName}),
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

              retrieveTariffModalities();

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

     $('#div_tariff_modalityies_edit').delegate('a', 'click', function(e) {
       var tariff_modality_to_edit = $(this);
       $("#tariff_modality_name_edit").val(tariff_modality_to_edit.data("name"));
       $("#tariff_modality_id_edit").val(tariff_modality_to_edit.data("id"));
       e.preventDefault();

       $("#form_edit_tariff_modality").off().submit(function (event) {

           var valTariffModalityName = $("#tariff_modality_name_edit").val();
           var valTariffModalityId = $("#tariff_modality_id_edit").val();

           if (valTariffModalityName == "") {

             toastr.error("Insira o nome da modalidade tarifária");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-tariff-modality',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({tariffModalityName: valTariffModalityName, tariffModalityId: valTariffModalityId}),
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

                retrieveTariffModalities();

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
