var quantstorepose = 0;
var quantvitrepose = 0;
var quantaccordpose = 0;

$(window).on("load", function () {

  $('#ndk-accessory-quantity-30577').val(0);

  // Pergola Bioclimatique Aluminium GRANDLUX Adossée Standard Blanche ou Grise

 $('#ndk-accessory-quantity-22143').val(0);
 $('#ndk-accessory-quantity-22144').val(0);
 $('#ndk-accessory-quantity-22145').val(0);
 $('#ndk-accessory-quantity-22146').val(0);
 $('#ndk-accessory-quantity-22147').val(0);
 $('#ndk-accessory-quantity-22148').val(0);
 $('#ndk-accessory-quantity-22288').val(0);
 $('#ndk-accessory-quantity-22289').val(0);
 $('#ndk-accessory-quantity-22290').val(0);
 $('#ndk-accessory-quantity-22129').val(0);


$('#ndk-accessory-quantity-22114').val(0);
$('#ndk-accessory-quantity-22115').val(0);
$('#ndk-accessory-quantity-22116').val(0);
$('#ndk-accessory-quantity-22117').val(0);
$('#ndk-accessory-quantity-22118').val(0);
$('#ndk-accessory-quantity-22119').val(0);
$('#ndk-accessory-quantity-22120').val(0);
$('#ndk-accessory-quantity-22121').val(0);

$('#ndk-accessory-quantity-22296').val(0);
$('#ndk-accessory-quantity-22297').val(0);
$('#ndk-accessory-quantity-22298').val(0);

$("div[data-field='5473']").hide();

  $('#dimension_text_width_4575').attr('placeholder', 'hauteur');
	$("#dimension_text_height_4575").css("display", "none");

	$('#dimension_text_height_2412').attr('placeholder', 'profondeur');
	$('#dimension_text_height_4201').attr('placeholder', 'profondeur');
	$('#dimension_text_height_4202').attr('placeholder', 'profondeur');

  $(".ndkackFieldItem[data-field='3065']").css("display", "none");

  	//** remover o campo pergola classique SUR MERSURE*/
	var aluclass_id_product = ["1150"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];

		aluclass_remove_preview[1] = [4439];
		aluclass_remove_preview[1].forEach(function (num) {
			$(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
		});
	}

  // Enable/Disable campo Dimensions(NDK) quando Largeur(<=5999and>=6000)
$(document).on('focusout', '#dimension_text_width_2412,#dimension_text_width_4201,#dimension_text_width_4202', function () {
	groupvalue = $(this).attr('data-group');
	heightPE = $('#dimension_text_width_' + groupvalue).val();
	if (parseInt(heightPE) < 5999) {
		$("li[data-id-value='19001']").removeClass('disabled_value_by');
		$("li[data-id-value='20644']").addClass('disabled_value_by');
		$("#ndk-accessory-quantity-19001").val(0);
		$('#ndk-accessory-quantity-19001').trigger('change');
		// Blanc
		$("li[data-id-value='20650']").removeClass('disabled_value_by');
		$("li[data-id-value='20653']").addClass('disabled_value_by');
		$("#ndk-accessory-quantity-20650").val(0);
		$('#ndk-accessory-quantity-20650').trigger('change');
	} else {
		$("li[data-id-value='20644']").removeClass('disabled_value_by');
		$("li[data-id-value='19001']").addClass('disabled_value_by');
		$("#ndk-accessory-quantity-20644").val(0);
		$('#ndk-accessory-quantity-20644').trigger('change');
		// Blanc
		$("li[data-id-value='20653']").removeClass('disabled_value_by');
		$("li[data-id-value='20650']").addClass('disabled_value_by');
		$("#ndk-accessory-quantity-20653").val(0);
		$('#ndk-accessory-quantity-20653').trigger('change');
	}
});



});

/// Pergola aluminium TOP PRIX
$("input[name='ndkcsfield[2424]']").click(function () {

	//$("input[name='ndkcsfield[2407]']").prop('checked', false);
	var id_value = $("input[name='ndkcsfield[2424]']:checked").data('id-value');
	switch (id_value) {
		case 19046: // 3000mm x 3000mm
      PriceStoreFreTras = 1080;
      PriceCorrerFreTras = 2022;
      break;
    case 19047:// 4000mm x 3000mm
      PriceStoreFreTras = 1218;
      PriceCorrerFreTras = 2274;

      break;
    case 19048: // 6000mm x 3000mm
      PriceStoreFreTras = 1496;
      PriceCorrerFreTras = 2764;
      break;
    default:
      PriceStoreFreTras = 1028;
      PriceCorrerFreTras = 1925;
	}

	//store
  var pricedesc = PriceStoreFreTras-(PriceStoreFreTras*valorReducao);
	$('#price_22129').html('<i> + <s>'+PriceStoreFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22129').attr('data-price', PriceStoreFreTras);

	//Vertical
  var pricedesc = PriceCorrerFreTras-(PriceCorrerFreTras*valorReducao);
	$('#price_22130').html('<i> + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22130').attr('data-price', PriceCorrerFreTras);
});

$(".color-ndk[data-group='2425']").click(function () {
	$('.product_3106_0.accessory-ndk.selected-accessory img').trigger('mousedown');
	RemoveField(3105);
});


$(".color-ndk[data-group='2409']").click(function () {
  $('.product_3103_0.accessory-ndk.selected-accessory img').trigger('mousedown');
  RemoveField(3104);
});

/// Pergola aluminium stantard
$("input[name='ndkcsfield[2407]']").click(function () {

  $('.product_3103_0.accessory-ndk.selected-accessory img').trigger('mousedown');
  RemoveField(3104);

	//$("input[name='ndkcsfield[2407]']").prop('checked', false);
	var id_value = $("input[name='ndkcsfield[2407]']:checked").data('id-value');
	switch (id_value) {
		case 18979: // 3000mm x 3000mm
			PriceStoreDirEsq = 1921;
			PriceStoreFreTras = 1080;
			PriceCorrerDirEsq = 3604;
			PriceCorrerFreTras = 2700;
			PriceTrapezeDirEsq = 800;
			PriceOcardianDirEsq = 5787;
			PriceOcardianFreTras = 4987;
			break;
		case 18980:// 4000mm x 3000mm
			PriceStoreDirEsq = 1921;
			PriceStoreFreTras = 1266;
			PriceCorrerDirEsq = 3604;
			PriceCorrerFreTras = 3515;
			PriceTrapezeDirEsq = 800;
			PriceOcardianDirEsq = 5787;
			PriceOcardianFreTras = 5731;
			break;
		case 18981: // 6000mm x 3000mm
			PriceStoreDirEsq = 1921;
			PriceStoreFreTras = 1551;
			PriceCorrerDirEsq = 3604;
			PriceCorrerFreTras = 5503;
			PriceTrapezeDirEsq = 800;
			PriceOcardianDirEsq = 5787;
			PriceOcardianFreTras = 7347;
			break;
	case 18982: // 6000mm x 3500mm
      PriceStoreDirEsq = 2193;
      PriceStoreFreTras = 1551;
      PriceCorrerDirEsq = 4160;
      PriceCorrerFreTras = 5503;
      PriceTrapezeDirEsq = 998;
      PriceOcardianDirEsq = 6415;
      PriceOcardianFreTras = 7347;
			break;

	}

	//store
  var pricedesc = PriceStoreDirEsq-(PriceStoreDirEsq*valorReducao);
	$('#price_22114').html('<i> + <s>'+PriceStoreDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22114').attr('data-price', PriceStoreDirEsq);
  var pricedesc = PriceStoreDirEsq-(PriceStoreDirEsq*valorReducao);
	$('#price_22115').html('<i> + <s>'+PriceStoreDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22115').attr('data-price', PriceStoreDirEsq);
  var pricedesc = PriceStoreFreTras-(PriceStoreFreTras*valorReducao);
	$('#price_22116').html('<i> + <s>'+PriceStoreFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22116').attr('data-price', PriceStoreFreTras);
	//Vertical
  var pricedesc = PriceCorrerFreTras-(PriceCorrerFreTras*valorReducao);
	$('#price_22117').html('<i> + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22117').attr('data-price', PriceCorrerFreTras);
  var pricedesc = PriceCorrerDirEsq-(PriceCorrerDirEsq*valorReducao);
	$('#price_22118').html('<i> + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22118').attr('data-price', PriceCorrerDirEsq);
  var pricedesc = PriceCorrerDirEsq-(PriceCorrerDirEsq*valorReducao);
	$('#price_22119').html('<i> + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22119').attr('data-price', PriceCorrerDirEsq);
	//trapeze
  var pricedesc = PriceTrapezeDirEsq-(PriceTrapezeDirEsq*valorReducao);
	$('#price_22120').html('<i> + <s>'+PriceTrapezeDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22120').attr('data-price', PriceTrapezeDirEsq);
  var pricedesc = PriceTrapezeDirEsq-(PriceTrapezeDirEsq*valorReducao);
	$('#price_22121').html('<i> + <s>'+PriceTrapezeDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22121').attr('data-price', PriceTrapezeDirEsq);
	//ocardian
  var pricedesc = PriceOcardianDirEsq-(PriceOcardianDirEsq*valorReducao);
	$('#price_22296').html('<i> + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22296').attr('data-price', PriceOcardianDirEsq);
  var pricedesc = PriceOcardianDirEsq-(PriceOcardianDirEsq*valorReducao);
	$('#price_22297').html('<i> + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22297').attr('data-price', PriceOcardianDirEsq);
  var pricedesc = PriceOcardianFreTras-(PriceOcardianFreTras*valorReducao);
	$('#price_22298').html('<i> + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
	$('#ndk-accessory-quantity-22298').attr('data-price', PriceOcardianFreTras);
});

$(".color-ndk[data-group='2401']").click(function () {
  $('.product_3108_0.accessory-ndk.selected-accessory img').trigger('mousedown');
  RemoveField(3109);
});

var storeClassiqueFacada= [
  [2001, 979, ''],
  [3001, 1122, ''],
  [4001, 1266, ''],
  [5001, 1411, ''],
  [6001, 1551, ''],
  [7001, 2389, ''],
  [8001, 2436, ''],
  [9001, 2678, ''],
];

var storeClassique = [
  [1001, 1258, ''],
  [1501, 1331, ''],
  [2001, 1451, ''],
  [2501, 1391, ''],
  [3001, 1921, ''],
  [3501, 2193, ''],
  [4001, 2514, ''],
];

var fermetureClassiqueFacada = [
  [2001, 2017, ''],
  [3001, 2804, ''],
  [4001, 3515, ''],
  [5001, 4691, ''],
  [6001, 5503, ''],
  [7001, 6322, ''],
  [8001, 7030, ''],
  [9001, 8568, ''],
];

var fermetureClassique = [
  [1001, 2376, ''],
  [1501, 2449, ''],
  [2001, 2568, ''],
  [2501, 3075, ''],
  [3001, 3604, ''],
  [3501, 4160, ''],
  [4001, 4763, ''],
  ];

var trapezeClassique = [
  [1001, 280, ''],
  [1501, 353, ''],
  [2001, 472, ''],
  [2501, 625, ''],
  [3001, 800, ''],
  [3501, 998, ''],
  [4001, 1248, ''],
  ];

var profClassicTrazeAccordeon = [
[1001, 2763, ''],
[1501, 2836, ''],
[2001, 3361, ''],
[2501, 4205, ''],
[3001, 5787, ''],
[3501, 6415, ''],
[4001, 6979, ''],
];

var profClassicAccordeon = [
[2001, 2889, ''],
[3001, 3939, ''],
[4001, 5731, ''],
[5001, 6467, ''],
[6001, 7347, ''],
[7001, 10833, ''],
[8001, 11103, ''],
[9001, 11461, ''],
];



/// Pergola aluminium classique sur mesure toiture en polycarbonate 16 mm tous ral
$(document).on('change', '#dimension_text_width_2412,#dimension_text_width_4201,#dimension_text_width_4202', function () {
	groupvalue = $(this).attr('data-group');
	heightPE = $('#dimension_text_width_' + groupvalue).val();

  $('.product_3108_0.accessory-ndk.selected-accessory img').trigger('mousedown');
  RemoveField(3109);

	if (heightPE > 6000) {
		$('.img-value-4439[data-id-value="26545"]').trigger('click');
	} else {
		$('.img-value-4439[data-id-value="26544"]').trigger('click');
	}



	for (i = 0; i < storeClassiqueFacada.length; i++) {
		if (heightPE < storeClassiqueFacada[i][0]) {
      var pricedesc = storeClassiqueFacada[i][1]-(storeClassiqueFacada[i][1]*valorReducao);
			$('#price_22145').html('<i> + <s>'+storeClassiqueFacada[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22145').attr('data-price', storeClassiqueFacada[i][1]);
			break;
		}
	}


	for (i = 0; i < fermetureClassiqueFacada.length; i++) {
		if (heightPE < fermetureClassiqueFacada[i][0]) {
      var pricedesc = fermetureClassiqueFacada[i][1]-(fermetureClassiqueFacada[i][1]*valorReducao);
			$('#price_22146').html('<i> + <s>'+fermetureClassiqueFacada[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22146').attr('data-price', fermetureClassiqueFacada[i][1]);
			break;
		}
	}

	for (i = 0; i < profClassicAccordeon.length; i++) {
		if (heightPE < profClassicAccordeon[i][0]) {
      var pricedesc = profClassicAccordeon[i][1]-(profClassicAccordeon[i][1]*valorReducao);
			$('#price_22290').html('<i> + <s>'+profClassicAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22290').attr('data-price', profClassicAccordeon[i][1]);
			break;
		}
	}

});

$(document).on('change', '#dimension_text_height_2412,#dimension_text_height_4201,#dimension_text_height_4202', function () {
	groupvalue = $(this).attr('data-group');
	heightPE = $('#dimension_text_height_' + groupvalue).val();

  $('.product_3108_0.accessory-ndk.selected-accessory img').trigger('mousedown');
  RemoveField(3109);

	for (i = 0; i < storeClassique.length; i++) {
		if (heightPE < storeClassique[i][0]) {
      var pricedesc = storeClassique[i][1]-(storeClassique[i][1]*valorReducao);
			$('#price_22143').html('<i> + <s>'+storeClassique[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22143').attr('data-price', storeClassique[i][1]);
			$('#price_22144').html('<i> + <s>'+storeClassique[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22144').attr('data-price', storeClassique[i][1]);
			break;
		}
	}

	for (i = 0; i < fermetureClassique.length; i++) {
		if (heightPE < fermetureClassique[i][0]) {
      var pricedesc = fermetureClassique[i][1]-(fermetureClassique[i][1]*valorReducao);
			$('#price_22147').html('<i> + <s>'+fermetureClassique[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22147').attr('data-price', fermetureClassique[i][1]);
			$('#price_22148').html('<i> + <s>'+fermetureClassique[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22148').attr('data-price', fermetureClassique[i][1]);
			break;
		}
	}

	for (i = 0; i < profClassicTrazeAccordeon.length; i++) {
		if (heightPE < profClassicTrazeAccordeon[i][0]) {
      var pricedesc = profClassicTrazeAccordeon[i][1]-(profClassicTrazeAccordeon[i][1]*valorReducao);
			$('#price_22288').html('<i> + <s>'+profClassicTrazeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22288').attr('data-price', profClassicTrazeAccordeon[i][1]);
			$('#price_22289').html('<i> + <s>'+profClassicTrazeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22289').attr('data-price', profClassicTrazeAccordeon[i][1]);
			break;
		}
	}

	for (i = 0; i < trapezeClassique.length; i++) {
		if (heightPE < trapezeClassique[i][0]) {
      var pricedesc = trapezeClassique[i][1]-(trapezeClassique[i][1]*valorReducao);
			$('#price_22149').html('<i> + <s>'+trapezeClassique[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22149').attr('data-price', trapezeClassique[i][1]);
			$('#price_22150').html('<i> + <s>'+trapezeClassique[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
			$('#ndk-accessory-quantity-22150').attr('data-price', trapezeClassique[i][1]);
			break;
		}
	}
});


///Pergola toile
$(document).on('click', ".color-ndk[data-id-value='21480']", function () {
	$(".color-ndk[data-id-value='22112']").trigger('click');
});

$(document).on('click', ".color-ndk[data-id-value='21481']", function () {
	$(".color-ndk[data-id-value='22113']").trigger('click');
});

$(document).on('click', ".color-ndk[data-id-value='21482']", function () {
	$(".color-ndk[data-id-value='22112']").trigger('click');
});
$(document).on('click', ".color-ndk[data-id-value='21483']", function () {
	$(".color-ndk[data-id-value='22113']").trigger('click');
});
$(document).on('click', ".color-ndk[data-id-value='21486']", function () {
	$(".color-ndk[data-id-value='22112']").trigger('click');
});
$(document).on('click', ".color-ndk[data-id-value='21487']", function () {
	$(".color-ndk[data-id-value='22113']").trigger('click');
});

$(document).on('click', ".color-ndk[data-id-value='21176']", function () {
	$(".color-ndk[data-id-value='22112']").trigger('click');
});
$(document).on('click', ".color-ndk[data-id-value='21175']", function () {
	$(".color-ndk[data-id-value='22113']").trigger('click');
});

$(document).off('click', '.accessory-ndk-no-quantity .accessory_img_block');

$(document).on('click', '.accessory-ndk-no-quantity .accessory_img_block', function () {

	var accessoryArray = [
		/*********** PERGOLA PROMO (STARTER) AUTOPORTEE [2001] **********/
		[15002, 15006], // Estore Esquerdo, Porta Vidro Esquerdo
    [15002, 16280], // Estore Esquerdo, Accordeon Esquerdo
		[15006, 15002], // Porta Vidro Esquerdo, Estore Esquerdo
    [15006, 16280], // Porta Vidro Esquerdo, Accordeon Esquerdo
		[16280, 15002], // Accordeon Esquerdo, Estore Esquerdo
    [16280, 15006], // Accordeon Esquerdo, Porta Vidro Esquerdo

		[15003, 15007], // Estore Direito, Porta Vidro Direito
    [15003, 16281], // Estore Direito, Accordeon Direito
		[15007, 15003], // Porta Vidro Direito, Estore Direito
    [15007, 16281], // Porta Vidro Direito, Accordeon Direito
		[16281, 15003], // Accordeon Direito, Estore Direito
    [16281, 15007], // Accordeon Direito, Porta Vidro Direito

		[15004, 15008], // Estore Frente, Porta Vidro Frente
    [15004, 16282], // Estore Frente, Accordeon Frente
		[15008, 15004], // Porta Vidro Frente, Estore Frente
    [15008, 16282], // Porta Vidro Frente, Accordeon Frente
		[16282, 15004], // Accordeon Frente, Estore Frente
    [16282, 15008], // Accordeon Frente, Porta Vidro Frente

		[15005, 15009], // Estore Traseiro, Porta Vidro Traseiro
    [15005, 16283], // Estore Traseiro, Accordeon Traseiro
    [15009, 15005], // Porta Vidro Traseiro, Estore Traseiro
    [15009, 16283], // Porta Vidro Traseiro, Accordeon Traseiro
		[16283, 15005], // Accordeon Traseiro, Estore Traseiro
    [16283, 15009], // Accordeon Traseiro, Porta Vidro Traseiro

		/*********** PERGOLA PROMO (STARTER) ADOSSE [2017] **********/
		[15094, 15098], // Estore Esquerdo, Porta Vidro Esquerdo
    [15094, 16284], // Estore Esquerdo, Accordeon Esquerdo
		[15098, 15094], // Porta Vidro Esquerdo, Estore Esquerdo
    [15098, 16284], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [16284, 15094], // Accordeon Esquerdo, Estore Esquerdo
		[16284, 15098], // Accordeon Esquerdo, Porta Vidro Esquerdo

		[15095, 15099], // Estore Direito, Porta Vidro Direito
    [15095, 16285], // Estore Direito, Accordeon Direito
		[15099, 15095], // Porta Vidro Direito, Estore Direito
    [15099, 16285], // Porta Vidro Direito, Accordeon Direito
		[16285, 15095], // Accordeon Direito, Estore Direito
    [16285, 15099], // Accordeon Direito, Porta Vidro Direito

    [15096, 15100], // Estore Frente, Porta Vidro Frente
    [15096, 16286], // Estore Frente, Accordeon Frente
		[15100, 15096], // Porta Vidro Frente, Estore Frente
    [15100, 16286], // Porta Vidro Frente, Accordeon Frente
		[16286, 15096], // Accordeon Frente, Estore Frente
		[16286, 15100], // Accordeon Frente, Porta Vidro Frente

    /*********** PERGOLA GRANDLUX SM ADOSSEE [2018] **********/
		[15102, 15106], //Estore Esquerdo, Porta Vidro Esquerdo
		[15102, 15110], //Estore Esquerdo, Accordeon Esquerdo
		[15106, 15102], //Porta Vidro Esquerdo, Estore Esquerdo
		[15106, 15110], //Porta Vidro Esquerdo, Accordeon Esquerdo
    [15110, 15102], //Accordeon Esquerdo, Estore Esquerdo
		[15110, 15106], //Accordeon Esquero, Porta Vidro Esquerdo

		[15103, 15107], //Estore Direito, Porta Vidro Direito
    [15103, 15111], //Estore Direito, Accordeon Direito
		[15107, 15103], //Porta Vidro Direito, Estore Direito
		[15107, 15111], //Porta Vidro Direito, Accordeon Direito
		[15111, 15103], //Accordeon Direito, Estore Direito
		[15111, 15107], //Accordoen Direito, Porta Vidro Direito

    [15104, 15108], //Estore Frente, Porta Vidro Frente
		[15104, 15112], //Estore Frente, Accordeon Frente
		[15108, 15104], //Porta Vidro Frente, Estore Frente
		[15108, 15112], //Porta Vidro Frente, Accordeon Frente
		[15112, 15104], //Accordeon Frente, Estore Frente
		[15112, 15108], //Accordeon Frente, Porta Vidro Frente

    /*********** PERGOLA GRANDLUX SM AUTOPORTEE [2014] **********/
		[15076, 15080], //Estore Esquerdo, Porta Vidro Esquerdo
		[15076, 15086], //Estore Esquerdo, Accordeon Esquerdo
		[15080, 15076], //Porta Vidro Esquerdo, Estore Esquerdo
		[15080, 15086], //Porta Vidro Esquerdo, Accordeon Esquerdo
    [15086, 15076], //Accordeon Esquerdo, Estore Esquerdo
		[15086, 15080], //Accordeon Esquerdo, Porta Vidro Esquerdo

		[15077, 15081], //Estore Direito, Porta Vidro Direito
		[15077, 15087], //Estore Direito, Accordeon Direito
		[15081, 15077], //Porta Vidro Direito, Estore Direito
		[15081, 15087], //Porta Vidro Direito, Accordeon Direito
    [15087, 15077], //Accordeon Direito, Estore Direito
		[15087, 15081], //Accordeon Direito, Porta Vidro Direito

		[15078, 15082], //Estore Frente, Porta Vidro Frente
		[15078, 15088], //Estore Frente, Accordeon Frente
		[15082, 15078], //Porta Vidro Frente, Estore Frente
		[15082, 15088], //Porta Vidro Frente, Accordeon Frente
		[15088, 15078], //Accordeon Frente, Estore Frente
    [15088, 15082], //Accordeon Frente, Porta Vidro Frente

		[15079, 15083], //Estore Traseiro, Porta Vidro Traseiro
		[15079, 15089], //Estore traseiro, Accordeon Traseiro
		[15083, 15079], //Porta Vidro Traseiro, Estore Traseiro
		[15083, 15089], //Porta Vidro Traseiro, Accordeon Traseiro
		[15089, 15079], //Accordeon Traseiro, Estore Traseiro
    [15089, 15083], //Accordeon Traseiro, Porta Vidro Traseiro

		/*********** PERGOLA GRANDLUX STD ADOSSEE [2280] **********/
		[17805, 17808], //Estore Esquerdo, Porta Vidro Esquerdo
		[17805, 17811], //Estore Esquerdo, Accordeon Esquerdo
		[17811, 17805], //Accordeon Esquerdo, Estore Esquerdo
		[17811, 17808], //Accordeeon Esquerdo, Porta Vidro Esquerdo
		[17808, 17805], //Porta Vidro Esquerdo, Estore Esquerdo
    [17808, 17811], //Porta Vidro Esquerdo, Accordeon Esquerdo

		[17806, 17809], //Estore Direito, Porta Vidro Direito
		[17806, 17812], //Estore Direito, Accordeon Direito
		[17812, 17806], //Accordeon Direito, Estore Direito
		[17812, 17809], //Accordeon Direito, Porta Vidro Direito
		[17809, 17806], //Porta Vidro Direito, Estore Direito
    [17809, 17812], //Porta Vidro Direito, Accordeon Direito

		[17807, 17810], //Estore Frente, Porta Vidro Frente
		[17807, 17813], //Estore Frente, Accordeon Frente
		[17813, 17807], //Accordeon Frente, Estore Frente
		[17813, 17810], //Accordeon Frente, Porta Vidro Frente
		[17810, 17807], //Porta Vidro Frente, Estore Frente
    [17810, 17813], //Porta Vidro Frente, Accordeon Frente

		/*********** PERGOLA GRANDLUX STD AUTOPORTEE [2281] **********/
		[17814, 17818], //Estore Esquerdo, Porta Vidro Esquerdo
		[17814, 17822], //Estore Esquerdo, Accordeon Esquerdo
		[17822, 17814], //Accordeon Esquerdo, Estore Esquerdo
		[17822, 17818], //Accordeon Esquerdo, Porta Vidro Esquerdo
		[17818, 17814], //Porta Vidro Esqurdo, Estore Esquerdo
    [17818, 17822], //Porta Vidro Esquerdo, Accordeon Esquerdo

    /*[17815,17819],
		[17815,17822],
		[17822,17815],
		[17822,17819],
		[17819,17822],
		[17819,17815],*/

		[17815, 17819], //Estore Direito, Porta Vidro Direito
		[17815, 17823], //Estore Direito, Accordeon Direito
    [17819, 17815], //Porta Vidro Direito, Estore Direito
		[17819, 17823], //Porta Vidro Direito, Accordeon Direito
    [17823, 17815], //Accordeon Direito, Estore Direito
		[17823, 17819], //Accordeon Direito, Porta Vidro Direito

		[17816, 17820], //Estore Frente, Porta Vidro Frente
		[17816, 17824], //Estore Frente, Accordeon Frente
		[17820, 17816], //Porta Vidro Frente, Estore Frente
    [17820, 17824], //Porta Vidro Frente, Accordeon Frente
    [17824, 17816], //Accordeon Frente, Estore Frente
		[17824, 17820], //Accordeon Frente, Porta Vidro Frente

		[17817, 17821], //Estore Traseiro, Porta Vidro Traseiro
		[17817, 17825], //Estore Traseiro, Accordeon Traseiro
    [17821, 17817], //Porta Vidro Traseiro, Estore Traseiro
		[17821, 17825], //Porta Vidro Traseiro, Accordeon Traseiro
    [17825, 17817], //Accordeon Traseiro, Estore Traseiro
		[17825, 17821], //Accordeon Traseiro, Porta Vidro Traseiro

		[22117, 22116],
		[22116, 22117],
		[22114, 22118],
		[22114, 22120],
		[22118, 22114],
		[22118, 22120],
		[22120, 22118],
		[22120, 22114],
		[22115, 22119],
		[22115, 22121],
		[22119, 22115],
		[22119, 22121],
		[22121, 22119],
		[22121, 22115],

		//[22129, 22129],
		[22130, 22129],

		[22143, 22147],
		[22143, 22149],
		[22147, 22143],
		[22147, 22149],
		[22149, 22143],
		[22149, 22147],

		[22144, 22148],
		[22144, 22150],
		[22148, 22144],
		[22148, 22150],
		[22150, 22148],
		[22150, 22144],

		[22145, 22146],
		[22146, 22145],

		[22288, 22149],
		[22288, 22147],
		[22288, 22143],
		[22149, 22288],
		[22147, 22288],
		[22143, 22288],

		[22290, 22146],
		[22290, 22145],
		[22146, 22290],
		[22145, 22290],

		[22289, 22150],
		[22289, 22148],
		[22289, 22144],
		[22150, 22289],
		[22148, 22289],
		[22144, 22289],

		[22296, 22120],
		[22296, 22118],
		[22296, 22114],
		[22120, 22296],
		[22118, 22296],
		[22114, 22296],

		[22297, 22115],
		[22297, 22119],
		[22297, 22121],
		[22115, 22297],
		[22119, 22297],
		[22121, 22297],

		[22298, 22116],
		[22298, 22117],
		[22116, 22298],
		[22117, 22298],

    /*********** PERGOLA EASY SM AUTOPORTEE [4877] **********/
		[28260, 28264], // Estore Esquerdo, Porta Vidro Esquerdo
    [28260, 28268], // Estore Esquerdo, Accordeon Esquerdo
		[28264, 28260], // Porta Vidro Esquerdo, Estore Esquerdo
		[28264, 28268], // Porta Vidro Esquerdo, Accordeon Esquerdo
		[28268, 28260], // Accordeon Esquerdo, Estore Esquerdo
		[28268, 28264], // Accordeon Esquerdo, Porta Vidro Esquerdo

    [28261, 28265], // Estore Direito, Porta Vidro Direito
    [28261, 28269], // Estore Direito, Accordeon Direito
    [28265, 28261], // Porta Vidro Direito, Estore Direito
		[28265, 28269], // Porta Vidro Direito, Accordeon Direito
		[28269, 28261], // Accordeon Direito, Estore Direito
		[28269, 28265], // Accordeon Direito, Porta Vidro Direito

		[28262, 28266], // Estore Frente, Porta Vidro Frente
    [28262, 28270], // Estore Frente, Accordeon Frente
    [28266, 28262], // Porta Vidro Frente, Estore Frente
		[28266, 28270], // Porta Vidro Frente, Accordeon Frente
		[28270, 28262], // Accordeon Frente, Estore Frente
		[28270, 28266], // Accordeon Frente, Porta Vidro Frente

		[28263, 28267], // Estore Traseiro, Porta Vidro Traseiro
		[28263, 28271], // Estore Traseiro, Accordeon Traseiro
    [28267, 28263], // Porta Vidro Traseiro, Estore Traseiro
		[28267, 28271], // Porta Vidro Traseiro, Accordeon Traseiro
		[28271, 28263], // Accordeon Traseiro, Estore Traseiro
		[28271, 28267], // Accordeon Traseiro, Porta Vidro Traseiro

		/*********** PERGOLA EASY SM ADOSSEE [4878] **********/
		[28272, 28275], // Estore Esquerdo, Porta Vidro Esquerdo
    [28272, 28278], // Estore Esquerdo, Accordeon Esquerdo
    [28275, 28272], // Porta Vidro Esquerdo, Estore Esquerdo
		[28275, 28278], // Porta Vidro Esquerdo, Accordeon Esquerdo
		[28278, 28272], // Accordeon Esquerdo, Estore Esquerdo
		[28278, 28275], // Accordeon Esquerdo, Porta Vidro Esquerdo

		[28273, 28276], // Estore Direito, Porta Vidro Direito
    [28273, 28279], // Estore Direito, Accordeon Direito
    [28276, 28273], // Porta Vidro Direito, Estore Direito
		[28276, 28279], // Porta Vidro Direito, Accordeon Direito
		[28279, 28273], // Accordeon Direito, Estore Direito
		[28279, 28276], // Accordeon Direito, Porta Vidro Direito

		[28274, 28277], // Estore Frente, Porta Vidro Frente
		[28274, 28280], // Estore Frente, Accordeon Frente
    [28277, 28274], // Porta Vidro Frente, Estore Frente
		[28277, 28280], // Porta Vidro Frente, Accordeon Frente
		[28280, 28274], // Accordeon Frente, Estore Frente
		[28280, 28277], // Accordeon Frente, Porta Vidro Frente

	];

	zindexImgs = []; // index imagens

  /*********** PERGOLA PROMO (STARTER) AUTOPORTEE [2001] **********/
	zindexImgs[15003] = ["1"]; // Estore Direito
	zindexImgs[15007] = ["1"]; // Porta Vidro Direito
	zindexImgs[16281] = ["1"]; // Accordeon Direito
	zindexImgs[15005] = ["1"]; // Estore Traseiro
	zindexImgs[15009] = ["1"]; // Porta Vidro Traseiro
	zindexImgs[16283] = ["1"]; // Accordeon Traseiro
  /*********** PERGOLA PROMO (STARTER) ADOSSEE [2017] **********/
	zindexImgs[15095] = ["1"]; // Estore Direito
	zindexImgs[15099] = ["1"]; // Porta Vidro Direita
	zindexImgs[16285] = ["1"]; // Accordeon Direito

  /*
  zindexImgs[27629] = ["1"]; // Pergola Promo Manuelle Autoportee - Estore Direito
  zindexImgs[27633] = ["1"]; // Pergola Promo Manuelle Autoportee - Porta Vidro Direito
  //zindexImgs[27637] = ["1"]; // Pergola Promo Manuelle Autoportee - Accordeon Direito
  zindexImgs[27631] = ["1"]; // Pergola Promo Manuelle Autoportee - Estore Traseiro
  zindexImgs[27635] = ["1"]; // Pergola Promo Manuelle Autoportee - Porta Vidro Traseiro
  //zindexImgs[27639] = ["1"]; // Pergola Promo Manuelle Autoportee - Accordeon Traseiro
  zindexImgs[27641] = ["1"]; // Pergola Promo Manuelle Adossee - Estore Direito
  zindexImgs[27644] = ["1"]; // Pergola Promo Manuelle Adossee - Porta Vidro Direito
  //zindexImgs[27647] = ["1"]; // Pergola Promo Manuelle Adossee - Accordeon Direito
  */

  /*********** PERGOLA EASY SM AUTOPORTEE [4877] **********/
  zindexImgs[28260] = ["1"]; // Estore Esquerdo
	zindexImgs[28264] = ["1"]; // Porta Vidro Esquerdo
	zindexImgs[28268] = ["1"]; // Accordeon Esquerdo
	zindexImgs[28263] = ["0"]; // Estore Traseiro
	zindexImgs[28267] = ["0"]; // Porta Vidro Traseiro
	zindexImgs[28271] = ["0"]; // Accordeon Traseiro
  /*********** PERGOLA EASY SM ADOSSEE [4878] **********/
	zindexImgs[28272] = ["1"]; // Estore Esquerdo
	zindexImgs[28275] = ["1"]; // Porta Vidro Esquerdo
	zindexImgs[28278] = ["1"]; // Accordeon Esquerdo

  /*********** PERGOLA GRANDLUX STD AUTOPORTEE [2281] **********/
	zindexImgs[17815] = ["1"]; // Estore Direito
	zindexImgs[17819] = ["1"]; // Porta Vidro Direito
	zindexImgs[17823] = ["1"]; // Accordeon Direito
	zindexImgs[17817] = ["1"]; // Estore Traseiro
	zindexImgs[17821] = ["1"]; // Porta Vidro Traseiro
	zindexImgs[17825] = ["1"]; // Accordeon Traseiro
  /*********** PERGOLA GRANDLUX STD ADOSSEE [2280] **********/
	zindexImgs[17806] = ["1"]; // Estore Direito
	zindexImgs[17809] = ["1"]; // Porta Vidro Direita
	zindexImgs[17812] = ["1"]; // Accordeon Direito

  /*********** PERGOLA GRANDLUX SM AUTOPORTEE [2014] **********/
	zindexImgs[15077] = ["1"]; // Estore Direito
	zindexImgs[15081] = ["1"]; // Porta Vidro Direito
	zindexImgs[15087] = ["1"]; // Accordeon Direito
	zindexImgs[15079] = ["1"]; // Estore Traseiro
	zindexImgs[15083] = ["1"]; // Porta Vidro Traseiro
	zindexImgs[15089] = ["1"]; // Accordeon Traseiro
  /*********** PERGOLA GRANDLUX SM ADOSSEE [2018] **********/
	zindexImgs[15103] = ["1"]; // Estore Direito
	zindexImgs[15107] = ["1"]; // Porta Vidro Direito
	zindexImgs[15111] = ["1"]; // Accordeon Direito

	zindexImgs[22114] = ["1"]; // Pergola aluminium classique - Store Verticale Côté Gauche
	zindexImgs[22115] = ["2"]; // Pergola aluminium classique - Store Verticale Côté Droit
	//zindexImgs[22116] = ["3"]; // Pergola aluminium classique - Store Verticale Façade
	//zindexImgs[22117] = ["3"]; // Pergola aluminium classique - Façade Centrale
	zindexImgs[22118] = ["1"]; // Pergola aluminium classique - Pignon Gauche Completo
	zindexImgs[22119] = ["2"]; // Pergola aluminium classique - Pignon Droit Completo
	zindexImgs[22120] = ["1"]; // Pergola aluminium classique - Pignon Gauche Trapeze Seul
	zindexImgs[22121] = ["1"]; // Pergola aluminium classique - Pignon Droit Trapeze Seul
	zindexImgs[22296] = ["1"]; // Pergola aluminium classique - Porte en Accordéon Pignon Gauche
  zindexImgs[22297] = ["1"]; // Pergola aluminium classique - Porte en Accordéon Pignon Droite

	zindexImgs[22129] = ["1"]; // Pergola aluminium TOP PRIX - Store Verticale Façade
	//zindexImgs[22130] = ["1"]; // Pergola aluminium TOP PRIX - Façade Centrale

	zindexImgs[22143] = ["1"]; // Pergola aluminium classique sur mesure - Store Verticale Côté Gauche
	zindexImgs[22144] = ["2"]; // Pergola aluminium classique sur mesure - Store Verticale Côté Droit
	zindexImgs[22147] = ["1"]; // Pergola aluminium classique sur mesure - Pignon Gauche Completo
	zindexImgs[22148] = ["1"]; // Pergola aluminium classique sur mesure - Pignon Droit Completo
	zindexImgs[22149] = ["1"]; // Pergola aluminium classique sur mesure - Pignon Gauche Trapeze Seul
	zindexImgs[22150] = ["1"]; // Pergola aluminium classique sur mesure - Pignon Droit Trapeze Seul
	zindexImgs[22289] = ["1"]; // Pergola aluminium classique sur mesure - Porte en Accordéon Pignon Gauche
  zindexImgs[22288] = ["1"]; // Pergola aluminium classique sur mesure - Porte en Accordéon Pignon Droite


	campoCorPergola = []; // campos de cores para as pergolas - campoCorPergola[id_campo_opcao_fermeture] = ["id_campo_cor_pergola"];
	campoCorPergola[2001] = ["2011"]; // Pergola Promo (Starter) - Autoportee
  campoCorPergola[2017] = ["2019"]; // Pergola Promo (Starter) - Adossee
  //campoCorPergola[4778] = ["4770"]; // Pergola Promo Manuelle - Adossee
  //campoCorPergola[4777] = ["4769"]; // Pergola Promo Manuelle - Autoportee
	campoCorPergola[2014] = ["2302"]; // Pergola Grandlux SM - Autoportee
  campoCorPergola[2018] = ["2007"]; // Pergola Grandlux SM - Adossee
  campoCorPergola[2280] = ["2278"]; // Pergola Grandlux Std - Adossee
	campoCorPergola[2281] = ["2279"]; // Pergola Grandlux Std - Autoportee
  campoCorPergola[4877] = ["4864", "5166"]; // Pergola Easy SM - Autoportee Lamina Simples e Dupla
  campoCorPergola[4878] = ["4865", "5151"]; // Pergola Easy SM - Adossee Lamina Simples e Dupla
	campoCorPergola[3103] = ["2409"]; // Pergola aluminium classique
	campoCorPergola[3106] = ["2425"]; // Pergola aluminium TOP PRIX
	campoCorPergola[3108] = ["2401"]; // Pergola aluminium classique sur mesure


	campoCorTecido = []; // campos de cores para as pergolas - campoCorPergola[id_campo_opcao_fermeture] = ["id_campo_opcao_tecido"];
  campoCorTecido[2001] = ["2234"]; // Pergola Promo (Starter) - Autoportee
  campoCorTecido[2017] = ["4911"]; // Pergola Promo (Starter) - Adossee
  //campoCorTecido[4778] = ["4779"]; // Pergola Promo Manuelle - Adossee
  //campoCorTecido[4777] = ["4779"]; // Pergola Promo Manuelle - Autoportee
	campoCorTecido[2018] = ["2251"]; // Pergola Grandlux SM - Adossee
	campoCorTecido[2014] = ["2251"]; // Pergola Grandlux SM - Autoportee
  campoCorTecido[2280] = ["2289"]; // Pergola Grandlux Std - Adossee
	campoCorTecido[2281] = ["4913"]; // Pergola Grandlux Std - Autoportee
  campoCorTecido[4878] = ["4879"]; // Pergola Easy SM - Adossee
	campoCorTecido[4877] = ["4881"]; // Pergola Easy SM - Autoportee
	campoCorTecido[3103] = ["3104"]; // Pergola aluminium classique
	campoCorTecido[3106] = ["3105"]; // Pergola aluminium TOP PRIX
	campoCorTecido[3108] = ["3109"]; // Pergola aluminium classique sur mesure

	opcoesStoreChange = []; // campos de cores para as pergolas - opcoesStoreChange[id_campo_opcao_fermeture] = ["id_campo_opcao_fermeture_valor"];
	// Pergola Promo (Starter)
	opcoesStoreChange[2001] = ["15002", "15003", "15004", "15005"]; // Autoportee
  opcoesStoreChange[2017] = ["15094", "15095", "15096"]; // Adossee
  /*
  // Pergola Promo Manuelle
  opcoesStoreChange[4778] = ["27640", "27641", "27642"]; // Adossee
  opcoesStoreChange[4777] = ["27628", "27629", "27630", "27631"]; // Autoportee
  */
	// Pergola Grandlux SM
	opcoesStoreChange[2014] = ["15076", "15077", "15078", "15079"]; // Autoportee
  opcoesStoreChange[2018] = ["15102", "15103", "15104"]; // Adossee
  // Pergola Grandlux Std
	opcoesStoreChange[2280] = ["17805", "17806", "17807"]; // Adossee
	opcoesStoreChange[2281] = ["17814", "17815", "17816", "17817"]; // Autoportee
  // Pergola Easy SM
	opcoesStoreChange[4877] = ["28260", "28261", "28262", "28263"]; // Autoportee
  opcoesStoreChange[4878] = ["28272", "28273", "28274"]; // Adossee
	//Pergola aluminium classique
	opcoesStoreChange[3103] = ["22114", "22115", "22116"];
	//Pergola aluminium TOP PRIX
	opcoesStoreChange[3106] = ["22129"];
	//Pergola aluminium classique  sur mesure
	opcoesStoreChange[3108] = ["22143", "22144", "22145"];


	me = $(this).parent();

  // ids dos campos de opcao de fechos das pergolas
	var idsCamposPermitidos = ["2001", "2017", "2014", "2018", "2280", "2281", "3103", "3106", "3108", "4777", "4778", "4877", "4878"]; // se alterar este array, atualize a linha 2046 (antiga linha 1976)
	if ($.inArray(me.attr('data-group'), idsCamposPermitidos) !== -1) { // se existe no array

		for (i = 0; i < accessoryArray.length; i++) {
			if (accessoryArray[i][0] == me.attr('data-id-value')) {
				RemoveSelectOptions(accessoryArray[i][1], me.attr('data-group'));
				// paulo ++ exibir opcoes de fechos de pergola
				$("div").remove(".aluclass_" + accessoryArray[i][1] + "");
				if ($(me).hasClass('selected-accessory')) {
					$("div").remove(".aluclass_" + accessoryArray[i][0] + "");
				} else {
					if ( me.data("group") == "4878" || me.data("group") == "4877" || me.data("group") == "4778" || me.data("group") == "4777" || me.data("group") == "3108" || me.data("group") == "3106" || me.data("group") == "3103" || me.data("group") == "2281" || me.data("group") == "2280" || me.data("group") == "2018" || me.data("group") == "2014" || me.data("group") == "2017" || me.data("group") == "2001") { // ids dos campos de opcao de fechos de pergola

						campoCor = $("li[data-group='" + campoCorPergola[me.data("group")][0] + "'].color-ndk.selected-value").data("value");

            if (typeof campoCor === 'undefined') {
              campoCor = $("li[data-group='" + campoCorPergola[me.data("group")][1] + "'].color-ndk.selected-value").data("value");
            }

						if (campoCor.match(/7016/)) {
							cor = "7016";
						} else if (campoCor.match(/9016/)) {
							cor = "9016";
						} else if (campoCor.match(/9005/)) {
							cor = "9005";
						} else if (campoCor.match(/8019/)) {
							cor = "8019";
						} else if (campoCor.match(/8014/)) {
							cor = "8014";
						} else if (campoCor.match(/7035/)) {
							cor = "7035";
						} else if (campoCor.match(/6005/)) {
							cor = "6005";
						} else if (campoCor.match(/5015/)) {
							cor = "5015";
						} else if (campoCor.match(/5013/)) {
							cor = "5013";
						} else if (campoCor.match(/3005/)) {
							cor = "3005";
						} else if (campoCor.match(/1015/)) {
							cor = "1015";
						} else {
							cor = "7016";
						}

						console.log(accessoryArray[i][0] + "-" + cor);
						if (!$("div.aluclass_" + accessoryArray[i][0] + "").length) {
							if (checaSeImgExiste("https://" + document.domain + "/img/fechos_pergola/" + accessoryArray[i][0] + "-" + cor + ".png") == true) {
								if (typeof zindexImgs[accessoryArray[i][0]] !== 'undefined') {
									$("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_fechos aluclass_" + accessoryArray[i][0] + "' style='z-index: 1;'><img class='composition_element img-reponsive aluclass_" + accessoryArray[i][0] + "' src='/img/fechos_pergola/" + accessoryArray[i][0] + "-" + cor + ".png'/></div>");
								} else {
									$("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_fechos aluclass_" + accessoryArray[i][0] + "' style='z-index: 2;'><img class='composition_element img-reponsive aluclass_" + accessoryArray[i][0] + "' src='/img/fechos_pergola/" + accessoryArray[i][0] + "-" + cor + ".png'/></div>");
								}
							}
						}
					}
				}
				// paulo -- exibir opcoes de fechos de pergola
			}
		}

		if ($.inArray(me.attr('data-id-value'), opcoesStoreChange[me.data("group")]) !== -1) { // se existe no array
			if($( "div[data-field='"+campoCorTecido[me.data("group")][0]+"'] li").hasClass( "selected-value" ))
				$("div[data-field='"+campoCorTecido[me.data("group")][0]+"'] li.selected-value").trigger("click");
		}

	}
});


$(document).on('click', '.accessory-ndk-no-quantity .accessory_img_block', function () {
  me = $(this).parent();
  rootBlock = $(".form-group[data-field='" + me.attr('data-group') + "']");

  input = $('#ndk-accessory-quantity-' + me.attr('data-id-value'));
  max = parseInt(rootBlock.attr('data-qtty-max'));
  var price = $('#ndk-accessory-quantity-' + me.attr('data-id-value')).attr('data-price');
  var finalprice = $("#price_" + me.attr('data-group')).val();

  if (max > 0) {
    rootBlock.find('.selected-accessory').removeClass('selected-accessory');
    rootBlock.find('.ndk-accessory-quantity').val(0).trigger('change');
  }

  if (parseInt(input.val()) == 0) {
    me.addClass('selected-accessory');
    input.val(1).trigger('change');
    $("#price_" + me.attr('data-group')).val(parseInt(finalprice) + parseInt(price));
  }
  else {
    me.removeClass('selected-accessory');
    input.val(0).trigger('change');
    $("#price_" + me.attr('data-group')).val(parseInt(finalprice) - parseInt(price));
  }

});


$(document).on('click', "#img_div_30577", function () {
  if ($("li.accessory-ndk-no-quantity[data-id-value='30577']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30580').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30578').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30579').val(quantaccordpose).trigger('change');
  } else {
    $('#ndk-accessory-quantity-30580').val(0).trigger('change');
    $('#ndk-accessory-quantity-30578').val(0).trigger('change');
    $('#ndk-accessory-quantity-30579').val(0).trigger('change');
  }
  TextInfoclose();
});


function TextInfoclose() {
  var textInfo = '';
  if (quantstorepose > 0) {
    textInfo = textInfo + "  + Store Motorisé x" + quantstorepose + " " + $("#price_30580").html();
  }
  if (quantvitrepose > 0) {
    textInfo = textInfo + "  + Fermeture Vitrée  x" + quantvitrepose + " " + $("#price_30578").html() + "<br>";
  }
  if (quantaccordpose > 0) {
    textInfo = textInfo + "  + Fermeture Accordéon x" + quantaccordpose + " " + $("#price_30579").html() + "<br>";
  }
  $("#messagen_5472").html(textInfo);
}


//  Pergola Aluminium Classique Toiture en Polycarbonate 16 mm Standard

$(document).on('click', '#img_div_22114,#img_div_22115,#img_div_22116,#img_div_22117,#img_div_22118,#img_div_22119,#img_div_22296,#img_div_22297,#img_div_22298', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-22114').val()) + parseInt($('#ndk-accessory-quantity-22115').val()) + parseInt($('#ndk-accessory-quantity-22116').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-22117').val()) + parseInt($('#ndk-accessory-quantity-22118').val()) + parseInt($('#ndk-accessory-quantity-22119').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-22296').val()) + parseInt($('#ndk-accessory-quantity-22297').val()) + parseInt($('#ndk-accessory-quantity-22298').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30577']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30580').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30578').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30579').val(quantaccordpose).trigger('change');
  }
  TextInfoclose();
});


//  Pergola Aluminium Classique Toiture en Polycarbonate 16 mm Standard

$(document).on('click', '#img_div_22114,#img_div_22115,#img_div_22116,#img_div_22117,#img_div_22118,#img_div_22119,#img_div_22296,#img_div_22297,#img_div_22298', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-22114').val()) + parseInt($('#ndk-accessory-quantity-22115').val()) + parseInt($('#ndk-accessory-quantity-22116').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-22117').val()) + parseInt($('#ndk-accessory-quantity-22118').val()) + parseInt($('#ndk-accessory-quantity-22119').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-22296').val()) + parseInt($('#ndk-accessory-quantity-22297').val()) + parseInt($('#ndk-accessory-quantity-22298').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30577']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30580').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30578').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30579').val(quantaccordpose).trigger('change');
  }
  TextInfoclose();
});


//  Pergola Aluminium Classique Toiture en Polycarbonate 16 mm Standard

$(document).on('click', '#img_div_22143,#img_div_22144,#img_div_22145,#img_div_22146,#img_div_22147,#img_div_22148,#img_div_22288,#img_div_22289,#img_div_22290', function () {
  quantstorepose  = parseInt($('#ndk-accessory-quantity-22143').val()) + parseInt($('#ndk-accessory-quantity-22144').val()) + parseInt($('#ndk-accessory-quantity-22145').val());
  quantvitrepose  = parseInt($('#ndk-accessory-quantity-22146').val()) + parseInt($('#ndk-accessory-quantity-22147').val()) + parseInt($('#ndk-accessory-quantity-22148').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-22288').val()) + parseInt($('#ndk-accessory-quantity-22289').val()) + parseInt($('#ndk-accessory-quantity-22290').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30577']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30580').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30578').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30579').val(quantaccordpose).trigger('change');
  }
  TextInfoclose();
});

// Pergola Aluminium TOP PRIX
$(document).on('click', '#img_div_22129', function () {
  quantstorepose  = parseInt($('#ndk-accessory-quantity-22129').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30577']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30580').val(quantstorepose).trigger('change');
  }
  TextInfoclose();
});
