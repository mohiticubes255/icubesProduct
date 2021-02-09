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
                                    <div class="card-label">Package List</div>
                                </div>
                                <div class="card-toolbar">
            
                                    <a href="#" class="btn btn-sm btn-icon btn-light-primary" data-toggle="modal" data-custom="tooltip" title="Add New Package" data-target="#create-package-modal">
                                        <i class="flaticon2-add-1"></i>
                                    </a>
                                </div>
                            </div>
                                <div class="card-body">
                                  <!--begin: Datatable-->
                                    <div class="datatable datatable-bordered datatable-head-custom" id="tbl_package_list"></div>
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
                                        <input type="text"  name="packageName" id="apackageName" class="form-control" placeholder="Package Name" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary font-weight-bold" id="create-package-modal-btn">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <!--end::Main-->
    <?php include_once  FCPATH . '/pages/includes/panel_actions.php'; ?>
    <?php include_once FCPATH . "/pages/includes/libs.php"; ?>
    <!--begin::Page Scripts(used by this page)-->
    <!-- <script src="<?php// echo base_url('assets/js/list-datatable.js') ?>"></script> -->
    <!--end::Page Scripts-->

    <script>

        let data = {
            id : 'tbl_package_list',
            url : KBASE_URL + 'package/lists',
            columns : [
                    // {
                    //     field: 'packageName',
                    //     title: 'Package',
                    //     sortable: 'asc',
                    //     type: 'string',
                    //     selector: false,
                    //     textAlign: 'left',
                    //     width: 100,
                    //     template: function(data) {
                    //         return  `<a href='<?php echo base_url('package/view/');?>${data.packageId}'>${data.packageName.toWord()}</a>`;
                    //     }
                    // },
                    {
                        field: 'appIconUrl',
                        title: 'Icon',
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
                        title: 'Name',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        width: 100,
                        textAlign: 'center',
                        template: function(data) {
                            if(data.appName === "") {
                                return  `<a href='<?php echo base_url('package/view/');?>${data.packageId}'>${data.packageName}</a>`;
                            }else {
                                return  `<a href='<?php echo base_url('package/view/');?>${data.packageId}'>${data.appName.toWord()}</a>`;
                            }
                        }
                    },
                    {
                        field: 'packageCategory',
                        title: 'Category',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        width: 100,
                        textAlign: 'center',
                        template: function(data) {
                            return data.packageCategory;
                        }
                    },
                    // {
                    //     field: 'packageDesc',
                    //     title: 'Description',
                    //     sortable: 'asc',
                    //     type: 'string',
                    //     selector: false,
                    //     width: 100,
                    //     textAlign: 'center',
                    //     template: function(data) {
                    //         return data.packageDesc;
                    //     }
                    // },
                   
                   
                    {
                        field: 'packageOs',
                        title: 'Os',
                        sortable: 'asc',
                        type: 'string',
                        selector: false,
                        textAlign: 'center',
                        width: 100,
                        template: function(data) {
                            return data.packageOs;
                        }
                    },
                  
                   
                    // {
                    //     field: 'packageVersion',
                    //     title: 'Version',
                    //     sortable: 'asc',
                    //     type: 'string',
                    //     selector: false,
                    //     width: 100,
                    //     textAlign: 'center',
                    //     template: function(data) {
                    //         return data.packageVersion;
                    //     }
                    // },
                    {
                        field: 'packageRating',
                        title: 'Rating',
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
                        title: 'Status',
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

        var validation;
    function _packagevalidation(){
        
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
                        setTimeout("location.reload(true);", 1000);
                    } else {
                        showToast('error', mData.msg);
                    }
                });
            }
        });

    });
    </script>
</body>
<!--end::Body-->

</html>