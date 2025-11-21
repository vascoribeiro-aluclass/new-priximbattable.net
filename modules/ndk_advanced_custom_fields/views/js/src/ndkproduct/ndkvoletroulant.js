$(window).on("load", function () {

  var aluclass_id_product = ["4088", "4170", "640270"];

  if ($.inArray(id_product, aluclass_id_product) !== -1) {

    //Joana -- Oculta campo Tipo de laminas
    var aluclass_remove_preview = [];
    aluclass_remove_preview[1] = [5305];
    aluclass_remove_preview[1].forEach(function (num) {
      $(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
    });

    //Joana -- Remove preview campo Type de pose
    var aluclass_remove_preview = [];
    aluclass_remove_preview[0] = [2759, 5468];
    aluclass_remove_preview[0].forEach(function (num) {
      $('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
    });
  }

});


/*
*********************************************************
Volet Roulant
Vasco 24/11/2020 - Calculo para escolher tipo de laminas.
*********************************************************
*/

//Volet Roulant PAN COUPÉ [id_prod = 4088]
$(document).on('change', '#dimension_text_width_2760, #dimension_text_height_2760, #dimension_text_width_3941, #dimension_text_height_3941', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

    //Laminas 50 mm
	if (heightPE > 2450 || widthPE > 3000) {
		$('#voletdesc_' + groupvalue).html("Dans ces mesures, les lames sont de 50 mm");
    $("#text_5305").val("Lame 50 mm");
    $("#text_5305").attr("value", "Lame 50 mm");
    $("#ndkcsfield_5305").html("Lame 50 mm");

  //Laminas 43 mm
	} else {
		$('#voletdesc_' + groupvalue).html("Dans ces mesures, les lames sont de 43 mm");
    $("#text_5305").val("Lame 43 mm");
    $("#text_5305").attr("value", "Lame 43 mm");
    $("#ndkcsfield_5305").html("Lame 43 mm");
	}
});


//Volet Roulant Tradi pour Coffre Tunnel [id_prod = 4170]
$(document).on('change', '#dimension_text_width_2836, #dimension_text_height_2836, #dimension_text_width_3943, #dimension_text_height_3943', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

  //Laminas 50 mm
	if (heightPE > 2450 || widthPE > 3000) {
		$('#voletdesc_' + groupvalue).html("Dans ces mesures, les lames sont de 50 mm");
    $("#text_5305").val("Lame 50 mm");
    $("#text_5305").attr("value", "Lame 50 mm");
    $("#ndkcsfield_5305").html("Lame 50 mm");

  //Laminas 43 mm
	} else {
		$('#voletdesc_' + groupvalue).html("Dans ces mesures, les lames sont de 43 mm");
    $("#text_5305").val("Lame 43 mm");
    $("#text_5305").attr("value", "Lame 43 mm");
    $("#ndkcsfield_5305").html("Lame 43 mm");
	}
});

//Volet Roulant Solaire [id_prod = 640270]
$(document).on('change', '#dimension_text_width_5470, #dimension_text_height_5470', function () {

  var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

	//Laminas 50 mm
  if (heightPE > 2450 || widthPE > 3000) {
		$('#voletdesc_' + groupvalue).html("Dans ces mesures, les lames sont de 50 mm.");
    $("#text_5305").val("Lame 50 mm");
    $("#text_5305").attr("value", "Lame 50 mm");
    $("#ndkcsfield_5305").html("Lame 50 mm");

  //Laminas 43 mm
	} else {
		$('#voletdesc_' + groupvalue).html("Dans ces mesures, les lames sont de 43 mm.");
    $("#text_5305").val("Lame 43 mm");
    $("#text_5305").attr("value", "Lame 43 mm");
    $("#ndkcsfield_5305").html("Lame 43 mm");
	}
});


/*
*********************************************************
Volet Roulant PAN COUPÉ e Tradi pour Coffre Tunnel
Vasco 24/11/2020 - Calculo para escolher motor Somfy.
Quando area for maior que 4 m^2 aplica o motor Somfy IO 10/12 em vez do Somfy IO 6/12 e se for maior que 6 m^2 aplica o Orea.
*********************************************************
*/

$(document).on('change', "#dimension_text_width_3943, #dimension_text_height_3943, #dimension_text_width_2836, #dimension_text_height_2836, #dimension_text_width_2760, #dimension_text_height_2760,#dimension_text_width_3941, #dimension_text_height_3941", function () {

	var groupvalue = $(this).attr('data-group');
	var area = 0;
	var widthPE = $('#dimension_text_width_'+groupvalue).val();
	var heightPE = $('#dimension_text_height_'+groupvalue).val();
  //var motorStandard = $(".accessory-ndk[data-id-value='30073']").hasClass("selected-accessory"); //Motor Standard

	if (typeof widthPE !== 'undefined' && typeof heightPE !== 'undefined') {
	  var area = (widthPE/1000)*(heightPE/1000);

    /*
    //Area maior que 6 m^2
	  if (parseFloat(area) > 6) {
      $(".accessory-ndk[data-id-value='25289']").addClass('disabled_value_by'); //RTS 1
      $(".selected-accessory[data-id-value='25289'] > #img_div_25289").trigger('mousedown'); //RTS 1
      $(".accessory-ndk[data-id-value='25290']").addClass('disabled_value_by'); //RTS 2
      $(".selected-accessory[data-id-value='25290'] > #img_div_25290").trigger('mousedown'); //RTS 2
      $(".accessory-ndk[data-id-value='25293']").removeClass('disabled_value_by'); //RTS 3

    //Area maior que 4 m^2
	  } else if (parseFloat(area) > 4) {
      $(".accessory-ndk[data-id-value='25289']").addClass('disabled_value_by'); //RTS 1
      $(".selected-accessory[data-id-value='25289'] > #img_div_25289").trigger('mousedown'); //RTS 1
      $(".accessory-ndk[data-id-value='25293']").addClass('disabled_value_by'); //RTS 3
      $(".selected-accessory[data-id-value='25293'] > #img_div_25293").trigger('mousedown'); //RTS 3
      $(".accessory-ndk[data-id-value='25290']").removeClass('disabled_value_by'); //RTS 2

	  } else {
      $(".accessory-ndk[data-id-value='25293']").addClass('disabled_value_by'); //RTS 3
      $(".selected-accessory[data-id-value='25293'] > #img_div_25293").trigger('mousedown'); //RTS 3
      $(".accessory-ndk[data-id-value='25290']").addClass('disabled_value_by'); //RTS 2
      $(".selected-accessory[data-id-value='25290'] > #img_div_25290").trigger('mousedown'); //RTS 2
      $(".accessory-ndk[data-id-value='25289']").removeClass('disabled_value_by'); //RTS 1
	  }
    */

    //Area maior que 4 m^2 - Motor IO 10/12
    if (parseFloat(area) > 4) {
      $("div[data-id-value='29967']").addClass('disabled_value_by'); //Remove Somfy IO 6/12
      $(".selected-value[data-id-value='29967']").trigger('mousedown'); //Remove IO 6/12
      $("div[data-id-value='29968']").removeClass('disabled_value_by'); //Adiciona Somfy IO 10/12

    //Area menor ou igual a 4 m^2 - Motor IO 6/12
    } else {
      $("div[data-id-value='29968']").addClass('disabled_value_by'); //Remove Somfy IO 10/12
      $(".selected-value[data-id-value='29968']").trigger('mousedown'); //Remove IO 10/12
      $("div[data-id-value='29967']").removeClass('disabled_value_by'); //Adiciona Somfy IO 6/12
   }
	}

  //Motor Standard pré-selecionado
  $("img[data-id-value='30073']").addClass('selected-value').trigger('click');
  $("div[data-field='2762']").removeClass('aluclass-disable-div');

  /*
  //Apresenta apenas os comandos para o motor Standard (NFI)
  if (motorStandard == true) {
    //$(".accessory-ndk[data-id-value='21191']").hide(); //Comando TELIS 1 RTS
    $(".accessory-ndk[data-id-value='30074']").hide(); //Comando Situo 1 IO Pure
    $(".accessory-ndk[data-id-value='20689']").show(); //Comando Volet
    $(".accessory-ndk[data-id-value='20690']").show(); //Comando Horloge
  }
  else {
    //Motor standard escolhido inicialmente
    $(".accessory-ndk[data-id-value='30073']").addClass('selected-accessory');
    $("#img_div_30073").trigger('mousedown');
  }
  */

});

/*
//Joana -- Apenas se pode escolher um motor: 3007 (Standard), 29967 (IO 6/12), 29968 (IO 10/12)
$(document).on("click", "li.accessory-ndk[data-group='3942'] > .accessory_img_block", function() {

  var motorEscolhidoArray = $(this).attr("id").split('_');
  const motorEscolhido = motorEscolhidoArray[2];
  var comandoSomfy = $(".accessory-ndk[data-id-value='30074']"); //Comando Situo 1 IO Pure
  var comandoVolet = $(".accessory-ndk[data-id-value='20689']"); //Comando Volet
  var comandoHorloge = $(".accessory-ndk[data-id-value='20690']"); //Comando Horloge

  $("li.accessory-ndk[data-group='3942'").each(function() {

    if(parseInt($(this).attr("data-id-value")) != parseInt(motorEscolhido)) {
      RemoveAllOrtherSelectOptions($(this).attr("data-id-value"), 3942);
    }

    //Se motor escolhido for o Standard, oculta o comando Somfy
    if (motorEscolhido == 30073) {
      comandoSomfy.hide(); //Esconde comando Situo 1 IO Pure
      comandoVolet.show(); //Mostra comando Volet
      comandoHorloge.show(); //Mostra comando Horloge

      $("#ndk-accessory-quantity-30074").val(0);
      var simulateClick = $(document).find('#ndk-accessory-quantity-30074').parent().find(".quantity-ndk-minus");
      simulateClick.trigger("click");

    //Se o motor escolhido for o Somfy, oculta os comandos standard
    } else {
      comandoSomfy.show(); //Mostra comando Situo 1 IO Pure
      comandoVolet.hide(); //Esconde comando Volet
      comandoHorloge.hide(); //Esconde comando Horloge

      $("#ndk-accessory-quantity-20689").val(0);
      var simulateClick = $(document).find('#ndk-accessory-quantity-20689').parent().find(".quantity-ndk-minus");
      simulateClick.trigger("click");
      $("#ndk-accessory-quantity-20690").val(0);
      var simulateClick2 = $(document).find('#ndk-accessory-quantity-20690').parent().find(".quantity-ndk-minus");
      simulateClick2.trigger("click");
    }

  });

  // var accessoryArray = [
	// 	[30073, 29967],
	// 	[30073, 29968],
	// 	[29967, 30073],
	// 	[29968, 30073],
	// ]

  // for (i = 0; i < accessoryArray.length; i++) {
  //     if (accessoryArray[i][0] == this.attr('data-id-value')) {

  //       RemoveSelectOptions(accessoryArray[i][1], this.attr('data-group'));
  //     }
	// }

});
*/


/* ------------------ *
 *  Miguel - Comandos *
 * ------------------ */

/*
//Retirar opção comando do motor Somfy caso o motor Somfy nao tenha sido escolhido no NDK anterior aos comandos
$(document).on("change", "#dimension_text_width_3941, #dimension_text_height_3941, #dimension_text_width_2760, #dimension_text_height_2760, #dimension_text_width_2836, #dimension_text_height_2836,#dimension_text_width_3943, #dimension_text_height_3943", function () {

  //var somfyChange3 = $(".accessory-ndk[data-id-value='25293']").hasClass("selected-accessory"); //Motor Somfy RTS3
  var somfyChange3 = $(".accessory-ndk[data-id-value='29968']").hasClass("selected-accessory"); //Motor Somfy IO 10/12
  console.log(somfyChange3);

  if(somfyChange3 == false) {
    //$(".accessory-ndk[data-id-value='21191']").hide(); //Comando TELIS 1 RTS
    $(".accessory-ndk[data-id-value='30074']").hide(); //Comando Situo 1 IO Pure
    $(".accessory-ndk[data-id-value='20689']").show(); //Comando Volet
    $(".accessory-ndk[data-id-value='20690']").show(); //Comando Horloge
  }
});
*/

/*
//Motor Somfy Radio RTS 1
$(".accessory-ndk[data-id-value='25289']").on("click", function () {
  var somfy = $(".accessory-ndk[data-id-value='25289']").hasClass("selected-accessory");
*/

/*
//Motor Somfy Altus RS IO 6/12
$(".accessory-ndk[data-id-value='29967']").on("click", function () {
  var somfy = $(".accessory-ndk[data-id-value='29967']").hasClass("selected-accessory");
  //var comandoSomfy = $(".accessory-ndk[data-id-value='21191']"); //Comando TELIS 1 RTS
  var comandoSomfy = $(".accessory-ndk[data-id-value='30074']"); //Comando Situo 1 IO Pure
  var comandoNFI1 = $(".accessory-ndk[data-id-value='20689']"); //Comando Volet
  var comandoNFI2 = $(".accessory-ndk[data-id-value='20690']"); //Comando Horloge
  console.log(somfy);

  if (somfy == false) {
    comandoSomfy.hide();
    $(".ndk-accessory-quantity").val(0);
    $('.quantity-ndk-minus').trigger('click');
    comandoNFI1.show();
    comandoNFI2.show();
  } else {
    comandoSomfy.show();
    comandoNFI1.hide();
    comandoNFI2.hide();
  }
});
*/

/*
//Motor Somfy Radio RTS 2
$(".accessory-ndk[data-id-value='25290']").on("click", function () {
  var somfy2 = $(".accessory-ndk[data-id-value='25290']").hasClass("selected-accessory");
*/

/*
//Motor Standard
$(".accessory-ndk[data-id-value='30073']").on("click", function () {
  var somfy2 = $(".accessory-ndk[data-id-value='30073']").hasClass("selected-accessory");
  //var comandoSomfy2 = $(".accessory-ndk[data-id-value='21191']"); //Comando TELIS 1 RTS
  var comandoSomfy2 = $(".accessory-ndk[data-id-value='30074']"); //Comando Situo 1 IO Pure
  var comandoNFI1_2 = $(".accessory-ndk[data-id-value='20689']"); //Comando Volet
  var comandoNFI2_2 = $(".accessory-ndk[data-id-value='20690']"); //Comando Horloge
  console.log(somfy2);

  if (somfy2 == true) {
    comandoSomfy2.hide();
    $(".ndk-accessory-quantity").val(0);
    $('.quantity-ndk-minus').trigger('click');
    comandoNFI1_2.show();
    comandoNFI2_2.show();
  } else {
    comandoSomfy2.show();
    comandoNFI1_2.hide();
    comandoNFI2_2.hide();
  }
});
*/

/*
//Motor Somfy Radio RTS 3
$(".accessory-ndk[data-id-value='25293']").on("click", function(){
  var somfy3 = $(".accessory-ndk[data-id-value='25293']").hasClass("selected-accessory");
*/

/*
//Motor Somfy IO 10/12
$(".accessory-ndk[data-id-value='29968']").on("click", function () {
  var somfy3 = $(".accessory-ndk[data-id-value='29968']").hasClass("selected-accessory");
  //var comandoSomfy3 = $(".accessory-ndk[data-id-value='21191']"); //Comando TELIS 1 RTS
  var comandoSomfy3 = $(".accessory-ndk[data-id-value='30074']"); //Comando Situo 1 IO Pure
  var comandoNFI1_3 = $(".accessory-ndk[data-id-value='20689']"); //Comando Volet
  var comandoNFI2_3 = $(".accessory-ndk[data-id-value='20690']"); //Comando Horloge
  console.log(somfy3);

  if (somfy3 == false) {
    comandoSomfy3.hide();
    $(".ndk-accessory-quantity").val(0);
    $('.quantity-ndk-minus').trigger('click');
    comandoNFI1_3.show();
    comandoNFI2_3.show();
  } else {
    comandoSomfy3.show();
    $("#ndk-accessory-quantity-20689").val(0);
    var simulateClick = $(document).find('#ndk-accessory-quantity-20689').parent().find(".quantity-ndk-minus");
    simulateClick.trigger("click");
    $("#ndk-accessory-quantity-20690").val(0);
    var simulateClick2 = $(document).find('#ndk-accessory-quantity-20690').parent().find(".quantity-ndk-minus");
    simulateClick2.trigger("click");
    comandoNFI1_3.hide();
    comandoNFI2_3.hide();
  }

});
*/

//Volet Roulant Solaire [id_prod = 640270]
$(document).on('change', "#dimension_text_width_5470, #dimension_text_height_5470", function () {

  //Motor Nice pré-selecionado
  $("img[data-id-value='30581']").addClass('selected-value').trigger('click');
  $("div[data-field='2762']").removeClass('aluclass-disable-div');

});

/* ------------------------------------------------------- *
 * Joana - Alterar imagens cores cosoante tipo de montagem *
 * ------------------------------------------------------- */

//Volet Roulant Renovation [id_prod = 4088]
$(".img-value-2759").click(function () {
	campoCor = $("li[data-group='2761'].color-ndk.selected-value").data("value");
	tipoMontagem = $(this).attr("data-id-value");
	if ("undefined" != typeof campoCor) {
		RemoverCustomizedSpecificImagemNDK(2761);
		CustomizedImagemNDK(2761, tipoMontagem, "volet/renovation", 2, "png");
	}
});

$(".color-ndk[data-group='2761']").click(function () {
	campoCor = $(this).data("value");
	tipoMontagem = $(".img-value-2759.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(2761);
	CustomizedImagemNDKColor(campoCor, 2761, tipoMontagem, "volet/renovation", 2, "png");
});

//Volet Roulant Solaire [id_prod = 640270]
$(".img-value-5468").click(function () {
	campoCor = $("li[data-group='5469'].color-ndk.selected-value").data("value");
	tipoMontagem = $(this).attr("data-id-value");
	if ("undefined" != typeof campoCor) {
		RemoverCustomizedSpecificImagemNDK(5469);
		CustomizedImagemNDK(5469, tipoMontagem, "volet/solaire", 2, "png");
	}
});

$(".color-ndk[data-group='5469']").click(function () {
	campoCor = $(this).data("value");
	tipoMontagem = $(".img-value-5468.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(5469);
	CustomizedImagemNDKColor(campoCor, 5469, tipoMontagem, "volet/solaire", 2, "png");
});




$(document).on('focusout', ".dimension_text_5205", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var croisillons = $(".img-value-5206");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5206.selected-value").trigger('click');

});

$(document).on('click', ".img-value-5206", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});
