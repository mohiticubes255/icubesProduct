
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Page Not Found | iCubes</title>
        <meta name="description" content="Login page example" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="<?php echo BASE_URL;?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/plugins/global/prismjs.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->
<link rel="shortcut icon" href="<?php echo BASE_URL;?>/assets/media/logos/favicon.ico" />
<!-- Check if User is Already Loggedin or not -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Error-->
			<div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" style="background-image: url(<?php echo base_url('assets/media/error/bg1.jpg')?>);">
				<!--begin::Content-->
				<h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 10rem">404</h1>
				<p class="font-size-h3 text-muted font-weight-normal">OOPS! Something went wrong here</p>
				<!--end::Content-->
			</div>
			<!--end::Error-->
		</div>
		<!--end::Main-->
        <?php include_once "pages/includes/libs.php"; ?>
	</body>
	<!--end::Body-->
</html>