<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Dashboard | <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once FCPATH . "/pages/includes/head.php" ?>
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_userslist"></div>
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
    </div>
    <!--end::Main-->
    <?php include_once  FCPATH . '/pages/includes/panel_actions.php'; ?>

    <?php include_once FCPATH . "/pages/includes/libs.php"; ?>
    <!--begin::Page Scripts(used by this page)-->
    <!-- <script src="<?php echo base_url('assets/js/list-datatable.js') ?>"></script> -->
    <!--end::Page Scripts-->

    <script>
        let data = {
            id: 'kt_userslist',
            url: KBASE_URL + 'users/list',
            columns: [{
                    field: 'userName',
                    title: 'Username',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return `<a href='<?php echo base_url('user'); ?>/view/${data.userName}'>${data.userName}</a>`;
                    }
                },
                {
                    field: 'userFullName',
                    title: 'User Full Name',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return data.userFullName.toWord();
                    }
                },
                {
                    field: 'userEmail',
                    title: 'Email',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return data.userEmail;
                    }
                },
                {
                    field: 'userMobile',
                    title: 'Mobile',
                    sortable: 'asc',
                    width: 80,
                    type: 'number',
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return data.userMobile;
                    }
                },
                {
                    field: 'userType',
                    title: 'Type',
                    sortable: 'asc',
                    type: 'string',
                    width: 70,
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return data.userType.toWord();
                    }
                },
                {
                    field: 'userStatus',
                    title: 'Status',
                    sortable: 'asc',
                    width: 80,
                    type: 'string',
                    selector: false,
                    textAlign: 'center',
                    template: function(data) {
                        return data.userStatus.toWord();
                    }
                }
            ]
        };
        $(document).ready(function() {
            let userListDataTable = customDataTable(data);
        });
    </script>
</body>
<!--end::Body-->

</html>