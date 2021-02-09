<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Offer Headers | <?php echo WEBSITE_TITLE; ?></title>
    <?php include_once FCPATH . "/pages/includes/head.php" ?>
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <style>
        .remove-header {
            color: red;
            padding: 10px;
            cursor: pointer;
        }
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
                                        <div class="card-label">Headers List</div>
                                    </div>
                                    <div class="card-toolbar">

                                        <a href="#" class="btn btn-sm btn-icon btn-light-primary" data-toggle="modal" data-custom="tooltip" title="Add New Header" data-target="#create-header-modal">
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
        <div class="modal fade" id="create-header-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="create-header-modal-form">
                    <!-- Value can be create or update -->
                    <input type="hidden" id="action" value="create">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Headers</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Network Name</label>
                                <input type="text" name="networkName" id="networkName" class="form-control" placeholder="Network Name" required>
                            </div>

                            <div class="form-group" id="header-container">
                                <label>Header Name </label>
                                <label class="float-right" id="add-template" data-custom="tooltip" title="Add new Header" style="cursor: pointer;"><i class="fa fa-plus"></i></label>
                                <div class="form-group">
                                    <input type="text" name="headerName[]" class="form-control" placeholder="Header Name" required>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary font-weight-bold" id="header-submit-btn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Main-->
    <?php include_once  FCPATH . '/pages/includes/panel_actions.php'; ?>
    <?php include_once FCPATH . "/pages/includes/libs.php"; ?>

    <script>
        let data = {
            id: 'tbl_package_list',
            url: KBASE_URL + 'camp/header/list',
            columns: [{
                    field: 'networkId',
                    title: 'ID',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    width: 100,
                    textAlign: 'center',
                    template: function(data) {
                        return data.networkId;
                    }
                },
                {
                    field: 'networkName',
                    title: 'Name',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    width: 100,
                    textAlign: 'center',
                    template: function(data) {
                        return data.networkName;
                    }
                },
                {
                    field: 'networkStatus',
                    title: 'Status',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    width: 100,
                    textAlign: 'center',
                    template: function(data) {
                        return data.networkStatus;
                    }
                },

                {
                    field: 'macrosList',
                    title: 'Macros',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'center',
                    width: 100,
                    template: function(data) {
                        return data.macrosList;
                    }
                },
            ]
        };
        $(document).ready(function() {
            let dt = customDataTable(data);
        });

        var _handleHeaderForm = function() {
            var validation;
            validation = FormValidation.formValidation(
                KTUtil.getById('create-header-modal-form'), {
                    fields: {
                        networkName: {
                            validators: {
                                notEmpty: {
                                    message: 'Header Name is required'
                                },
                                stringLength: {
                                    min: 2,
                                    message: 'Package Name must be mimimum 2 digits'
                                }
                            }
                        },
                        headerName: {
                            validators: {
                                notEmpty: {
                                    message: 'Header Name is Required'
                                }
                            }
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

            ).on('core.field.added', function(e) {
                console.log(e);
            });

            $('#header-submit-btn').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        let form = $('#create-package-modal-form');
                        postForm(KBASE_URL + 'camp/header/create', form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                showToast(KSTATUS_SUCCESS, mData.msg);
                                // $('#create-package-modal-form').trigger('reset');
                                // setTimeout("location.reload(true);", 1000);
                            } else {
                                showToast('error', mData.msg);
                            }
                        });
                    }
                });
            });
        }


        $('#add-template').on('click', function() {
            addFormHeader();
        });

        var addFormHeader = () => {
            let headers = $('#header-container');
            let template = `<div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" name="headerName[]" class="form-control" placeholder="Header Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <i class="remove-header fa fa-minus"></i>
                                        </div>
                                    </div>
                                </div>`;
            headers.append(template);
            __init();
        }




        $('body').on('click', function() {
            $('.remove-header').click(function() {
                let elem = $(this);
                let parent = elem.parent().parent().parent();
                parent.remove();
            });
        });



        function __init() {
            _handleHeaderForm();
        }

        $(document).ready(function() {
            __init();
        });
    </script>
</body>
<!--end::Body-->

</html>