/******/
(() => { // webpackBootstrap
    /******/
    "use strict";
    /*!***************************************************************!*
      !*** ../demo3/src/js/pages/custom/projects/list-datatable.js ***!
      \***************************************************************/

    // Class definition

    var KTAppsProjectsListDatatable = function() {
        // Private functions

        // basic demo
        var _demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: HOST_URL + '/api/datatables/demos/default.php',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },

                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    footer: false, // display/hide footer
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#kt_subheader_search_form'),
                    delay: 400,
                    key: 'generalSearch'
                },

                // columns definition
                columns: [{
                        field: 'RecordID',
                        title: '#',
                        sortable: 'asc',
                        width: 40,
                        type: 'number',
                        selector: false,
                        textAlign: 'left',
                        template: function(data) {
                            return '<span class="font-weight-bolder">' + data.RecordID + '</span>';
                        }
                    }, {
                        field: 'OrderID',
                        title: 'Thumbnail',
                        width: 150,
                        template: function(data) {
                            var number = KTUtil.getRandomInt(1, 10);
                            var img = number + '.png';

                            var output = '';
                            if (number < 7) {
                                output = '<div class="d-flex align-items-center text-center">\
								<div class="symbol symbol-40 symbol-circle symbol-sm">\
									<img class="" src="assets/media/project-logos/' + img + '" alt="photo"/>\
								</div>\
							</div>';
                            } else {
                                var stateNo = KTUtil.getRandomInt(0, 7);
                                var states = [
                                    'success',
                                    'primary',
                                    'danger',
                                    'success',
                                    'warning',
                                    'dark',
                                    'primary',
                                    'info'
                                ];
                                var state = states[stateNo];

                                output = '<div class="d-flex align-items-center text-center">\
								<div class="symbol symbol-40 symbol-circle symbol-light-' + state + '">\
									<span class="symbol-label font-size-h4">' + data.CompanyAgent.substring(0, 1) + '</span>\
								</div>\
							</div>';
                            }

                            return output;
                        },
                    }, {
                        field: 'Country',
                        title: 'Offer',
                        template: function(row) {
                            var output = '';

                            output += '<div class="font-weight-bolder font-size-lg mb-0">' + row.Country + '</div>';
                            output += '<div class="font-weight-bold text-muted">Code: ' + row.ShipCountry + '</div>';

                            return output;
                        }
                    }, {
                        field: 'ShipDate',
                        title: 'Status',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        template: function(row) {
                            var output = '';

                            var status = {
                                1: { 'title': 'Paid', 'class': ' label-light-primary' },
                                2: { 'title': 'Approved', 'class': ' label-light-danger' },
                                3: { 'title': 'Pending', 'class': ' label-light-primary' },
                                4: { 'title': 'Rejected', 'class': ' label-light-success' }
                            };
                            var index = KTUtil.getRandomInt(1, 4);

                            output += '<div class="font-weight-bolder text-primary mb-0">' + row.ShipDate + '</div>';
                            output += '<div class="text-muted">' + status[index].title + '</div>';

                            return output;
                        },
                    }, {
                        field: 'CompanyName',
                        title: 'Advertiser',
                        template: function(row) {
                            var output = '';

                            output += '<div class="font-weight-bold text-muted">' + row.CompanyName + '</div>';

                            return output;
                        }
                    }, {
                        field: 'Status',
                        title: 'Category',
                        // callback function support for column rendering
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Geo-Targetting',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Payout',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Revenue',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Total Revenue',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Rating',
                        sortable: false,
                        width: 130,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                        },
                    },
                ]
            });
        };

        return {
            // public functions
            init: function() {
                _demo();
            },
        };
    }();

    jQuery(document).ready(function() {
        KTAppsProjectsListDatatable.init();
    });

    /******/
})();
//# sourceMappingURL=list-datatable.js.map