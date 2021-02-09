<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>Login | <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once "includes/head.php" ?>
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?php echo BASE_URL; ?>/assets/css/login.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-6 login-signin-on login-signin-on d-flex flex-column-fluid" id="kt_login">
            <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center" style="background-image: url(<?php echo BASE_URL; ?>assets/media/bg/bg-3.jpg);">
                <!--begin:Aside-->
                <div class="d-flex w-100 flex-center p-15">
                    <div class="login-wrapper">
                        <!--begin:Aside Content-->
                        <div class="text-dark-75">
                            <a href="#">
                                <img src="<?php echo BASE_URL; ?>assets/media/logos/logo-letter-13.png" class="max-h-75px" alt="" />
                            </a>
                            <h3 class="mb-8 mt-22 font-weight-bold">JOIN OUR GREAT COMMUNITY</h3>
                            <p class="mb-15 text-muted font-weight-bold">The ultimate Bootstrap &amp; Angular 6 admin
                                theme framework for next generation web apps.</p>
                            <button type="button" id="kt_login_signup" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Get An
                                Account</button>
                        </div>
                        <!--end:Aside Content-->
                    </div>
                </div>
                <!--end:Aside-->
                <!--begin:Divider-->
                <div class="login-divider">
                    <div></div>
                </div>
                <!--end:Divider-->
                <!--begin:Content-->
                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
                    <div class="login-wrapper">
                        <!--begin:Sign In Form-->
                        <div class="login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">Sign In</h2>
                                <p class="text-muted font-weight-bold">Enter your username and password</p>
                            </div>
                            <form class="form text-left" id="kt_login_signin_form">
                                <div class="form-group py-2 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email" placeholder="Username" name="userEmail" autocomplete="off" />
                                    <input type="hidden" name="requestFor" value="login">
                                </div>
                                <div class="form-group py-2 border-top m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Password" name="userPassword" minlength="8" />
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0 text-muted font-weight-bold">
                                            <input type="checkbox" name="remember" />
                                            <span></span>Remember me</label>
                                    </div>
                                    <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary font-weight-bold">Forget Password ?</a>
                                </div>
                                <div class="text-center mt-15">
                                    <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Sign
                                        In</button>
                                </div>
                            </form>
                        </div>
                        <!--end:Sign In Form-->
                        <!--begin:Sign Up Form-->
                        <div class="login-signup">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Sign Up</h3>
                                <p class="text-muted font-weight-bold">Enter your details to create your account</p>
                            </div>
                            <form class="form text-left" id="kt_login_signup_form">
                                <input type="hidden" name="requestFor" value="signup">
                                <input type="hidden" name="userCountryCode" value="+91">
                                <input type="hidden" name="userZipCode" value="">
                                <input type="hidden" name="userPermissions" value="">
                                <div class="form-group py-2 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" id="fullname" type="text" placeholder="Full Name" name="userFullName" />
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Email" name="userEmail" autocomplete="off" />
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Mobile Number" name="userMobile" autocomplete="off" />
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Password" name="userPassword" />
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Confirm Password" name="cpassword" />
                                </div>
                                <input type="hidden" name="userRole" id="userRole" value="affiliate">
                                <div class="form-group py-2 m-0 border-top">
                                    <select class="form-control selectpicker" multiple="multiple" data-actions-box="true" id="roles">
                                        <option value="super admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        <option value="hod">HOD</option>
                                        <option value="manager">Manager</option>
                                        <option value="advertiser">Advertiser</option>
                                        <option value="affiliate" selected>Affiliate</option>
                                    </select>
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <div class="col-sm-12 text-center">
                                        <input type="hidden" name="userType" id="user-type" value="individual">
                                        <input data-switch="true" type="checkbox" checked="checked" onchange="onTypeChanged(this)" data-on-text="Company" data-off-text="Individual" data-on-color="primary" data-off-color="primary" />
                                    </div>
                                </div>
                                <div class="form-group py-2 m-0" id="company" style="display: none;">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="url" placeholder="Website" name="userWebsite" id="userWebsite" />
                                </div>
                                <div class="form-group mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline font-weight-bold">
                                            <input type="checkbox" name="agree" />
                                            <span></span>I Agree the
                                            <a href="#" class="ml-1">terms and conditions</a>.</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button id="kt_login_signup_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_signup_cancel" class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Login</button>
                                </div>
                            </form>
                        </div>
                        <!--end:Sign Up Form-->
                        <!--begin:Forgot Password Form-->
                        <div class="login-forgot">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                            </div>
                            <form class="form text-left" id="kt_login_forgot_form">
                                <div class="form-group py-2 m-0 border-bottom">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Email" name="userEmail" autocomplete="off" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button id="kt_login_forgot_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_forgot_cancel" class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <!--end:Forgot Password Form-->

                        <!-- begin:Authentication Selection -->
                        <div class="login-auth">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Please Select Authentication Method</h3>
                                <!-- <p class="text-muted font-weight-bold">Enter your email to reset your password</p> -->
                            </div>
                            <form class="form text-left" id="kt_login_auth_form">
                                <div class="form-group py-2 m-0 text-center">
                                    <div class="radio-inline">
                                        <input type="hidden" name="accessToken" value="" class="accessToken">
                                        <label class="radio radio-success">
                                            <input type="radio" name="method" value="googleAuth" />
                                            <span></span>
                                            OTP on Mobile
                                        </label>
                                        <label class="radio radio-success">
                                            <input type="radio" name="method" value="mail" checked="checked" />
                                            <span></span>
                                            OTP on Mail
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button type="button" id="kt_login_auth_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- end:Authentication Selection -->

                        <!-- begin:OTP by User -->
                        <div class="login-otp">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Please Enter 6 Digit OTP</h3>
                                <!-- <p class="text-muted font-weight-bold">Enter your email to reset your password</p> -->
                            </div>
                            <form class="form text-left" id="kt_login_otp_form">
                                <div class="form-group py-2 m-0">
                                    <input type="hidden" name="accessToken" value="" class="accessToken">
                                    <input autofocus class="form-control h-auto border-0 px-0 placeholder-dark-75" minlength="6" maxlength="6" type="text" placeholder="OTP" id="userOtp" name="otp" autocomplete="off" />
                                </div>
                                <div class="border-top mb-4"></div>
                                <a href="javascript:;" id="kt_login_resend_otp" class="text-muted text-hover-primary font-weight-bold">Resend OTP?</a>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button type="button" id="kt_otp_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- end:OTP by User -->
                        
                        <!-- begin:OTP by User -->
                        <div class="login-forgototp">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Reset Password</h3>
                                <!-- <p class="text-muted font-weight-bold">Enter your email to reset your password</p> -->
                            </div>
                            <form class="form text-left" id="kt_login_forgototp_form">
                            <div class="form-group py-2 m-0">
                                    <input type="password" name="userPassword" placeholder="New Password" id="userPassword" class="form-control h-auto border-0 px-0 placeholder-dark-75">
                                </div>
                                <div class="border-top mb-4"></div>
                                <div class="form-group py-2 m-0">
                                    <input type="hidden" name="userId" value="" class="userId">
                                    <input type="hidden" name="method" value="" class="method" value="mail">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" minlength="6" maxlength="6" type="text" placeholder="OTP" id="userOtp" name="otp" autocomplete="off" />
                                </div>
                                
                                <!-- <a href="javascript:;" id="kt_login_resend_otp" class="text-muted text-hover-primary font-weight-bold">Resend OTP?</a> -->
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button type="button" id="kt_login_forgototp_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- end:OTP by User -->

                    </div>
                </div>
                <!--end:Content-->
            </div>
        </div>
        <!--end::Login-->
    </div>
    <?php include_once "includes/libs.php"; ?>
    <!--begin::Page Scripts(used by this page)-->
    <script src="<?php echo base_url('assets/js/login-general.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-switch.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-select.js') ?>"></script>
    <!--end::Page Scripts-->
    <script>
        function onTypeChanged(elem) {
            let company = $('#company');
            if ($(elem).prop('checked')) {
                company.show();
                $('#user-type').val('company');
            } else {
                company.hide();
                $('#user-type').val('individual');
            }
        }

        $('#roles').on('change', function() {
            let roles = $('#roles').val();
            $('#userRole').val(roles.join(','));
        })
    </script>
</body>
<!--end::Body-->

</html>