
console.log('yes app.js');
$(document).ready(function () {
    $('#master-check').on('click', function (e) {
        if ($(this).is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    });

    $('.active_all').on('click', function (e) {

        //console.log(this.getAttribute('data-url'));

        let allVals = [];
        let checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

        checkboxes.forEach(element => {
            //console.log(element);
            let ids = element.getAttribute('data-id');
            allVals.push(ids)
        });

        //console.log(allVals);

        if (allVals.length > 1) {
            if (this.getAttribute('data-pluraltext')) {
                var text = this.getAttribute('data-pluraltext');
            } else {
                var text = 'rows';
            }
            var values = 'these';
        } else {
            if (this.getAttribute('data-text')) {
                var text = this.getAttribute('data-text');
            } else {
                var text = 'row';
            }
            var values = 'this';
        }

        if (allVals.length <= 0) {
            $("#message-red").show().fadeOut(7000);
            document.getElementById('message-red-err').innerHTML = 'Error! Please select record to make a status active.';
        }
        else {
            $('#myActionModal').modal('show');
            $("#myActionModalLabel").text('myActionModalLabel');
            document.getElementById('myActionModalContent').innerText = `Active`;
            document.getElementById('myActionModalContent').innerHTML = `Are you sure you want to active ${values} ${text} ?`;
            document.getElementById('MyActionModalBtn').setAttribute('onclick','makeActive('+allVals+')');
            // $("#MyActionModalBtn").attr("onclick", "statusactive_ok()");
            document.getElementById('MyActionModalBtn').innerHTML = `Make Active`;
            // $("#MyActionModalBtn").html("Make Active");
            $(".fcbox_delete_selected_tag").trigger('click');

            // if(check == true)
            // {
            //     var join_selected_values = allVals.join(",");
            //     var csrf = $('meta[name="csrf_token"]').attr('content');
            //     $.ajax({
            //         url: $(this).data('url'),
            //         type: 'POST',
            //         headers: {'X-CSRF-TOKEN':  csrf },
            //         data: 'ids='+join_selected_values,
            //         success: function (data) {
            //             console.log(data);
            //             if (data['success']) {
            //                 $(".sub_chk:checked").each(function() {
            //                   window.location.reload(true);
            //                     $(this).parents("tr").update();
            //                 });
            //                 alert(data['success']);
            //             } else if (data['error']) {
            //                 alert(data['error']);
            //             } else {
            //                 alert('Whoops Something went wrong!!');
            //             }
            //         },
            //         error: function (data) {
            //             alert(data.responseText);
            //         }
            //     });
            // //   $.each(allVals, function( index, value ) {
            // //       $('table tr').filter("[data-row-id='" + value + "']").update();
            // //   });
            // }
        }
    });


});
