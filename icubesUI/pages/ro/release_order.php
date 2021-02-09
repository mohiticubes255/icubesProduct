<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Release Order | <?php echo WEBSITE_TITLE; ?></title>
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

    <!-- begin::Create Release Order Modal -->
    <!-- Modal-->
    <div class="modal fade" id="create-ro-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" id="release-order-form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><input type="text" name="roName" placeholder="Release Order Name" id="roName" class="form-control"></div>

                        <div class="form-group"><input type="file" name="roDoc" id="roDoc"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="button" id="ro-create-submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ends:: Create Release Order Modal -->
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
                                        <div class="card-label">Release Orders List</div>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="javascrip:;" class="btn btn-icon btn-light-primary mr-1" data-toggle="modal" data-target="#create-ro-modal" data-custom="tooltip" title="Create Release Order">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <div class="datatable datatable-bordered datatable-head-custom" id="tbl_release_orders"></div>
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

    <script>
        let data = {
            id: 'tbl_release_orders',
            url: KBASE_URL + 'roid/lists',
            columns: [{
                    field: 'id',
                    title: 'ROID',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return data.id;
                    }
                },
                {
                    field: 'roName',
                    title: 'RO Name',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'left',
                    template: function(data) {
                        return `<a href='<?php echo base_url('ro/view/'); ?>${data.id}'>${data.roName.toWord()}</a>`;
                    }
                },
                {
                    field: 'roDoc',
                    title: 'RODoc',
                    sortable: 'asc',
                    type: 'string',
                    selector: false,
                    textAlign: 'center',
                    template: function(data) {
                        if (data.roDoc !== '') {
                            return `<a target="_blank" href="${KBASE_URL}${data.roDoc}"><i class="fa fa-download"></i></a>`;
                        } else {
                            return `No Doc`;
                        }
                    }
                }
            ]
        };
        $(document).ready(function() {
            let dt = customDataTable(data);
        });


        var _handleReleaseForm = () => {
            var validation;
            validation = FormValidation.formValidation(
                KTUtil.getById('release-order-form'), {
                    fields: {
                        roName: {
                            validators: {
                                notEmpty: {
                                    message: 'Please Enter a Valid Input'
                                },
                            }
                        },
                        roDoc: {
                            validators: {
                                notEmpty : {
                                    message: 'Please Select a file first.'
                                },
                                file: {
                                    extension: 'pdf,doc,docx',
                                    type: 'application/pdf,application/msword',
                                    message: 'Please choose appropriate format'
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
            $('#ro-create-submit').on('click', function(e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        // Submit form
                        let form = $('#release-order-form');

                        postForm(KBASE_URL + `roid/create`, form, false, false, function(mData, mStatus) {
                            if (mData.status === KSTATUS_SUCCESS) {
                                showToast('success', "Success", mData.msg);
                                $('#release-order-form').trigger('reset');

                            } else {
                                showToast('error', mData.msg);
                            }
                        });

                    }
                });
            });
        };

        _handleReleaseForm();
    </script>
</body>
<!--end::Body-->

</html>