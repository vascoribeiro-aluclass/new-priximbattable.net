$(window).on("load", function () {

  	//++ remove field height Garde Corps*/
	var aluclass_id_product = ["951", "1016", "1019", "1022"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$("#dimension_text_height_2818").addClass("disable-field-ndk");
		$("#dimension_text_height_3910").addClass("disable-field-ndk");
		$("#dimension_text_height_3911").addClass("disable-field-ndk");
		$("#dimension_text_height_2793").addClass("disable-field-ndk");
		$("#dimension_text_height_3919").addClass("disable-field-ndk");
		$("#dimension_text_height_3921").addClass("disable-field-ndk");
		$("#dimension_text_height_3912").addClass("disable-field-ndk");
		$("#dimension_text_height_3913").addClass("disable-field-ndk");
		$("#dimension_text_height_2806").addClass("disable-field-ndk");
		$("#dimension_text_height_3920").addClass("disable-field-ndk");
		$("#dimension_text_height_3922").addClass("disable-field-ndk");
		$("#dimension_text_height_2777").addClass("disable-field-ndk");
		$("#dimension_text_height_2792").addClass("disable-field-ndk");
		$("#dimension_text_height_3914").addClass("disable-field-ndk");
		$("#dimension_text_height_3916").addClass("disable-field-ndk");
		$("#dimension_text_height_2802").addClass("disable-field-ndk");
		$("#dimension_text_height_3915").addClass("disable-field-ndk");
		$("#dimension_text_height_3917").addClass("disable-field-ndk");
	}

	//++ remove the preview Garde Corps */
	var aluclass_id_product = ["951", "1019", "1022", "1085"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [2790, 2801, 2805, 3045];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}

});


//garde corps classic

$("#dimension_text_width_2818").change(function () {
  $('#dimension_text_height_2818').val('1100');
  $('#dimension_text_height_2818').trigger('change');
});

$("#dimension_text_width_3910").change(function () {
  $('#dimension_text_height_3910').val('1100');
  $('#dimension_text_height_3910').trigger('change');
});
$("#dimension_text_width_3911").change(function () {
  $('#dimension_text_height_3911').val('1100');
  $('#dimension_text_height_3911').trigger('change');
});

// $(".color-ndk[data-group='2795']").click(function () {
// 	$('#dimension_text_height_2818').val('1100'); //Garde Corps Clasic
// 	$('#dimension_text_height_3910').val('1100'); //Garde Corps Clasic
// 	$('#dimension_text_height_3911').val('1100'); //Garde Corps Clasic

//   $('#dimension_text_width_2818').val('1000'); //Garde Corps Clasic
// 	$('#dimension_text_width_3910').val('1000'); //Garde Corps Clasic
// 	$('#dimension_text_width_3911').val('1000'); //Garde Corps Clasic

//   $('#dimension_text_height_2818').trigger('change');
//   $('#dimension_text_height_3910').trigger('change');
//   $('#dimension_text_height_3911').trigger('change');
// });


//garde corps Personnalisable

$("#dimension_text_width_2777").change(function () {
  $('#dimension_text_height_2777').val('1100');
  $('#dimension_text_height_2777').trigger('change');
});

$("#dimension_text_width_3912").change(function () {
  $('#dimension_text_height_3912').val('1100');
  $('#dimension_text_height_3912').trigger('change');
});
$("#dimension_text_width_3913").change(function () {
  $('#dimension_text_height_3913').val('1100');
  $('#dimension_text_height_3913').trigger('change');
});

// $(".color-ndk[data-group='2778']").click(function () {
// 	$('#dimension_text_height_2777').val('1100'); //Garde Corps Personnalisable
// 	$('#dimension_text_height_3912').val('1100'); //Garde Corps Personnalisable
// 	$('#dimension_text_height_3913').val('1100'); //Garde Corps Personnalisable

//   $('#dimension_text_width_2777').val('1000'); //Garde Corps Personnalisable
// 	$('#dimension_text_width_3912').val('1000'); //Garde Corps Personnalisable
// 	$('#dimension_text_width_3913').val('1000'); //Garde Corps Personnalisable

//   $('#dimension_text_height_2777').trigger('change');
//   $('#dimension_text_height_3912').trigger('change');
//   $('#dimension_text_height_3913').trigger('change');
// });


//garde corps Contemporain
//simples

$("#dimension_text_width_2792").change(function () {
  $('#dimension_text_height_2792').val('1100');
  $('#dimension_text_height_2792').trigger('change');
});

$("#dimension_text_width_3914").change(function () {
  $('#dimension_text_height_3914').val('1100');
  $('#dimension_text_height_3914').trigger('change');
});
$("#dimension_text_width_3916").change(function () {
  $('#dimension_text_height_3916').val('1100');
  $('#dimension_text_height_3916').trigger('change');
});

// $(".color-ndk[data-group='2799']").click(function () {
// 	$('#dimension_text_height_2792').val('1100'); //Garde Corps Contemporain
// 	$('#dimension_text_height_3914').val('1100'); //Garde Corps Contemporain
// 	$('#dimension_text_height_3916').val('1100'); //Garde Corps Contemporain


//   $('#dimension_text_width_2792').val('1000'); //Garde Corps Contemporain
// 	$('#dimension_text_width_3914').val('1000'); //Garde Corps Contemporain
// 	$('#dimension_text_width_3916').val('1000'); //Garde Corps Contemporain

//   $('#dimension_text_height_2792').trigger('change');
//   $('#dimension_text_height_3914').trigger('change');
//   $('#dimension_text_height_3916').trigger('change');
// });
//sable

$("#dimension_text_width_2802").change(function () {
  $('#dimension_text_height_2802').val('1100');
  $('#dimension_text_height_2802').trigger('change');
});

$("#dimension_text_width_3915").change(function () {
  $('#dimension_text_height_3915').val('1100');
  $('#dimension_text_height_3915').trigger('change');
});
$("#dimension_text_width_3917").change(function () {
  $('#dimension_text_height_3917').val('1100');
  $('#dimension_text_height_3917').trigger('change');
});

// $(".color-ndk[data-group='2803']").click(function () {
// 	$('#dimension_text_height_2802').val('1100'); //Garde Corps Contemporain
// 	$('#dimension_text_height_3915').val('1100'); //Garde Corps Contemporain
// 	$('#dimension_text_height_3917').val('1100'); //Garde Corps Contemporain

//   $('#dimension_text_width_2802').val('1000'); //Garde Corps Contemporain
// 	$('#dimension_text_width_3915').val('1000'); //Garde Corps Contemporain
// 	$('#dimension_text_width_3917').val('1000'); //Garde Corps Contemporain

//   $('#dimension_text_height_2802').trigger('change');
//   $('#dimension_text_height_3915').trigger('change');
//   $('#dimension_text_height_3917').trigger('change');
// });


//garde corps Neo
//simples

$("#dimension_text_width_2793").change(function () {
  $('#dimension_text_height_2793').val('1100');
  $('#dimension_text_height_2793').trigger('change');
});

$("#dimension_text_width_3919").change(function () {
  $('#dimension_text_height_3919').val('1100');
  $('#dimension_text_height_3919').trigger('change');
});
$("#dimension_text_width_3921").change(function () {
  $('#dimension_text_height_3921').val('1100');
  $('#dimension_text_height_3921').trigger('change');
});

// $(".color-ndk[data-group='2797']").click(function () {
// 	$('#dimension_text_height_2793').val('1100'); //Garde Corps Neo
// 	$('#dimension_text_height_3919').val('1100'); //Garde Corps Neo
// 	$('#dimension_text_height_3921').val('1100'); //Garde Corps Neo

//   $('#dimension_text_width_2793').val('1000'); //Garde Corps Neo
// 	$('#dimension_text_width_3919').val('1000'); //Garde Corps Neo
// 	$('#dimension_text_width_3921').val('1000'); //Garde Corps Neo

//   $('#dimension_text_height_2793').trigger('change');
//   $('#dimension_text_height_3919').trigger('change');
//   $('#dimension_text_height_3921').trigger('change');
// });
//sable

$("#dimension_text_width_2806").change(function () {
  $('#dimension_text_height_2806').val('1100');
  $('#dimension_text_height_2806').trigger('change');
});

$("#dimension_text_width_3920").change(function () {
  $('#dimension_text_height_3920').val('1100');
  $('#dimension_text_height_3920').trigger('change');
});
$("#dimension_text_width_3922").change(function () {
  $('#dimension_text_height_3922').val('1100');
  $('#dimension_text_height_3922').trigger('change');
});

// $(".color-ndk[data-group='2807']").click(function () {
// 	$('#dimension_text_height_2806').val('1100'); //Garde Corps Neo
// 	$('#dimension_text_height_3920').val('1100'); //Garde Corps Neo
// 	$('#dimension_text_height_3922').val('1100'); //Garde Corps Neo

//   $('#dimension_text_width_2806').val('1000'); //Garde Corps Neo
// 	$('#dimension_text_width_3920').val('1000'); //Garde Corps Neo
// 	$('#dimension_text_width_3922').val('1000'); //Garde Corps Neo

//   $('#dimension_text_height_2806').trigger('change');
//   $('#dimension_text_height_3920').trigger('change');
//   $('#dimension_text_height_3922').trigger('change');
// });
