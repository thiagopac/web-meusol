<div class="modal fade" id="modal_discount_create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               Cadastrar desconto
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
                  <form id="form_create_discount">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" placeholder="Ex: BASIC PLAN DISCOUNT" class="form-control" id="discount_name_create">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Descrição:
                        </label>
                        <textarea placeholder="Ex: Desconto na conta aplicado à clientes do plano BASIC" class="form-control" id="discount_description_create" ></textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Valor:
                        </label>
                        <input type="text" placeholder="Ex: 0.10 para 10% de desconto" class="form-control" id="discount_value_create">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Descontos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_discounts_created" class="box">
                 <!-- listagem dinâmica de descontos -->
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

<div class="modal fade" id="modal_discount_edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Editar desconto
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
                  <form id="form_edit_discount">
                    <input type="hidden" id="discount_id_edit">
                     <div class="form-group">
                        <label class="form-control-label">
                        Nome:
                        </label>
                        <input type="text" class="form-control" data-id="" id="discount_name_edit">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Descrição:
                        </label>
                        <textarea class="form-control" id="discount_description_edit" ></textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Valor:
                        </label>
                        <input type="text" class="form-control" id="discount_value_edit">
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Descontos cadastrados
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_discounts_edit" class="box">
                 <!-- listagem dinâmica de descontos -->
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


     $('#modal_discount_create').on('show.bs.modal', function (e) {

         $(":input[type=submit]").prop('disabled', false);

         clearCreateInputs();
         retrieveDiscounts();
     });

     $('#modal_discount_edit').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", true);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para visualizar");
         $(":input[type=submit]").prop('disabled', true);
         $(".settings-window").html("Visualizar desconto");

       }else if(dataType == "edit"){

         $(this).removeData('type');
         $("form[id*='edit'] :input").prop("disabled", false);
         $("form[id*='edit'] :input").attr("placeholder", "Escolha um registro ao lado para editar");
         $(":input[type=submit]").prop('disabled', false);
         $(".settings-window").html("Editar desconto");
       }

         clearEditInputs();
         retrieveDiscounts();
     });

     function clearCreateInputs(){
       $("#form_create_discount").each(function() { this.reset() });
     };
     function clearEditInputs(){
       $("#form_edit_discount").each(function() { this.reset() });
     };


     function retrieveDiscounts(){

       $.ajax({
         url: BASE_URL+'api/discounts',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_discounts_created").empty();
             $("#div_discounts_edit").empty();

             clearCreateInputs();
             clearEditInputs();

             if (response["discounts"].length > 0) {

               $.each(response["discounts"], function(i, discount){

                 $("#div_discounts_created").append('<div class="alert m-alert m-alert--default" role="alert"><code>'+discount.discountId+". "+discount.discountName+'</code></div>');
                 $("#div_discounts_edit").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-id="'+discount.discountId+'" data-name="'+discount.discountName+'" data-description="'+discount.discountDescription+'" data-value="'+discount.discountValue+'"><code>'+discount.discountId+". "+discount.discountName+'</code></a></div>');
               });

             }else{
               $("#div_discounts_created").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum desconto cadastrado</code></div>');
               $("#div_discounts_edit").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum desconto cadastrado</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $("#form_create_discount").off().submit(function (event) {

         var valDiscountName = $("#discount_name_create").val();
         var valDiscountDescription = $("#discount_description_create").val();
         var valDiscountValue = $("#discount_value_create").val();

         if (valDiscountName == "") {

           toastr.error("Insira o nome do desconto");
           return false;
         }

         if (valDiscountDescription == "") {

           toastr.error("Insira a descrição do desconto");
           return false;
         }

         if (valDiscountValue == "") {

           toastr.error("Insira o valor do desconto");
           return false;
         }

         $.ajax({
          url: BASE_URL+'api/create-discount',
          type: 'POST',
          contentType: 'application/json',
          dataType:"json",
          async: true,
          data: JSON.stringify({discountName: valDiscountName,
                                discountDescription: valDiscountDescription,
                                discountValue: valDiscountValue}),
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

              retrieveDiscounts();

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

     $('#div_discounts_edit').delegate('a', 'click', function(e) {
       var discount_to_edit = $(this);
       $("#discount_name_edit").val(discount_to_edit.data("name"));
       $("#discount_description_edit").val(discount_to_edit.data("description"));
       $("#discount_value_edit").val(discount_to_edit.data("value"));
       $("#discount_id_edit").val(discount_to_edit.data("id"));
       e.preventDefault();

       $("#form_edit_discount").off().submit(function (event) {

           var valDiscountId = $("#discount_id_edit").val();
           var valDiscountName = $("#discount_name_edit").val();
           var valDiscountDescription = $("#discount_description_edit").val();
           var valDiscountValue = $("#discount_value_edit").val();

           if (valDiscountName == "") {

             toastr.error("Insira o nome do desconto");
             return false;
           }

           if (valDiscountDescription == "") {

             toastr.error("Insira a descrição do desconto");
             return false;
           }

           if (valDiscountValue == "") {

             toastr.error("Insira o valor do desconto");
             return false;
           }

           $.ajax({
            url: BASE_URL+'api/edit-discount',
            type: 'PUT',
            contentType: 'application/json',
            dataType:"json",
            async: true,
            data: JSON.stringify({discountId: valDiscountId,
                                  discountName: valDiscountName,
                                  discountDescription: valDiscountDescription,
                                  discountValue: valDiscountValue}),
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

                retrieveDiscounts();

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
