<div class="modal fade" id="modal_contact_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar novo contato
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
                  <form id="form_create_contact">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Ex: João da Silva" class="form-control" id="contact_name_create">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Email:
                        </label>
                        <input placeholder="Ex: joaosilva@dominio.com.br" class="form-control" id="contact_email_create" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Telefone:
                        </label>
                        <input placeholder="Ex: (XX)XXXXX-XXXX" class="form-control" id="contact_phone_create" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Empresa:
                        </label>
                        <select class="form-control m-input m-input--square" id="contact_company_create">
                          <option value="">Selecione…</option>
                          <!-- listagem dinâmica de empresas -->
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Contatos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_contacts_created" class="box">
                 <!-- listagem dinâmica de contatos pessoais -->
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

<div class="modal fade" id="modal_contact_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar contato
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
                  <form id="form_edit_contact">
                    <input type="hidden" id="contact_id_edit">
                    <div class="form-group">
                       <label class="form-control-label">
                       Nome:
                       </label>
                       <input type="text" placeholder="Ex: João da Silva" class="form-control" id="contact_name_edit">
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Email:
                       </label>
                       <input placeholder="Ex: joaosilva@dominio.com.br" class="form-control" id="contact_email_edit" >
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Telefone:
                       </label>
                       <input placeholder="Ex: (XX)XXXXX-XXXX" class="form-control" id="contact_phone_edit" >
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Empresa:
                       </label>
                       <select class="form-control m-input m-input--square" id="contact_company_edit">
                         <option value="">Selecione…</option>
                         <!-- listagem dinâmica de empresas -->
                     </select>
                    </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Contatos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_contacts_edit" class="box">
                 <!-- listagem dinâmica de contatos pessoais -->
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


     $('#modal_contact_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveContacts();
     });

     $('#modal_contact_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar contato");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar contato");
       }
         clearCreateInputs();
         retrieveContacts();
     });

     function clearCreateInputs(){
       //iniciar com form limpo
       $("#form_create_contact").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#contact_company_create option:not(:first)').remove();
     };

     function clearEditInputs(){
       //iniciar com form limpo
       $("#form_edit_contact").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#contact_company_edit option:not(:first)').remove();
     };


     function retrieveContacts(){

       $.ajax({
         url: BASE_URL+'api/contacts',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_contacts_created").empty();
             $("#div_contacts_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["contacts"].length > 0) {

               $.each(response["contacts"], function(i, contact){
                 $("#div_contacts_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+contact.contactId+". "+contact.contactName+'</code></div>');
                 $("#div_contacts_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+contact.contactId+'" data-name="'+contact.contactName+'" data-email="'+contact.contactEmail+'" data-phone="'+contact.contactPhone+'" data-company-id="'+contact.companyId+'"><code>'+contact.contactId+". "+contact.contactName+'</code></a></div>');
               });

               $.each(response["companies"], function(i, discount){
                 $("#contact_company_create").append($("<option />").val(this.companyId).text(this.companyName));
                 $("#contact_company_edit").append($("<option />").val(this.companyId).text(this.companyName));
               });

             }else{
               $("#div_contacts_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum contato cadastrado</code></div>');
               $("#div_contacts_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum contato cadastrado</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_contact").off().submit(function (event) {

         var valContactName = $("#contact_name_create").val();
         var valContactEmail = $("#contact_email_create").val();
         var valContactPhone = $("#contact_phone_create").val();
         var valContactCompany = $("#contact_company_create").val();

         if (valContactName == "") {

           toastr.error("Insira o nome do contato");
           return false;
         }

         if (valContactEmail == "") {

           toastr.error("Insira o e-mail do contato");
           return false;
         }

         if (valContactPhone == "") {

           toastr.error("Insira o telefone do contato");
           return false;
         }

         if (valContactCompany == "") {

           toastr.error("Selectione a empresa");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-contact',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({contactName: valContactName,
                                contactEmail: valContactEmail,
                                contactPhone: valContactPhone,
                                companyId: valContactCompany}),
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

              retrieveContacts();

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

     $('#div_contacts_edit').delegate('a', 'click', function(e) {
       var contact_to_edit = $(this);
       $("#contact_name_edit").val(contact_to_edit.data("name"));
       $("#contact_email_edit").val(contact_to_edit.data("email"));
       $("#contact_phone_edit").val(contact_to_edit.data("phone"));
       $("#contact_id_edit").val(contact_to_edit.data("id"));

       // desselecionar todos os options antes de selectionar a empresa do contato
       $('#contact_company_edit option').removeAttr("selected");

       // selectionar a empresa correta
       $('#contact_company_edit option[value="'+contact_to_edit.data("company-id")+'"]').attr("selected",true);

       e.preventDefault();

       $("#form_edit_contact").off().submit(function (event) {

           var valContactId = $("#contact_id_edit").val();
           var valContactName = $("#contact_name_edit").val();
           var valContactEmail = $("#contact_email_edit").val();
           var valContactPhone = $("#contact_phone_edit").val();
           var valContactCompany = $("#contact_company_edit").val();

           if (valContactName == "") {

             toastr.error("Insira o nome do contato");
             return false;
           }

           if (valContactEmail == "") {

             toastr.error("Insira o e-mail do contato");
             return false;
           }

           if (valContactPhone == "") {

             toastr.error("Insira o telefone do contato");
             return false;
           }

           if (valContactCompany == "") {

             toastr.error("Selectione a empresa");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-contact',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({contactId: valContactId,
                                  contactName: valContactName,
                                  contactEmail: valContactEmail,
                                  contactPhone: valContactPhone,
                                  companyId: valContactCompany}),
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

                retrieveContacts();

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
