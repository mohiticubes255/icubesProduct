/******/
(() => { // webpackBootstrap
    /******/
    "use strict";

    // Class Definition
    var KTLogin = function() {
        var _login;

        var _showForm = function(form) {
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';

            _login.removeClass('login-forgot-on');
            _login.removeClass('login-signin-on');
            _login.removeClass('login-signup-on');

            _login.addClass(cls);

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
                        console.log("Authenticating....");
                        // Send User Details to the server for Login 
                        let form = $('#kt_login_signin_form');
                        postForm(KBASE_URL + 'partner/login', form, false, false, (mData, mStatus) => {
                            if (mData.status === KSTATUS_SUCCESS) {
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
                        email: {
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
                        KTUtil.scrollTop();
                    } else {
                        swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
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

        // Public Functions
        return {
            // public functions
            init: function() {
                _login = $('#kt_login');

                _handleSignInForm();
                _handleSignUpForm();
                _handleForgotForm();
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