<div class="modal fade" id="modal_booking_view" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Visualizar reserva
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
                    <div class="form-group">
                      <label class="form-control-label">
                      Data:
                      </label>
                      <code><label id="booking_date_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Empresa:
                       </label>
                       <code><label id="booking_company_name_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       CNPJ:
                       </label>
                       <code><label id="booking_cnpj_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       N° da inst. consumidora:
                       </label>
                       <code><label id="booking_installation_consumer_phone_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Responsável:
                       </label>
                       <code><label id="booking_responsible_name_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       E-mail:
                       </label>
                       <code><label id="booking_responsible_email_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Telefone:
                       </label>
                       <code><label id="booking_responsible_phone_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Cliente:
                       </label>
                       <code><label id="booking_customer_view">-</label></code>
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Regra tarifária:
                        </label>
                        <code><label id="booking_tariff_rule_view">-</label></code>
                     </div>
                     <div class="form-group">
                       <label class="form-control-label">
                       Plano:
                       </label>
                       <code><label id="booking_plan_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Aprovação:
                        </label>
                        <code><label id="booking_approved_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Status de Aceite:
                        </label>
                        <code><label id="booking_accepted_view">-</label></code>
                     </div>

               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Reservas cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_bookings_view" class="box">
                 <!-- listagem dinâmica de reservas -->
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

     $('#modal_booking_view').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){

         $(this).removeData('type');
         retrieveBookings();
         $(".settings-window").html("Visualizar reserva");
       }

     });

     function retrieveBookings(){

       $.ajax({
         url: BASE_URL+'api/bookings',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_bookings_view").empty();

             if (response["bookings"].length > 0) {

               $.each(response["bookings"], function(i, booking){

                 // console.log(booking.bookingDate);

                 $("#div_bookings_view").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-cnpj="'+booking.bookingCnpj+'" data-company-name="'+booking.bookingCompanyName+'" data-installation-consumer="'+booking.bookingInstalationConsumer+'" data-date="'+booking.bookingDate+'" data-id="'+booking.bookingId+'" data-subclass="'+booking.subclassName+'" data-tariff-modality="'+booking.tariffModalityName+'" data-tariff="'+booking.tariffValue+'" data-plan="'+booking.planName+'" data-responsible-email="'+booking.bookingResponsibleEmail+'" data-responsible-phone="'+booking.bookingResponsiblePhone+'" data-responsible-name="'+booking.bookingResponsibleName+'" data-customer="'+booking.bookingCustomer+'" data-approved="'+booking.bookingApproved+'" data-accepted="'+booking.bookingAccepted+'"><code>'+booking.bookingId+'. <small>Reserva:</small> '+booking.bookingCompanyName+'</code></a></div>');
               });

             }else{
               $("#div_bookings_view").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhuma reserva cadastrada</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $('#div_bookings_view').delegate('a', 'click', function(e) {
       var booking_to_view = $(this);
       $("#booking_date_view").html(convertDateYMDHMStoDMYHMS(booking_to_view.data("date")));
       $("#booking_responsible_email_view").html(booking_to_view.data("responsible-email"));
       $("#booking_cnpj_view").html(stringToCnpj(booking_to_view.data("cnpj")));
       $("#booking_company_name_view").html(booking_to_view.data("company-name"));
       $("#booking_plan_view").html(booking_to_view.data("plan"));
       $("#booking_installation_consumer_phone_view").html(booking_to_view.data("installation-consumer"));
       $("#booking_responsible_name_view").html(booking_to_view.data("responsible-name"));
       $("#booking_responsible_email_view").html(booking_to_view.data("responsible-email"));
       $("#booking_responsible_phone_view").html(booking_to_view.data("responsible-phone"));
       $("#booking_plan_view").html(booking_to_view.data("plan"));
       $("#booking_tariff_rule_view").html(booking_to_view.data("subclass")+" + "+booking_to_view.data("tariff-modality")+" = "+booking_to_view.data("tariff"));

       if (booking_to_view.data("customer") == 1) {
         $("#booking_customer_view").html("Sim");
       }else{
         $("#booking_customer_view").html("Não");
       }

       if (booking_to_view.data("accepted") == 1) {
         $("#booking_accepted_view").html("Sim");
       }else{
         $("#booking_accepted_view").html("Não");
       }

       if (booking_to_view.data("approved") == 1) {
         $("#booking_approved_view").html("Sim");
       }else{
         $("#booking_approved_view").html("Não");
       }
});


   });
</script>
