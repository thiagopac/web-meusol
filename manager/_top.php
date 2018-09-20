<header id="m_header" class="m-grid__item    m-header "  m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200" >
  <div class="m-container m-container--fluid m-container--full-height">
    <div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">
      <!-- BEGIN: Brand -->
      <div class="m-stack__item m-brand m-brand--mobile">
        <div class="m-stack m-stack--ver m-stack--general">
          <div class="m-stack__item m-stack__item--middle m-brand__logo">
            <a href="index.html" class="m-brand__logo-wrapper">
              <img alt="" src="assets/app/media/img/logos/logo-small.png"/>
            </a>
          </div>
          <div class="m-stack__item m-stack__item--middle m-brand__tools">
            <!-- BEGIN: Responsive Header Menu Toggler -->
            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler">
              <span></span>
            </a>
            <!-- END -->
          </div>
        </div>
      </div>
      <!-- END: Brand -->
      <div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav" style="visibility:hidden">
        <div class="m-stack m-stack--ver m-stack--desktop">

          <div class="m-stack__item m-stack__item--fluid">
            <!-- BEGIN: Horizontal Menu -->
            <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
              <i class="la la-close"></i>
            </button>

            <!-- begin::Menu -->
        		<?php include("_menu.php"); ?>
        		<!-- end::Menu -->

          </div>
        </div>
      </div>
      <div class="m-stack__item m-stack__item--middle m-stack__item--center">
        <!-- BEGIN: Brand -->
        <img alt="" src="assets/app/media/img/logos/logo-l.png"/>
        <!-- END: Brand -->
      </div>
      <div class="m-stack__item m-stack__item--right">
        <!-- BEGIN: Topbar -->
        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
          <div class="m-stack__item m-topbar__nav-wrapper">
            <ul class="m-topbar__nav m-nav m-nav--inline">

              <li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                  <span class="m-topbar__username m--hidden-mobile">
                    <i class="m-menu__hor-arrow fa fa-chevron-down" style="vertical-align: middle"></i>&nbsp;
                    <!-- <span id="labelUserEmail">Email</span> -->
                  </span>
                  <span class="m-topbar__userpic">
                    <img src="assets/app/media/img/users/avatar-placeholder.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                  </span>
                  <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                    <span class="m-nav__link-icon-wrapper">
                      <i class="flaticon-user-ok"></i>
                    </span>
                  </span>
                </a>
                <div class="m-dropdown__wrapper">
                  <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__header m--align-center">
                      <div class="m-card-user m-card-user--skin-light">
                        <div class="m-card-user__pic">
                          <img src="assets/app/media/img/users/avatar-placeholder.jpg" class="m--img-rounded m--marginless" alt=""/>
                        </div>
                        <div class="m-card-user__details">
                          <span class="m-card-user__name m--font-weight-500">
                            <span id="labelCompanyCnpj">CNPJ</span>
                          </span>
                          <a href="" class="m-card-user__email m--font-weight-300 m-link">
                            <span id="labelUserEmail2">Email</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="m-dropdown__body">
                      <div class="m-dropdown__content">
                        <ul class="m-nav m-nav--skin-light">
                          <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">

                            </span>
                          </li>
                          <li class="m-nav__item">
                            <a href="main?page=panel" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-diagram"></i>
                              <span class="m-nav__link-title">
                                <span class="m-nav__link-wrap">
                                  <span class="m-nav__link-text">
                                    Painel geral
                                  </span>
                                </span>
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__item">
                            <a href="main?page=contract" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-file"></i>
                              <span class="m-nav__link-title">
                                <span class="m-nav__link-wrap">
                                  <span class="m-nav__link-text">
                                    Contrato
                                  </span>
                                </span>
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__item">
                            <a href="main?page=plan" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-coins"></i>
                              <span class="m-nav__link-text">
                                Plano
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__separator m-nav__separator--fit"></li>
                          <li class="m-nav__item">
                            <a href="main?page=referral" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-paper-plane"></i>
                              <span class="m-nav__link-text">
                                Indique clientes
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__item">
                            <a href="main?page=support" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                              <span class="m-nav__link-text">
                                Suporte
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__separator m-nav__separator--fit"></li>
                          <li class="m-nav__item">
                            <a href="javascript:;" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" id="btnLogout">
                              Logout
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- END: Topbar -->
      </div>
    </div>
  </div>
</header>
<script>
   jQuery(document).ready(function() {

     if(sessionStorage.getItem("company")){
        var company = JSON.parse(sessionStorage.getItem("company"));
        $('#labelCompanyCnpj').html(stringToCnpj(company.companyCnpj));
     }

   	if(sessionStorage.getItem("user")){
       var user = JSON.parse(sessionStorage.getItem("user"));
       $('#labelUserEmail').html(user.userEmail);
       $('#labelUserEmail2').html(user.userEmail);
   	}else{
       //se não tiver os dados do usuário, enviar para página de login
       location.href = "./login";
     }

     if(sessionStorage.getItem("contract")){
        var contract = JSON.parse(sessionStorage.getItem("contract"));
     }

     if (user.userRole != 1) {
       $("#modals").empty();
     }

     $("#btnLogout").click(function () {
       //apagar dados da sessão do admin e enviar para página de login
       sessionStorage.removeItem("user");
       sessionStorage.removeItem("company");
       location.href = "./login";
     });

   });
</script>
