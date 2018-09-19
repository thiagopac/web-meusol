<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <!-- BEGIN: Subheader -->
   <div class="m-subheader ">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
               Plano
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
               <li class="m-nav__item">
                  <a href="" class="m-nav__link">
                  <span class="m-nav__link-text">
                  Plano de pagamento
                  </span>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- END: Subheader -->
   <div class="m-content" id="div_plans">



   </div>
</div>
<script>
   $(document).ready(function() {

     // --------------------------------------------------------------------------------
     //BASE URL

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

     $.ajax({
       url: BASE_URL+'api/plans',
       type: 'GET',
       contentType: 'application/json',
       dataType:"json",
       async: true,
       success: function (result) {
         var response = result;

         // console.log(response);

         if(response["status"] == 1){

           //reordenando o array para mostrar na ordem decrescente dos planos, mostrando PREMIUM em primeiro
           response["plans"].sort(function(obj1, obj2) { return obj1.planId + obj1.planId;});

           $.each(response["plans"], function(i, plan){

             var currentPlanBadge = plan.planId == contract.planId ? '<span class="m-badge m-badge--info m-badge--wide">Assinado</span>' : '';
             var collapsed = plan.planId != contract.planId ? 'm-portlet--collapsed' : '';
             var buttonGetPlan = plan.planId != contract.planId ? '<button type="submit" class="btn btn-brand"> Assinar plano </button>' : '<button disabled type="submit" class="btn btn-brand" style="cursor:not-allowed"> Assinar plano </button>';

             $("#div_plans").append('<div class="row" id="row_plan" data-id="0"> <div class="col-xl-12"> <div class="m-portlet m-portlet--head-sm " m-portlet="true" id="m_portlet_tools_3"> <div class="m-portlet__head"> <div class="m-portlet__head-caption"> <div class="m-portlet__head-title"> <span class="m-portlet__head-icon"><i class="flaticon-coins"></i></span> <h3 class="m-portlet__head-text"><span class="m--font-transform-u" id="label_plan_name">'+plan.planName+'</span> '+currentPlanBadge+'</h3> </div></div></div><div class="m-portlet__body" m-hidden-height="348" style=""> <div class="m-widget12"> <div class="m-widget12__item"> <span class="m-widget12__text1"> Tempo de duração <br><span id="label_plan_duration">'+plan.planDuration+' meses</span> </span> </div><div class="m-widget12__item"> <span class="m-widget12__text1"> Desconto na conta <br><span id="label_plan_discount">'+plan.planDiscount*100+
             '%</span> </span> </div></div></div><div class="m-portlet__foot"> <div class="row align-items-center"> <div class="col-lg-6 m--valign-middle"> </div><div class="col-lg-6 m--align-right"> '+buttonGetPlan+' </div></div></div></div></div></div>');
           });



         }else if(response["status"] == 2){
           //status error
         }
       }, error: function (result) {
           //network error
       }
     });


  });
</script>
