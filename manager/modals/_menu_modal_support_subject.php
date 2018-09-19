<div class="modal fade" id="modal_support_subject_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar área de suporte
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
                  <form id="form_create_support_subject">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Ex: Comercial" class="form-control" id="support_subject_name_create">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Descrição:
                        </label>
                        <textarea placeholder="Ex: Área de suporte de dúvidas ou problemas comerciais" class="form-control" id="support_subject_description_create" ></textarea>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Áreas de suporte cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_support_subjects_created" class="box">
                 <!-- listagem dinâmica de áreas de suporte -->
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

<div class="modal fade" id="modal_support_subject_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar área de suporte
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
                  <form id="form_edit_support_subject">
                    <input type="hidden" id="support_subject_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" class="form-control" data-id="" id="support_subject_name_edit">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Descrição:
                        </label>
                        <textarea class="form-control" id="support_subject_description_edit" ></textarea>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Áreas de suporte cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_support_subjects_edit" class="box">
                 <!-- listagem dinâmica de áreas de suporte -->
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


     $('#modal_support_subject_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveSupportSubjects();
     });

     $('#modal_support_subject_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar área de suporte");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar área de suporte");
       }

         clearEditInputs();
         retrieveSupportSubjects();
     });

     function clearCreateInputs(){
       $("#form_create_support_subject").each(function() { this.reset() });
     };
     function clearEditInputs(){
       $("#form_edit_support_subject").each(function() { this.reset() });
     };


     function retrieveSupportSubjects(){

       $.ajax({
         url: BASE_URL+'api/support-subjects',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_support_subjects_created").empty();
             $("#div_support_subjects_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["supportSubjects"].length > 0) {

               $.each(response["supportSubjects"], function(i, supportSubject){

                 $("#div_support_subjects_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+supportSubject.supportSubjectId+". "+supportSubject.supportSubjectName+'</code></div>');
                 $("#div_support_subjects_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+supportSubject.supportSubjectId+'" data-name="'+supportSubject.supportSubjectName+'" data-description="'+supportSubject.supportSubjectDescription+'"><code>'+supportSubject.supportSubjectId+". "+supportSubject.supportSubjectName+'</code></a></div>');
               });

             }else{
               $("#div_support_subjects_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma área de suporte cadastrada</code></div>');
               $("#div_support_subjects_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma área de suporte cadastrada</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_support_subject").off().submit(function (event) {

         var valSupportSubjectName = $("#support_subject_name_create").val();
         var valSupportSubjectDescription = $("#support_subject_description_create").val();

         if (valSupportSubjectName == "") {

           toastr.error("Insira o nome da área de suporte");
           return false;
         }

         if (valSupportSubjectDescription == "") {

           toastr.error("Insira a descrição da área de suporte");
           return false;
         }


         $.ajax({
          url: BASE_URL+'api/create-support-subject',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({supportSubjectName: valSupportSubjectName,
                                supportSubjectDescription: valSupportSubjectDescription}),
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

              retrieveSupportSubjects();

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

     $('#div_support_subjects_edit').delegate('a', 'click', function(e) {
       var support_subject_to_edit = $(this);
       $("#support_subject_name_edit").val(support_subject_to_edit.data("name"));
       $("#support_subject_description_edit").val(support_subject_to_edit.data("description"));
       $("#support_subject_id_edit").val(support_subject_to_edit.data("id"));
       e.preventDefault();

       $("#form_edit_support_subject").off().submit(function (event) {

           var valSupportSubjectId = $("#support_subject_id_edit").val();
           var valSupportSubjectName = $("#support_subject_name_edit").val();
           var valSupportSubjectDescription = $("#support_subject_description_edit").val();

           if (valSupportSubjectName == "") {

             toastr.error("Insira o nome da área de suporte");
             return false;
           }

           if (valSupportSubjectDescription == "") {

             toastr.error("Insira a descrição da área de suporte");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-support-subject',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({supportSubjectId: valSupportSubjectId,
                                  supportSubjectName: valSupportSubjectName,
                                  supportSubjectDescription: valSupportSubjectDescription}),
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

                retrieveSupportSubjects();

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
