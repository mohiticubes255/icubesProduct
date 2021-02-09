/******/
(() => { // webpackBootstrap
    /******/
    "use strict";

    // Class Definition
    var KTLogin = function() {
        var _login;

        var _showForm = function(form) {
            console.log(form);
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';

            _login.removeClass('login-forgot-on');
            _login.removeClass('login-signin-on');
            _login.removeClass('login-signup-on');
            _login.removeClass('login-auth-on');
            _login.removeClass('login-otp-on');

            _login.addClass(cls);
            if (form === 'kt_login_otp_form') {
                $('#userOtp').focus();
            }
            KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
        }

        var _handleSignInForm = function() {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_signin_form'), {
                    fields: {
                        userEmail: {
                            validators: {
                                notEmpty: {
                                    message: 'Email is required'
                                },
                                emailAddress: {
                                    message: 'Please Enter a Valid Email Address'
                                }
                            },
                        },
                        userPassword: {
                            validators: {
                                notEmpty: {
                                    message: 'Password is required'
                                },
                                stringLength: {
                                    min: 8,
                                    message: 'Password must be minimum 8 characters'
                                }

                            },

                        }
                    },
                    plugins: {
                        declarative: new FormValidation.plugins.Declarative({
                            html5Input: true,
                        }),
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }

            );

            $('#kt_login_signin_submit').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        // Send User Details to the server for Login 
                        let form = $('#kt_login_signin_form');
                        postForm(KBASE_URL + 'partner/login', form, false, false, (mData, mStatus) => {
                            if (mData.status === KSTATUS_SUCCESS) {
                                $('.accessToken').val(mData.data.accessToken)
                                _showForm('auth');
                            } else {
                                showToast('error', 'Error', mData.msg);
                            }
                        });
                    }
                });
            });

            // Handle forgot button
            $('#kt_login_forgot').on('click', function(e) {
                e.preventDefault();
                _showForm('forgot');
            });

            // Handle signup
            $('#kt_login_signup').on('click', function(e) {
                e.preventDefault();
                _showForm('signup');
            });
        }

        var _handleSignUpForm = function(e) {
            var validation;
            var form = KTUtil.getById('kt_login_signup_form');

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                form, {
                    fields: {
                        userFullName: {
                            validators: {
                                notEmpty: {
                                    message: 'Username is required'
                                }
                            }
                        },
                        userEmail: {
                            validators: {
                                notEmpty: {
                                    message: 'Email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                }
                            }
                        },
                        userPassword: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                stringLength: {
                                    min: 8,
                                    message: 'Password must be 8 characters'
                                }
                            }
                        },
                        userMobile: {
                            validators: {
                                notEmpty: {
                                    message: 'Mobile Number is required'
                                },
                                // stringLength: {
                                // 	min: 10,
                                // 	max : 10,
                                // 	message: 'Mobile Number must be 10 digits'
                                // },
                                regexp: {
                                    regexp: /^[6-9]\d{9}$/i,
                                    message: 'Please Enter a Valid Mobile Number'
                                }
                            }
                        },
                        cpassword: {
                            validators: {
                                notEmpty: {
                                    message: 'The password confirmation is required'
                                },
                                identical: {
                                    compare: function() {
                                        return form.querySelector('[name="password"]').value;
                                    },
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'You must accept the terms and conditions'
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signup_submit').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        let form = $('#kt_login_signup_form');
                        postForm(KBASE_URL + 'partner/signUp', form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                showToast(KSTATUS_SUCCESS, mData.msg);
                                $('#kt_login_signup_form').trigger('reset');
                            } else {
                                showToast('error', mData.msg);
                            }
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_signup_cancel').on('click', function(e) {
                e.preventDefault();

                _showForm('signin');
            });
        }

        var _handleForgotForm = function(e) {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_forgot_form'), {
                    fields: {
                        userEmail: {
                            validators: {
                                notEmpty: {
                                    message: 'Email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_forgot_submit').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        // Submit form
                        let form = $('#kt_login_forgot_form');

                        postForm(KBASE_URL + 'partner/password/reset', form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                showToast(KSTATUS_SUCCESS, mData.msg);
                                $('#kt_login_forgot_form').trigger('reset');
                                let d = mData.data;
                                for (const [key, value] of Object.entries(d)) {
                                    $(`.${key}`).val(value);
                                }
                                _showForm('forgototp');
                            } else {
                                showToast('error', mData.msg);
                            }
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_forgot_cancel').on('click', function(e) {
                e.preventDefault();
                _showForm('signin');
            });
        }

        /* Reset Password form */
        var _handlePasswordResetForm = function(e) {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_forgototp_form'), {
                    fields: {
                        userPassword: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                stringLength: {
                                    min: 8,
                                    message: 'Password must be 8 characters'
                                }
                            }
                        },
                        otp: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter OTP'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 6,
                                    message: 'OTP must be 6 characters'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_forgototp_submit').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        // Submit form
                        let form = $('#kt_login_forgototp_form');

                        postForm(KBASE_URL + 'partner/password/prelogin/reset', form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                showToast(KSTATUS_SUCCESS, mData.msg);
                                $('#kt_login_forgototp_form').trigger('reset');
                                _showForm('signin');
                            } else {
                                showToast('error', 'Error', mData.msg);
                            }
                        });
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_forgot_cancel').on('click', function(e) {
                e.preventDefault();
                _showForm('signin');
            });
        }

        var _handleAuthMethodForm = function() {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_auth_form'), {
                    fields: {
                        method: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select a method'
                                },
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_auth_submit').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        // Submit form
                        let form = $('#kt_login_auth_form');
                        let method = $("input[name=method]:checked").val();
                        postForm(KBASE_URL + `partner/${method}/auth`, form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                _showForm('otp');
                            } else {
                                showToast('error', mData.msg);
                            }
                        });

                    }
                });
            });
        }

        var _handleResendOTP = function() {
            $('#kt_login_resend_otp').on('click', function() {
                console.log("Resending OTP")
                let form = $('#kt_login_auth_form');
                let method = $("input[name=method]:checked").val();
                postForm(KBASE_URL + `partner/${method}/auth`, form, false, false, function(mData, mStatus) {
                    if (mData.status === KSTATUS_SUCCESS) {
                        showToast('success', 'Successfull', mData.msg);
                    } else {
                        showToast('error', 'Error', mData.msg);
                    }
                });
            })
        }
        var _handleOtpVerifyForm = function() {
            var validation;
            var _previousOTP = '';
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_otp_form'), {
                    fields: {
                        otp: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter OTP'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 6,
                                    message: 'OTP must be 6 characters'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_otp_submit').on('click', function(e) {
                e.preventDefault();
                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        let userOtp = $("#userOtp").val();
                        if (userOtp === _previousOTP) {
                            showToast('error', "Error", "You've entered the same wrong OTP.");
                            return;
                        }
                        // Submit form
                        let form = $('#kt_login_otp_form');
                        let method = $("input[name=method]:checked").val();
                        postForm(KBASE_URL + `partner/${method}/auth/verify`, form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                // OTP Verified Successfully.
                                let accessTokenData = JSON.stringify(mData.accessTokenInfo);
                                let userData = JSON.stringify(mData.data);
                                let userCompanyInfo = JSON.stringify(mData.userCompanyInfo);
                                let userRoles = mData.userRoles;
                                console.log(userRoles);

                                if (userRoles.isMultiple) {
                                    console.log("Multiple Roles")
                                    let roles = new Object();
                                    userRoles.roles.map((value, index) => {
                                        roles[value] = value;
                                    });

                                    $.getScript("/assets/js/sweetalert.min.js", function(data, textStatus, jqxhr) {
                                        Swal.fire({
                                            title: 'Please Select a Role First',
                                            input: 'select',
                                            inputOptions: roles,
                                            inputPlaceholder: 'Login As',
                                            showCancelButton: true,
                                            inputValidator: function(value) {
                                                return new Promise(function(resolve, reject) {
                                                    if (value !== '') {
                                                        resolve();
                                                    } else {
                                                        resolve('You need to select a Role First.');
                                                    }
                                                });
                                            }
                                        }).then(function(result) {
                                            if (result.value) {
                                                let selectedRole = result.value;
                                                localStorage.setItem('currentRole', selectedRole);
                                                localStorage.setItem('userRoles', JSON.stringify(userRoles));
                                                localStorage.setItem('companyInfo', userCompanyInfo);
                                                localStorage.setItem('tokenInfo', accessTokenData);
                                                localStorage.setItem('userData', userData);
                                                localStorage.setItem('isLoggedIn', true);
                                                window.location.reload();
                                            }
                                        });
                                    });
                                } else {
                                    localStorage.setItem('currentRole', userRoles.roles[0]);
                                    localStorage.setItem('userRoles', JSON.stringify(userRoles));
                                    localStorage.setItem('companyInfo', userCompanyInfo);
                                    localStorage.setItem('tokenInfo', accessTokenData);
                                    localStorage.setItem('userData', userData);
                                    localStorage.setItem('isLoggedIn', true);
                                    window.location.reload();
                                }
                            } else {
                                _previousOTP = $('#userOtp').val();
                                showToast('error', "Error", mData.msg);
                            }
                        });
                    }
                });
            });
        }

        // Public Functions
        return {
            // public functions
            init: function() {
                _login = $('#kt_login');
                _handleSignInForm();
                _handleSignUpForm();
                _handleForgotForm();
                _handleAuthMethodForm();
                _handleOtpVerifyForm();
                _handleResendOTP();
                _handlePasswordResetForm();
            }
        };
    }();

    // Class Initialization
    jQuery(document).ready(function() {
        KTLogin.init();
    });

    /******/
})();
//# sourceMappingURL=login-general.js.map