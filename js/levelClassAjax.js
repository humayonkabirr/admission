$(document).on("change", "#education_level_id", function () {
    let education_level_id = $(this).val();
    console.log(education_level_id);
    if (education_level_id == "") education_level_id = 0;

    getLevelWiseClassList(education_level_id);
});

$(document).on("change", "#class_name_id", function () {
    let class_name_id = $(this).val();
    // console.log("class_name_id = " + class_name_id);

    if (class_name_id == "") class_name_id = 0;

    getLastClass(class_name_id);
});

// get Level wise class List 
function getLevelWiseClassList(id) {
    var base_url = window.location.origin;
    let url = base_url + "/admission/findLevelWiseClass";
    let educationLevelUrl = url + "/" + id;
    let output = "";

    console.log("URL= " + educationLevelUrl);
    $.get(educationLevelUrl)
        .always(function () {
            $("#class_name_id").find("*").not("#nullValueOption").remove();
            $("#last_study_class_id")
                .find("*")
                .not("#nullValueOption")
                .remove();
        })
        .done(function (data) {
            for (var i = 0; i < data.length; i++) {
                console.log(data[i].class_name);
                output +=
                    '<option value="' +
                    data[i].id +
                    '">' +
                    data[i].class_name +
                    "</option>";
            }
            $("#class_name_id").append(output);
        });
}

function getLastClass(id) {
    var base_url = window.location.origin;
    let url = base_url + "/admission/getlastclass";
    let lastClassURL = url + "/" + id;
    let output = "";

    console.log("URL= " + lastClassURL);
    $.get(lastClassURL)
        .always(function () {
            $("#last_study_class_id").empty();
        })
        .done(function (data) {
            for (var i = 0; i < data.length; i++) {
                console.log(data[i].class_name);
                output +=
                    '<option value="' +
                    data[i].id +
                    '">' +
                    data[i].class_name +
                    "</option>";
            }
            $("#last_study_class_id").append(output);
        });
}

// $("#class_name_id").on("change", function () {
//     var class_name_id = $(this).val();
//     var base_url = window.location.origin;
//     let url = base_url + "/admission/getLastClass";
//     let lastClassURL = url + "/" + class_name_id;
//     console.log(lastClassURL);

//     if (class_name_id) {
//         $.ajax({
//             type: "GET",
//             url: lastClassURL,
//             success: function (res) {
//                 if (res) {
//                     $("#last_study_class_id").empty();
//                     //$("#last_study_class_id").append('<option>{{  trans('global.pleaseSelect') }}</option>');
//                     $.each(res, function (key, value) {
//                         $("#last_study_class_id").append(
//                             '<option value="' + key + '">' + value + "</option>"
//                         );
//                     });
//                 } else {
//                     $("#last_study_class_id").empty();
//                 }
//             },
//         });
//     } else {
//         $("#last_study_class_id").empty();
//     }
// });
