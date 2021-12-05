// Write on First Field name/UserID/AppID it will automatically fill Same information
$("#stu_name").on("input", function () {
    let result = $(this).val();
    $("#student_name").val($(this).val());
    console.log(result);
});

$("#user_id_no").on("input", function () {
    let user_id_Val = $(this).val();

    $("#user_id_no_family").val(user_id_Val);
    $("#user_id_no_edu").val(user_id_Val);
    $("#user").val(user_id_Val);

    console.log(user_id_Val);
});

$("#application_no").on("input", function () {
    let result = $(this).val();
    $("#application_number_id").val(result);
    $("#application_number_id_family_table").val(result);
    $("#application_number_id_edu_table").val(result);
    $("#app_number_id").val(result);

    console.log(result);
});

$("#age").on("focus", function () {
    var dataInputed = $("#dob").val();
    var dob = new Date(dataInputed);
    var month_diff = Date.now() - dob.getTime();
    if (!month_diff) {
        month_diff = 0;
        document.getElementById("dob").setAttribute("value", "");
    }
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff);
    //extract year from date
    var year = age_dt.getUTCFullYear();
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    //display the calculated age
    console.log("Age of the date entered: " + age + " years");
    //console.log("Data2= " + data2);
    document.getElementById("age").setAttribute("value", age);
});



$("#bank_account_owner").on("change", function () {
    let bank_account_owner = $(this).val();
    //console.log(bank_account_owner);

    if (bank_account_owner == 2) {
        let data = $("#father_nid").val();
        console.log(data);

        $("#account_holder_nid").prop("value", data);
    } else if (bank_account_owner == 3) {
        let data = $("#mother_nid").val();
        $("#account_holder_nid").prop("value", data);
    } else $("#account_holder_nid").prop("value", "");
});

$("#circular_type").on("change", function () {
    let circular_type_id = $(this).val();
});

$("#circular_type").on("change", function () {
    let circular_type_id = $(this).val();
    console.log(circular_type_id);
    $("#grants_name").prop("value", circular_type_id);
});
