<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $appName ?> | Login</title>
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

    <!--begin::Page Custom Styles -->
    <link href="<?= $assetsPath ?>css/pages/login/login-5.css" rel="stylesheet" type="text/css" />

    <!--begin::Global Theme Styles -->
    <link href="<?= $assetsPath ?>vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assetsPath ?>css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--begin::Layout Skins -->
    <link href="<?= $assetsPath ?>css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assetsPath ?>css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assetsPath ?>css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= $assetsPath ?>css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?= $assetsPath ?>media/logos/favicon-muledraws.ico" />
</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile" style="background-image: url(<?= $assetsPath ?>media//bg/bg-3.jpg);">
                <div class="kt-login__left">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__content">
                            <a class="kt-login__logo" href="#" style="flex: 1;">
                                <img src="<?= $assetsPath ?>media/logos/logo.png" width="60%">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="kt-login__divider">
                    <div></div>
                </div>
                <div class="kt-login__right">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Login To Your Account</h3>
                            </div>
                            <div class="kt-login__form">
                                <?php if ($error != '') { echo notifyError($error); } ?>
                                <form class="kt-form" autocomplete="off" action="<?= base_url() ?>dologin" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-last" type="Password" placeholder="Password" name="password">
                                    </div>
                                    <div class="row kt-login__extra">
                                        <div class="col kt-align-left">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="remember"> Remember me
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col kt-align-right">
                                            <a href="javascript:;" id="kt_login_forgot" class="kt-link">Forget Password ?</a>
                                        </div>
                                    </div>
                                    <div class="kt-login__actions">
                                        <button id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Forgotten Password ?</h3>
                                <div class="kt-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <div class="kt-login__form">
                                <form class="kt-form" autocomplete="off" action="">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                                    </div>
                                    <div class="kt-login__actions">
                                        <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill btn-elevate">Request</button>
                                        <button id="kt_login_forgot_cancel" class="btn btn-outline-brand btn-pill">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- begin::Global Config -->
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

    <!--begin::Global Theme Bundle -->
    <script src="<?= $assetsPath ?>vendors/global/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?= $assetsPath ?>js/scripts.bundle.js" type="text/javascript"></script>
</body>

</html>
