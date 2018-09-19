<div class="modal fade" id="modal_simulation_view" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title settings-window">
               Visualizar simulação
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
                      <code><label id="simulation_date_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Contato:
                       </label>
                       <code><label id="simulation_contact_email_view">-</label></code>
                    </div>
                    <div class="form-group">
                       <label class="form-control-label">
                       Status:
                       </label>
                       <code><label id="simulation_status_view">-</label></code>
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Subclasse:
                        </label>
                        <code><label id="simulation_subclass_view">-</label></code>
                     </div>
                     <div class="form-group">
                       <label class="form-control-label">
                       Modalidade tarifária:
                       </label>
                       <code><label id="simulation_tariff_modality_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Consumo médio mensal:
                        </label>
                        <code><label id="simulation_monthly_consumption_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Plano:
                        </label>
                        <code><label id="simulation_plan_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Conta de luz <small>(Antes)</small>:
                        </label>
                        <code><label id="simulation_bill_before_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Conta de luz <small>(Depois)</small>:
                        </label>
                        <code><label id="simulation_bill_after_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Custo de disponibilidade:
                        </label>
                        <code><label id="simulation_availability_cost_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Economia:
                        </label>
                        <code><label id="simulation_savings_view">-</label></code>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">
                        Economia em 12 meses:
                        </label>
                        <code><label id="simulation_year_savings_view">-</label></code>
                     </div>
               </div>
               <div class="col-md-6 col-xl-6">
               <span class="m--font-bolder">
                 Simulaçãos cadastradas
               </span>
               <div class="m-demo">
               <div class="m-demo__preview">
               <div class="m-list-timeline">
               <div id="div_simulations_view" class="box">
                 <!-- listagem dinâmica de simulações -->
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

     $('#modal_simulation_view').on('shown.bs.modal', function (e) {

       var dataType = $(this).data('type');

       if (dataType == "view"){
         $(".settings-window").html("Visualizar simulação");
         $(this).removeData('type');
         retrieveSimulations();

       }

     });

     function retrieveSimulations(){

       $.ajax({
         url: BASE_URL+'api/simulations',
         type: 'GET',
         contentType: 'application/json',
         dataType:"json",
         async: true,
         success: function (result) {
           var response = result;

           // console.log(response);

           if(response["status"] == 1){

             $("#div_simulations_view").empty();

             if (response["simulations"].length > 0) {

               $.each(response["simulations"], function(i, simulation){

                 // console.log(simulation.simulationDate);

                 $("#div_simulations_view").append('<div class="alert m-alert m-alert--default" role="alert"><a href="#" class="m-link" data-read="'+simulation.simulationRead+'" data-date="'+simulation.simulationDate+'" data-id="'+simulation.simulationId+'" data-subclass="'+simulation.subclassName+'" data-tariff-modality="'+simulation.tariffModalityName+'" data-monthly-consumption="'+simulation.simulationMonthlyConsumption+'" data-plan="'+simulation.planName+'" data-contact-email="'+simulation.simulationContactEmail+'" data-bill-before="'+simulation.billBeforeValue+'" data-bill-after="'+simulation.billAfterValue+'" data-availability-cost="'+simulation.availabilityCost+'" data-saved="'+simulation.savedValue+'" data-saved-year="'+simulation.savedInYear+'"><code>Simulação '+simulation.simulationId+'</code></a></div>');
               });

             }else{
               $("#div_simulations_view").append('<div class="alert m-alert m-alert--default" role="alert"><code> Nenhum simulação cadastrada</code></div>');
             }

           }else if(response["status"] == 2){
             //status error
           }
         }, error: function (result) {
             //network error
         }
       });

     }

     $('#div_simulations_view').delegate('a', 'click', function(e) {
       var simulation_to_view = $(this);
       $("#simulation_date_view").html(convertDateYMDHMStoDMYHMS(simulation_to_view.data("date")));
       $("#simulation_contact_email_view").html(simulation_to_view.data("contact-email"));
       $("#simulation_subclass_view").html(simulation_to_view.data("subclass"));
       $("#simulation_tariff_modality_view").html(simulation_to_view.data("tariff-modality"));
       $("#simulation_monthly_consumption_view").html(simulation_to_view.data("monthly-consumption")+" kWh");
       $("#simulation_plan_view").html(simulation_to_view.data("plan"));
       $("#simulation_bill_before_view").html("R$"+numberToReal(simulation_to_view.data("bill-before")));
       $("#simulation_bill_after_view").html("R$"+numberToReal(simulation_to_view.data("bill-after")));
       $("#simulation_availability_cost_view").html("R$"+numberToReal(simulation_to_view.data("availability-cost")));
       $("#simulation_savings_view").html("R$"+numberToReal(simulation_to_view.data("saved")));
       $("#simulation_year_savings_view").html("R$"+numberToReal(simulation_to_view.data("saved-year")));

       if (simulation_to_view.data("read") == 1) {
         $("#simulation_status_view").html("Lido");
       }else{
         $("#simulation_status_view").html("Não-lido");
       }
});


   });
</script>
