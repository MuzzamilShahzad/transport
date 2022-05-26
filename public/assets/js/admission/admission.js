$(document).ready(function () {

    var baseUrl = $(".base-url").val();

    // Start data store script
    $("#btn-add-admission").on("click", function (e) {

        e.preventDefault();
        $("span.error, .alert").remove();
        $("span, input").removeClass("has-error");

        var flag = true;
        var gr = $("#gr").val();
        var campus_id = $("#campus-id").val();
        var session_id = $("#session-id").val();
        var roll_no = $("#roll-no").val();
        var class_id = $("#class-id").val();
        var section_id = $("#section-id").val();
        var first_name = $("#first-name").val();
        var last_name = $("#last-name").val();
        var gender = $("#gender").val();
        var place_of_birth = $("#place-of-birth").val();
        var nationality = $("#nationality").val();
        var mother_tongue = $("#mother-tongue").val();
        var category_id = $("#category-id").val();
        var religion = $("#religion").val();
        var admission_date = $("#admission-date").val();
        var father_cnic = $("#father-cnic").val();
        var father_name = $("#father-name").val();
        var father_phone = $("#father-phone").val();
        var mother_cnic = $("#mother-cnic").val();
        var mother_name = $("#mother-name").val();
        var mother_phone = $("#mother-phone").val();
        var first_person_call = $("#first-person-call").val();
        var temporary_gr = $("#temporary-gr").val();
        var system = $("#system").val();
        var bform_crms_no = $("#bform-crms-no").val();
        var dob = $("#dob").val();
        var previous_class = $("#previous-class").val();
        var previous_school = $("#previous-school").val();
        var mobile_no = $("#mobile-no").val();
        var email = $("#email").val();
        var blood_group = $("#blood-group").val();
        var school_house_id = $("#school-house-id").val();
        var height = $("#height").val();
        var weight = $("#weight").val();
        var as_on_date = $("#as-on-date").val();
        var fee_discount = $("#fee-discount").val();
        var student_vaccinated = $("input[name='student_vaccinated']:checked").val();
        var father_salary = $("#father-salary").val();
        var father_email = $("#father-email").val();
        var father_occupation = $("#father-occupation").val();
        var father_company_name = $("#father-company-name").val();
        var father_vaccinated = $("input[name='father_vaccinated']:checked").val();
        var mother_salary = $("#mother-salary").val();
        var mother_email = $("#mother-email").val();
        var mother_occupation = $("#mother-occupation").val();
        var mother_company_name = $("#mother-company-name").val();
        var mother_vaccinated = $("input[name='mother_vaccinated']:checked").val();
        var guardian_cnic = $("#guardian-cnic").val();
        var guardian_first_name = $("#guardian-first-name").val();
        var guardian_phone = $("#guardian-phone").val();
        var guardian_relation = $("input[name='guardian_relation']:checked").val();
        var other_relation = $("#other-relation").val();
        var first_person_call = $("input[name='first_person_call']:checked").val();
        var current_house_no = $("#current-house-no").val();
        var current_block_no = $("#current-block-no").val();
        var current_building_name_no = $("#current-building-name-no").val();
        var current_area_id = $("#current-area-id").val();
        var current_city = $("#current-city").val();
        var same_as_current = $("input[name='same_as_current']:checked").val();
        var permenant_house_no = $("#permenant-house-no").val();
        var permenant_block_no = $("#permenant-block-no").val();
        var permenant_building_name_no = $("#permenant-building-name-no").val();
        var permenant_area_id = $("#permenant-area-id").val();
        var permenant_city = $("#permenant-city").val();
        var pick_and_drop_detail = $("#pick-and-drop-detail").val();
        var ride_vehicle_no = $("#ride-vehicle-no").val();
        var school_driver_name = $("#school-driver-name").val();
        var school_driver_phone = $("#school-driver-phone").val();
        var school_vehicle_no = $("#school-vehicle-no").val();
        var private_driver_name = $("#private-driver-name").val();
        var private_driver_phone = $("#private-driver-phone").val();
        var private_vehicle_no = $("#private-vehicle-no").val();

        if (gr == "") {
            $("#gr").addClass("has-error");
            $("#gr").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (campus_id == "") {
            $("#campus-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#campus-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (session_id == "") {
            $("#session-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#session-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (roll_no == "") {
            $("#roll-no").addClass("has-error");
            $("#roll-no").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (class_id == "") {
            $("#class-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#class-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (section_id == "") {
            $("#section-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#section-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (first_name == "") {
            $("#first-name").addClass("has-error");
            $("#first-name").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (last_name == "") {
            $("#last-name").addClass("has-error");
            $("#last-name").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (gender == "") {
            $("#gender").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#gender").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (place_of_birth == "") {
            $("#place-of-birth").addClass("has-error");
            $("#place-of-birth").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (nationality == "") {
            $("#nationality").addClass("has-error");
            $("#nationality").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (mother_tongue == "") {
            $("#mother-tongue").addClass("has-error");
            $("#mother-tongue").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (category_id == "") {
            $("#category-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#category-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (religion == "") {
            $("#religion").addClass("has-error");
            $("#religion").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (admission_date == "") {
            $("#admission-date").addClass("has-error");
            $("#admission-date").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (father_cnic == "") {
            $("#father-cnic").addClass("has-error");
            $("#father-cnic").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (father_name == "") {
            $("#father-name").addClass("has-error");
            $("#father-name").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (father_phone == "") {
            $("#father-phone").addClass("has-error");
            $("#father-phone").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (mother_cnic == "") {
            $("#mother-cnic").addClass("has-error");
            $("#mother-cnic").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (mother_name == "") {
            $("#mother-name").addClass("has-error");
            $("#mother-name").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (mother_phone == "") {
            $("#mother-phone").addClass("has-error");
            $("#mother-phone").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (pick_and_drop_detail == "") {
            $("#pick-and-drop-detail").addClass("has-error");
            $("#pick-and-drop-detail").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        // if (first_person_call == "") {
        //     $("#first-person-call").addClass("has-error");
        //     $("#first-person-call").after("<span class='error'>This field is required.</span>");
        //     flag = false;
        // }

        if (flag) {

            $("#btn-add-admission").addClass('disabled');
            $("#btn-add-admission").html('. . . . .');

            var message = '';
            var formData = {
                "gr": gr,
                "campus_id": campus_id,
                "session_id": session_id,
                "roll_no": roll_no,
                "class_id": class_id,
                "section_id": section_id,
                "first_name": first_name,
                "last_name": last_name,
                "gender": gender,
                "place_of_birth": place_of_birth,
                "nationality": nationality,
                "mother_tongue": mother_tongue,
                "category_id": category_id,
                "religion": religion,
                "admission_date": admission_date,
                "first_person_call": first_person_call,
                "temporary_gr": temporary_gr,
                "system": system,
                "bform_crms_no": bform_crms_no,
                "dob": dob,
                "previous_class": previous_class,
                "previous_school": previous_school,
                "mobile_no": mobile_no,
                "email": email,
                "blood_group": blood_group,
                "school_house_id": school_house_id,
                "height": height,
                "weight": weight,
                "as_on_date": as_on_date,
                "fee_discount": fee_discount,
                "student_vaccinated": student_vaccinated,
                "father_salary": father_salary,
                "father_name": father_name,
                "father_cnic": father_cnic,
                "father_email": father_email,
                "father_occupation": father_occupation,
                "father_company_name": father_company_name,
                "father_phone": father_phone,
                "father_vaccinated": father_vaccinated,
                "mother_salary": mother_salary,
                "mother_name": mother_name,
                "mother_cnic": mother_cnic,
                "mother_email": mother_email,
                "mother_occupation": mother_occupation,
                "mother_company_name": mother_company_name,
                "mother_phone": mother_phone,
                "mother_vaccinated": mother_vaccinated,
                "guardian_cnic": guardian_cnic,
                "guardian_first_name": guardian_first_name,
                "guardian_phone": guardian_phone,
                "guardian_relation": guardian_relation,
                "other_relation": other_relation,
                "first_person_call": first_person_call,
                "current_house_no": current_house_no,
                "current_block_no": current_block_no,
                "current_building_name_no": current_building_name_no,
                "current_area_id": current_area_id,
                "current_city": current_city,
                "same_as_current": same_as_current,
                "permenant_house_no": permenant_house_no,
                "permenant_block_no": permenant_block_no,
                "permenant_building_name_no": permenant_building_name_no,
                "permenant_area_id": permenant_area_id,
                "permenant_city": permenant_city,
                "pick_and_drop_detail": pick_and_drop_detail,
                "ride_vehicle_no": ride_vehicle_no,
                "school_driver_name": school_driver_name,
                "school_driver_phone": school_driver_phone,
                "school_vehicle_no": school_vehicle_no,
                "private_driver_name": private_driver_name,
                "private_driver_phone": private_driver_phone,
                "private_vehicle_no": private_vehicle_no
            };

            $.ajax({
                url: baseUrl + '/admission/store',
                type: "POST",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: formData,
                dataType: "json",
                success: function (response) {

                    if (response.status === false) {

                        if (response.error) {
                            if (Object.keys(response.error).length > 0) {
                                $.each(response.error, function (key, value) {

                                    if (key === 'admission_date' || key === 'father_phone' || key === 'mother_phone') {
                                        $("input[name='" + key + "']").addClass("has-error");
                                        $("input[name='" + key + "']").after("<span class='error'>" + value.toString().split(/[,]+/).join("<br/>") + "</span>");
                                    } else {
                                        $("select[name='" + key + "']").siblings("span").find(".select2-selection--single").addClass("has-error");
                                        $("select[name='" + key + "']").siblings("span").after("<span class='error'>" + value.toString().split(/[,]+/).join("<br/>") + "</span>");
                                    }

                                });
                            }
                        } else {
                            message += `<div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <strong> Success!</strong> `+ response.message + `
                                        </div>`;
                        }
                    } else {

                        $("#session-id, #class-id, #section-id, #category-id, #campus-id, #gender, #blood-group, #school_house_id, #current-area-id, #permenant-area-id, #pick-and-drop-detail").val('').change();
                        $("#gr, #roll-no, #temporary-gr, #system, #bform-crms-no, #first-name, #last-name, #dob, #place-of-birth, #nationality, #mother-tongue, #previous-class, #previous-school, #religion, #mobile-no, #email, #admission-date, #height, #weight, #as-on-date, #fee-discount, #student-vaccinated, #father-cnic, #father-salary, #father-email, #father-name, #father-phone, #father-occupation, #father-company-name, #father-vaccinated, #mother-cnic, #mother-salary, #mother-email, #mother-name, #mother-phone, #mother-occupation, #mother-company-name, #mother-vaccinated, #guardian-cnic, #guardian-first-name, #guardian-phone, #guardian-relation, #first-person-call, #current-house-no, #current-block-no, #current-building-name-no, #current-city, #permenant-house-no, #permenant-block-no, #permenant-building-name-no, #permenant-city, #ride-vehicle-no, #school-driver-name, #school-driver-phone, #school-vehicle-no, #private-driver-name, #private-driver-phone, #private-vehicle-no,#other-relation").val('');

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

                    if (message !== '') {
                        $("form").prepend(message);
                        setTimeout(function () {
                            $(".alert").remove();
                        }, 4000);
                    }

                    $("#btn-add-admission").removeClass('disabled');
                    $("#btn-add-admission").html('Submit');
                }
            });
        }
    });
    // End data store script

    // Get Campus Wise System
    $(document).on('change', '#campus-id', function (e) {
        e.preventDefault();

        var campus_id = $('#campus-id').val();

        $.ajax({
            url: baseUrl + '/campus/get-system',
            type: "GET",
            data: { campus_id: campus_id },
            success: function (response) {
                var html = '<label class="form-label tx-semibold">System</label>';
                html += '<input type="text" class="form-control" value="' + response.system + '" name="system" id="system" readonly>';
                $('#campus-system-input').html(html);

            }
        });
    });


    // Get Pick / Drop Details
    $(document).on('change', '#pick-and-drop-detail', function (e) {
        e.preventDefault();

        var value = $('#pick-and-drop-detail').val();

        if (value == 'ByWalk') {
            var html = '';
            $('#append-input').html(html);
        }
        else if (value == 'ByRide') {
            var html = '<label class="form-label tx-semibold">Vehicle No</label>';
            html += '<input type="text" class="form-control" name="ride_vehicle_no" id="ride-vehicle-no">';
            $('#append-input').html(html);
        }
        else if (value == 'SchoolVan') {
            var html = '<div class="form-row"> <div class="form-group col-md-4 mb-0" > <label class="form-label tx-semibold">School Driver Name</label> <input type="text" class="form-control" name="school_driver_name" id="school-driver-name"> </div> <div class="form-group col-md-4 mb-0"> <label class="form-label tx-semibold">School Driver Phone</label> <input type="number" class="form-control" name="school_driver_phone" id="school-driver-phone"> </div> <div class="form-group col-md-4 mb-0"> <label class="form-label tx-semibold">School Vehicle No</label> <input type="text" class="form-control" name="school_vehicle_no" id="school-vehicle-no"> </div> </div >';
            $('#append-input').html(html);
        }
        else if (value == 'PrivateVan') {
            var html = '<div class="form-row"> <div class="form-group col-md-4 mb-0"> <label class="form-label tx-semibold">Private Driver Name</label> <input type="text" class="form-control" name="private_driver_name" id="private-driver-name"> </div> <div class="form-group col-md-4 mb-0"> <label class="form-label tx-semibold">Private Driver Phone</label> <input type="number" class="form-control" name="private_driver_phone" id="private-driver-phone"> </div> <div class="form-group col-md-4 mb-0"> <label class="form-label tx-semibold">School Vehicle No</label> <input type="text" class="form-control" name="private_vehicle_no" id="private-vehicle-no"> </div> </div>';
            $('#append-input').html(html);
        }

    });

    // Other Relation input disable input Disable
    // $(document).on('click', '#guardian-relation', function (e) {
    //     e.preventDefault();
    //     alert('checked');
    // });

});