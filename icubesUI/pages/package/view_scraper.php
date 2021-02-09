<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Package Scraper | <?php echo WEBSITE_TITLE; ?></title>
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
                                            Package Scraper
                                        </h3>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <div class="col-12 text-right">
                                        <center><input type="button" class="btn btn-light-primary font-weight-bold" id="run-scraper-btn" value="Run"></center>
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
                <?php include_once FCPATH . "/pages/includes/panel_footer.php"; ?>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    <!-- Modal-->
    <div class="modal fade" id="scraper-confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" aria-labelledby="staticBackdrop">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Run Scraper</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <strong>Are you sure want you run scraper ?</strong>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary font-weight-bold" id="run-scraper-modal-btn">Confirm</button>
                                    <button type="button"class="btn btn-danger font-weight-bold" data-dismiss="modal" aria-label="Close" id="create-package-modal-btn">Cancel</button>
                                </div>
                            </div>
                    </div>
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

    $(document).on('click','#run-scraper-btn',function(e){
        $('#scraper-confirmation-modal').modal();
    });
    $(document).on('click','#run-scraper-modal-btn',function(e){
        __init();
        $('#scraper-confirmation-modal').modal('toggle');
    });

    function __init() {
        let postData = [];
        let requestData = {
            url: KBASE_URL + `package/scraper`,
            params: "userRole=" + JSON.stringify(postData),
        }

        postRequest(requestData, false, function(mData, mStatus) {
            if (mData.status === 'success') {
                showToast(mData.status, 'Successfull', mData.msg);
            } else {
                showToast('error', 'Something went wrong', mData.msg);
            }
        });

    }
</script>

</html>