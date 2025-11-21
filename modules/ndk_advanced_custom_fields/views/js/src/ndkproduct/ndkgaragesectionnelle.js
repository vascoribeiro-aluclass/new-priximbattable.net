$(window).on("load", function () {

  $('#ndk-accessory-quantity-30507').val(0);
  $('#ndk-accessory-quantity-30508').val(0);

  $("li[data-id-value='" + 30508 + "']").hide();
  $("li[data-id-value='" + 30507 + "']").show();

  if (typeof (id_product) == 'undefined'){
    id_product = null;
  }

  var aluclass_id_product = [ "171280"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var arrayFields = [];
    arrayFields = ["2219", "2753", "2754"];
    HideAllFields(arrayFields, "2219");
  }

  var aluclass_id_product = ["640281"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var arrayFields = [];
    arrayFields = ["5513", "5514", "5515"];
    HideAllFields(arrayFields, "5513");
  }

	var aluclass_id_product = [ "171280"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var arrayFields = [];
    arrayFields = ["2218", "3511", "3512", "3513", "3514", "3515", "3516", "3517", "3518", "3519", "3520", "3525"];
    HideAllFields(arrayFields, "3525");
	}

  var aluclass_id_product = ["640281"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var arrayFields = [];
    arrayFields = ["5505", "5506", "5507", "5508", "5509", "5510", "5511", "5512"];
    HideAllFields(arrayFields, "5512");
	}

  //** remover a pre-visualização porta seccionada */
	var aluclass_id_product = ["13613", "171280", "178796", "171280", "640280", "640281"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [3077, 2211, 2165, 2169, 2218, 2219, 2753, 2754, 3511, 3512, 3513, 3514, 3515, 3516, 3517, 3518, 3519, 3520, 3525, 2753, 2754, 3502 ,5497, 5512, 5513, 5514, 5515, 5505, 5506, 5507, 5508, 5509, 5510, 5511, 5498];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}

  var aluclass_id_product = ["12228", "12227","12223","12224","12225","12226","13613","170307","170225","178796","321715","170397","171280"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		// $("#descriptionPrice_26893").html("196 €");
		// $("#descriptionPrice_16918").html("196 €");
		// $("#descriptionPrice_17486").html("213 €");
		// $("#descriptionPrice_29910").html("213 €");
		// $("#descriptionPrice_29911").html("213 €");

		// $("#descriptionimg_26893").html("Motorisé Athena 600 2.5mt (<span style='color: red;'><s>393€</s></span>) -50%");
		// $("#descriptionimg_16918").html("Motorisé Athena 600 2.5mt (<span style='color: red;'><s>393€</s></span>) -50%");
		// $("#descriptionimg_17486").html("Motorisé Athena 800 (<span style='color: red;'><s>426€</s></span>) -50%");
    // $("#descriptionimg_29910").html("Motorisé Athena 600 3mt (<span style='color: red;'><s>426€</s></span>) -50%");
    // $("#descriptionimg_29911").html("Motorisé Athena 600 3mt (<span style='color: red;'><s>426€</s></span>) -50%");

	}

	//** disable label and field field ndk */
	var aluclass_id_product = ["12227","12228","12223","12225","12226","640271","640272","640274","640277","640278"];
	if($.inArray(id_product, aluclass_id_product) !== -1){
		$("div[data-id-value='29910']").addClass('disabled_value_by');
		$("img[data-id-value='29910']").addClass('disabled_value_by');
		$("div[data-id-value='26893']").removeClass('disabled_value_by');
		$("img[data-id-value='26893']").removeClass('disabled_value_by');
	}


  var aluclass_id_product = ["13613","640280"];
	if($.inArray(id_product, aluclass_id_product) !== -1){
		$("div[data-id-value='29911']").addClass('disabled_value_by');
		$("img[data-id-value='29911']").addClass('disabled_value_by');
		$("div[data-id-value='16918']").removeClass('disabled_value_by');
		$("img[data-id-value='16918']").removeClass('disabled_value_by');
	}

  //** disable label and field field ndk */
  var aluclass_id_product = ["1123"];
  if($.inArray(id_product, aluclass_id_product) !== -1){
    //Cassete
    $('.dimension_text_height_4569').hide();
    $("#dimension_text_height_4569").addClass("disable-field-ndk");

    $('.dimension_text_height_4571').hide();
    $("#dimension_text_height_4571").addClass("disable-field-ndk");

    $('.dimension_text_height_4572').hide();
    $("#dimension_text_height_4572").addClass("disable-field-ndk");

    //Lisse Texture
    $('.dimension_text_height_4570').hide();
    $("#dimension_text_height_4570").addClass("disable-field-ndk");

    $('.dimension_text_height_4552').hide();
    $("#dimension_text_height_4552").addClass("disable-field-ndk");

    $('.dimension_text_height_4553').hide();
    $("#dimension_text_height_4553").addClass("disable-field-ndk");

    //Nervure Wood Grain
    $('.dimension_text_height_4554').hide();
    $("#dimension_text_height_4554").addClass("disable-field-ndk");

    $('.dimension_text_height_4555').hide();
    $("#dimension_text_height_4555").addClass("disable-field-ndk");

    $('.dimension_text_height_4556').hide();
    $("#dimension_text_height_4556").addClass("disable-field-ndk");

    //Rainure Texture
    $('.dimension_text_height_4557').hide();
    $("#dimension_text_height_4557").addClass("disable-field-ndk");

    $('.dimension_text_height_4558').hide();
    $("#dimension_text_height_4558").addClass("disable-field-ndk");

    $('.dimension_text_height_4559').hide();
    $("#dimension_text_height_4559").addClass("disable-field-ndk");
  }

  //** Show price when changing measures in radioButton */
  $(document).on('click', "#radio_4563_26976, #radio_4563_26977", function () {
    var selectValeu = $(this).val();
    var selectValeuSplit = selectValeu.split(' ');
    //Cassette
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4569').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4569').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4571').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4571').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4572').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4572').trigger('change');

    //Lisse Texture
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4570').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4570').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4552').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4552').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4553').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4553').trigger('change');

    //Nervure Wood Grain
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4554').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4554').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4555').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4555').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4556').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4556').trigger('change');

    //Rainure Texture
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4557').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4557').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4558').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4558').trigger('change');
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4559').val(selectValeuSplit[0]);
    $('.ndkackFieldItem:visible > div > p > #dimension_text_height_4559').trigger('change');
  });


  //** Alexandre - disable label and field field ndk */
  /* var aluclass_id_product = ["1123"];
  if($.inArray(id_product, aluclass_id_product) !== -1){
    //Cassete
    $('.dimension_text_height_4569').hide();
    $("#dimension_text_height_4569").addClass("disable-field-ndk");

    $('.dimension_text_height_4571').hide();
    $("#dimension_text_height_4571").addClass("disable-field-ndk");

    $('.dimension_text_height_4572').hide();
    $("#dimension_text_height_4572").addClass("disable-field-ndk");

    //Lisse Texture
    $('.dimension_text_height_4570').hide();
    $("#dimension_text_height_4570").addClass("disable-field-ndk");

    $('.dimension_text_height_4552').hide();
    $("#dimension_text_height_4552").addClass("disable-field-ndk");

    $('.dimension_text_height_4553').hide();
    $("#dimension_text_height_4553").addClass("disable-field-ndk");

    //Nervure Wood Grain
    $('.dimension_text_height_4554').hide();
    $("#dimension_text_height_4554").addClass("disable-field-ndk");

    $('.dimension_text_height_4555').hide();
    $("#dimension_text_height_4555").addClass("disable-field-ndk");

    $('.dimension_text_height_4556').hide();
    $("#dimension_text_height_4556").addClass("disable-field-ndk");

    //Rainure Texture
    $('.dimension_text_height_4557').hide();
    $("#dimension_text_height_4557").addClass("disable-field-ndk");

    $('.dimension_text_height_4558').hide();
    $("#dimension_text_height_4558").addClass("disable-field-ndk");

    $('.dimension_text_height_4559').hide();
    $("#dimension_text_height_4559").addClass("disable-field-ndk");
  } */


});


/*
-----------------------------------------------------------------------------
*				Porta Sequecionada com porta (controlo de visivilidade)     *
-----------------------------------------------------------------------------

*/


//  Controlo de Campos de Cores para fazer parecer a porta da cor correspondente
$(document).on('click', '.color-ndk', function () {
	var arrayColorPorte = []
	arrayColorPorte = ["3097", "2212", "3509", "3098", "3526", "3527"];
	var arrayFields = [];
	arrayFields = ["2218", "3511", "3512", "3513", "3514", "3515", "3517", "3516", "3518", "3519", "3520", "3525"];
	var dataId = 0
	dataId = $(this).attr('data-group');

	if ($.inArray(dataId, arrayColorPorte) !== -1) {
		campoCor = $("li[data-group='" + dataId + "'].color-ndk.selected-value").data("value");
		if (campoCor.match(/7016/)) {
			HideAllFields(arrayFields, "3516");
		} else if (campoCor.match(/9010/)) {
			HideAllFields(arrayFields, "3519");
		} else if (campoCor.match(/8014/)) {
			HideAllFields(arrayFields, "3517");
		} else if (campoCor.match(/6005/)) {
			HideAllFields(arrayFields, "3513");
		} else if (campoCor.match(/3000/)) {
			HideAllFields(arrayFields, "3511");
		} else if (campoCor.match(/5010/)) {
			HideAllFields(arrayFields, "3512");
		} else if (campoCor.match(/6009/)) {
			HideAllFields(arrayFields, "3514");
		} else if (campoCor.match(/7012/)) {
			HideAllFields(arrayFields, "3515");
		} else if (campoCor.match(/9006/)) {
			HideAllFields(arrayFields, "3518");
		} else if (campoCor.match(/1015/)) {
			HideAllFields(arrayFields, "2218");
		} else if (campoCor.match(/Clair/)) {
			HideAllFields(arrayFields, "3520");
		} else if (campoCor.match(/Sombre/)) {
			HideAllFields(arrayFields, "3525");
		} else {
			HideAllFields(arrayFields, "3516");
		}
	}
});

//  Controlo de Campos de Cores para fazer aparecer a porta da cor correspondente (produto 640281)
$(document).on('click', '.color-ndk', function () {
	var arrayColorPorte = []
	arrayColorPorte = ["5499", "5500", "5501"];
	var arrayFields = [];
	arrayFields = ["5512", "5508", "5509", "5510", "5507", "5505", "5511", "5506"];
	var dataId = 0
	dataId = $(this).attr('data-group');

	if ($.inArray(dataId, arrayColorPorte) !== -1) {
		campoCor = $("li[data-group='" + dataId + "'].color-ndk.selected-value").data("value");
		if (campoCor.match(/7016/)) {
			HideAllFields(arrayFields, "5505");
		} else if (campoCor.match(/9010/)) {
			HideAllFields(arrayFields, "5506");
		} else if (campoCor.match(/8014/)) {
			HideAllFields(arrayFields, "5507");
		} else if (campoCor.match(/6005/)) {
			HideAllFields(arrayFields, "5508");
		} else if (campoCor.match(/6009/)) {
			HideAllFields(arrayFields, "5509");
		} else if (campoCor.match(/7012/)) {
			HideAllFields(arrayFields, "5510");
		} else if (campoCor.match(/9006/)) {
			HideAllFields(arrayFields, "5511");
		} else if (campoCor.match(/1015/)) {
			HideAllFields(arrayFields, "5512");
		} else {
			HideAllFields(arrayFields, "5505");
		}
	}
});

//  Controlos de visivalidades quando se alterar Type de Porte Sectionnelle
$(document).on('click', '.img-value-3502', function () {
	var arrayFields = [];
	arrayFields = ["2218", "3511", "3512", "3513", "3514", "3515", "3517", "3516", "3518", "3519", "3520", "3525"];
	HideAllFields(arrayFields, "3516");
	arrayFields = ["2219", "2753", "2754"];
	HideAllFields(arrayFields, "2219");
	$("img[data-group='3516']").removeClass("selected-value ");
	$("img[data-group='3516']").removeClass("selected-color");
	$("img[data-group='2219']").removeClass("selected-value ");
	$("img[data-group='2219']").removeClass("selected-color");
	$("#visual_3516").remove();
	$("#visual_2219").remove();

});

// Controlo de visibilidade quando se altera Type de Porte Sectionnelle (produto 640281)
$(document).on('click', '.img-value-5498', function () {
	var arrayFields = [];
	arrayFields = ["5512", "5508", "5509", "5510", "5507", "5505", "5511", "5506"];
	HideAllFields(arrayFields, "5505");
	arrayFields = ["5513", "5514", "5515"];
	HideAllFields(arrayFields, "5513");
	$("img[data-group='5505']").removeClass("selected-value ");
	$("img[data-group='5505']").removeClass("selected-color");
	$("img[data-group='5513']").removeClass("selected-value ");
	$("img[data-group='5513']").removeClass("selected-color");
	$("#visual_5505").remove();
	$("#visual_5513").remove();

});

//  Controlo de visiualidade quando se alterar o camp Position du Portillon
$(document).on('click', '.img-value-3516, .img-value-2218 , .img-value-3511 , .img-value-3512 , .img-value-3513 , .img-value-3514 , .img-value-3515 , .img-value-3517 , .img-value-3518, .img-value-3519, .img-value-3520, .img-value-3525', function () {
	var arrayFields = [];
	arrayFields = ["2219", "2753", "2754"];

	textTitle = $(this).attr('data-value');
	console.log(textTitle);
	if (textTitle.match(/gauche/)) {
		HideAllFields(arrayFields, "2219");
	} else if (textTitle.match(/Centr/)) {
		HideAllFields(arrayFields, "2753");
	} else if (textTitle.match(/droite/)) {
		HideAllFields(arrayFields, "2754");
	}

});

// Controlo de visibilidade quando se altera o campo Position du Portillon (produto 640281)
$(document).on('click', '.img-value-5505, .img-value-5512 , .img-value-5508 , .img-value-5509 , .img-value-5510 , .img-value-5507 , .img-value-5511, .img-value-5506', function () {
	var arrayFields = [];
	arrayFields = ["5513", "5514", "5515"];

	textTitle = $(this).attr('data-value');
	console.log(textTitle);
	if (textTitle.match(/gauche/)) {
		HideAllFields(arrayFields, "5513");
	} else if (textTitle.match(/Centr/)) {
		HideAllFields(arrayFields, "5514");
	} else if (textTitle.match(/droite/)) {
		HideAllFields(arrayFields, "5515");
	}

});

//************************************************************************ Fim Porte de garagem secocinado ************************************************




/*
*****************************************************************************
*				Incio das Portas Sequecionada  16-09-2020    Aluclass       *
*****************************************************************************
Autor: Vasco Ribeiro
RemoveMotorPortaSeccionado -> Controla qual o motor incicado para as medicas selecionado (@widthPE = largura da porta,  @heightPE = altura da porta)
LimitadordeQuantidade -> Controla quantos janelas podes levar uma porta comformas as medidas (@widthPE = largura da porta)
*/


function RemoveMotorPortaSeccionado(widthPE, heightPE) {

	updatePriceNdk(0, 2169);
	$("img[data-group='2169']").removeClass("selected-value");
	$("#ndkcsfield_2169").val('');
	if ((typeof widthPE !== 'undefined' ? widthPE : 0) != 0 && (typeof heightPE !== 'undefined' ? heightPE : 0) != 0) {
		Area = (widthPE / 1000) * (heightPE / 1000);
		switch (true) {
			case (Area < 8):
        $("div[data-id-value='16918']").addClass('disabled_value_by');
				$("img[data-id-value='16918']").addClass('disabled_value_by');
				$("div[data-id-value='16919']").addClass('disabled_value_by');
				$("img[data-id-value='16919']").addClass('disabled_value_by');
				$("div[data-id-value='16920']").addClass('disabled_value_by');
				$("img[data-id-value='16920']").addClass('disabled_value_by');
				$("div[data-id-value='17486']").addClass('disabled_value_by');
				$("img[data-id-value='17486']").addClass('disabled_value_by');
				$("div[data-id-value='17487']").addClass('disabled_value_by');
				$("img[data-id-value='17487']").addClass('disabled_value_by');
        $("div[data-id-value='29911']").addClass('disabled_value_by');
        $("img[data-id-value='29911']").addClass('disabled_value_by');
        if(widthPE > 2500 ){
          $("div[data-id-value='29911']").removeClass('disabled_value_by');
          $("img[data-id-value='29911']").removeClass('disabled_value_by');
        }else{
          $("div[data-id-value='16918']").removeClass('disabled_value_by');
          $("img[data-id-value='16918']").removeClass('disabled_value_by');
        }
				break;
			case (Area < 11):
				$("div[data-id-value='16918']").addClass('disabled_value_by');
				$("img[data-id-value='16918']").addClass('disabled_value_by');
				$("div[data-id-value='16919']").addClass('disabled_value_by');
				$("img[data-id-value='16919']").addClass('disabled_value_by');
				$("div[data-id-value='16920']").addClass('disabled_value_by');
				$("img[data-id-value='16920']").addClass('disabled_value_by');
				$("div[data-id-value='17486']").removeClass('disabled_value_by');
				$("img[data-id-value='17486']").removeClass('disabled_value_by');
				$("div[data-id-value='17487']").addClass('disabled_value_by');
				$("img[data-id-value='17487']").addClass('disabled_value_by');
        $("div[data-id-value='29911']").addClass('disabled_value_by');
        $("img[data-id-value='29911']").addClass('disabled_value_by');
				break;
			case (Area < 13):
				$("div[data-id-value='16918']").addClass('disabled_value_by');
				$("img[data-id-value='16918']").addClass('disabled_value_by');
				$("div[data-id-value='16919']").removeClass('disabled_value_by');
				$("img[data-id-value='16919']").removeClass('disabled_value_by');
				$("div[data-id-value='16920']").addClass('disabled_value_by');
				$("img[data-id-value='16920']").addClass('disabled_value_by');
				$("div[data-id-value='17486']").addClass('disabled_value_by');
				$("img[data-id-value='17486']").addClass('disabled_value_by');
				$("div[data-id-value='17487']").addClass('disabled_value_by');
				$("img[data-id-value='17487']").addClass('disabled_value_by');
        $("div[data-id-value='29911']").addClass('disabled_value_by');
        $("img[data-id-value='29911']").addClass('disabled_value_by');
				break;
			case (Area < 16):
				$("div[data-id-value='16918']").addClass('disabled_value_by');
				$("img[data-id-value='16918']").addClass('disabled_value_by');
				$("div[data-id-value='16919']").addClass('disabled_value_by');
				$("img[data-id-value='16919']").addClass('disabled_value_by');
				$("div[data-id-value='16920']").addClass('disabled_value_by');
				$("img[data-id-value='16920']").addClass('disabled_value_by');
				$("div[data-id-value='17486']").addClass('disabled_value_by');
				$("img[data-id-value='17486']").addClass('disabled_value_by');
				$("div[data-id-value='17487']").removeClass('disabled_value_by');
				$("img[data-id-value='17487']").removeClass('disabled_value_by');
        $("div[data-id-value='29911']").addClass('disabled_value_by');
        $("img[data-id-value='29911']").addClass('disabled_value_by');
				break;
			case (Area < 156):
				$("div[data-id-value='16918']").addClass('disabled_value_by');
				$("img[data-id-value='16918']").addClass('disabled_value_by');
				$("div[data-id-value='16919']").addClass('disabled_value_by');
				$("img[data-id-value='16919']").addClass('disabled_value_by');
				$("div[data-id-value='16920']").removeClass('disabled_value_by');
				$("img[data-id-value='16920']").removeClass('disabled_value_by');
				$("div[data-id-value='17486']").addClass('disabled_value_by');
				$("img[data-id-value='17486']").addClass('disabled_value_by');
				$("div[data-id-value='17487']").addClass('disabled_value_by');
				$("img[data-id-value='17487']").addClass('disabled_value_by');
        $("div[data-id-value='29911']").addClass('disabled_value_by');
        $("img[data-id-value='29911']").addClass('disabled_value_by');
				break;
			default:
				$("div[data-id-value='16918']").addClass('disabled_value_by');
				$("img[data-id-value='16918']").addClass('disabled_value_by');
				$("div[data-id-value='16919']").addClass('disabled_value_by');
				$("img[data-id-value='16919']").addClass('disabled_value_by');
				$("div[data-id-value='16920']").addClass('disabled_value_by');
				$("img[data-id-value='16920']").addClass('disabled_value_by');
				$("div[data-id-value='17486']").addClass('disabled_value_by');
				$("img[data-id-value='17486']").addClass('disabled_value_by');
				$("div[data-id-value='17487']").addClass('disabled_value_by');
				$("img[data-id-value='17487']").addClass('disabled_value_by');
        $("div[data-id-value='29911']").addClass('disabled_value_by');
        $("img[data-id-value='29911']").addClass('disabled_value_by');
				break;
		}
	} else {

		$("div[data-id-value='16918']").addClass('disabled_value_by');
		$("img[data-id-value='16918']").addClass('disabled_value_by');
		$("div[data-id-value='16919']").addClass('disabled_value_by');
		$("img[data-id-value='16919']").addClass('disabled_value_by');
		$("div[data-id-value='16920']").addClass('disabled_value_by');
		$("img[data-id-value='16920']").addClass('disabled_value_by');
		$("div[data-id-value='17486']").addClass('disabled_value_by');
		$("img[data-id-value='17486']").addClass('disabled_value_by');
		$("div[data-id-value='17487']").addClass('disabled_value_by');
		$("img[data-id-value='17487']").addClass('disabled_value_by');
	}

}

function LimitadordeQuantidade(widthPE) {
	if ((typeof widthPE !== 'undefined' ? widthPE : 0) != 0) {
		var quantHublot = Math.floor(widthPE / 800);
		$("#ndk-accessory-quantity-16915").attr({
			"max": quantHublot,
			"min": 0,
			"data-qtty-max": quantHublot
		});
		var quantHublotValue = $("#ndk-accessory-quantity-16915").val();
		if (quantHublotValue > quantHublot) {
			$("#ndk-accessory-quantity-16915").val(quantHublot);
			$('#ndk-accessory-quantity-16915').trigger('change');
		}
	}
}

$(document).on('click', ".img-value-2169[data-id-value='16917'], .img-value-2169[data-id-value='26899'], .img-value-2169[data-id-value='24463'],.img-value-4542[data-id-value='26892'], .img-value-4542[data-id-value='26900'], .img-value-4542[data-id-value='26898']", function () {

  $("li[data-id-value='" + 30508 + "']").hide();
  $("li[data-id-value='" + 30507 + "']").show();

  if ($("li[data-id-value='" + 30508 + "']").hasClass('selected-accessory') ) {
    $("#img_div_30507").trigger("click");
  }
});

// troca de service de pose quando escolhe o motor.

$(document).on('click', ".img-value-2169[data-id-value='16918'], .img-value-2169[data-id-value='16919'], .img-value-2169[data-id-value='16920'], .img-value-2169[data-id-value='17486'], .img-value-2169[data-id-value='17487'], .img-value-2169[data-id-value='29911'], .img-value-4542[data-id-value='26893'], .img-value-4542[data-id-value='26894'], .img-value-4542[data-id-value='26895'], .img-value-4542[data-id-value='26896'], .img-value-4542[data-id-value='26897'], .img-value-4542[data-id-value='29910']", function () {

  $("li[data-id-value='" + 30507 + "']").hide();
  $("li[data-id-value='" + 30508 + "']").show();

  if ($("li[data-id-value='" + 30507 + "']").hasClass('selected-accessory') ) {
    $("#img_div_30508").trigger("click");
  }

});

$(document).on('click', "#radio_5150_29198, #radio_5150_29199, #radio_5150_29200, #radio_5150_29201, #radio_5495_30677, #radio_5495_30678, #radio_5495_30679, #radio_5495_30680", function () {
	groupidvalue = $(this).attr('data-id-value');

	updatePriceNdk(0, 4542);
	$("img[data-group='4542']").removeClass("selected-value");
	$("#ndkcsfield_4542").val('');

	var aluclass_groupidvalue = ["29198","29199","30677","30678"];
	if ($.inArray(groupidvalue, aluclass_groupidvalue) !== -1) {
		$("div[data-id-value='29911']").addClass('disabled_value_by');
		$("img[data-id-value='29911']").addClass('disabled_value_by');
		$("div[data-id-value='16918']").removeClass('disabled_value_by');
		$("img[data-id-value='16918']").removeClass('disabled_value_by');
	}else{
		$("div[data-id-value='29911']").removeClass('disabled_value_by');
		$("img[data-id-value='29911']").removeClass('disabled_value_by');
		$("div[data-id-value='16918']").addClass('disabled_value_by');
		$("img[data-id-value='16918']").addClass('disabled_value_by');
	}

});

$(document).on('click', " #radio_4544_26905, #radio_4544_26906, #radio_4544_26907, #radio_4544_26908, #radio_4543_26901, #radio_4543_26902, #radio_4543_26903, #radio_4543_26904, #radio_4545_26909, #radio_4545_26910, #radio_4545_26911, #radio_4545_26912, #radio_5484_30605, #radio_5484_30606, #radio_5484_30607, #radio_5484_30608, #radio_5487_30624, #radio_5487_30625, #radio_5487_30626, #radio_5487_30627, #radio_5492_30658, #radio_5492_30659, #radio_5492_30660, #radio_5492_30661, #radio_5495_30677, #radio_5495_30678, #radio_5495_30679, #radio_5495_30680", function () {
	groupidvalue = $(this).attr('data-id-value');

	updatePriceNdk(0, 4542);
	$("img[data-group='4542']").removeClass("selected-value");
	$("#ndkcsfield_4542").val('');

	var aluclass_groupidvalue = ["26901","26902","26909","26910","26905","26906","30605","30606","30624","30625","30658","30659","30677","30678"];
	if ($.inArray(groupidvalue, aluclass_groupidvalue) !== -1) {
		$("div[data-id-value='29910']").addClass('disabled_value_by');
		$("img[data-id-value='29910']").addClass('disabled_value_by');
		$("div[data-id-value='26893']").removeClass('disabled_value_by');
		$("img[data-id-value='26893']").removeClass('disabled_value_by');
	}else{
		$("div[data-id-value='29910']").removeClass('disabled_value_by');
		$("img[data-id-value='29910']").removeClass('disabled_value_by');
		$("div[data-id-value='26893']").addClass('disabled_value_by');
		$("img[data-id-value='26893']").addClass('disabled_value_by');
	}

});

$(document).on('focusout', '#dimension_text_width_2226, #dimension_text_height_2226,#dimension_text_width_3643, #dimension_text_height_3643,#dimension_text_width_3642, #dimension_text_height_3642,#dimension_text_width_3641, #dimension_text_height_3641,#dimension_text_width_3640, #dimension_text_height_3640,#dimension_text_width_3639, #dimension_text_height_3639,#dimension_text_width_3638, #dimension_text_height_3638,#dimension_text_width_3637, #dimension_text_height_3637,#dimension_text_width_3636, #dimension_text_height_3636,#dimension_text_width_3635, #dimension_text_height_3635,#dimension_text_width_3634, #dimension_text_height_3634,#dimension_text_width_3633, #dimension_text_height_3633,#dimension_text_width_3626, #dimension_text_height_3626,#dimension_text_width_3625, #dimension_text_height_3625,#dimension_text_width_3624, #dimension_text_height_3624,#dimension_text_width_3629, #dimension_text_height_3629,#dimension_text_width_3628, #dimension_text_height_3628,#dimension_text_width_3627, #dimension_text_height_3627,#dimension_text_width_3632, #dimension_text_height_3632,#dimension_text_width_3631, #dimension_text_height_3631,#dimension_text_width_3630, #dimension_text_height_3630,#dimension_text_width_3623, #dimension_text_height_3623,#dimension_text_width_3622, #dimension_text_height_3622,#dimension_text_width_3531, #dimension_text_height_3531,#dimension_text_width_3530, #dimension_text_height_3530,#dimension_text_width_3523, #dimension_text_height_3523,#dimension_text_width_3522, #dimension_text_height_3522,#dimension_text_width_3521, #dimension_text_height_3521, #dimension_text_width_2221, #dimension_text_height_2221, #dimension_text_width_2232, #dimension_text_height_2232,#dimension_text_width_2230, #dimension_text_height_2230, #dimension_text_width_2228, #dimension_text_height_2228, #dimension_text_width_2224, #dimension_text_height_2224, #dimension_text_width_2213, #dimension_text_height_2213, #dimension_text_width_2174, #dimension_text_height_2174, #dimension_text_width_2166, #dimension_text_height_2166, #dimension_text_width_5486, #dimension_text_height_5486, #dimension_text_width_5489, #dimension_text_height_5489, #dimension_text_width_5491, #dimension_text_height_5491, #dimension_text_width_5494, #dimension_text_height_5494, #dimension_text_width_5502, #dimension_text_height_5502, #dimension_text_width_5503, #dimension_text_height_5503, #dimension_text_width_5504, #dimension_text_height_5504', function () {
	groupvalue = $(this).attr('data-group');
	widthPE = $('#dimension_text_width_' + groupvalue).val();
	heightPE = $('#dimension_text_height_' + groupvalue).val();
	RemoveMotorPortaSeccionado(widthPE, heightPE);
	LimitadordeQuantidade(widthPE);
});
