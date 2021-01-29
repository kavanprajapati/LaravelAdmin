console.log('yes app.js');
let csrf = document.querySelector('meta[name="csrf_token"]').content;
let tabId = document.querySelector('table').id;
$('#master-check').on('click', function (e) {
    if ($(this).is(':checked', true)) {
        $(".sub_chk").prop('checked', true);
    } else {
        $(".sub_chk").prop('checked', false);
    }
});

// Active Action
document.querySelector('.active_all').addEventListener("click", (e) => {
    //console.log(e.target.getAttribute('data-url')); return
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
        $("#message-red").show().fadeOut(7000);
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

function makeActive(allVals, dataObj) {
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: 'ids=' + allVals,
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] === 1) {
                $("#message-green").show().fadeOut(7000);
                document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} activated successfully!`;
            } else {
                $("#message-red").show().fadeOut(7000);
                document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                setTimeout(() => {
                    location.reload();
                }, 3000);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}


// Inactive Action
document.querySelector('.Inactive_all').addEventListener("click", (e) => {
    //console.log(e.target.getAttribute('data-url')); return
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
        $("#message-red").show().fadeOut(7000);
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

function makeInactive(allVals, dataObj) {
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: 'ids=' + allVals,
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] === 1) {
                $("#message-green").show().fadeOut(7000);
                document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} inactivated successfully!`;
            } else {
                $("#message-red").show().fadeOut(7000);
                document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                setTimeout(() => {
                    location.reload();
                }, 3000);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}


// DeleteAll Action
document.querySelector('.delete_all').addEventListener("click", (e) => {
    //console.log(e.target.getAttribute('data-url')); return
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
        $("#message-red").show().fadeOut(7000);
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


function DeleteAll(allVals, dataObj) {
    $('#myActionModal').modal('hide');
    $.ajax({
        url: dataObj.currentURl,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf },
        data: 'ids=' + allVals,
        success: function (responseData) {
            $(`#${tabId}`).DataTable().ajax.reload();
            $("#master-check").prop('checked', false);
            if (responseData['responseStatus'] === 1) {
                $("#message-green").show().fadeOut(7000);
                document.getElementById('message-green-succ').innerHTML = `Success! ${dataObj.moduleName} deleted successfully!`;
            } else {
                $("#message-red").show().fadeOut(7000);
                document.getElementById('message-red-err').innerHTML = 'Error! Oops..some error occured!';
                setTimeout(() => {
                    location.reload();
                }, 3000);
            }
        },
        error: function (responseData) {
            alert('Oops...! something wrong');
        }
    });
}

