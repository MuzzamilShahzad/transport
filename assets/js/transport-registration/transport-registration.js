$(document).ready(function () {

    var baseUrl = $(".base-url").val();

    // Start data store script
    $("#btn-add-transport-registration").on("click", function (e) {

        e.preventDefault();
        $("span.error, .alert").remove();
        $("span, input").removeClass("has-error");

        var flag = true;
        var vehicle_id = $("#vehicle-id").val();
        var route_id = $("#route-id").val();
        var driver_id = $("#driver-id").val();
        var shift_id = $("#shift-id").val();
        var campus_id = $("#campus-id").val();
        var student_id = $("#student-id").val();
        var fees = $("#fees").val();
        var joining_date = $("#joining-date").val();

        if (vehicle_id == "") {
            $("#vehicle-id").addClass("has-error");
            $("#vehicle-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (route_id == "") {
            $("#route-id").addClass("has-error");
            $("#route-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (driver_id == "") {
            $("#driver-id").addClass("has-error");
            $("#driver-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (shift_id == "") {
            $("#shift-id").addClass("has-error");
            $("#shift-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (campus_id == "") {
            $("#campus-id").addClass("has-error");
            $("#campus-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (student_id == "") {
            $("#student-id").addClass("has-error");
            $("#student-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (fees == "") {
            $("#fees").addClass("has-error");
            $("#fees").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (joining_date == "") {
            $("#joining-date").addClass("has-error");
            $("#joining-date").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }

        if (flag) {

            $("#btn-add-transport-registration").addClass('disabled');
            $("#btn-add-transport-registration").html('. . . . .');

            var message = '';

            $.ajax({
                type: $(this).parent('form').attr('method'),
                url: $(this).parent('form').attr('action'),
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { "vehicle_id": vehicle_id, "route_id": route_id, "driver_id": driver_id, "shift_id": shift_id, "campus_id": campus_id, "student_id": student_id, "fees": fees, "joining_date": joining_date },
                dataType: "json",
                success: function (response) {

                    if (response.status === false) {
                        var a = response.error;

                        // console.log(JSON.stringify(response.error).length);
                        // console.log(Object.keys(response.error).length);
                        // console.log(response.error);
                        // console.log($.parseJSON(response.error));

                        if (response.error) {
                            if (Object.keys(response.error).length > 0) {
                                message += `<div class="alert alert-danger">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <ul>`;
                                $.each(response.error, function (key, value) {

                                    // $("input[name='"+key+"']").addClass("has-error");
                                    $("#" + key).addClass("has-error");
                                    $("#" + key).after("<span class='error text-danger'>" + value.toString().replace(',', '<br>') + "</span>");

                                    message += `<li>` + value + `</li>`
                                });
                                message += `</ul>
                                    </div>`;
                            }
                        } else {
                            message += `<div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                <strong> Success!</strong> `+ response.message + `
                                            </div>`;
                        }
                    } else {

                        // $("#ref_number").val('');
                        $("#vehicle-id").val('').change();
                        $("#route-id").val('').change();
                        $("#driver-id").val('').change();
                        // $("#total_cap").val('');
                        $("#shift-id").val('').change();
                        $("#campus-id").val('').change();
                        $("#student-id").val('').change();
                        $("#fees").val('');
                        $("#joining-date").val('');

                        message += `<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong> Success!</strong> `+ response.message + `
                                </div>`;
                    }
                },
                error: function () {
                    message = `<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong> Whoops !</strong> Something went wrong please contact to admintrator.
                            </div>`;
                },
                complete: function () {

                    $("form").prepend(message);
                    $("#btn-add-transport-registration").removeClass('disabled');
                    $("#btn-add-transport-registration").html('Submit');
                    setTimeout(function () {
                        $(".alert").remove();
                    }, 4000);
                }
            });
        }
    });
    // End data store script






    // Start data update script
    $("#btn-update-transport-registration").on("click", function (e) {

        e.preventDefault();
        $("span.error, .alert").remove();
        $("span, input").removeClass("has-error");

        var flag = true;

        var vehicle_id = $("#vehicle-id").val();
        var route_id = $("#route-id").val();
        var driver_id = $("#driver-id").val();
        var shift_id = $("#shift-id").val();
        var campus_id = $("#campus-id").val();
        var student_id = $("#student-id").val();
        var fees = $("#fees").val();
        var joining_date = $("#joining-date").val();

        if (vehicle_id == "") {
            $("#vehicle-id").addClass("has-error");
            $("#vehicle-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (route_id == "") {
            $("#route-id").addClass("has-error");
            $("#route-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (driver_id == "") {
            $("#driver-id").addClass("has-error");
            $("#driver-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (shift_id == "") {
            $("#shift-id").addClass("has-error");
            $("#shift-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (campus_id == "") {
            $("#campus-id").addClass("has-error");
            $("#campus-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (student_id == "") {
            $("#student-id").addClass("has-error");
            $("#student-id").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (fees == "") {
            $("#fees").addClass("has-error");
            $("#fees").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }
        if (joining_date == "") {
            $("#joining-date").addClass("has-error");
            $("#joining-date").after("<span class='error text-danger'>This field is required.</span>");
            flag = false;
        }

        if (flag) {

            $("#btn-update-transport-registration").addClass('disabled');
            $("#btn-update-transport-registration").html('. . . . .');

            var message = '';

            $.ajax({
                type: $(this).parent('form').attr('method'),
                url: $(this).parent('form').attr('action'),
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { "vehicle_id": vehicle_id, "route_id": route_id, "driver_id": driver_id, "shift_id": shift_id, "campus_id": campus_id, "student_id": student_id, "fees": fees, "joining_date": joining_date },
                dataType: "json",
                success: function (response) {

                    if (response.status === false) {
                        var a = response.error;

                        // console.log(JSON.stringify(response.error).length);
                        // console.log(Object.keys(response.error).length);
                        // console.log(response.error);
                        // console.log($.parseJSON(response.error));

                        if (response.error) {
                            if (Object.keys(response.error).length > 0) {
                                message += `<div class="alert alert-danger">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <ul>`;
                                $.each(response.error, function (key, value) {

                                    // $("input[name='"+key+"']").addClass("has-error");
                                    $("#" + key).addClass("has-error");
                                    $("#" + key).after("<span class='error text-danger'>" + value.toString().replace(',', '<br>') + "</span>");

                                    message += `<li>` + value + `</li>`
                                });
                                message += `</ul>
                                    </div>`;
                            }
                        } else {
                            message += `<div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                <strong> Success!</strong> `+ response.message + `
                                            </div>`;
                        }
                    } else {

                        // $("#ref_number").val('');
                        // $("#vehicle_id").val('');
                        // $("#route_id").val('');
                        // $("#driver_id").val('');
                        // $("#total_cap").val('');
                        // $("#shift_id").val('');
                        // $("#student_id").val('');

                        message += `<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong> Success!</strong> `+ response.message + `
                                </div>`;
                    }
                },
                error: function () {
                    message = `<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong> Whoops !</strong> Something went wrong please contact to admintrator.
                            </div>`;
                },
                complete: function () {

                    $("form").prepend(message);
                    $("#btn-update-transport-registration").removeClass('disabled');
                    $("#btn-update-transport-registration").html('Updated');
                    setTimeout(function () {
                        $(".alert").remove();
                    }, 4000);
                }
            });
        }
    });
    // End data update script







    // Start Delete Data Script
    $(document).on('click', '#btn-delete-transport-registration', function () {

        var trans_reg_id = $(this).data('id');
        var url = baseUrl + '/transport/registration/delete';
        var row = $(this).parent().parent("tr");

        swal.fire({

            title: 'Are you sure?',
            html: 'You want to <b>delete</b> this record',
            showCancelButton: true,
            showCloseButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete',
            cancelButtonColor: '#d33',
            confirmButtonColor: '#556ee6',
            width: 300,
            allowOutsideClick: false

        }).then(function (result) {

            if (result.value) {

                var message;
                // console.log(message);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { trans_reg_id: trans_reg_id },
                    dataType: "json",
                    success: function (response) {
                        if (response.status == false) {

                            message = {
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            };

                            // message += `<div class="alert alert-danger alert-dismissible">
                            //                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            //                 <strong> Success!</strong> `+ response.message + `
                            //             </div>`;

                        } else {
                            row.remove();

                            message = {
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                // showConfirmButton: false,
                                // timer: 1500
                            }
                            // console.log(message);

                            // message += `<div class="alert alert-success alert-dismissible">
                            //                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            //                 <strong> Success!</strong> `+ response.message + `
                            //             </div>`;
                        }
                    },

                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Some thing went wrong please contact to Administrator!',
                        })

                        // message = `<div class="alert alert-danger alert-dismissible">
                        //                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        //                 <strong> Oops! </strong> Some thing went wrong please contact to Administrator.
                        //             </div>`;
                    },

                    complete: function () {
                        Swal.fire({
                            icon: message.icon,
                            title: message.title,
                            text: message.text,
                        })

                        // $("#notifications").prepend(message);
                        // setTimeout(function () {
                        //     $(".alert").remove();
                        // }, 4000);
                    }
                });
            }
        });
    });
    // End Delete Data Script

    // Get Total Vehicle Capacity
    $(document).on('change', '#vehicle-id', function () {

        var vehicle_id = $('#vehicle-id').val();

        $.ajax({
            url: baseUrl + '/vehicle/total-capacity',
            type: "GET",
            data: { vehicle_id: vehicle_id },
            success: function (response) {

                // var remainingCapacity = response.totalCapacity - response.shiftWiseRegisterCount;

                var html = '<label class="tx-semibold">Total Capacity</label>';
                html += '<input class="form-control" value="' + response.totalCapacity + '" type="text" readonly>';
                $('#total-capacity-input').html(html);

                // var html = '<label class="tx-semibold">Remaining Capacity</label>';
                // html += '<input class="form-control" value="' + remainingCapacity + '" type="text" readonly>';
                // $('#remaining-capacity-input').html(html);
            }
        });
    });

    // Get Total Vehicle Capacity
    $(document).on('change', '#shift-id', function () {

        var shift_id = $('#shift-id').val();

        $.ajax({
            url: baseUrl + '/vehicle/total-capacity',
            type: "GET",
            data: { shift_id: shift_id },
            success: function (response) {

                // var remainingCapacity = response.totalCapacity - response.shiftWiseRegisterCount;

                // var html = '<label class="tx-semibold">Total Capacity</label>';
                // html += '<input class="form-control" value="' + response.totalCapacity + '" type="text" readonly>';
                // $('#total-capacity-input').html(html);

                // var html = '<label class="tx-semibold">Remaining Capacity</label>';
                // html += '<input class="form-control" value="' + remainingCapacity + '" type="text" readonly>';
                // $('#remaining-capacity-input').html(html);
            }
        });
    });


});