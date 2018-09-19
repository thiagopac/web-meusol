<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <!-- BEGIN: Subheader -->
   <div class="m-subheader ">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
               Painel geral
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
               <li class="m-nav__item">
                  <a href="" class="m-nav__link">
                  <span class="m-nav__link-text">
                  Estatísticas
                  </span>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- END: Subheader -->
   <div class="m-content">

      <div class="row" id="m_sortable_portlets">
        <div class="col-xl-12 col-lg-12">
          <!--Begin::Portlet-->
          <div class="m-portlet m-portlet--tabs">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Produção
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--right m-tabs-line-danger" role="tablist">
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#production_daily_tab" role="tab">
                      DIA
                    </a>
                  </li>
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#production_monthly_tab" role="tab">
                      MÊS
                    </a>
                  </li>
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#production_yearly_tab" role="tab">
                      ANO
                    </a>
                  </li>
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#production_total_tab" role="tab">
                      TOTAL
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <div class="tab-pane active" id="production_daily_tab">

                  <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="input-group date">
                      <input type="text" class="form-control m-input" readonly  placeholder="08/08/2018" id="production_report_date"/>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="la la-calendar-check-o"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <!--Begin::Daily Report -->
                  <div id="production_daily_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Daily Report -->
                </div>
                <div class="tab-pane" id="production_monthly_tab">
                  <!--Begin::Monthly Report -->
                  <div id="production_monthly_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Monthly Report -->
                </div>
                <div class="tab-pane" id="production_yearly_tab">
                  <!--Begin::Yearly Report -->
                  <div id="production_yearly_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Yearly Report -->
                </div>
                <div class="tab-pane" id="production_total_tab">
                  <!--Begin::Total Report -->
                  <div id="production_total_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Total Report -->
                </div>
              </div>
            </div>
          </div>
          <!--End::Portlet-->
        </div>


        <div class="col-xl-12 col-lg-12">
          <!--Begin::Portlet-->
          <div class="m-portlet m-portlet--tabs">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Economia
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--right m-tabs-line-danger" role="tablist">
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#saving_monthly_tab" role="tab">
                      MÊS
                    </a>
                  </li>
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#saving_yearly_tab" role="tab">
                      ANO
                    </a>
                  </li>
                  <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#saving_total_tab" role="tab">
                      ACUMULADO
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <div class="tab-pane active" id="saving_monthly_tab">
                  <!--Begin::Monthly Report -->
                  <div id="saving_monthly_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Monthly Report -->
                </div>
                <div class="tab-pane" id="saving_yearly_tab">
                  <!--Begin::Yearly Report -->
                  <div id="saving_yearly_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Yearly Report -->
                </div>
                <div class="tab-pane" id="saving_total_tab">
                  <!--Begin::Total Report -->
                  <div id="saving_total_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <!--End::Total Report -->
                </div>
              </div>
            </div>
          </div>
          <!--End::Portlet-->
        </div>
      </div>

   </div>
</div>
<!-- <script src="assets/vendors/custom/jquery-ui/jquery-ui.bundle.js" type="text/javascript"></script> -->
<!-- <script src="assets/demo/default/custom/components/portlets/draggable.js" type="text/javascript"></script> -->
<script src="charts/highcharts/highcharts.js"></script>
<script src="assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="_panel/production_daily_report.js" type="text/javascript"></script>
<script src="_panel/production_monthly_report.js" type="text/javascript"></script>
<script src="_panel/production_yearly_report.js" type="text/javascript"></script>
<script src="_panel/production_total_report.js" type="text/javascript"></script>
<script src="_panel/saving_monthly_report.js" type="text/javascript"></script>
<script src="_panel/saving_yearly_report.js" type="text/javascript"></script>
<script src="_panel/saving_total_report.js" type="text/javascript"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
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
        var user = JSON.parse(sessionStorage.getItem("company"));
     }

     //------ REPORTS --------

     //production
     getProductionDailyReport("https://api.myjson.com/bins/rcui0");
     getProductionMonthlyReport("https://api.myjson.com/bins/6hmlg");
     getProductionYearlyReport("https://api.myjson.com/bins/xvkf8");
     getProductionTotalReport("https://api.myjson.com/bins/1az3qc");

     //saving
     getSavingMonthlyReport("https://api.myjson.com/bins/12q224");
     getSavingYearlyReport("https://api.myjson.com/bins/1az3qc");
     getSavingTotalReport("https://api.myjson.com/bins/m84vw");

     $("#production_report_date").datepicker({
                 todayHighlight: !0,
                 format: "dd/mm/yyyy",
                 autoclose: true,
                 orientation: "bottom left",
                 templates: {
                     leftArrow: '<i class="la la-angle-left"></i>',
                     rightArrow: '<i class="la la-angle-right"></i>'
                 }
             });

  });
</script>
