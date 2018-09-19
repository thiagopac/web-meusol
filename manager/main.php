<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Meu Sol - Área do Cliente
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->

		<!--begin::Page Vendors -->
		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/demo9/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="js/utils.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>
		<!--end::Page Vendors -->

    <!--begin::Base Styles -->
		<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/demo/demo9/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="css/important.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->

		<link rel="shortcut icon" href="../site/img/favicon.ico/favicon.ico" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->

			<!-- BEGIN: Topbar -->
				<?php include("_top.php"); ?>
			<!-- END: Topbar -->

			<!-- END: Header -->
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
				<i class="la la-close"></i>
			</button>

			<!-- END: Left Aside -->
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
					<!-- BEGIN: content -->
					<?php
						 $fileExists = file_exists("_".$_GET["page"].".php");

						 if ($fileExists == true) {
							//carrega página que veio no get
							include("_".$_GET["page"].".php");
						 }else{
							//exige erro 404
							print("<meta http-equiv='refresh' content='0;url=404.php'>");
						 }

						 ?>
					<!-- END: content -->
				</div>
			</div>
			<!-- end:: Body -->
		<!-- begin::Footer -->
		<?php include("_footer.php"); ?>
		<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<div id="modals">
			<?php include("modals/_menu_modal_tariff.php"); ?>
			<?php include("modals/_menu_modal_tariff_modality.php"); ?>
			<?php include("modals/_menu_modal_subclass.php"); ?>
			<?php include("modals/_menu_modal_discount.php"); ?>
			<?php include("modals/_menu_modal_plan.php"); ?>
			<?php include("modals/_menu_modal_plan_detail.php"); ?>
			<?php include("modals/_menu_modal_tariff_rule.php"); ?>
			<?php include("modals/_menu_modal_company.php"); ?>
			<?php include("modals/_menu_modal_contract.php"); ?>
			<?php include("modals/_menu_modal_contact.php"); ?>
			<?php include("modals/_menu_modal_simulation.php"); ?>
			<?php include("modals/_menu_modal_booking.php"); ?>
			<?php include("modals/_menu_modal_support.php"); ?>
			<?php include("modals/_menu_modal_support_subject.php"); ?>

		</div>

	</body>
	<!-- end::Body -->
</html>
<script>
   $(document).ready(function(){

     	if(sessionStorage.getItem("user")){
     			var user = JSON.parse(sessionStorage.getItem("user"));
     	}

      if(sessionStorage.getItem("company")){
     			var company = JSON.parse(sessionStorage.getItem("company"));
     	}

			if(sessionStorage.getItem("contract")){
				 var contract = JSON.parse(sessionStorage.getItem("contract"));
			}

			if (user.userRole == 1) {
				$("#m_header_nav").attr("style", "visibility: visible");
			}else{
				$("#m_header_nav").empty();
			}

      var BASE_URL = null;

      if ((window.location.hostname) == "localhost") {
          BASE_URL = window.location.protocol + "//" + window.location.hostname + "/meusol/";
      }else{
          BASE_URL = window.location.protocol + "//" + window.location.hostname + "/";
      }

   });
</script>
