$(window).on("load", function () {


  	//++ remove field height Barriere de Piscine */
	var aluclass_id_product = ["14157"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$("#dimension_text_height_208").addClass("disable-field-ndk");
		$("#dimension_text_height_2820").addClass("disable-field-ndk");
	}

	//++ remove field height Barriere de Piscine classic*/
	var aluclass_id_product = ["14375", "14157"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$("#dimension_text_height_3923").addClass("disable-field-ndk");
		$("#dimension_text_height_3926").addClass("disable-field-ndk");
		$("#dimension_text_height_3927").addClass("disable-field-ndk");
		$("#dimension_text_height_3928").addClass("disable-field-ndk");
		$("#dimension_text_height_3929").addClass("disable-field-ndk");

		$("#dimension_text_height_3934").addClass("disable-field-ndk");
		$("#dimension_text_height_3930").addClass("disable-field-ndk");
		$("#dimension_text_height_3931").addClass("disable-field-ndk");
		$("#dimension_text_height_3932").addClass("disable-field-ndk");
		$("#dimension_text_height_3933").addClass("disable-field-ndk");

		$("#dimension_text_height_3935").addClass("disable-field-ndk");
		$("#dimension_text_height_3936").addClass("disable-field-ndk");
		$("#dimension_text_height_3937").addClass("disable-field-ndk");
		$("#dimension_text_height_3938").addClass("disable-field-ndk");
		$("#dimension_text_height_3939").addClass("disable-field-ndk");
	}

  //++ remove field height Barriere de Piscine */
	var aluclass_id_product = ["229"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$("div[data-field='2977']").addClass("disable-field-ndk");
	}

  //++ remove the preview Barriere de Piscine */
	var aluclass_id_product = ["14157", "14375", "14168"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [2819, 2824, 2842, 2974];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}

});


///Barrière de piscine

$(document).on('click', ".img-value-2824[data-id-value='21154']", function () {
	$("#ndk-accessory-quantity-1527").val(1);
	$('#ndk-accessory-quantity-1527').trigger('change');
});

$(document).on('click', ".img-value-2824[data-id-value='21153']", function () {
	$("#ndk-accessory-quantity-1527").val(0);
	$('#ndk-accessory-quantity-1527').trigger('change');
});


$(document).on('click', ".img-value-2833[data-id-value='21194']", function () {
	$("#ndk-accessory-quantity-21225").val(1);
	$('#ndk-accessory-quantity-21225').trigger('change');
});

$(document).on('click', ".img-value-2833[data-id-value='21193']", function () {
	$("#ndk-accessory-quantity-21225").val(0);
	$('#ndk-accessory-quantity-21225').trigger('change');
});

$(document).on('click', ".img-value-2842[data-id-value='21231']", function () {
	$("#ndk-accessory-quantity-2156").val(1);
	$('#ndk-accessory-quantity-2156').trigger('change');
});

$(document).on('click', ".img-value-2842[data-id-value='21230']", function () {
	$("#ndk-accessory-quantity-2156").val(0);
	$('#ndk-accessory-quantity-2156').trigger('change');
});


//garde piscine classique
//simples
$(".color-ndk[data-group='415']").click(function () {
	$('#dimension_text_height_414').val('1200'); //garde piscine classique
	$('#dimension_text_height_3923').val('1200'); ///garde piscine classique
	$('#dimension_text_height_3926').val('1200'); //garde piscine classique
});
//avec porte
$(".color-ndk[data-group='2844']").click(function () {
	$('#dimension_text_height_3927').val('1200'); //garde piscine classique
	$('#dimension_text_height_3928').val('1200'); //garde piscine classique
	$('#dimension_text_height_3929').val('1200'); //garde piscine classique
});

//garde piscine contemporain
//simples
$(".color-ndk[data-group='207']").click(function () {
	$('#dimension_text_height_208').val('1200'); //garde piscine contemporain
	$('#dimension_text_height_3930').val('1200'); ///garde piscine contemporain
	$('#dimension_text_height_3931').val('1200'); //garde piscine contemporain
});
//avec porte
$(".color-ndk[data-group='2821']").click(function () {
	$('#dimension_text_height_3932').val('1200'); //garde piscine contemporain
	$('#dimension_text_height_3933').val('1200'); //garde piscine contemporain
	$('#dimension_text_height_3934').val('1200'); //garde piscine contemporain
});

//garde piscine sable contemporain
//simples
$(".color-ndk[data-group='2834']").click(function () {
	$('#dimension_text_height_2820').val('1200'); //garde piscine sable contemporain
	$('#dimension_text_height_3935').val('1200'); ///garde piscine sable contemporain
	$('#dimension_text_height_3936').val('1200'); //garde piscine sable contemporain
});
//avec porte
$(".color-ndk[data-group='2838']").click(function () {
	$('#dimension_text_height_3937').val('1200'); //garde piscine sable contemporain
	$('#dimension_text_height_3938').val('1200'); //garde piscine sable contemporain
	$('#dimension_text_height_3939').val('1200'); //garde piscine sable contemporain
});
