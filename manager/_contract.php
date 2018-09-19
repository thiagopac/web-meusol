<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <!-- BEGIN: Subheader -->
   <div class="m-subheader ">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
               Contrato
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
               <li class="m-nav__item">
                  <a href="" class="m-nav__link">
                  <span class="m-nav__link-text">
                  Situação do contrato
                  </span>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- END: Subheader -->
   <div class="m-content">

      <div class="row">
        <div class="col-xl-6">
          <!--begin:: Widgets/Company Summary-->
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Dados do contrato
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="m-widget13">
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    Empresa
                  </span>
                  <span class="m-widget13__text">
                    <span id="label_company_name">-</span>
                  </span>
                </div>
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    CNPJ:
                  </span>
                  <span class="m-widget13__text">
                    <span id="label_company_cnpj">-</span>
                  </span>
                </div>
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    Plano
                  </span>
                  <span class="m-widget13__text">
                    <span id="label_plan_name">-</span> <small>(<a href="main?page=plan" class="m-link" style="font-weight: lighter">Alterar plano</a>)</small>
                  </span>
                </div>
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    Início do contrato:
                  </span>
                  <span class="m-widget13__text m-widget13__text-bolder">
                    <span id="label_contract_start">-</span>
                  </span>
                </div>
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    Fim do contrato:
                  </span>
                  <span class="m-widget13__text m-widget13__text-bolder">
                    <span id="label_contract_end">-</span>
                  </span>
                </div>
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    Status:
                  </span>
                  <span class="m-widget13__text m-widget13__text-bolder m--font-transform-u">
                    <span id="label_contract_status">-</span>
                  </span>
                </div>
                <div class="m-widget13__item">
                  <span class="m-widget13__desc m--align-right">
                    Vigência:
                  </span>
                  <span class="m-widget13__text m-widget13__text-bolder m--font-transform-u">
                    <span id="label_contract_validity">-</span>
                  </span>
                </div>
                <div class="m-widget13__action m--align-right">
                  <button type="button" class="m-widget__detalis btn m-btn--pill  btn-danger">
                    Cancelar contrato
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!--end:: Widgets/Company Summary-->
        </div>
        <div class="col-xl-6">
          <!--begin:: Widgets/Sales States-->
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Mensalidades
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="m-widget6">
                <div class="m-widget6__head">
                  <div class="m-widget6__item">
                    <span class="m-widget6__caption">
                      Mês / Ano
                    </span>
                    <span class="m-widget6__caption m--align-right">
                      Valor
                    </span>
                    <span class="m-widget6__caption m--align-right">
                      Situação
                    </span>
                  </div>
                </div>
                <div class="m-widget6__body" id="div_monthly_payment">
                  <!-- Valores dinâmicos de mensalidades -->
                </div>
                <div class="m-widget13__action m--align-right">
                  <button href="#" class="m-widget__detalis btn m-btn--pill btn-brand" data-toggle="modal" data-target="#m_modal_1_2">Exibir lista completa</button>
                </div>
              </div>
            </div>

          </div>
          <!--end:: Widgets/Sales States-->
        </div>
      </div>
      <!--begin::Modal-->
      						<div class="modal fade" id="m_modal_1_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      							<div class="modal-dialog" role="document">
      								<div class="modal-content">
      									<div class="modal-header">
      										<h5 class="modal-title" id="exampleModalLabel">
      											Mensalidades
      										</h5>
      										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      											<span aria-hidden="true">
      												&times;
      											</span>
      										</button>
      									</div>
      									<div class="modal-body">
      										<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="600">
                            <div class="m-widget6">
                              <div class="m-widget6__head">
                                <div class="m-widget6__item">
                                  <span class="m-widget6__caption">
                                    Mês / Ano
                                  </span>
                                  <span class="m-widget6__caption m--align-right">
                                    Valor
                                  </span>
                                  <span class="m-widget6__caption m--align-right">
                                    Situação
                                  </span>
                                </div>
                              </div>
                              <div class="m-widget6__body" id="div_monthly_payment_modal">
                                <!-- Valores dinâmicos de mensalidades -->
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
      						<!--end::Modal-->
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

     $("#label_company_name").text(contract.companyName);
     $("#label_company_cnpj").text(stringToCnpj(contract.companyCnpj));
     $("#label_plan_name").text(contract.planName);
     $("#label_contract_start").text(convertDateYMDtoDMY(contract.contractStart));
     $("#label_contract_end").text(convertDateYMDtoDMY(contract.contractEnd));
     $("#label_contract_status").text(contract.contractStatus);

     //END OF CONTRACT IS IN FUTURE OR PAST: 0 IS FUTURE 1 IS PAST
     if (compareDateWithToday(contract.contractEnd) == false) {
       $("#label_contract_validity").text("VÁLIDO");
     }else{
       $("#label_contract_validity").text("EXPIRADO");
       $("#label_contract_validity").addClass("m--font-danger");
     }

     let qtyResults = 7;

    $.ajax({
      url: BASE_URL+'api/financial/retrieve-monthly-payment/'+company.companyId+'/'+qtyResults,
      type: 'GET',
      contentType: 'application/json',
      dataType:"json",
      async: true,
      success: function (result) {
        var response = result;

        // console.log(response);

        if(response["status"] == 1){

          $.each(response["financial"], function(i, monthlyPayment){

            var status = monthlyPayment.financialQuitDate == null ? "<span class='m--font-danger'>Em aberto</span>" : "Pago";

            $("#div_monthly_payment").append('<div class="m-widget6__item"> <span class="m-widget6__text"> '+monthlyPayment.financialMonth+'/'+monthlyPayment.financialYear+' </span> <span class="m-widget6__text m--align-right m--font-boldest m--font-brand"> R$'+numberToReal(monthlyPayment.financialValue)+' </span> <span class="m-widget6__text m--align-right"> '+status+' </span> </div>');
          });


        }else if(response["status"] == 2){
          //status error
        }
      }, error: function (result) {
          //network error
      }
    });

    $.ajax({
      url: BASE_URL+'api/financial/retrieve-monthly-payment/'+company.companyId+'/'+1000,
      type: 'GET',
      contentType: 'application/json',
      dataType:"json",
      async: true,
      success: function (result) {
        var response = result;

        // console.log(response);

        if(response["status"] == 1){

          $.each(response["financial"], function(i, monthlyPayment){

            var status = monthlyPayment.financialQuitDate == null ? "<span class='m--font-danger'>Em aberto</span>" : "Pago";

            $("#div_monthly_payment_modal").append('<div class="m-widget6__item"> <span class="m-widget6__text"> '+monthlyPayment.financialMonth+'/'+monthlyPayment.financialYear+' </span> <span class="m-widget6__text m--align-right m--font-boldest m--font-brand"> R$'+numberToReal(monthlyPayment.financialValue)+' </span> <span class="m-widget6__text m--align-right"> '+status+' </span> </div>');
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
