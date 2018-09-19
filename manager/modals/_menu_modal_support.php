<div class="modal fade" id="modal_support_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar chamado
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
                  <form id="form_edit_support">
                    <input type="hidden" id="support_id_edit">
                    <div class="form-group">
                      <label class="form-control-label">
                      Data:
                      </label>
                      <code><label id="support_date_edit">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Empresa:
                       </label>
                       <code><label id="support_company_edit">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Urgência:
                       </label>
                       <select class="form-control m-input m-input--square" id="support_urgency_edit">
                         <option value="">Selecione...</option>
                         <option value="0">Baixo</option>
                         <option value="1">Normal</option>
                         <option value="2">Alto</option>
                         <option value="3">Urgente</option>
                     </select>
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Área:
                        </label>
                        <select class="form-control m-input m-input--square" id="support_subject_edit">
                          <option value="">Selecione...</option>
                          <!-- listagem dinâmica de areas -->
											</select>
                     </div>
                     <div class="form-group">
                       <label class="form-control-label">
                       Mensagem:
                       </label>
                       <textarea placeholder="Escolha um registro ao lado" class="form-control" id="support_message_edit" ></textarea>
                     </div>
                     <div class="form-group">
                       <label class="form-control-label">
                       Solução:
                       </label>
                       <textarea placeholder="Escolha um registro ao lado" class="form-control" id="support_solution_edit" ></textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Resolvido:
                        </label>
                        <select class="form-control m-input m-input--square" id="support_solved_edit">
                          <option value="">Selecione...</option>
                          <option value="0">Não</option>
                          <option value="1">Sim</option>
											</select>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Chamados cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_supports_edit" class="box">
                 <!-- listagem dinâmica de chamados -->
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

     $('#modal_support_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar chamado");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar chamado");
       }

         retrieveSupports();
     });


     function clearEditInputs(){
       //iniciar com form limpo
       $("#form_edit_support").each(function() { this.reset() });

       //limpar o select para não acumular registros anteriores
       $('#support_subject_edit option:not(:first)').remove();

       $("select").each(function() { this.selectedIndex = 0; });
       $("#support_company_edit").html("-");
       $("#support_date_edit").html("-");
     };


     function retrieveSupports(){

       $.ajax({
         url: BASE_URL+'api/supports',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_supports_edit").empty();

             clearEditInputs();

             if (response["supports"].length > 0) {

               $.each(response["supports"], function(i, support){
                 var solved = support.supportSolved == 0 ? "Não-resolvido" : "Resolvido";
                 $("#div_supports_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+support.supportId+'" data-subject-id="'+support.supportSubjectId+'" data-message="'+support.supportMessage+'" data-company-id="'+support.companyId+'" data-company-name="'+support.companyName+'" data-date="'+support.supportDate+'" data-read="'+support.supportRead+'" data-solution="'+support.supportSolution+'" data-solved="'+support.supportSolved+'" data-urgency="'+support.supportUrgency+'"><code>'+support.supportId+'. '+support.companyName+' <small>('+solved+')</small></code></a></div>');
               });

               $.each(response["supportSubjects"], function(i, discount){
                 $("#support_subject_edit").append($("<option />").val(this.supportSubjectId).text(this.supportSubjectName));
               });

             }else{
               $("#div_supports_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum chamado cadastrado</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $('#div_supports_edit').delegate('a', 'click', function(e) {
       var support_to_edit = $(this);
       $("#support_id_edit").val(support_to_edit.data("id"));
       $("#support_message_edit").val(support_to_edit.data("message"));
       $("#support_solution_edit").val(support_to_edit.data("solution"));
       $("#support_date_edit").html(support_to_edit.data("date"));
       $("#support_company_edit").html(support_to_edit.data("company-name"));

       // desselecionar todos os options antes de selectionar os valores do chamado
       $('#support_subject_edit option').removeAttr("selected");
       $('#support_solved_edit option').removeAttr("selected");
       $('#support_urgency_edit option').removeAttr("selected");

       // selectionar os valores corretos
       $('#support_subject_edit option[value="'+support_to_edit.data("subject-id")+'"]').attr("selected",true);
       $('#support_solved_edit option[value="'+support_to_edit.data("solved")+'"]').attr("selected",true);
       $('#support_urgency_edit option[value="'+support_to_edit.data("urgency")+'"]').attr("selected",true);

       e.preventDefault();

       $("#form_edit_support").off().submit(function (event) {

           var valSupportId = $("#support_id_edit").val();
           var valSupportMessage = $("#support_message_edit").val();
           var valSupportSolution = $("#support_solution_edit").val();
           var valSupportSubject = $("#support_subject_edit").val();
           var valSupportSolved = $("#support_solved_edit").val();
           var valSupportUrgency = $("#support_urgency_edit").val();

           if (valSupportMessage == "") {

             toastr.error("Insira a mensagem do chamado");
             return false;
           }

           if (valSupportSubject == "") {

             toastr.error("Insira a área do chamado");
             return false;
           }

           if (valSupportSolved == "") {

             toastr.error("Selecione se o chamado está resolvido");
             return false;
           }

           if (valSupportUrgency == "") {

             toastr.error("Selecione a urgência do chamado");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-support',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({supportId: valSupportId,
                                  supportMessage: valSupportMessage,
                                  supportSolution: valSupportSolution,
                                  subjectId: valSupportSubject,
                                  supportSolved: valSupportSolved,
                                  supportUrgency: valSupportUrgency}),
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

         event.preventDefault();

       });
});


   });
</script>
