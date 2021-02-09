/* STATUS CONSTANTS */
var KSTATUS_SUCCESS = "success";
var KSTATUS_ERROR = "fail";
var KSTATUS_WARNING = "warning";
var KSTATUS_INFO = "info";
var KBASE_URL = "http://icubespanel.com/";


toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

/* 
 * Global Variables
 */

/* ajaxCalling used for prevent click on next and previous button on pagination on datatables */
var ajaxCalling = false;

/*
 * This method show Toast on screen 

 * Status => success / info / warning
 * heading => string
 * description => string 
 * 
 */
function showToast(status, heading, description) {
    if (status === KSTATUS_SUCCESS) {
        toastr.success(description, heading);
    } else if (status === 'info') {
        toastr.info(description, heading);
    } else if (status === 'warning') {
        toastr.warning(description, heading);
    } else {
        toastr.error(description, heading);
    }
}

// Show Universal loader in 
// all the screens
// Mostly used with API Calls

function showLoader() {
    $('.loader-overlay').css('display', 'block');
}

// Hide Loader

function hideLoader() {
    $('.loader-overlay').css('display', 'none');
}

/* 
 * This method Post whole HTML form with Files
 * URL : string (Target URL)
 * Form : $('#form');
 * btn : $('#sbmit-btn');
 * btnValue : Value when Button is Enable again'
 * callback : function -> return received data from API calls
 */
function postForm(url, form, btn = false, btnValue = false, callback) {
    showLoader();
    let fd = new FormData();
    if (btn) {
        disableBtn(btn);
    }
    if ($('input[type="file"]')) {
        //check if form has file in it.
        //  // for multiple files
        let length = $('input[type="file"]').length;
        for (let i = 0; i < length; i++) {
            if ($('input[type="file"]')[i]) {
                let uploadedFiles = $('input[type="file"]')[i];
                let file_data = uploadedFiles.files;
                for (let j = 0; j < file_data.length; j++) {
                    fd.append(uploadedFiles.name, file_data[j]);
                }
            }
        }
    }
    let other_data = $(form).serializeArray();
    $.each(other_data, function(key, input) {
        fd.append(input.name, input.value);
    });
    let userHeaders = {
        'apiKey': 'xyz',
    };

    if (localStorage.getItem('isLoggedIn') === 'true') {
        let userData = JSON.parse(localStorage.getItem('userData'));
        let tokenData = JSON.parse(localStorage.getItem('tokenInfo'));
        let userId = userData.userId;
        let token = tokenData.accessToken;
        fd.append('userId', userId);
        fd.append('accessToken', token);
        fd.append('currentRole', localStorage.getItem('currentRole'));
        userHeaders = {
            'accessToken': token,
        };
    }

    // For Tmp
    // fd.append('userAccountType', 'affiliate');

    $.ajax({
        type: "POST",
        url: url,
        data: fd,
        crossDomain: true,
        processData: false,
        contentType: false,
        cache: false,
        cors: true,
        headers: userHeaders,
        error: function(xhr, textStatus, errorThrown) {
            var d = xhr.responseJSON;
            if (d.msg) {
                hideLoader();
                if (d.data !== undefined) {
                    let action = d.data.action;
                    if (action !== undefined) {
                        if (action === 'logout') {
                            // Logout User 
                            logoutUser();
                            return;
                        }
                    }
                }
                // showToast(KSTATUS_ERROR, "Error", d.msg);
                callback(d, textStatus);
            } else {
                hideLoader();
                showToast(
                    KSTATUS_ERROR,
                    "Something Went Wrong",
                    "Internal Server Error"
                );
            }

            if (btn) {
                enableBtn(btn, btnValue);
            }
        },
        success: function(data, status) {
            hideLoader();
            console.log(data);
            if (btn) {
                enableBtn(btn, btnValue);
            }
            callback(data, status);
        },
    });
}

/* 
 * This method Post manually input data
 * data (object) -> data.url = string, data.params = 'title=acb&name=abc'
 * btn : $('#sbmit-btn');
 * callback : function -> return received data from API calls
 */

function postRequest(data, btn = false, callback) {
    showLoader();
    if (btn) {
        disableBtn(btn);
    }
    let params = data.params + '&apiKey=xyz';
    let userHeaders = { 'apiKey': 'xyz' };

    if (localStorage.getItem('isLoggedIn') === 'true') {
        let userData = JSON.parse(localStorage.getItem('userData'));
        let tokenData = JSON.parse(localStorage.getItem('tokenInfo'));
        let userId = userData.userId;
        let token = tokenData.accessToken;
        let ipAddress = tokenData.ipAddress;
        let currentRole = localStorage.getItem('currentRole');
        params += `&userId=${userId}&ipAddress=${ipAddress}&currentRole=${currentRole}`
            userHeaders = { 'accessToken': token };
    }
    $.ajax({
        type: "POST",
        url: data.url,
        data: params,
        headers: userHeaders,
        error: function(xhr, textStatus, errorThrown) {
            let d = xhr.responseJSON;
            if (d.msg) {
                logger(d.msg);
                hideLoader();
                if (d.data !== undefined) {
                    let action = d.data.action;
                    if (action !== undefined) {
                        if (action === 'logout') {
                            // Logout User 
                            logoutUser();
                        }
                    }
                }
                callback(d, status);
            } else {
                showToast(
                    KSTATUS_ERROR,
                    "Unable to connect.",
                    "Unable to connect to the server :("
                );
            }

            if (btn) {
                enableBtn(btn);
            }
            hideLoader();
        },
        success: function(data, status) {
            if (btn) {
                enableBtn(btn);
            }
            hideLoader();
            callback(data, status);
        },
    });
}


$(document).ready(function() {
    $('[data-custom="tooltip"]').tooltip();
    $('[data-toggle="tooltip"]').tooltip();
});


/* Disable any button with wait text*/
function disableBtn(btn) {
    btn.prop("disabled", true);
    btn.val("Wait..");
}

/* Enable any button with custom text*/
function enableBtn(btn, text = false) {
    btn.prop("disabled", false);
    if (text) {
        btn.val(text);
    }
}


/*
 * Indian Money Format
 */

function formatMoney(money) {
    money = money.toString();
    let afterPoint = "";
    if (money.indexOf(".") > 0)
        afterPoint = money.substring(money.indexOf("."), money.length);
    money = Math.floor(money);
    money = money.toString();
    let lastThree = money.substring(money.length - 3);
    let otherNumbers = money.substring(0, money.length - 3);
    if (otherNumbers !== "") lastThree = "," + lastThree;
    return (
        otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint
    );
}

// Get current date
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

String.prototype.toWord = (function() {
    let arr = this.split(' ');
    let string = '';
    arr.forEach(element => {
        let word = element.charAt(0).toUpperCase() + element.slice(1);
        string += ' ' + word;
    });
    return string;
})

// Allow only numbers

$('.input-number').on('keypress', function(e) {
    return e.metaKey || // cmd/ctrl
        e.which <= 0 || // arrow keys
        e.which == 8 || // delete key
        /[0-9.]/.test(String.fromCharCode(e.which)); // numbers
})

/* Logout user and clear all the localStorage */
function logout() {
    // Logout User
    let uname = getItem('userData', 'userName');
    let data = {
        url: KBASE_URL + `user/${uname}/logout`,
        params: '',
    }
    postRequest(data, false, function(mData, mStatus) {
        if (mData.status === "success") {
            logoutUser();
        } else {
            showToast('error', "Something Went Wrong", mData.msg);
        }
    });
}


function logoutUser() {
    localStorage.clear();
    window.location.assign('/auth/login');
}

// Some helper Functions for get users info
function getItem(item, key) {
    let object = localStorage.getItem(item);
    if (object) {
        let json = JSON.parse(object);
        return json[key];
    }
    return "";
}

function setItem(item, key, value) {
    let object = localStorage.getItem(item);
    if (object) {
        let json = JSON.parse(object);
        json[key] = value;
        localStorage.setItem(item, JSON.stringify(json));
    }
    return "";
}


/*
 *  @vertical like 'campaign, user, report, company' etc
 *  @action like 'create,view,edit'
 *  @currentRole like current role of the loggedin user
 */
function hasPermission(vertical, action, currentRole) {
    let permissions = getItem('userRoles', 'permissions');
    if (permissions[currentRole]) {
        let accessPermissions = permissions[currentRole][vertical];
        if (accessPermissions) {
            // Check if permission is allowed 
            // or not for a particualar role
            if (accessPermissions === 'all') {
                // All permissions are allowed
                return true;
            } else {
                let perm = accessPermissions.split(',');
                for (let i = 0; i < perm.length; i++) {
                    if (perm[i] === action) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}


/*
 *  Custom Method for 
 *  Datatables.js 
 *  
 */

function customDataTable(data) {
    let dt = $('#' + data.id).KTDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'POST',
                    url: data.url,
                    headers: {
                        'accessToken': getItem('tokenInfo', 'accessToken')
                    },
                    params: {
                        'currentRole': localStorage.getItem('currentRole')
                    },
                    map: function(raw) {
                        ajaxCalling = false;
                        if (raw.isNext !== undefined) {
                            if (raw.isNext === 'yes') {
                                $('#next-btn').removeClass('disabled');
                            } else {
                                $('#next-btn').addClass('disabled');

                            }
                        }
                        //////////////////////////////////////////////
                        if (raw.meta.page > 1) {
                            $('#prev-btn').removeClass('disabled');
                        } else {
                            $('#prev-btn').addClass('disabled');
                        }
                        let data = new Array();
                        let maxLength = $('#dt-limit').val();

                        for (let i = 0; i < raw.data.length; i++) {
                            console.log(`Current: ${i} max : ${maxLength}`);
                            if ((i + 1) > maxLength) {
                                break;
                            }
                            let tmp = raw.data[i];
                            data.push(tmp);

                        }
                        return data;
                    }
                },

            },
            pageSize: $('#dt-limit').val(), // display 10 records per page
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            saveState: false,
        },
        // layout definition
        layout: {
            scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
            footer: false, // display/hide footer
            height: 700,
        },

        // column sorting
        sortable: true,
        pagination: false,
        columns: data.columns,
    });
    /* DataTable Ends */

    /* When Ajax is SuccessFull */
    dt.on('datatable-on-ajax-done', function() {
        $('.kt-components').show();
        hideDTLoader();
    });

    /* When Ajax is Fail */
    dt.on('datatable-on-ajax-fail', function(event, xhr) {
        $('.kt-components').hide();
        let response = xhr.responseJSON;
        if (response.msg !== undefined) {
            showToast('error', 'Error', response.msg);
            if (response.data !== undefined) {
                let action = response.data.action;
                if (action === 'logout') {
                    // Logout User 
                    logoutUser();
                }
            }
        } else {
            showToast('error', 'Error', 'Internal Server Error');
        }
        hideDTLoader();
    });

    // Add Search on top
    $('.datatable').prepend(`<div class="form-group">
    <input type="text" class="form-control form-control-lg form-control-solid h-40px" placeholder="Search..." id="general-search" />
</div>`);

    // Add Pagination Button 
    $('.datatable').append(`<br/><nav aria-label="Pagination" style="display:flex" class="kt-components">
    <hr/>
    <ul class="pagination dt-pagination w-50">
        <li class="page-item" id="prev-btn"><a class="page-link" href="javascript:;">Previous</a></li>
        <li class="page-item" id="next-btn"><a class="page-link" href="javascript:;">Next</a></li>
    </ul>
    <ul class="page-limit dt-page-limit w-50">
        <div class="form-group">
            <select class="form-control float-right" id="dt-limit" style="width:100px">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
        </div>
    </ul><hr/>
</nav><div class="dt-loader d-none"><div class="text-center">Please Wait..&nbsp;&nbsp;<span class="spinner spinner-track text-center spinner-primary spinner-md"></span></div></div>`);

    // Add Per Page Limit 
    $('#prev-btn, #next-btn').on('click', function() {
        if (!ajaxCalling) {
            // Reload Table only IF ajax is not processing 
            let id = $(this).attr('id');
            let currentPage = dt.getDataSourceParam('pagination.page');
            console.log(currentPage);
            if (id === 'prev-btn') {
                if (currentPage <= 1) {
                    return;
                }
                currentPage--;
            } else {
                if ($(this).hasClass('disabled')) {
                    return;
                }
                currentPage++;
                console.log("Next page is Requested" + currentPage)
            }
            showDTLoader();
            dt.setDataSourceParam('pagination.page', currentPage);
            dt.load();
            ajaxCalling = true;
        }
    });

    $('#dt-limit').on('change', function() {
        let limit = $('#dt-limit').val();
        showDTLoader();
        dt.setDataSourceParam('pagination.perpage', limit);
        dt.setDataSourceParam('pagination.page', 1);
        dt.load();
    });

    function showDTLoader() {
        $('.dt-loader').removeClass('d-none');
    }

    function hideDTLoader() {
        $('.dt-loader').addClass('d-none');
    }

    // Used for offline Search
    $('#general-search').on('keyup', function() {
        let value = $(this).val().toLowerCase();
        $(".datatable-table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    return dt;
}


/* Custom Function for Select2JS library */
/* Params =======================================
 * data.selector -> element selector like (.element / #element)
 * data.url -> url type
 * data.placeholder -> placeholder Text in input field
 */
function initSelect(data) {
    let select = $(data.selector).select2({
        ajax: {
            url: data.url,
            dataType: 'json',
            delay: 250,
            type: 'POST',
            headers: {
                'accessToken': getItem('tokenInfo', 'accessToken')
            },
            data: function(params) { // data i.e send by ajax
                return {
                    query: params.term, // search term
                    userId: getItem('userData', 'userId'),
                    currentRole: localStorage.getItem('currentRole'),
                    page: params.page
                };
            },
            beforeSend: function(xhr, opts) { // before hitting AJAX
                let params = new URLSearchParams(opts.data);
                let query = params.get('query');
                if (query.length < 2) {
                    xhr.abort();
                    return false;
                }

            },
            processResults: function(data, params) {

                if (data.data !== undefined) {
                    let action = data.data.action;
                    if (action === 'logout') {
                        // Logout User 
                        logoutUser();
                        return;
                    }
                }
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
        placeholder: data.placeholder,
        minimumInputLength: 2,
        templateResult: data.formatList,
        templateSelection: data.formatListSelection,
    });

    return select;
}

/// Logger for console

var logger = (string) => {
    console.log(string);
}