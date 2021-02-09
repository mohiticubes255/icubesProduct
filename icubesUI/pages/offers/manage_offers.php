<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<meta charset="utf-8" />
	<title>Dashboard | <?php echo WEBSITE_TITLE; ?></title>
	<?php include_once FCPATH . "/pages/includes/head.php" ?>
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
	<!--begin::Main-->
	<!--begin::Header Mobile-->
	<?php include_once FCPATH . "/pages/includes/mobile_header.php"; ?>
	<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<!--begin::Aside-->
			<?php include_once FCPATH . "/pages/includes/sidebar.php" ?>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Subheader-->
					<?php include_once  FCPATH . "/pages/includes/header.php"; ?>
					<!--end::Subheader-->
					<!--begin::Entry-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Container-->
						<div class="container">
							<!--begin::Card-->
							<div class="card card-custom gutter-b">
								<div class="card-body">
									<!--begin: Datatable-->
									<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
									<!--end: Datatable-->
								</div>
							</div>
							<!--end::Card-->
							<!--begin::Modal-->
							<div class="modal fade" id="kt_datatable_records_fetch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Selected Records</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true"></span>
											</button>
										</div>
										<div class="modal-body">
											<div class="kt-scroll" data-scroll="true" data-height="200">
												<ul id="kt_apps_user_fetch_records_selected"></ul>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!--end::Modal-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Entry-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<?php include_once FCPATH . "/pages/includes/panel_footer.php"; ?>
				<!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Main-->
	<?php include_once  FCPATH . '/pages/includes/panel_actions.php'; ?>
	<script>
		var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1200
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#1BC5BD",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#6993FF",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#F3F6F9",
						"dark": "#212121"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#1BC5BD",
						"secondary": "#ECF0F3",
						"success": "#C9F7F5",
						"info": "#E1E9FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#212121",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#ECF0F3",
					"gray-300": "#E5EAEE",
					"gray-400": "#D6D6E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#80808F",
					"gray-700": "#464E5F",
					"gray-800": "#1B283F",
					"gray-900": "#212121"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<!--end::Global Config-->
	<?php include_once FCPATH . "/pages/includes/libs.php"; ?>
	<!--begin::Page Scripts(used by this page)-->
	<script src="<?php echo base_url('assets/js/list-datatable.js')?>"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>