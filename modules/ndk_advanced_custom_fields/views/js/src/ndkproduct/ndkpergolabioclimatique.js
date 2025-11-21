
// ********** SERVICE DE POSE ********** //
var quantstorepose = 0;
var quantvitrepose = 0;
var quantaccordpose = 0;
var quantcortinapose = 0;
var quantzippose = 0;

$(window).on("load", function () {

  $('#ndk-accessory-quantity-30528').val(0); // Service de Pose Simple Autoportée 20 [5460]
  $('#ndk-accessory-quantity-30540').val(0); // Service de Pose Simple Adosée 10 [5466]

  // Fechos Pergola Bioclimatique EASY Autoportée Lame Simple et Double [4877]
  $('#price_4877').val(0);
  $('#ndk-accessory-quantity-28260').val(0);
  $('#ndk-accessory-quantity-28261').val(0);
  $('#ndk-accessory-quantity-28262').val(0);
  $('#ndk-accessory-quantity-28263').val(0);
  $('#ndk-accessory-quantity-28264').val(0);
  $('#ndk-accessory-quantity-28265').val(0);
  $('#ndk-accessory-quantity-28266').val(0);
  $('#ndk-accessory-quantity-28267').val(0);
  $('#ndk-accessory-quantity-28268').val(0);
  $('#ndk-accessory-quantity-28269').val(0);
  $('#ndk-accessory-quantity-28270').val(0);
  $('#ndk-accessory-quantity-28271').val(0);
  $('#ndk-accessory-quantity-30842').val(0);
  $('#ndk-accessory-quantity-30843').val(0);
  $('#ndk-accessory-quantity-30844').val(0);
  $('#ndk-accessory-quantity-30845').val(0);
  $('#ndk-accessory-quantity-31008').val(0);
  $('#ndk-accessory-quantity-31009').val(0);
  $('#ndk-accessory-quantity-31010').val(0);
  $('#ndk-accessory-quantity-31011').val(0);

  // Fechos Pergola Bioclimatique GRANDLUX Autoportée Sur Mesure [2014]
  $('#price_2014').val(0);
  $('#ndk-accessory-quantity-15076').val(0);
  $('#ndk-accessory-quantity-15077').val(0);
  $('#ndk-accessory-quantity-15078').val(0);
  $('#ndk-accessory-quantity-15079').val(0);
  $('#ndk-accessory-quantity-15080').val(0);
  $('#ndk-accessory-quantity-15081').val(0);
  $('#ndk-accessory-quantity-15082').val(0);
  $('#ndk-accessory-quantity-15083').val(0);
  $('#ndk-accessory-quantity-15086').val(0);
  $('#ndk-accessory-quantity-15087').val(0);
  $('#ndk-accessory-quantity-15088').val(0);
  $('#ndk-accessory-quantity-15089').val(0);
  $('#ndk-accessory-quantity-30849').val(0);
  $('#ndk-accessory-quantity-30850').val(0);
  $('#ndk-accessory-quantity-30851').val(0);
  $('#ndk-accessory-quantity-30852').val(0);
  $('#ndk-accessory-quantity-31015').val(0);
  $('#ndk-accessory-quantity-31016').val(0);
  $('#ndk-accessory-quantity-31017').val(0);
  $('#ndk-accessory-quantity-31018').val(0);

  // Fechos Pergola Bioclimatique PROMO (STARTER) Autoportée Standard [2001]
  $('#price_2001').val(0);
  $('#ndk-accessory-quantity-15002').val(0);
  $('#ndk-accessory-quantity-15003').val(0);
  $('#ndk-accessory-quantity-15004').val(0);
  $('#ndk-accessory-quantity-15005').val(0);
  $('#ndk-accessory-quantity-15006').val(0);
  $('#ndk-accessory-quantity-15007').val(0);
  $('#ndk-accessory-quantity-15008').val(0);
  $('#ndk-accessory-quantity-15009').val(0);
  $('#ndk-accessory-quantity-16280').val(0);
  $('#ndk-accessory-quantity-16281').val(0);
  $('#ndk-accessory-quantity-16282').val(0);
  $('#ndk-accessory-quantity-16283').val(0);
  $('#ndk-accessory-quantity-30856').val(0);
  $('#ndk-accessory-quantity-30857').val(0);
  $('#ndk-accessory-quantity-30858').val(0);
  $('#ndk-accessory-quantity-30859').val(0);
  $('#ndk-accessory-quantity-31022').val(0);
  $('#ndk-accessory-quantity-31023').val(0);
  $('#ndk-accessory-quantity-31024').val(0);
  $('#ndk-accessory-quantity-31025').val(0);

  // Fechos Pergola Bioclimatique GRANDLUX Autoportée Standard [2281]
  $('#price_2281').val(0);
  $('#ndk-accessory-quantity-17814').val(0);
  $('#ndk-accessory-quantity-17815').val(0);
  $('#ndk-accessory-quantity-17816').val(0);
  $('#ndk-accessory-quantity-17817').val(0);
  $('#ndk-accessory-quantity-17818').val(0);
  $('#ndk-accessory-quantity-17819').val(0);
  $('#ndk-accessory-quantity-17820').val(0);
  $('#ndk-accessory-quantity-17821').val(0);
  $('#ndk-accessory-quantity-17822').val(0);
  $('#ndk-accessory-quantity-17823').val(0);
  $('#ndk-accessory-quantity-17824').val(0);
  $('#ndk-accessory-quantity-17825').val(0);
  $('#ndk-accessory-quantity-30863').val(0);
  $('#ndk-accessory-quantity-30864').val(0);
  $('#ndk-accessory-quantity-30865').val(0);
  $('#ndk-accessory-quantity-30866').val(0);
  $('#ndk-accessory-quantity-31029').val(0);
  $('#ndk-accessory-quantity-31030').val(0);
  $('#ndk-accessory-quantity-31031').val(0);
  $('#ndk-accessory-quantity-31032').val(0);

  // Fechos Pergola Bioclimatique EASY Adossée Lame Simple et Double [4878]
  $('#price_4878').val(0);
  $('#ndk-accessory-quantity-28272').val(0);
  $('#ndk-accessory-quantity-28273').val(0);
  $('#ndk-accessory-quantity-28274').val(0);
  $('#ndk-accessory-quantity-28275').val(0);
  $('#ndk-accessory-quantity-28276').val(0);
  $('#ndk-accessory-quantity-28277').val(0);
  $('#ndk-accessory-quantity-28278').val(0);
  $('#ndk-accessory-quantity-28279').val(0);
  $('#ndk-accessory-quantity-28280').val(0);
  $('#ndk-accessory-quantity-30836').val(0);
  $('#ndk-accessory-quantity-30837').val(0);
  $('#ndk-accessory-quantity-30838').val(0);
  $('#ndk-accessory-quantity-30935').val(0);
  $('#ndk-accessory-quantity-30936').val(0);
  $('#ndk-accessory-quantity-30937').val(0);

  // Fechos Pergola Bioclimatique GRANDLUX Adossée Sur Mesure [2018]
  $('#price_2018').val(0);
  $('#ndk-accessory-quantity-15102').val(0);
  $('#ndk-accessory-quantity-15103').val(0);
  $('#ndk-accessory-quantity-15104').val(0);
  $('#ndk-accessory-quantity-15106').val(0);
  $('#ndk-accessory-quantity-15107').val(0);
  $('#ndk-accessory-quantity-15108').val(0);
  $('#ndk-accessory-quantity-15110').val(0);
  $('#ndk-accessory-quantity-15111').val(0);
  $('#ndk-accessory-quantity-15112').val(0);
  $('#ndk-accessory-quantity-30846').val(0);
  $('#ndk-accessory-quantity-30847').val(0);
  $('#ndk-accessory-quantity-30848').val(0);
  $('#ndk-accessory-quantity-31012').val(0);
  $('#ndk-accessory-quantity-31013').val(0);
  $('#ndk-accessory-quantity-31014').val(0);

  // Fechos Pergola Bioclimatique PROMO (STARTER) Adossée Standard [2017]
  $('#price_2017').val(0);
  $('#ndk-accessory-quantity-15094').val(0);
  $('#ndk-accessory-quantity-15095').val(0);
  $('#ndk-accessory-quantity-15096').val(0);
  $('#ndk-accessory-quantity-15098').val(0);
  $('#ndk-accessory-quantity-15099').val(0);
  $('#ndk-accessory-quantity-15100').val(0);
  $('#ndk-accessory-quantity-16284').val(0);
  $('#ndk-accessory-quantity-16285').val(0);
  $('#ndk-accessory-quantity-16286').val(0);
  $('#ndk-accessory-quantity-30853').val(0);
  $('#ndk-accessory-quantity-30854').val(0);
  $('#ndk-accessory-quantity-30855').val(0);
  $('#ndk-accessory-quantity-31019').val(0);
  $('#ndk-accessory-quantity-31020').val(0);
  $('#ndk-accessory-quantity-31021').val(0);

  // Fechos Pergola Bioclimatique GRANDLUX Adossée Standard [2280]
  $('#price_2280').val(0);
  $('#ndk-accessory-quantity-17805').val(0);
  $('#ndk-accessory-quantity-17806').val(0);
  $('#ndk-accessory-quantity-17807').val(0);
  $('#ndk-accessory-quantity-17808').val(0);
  $('#ndk-accessory-quantity-17809').val(0);
  $('#ndk-accessory-quantity-17810').val(0);
  $('#ndk-accessory-quantity-17811').val(0);
  $('#ndk-accessory-quantity-17812').val(0);
  $('#ndk-accessory-quantity-17813').val(0);
  $('#ndk-accessory-quantity-30860').val(0);
  $('#ndk-accessory-quantity-30861').val(0);
  $('#ndk-accessory-quantity-30862').val(0);
  $('#ndk-accessory-quantity-31026').val(0);
  $('#ndk-accessory-quantity-31027').val(0);
  $('#ndk-accessory-quantity-31028').val(0);

  // Oculta campos Service de Pose
  $("div[data-field='5465']").hide();
  $("div[data-field='5467']").hide();

  // Oculta campos Cor do Estore das pergolas
  $("div[data-field='2234']").hide(); // PROMO (STARTER) Adossée et Autoportée STD
  $("div[data-field='4779']").hide(); // PROMO (STARTER) Adossée et Autoportée STD Manuelle
  $("div[data-field='4991']").hide(); //
  $("div[data-field='2289']").hide(); // GRANDLUX Adossée STD
  $("div[data-field='4913']").hide(); // GRANDLUX Autoportée STD
  $("div[data-field='2251']").hide(); // GRANDLUX Adossée et Autoportée Sur Mesure
  $("div[data-field='4879']").hide(); // EASY Adossée SM
  $("div[data-field='4881']").hide(); // EASY Autoportée SM

  // Oculta campo Cor da Estrutura do Estore das pergolas
  $("div[data-field='3065']").css("display", "none");

  // Oculta campos Cor do Estore Zip das pergolas
  $("div[data-field='5587']").hide(); // EASY Adossée et Autoportée SM
  $("div[data-field='5598']").hide(); // GRANDLUX Adossée et Autoportée SM
  $("div[data-field='5599']").hide(); // PROMO (STARTER) Adossée et Autoportée STD
  $("div[data-field='5600']").hide(); // GRANDLUX Adossée et Autoportée STD

  // Oculta campo Número de Folhas das Cortinas de Vidro das pergolas
  $("div[data-field='5617']").css("display", "none");


function ChangeInfoFieldsPB(num){
	$("div[data-field='" + num + "'] div.field_notice").html("<p></p>");
	$("#dimension_text_width_" + num).attr('placeholder', 'Profondeur');
	$("#dimension_text_height_" + num).attr('placeholder', 'Largeur');
	$("#dimension_text_height_" + num).css("display", "none");
}

	// ********** PERGOLA - INICIO ********** //

	//   // ********** GRANDLUX ADOSE SUR MESURE  PROMOTION********** //
	//   var aluclass_id_product = ["640152"];
	//   if ($.inArray(id_product, aluclass_id_product) !== -1) {
	// 	  $(".ndkackFieldItem[data-field='2018']").hide();
	// 	  $(".ndkackFieldItem[data-field='4929']").hide();
	// 	  $(".img-value[data-id-value='28487']").trigger('click');

	// 	  $('#price_15102').html('0 €'); //Estore Esquerdo
	// 	  $('#ndk-accessory-quantity-15102').attr('data-price', 0);
	// 	  $('#price_15103').html('0 €'); //Estore Direito
	// 	  $('#ndk-accessory-quantity-15103').attr('data-price', 0);
	// 	  $('#price_15104').html('0 €'); //Estore frente
	// 	  $('#ndk-accessory-quantity-15104').attr('data-price', 0);

	// 		var aluclass_id_NDK = ["4928"]; //Profundidade
	// 		aluclass_id_NDK.forEach(function (num) {
	// 		  ChangeInfoFieldsPB(num);
	// 		});

	// 	  $('#dimension_text_width_2021').attr('placeholder', 'Hauteur'); //Altura Grandlux Autoportee Sur Mesure
	// 	  $("#dimension_text_height_2021").css("display", "none");
	//   }

	// // ********** GRANDLUX AUTOPORTEE SUR MESURE  PROMOTION********** //
	//   var aluclass_id_product = ["640153"];
	//   if ($.inArray(id_product, aluclass_id_product) !== -1) {
	// 	  $(".ndkackFieldItem[data-field='2014']").hide();
	// 	  $(".ndkackFieldItem[data-field='4929']").hide();
	// 	  $(".img-value[data-id-value='28487']").trigger('click');

	// 	  $('#price_15076').html('0 €'); //Estore Esquerdo
	// 	  $('#ndk-accessory-quantity-15076').attr('data-price', 0);
	// 	  $('#price_15077').html('0 €'); //Estore Direito
	// 	  $('#ndk-accessory-quantity-15077').attr('data-price', 0);
	// 	  $('#price_15078').html('0 €'); //Estore Frente
	// 	  $('#ndk-accessory-quantity-15078').attr('data-price', 0);
	// 	  $('#price_15079').html('0 €'); //Estore Atrás
	// 	  $('#ndk-accessory-quantity-15079').attr('data-price', 0);

	// 		var aluclass_id_NDK = ["4930"]; //Profundidade
	// 		aluclass_id_NDK.forEach(function (num) {
	// 		  ChangeInfoFieldsPB(num);
	// 		});

	// 	  $('#dimension_text_width_2013').attr('placeholder', 'Hauteur'); //Altura Grandlux Autoportee Sur Mesure
	// 	  $("#dimension_text_height_2013").css("display", "none");
	//   }

	// ********** GRANDLUX AUTOPORTEE SUR MESURE ********** //
	var aluclass_id_product = ["640151"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_id_NDK = ["2016", "4204", "4203", "4922", "4921", "4920"]; //Profundidade
		aluclass_id_NDK.forEach(function (num) {
      ChangeInfoFieldsPB(num);
		});
    $('#dimension_text_width_2013').attr('placeholder', 'Hauteur'); //Altura Grandlux Autoportee Sur Mesure
    $("#dimension_text_height_2013").css("display", "none");
    // $("#descriptionimg_28427").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Grandlux Autoportee Sur Mesure [4914]

    // $(".color-ndk[data-id-value='17912']").click();

    // $('#price_15076').html('0 €'); //Estore Esquerdoimg_
    // $("#img_div_15076").trigger( "mousedown" );
    // $('#ndk-accessory-quantity-15076').attr('data-price', 0);
    // $('#price_15077').html('0 €'); //Estore Direito
    // $("#img_div_15077").trigger( "mousedown" );
    // $('#ndk-accessory-quantity-15077').attr('data-price', 0);
    // $('#price_15078').html('0 €'); //Estore frente
    // $("#img_div_15078").trigger( "mousedown" );
    // $('#ndk-accessory-quantity-15078').attr('data-price', 0);
	}

	// ********** GRANDLUX ADOSSEE SUR MESURE ********** //
  var aluclass_id_product = ["1379"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_id_NDK = ["2020", "4206", "4205", "4919", "4918", "4917"]; //Profundidade
		aluclass_id_NDK.forEach(function (num) {
      ChangeInfoFieldsPB(num);
		});
    $('#dimension_text_width_2021').attr('placeholder', 'Hauteur'); //Altura Grandlux Adossee Sur Mesure
    $("#dimension_text_height_2021").css("display", "none");
    // $("#descriptionimg_15085").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Grandlux Adossee Sur Mesure [2015]

    // $(".color-ndk[data-id-value='15030']").click();

    // $('#price_15102').html('0 €'); //Estore Esquerdo
    // $("#img_div_15102").trigger( "mousedown" );
    // $('#ndk-accessory-quantity-15102').attr('data-price', 0);
    // $('#price_15103').html('0 €'); //Estore Direito
    // $("#img_div_15103").trigger( "mousedown" );
    // $('#ndk-accessory-quantity-15103').attr('data-price', 0);
    // $('#price_15104').html('0 €'); //Estore frente
    // $("#img_div_15104").trigger( "mousedown" );
    // $('#ndk-accessory-quantity-15104').attr('data-price', 0);
	}

  	// ********** GRANDLUX POTEAU DEPORTE SUR MESURE ********** //
    var aluclass_id_product = ["79936"];
    if ($.inArray(id_product, aluclass_id_product) !== -1) {
      var aluclass_id_NDK = ["4925", "4926", "4927", "4243", "4244", "2243"]; //Profundidade
      aluclass_id_NDK.forEach(function (num) {
        ChangeInfoFieldsPB(num);
      });
      $('#dimension_text_width_2244').attr('placeholder', 'Hauteur'); //Altura Grandlux Poteau Deporte Sur Mesure
      $("#dimension_text_height_2244").css("display", "none");
      $("#descriptionimg_17898").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Grandlux Poteau Deporte Sur Mesure [2296]
    }


	// ********** EASY ADOSSEE SUR MESURE ********** //
  var aluclass_id_product = ["640147", "640207"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var aluclass_id_NDK = ["4896", "4899", "4900", "4894", "4891", "4892", "5158", "5159", "5160", "5161", "5162", "5163"]; //Profundidade
    aluclass_id_NDK.forEach(function (num) {
      ChangeInfoFieldsPB(num);
    });
    $(".dimension_text_height_5161").css("display", "none");
    $("#descriptionimg_28298").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Easy SM Adossée [4882]
    var aluclass_remove_preview = [];
    aluclass_remove_preview[1] = [5241];
    aluclass_remove_preview[1].forEach(function (num) {
      $(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
    });
  }

  // ********** EASY AUTOPORTEE SUR MESURE ********** //
  var aluclass_id_product = ["640148", "640208"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var aluclass_id_NDK = ["4895", "4898", "4897", "4893", "4890", "4889", "5173", "5174", "5175", "5176", "5177", "5178"]; //Profundidade
    aluclass_id_NDK.forEach(function (num) {
      ChangeInfoFieldsPB(num);
    });
    $(".dimension_text_height_5176").css("display", "none");
    $("#descriptionimg_28259").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Easy SM Autoportée [4876]
    var aluclass_remove_preview = [];
    aluclass_remove_preview[1] = [5241];
    aluclass_remove_preview[1].forEach(function (num) {
      $(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
    });
  }

    $("#descriptionimg_15001").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-125€</span>) "); //Prmo (Starter) Autoportee [2000]
    $("#descriptionimg_28405").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-125€</span>) "); //Promo (Starter) Adossee [4909]
    $("#descriptionimg_28415").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Grandlux Autoportee Standard [4912]
    $("#descriptionimg_17833").html("Kit de Contrôle Plus (<span style='color: var(--red);'>-205€</span>) "); //Grandlux Adossee Standard [2288]

    // ********** PERGOLA - FIM ********** //

});


// ********** OFERTA MESAS ********** //
$(document).on('click', '.color-ndk', function () {
  var aluclass_id_product = ["640147", "640148", "640207", "640208"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
      $(".img-value-5241").trigger('click');
  }
});


// ********** PERGOLA BIOCLIMATICA PROMO (STARTER) ADOSSEE STANDARD  ********** //

$(".color-ndk[data-group='2019'], .img-value-4909").click(function () {
  $('.product_2017_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(2234);
  RemoveField(5599);
});

$("input[name='ndkcsfield[4910]'], input[name='ndkcsfield[2029]']").click(function () { //Dimensões Adossee

  $('.product_2017_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(2234);
  RemoveField(5599);

  var idgroup = $(this).data('group');
  if(idgroup == '4910'){
    $("input[name='ndkcsfield[2029]']").prop('checked', false); //Dimensões Adossee Motorisee
  }else{
    $("input[name='ndkcsfield[4910]']").prop('checked', false); //Dimensões Adossee Manuelle
  }

	var id_value = $("input[name='ndkcsfield["+idgroup+"]']:checked").data('id-value');

	switch (id_value) {

    // ********** PROMO (STARTER) ADOSSEE STANDARD MOTORISEE [2029] ********** //
    case 15239:
      //3000 x 4097
      PriceStoreDirEsq = 1122;
      PriceStoreFreTras = 1266;
      PriceCorrerDirEsq = 2876;
      PriceCorrerFreTras = 3585;
      PriceOcardianDirEsq = 4987;
      PriceOcardianFreTras = 5731;
      PriceCortinaVidroDirEsq = 2619;
      PriceCortinaVidroFreTras = 3536;
      PriceStoreZipDirEsq = 2395;
      PriceStoreZipFreTras = 2709;
      break;

    case 15240:
      //3000 x 5092
      PriceStoreDirEsq = 1122;
      PriceStoreFreTras = 1411;
      PriceCorrerDirEsq = 2876;
      PriceCorrerFreTras = 4771;
      PriceOcardianDirEsq = 4987;
      PriceOcardianFreTras = 6538;
      PriceCortinaVidroDirEsq = 2619;
      PriceCortinaVidroFreTras = 4293;
      PriceStoreZipDirEsq = 2395;
      PriceStoreZipFreTras = 3144;
      break;

    case 15241:
      //4000 x 4097
      PriceStoreDirEsq = 1266;
      PriceStoreFreTras = 1266;
      PriceCorrerDirEsq = 3585;
      PriceCorrerFreTras = 3585;
      PriceOcardianDirEsq = 5731;
      PriceOcardianFreTras = 5731;
      PriceCortinaVidroDirEsq = 3536;
      PriceCortinaVidroFreTras = 3536;
      PriceStoreZipDirEsq = 2709;
      PriceStoreZipFreTras = 2709;
      break;

    case 15242:
      //4000 x 5092
      PriceStoreDirEsq = 1266;
      PriceStoreFreTras = 1411;
      PriceCorrerDirEsq = 3585;
      PriceCorrerFreTras = 4771;
      PriceOcardianDirEsq = 5731;
      PriceOcardianFreTras = 6538;
      PriceCortinaVidroDirEsq = 3536;
      PriceCortinaVidroFreTras = 4293;
      PriceStoreZipDirEsq = 2709;
      PriceStoreZipFreTras = 3144;
      break;

    // ********** PROMO (STARTER) ADOSSEE STANDARD MANUELLE [4910] ********** //
    case 28407:
      //3000 x 4097
      PriceStoreDirEsq = 894;
      PriceStoreFreTras = 1026;
      PriceCorrerDirEsq = 2572;
      PriceCorrerFreTras = 3222;
      PriceOcardianDirEsq = 4575;
      PriceOcardianFreTras = 5114;
      break;

    case 28408:
      //3000 x 5092
      PriceStoreDirEsq = 894;
      PriceStoreFreTras = 1159;
      PriceCorrerDirEsq = 2572;
      PriceCorrerFreTras = 4300;
      PriceOcardianDirEsq = 4575;
      PriceOcardianFreTras = 6986;
      break;

    case 28409:
      //4000 x 4097
      PriceStoreDirEsq = 1026;
      PriceStoreFreTras = 1026;
      PriceCorrerDirEsq = 3222;
      PriceCorrerFreTras = 3222;
      PriceOcardianDirEsq = 5114;
      PriceOcardianFreTras = 5114;
      break;

    case 28410:
      //4000 x 5092
      PriceStoreDirEsq = 1026;
      PriceStoreFreTras = 1159;
      PriceCorrerDirEsq = 3222;
      PriceCorrerFreTras = 4300;
      PriceOcardianDirEsq = 5114;
      PriceOcardianFreTras = 6986;
      break;

    default:
      PriceStoreDirEsq = 931;
      PriceStoreFreTras = 1050;
      PriceCorrerDirEsq = 2327;
      PriceCorrerFreTras = 2916;
      PriceOcardianDirEsq = 4140;
      PriceOcardianFreTras = 4628;
      PriceCortinaVidroDirEsq = 2183;
      PriceCortinaVidroFreTras = 2947;
      PriceStoreZipDirEsq = 1996;
      PriceStoreZipFreTras = 2258;
  }

	//Estore
  var pricedesc = PriceStoreDirEsq-(PriceStoreDirEsq*valorReducao);
	$('#price_15094').html(' + <s>'+PriceStoreDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore Esquerdo
	$('#ndk-accessory-quantity-15094').attr('data-price', PriceStoreDirEsq);
	$('#price_15095').html(' + <s>'+PriceStoreDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore Direito
	$('#ndk-accessory-quantity-15095').attr('data-price', PriceStoreDirEsq);
  var pricedesc = PriceStoreFreTras-(PriceStoreFreTras*valorReducao);
	$('#price_15096').html(' + <s>'+PriceStoreFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore Frente
	$('#ndk-accessory-quantity-15096').attr('data-price', PriceStoreFreTras);

	//Porta-Janela de Correr (Menuiseire)
  var pricedesc = PriceCorrerDirEsq-(PriceCorrerDirEsq*valorReducao);
	$('#price_15098').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
	$('#ndk-accessory-quantity-15098').attr('data-price', PriceCorrerDirEsq);
	$('#price_15099').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Direito
	$('#ndk-accessory-quantity-15099').attr('data-price', PriceCorrerDirEsq);
  var pricedesc = PriceCorrerFreTras-(PriceCorrerFreTras*valorReducao);
  $('#price_15100').html(' + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
	$('#ndk-accessory-quantity-15100').attr('data-price', PriceCorrerFreTras);

	//Porta Accordeon (Ocardian)
  var pricedesc = PriceOcardianDirEsq-(PriceOcardianDirEsq*valorReducao);
	$('#price_16284').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
	$('#ndk-accessory-quantity-16284').attr('data-price', PriceOcardianDirEsq);
	$('#price_16285').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
	$('#ndk-accessory-quantity-16285').attr('data-price', PriceOcardianDirEsq);
  var pricedesc = PriceOcardianFreTras-(PriceOcardianFreTras*valorReducao);
  $('#price_16286').html(' + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
	$('#ndk-accessory-quantity-16286').attr('data-price', PriceOcardianFreTras);

  //Cortina de Vidro
  var pricedesc = PriceCortinaVidroDirEsq-(PriceCortinaVidroDirEsq*valorReducao);
  $('#price_30853').html(' + <s>'+PriceCortinaVidroDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Esquerdo
  $('#ndk-accessory-quantity-30853').attr('data-price', PriceCortinaVidroDirEsq);
  $('#price_30854').html(' + <s>'+PriceCortinaVidroDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Direito
  $('#ndk-accessory-quantity-30854').attr('data-price', PriceCortinaVidroDirEsq);
  var pricedesc = PriceCortinaVidroFreTras-(PriceCortinaVidroFreTras*valorReducao);
  $('#price_30855').html(' + <s>'+PriceCortinaVidroFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Frente
  $('#ndk-accessory-quantity-30855').attr('data-price', PriceCortinaVidroFreTras);

  //Estore ZIP
  var pricedesc = PriceStoreZipDirEsq-(PriceStoreZipDirEsq * valorReducao);
  $('#price_31019').html(' + <s>'+PriceStoreZipDirEsq+' €</s><span style="color: var(--red);"> ' +pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Esquerdo
  $('#ndk-accessory-quantity-31019').attr('data-price', PriceStoreZipDirEsq);
  $('#price_31020').html(' + <s>'+PriceStoreZipDirEsq+' €</s><span style="color: var(--red);"> ' +pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Direito
  $('#ndk-accessory-quantity-31020').attr('data-price', PriceStoreZipDirEsq);
  var pricedesc = PriceStoreZipFreTras-(PriceStoreZipFreTras*valorReducao);
  $('#price_31021').html(' + <s>'+PriceStoreZipFreTras+' €</s><span style="color: var(--red);"> ' +pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Frente
  $('#ndk-accessory-quantity-31021').attr('data-price', PriceStoreZipFreTras);

});


// ********** PERGOLA BIOCLIMATICA PROMO (START) AUTOPORTEE STANDARD  ********** //

$(".color-ndk[data-group='2011'], .img-value-2000").click(function () {
  $('.product_2001_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(2234);
  RemoveField(5599);
});

$("input[name='ndkcsfield[4908]'], input[name='ndkcsfield[1503]']").click(function () { //Dimensões Autoportee
  $('.product_2001_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(2234);
  RemoveField(5599);

  var idgroup = $(this).data('group');
  if(idgroup == '4908'){
    $("input[name='ndkcsfield[1503]']").prop('checked', false); //Dimensões Autoportee Motorisee
  }else{
    $("input[name='ndkcsfield[4908]']").prop('checked', false); //Dimensões Autoportee Manuelle
  }

	var id_value = $("input[name='ndkcsfield["+idgroup+"]']:checked").data('id-value');

		switch (id_value) {

			// ********** PROMO (STARTER) AUTOPORTEE STANDARD MOTORISEE [1503] ********** //
      case 13174:
        //3000 x 4087
        PriceStoreDirEsq = 1122;
        PriceStoreFreTras = 1266;
        PriceCorrerDirEsq = 2876;
        PriceCorrerFreTras = 3585;
        PriceOcardianDirEsq = 4987;
        PriceOcardianFreTras = 5731;
        PriceCortinaVidroDirEsq = 2619;
        PriceCortinaVidroFreTras = 3536;
        PriceStoreZipDirEsq = 2395;
        PriceStoreZipFreTras = 2709;
        break;

      case 13175:
        //3000 x 5082
        PriceStoreDirEsq = 1122;
        PriceStoreFreTras = 1411;
        PriceCorrerDirEsq = 2876;
        PriceCorrerFreTras = 4771;
        PriceOcardianDirEsq = 4987;
        PriceOcardianFreTras = 6538;
        PriceCortinaVidroDirEsq = 2619;
        PriceCortinaVidroFreTras = 4293;
        PriceStoreZipDirEsq = 2395;
        PriceStoreZipFreTras = 3144;
        break;

      case 13176:
        //4000 x 4087
        PriceStoreDirEsq = 1266;
        PriceStoreFreTras = 1266;
        PriceCorrerDirEsq = 3585;
        PriceCorrerFreTras = 3585;
        PriceOcardianDirEsq = 5731;
        PriceOcardianFreTras = 5731;
        PriceCortinaVidroDirEsq = 3536;
        PriceCortinaVidroFreTras = 3536;
        PriceStoreZipDirEsq = 2709;
        PriceStoreZipFreTras = 2709;
        break;

      case 13177:
        //4000 x 5082
        PriceStoreDirEsq = 1266;
        PriceStoreFreTras = 1411;
        PriceCorrerDirEsq = 3585;
        PriceCorrerFreTras = 4771;
        PriceOcardianDirEsq = 5731;
        PriceOcardianFreTras = 6538;
        PriceCortinaVidroDirEsq = 3536;
        PriceCortinaVidroFreTras = 4293;
        PriceStoreZipDirEsq = 2709;
        PriceStoreZipFreTras = 3144;
        break;

      // ********** PROMO (STARTER) AUTOPORTEE STANDARD MANUELLE [4908] ********** //
      case 28400:
        //3000 x 4087
        PriceStoreDirEsq = 894;
        PriceStoreFreTras = 1026;
        PriceCorrerDirEsq = 2572;
        PriceCorrerFreTras = 3222;
        PriceOcardianDirEsq = 4575;
        PriceOcardianFreTras = 5114;
        break;

      case 28401:
        //3000 x 5082
        PriceStoreDirEsq = 894;
        PriceStoreFreTras = 1159;
        PriceCorrerDirEsq = 2572;
        PriceCorrerFreTras = 4300;
        PriceOcardianDirEsq = 4575;
        PriceOcardianFreTras = 6986;
        break;

      case 28402:
        //4000 x 4087
        PriceStoreDirEsq = 1026;
        PriceStoreFreTras = 1026;
        PriceCorrerDirEsq = 3222;
        PriceCorrerFreTras = 3222;
        PriceOcardianDirEsq = 5114;
        PriceOcardianFreTras = 5114;
        break;

      case 28403:
        //4000 x 5082
        PriceStoreDirEsq = 1026;
        PriceStoreFreTras = 1159;
        PriceCorrerDirEsq = 3222;
        PriceCorrerFreTras = 4300;
        PriceOcardianDirEsq = 5114;
        PriceOcardianFreTras = 6986;
        break;

      default:
        PriceStoreDirEsq = 931;
        PriceStoreFreTras = 1103;
        PriceCorrerDirEsq = 2327;
        PriceCorrerFreTras = 3062;
        PriceOcardianDirEsq = 4347;
        PriceOcardianFreTras = 6986;
        PriceCortinaVidroDirEsq = 2183;
        PriceCortinaVidroFreTras = 2947;
        PriceStoreZipDirEsq = 1996;
        PriceStoreZipFreTras = 2258;
		}

	//Estore
  var pricedesc = PriceStoreDirEsq-(PriceStoreDirEsq*valorReducao);
  $('#price_15002').html(' + <s>'+PriceStoreDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore Esquerdo
	$('#ndk-accessory-quantity-15002').attr('data-price', PriceStoreDirEsq);
  $('#price_15003').html(' + <s>'+PriceStoreDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Estore Direito
	$('#ndk-accessory-quantity-15003').attr('data-price', PriceStoreDirEsq);
  var pricedesc = PriceStoreFreTras-(PriceStoreFreTras*valorReducao);
	$('#price_15004').html(' + <s>'+PriceStoreFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore Frente
	$('#ndk-accessory-quantity-15004').attr('data-price', PriceStoreFreTras);
	$('#price_15005').html(' + <s>'+PriceStoreFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Estore Atrás
	$('#ndk-accessory-quantity-15005').attr('data-price', PriceStoreFreTras);

	//Porta-Janela de Correr (Menuiserie)
  var pricedesc = PriceCorrerDirEsq-(PriceCorrerDirEsq*valorReducao);
  $('#price_15006').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
	$('#ndk-accessory-quantity-15006').attr('data-price',  PriceCorrerDirEsq);
	$('#price_15007').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Menuiserie Direito
	$('#ndk-accessory-quantity-15007').attr('data-price',  PriceCorrerDirEsq);
  var pricedesc = PriceCorrerFreTras-(PriceCorrerFreTras*valorReducao);
  $('#price_15008').html(' + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
	$('#ndk-accessory-quantity-15008').attr('data-price', PriceCorrerFreTras);
	$('#price_15009').html(' + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Menuiserie Atrás
	$('#ndk-accessory-quantity-15009').attr('data-price', PriceCorrerFreTras);

	//Porta Accordeon (Ocardian)
  var pricedesc = PriceOcardianDirEsq-(PriceOcardianDirEsq*valorReducao);
	$('#price_16280').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
	$('#ndk-accessory-quantity-16280').attr('data-price',  PriceOcardianDirEsq);
	$('#price_16281').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
	$('#ndk-accessory-quantity-16281').attr('data-price',  PriceOcardianDirEsq);
  var pricedesc = PriceOcardianFreTras-(PriceOcardianFreTras*valorReducao);
	$('#price_16282').html(' + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
	$('#ndk-accessory-quantity-16282').attr('data-price', PriceOcardianFreTras);
	$('#price_16283').html(' + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Acordeon Atrás
	$('#ndk-accessory-quantity-16283').attr('data-price', PriceOcardianFreTras);

  //Cortina de Vidro
  var pricedesc = PriceCortinaVidroDirEsq-(PriceCortinaVidroDirEsq*valorReducao);
  $('#price_30856').html(' + <s>'+PriceCortinaVidroDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Esquerdo
  $('#ndk-accessory-quantity-30856').attr('data-price', PriceCortinaVidroDirEsq);
  $('#price_30857').html(' + <s>'+PriceCortinaVidroDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Direito
  $('#ndk-accessory-quantity-30857').attr('data-price', PriceCortinaVidroDirEsq);
  var pricedesc = PriceCortinaVidroFreTras-(PriceCortinaVidroFreTras*valorReducao);
  $('#price_30858').html(' + <s>'+PriceCortinaVidroFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Frente
  $('#ndk-accessory-quantity-30858').attr('data-price', PriceCortinaVidroFreTras);
  $('#price_30859').html(' + <s>'+PriceCortinaVidroFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Atrás
  $('#ndk-accessory-quantity-30859').attr('data-price', PriceCortinaVidroFreTras);

  //Estore ZIP
  var pricedesc = PriceStoreZipDirEsq-(PriceStoreZipDirEsq*valorReducao);
  $('#price_31022').html(' + <s>'+PriceStoreZipDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Esquerdo
  $('#ndk-accessory-quantity-31022').attr('data-price', PriceStoreZipDirEsq);
  $('#price_31023').html(' + <s>'+PriceStoreZipDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Direito
  $('#ndk-accessory-quantity-31023').attr('data-price', PriceStoreZipDirEsq);
  var pricedesc = PriceStoreZipFreTras-(PriceStoreZipFreTras*valorReducao);
  $('#price_31024').html(' + <s>'+PriceStoreZipFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Frente
  $('#ndk-accessory-quantity-31024').attr('data-price', PriceStoreZipFreTras);
  $('#price_31025').html(' + <s>'+PriceStoreZipFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Atrás
  $('#ndk-accessory-quantity-31025').attr('data-price', PriceStoreZipFreTras);

});


// ********** PERGOLA BIOCLIMATICA GRANDLUX ADOSSEE STANDARD MANUELLE ********** //
/*
$("input[name='ndkcsfield[2276]'] , input[name='ndkcsfield[4589]").click(function () {

	//$("input[name='ndkcsfield[2277]']").prop('checked', false);
	//$("input[name='ndkcsfield[4590]']").prop('checked', false);

  if($("input[name='ndkcsfield[4589]']:checked").length == 1)
		var id_value = $("input[name='ndkcsfield[4589]']:checked").data('id-value');
	else
		var id_value = $("input[name='ndkcsfield[2276]']:checked").data('id-value');

    var arrayIdValueField = [17793, 17794, 17795, 17796];

		var arrayIdValueFieldPDF = [
			[17793, "Pergola Adossée ",4000,3410],
			[17794, "Pergola Adossée ",4000,4003],
			[17795, "Pergola Adossée ",4800,3608],
			[17796, "Pergola Adossée ",4800,4003],
		];

    if ($.inArray(id_value, arrayIdValueField) !== -1) {
      for (i = 0; i < arrayIdValueFieldPDF.length; i++) {
        if (parseInt(id_value) == parseInt(arrayIdValueFieldPDF[i][0])) {
           ShowFileTechnical(arrayIdValueFieldPDF[i][1],arrayIdValueFieldPDF[i][2],arrayIdValueFieldPDF[i][3],1);
        }
      }
    }
  */

  // ********** PERGOLA BIOCLIMATICA GRANDLUX ADOSSEE STANDARD  ********** //

  $(".color-ndk[data-group='2278'], .img-value-2288").click(function () {
    $('.product_2280_0.accessory-ndk.selected-accessory img').trigger('click');
    RemoveField(2289);
    RemoveField(5600);
  });

  $("input[name='ndkcsfield[4906]'], input[name='ndkcsfield[2276]'] ").click(function () { //Dimensões Adossee Manuelle
    $('.product_2280_0.accessory-ndk.selected-accessory img').trigger('clicks');
    RemoveField(2289);
    RemoveField(5600);

    var idgroup = $(this).data('group');
    if(idgroup == '4906'){
      $("input[name='ndkcsfield[2276]']").prop('checked', false); //Dimensões ADOSSEE Motorisee
    }else{
      $("input[name='ndkcsfield[4906]']").prop('checked', false); //Dimensões ADOSSEE Manuelle
    }

    var id_value = $("input[name='ndkcsfield["+idgroup+"]']:checked").data('id-value');

    switch (id_value) {

      // ********** GRANDLUX ADOSSEE STANDARD MOTORISEE [2276] ********** //
      case 17793:
        //4000 x 3474
        PriceStoreDirEsq = 1266;
        PriceStoreFreTras = 1195;
        PriceCorrerDirEsq = 3515;
        PriceCorrerFreTras = 3161;
        PriceOcardianDirEsq = 5731;
        PriceOcardianFreTras = 5417;
        PriceCortinaVidroDirEsq = 3536;
        PriceCortinaVidroFreTras = 2994;
        PriceStoreZipDirEsq = 6772;
        PriceStoreZipFreTras = 6341;
        break;

      case 17794:
        //4000 x 4067
        PriceStoreDirEsq = 1266;
        PriceStoreFreTras = 1281;
        PriceCorrerDirEsq = 3515;
        PriceCorrerFreTras = 3585;
        PriceOcardianDirEsq = 5731;
        PriceOcardianFreTras = 5731;
        PriceCortinaVidroDirEsq = 3536;
        PriceCortinaVidroFreTras = 3611;
        PriceStoreZipDirEsq = 6772;
        PriceStoreZipFreTras = 6882;
        break;

      case 17795:
        //5000 x 3671
        PriceStoreDirEsq = 1411;
        PriceStoreFreTras = 1224;
        PriceCorrerDirEsq = 4691;
        PriceCorrerFreTras = 3303;
        PriceOcardianDirEsq = 6538;
        PriceOcardianFreTras = 5486;
        PriceCortinaVidroDirEsq = 4293;
        PriceCortinaVidroFreTras = 3144;
        PriceStoreZipDirEsq = 7860;
        PriceStoreZipFreTras = 6484;
        break;

      case 17796:
        //5000 x 4067
        PriceStoreDirEsq = 1411;
        PriceStoreFreTras = 1281;
        PriceCorrerDirEsq = 4691;
        PriceCorrerFreTras = 3585;
        PriceOcardianDirEsq = 6538;
        PriceOcardianFreTras = 5731;
        PriceCortinaVidroDirEsq = 4293;
        PriceCortinaVidroFreTras = 3611;
        PriceStoreZipDirEsq = 7860;
        PriceStoreZipFreTras = 6882;
        break;

        // ********** GRANDLUX ADOSSEE STANDARD MANUELLE [4906] ********** //
        //case 27125:
        case 28391:
          //4000 x 3410
          PriceStoreDirEsq = 900;
          PriceStoreFreTras = 975;
          PriceCorrerDirEsq = 2692;
          PriceCorrerFreTras = 3062;
          PriceOcardianDirEsq = 3631;
          PriceOcardianFreTras = 5058;
          break;

        //case 27126:
        case 28392:
          //4000 x 4003
          PriceStoreDirEsq = 975;
          PriceStoreFreTras = 975;
          PriceCorrerDirEsq = 3062;
          PriceCorrerFreTras = 3062;
          PriceOcardianDirEsq = 5058;
          PriceOcardianFreTras = 5058;
          break;

        //case 27127:
        case 28393:
          //4800 x 3608
          PriceStoreDirEsq = 1076;
          PriceStoreFreTras = 925;
          PriceCorrerDirEsq = 2814;
          PriceCorrerFreTras = 3944;
          PriceOcardianDirEsq = 3700;
          PriceOcardianFreTras = 5311;
          break;

        //case 27129:
        case 28394:
          //4800 x 4003
          PriceStoreDirEsq = 1076;
          PriceStoreFreTras = 975;
          PriceCorrerDirEsq = 3062;
          PriceCorrerFreTras = 3944;
          PriceOcardianDirEsq = 5058;
          PriceOcardianFreTras = 5311;
          break;

          default:
            PriceStoreDirEsq = 975;
            PriceStoreFreTras = 1103;
            PriceCorrerDirEsq = 2563;
            PriceCorrerFreTras = 2916;
            PriceOcardianDirEsq = 3631;
            PriceOcardianFreTras = 5058;
            PriceCortinaVidroDirEsq = 2563;
            PriceCortinaVidroFreTras = 2916;
            PriceStoreZipDirEsq = 975;
            PriceStoreZipFreTras = 1103;
    }

  //Estore
  var pricedesc = PriceStoreDirEsq-(PriceStoreDirEsq*valorReducao);
  $('#price_17805').html(' + <s>'+PriceStoreDirEsq+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Esquerdo
  $('#ndk-accessory-quantity-17805').attr('data-price', PriceStoreDirEsq);
  $('#price_17806').html(' + <s>'+PriceStoreDirEsq+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Direito
  $('#ndk-accessory-quantity-17806').attr('data-price', PriceStoreDirEsq);
  var pricedesc = PriceStoreFreTras-(PriceStoreFreTras*valorReducao);
  $('#price_17807').html(' + <s>'+PriceStoreFreTras+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente
  $('#ndk-accessory-quantity-17807').attr('data-price', PriceStoreFreTras);

	//Porta-Janela de Correr (Menuiserie)
  var pricedesc = PriceCorrerDirEsq-(PriceCorrerDirEsq*valorReducao);
	$('#price_17808').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
	$('#ndk-accessory-quantity-17808').attr('data-price', PriceCorrerDirEsq);
	$('#price_17809').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Menuiserie Direito
	$('#ndk-accessory-quantity-17809').attr('data-price', PriceCorrerDirEsq);
  var pricedesc = PriceCorrerFreTras-(PriceCorrerFreTras*valorReducao);
	$('#price_17810').html(' + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
	$('#ndk-accessory-quantity-17810').attr('data-price',  PriceCorrerFreTras);

	//Porta Accordeon (Ocardian)
  var pricedesc = PriceOcardianDirEsq-(PriceOcardianDirEsq*valorReducao);
	$('#price_17811').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
	$('#ndk-accessory-quantity-17811').attr('data-price', PriceOcardianDirEsq);
	$('#price_17812').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
	$('#ndk-accessory-quantity-17812').attr('data-price', PriceOcardianDirEsq);
  var pricedesc = PriceOcardianFreTras-(PriceOcardianFreTras*valorReducao);
	$('#price_17813').html(' + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Accordeon Frente
	$('#ndk-accessory-quantity-17813').attr('data-price',  PriceOcardianFreTras);

  //Cortina de Vidro
  var pricedesc = PriceCortinaVidroDirEsq - (PriceCortinaVidroDirEsq * valorReducao);
  $('#price_30860').html(' + <s>' + PriceCortinaVidroDirEsq + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Esquerdo
  $('#ndk-accessory-quantity-30860').attr('data-price', PriceCortinaVidroDirEsq);
  $('#price_30861').html(' + <s>' + PriceCortinaVidroDirEsq + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Direito
  $('#ndk-accessory-quantity-30861').attr('data-price', PriceCortinaVidroDirEsq);
  var pricedesc = PriceCortinaVidroFreTras - (PriceCortinaVidroFreTras * valorReducao);
  $('#price_30862').html(' + <s>' + PriceCortinaVidroFreTras + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>');//Cortina de Vidro Frente
  $('#ndk-accessory-quantity-30862').attr('data-price', PriceCortinaVidroFreTras);

  //Estore ZIP
  var pricedesc = PriceStoreZipDirEsq - (PriceStoreZipDirEsq * valorReducao);
  $('#price_31026').html(' + <s>' + PriceStoreZipDirEsq + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Esquerdo
  $('#ndk-accessory-quantity-31026').attr('data-price', PriceStoreZipDirEsq);
  $('#price_31027').html(' + <s>' + PriceStoreZipDirEsq + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Direito
  $('#ndk-accessory-quantity-31027').attr('data-price', PriceStoreZipDirEsq);
  var pricedesc = PriceStoreZipFreTras - (PriceStoreZipFreTras * valorReducao);
  $('#price_31028').html(' + <s>' + PriceStoreZipFreTras + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>');//Estore ZIP Frente
  $('#ndk-accessory-quantity-31028').attr('data-price', PriceStoreZipFreTras);

});


// ********** PERGOLA BIOCLIMATICA GRANDLUX AUTOPORTEE STANDARD MANUELLE ********** //
/*
$("input[name='ndkcsfield[2277]'], input[name='ndkcsfield[4590]").click(function () {

	$("input[name='ndkcsfield[2276]']").prop('checked', false);
	$("input[name='ndkcsfield[4589]']").prop('checked', false);

	if($("input[name='ndkcsfield[4590]']:checked").length == 1)
		var id_value = $("input[name='ndkcsfield[4590]']:checked").data('id-value');
	else
		var id_value = $("input[name='ndkcsfield[2277]']:checked").data('id-value');

	var arrayIdValueField = [17797, 17798, 17799, 17800];

	var arrayIdValueFieldPDF = [

		[17797, "Pergola Autoportée ",4000,3410],
		[17798, "Pergola Autoportée ",4000,4003],
		[17799, "Pergola Autoportée ",4800,3608],
		[17800, "Pergola Autoportée ",4800,4003],
	];

  if ($.inArray(id_value, arrayIdValueField) !== -1) {
		for (i = 0; i < arrayIdValueFieldPDF.length; i++) {
			if (parseInt(id_value) == parseInt(arrayIdValueFieldPDF[i][0])) {
         ShowFileTechnical(arrayIdValueFieldPDF[i][1],arrayIdValueFieldPDF[i][2],arrayIdValueFieldPDF[i][3],0);
			}
		}
  }
*/


// ********** PERGOLA BIOCLIMATICA GRANDLUX AUTOPORTEE STANDARD  ********** //

$(".color-ndk[data-group='2279'], .img-value-4912").click(function () {
  $('.product_2281_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(4913);
  RemoveField(5600);
});

$("input[name='ndkcsfield[4907]'], input[name='ndkcsfield[2277]']").click(function () { //Dimensões Autoportee Manuelle

  $('.product_2281_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(4913);
  RemoveField(5600);

    var idgroup = $(this).data('group');
    if(idgroup == '4907'){
      $("input[name='ndkcsfield[2277]']").prop('checked', false); //Dimensões ADOSSEE Motorisee
    }else{
      $("input[name='ndkcsfield[4907]']").prop('checked', false); //Dimensões ADOSSEE Manuelle
    }

    var id_value = $("input[name='ndkcsfield["+idgroup+"]']:checked").data('id-value');

  switch (id_value) {

    // ********** PERGOLA BIOCLIMATICA GRANDLUX AUTOPORTEE STANDARD MOTORISEE ********** //
    case 17797:
      //4000 x 3474
      PriceStoreDirEsq = 1266;
      PriceStoreFreTras = 1195;
      PriceCorrerDirEsq = 3515;
      PriceCorrerFreTras = 3161;
      PriceOcardianDirEsq = 5731;
      PriceOcardianFreTras = 5417;
      PriceCortinaVidroDirEsq = 3536;
      PriceCortinaVidroFreTras = 2994;
      PriceStoreZipDirEsq = 6772;
      PriceStoreZipFreTras = 6341;
      break;

    case 17798:
      //4000 x 4067
      PriceStoreDirEsq = 1266;
      PriceStoreFreTras = 1281;
      PriceCorrerDirEsq = 3515;
      PriceCorrerFreTras = 3585;
      PriceOcardianDirEsq = 5731;
      PriceOcardianFreTras = 5731;
      PriceCortinaVidroDirEsq = 3536;
      PriceCortinaVidroFreTras = 3611;
      PriceStoreZipDirEsq = 6772;
      PriceStoreZipFreTras = 6882;
      break;

    case 17799:
      //5000 x 3671
      PriceStoreDirEsq = 1411;
      PriceStoreFreTras = 1224;
      PriceCorrerDirEsq = 4691;
      PriceCorrerFreTras = 3303;
      PriceOcardianDirEsq = 6538;
      PriceOcardianFreTras = 5486;
      PriceCortinaVidroDirEsq = 4293;
      PriceCortinaVidroFreTras = 3144;
      PriceStoreZipDirEsq = 7860;
      PriceStoreZipFreTras = 6484;
      break;

    case 17800:
      //5000 x 4067
      PriceStoreDirEsq = 1411;
      PriceStoreFreTras = 1281;
      PriceCorrerDirEsq = 4691;
      PriceCorrerFreTras = 3585;
      PriceOcardianDirEsq = 6538;
      PriceOcardianFreTras = 5731;
      PriceCortinaVidroDirEsq = 4293;
      PriceCortinaVidroFreTras = 3611;
      PriceStoreZipDirEsq = 7860;
      PriceStoreZipFreTras = 6882;
    break;

    // ********** GRANDLUX AUTOPORTEE STANDARD MANUELLE [4907] ********** //
    case 28395:
      //4000 x 3410
      PriceStoreDirEsq = 786;
      PriceStoreFreTras = 850;
      PriceCorrerDirEsq = 2692;
      PriceCorrerFreTras = 3062;
      PriceOcardianDirEsq = 3631;
      PriceOcardianFreTras = 5058;
      break;

    case 28396:
      //4000 x 4003
      PriceStoreDirEsq = 850;
      PriceStoreFreTras = 850;
      PriceCorrerDirEsq = 3062;
      PriceCorrerFreTras = 3062;
      PriceOcardianDirEsq = 5058;
      PriceOcardianFreTras = 5058;
      break;

    case 28397:
      //4800 x 3608
      PriceStoreDirEsq = 812;
      PriceStoreFreTras = 956;
      PriceCorrerDirEsq = 2814;
      PriceCorrerFreTras = 3944;
      PriceOcardianDirEsq = 3700;
      PriceOcardianFreTras = 5311;
      break;

    case 28398:
      //4800 x 4003
      PriceStoreDirEsq = 865;
      PriceStoreFreTras = 956;
      PriceCorrerDirEsq = 3062;
      PriceCorrerFreTras = 3944;
      PriceOcardianDirEsq = 5058;
      PriceOcardianFreTras = 5311;
    break;

    default:
      PriceStoreDirEsq = 978;
      PriceStoreFreTras = 1050;
      PriceCorrerDirEsq = 2563;
      PriceCorrerFreTras = 2916;
      PriceOcardianDirEsq = 3458;
      PriceOcardianFreTras = 4817;
      PriceCortinaVidroDirEsq = 2563;
      PriceCortinaVidroFreTras = 2916;
      PriceStoreZipDirEsq = 978;
      PriceStoreZipFreTras = 1050;
  }

  //Estore
  var pricedesc = PriceStoreDirEsq-(PriceStoreDirEsq*valorReducao);
  $('#price_17814').html(' + <s>'+PriceStoreDirEsq+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Esquerdo
  $('#ndk-accessory-quantity-17814').attr('data-price', PriceStoreDirEsq);
  $('#price_17815').html(' + <s>'+PriceStoreDirEsq+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Direito
  $('#ndk-accessory-quantity-17815').attr('data-price', PriceStoreDirEsq);
  var pricedesc = PriceStoreFreTras-(PriceStoreFreTras*valorReducao);
  $('#price_17816').html(' + <s>'+PriceStoreFreTras+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente
  $('#ndk-accessory-quantity-17816').attr('data-price', PriceStoreFreTras);
  $('#price_17817').html(' + <s>'+PriceStoreFreTras+' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Atrás
  $('#ndk-accessory-quantity-17817').attr('data-price', PriceStoreFreTras);

	//Porta-Janela de Correr (Menuiserie)
  var pricedesc = PriceCorrerDirEsq-(PriceCorrerDirEsq*valorReducao);
	$('#price_17818').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
	$('#ndk-accessory-quantity-17818').attr('data-price', PriceCorrerDirEsq);
	$('#price_17819').html(' + <s>'+PriceCorrerDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Menuiserie Direito
	$('#ndk-accessory-quantity-17819').attr('data-price', PriceCorrerDirEsq);
  var pricedesc = PriceCorrerFreTras-(PriceCorrerFreTras*valorReducao);
	$('#price_17820').html(' + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
	$('#ndk-accessory-quantity-17820').attr('data-price', PriceCorrerFreTras);
	$('#price_17821').html(' + <s>'+PriceCorrerFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Atrás
	$('#ndk-accessory-quantity-17821').attr('data-price', PriceCorrerFreTras);

	//Porta Accordeon (Ocardian)
  var pricedesc = PriceOcardianDirEsq-(PriceOcardianDirEsq*valorReducao);
	$('#price_17822').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
	$('#ndk-accessory-quantity-17822').attr('data-price', PriceOcardianDirEsq);
	$('#price_17823').html(' + <s>'+PriceOcardianDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
	$('#ndk-accessory-quantity-17823').attr('data-price', PriceOcardianDirEsq);
  var pricedesc = PriceOcardianFreTras-(PriceOcardianFreTras*valorReducao);
	$('#price_17824').html(' + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
	$('#ndk-accessory-quantity-17824').attr('data-price', PriceOcardianFreTras);
	$('#price_17825').html(' + <s>'+PriceOcardianFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Atrás
	$('#ndk-accessory-quantity-17825').attr('data-price', PriceOcardianFreTras);

  //Cortina de Vidro
  var pricedesc = PriceCortinaVidroDirEsq - (PriceCortinaVidroDirEsq * valorReducao);
  $('#price_30863').html(' + <s>'+PriceCortinaVidroDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Esquerdo
  $('#ndk-accessory-quantity-30863').attr('data-price', PriceCortinaVidroDirEsq);
  $('#price_30864').html(' + <s>'+PriceCortinaVidroDirEsq+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Direito
  $('#ndk-accessory-quantity-30864').attr('data-price', PriceCortinaVidroDirEsq);
  var pricedesc = PriceCortinaVidroFreTras - (PriceCortinaVidroFreTras * valorReducao);
  $('#price_30865').html(' + <s>'+PriceCortinaVidroFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Frente
  $('#ndk-accessory-quantity-30865').attr('data-price', PriceCortinaVidroFreTras);
  $('#price_30866').html(' + <s>'+PriceCortinaVidroFreTras+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Cortina de Vidro Atrás
  $('#ndk-accessory-quantity-30866').attr('data-price', PriceCortinaVidroFreTras);

  //Estore ZIP
  var pricedesc = PriceStoreZipDirEsq - (PriceStoreZipDirEsq * valorReducao);
  $('#price_31029').html(' + <s>' + PriceStoreZipDirEsq + ' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Esquerdo
  $('#ndk-accessory-quantity-31029').attr('data-price', PriceStoreZipDirEsq);
  $('#price_31030').html(' + <s>' + PriceStoreZipDirEsq + ' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Direito
  $('#ndk-accessory-quantity-31030').attr('data-price', PriceStoreZipDirEsq);
  var pricedesc = PriceStoreZipFreTras - (PriceStoreZipFreTras * valorReducao);
  $('#price_31031').html(' + <s>' + PriceStoreZipFreTras + ' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Frente
  $('#ndk-accessory-quantity-31031').attr('data-price', PriceStoreZipFreTras);
  $('#price_31032').html(' + <s>' + PriceStoreZipFreTras + ' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Estore ZIP Atrás
  $('#ndk-accessory-quantity-31032').attr('data-price', PriceStoreZipFreTras);

});


//Largura, Número de Lâminas [Grandlux Sur Mesure]
var activities = [

  [2287, 10],
  [2485, 11],
  [2683, 12],
  [2880, 13],
  [3078, 14],
  [3276, 15],
  [3474, 16],
  [3671, 17],
  [3869, 18],
  [4067, 19],
  [4264, 20],
  [4462, 21],
  [4660, 22],
  [4857, 23],
  [5055, 24],
  [5253, 25],
  [5451, 26],
  [5648, 27],
  [5846, 28],
  [6044, 29],
];

//Largura, Número de Lâminas [Grandlux Poteau Deporte Sur Mesure]
var activitiesDP = [

  [4067, 19],
  [4264, 20],
  [4462, 21],
  [4660, 22],
  [4857, 23],
  [5055, 24],
  [5253, 25],
  [5451, 26],
  [5648, 27],
  [5846, 28],
  [6044, 29],
  [6241, 30],
  [6439, 31],
  [6637, 32],
  [6834, 33],
  [7032, 34],
  [7230, 35],
  [7428, 36],
  [7625, 37],
  [7823, 38],

];

//(document).on('change', '#ndkcsfield_2267', function(){
function LaguraPregolaGrandLuxAuto(activities) {
	lame = $('#ndkcsfield_2267').val();
	Nlames = lame.substring(0, 2);
	for (i = 0; i < activities.length; i++) {
		if (parseInt(Nlames) == parseInt(activities[i][1])) {
			console.log(Nlames);
			$('#dimension_text_height_2016').val(parseInt(activities[i][0]));
			document.getElementById("dimension_text_height_2016").value = parseInt(activities[i][0]);
			$('#dimension_text_height_2016').attr('value', parseInt(activities[i][0]))
			height = activities[i][0];
			width = $('#dimension_text_width_2016').val();
			if (parseInt(width) > 0) {
				$('#dimension_text_height_2016').trigger('change');
				//document.getElementById("ndkcsfield_2267").addEventListener("change", displayDate);
			}
			return activities[i][0];
		}
	}
	return 1;
}


$(document).on('change', '#ndkcsfield_2292', function () {

	heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '2243');

});


// ********** PERGOLA BIOCLIMATICA GRANDLUX ADOSSE SUR MESURE ********** //

$(document).on('click', ".color-ndk[data-group='2007'], .img-value-2015", function () { //Cor estrutura adossee

	var aluclass_id_product = ["640152"];

	if ($.inArray(id_product, aluclass_id_product) !== -1) {
	  campoCorEstrutura = $(this).data("value");

	  $('.product_2018_0.accessory-ndk.selected-accessory img').trigger('click');
	  RemoveField(2251);
    RemoveField(5598);

	  if(!$('.product_2018_0.accessory-ndk').is(".selected-accessory")){
      $("#img_div_15102").trigger('click');
      $("#img_div_15103").trigger('click');
      $("#img_div_15104").trigger('click');
	  }

	  if (campoCorEstrutura.match(/7016/)) {
		  $(".color-ndk[data-id-value='17660']").trigger('click');
	  } else if (campoCorEstrutura.match(/9016/)) {
		 $(".color-ndk[data-id-value='17661']").trigger('click');
	  }
	}else{
    $(".product_2018_0.accessory-ndk.selected-accessory img").trigger('click');
    RemoveField(2251);
    RemoveField(5598);
	}

});

$(document).on('change', "#ndkcsfield_2270", function () {
	var aluclass_id_product = ["640152"];
  var id_product2270 = $("#ndkcf_id_product").val();
	if ($.inArray(id_product2270, aluclass_id_product) !== -1) {

	}else{
    $(".product_2018_0.accessory-ndk.selected-accessory img").trigger('click');
    RemoveField(2251);
    RemoveField(5598);
	}
});

// ********** PERGOLA BIOCLIMATICA GRANDLUX AUTOPORTEE SUR MESURE ********** //

$(document).on('click', ".color-ndk[data-group='2302'], .img-value-4914", function () { //Cor estrutura autoportee

	var aluclass_id_product = ["640153"];

	if ($.inArray(id_product, aluclass_id_product) !== -1) {
	  campoCorEstrutura = $(this).data("value");

	  $('.product_2014_0.accessory-ndk.selected-accessory img').trigger('click');
	  RemoveField(2251);
    RemoveField(5598);

	  if(!$('.product_2018_0.accessory-ndk').is(".selected-accessory")){
      $("#img_div_15076").trigger('click');
      $("#img_div_15077").trigger('click');
      $("#img_div_15078").trigger('click');
      $("#img_div_15079").trigger('click');
	  }

	  if (campoCorEstrutura.match(/7016/)) {
      console.log('7016');
      $(".color-ndk[data-id-value='17660']").trigger('click');
	  } else if (campoCorEstrutura.match(/9016/)) {
      console.log('9016');
      $(".color-ndk[data-id-value='17661']").trigger('click');
	  }
	}else{
    $(".product_2014_0.accessory-ndk.selected-accessory img").trigger('click');
    RemoveField(2251);
    RemoveField(5598);
	}

});

$(document).on('change', "#ndkcsfield_2267", function () {
	var aluclass_id_product = ["640153"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {

	}else{
    $(".product_2014_0.accessory-ndk.selected-accessory img").trigger('click');
    RemoveField(2251);
    RemoveField(5598);
	}
});

//Largura, Preço Estore Motorizado, Número de Folhas
var profAdosseeAutoporteeStore = [

  [2287, 1022, '2 Vantaux'],
  [2485, 1051, '2 Vantaux'],
  [2683, 1081, '2 Vantaux'],
  [2880, 1107, '4 Vantaux'],
  [3078, 1136, '4 Vantaux'],
  [3276, 1166, '4 Vantaux'],
  [3474, 1195, '4 Vantaux'],
  [3671, 1224, '4 Vantaux'],
  [3869, 1252, '4 Vantaux'],
  [4067, 1281, '4 Vantaux'],
  [4264, 1310, '4 Vantaux'],
  [4462, 1339, '4 Vantaux'],
  [4660, 1368, '4 Vantaux'],
  [4857, 1398, '4 Vantaux'],
  [5055, 1425, '4 Vantaux'],
  [5253, 1455, '4 Vantaux'],
  [5451, 1482, '4 Vantaux'],
  [5648, 1512, '4 Vantaux'],
  [5846, 1538, '4 Vantaux'],
  [6044, 1565, '4 Vantaux'],

];

//Largura, Preço Estore Manual, Número de Folhas
var profAdosseeAutoporteeStoreManual = [
  [2287, 1022, '2 Vantaux'],
  [2485, 1051, '2 Vantaux'],
  [2683, 1081, '2 Vantaux'],
  [2880, 1107, '4 Vantaux'],
  [3078, 1136, '4 Vantaux'],
  [3276, 1166, '4 Vantaux'],
  [3474, 1195, '4 Vantaux'],
  [3671, 1224, '4 Vantaux'],
  [3869, 1252, '4 Vantaux'],
  [4067, 1281, '4 Vantaux'],
  [4264, 1310, '4 Vantaux'],
  [4462, 1323, '4 Vantaux'],
  [4660, 1352, '4 Vantaux'],
  [4857, 1382, '4 Vantaux'],
  [5055, 1411, '4 Vantaux'],
  [5253, 1440, '4 Vantaux'],
  [5451, 1469, '4 Vantaux'],
  [5648, 1496, '4 Vantaux'],
  [5846, 1525, '4 Vantaux'],
  [6044, 1610, '4 Vantaux'],
];

//Largura, Preço Porta-Janela de Correr (Menuiserie), Número de Folhas
var profAutoporteeMenuiserie = [

  [2287, 2309, '2 Vantaux'],
  [2485, 2450, '2 Vantaux'],
  [2683, 2592, '2 Vantaux'],
  [2880, 2734, '4 Vantaux'],
  [3078, 2876, '4 Vantaux'],
  [3276, 3019, '4 Vantaux'],
  [3474, 3161, '4 Vantaux'],
  [3671, 3303, '4 Vantaux'],
  [3869, 3445, '4 Vantaux'],
  [4067, 3585, '4 Vantaux'],
  [4264, 4121, '4 Vantaux'],
  [4462, 4284, '4 Vantaux'],
  [4660, 4446, '4 Vantaux'],
  [4857, 4609, '4 Vantaux'],
  [5055, 4771, '4 Vantaux'],
  [5253, 4933, '4 Vantaux'],
  [5451, 5097, '4 Vantaux'],
  [5648, 5257, '4 Vantaux'],
  [5846, 5421, '4 Vantaux'],
  [6044, 5585, '4 Vantaux'],
];

//Largura, Preço Porta Accordeon (Ocardian), Número de Folhas
var profAutoporteeAccordeon = [

  [2287, 3418, '2 Vantaux'],
  [2485, 3580, '2 Vantaux'],
  [2683, 3742, '2 Vantaux'],
  [2880, 4902, '4 Vantaux'],
  [3078, 5073, '4 Vantaux'],
  [3276, 5246, '4 Vantaux'],
  [3474, 5417, '4 Vantaux'],
  [3671, 5486, '4 Vantaux'],
  [3869, 5649, '4 Vantaux'],
  [4067, 5731, '4 Vantaux'],
  [4264, 5891, '4 Vantaux'],
  [4462, 6053, '4 Vantaux'],
  [4660, 6215, '4 Vantaux'],
  [4857, 6377, '4 Vantaux'],
  [5055, 6538, '4 Vantaux'],
  [5253, 6700, '4 Vantaux'],
  [5451, 6862, '4 Vantaux'],
  [5648, 7024, '4 Vantaux'],
  [5846, 7185, '4 Vantaux'],
  [6044, 7347, '4 Vantaux'],
];

//Largura, Preço Cortinas de Vidro, Número de Folhas
var profAutoporteeCortinasVidro = [

  [2287, 2092, '2 Vantaux'],
  [2485, 2242, '2 Vantaux'],
  [2683, 2392, '2 Vantaux'],
  [2880, 2543, '4 Vantaux'],
  [3078, 2694, '4 Vantaux'],
  [3276, 2844, '4 Vantaux'],
  [3474, 2994, '4 Vantaux'],
  [3671, 3144, '4 Vantaux'],
  [3869, 3461, '4 Vantaux'],
  [4067, 3611, '4 Vantaux'],
  [4264, 3764, '4 Vantaux'],
  [4462, 3914, '4 Vantaux'],
  [4660, 4065, '4 Vantaux'],
  [4857, 4217, '4 Vantaux'],
  [5055, 4605, '4 Vantaux'],
  [5253, 4755, '4 Vantaux'],
  [5451, 4907, '4 Vantaux'],
  [5648, 5059, '4 Vantaux'],
  [5846, 5210, '4 Vantaux'],
  [6044, 5362, '4 Vantaux'],
];

//Largura, Preço Estore ZIP, Número de Folhas
var profAutoporteeEstoreZIP = [

  [2287, 5506, '2 Vantaux'],
  [2485, 5639, '2 Vantaux'],
  [2683, 5778, '2 Vantaux'],
  [2880, 5917, '4 Vantaux'],
  [3078, 6056, '4 Vantaux'],
  [3276, 6202, '4 Vantaux'],
  [3474, 6341, '4 Vantaux'],
  [3671, 6484, '4 Vantaux'],
  [3869, 6663, '4 Vantaux'],
  [4067, 6882, '4 Vantaux'],
  [4264, 7097, '4 Vantaux'],
  [4462, 7319, '4 Vantaux'],
  [4660, 7535, '4 Vantaux'],
  [4857, 7750, '4 Vantaux'],
  [5055, 7969, '4 Vantaux'],
  [5253, 8185, '4 Vantaux'],
  [5451, 8403, '4 Vantaux'],
  [5648, 8619, '4 Vantaux'],
  [5846, 8838, '4 Vantaux'],
  [6044, 9056, '4 Vantaux'],
];


// ********** PERGOLA BIOCLIMATICA GRANDLUX ADOSSEE SUR MESURE ********** //

//Largura (Número de Lâminas)
$(document).on('change', '#ndkcsfield_2270', function () {
	var heightPE = 0;
	var idGroupNDK = 0;

  //Profundidade Motorisee RAL Standard
	if ($(".ndkackFieldItem[data-field='2020']").is(':visible')) {
		idGroupNDK = 2020;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '2020');
	}

	//Profundidade Motorisee RAL Not Standard
	if ($(".ndkackFieldItem[data-field='4205']").is(':visible')) {
		idGroupNDK = 4205;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '4205');
	}

	//Profundidade Motorisee Autres RAL
	if ($(".ndkackFieldItem[data-field='4206']").is(':visible')) {
		idGroupNDK = 4206;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '4206');
	}

  //Profundidade Manuelle RAL Standard
  if ($(".ndkackFieldItem[data-field='4917']").is(':visible')) {
		idGroupNDK = 4917;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '4917');
	}

	//Profundidade Manuelle RAL Not Standard
	if ($(".ndkackFieldItem[data-field='4918']").is(':visible')) {
		idGroupNDK = 4918;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '4918');
	}

	//Profundidade Manuelle Autres RAL
	if ($(".ndkackFieldItem[data-field='4919']").is(':visible')) {
		idGroupNDK = 4919;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '4919');
	}

	if ($(".ndkackFieldItem[data-field='4928']").is(':visible')) {
		idGroupNDK = 4928;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2270', '4928');
	}

	var aluclass_id_product = ["640152"];
    if ($.inArray(id_product, aluclass_id_product) !== -1) {

    }else{

		//Estore
		if(4917 == idGroupNDK || 4918 == idGroupNDK || 4919 == idGroupNDK ){
			for (i = 0; i < profAdosseeAutoporteeStoreManual.length; i++) {
        if (heightPE == profAdosseeAutoporteeStoreManual[i][0]) {
            // $('#price_15104').html(profAdosseeAutoporteeStoreManual[i][1] + ' €'); //Estore Frente Manual
            // $('#ndk-accessory-quantity-15104').attr('data-price', profAdosseeAutoporteeStoreManual[i][1]);

            break;
        }
			}
    }else{
      for (i = 0; i < profAdosseeAutoporteeStore.length; i++) {
        if (heightPE == profAdosseeAutoporteeStore[i][0]) {
          var pricedesc = profAdosseeAutoporteeStore[i][1]-(profAdosseeAutoporteeStore[i][1]*valorReducao);
          $('#price_15104').html(' + <s>'+profAdosseeAutoporteeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Frente Motorizado
          $('#ndk-accessory-quantity-15104').attr('data-price', profAdosseeAutoporteeStore[i][1]);

          break;
        }
      }
    }

		//Menuiserie (Porta-Janela de Correr)
		for (i = 0; i < profAutoporteeMenuiserie.length; i++) {
			if (heightPE == profAutoporteeMenuiserie[i][0]) {
        var pricedesc = profAutoporteeMenuiserie[i][1]-(profAutoporteeMenuiserie[i][1]*valorReducao);
				$('#price_15108').html(' + <s>'+profAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
				$('#ndk-accessory-quantity-15108').attr('data-price', profAutoporteeMenuiserie[i][1]);
				break;
			}
		}

		//Porta Accordeon (Ocardian)
		for (i = 0; i < profAutoporteeAccordeon.length; i++) {
			if (heightPE == profAutoporteeAccordeon[i][0]) {
        var pricedesc = profAutoporteeAccordeon[i][1]-(profAutoporteeAccordeon[i][1]*valorReducao);
				$('#price_15112').html(' + <s>'+profAutoporteeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
				$('#ndk-accessory-quantity-15112').attr('data-price', profAutoporteeAccordeon[i][1]);
				break;
			}
		}

    //Cortina de Vidro
    for (i = 0; i < profAutoporteeCortinasVidro.length; i++) {
      if (heightPE == profAutoporteeCortinasVidro[i][0]) {
        var pricedesc = profAutoporteeCortinasVidro[i][1] - (profAutoporteeCortinasVidro[i][1] * valorReducao);
        $('#price_30848').html(' + <s>' + profAutoporteeCortinasVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Frente
        $('#ndk-accessory-quantity-30848').attr('data-price', profAutoporteeCortinasVidro[i][1]);
        break;
      }
    }

    //Estore ZIP
    for (i = 0; i < profAutoporteeEstoreZIP.length; i++) {
      if (heightPE == profAutoporteeEstoreZIP[i][0]) {
        var pricedesc = profAutoporteeEstoreZIP[i][1] - (profAutoporteeEstoreZIP[i][1] * valorReducao);
        $('#price_31014').html(' + <s>' + profAutoporteeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Frente
        $('#ndk-accessory-quantity-31014').attr('data-price', profAutoporteeEstoreZIP[i][1]);
        break;
      }
    }

		for (i = 0; i < activities.length; i++) {
			if (heightPE == activities[i][0]) {
				$("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activities[i][1] + " </p>");
				break;
			}
		}
	}
});

// ********** PERGOLA BIOCLIMATICA GRANDLUX AUTOPORTEE SUR MESURE ********** //

//Largura (Número de Lâminas)
$(document).on('change', '#ndkcsfield_2267', function () {
	var heightPE = 0;
	var idGroupNDK = 0;

	//Profundidade Motorisee RAL Standard
	if ($(".ndkackFieldItem[data-field='2016']").is(':visible')) {
		idGroupNDK = 2016;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '2016');
	}

	//Profundidade Motorisee Autres RAL
	if ($(".ndkackFieldItem[data-field='4203']").is(':visible')) {
		idGroupNDK = 4203;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '4203');
	}

	//Profundidade Motorisee RAL Not Standard
	if ($(".ndkackFieldItem[data-field='4204']").is(':visible')) {
		idGroupNDK = 4204;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '4204');
	}

	//Profundidade Manuelle RAL Standard
  if ($(".ndkackFieldItem[data-field='4920']").is(':visible')) {
		idGroupNDK = 4920;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '4920');
	}

	//Profundidade Manuelle RAL Not Standard
	if ($(".ndkackFieldItem[data-field='4921']").is(':visible')) {
		idGroupNDK = 4921;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '4921');
	}

	//Profundidade Manuelle Autres RAL
	if ($(".ndkackFieldItem[data-field='4922']").is(':visible')) {
		idGroupNDK = 4922;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '4922');
	}

	//Profundidade Manuelle Autres RAL
	if ($(".ndkackFieldItem[data-field='4930']").is(':visible')) {
		idGroupNDK = 4930;
		heightPE = PregolaGrandLuxLarguraProfundidade(activities, 'ndkcsfield_2267', '4930');
	}

	var aluclass_id_product = ["640153"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {

	}else{

	//Estore
	if(4920 == idGroupNDK || 4921 == idGroupNDK || 4922 == idGroupNDK ){
		for (i = 0; i < profAdosseeAutoporteeStoreManual.length; i++) {
		if (heightPE == profAdosseeAutoporteeStoreManual[i][0]) {
        // $('#price_15078').html(profAdosseeAutoporteeStoreManual[i][1] + ' €'); //Estore Frente Manual
        // $('#ndk-accessory-quantity-15078').attr('data-price', profAdosseeAutoporteeStoreManual[i][1]);

        $('#price_15079').html(profAdosseeAutoporteeStoreManual[i][1] + ' €'); //Estore Atrás Manual
        $('#ndk-accessory-quantity-15079').attr('data-price', profAdosseeAutoporteeStoreManual[i][1]);

        break;
		  }
		}
  }else{
    for (i = 0; i < profAdosseeAutoporteeStore.length; i++) {
    if (heightPE == profAdosseeAutoporteeStore[i][0]) {

        var pricedesc = profAdosseeAutoporteeStore[i][1]-(profAdosseeAutoporteeStore[i][1]*valorReducao);

        $('#price_15078').html(' + <s>'+profAdosseeAutoporteeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Frente Motorizado
        $('#ndk-accessory-quantity-15078').attr('data-price', profAdosseeAutoporteeStore[i][1]);

        $('#price_15079').html(' + <s>'+profAdosseeAutoporteeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Atrás Motorizado
        $('#ndk-accessory-quantity-15079').attr('data-price', profAdosseeAutoporteeStore[i][1]);

        break;
      }
    }
  }

		//Porta-Janela de Correr (Menuiserie)
		for (i = 0; i < profAutoporteeMenuiserie.length; i++) {
			if (heightPE == profAutoporteeMenuiserie[i][0]) {
        var pricedesc = profAutoporteeMenuiserie[i][1]-(profAutoporteeMenuiserie[i][1]*valorReducao);
				$('#price_15082').html(' + <s>'+profAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
				$('#ndk-accessory-quantity-15082').attr('data-price', profAutoporteeMenuiserie[i][1]);
				$('#price_15083').html(' + <s>'+profAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Atrás
				$('#ndk-accessory-quantity-15083').attr('data-price', profAutoporteeMenuiserie[i][1]);
				break;
			}
		}

	  //Porta Accordeon (Ocardian)
		for (i = 0; i < profAutoporteeAccordeon.length; i++) {
			if (heightPE == profAutoporteeAccordeon[i][0]) {
        var pricedesc = profAutoporteeAccordeon[i][1]-(profAutoporteeAccordeon[i][1]*valorReducao);
				$('#price_15088').html(' + <s>'+profAutoporteeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
				$('#ndk-accessory-quantity-15088').attr('data-price', profAutoporteeAccordeon[i][1]);
				$('#price_15089').html(' + <s>'+profAutoporteeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');//Accordeon Atrás
				$('#ndk-accessory-quantity-15089').attr('data-price', profAutoporteeAccordeon[i][1]);
				break;
			}
		}

    //Cortina de Vidro
    for (i = 0; i < profAutoporteeCortinasVidro.length; i++) {
      if (heightPE == profAutoporteeCortinasVidro[i][0]) {
        var pricedesc = profAutoporteeCortinasVidro[i][1] - (profAutoporteeCortinasVidro[i][1] * valorReducao);
        $('#price_30851').html(' + <s>' + profAutoporteeCortinasVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Frente
        $('#ndk-accessory-quantity-30851').attr('data-price', profAutoporteeCortinasVidro[i][1]);
        $('#price_30852').html(' + <s>' + profAutoporteeCortinasVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Atrás
        $('#ndk-accessory-quantity-30852').attr('data-price', profAutoporteeCortinasVidro[i][1]);
        break;
      }
    }

    //Estore ZIP
    for (i = 0; i < profAutoporteeEstoreZIP.length; i++) {
      if (heightPE == profAutoporteeEstoreZIP[i][0]) {
        var pricedesc = profAutoporteeEstoreZIP[i][1] - (profAutoporteeEstoreZIP[i][1] * valorReducao);
        $('#price_31017').html(' + <s>' + profAutoporteeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Frente
        $('#ndk-accessory-quantity-31017').attr('data-price', profAutoporteeEstoreZIP[i][1]);
        $('#price_31018').html(' + <s>' + profAutoporteeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Atrás
        $('#ndk-accessory-quantity-31018').attr('data-price', profAutoporteeEstoreZIP[i][1]);
        break;
      }
    }

		for (i = 0; i < activities.length; i++) {
			if (heightPE == activities[i][0]) {
				$("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activities[i][1] + " </p>");
				break;
			}
		}
	}
});

//Largura Estore Motorizado, Preço
var largAutoporteeAdosseeStore = [
  [2001, 979, ''],
  [3001, 1122, ''],
  [4001, 1266, ''],
  [5001, 1411, ''],

];

//Largura Estore Manual, Preço
var largAutoporteeAdosseeStoreManuel = [
  [2001, 756, ''],
  [3001, 886, ''],
  [4001, 1018, ''],
  [5001, 1018, ''],

];

//Largura Porta-Janela de Correr (Menuiserie) Autoportee, Preço
var largAutoporteeMenuiserie = [
  [2001, 2096, ''],
  [3001, 2804, ''],
  [4001, 3515, ''],
  [5001, 4691, ''],

];

//Largura Porta-Janela de Correr (Menuiserie) Adossee, Preço
var largAutoporteeMenuiserie = [
  [2001, 2096, ''],
  [3001, 2804, ''],
  [4001, 3515, ''],
  [5001, 4691, ''],

];

//Largura Porta Accordeon (Ocardian), Preço
var largAutoporteeAdosseeAccordeon = [
  [2001, 2889, ''],
  [3001, 4987, ''],
  [4001, 5731, ''],
  [5001, 6538, ''],

];

//Largura Cortina de Vidro, Preço
var largAutoporteeAdosseeCortinaVidro = [
  [2001, 1867, ''],
  [3001, 2619, ''],
  [4001, 3536, ''],
  [5001, 4293, ''],

];

//Largura Estore ZIP, Preço
var largAutoporteeAdosseeEstoreZIP = [
  [2001, 5297, ''],
  [3001, 5987, ''],
  [4001, 6772, ''],
  [5001, 7860, ''],

];

//Profundidade Autoportee
$(document).on('change', '#dimension_text_width_4920,#dimension_text_width_4921,#dimension_text_width_4922,#dimension_text_width_2016,#dimension_text_width_4203,#dimension_text_width_4204', function () {
	var groupvalue = $(this).attr('data-group');
	var heightPE = $('#dimension_text_width_' + groupvalue).val();
  $(".product_2014_0.accessory-ndk.selected-accessory img").trigger('click');
  RemoveField(2251);
  RemoveField(5598);

  //Estore
  if(4920 == groupvalue || 4921 == groupvalue || 4922 == groupvalue ){
    for (i = 0; i < largAutoporteeAdosseeStoreManuel.length; i++) {
      if (heightPE < largAutoporteeAdosseeStoreManuel[i][0]) {
        // $('#price_15076').html(largAutoporteeAdosseeStoreManuel[i][1] + ' €'); //Estore Esquerdo Manual
        // $('#ndk-accessory-quantity-15076').attr('data-price', largAutoporteeAdosseeStoreManuel[i][1]);

        // $('#price_15077').html(largAutoporteeAdosseeStoreManuel[i][1] + ' €'); //Estore Direito Manual
        // $('#ndk-accessory-quantity-15077').attr('data-price', largAutoporteeAdosseeStoreManuel[i][1]);

        break;
      }
    }
  }else{
    for (i = 0; i < largAutoporteeAdosseeStore.length; i++) {
      if (heightPE < largAutoporteeAdosseeStore[i][0]) {

        var pricedesc = largAutoporteeAdosseeStore[i][1]-(largAutoporteeAdosseeStore[i][1]*valorReducao);

        $('#price_15076').html(' + <s>'+largAutoporteeAdosseeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Esquerdo Motorizado
        $('#ndk-accessory-quantity-15076').attr('data-price', largAutoporteeAdosseeStore[i][1]);

        $('#price_15077').html(' + <s>'+largAutoporteeAdosseeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Direito Motorizado
        $('#ndk-accessory-quantity-15077').attr('data-price', largAutoporteeAdosseeStore[i][1]);

        break;
      }
    }
  }

	//Porta-Janela de Correr (Menuiserie)
	for (i = 0; i < largAutoporteeMenuiserie.length; i++) {
		if (heightPE < largAutoporteeMenuiserie[i][0]) {
      var pricedesc = largAutoporteeMenuiserie[i][1]-(largAutoporteeMenuiserie[i][1]*valorReducao);
			$('#price_15080').html(' + <s>'+largAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
			$('#ndk-accessory-quantity-15080').attr('data-price', largAutoporteeMenuiserie[i][1]);
			$('#price_15081').html(' + <s>'+largAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Direito
			$('#ndk-accessory-quantity-15081').attr('data-price', largAutoporteeMenuiserie[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian)
	for (i = 0; i < largAutoporteeAdosseeAccordeon.length; i++) {
		if (heightPE < largAutoporteeAdosseeAccordeon[i][0]) {
      var pricedesc = largAutoporteeAdosseeAccordeon[i][1]-(largAutoporteeAdosseeAccordeon[i][1]*valorReducao);
			$('#price_15086').html(' + <s>'+largAutoporteeAdosseeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
			$('#ndk-accessory-quantity-15086').attr('data-price', largAutoporteeAdosseeAccordeon[i][1]);
			$('#price_15087').html(' + <s>'+largAutoporteeAdosseeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
			$('#ndk-accessory-quantity-15087').attr('data-price', largAutoporteeAdosseeAccordeon[i][1]);
			break;
		}
	}

  //Cortina de Vidro
  for (i = 0; i < largAutoporteeAdosseeCortinaVidro.length; i++) {
    if (heightPE < largAutoporteeAdosseeCortinaVidro[i][0]) {
      var pricedesc = largAutoporteeAdosseeCortinaVidro[i][1] - (largAutoporteeAdosseeCortinaVidro[i][1] * valorReducao);
      $('#price_30849').html(' + <s>' + largAutoporteeAdosseeCortinaVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Esquerdo
      $('#ndk-accessory-quantity-30849').attr('data-price', largAutoporteeAdosseeCortinaVidro[i][1]);
      $('#price_30850').html(' + <s>' + largAutoporteeAdosseeCortinaVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Direito
      $('#ndk-accessory-quantity-30850').attr('data-price', largAutoporteeAdosseeCortinaVidro[i][1]);
      break;
    }
  }

  //Estore ZIP
  for (i = 0; i < largAutoporteeAdosseeEstoreZIP.length; i++) {
    if (heightPE < largAutoporteeAdosseeEstoreZIP[i][0]) {
      var pricedesc = largAutoporteeAdosseeEstoreZIP[i][1] - (largAutoporteeAdosseeEstoreZIP[i][1] * valorReducao);
      $('#price_31015').html(' + <s>' + largAutoporteeAdosseeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Esquerdo
      $('#ndk-accessory-quantity-31015').attr('data-price', largAutoporteeAdosseeEstoreZIP[i][1]);
      $('#price_31016').html(' + <s>' + largAutoporteeAdosseeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Direito
      $('#ndk-accessory-quantity-31016').attr('data-price', largAutoporteeAdosseeEstoreZIP[i][1]);
      break;
    }
  }

});

//Profundidade Adossee
$(document).on('change', '#dimension_text_width_4917,#dimension_text_width_4918,#dimension_text_width_4919,#dimension_text_width_2020,#dimension_text_width_4205,#dimension_text_width_4206', function () {
	var groupvalue = $(this).attr('data-group');
	var heightPE = $('#dimension_text_width_' + groupvalue).val();
  $(".product_2018_0.accessory-ndk.selected-accessory img").trigger('click');
  RemoveField(2251);
  RemoveField(5598);

	//Estore
  if(4917 == groupvalue || 4918 == groupvalue || 4919 == groupvalue ){
    for (i = 0; i < largAutoporteeAdosseeStoreManuel.length; i++) {
      if (heightPE < largAutoporteeAdosseeStoreManuel[i][0]) {
        // $('#price_15102').html(largAutoporteeAdosseeStoreManuel[i][1] + ' €'); //Estore Esquerdo Manual
        // $('#ndk-accessory-quantity-15102').attr('data-price', largAutoporteeAdosseeStoreManuel[i][1]);
        // $('#price_15103').html(largAutoporteeAdosseeStoreManuel[i][1] + ' €'); //Estore Direito Manual
        // $('#ndk-accessory-quantity-15103').attr('data-price', largAutoporteeAdosseeStoreManuel[i][1]);

        break;
      }
    }
  }else{
    for (i = 0; i < largAutoporteeAdosseeStore.length; i++) {
      if (heightPE < largAutoporteeAdosseeStore[i][0]) {
        var pricedesc = largAutoporteeAdosseeStore[i][1]-(largAutoporteeAdosseeStore[i][1]*valorReducao);

        $('#price_15102').html(' + <s>'+largAutoporteeAdosseeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Esquerdo Motorizado
        $('#ndk-accessory-quantity-15102').attr('data-price', largAutoporteeAdosseeStore[i][1]);
        $('#price_15103').html(' + <s>'+largAutoporteeAdosseeStore[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+' € </span>'); //Estore Direito Motorizado
        $('#ndk-accessory-quantity-15103').attr('data-price', largAutoporteeAdosseeStore[i][1]);

        break;
      }
    }
  }

	//Porta-janela de Correr (Menuiserie)
	for (i = 0; i < largAutoporteeMenuiserie.length; i++) {
		if (heightPE < largAutoporteeMenuiserie[i][0]) {
      var pricedesc = largAutoporteeMenuiserie[i][1]-(largAutoporteeMenuiserie[i][1]*valorReducao);
			$('#price_15106').html(' + <s>'+largAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
			$('#ndk-accessory-quantity-15106').attr('data-price', largAutoporteeMenuiserie[i][1]);
			$('#price_15107').html(' + <s>'+largAutoporteeMenuiserie[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Direito
			$('#ndk-accessory-quantity-15107').attr('data-price', largAutoporteeMenuiserie[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian)
	for (i = 0; i < largAutoporteeAdosseeAccordeon.length; i++) {
		if (heightPE < largAutoporteeAdosseeAccordeon[i][0]) {
      var pricedesc = largAutoporteeAdosseeAccordeon[i][1]-(largAutoporteeAdosseeAccordeon[i][1]*valorReducao);
			$('#price_15110').html(' + <s>'+largAutoporteeAdosseeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
			$('#ndk-accessory-quantity-15110').attr('data-price', largAutoporteeAdosseeAccordeon[i][1]);
			$('#price_15111').html(' + <s>'+largAutoporteeAdosseeAccordeon[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
			$('#ndk-accessory-quantity-15111').attr('data-price', largAutoporteeAdosseeAccordeon[i][1]);
			break;
		}
	}

   //Cortina de Vidro
  for (i = 0; i < largAutoporteeAdosseeCortinaVidro.length; i++) {
    if (heightPE < largAutoporteeAdosseeCortinaVidro[i][0]) {
      var pricedesc = largAutoporteeAdosseeCortinaVidro[i][1] - (largAutoporteeAdosseeCortinaVidro[i][1] * valorReducao);
      $('#price_30846').html(' + <s>' + largAutoporteeAdosseeCortinaVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Esquerdo
      $('#ndk-accessory-quantity-30846').attr('data-price', largAutoporteeAdosseeCortinaVidro[i][1]);
      $('#price_30847').html(' + <s>' + largAutoporteeAdosseeCortinaVidro[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Direito
      $('#ndk-accessory-quantity-30847').attr('data-price', largAutoporteeAdosseeCortinaVidro[i][1]);
      break;
    }
  }

  //Estore ZIP
  for (i = 0; i < largAutoporteeAdosseeEstoreZIP.length; i++) {
    if (heightPE < largAutoporteeAdosseeEstoreZIP[i][0]) {
      var pricedesc = largAutoporteeAdosseeEstoreZIP[i][1] - (largAutoporteeAdosseeEstoreZIP[i][1] * valorReducao);
      $('#price_31012').html(' + <s>' + largAutoporteeAdosseeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Esquerdo
      $('#ndk-accessory-quantity-31012').attr('data-price', largAutoporteeAdosseeEstoreZIP[i][1]);
      $('#price_31013').html(' + <s>' + largAutoporteeAdosseeEstoreZIP[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Direito
      $('#ndk-accessory-quantity-31013').attr('data-price', largAutoporteeAdosseeEstoreZIP[i][1]);
      break;
    }
  }

});

//Altura Autoportee Pergola Grandlux Sur Mesure (Pergola Suncontrol)
$(document).on('change', '#dimension_text_width_2013', function () {
	$('#dimension_text_height_2013').val('1');
});

//Altura Adossee Pergola Grandlux Sur Mesure (Pergola Suncontrol)
$(document).on('change', '#dimension_text_width_2021', function () {
	$('#dimension_text_height_2021').val('1');
});

//Altura Grandlux Poteau Deporte Sur Mesure (Pergola Suncontrol PD)
$(document).on('change', '#dimension_text_width_2244', function () {
	$('#dimension_text_height_2244').val('1');
});

//Cor Estrutura Grandlux Poteau Deporte Sur Mesure
// $(document).on('click', ".color-ndk[data-group='2245']", function () {
// 	if (!$(".ndkackFieldItem[data-field='2292']").hasClass('aluclass-disable-div')) {
// 		$("#ndkcsfield_2292").trigger('change');
// 	}
// });

//Largura entre postes Grandlux Poteau Deporte Sur Mesure
$(document).on('change', '#ndkcsfield_2292', function () {

	//Profundidade Standard
	if ($(".ndkackFieldItem[data-field='2243']").is(':visible')) {
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '2243');
	}

	//Profundidade Not Standard
	if ($(".ndkackFieldItem[data-field='4243']").is(':visible')) {
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '4243');
	}

	//Profundidade Other RAL
	if ($(".ndkackFieldItem[data-field='4244']").is(':visible')) {
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '4244');
	}

  //Profundidade Standard Manuel
  if ($(".ndkackFieldItem[data-field='4925']").is(':visible')) {
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '4925');
	}

	//Profundidade Not Standard Manuel
	if ($(".ndkackFieldItem[data-field='4926']").is(':visible')) {
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '4926');
	}

	//Profundidade Other RAL Manuel
	if ($(".ndkackFieldItem[data-field='4927']").is(':visible')) {
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesDP, 'ndkcsfield_2292', '4927');
	}

	ValueGauche = $('#text_2295').val(); //Valor Esquerdo
	ValueDroit = $('#text_2294').val(); //Valor Direito
	console.log(ValueGauche);
	if (0 !== ValueDroit.length && 0 !== ValueGauche.length) {
		if (checkPilares(ValueDroit, ValueGauche, 2294)) {
			HideNDKFieldError(2294);
			HideNDKFieldError(2295);
		}
	}

});

//Deslocamento do pilar esquerdo
$(document).on('change', "#text_2295", function () {
	ValueGauche = $('#text_2295').val();
	if (parseInt(ValueGauche) > 1500) {
		message = '<span class="error alert-danger clear clearfix">Le déport du pilier gauche doit être compris entre 0 mm et 1500 mm.</span>';
		ShowNDKFieldError(2295, message);
	} else {
		ValueDroit = $('#text_2294').val();
		if( "undefined" != typeof ValueDroit){
			if (checkPilares(ValueDroit, ValueGauche, 2295)) {
				HideNDKFieldError(2294);
				HideNDKFieldError(2295);
			}
		}
	}
});

//Deslocamento do pilar direito
$(document).on('change', "#text_2294", function () {
	ValueDroit = $('#text_2294').val();
	if (parseInt(ValueDroit) > 1500) {
		message = '<span class="error alert-danger clear clearfix">Le déport du pilier droit doit être compris entre 0 mm et 1500 mm.</span>';
		ShowNDKFieldError(2294, message);
	} else {
		ValueGauche = $('#text_2295').val();
		if( "undefined" != typeof ValueGauche){
			if (checkPilares(ValueDroit, ValueGauche, 2294)) {
				HideNDKFieldError(2294);
				HideNDKFieldError(2295);
			}
		}
	}
});


// ********** PERGOLA EASY SUR MESURE ********** //

//Largura, Número de Lâminas Simples
var activitiesEASY = [
	[1996, 9],
	[2196, 10],
	[2396, 11],
	[2596, 12],
	[2796, 13],
	[2996, 14],
	[3196, 15],
	[3396, 16],
	[3596, 17],
	[3796, 18],
	[3996, 19],
	[4196, 20],
	[4396, 21],
	[4596, 22],
	[4796, 23],
	[4996, 24],
	[5196, 25],
	[5396, 26],
	[5596, 27],
	[5796, 28],
	[5996, 29],
];

//Largura, Número de Lâminas Duplas
var activitiesEASYDouble = [
  [1994, 9],
  [2191, 10],
  [2389, 11],
  [2587, 12],
  [2784, 13],
  [2982, 14],
  [3180, 15],
  [3378, 16],
  [3575, 17],
  [3773, 18],
  [3971, 19],
  [4168, 20],
  [4366, 21],
  [4564, 22],
  [4761, 23],
  [4959, 24],
  [5157, 25],
  [5355, 26],
  [5552, 27],
  [5750, 28],
  [5948, 29],
];

/* AUTOPORTÉE */
$(document).on('click', ".color-ndk[data-group='4864'], .img-value-4876, .color-ndk[data-group='5166']", function () {
//   if (!$(".ndkackFieldItem[data-field='4883']").hasClass('aluclass-disable-div')) {
//     $("#ndkcsfield_4883").trigger('change');
//  }
//  if (!$(".ndkackFieldItem[data-field='4872']").hasClass('aluclass-disable-div')) {
//    $("#ndkcsfield_4872").trigger('change');
//  }
 $('.product_4877_0.accessory-ndk.selected-accessory img').trigger('click');
 RemoveField(4881);
 RemoveField(5587);
});

$(document).on('change', "#ndkcsfield_4883, #ndkcsfield_4871, #ndkcsfield_5171, #ndkcsfield_5172", function () {
  $('.product_4877_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(4881);
  RemoveField(5587);
 });

/* ADOSSÉE */
$(document).on('click', ".color-ndk[data-group='4865'], .img-value-4882, .color-ndk[data-group='5151']", function () {
  // if (!$(".ndkackFieldItem[data-field='4884']").hasClass('aluclass-disable-div')) {
  //   $("#ndkcsfield_4884").trigger('change');
  // }
  // if (!$(".ndkackFieldItem[data-field='4872']").hasClass('aluclass-disable-div')) {
  // $("#ndkcsfield_4872").trigger('change');
  // }
  $('.product_4878_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(4879);
  RemoveField(5587);
});

$(document).on('change', "#ndkcsfield_4884, #ndkcsfield_4872, #ndkcsfield_5156, #ndkcsfield_5157", function () {
  $('.product_4878_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(4879);
  RemoveField(5587);
});

 //Largura FRETRAS Lâmina Simples

    //Largura, Preço Estore Motorizado, Número de Folhas
    var profAdosseeAutoporteeStoreEASY = [
      [1996, 979, '2 Vantaux'],
      [2196, 1008, '2 Vantaux'],
      [2396, 1036, '2 Vantaux'],
      [2596, 1065, '2 Vantaux'],
      [2796, 1094, '2 Vantaux'],
      [2996, 1122, '2 Vantaux'],
      [3196, 1151, '4 Vantaux'],
      [3396, 1179, '4 Vantaux'],
      [3596, 1208, '4 Vantaux'],
      [3796, 1237, '4 Vantaux'],
      [3996, 1266, '4 Vantaux'],
      [4196, 1295, '4 Vantaux'],
      [4396, 1323, '4 Vantaux'],
      [4596, 1352, '4 Vantaux'],
      [4796, 1382, '4 Vantaux'],
      [4996, 1411, '4 Vantaux'],
      [5196, 1440, '4 Vantaux'],
      [5396, 1469, '4 Vantaux'],
      [5596, 1496, '4 Vantaux'],
      [5796, 1525, '4 Vantaux'],
      [5996, 1551, '4 Vantaux'],
    ];

    //Largura, Preço Estore Manual, Número de Folhas
    var profAdosseeAutoporteeStoreManualEASY = [
      [1996, 756, '2 Vantaux'],
      [2196, 782, '2 Vantaux'],
      [2396, 809, '2 Vantaux'],
      [2596, 835, '2 Vantaux'],
      [2796, 861, '2 Vantaux'],
      [2996, 886, '2 Vantaux'],
      [3196, 913, '4 Vantaux'],
      [3396, 936, '4 Vantaux'],
      [3596, 965, '4 Vantaux'],
      [3796, 991, '4 Vantaux'],
      [3996, 1018, '4 Vantaux'],
      [4196, 1044, '4 Vantaux'],
      [4396, 1070, '4 Vantaux'],
      [4596, 1097, '4 Vantaux'],
      [4796, 1123, '4 Vantaux'],
      [4996, 1149, '4 Vantaux'],
      [5196, 1176, '4 Vantaux'],
      [5396, 1202, '4 Vantaux'],
      [5596, 1202, '4 Vantaux'],
      [5796, 1253, '4 Vantaux'],
      [5996, 1253, '4 Vantaux'],
    ];

    //Largura, Preço Porta-Janela de Correr (Menuiserie), Número de Folhas
    var profAutoporteeMenuiserieEASY = [
      [1996, 2096, '2 Vantaux'],
      [2196, 2238, '2 Vantaux'],
      [2396, 2380, '2 Vantaux'],
      [2596, 2522, '2 Vantaux'],
      [2796, 2664, '2 Vantaux'],
      [2996, 2804, '2 Vantaux'],
      [3196, 2946, '4 Vantaux'],
      [3396, 3090, '4 Vantaux'],
      [3596, 3231, '4 Vantaux'],
      [3796, 3373, '4 Vantaux'],
      [3996, 3515, '4 Vantaux'],
      [4196, 4039, '4 Vantaux'],
      [4396, 4203, '4 Vantaux'],
      [4596, 4365, '4 Vantaux'],
      [4796, 4527, '4 Vantaux'],
      [4996, 4691, '4 Vantaux'],
      [5196, 4852, '4 Vantaux'],
      [5396, 5015, '4 Vantaux'],
      [5596, 5177, '4 Vantaux'],
      [5796, 5340, '4 Vantaux'],
      [5996, 5503, '4 Vantaux'],
    ];

    //Largura, Preço Porta Accordeon (Ocardian), Número de Folhas
    var profAutoporteeAccordeonEASY = [
      [1996, 2889, '2 Vantaux'],
      [2196, 3336, '2 Vantaux'],
      [2396, 3498, '2 Vantaux'],
      [2596, 3661, '2 Vantaux'],
      [2796, 3823, '2 Vantaux'],
      [2996, 4987, '2 Vantaux'],
      [3196, 5159, '4 Vantaux'],
      [3396, 5332, '4 Vantaux'],
      [3596, 5405, '4 Vantaux'],
      [3796, 5568, '4 Vantaux'],
      [3996, 5731, '4 Vantaux'],
      [4196, 5891, '4 Vantaux'],
      [4396, 6053, '4 Vantaux'],
      [4596, 6215, '4 Vantaux'],
      [4796, 6377, '4 Vantaux'],
      [4996, 6538, '4 Vantaux'],
      [5196, 6700, '4 Vantaux'],
      [5396, 6862, '4 Vantaux'],
      [5596, 7024, '4 Vantaux'],
      [5796, 7185, '4 Vantaux'],
      [5996, 7347, '4 Vantaux'],
    ];

     //Largura, Preço Cortina de Vidro, Número de Folhas
    var profAutoporteeCortinaVidroEASY = [
      [1996, 1867, '2 Vantaux'],
      [2196, 2017, '2 Vantaux'],
      [2396, 2167, '2 Vantaux'],
      [2596, 2318, '2 Vantaux'],
      [2796, 2468, '2 Vantaux'],
      [2996, 2619, '2 Vantaux'],
      [3196, 2769, '4 Vantaux'],
      [3396, 2918, '4 Vantaux'],
      [3596, 3070, '4 Vantaux'],
      [3796, 3221, '4 Vantaux'],
      [3996, 3536, '4 Vantaux'],
      [4196, 3689, '4 Vantaux'],
      [4396, 3839, '4 Vantaux'],
      [4596, 3990, '4 Vantaux'],
      [4796, 4141, '4 Vantaux'],
      [4996, 4293, '4 Vantaux'],
      [5196, 4679, '4 Vantaux'],
      [5396, 4833, '4 Vantaux'],
      [5596, 4983, '4 Vantaux'],
      [5796, 5134, '4 Vantaux'],
      [5996, 5285, '4 Vantaux'],
    ];

    //Largura, Preço Estore ZIP, Número de Folhas
    var profAutoporteeEstoreZIPEASY = [
      [1996, 5297, '2 Vantaux'],
      [2196, 5436, '2 Vantaux'],
      [2396, 5569, '2 Vantaux'],
      [2596, 5708, '2 Vantaux'],
      [2796, 5848, '2 Vantaux'],
      [2996, 5987, '2 Vantaux'],
      [3196, 6133, '4 Vantaux'],
      [3396, 6272, '4 Vantaux'],
      [3596, 6414, '4 Vantaux'],
      [3796, 6557, '4 Vantaux'],
      [3996, 6772, '4 Vantaux'],
      [4196, 6991, '4 Vantaux'],
      [4396, 7207, '4 Vantaux'],
      [4596, 7425, '4 Vantaux'],
      [4796, 7641, '4 Vantaux'],
      [4996, 7860, '4 Vantaux'],
      [5196, 8075, '4 Vantaux'],
      [5396, 8297, '4 Vantaux'],
      [5596, 8513, '4 Vantaux'],
      [5796, 8728, '4 Vantaux'],
      [5996, 8947, '4 Vantaux'],
    ];

    //Largura FRETRAS Lâmina Dupla

    //Largura, Preço Estore Motorizado, Número de Folhas
    var profAdosseeAutoporteeStoreEASYDouble = [
      [1994, 979, '2 Vantaux'],
      [2191, 1008, '2 Vantaux'],
      [2389, 1036, '2 Vantaux'],
      [2587, 1065, '2 Vantaux'],
      [2784, 1094, '2 Vantaux'],
      [2982, 1122, '2 Vantaux'],
      [3180, 1151, '4 Vantaux'],
      [3378, 1179, '4 Vantaux'],
      [3575, 1208, '4 Vantaux'],
      [3773, 1237, '4 Vantaux'],
      [3971, 1266, '4 Vantaux'],
      [4168, 1295, '4 Vantaux'],
      [4366, 1323, '4 Vantaux'],
      [4564, 1352, '4 Vantaux'],
      [4761, 1382, '4 Vantaux'],
      [4959, 1411, '4 Vantaux'],
      [5157, 1440, '4 Vantaux'],
      [5355, 1469, '4 Vantaux'],
      [5552, 1496, '4 Vantaux'],
      [5750, 1525, '4 Vantaux'],
      [5948, 1551, '4 Vantaux'],
    ];

    //Largura, Preço Estore Manual, Número de Folhas
    var profAdosseeAutoporteeStoreManualEASYDouble = [
      [1994, 756, '2 Vantaux'],
      [2191, 782, '2 Vantaux'],
      [2389, 809, '2 Vantaux'],
      [2587, 835, '2 Vantaux'],
      [2784, 861, '2 Vantaux'],
      [2982, 886, '2 Vantaux'],
      [3180, 913, '4 Vantaux'],
      [3378, 936, '4 Vantaux'],
      [3575, 965, '4 Vantaux'],
      [3773, 991, '4 Vantaux'],
      [3971, 1018, '4 Vantaux'],
      [4168, 1044, '4 Vantaux'],
      [4366, 1070, '4 Vantaux'],
      [4564, 1097, '4 Vantaux'],
      [4761, 1123, '4 Vantaux'],
      [4959, 1149, '4 Vantaux'],
      [5157, 1176, '4 Vantaux'],
      [5355, 1202, '4 Vantaux'],
      [5552, 1202, '4 Vantaux'],
      [5750, 1253, '4 Vantaux'],
      [5948, 1253, '4 Vantaux'],
    ];

    //Largura, Preço Porta-Janela de Correr (Menuiserie), Número de Folhas
    var profAutoporteeMenuiserieEASYDouble = [
      [1994, 2096, '2 Vantaux'],
      [2191, 2238, '2 Vantaux'],
      [2389, 2380, '2 Vantaux'],
      [2587, 2522, '2 Vantaux'],
      [2784, 2664, '2 Vantaux'],
      [2982, 2804, '2 Vantaux'],
      [3180, 2946, '4 Vantaux'],
      [3378, 3090, '4 Vantaux'],
      [3575, 3231, '4 Vantaux'],
      [3773, 3373, '4 Vantaux'],
      [3971, 3515, '4 Vantaux'],
      [4168, 4039, '4 Vantaux'],
      [4366, 4203, '4 Vantaux'],
      [4564, 4365, '4 Vantaux'],
      [4761, 4527, '4 Vantaux'],
      [4959, 4691, '4 Vantaux'],
      [5157, 4852, '4 Vantaux'],
      [5355, 5015, '4 Vantaux'],
      [5552, 5177, '4 Vantaux'],
      [5750, 5340, '4 Vantaux'],
      [5948, 5503, '4 Vantaux'],
    ];

    //Largura, Preço Porta Accordeon (Ocardian), Número de Folhas
    var profAutoporteeAccordeonEASYDouble = [
      [1994, 2889, '2 Vantaux'],
      [2191, 3336, '2 Vantaux'],
      [2389, 3498, '2 Vantaux'],
      [2587, 3661, '2 Vantaux'],
      [2784, 3823, '2 Vantaux'],
      [2982, 4987, '2 Vantaux'],
      [3180, 5159, '4 Vantaux'],
      [3378, 5332, '4 Vantaux'],
      [3575, 5405, '4 Vantaux'],
      [3773, 5568, '4 Vantaux'],
      [3971, 5731, '4 Vantaux'],
      [4168, 5891, '4 Vantaux'],
      [4366, 6053, '4 Vantaux'],
      [4564, 6215, '4 Vantaux'],
      [4761, 6377, '4 Vantaux'],
      [4959, 6538, '4 Vantaux'],
      [5157, 6700, '4 Vantaux'],
      [5355, 6862, '4 Vantaux'],
      [5552, 7024, '4 Vantaux'],
      [5750, 7185, '4 Vantaux'],
      [5948, 7347, '4 Vantaux'],
    ];

     //Largura, Preço Cortina de Vidro, Número de Folhas
    var profAutoporteeCortinaVidroEASYDouble = [
      [1994, 1867, '2 Vantaux'],
      [2191, 2017, '2 Vantaux'],
      [2389, 2167, '2 Vantaux'],
      [2587, 2318, '2 Vantaux'],
      [2784, 2468, '2 Vantaux'],
      [2982, 2619, '2 Vantaux'],
      [3180, 2769, '4 Vantaux'],
      [3378, 2918, '4 Vantaux'],
      [3575, 3070, '4 Vantaux'],
      [3773, 3221, '4 Vantaux'],
      [3971, 3536, '4 Vantaux'],
      [4168, 3689, '4 Vantaux'],
      [4366, 3839, '4 Vantaux'],
      [4564, 3990, '4 Vantaux'],
      [4761, 4141, '4 Vantaux'],
      [4959, 4293, '4 Vantaux'],
      [5157, 4679, '4 Vantaux'],
      [5355, 4833, '4 Vantaux'],
      [5552, 4983, '4 Vantaux'],
      [5750, 5134, '4 Vantaux'],
      [5948, 5285, '4 Vantaux'],
    ];

    //Largura, Preço Estore ZIP, Número de Folhas
    var profAutoporteeEstoreZIPEASYDouble = [
      [1994, 5297, '2 Vantaux'],
      [2191, 5436, '2 Vantaux'],
      [2389, 5569, '2 Vantaux'],
      [2587, 5708, '2 Vantaux'],
      [2784, 5848, '2 Vantaux'],
      [2982, 5987, '2 Vantaux'],
      [3180, 6133, '4 Vantaux'],
      [3378, 6272, '4 Vantaux'],
      [3575, 6414, '4 Vantaux'],
      [3773, 6557, '4 Vantaux'],
      [3971, 6772, '4 Vantaux'],
      [4168, 6991, '4 Vantaux'],
      [4366, 7207, '4 Vantaux'],
      [4564, 7425, '4 Vantaux'],
      [4761, 7641, '4 Vantaux'],
      [4959, 7860, '4 Vantaux'],
      [5157, 8075, '4 Vantaux'],
      [5355, 8297, '4 Vantaux'],
      [5552, 8513, '4 Vantaux'],
      [5750, 8728, '4 Vantaux'],
      [5948, 8947, '4 Vantaux'],
    ];

// ********** PERGOLA EASY ADOSSEE SUR MESURE MANUELLE ********** //
//Largura (Número de Lâminas)
$(document).on('change', '#ndkcsfield_4884, #ndkcsfield_5156', function () {
	var heightPE = 0;
	var idGroupNDK = 0;

	//Profundidade Manuelle RAL Standard Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4896']").is(':visible')) {
		idGroupNDK = 4896;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4884', '4896');
	}

	//Profundidade Manuelle RAL Not Standard Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4899']").is(':visible')) {
		idGroupNDK = 4899;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4884', '4899');
	}

	//Profundidade Manuelle Other RAL Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4900']").is(':visible')) {
		idGroupNDK = 4900;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4884', '4900');
	}

  //Profundidade Manuelle RAL Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5158']").is(':visible')) {
    idGroupNDK = 5158;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5156', '5158');
  }

  //Profundidade Manuelle RAL Not Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5159']").is(':visible')) {
    idGroupNDK = 5159;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5156', '5159');
  }

  //Profundidade Manuelle Other RAL Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5160']").is(':visible')) {
    idGroupNDK = 5160;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5156', '5160');
  }

	//Estore Lâmina Simples
  for (i = 0; i < profAdosseeAutoporteeStoreManualEASY.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreManualEASY[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreManualEASY[i][1]-(profAdosseeAutoporteeStoreManualEASY[i][1]*valorReducao);
      $('#price_28274').html(' + <s>'+profAdosseeAutoporteeStoreManualEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Manual
      $('#ndk-accessory-quantity-28274').attr('data-price', profAdosseeAutoporteeStoreManualEASY[i][1]);

      break;
    }
  }

	//Porta-Janela de Correr (Menuiserie) Lâmina Simples
	for (i = 0; i < profAutoporteeMenuiserieEASY.length; i++) {
		if (heightPE == profAutoporteeMenuiserieEASY[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASY[i][1]-(profAutoporteeMenuiserieEASY[i][1]*valorReducao);
			$('#price_28277').html(' + <s>'+profAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
			$('#ndk-accessory-quantity-28277').attr('data-price', profAutoporteeMenuiserieEASY[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian) Lâmina Simples
	for (i = 0; i < profAutoporteeAccordeonEASY.length; i++) {
		if (heightPE == profAutoporteeAccordeonEASY[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASY[i][1]-(profAutoporteeAccordeonEASY[i][1]*valorReducao);
			$('#price_28280').html(' + <s>'+profAutoporteeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
			$('#ndk-accessory-quantity-28280').attr('data-price', profAutoporteeAccordeonEASY[i][1]);
			break;
		}
	}

	for (i = 0; i < activitiesEASY.length; i++) {
		if (heightPE == activitiesEASY[i][0]) {
			$("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASY[i][1] + " </p>");
			break;
		}
	}

  //Estore Lâmina Dupla
  for (i = 0; i < profAdosseeAutoporteeStoreManualEASYDouble.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreManualEASYDouble[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreManualEASYDouble[i][1]-(profAdosseeAutoporteeStoreManualEASYDouble[i][1]*valorReducao);
      $('#price_28274').html(' + <s>'+profAdosseeAutoporteeStoreManualEASYDouble[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Manual
      $('#ndk-accessory-quantity-28274').attr('data-price', profAdosseeAutoporteeStoreManualEASYDouble[i][1] );
      break;
    }
  }

  //Porta-Janela de Correr (Menuiserie) Lâmina Dupla
  for (i = 0; i < profAutoporteeMenuiserieEASYDouble.length; i++) {
    if (heightPE == profAutoporteeMenuiserieEASYDouble[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASYDouble[i][1]-(profAutoporteeMenuiserieEASYDouble[i][1]*valorReducao);
      $('#price_28277').html(' + <s>'+profAutoporteeMenuiserieEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
      $('#ndk-accessory-quantity-28277').attr('data-price', profAutoporteeMenuiserieEASYDouble[i][1]);
      break;
    }
  }

  //Porta Accordeon (Ocardian) Lâmina Dupla
  for (i = 0; i < profAutoporteeAccordeonEASYDouble.length; i++) {
    if (heightPE == profAutoporteeAccordeonEASYDouble[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASYDouble[i][1]-(profAutoporteeAccordeonEASYDouble[i][1]*valorReducao);
      $('#price_28280').html(' + <s>'+profAutoporteeAccordeonEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
      $('#ndk-accessory-quantity-28280').attr('data-price', profAutoporteeAccordeonEASYDouble[i][1]);
      break;
    }
  }

  for (i = 0; i < activitiesEASYDouble.length; i++) {
    if (heightPE == activitiesEASYDouble[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASYDouble[i][1] + " </p>");
      break;
    }
  }
});

// ********** PERGOLA EASY ADOSSEE SUR MESURE MOTORISEE ********** //
//Largura (Número de Lâminas)
$(document).on('change', '#ndkcsfield_4872, #ndkcsfield_5157', function () {
	var heightPE = 0;
	var idGroupNDK = 0;

  //Profundidade Motorisee RAL Not Standard Lâmina Simples
  if ($(".ndkackFieldItem[data-field='4891']").is(':visible')) {
		idGroupNDK = 4891;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4872', '4891');
	}

	//Profundidade Motorisee Other RAL Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4892']").is(':visible')) {
		idGroupNDK = 4892;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4872', '4892');
	}

	//Profundidade Motorisee RAL Standard Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4894']").is(':visible')) {
		idGroupNDK = 4894;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4872', '4894');
	}

  //Profundidade Motorisee RAL Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5161']").is(':visible')) {
    idGroupNDK = 5161;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5157', '5161');
  }

  //Profundidade Motorisee RAL Not Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5162']").is(':visible')) {
    idGroupNDK = 5162;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5157', '5162');
  }

  //Profundidade Motorisee Other RAL Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5163']").is(':visible')) {
    idGroupNDK = 5163;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5157', '5163');
  }

  //Estore Lâmina Simples
  for (i = 0; i < profAdosseeAutoporteeStoreEASY.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreEASY[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreEASY[i][1]-(profAdosseeAutoporteeStoreEASY[i][1]*valorReducao);
      $('#price_28274').html(' + <s>'+profAdosseeAutoporteeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Motorizado
      $('#ndk-accessory-quantity-28274').attr('data-price', profAdosseeAutoporteeStoreEASY[i][1]);
      //$('#descriptionimg_28274').html('Store Vertical Façade Avant'); //Estore Vertical Manual Fachada Frontal
      //$("li[data-id-value='28274']").attr('title', 'Store Vertical Façade Avant');
      //$("li[data-id-value='28274']").attr('data-value', 'Store Vertical Façade Avant');
      break;
    }
  }

	//Porta-Janela de Correr (Menuiserie) Lâmina Simples
	for (i = 0; i < profAutoporteeMenuiserieEASY.length; i++) {
		if (heightPE == profAutoporteeMenuiserieEASY[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASY[i][1]-(profAutoporteeMenuiserieEASY[i][1]*valorReducao);
			$('#price_28277').html(' + <s>'+profAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
			$('#ndk-accessory-quantity-28277').attr('data-price', profAutoporteeMenuiserieEASY[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian) Lâmina Simples
	for (i = 0; i < profAutoporteeAccordeonEASY.length; i++) {
		if (heightPE == profAutoporteeAccordeonEASY[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASY[i][1]-(profAutoporteeAccordeonEASY[i][1]*valorReducao);
			$('#price_28280').html(' + <s>'+profAutoporteeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');  //Accordeon Frente
			$('#ndk-accessory-quantity-28280').attr('data-price', profAutoporteeAccordeonEASY[i][1]);
			break;
		}
	}

  //Cortina de Vidro Lâmina Simples
  for (i = 0; i < profAutoporteeCortinaVidroEASY.length; i++) {
    if (heightPE == profAutoporteeCortinaVidroEASY[i][0]) {
      var pricedesc = profAutoporteeCortinaVidroEASY[i][1] - (profAutoporteeCortinaVidroEASY[i][1] * valorReducao);
      $('#price_30838').html(' + <s>' + profAutoporteeCortinaVidroEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Frente
      $('#ndk-accessory-quantity-30838').attr('data-price', profAutoporteeCortinaVidroEASY[i][1]);
      break;
    }
  }

  //Estore ZIP Lâmina Simples
  for (i = 0; i < profAutoporteeEstoreZIPEASY.length; i++) {
    if (heightPE == profAutoporteeEstoreZIPEASY[i][0]) {
      var pricedesc = profAutoporteeEstoreZIPEASY[i][1] - (profAutoporteeEstoreZIPEASY[i][1] * valorReducao);
      $('#price_30937').html(' + <s>' + profAutoporteeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Frente
      $('#ndk-accessory-quantity-30937').attr('data-price', profAutoporteeEstoreZIPEASY[i][1]);
      break;
    }
  }

	for (i = 0; i < activitiesEASY.length; i++) {
		if (heightPE == activitiesEASY[i][0]) {
			$("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASY[i][1] + " </p>");
			break;
		}
	}

   //Estore Lâmina Dupla
   for (i = 0; i < profAdosseeAutoporteeStoreEASYDouble.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreEASYDouble[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreEASYDouble[i][1]-(profAdosseeAutoporteeStoreEASYDouble[i][1]*valorReducao);
      $('#price_28274').html(' + <s>'+profAdosseeAutoporteeStoreEASYDouble[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Motorizado
      $('#ndk-accessory-quantity-28274').attr('data-price', profAdosseeAutoporteeStoreEASYDouble[i][1]);
      break;
    }
  }

  //Porta-Janela de Correr (Menuiserie) Lâmina Dupla
  for (i = 0; i < profAutoporteeMenuiserieEASYDouble.length; i++) {
    if (heightPE == profAutoporteeMenuiserieEASYDouble[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASYDouble[i][1]-(profAutoporteeMenuiserieEASYDouble[i][1]*valorReducao);
      $('#price_28277').html(' + <s>'+profAutoporteeMenuiserieEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');  //Menuiserie Frente
      $('#ndk-accessory-quantity-28277').attr('data-price', profAutoporteeMenuiserieEASYDouble[i][1]);
      break;
    }
  }

  //Porta Accordeon (Ocardian) Lâmina Dupla
  for (i = 0; i < profAutoporteeAccordeonEASYDouble.length; i++) {
    if (heightPE == profAutoporteeAccordeonEASYDouble[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASYDouble[i][1]-(profAutoporteeAccordeonEASYDouble[i][1]*valorReducao);
      $('#price_28280').html(' + <s>'+profAutoporteeAccordeonEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>');  //Accordeon Frente
      $('#ndk-accessory-quantity-28280').attr('data-price', profAutoporteeAccordeonEASYDouble[i][1]);
      break;
    }
  }

  //Cortina de Vidro Lâmina Dupla
  for (i = 0; i < profAutoporteeCortinaVidroEASYDouble.length; i++) {
    if (heightPE == profAutoporteeCortinaVidroEASYDouble[i][0]) {
      var pricedesc = profAutoporteeCortinaVidroEASYDouble[i][1] - (profAutoporteeCortinaVidroEASYDouble[i][1] * valorReducao);
      $('#price_30838').html(' + <s>' + profAutoporteeCortinaVidroEASYDouble[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>');  //Cortina de Vidro Frente
      $('#ndk-accessory-quantity-30838').attr('data-price', profAutoporteeCortinaVidroEASYDouble[i][1]);
      break;
    }
  }

  //Estore ZIP Lâmina Dupla
  for (i = 0; i < profAutoporteeEstoreZIPEASYDouble.length; i++) {
    if (heightPE == profAutoporteeEstoreZIPEASYDouble[i][0]) {
      var pricedesc = profAutoporteeEstoreZIPEASYDouble[i][1] - (profAutoporteeEstoreZIPEASYDouble[i][1] * valorReducao);
      $('#price_30937').html(' + <s>' + profAutoporteeEstoreZIPEASYDouble[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>');  //Estore ZIP Frente
      $('#ndk-accessory-quantity-30937').attr('data-price', profAutoporteeEstoreZIPEASYDouble[i][1]);
      break;
    }
  }

  for (i = 0; i < activitiesEASYDouble.length; i++) {
    if (heightPE == activitiesEASYDouble[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASYDouble[i][1] + " </p>");
      break;
    }
  }
});

// ********** PERGOLA EASY AUTOPORTEE SUR MESURE MANUELLE ********** //
//Largura (Número de Lâminas)
$(document).on('change', '#ndkcsfield_4883, #ndkcsfield_5171', function () {
	var heightPE = 0;
	var idGroupNDK = 0;

	//Profundidade Manuelle RAL Standard Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4895']").is(':visible')) {
		idGroupNDK = 4895;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4883', '4895');
	}

	//Profundidade Manuelle RAL Not Standard Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4898']").is(':visible')) {
		idGroupNDK = 4898;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4883', '4898');
	}

	//Profundidade Manuelle Other RAL Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4897']").is(':visible')) {
		idGroupNDK = 4897;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4883', '4897');
	}

  //Profundidade Manuelle RAL Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5173']").is(':visible')) {
    idGroupNDK = 5173;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5171', '5173');
  }

  //Profundidade Manuelle RAL Not Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5174']").is(':visible')) {
    idGroupNDK = 5174;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5171', '5174');
  }

  //Profundidade Manuelle Other RAL Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5175']").is(':visible')) {
    idGroupNDK = 5175;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5171', '5175');
  }

  //Estore Lâmina Simples
  for (i = 0; i < profAdosseeAutoporteeStoreManualEASY.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreManualEASY[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreManualEASY[i][1]-(profAdosseeAutoporteeStoreManualEASY[i][1]*valorReducao);
      $('#price_28262').html(' + <s>'+profAdosseeAutoporteeStoreManualEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Manual
      $('#ndk-accessory-quantity-28262').attr('data-price', profAdosseeAutoporteeStoreManualEASY[i][1]);

      $('#price_28263').html(' + <s>'+profAdosseeAutoporteeStoreManualEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Atrás Manual
      $('#ndk-accessory-quantity-28263').attr('data-price', profAdosseeAutoporteeStoreManualEASY[i][1]);

      break;
    }
  }

	//Porta-Janela de Correr (Menuiserie) Lâmina Simples
	for (i = 0; i < profAutoporteeMenuiserieEASY.length; i++) {
		if (heightPE == profAutoporteeMenuiserieEASY[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASY[i][1]-(profAutoporteeMenuiserieEASY[i][1]*valorReducao);
			$('#price_28266').html(' + <s>'+profAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
			$('#ndk-accessory-quantity-28266').attr('data-price', profAutoporteeMenuiserieEASY[i][1]);
      $('#price_28267').html(' + <s>'+profAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Atrás
			$('#ndk-accessory-quantity-28267').attr('data-price', profAutoporteeMenuiserieEASY[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian) Lâmina Simples
	for (i = 0; i < profAutoporteeAccordeonEASY.length; i++) {
		if (heightPE == profAutoporteeAccordeonEASY[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASY[i][1]-(profAutoporteeAccordeonEASY[i][1]*valorReducao);
			$('#price_28270').html(' + <s>'+profAutoporteeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
			$('#ndk-accessory-quantity-28270').attr('data-price', profAutoporteeAccordeonEASY[i][1]);
      $('#price_28271').html(' + <s>'+profAutoporteeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Atrás
			$('#ndk-accessory-quantity-28271').attr('data-price', profAutoporteeAccordeonEASY[i][1]);
			break;
		}
	}

	for (i = 0; i < activitiesEASY.length; i++) {
		if (heightPE == activitiesEASY[i][0]) {
			$("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASY[i][1] + " </p>");
			break;
		}
	}

  //Estore Lâmina Dupla
  for (i = 0; i < profAdosseeAutoporteeStoreManualEASYDouble.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreManualEASYDouble[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreManualEASYDouble[i][1]-(profAdosseeAutoporteeStoreManualEASYDouble[i][1]*valorReducao);
      $('#price_28262').html(' + <s>'+profAdosseeAutoporteeStoreManualEASYDouble[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Manual
      $('#ndk-accessory-quantity-28262').attr('data-price', profAdosseeAutoporteeStoreManualEASYDouble[i][1]);
      $('#price_28263').html(' + <s>'+profAdosseeAutoporteeStoreManualEASYDouble[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Atrás Manual
      $('#ndk-accessory-quantity-28263').attr('data-price', profAdosseeAutoporteeStoreManualEASYDouble[i][1]);
      break;
    }
  }

  //Porta-Janela de Correr (Menuiserie) Lâmina Dupla
  for (i = 0; i < profAutoporteeMenuiserieEASYDouble.length; i++) {
    if (heightPE == profAutoporteeMenuiserieEASYDouble[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASYDouble[i][1]-(profAutoporteeMenuiserieEASYDouble[i][1]*valorReducao);
      $('#price_28266').html(' + <s>'+profAutoporteeMenuiserieEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
      $('#ndk-accessory-quantity-28266').attr('data-price', profAutoporteeMenuiserieEASYDouble[i][1]);
      $('#price_28267').html(' + <s>'+profAutoporteeMenuiserieEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Atrás
      $('#ndk-accessory-quantity-28267').attr('data-price', profAutoporteeMenuiserieEASYDouble[i][1]);
      break;
    }
  }

  //Porta Accordeon (Ocardian) Lâmina Dupla
  for (i = 0; i < profAutoporteeAccordeonEASYDouble.length; i++) {
    if (heightPE == profAutoporteeAccordeonEASYDouble[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASYDouble[i][1]-(profAutoporteeAccordeonEASYDouble[i][1]*valorReducao);
      $('#price_28270').html(' + <s>'+profAutoporteeAccordeonEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
      $('#ndk-accessory-quantity-28270').attr('data-price', profAutoporteeAccordeonEASYDouble[i][1]);
      $('#price_28271').html(' + <s>'+profAutoporteeAccordeonEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Atrás
      $('#ndk-accessory-quantity-28271').attr('data-price', profAutoporteeAccordeonEASYDouble[i][1]);
      break;
    }
  }

  for (i = 0; i < activitiesEASYDouble.length; i++) {
    if (heightPE == activitiesEASYDouble[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASYDouble[i][1] + " </p>");
      break;
    }
  }
});

// ********** PERGOLA EASY AUTOPORTEE SUR MESURE MOTORISEE ********** //
//Largura Nnúmero de Lâminas)
$(document).on('change', '#ndkcsfield_4871, #ndkcsfield_5172', function () {
	var heightPE = 0;
	var idGroupNDK = 0;

	//Profundidade Motorisee RAL Standard Lâmina Simples
  if ($(".ndkackFieldItem[data-field='4893']").is(':visible')) {
		idGroupNDK = 4893;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4871', '4893');
	}

	//Profundidade Motorisee RAL Not Standard Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4890']").is(':visible')) {
		idGroupNDK = 4890;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4871', '4890');
	}

	//Profundidade Motorisee Other RAL Lâmina Simples
	if ($(".ndkackFieldItem[data-field='4889']").is(':visible')) {
		idGroupNDK = 4889;
		heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASY, 'ndkcsfield_4871', '4889');
	}

  //Profundidade Motorisee RAL Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5176']").is(':visible')) {
    idGroupNDK = 5176;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5172', '5176');
  }

  //Profundidade Motorisee RAL Not Standard Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5177']").is(':visible')) {
    idGroupNDK = 5177;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5172', '5177');
  }

  //Profundidade Motorisee Other RAL Lâmina Dupla
  if ($(".ndkackFieldItem[data-field='5178']").is(':visible')) {
    idGroupNDK = 5178;
    heightPE = PregolaGrandLuxLarguraProfundidade(activitiesEASYDouble, 'ndkcsfield_5172', '5178');
  }

  //Estore Lâmina Simples
  for (i = 0; i < profAdosseeAutoporteeStoreEASY.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreEASY[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreEASY[i][1]-(profAdosseeAutoporteeStoreEASY[i][1]*valorReducao);
      $('#price_28262').html(' + <s>'+profAdosseeAutoporteeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Motorizado
      $('#ndk-accessory-quantity-28262').attr('data-price', profAdosseeAutoporteeStoreEASY[i][1]);
      $('#price_28263').html(' + <s>'+profAdosseeAutoporteeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Atrás Motorizado
      $('#ndk-accessory-quantity-28263').attr('data-price', profAdosseeAutoporteeStoreEASY[i][1]);

      break;
    }
  }

	//Porta-Janela de Correr (Menuiserie) Lâmina Simples
	for (i = 0; i < profAutoporteeMenuiserieEASY.length; i++) {
		if (heightPE == profAutoporteeMenuiserieEASY[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASY[i][1]-(profAutoporteeMenuiserieEASY[i][1]*valorReducao);
			$('#price_28266').html(' + <s>'+profAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
			$('#ndk-accessory-quantity-28266').attr('data-price', profAutoporteeMenuiserieEASY[i][1]);
      $('#price_28267').html(' + <s>'+profAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Atrás
			$('#ndk-accessory-quantity-28267').attr('data-price', profAutoporteeMenuiserieEASY[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian) Lâmina Simples
	for (i = 0; i < profAutoporteeAccordeonEASY.length; i++) {
		if (heightPE == profAutoporteeAccordeonEASY[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASY[i][1]-(profAutoporteeAccordeonEASY[i][1]*valorReducao);
			$('#price_28270').html(' + <s>'+profAutoporteeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
			$('#ndk-accessory-quantity-28270').attr('data-price', profAutoporteeAccordeonEASY[i][1]);
      $('#price_28271').html(' + <s>'+profAutoporteeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Atrás
			$('#ndk-accessory-quantity-28270').attr('data-price', profAutoporteeAccordeonEASY[i][1]);
			break;
		}
	}

  //Cortina de Vidro Lâmina Simples
  for (i = 0; i < profAutoporteeCortinaVidroEASY.length; i++) {
    if (heightPE == profAutoporteeCortinaVidroEASY[i][0]) {
      var pricedesc = profAutoporteeCortinaVidroEASY[i][1] - (profAutoporteeCortinaVidroEASY[i][1] * valorReducao);
      $('#price_30844').html(' + <s>' + profAutoporteeCortinaVidroEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Frente
      $('#ndk-accessory-quantity-30844').attr('data-price', profAutoporteeCortinaVidroEASY[i][1]);
      $('#price_30845').html(' + <s>' + profAutoporteeCortinaVidroEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Atrás
      $('#ndk-accessory-quantity-30845').attr('data-price', profAutoporteeCortinaVidroEASY[i][1]);
      break;
    }
  }

  //Estore ZIP Lâmina Simples
  for (i = 0; i < profAutoporteeEstoreZIPEASY.length; i++) {
    if (heightPE == profAutoporteeEstoreZIPEASY[i][0]) {
      var pricedesc = profAutoporteeEstoreZIPEASY[i][1] - (profAutoporteeEstoreZIPEASY[i][1] * valorReducao);
      $('#price_31010').html(' + <s>' + profAutoporteeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Frente
      $('#ndk-accessory-quantity-31010').attr('data-price', profAutoporteeEstoreZIPEASY[i][1]);
      $('#price_31011').html(' + <s>' + profAutoporteeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Atrás
      $('#ndk-accessory-quantity-31011').attr('data-price', profAutoporteeEstoreZIPEASY[i][1]);
      break;
    }
  }

	for (i = 0; i < activitiesEASY.length; i++) {
		if (heightPE == activitiesEASY[i][0]) {
			$("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASY[i][1] + " </p>");
			break;
		}
	}

  //Estore Lâmina Dupla
  for (i = 0; i < profAdosseeAutoporteeStoreEASYDouble.length; i++) {
    if (heightPE == profAdosseeAutoporteeStoreEASYDouble[i][0]) {
      var pricedesc = profAdosseeAutoporteeStoreEASYDouble[i][1]-(profAdosseeAutoporteeStoreEASYDouble[i][1]*valorReducao);
      $('#price_28262').html(' + <s>'+profAdosseeAutoporteeStoreEASYDouble[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Frente Motorizado
      $('#ndk-accessory-quantity-28262').attr('data-price', profAdosseeAutoporteeStoreEASYDouble[i][1]);
      $('#price_28263').html(' + <s>'+profAdosseeAutoporteeStoreEASYDouble[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Atrás Motorizado
      $('#ndk-accessory-quantity-28263').attr('data-price', profAdosseeAutoporteeStoreEASYDouble[i][1]);
      break;
    }
  }

  //Porta-Janela de Correr (Menuiserie) Lâmina Dupla
  for (i = 0; i < profAutoporteeMenuiserieEASYDouble.length; i++) {
    if (heightPE == profAutoporteeMenuiserieEASYDouble[i][0]) {
      var pricedesc = profAutoporteeMenuiserieEASYDouble[i][1]-(profAutoporteeMenuiserieEASYDouble[i][1]*valorReducao);
      $('#price_28266').html(' + <s>'+profAutoporteeMenuiserieEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Frente
      $('#ndk-accessory-quantity-28266').attr('data-price', profAutoporteeMenuiserieEASYDouble[i][1]);
      $('#price_28267').html(' + <s>'+profAutoporteeMenuiserieEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Atrás
      $('#ndk-accessory-quantity-28267').attr('data-price', profAutoporteeMenuiserieEASYDouble[i][1]);
      break;
    }
  }

  //Porta Accordeon (Ocardian) Lâmina Dupla
  for (i = 0; i < profAutoporteeAccordeonEASYDouble.length; i++) {
    if (heightPE == profAutoporteeAccordeonEASYDouble[i][0]) {
      var pricedesc = profAutoporteeAccordeonEASYDouble[i][1]-(profAutoporteeAccordeonEASYDouble[i][1]*valorReducao);
      $('#price_28270').html(' + <s>'+profAutoporteeAccordeonEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Frente
      $('#ndk-accessory-quantity-28270').attr('data-price', profAutoporteeAccordeonEASYDouble[i][1]);
      $('#price_28271').html(' + <s>'+profAutoporteeAccordeonEASYDouble[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Atrás
      $('#ndk-accessory-quantity-28270').attr('data-price', profAutoporteeAccordeonEASYDouble[i][1]);
      break;
    }
  }

  //Cortina de Vidro Lâmina Dupla
  for (i = 0; i < profAutoporteeCortinaVidroEASYDouble.length; i++) {
    if (heightPE == profAutoporteeCortinaVidroEASYDouble[i][0]) {
      var pricedesc = profAutoporteeCortinaVidroEASYDouble[i][1] - (profAutoporteeCortinaVidroEASYDouble[i][1] * valorReducao);
      $('#price_30844').html(' + <s>' + profAutoporteeCortinaVidroEASYDouble[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Frente
      $('#ndk-accessory-quantity-30844').attr('data-price', profAutoporteeCortinaVidroEASYDouble[i][1]);
      $('#price_30845').html(' + <s>' + profAutoporteeCortinaVidroEASYDouble[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Atrás
      $('#ndk-accessory-quantity-30845').attr('data-price', profAutoporteeCortinaVidroEASYDouble[i][1]);
      break;
    }
  }

  //Estore ZIP Lâmina Dupla
  for (i = 0; i < profAutoporteeEstoreZIPEASYDouble.length; i++) {
    if (heightPE == profAutoporteeEstoreZIPEASYDouble[i][0]) {
      var pricedesc = profAutoporteeEstoreZIPEASYDouble[i][1] - (profAutoporteeEstoreZIPEASYDouble[i][1] * valorReducao);
      $('#price_31010').html(' + <s>' + profAutoporteeEstoreZIPEASYDouble[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Frente
      $('#ndk-accessory-quantity-31010').attr('data-price', profAutoporteeEstoreZIPEASYDouble[i][1]);
      $('#price_31011').html(' + <s>' + profAutoporteeEstoreZIPEASYDouble[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Atrás
      $('#ndk-accessory-quantity-31011').attr('data-price', profAutoporteeEstoreZIPEASYDouble[i][1]);
      break;
    }
  }

  for (i = 0; i < activitiesEASYDouble.length; i++) {
    if (heightPE == activitiesEASYDouble[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASYDouble[i][1] + " </p>");
      break;
    }
  }
});

//Profundidade esqDIR

    //Profundidade, Preço Estore Motorizado, Número de Folhas
    var largAutoporteeAdosseeStoreEASY = [
      [2001, 979, ''],
      [2501, 1051, ''],
      [3001, 1122, ''],
      [3501, 1195, ''],
    ];

    //Profundidade, Preço Estore Manual, Número de Folhas
    var largAutoporteeAdosseeStoreManualEASY = [
      [2001, 756, ''],
      [2501, 822, ''],
      [3001, 886, ''],
      [3501, 852, ''],
    ];

    //Profundidade, Preço Porta-Janela de Correr (Menuiserie), Número de Folhas
    var largAutoporteeMenuiserieEASY = [
      [2001, 2096, ''],
      [2501, 2450, ''],
      [3001, 2804, ''],
      [3501, 3161, ''],
    ];

    //Profundidade, Preço Porta Accordeon (Ocardian), Número de Folhas
    var largAutoporteeAdosseeAccordeonEASY = [
      [2001, 2889, ''],
      [2501, 3580, ''],
      [3001, 4987, ''],
      [3501, 5417, ''],
    ];

    //Profundidade, Preço Cortina de Vidro, Número de Folhas
    var largAutoporteeAdosseeCortinaVidroEASY = [
      [2001, 1867, ''],
      [2501, 2242, ''],
      [3001, 2619, ''],
      [3501, 2994, ''],
    ];

    //Profundidade, Preço Estore ZIP, Número de Folhas
    var largAutoporteeAdosseeEstoreZIPEASY = [
      [2001, 5297, ''],
      [2501, 5639, ''],
      [3001, 5987, ''],
      [3501, 6341, ''],
    ];

// ********** PERGOLA EASY ADOSSEE SUR MESURE ********** //
$(document).on('change', '#dimension_text_width_4896,#dimension_text_width_4899,#dimension_text_width_4900,#dimension_text_width_4891,#dimension_text_width_4892,#dimension_text_width_4894,#dimension_text_width_5158,#dimension_text_width_5159,#dimension_text_width_5160,#dimension_text_width_5161,#dimension_text_width_5162,#dimension_text_width_5163', function () {
	var groupvalue = $(this).attr('data-group');
	var heightPE = $('#dimension_text_width_' + groupvalue).val();

  $('.product_4877_0.accessory-ndk.selected-accessory img').trigger('click');
  RemoveField(4881);
  RemoveField(5587);

	//Estore
  if(4896 == groupvalue || 4899 == groupvalue || 4900 == groupvalue || 5158 == groupvalue || 5159 == groupvalue || 5160 == groupvalue ){
    for (i = 0; i < largAutoporteeAdosseeStoreManualEASY.length; i++) {
      if (heightPE < largAutoporteeAdosseeStoreManualEASY[i][0]) {
        $('#price_28272').html(largAutoporteeAdosseeStoreManualEASY[i][1] + ' €'); //Estore Esquerdo Manual
        $('#ndk-accessory-quantity-28272').attr('data-price', largAutoporteeAdosseeStoreManualEASY[i][1]);
        //$('#descriptionimg_28272').html('Store Vertical Manuel Côté Gauche'); //Estore Vertical Manual Lado Esquerdo
        //$("li[data-id-value='28272']").attr('title', 'Store Vertical Manuel Côté Gauche');
        //$("li[data-id-value='28272']").attr('data-value', 'Store Vertical Manuel Côté Gauche');
        $('#price_28273').html(largAutoporteeAdosseeStoreManualEASY[i][1] + ' €'); //Estore Direito Manual
        $('#ndk-accessory-quantity-28273').attr('data-price', largAutoporteeAdosseeStoreManualEASY[i][1]);
        //$('#descriptionimg_28273').html('Store Vertical Manuel Côté Droit'); //Estore Vertical Manual Lado Direito
        //$("li[data-id-value='28273']").attr('title', 'Store Vertical Manuel Côté Droit');
        //$("li[data-id-value='282763']").attr('data-value', 'Store Vertical Manuel Côté Droit');
        break;
      }
    }
  } else {
    for (i = 0; i < largAutoporteeAdosseeStoreEASY.length; i++) {
      if (heightPE < largAutoporteeAdosseeStoreEASY[i][0]) {
        var pricedesc = largAutoporteeAdosseeStoreEASY[i][1]-(largAutoporteeAdosseeStoreEASY[i][1]*valorReducao);
        $('#price_28272').html(' + <s>'+largAutoporteeAdosseeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Esquerdo Motorizado
        $('#ndk-accessory-quantity-28272').attr('data-price', largAutoporteeAdosseeStoreEASY[i][1]);
        $('#price_28273').html(' + <s>'+largAutoporteeAdosseeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Direito Motorizado
        $('#ndk-accessory-quantity-28273').attr('data-price', largAutoporteeAdosseeStoreEASY[i][1]);
        break;
      }
    }
  }

	//Porta-Janela de Correr (Menuiserie)
	for (i = 0; i < largAutoporteeMenuiserieEASY.length; i++) {
		if (heightPE < largAutoporteeMenuiserieEASY[i][0]) {
      var pricedesc = largAutoporteeMenuiserieEASY[i][1]-(largAutoporteeMenuiserieEASY[i][1]*valorReducao);
			$('#price_28275').html(' + <s>'+largAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
			$('#ndk-accessory-quantity-28275').attr('data-price', largAutoporteeMenuiserieEASY[i][1]);
			$('#price_28276').html(' + <s>'+largAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Direito
			$('#ndk-accessory-quantity-28276').attr('data-price', largAutoporteeMenuiserieEASY[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian)
	for (i = 0; i < largAutoporteeAdosseeAccordeonEASY.length; i++) {
		if (heightPE < largAutoporteeAdosseeAccordeonEASY[i][0]) {
      var pricedesc = largAutoporteeAdosseeAccordeonEASY[i][1]-(largAutoporteeAdosseeAccordeonEASY[i][1]*valorReducao);
			$('#price_28278').html(' + <s>'+largAutoporteeAdosseeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
			$('#ndk-accessory-quantity-28278').attr('data-price', largAutoporteeAdosseeAccordeonEASY[i][1]);
			$('#price_28279').html(' + <s>'+largAutoporteeAdosseeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
			$('#ndk-accessory-quantity-28279').attr('data-price', largAutoporteeAdosseeAccordeonEASY[i][1]);
			break;
		}
	}

  //Cortina de Vidro
  for (i = 0; i < largAutoporteeAdosseeCortinaVidroEASY.length; i++) {
		if (heightPE < largAutoporteeAdosseeCortinaVidroEASY[i][0]) {
      var pricedesc = largAutoporteeAdosseeCortinaVidroEASY[i][1]-(largAutoporteeAdosseeCortinaVidroEASY[i][1]*valorReducao);
			$('#price_30836').html(' + <s>'+largAutoporteeAdosseeCortinaVidroEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
			$('#ndk-accessory-quantity-30836').attr('data-price', largAutoporteeAdosseeCortinaVidroEASY[i][1]);
			$('#price_30837').html(' + <s>'+largAutoporteeAdosseeCortinaVidroEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
			$('#ndk-accessory-quantity-30837').attr('data-price', largAutoporteeAdosseeCortinaVidroEASY[i][1]);
			break;
		}
	}

  //Estore ZIP
  for (i = 0; i < largAutoporteeAdosseeEstoreZIPEASY.length; i++) {
    if (heightPE < largAutoporteeAdosseeEstoreZIPEASY[i][0]) {
      var pricedesc = largAutoporteeAdosseeEstoreZIPEASY[i][1] - (largAutoporteeAdosseeEstoreZIPEASY[i][1] * valorReducao);
      $('#price_30935').html(' + <s>' + largAutoporteeAdosseeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Esquerdo
      $('#ndk-accessory-quantity-30935').attr('data-price', largAutoporteeAdosseeEstoreZIPEASY[i][1]);
      $('#price_30936').html(' + <s>' + largAutoporteeAdosseeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Direito
      $('#ndk-accessory-quantity-30936').attr('data-price', largAutoporteeAdosseeEstoreZIPEASY[i][1]);
      break;
    }
  }

   //Lâmina Simples
   for (i = 0; i < activitiesEASY.length; i++) {
    if (heightPE == activitiesEASY[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASY[i][1] + " </p>");
      break;
    }
  }

  //Lâmina Dupla
  for (i = 0; i < activitiesEASYDouble.length; i++) {
    if (heightPE == activitiesEASYDouble[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASYDouble[i][1] + " </p>");
      break;
    }
  }

});

// ********** PERGOLA EASY AUTOPORTEE SUR MESURE ********** //
$(document).on('change', '#dimension_text_width_4893,#dimension_text_width_4890,#dimension_text_width_4889,#dimension_text_width_4895,#dimension_text_width_4898,#dimension_text_width_4897,#dimension_text_width_5173,#dimension_text_width_5174,#dimension_text_width_5175,#dimension_text_width_5176,#dimension_text_width_5177,#dimension_text_width_5178', function () {
	var groupvalue = $(this).attr('data-group');
	var heightPE = $('#dimension_text_width_' + groupvalue).val();

	//Estore
  if(4895 == groupvalue || 4898 == groupvalue || 4897 == groupvalue || 5173 == groupvalue || 5174 == groupvalue || 5175 == groupvalue ){
    for (i = 0; i < largAutoporteeAdosseeStoreEASY.length; i++) {
      if (heightPE < largAutoporteeAdosseeStoreEASY[i][0]) {
        $('#price_28260').html(largAutoporteeAdosseeStoreEASY[i][1] + ' €'); //Estore Esquerdo Manual
        $('#ndk-accessory-quantity-28260').attr('data-price', largAutoporteeAdosseeStoreEASY[i][1]);
        //$('#descriptionimg_28260').html('Store Vertical Manuel Côté Gauche'); //Estore Vertical Manual Lado Esquerdo
        //$("li[data-id-value='28260']").attr('title', 'Store Vertical Manuel Côté Gauche');
        //$("li[data-id-value='28260']").attr('data-value', 'Store Vertical Manuel Côté Gauche');
        $('#price_28261').html(largAutoporteeAdosseeStoreEASY[i][1] + ' €'); //Estore Direito Manual
        $('#ndk-accessory-quantity-28261').attr('data-price', largAutoporteeAdosseeStoreEASY[i][1]);
        //$('#descriptionimg_28261').html('Store Vertical Manuel Côté Droit'); //Estore Vertical Manual Lado Direito
        //$("li[data-id-value='28261']").attr('title', 'Store Vertical Manuel Côté Droit');
        //$("li[data-id-value='28261']").attr('data-value', 'Store Vertical Manuel Côté Droit');
        break;
      }
    }
  } else {

    for (i = 0; i < largAutoporteeAdosseeStoreEASY.length; i++) {
      if (heightPE < largAutoporteeAdosseeStoreEASY[i][0]) {
        var pricedesc = largAutoporteeAdosseeStoreEASY[i][1]-(largAutoporteeAdosseeStoreEASY[i][1]*valorReducao);
        $('#price_28260').html(' + <s>'+largAutoporteeAdosseeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Esquerdo Motorizado
        $('#ndk-accessory-quantity-28260').attr('data-price', largAutoporteeAdosseeStoreEASY[i][1]);
        $('#price_28261').html(' + <s>'+largAutoporteeAdosseeStoreEASY[i][1] + ' € </s> <span style="color: var(--red);"> '+pricedesc.toFixed(2)+ ' € </span>'); //Estore Direito Motorizado
        $('#ndk-accessory-quantity-28261').attr('data-price', largAutoporteeAdosseeStoreEASY[i][1]);
        break;
      }
    }
  }

	//Porta-Janela de Correr (Menuiserie)
	for (i = 0; i < largAutoporteeMenuiserieEASY.length; i++) {
		if (heightPE < largAutoporteeMenuiserieEASY[i][0]) {
      var pricedesc = largAutoporteeMenuiserieEASY[i][1]-(largAutoporteeMenuiserieEASY[i][1]*valorReducao);
			$('#price_28264').html(' + <s>'+largAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Esquerdo
			$('#ndk-accessory-quantity-28264').attr('data-price', largAutoporteeMenuiserieEASY[i][1]);
			$('#price_28265').html(' + <s>'+largAutoporteeMenuiserieEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Menuiserie Direito
			$('#ndk-accessory-quantity-28265').attr('data-price', largAutoporteeMenuiserieEASY[i][1]);
			break;
		}
	}

  //Porta Accordeon (Ocardian)
	for (i = 0; i < largAutoporteeAdosseeAccordeonEASY.length; i++) {
		if (heightPE < largAutoporteeAdosseeAccordeonEASY[i][0]) {
      var pricedesc = largAutoporteeAdosseeAccordeonEASY[i][1]-(largAutoporteeAdosseeAccordeonEASY[i][1]*valorReducao);
			$('#price_28268').html(' + <s>'+largAutoporteeAdosseeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Esquerdo
			$('#ndk-accessory-quantity-28268').attr('data-price', largAutoporteeAdosseeAccordeonEASY[i][1]);
			$('#price_28269').html(' + <s>'+largAutoporteeAdosseeAccordeonEASY[i][1]+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span>'); //Accordeon Direito
			$('#ndk-accessory-quantity-28269').attr('data-price', largAutoporteeAdosseeAccordeonEASY[i][1]);
			break;
		}
	}

  //Cortina de Vidro
  for (i = 0; i < largAutoporteeAdosseeCortinaVidroEASY.length; i++) {
    if (heightPE < largAutoporteeAdosseeCortinaVidroEASY[i][0]) {
      var pricedesc = largAutoporteeAdosseeCortinaVidroEASY[i][1] - (largAutoporteeAdosseeCortinaVidroEASY[i][1] * valorReducao);
      $('#price_30842').html(' + <s>' + largAutoporteeAdosseeCortinaVidroEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Esquerdo
      $('#ndk-accessory-quantity-30842').attr('data-price', largAutoporteeAdosseeCortinaVidroEASY[i][1]);
      $('#price_30843').html(' + <s>' + largAutoporteeAdosseeCortinaVidroEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Cortina de Vidro Direito
      $('#ndk-accessory-quantity-30843').attr('data-price', largAutoporteeAdosseeCortinaVidroEASY[i][1]);
      break;
    }
  }

  //Estore ZIP
  for (i = 0; i < largAutoporteeAdosseeEstoreZIPEASY.length; i++) {
    if (heightPE < largAutoporteeAdosseeEstoreZIPEASY[i][0]) {
      var pricedesc = largAutoporteeAdosseeEstoreZIPEASY[i][1] - (largAutoporteeAdosseeEstoreZIPEASY[i][1] * valorReducao);
      $('#price_31008').html(' + <s>' + largAutoporteeAdosseeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Esquerdo
      $('#ndk-accessory-quantity-31008').attr('data-price', largAutoporteeAdosseeEstoreZIPEASY[i][1]);
      $('#price_31009').html(' + <s>' + largAutoporteeAdosseeEstoreZIPEASY[i][1] + ' €</s><span style="color: var(--red);"> ' + pricedesc.toFixed(2) + ' €</span>'); //Estore ZIP Direito
      $('#ndk-accessory-quantity-31009').attr('data-price', largAutoporteeAdosseeEstoreZIPEASY[i][1]);
      break;
    }
  }

  //Lâmina Simples
  for (i = 0; i < activitiesEASY.length; i++) {
    if (heightPE == activitiesEASY[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASY[i][1] + " </p>");
      break;
    }
  }

  //Lâmina Dupla
  for (i = 0; i < activitiesEASYDouble.length; i++) {
    if (heightPE == activitiesEASYDouble[i][0]) {
      $("div[data-field='" + idGroupNDK + "'] div.field_notice").html("<p>Nombre de lames : " + activitiesEASYDouble[i][1] + " </p>");
      break;
    }
  }
});

/*
//Profundidade Autoportee e Adossee
$(document).on('change', '#dimension_text_width_4893,#dimension_text_height_4893,#dimension_text_width_4890,#dimension_text_height_4890,#dimension_text_width_4889,#dimension_text_height_4889,#dimension_text_width_4895,#dimension_text_height_4895,#dimension_text_width_4898,#dimension_text_height_4898,#dimension_text_width_4897,#dimension_text_height_4897,#dimension_text_width_4896,#dimension_text_height_4896,#dimension_text_width_4899,#dimension_text_height_4899,#dimension_text_width_4900,#dimension_text_height_4900,#dimension_text_width_4891,#dimension_text_height_4891,#dimension_text_width_4892,#dimension_text_height_4892,#dimension_text_width_4894,#dimension_text_height_4894', function () {

	//Tipo de Lâminas
  var accessoryArray = [
		[4887, 28355],
		[4888, 28358],
  ]

	var groupvalue = $(this).attr('data-group');
	var withPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var valueInt = ((parseInt(withPE) / 1000)*(parseInt(heightPE) / 1000)) * 57.75;

	valueInt = valueInt.toFixed(2);
	var valuestring = valueInt.replace('.', ',');
	for (i = 0; i < accessoryArray.length; i++) {
		$('#descriptionPrice_'+accessoryArray[i][1]).text(' + ' + valuestring + ' €');
		$(".img-value-" + accessoryArray[i][0] + "[data-id-value='" + accessoryArray[i][1] + "']").attr('data-price', valueInt);
		if ($(".ndkackFieldItem[data-field='" + accessoryArray[i][0] + "']")) {
			$(".selected-value[data-id-value='" + accessoryArray[i][1] + "']").trigger('click');
		}
	}
});
*/

$(document).off('click', '.accessory-ndk-no-quantity .accessory_img_block');

$(document).on('click', '.accessory-ndk-no-quantity .accessory_img_block', function () {

  var accessoryArray = [
    /*********** PERGOLA PROMO (STARTER) AUTOPORTEE [2001] **********/
    [15002, 15006], // Estore Esquerdo, Porta Vidro Esquerdo
    [15002, 16280], // Estore Esquerdo, Accordeon Esquerdo
    [15002, 30856], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [15002, 31022], // Estore Esquerdo, Estore ZIP Esquerdo
    [15006, 15002], // Porta Vidro Esquerdo, Estore Esquerdo
    [15006, 16280], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [15006, 30856], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [15006, 31022], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [16280, 15002], // Accordeon Esquerdo, Estore Esquerdo
    [16280, 15006], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [16280, 30856], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [16280, 31022], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30856, 15002], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30856, 15006], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30856, 16280], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30856, 31022], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31022, 15002], // Estore ZIP Esquerdo, Estore Esquerdo
    [31022, 15006], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31022, 16280], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31022, 30856], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [15002, 31023], // Estore Esquerdo, Estore Zip Direito
    [15002, 31024], // Estore Esquerdo, Estore Zip Frente
    [15002, 31025], // Estore Esquerdo, Estore Zip Atrás
    [31022, 15003], // Estore Zip Esquerdo, Estore Direito
    [31022, 15004], // Estore Zip Esquerdo, Estore Frente
    [31022, 15005], // Estore Zip Esquerdo, Estore Atrás

    [15003, 15007], // Estore Direito, Porta Vidro Direito
    [15003, 16281], // Estore Direito, Accordeon Direito
    [15003, 30857], // Estore Direito, Cortina de Vidro Direito
    [15003, 31023], // Estore Direito, Estore ZIP Direito
    [15007, 15003], // Porta Vidro Direito, Estore Direito
    [15007, 16281], // Porta Vidro Direito, Accordeon Direito
    [15007, 30857], // Porta Vidro Direito, Cortina de Vidro Direito
    [15007, 31023], // Porta Vidro Direito, Estore ZIP Direito
    [16281, 15003], // Accordeon Direito, Estore Direito
    [16281, 15007], // Accordeon Direito, Porta Vidro Direito
    [16281, 30857], // Accordeon Direito, Cortina de Vidro Direito
    [16281, 31023], // Accordeon Direito, Estore ZIP Direito
    [30857, 15003], // Cortina de Vidro Direito, Estore Direito
    [30857, 15007], // Cortina de Vidro Direito, Porta Vidro Direito
    [30857, 16281], // Cortina de Vidro Direito, Accordeon Direito
    [30857, 31023], // Cortina de Vidro Direito, Estore ZIP Direito
    [31023, 15003], // Estore ZIP Direito, Estore Direito
    [31023, 15007], // Estore ZIP Direito, Porta Vidro Direito
    [31023, 16281], // Estore ZIP Direito, Accordeon Direito
    [31023, 30857], // Estore ZIP Direito, Cortina de Vidro Direito
    [15003, 31022], // Estore Direito, Estore Zip Esquerdo
    [15003, 31024], // Estore Direito, Estore Zip Frente
    [15003, 31025], // Estore Direito, Estore Zip Atrás
    [31023, 15002], // Estore Zip Direito, Estore Esquerdo
    [31023, 15004], // Estore Zip Direito, Estore Frente
    [31023, 15005], // Estore Zip Direito, Estore Atrás

    [15004, 15008], // Estore Frente, Porta Vidro Frente
    [15004, 16282], // Estore Frente, Accordeon Frente
    [15004, 30858], // Estore Frente, Cortina de Vidro Frente
    [15004, 31024], // Estore Frente, Estore ZIP Frente
    [15008, 15004], // Porta Vidro Frente, Estore Frente
    [15008, 16282], // Porta Vidro Frente, Accordeon Frente
    [15008, 30858], // Porta Vidro Frente, Cortina de Vidro Frente
    [15008, 31024], // Porta Vidro Frente, Estore ZIP Frente
    [16282, 15004], // Accordeon Frente, Estore Frente
    [16282, 15008], // Accordeon Frente, Porta Vidro Frente
    [16282, 30858], // Accordeon Frente, Cortina de Vidro Frente
    [16282, 31024], // Accordeon Frente, Estore ZIP Frente
    [30858, 15004], // Cortina de Vidro Frente, Estore Frente
    [30858, 15008], // Cortina de Vidro Frente, Porta Vidro Frente
    [30858, 16282], // Cortina de Vidro Frente, Accordeon Frente
    [30858, 31024], // Cortina de Vidro Frente, Estore ZIP Frente
    [31024, 15004], // Estore ZIP Frente, Estore Frente
    [31024, 15008], // Estore ZIP Frente, Porta Vidro Frente
    [31024, 16282], // Estore ZIP Frente, Accordeon Frente
    [31024, 30858], // Estore ZIP Frente, Cortina de Vidro Frente
    [15004, 31022], // Estore Frente, Estore Zip Esquerdo
    [15004, 31023], // Estore Frente, Estore Zip Direito
    [15004, 31025], // Estore Frente, Estore Zip Atrás
    [31024, 15002], // Estore Zip Frente, Estore Esquerdo
    [31024, 15003], // Estore Zip Frente, Estore Direito
    [31024, 15005], // Estore Zip Frente, Estore Atrás

    [15005, 15009], // Estore Atrás, Porta Vidro Atrás
    [15005, 16283], // Estore Atrás, Accordeon Atrás
    [15005, 30859], // Estore Atrás, Cortina de Vidro Atrás
    [15005, 31025], // Estore Atrás, Estore ZIP Atrás
    [15009, 15005], // Porta Vidro Atrás, Estore Atrás
    [15009, 16283], // Porta Vidro Atrás, Accordeon Atrás
    [15009, 30859], // Porta Vidro Atrás, Cortina de Vidro Atrás
    [15009, 31025], // Porta Vidro Atrás, Estore ZIP Atrás
    [16283, 15005], // Accordeon Atrás, Estore Atrás
    [16283, 15009], // Accordeon Atrás, Porta Vidro Atrás
    [16283, 30859], // Accordeon Atrás, Cortina de Vidro Frente
    [16283, 31025], // Accordeon Atrás, Estore ZIP Frente
    [30859, 15005], // Cortina de Vidro Atrás, Estore Atrás
    [30859, 15009], // Cortina de Vidro Atrás, Porta Vidro Atrás
    [30859, 16283], // Cortina de Vidro Atrás, Accordeon Atrás
    [30859, 31025], // Cortina de Vidro Atrás, Estore ZIP Atrás
    [31025, 15005], // Estore ZIP Atrás, Estore Atrás
    [31025, 15009], // Estore ZIP Atrás, Porta Vidro Atrás
    [31025, 16283], // Estore ZIP Atrás, Accordeon Atrás
    [31025, 30859], // Estore ZIP Atrás, Cortina de Vidro Atrás
    [15005, 31022], // Estore Atrás, Estore Zip Esquerdo
    [15005, 31023], // Estore Atrás, Estore Zip Direito
    [15005, 31024], // Estore Atrás, Estore Zip Frente
    [31025, 15002], // Estore Zip Atrás, Estore Esquerdo
    [31025, 15003], // Estore Zip Atrás, Estore Atrás
    [31025, 15004], // Estore Zip Atrás, Estore Frente

    /*********** PERGOLA PROMO (STARTER) ADOSSE [2017] **********/
    [15094, 15098], // Estore Esquerdo, Porta Vidro Esquerdo
    [15094, 16284], // Estore Esquerdo, Accordeon Esquerdo
    [15094, 30853], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [15094, 31019], // Estore Esquerdo, Estore ZIP Esquerdo
    [15098, 15094], // Porta Vidro Esquerdo, Estore Esquerdo
    [15098, 16284], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [15098, 30853], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [15098, 31019], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [16284, 15094], // Accordeon Esquerdo, Estore Esquerdo
    [16284, 15098], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [16284, 30853], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [16284, 31019], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30853, 15094], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30853, 15098], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30853, 16284], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30853, 31019], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31019, 15094], // Estore ZIP Esquerdo, Estore Esquerdo
    [31019, 15098], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31019, 16284], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31019, 30853], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [15094, 31020], // Estore Esquerdo, Estore Zip Direito
    [15094, 31021], // Estore Esquerdo, Estore Zip Frente
    [31019, 15095], // Estore Zip Esquerdo, Estore Direito
    [31019, 15096], // Estore Zip Esquerdo, Estore Frente

    [15095, 15099], // Estore Direito, Porta Vidro Direito
    [15095, 16285], // Estore Direito, Accordeon Direito
    [15095, 30854], // Estore Direito, Cortina de Vidro Direito
    [15095, 31020], // Estore Direito, Estore ZIP Direito
    [15099, 15095], // Porta Vidro Direito, Estore Direito
    [15099, 16285], // Porta Vidro Direito, Accordeon Direito
    [15099, 30854], // Porta Vidro Direito, Cortina de Vidro Direito
    [15099, 31020], // Porta Vidro Direito, Estore ZIP Direito
    [16285, 15095], // Accordeon Direito, Estore Direito
    [16285, 15099], // Accordeon Direito, Porta Vidro Direito
    [16285, 30854], // Accordeon Direito, Cortina de Vidro Direito
    [16285, 31020], // Accordeon Direito, Estore ZIP Direito
    [30854, 15095], // Cortina de Vidro Direito, Estore Direito
    [30854, 15099], // Cortina de Vidro Direito, Porta Vidro Direito
    [30854, 16285], // Cortina de Vidro Direito, Accordeon Direito
    [30854, 31020], // Cortina de Vidro Direito, Estore ZIP Direito
    [31020, 15095], // Estore ZIP Direito, Estore Direito
    [31020, 15099], // Estore ZIP Direito, Porta Vidro Direito
    [31020, 16285], // Estore ZIP Direito, Accordeon Direito
    [31020, 30854], // Estore ZIP Direito, Cortina de Vidro Direito
    [15095, 31019], // Estore Direito, Estore Zip Esquerdo
    [15095, 31021], // Estore Direito, Estore Zip Frente
    [31020, 15094], // Estore Zip Direito, Estore Esquerdo
    [31020, 15096], // Estore Zip Direito, Estore Frente

    [15096, 15100], // Estore Frente, Porta Vidro Frente
    [15096, 16286], // Estore Frente, Accordeon Frente
    [15096, 30855], // Estore Frente, Cortina de Vidro Frente
    [15096, 31021], // Estore Frente, Estore ZIP Frente
    [15100, 15096], // Porta Vidro Frente, Estore Frente
    [15100, 16286], // Porta Vidro Frente, Accordeon Frente
    [15100, 30855], // Porta Vidro Frente, Cortina de Vidro Frente
    [15100, 31021], // Porta Vidro Frente, Estore ZIP Frente
    [16286, 15096], // Accordeon Frente, Estore Frente
    [16286, 15100], // Accordeon Frente, Porta Vidro Frente
    [16286, 30855], // Accordeon Frente, Cortina de Vidro Frente
    [16286, 31021], // Accordeon Frente, Estore ZIP Frente
    [30855, 15096], // Cortina de Vidro Frente, Estore Frente
    [30855, 15100], // Cortina de Vidro Frente, Porta Vidro Frente
    [30855, 16286], // Cortina de Vidro Frente, Accordeon Frente
    [30855, 31021], // Cortina de Vidro Frente, Estore ZIP Frente
    [31021, 15096], // Estore ZIP Frente, Estore Frente
    [31021, 15100], // Estore ZIP Frente, Porta Vidro Frente
    [31021, 16286], // Estore ZIP Frente, Accordeon Frente
    [31021, 30855], // Estore ZIP Frente, Cortina de Vidro Frente
    [15096, 31019], // Estore Frente, Estore Zip Esquerdo
    [15096, 31020], // Estore Frente, Estore Zip Direito
    [31021, 15094], // Estore Zip Frente, Estore Esquerdo
    [31021, 15095], // Estore Zip Frente, Estore Direito

    /*********** PERGOLA GRANDLUX SM ADOSSEE [2018] **********/
    [15102, 15106], // Estore Esquerdo, Porta Vidro Esquerdo
    [15102, 15110], // Estore Esquerdo, Accordeon Esquerdo
    [15102, 30846], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [15102, 31012], // Estore Esquerdo, Estore ZIP Esquerdo
    [15106, 15102], // Porta Vidro Esquerdo, Estore Esquerdo
    [15106, 15110], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [15106, 30846], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [15106, 31012], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [15110, 15102], // Accordeon Esquerdo, Estore Esquerdo
    [15110, 15106], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [15110, 30846], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [15110, 31012], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30846, 15102], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30846, 15106], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30846, 15110], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30846, 31012], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31012, 15102], // Estore ZIP Esquerdo, Estore Esquerdo
    [31012, 15106], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31012, 15110], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31012, 30846], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [15102, 31013], // Estore Esquerdo, Estore Zip Direito
    [15102, 31014], // Estore Esquerdo, Estore Zip Frente
    [31012, 15103], // Estore Zip Esquerdo, Estore Direito
    [31012, 15104], // Estore Zip Esquerdo, Estore Frente

    [15103, 15107], // Estore Direito, Porta Vidro Direito
    [15103, 15111], // Estore Direito, Accordeon Direito
    [15103, 30847], // Estore Direito, Cortina de Vidro Direito
    [15103, 31013], // Estore Direito, Estore ZIP Direito
    [15107, 15103], // Porta Vidro Direito, Estore Direito
    [15107, 15111], // Porta Vidro Direito, Accordeon Direito
    [15107, 30847], // Porta Vidro Direito, Cortina de Vidro Direito
    [15107, 31013], // Porta Vidro Direito, Estore ZIP Direito
    [15111, 15103], // Accordeon Direito, Estore Direito
    [15111, 15107], // Accordeon Direito, Porta Vidro Direito
    [15111, 30847], // Accordeon Direito, Cortina de Vidro Direito
    [15111, 31013], // Accordeon Direito, Estore ZIP Direito
    [30847, 15103], // Cortina de Vidro Direito, Estore Direito
    [30847, 15107], // Cortina de Vidro Direito, Porta Vidro Direito
    [30847, 15111], // Cortina de Vidro Direito, Accordeon Direito
    [30847, 31013], // Cortina de Vidro Direito, Estore ZIP Direito
    [31013, 15103], // Estore ZIP Direito, Estore Direito
    [31013, 15107], // Estore ZIP Direito, Porta Vidro Direito
    [31013, 15111], // Estore ZIP Direito, Accordeon Direito
    [31013, 30847], // Estore ZIP Direito, Cortina de Vidro Direito
    [15103, 31012], // Estore Direito, Estore Zip Esquerdo
    [15103, 31014], // Estore Direito, Estore Zip Frente
    [31013, 15102], // Estore Zip Direito, Estore Esquerdo
    [31013, 15104], // Estore Zip Direito, Estore Frente

    [15104, 15108], // Estore Frente, Porta Vidro Frente
    [15104, 15112], // Estore Frente, Accordeon Frente
    [15104, 30848], // Estore Frente, Cortina de Vidro Frente
    [15104, 31014], // Estore Frente, Estore ZIP Frente
    [15108, 15104], // Porta Vidro Frente, Estore Frente
    [15108, 15112], // Porta Vidro Frente, Accordeon Frente
    [15108, 30848], // Porta Vidro Frente, Cortina de Vidro Frente
    [15108, 31014], // Porta Vidro Frente, Estore ZIP Frente
    [15112, 15104], // Accordeon Frente, Estore Frente
    [15112, 15108], // Accordeon Frente, Porta Vidro Frente
    [15112, 30848], // Accordeon Frente, Cortina de Vidro Frente
    [15112, 31014], // Accordeon Frente, Estore ZIP Frente
    [30848, 15104], // Cortina de Vidro Frente, Estore Frente
    [30848, 15108], // Cortina de Vidro Frente, Porta Vidro Frente
    [30848, 15112], // Cortina de Vidro Frente, Accordeon Frente
    [30848, 31014], // Cortina de Vidro Frente, Estore ZIP Frente
    [31014, 15104], // Estore ZIP Frente, Estore Frente
    [31014, 15108], // Estore ZIP Frente, Porta Vidro Frente
    [31014, 15112], // Estore ZIP Frente, Accordeon Frente
    [31014, 30848], // Estore ZIP Frente, Cortina de Vidro Frente
    [15104, 31012], // Estore Frente, Estore Zip Esquerdo
    [15104, 31013], // Estore Frente, Estore Zip Direito
    [31014, 15102], // Estore Zip Frente, Estore Esquerdo
    [31014, 15103], // Estore Zip Frente, Estore Direito

    /*********** PERGOLA GRANDLUX SM AUTOPORTEE [2014] **********/
    [15076, 15080], // Estore Esquerdo, Porta Vidro Esquerdo
    [15076, 15086], // Estore Esquerdo, Accordeon Esquerdo
    [15076, 30849], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [15076, 31015], // Estore Esquerdo, Estore ZIP Esquerdo
    [15080, 15076], // Porta Vidro Esquerdo, Estore Esquerdo
    [15080, 15086], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [15080, 30849], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [15080, 31015], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [15086, 15076], // Accordeon Esquerdo, Estore Esquerdo
    [15086, 15080], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [15086, 30849], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [15086, 31015], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30849, 15076], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30849, 15080], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30849, 15086], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30849, 31015], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31015, 15076], // Estore ZIP Esquerdo, Estore Esquerdo
    [31015, 15080], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31015, 15086], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31015, 30849], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [15076, 31016], // Estore Esquerdo, Estore Zip Direito
    [15076, 31017], // Estore Esquerdo, Estore Zip Frente
    [15076, 31018], // Estore Esquerdo, Estore Zip Atrás
    [31015, 15077], // Estore Zip Esquerdo, Estore Direito
    [31015, 15078], // Estore Zip Esquerdo, Estore Frente
    [31015, 15079], // Estore Zip Esquerdo, Estore Atrás

    [15077, 15081], // Estore Direito, Porta Vidro Direito
    [15077, 15087], // Estore Direito, Accordeon Direito
    [15077, 30850], // Estore Direito, Cortina de Vidro Direito
    [15077, 31016], // Estore Direito, Estore ZIP Direito
    [15081, 15077], // Porta Vidro Direito, Estore Direito
    [15081, 15087], // Porta Vidro Direito, Accordeon Direito
    [15081, 30850], // Porta Vidro Direito, Cortina de Vidro Direito
    [15081, 31016], // Porta Vidro Direito, Estore ZIP Direito
    [15087, 15077], // Accordeon Direito, Estore Direito
    [15087, 15081], // Accordeon Direito, Porta Vidro Direito
    [15087, 30850], // Accordeon Direito, Cortina de Vidro Direito
    [15087, 31016], // Accordeon Direito, Estore ZIP Direito
    [30850, 15077], // Cortina de Vidro Direito, Estore Direito
    [30850, 15081], // Cortina de Vidro Direito, Porta Vidro Direito
    [30850, 15087], // Cortina de Vidro Direito, Accordeon Direito
    [30850, 31016], // Cortina de Vidro Direito, Estore ZIP Direito
    [31016, 15077], // Estore ZIP Direito, Estore Direito
    [31016, 15081], // Estore ZIP Direito, Porta Vidro Direito
    [31016, 15087], // Estore ZIP Direito, Accordeon Direito
    [31016, 30850], // Estore ZIP Direito, Cortina de Vidro Direito
    [15077, 31015], // Estore Direito, Estore Zip Esquerdo
    [15077, 31017], // Estore Direito, Estore Zip Frente
    [15077, 31018], // Estore Direito, Estore Zip Atrás
    [31016, 15076], // Estore Zip Direito, Estore Esquerdo
    [31016, 15078], // Estore Zip Direito, Estore Frente
    [31016, 15079], // Estore Zip Direito, Estore Atrás

    [15078, 15082], // Estore Frente, Porta Vidro Frente
    [15078, 15088], // Estore Frente, Accordeon Frente
    [15078, 30851], // Estore Frente, Cortina de Vidro Frente
    [15078, 31017], // Estore Frente, Estore ZIP Frente
    [15082, 15078], // Porta Vidro Frente, Estore Frente
    [15082, 15088], // Porta Vidro Frente, Accordeon Frente
    [15082, 30851], // Porta Vidro Frente, Cortina de Vidro Frente
    [15082, 31017], // Porta Vidro Frente, Estore ZIP Frente
    [15088, 15078], // Accordeon Frente, Estore Frente
    [15088, 15082], // Accordeon Frente, Porta Vidro Frente
    [15088, 30851], // Accordeon Frente, Cortina de Vidro Frente
    [15088, 31017], // Accordeon Frente, Estore ZIP Frente
    [30851, 15078], // Cortina de Vidro Frente, Estore Frente
    [30851, 15082], // Cortina de Vidro Frente, Porta Vidro Frente
    [30851, 15088], // Cortina de Vidro Frente, Accordeon Frente
    [30851, 31017], // Cortina de Vidro Frente, Estore ZIP Frente
    [31017, 15078], // Estore ZIP Frente, Estore Frente
    [31017, 15082], // Estore ZIP Frente, Porta Vidro Frente
    [31017, 15088], // Estore ZIP Frente, Accordeon Frente
    [31017, 30851], // Estore ZIP Frente, Cortina de Vidro Frente
    [15078, 31015], // Estore Frente, Estore Zip Esquerdo
    [15078, 31016], // Estore Frente, Estore Zip Direito
    [15078, 31018], // Estore Frente, Estore Zip Atrás
    [31017, 15076], // Estore Zip Frente, Estore Esquerdo
    [31017, 15077], // Estore Zip Frente, Estore Direito
    [31017, 15079], // Estore Zip Frente, Estore Atrás

    [15079, 15083], // Estore Atrás, Porta Vidro Atrás
    [15079, 15089], // Estore Atrás, Accordeon Atrás
    [15079, 30852], // Estore Atrás, Cortina de Vidro Atrás
    [15079, 31018], // Estore Atrás, Estore ZIP Atrás
    [15083, 15079], // Porta Vidro Atrás, Estore Atrás
    [15083, 15089], // Porta Vidro Atrás, Accordeon Atrás
    [15083, 30852], // Porta Vidro Atrás, Cortina de Vidro Atrás
    [15083, 31018], // Porta Vidro Atrás, Estore ZIP Atrás
    [15089, 15079], // Accordeon Atrás, Estore Atrás
    [15089, 15083], // Accordeon Atrás, Porta Vidro Atrás
    [15089, 30852], // Accordeon Atrás, Cortina de Vidro Frente
    [15089, 31018], // Accordeon Atrás, Estore ZIP Frente
    [30852, 15079], // Cortina de Vidro Atrás, Estore Atrás
    [30852, 15083], // Cortina de Vidro Atrás, Porta Vidro Atrás
    [30852, 15089], // Cortina de Vidro Atrás, Accordeon Atrás
    [30852, 31018], // Cortina de Vidro Atrás, Estore ZIP Atrás
    [31018, 15079], // Estore ZIP Atrás, Estore Atrás
    [31018, 15083], // Estore ZIP Atrás, Porta Vidro Atrás
    [31018, 15089], // Estore ZIP Atrás, Accordeon Atrás
    [31018, 30852], // Estore ZIP Atrás, Cortina de Vidro Atrás
    [15079, 31015], // Estore Atrás, Estore Zip Esquerdo
    [15079, 31016], // Estore Atrás, Estore Zip Direito
    [15079, 31017], // Estore Atrás, Estore Zip Frente
    [31018, 15076], // Estore Zip Atrás, Estore Esquerdo
    [31018, 15077], // Estore Zip Atrás, Estore Direito
    [31018, 15078], // Estore Zip Atrás, Estore Frente

    /*********** PERGOLA GRANDLUX STD ADOSSEE [2280] **********/
    [17805, 17808], // Estore Esquerdo, Porta Vidro Esquerdo
    [17805, 17811], // Estore Esquerdo, Accordeon Esquerdo
    [17805, 30860], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [17805, 31026], // Estore Esquerdo, Estore ZIP Esquerdo
    [17808, 17805], // Porta Vidro Esquerdo, Estore Esquerdo
    [17808, 17811], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [17808, 30860], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [17808, 31026], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [17811, 17805], // Accordeon Esquerdo, Estore Esquerdo
    [17811, 17808], // Accordeeon Esquerdo, Porta Vidro Esquerdo
    [17811, 30860], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [17811, 31026], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30860, 17805], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30860, 17811], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30860, 17808], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30860, 31026], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31026, 17805], // Estore ZIP Esquerdo, Estore Esquerdo
    [31026, 17811], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31026, 17808], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31026, 30860], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [17805, 31027], // Estore Esquerdo, Estore Zip Direito
    [17805, 31028], // Estore Esquerdo, Estore Zip Frente
    [31026, 17806], // Estore Zip Esquerdo, Estore Direito
    [31026, 17807], // Estore Zip Esquerdo, Estore Frente

    [17806, 17809], // Estore Direito, Porta Vidro Direito
    [17806, 17812], // Estore Direito, Accordeon Direito
    [17806, 30861], // Estore Direito, Cortina de Vidro Direito
    [17806, 31027], // Estore Direito, Estore ZIP Direito
    [17809, 17806], // Porta Vidro Direito, Estore Direito
    [17809, 17812], // Porta Vidro Direito, Accordeon Direito
    [17809, 30861], // Porta Vidro Direito, Cortina de Vidro Direito
    [17809, 31027], // Porta Vidro Direito, Estore ZIP Direito
    [17812, 17806], // Accordeon Direito, Estore Direito
    [17812, 17809], // Accordeon Direito, Porta Vidro Direito
    [17812, 30861], // Accordeon Direito, Cortina de Vidro Direito
    [17812, 31027], // Accordeon Direito, Estore ZIP Direito
    [30861, 17806], // Cortina de Vidro Direito, Estore Direito
    [30861, 17812], // Cortina de Vidro Direito, Porta Vidro Direito
    [30861, 17809], // Cortina de Vidro Direito, Accordeon Direito
    [30861, 31027], // Cortina de Vidro Direito, Estore ZIP Direito
    [31027, 17806], // Estore ZIP Direito, Estore Direito
    [31027, 17812], // Estore ZIP Direito, Porta Vidro Direito
    [31027, 17809], // Estore ZIP Direito, Accordeon Direito
    [31027, 30861], // Estore ZIP Direito, Cortina de Vidro Direito
    [17806, 31026], // Estore Direito, Estore Zip Esquerdo
    [17806, 31028], // Estore Direito, Estore Zip Frente
    [31027, 17805], // Estore Zip Direito, Estore Esquerdo
    [31027, 17807], // Estore Zip Direito, Estore Frente

    [17807, 17810], // Estore Frente, Porta Vidro Frente
    [17807, 17813], // Estore Frente, Accordeon Frente
    [17807, 30862], // Estore Frente, Cortina de Vidro Frente
    [17807, 31028], // Estore Frente, Estore ZIP Frente
    [17810, 17807], // Porta Vidro Frente, Estore Frente
    [17810, 17813], // Porta Vidro Frente, Accordeon Frente
    [17810, 30862], // Porta Vidro Frente, Cortina de Vidro Frente
    [17810, 31028], // Porta Vidro Frente, Estore ZIP Frente
    [17813, 17807], // Accordeon Frente, Estore Frente
    [17813, 17810], // Accordeon Frente, Porta Vidro Frente
    [17813, 30862], // Accordeon Frente, Cortina de Vidro Frente
    [17813, 31028], // Accordeon Frente, Estore ZIP Frente
    [30862, 17807], // Cortina de Vidro Frente, Estore Frente
    [30862, 17813], // Cortina de Vidro Frente, Porta Vidro Frente
    [30862, 17810], // Cortina de Vidro Frente, Accordeon Frente
    [30862, 31028], // Cortina de Vidro Frente, Estore ZIP Frente
    [31028, 17807], // Estore ZIP Frente, Estore Frente
    [31028, 17813], // Estore ZIP Frente, Porta Vidro Frente
    [31028, 17810], // Estore ZIP Frente, Accordeon Frente
    [31028, 30862], // Estore ZIP Frente, Cortina de Vidro Frente
    [17807, 31026], // Estore Frente, Estore Zip Esquerdo
    [17807, 31027], // Estore Frente, Estore Zip Direito
    [31028, 17805], // Estore Zip Frente, Estore Esquerdo
    [31028, 17806], // Estore Zip Frente, Estore Direito

    /*********** PERGOLA GRANDLUX STD AUTOPORTEE [2281] **********/
    [17814, 17818], // Estore Esquerdo, Porta Vidro Esquerdo
    [17814, 17822], // Estore Esquerdo, Accordeon Esquerdo
    [17814, 30863], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [17814, 31029], // Estore Esquerdo, Estore ZIP Esquerdo
    [17818, 17814], // Porta Vidro Esqurdo, Estore Esquerdo
    [17818, 17822], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [17818, 30863], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [17818, 31029], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [17822, 17814], // Accordeon Esquerdo, Estore Esquerdo
    [17822, 17818], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [17822, 30863], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [17822, 31029], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30863, 17814], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30863, 17822], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30863, 17818], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30863, 31029], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31029, 17814], // Estore ZIP Esquerdo, Estore Esquerdo
    [31029, 17822], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31029, 17818], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31029, 30863], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [17814, 31030], // Estore Esquerdo, Estore Zip Direito
    [17814, 31031], // Estore Esquerdo, Estore Zip Frente
    [17814, 31032], // Estore Esquerdo, Estore Zip Atrás
    [31029, 17815], // Estore Zip Esquerdo, Estore Direito
    [31029, 17816], // Estore Zip Esquerdo, Estore Frente
    [31029, 17817], // Estore Zip Esquerdo, Estore Atrás

    [17815, 17819], // Estore Direito, Porta Vidro Direito
    [17815, 17823], // Estore Direito, Accordeon Direito
    [17815, 30864], // Estore Direito, Cortina de Vidro Direito
    [17815, 31030], // Estore Direito, Estore ZIP Direito
    [17819, 17815], // Porta Vidro Direito, Estore Direito
    [17819, 17823], // Porta Vidro Direito, Accordeon Direito
    [17819, 30864], // Porta Vidro Direito, Cortina de Vidro Direito
    [17819, 31030], // Porta Vidro Direito, Estore ZIP Direito
    [17823, 17815], // Accordeon Direito, Estore Direito
    [17823, 17819], // Accordeon Direito, Porta Vidro Direito
    [17823, 30864], // Accordeon Direito, Cortina de Vidro Direito
    [17823, 31030], // Accordeon Direito, Estore ZIP Direito
    [30864, 17815], // Cortina de Vidro Direito, Estore Direito
    [30864, 17819], // Cortina de Vidro Direito, Porta Vidro Direito
    [30864, 17823], // Cortina de Vidro Direito, Accordeon Direito
    [30864, 31030], // Cortina de Vidro Direito, Estore ZIP Direito
    [31030, 17815], // Estore ZIP Direito, Estore Direito
    [31030, 17819], // Estore ZIP Direito, Porta Vidro Direito
    [31030, 17823], // Estore ZIP Direito, Accordeon Direito
    [31030, 30864], // Estore ZIP Direito, Cortina de Vidro Direito
    [17815, 31029], // Estore Direito, Estore Zip Esquerdo
    [17815, 31031], // Estore Direito, Estore Zip Frente
    [17815, 31032], // Estore Direito, Estore Zip Atrás
    [31030, 17814], // Estore Zip Direito, Estore Esquerdo
    [31030, 17816], // Estore Zip Direito, Estore Frente
    [31030, 17817], // Estore Zip Direito, Estore Atrás

    [17816, 17820], // Estore Frente, Porta Vidro Frente
    [17816, 17824], // Estore Frente, Accordeon Frente
    [17816, 30865], // Estore Frente, Cortina de Vidro Frente
    [17816, 31031], // Estore Frente, Estore ZIP Frente
    [17820, 17816], // Porta Vidro Frente, Estore Frente
    [17820, 17824], // Porta Vidro Frente, Accordeon Frente
    [17820, 30865], // Porta Vidro Frente, Cortina de Vidro Frente
    [17820, 31031], // Porta Vidro Frente, Estore ZIP Frente
    [17824, 17816], // Accordeon Frente, Estore Frente
    [17824, 17820], // Accordeon Frente, Porta Vidro Frente
    [17824, 30865], // Accordeon Frente, Cortina de Vidro Frente
    [17824, 31031], // Accordeon Frente, Estore ZIP Frente
    [30865, 17816], // Cortina de Vidro Frente, Estore Frente
    [30865, 17820], // Cortina de Vidro Frente, Porta Vidro Frente
    [30865, 17824], // Cortina de Vidro Frente, Accordeon Frente
    [30865, 31031], // Cortina de Vidro Frente, Estore ZIP Frente
    [31031, 17816], // Estore ZIP Frente, Estore Frente
    [31031, 17820], // Estore ZIP Frente, Porta Vidro Frente
    [31031, 17824], // Estore ZIP Frente, Accordeon Frente
    [31031, 30865], // Estore ZIP Frente, Estore ZIP Frente
    [17816, 31029], // Estore Frente, Estore Zip Esquerdo
    [17816, 31030], // Estore Frente, Estore Zip Direito
    [17816, 31032], // Estore Frente, Estore Zip Atrás
    [31031, 17814], // Estore Zip Frente, Estore Esquerdo
    [31031, 17815], // Estore Zip Frente, Estore Direito
    [31031, 17817], // Estore Zip Frente, Estore Atrás

    [17817, 17821], // Estore Atrás, Porta Vidro Atrás
    [17817, 17825], // Estore Atrás, Accordeon Atrás
    [17817, 30866], // Estore Atrás, Cortina de Vidro Atrás
    [17817, 31032], // Estore Atrás, Estore ZIP Atrás
    [17821, 17817], // Porta Vidro Atrás, Estore Atrás
    [17821, 17825], // Porta Vidro Atrás, Accordeon Atrás
    [17821, 30866], // Porta Vidro Atrás, Cortina de Vidro Atrás
    [17821, 31032], // Porta Vidro Atrás, Estore ZIP Atrás
    [17825, 17817], // Accordeon Atrás, Estore Atrás
    [17825, 17821], // Accordeon Atrás, Porta Vidro Atrás
    [17825, 30866], // Accordeon Atrás, Cortina de Vidro Frente
    [17825, 31032], // Accordeon Atrás, Estore ZIP Frente
    [30866, 17817], // Cortina de Vidro Atrás, Estore Atrás
    [30866, 17821], // Cortina de Vidro Atrás, Porta Vidro Atrás
    [30866, 17825], // Cortina de Vidro Atrás, Accordeon Atrás
    [30866, 31032], // Cortina de Vidro Atrás, Estore ZIP Atrás
    [31032, 17817], // Estore ZIP Atrás, Estore Atrás
    [31032, 17821], // Estore ZIP Atrás, Porta Vidro Atrás
    [31032, 17825], // Estore ZIP Atrás, Accordeon Atrás
    [31032, 30866], // Estore ZIP Atrás, Cortina de Vidro Atrás
    [17817, 31029], // Estore Atrás, Estore Zip Esquerdo
    [17817, 31030], // Estore Atrás, Estore Zip Direito
    [17817, 31031], // Estore Atrás, Estore Zip Frente
    [31032, 17814], // Estore Zip Atrás, Estore Esquerdo
    [31032, 17815], // Estore Zip Atrás, Estore Direito
    [31032, 17816], // Estore Zip Atrás, Estore Frente

    /*********** PERGOLA ALU CLASSIQUE STANDARD [3103] **********/
    [22114, 22118], // Estore Esquerdo, Lateral Esquerda
    [22114, 22120], // Estore Esquerdo, Trapézio Esquerdo
    [22114, 22296], // Estore Esquerdo, Accordeon Esquerdo
    [22118, 22114], // Lateral Esquerda, Estore Esquerdo
    [22118, 22120], // Lateral Esquerda, Trapézio Esquerdo
    [22118, 22296], // Lateral Esquerda, Accordeon Esquerdo
    [22120, 22114], // Trapézio Esquerdo, Estore Esquerdo
    [22120, 22118], // Trapézio Esquerdo, Lateral Esquerda
    [22120, 22296], // Trapézio Esquerdo, Accordeon Esquerdo
    [22296, 22114], // Accordeon Esquerdo, Estore Esquerdo
    [22296, 22118], // Accordeon Esquerdo, Lateral Esquerda
    [22296, 22120], // Accordeon Esquerdo, Trapézio Esquerdo

    [22115, 22119], // Estore Direito, Lateral Direita
    [22115, 22121], // Estore Direito, Trapézio Direito
    [22115, 22297], // Estore Direito, Accordeon Direito
    [22119, 22115], // Lateral Direita, Estore Direito
    [22119, 22121], // Lateral Direita, Trapézio Direito
    [22119, 22297], // Lateral Direita, Accordeon Direito
    [22121, 22115], // Trapézio Direito, Estore Direito
    [22121, 22119], // Trapézio Direito, Lateral Direita
    [22121, 22297], // Trapézio Direito, Accordeon Direito
    [22297, 22115], // Accordeon Direito, Estore Direito
    [22297, 22119], // Accordeon Direito, Lateral Direita
    [22297, 22121], // Accordeon Direito, Trapézio Direito

    [22116, 22117], // Estore Frontal, Fachada Central
    [22116, 22298], // Estore Frontal, Accordeon Frontal
    [22117, 22116], // Fachada Central, Estore Frontal
    [22117, 22298], // Fachada Central, Accordeon Frontal
    [22298, 22116], // Accordeon Frontal, Estore Frontal
    [22298, 22117], // Accordeon Frontal, Fachada Central

    /*********** PERGOLA ALU TOP PRIX [3106] **********/
    [22130, 22129], // Fachada Frontal, Estore Frontal

    /*********** PERGOLA ALU CLASSIQUE SUR MESURE [3108] **********/
    [22143, 22147], // Estore Esquerdo, Lateral Esquerda
    [22143, 22149], // Estore Esquerdo, Trapézio Esquerdo
    [22143, 22288], // Estore Esquerdo, Accordeon Esquerdo
    [22147, 22143], // Lateral Esquerda, Estore Esquerdo
    [22147, 22149], // Lateral Esquerda, Trapézio Esquerdo
    [22147, 22288], // Lateral Esquerda, Accordeon Esquerdo
    [22149, 22143], // Trapézio Esquerdo, Estore Esquerdo
    [22149, 22147], // Trapézio Esquerdo, Lateral Esquerda
    [22149, 22288], // Trapézio Esquerdo, Accordeon Esquerdo
    [22288, 22143], // Accordeon Esquerdo, Estore Esquerdo
    [22288, 22147], // Accordeon Esquerdo, Lateral Esquerda
    [22288, 22149], // Accordeon Esquerdo, Trapézio Esquerdo

    [22144, 22148], // Estore Direito, Lateral Direita
    [22144, 22150], // Estore Direito, Trapézio Diretio
    [22144, 22289], // Estore Direito, Accordeon Direito
    [22148, 22144], // Lateral Direita, Estore Direito
    [22148, 22150], // Lateral Direita, Trapézio Direito
    [22148, 22289], // Lateral Direita, Accordeon Direito
    [22150, 22144], // Trapézio Direito, Estore Direito
    [22150, 22148], // Trapézio Direito, Lateral Direito
    [22150, 22289], // Trapézio Direito, Accordeon Direito
    [22289, 22144], // Accordeon Direito, Estore Direito
    [22289, 22148], // Accordeon Direito, Lateral Direita
    [22289, 22150], // Accordeon Direito, Trapézio Direito

    [22145, 22146], // Estore Frontal, Fachada Frontal
    [22145, 22290], // Estore Frontal, Accordeon Frontal
    [22146, 22145], // Fachada Frontal, Estore Frontal
    [22146, 22290], // Fachada Frontal, Accordeon Frontal
    [22290, 22145], // Accordeon Frontal, Estore Frontal
    [22290, 22146], // Accordeon Frontal, Fachada Frontal

    /*********** PERGOLA EASY SM AUTOPORTEE [4877] **********/
    [28260, 28264], // Estore Esquerdo, Porta Vidro Esquerdo
    [28260, 28268], // Estore Esquerdo, Accordeon Esquerdo
    [28260, 30842], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [28260, 31008], // Estore Esquerdo, Estore ZIP Esquerdo
    [28264, 28260], // Porta Vidro Esquerdo, Estore Esquerdo
    [28264, 28268], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [28264, 30842], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [28264, 31008], // Porta Vidro Esquerdo, Estore ZIP Esquerdo
    [28268, 28260], // Accordeon Esquerdo, Estore Esquerdo
    [28268, 28264], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [28268, 30842], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [28268, 31008], // Accordeon Esquerdo, Estore ZIP Esquerdo
    [30842, 28260], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30842, 28264], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30842, 28268], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30842, 31008], // Cortina de Vidro Esquerdo, Estore ZIP Esquerdo
    [31008, 28260], // Estore ZIP Esquerdo, Estore Esquerdo
    [31008, 28264], // Estore ZIP Esquerdo, Porta Vidro Esquerdo
    [31008, 28268], // Estore ZIP Esquerdo, Accordeon Esquerdo
    [31008, 30842], // Estore ZIP Esquerdo, Cortina de Vidro Esquerdo
    [28260, 31009], // Estore Esquerdo, Estore Zip Direito
    [28260, 31010], // Estore Esquerdo, Estore Zip Frente
    [28260, 31011], // Estore Esquerdo, Estore Zip Atrás
    [31008, 28261], // Estore Zip Esquerdo, Estore Direito
    [31008, 28262], // Estore Zip Esquerdo, Estore Frente
    [31008, 28263], // Estore Zip Esquerdo, Estore Atrás

    [28261, 28265], // Estore Direito, Porta Vidro Direito
    [28261, 28269], // Estore Direito, Accordeon Direito
    [28261, 30843], // Estore Direito, Cortina de Vidro Direito
    [28261, 31009], // Estore Direito, Estore ZIP Direito
    [28265, 28261], // Porta Vidro Direito, Estore Direito
    [28265, 28269], // Porta Vidro Direito, Accordeon Direito
    [28265, 30843], // Porta Vidro Direito, Cortina de Vidro Direito
    [28265, 31009], // Porta Vidro Direito, Estore ZIP Direito
    [28269, 28261], // Accordeon Direito, Estore Direito
    [28269, 28265], // Accordeon Direito, Porta Vidro Direito
    [28269, 30843], // Accordeon Direito, Cortina de Vidro Direito
    [28269, 31009], // Accordeon Direito, Estore ZIP Direito
    [30843, 28261], // Cortina de Vidro Direito, Estore Direito
    [30843, 28265], // Cortina de Vidro Direito, Porta Vidro Direito
    [30843, 28269], // Cortina de Vidro Direito, Accordeon Direito
    [30843, 31009], // Cortina de Vidro Direito, Estore ZIP Direito
    [31009, 28261], // Estore ZIP Direito, Estore Direito
    [31009, 28265], // Estore ZIP Direito, Porta Vidro Direito
    [31009, 28269], // Estore ZIP Direito, Accordeon Direito
    [31009, 30843], // Estore ZIP Direito, Cortina de Vidro Direito
    [28261, 31008], // Estore Direito, Estore Zip Esquerdo
    [28261, 31010], // Estore Direito, Estore Zip Frente
    [28261, 31011], // Estore Direito, Estore Zip Atrás
    [31009, 28260], // Estore Zip Direito, Estore Esquerdo
    [31009, 28262], // Estore Zip Direito, Estore Frente
    [31009, 28263], // Estore Zip Direito, Estore Atrás

    [28262, 28266], // Estore Frente, Porta Vidro Frente
    [28262, 28270], // Estore Frente, Accordeon Frente
    [28262, 30844], // Estore Frente, Cortina de Vidro Frente
    [28262, 31010], // Estore Frente, Estore ZIP Frente
    [28266, 28262], // Porta Vidro Frente, Estore Frente
    [28266, 28270], // Porta Vidro Frente, Accordeon Frente
    [28266, 30844], // Porta Vidro Frente, Cortina de Vidro Frente
    [28266, 31010], // Porta Vidro Frente, Estore ZIP Frente
    [28270, 28262], // Accordeon Frente, Estore Frente
    [28270, 28266], // Accordeon Frente, Porta Vidro Frente
    [28270, 30844], // Accordeon Frente, Cortina de Vidro Frente
    [28270, 31010], // Accordeon Frente, Estore ZIP Frente
    [30844, 28262], // Cortina de Vidro Frente, Estore Frente
    [30844, 28266], // Cortina de Vidro Frente, Porta Vidro Frente
    [30844, 28270], // Cortina de Vidro Frente, Accordeon Frente
    [30844, 31010], // Cortina de Vidro Frente, Estore ZIP Frente
    [31010, 28262], // Estore ZIP Frente, Estore Frente
    [31010, 28266], // Estore ZIP Frente, Porta Vidro Frente
    [31010, 28270], // Estore ZIP Frente, Accordeon Frente
    [31010, 30844], // Estore ZIP Frente, Cortina de Vidro Frente
    [28262, 31008], // Estore Frente, Estore Zip Esquerdo
    [28262, 31009], // Estore Frente, Estore Zip Direito
    [28262, 31011], // Estore Frente, Estore Zip Atrás
    [31010, 28260], // Estore Zip Frente, Estore Esquerdo
    [31010, 28261], // Estore Zip Frente, Estore Direito
    [31010, 28263], // Estore Zip Frente, Estore Atrás

    [28263, 28267], // Estore Atrás, Porta Vidro Atrás
    [28263, 28271], // Estore Atrás, Accordeon Atrás
    [28263, 30845], // Estore Atrás, Cortina de Vidro Atrás
    [28263, 31011], // Estore Atrás, Estore ZIP Atrás
    [28267, 28263], // Porta Vidro Atrás, Estore Atrás
    [28267, 28271], // Porta Vidro Atrás, Accordeon Atrás
    [28267, 30845], // Porta Vidro Atrás, Cortina de Vidro Atrás
    [28267, 31011], // Porta Vidro Atrás, Estore ZIP Atrás
    [28271, 28263], // Accordeon Atrás, Estore Atrás
    [28271, 28267], // Accordeon Atrás, Porta Vidro Atrás
    [28271, 30845], // Accordeon Atrás, Cortina de Vidro Atrás
    [28271, 31011], // Accordeon Atrás, Estore ZIP Atrás
    [30845, 28263], // Cortina de Vidro Atrás, Estore Atrás
    [30845, 28267], // Cortina de Vidro Atrás, Porta Vidro Atrás
    [30845, 28271], // Cortina de Vidro Atrás, Accordeon Atrás
    [30845, 31011], // Cortina de Vidro Atrás, Estore ZIP Atrás
    [31011, 28263], // Estore ZIP Atrás, Estore Atrás
    [31011, 28267], // Estore ZIP Atrás, Porta Vidro Atrás
    [31011, 28271], // Estore ZIP Atrás, Accordeon Atrás
    [31011, 30845], // Estore ZIP Atrás, Cortina de Vidro Atrás
    [28263, 31008], // Estore Atrás, Estore Zip Esquerdo
    [28263, 31009], // Estore Atrás, Estore Zip Direito
    [28263, 31010], // Estore Atrás, Estore Zip Frente
    [31011, 28260], // Estore Zip Atrás, Estore Esquerdo
    [31011, 28261], // Estore Zip Atrás, Estore Direito
    [31011, 28262], // Estore Zip Atrás, Estore Frente

    /*********** PERGOLA EASY SM ADOSSEE [4878] **********/
    [28272, 28275], // Estore Esquerdo, Porta Vidro Esquerdo
    [28272, 28278], // Estore Esquerdo, Accordeon Esquerdo
    [28272, 30836], // Estore Esquerdo, Cortina de Vidro Esquerdo
    [28272, 30935], // Estore Esquerdo, Estore Zip Esquerdo
    [28275, 28272], // Porta Vidro Esquerdo, Estore Esquerdo
    [28275, 28278], // Porta Vidro Esquerdo, Accordeon Esquerdo
    [28275, 30836], // Porta Vidro Esquerdo, Cortina de Vidro Esquerdo
    [28275, 30935], // Porta Vidro Esquerdo, Estore Zip Esquerdo
    [28278, 28272], // Accordeon Esquerdo, Estore Esquerdo
    [28278, 28275], // Accordeon Esquerdo, Porta Vidro Esquerdo
    [28278, 30836], // Accordeon Esquerdo, Cortina de Vidro Esquerdo
    [28278, 30935], // Accordeon Esquerdo, Estore Zip Esquerdo
    [30836, 28272], // Cortina de Vidro Esquerdo, Estore Esquerdo
    [30836, 28275], // Cortina de Vidro Esquerdo, Porta Vidro Esquerdo
    [30836, 28278], // Cortina de Vidro Esquerdo, Accordeon Esquerdo
    [30836, 30935], // Cortina Vidro Esquerdo, Estore Zip Esquerdo
    [30935, 28272], // Estore Zip Esquerdo, Estore Esquerdo
    [30935, 28275], // Estore Zip Esquerdo, Porta Vidro Esquerdo
    [30935, 28278], // Estore Zip Esquerdo, Accordeon Esquerdo
    [30935, 30836], // Estore Zip Esquerdo, Cortina de Vidro Esquerdo
    [28272, 30936], // Estore Esquerdo, Estore Zip Direito
    [28272, 30937], // Estore Esquerdo, Estore Zip Frente
    [30935, 28273], // Estore Zip Esquerdo, Estore Direito
    [30935, 28274], // Estore Zip Esquerdo, Estore Frente

    [28273, 28276], // Estore Direito, Porta Vidro Direito
    [28273, 28279], // Estore Direito, Accordeon Direito
    [28273, 30837], // Estore Direito, Cortina de Vidro Direito
    [28273, 30936], // Estore Direito, Estore Zip Direito
    [28276, 28273], // Porta Vidro Direito, Estore Direito
    [28276, 28279], // Porta Vidro Direito, Accordeon Direito
    [28276, 30837], // Porta Vidro Direito, Cortina de Vidro Direito
    [28276, 30936], // Porta Vidro Direito, Estore Zip Direito
    [28279, 28273], // Accordeon Direito, Estore Direito
    [28279, 28276], // Accordeon Direito, Porta Vidro Direito
    [28279, 30837], // Accordeon Direito, Cortina de Vidro Direito
    [28279, 30936], // Accordeon Direito, Estore Zip Direito
    [30837, 28273], // Cortina de Vidro Direito, Estore Direito
    [30837, 28276], // Cortina de Vidro Direito, Porta Vidro Direito
    [30837, 28279], // Cortina de Vidro Direito, Accordeon Direito
    [30837, 30936], // Cortina de Vidro Direito, Estore Zip Direito
    [30936, 28273], // Estore Zip Direito, Estore Direito
    [30936, 28276], // Estore Zip Direito, Porta Vidro Direito
    [30936, 28279], // Estore Zip Direito, Accordeon Direito
    [30936, 30837], // Estore Zip Direito, Cortina de Vidro Direito
    [28273, 30935], // Estore Direito, Estore Zip Esquerdo
    [28273, 30937], // Estore Direito, Estore Zip Frente
    [30936, 28272], // Estore Zip Direito, Estore Esquerdo
    [30936, 28274], // Estore Zip Direito, Estore Frente

    [28274, 28277], // Estore Frente, Porta Vidro Frente
    [28274, 28280], // Estore Frente, Accordeon Frente
    [28274, 30838], // Estore Frente, Cortina de Vidro Frente
    [28274, 30937], // Estore Frente, Estore Zip Frente
    [28277, 28274], // Porta Vidro Frente, Estore Frente
    [28277, 28280], // Porta Vidro Frente, Accordeon Frente
    [28277, 30838], // Porta Vidro Frente, Cortina de Vidro Frente
    [28277, 30937], // Porta Vidro Frente, Estore Zip Frente
    [28280, 28274], // Accordeon Frente, Estore Frente
    [28280, 28277], // Accordeon Frente, Porta Vidro Frente
    [28280, 30838], // Accordeon Frente, Cortina de Vidro Frente
    [28280, 30937], // Accordeon Frente, Estore Zip Frente
    [30838, 28274], // Cortina de Vidro Frente, Estore Frente
    [30838, 28277], // Cortina de Vidro Frente, Porta Vidro Frente
    [30838, 28280], // Cortina de Vidro Frente, Accordeon Frente
    [30838, 30937], // Cortina de Vidro Frente, Estore Zip Frente
    [30937, 28274], // Estore Zip Frente, Estore Frente
    [30937, 28277], // Estore Zip Frente, Porta Vidro Frente
    [30937, 28280], // Estore Zip Frente, Accordeon Frente
    [30937, 30838], // Estore Zip Frente, Cortina de Vidro Frente
    [28274, 30935], // Estore Frente, Estore Zip Esquerdo
    [28274, 30936], // Estore Frente, Estore Zip Direito
    [30937, 28272], // Estore Zip Frente, Estore Esquerdo
    [30937, 28273], // Estore Zip Frente, Estore Direito

  ];

  zindexImgs = []; // index imagens

  /*********** PERGOLA PROMO (STARTER) AUTOPORTEE [2001] **********/
  zindexImgs[15003] = ["1"]; // Estore Direito
  zindexImgs[15007] = ["1"]; // Porta Vidro Direito
  zindexImgs[16281] = ["1"]; // Accordeon Direito
  zindexImgs[30857] = ["1"]; // Cortina de Vidro Direito
  zindexImgs[31023] = ["1"]; // Estore Zip Direito
  zindexImgs[15005] = ["1"]; // Estore Atrás
  zindexImgs[15009] = ["1"]; // Porta Vidro Atrás
  zindexImgs[16283] = ["1"]; // Accordeon Atrás
  zindexImgs[30859] = ["1"]; // Cortina de Vidro Atrás
  zindexImgs[31025] = ["1"]; // Estore Zip Atrás

  /*********** PERGOLA PROMO (STARTER) ADOSSEE [2017] **********/
  zindexImgs[15095] = ["1"]; // Estore Direito
  zindexImgs[15099] = ["1"]; // Porta Vidro Direita
  zindexImgs[16285] = ["1"]; // Accordeon Direito
  zindexImgs[30854] = ["1"]; // Cortina de Vidro Direito
  zindexImgs[31020] = ["1"]; // Estore Zip Direito

  /*
  zindexImgs[27629] = ["1"]; // Pergola Promo Manuelle Autoportee - Estore Direito
  zindexImgs[27633] = ["1"]; // Pergola Promo Manuelle Autoportee - Porta Vidro Direito
  //zindexImgs[27637] = ["1"]; // Pergola Promo Manuelle Autoportee - Accordeon Direito
  zindexImgs[27631] = ["1"]; // Pergola Promo Manuelle Autoportee - Estore Atrás
  zindexImgs[27635] = ["1"]; // Pergola Promo Manuelle Autoportee - Porta Vidro Atrás
  //zindexImgs[27639] = ["1"]; // Pergola Promo Manuelle Autoportee - Accordeon Atrás
  zindexImgs[27641] = ["1"]; // Pergola Promo Manuelle Adossee - Estore Direito
  zindexImgs[27644] = ["1"]; // Pergola Promo Manuelle Adossee - Porta Vidro Direito
  //zindexImgs[27647] = ["1"]; // Pergola Promo Manuelle Adossee - Accordeon Direito
  */

  /*********** PERGOLA EASY SM AUTOPORTEE [4877] **********/
 zindexImgs[28260] = ["1"]; // Estore Esquerdo
  zindexImgs[28264] = ["1"]; // Porta Vidro Esquerdo
  zindexImgs[28268] = ["1"]; // Accordeon Esquerdo
  zindexImgs[30842] = ["1"]; // Cortina de Vidro Esquerdo
  zindexImgs[31008] = ["1"]; // Estore Zip Esquerdo
  zindexImgs[28263] = ["0"]; // Estore Atrás
  zindexImgs[28267] = ["0"]; // Porta Vidro Atrás
  zindexImgs[28271] = ["0"]; // Accordeon Atrás
  zindexImgs[30845] = ["0"]; // Cortina de Vidro Atrás
  zindexImgs[31011] = ["0"]; // Estore Zip Atrás

  /*********** PERGOLA EASY SM ADOSSEE [4878] **********/
  zindexImgs[28272] = ["1"]; // Estore Esquerdo
  zindexImgs[28275] = ["1"]; // Porta Vidro Esquerdo
  zindexImgs[28278] = ["1"]; // Accordeon Esquerdo
  zindexImgs[30836] = ["1"]; // Cortina Vidro Esquerdo
  zindexImgs[30935] = ["1"]; // Estore Zip Esquerdo

  /*********** PERGOLA GRANDLUX STD AUTOPORTEE [2281] **********/
 zindexImgs[17815] = ["1"]; // Estore Direito
  zindexImgs[17819] = ["1"]; // Porta Vidro Direito
  zindexImgs[17823] = ["1"]; // Accordeon Direito
  zindexImgs[30864] = ["1"]; // Cortina de Vidro Direito
  zindexImgs[31030] = ["1"]; // Estore Zip Direito
  zindexImgs[17817] = ["1"]; // Estore Atrás
  zindexImgs[17821] = ["1"]; // Porta Vidro Atrás
  zindexImgs[17825] = ["1"]; // Accordeon Atrás
  zindexImgs[30866] = ["1"]; // Cortina de Vidro Atrás
  zindexImgs[31032] = ["1"]; // Estore Zip Atrás

  /*********** PERGOLA GRANDLUX STD ADOSSEE [2280] **********/
  zindexImgs[17806] = ["1"]; // Estore Direito
  zindexImgs[17809] = ["1"]; // Porta Vidro Direita
  zindexImgs[17812] = ["1"]; // Accordeon Direito
  zindexImgs[30861] = ["1"]; // Cortina de Vidro Direito
  zindexImgs[31027] = ["1"]; // Estore Zip Direito

  /*********** PERGOLA GRANDLUX SM AUTOPORTEE [2014] **********/
  zindexImgs[15077] = ["1"]; // Estore Direito
  zindexImgs[15081] = ["1"]; // Porta Vidro Direito
  zindexImgs[15087] = ["1"]; // Accordeon Direito
  zindexImgs[30850] = ["1"]; // Cortina de Vidro Direito
  zindexImgs[31016] = ["1"]; // Estore Zip Direito
  zindexImgs[15079] = ["1"]; // Estore Atrás
  zindexImgs[15083] = ["1"]; // Porta Vidro Atrás
  zindexImgs[15089] = ["1"]; // Accordeon Atrás
  zindexImgs[30852] = ["1"]; // Cortina de Vidro Atrás
  zindexImgs[31018] = ["1"]; // Estore Zip Atrás

  /*********** PERGOLA GRANDLUX SM ADOSSEE [2018] **********/
  zindexImgs[15103] = ["1"]; // Estore Direito
  zindexImgs[15107] = ["1"]; // Porta Vidro Direito
  zindexImgs[15111] = ["1"]; // Accordeon Direito
  zindexImgs[30847] = ["1"]; // Cortina de Vidro Direito
  zindexImgs[31013] = ["1"]; // Estore ZIP Direito

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
  campoCorTecido[2001] = ["2234", "5599"]; // Pergola Promo (Starter) - Autoportee
  campoCorTecido[2017] = ["2234", "5599"]; // Pergola Promo (Starter) - Adossee
  //campoCorTecido[4778] = ["4779"]; // Pergola Promo Manuelle - Adossee
  //campoCorTecido[4777] = ["4779"]; // Pergola Promo Manuelle - Autoportee
  campoCorTecido[2018] = ["2251", "5598"]; // Pergola Grandlux SM - Adossee
  campoCorTecido[2014] = ["2251", "5598"]; // Pergola Grandlux SM - Autoportee
  campoCorTecido[2280] = ["2289", "5600"]; // Pergola Grandlux Std - Adossee
  campoCorTecido[2281] = ["4913", "5600"]; // Pergola Grandlux Std - Autoportee
  campoCorTecido[4878] = ["4879", "5587"]; // Pergola Easy SM - Adossee
  campoCorTecido[4877] = ["4881", "5587"]; // Pergola Easy SM - Autoportee
  campoCorTecido[3103] = ["3104"]; // Pergola aluminium classique
  campoCorTecido[3106] = ["3105"]; // Pergola aluminium TOP PRIX
  campoCorTecido[3108] = ["3109"]; // Pergola aluminium classique sur mesure

  opcoesStoreChange = []; // campos de cores para as pergolas - opcoesStoreChange[id_campo_opcao_fermeture] = ["id_campo_opcao_fermeture_valor"];
  // Pergola Promo (Starter)
  opcoesStoreChange[2001] = ["15002", "15003", "15004", "15005", "31022", "31023", "31024", "31025"]; // Autoportee
  opcoesStoreChange[2017] = ["15094", "15095", "15096", "31019", "31020", "31021"]; // Adossee
  /*
  // Pergola Promo Manuelle
  opcoesStoreChange[4778] = ["27640", "27641", "27642"]; // Adossee
  opcoesStoreChange[4777] = ["27628", "27629", "27630", "27631"]; // Autoportee
  */
  // Pergola Grandlux SM
   opcoesStoreChange[2014] = ["15076", "15077", "15078", "15079", "31015", "31016", "31017", "31018"]; // Autoportee
  opcoesStoreChange[2018] = ["15102", "15103", "15104", "31012", "31013", "31014"]; // Adossee
  // Pergola Grandlux Std
  opcoesStoreChange[2280] = ["17805", "17806", "17807", "31026", "31027", "31028"]; // Adossee
  opcoesStoreChange[2281] = ["17814", "17815", "17816", "17817", "31029", "31030", "31031", "31032"]; // Autoportee
  // Pergola Easy SM
  opcoesStoreChange[4877] = ["28260", "28261", "28262", "28263", "31008", "31009", "31010", "31011"]; // Autoportee
  opcoesStoreChange[4878] = ["28272", "28273", "28274", "30935", "30936", "30937"]; // Adossee
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
            } else if (campoCor.match(/3030/)) {
              cor = "3030";
            } else if (campoCor.match(/0202/)) {
              cor = "0202";
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



/* ********************************************************
// Joana
// Número de folhas das cortinas de vidro (Pérgolas SM)
*********************************************************** */
function numeroFolhasCortinaSM() {

  // Verifica se o cliente selecionou alguma cortina de vidro
  var cortinaSMSelecionada = false;
  //Campos dos fechos das cortinas de vidro
  var idsCortinasSM = [30836, 30837, 30838, 30842, 30843, 30844, 30845, 30846, 30847, 30848, 30849, 30850, 30851, 30852];
  idsCortinasSM.forEach(function (num) {
    var valor = parseInt($('#ndk-accessory-quantity-' + num).val(), 10);
    if (valor > 0) { cortinaSMSelecionada = true; }
  });

  // Se não escolheu nenhuma cortina de vidro, limpa o campo
  if (!cortinaSMSelecionada) {
    $("#text_5617").val("");
    $("#text_5617").attr("value", "");
    $("#ndkcsfield_5617").html("");
    return;
  }

  // Devolve o valor selecionado no campo Largura - ex: 10 lames, 2196 mm
  var valorLarguraSM = $('#ndkcsfield_2267').val() || $('#ndkcsfield_2270').val() || $('#ndkcsfield_4871').val() || $('#ndkcsfield_4872').val() || $('#ndkcsfield_4923').val() || $('#ndkcsfield_4924').val() || $('#ndkcsfield_5157').val() || $('#ndkcsfield_5172').val();

  // Se não tem largura, limpa o campo
  if (!valorLarguraSM) {
    $("#text_5617").val("");
    $("#text_5617").attr("value", "");
    $("#ndkcsfield_5617").html("");
    return;
  }

  // Extrai o número em mm - ex: 2196 mm
  var matchSM = valorLarguraSM.match(/(\d+)\s*mm/);

  // Se encontrou um valor de largura
  if (matchSM) {
    var larguraSM = parseInt(matchSM[1], 10); //ex: 2196
    var textoSM = "";

    if (larguraSM <= 3800) {
      textoSM = "3 vantaux";

    } else if (larguraSM <= 5000) {
      textoSM = "4 vantaux";

    } else {
      textoSM = "8 vantaux";
    }

    $("#text_5617").val(textoSM);
    $("#text_5617").attr("value", textoSM);
    $("#ndkcsfield_5617").html(textoSM);
  }
}

// Evento: Alteração no campo Largura
$(document).on('change', '#ndkcsfield_2267, #ndkcsfield_2270, #ndkcsfield_4871, #ndkcsfield_4872, #ndkcsfield_4923, #ndkcsfield_4924, #ndkcsfield_5157, #ndkcsfield_5172', function () {
    numeroFolhasCortinaSM();
});

// Evento: Alteração na escolha das cortinas de vidro
$(document).on('change', '#ndk-accessory-quantity-30836, #ndk-accessory-quantity-30837, #ndk-accessory-quantity-30838, #ndk-accessory-quantity-30842, #ndk-accessory-quantity-30843, #ndk-accessory-quantity-30844, #ndk-accessory-quantity-30845, #ndk-accessory-quantity-30846, #ndk-accessory-quantity-30847, #ndk-accessory-quantity-30848, #ndk-accessory-quantity-30849, #ndk-accessory-quantity-30850, #ndk-accessory-quantity-30851, #ndk-accessory-quantity-30852', function () {
    numeroFolhasCortinaSM();
});


/* ********************************************************
// Joana
// Número de folhas das cortinas de vidro (Pérgolas STD)
*********************************************************** */
function numeroFolhasCortinaSTD() {

  // Verifica se o cliente selecionou alguma cortina de vidro
  var cortinaSTDSelecionada = false;
  //Campos dos fechos das cortinas de vidro
  var idsCortinasSTD = [30853, 30854, 30855, 30856, 30857, 30858, 30859, 30860, 30861, 30862, 30863, 30864, 30865, 30866];
  idsCortinasSTD.forEach(function (num) {
    var valor = parseInt($('#ndk-accessory-quantity-' + num).val(), 10);
    if (valor > 0) { cortinaSTDSelecionada = true; }
  });

  // Se não escolheu nenhuma cortina de vidro, limpa o campo
  if (!cortinaSTDSelecionada) {
    $("#text_5617").val("");
    $("#text_5617").attr("value", "");
    $("#ndkcsfield_5617").html("");
    return;
  }

  // Devolve o valor selecionado no campo Largura - ex: 4000 mm x 3474 mm (Nombre de Lames : 16)
  var valorLarguraSTD = $('input[name="ndkcsfield[1503]"]:checked').val() || $('input[name="ndkcsfield[2029]"]:checked').val()
                      || $('input[name="ndkcsfield[2276]"]:checked').val() || $('input[name="ndkcsfield[2277]"]:checked').val();

  // Se não tem largura, limpa o campo
  if (!valorLarguraSTD) {
    $("#text_5617").val("");
    $("#text_5617").attr("value", "");
    $("#ndkcsfield_5617").html("");
    return;
  }

  // Extrai o número em mm - ex: [4000 mm, 3474 mm]
  var matches = valorLarguraSTD.match(/(\d+)\s*mm/g);

  // Se não tem largura, limpa o campo
  if (!matches || matches.length === 0) {
    $("#text_5617").val("");
    $("#text_5617").attr("value", "");
    $("#ndkcsfield_5617").html("");
    return;
  }

  // Converte o número (ex: 4000 mm x 3474 mm) para inteiro (ex: [4000, 3474])
  var valores = matches.map(function (str) {
    return parseInt(str);
  });

  //Encontra a dimensão maior entre os dois valores passados, convertido numa lista (ex: (4000, 3474) e guarda o valor 4000)
  var larguraSTD = Math.max.apply(null, valores);

  // Se encontrou um valor de largura
    var textoSTD = "";

    if (larguraSTD <= 3800) {
      textoSTD = "3 vantaux";

    } else if (larguraSTD <= 5000) {
      textoSTD = "4 vantaux";

    } else {
      textoSTD = "8 vantaux";
    }

    $("#text_5617").val(textoSTD);
    $("#text_5617").attr("value", textoSTD);
    $("#ndkcsfield_5617").html(textoSTD);
  }

// Evento: Alteração no campo Largura
$(document).on('change', 'input[name="ndkcsfield[1503]"], input[name="ndkcsfield[2029]"], input[name="ndkcsfield[2276]"], input[name="ndkcsfield[2277]"]', function () {
    numeroFolhasCortinaSTD();
});

// Evento: Alteração na escolha das cortinas de vidro
$(document).on('change', '#ndk-accessory-quantity-30853, #ndk-accessory-quantity-30854, #ndk-accessory-quantity-30855, #ndk-accessory-quantity-30856, #ndk-accessory-quantity-30857, #ndk-accessory-quantity-30858, #ndk-accessory-quantity-30859, #ndk-accessory-quantity-30860, #ndk-accessory-quantity-30861, #ndk-accessory-quantity-30862, #ndk-accessory-quantity-30863, #ndk-accessory-quantity-30864, #ndk-accessory-quantity-30865, #ndk-accessory-quantity-30866', function () {
    numeroFolhasCortinaSTD();
});

/* ******************************************************** */


// Joana - Troca a cor dos estores zip
$(document).on('click', '[data-id-value="30935"], [data-id-value="30936"], [data-id-value="30937"], [data-id-value="31008"], [data-id-value="31009"], [data-id-value="31010"], [data-id-value="31011"], [data-id-value="31012"], [data-id-value="31013"], [data-id-value="31014"], [data-id-value="31015"], [data-id-value="31016"], [data-id-value="31017"], [data-id-value="31018"], [data-id-value="31019"], [data-id-value="31020"], [data-id-value="31021"], [data-id-value="31022"], [data-id-value="31023"], [data-id-value="31024"], [data-id-value="31025"], [data-id-value="31026"], [data-id-value="31027"], [data-id-value="31028"], [data-id-value="31029"], [data-id-value="31030"], [data-id-value="31031"], [data-id-value="31032"]', function () {

  // Verifica se pelo menos um estore zip está selecionado
  var estoreSelecionado = $('[data-id-value="30935"].selected-accessory, [data-id-value="30936"].selected-accessory, [data-id-value="30937"].selected-accessory, [data-id-value="31008"].selected-accessory, [data-id-value="31009"].selected-accessory, [data-id-value="31010"].selected-accessory, [data-id-value="31011"].selected-accessory, [data-id-value="31012"].selected-accessory, [data-id-value="31013"].selected-accessory, [data-id-value="31014"].selected-accessory, [data-id-value="31015"].selected-accessory, [data-id-value="31016"].selected-accessory, [data-id-value="31017"].selected-accessory, [data-id-value="31018"].selected-accessory, [data-id-value="31019"].selected-accessory, [data-id-value="31020"].selected-accessory, [data-id-value="31021"].selected-accessory, [data-id-value="31022"].selected-accessory, [data-id-value="31023"].selected-accessory, [data-id-value="31024"].selected-accessory, [data-id-value="31025"].selected-accessory, [data-id-value="31026"].selected-accessory, [data-id-value="31027"].selected-accessory, [data-id-value="31028"].selected-accessory, [data-id-value="31029"].selected-accessory, [data-id-value="31030"].selected-accessory, [data-id-value="31031"].selected-accessory, [data-id-value="31032"].selected-accessory').length > 0;

  // Se sim, força o clique
  if (estoreSelecionado) {
    $("li[data-group='5587'].color-ndk.selected-value, li[data-group='5598'].color-ndk.selected-value, li[data-group='5599'].color-ndk.selected-value, li[data-group='5600'].color-ndk.selected-value").trigger('click');
  }

});




$(document).on('click', '.accessory-ndk-no-quantity .accessory_img_block', function () {
  me = $(this).parent();
  rootBlock = $(".form-group[data-field='" + me.attr('data-group') + "']");

  input = $('#ndk-accessory-quantity-'+ me.attr('data-id-value'));
  max = parseInt(rootBlock.attr('data-qtty-max'));
  var price = $('#ndk-accessory-quantity-' + me.attr('data-id-value')).attr('data-price');
  var finalprice =  $("#price_" + me.attr('data-group')).val();

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

// Pergola Bioclimatique EASY SM Autoportée, GRANDLUX STD Autoportée, GRANDLUX SM Autoportée, STARTER STD Autoportée
$(document).on('click', "#img_div_30528", function () {
  if ($("li.accessory-ndk-no-quantity[data-id-value='30528']").hasClass("selected-accessory")) { // Campo 5465
    $('#ndk-accessory-quantity-30539').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30537').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30538').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31330').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31331').val(quantzippose).trigger('change');
  } else {
    $('#ndk-accessory-quantity-30539').val(0).trigger('change');
    $('#ndk-accessory-quantity-30537').val(0).trigger('change');
    $('#ndk-accessory-quantity-30538').val(0).trigger('change');
    $('#ndk-accessory-quantity-31330').val(0).trigger('change');
    $('#ndk-accessory-quantity-31331').val(0).trigger('change');
  }
  TextInfoclose();
});

// Pergola Bioclimatique EASY SM Adossée, GRANDLUX STD Adossée, GRANDLUX SM Adossée, STARTER STD Adossée
$(document).on('click', "#img_div_30540", function () {
  if ($("li.accessory-ndk-no-quantity[data-id-value='30540']").hasClass("selected-accessory")) { //Campo 5467
    $('#ndk-accessory-quantity-30543').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30541').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30542').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31332').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31333').val(quantzippose).trigger('change');
  } else {
    $('#ndk-accessory-quantity-30543').val(0).trigger('change');
    $('#ndk-accessory-quantity-30541').val(0).trigger('change');
    $('#ndk-accessory-quantity-30542').val(0).trigger('change');
    $('#ndk-accessory-quantity-31332').val(0).trigger('change');
    $('#ndk-accessory-quantity-31333').val(0).trigger('change');
  }
  TextInfocloseAdosse();
});

function TextInfoclose() {
  var textInfo = '';
  if (quantstorepose > 0) {
    textInfo = textInfo + "  + Store Motorisé x" + quantstorepose + " " + $("#price_30539").html();
  }
  if (quantvitrepose > 0) {
    textInfo = textInfo + "  + Fermeture Vitrée  x" + quantvitrepose + " " + $("#price_30537").html() + "<br>";
  }
  if (quantaccordpose > 0) {
    textInfo = textInfo + "  + Fermeture Accordéon x" + quantaccordpose + " " + $("#price_30538").html() + "<br>";
  }
  if (quantcortinapose > 0) {
    textInfo = textInfo + "  + Fermeture Rideau x" + quantcortinapose + " " + $("#price_31330").html() + "<br>";
  }
  if (quantzippose > 0) {
    textInfo = textInfo + "  + Store Zip x" + quantzippose + " " + $("#price_31331").html();
  }
  $("#messagen_5460").html(textInfo);
}

function TextInfocloseAdosse() {
  var textInfo = '';
  if (quantstorepose > 0) {
    textInfo = textInfo + "  + Store Motorisé x" + quantstorepose + " " + $("#price_30543").html();
  }
  if (quantvitrepose > 0) {
    textInfo = textInfo + "  + Fermeture Vitrée  x" + quantvitrepose + " " + $("#price_30541").html() + "<br>";
  }
  if (quantaccordpose > 0) {
    textInfo = textInfo + "  + Fermeture Accordéon x" + quantaccordpose + " " + $("#price_30542").html() + "<br>";
  }
  if (quantcortinapose > 0) {
    textInfo = textInfo + "  + Fermeture Rideau x" + quantcortinapose + " " + $("#price_31332").html() + "<br>";
  }
  if (quantzippose > 0) {
    textInfo = textInfo + "  + Store Zip x" + quantzippose + " " + $("#price_31333").html();
  }
  $("#messagen_5466").html(textInfo);
}

//  Pergola Bioclimatique EASY Autoportée SM [4877]

$(document).on('click', '#img_div_28260,#img_div_28261,#img_div_28262,#img_div_28263,#img_div_28268,#img_div_28269,#img_div_28270,#img_div_28271,#img_div_28264,#img_div_28265,#img_div_28266,#img_div_28267,#img_div_30842,#img_div_30843,#img_div_30844,#img_div_30845,#img_div_31008,#img_div_31009,#img_div_31010,#img_div_31011', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-28260').val()) + parseInt($('#ndk-accessory-quantity-28261').val()) + parseInt($('#ndk-accessory-quantity-28262').val()) + parseInt($('#ndk-accessory-quantity-28263').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-28264').val()) + parseInt($('#ndk-accessory-quantity-28265').val()) + parseInt($('#ndk-accessory-quantity-28266').val()) + parseInt($('#ndk-accessory-quantity-28267').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-28268').val()) + parseInt($('#ndk-accessory-quantity-28269').val()) + parseInt($('#ndk-accessory-quantity-28270').val()) + parseInt($('#ndk-accessory-quantity-28271').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30842').val()) + parseInt($('#ndk-accessory-quantity-30843').val()) + parseInt($('#ndk-accessory-quantity-30844').val()) + parseInt($('#ndk-accessory-quantity-30845').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31008').val()) + parseInt($('#ndk-accessory-quantity-31009').val()) + parseInt($('#ndk-accessory-quantity-31010').val()) + parseInt($('#ndk-accessory-quantity-31011').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30528']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30539').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30537').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30538').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31330').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31331').val(quantzippose).trigger('change');
  }
  TextInfoclose();
});


//  Pergola Bioclimatique GRANDLUX Autoportée SM [2014]

$(document).on('click', '#img_div_15076,#img_div_15077,#img_div_15078,#img_div_15079,#img_div_15080,#img_div_15081,#img_div_15082,#img_div_15083,#img_div_15086,#img_div_15087,#img_div_15088,#img_div_15089,#img_div_30849,#img_div_30850,#img_div_30851,#img_div_30852,#img_div_31015,#img_div_31016,#img_div_31017,#img_div_31018', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-15076').val()) + parseInt($('#ndk-accessory-quantity-15077').val()) + parseInt($('#ndk-accessory-quantity-15078').val()) + parseInt($('#ndk-accessory-quantity-15079').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-15080').val()) + parseInt($('#ndk-accessory-quantity-15081').val()) + parseInt($('#ndk-accessory-quantity-15082').val()) + parseInt($('#ndk-accessory-quantity-15083').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-15086').val()) + parseInt($('#ndk-accessory-quantity-15087').val()) + parseInt($('#ndk-accessory-quantity-15088').val()) + parseInt($('#ndk-accessory-quantity-15089').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30849').val()) + parseInt($('#ndk-accessory-quantity-30850').val()) + parseInt($('#ndk-accessory-quantity-30851').val()) + parseInt($('#ndk-accessory-quantity-30852').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31015').val()) + parseInt($('#ndk-accessory-quantity-31016').val()) + parseInt($('#ndk-accessory-quantity-31017').val()) + parseInt($('#ndk-accessory-quantity-31018').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30528']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30539').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30537').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30538').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31330').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31331').val(quantzippose).trigger('change');
  }
  TextInfoclose();
});


//  Pergola Bioclimatique PROMO (STARTER) Autoportée STD [2001]

$(document).on('click', '#img_div_15002,#img_div_15003,#img_div_15004,#img_div_15005,#img_div_15006,#img_div_15007,#img_div_15008,#img_div_15009,#img_div_16280,#img_div_16281,#img_div_16282,#img_div_16283,#img_div_30856,#img_div_30857,#img_div_30858,#img_div_30859,#img_div_31022,#img_div_31023,#img_div_31024,#img_div_31025', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-15002').val()) + parseInt($('#ndk-accessory-quantity-15003').val()) + parseInt($('#ndk-accessory-quantity-15004').val()) + parseInt($('#ndk-accessory-quantity-15005').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-15006').val()) + parseInt($('#ndk-accessory-quantity-15007').val()) + parseInt($('#ndk-accessory-quantity-15008').val()) + parseInt($('#ndk-accessory-quantity-15009').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-16280').val()) + parseInt($('#ndk-accessory-quantity-16281').val()) + parseInt($('#ndk-accessory-quantity-16282').val()) + parseInt($('#ndk-accessory-quantity-16283').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30856').val()) + parseInt($('#ndk-accessory-quantity-30857').val()) + parseInt($('#ndk-accessory-quantity-30858').val()) + parseInt($('#ndk-accessory-quantity-30859').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31022').val()) + parseInt($('#ndk-accessory-quantity-31023').val()) + parseInt($('#ndk-accessory-quantity-31024').val()) + parseInt($('#ndk-accessory-quantity-31025').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30528']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30539').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30537').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30538').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31330').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31331').val(quantzippose).trigger('change');
  }
  TextInfoclose();
});


//  Pergola Bioclimatique GRANDLUX Autoportée STD [2281]

$(document).on('click', '#img_div_17814,#img_div_17815,#img_div_17816,#img_div_17817,#img_div_17818,#img_div_17819,#img_div_17820,#img_div_17821,#img_div_17822,#img_div_17823,#img_div_17824,#img_div_17825,#img_div_30863,#img_div_30864,#img_div_30865,#img_div_30866,#img_div_31029,#img_div_31030,#img_div_31031,#img_div_31032', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-17814').val()) + parseInt($('#ndk-accessory-quantity-17815').val()) + parseInt($('#ndk-accessory-quantity-17816').val()) + parseInt($('#ndk-accessory-quantity-17817').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-17818').val()) + parseInt($('#ndk-accessory-quantity-17819').val()) + parseInt($('#ndk-accessory-quantity-17820').val()) + parseInt($('#ndk-accessory-quantity-17821').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-17822').val()) + parseInt($('#ndk-accessory-quantity-17823').val()) + parseInt($('#ndk-accessory-quantity-17824').val()) + parseInt($('#ndk-accessory-quantity-17825').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30863').val()) + parseInt($('#ndk-accessory-quantity-30864').val()) + parseInt($('#ndk-accessory-quantity-30865').val()) + parseInt($('#ndk-accessory-quantity-30866').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31029').val()) + parseInt($('#ndk-accessory-quantity-31030').val()) + parseInt($('#ndk-accessory-quantity-31031').val()) + parseInt($('#ndk-accessory-quantity-31032').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30528']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30539').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30537').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30538').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31330').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31331').val(quantzippose).trigger('change');
  }

  TextInfoclose();
});



// Pergola Bioclimatique EASY Adossée SM [4878]

$(document).on('click', '#img_div_28272,#img_div_28273,#img_div_28274,#img_div_28275,#img_div_28276,#img_div_28277,#img_div_28278,#img_div_28279,#img_div_28280,#img_div_30836,#img_div_30837,#img_div_30838,#img_div_30935,#img_div_30936,#img_div_30937', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-28272').val()) + parseInt($('#ndk-accessory-quantity-28273').val()) + parseInt($('#ndk-accessory-quantity-28274').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-28275').val()) + parseInt($('#ndk-accessory-quantity-28276').val()) + parseInt($('#ndk-accessory-quantity-28277').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-28278').val()) + parseInt($('#ndk-accessory-quantity-28279').val()) + parseInt($('#ndk-accessory-quantity-28280').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30836').val()) + parseInt($('#ndk-accessory-quantity-30837').val()) + parseInt($('#ndk-accessory-quantity-30838').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-30935').val()) + parseInt($('#ndk-accessory-quantity-30936').val()) + parseInt($('#ndk-accessory-quantity-30937').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30540']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30543').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30541').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30542').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31332').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31333').val(quantzippose).trigger('change');
  }
  TextInfocloseAdosse();
});


// Pergola Bioclimatique GRANDLUX Adossée SM [2018]

$(document).on('click', '#img_div_15102,#img_div_15103,#img_div_15104,#img_div_15106,#img_div_15107,#img_div_15108,#img_div_15110,#img_div_15111,#img_div_15112,#img_div_30846,#img_div_30847,#img_div_30848,#img_div_31012,#img_div_31013,#img_div_31014', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-15102').val()) + parseInt($('#ndk-accessory-quantity-15103').val()) + parseInt($('#ndk-accessory-quantity-15104').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-15106').val()) + parseInt($('#ndk-accessory-quantity-15107').val()) + parseInt($('#ndk-accessory-quantity-15108').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-15110').val()) + parseInt($('#ndk-accessory-quantity-15111').val()) + parseInt($('#ndk-accessory-quantity-15112').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30846').val()) + parseInt($('#ndk-accessory-quantity-30847').val()) + parseInt($('#ndk-accessory-quantity-30848').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31012').val()) + parseInt($('#ndk-accessory-quantity-31013').val()) + parseInt($('#ndk-accessory-quantity-31014').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30540']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30543').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30541').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30542').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31332').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31333').val(quantzippose).trigger('change');
  }
  TextInfocloseAdosse();
});


// Pergola Bioclimatique PROMO (STARTER) Adossée STD [2017]

$(document).on('click', '#img_div_15094,#img_div_15095,#img_div_15096,#img_div_15098,#img_div_15099,#img_div_15100,#img_div_16284,#img_div_16285,#img_div_16286,#img_div_30853,#img_div_30854,#img_div_30855,#img_div_31019,#img_div_31020,#img_div_31021', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-15094').val()) + parseInt($('#ndk-accessory-quantity-15095').val()) + parseInt($('#ndk-accessory-quantity-15096').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-15098').val()) + parseInt($('#ndk-accessory-quantity-15099').val()) + parseInt($('#ndk-accessory-quantity-15100').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-16284').val()) + parseInt($('#ndk-accessory-quantity-16285').val()) + parseInt($('#ndk-accessory-quantity-16286').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30853').val()) + parseInt($('#ndk-accessory-quantity-30854').val()) + parseInt($('#ndk-accessory-quantity-30855').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31019').val()) + parseInt($('#ndk-accessory-quantity-31020').val()) + parseInt($('#ndk-accessory-quantity-31021').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30540']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30543').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30541').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30542').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31332').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31333').val(quantzippose).trigger('change');
  }
  TextInfocloseAdosse();
});


// Pergola Bioclimatique GRANDLUX Adossée STD [2280]

$(document).on('click', '#img_div_17805,#img_div_17806,#img_div_17807,#img_div_17808,#img_div_17809,#img_div_17810,#img_div_17811,#img_div_17812,#img_div_17813,#img_div_30860,#img_div_30861,#img_div_30862,#img_div_31026,#img_div_31027,#img_div_31028', function () {
  quantstorepose = parseInt($('#ndk-accessory-quantity-17805').val()) + parseInt($('#ndk-accessory-quantity-17806').val()) + parseInt($('#ndk-accessory-quantity-17807').val());
  quantvitrepose = parseInt($('#ndk-accessory-quantity-17808').val()) + parseInt($('#ndk-accessory-quantity-17809').val()) + parseInt($('#ndk-accessory-quantity-17810').val());
  quantaccordpose = parseInt($('#ndk-accessory-quantity-17811').val()) + parseInt($('#ndk-accessory-quantity-17812').val()) + parseInt($('#ndk-accessory-quantity-17813').val());
  quantcortinapose = parseInt($('#ndk-accessory-quantity-30860').val()) + parseInt($('#ndk-accessory-quantity-30861').val()) + parseInt($('#ndk-accessory-quantity-30862').val());
  quantzippose = parseInt($('#ndk-accessory-quantity-31026').val()) + parseInt($('#ndk-accessory-quantity-31027').val()) + parseInt($('#ndk-accessory-quantity-31028').val());

  if ($("li.accessory-ndk-no-quantity[data-id-value='30540']").hasClass("selected-accessory")) {
    $('#ndk-accessory-quantity-30543').val(quantstorepose).trigger('change');
    $('#ndk-accessory-quantity-30541').val(quantvitrepose).trigger('change');
    $('#ndk-accessory-quantity-30542').val(quantaccordpose).trigger('change');
    $('#ndk-accessory-quantity-31332').val(quantcortinapose).trigger('change');
    $('#ndk-accessory-quantity-31333').val(quantzippose).trigger('change');
  }
  TextInfocloseAdosse();
});
