$(document).on("change", "#division_id", function() {
	let division_id = $(this).val();

	if (division_id == "") {
		division_id = 0;
	}
	getDistrict(division_id);
});

$(document).on("change", "#district_id", function() {
	let district_id = $(this).val();

	if (district_id == "") {
		district_id = 0;
	}

	getUpazila(district_id);
});
$(document).on("change", "#upazila_id", function() {
	let upazila_id = $(this).val();
	if (upazila_id == "") {
		upazila_id = 0;
	}
	getUnion(upazila_id);
});

// district function ajax
function getDistrict(division_id) {
	var base_url = window.location.origin;
	// let url = '{{url("admission/findDistrictName")}}';
	let url = base_url + "/admission/findDistrictName";
	let districtUrl = url + "/" + division_id;
	let output = "";

	$.get(districtUrl)
		.always(function() {
			$("#district_id").find("*").not("#nullValueOption").remove();
			$("#upazila_id").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
		})
		.done(function(data) {
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				output +=
					'<option value="' +
					data[i].id +
					'">' +
					data[i].district_name +
					"</option>";
			}
			$("#district_id").append(output);
		});
}

//  upzila ajax calll function
function getUpazila(id) {
	var base_url = window.location.origin;
	// let url = '{{url("/findUpazilaName")}}';
	let url = base_url + "/admission/findUpazilaName";

	let upazilaUrl = url + "/" + id;
	let output = "";
	$.get(upazilaUrl)
		.always(function() {
			$("#upazila_id").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
		})
		.done(function(data) {
			for (var i = 0; i < data.length; i++) {
				console.log(data[i].upazila_name);
				output +=
					'<option value="' +
					data[i].id +
					'">' +
					data[i].upazila_name +
					"</option>";
			}
			$("#upazila_id").append(output);
		});
}

//  Union ajax  call function
function getUnion(id) {
	var base_url = window.location.origin;
	// let url = '{{url("/findUnionName")}}';
	let url = base_url + "/admission/findUnionName";
	let unionUrl = url + "/" + id;

	let output = "";
	$.get(unionUrl)
		.always(function() {
			$("#union_id").find("*").not("#nullValueOption").remove();
		})
		.done(function(data) {
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				output +=
					'<option value="' +
					data[i].id +
					'">' +
					data[i].union_name +
					"</option>";
			}
			$("#union_id").append(output);
		});
}