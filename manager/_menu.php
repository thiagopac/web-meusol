<?php
   // $page = $_GET["page"];
   // $activeItem = "m-menu__item--active";
?>
   <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
     <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
       <li class="m-menu__item  m-menu__item--active  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" aria-haspopup="true">
         <a  href="javascript:;" class="m-menu__link m-menu__toggle">
           <span class="m-menu__item-here"></span>
           <i class="m-menu__link-icon flaticon-squares text-white"></i>
           <span class="m-menu__link-text">
             <img style="margin-bottom: 2px !important;" alt="" src="assets/app/media/img/logos/menu.png"/>
           </span>
           <i class="m-menu__hor-arrow la la-angle-down"></i>
           <i class="m-menu__ver-arrow la la-angle-right"></i>
         </a>
         <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
           <span class="m-menu__arrow m-menu__arrow--adjust"></span>
           <ul class="m-menu__subnav">
             <!-- <li class="m-menu__item"  aria-haspopup="true">
               <a  href="main?page=panel" class="m-menu__link ">
                 <i class="m-menu__link-icon flaticon-diagram"></i>
                 <span class="m-menu__link-title">
                   <span class="m-menu__link-wrap">
                     <span class="m-menu__link-text">
                       Painel geral
                     </span>
                   </span>
                 </span>
               </a>
             </li> -->

             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-list-3"></i>
                 <span class="m-menu__link-text">
                   Tarifas
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar tarifa
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar tarifa
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar tarifa
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-interface-5"></i>
                 <span class="m-menu__link-text">
                   Modalidades Tarifárias
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_modality_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar mod. tarifária
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_modality_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar mod. tarifária
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_modality_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar mod. tarifária
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-map-location"></i>
                 <span class="m-menu__link-text">
                   Subclasses
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_subclass_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar subclasse
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_subclass_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar subclasse
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_subclass_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar subclasse
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-piggy-bank"></i>
                 <span class="m-menu__link-text">
                   Descontos
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_discount_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar desconto
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_discount_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar desconto
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_discount_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar desconto
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-coins"></i>
                 <span class="m-menu__link-text">
                   Planos
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_plan_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar plano
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_plan_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar plano
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_plan_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar plano
                       </span>
                     </a>
                   </li> <li class="m-menu__section">
                      <hr/>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
 																		<a href="javascript:;" class="m-menu__link m-menu__toggle">
 																			<span class="m-menu__link-text">
 																				Itens do plano
 																			</span>
 																			<i class="m-menu__hor-arrow la la-angle-right"></i>
 																			<i class="m-menu__ver-arrow la la-angle-right"></i>
 																		</a>
 																		<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
 																			<span class="m-menu__arrow "></span>
 																			<ul class="m-menu__subnav">
                                         <li class="m-menu__item" aria-haspopup="true">
                                           <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_plan_detail_edit" data-type="view">
                                             <span class="m-menu__link-text">
                                               Visualizar itens
                                             </span>
                                           </a>
                                         </li>
                                         <li class="m-menu__item" aria-haspopup="true">
                                          <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_plan_detail_create" data-type="create">
                                             <span class="m-menu__link-text">
                                               Cadastrar item
                                             </span>
                                           </a>
                                         </li>
                                         <li class="m-menu__item" aria-haspopup="true">
                                           <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_plan_detail_edit" data-type="edit">
                                             <span class="m-menu__link-text">
                                               Editar item
                                             </span>
                                           </a>
                                         </li>
 																			</ul>
 																		</div>
 																	</li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-interface-3"></i>
                 <span class="m-menu__link-text">
                   Regras tarifárias
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_rule_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar regra tarifária
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_rule_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar regra tarifária
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_tariff_rule_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar regra tarifária
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-suitcase"></i>
                 <span class="m-menu__link-text">
                   Empresas
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_company_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar empresa
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                    <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_company_create" data-type="create">
                       <span class="m-menu__link-text">
                         Cadastrar empresa
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_company_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar empresa
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__section">
                     <hr/>
                   </li>
                   <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="javascript:;" class="m-menu__link m-menu__toggle">
																			<span class="m-menu__link-text">
																				Contatos pessoais
																			</span>
																			<i class="m-menu__hor-arrow la la-angle-right"></i>
																			<i class="m-menu__ver-arrow la la-angle-right"></i>
																		</a>
																		<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
																			<span class="m-menu__arrow "></span>
																			<ul class="m-menu__subnav">
                                        <li class="m-menu__item" aria-haspopup="true">
                                          <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_contact_edit" data-type="view">
                                            <span class="m-menu__link-text">
                                              Visualizar contato
                                            </span>
                                          </a>
                                        </li>
                                        <li class="m-menu__item" aria-haspopup="true">
                                         <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_contact_create" data-type="create">
                                            <span class="m-menu__link-text">
                                              Cadastrar contato
                                            </span>
                                          </a>
                                        </li>
                                        <li class="m-menu__item" aria-haspopup="true">
                                          <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_contact_edit" data-type="edit">
                                            <span class="m-menu__link-text">
                                              Editar contato
                                            </span>
                                          </a>
                                        </li>
																			</ul>
																		</div>
																	</li>
                                  <li class="m-menu__section">
                                    <hr/>
                                  </li>
                                  <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                    <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                      <span class="m-menu__link-text">
                                        Contratos
                                      </span>
                                      <i class="m-menu__hor-arrow la la-angle-right"></i>
                                      <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                      <span class="m-menu__arrow "></span>
                                      <ul class="m-menu__subnav">
                                        <li class="m-menu__item" aria-haspopup="true">
                                          <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_contract_edit" data-type="view">
                                            <span class="m-menu__link-text">
                                              Visualizar contrato
                                            </span>
                                          </a>
                                        </li>
                                        <li class="m-menu__item" aria-haspopup="true">
                                         <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_contract_create" data-type="create">
                                            <span class="m-menu__link-text">
                                              Cadastrar contrato
                                            </span>
                                          </a>
                                        </li>
                                        <li class="m-menu__item" aria-haspopup="true">
                                          <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_contract_edit" data-type="edit">
                                            <span class="m-menu__link-text">
                                              Editar contrato
                                            </span>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-graphic"></i>
                 <span class="m-menu__link-text">
                   Simulações
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_simulation_view" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar simulação
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-time"></i>
                 <span class="m-menu__link-text">
                   Reservas
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_booking_view" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar reserva
                       </span>
                     </a>
                   </li>
                 </ul>
               </div>
             </li>
             <li class="m-menu__item m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
               <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                 <i class="m-menu__link-icon flaticon-lifebuoy"></i>
                 <span class="m-menu__link-text">
                   Suporte
                 </span>
                 <i class="m-menu__hor-arrow la la-angle-right"></i>
                 <i class="m-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                 <span class="m-menu__arrow "></span>
                 <ul class="m-menu__subnav">
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_support_edit" data-type="view">
                       <span class="m-menu__link-text">
                         Visualizar chamado
                       </span>
                     </a>
                   </li>
                   <li class="m-menu__item" aria-haspopup="true">
                     <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_support_edit" data-type="edit">
                       <span class="m-menu__link-text">
                         Editar chamado
                       </span>
                     </a>
                   </li> <li class="m-menu__section">
                      <hr/>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                    <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                      <span class="m-menu__link-text">
                                        Áreas de suporte
                                      </span>
                                      <i class="m-menu__hor-arrow la la-angle-right"></i>
                                      <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                      <span class="m-menu__arrow "></span>
                                      <ul class="m-menu__subnav">
                                         <li class="m-menu__item" aria-haspopup="true">
                                           <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_support_subject_edit" data-type="view">
                                             <span class="m-menu__link-text">
                                               Visualizar área
                                             </span>
                                           </a>
                                         </li>
                                         <li class="m-menu__item" aria-haspopup="true">
                                          <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_support_subject_create" data-type="create">
                                             <span class="m-menu__link-text">
                                               Cadastrar área
                                             </span>
                                           </a>
                                         </li>
                                         <li class="m-menu__item" aria-haspopup="true">
                                           <a href="#" data-toggle="modal" class="m-menu__link " data-target="#modal_support_subject_edit" data-type="edit">
                                             <span class="m-menu__link-text">
                                               Editar área
                                             </span>
                                           </a>
                                         </li>
                                      </ul>
                                    </div>
                                  </li>
           </ul>
         </div>
       </li>

           </ul>
         </div>
       </li>
     </ul>
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

   $(document).on("click", ".m-menu__link", function () {
     var dataType = $(this).data('type');

     $("#modal_tariff_create").attr("data-type", dataType);
     $("#modal_tariff_edit").attr("data-type", dataType);

     $("#modal_tariff_modality_create").attr("data-type", dataType);
     $("#modal_tariff_modality_edit").attr("data-type", dataType);

     $("#modal_subclass_create").attr("data-type", dataType);
     $("#modal_subclass_edit").attr("data-type", dataType);

     $("#modal_discount_create").attr("data-type", dataType);
     $("#modal_discount_edit").attr("data-type", dataType);

     $("#modal_plan_create").attr("data-type", dataType);
     $("#modal_plan_edit").attr("data-type", dataType);

     $("#modal_plan_detail_create").attr("data-type", dataType);
     $("#modal_plan_detail_edit").attr("data-type", dataType);

     $("#modal_tariff_rule_create").attr("data-type", dataType);
     $("#modal_tariff_rule_edit").attr("data-type", dataType);

     $("#modal_company_create").attr("data-type", dataType);
     $("#modal_company_edit").attr("data-type", dataType);

     $("#modal_contract_create").attr("data-type", dataType);
     $("#modal_contract_edit").attr("data-type", dataType);

     $("#modal_contact_create").attr("data-type", dataType);
     $("#modal_contact_edit").attr("data-type", dataType);

     $("#modal_simulation_view").attr("data-type", dataType);

     $("#modal_booking_view").attr("data-type", dataType);

     $("#modal_support_edit").attr("data-type", dataType);

     $("#modal_support_subject_create").attr("data-type", dataType);
     $("#modal_support_subject_edit").attr("data-type", dataType);

});

});

</script>
