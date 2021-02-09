<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Edit User | <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once "includes/head.php" ?>
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!-- Select2min.css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <?php include_once "includes/mobile_header.php"; ?>
    <!--end::Header Mobile-->

    <!-- User Mapping Modal -->
    <!-- Modal-->
    <div class="modal fade" id="user-mapping-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="add-user-mapping-form" onsubmit="addUserMapping()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add More Mapping</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>How Many?</label>
                        <div class="form-group">
                            <input type="number" min="1" max="5" name="mapping" id="mapping" class="form-control" placeholder="Number of User Mapping" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- User Mapping Modal Ends -->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <?php include_once "includes/sidebar.php" ?>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <?php include_once "includes/header.php"; ?>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <!--begin::Card header-->
                                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                            <!--begin::Item-->
                                            <li class="nav-item mr-3">
                                                <a class="nav-link active" data-toggle="tab" href="#kt_profile">
                                                    <span class="nav-icon">
                                                        <span class="svg-icon">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="nav-text font-size-lg">Basic Info</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="nav-item mr-3" id="tab_company">
                                                <a class="nav-link" data-toggle="tab" href="#kt_company_tab">
                                                    <span class="nav-icon">
                                                        <span class="svg-icon">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="nav-text font-size-lg">Company</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="nav-item mr-3">
                                                <a class="nav-link" data-toggle="tab" href="#kt_password">
                                                    <span class="nav-icon">
                                                        <span class="svg-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                                    <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="nav-text font-size-lg">Change Password</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="nav-item mr-3" id="tab_billing">
                                                <a class="nav-link" data-toggle="tab" href="#kt_billing_info">
                                                    <span class="nav-icon">
                                                        <span class="svg-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="nav-text font-size-lg">Billing Info</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="nav-item mr-3" id="tab_permissions">
                                                <a class="nav-link" data-toggle="tab" href="#kt_user_permissions">
                                                    <span class="nav-icon">
                                                        <span class="svg-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                                                    <polygon fill="#000000" opacity="0.3" points="11.3333333 18 16 11.4 13.6666667 11.4 13.6666667 7 9 13.6 11.3333333 13.6" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="nav-text font-size-lg">Permissions</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="nav-item mr-3" id="tab_userMapping">
                                                <a class="nav-link" data-toggle="tab" href="#kt_user_mapping">
                                                    <span class="nav-icon">
                                                        <span class="svg-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="nav-text font-size-lg">User Mapping</span>
                                                </a>
                                            </li>
                                            <!--end::Item-->

                                        </ul>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!--begin::Tab-->
                                        <div class="tab-pane show active px-7" id="kt_profile" role="tabpanel">
                                            <form name="profile-form" id="profile-form">
                                                <input type="hidden" name="userType" value="" id="userType">
                                                <input type="hidden" name="userCountryCode" value="91">
                                                <input type="hidden" name="userRole" value="" id="userRole">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <div class="col-xl-2"></div>
                                                    <div class="col-xl-7 my-2">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <label class="col-3"></label>
                                                            <div class="col-9">
                                                                <h6 class="text-dark font-weight-bold mb-10"></h6>
                                                            </div>
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Full
                                                                Name</label>
                                                            <div class="col-9">
                                                                <input class="form-control form-control-lg form-control-solid userFullName" type="text" value="" name="userFullName" placeholder="Full Name" id="userFullName" required />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <!-- <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">Company
                                                                Name</label>
                                                            <div class="col-9">
                                                                <input
                                                                    class="form-control form-control-lg form-control-solid"
                                                                    type="text" value="" name="companyName"
                                                                    placeholder="Company Name" id="companyName" />
                                                            </div>
                                                        </div> -->
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Contact
                                                                Phone</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userMobile" value="" placeholder="Phone" name="userMobile" id="userMobile" />
                                                                </div>
                                                                <span class="form-text text-muted">We'll never share
                                                                    your mobile with anyone else.</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Email
                                                                Address</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userEmail" value="" placeholder="Email" name="userEmail" id="userEmail" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Company
                                                                Site</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userWebsite" placeholder="Website" value="" id="userWebsite" name="userWebsite" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <hr />
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Country</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userCountry" placeholder="Country" value="" id="userCountry" name="userCountry" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">State</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userState" placeholder="State" value="" id="userState" name="userState" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">City</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userCity" placeholder="City" value="" id="userCity" name="userCity" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Zip Code</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userZipCode" placeholder="Zip Code" value="" id="userZipCode" name="userZipCode" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <!-- <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">Company
                                                                Site</label>
                                                            <div class="col-9">
                                                                <div
                                                                    class="input-group input-group-lg input-group-solid">
                                                                    <input type="text"
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        placeholder="Website" value="" id="userWebsite"
                                                                        name="userWebsite" />
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!--end::Group-->

                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!--begin::Footer-->
                                                        <div class="card-footer pb-0">
                                                            <div class="row">
                                                                <div class="col-12 text-right">
                                                                    <input type="button" class="btn btn-light-primary font-weight-bold" id="profile-btn-submit" value="Save Changes" />
                                                                    <a href="#" class="btn btn-clean font-weight-bold">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Footer-->
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                            </form>
                                        </div>
                                        <!--end::Tab-->
                                        <!--begin::Tab-->
                                        <div class="tab-pane show px-7" id="kt_company_tab" role="tabpanel">
                                            <form name="company-form" id="company-form">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <div class="col-xl-2"></div>
                                                    <div class="col-xl-7 my-2">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <label class="col-3"></label>
                                                            <div class="col-9">
                                                                <h6 class="text-dark font-weight-bold mb-10"></h6>
                                                            </div>
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Company
                                                                Name</label>
                                                            <input type="hidden" name="companyId" class="id" id="id">
                                                            <input type="hidden" name="companyCountryCode" class="companyCountryCode" id="companyCountryCode">
                                                            <div class="col-9">
                                                                <select class="company-ajax form-control form-control-lg form-control-solid companyName" id="companyName" name="companyName" style="width: 100%; background-color: #F3F6F9; color: #3F4254;"></select>
                                                                <!-- <input class="form-control form-control-lg form-control-solid" type="text" value=" " placeholder="Company name" id="companyName" /> -->
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">GST
                                                                Number</label>
                                                            <div class="col-9">
                                                                <input class="form-control form-control-lg form-control-solid companyGstn" name="companyGstn" type="text" value="" placeholder="Company GST Number" id="companyGstn" readonly />
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">CIN</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid companyCin" name="companyCin" value="" id="companyCin" placeholder="Company CIN" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">PAN</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid companyPan" name="companyPan" value="" id="companyPan" placeholder="Company PAN Number" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Mobile</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid companyMobile" name="companyMobile" placeholder="Company Mobile" value="" id="companyMobile" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Website</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid companyWebSite" name="companyWebSite" placeholder="Company Website" value="" id="companyWebSite" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Address</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <textarea class="form-control companyAddress" id="companyAddress" name="companyAddress" placeholder="Company Address"></textarea>
                                                                    <!-- <input type="text"
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        placeholder="Company Mobile" value="" id="companyMobile" /> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!--begin::Footer-->
                                                        <div class="card-footer pb-0">
                                                            <div class="row">
                                                                <div class="col-12 text-right">
                                                                    <input type="submit" class="btn btn-light-primary font-weight-bold" value="Save Changes" />
                                                                    <a href="#" class="btn btn-clean font-weight-bold">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Footer-->
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                            </form>
                                        </div>
                                        <!--end::Tab-->

                                        <!--begin::Tab-->
                                        <div class="tab-pane px-7" id="kt_password" role="tabpanel">
                                            <form action="#" name="password-form" id="password-form">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Row-->
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <label class="col-3"></label>
                                                                <div class="col-9">
                                                                    <h6 class="text-dark font-weight-bold mb-10">Change
                                                                        Password:</h6>
                                                                </div>
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Group-->
                                                            <!-- <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Current
                                                                    Password</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid mb-1" type="text" value="" placeholder="Current password" />
                                                                </div>
                                                            </div> -->
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">New
                                                                    Password</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid" name="userPassword" type="password" value="" placeholder="New password" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Verify
                                                                    Password</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid" name="userConfirmPassword" type="password" value="" placeholder="Verify password" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Body-->
                                                <!--begin::Footer-->
                                                <div class="card-footer pb-0">
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <div class="row">
                                                                <div class="col-3"></div>
                                                                <div class="col-9">
                                                                    <input type="button" id="change-password-btn" class="btn btn-light-primary font-weight-bold" value="Change Password">
                                                                    <!-- <a href="#" >Change Password</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Footer-->
                                            </form>
                                        </div>
                                        <!--end::Tab-->
                                        <!--begin::Tab-->
                                        <div class="tab-pane px-7" id="kt_billing_info" role="tabpanel">
                                            <form action="#" name="billing-form" id="billing-form">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Row-->
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <label class="col-3"></label>
                                                                <div class="col-9">
                                                                    <h6 class="text-dark font-weight-bold mb-10">Billing Info:</h6>
                                                                </div>
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Full Name</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid mb-1 userName" type="text" value="" id="userName" name="userName" placeholder="User Name" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Pan Number</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userPanNumber" type="text" value="" id="userPanNumber" name="userPanNumber" placeholder="Pan Number" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Aadhar Number</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userAadharNumber" type="text" value="" id="userAadharNumber" name="userAadharNumber" placeholder="Aadhar Number" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">GST Number</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userGstn" type="text" value="" id="userGstn" name="userGstn" placeholder="GST Number" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Bank Name</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userBankName" type="text" value="" id="userBankName" name="userBankName" placeholder="Bank Name" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Bank Account Number</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userBankAccount" type="text" value="" id="userBankAccount" name="userBankAccount" placeholder="Bank Account Number" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Bank Address</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userBankAddress" type="text" value="" id="userBankAddress" name="userBankAddress" placeholder="Bank Address" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">IFSC Code</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userBankIfsc" type="text" value="" id="userBankIfsc" name="userBankIfsc" placeholder="IFSC Number" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-3 text-lg-right text-left">Swift Number</label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid userSwiftNumber" type="text" value="" id="userSwiftNumber" name="userSwiftNumber" placeholder="Swift Number" />
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Body-->
                                                <!--begin::Footer-->
                                                <div class="card-footer pb-0">
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <div class="row">
                                                                <div class="col-3"></div>
                                                                <div class="col-9">
                                                                    <a href="#" class="btn btn-light-primary font-weight-bold" id="billing-submit-btn">Save
                                                                        changes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Footer-->
                                            </form>
                                        </div>
                                        <!--end::Tab-->

                                        <!-- begin::Tab -->
                                        <div class="tab-pane px-7" id="kt_user_permissions" role="tabpanel">
                                            <form action="#" name="permission-form" id="permission-form">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Row-->
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <label class="col-3"></label>
                                                                <div class="col-9">
                                                                    <h6 class="text-dark font-weight-bold mb-10">Permissions</h6>
                                                                </div>
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Group-->
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group float-right" style="max-width:300px">
                                                                        <select class="form-control" id="current-permissions-role">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Target</th>
                                                                                <th>Create</th>
                                                                                <th>Read</th>
                                                                                <th>Update</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="permissions-body">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Body-->
                                                <!--begin::Footer-->
                                                <div class="card-footer pb-0">
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <div class="row">
                                                                <div class="col-3"></div>
                                                                <div class="col-9">
                                                                    <input type="submit" class="btn btn-light-primary font-weight-bold" value="Save Changes">

                                                                    <a href="#" class="btn btn-clean font-weight-bold">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Footer-->
                                            </form>
                                        </div>
                                        <!-- end::Tab -->

                                        <!-- begin::Tab -->
                                        <div class="tab-pane px-7" id="kt_user_mapping" role="tabpanel">
                                            <form action="#" name="mapping-form" id="mapping-form">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Row-->
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <label class="col-3"></label>
                                                                <div class="col-9">
                                                                    <h6 class="text-dark font-weight-bold mb-10">User Mapping</h6>
                                                                </div>
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Group-->
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group float-right">
                                                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#user-mapping-modal">Add More</button>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="user-mapping-body">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Body-->
                                                <!--begin::Footer-->
                                                <!-- <div class="card-footer pb-0">
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <div class="row">
                                                                <div class="col-3"></div>
                                                                <div class="col-9">
                                                                    <a href="#" class="btn btn-light-primary font-weight-bold">Save
                                                                        changes</a>
                                                                    <a href="#" class="btn btn-clean font-weight-bold">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!--end::Footer-->
                                            </form>
                                        </div>
                                        <!-- end::Tab -->
                                    </div>
                                </div>
                                <!--begin::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <?php include_once "includes/panel_footer.php"; ?>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!--begin::Quick Actions Panel-->
    <?php include_once 'includes/panel_actions.php'; ?>
    <!--end::Demo Panel-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <?php include_once "includes/libs.php"; ?>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <!-- <script src="<?php //echo base_url('edit-user.js') 
                        ?>"></script> -->
    <!--end::Page Scripts-->
</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!--end::Body-->
<script>
    var lastInserted;
    var selectedCompany;

    let selectJSData = {
        selector: '.company-ajax',
        url: KBASE_URL + `company/${getItem('userData', 'userName')}/view`,
        placeholder: 'Search for a Company',
        formatList: formatList, // Custom Format List View
        formatListSelection: formatListSelection, // Selection objects function
    }
    let companaySelect = initSelect(selectJSData);

    /* Custom List View in Select2JS */
    function formatList(company) {
        if (company.loading) {
            return company.text;
        }
        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__title'></div>" +
            "</div>"
        );
        selectedCompany = company;
        $container.find(".select2-result-repository__title").text(company.companyName);
        return $container;
    }

    function formatListSelection(mData) {
        return mData.companyName || mData.text;
    }


    $(".company-ajax").on('change', function() {
        let selectedItem = $('.company-ajax').find(':selected');
        console.log(`Selected Company : ${selectedItem}`);
        showProfileInfo(selectedCompany);
    });


    // Add user Roles
    let roles = getItem('userRoles', 'roles').join(',');
    $('#userRole').val(roles);

    // Initialize Basic Info 
    // with Validation.js
    var _updateProfile = function() {
        var validation = FormValidation.formValidation(
            KTUtil.getById('profile-form'), {
                fields: {
                    userFullName: {
                        validators: {
                            notEmpty: {
                                message: 'Full Name is Required'
                            },
                        },
                    },
                    userMobile: {
                        validators: {
                            notEmpty: {
                                message: 'Mobile Number is required'
                            },
                            regexp: {
                                regexp: /^[6-9]\d{9}$/i,
                                message: 'Please Enter a Valid Mobile Number'
                            }
                        }
                    },
                    userEmail: {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'Please Enter a Valid Email Address'
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

        $('#profile-btn-submit').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                console.log(status);

                if (status == 'Valid') {
                    // Send data to server
                    let form = $('#profile-form');
                    let username = getItem('userData', 'userName')
                    postForm(KBASE_URL + `partner/${username}/edit/basicInfo`, form, false, false, function(mData, mStatus) {
                        if (mData.status === KSTATUS_SUCCESS) {
                            // update localstorage data with updated one
                            for (let i = 0; i < form[0].length; i++) {
                                let val = form[0][i].value;
                                let key = form[0][i].id;
                                if (key) {
                                    // $('#'+key).val(val);
                                    setItem('userData', key, val);
                                }
                            }
                            showToast(KSTATUS_SUCCESS, mData.msg);
                        } else {
                            showToast('error', mData.msg);
                        }
                    });
                }

            });
        });
    }


    var _initCompanyInfo = function() {
        var validation = FormValidation.formValidation(
            KTUtil.getById('profile-form'), {
                fields: {
                    companyAddress: {
                        validators: {
                            notEmpty: {
                                message: 'Company Address is Required'
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }

        );

        /////////////////////////////////////
        /////////////////////////////////////
        $('#company-form').on('submit', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                console.log(status);

                if (status == 'Valid') {
                    // Send data to server
                    let form = $('#company-form');
                    let username = getItem('userData', 'userName')
                    let companyId = $("#id").val();
                    postForm(KBASE_URL + `company/${companyId}/${username}/edit`, form, false, false, function(mData, mStatus) {
                        if (mData.status === KSTATUS_SUCCESS) {
                            // update localstorage data with updated one
                            showToast(KSTATUS_SUCCESS, mData.msg);
                        } else {
                            showToast('error', mData.msg);
                        }
                    });
                }

            });
        });
    };

    var _updateBillingInfo = function() {
        var validation = FormValidation.formValidation(
            KTUtil.getById('billing-form'), {
                fields: {
                    userFullName: {
                        validators: {
                            notEmpty: {
                                message: 'Full Name is Required'
                            },
                        },
                    },
                    userPanNumber: {
                        validators: {
                            notEmpty: {
                                message: 'PAN Number is required'
                            },
                        }
                    },
                    userAadharNumber: {
                        validators: {
                            notEmpty: {
                                message: 'Aadhar Number is required'
                            },
                        }
                    },
                    userBankName: {
                        validators: {
                            notEmpty: {
                                message: 'Bank Name is required'
                            },
                        }
                    },
                    userBankAddress: {
                        validators: {
                            notEmpty: {
                                message: 'Aadhar Address is required'
                            },
                        }
                    },
                    userBankIfsc: {
                        validators: {
                            notEmpty: {
                                message: 'IFSC is required'
                            },
                        }
                    },
                    userBankAccount: {
                        validators: {
                            notEmpty: {
                                message: 'Account Number is required'
                            },
                        }
                    },

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }

        );

        $('#billing-submit-btn').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                console.log('updating billing status: ' + status);
                if (status == 'Valid') {
                    // Send data to server
                    let form = $('#billing-form');
                    let username = getItem('userData', 'userName')
                    postForm(KBASE_URL + `billing/${username}/edit`, form, false, false, function(mData, mStatus) {
                        if (mData.status === KSTATUS_SUCCESS) {
                            // update localstorage data with updated one
                            for (let i = 0; i < form[0].length; i++) {
                                let val = form[0][i].value;
                                let key = form[0][i].id;
                                if (key) {
                                    // $('#'+key).val(val);
                                    setItem('userData', key, val);
                                }
                            }
                            showToast(KSTATUS_SUCCESS, mData.msg);
                        } else {
                            showToast('error', mData.msg);
                        }
                    });
                }

            });
        });
    }

    var _initChangePassword = function() {
        const form = KTUtil.getById('password-form');
        var validation = FormValidation.formValidation(
            form, {
                fields: {
                    userPassword: {
                        validators: {
                            notEmpty: {
                                message: 'Password is Required'
                            },
                            stringLength: {
                                min: 8,
                                message: 'Password must be minimum 8 characters'
                            }
                        },
                    },
                    userConfirmPassword: {
                        validators: {
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="userPassword"]').value;
                                },
                                message: 'Password does not matched.'
                            },

                        }
                    },

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }

        );

        $('#change-password-btn').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                console.log('updating billing status: ' + status);
                if (status == 'Valid') {
                    // Send data to server
                    let form = $('#password-form');
                    let username = getItem('userData', 'userName')
                    postForm(KBASE_URL + `partner/${username}/password/reset`, form, false, false, function(mData, mStatus) {
                        if (mData.status === KSTATUS_SUCCESS) {
                            showToast(KSTATUS_SUCCESS, mData.msg);
                            $('#password-form').trigger('reset');
                        } else {
                            showToast('error', mData.msg);
                        }
                    });
                }

            });
        });
    }

    _updateProfile();
    _initCompanyInfo();
    _updateBillingInfo();
    _initChangePassword();


    // Get all the users details 

    function fetchUserInfo() {

        let username = getItem('userData', 'userName');
        let url = KBASE_URL + `partner/${username}/view`;
        let data = {
            url: url,
            params: ''
        };

        postRequest(data, false, function(mData, mStatus) {
            if (mData.status === KSTATUS_SUCCESS) {
                let result = mData.data;
                let basicInfo = result.userBasicInfo;
                let companyInfo = result.userCompanyInfo;
                let billingInfo = result.userBillingInfo;

                // Insert values in forms; 

                showProfileInfo(basicInfo);
                showProfileInfo(companyInfo);
                showProfileInfo(billingInfo);

            } else {
                showToast('error', "Something Went Wrong", mData.msg);
            }
        });
    }

    function showProfileInfo(info) {
        if (info) {
            for (const [key, value] of Object.entries(info)) {
                $(`.${key}`).val(value);
            }
        }
    }


    // Setup Permissions
    function __init() {

        // Setup users page 
        setupPage();
        // Fetch users all info 
        fetchUserInfo();
        // Setup roles in permissions tab
        let rolesList = $('#current-permissions-role');

        let dbRoles = getItem('userRoles', 'roles');
        dbRoles.map((value, index) => {
            rolesList.append(new Option(value.toWord(), value));
        });

        rolesList.val(localStorage.getItem('currentRole'));

        // Show Permissions Permissions 
        showPermissions();

        // Fetch User Mappings :)
        getUserMappings();

        // Add Company
        let companyData = {
            id: getItem('companyInfo', 'id'),
            text: getItem('companyInfo', 'companyName')
        };
        var newOption = new Option(companyData.text, companyData.id, true, false);
        $('.companyName').append(newOption).trigger('change');

        /* Hide Permission if user is not super admin */
        if (localStorage.getItem('currentRole') !== 'super admin') {
            $('#tab_permissions').hide();
        }
    }

    $('#current-permissions-role').on('change', function() {
        showPermissions();
    });


    function setupPage() {

        let tabs = ['company', 'billing', 'permissions', 'userMapping'];
        tabs.map((value, index) => {
            if (!hasPermission(value, 'view', localStorage.getItem('currentRole'))) {
                $(`#tab_${value}`).hide();
            } else {
                $(`#tab_${value}`).show();
            }

        });
    }

    function showPermissions() {
        console.log("Show Permission");
        let select = $('#current-permissions-role');
        let permissions = getPermissions(select.val());
        let tbody = $('#permissions-body');
        let html = '';
        for (const [key, value] of Object.entries(permissions)) {
            console.log(`${key}: ${value}`);
            html += `<tr>`;
            html += `<td>${key.toWord()}</td>`
            if (value === 'all') {
                html += `<td><input type="checkbox" name="${key}_create" checked /></td>`;
                html += `<td><input type="checkbox" name="${key}_view" checked /></td>`;
                html += `<td><input type="checkbox" name="${key}_edit" checked /></td>`;
            } else {
                let permissionsArray = value.split(',');
                let defaultPermissions = ['create', 'view', 'edit'];

                defaultPermissions.map((value, index) => {
                    if (permissionsArray.indexOf(value) !== -1) {
                        html += `<td><input type="checkbox" name="${key}_${value}" checked /></td>`;
                    } else {
                        html += `<td><input type="checkbox" name="${key}_${value}" /></td>`;
                    }
                });
            }
            html += `</tr>`;
        }
        // Append in Table body 
        tbody.html(html);
    }

    function getPermissions(target) {
        let perm = getItem('userRoles', 'permissions');
        return perm[target];
    }


    function getUserMappings() {
        let mapping = $('#user-mapping-body');
        let html = '';
        for (let i = 1001; i < 1005; i++) {
            html += `<tr><td>${i}</td>
                <td>
                    <select class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">In-Active</option>
                    </select>
                </td>
            </tr>`;
        }

        mapping.html(html);
        lastInserted = 1005;
    }

    function addUserMapping() {
        event.preventDefault();
        let num = parseInt($('#mapping').val());
        if (num > 5) {
            showToast('error', "Error ", "Value Cannot be more than 5");
            return;
        }
        if (num < 1) {
            showToast('error', "Error", "Value cannot be less than 1");
            return;
        }

        // 
        appendUserMapping(lastInserted, num);
        $("#user-mapping-modal").modal('hide');

    }

    function appendUserMapping(start, num) {
        let mapping = $('#user-mapping-body');
        let html = '';
        for (let i = 0; i < num; i++) {
            html += `<tr><td>${start + i}</td>
                <td>
                    <select class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">In-Active</option>
                    </select>
                </td>
            </tr>`;
        }
        mapping.append(html);
        lastInserted += num;
    }

    $('#permission-form').on('submit', function() {
        event.preventDefault();
        let form = $('#permission-form');
        let postData = new Object();
        let data = new Object();
        $.each($(form).serializeArray(), function(_, field) {
            let key = field.name.split('_')[0];
            let val = field.name.split('_')[1];
            if (key in data) {
                data[key] += `,${val}`;
            } else {
                data[key] = val;
            }
        });
        let currentRole = localStorage.getItem('currentRole');
        postData[currentRole] = data;
        let username = getItem('userData', 'userName');

        let requestData = {
            url: KBASE_URL + `partner/${username}/edit/permissions`,
            params: "userRole=" + JSON.stringify(postData),
        }
        postRequest(requestData, false, function(mData, mStatus) {
            if (mData.status === KSTATUS_SUCCESS) {
                showToast(KSTATUS_SUCCESS, "Successfully", mData.msg);
            } else {
                showToast('error', mData.msg);
            }
        });

    });
    __init();
</script>

</html>