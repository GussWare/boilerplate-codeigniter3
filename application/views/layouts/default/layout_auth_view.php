<!DOCTYPE html>

<html lang="en" class="light-style">

<head>
    <title><?php echo (isset($title)) ? $title : 'AppWork'; ?></title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/ionicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/linearicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/open-iconic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/pe-icon-7-stroke.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/uikit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">

    <!-- Load polyfills -->
    <script src="<?php echo base_url(); ?>assets/vendor/js/polyfills.js"></script>
    <script>
        document['documentMode'] === 10 && document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')
    </script>

    <script src="<?php echo base_url(); ?>assets/vendor/js/material-ripple.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js/layout-helpers.js"></script>

    <!-- Theme settings -->
    <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
    <script src="<?php echo base_url(); ?>assets/vendor/js/theme-settings.js"></script>
    <script>
        window.themeSettings = new ThemeSettings({
            cssPath: '<?php echo base_url(); ?>assets/vendor/css/rtl/',
            themesPath: '<?php echo base_url(); ?>assets/vendor/css/rtl/'
        });
    </script>

    <!-- Core scripts -->
    <script src="<?php echo base_url(); ?>assets/vendor/js/pace.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Libs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/pages/authentication.css">
</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <!-- Content -->

    <div class="authentication-wrapper authentication-3">
        <div class="authentication-inner">

            <!-- Side container -->
            <!-- Do not display the container on extra small, small and medium screens -->
            <div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5" style="background-image: url('<?php echo base_url(); ?>assets/img/bg/21.jpg');">
                <div class="ui-bg-overlay bg-dark opacity-50"></div>

                <!-- Text -->
                <div class="w-100 text-white px-5">
                    <h1 class="display-2 font-weight-bolder mb-4"><?php echo lang("auth_join_our_comunnity"); ?></h1>
                    <div class="text-large font-weight-light">
                        <?php echo lang("auth_slider_text"); ?>
                    </div>
                </div>
                <!-- /.Text -->
            </div>
            <!-- / Side container -->

            <!-- Form container -->
            <div class="theme-bg-white d-flex col-lg-4 align-items-center p-5">
                <!-- Inner container -->
                <!-- Have to add `.d-flex` to control width via `.col-*` classes -->
                <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
                    <div class="w-100">

                        <!-- Logo -->
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="ui-w-60">
                                <div class="w-100 position-relative" style="padding-bottom: 54%">
                                    <svg class="w-100 h-100 position-absolute" viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse">
                                                <stop stop-opacity=".25" offset="0"></stop>
                                                <stop stop-opacity=".1" offset=".3"></stop>
                                                <stop stop-opacity="0" offset=".9"></stop>
                                            </linearGradient>
                                            <linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient>
                                            <linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient>
                                        </defs>
                                        <path class="fill-primary" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path>
                                        <path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path>
                                        <path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path>
                                        <path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- / Logo -->

                        <h4 class="text-center text-lighter font-weight-normal mt-5 mb-0"><?php echo lang("auth_login_yout_account");?></h4>

                        <!-- Form -->
                        <?php echo (isset($content_layout) ? $content_layout : ''); ?>
                        <!-- / Form -->

                        <div class="text-center text-muted">
                            <?php echo lang("auth_dont_have_account_yet"); ?> <a href="javascript:void(0)"><?php echo lang("auht_sign_up"); ?></a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- / Form container -->

        </div>
    </div>

    <!-- / Content -->


</body>

</html>