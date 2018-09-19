<div class="modal fade" id="modal_subclass_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar nova subclasse
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
                  <form id="form_create_subclass">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Ex: Comercial" class="form-control" id="subclass_name_create">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Subclasses cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_subclasses_created" class="box">
                 <!-- listagem dinâmica de subclasses -->
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

<div class="modal fade" id="modal_subclass_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar subclasse
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
                  <form id="form_edit_subclass">
                    <input type="hidden" id="subclass_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Escolha uma subclasse ao lado para editar" class="form-control" data-id="" id="subclass_name_edit">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Subclasses cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_subclasses_edit" class="box">
                 <!-- listagem dinâmica de subclasses -->
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


     $('#modal_subclass_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveSubclasses();
     });

     $('#modal_subclass_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar subclasse");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar subclasse");
       }

         clearEditInputs();
         retrieveSubclasses();
     });

     function clearCreateInputs(){
       $("#form_create_subclass").each(function() { this.reset() });
     };

     function clearEditInputs(){
       $("#form_edit_subclass").each(function() { this.reset() });
     };


     function retrieveSubclasses(){

       $.ajax({
         url: BASE_URL+'api/subclasses',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_subclasses_created").empty();
             $("#div_subclasses_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["subclasses"].length > 0) {

               $.each(response["subclasses"], function(i, subclass){

                 $("#div_subclasses_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+subclass.subclassId+". "+subclass.subclassName+'</code></div>');
                 $("#div_subclasses_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+subclass.subclassId+'" data-name="'+subclass.subclassName+'"><code>'+subclass.subclassId+". "+subclass.subclassName+'</code></a></div>');
               });

             }else{
               $("#div_subclasses_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma subclasse cadastrada</code></div>');
               $("#div_subclasses_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma subclasse cadastrada</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_subclass").off().submit(function (event) {

         var valSubclassName = $("#subclass_name_create").val();

         if (valSubclassName == "") {

           toastr.error("Insira o nome da subclasse");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-subclass',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({subclassName: valSubclassName}),
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

              retrieveSubclasses();

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

     $('#div_subclasses_edit').delegate('a', 'click', function(e) {
       var subclass_to_edit = $(this);
       $("#subclass_name_edit").val(subclass_to_edit.data("name"));
       $("#subclass_id_edit").val(subclass_to_edit.data("id"));
       e.preventDefault();

       $("#form_edit_subclass").off().submit(function (event) {

           var valSubclassName = $("#subclass_name_edit").val();
           var valSubclassId = $("#subclass_id_edit").val();

           if (valSubclassName == "") {

             toastr.error("Insira o nome da subclasse");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-subclass',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({subclassName: valSubclassName, subclassId: valSubclassId}),
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

                retrieveSubclasses();

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
