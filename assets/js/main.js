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

function showLoader() {
    $('.loader-overlay').css('display', 'block');
}

function hideLoader() {
    $('.loader-overlay').css('display', 'none');
}

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
    let userHeaders = { 'apiKey': 'xyz' };

    if (localStorage.getItem('isLoggedIn') === 'true') {
        let userData = JSON.parse(localStorage.getItem('userData'));
        let tokenData = JSON.parse(localStorage.getItem('tokenInfo'));
        let userId = userData.userId;
        let token = tokenData.accessToken;
        fd.append('userId', userId);
        fd.append('accessToken', token);
        fd.append('currentRole', localStorage.getItem('currentRole'));
        userHeaders = { 'accessToken': token };
    }

    // For Tmp
    fd.append('userAccountType', 'affiliate');

    $.ajax({
        type: "POST",
        url: url,
        data: fd,
        processData: false,
        contentType: false,
        headers: userHeaders,
        error: function(xhr, textStatus, errorThrown) {
            let d = xhr.responseJSON;
            if (d.msg) {
                hideLoader();
                showToast(KSTATUS_ERROR, "Error", d.msg);
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
        params += `&userId=${userId}&accessToken=${token}&ipAddress=${ipAddress}&currentRole=${currentRole}`
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
                hideLoader();
                showToast(KSTATUS_ERROR, "Error", d.msg);
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
    $('[data-toggle="tooltip"]').tooltip();
});

function setDataTables(id) {
    $(document).ready(function() {
        $(id).DataTable({
            rowReorder: {
                selector: "td:nth-child(2)",
            },
            responsive: true,
            paging: true,
            info: false,
            searching: true,
            columnDefs: [{
                orderable: false,
                targets: "no-sort",
            }, ],
            order: [],
        });
    });
}

function disableBtn(btn) {
    btn.prop("disabled", true);
    btn.val("Wait..");
}

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

$('.input-number').on('keypress', function(e) {
    return e.metaKey || // cmd/ctrl
        e.which <= 0 || // arrow keys
        e.which == 8 || // delete key
        /[0-9.]/.test(String.fromCharCode(e.which)); // numbers
})

function logout() {
    // Logout User
    let uname = getItem('userData', 'userName');
    let data = {
        url: KBASE_URL + `user/${uname}/logout`,
        params: '',
    }
    postRequest(data, false, function(mData, mStatus) {
        if (mData.status === "success") {
            localStorage.clear();
            window.location.assign('/auth/login');
        } else {
            showToast('error', "Something Went Wrong", mData.msg);
        }
    });
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