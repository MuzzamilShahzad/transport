$(document).ready(function () {

    var baseUrl = $(".base-url").val();

    // Start data store script
    $("#btn-add-registration").on("click", function (e) {

        e.preventDefault();
        $("span.error, .alert").remove();
        $("span, input").removeClass("has-error");

        var flag = true;
        var gr                        =  $("#gr").val();
        var campus_id                 =  $("#campus-id").val();
        var school_system_id          =  $("#school-system-id").val();
        var class_id                  =  $("#class-id").val();
        var class_group_id            =  $("#class-group-id").val();
        var form_no                   =  $("#form-no").val();
        var session_id                =  $("#session-id").val();
        var computerize_registration  =  $("#computerize-registration").val();
        var first_name                =  $("#first-name").val();
        var last_name                 =  $("#last-name").val();
        var dob                       =  $("#dob").val();
        var gender                    =  $("#gender").val();
        var siblings_in_mpa           =  $("#siblings-in-mpa").val();
        var no_of_siblings            =  $("#no-of-siblings").val();
        var previous_class            =  $("#previous-class").val();
        var previous_school           =  $("#previous-school").val();

        var house_no          =  $("#house-no").val();
        var block_no          =  $("#block-no").val();
        var building_name_no  =  $("#building-name-no").val();
        var area_id           =  $("#area-id").val();
        var city_id           =  $("#city_id").val();

        var father_cnic          =  $("#father-cnic").val();
        var father_name          =  $("#father-name").val();
        var father_occupation    =  $("#father-occupation").val();
        var father_company_name  =  $("#father-company-name").val();
        var father_salary        =  $("#father-salary").val();
        var father_email         =  $("#father-email").val();
        var father_phone         =  $("#father-phone").val();
        var hear_about_us        =  $("input[name='hear_about_us']:checked").val();
        var other                =  $("#other").val();

        var test_group       =  $("#test-group").val();
        var interview_group  =  $("#interview-group").val();

        if (campus_id == "" || campus_id == "0") {
            $("#campus-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#campus-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (school_system_id == "" || school_system_id == "0") {
            $("#school-system-id:not([disabled])").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#school-system-id:not([disabled])").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (class_id == "" || class_id == "0") {
            $("#class-id:not([disabled]").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#class-id:not([disabled]").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }        
        if (class_group_id == "" || class_group_id == "0") {
            $("#class-group-id:not([disabled])").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#class-group-id:not([disabled])").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (form_no == "") {
            $("#form-no").addClass("has-error");
            $("#form-no").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (session_id == "" || session_id == "0") {
            $("#session-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#session-id").siblings("span").after("<span class='error'>This field is required.</span>");
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

        if (father_cnic == "") {
            $("#father-cnic").addClass("has-error");
            $("#father-cnic").after("<span class='error'>This field is required.</span>");
            flag = false;
        } else if($.isNumeric(father_phone.replace("-","")) === false){
            $("#father-cnic").addClass("has-error");
            $("#father-cnic").after("<span class='error'>This field must be a number.</span>");
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
        } else if($.isNumeric(father_phone.replace("-","")) === false){
            $("#father-phone").addClass("has-error");
            $("#father-phone").after("<span class='error'>This field must be a number.</span>");
            flag = false;
        }
        if (house_no == "") {
            $("#house-no").addClass("has-error");
            $("#house-no").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (block_no == "") {
            $("#block-no").addClass("has-error");
            $("#block-no").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (area_id == "" || area_id == "0") {
            $("#area-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#area-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }
        if (city_id == ""  || city_id == "0") {
            $("#city-id").siblings("span").find(".select2-selection--single").addClass("has-error");
            $("#city-id").siblings("span").after("<span class='error'>This field is required.</span>");
            flag = false;
        }

        if ($('#test-group').is(':checked')) {
            if (test_group == "" || test_group == "0") {
                $("#test-group:not([disabled]").siblings("span").find(".select2-selection--single").addClass("has-error");
                $("#test-group:not([disabled]").siblings("span").after("<span class='error'>This field is required.</span>");
                flag = false;
            }
        }

        if ($('#interview-group').is(':checked')) {

            if (interview_group == "" || interview_group == "0") {
                $("#interview-group:not([disabled]").siblings("span").find(".select2-selection--single").addClass("has-error");
                $("#interview-group:not([disabled]").siblings("span").after("<span class='error'>This field is required.</span>");
                flag = false;
            }
        }

        console.log(flag);
        console.log('Submitting................');

        if (flag) {

            console.log('Submitting................');


            $("#btn-add-registration").addClass('disabled');
            $("#btn-add-registration").html('. . . . .');
            
            var message = '';
            var formData = {
                    "campus_id"                 :  campus_id,
                    "school_system_id"          :  school_system_id,
                    "class_id"                  :  class_id,
                    "class_group_id"            :  class_group_id,
                    "form_no"                   :  form_no,
                    "session_id"                :  session_id,
                    "computerize_registration"  :   computerize_registration,
                    "first_name"                :  first_name,
                    "last_name"                 :  last_name,
                    "dob"                       :  dob,
                    "gender"                    :  gender,
                    "siblings_in_mpa"           :  siblings_in_mpa,
                    "no_of_siblings"            :  no_of_siblings,
                    "previous_class"            :  previous_class,
                    "previous_school"           :  previous_school,

                    "house_no"          :  house_no,
                    "block_no"          :  block_no,
                    "building_name_no"  :  building_name_no,
                    "area_id"           :  area_id,
                    "city_id"           :  city_id,

                    "father_salary"        :  father_salary,
                    "father_name"          :  father_name,
                    "father_cnic"          :  father_cnic.replace("-",""),
                    "father_email"         :  father_email,
                    "father_occupation"    :  father_occupation,
                    "father_company_name"  :  father_company_name,
                    "father_phone"         :  father_phone.replace("-",""),
                    "hear_about_us"        :  hear_about_us,
                    "other"                :  other,

                    "test_group"       :  test_group,
                    "interview_group"  :  interview_group
            };

            $.ajax({
                url: baseUrl + '/student/registration/store',
                type: "POST",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: formData,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.status === false) {

                        if (response.error) {
                            if (Object.keys(response.error).length > 0) {
                                $.each(response.error, function (key, value) {

                                    if (key === 'father_email' || key === 'no_of_siblings') {
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

                        $("#campus-id, #class-id, #session-id, #gender, #siblings-in-mpa, #area-id, #test-group, #interview-group").val('').change();

                        $("#system, #form-no, #computerize-registration, #first-name, #last-name, #dob, #no-of-siblings, #previous-class, #previous-school, #house-no, #block-no, #building-name-no, #city, #father-cnic, #father-name, #father-occupation, #father-company-name, #father-salary, #father-email, #father-phone, #other").val('');

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

                    $("#btn-add-registration").removeClass('disabled');
                    $("#btn-add-registration").html('Submit');
                }
            });
        }
    });
    // End data store script

    // Get Campus School System
    $(document).on('change', '#campus-id', function (e) {
        e.preventDefault();

        var campus_id = $('#campus-id').val();
        
        if(campus_id !== "" && campus_id > "0"){

            $.ajax({
                url: baseUrl + '/campus/get-school-system-and-class',
                type: "GET",
                data: { campus_id: campus_id },
                success: function (response) {
                    
                    var campusSchoolSystems = response.campusSchoolSystems
                    var campusClasses       = response.campusClasses
                    console.log(campusSchoolSystems);
                    
                    var campuses = `<option selected value="">Select</option>`;
                    var classes  = `<option selected value="">Select</option>`;
                    if(campusSchoolSystems.length){
                        $(campusSchoolSystems).each(function(key, value){
                            campuses += `<option value="`+value.id+`" >`+value.type+`</option>`;
                        });
                    }
                    
                    if(campusClasses.length){
                        $(campusClasses).each(function(key, value){
                            classes += `<option value="`+value.id+`" >`+value.name+`</option>`;
                        });
                    }
                    
                    $('#school-system-id').prop('disabled',false);
                    $('#school-system-id').html(campuses);

                    $('#class-id').prop('disabled',false);
                    $('#class-id').html(classes);
                }
            });
        }
    });

    $(document).on('change', '#class-id', function (e) {
        e.preventDefault();

        var class_id   =  $('#class-id').val();
        var campus_id  =  $('#campus-id').val();
  
        if( (class_id !== "" && class_id > "0") && (campus_id !== "" && campus_id > "0")){
            $.ajax({
                url: baseUrl + '/campus/get-class-groups',
                type: "GET",
                data: { class_id: class_id, campus_id: campus_id },
                success: function (response) {
                    
                    if(response.status === true){
                        
                        var classGroup  =  response.classGroups;

                        var groups      =  `<option selected value="">Select</option>`;
                        if(classGroup.length){
                            $(classGroup).each(function(key, value){
                                groups += `<option value="`+value.id+`" >`+value.name+`</option>`;
                            });
                        }

                        $('#class-group-id').prop('disabled',false);
                        $('#class-group-id').html(groups);
                    }
                }
            });
        }
    });

    // Get Session Wise Groups
    $(document).on('change', '#session-id', function (e) {
        e.preventDefault();

        var session_id = $('#session-id').val();
        
        if(session_id !== "" && session_id > "0"){

            $.ajax({
                url: baseUrl + '/campus/get-test-inteview-groups',
                type: "GET",
                data: { session_id: session_id },
                success: function (response) {
                    
                    if(response.status === true){
                        
                        var interviewGroups  =  response.interviewGroups;
                        var testGroups       =  response.testGroups;
                        
                        var interviews  =  `<option selected value="">Select</option>`;
                        var tests       =  `<option selected value="">Select</option>`;
                        
                        if(interviewGroups.length){
                            $(interviewGroups).each(function(key, value){
                                interviews += `<option value="`+value.id+`" >`+value.type+`</option>`;
                            });
                        }
                        
                        if(testGroups.length){
                            $(testGroups).each(function(key, value){
                                tests += `<option value="`+value.id+`" >`+value.type+`</option>`;
                            });
                        }

                        // $('#test-group').prop('disabled',false);
                        $('#test-group').html(tests);
                        
                        // $('#interview-group').prop('disabled',false);
                        $('#interview-group').html(interviews);
                    }
                }
            });
        }
    });

    $(document).on('change',"input[type='checkbox']", function() {
        
        if(this.checked){
            $(this).parent().siblings("div").find('select').prop('disabled',false);
        } else {
            $(this).parent().siblings("div").find('select').val('0').change();
            $(this).parent().siblings("div").find('select').prop('disabled',true);
        }
    });

});