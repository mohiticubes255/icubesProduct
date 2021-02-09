<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Offer Details| <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once FCPATH . "/pages/includes/head.php" ?>
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!-- Select2min.css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <?php include_once FCPATH . "/pages/includes/mobile_header.php"; ?>
    <!--end::Header Mobile-->

    
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <?php include_once FCPATH . "/pages/includes/sidebar.php" ?>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <?php include_once FCPATH . "/pages/includes/header.php"; ?>
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
                                                <a class="nav-link active" data-toggle="tab" href="#kt_offer_details">
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
                                                    <span class="nav-text font-size-lg">Offer Details</span>
                                                    <small><?php //echo ucwords($offerid) ?></small>
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
                                        <div class="tab-pane show active px-7" id="kt_offer_details" role="tabpanel">
                                            <form name="profile-form" id="add-offer-form" enctype="multipart/form-data">
                                                <input type="hidden" name="currentRole" value="super admin">
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
                                                            <label class="col-form-label col-3 text-lg-right text-left">ROID
                                                            </label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <!-- <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div> -->
                                                                    <!-- <input type="text" class="form-control form-control-lg form-control-solid userMobile" value="default" placeholder="ROID" name="ROID" id="ROID" /> -->
                                                                    <select class="roid-ajax form-control form-control-lg form-control-solid roid" id="ROID" name="roId" style="width: 100%; background-color: #F3F6F9; color: #3F4254;">
                                                                        <option value="1">Default</option>
                                                                    </select>
                                                                </div>
                                                                <!-- <span class="form-text text-muted">We'll never share your mobile with anyone else.</span> -->
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Offer
                                                                Name</label>
                                                            <div class="col-9">
                                                                <input class="form-control form-control-lg form-control-solid " type="text" value="" name="campName" placeholder="Offer Name" id="campName" required />
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
                                                            <label class="col-form-label col-3 text-lg-right text-left">Offer Description
                                                            </label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <!-- <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div> -->
                                                                    <input type="text" required class="form-control form-control-lg form-control-solid" placeholder="Offer Description" name="campDescription" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Offer Vertical
                                                            </label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <!-- <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div> -->
                                                                    <select class="form-control form-control-lg form-control-solid companyName offerVertical" id="offerVertical" name="campVertical" style="width: 100%; background-color: #F3F6F9; color: #3F4254;">
                                                                        <option value="" required disabled selected>-- Select Offer Vertical ---</option>
                                                                        <option value="cps">CPS</option>
                                                                        <option value="cpi">CPI</option>
                                                                        <option value="cpc">CPC</option>
                                                                        <option value="cpm">CPM</option>
                                                                    </select>

                                                                </div>
                                                                <!-- <span class="form-text text-muted">We'll never share your mobile with anyone else.</span> -->
                                                                <div id="verticalForCPI" style="display:none; padding-top: 25px;">
                                                                    <fieldset class="scheduler-border">
                                                                        <legend class="scheduler-border">CPI</legend>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label col-3 text-lg-right text-left">Search Package</label>
                                                                            <div class="col-9">
                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                    <select class="package-ajax form-control form-control-lg form-control-solid packageNameSearch" name="campPackageId" id="packageNameSearch" style="width: 100%; background-color: #F3F6F9; color: #3F4254;">

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="packageDetails" style="display:none;">
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-3 text-lg-right text-left">Package Name</label>
                                                                                <div class="col-9">
                                                                                    <div class="input-group input-group-lg input-group-solid">
                                                                                        <input type="text" class="form-control form-control-lg form-control-solid packageName" value="" placeholder="Package Name" id="packageName" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-3 text-lg-right text-left">Package Rating</label>
                                                                                <div class="col-9">
                                                                                    <div class="input-group input-group-lg input-group-solid">
                                                                                        <input type="text" class="form-control form-control-lg form-control-solid packageRating" value="" placeholder="Package Rating" id="packageRating" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-3 text-lg-right text-left">Package Description</label>
                                                                                <div class="col-9">
                                                                                    <div class="input-group input-group-lg input-group-solid">
                                                                                        <textarea class="form-control form-control-lg form-control-solid packageDescription" id="packageDescription"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-form-label col-3 text-lg-right text-left">Package Status</label>
                                                                                <div class="col-9">
                                                                                    <div class="input-group input-group-lg input-group-solid">
                                                                                        <input type="text" class="form-control form-control-lg form-control-solid packageStatus" value="" placeholder="Package Status" id="packageStatus" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div id="packageCreate" style="display:none;">
                                                                            <button type="button" class="btn btn-light-primary font-weight-bold" id="packageCreate-btn" >Create Package</button>
                                                                        </div> -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Offer Scope
                                                            </label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <select class="form-control form-control-lg form-control-solid companyName" name="campScope" id="offerScope">
                                                                        <option value="" required disabled selected>-- Select Offer Scope ---</option>
                                                                        <option value="international">International</option>
                                                                        <option value="domestic">Domestic</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <hr />
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Has Capping</label>
                                                            <div class="col-9">

                                                            
                                                                
                                                                

                                                                <div class="input-group input-group-lg input-group-solid">
                                                                
                                                                    <div class="radio-inline">
                                                                        <label class="radio radio-lg">
                                                                        <input type="radio" class="form-control form-control-lg form-control-solid userCountry hasCapping" name="hasCapping" value="1">
                                                                        <span></span>Yes</label>
                                                                        <label class="radio radio-lg">
                                                                        <input type="radio" class="form-control form-control-lg form-control-solid userCountry hasCapping" name="hasCapping" value="0" checked>
                                                                        <span></span>No</label>
                                                                    </div>
                                                                </div>


                                                                <div id="CappingDetails" style="display:none;">
                                                                    <fieldset class="scheduler-border">
                                                                        <legend class="scheduler-border">Capping</legend>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label col-3 text-lg-right text-left">Capping On</label>
                                                                            <div class="col-9">
                                                                                <div class="input-group input-group-lg input-group-solid radio-inline">
                                                                                    <label class="radio"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="affiliate" name="campCappingOn" /><span></span>Affiliate</label>
                                                                                    <label class="radio"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="overall" name="campCappingOn" /><span></span>Overall</label>
                                                                                    <label class="radio"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="both" name="campCappingOn" checked/><span></span>Both</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label col-3 text-lg-right text-left">Capping Type</label>
                                                                            <div class="col-9">
                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                    <select class="form-control form-control-lg form-control-solid companyName" name="campCappingBase" id="CappingType">
                                                                                        <option value="" required disabled selected>-- Select Capping Base ---</option>
                                                                                        <option value="impression">Impression</option>
                                                                                        <option value="click">Click</option>
                                                                                        <option value="conversion">Conversion</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label col-3 text-lg-right text-left">Capping Frequency</label>
                                                                            <div class="col-9">
                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                    <select class="form-control form-control-lg form-control-solid companyName" name="campCappingFrq" id="frequency">
                                                                                        <option value="" required disabled selected>-- Select Capping Frequency ---</option>
                                                                                        <option value="daily">Daily</option>
                                                                                        <option value="weekly">Weekly</option>
                                                                                        <option value="monthly">Monthly</option>
                                                                                        <option value="yearly">Yearly</option>
                                                                                        <option value="custom">Custom</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row" id="customFrequency" style="display:none;">
                                                                            <label class="col-form-label col-3 text-lg-right text-left">Custom Date</label>
                                                                            <div class="col-9">
                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                    <input type="date" class="form-control form-control-lg form-control-solid userCountry " name="campCappingStartDate" placeholder="Start Date" />
                                                                                    <input type="date" class="form-control form-control-lg form-control-solid userCountry " name="campCappingEndDate" placeholder="End Date" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label col-3 text-lg-right text-left">Capping Value</label>
                                                                            <div class="col-9">
                                                                                <div class="input-group input-group-lg input-group-solid">
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid userCountry " name="campCapping" id="campCapping" placeholder="Capping Value" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                </fieldset>

                                                            </div>

                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Currency</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <select class="form-control form-control-lg form-control-solid companyName" name="campCur" id="currency">
                                                                        <option value="" required disabled selected>-- Select Currency ---</option>
                                                                        <option value="inr" selected>INR</option>
                                                                        <option value="usd">USD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Start Date</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="date" class="form-control form-control-lg form-control-solid userCity" placeholder="Start Date" value="" id="startDate" name="campStartDate" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">End Date</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="date" class="form-control form-control-lg form-control-solid userCity" placeholder="End Date" value="" id="endDate" name="campEndDate" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Offer Logo</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="file" class="form-control form-control-lg form-control-solid userCity" id="campLogo" name="campLogo" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Landing URL</label>
                                                            <div class="col-7">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userCity" placeholder="Landing URL" value="" id="landingUrl" name="landingUrl" />
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="input-group input-group-lg">
                                                                    <button class="btn btn-primary btn-sm" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Preview URL</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid userCity" placeholder="Preview URL" value="" id="previewUrl" name="previewUrl" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Visibility</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid">
                                                                    <select class="form-control form-control-lg form-control-solid companyName" name="campVisibility" id="visibility" required>
                                                                        <option value="" disabled selected>-- Select Visibility ---</option>
                                                                        <option value="public">Public</option>
                                                                        <option value="public approved">Public Approved</option>
                                                                        <option value="private">Private</option>
                                                                    </select>
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
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Goal Targeting</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid radio-inline">
                                                                    <label class="radio radio-lg"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="1" name="hasGoalTargeting" /><span></span>Yes</label>
                                                                    <label class="radio radio-lg"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="0" name="hasGoalTargeting" checked/><span></span>No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-3 text-lg-right text-left">Geo Targeting</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-lg input-group-solid radio-inline">
                                                                    <label class="radio radio-lg"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="1" name="hasGeoTargeting" /><span></span>Yes</label>
                                                                    <label class="radio radio-lg"><input type="radio" class="form-control form-control-lg form-control-solid userCountry " value="0" name="hasGeoTargeting" checked/><span></span>No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!--begin::Footer-->
                                                        <div class="card-footer pb-0">
                                                            <div class="row">
                                                                <div class="col-12 text-right">
                                                                    <input type="button" class="btn btn-light-primary font-weight-bold" id="create-offer-submit" value="Add Offer" />
                                                                    <!-- <a href="#" class="btn btn-clean font-weight-bold">Cancel</a> -->
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
                <!-- Modal-->
                <div class="modal fade" id="create-package-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="create-package-modal-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Package</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label>Package Name</label>
                                    <div class="form-group">
                                        <input type="text" name="packageName" id="apackageName" class="form-control" placeholder="Package Name" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary font-weight-bold" id="create-package-modal-btn">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--begin::Footer-->
                <?php include_once FCPATH . "/pages/includes/panel_footer.php"; ?>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!--begin::Quick Actions Panel-->
    <?php include_once FCPATH . '/pages/includes/panel_actions.php'; ?>
    <!--end::Demo Panel-->
    <!--begin::Global Config(global config for global JS scripts)-->

    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <?php include_once FCPATH . "/pages/includes/libs.php"; ?>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <!-- <script src="<?php// echo base_url('edit-user.js') ?>"></script> -->
    <!--end::Page Scripts-->
</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!--end::Body-->
<script>
    $('.companyName').select2({
        placeholder: 'Select One Option',
        allowClear: true
    });

    // Init select2js in roles options



    $('.offerVertical').select2({
        placeholder: 'Select a Vertical',
        allowClear: true
    });

    $('.ROID').select2({
        placeholder: 'Select a ROID',
        allowClear: true
    });



    $(".package-ajax").select2({
        ajax: {
            url: KBASE_URL + `package/search`,
            dataType: 'json',
            delay: 250,
            type: 'POST',
            headers: {
                'accessToken': getItem('tokenInfo', 'accessToken')
            },
            data: function(params) {
                return {
                    query: params.term, // search term
                    userId: getItem('userData', 'userId'),
                    currentRole: localStorage.getItem('currentRole'),
                    page: params.page
                };
            },
            beforeSend: function(xhr, opts) {
                let params = new URLSearchParams(opts.data);
                let query = params.get('query');
                if (query.length < 2) {
                    xhr.abort();
                    return false;
                }
                $('#apackageName').val(query);

            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                if (data.data.length > 0) {
                    localStorage.packageData = JSON.stringify(data.data);
                    $('#packageCreate').hide();
                    $(".package-ajax").on('change', function() {
                        let selectedItem = $('.package-ajax').find(':selected');
                        $('#packageDetails').show();
                        var pid = $('.package-ajax').val();
                        var packages = localStorage.getItem("packageData");

                        $.each(JSON.parse(packages), function(idx, obj) {
                            if (obj.id == pid) {
                                $('#packageName').val(obj.packageName);
                                $('#packageRating').val(obj.packageRating);
                                $('#packageDescription').val(obj.packageDesc);
                                $('#packageStatus').val(obj.packageStatus);
                            }
                        });
                    })
                } else {
                    $('#packageCreate').show();
                    $('#packageDetails').hide();
                }

                return {
                    results: data.data
                };
            },
            cache: true
        },
        placeholder: 'Search for a Package',
        minimumInputLength: 2,
        templateResult: formatPackage,
        templateSelection: formatPackageSelection
    }).on('select2:open', () => {
        $(".select2-results:not(:has(a))").append('<span class="select2-results__option select2-results__message mb-2" data-toggle="modal" data-target="#company-create-modal"><a href="javascript:void(0)" id="packageCreate" style="display: none;">Add New Package</a></span>');
    });

    $(".roid-ajax").select2({
        dropdownCssClass: "custom-dropdown",
        ajax: {
            url: KBASE_URL + `roid/search`,
            dataType: 'json',
            delay: 250,
            type: 'POST',
            headers: {
                'accessToken': getItem('tokenInfo', 'accessToken')
            },
            data: function(params) {
                return {
                    query: params.term,
                    currentRole: localStorage.getItem('currentRole'), // search term
                };
            },
            beforeSend: function(xhr, opts) {
                let params = new URLSearchParams(opts.data);
                let query = params.get('query');
                if (query.length < 2) {
                    xhr.abort();
                    return false;
                }
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                return {
                    results: data.data
                };
            },
            cache: true
        },
        placeholder: 'Search for a ROID',
        minimumInputLength: 2,
        templateResult: formatROID,
        templateSelection: formatROIDSelection
    });

    function formatPackage(package) {
        if (package.loading) {
            return package.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__title'></div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(package.packageName);
        return $container;
    }

    function formatPackageSelection(repo) {
        return repo.packageName || repo.text;
    }
    // FOR ROID
    function formatROID(ro) {
        if (ro.loading) {
            return ro.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__title'></div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(ro.roName);
        return $container;
    }

    function formatROIDSelection(repo) {
        return repo.roName || repo.text;
    }
</script>

<script>
    $(document).ready(function() {
        $('.hasCapping').click(function() {
            var has = $(this).val();
            if (has == '1') {
                $('#CappingDetails').show();
            } else {
                $('#CappingDetails').hide();
            }
        });

        $('#frequency').change(function() {
            var frequency = $(this).val();
            if (frequency == 'custom') {
                $('#customFrequency').show();
            } else {
                $('#customFrequency').hide();
            }
        });

        $('#offerVertical').change(function() {
            var vertical = $(this).val();
            if (vertical == 'cpi') {
                $('#verticalForCPI').show();
            } else {
                $('#verticalForCPI').hide();
            }
        });

    });

    $(document).on('click', '#packageCreate', function() {
        $('#create-package-modal').modal();
    });
    var validation;

    function _packagevalidation() {

        var form = KTUtil.getById('create-package-modal-form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form, {
                fields: {
                    packageName: {
                        validators: {
                            notEmpty: {
                                message: 'Package Name is required'
                            },
                            stringLength: {
                                min: 2,
                                message: 'Package Name must be mimimum 2 digits'
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
        return validation;
    }

    $('#create-package-modal-btn').on('click', function(e) {
        e.preventDefault();
        _packagevalidation();
        $('.fv-plugins-message-container').html('');
        validation.validate().then(function(status) {
            if (status == 'Valid') {
                let form = $('#create-package-modal-form');
                postForm(KBASE_URL + 'package/create', form, false, false, function(mData, mStatus) {
                    if (mData.status === KSTATUS_SUCCESS) {
                        showToast(KSTATUS_SUCCESS, mData.msg);
                        $('#create-package-modal-form').trigger('reset');
                    } else {
                        showToast('error', mData.msg);
                    }
                });
            }
        });

    });


    var _handleOfferSubmit = function() {
        var validation;
        let condtionallyValidations = {};

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('add-offer-form'), {
                fields: {
                    campName: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter a valid Offer Name'
                            },
                        }
                    },
                    campVertical: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter a Valid Offer Vertical'
                            },
                        }
                    },
                    campScope: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter a Valid Offer Scope'
                            },
                        }
                    },
                    campStartDate: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter a Offer Start Date'
                            },
                        }
                    },
                    landingUrl: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter a Valid Landing URL'
                            },
                        }
                    },
                    previewUrl: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter a valid Preview URL'
                            },
                        }
                    },
                    campVisibility: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Visibility'
                            },
                        }
                    },
                    hasGoalTargeting: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Goal Targeting'
                            },
                        }
                    },
                    hasGeoTargeting: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Geo Targeting'
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

        // Handle submit button
        $('#create-offer-submit').on('click', function(e) {
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    // Submit form
                    let form = $('#add-offer-form');
                    postForm(KBASE_URL + 'offer/create/basic', form, false, false, function(mData, mStatus) {
                        if (mData.status === KSTATUS_SUCCESS) {
                            showToast(KSTATUS_SUCCESS, mData.msg);
                            $('#add-offer').trigger('reset');
                        } else {
                            showToast('error', mData.msg);
                        }
                    });

                }
            });
            return false;
        });

    }



    // $('#create-offer-submit').on('click', function(e) {
    //     e.preventDefault();
    //     // _packagevalidation();
    //     $('.fv-plugins-message-container').html('');
    //     // validation.validate().then(function(status) {
    //     // if (status == 'Valid') {

    //     // }
    //     // });

    // });

    _handleOfferSubmit();
</script>



</html>