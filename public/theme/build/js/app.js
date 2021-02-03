console.log('yes app.js');
const appProtocol = location.protocol;
const appHost = location.host;
const appOrigin = `${appProtocol}//${appHost}`;
const storagePath = `${appOrigin}/storage/`;
const msgTimeOut = 500; // show messsage after getting response
const msgFadeOut = 7000; // remove message after display in seconds
const csrf = document.querySelector('meta[name="csrf_token"]').content;

$('#master-check').on('click', function (e) {
    if ($(this).is(':checked', true)) {
        $(".sub_chk").prop('checked', true);
    } else {
        $(".sub_chk").prop('checked', false);
    }
});

// Delete Single Record Action
const deleteRecord = (moduleName, delUrl) => {
    let dataObj = { currentURl: delUrl, moduleName: moduleName };
    let stringObj = JSON.stringify(dataObj);
    $('#myActionModal').modal('show');
    $("#myActionModalLabel").text('Delete');
    document.getElementById('myActionModalContent').innerText = `Delete`;
    document.getElementById('myActionModalContent').innerHTML = `Are you sure you want to delete this ${moduleName} ?`;
    document.getElementById('MyActionModalBtn').setAttribute('onclick', `deleteSingle(${stringObj})`);
    document.getElementById("MyActionModalBtn").className = "btn btn-danger";
    document.getElementById('MyActionModalBtn').innerHTML = `Delete`;
}

const deleteSingle = (dataObj) => {
    let tabId = document.querySelector('table').id;
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        dataType: 'json',
        data: { _method: 'DELETE' },
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] == 1) {
                setTimeout(() => {
                    $("#message-green").show().fadeOut(msgFadeOut);
                    document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} deleted successfully!`;
                }, msgTimeOut);
            } else {
                setTimeout(() => {
                    $("#message-red").show().fadeOut(msgFadeOut);
                    document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                }, msgTimeOut);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}

// Active Action
const activeAll = document.querySelector('.active_all');
if (activeAll) {
    activeAll.addEventListener("click", (e) => {
        let allVals = [];
        let checkboxes = document.querySelectorAll('input[name="sub_chk"]:checked');

        checkboxes.forEach(element => {
            let ids = element.getAttribute('data-id');
            allVals.push(ids);
        });

        if (allVals.length > 1) {
            if (e.target.getAttribute('data-pluraltext')) {
                var moduleName = e.target.getAttribute('data-pluraltext');
            } else {
                var moduleName = 'rows';
            }
            var values = 'these';
        } else {
            if (e.target.getAttribute('data-text')) {
                var moduleName = e.target.getAttribute('data-text');
            } else {
                var moduleName = 'row';
            }
            var values = 'this';
        }

        if (allVals.length <= 0) {
            $("#message-red").show().fadeOut(msgFadeOut);
            document.getElementById('message-red-err').innerHTML = 'Error! Please select record to make a status Active.';
        }
        else {
            let dataObj = { currentURl: e.target.getAttribute('data-url'), moduleName: moduleName };
            let stringObj = JSON.stringify(dataObj);
            $('#myActionModal').modal('show');
            $("#myActionModalLabel").text('Active');
            document.getElementById('myActionModalContent').innerText = `Active`;
            document.getElementById('myActionModalContent').innerHTML = `Are you sure you want to active ${values} ${moduleName} ?`;
            document.getElementById('MyActionModalBtn').setAttribute('onclick', `makeActive("${allVals}",${stringObj})`);
            document.getElementById("MyActionModalBtn").className = "btn btn-success";
            document.getElementById('MyActionModalBtn').innerHTML = `Make Active`;
        }

    });
}


const makeActive = (allVals, dataObj) => {
    let tabId = document.querySelector('table').id;
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: 'ids=' + allVals,
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] == 1) {
                setTimeout(() => {
                    $("#message-green").show().fadeOut(msgFadeOut);
                    document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} activated successfully!`;
                }, msgTimeOut);
            } else {
                setTimeout(() => {
                    $("#message-red").show().fadeOut(msgFadeOut);
                    document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                }, msgTimeOut);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}


// Inactive Action
const inactiveAll = document.querySelector('.Inactive_all');
if (inactiveAll) {
    inactiveAll.addEventListener("click", (e) => {
        let allVals = [];
        let checkboxes = document.querySelectorAll('input[name="sub_chk"]:checked');

        checkboxes.forEach(element => {
            let ids = element.getAttribute('data-id');
            allVals.push(ids);
        });

        if (allVals.length > 1) {
            if (e.target.getAttribute('data-pluraltext')) {
                var moduleName = e.target.getAttribute('data-pluraltext');
            } else {
                var moduleName = 'rows';
            }
            var values = 'these';
        } else {
            if (e.target.getAttribute('data-text')) {
                var moduleName = e.target.getAttribute('data-text');
            } else {
                var moduleName = 'row';
            }
            var values = 'this';
        }

        if (allVals.length <= 0) {
            $("#message-red").show().fadeOut(msgFadeOut);
            document.getElementById('message-red-err').innerHTML = 'Error! Please select record to make a status Inactive.';
        }
        else {
            let dataObj = { currentURl: e.target.getAttribute('data-url'), moduleName: moduleName };
            let stringObj = JSON.stringify(dataObj);
            $('#myActionModal').modal('show');
            $("#myActionModalLabel").text('Inactive');
            document.getElementById('myActionModalContent').innerText = `Inactive`;
            document.getElementById('myActionModalContent').innerHTML = `Are you sure you want to Inactive ${values} ${moduleName} ?`;
            document.getElementById('MyActionModalBtn').setAttribute('onclick', `makeInactive("${allVals}",${stringObj})`);
            document.getElementById("MyActionModalBtn").className = "btn btn-warning";
            document.getElementById('MyActionModalBtn').innerHTML = `Make Inactive`;
        }

    });
}


const makeInactive = (allVals, dataObj) => {
    let tabId = document.querySelector('table').id;
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: 'ids=' + allVals,
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] == 1) {
                setTimeout(() => {
                    $("#message-green").show().fadeOut(msgFadeOut);
                    document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} inactivated successfully!`;
                }, msgTimeOut);
            } else {
                setTimeout(() => {
                    $("#message-red").show().fadeOut(msgFadeOut);
                    document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                }, msgTimeOut);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}


// DeleteAll Action
const deleteAll = document.querySelector('.delete_all');
if (deleteAll) {
    deleteAll.addEventListener("click", (e) => {
        let allVals = [];
        let checkboxes = document.querySelectorAll('input[name="sub_chk"]:checked');

        checkboxes.forEach(element => {
            let ids = element.getAttribute('data-id');
            allVals.push(ids);
        });

        if (allVals.length > 1) {
            if (e.target.getAttribute('data-pluraltext')) {
                var moduleName = e.target.getAttribute('data-pluraltext');
            } else {
                var moduleName = 'rows';
            }
            var values = 'these';
        } else {
            if (e.target.getAttribute('data-text')) {
                var moduleName = e.target.getAttribute('data-text');
            } else {
                var moduleName = 'row';
            }
            var values = 'this';
        }

        if (allVals.length <= 0) {
            $("#message-red").show().fadeOut(msgFadeOut);
            document.getElementById('message-red-err').innerHTML = 'Error! Please select record to delete.';
        }
        else {
            let dataObj = { currentURl: e.target.getAttribute('data-url'), moduleName: moduleName };
            let stringObj = JSON.stringify(dataObj);
            $('#myActionModal').modal('show');
            $("#myActionModalLabel").text('Delete');
            document.getElementById('myActionModalContent').innerText = `Delete`;
            document.getElementById('myActionModalContent').innerHTML = `Are you sure you want to detele ${values} ${moduleName} ?`;
            document.getElementById('MyActionModalBtn').setAttribute('onclick', `DeleteAll("${allVals}",${stringObj})`);
            document.getElementById("MyActionModalBtn").className = "btn btn-danger";
            document.getElementById('MyActionModalBtn').innerHTML = `Delete`;
        }

    });
}


const DeleteAll = (allVals, dataObj) => {
    let tabId = document.querySelector('table').id;
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: 'ids=' + allVals,
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] == 1) {
                setTimeout(() => {
                    $("#message-green").show().fadeOut(msgFadeOut);
                    document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} deleted successfully!`;
                }, msgTimeOut);
            } else {
                setTimeout(() => {
                    $("#message-red").show().fadeOut(msgFadeOut);
                    document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                }, msgTimeOut);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}


// Logout Action
const logOut = () => {
    $('#myActionModal').modal('show');
    $("#myActionModalLabel").text('Logout');
    document.getElementById('myActionModalContent').innerText = `Logout`;
    document.getElementById('myActionModalContent').innerHTML = `Are you sure you want to logout?`;
    document.getElementById('MyActionModalBtn').setAttribute('onclick', `loggedOut()`);
    document.getElementById("MyActionModalBtn").className = "btn btn-danger";
    document.getElementById('MyActionModalBtn').innerHTML = `Logout`;
}

const loggedOut = () => {
    $('#myActionModal').modal('hide');
    $.ajax({
        url: `${appOrigin}/logout`,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        success: function () {
            location.href = `${appOrigin}/login`;
        },
        error: function () {
            alert('Oops...! something wrong');
        }
    });
}


// Change Admin Image
const changeImage = (id) => {
    let url = document.getElementById("adminImage").getAttribute("data-url");
    let file_data = jQuery('#adminImage').prop('files')[0];
    let form_data = new FormData();
    form_data.append('adminImage', file_data);
    form_data.append('id', id);

    $.ajax({
        url: url,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: form_data,
        processData: false,
        contentType: false,
        success: function (responseData) {
            if (responseData['responseStatus'] == 1) {
                let avatarImages = document.getElementsByClassName("admin-avtar");
                Array.from(avatarImages).forEach(element => {
                    element.src = `${storagePath}/admin/${responseData['imgName']}`;
                });
                $("#message-green").show().fadeOut(msgFadeOut);
                document.getElementById('message-green-succ').innerHTML = `Success! Profile picture updated successfully !`;
            } else {
                setTimeout(() => {
                    $("#message-red").show().fadeOut(msgFadeOut);
                    document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured while uploading image!';
                }, msgTimeOut);
            }
        },
        error: function () {
            alert('Oops...! something wrong');
        }
    });
}


// Preview Image Change
const previewImage = (event) => {
    let reader = new FileReader();
    reader.onload = function () {
        let output = document.getElementById("imgPreview");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Preview 1 Image Change
const previewImage1 = (event) => {
    let reader = new FileReader();
    reader.onload = function () {
        let output = document.getElementById("imgPreview1");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

