$(document).on("change", "#division_id", function() {
	let division_id = $(this).val();

	if (division_id == "") {
		division_id = 0;
	}

	getDistrict(division_id);
});
$(document).on("change", "#mcu_type", function() {
	let mcu_type_id = $(this).val(); //1
	let district_id = $('#district_id').val();
	// alert(district_id);
	if (mcu_type_id == "") {
		mcu_type_id = 0;
		$("#city_name").find("*").not("#nullValueOption").remove();
	}
	if (district_id == "") {
		district_id = 0;
	}
	if (mcu_type_id == 1) {
		$('#city_name').prop('disabled', false);
		getCityCorporation(district_id);
	}
	if (mcu_type_id == 2) {
		$('#city_name').prop('disabled', true);
		$("#city_name").find("*").not("#nullValueOption").remove();
		// getCityCorporation(district_id);
	}
	if (mcu_type_id == 3) {
		$('#city_name').prop('disabled', true);
		$("#city_name").find("*").not("#nullValueOption").remove();
		findThanaNameWithOutCityCor(district_id);
	}
});

$(document).on("change", "#O_division_id", function() {
	let division_id = $(this).val();

	if (division_id == "") {
		division_id = 0;
	}

	getDistrict(division_id);
});

$(document).on("change", "#district_id", function() {
	let district_id = $(this).val();
	let mcu_type = $('#mcu_type').val();
	if (district_id == "") {
		district_id = 0;
	}
	if (mcu_type == "") {
		mcu_type = 0;
	}
	getUpazila(district_id);
	if (mcu_type == '1') {
		getCityCorporation(district_id);
	}

});

$(document).on("change", "#city_name", function() {
	let city_name = $(this).val();
	let district_id = $('#district_id').val();
	if (city_name == "") {
		getUpazila(district_id);
	}
	findThanaName(city_name);

});

$(document).on("change", "#O_district_id", function() {
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

$(document).on("change", "#O_upazila_id", function() {
	let upazila_id = $(this).val();
	if (upazila_id == "") {
		upazila_id = 0;
	}
	getUnion(upazila_id);
});

function getCityCorporation(id) {
	let base_url = window.location.origin;

	let url = base_url + "/admission/findCityCorporation";

	let ccUrl = url + "/" + id;
	let output = "";

	console.log(ccUrl);

	$.get(ccUrl)
		.always(function() {
			$("#city_name").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
			$("#O_union_id").find("*").not("#nullValueOption").remove();
		})
		.done(function(data) {
			for (var i = 0; i < data.length; i++) {
				output +=
					'<option value="' +
					data[i].id +
					'">' +
					data[i].city_corp_name +
					"</option>";
			}
			$("#city_name").append(output);
		});
}

function findThanaName(id) {
	let base_url = window.location.origin;

	let url = base_url + "/admission/findThanaName";

	let upazilaUrl = url + "/" + id;
	let output = "";
	$.get(upazilaUrl)
		.always(function() {
			$("#upazila_id").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
			$("#O_upazila_id").find("*").not("#nullValueOption").remove();
			$("#O_union_id").find("*").not("#nullValueOption").remove();
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
			$("#O_upazila_id").append(output);
		});
}

function findThanaNameWithOutCityCor(id) {
	let base_url = window.location.origin;

	let url = base_url + "/admission/findThanaNameWithOutCityCor";

	let upazilaUrl = url + "/" + id;
	let output = "";
	$.get(upazilaUrl)
		.always(function() {
			$("#upazila_id").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
			$("#O_upazila_id").find("*").not("#nullValueOption").remove();
			$("#O_union_id").find("*").not("#nullValueOption").remove();
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
			$("#O_upazila_id").append(output);
		});
}

// district function ajax
function getDistrict(division_id) {
	let base_url = window.location.origin;

	let url = base_url + "/admission/findDistName";

	let districtUrl = url + "/" + division_id;
	let output = "";

	console.log(districtUrl);

	$.get(districtUrl)
		.always(function() {
			// $("#mcu_type").find("#nullValueOption").setAttribute();
			$("#district_id").find("*").not("#nullValueOption").remove();
			$("#city_name").find("*").not("#nullValueOption").remove();
			$("#upazila_id").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
			$("#O_district_id").find("*").not("#nullValueOption").remove();
			$("#O_upazila_id").find("*").not("#nullValueOption").remove();
			$("#O_union_id").find("*").not("#nullValueOption").remove();
		})
		.done(function(data) {
			for (var i = 0; i < data.length; i++) {
				output +=
					'<option value="' +
					data[i].id +
					'">' +
					data[i].district_name +
					"</option>";
			}
			$("#district_id").append(output);
			$("#O_district_id").append(output);
		});
}

//  upzila ajax calll function
function getUpazila(id) {
	let base_url = window.location.origin;

	let url = base_url + "/admission/findUpazilasName";

	let upazilaUrl = url + "/" + id;
	let output = "";
	$.get(upazilaUrl)
		.always(function() {
			// $("#city_name").find("*").not("#nullValueOption").remove();
			$("#upazila_id").find("*").not("#nullValueOption").remove();
			$("#union_id").find("*").not("#nullValueOption").remove();
			$("#O_upazila_id").find("*").not("#nullValueOption").remove();
			$("#O_union_id").find("*").not("#nullValueOption").remove();
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
			$("#O_upazila_id").append(output);
		});
}

//  Union ajax  call function

function getUnion(id) {
	var base_url = window.location.origin;
	// let url = '{{url("/student/findUnionName")}}';
	let url = base_url + "/admission/findUnionsName";
	let unionUrl = url + "/" + id;

	let output = "";
	$.get(unionUrl)
		.always(function() {
			$("#union_id").find("*").not("#nullValueOption").remove();
			$("#O_union_id").find("*").not("#nullValueOption").remove();
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
			$("#O_union_id").append(output);
		});
}