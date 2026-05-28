<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{appName} | {title}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700", "Outfit:300,400,500,600,700", "Plus Jakarta Sans:300,400,500,600,700"]
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });

    </script>

    <!--begin::Global Theme Style -->
    <link href="{assetsPath}vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{assetsPath}css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--begin::Layout Skins -->
    <link href="{assetsPath}css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{assetsPath}css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{assetsPath}css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{assetsPath}css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--begin::Page Styles -->
    <?php
    if (isExistLoader(__DIR__, $loader['stylesheet'])) {
		$this->load->view($loader['stylesheet']);
	}
    ?>

    <link rel="shortcut icon" href="{assetsPath}media/logos/favicon.ico" />

    <!--begin::Premium Theme Style Overrides -->
    <style>
        /* Global Reset & Typography */
        body, html, .kt-portlet, .form-control, .btn, .kt-aside-menu, .kt-header__topbar, .kt-portlet__head-title, .kt-subheader__title {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif !important;
            letter-spacing: -0.01em;
        }
        h1, h2, h3, h4, h5, h6, .kt-portlet__head-title, .kt-brand__title, .navbar-brand {
            font-family: 'Outfit', 'Poppins', sans-serif !important;
            font-weight: 700 !important;
            letter-spacing: -0.02em;
        }

        /* Smooth page background */
        body {
            background-color: #f5f6f9 !important;
            color: #1a1d20 !important;
        }
        #kt_content {
            background-color: #f5f6f9 !important;
            padding: 30px 25px !important;
        }

        /* Premium Sidebar (Aside & Brand) Overrides */
        .kt-aside {
            background-color: #0c0d0f !important;
            border-right: 1px solid rgba(255, 255, 255, 0.03) !important;
            box-shadow: 20px 0 50px rgba(0, 0, 0, 0.15) !important;
        }
        .kt-brand {
            background-color: #0c0d0f !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03) !important;
            padding: 0 25px !important;
        }
        .kt-brand .kt-brand__logo img {
            max-height: 40px !important;
            filter: brightness(0) invert(1) !important;
        }
        
        /* Sidebar Menu Items */
        .kt-aside-menu {
            background-color: #0c0d0f !important;
            padding: 20px 12px !important;
        }
        .kt-aside-menu .kt-menu__nav {
            padding: 0 !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item {
            margin-bottom: 6px !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item > .kt-menu__link {
            border-radius: 12px !important;
            padding: 12px 18px !important;
            background: transparent !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item > .kt-menu__link .kt-menu__link-text {
            font-weight: 500 !important;
            font-size: 0.92rem !important;
            color: rgba(255, 255, 255, 0.5) !important;
            letter-spacing: 0.3px;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item > .kt-menu__link .kt-menu__link-icon {
            color: rgba(255, 255, 255, 0.4) !important;
            font-size: 1.25rem !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        
        /* Sidebar Hover & Active states */
        .kt-aside-menu .kt-menu__nav > .kt-menu__item:hover > .kt-menu__link {
            background: rgba(255, 255, 255, 0.04) !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item:hover > .kt-menu__link .kt-menu__link-text {
            color: rgba(255, 255, 255, 0.85) !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item:hover > .kt-menu__link .kt-menu__link-icon {
            color: rgba(255, 255, 255, 0.75) !important;
        }
        
        /* Active item with high-end editorial white pill highlight */
        .kt-aside-menu .kt-menu__nav > .kt-menu__item.kt-menu__item--active > .kt-menu__link {
            background: #ffffff !important;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.3) !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item.kt-menu__item--active > .kt-menu__link .kt-menu__link-text {
            color: #0c0d0f !important;
            font-weight: 600 !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__item.kt-menu__item--active > .kt-menu__link .kt-menu__link-icon {
            color: #0c0d0f !important;
        }
        
        /* Sidebar Section Headers */
        .kt-aside-menu .kt-menu__nav > .kt-menu__section {
            padding: 20px 18px 10px 18px !important;
            margin: 0 !important;
        }
        .kt-aside-menu .kt-menu__nav > .kt-menu__section .kt-menu__section-text {
            font-size: 0.72rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 1.5px !important;
            color: rgba(255, 255, 255, 0.25) !important;
        }

        /* Header & Topbar Overrides */
        .kt-header {
            background-color: #ffffff !important;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.02) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
            padding: 0 30px !important;
        }
        .kt-header__topbar .kt-header__topbar-item {
            padding: 0 12px !important;
        }
        .kt-header__topbar .kt-header__topbar-welcome {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-weight: 500 !important;
            color: #64748b !important;
        }
        .kt-header__topbar .kt-header__topbar-username {
            font-weight: 600 !important;
            color: #0c0d0f !important;
        }
        
        /* Premium badge avatar */
        .kt-header__topbar .kt-badge--username {
            background-color: #111111 !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-radius: 10px !important;
            width: 38px !important;
            height: 38px !important;
            font-size: 0.95rem !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1) !important;
        }

        /* Portlet / Card Overrides */
        .kt-portlet {
            border-radius: 20px !important;
            background: #ffffff !important;
            border: 1px solid rgba(0, 0, 0, 0.03) !important;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02) !important;
            margin-bottom: 30px !important;
            overflow: hidden !important;
        }
        .kt-portlet__head {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
            padding: 20px 30px !important;
            min-height: auto !important;
        }
        .kt-portlet__head-title {
            font-size: 1.25rem !important;
            color: #0c0d0f !important;
            font-weight: 700 !important;
        }
        .kt-portlet__body {
            padding: 30px !important;
        }
        .kt-portlet__foot {
            border-top: 1px solid rgba(0, 0, 0, 0.05) !important;
            padding: 24px 30px !important;
            background-color: #fafbfc !important;
        }

        /* Sleek Form Control Overrides */
        .form-group label {
            font-family: 'Outfit', sans-serif !important;
            font-weight: 600 !important;
            font-size: 0.88rem !important;
            color: #334155 !important;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px !important;
        }
        .form-control {
            border-radius: 12px !important;
            border: 1px solid #e2e8f0 !important;
            background-color: #fcfdfe !important;
            padding: 12px 16px !important;
            font-size: 0.95rem !important;
            color: #0f172a !important;
            transition: all 0.2s ease-in-out !important;
            height: auto !important;
        }
        .form-control::placeholder {
            color: #94a3b8 !important;
            opacity: 0.8;
        }
        .form-control:focus {
            background-color: #ffffff !important;
            border-color: #111111 !important;
            box-shadow: 0 0 0 4px rgba(17, 17, 17, 0.05) !important;
            color: #000000 !important;
        }
        textarea.form-control {
            padding: 16px !important;
            line-height: 1.6 !important;
        }

        /* Premium Button Overrides */
        .btn {
            border-radius: 12px !important;
            font-family: 'Outfit', sans-serif !important;
            font-weight: 600 !important;
            font-size: 0.88rem !important;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px 24px !important;
            transition: all 0.2s ease-in-out !important;
            box-shadow: none !important;
        }
        
        /* Custom dark slate button for "Submit" */
        .btn.btn-success, .btn.btn-primary {
            background-color: #111111 !important;
            border-color: #111111 !important;
            color: #ffffff !important;
        }
        .btn.btn-success:hover, .btn.btn-primary:hover {
            background-color: #2a2a2a !important;
            border-color: #2a2a2a !important;
            transform: translateY(-1px) !important;
        }
        
        /* Cancel buttons */
        .btn.btn-secondary {
            background-color: #f1f5f9 !important;
            border-color: #f1f5f9 !important;
            color: #475569 !important;
        }
        .btn.btn-secondary:hover {
            background-color: #e2e8f0 !important;
            border-color: #e2e8f0 !important;
            color: #0f172a !important;
        }
        
        /* Delete buttons */
        .btn.btn-danger {
            background-color: #fff1f2 !important;
            border-color: #fff1f2 !important;
            color: #e11d48 !important;
        }
        .btn.btn-danger i {
            color: #e11d48 !important;
        }
        .btn.btn-danger:hover {
            background-color: #ffe4e6 !important;
            border-color: #ffe4e6 !important;
            color: #be123c !important;
        }
        .btn.btn-danger:hover i {
            color: #be123c !important;
        }
        
        /* Small Action icons */
        .btn-icon {
            width: 42px !important;
            height: 42px !important;
            padding: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 10px !important;
        }

        /* Table Overrides */
        .table {
            border-collapse: separate !important;
            border-spacing: 0 !important;
            border-radius: 12px !important;
            overflow: hidden !important;
            border: 1px solid rgba(0,0,0,0.05) !important;
        }
        .table th, .table td {
            border-left: none !important;
            border-right: none !important;
        }
        .table thead th, .table thead td {
            background-color: #fafbfc !important;
            font-family: 'Outfit', sans-serif !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            font-size: 0.78rem !important;
            letter-spacing: 1px !important;
            color: #475569 !important;
            border-bottom: 1px solid rgba(0,0,0,0.06) !important;
            padding: 14px 20px !important;
        }
        .table tbody td {
            padding: 16px 20px !important;
            vertical-align: middle !important;
            border-bottom: 1px solid rgba(0,0,0,0.04) !important;
            background: #ffffff !important;
        }
        .table-striped tbody tr:nth-of-type(odd) td {
            background-color: #fcfdfe !important;
        }

        /* Avatar Upload Overrides */
        .kt-avatar--outline {
            border: 1px dashed rgba(0,0,0,0.12) !important;
            background-color: #fafbfc !important;
            padding: 8px !important;
            border-radius: 16px !important;
            box-shadow: none !important;
        }
        .kt-avatar--outline .kt-avatar__holder {
            border-radius: 12px !important;
            border: 1px solid rgba(0,0,0,0.03) !important;
            background-color: #ffffff !important;
        }
        .kt-avatar--outline .kt-avatar__upload {
            background-color: #111111 !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
            width: 32px !important;
            height: 32px !important;
            border-radius: 8px !important;
            transition: all 0.2s !important;
        }
        .kt-avatar--outline .kt-avatar__upload:hover {
            background-color: #2a2a2a !important;
            transform: scale(1.05) !important;
        }
        .kt-avatar--outline .kt-avatar__upload i {
            color: #ffffff !important;
            font-size: 0.85rem !important;
        }

        /* Subheader & Breadcrumbs */
        .kt-subheader {
            background-color: transparent !important;
            padding: 20px 0 10px 0 !important;
            margin-bottom: 10px !important;
            box-shadow: none !important;
        }
        .kt-subheader .kt-subheader__title {
            font-family: 'Outfit', sans-serif !important;
            font-size: 1.45rem !important;
            font-weight: 700 !important;
            color: #0c0d0f !important;
        }
        .kt-subheader .kt-subheader__breadcrumbs .kt-subheader__breadcrumbs-link {
            color: #64748b !important;
            font-weight: 500 !important;
        }
        .kt-subheader .kt-subheader__breadcrumbs .kt-subheader__breadcrumbs-link:hover {
            color: #111111 !important;
        }

        /* Footer Overrides */
        .kt-footer {
            background-color: transparent !important;
            border-top: 1px solid rgba(0,0,0,0.04) !important;
            padding: 20px 0 !important;
            margin-top: 30px !important;
        }
        .kt-footer .kt-footer__copyright {
            color: #94a3b8 !important;
            font-size: 0.82rem !important;
        }
        .kt-footer .kt-footer__copyright a {
            color: #475569 !important;
            font-weight: 600 !important;
        }
    </style>
</head>

<body class="kt-print-content-only kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <?php Partial('HeaderMobile'); ?>

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <?php Partial('Aside'); ?>

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                    
                    <!-- begin:: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <?php Partial('HeaderMenu'); ?>
                    </div>

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">
                        <?php Partial('UserBar'); ?>
                    </div>
                </div>


                <!-- begin:: Content -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <?php Partial('Notify'); ?>
                        <?php $this->load->view($template) ?>
                    </div>
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            2021&nbsp;&copy;&nbsp;<a href="#" target="_blank" class="kt-link">{appName}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- begin::Global Config -->
    <script>
    const path = "<?= $loader['path'] ?>";
    const KTAppOptions = {
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

    <!--begin::Global Theme Bundle -->
    <script src="{assetsPath}vendors/global/vendors.bundle.js" type="text/javascript"></script>
    <script src="{assetsPath}js/scripts.bundle.js" type="text/javascript"></script>
    <script src="{assetsPath}vendors/custom/jquery-number/jquery.number.js" type="text/javascript"></script>
    <script src="{assetsPath}vendors/custom/momentjs/moment.js" type="text/javascript"></script>

    <!--begin::Page Scripts -->
    <script src="{assetsPath}js/pages/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
    <script src="{assetsPath}js/pages/custom/datepicker.js" type="text/javascript"></script>
    <script src="{assetsPath}js/pages/custom/helper.js" type="text/javascript"></script>
    <script src="{assetsPath}js/pages/custom/input-masking.js" type="text/javascript"></script>
    <script src="{assetsPath}js/pages/my-script.js" type="text/javascript"></script>

    <?php
    if (isExistLoader(__DIR__, $loader['javascript'])) {
        $this->load->view($loader['javascript']);
    }
    ?>
</body>

</html>
