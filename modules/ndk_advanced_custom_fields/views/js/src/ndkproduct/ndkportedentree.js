$(window).on("load", function () {
  $('#ndk-accessory-quantity-30512').val(0);
  $('#ndk-accessory-quantity-30513').val(0);

	//** remover a pre-visualização portas de entrada*/
	var aluclass_id_product = ["13568", "13571", "13572", "13552", "13542", "13543", "13541", "13537", "13538", "13544", "13553", "13554", "13561", "13560", "13551", "13545", "13546", "13569", "13562", "13563", "13564", "13548", "13547", "13540", "13539", "13550", "13565", "13566", "13557", "13558", "13556", "13555", "13570", "56008", "56170", "56173", "56176", "56178", "56185", "56189", "56190", "56197", "56200", "56201", "56203", "56227", "56229", "56230", "56231", "56233", "56236", "56237", "56240", "56241", "56243", "56246", "56254", "56257", "56260", "56261", "56266", "56267", "56272", "56279", "56286", "56288", "56289", "56293", "56299", "13574", "13575", "13576", "13578", "13579", "13580", "13581", "13582", "13583", "13584", "13585", "13586", "13587", "13588", "13589", "13590", "13591", "13592", "13593", "13594", "13595", "13596", "13597", "13598", "13599", "13600", "13601", "13603", "13604", "13605", "13606", "13607", "13608", "13609", "13611", "13602", "52863", "52857", "52852", "52825", "52823", "51470", "51470", "51472", "51472", "51473", "51473", "51474", "51474", "51475", "51475", "51476", "51476", "51477", "51477", "51478", "51478", "51480", "51480", "51481", "51481", "51619", "51619", "51623", "51623", "51625", "51625", "51627", "51627", "51630", "51630", "51632", "51632", "51635", "51635", "51637", "51637", "51639", "51639", "51641", "51641", "51645", "51645", "51648", "51648", "51649", "51649", "51650", "51650", "51651", "51651", "51652", "51652", "51653", "51653", "51654", "51654", "51655", "51655", "51656", "51656", "51657", "51657", "51658", "51658", "51659", "51659", "51660", "51660", "51661", "51661", "51665", "51665", "3126", "13636", "13623", "3044", "13618", "13620", "3095", "3100", "3052", "13632", "13627", "13626", "13630", "3009", "3021", "3072", "2996", "3016", "3066", "3077", "2988", "3082", "3105", "3026", "3110", "3059", "3001", "3129", "3036", "3087", "3120", "13634", "13637", "13631", "13625", "13619", "13635", "13636", "13639", "13621", "13633", "13629", "13628", "13638", "13622", "13624", "2993", "3115", " 3126", "3092", "3006", "13574", "13575", "13576", "13578", "13579", "13580", "13581", "13582", "13583", "13584", "13585", "13586", "13587", "13588", "13589", "13590", "13591", "13592", "13593", "13594", "13595", "13596", "13597", "13598", "13599", "13600", "13601", "13602", "13603", "13604", "13605", "13606", "13607", "13608", "13609", "13611", "42984", "42986", "3430"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [1269,959,958,957,956,955,954,953,952,951,960,950,963, 1291, 1290, 1293, 1041, 1285, 1034, 1270, 1261, 1262, 1033, 1040, 1261, 1262, 940, 1268, 1049, 1050, 1052, 1053, 1056, 1067, 1068, 1070, 1071, 1072, 1073, 1074, 1288, 1057, 1058, 1059, 1060, 1061, 1062, 1063, 1064, 1065, 923];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
		aluclass_remove_preview[1] = [1270, 1291, 1293, 1041, 1285, 1270, 1034, 1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308, 1309, 1310, 1311, 1312, 1313, 1314, 1315, 1316, 1317, 1318, 1319, 1320, 1321, 1322, 1323, 1324, 1325, 1326, 1327, 1328, 1329, 1330, 1331, 1332, 1333, 977, 978, 979, 980, 981, 982, 983, 984, 985, 986, 987, 988, 989, 990, 991, 992, 993, 994, 995, 996, 997, 998, 999, 1000, 1001, 1002, 1003, 1004, 1005, 1006, 1007, 1008, 1009, 1010, 1011, 1012, 1013, 1014, 1015, 1016, 1017, 1018, 1019, 1020, 1021, 1022, 1023, 1024, 1025, 1026, 1027, 1028, 1029, 1030, 1031, 1075, 1076, 1077, 1078, 1079, 1080, 1081, 1082, 1083, 1084, 1085, 1086, 1087, 1088, 1089, 1090, 1092, 1093, 1094, 1095, 1096, 1097, 1098, 1099, 1100, 1101, 1102, 1103, 1104, 1105, 1106, 1107, 1108, 1109, 1110, 1236, 1247];
		aluclass_remove_preview[1].forEach(function (num) {
			$(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
		});
	}


});


/*
-----------------------  Inicio das Portas de Entrada ----------------------------------------
 Autor :: Vasco
 Altera no Codigo por causa das portas de entrada

 HideNDKFieldError(group); Esconde messagem de erro  de um campo NDK (campo NDK)
 ShowNDKFieldError(group,message); mostra messagem de erro de um campo NDK (campo NDK, texto de erro)
 CalculoAileOrTapee(precoMLtapee, height, width, true); Cacula o tape ou aile, dado uma medida lagura e comprimento e recalcura o dado (preço, altura , comprimento, recalcula o preço)
 AlterPriceSelect('ndkcsfield_1284',options,heightPE,widthPE); Altera do preço num campo ndk (radio button ) (campo NDK, opções de radio button, altura, comprimento)

*/


// --------------------------------------------------------------
// ----------------- portas de Entrada Aço   -----------------
// --------------------------------------------------------------

// ----------------- Tipo de medida que é preciso ----------------- Aço
$(document).on('click', '.img-value-1296', function () {
	var id_value = $(this).data('id-value');

	if (id_value == 11454) {
		$("div[data-field='1297'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote du tableau.</p>");
	} else {
		$("div[data-field='1297'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote de passage.</p>");
	}
});

// ----------------- Calculo Aile Or Tapee-----------------  Aço
$(document).on('change', '#ndkcsfield_1298', function () {
	var precoMLtapee = $(this).find(':selected').data('price');
	CalculoAileOrTapee(precoMLtapee, height, width, true);
});

$(document).on('change', '#ndkcsfield_1036', function () {
	var precoMLaile = $(this).find(':selected').data('price');
	CalculoAileOrTapee(precoMLaile, height, width, true);
});

// ----------------- Alterar preços  Aile Or Tapee-----------------  Aço
$(document).on('focusout', '#dimension_text_width_1297, #dimension_text_height_1297', function () {
	widthPE = $('#dimension_text_width_1297').val();
	heightPE = $('#dimension_text_height_1297').val();
	var options = $('#ndkcsfield_1298 option');
	AlterPriceSelect('ndkcsfield_1298', options, heightPE, widthPE);
	var options = $('#ndkcsfield_1036 option');
	AlterPriceSelect('ndkcsfield_1036', options, heightPE, widthPE);
});

// --------------------------------------------------------------
// ----------------- portas de Entrada Vidro   -----------------
// --------------------------------------------------------------

// ----------------- Tipo de medida que é preciso ----------------- Vidro
$(document).on('click', '.img-value-1042', function () {
	var id_value = $(this).data('id-value');

	if (id_value == 11454) {
		$("div[data-field='1048'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote du tableau.</p>");
		$("div[data-field='1287'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote du tableau.</p>");
	} else {
		$("div[data-field='1048'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote de passage.</p>");
		$("div[data-field='1287'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote de passage.</p>");
	}
});

// ----------------- Calculo Aile Or Tapee-----------------  Vidro
// $(document).on('change', '#ndkcsfield_1284', function () {//Tapee
// 	var precoMLtapee = $(this).find(':selected').data('price');
// 	CalculoAileOrTapee(precoMLtapee,height,width,true);
// });

// $(document).on('change', '#ndkcsfield_1045', function(){ //Aile
// 	var precoMLaile = $(this).find(':selected').data('price');
// 	CalculoAileOrTapee(precoMLaile,height,width,true);
// });
$(document).on('change', "input[type='radio'][name='ndkcsfield[1284]']", function () { // tapee
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var precoMLtapee = $("input[type='radio'][name='ndkcsfield[1284]']:checked").data('price'); //$(this).find(':checked').data('price'); //$("input:checked").data('price');;
		CalculoAileOrTapee(precoMLtapee, height, width, true);
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[1045]']", function () { // Aile
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var precoMLaile = $("input[type='radio'][name='ndkcsfield[1045]']:checked").data('price');
		CalculoAileOrTapee(precoMLaile, height, width, true);
	}

});

// ----------------- Alterar preços  Aile Or Tapee-----------------  Vidro

$(document).on('focusout', '#dimension_text_width_4140, #dimension_text_height_4140, #dimension_text_width_4141, #dimension_text_height_4141 , #dimension_text_width_1287, #dimension_text_height_1287', function () {
	groupvalue = $(this).attr('data-group');
	widthPE = $('#dimension_text_width_' + groupvalue).val();
	heightPE = $('#dimension_text_height_' + groupvalue).val();
	var options = $("input[type='radio'][name='ndkcsfield[1284]']");
	AlterPriceSelect('ndkcsfield_1284', options, heightPE, widthPE);
	var options = $("input[type='radio'][name='ndkcsfield[1045]']");
	AlterPriceSelect('ndkcsfield_1045', options, heightPE, widthPE);
});
$(document).on('focusout', '#dimension_text_width_1048, #dimension_text_height_1048', function () {
	groupvalue = $(this).attr('data-group');
	widthPE = $('#dimension_text_width_' + groupvalue).val();
	heightPE = $('#dimension_text_height_' + groupvalue).val();
	var options = $("input[type='radio'][name='ndkcsfield[1284]']");
	AlterPriceSelect('ndkcsfield_1284', options, heightPE, widthPE);
	var options = $("input[type='radio'][name='ndkcsfield[1045]']");
	AlterPriceSelect('ndkcsfield_1045', options, heightPE, widthPE);
});
// ----------------- Informação da medida -----------------  Vidro
$(document).on('focusout', '#dimension_text_width_1048, #dimension_text_height_1048', function () {
	widthPE = $('#dimension_text_width_1048').val();
	heightPE = $('#dimension_text_height_1048').val();
	$("div[data-field='1043'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4142'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4143'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");

	AreaPE = widthPE * heightPE;

	if ($(".ndkackFieldItem[data-field='1043']").is(':visible')) {
		widthPET = $('#dimension_text_width_1043').val();
		heightPET = $('#dimension_text_height_1043').val();

		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 1043, 1048, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='4142']").is(':visible')) {
		widthPET = $('#dimension_text_width_4142').val();
		heightPET = $('#dimension_text_height_4142').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4142, 1048, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='4143']").is(':visible')) {
		widthPET = $('#dimension_text_width_4143').val();
		heightPET = $('#dimension_text_height_4143').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4143, 1048, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

});
// ----------------- Calculo da Dimensao do Vidro -----------------  aluminio
$(document).on('focusout', '#dimension_text_width_4143, #dimension_text_height_4143, #dimension_text_width_4142, #dimension_text_height_4142, #dimension_text_width_1043, #dimension_text_height_1043', function () {
	groupvalue = $(this).attr('data-group');
	widthPE = $('#dimension_text_width_' + groupvalue).val();
	heightPE = $('#dimension_text_height_' + groupvalue).val();

	AreaPE = widthPE * heightPE;

	widthPET = $('#dimension_text_width_1048').val();
	heightPET = $('#dimension_text_height_1048').val();
	AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);

	CalculoDimensaoVidro(AreaPET, AreaPE, groupvalue, 1048, widthPET, heightPET);
});

// --------------------------------------------------------------
// ----------------- portas de Entrada aluminio -----------------
// --------------------------------------------------------------

$(document).on('change', '#dimension_text_width_1048, #dimension_text_height_1048', function () {
	var dataIdValue;
	var arraytypeGlass = ["1288", "1068", "1052", "1070", "1049", "1053", "1072", "1050", "1071", "1074", "1073", "1049", "1067"];
	for (var i = 0; i < arraytypeGlass.length; i++) {
		dataIdValue = $("[class='centalizar-image-ndk-field-value visual-effect jpg img-value-" + arraytypeGlass[i] + " img-responsive img-value selected-value']").attr('data-id-value');
		if (typeof (dataIdValue) != "undefined") {
			break;
		}
	}
	if ($(".ndkackFieldItem[data-field='1043']").is(':visible'))
		HideDimensionsGlassDoor(1043, dataIdValue, 1048);
	if ($(".ndkackFieldItem[data-field='4142']").is(':visible'))
		HideDimensionsGlassDoor(4142, dataIdValue, 1048);
	if ($(".ndkackFieldItem[data-field='4143']").is(':visible'))
		HideDimensionsGlassDoor(4143, dataIdValue, 1048);
});


$(document).on('click', '.img-value-1288, .img-value-1068, .img-value-1052, .img-value-1070, .img-value-1049, .img-value-1053, .img-value-1072,.img-value-1050, .img-value-1071, .img-value-1074, .img-value-1073,.img-value-1049, .img-value-1067', function () {
	var dataIdValue;
	dataIdValue = $(this).attr('data-id-value');
	if ($(".ndkackFieldItem[data-field='1043']").is(':visible'))
		HideDimensionsGlassDoor(1043, dataIdValue, 1048);
	if ($(".ndkackFieldItem[data-field='4142']").is(':visible'))
		HideDimensionsGlassDoor(4142, dataIdValue, 1048);
	if ($(".ndkackFieldItem[data-field='4143']").is(':visible'))
		HideDimensionsGlassDoor(4143, dataIdValue, 1048);
});



$(document).on('focusout', '#dimension_text_width_949, #dimension_text_height_949', function () {
	var dataIdValue;
	var arraytypeGlass = ["960", "950", "951", "952", "953", "954", "955", "956", "957", "958", "959", "1269"];
	for (var i = 0; i < arraytypeGlass.length; i++) {
		dataIdValue = $("[class='centalizar-image-ndk-field-value visual-effect jpg img-value-" + arraytypeGlass[i] + " img-responsive img-value selected-value']").attr('data-id-value');
		if (typeof (dataIdValue) != "undefined") {
			break;
		}
	}

	if ($(".ndkackFieldItem[data-field='2989']").is(':visible'))
		HideDimensionsGlassDoor(2989, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='945']").is(':visible'))
		HideDimensionsGlassDoor(945, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4136']").is(':visible'))
		HideDimensionsGlassDoor(4136, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4137']").is(':visible'))
		HideDimensionsGlassDoor(4137, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4138']").is(':visible'))
		HideDimensionsGlassDoor(4138, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4139']").is(':visible'))
		HideDimensionsGlassDoor(4139, dataIdValue, 949);

  if ($(".ndkackFieldItem[data-field='4855']").is(':visible'))
    HideDimensionsGlassDoor(4855, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4856']").is(':visible'))
    HideDimensionsGlassDoor(4856, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4857']").is(':visible'))
    HideDimensionsGlassDoor(4857, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4858']").is(':visible'))
    HideDimensionsGlassDoor(4858, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4860']").is(':visible'))
    HideDimensionsGlassDoor(4860, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4861']").is(':visible'))
    HideDimensionsGlassDoor(4861, dataIdValue, 949);

});


$(document).on('click', '.img-value-960, .img-value-950, .img-value-951, .img-value-952, .img-value-953, .img-value-954, .img-value-955,.img-value-956, .img-value-957, .img-value-958, .img-value-959,.img-value-1269', function () {
	var dataIdValue;
	dataIdValue = $(this).attr('data-id-value');

	if ($(".ndkackFieldItem[data-field='2989']").is(':visible'))
		HideDimensionsGlassDoor(2989, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='945']").is(':visible'))
		HideDimensionsGlassDoor(945, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4136']").is(':visible'))
		HideDimensionsGlassDoor(4136, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4137']").is(':visible'))
		HideDimensionsGlassDoor(4137, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4138']").is(':visible'))
		HideDimensionsGlassDoor(4138, dataIdValue, 949);
	if ($(".ndkackFieldItem[data-field='4139']").is(':visible'))
		HideDimensionsGlassDoor(4139, dataIdValue, 949);

  if ($(".ndkackFieldItem[data-field='4855']").is(':visible'))
    HideDimensionsGlassDoor(4855, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4856']").is(':visible'))
    HideDimensionsGlassDoor(4856, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4857']").is(':visible'))
    HideDimensionsGlassDoor(4857, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4858']").is(':visible'))
    HideDimensionsGlassDoor(4858, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4860']").is(':visible'))
    HideDimensionsGlassDoor(4860, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4861']").is(':visible'))
    HideDimensionsGlassDoor(4861, dataIdValue, 949);

});



// ----------------- Tipo de medida que é preciso -----------------  aluminio

$(document).on('click', '.img-value-1035', function () {
	var id_value = $(this).data('id-value');
	if (id_value == 11423) {
		$("div[data-field='1271'] div.field_notice").html("<p><b>Attention : Les dimensions (en mm) doivent être les cotes de tableau.</b></p>"); //doivent être la cote du tableau.
		$("div[data-field='949'] div.field_notice").html("<p><b>Attention : Les dimensions (en mm) doivent être les cotes de tableau.</b></p>"); //doivent être la cote du tableau.
	} else {
		$("div[data-field='1271'] div.field_notice").html("<p>Les dimensions (en mm) </p>"); //doivent être la cote de passage.
		$("div[data-field='949'] div.field_notice").html("<p>Les dimensions (en mm) </p>"); //doivent être la cote de passage.
	}
});

// ----------------- Calculo Aile Or Tapee-----------------  aluminio
$(document).on('change', "input[type='radio'][name='ndkcsfield[1036]']", function () { // tapee
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var precoMLtapee = $("input[type='radio'][name='ndkcsfield[1036]']:checked").data('price'); //$(this).find(':checked').data('price'); //$("input:checked").data('price');;
		CalculoAileOrTapee(precoMLtapee, height, width, true);
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[1265]']", function () { // Aile
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var precoMLaile = $("input[type='radio'][name='ndkcsfield[1265]']:checked").data('price');
		CalculoAileOrTapee(precoMLaile, height, width, true);
	}

});

// ----------------- Alterar preços  Aile Or Tapee-----------------  aluminio


$(document).on('focusout', '#dimension_text_width_4854, #dimension_text_height_4854,#dimension_text_width_4853, #dimension_text_height_4853,#dimension_text_width_4852, #dimension_text_height_4852,#dimension_text_width_4849, #dimension_text_height_4849,#dimension_text_width_4850, #dimension_text_height_4850,#dimension_text_width_4851, #dimension_text_height_4851, #dimension_text_width_4128, #dimension_text_height_4128, #dimension_text_width_4127, #dimension_text_height_4127, #dimension_text_width_2987, #dimension_text_height_2987,#dimension_text_width_4125, #dimension_text_height_4125,#dimension_text_width_4124, #dimension_text_height_4124,#dimension_text_width_1271, #dimension_text_height_1271', function () {
	groupvalue = $(this).attr('data-group');
	widthPE = $('#dimension_text_width_' + groupvalue).val();
	heightPE = $('#dimension_text_height_' + groupvalue).val();

	var options = $("input[type='radio'][name='ndkcsfield[1265]']");
	AlterPriceSelect('ndkcsfield_1265', options, heightPE, widthPE);
	var options = $("input[type='radio'][name='ndkcsfield[1036]']");
	AlterPriceSelect('ndkcsfield_1036', options, heightPE, widthPE);
});

$(document).on('focusout', '#dimension_text_width_949, #dimension_text_height_949', function () {
	widthPE = $('#dimension_text_width_949').val();
	heightPE = $('#dimension_text_height_949').val();
	var options = $("input[type='radio'][name='ndkcsfield[1265]']");
	AlterPriceSelect('ndkcsfield_1265', options, heightPE, widthPE);
	var options = $("input[type='radio'][name='ndkcsfield[1036]']");
	AlterPriceSelect('ndkcsfield_1036', options, heightPE, widthPE);
});
// ----------------- Informação da medida -----------------  aluminio
$(document).on('focusout', '#dimension_text_width_949, #dimension_text_height_949', function () {
	widthPE = $('#dimension_text_width_949').val();
	heightPE = $('#dimension_text_height_949').val();
	$("div[data-field='945'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='2989'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4136'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4137'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4138'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4139'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");

  $("div[data-field='4855'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4856'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4857'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4858'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4860'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	$("div[data-field='4861'] div.field_notice").html("<p>Dimensions Totales: " + widthPE + "mm X " + heightPE + "mm</p>");
	AreaPE = widthPE * heightPE;

	if ($(".ndkackFieldItem[data-field='945']").is(':visible')) {
		widthPET = $('#dimension_text_width_945').val();
		heightPET = $('#dimension_text_height_945').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 945, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='2989']").is(':visible')) {
		widthPET = $('#dimension_text_width_2989').val();
		heightPET = $('#dimension_text_height_2989').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 2989, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='4136']").is(':visible')) {
		widthPET = $('#dimension_text_width_4136').val();
		heightPET = $('#dimension_text_height_4136').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4136, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='4137']").is(':visible')) {
		widthPET = $('#dimension_text_width_4137').val();
		heightPET = $('#dimension_text_height_4137').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4137, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='4138']").is(':visible')) {
		widthPET = $('#dimension_text_width_4138').val();
		heightPET = $('#dimension_text_height_4138').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4138, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

	if ($(".ndkackFieldItem[data-field='4139']").is(':visible')) {
		widthPET = $('#dimension_text_width_4139').val();
		heightPET = $('#dimension_text_height_4139').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4139, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}



  if ($(".ndkackFieldItem[data-field='4855']").is(':visible')) {
		widthPET = $('#dimension_text_width_4855').val();
		heightPET = $('#dimension_text_height_4855').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4855, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

  if ($(".ndkackFieldItem[data-field='4856']").is(':visible')) {
		widthPET = $('#dimension_text_width_4856').val();
		heightPET = $('#dimension_text_height_4856').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4856, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

  if ($(".ndkackFieldItem[data-field='4857']").is(':visible')) {
		widthPET = $('#dimension_text_width_4857').val();
		heightPET = $('#dimension_text_height_4857').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4857, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

  if ($(".ndkackFieldItem[data-field='4858']").is(':visible')) {
		widthPET = $('#dimension_text_width_4858').val();
		heightPET = $('#dimension_text_height_4858').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4858, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

  if ($(".ndkackFieldItem[data-field='4860']").is(':visible')) {
		widthPET = $('#dimension_text_width_4860').val();
		heightPET = $('#dimension_text_height_4860').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4860, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}

  if ($(".ndkackFieldItem[data-field='4861']").is(':visible')) {
		widthPET = $('#dimension_text_width_4861').val();
		heightPET = $('#dimension_text_height_4861').val();
		AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);
		CalculoDimensaoVidro(AreaPE, AreaPET, 4861, 949, (typeof widthPET !== 'undefined' ? widthPET : widthPE), (typeof heightPET !== 'undefined' ? heightPET : heightPE));
	}
});

// ----------------- Calculo da Dimensao do Vidro -----------------  aluminio


$(document).on('change', '#dimension_text_width_4861, #dimension_text_height_4861,#dimension_text_width_4860, #dimension_text_height_4860,#dimension_text_width_4858, #dimension_text_height_4858,#dimension_text_width_4857, #dimension_text_height_4857,#dimension_text_width_4856, #dimension_text_height_4856,#dimension_text_width_4855, #dimension_text_height_4855,#dimension_text_width_4139, #dimension_text_height_4139,#dimension_text_width_4138, #dimension_text_height_4138,#dimension_text_width_4137, #dimension_text_height_4137,#dimension_text_width_4136, #dimension_text_height_4136, #dimension_text_width_2989, #dimension_text_height_2989,#dimension_text_width_945, #dimension_text_height_945', function () {
	groupvalue = $(this).attr('data-group');
	widthPE = $('#dimension_text_width_' + groupvalue).val();
	heightPE = $('#dimension_text_height_' + groupvalue).val();
	AreaPE = widthPE * heightPE;

	widthPET = $('#dimension_text_width_949').val();
	heightPET = $('#dimension_text_height_949').val();

	AreaPET = (typeof widthPET !== 'undefined' ? widthPET : widthPE) * (typeof heightPET !== 'undefined' ? heightPET : heightPE);

	CalculoDimensaoVidro(AreaPET, AreaPE, groupvalue, 949, widthPET, heightPET);
});

//-----------------------  Fim da alteração Portas de Entrada ----------------------------------------



/*
*****************************************************************************
*			Portas 	de entradas com vidro de aliminio ou de vidro          *
*****************************************************************************
@Vasco Ribeiro 10-09-2020

HideDimensionsGlassDoor(idDimensions,dataIdValue,idDimensionsGo) - esconde largura ou altura conforme o que é selecionado. (ID campo NDK do campo dimensions, id do valor do campo surface vitree, ID campo dimensions que vai alterar o valor)

*/


$(document).on('change', '#dimension_text_width_1048, #dimension_text_height_1048', function () {
	var dataIdValue;
	var arraytypeGlass = ["1288", "1068", "1052", "1070", "1049", "1053", "1072", "1050", "1071", "1074", "1073", "1049", "1067"];
	for (var i = 0; i < arraytypeGlass.length; i++) {
		dataIdValue = $("[class='centalizar-image-ndk-field-value visual-effect jpg img-value-" + arraytypeGlass[i] + " img-responsive img-value selected-value']").attr('data-id-value');
		if (typeof (dataIdValue) != "undefined") {
			break;
		}
	}
	HideDimensionsGlassDoor(1043, dataIdValue, 1048);

});


$(document).on('click', '.img-value-1288, .img-value-1068, .img-value-1052, .img-value-1070, .img-value-1049, .img-value-1053, .img-value-1072,.img-value-1050, .img-value-1071, .img-value-1074, .img-value-1073,.img-value-1049, .img-value-1067', function () {
	var dataIdValue;
	dataIdValue = $(this).attr('data-id-value');
	HideDimensionsGlassDoor(1043, dataIdValue, 1048);
});



$(document).on('focusout', '#dimension_text_width_949, #dimension_text_height_949', function () {
	var dataIdValue;
	var arraytypeGlass = ["960", "950", "951", "952", "953", "954", "955", "956", "957", "958", "959", "1269"];
	for (var i = 0; i < arraytypeGlass.length; i++) {
		dataIdValue = $("[class='centalizar-image-ndk-field-value visual-effect jpg img-value-" + arraytypeGlass[i] + " img-responsive img-value selected-value']").attr('data-id-value');
		if (typeof (dataIdValue) != "undefined") {
			break;
		}
	}
	if($(".ndkackFieldItem[data-field='2989']").is(':visible'))
		HideDimensionsGlassDoor(2989,dataIdValue,949);
	if($(".ndkackFieldItem[data-field='945']").is(':visible'))
		HideDimensionsGlassDoor(945,dataIdValue,949);
	if($(".ndkackFieldItem[data-field='4136']").is(':visible'))
		HideDimensionsGlassDoor(4136,dataIdValue,949);
	if($(".ndkackFieldItem[data-field='4137']").is(':visible'))
		HideDimensionsGlassDoor(4137,dataIdValue,949);
	if($(".ndkackFieldItem[data-field='4138']").is(':visible'))
		HideDimensionsGlassDoor(4138,dataIdValue,949);
	if($(".ndkackFieldItem[data-field='4139']").is(':visible'))
		HideDimensionsGlassDoor(4139,dataIdValue,949);

    if ($(".ndkackFieldItem[data-field='4855']").is(':visible'))
    HideDimensionsGlassDoor(4855, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4856']").is(':visible'))
    HideDimensionsGlassDoor(4856, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4857']").is(':visible'))
    HideDimensionsGlassDoor(4857, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4858']").is(':visible'))
    HideDimensionsGlassDoor(4858, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4860']").is(':visible'))
    HideDimensionsGlassDoor(4860, dataIdValue, 949);
  if ($(".ndkackFieldItem[data-field='4861']").is(':visible'))
    HideDimensionsGlassDoor(4861, dataIdValue, 949);

});


$(document).on('click', '.img-value-960, .img-value-950, .img-value-951, .img-value-952, .img-value-953, .img-value-954, .img-value-955,.img-value-956, .img-value-957, .img-value-958, .img-value-959,.img-value-1269', function () {
		var dataIdValue;
		dataIdValue = $(this).attr('data-id-value');
		if($(".ndkackFieldItem[data-field='2989']").is(':visible'))
			HideDimensionsGlassDoor(2989,dataIdValue,949);
		if($(".ndkackFieldItem[data-field='945']").is(':visible'))
			HideDimensionsGlassDoor(945,dataIdValue,949);
		if($(".ndkackFieldItem[data-field='4136']").is(':visible'))
			HideDimensionsGlassDoor(4136,dataIdValue,949);
		if($(".ndkackFieldItem[data-field='4137']").is(':visible'))
			HideDimensionsGlassDoor(4137,dataIdValue,949);
		if($(".ndkackFieldItem[data-field='4138']").is(':visible'))
			HideDimensionsGlassDoor(4138,dataIdValue,949);
		if($(".ndkackFieldItem[data-field='4139']").is(':visible'))
			HideDimensionsGlassDoor(4139,dataIdValue,949);

    if ($(".ndkackFieldItem[data-field='4855']").is(':visible'))
      HideDimensionsGlassDoor(4855, dataIdValue, 949);
    if ($(".ndkackFieldItem[data-field='4856']").is(':visible'))
      HideDimensionsGlassDoor(4856, dataIdValue, 949);
    if ($(".ndkackFieldItem[data-field='4857']").is(':visible'))
      HideDimensionsGlassDoor(4857, dataIdValue, 949);
    if ($(".ndkackFieldItem[data-field='4858']").is(':visible'))
      HideDimensionsGlassDoor(4858, dataIdValue, 949);
    if ($(".ndkackFieldItem[data-field='4860']").is(':visible'))
      HideDimensionsGlassDoor(4860, dataIdValue, 949);
    if ($(".ndkackFieldItem[data-field='4861']").is(':visible'))
      HideDimensionsGlassDoor(4861, dataIdValue, 949);
});


//+++Portas de entradas oferta
$(document).on('click', '.img-value', function () {
	var aluclass_id_product = ["13568", "13571", "13572", "13552", "13542", "13543", "13541", "13537", "13538", "13544", "13553", "13554", "13561", "13560", "13551", "13545", "13546", "13569", "13562", "13563", "13564", "13548", "13547", "13540", "13539", "13550", "13565", "13566", "13557", "13558", "13556", "13555", "13570", "56008", "56170", "56173", "56176", "56178", "56185", "56189", "56190", "56197", "56200", "56201", "56203", "56227", "56229", "56230", "56231", "56233", "56236", "56237", "56240", "56241", "56243", "56246", "56254", "56257", "56260", "56261", "56266", "56267", "56272", "56279", "56286", "56288", "56289", "56293", "56299", "13574", "13575", "13576", "13578", "13579", "13580", "13581", "13582", "13583", "13584", "13585", "13586", "13587", "13588", "13589", "13590", "13591", "13592", "13593", "13594", "13595", "13596", "13597", "13598", "13599", "13600", "13601", "13603", "13604", "13605", "13606", "13607", "13608", "13609", "13611", "13602", "52863", "52857", "52852", "52825", "52823", "51470", "51470", "51472", "51472", "51473", "51473", "51474", "51474", "51475", "51475", "51476", "51476", "51477", "51477", "51478", "51478", "51480", "51480", "51481", "51481", "51619", "51619", "51623", "51623", "51625", "51625", "51627", "51627", "51630", "51630", "51632", "51632", "51635", "51635", "51637", "51637", "51639", "51639", "51641", "51641", "51645", "51645", "51648", "51648", "51649", "51649", "51650", "51650", "51651", "51651", "51652", "51652", "51653", "51653", "51654", "51654", "51655", "51655", "51656", "51656", "51657", "51657", "51658", "51658", "51659", "51659", "51660", "51660", "51661", "51661", "51665", "51665", "3126", "13636", "13623", "3044", "13618", "13620", "3095", "3100", "3052", "13632", "13627", "13626", "13630", "3009", "3021", "3072", "2996", "3016", "3066", "3077", "2988", "3082", "3105", "3026", "3110", "3059", "3001", "3129", "3036", "3087", "3120", "13634", "13637", "13631", "13625", "13619", "13635", "13636", "13639", "13621", "13633", "13629", "13628", "13638", "13622", "13624", "2993", "3115", " 3126", "3092", "3006", "13574", "13575", "13576", "13578", "13579", "13580", "13581", "13582", "13583", "13584", "13585", "13586", "13587", "13588", "13589", "13590", "13591", "13592", "13593", "13594", "13595", "13596", "13597", "13598", "13599", "13600", "13601", "13602", "13603", "13604", "13605", "13606", "13607", "13608", "13609", "13611", "42984", "42986", "3430"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		value = $(this).attr('data-value');
		result1 = value.includes("85");
		result2 = value.includes("105");
		if(result1 || result2){
			$(".img-value-4659").trigger('click');
		}
	}
});

//----Portas de entradas oferta


$(document).on('click', '.img-value-1033[data-id-value="11420"]', function () {
	$('.img-value-1034[data-id-value="11422"]').trigger('click');
});
$(document).on('click', '.img-value-1033[data-id-value="11419"]', function () {
	$('.img-value-1270[data-id-value="12197"]').trigger('click');
});
$(document).on('click', '.img-value-1033[data-id-value="18929"]', function () {
	$('.img-value-1270[data-id-value="12197"]').trigger('click');
});
$(document).on('click', '.img-value-1033[data-id-value="18928"]', function () {
	$('.img-value-1034[data-id-value="11422"]').trigger('click');
});


$(document).on('click', '.img-value-1040[data-id-value="19006"]', function () {
	$('.img-value-1041[data-id-value="11453"]').trigger('click');
});
$(document).on('click', '.img-value-1040[data-id-value="19007"]', function () {
	$('.img-value-1285[data-id-value="12271"]').trigger('click');
});
$(document).on('click', '.img-value-1040[data-id-value="11450"]', function () {
	$('.img-value-1285[data-id-value="12271"]').trigger('click');
});
$(document).on('click', '.img-value-1040[data-id-value="11451"]', function () {
	$('.img-value-1041[data-id-value="11453"]').trigger('click');
});


$(document).on('click', '.img-value-1290[data-id-value="12313"]', function () {
	$('.img-value-1291[data-id-value="12316"]').trigger('click');
});
$(document).on('click', '.img-value-1290[data-id-value="12314"]', function () {
	$('.img-value-1293[data-id-value="12320"]').trigger('click');
});
$(document).on('click', '.img-value-1290[data-id-value="19034"]', function () {
	$('.img-value-1293[data-id-value="12320"]').trigger('click');
});
$(document).on('click', '.img-value-1290[data-id-value="19033"]', function () {
	$('.img-value-1291[data-id-value="12316"]').trigger('click');
});
