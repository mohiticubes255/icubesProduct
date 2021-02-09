<meta name="description" content="Login page example" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/plugins/global/prismjs.bundle.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->
<link rel="shortcut icon" href="https://icwwebsite.s3.ap-south-1.amazonaws.com/images/favi.gif" />

<!-- Custom CSS -->

<style>
    .loader-overlay {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        display: none;
        background-color: #1b242d75;

    }

    .loader-overlay div {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .select2-selection__rendered {
        line-height: 1.5;
        border: none;
        font-size: 1.08rem;
        padding: 0.825rem 1.42rem;
        background-color: #F3F6F9;
        border-color: #F3F6F9;
        color: #3F4254;
        transition: color 0.15s ease, background-color 0.15s ease, border-color 0.15s ease, box-shadow 0.15s ease;
        outline: none;
        height: calc(1.5em + 1.65rem + 2px);
    }

    .select2-container--default .select2-selection--single {
        /* background-color: #fff; */
        /* border: 1px solid #aaa; */
        outline: none !important;
        /* border-radius: 4px; */
        border: none !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 12px !important;
    }

    span.select2-selection__placeholder {
        padding-left: 10px !important;
    }

    .dt-loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding : 10px 30px 10px 15px;
        text-align: center;
        box-shadow: 0 0 5px #80808061;
    }
</style>

<!-- Check if User is Already Loggedin or not -->
<script>
    let userDetails = localStorage.getItem('isLoggedIn');
    if (userDetails === "true") {
        // User is Loggedin
        if (window.location.pathname === '/auth/login') {
            // Redirect to the dashboard
            window.location.assign('<?php echo base_url('user/dashboard') ?>');
        }
    } else {
        // Redirect user to the login page
        if (window.location.pathname !== '/auth/login') {
            window.location.assign('<?php echo base_url('auth/login') ?>');
        }
    }
</script>