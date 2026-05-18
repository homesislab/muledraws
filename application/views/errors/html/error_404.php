<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title>Muledraws | Error Page 404</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?= config_item('base_url') ?>assets/css/pages/error/error-6.css" rel="stylesheet" type="text/css" />

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?= config_item('base_url') ?>assets/css/pages/login/login-5.css" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?= config_item('base_url') ?>assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= config_item('base_url') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="<?= config_item('base_url') ?>assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="<?= config_item('base_url') ?>assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="<?= config_item('base_url') ?>assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?= config_item('base_url') ?>assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?= config_item('base_url') ?>assets/media/logos/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v6" style="background-image: url(<?= config_item('base_url') ?>/assets/media/error/bg6.jpg);">
				<div class="kt-error_container">
					<div class="kt-error_subtitle kt-font-light">
						<h1>Oops...</h1>
					</div>
					<p class="kt-error_description kt-font-light">
						Looks like something went wrong.<br>
						We're working on it
					</p>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="<?= config_item('base_url') ?>assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?= config_item('base_url') ?>assets/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>
