//** vasco aluclass  funcionalidades ndk apos carregamento da pagina     */

var quantityServerMotor = 0;
var quantityServerPorttilon = 0;

$(window).on("load", function () {

  $('#ndk-accessory-quantity-30439').val(0);
  $('#ndk-accessory-quantity-30458').val(0);
  $('#ndk-accessory-quantity-30459').val(0);
  $('#ndk-accessory-quantity-30460').val(0);
  $('#ndk-accessory-quantity-30461').val(0);

  $('#ndk-accessory-quantity-30462').val(0);
  $('#ndk-accessory-quantity-30465').val(0);

  //Portão campo portillon resertar valores e meter um valor pre-definido.
  switch (id_product) {
    case "640091":
    case "640078":
    case "640110":
      PortailShowPortillon("1200mm", ArrayShowPortillonBerlin());
      break;
    case "640111":
    case "640079":
      PortailShowPortillon("1200mm", ArrayShowPortillonMunich());
      break;
    case "640112":
    case "640080":
      PortailShowPortillon("1200mm", ArrayShowPortillonFrankfurt());
      break;
    case "640113":
    case "640081":
      PortailShowPortillon("1200mm", ArrayShowPortillonHamburg());
      break;
    case "640114":
    case "640082":
      PortailShowPortillon("1200mm", ArrayShowPortillonPotsdam());
      break;
    case "640115":
    case "640083":
      PortailShowPortillon("1200mm", ArrayShowPortillonKoln());
      break;
    case "640117":
    case "640084":
      PortailShowPortillon("1200mm", ArrayShowPortillonDresden());
      break;
    case "640118":
    case "640085":
      PortailShowPortillon("1200mm", ArrayShowPortillonDortmund());
      break;
    case "640119":
    case "640086":
      PortailShowPortillon("1200mm", ArrayShowPortillonEssen());
      break;
    case "640120":
    case "640087":
      PortailShowPortillon("1200mm", ArrayShowPortillonStuttgart());
      break;
    case "640121":
    case "640088":
      PortailShowPortillon("1200mm", ArrayShowPortillonNurnberg());
      break;
    case "640122":
    case "640089":
      PortailShowPortillon("1200mm", ArrayShowPortillonBremen());
      break;
    case "640123":
    case "640090":
      PortailShowPortillon("1200mm", ArrayShowPortillonHanover());
      break;
    case "640209":
    case "640210":
      PortailShowPortillon("1200mm", ArrayShowPortillonLabel());
      break;
  }


  $("li[data-id-value='" + 30461 + "']").hide();
  $("li[data-id-value='" + 30458 + "']").hide();
  $("li[data-id-value='" + 30460 + "']").hide();

  $("li[data-id-value='" + 30439 + "']").show();


  $("li[data-id-value='" + 30465 + "']").hide();
  $("li[data-id-value='" + 30462 + "']").show();

  /*
*********************************************************
Portão batente ou corrente
Vasco 11/12/2020
*********************************************************
*/


  //** remover a pre-visualização portões*/
  var aluclass_id_product = ["640212", "640210", "640209", "640188", "640181", "640180", "640179", "640178", "640177", "640176", "640175", "640174", "640173", "640172", "640171", "640170", "640169", "640168", "640167", "640166", "640165", "640164", "640163", "640162", "640161", "640160", "640159", "640158", "640157", "640156", "640155", "640154", "640123", "640122", "640121", "640120", "640119", "640118", "640117", "640115", "640114", "640113", "640112", "640111", "640110", "640099", "640092", "640091", "640090", "640089", "640088", "640087", "640086", "640085", "640084", "640083", "640082", "640081", "640080", "640079", "640078", "13410", "640068", "640066", "640065", "640064", "640063", "640062", "640061", "640060", "640059", "640058", "640057", "640055", "640054", "640053", "640052", "640051", "640050", "640049", "640048", "640047", "640046", "640045", "640044", "640043", "640042", "640041", "640040", "640039", "640038", "640037", "640030", "285781", "285786", "97109", "97110", "131846", "131845", "106905", "106906", "107032", "107031", "107100", "107101", "107509", "107508", "108772", "108773", "108835", "108834", "108903", "108902", "108957", "108956", "109065", "109063", "97196", "97197", "96451", "96450", "96371", "86822", "86645", "86651", "86163", "86313", "85247", "85102", "84141", "84003", "84736", "84808", "3520", "13072", "13648", "2225", "2506", "1974", "1936", "1931", "1651", "2370", "1663", "1658", "2251", "2246", "2239", "2516", "1682", "2375", "2005", "2496", "1986", "1991", "18776", "19780", "1998", "2491", "2024", "2501", "18766", "18774", "1119", "2017", "2012", "2232", "2511", "1955", "2380", "2258", "2521", "1670", "1677", "1967", "1962", "2265", "2526", "1986", "1948", "1943", "1979", "2385", "1810", "2031", "19426", "2128", "2275", "2272", "1689", "5601", "18784", "5710", "5891", "6072", "6253", "14346", "6362", "6543", "6724", "2279", "6905", "7086", "7267", "7358", "7539", "7612", "19428", "7709", "7818", "18789", "7999", "8108", "8289", "8470", "8651", "13665", "1689", "8742", "18785", "8863", "9064", "9265", "9466", "14350", "9587", "9788", "9989", "2390", "10190", "10391", "10592", "10693", "10894", "10975", "11072", "11193", "18790", "11394", "11515", "11716", "11917", "12118", "13648", "12615", "3434", "18777", "12640", "3437", "12681", "3440", "12722", "3443", "12763", "3487", "3446", "13649", "3490", "14362", "12788", "3493", "12829", "3496", "12870", "3499", "3573", "3502", "12911", "3505", "12952", "3508", "12993", "3511", "13014", "3514", "13055", "3517", "3520", "13105", "3553", "13130", "3556", "18792", "18781", "13171", "3559", "13196", "3562", "13237", "3565", "13278", "3568", "13319", "3571", "134707", "134714", "134724", "134731", "134733", "134740", "134768", "134786", "134807", "134858", "134877", "134892", "275784", "58943", "337262", "18779", "18780"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {

    // // $("#descriptionimg_1495").html("Automatisme à vis sans fin Tucan 400 pour portail battant (<span style='color: red;'><s>1049€</s></span>) -55%");
    // $("#descriptionimg_27297").html("Automatisme avec support articulé Kappa pour portail battant (<span style='color: red;'><s>1399€</s></span>) -55%");
    // // $("#descriptionimg_1518").html("Kit complet automatisme Centaurus 400 (<span style='color: red;'><s>849€</s></span>) -55%");
    //  $("#descriptionimg_6525").html("Kit complet automatisme Sirius 400 (<span style='color: red;'><s>849€</s></span>) -55%");
    // $("#descriptionimg_13022").html("Kit complet automatisme Nice Oltre (<span style='color: red;'><s>891€</s></span>) -55%");

    // // $(".custumerprice_1495").html("472 €");
    // $(".custumerprice_27297").html("629 €");
    // // $(".custumerprice_1518").html("382 €");
    // $(".custumerprice_6525").html("382 €");
    // $(".custumerprice_13022").html("401 €");


    // // $("#descriptionimg_1544").html("Automatisme à vis sans fin Tucan 400 pour portail battant (<span style='color: red;'><s>1049€</s></span>) -55%");
    // $("#descriptionimg_27296").html("Automatisme avec support articulé Kappa pour portail battant (<span style='color: red;'><s>1399€</s></span>) -55%");
    // // $("#descriptionimg_1470").html("Kit complet automatisme Centaurus 400 (<span style='color: red;'><s>849€</s></span>) -55%");
    //  $("#descriptionimg_1471").html("Kit complet automatisme Sirius 400 (<span style='color: red;'><s>849€</s></span>) -55%");
    // $("#descriptionimg_29966").html("Kit complet automatisme Nice Oltre (<span style='color: red;'><s>891€</s></span>) -55%");

    // // $(".custumerprice_1544").html("472 €");
    // $(".custumerprice_27296").html("629 €");
    // // $(".custumerprice_1470").html("382 €");
    // $(".custumerprice_1471").html("382 €");
    // $(".custumerprice_29966").html("401 €");

    var aluclass_remove_preview = [];
    aluclass_remove_preview[0] = [5127, 5126, 5122, 5121, 5097, 5096, 5093, 5092, 5067, 5066, 5061, 5060, 4993, 4992, 4789, 4781, 4760, 4749, 4780, 4719, 4680, 4578, 2358, 2576, 2478, 2479, 2436, 2568, 2377, 2565, 2370, 2570, 2360, 2571, 2351, 2573, 2358, 2465, 2431, 93, 669, 650, 649, 648, 647, 646, 645, 644, 643, 642, 641, 640, 639, 585, 584, 583, 582, 581, 580, 579, 578, 577, 576, 575, 526, 525, 524, 523, 522, 521, 520, 519, 371, 370, 178, 179, 174, 171, 165, 164, 163, 127, 177, 171, 39, 67, 127, 163, 83, 71, 230, 231, 220, 241, 242, 251, 2124, 2306, 2128, 2042, 2136, 2309, 2132, 2307, 2140, 2151, 2146, 2039, 2308, 2148, 2053, 2310, 2311, 2312, 2313, 2157, 2158, 2159, 2160, 2298, 2186, 2190, 2333, 2194, 2336, 2197, 2090, 2265, 2342, 2208, 2209, 2203, 2100, 2346, 2347, 2293, 2299, 2300, 2396, 2324, 2177, 2327, 2329, 2339, 2343, 1347, 1348, 2437, 2450, 2451, 2459, 2455, 2460, 2462, 2468, 2470, 2472, 2473, 2474, 2475, 2476, 2477, 2480, 2481, 2482, 2483, 2484, 2485, 2510, 2511, 2512, 2513, 2514, 66, 4135];
    aluclass_remove_preview[0].forEach(function (num) {
      $('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
    });
    aluclass_remove_preview[1] = [4587, 4588];
    aluclass_remove_preview[1].forEach(function (num) {
      $(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
    });
  }


  var aluclass_id_product = ["2128", "10975", "1689", "13665", "19426", "19428", "2031", "7612", "13648"]; //** remover a pre-visualização de N campos do ndk */
  if ($.inArray(id_product, aluclass_id_product) !== -1) {

    var aluclass_remove_preview = [];
    //portões
    aluclass_remove_preview[13648] = [83];
    aluclass_remove_preview[7612] = [174];
    aluclass_remove_preview[2031] = [171];
    aluclass_remove_preview[19428] = [639];
    aluclass_remove_preview[19426] = [639];
    aluclass_remove_preview[13665] = [93];
    aluclass_remove_preview[1689] = [66];
    aluclass_remove_preview[10975] = [575];
    aluclass_remove_preview[2128] = [178];

    if (aluclass_remove_preview.hasOwnProperty(id_product)) {
      aluclass_remove_preview[id_product].forEach(function (num) {
        $('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
      });
    }

    aluclass_remove_preview[1] = [2767];
    aluclass_remove_preview[1].forEach(function (num) {
      $(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
    });
  }

});


function checkServicePoseSM(quantityServerMotor) {

  if (parseInt(quantityServerMotor) > 0) {
    $("li[data-id-value='" + 30462 + "']").hide();

    $("li[data-id-value='" + 30465 + "']").show();

    if ($("li[data-id-value='" + 30462 + "']").hasClass('selected-accessory')) {
      $("#img_div_30465").trigger("click");
    }


  } else {

    $("li[data-id-value='" + 30465 + "']").hide();

    $("li[data-id-value='" + 30462 + "']").show();

    if ($("li[data-id-value='" + 30465 + "']").hasClass('selected-accessory')) {
      $("#img_div_30462").trigger("click");
    }
  }

}

function checkServicePose(quantityServerMotor, quantityServerPorttilon) {

  if (parseInt(quantityServerMotor) > 0 && parseInt(quantityServerPorttilon) == 0) {
    $("li[data-id-value='" + 30439 + "']").hide();
    $("li[data-id-value='" + 30458 + "']").hide();
    $("li[data-id-value='" + 30460 + "']").hide();

    $("li[data-id-value='" + 30461 + "']").show();

    if ($("li[data-id-value='" + 30460 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30458 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30439 + "']").hasClass('selected-accessory')) {
      $("#img_div_30461").trigger("click");

    }
  } else if (parseInt(quantityServerMotor) > 0 && parseInt(quantityServerPorttilon) > 0) {
    $("li[data-id-value='" + 30439 + "']").hide();
    $("li[data-id-value='" + 30461 + "']").hide();
    $("li[data-id-value='" + 30458 + "']").hide();

    $("li[data-id-value='" + 30460 + "']").show();

    if ($("li[data-id-value='" + 30458 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30461 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30439 + "']").hasClass('selected-accessory')) {
      $("#img_div_30460").trigger("click");
    }

  } else if (parseInt(quantityServerMotor) == 0 && parseInt(quantityServerPorttilon) > 0) {
    $("li[data-id-value='" + 30439 + "']").hide();
    $("li[data-id-value='" + 30461 + "']").hide();
    $("li[data-id-value='" + 30460 + "']").hide();

    $("li[data-id-value='" + 30458 + "']").show();

    if ($("li[data-id-value='" + 30460 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30461 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30439 + "']").hasClass('selected-accessory')) {
      $("#img_div_30458").trigger("click");
    }

  } else {

    $("li[data-id-value='" + 30461 + "']").hide();
    $("li[data-id-value='" + 30458 + "']").hide();
    $("li[data-id-value='" + 30460 + "']").hide();

    $("li[data-id-value='" + 30439 + "']").show();

    if ($("li[data-id-value='" + 30460 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30458 + "']").hasClass('selected-accessory') || $("li[data-id-value='" + 30461 + "']").hasClass('selected-accessory')) {
      $("#img_div_30439").trigger("click");
    }
  }

}

$(document).on('change', "#ndk-accessory-quantity-29966 , #ndk-accessory-quantity-1544, #ndk-accessory-quantity-27296 ", function () {
  quantityServerMotor = parseInt($('#ndk-accessory-quantity-27296').val()) + parseInt($('#ndk-accessory-quantity-1544').val());

  checkServicePose(quantityServerMotor, quantityServerPorttilon);

});

$(document).on('change', "#ndk-accessory-quantity-1470, #ndk-accessory-quantity-1471 ", function () {
  quantityServerMotor = parseInt($('#ndk-accessory-quantity-1470').val()) + parseInt($('#ndk-accessory-quantity-1471').val());

  checkServicePose(quantityServerMotor, quantityServerPorttilon);

});

$(document).on('click', "#img_div_13022, #img_div_1495,#img_div_27297", function () {
  quantityServerMotor =
    parseInt($('#ndk-accessory-quantity-13022').val() || 0) || 0 +
    parseInt($('#ndk-accessory-quantity-1495').val() || 0) || 0 +
    parseInt($('#ndk-accessory-quantity-27297').val() || 0) || 0;

  checkServicePoseSM(quantityServerMotor);

});

$(document).on('click', "#img_div_1518, #img_div_6525,#img_div_1522", function () {

  let quantityServerMotorPCSM = 0;
  const ids = ['#ndk-accessory-quantity-1518', '#ndk-accessory-quantity-6525', '#ndk-accessory-quantity-1522'];

  ids.forEach(id => {
    const element = $(id);
    if (element.length) {
      quantityServerMotorPCSM += parseInt(element.val()) || 0;
    }
  });
  quantityServerMotor = quantityServerMotorPCSM;
  checkServicePoseSM(quantityServerMotor);


});

/*
*********************************************************
Portão batente ou corrente
Vasco 11/12/2020
*********************************************************
*/

$(document).on('click', "li.accessory-ndk-no-quantity", function () {
  var idFieldNDK = $(this).attr('data-group');
  var idFieldValueNDK = $(this).attr('data-id-value');
  var arrayFieldNDKPortillon = ["5226", "5225", "5195", "5223", "5222", "5192", "4803", "4693", "4694", "4695", "4696", "4699", "4700", "4701", "4702", "4704", "4705", "4706", "4707", "4709", "4710", "4711", "4712", "4714", "4715", "4716", "4717", "4720", "4721", "4722", "4723", "4725", "4726", "4727", "4728", "4729", "4731", "4732", "4733", "4735", "4736", "4737", "4738", "4740", "4741", "4742", "4743", "4745", "4746", "4747", "4748", "4691", "4690", "4689", "4685", "4687", "4688", "4686", "4681", "4607", "4609", "4611", "4613", "4615", "4620", "4622", "4624", "4626", "4628", "4630", "4632", "4634", "4636", "4638", "4640", "4642", "4644", "4646", "4648", "4586", "1391", "3699", "1142", "1141", "1139", "1140", "1138", "1135", "1136", "1128", "3496", "1134", "1132", "1130", "1133", "1131", "1137", "3494", "3492", "3491", "3493", "3490", "1129", "1126", "1127", "1148", "1122", "1125", "3489", "1121", "3488", "1120", "1153", "3495", "1124", "1145", "3985"];

  if ($.inArray(idFieldNDK, arrayFieldNDKPortillon) !== -1) {

    if ($("li[data-id-value='" + idFieldValueNDK + "']").hasClass('selected-accessory')) {
      quantityServerPorttilon = 1;
    } else {
      quantityServerPorttilon = 0;
    }

    checkServicePose(quantityServerMotor, quantityServerPorttilon);

    $("li.accessory-ndk-no-quantity[data-group='" + idFieldNDK + "']").each(function (i) {
      idFieldValueNDKFor = $(this).attr('data-id-value');
      if (idFieldValueNDKFor != idFieldValueNDK)
        RemoveAllOrtherSelectOptions(idFieldValueNDKFor, idFieldNDK);
    });
  }
});


$(document).on('change', "#ndkcsfield_388", function () {
  var selectValeu = $(this).val();
  var selectValeuSplit = selectValeu.split(' ');
  //Portão Batente
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_390').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_390').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3882').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3882').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3881').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3881').trigger('change');
  //Portão Correr
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_387').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_387').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3877').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3877').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3878').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3878').trigger('change');
  //Portão porttilon
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_392').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_392').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3879').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3879').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3880').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3880').trigger('change');
});


$(document).on('click', "#dimension_text_width_390, #dimension_text_width_3881, #dimension_text_width_3882,  #dimension_text_width_387, #dimension_text_width_3877, #dimension_text_width_3878 ,  #dimension_text_width_392, #dimension_text_width_3879, #dimension_text_width_3880 ", function () {
  var selectValeu = $("#ndkcsfield_388").attr("data-selected");
  if (typeof selectValeu !== typeof undefined && selectValeu !== false) {
    $('#ndkcsfield_388').trigger('change');
  }
});

//** Portão Miami -  Mostrar preço quando na selectBox se altera-se as medidas*/
//** Vasco 10/11/2020 */

$(document).on('change', "#ndkcsfield_374", function () {
  var selectValeu = $(this).val();
  var selectValeuSplit = selectValeu.split(' ');
  //Portão Batente
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_383').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_383').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3890').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3890').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3891').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3891').trigger('change');
  //Portão Correr
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_373').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_373').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3892').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3892').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3893').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3893').trigger('change');
  //Portão porttilon
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_385').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_385').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3894').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3894').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3895').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3895').trigger('change');
});


$(document).on('click', "#dimension_text_width_383, #dimension_text_width_3890, #dimension_text_width_3891,  #dimension_text_width_373, #dimension_text_width_3892, #dimension_text_width_3893 ,  #dimension_text_width_385, #dimension_text_width_3894, #dimension_text_width_3895 ", function () {
  var selectValeu = $("#ndkcsfield_374").attr("data-selected");
  if (typeof selectValeu !== typeof undefined && selectValeu !== false) {
    $('#ndkcsfield_374').trigger('change');
  }
});

//** Las vegas -  Mostrar preço quando na selectBox se altera-se as medidas*/
//** Vasco 10/11/2020 */

$(document).on('change', "#ndkcsfield_461", function () {
  var selectValeu = $(this).val();
  var selectValeuSplit = selectValeu.split(' ');
  //Portão Batente
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_460').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_460').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3896').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3896').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3897').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3897').trigger('change');
  //Portão Correr
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_463').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_463').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3898').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3898').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3899').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3899').trigger('change');
  //Portão porttilon
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_465').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_465').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3900').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3900').trigger('change');
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3901').val(selectValeuSplit[0]);
  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_3901').trigger('change');
});


$(document).on('click', "#dimension_text_width_460, #dimension_text_width_3896, #dimension_text_width_3897,  #dimension_text_width_463, #dimension_text_width_3898, #dimension_text_width_3899,  #dimension_text_width_465, #dimension_text_width_3900, #dimension_text_width_3901 ", function () {
  var selectValeu = $("#ndkcsfield_461").attr("data-selected");
  if (typeof selectValeu !== typeof undefined && selectValeu !== false) {
    $('#ndkcsfield_461').trigger('change');
  }
});



// ***************************** Portõesescolher portillons ************************************
$(document).on('change', '#dimension_text_height_4682,#dimension_text_height_4780', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonBerlin());
});

$(document).on('change', '#dimension_text_height_4683,#dimension_text_height_4782', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonMunich());
});

$(document).on('change', '#dimension_text_height_4692,#dimension_text_height_4783', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonFrankfurt());
});

$(document).on('change', '#dimension_text_height_4698,#dimension_text_height_4784', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonHamburg());
});

$(document).on('change', '#dimension_text_height_4703,#dimension_text_height_4785', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonPotsdam());
});

$(document).on('change', '#dimension_text_height_4708,#dimension_text_height_4786', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonKoln());
});

$(document).on('change', '#dimension_text_height_4713,#dimension_text_height_4787', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonDresden());
});

$(document).on('change', '#dimension_text_height_4718,#dimension_text_height_4788', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonDortmund());
});

$(document).on('change', '#dimension_text_height_4724,#dimension_text_height_4790', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonEssen());
});

$(document).on('change', '#dimension_text_height_4730,#dimension_text_height_4791', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonStuttgart());
});

$(document).on('change', '#dimension_text_height_4734,#dimension_text_height_4792', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonNurnberg());
});

$(document).on('change', '#dimension_text_height_4739,#dimension_text_height_4793', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonBremen());
});

$(document).on('change', '#dimension_text_height_4744,#dimension_text_height_4794', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonHanover());
});

$(document).on('change', '#dimension_text_height_5221,#dimension_text_height_5224', function () {
  var selectValeu = $(this).val();

  PortailShowPortillon(selectValeu, ArrayShowPortillonLabel());
});


$(document).on('change', "li[data-group='2245']", function () {
  $("#ndkcsfield_2292").trigger('click');
});

$(document).on('change', "#ndk-accessory-quantity-1470, #ndk-accessory-quantity-1471, #ndk-accessory-quantity-1544", function () {
  var qtymotor = $(this).val();
  if (parseInt(qtymotor) > 1) {
    $(this).val(1);
    $(this).trigger('change');
  }
});

//Portão sur mersure motores

$(document).on('change', ".accessory-ndk[data-group='231'],  .accessory-ndk[data-group='242'] ", function () {
  var accessoryArray = [
    [1493, 1495],
    [1493, 13022],
    [1495, 1493],
    [1495, 13022],
    [13022, 1493],
    [13022, 1495],

    [1516, 1518],
    [1516, 6525],

    [1518, 1516],
    [1518, 6525],

    [6525, 1516],
    [6525, 1518],
  ]

  for (i = 0; i < accessoryArray.length; i++) {
    if (accessoryArray[i][0] == me.attr('data-id-value')) {
      RemoveSelectOptions(accessoryArray[i][1], me.attr('data-group'));
    }
  }
});

//Ocultar ou mostrar opção 1/3-2/3 nos portões batentes a medida
$(document).on('change', "#dimension_text_width_508, #dimension_text_width_5125, #dimension_text_width_5132, #dimension_text_width_5136, #dimension_text_width_4990, #dimension_text_width_5123, #dimension_text_width_5129, #dimension_text_width_5134, #dimension_text_width_5146, #dimension_text_width_2043, #dimension_text_width_5144, #dimension_text_width_2008, #dimension_text_width_5140, #dimension_text_width_5148, #dimension_text_width_394, #dimension_text_width_5200, #dimension_text_width_2036, #dimension_text_width_5142", function () {
  var groupf = 234;
  if ($(this).val() <= 3750) {
    ShowField(groupf);
    $("#ndkcsfield_234").removeClass("required_field");
  } else {
    //usada esta função para esconder, sem ser preciso remover classe selected-value
    RemoveField(groupf);
    updatePriceNdk(0, groupf);
    $('#ndkcsfield_' + groupf).val('');
  }
})
//-------
