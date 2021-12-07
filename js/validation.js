$(function () {
    var today = new Date();
    var dd = 31;
    var mm = 12;
    var yyyy = today.getFullYear() - 3;
    var yyyy2 = today.getFullYear() - 26;
    if (dd < 10) {
        dd = "0" + dd;
    }
    if (mm < 10) {
        mm = "0" + mm;
    }
    maxdate = yyyy + "-" + mm + "-" + dd;
    mindate = yyyy2 + "-" + mm + "-" + dd;

    $("#dob2").attr("max", maxdate);
    $("#dob2").attr("min", mindate);
});

// Write on First Field name/UserID/AppID it will automatically fill Same information
$("#father_nid").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let out = banglaToEnglish(inp);
    $("#father_nid").val(out);
    console.log(out);
});
$("#mother_nid").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let out = banglaToEnglish(inp);
    $("#mother_nid").val(out);
    console.log(out);
});

$("#guardian_land").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let out = banglaToEnglish(inp);
    $("#guardian_land").val(out);
    console.log(out);
});

$("#guardian_annual_income").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let out = banglaToEnglish(inp);
    $("#guardian_annual_income").val(out);
    console.log(out);
});
$("#family_member").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let out = banglaToEnglish(inp);
    $("#family_member").val(out);
    console.log(out);
});
$("#last_gpa").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let out = banglaToEnglish(inp);
    $("#last_gpa").val(out);
    console.log(out);
});

$("#acc_no").on("keyup", function () {
    let inp = $(this).val();
    // let out = replaceNumbers(inp);
    let bank_name_id = $("#bank_name_id").val();
    if (bank_name_id == 2) {
        $("#acc_no").attr("minlength", 12);
        $("#acc_no").attr("maxlength", 12);
    }
    let out = banglaToEnglish(inp);
    $("#acc_no").val(out);
    console.log(out);
});

const engToBdNum = (str) => {
    let banglaNumber = {
        0: "০",
        1: "১",
        2: "২",
        3: "৩",
        4: "৪",
        5: "৫",
        6: "৬",
        7: "৭",
        8: "৮",
        9: "৯",
    };

    for (var x in banglaNumber) {
        str = str.replace(new RegExp(x, "g"), banglaNumber[x]);
    }
    return str;
};

const banglaToEnglish = (str) => {
    let englishNumber = {
        "০": 0,
        "১": 1,
        "২": 2,
        "৩": 3,
        "৪": 4,
        "৫": 5,
        "৬": 6,
        "৭": 7,
        "৮": 8,
        "৯": 9,
    };
    for (var y in englishNumber) {
        str = str.replace(new RegExp(y, "g"), englishNumber[y]);
    }
    return str;
};

$("#banking_type").on("change", function () {
    $type = $("#banking_type").val();
    console.log("type" + $type);
    if ($type == 1) {
        $("#account_type").attr("required", "false");
        $("#bank_account_type").hide();
        $("#acc_type").attr("value", "");

        $("#district_id_account").attr("required", "false");
        $("#district_id_account")
            .find("#district_type_null")
            .attr("selected", "selected");
        $("#district_id_account").hide();
        $("#bank_district").hide();

        $("#routing_no").show();
        $("#bank_branch_id").attr("value", "");
        $("#bank_branch_id").find("#nullValueOption").hide();
    } else {
        $("#account_type").attr("required", "true");
        $("#bank_account_type").show();

        $("#bank_district").show();
        $("#district_id_account").attr("required", "true");
        $("#district_id_account").show();

        $("#bank_branch_id").attr("required", "true");
        $("#bank_branch_id").attr("enable", "true");

        $("#routing_no").show();
    }
});

//   <script>
//         function banking() {
//             $type = document.getElementById("banking_type").value;
//             $type = $("#banking_type").val();

//             if ($type == 1) {
//                 document.getElementById("account_type").required = false;
//                 document.getElementById("bank_account_type").hidden = true;
//                 document.getElementById("acc_type_null").selected = true;

//                 document.getElementById("district_id_account").required = false;
//                 document.getElementById("bank_district").hidden = true;
//                 document.getElementById("district_type_null").selected = true;

//                 document.getElementById("routing_no").hidden = true;
//                 document.getElementsByName("bank_branch_id")[0].remove(0);

//                 // document.getElementById("bank_branch_id").required = false;
//                 // document.getElementById("bank_branch_id").disabled = true;

//             } else {
//                 document.getElementById("account_type").required = true;
//                 document.getElementById("bank_account_type").hidden = false;

//                 document.getElementById("district_id_account").required = false;
//                 document.getElementById("bank_district").hidden = false;

//                 document.getElementById("bank_branch_id").required = true;
//                 document.getElementById("bank_branch_id").disabled = false;
//                 document.getElementById("routing_no").hidden = false;

//             }

//         }
//     </script>

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
