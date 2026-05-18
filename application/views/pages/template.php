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
            "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
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
