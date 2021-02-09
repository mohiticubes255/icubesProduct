<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Package | <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once FCPATH . "/pages/includes/head.php" ?>
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
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Package Details
                                            <small><?php echo ucwords($packageid) ?></small>
                                        </h3>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <form action="#" id="roid-form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <input type="text" class="form-control id" name="packageName" id="packageName" placeholder="Package">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <input type="text" class="form-control appName" name="appName" id="appName" placeholder="APP Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <input type="text" class="form-control packageDesc" name="packageDesc" id="packageDesc" placeholder="APP Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <input type="text" class="form-control input-number packageRating" name="packageRating" id="packageRating" placeholder="APP Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <input type="text" class="form-control packageDesc" name="packageDesc" id="packageDesc" placeholder="APP Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <select class="form-control packageDesc" name="packageOs" id="packageOs">
                                                        <option value="android">Android</option>
                                                        <option value="ios">Ios</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ro_name"></label>
                                                    <select class="form-control packageDesc" name="packageStatus" id="packageStatus">
                                                        <option value="success">Success</option>
                                                        <option value="invalid">Invalid</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Submit Btn -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Submit" class="btn btn-primary float-right">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
</body>

<!--end::Body-->
<script>
    // Setup Permissions
    function __init() {
        let url = KBASE_URL + `package/<?php echo $packageid ?>/view`;
        let form = $('#roid-form');

        postForm(url, form, false, false, function(mData, mStatus) {
            if (mData.status === KSTATUS_SUCCESS) {
                let d = mData.data;
                d.map((data, index) => {
                    for (const [key, value] of Object.entries(data)) {
                        $(`#${key}`).val(value);
                    }
                })
            }
        });

    }

    __init();
</script>

</html>