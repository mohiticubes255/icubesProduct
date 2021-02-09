<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Package | <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once FCPATH . "/pages/includes/head.php" ?>
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
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
                    <?php include_once  FCPATH . "/pages/includes/header.php"; ?>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="card-label">Offers List</div>
                                </div>
                                <div class="card-toolbar">
            
                                   
                                </div>
                            </div>
                                <div class="card-body">
                                  <!--begin: Datatable-->
                                    <div class="datatable datatable-bordered datatable-head-custom" id="tbl_offer_list"></div>
                                    <!--end: Datatable-->
                                </div>
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

    <?php include_once  FCPATH . '/pages/includes/panel_actions.php'; ?>
    <?php include_once FCPATH . "/pages/includes/libs.php"; ?>
    <!--begin::Page Scripts(used by this page)-->
    <!-- <script src="<?php// echo base_url('assets/js/list-datatable.js') ?>"></script> -->
    <!--end::Page Scripts-->

    <script>

        let data = {
            id : 'tbl_offer_list',
            url : KBASE_URL + 'package/lists',
            columns : [
                    {
                        field: 'appIconUrl',
                        title: 'Logo',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        width: 100,
                        textAlign: 'center',
                        template: function(data) {
                            if(data.appIconUrl !== '') {
                                return `<img src="${data.appIconUrl}" width="50px" />`;
                            }else {
                                return `No Icon`;
                            }
                        }
                    },
                    {
                        field: 'appName',
                        title: 'ID',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        width: 100,
                        textAlign: 'center',
                        template: function(data) {
                            if(data.appName === "") {
                                return  `<a href='<?php echo base_url('offers/view/');?>${data.packageId}'>${data.packageName}</a>`;
                            }else {
                                return  `<a href='<?php echo base_url('offers/view/');?>${data.packageId}'>${data.appName.toWord()}</a>`;
                            }
                        }
                    },
                    {
                        field: 'packageCategory',
                        title: 'Name',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        width: 100,
                        textAlign: 'center',
                        template: function(data) {
                            return data.packageCategory;
                        }
                    },
                    {
                        field: 'packageOs',
                        title: 'Vertical',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        textAlign: 'center',
                        width: 100,
                        template: function(data) {
                            return data.packageOs;
                        }
                    },
                    {
                        field: 'packageRating',
                        title: 'Expiry',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        textAlign: 'center',
                        width: 100,
                        template: function(data) {
                            return data.packageRating;
                        }
                    },
                    {
                        field: 'packageStatus',
                        title: 'Manager',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        textAlign: 'center',
                        width: 100,
                        template: function(data) {
                            if(data.packageStatus === "success") {
                                return  `<span class="label label-lg font-weight-bold label-light-success label-inline">Success</span>`;
                            }else {
                                return  `<span class="label label-lg font-weight-bold label-light-danger label-inline">Invalid</span>`;
                            }
                        }
                    },
                ]
        };
        $(document).ready(function(){
            let dt = customDataTable(data);
        });


    </script>
</body>
<!--end::Body-->

</html>