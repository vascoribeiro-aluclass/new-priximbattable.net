
$(window).on("load", function () {
  RemoveField(5524);
  priceServicePoseGrilaage = $(".accessory-ndk[data-id-value='30786']").attr("data-price");

	/*
	 _______________________________________________________________________________________________________________________
	|                                          Remover a pre-visualização  clôture e brise vue                              |
	|_______________________________________________________________________________________________________________________|
	*/

	var aluclass_id_product_grillage_clot = ["13814","687","606"];
	if($.inArray(id_product, aluclass_id_product_grillage_clot) !== -1){
		var strval;
		$('option').each(function() {
			strval =$(this).val()
			if ( $(this).val() == "5X2m=10m"
			|| $(this).val() == "6X2m=12m"
			|| $(this).val() == "7X2m=14m"
			|| $(this).val() == "8X2m=16m"
			|| $(this).val() == "9X2m=18m"
			|| $(this).val() == "10X2m=20m"
			|| $(this).val() == "11X2m=22m"
			|| $(this).val() == "12X2m=24m"
			|| $(this).val() == "13X2m=26m"
			|| $(this).val() == "14X2m=28m"
			|| $(this).val() == "15X2m=30m"
			|| $(this).val() == "16X2m=32m"
			|| $(this).val() == "17X2m=34m"
			|| $(this).val() == "18X2m=36m"
			|| $(this).val() == "19X2m=38m"
			|| $(this).val() == "20X2m=40m"
			|| $(this).val() == "21X2m=42m"
			|| $(this).val() == "22X2m=44m"
			|| $(this).val() == "23X2m=46m"
			|| $(this).val() == "24X2m=48m"
			|| $(this).val() == "25X2m=50m" ) {
				$(this).remove();
			}
		});
    if(aluCustomization.length == 0){
      $('.dimension_text_width').prop("selectedIndex", -1);
      $('.dimension_text_height').prop("selectedIndex", -1);
    }
	}

	var aluclass_id_product_grillage_clot = ["640026","640027","640028","640029"];
	if($.inArray(id_product, aluclass_id_product_grillage_clot) !== -1){
		var strval;
		$('option').each(function() {
			strval =$(this).val()
			if ( $(this).val() == "2X2m=4m"
			|| $(this).val() == "3X2m=6m"
			|| $(this).val() == "4X2m=8m"
			|| $(this).val() ==  "2m") {
				$(this).remove();
			}
		});
    if(aluCustomization.length == 0){
      $('.dimension_text_width').prop("selectedIndex", -1);
      $('.dimension_text_height').prop("selectedIndex", -1);
    }
	}


	var aluclass_id_product = ["13814", "485", "687", "606", "1074", "190231", "190338", "190381","640026","640027","640028","640029","640124","640130"];

	if ($.inArray(id_product, aluclass_id_product) !== -1) {

		var aluclass_remove_preview = [];
    aluclass_remove_preview[1] = [126, 4797];
		aluclass_remove_preview[1].forEach(function (num) {
			$(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
		});
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [2722, 2728, 3055, 3066, 3067, 4147, 4159, 4160, 4161, 4162, 4163, 4164, 4165, 4166, 4167, 4168, 4169, 4170, 4215, 4216, 4217, 4218, 4219, 4220, 4221, 4222, 4223, 4224, 4225, 4226, 4227, 4228, 4229, 4230, 4231, 4232, 4233, 4234, 4235, 4236, 4237, 4238];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}


  	/*
	 _______________________________________________________________________________________________________________________
	|                                          Remover medidas de não ter                           |
	|_______________________________________________________________________________________________________________________|
	*/

	var aluclass_id_product_grillage_clot = ["640124"];
	if($.inArray(id_product, aluclass_id_product_grillage_clot) !== -1){
		var strval;
		$('option').each(function() {
			strval =$(this).val()
			if ( strval.indexOf(" 10m") >= 0
			|| strval.indexOf(" 12m") >= 0
			|| strval.indexOf(" 14m") >= 0
			|| strval.indexOf(" 16m") >= 0
			|| strval.indexOf(" 18m") >= 0
			|| strval.indexOf(" 20m") >= 0
			|| strval.indexOf(" 22m") >= 0
			|| strval.indexOf(" 24m") >= 0
			|| strval.indexOf(" 26m") >= 0
			|| strval.indexOf(" 28m") >= 0
			|| strval.indexOf(" 30m") >= 0
			|| strval.indexOf(" 32m") >= 0
			|| strval.indexOf(" 34m") >= 0
			|| strval.indexOf(" 36m") >= 0
			|| strval.indexOf(" 38m") >= 0
			|| strval.indexOf(" 40m") >= 0
			|| strval.indexOf(" 42m") >= 0
			|| strval.indexOf(" 44m") >= 0
			|| strval.indexOf(" 46m") >= 0
			|| strval.indexOf(" 48m") >= 0
			|| strval.indexOf(" 50m") >= 0  ) {
				$(this).remove();
			}
		});
    if(aluCustomization.length == 0){
      $('.dimension_text_width').prop("selectedIndex", -1);
      $('.dimension_text_height').prop("selectedIndex", -1);
    }
	}

	var aluclass_id_product_grillage_clot = ["640130"];
	if($.inArray(id_product, aluclass_id_product_grillage_clot) !== -1){
		var strval;
		$('option').each(function() {
			strval =$(this).val()
			if (  strval.indexOf(" 2m") >= 0
			|| strval.indexOf(" 4m") >= 0
			|| strval.indexOf(" 6m") >= 0
			|| strval.indexOf(" 8m") >= 0  ) {
				$(this).remove();
			}
		});
    if(aluCustomization.length == 0){
      $('.dimension_text_width').prop("selectedIndex", -1);
      $('.dimension_text_height').prop("selectedIndex", -1);
    }
	}

  //  Miguel - Remove o campo options duplicado ao carregar página KIT CLÔTURE PROMO
  var ID_Produto = []
  ID_Produto = ["13814","640026"];
  var fieldShow = [];
  fieldShow = ["2728", "4147"];

  if ($.inArray(id_product, ID_Produto) !== -1) {
    HideAllFields(fieldShow, "2728");
  }



});

function ChangePriceServicePose(valorNumResultado){

  if(parseInt(valorNumResultado) >= 24000){
    valorNumResultado = valorNumResultado / 1000;
    if ($(".accessory-ndk[data-id-value='30786']").hasClass("selected-accessory")) {
      $("#img_div_30786").trigger('click');
    }
    ShowField(5524);

    var priceServicePosefinal = (priceServicePoseGrilaage/1.2);
    priceServicePosefinal = parseFloat(priceServicePosefinal.toFixed(2)) * parseFloat(valorNumResultado);
    priceServicePosefinal = (priceServicePosefinal * 1.2);

    let servicepricedesc = priceServicePosefinal;
    serviceprice = priceServicePosefinal.toFixed(2).replace(/\./g, ",");
    servicepricedesc = servicepricedesc.toFixed(2).replace(/\./g, ",");
    $("#price_30786").html(' ' + serviceprice + '&nbsp;€ ');

    $(".accessory-ndk[data-id-value='30786']").data("price", parseFloat(priceServicePosefinal));
    $(".accessory-ndk[data-id-value='30786']").attr("data-price", parseFloat(priceServicePosefinal));
    $("#ndk-accessory-quantity-30786").data("price", parseFloat(priceServicePosefinal));
    $("#ndk-accessory-quantity-30786").attr("data-price", parseFloat(priceServicePosefinal));


  }else{
    if ($(".accessory-ndk[data-id-value='30786']").hasClass("selected-accessory")) {
      $("#img_div_30786").trigger('click');
    }
    RemoveField(5524);
    RemoveField(5525);
  }

}

/***********************************************************************************************************************
*                                                                                                                      *
*                                          PRODUTOS CLÔTURE                                            				         *
*                                                                                                                      *
************************************************************************************************************************
*/

$(document).on('change', "#ndkcsfield_2710, #ndkcsfield_4795", function () {

  let selectValeu = $(this).val();
  selectValeu = selectValeu.slice(4);
  selectValeu = selectValeu.replace(/\D/g, '');
  ChangePriceServicePose(parseInt(selectValeu)*1000);

});

$(document).on('change', "#ndkcsfield_2626", function () {
	let selectValeu = $(this).val();
  selectValeu = selectValeu.slice(4);
  selectValeu = selectValeu.replace(/\D/g, '');

	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_2577').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_2577').trigger('change');
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3944').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3944').trigger('change');
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3945').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3945').trigger('change');

  $('.ndkackFieldItem:visible > div > p > #dimension_text_height_5184').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5184').trigger('change');
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5185').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5185').trigger('change');
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5186').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5186').trigger('change');
});

$(document).on('change', '#dimension_text_height_2577, #dimension_text_height_3944, #dimension_text_height_3945 ', function () {

  var laminasArray = [
		[350, 2],
		[500, 3],
		[650, 4],
    [800, 5],
		[950, 6],
    [1100, 7],
		[1250, 8],
	];
  var valeuLag = $(this).val();

  for (i = 0; i < laminasArray.length; i++) {
    if( valeuLag <= laminasArray[i][0]){
      $(".clotureheight").text(laminasArray[i][1]);
      break;
    }
  }


});

$(document).on('click', ".img-value-4147[data-id-value='25712'], .img-value-4215[data-id-value='25866'], .img-value-4216[data-id-value='25868'], .img-value-4217[data-id-value='25870'], .img-value-4218[data-id-value='25872'], .img-value-4219[data-id-value='25874'], .img-value-4220[data-id-value='25876'], .img-value-4221[data-id-value='25878'], .img-value-4222[data-id-value='25880'], .img-value-4223[data-id-value='25882'], .img-value-4224[data-id-value='25884'], .img-value-4225[data-id-value='25886'], .img-value-4226[data-id-value='25888'], .img-value-4227[data-id-value='25890'], .img-value-4228[data-id-value='25892'], .img-value-4229[data-id-value='25894'], .img-value-4230[data-id-value='25896'], .img-value-4231[data-id-value='25898'], .img-value-4232[data-id-value='25900'], .img-value-4233[data-id-value='25902'], .img-value-4234[data-id-value='25904'], .img-value-4235[data-id-value='25906'], .img-value-4236[data-id-value='25908'], .img-value-4237[data-id-value='25910'], .img-value-4238[data-id-value='25912'], .img-value-2722[data-id-value='20526'], .img-value-2728[data-id-value='20543'], .img-value-4159[data-id-value='25738'], .img-value-4160[data-id-value='25740'], .img-value-4161[data-id-value='25742'], .img-value-4162[data-id-value='25744'], .img-value-4163[data-id-value='25746'], .img-value-4164[data-id-value='25748'], .img-value-4165[data-id-value='25750'], .img-value-4166[data-id-value='25752'],.img-value-4167[data-id-value='25754'],.img-value-4168[data-id-value='25756'],.img-value-4169[data-id-value='25758'],.img-value-4170[data-id-value='25760']", function () {
  //   if ($(".accessory-ndk[data-id-value='30786']").hasClass("selected-accessory")) {
  //     $("#img_div_30786").trigger('click');
  //   }
  // //   RemoveField(5524);
  // //   RemoveField(5525);
  console.log(' adasdas a d');
	$(".img-value-5525[data-id-value='30788']").trigger('click');

      var idFieldNDKAlu = 5524;
    $("img[data-group='" + idFieldNDKAlu + "']").removeClass("selected-value ");
    $("img[data-group='" + idFieldNDKAlu + "']").removeClass("selected-color");
    $("#ndkcsfield_" + idFieldNDKAlu + "").removeClass("required_field");
    $("#ndkcsfield_" + idFieldNDKAlu + "").val("");
    $("#visual_" + idFieldNDKAlu + "").remove();

    idFieldNDKAlu = 5525;
    $("img[data-group='" + idFieldNDKAlu + "']").removeClass("selected-value ");
    $("img[data-group='" + idFieldNDKAlu + "']").removeClass("selected-color");
    $("#ndkcsfield_" + idFieldNDKAlu + "").removeClass("required_field");
    $("#ndkcsfield_" + idFieldNDKAlu + "").val("");
    $("#visual_" + idFieldNDKAlu + "").remove();


});

// $(document).on('change', "#ndkcsfield_2634", function () {
// 	let selectValeu = $(this).val();
//   selectValeu = selectValeu.slice(4);
//   selectValeu = selectValeu.replace(/\D/g, '');

// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_2579').val(selectValeu);
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_2579').trigger('change');
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3948').val(selectValeu);
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3948').trigger('change');
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3949').val(selectValeu);
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_3949').trigger('change');

//   $('.ndkackFieldItem:visible > div > p > #dimension_text_height_5187').val(selectValeu);
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5187').trigger('change');
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5188').val(selectValeu);
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5188').trigger('change');
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5189').val(selectValeu);
// 	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_5189').trigger('change');
// });


$(document).on('change', "#ndkcsfield_2668", function () {
	let selectValeu = $(this).val();
  selectValeu = selectValeu.slice(4);
  selectValeu = selectValeu.replace(/\D/g, '');

	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_2665').val(selectValeu);
	$('.ndkackFieldItem:visible > div > p > #dimension_text_height_2665').trigger('change');

});

$(document).on('change', '#dimension_text_height_2665', function () {

  var laminasArray = [
		[1400, 9],
		[1550, 10],
		[1700, 11],
    [1850, 12],
		[2000, 13],
	];
  var valeuLag = $(this).val();

  for (i = 0; i < laminasArray.length; i++) {
    if( valeuLag <= laminasArray[i][0]){
      $(".clotureheight").text(laminasArray[i][1]);
      break;
    }
  }


});

$(document).on('change', '#dimension_text_height_2627, #dimension_text_height_2655', function () {

  var laminasArray = [
		[1300, 7],
		[1400, 8],
		[1500, 8],
    [1600, 9],
		[1700, 9],
    [1800, 10],
		[1900, 11],
    [2000, 11],

	];
  var valeuLag = $(this).val();

  for (i = 0; i < laminasArray.length; i++) {
    if( valeuLag <= laminasArray[i][0]){
      $(".clotureheight").text(laminasArray[i][1]);
      break;
    }
  }


});

$(document).on('change', '#dimension_text_width_2627, #dimension_text_width_2655, #dimension_text_width_2665', function () {

  var posteArray = [
    [2000, 2],
    [2500, 3],
    [3000, 3],
    [3500, 3],
    [4000, 3],
    [4500, 4],
    [5000, 4],
    [5500, 4],
    [6000, 4],
    [6500, 5],
    [7000, 5],
    [7500, 5],
    [8000, 5],
    [8500, 6],
    [9000, 6],
    [9500, 6],
    [10000, 6],
    [10500, 7],
    [11000, 7],
    [11500, 7],
    [12000, 7],
    [12500, 8],
    [13000, 8],
    [13500, 8],
    [14000, 8],
    [14500, 9],
    [15000, 9],
    [15500, 9],
    [16000, 9],
    [16500, 10],
    [17000, 10],
    [17500, 10],
    [18000, 10],
    [18500, 11],
    [19000, 11],
    [19500, 11],
    [20000, 11],

    [20500, 12],
    [21000, 12],
    [21500, 12],
    [22000, 12],
    [22500, 13],
    [23000, 13],
    [23500, 13],
    [24000, 13],
    [24500, 14],
    [25000, 14],
    [25500, 14],
    [26000, 14],
    [26500, 15],
    [27000, 15],
    [27500, 15],
    [28000, 15],
    [28500, 16],
    [29000, 16],
    [29500, 16],
    [30000, 16],

    [30500, 17],
    [31000, 17],
    [31500, 17],
    [32000, 17],
    [32500, 18],
    [33000, 18],
    [33500, 18],
    [34000, 18],
    [34500, 19],
    [35000, 19],
    [35500, 19],
    [36000, 19],
    [36500, 20],
    [37000, 20],
    [37500, 20],
    [38000, 20],
    [38500, 21],
    [39000, 21],
    [39500, 21],
    [40000, 21],

    [40500, 22],
    [41000, 22],
    [41500, 22],
    [42000, 22],
    [42500, 23],
    [43000, 23],
    [43500, 23],
    [44000, 23],
    [44500, 24],
    [45000, 24],
    [45500, 24],
    [46000, 24],
    [46500, 25],
    [47000, 25],
    [47500, 25],
    [48000, 25],
    [48500, 26],
    [49000, 26],
    [49500, 26],
    [50000, 26],
  ];

  var valeuLag = $(this).val();
  var valueInt = 26;
  var valorNumResultado = 0;
  for (i = 0; i < posteArray.length; i++) {
    if( valeuLag <= posteArray[i][0]){
      valueInt = posteArray[i][1] * 26;
      $(".cloturewidth").text(posteArray[i][1]);
      break;
    }
  }

  ChangePriceServicePose(valeuLag);
});
$(document).on('change', '#dimension_text_height_5187, #dimension_text_height_5188, #dimension_text_height_5189, #dimension_text_height_2579, #dimension_text_height_3948, #dimension_text_height_3949, #dimension_text_height_5184, #dimension_text_height_5185, #dimension_text_height_5186,#dimension_text_height_2574, #dimension_text_height_3946, #dimension_text_height_3947,#dimension_text_height_5181, #dimension_text_height_5182, #dimension_text_height_5183', function () {

  var laminasArray = [
		[400, 2],
		[500, 3],
		[600, 3],
    [700, 4],
		[800, 4],
    [900, 5],
		[1000, 6],
    [1100, 6],
		[1200, 7],

	];
  var valeuLag = $(this).val();

  for (i = 0; i < laminasArray.length; i++) {
    if( valeuLag <= laminasArray[i][0]){
      $(".clotureheight").text(laminasArray[i][1]);
      break;
    }
  }


});


$(document).on('change', '#dimension_text_width_5187, #dimension_text_width_5188, #dimension_text_width_5189, #dimension_text_width_2579, #dimension_text_width_3948, #dimension_text_width_3949, #dimension_text_width_5184, #dimension_text_width_5185, #dimension_text_width_5186,#dimension_text_width_2577, #dimension_text_width_3944, #dimension_text_width_3945, #dimension_text_width_2574, #dimension_text_width_3946, #dimension_text_width_3947,#dimension_text_width_5181, #dimension_text_width_5182, #dimension_text_width_5183', function () {

  var accessoryArray = [
		[2722, 20526],
		[2728, 20543],
		[4147, 25712],
		[4159, 25738],
		[4160, 25740],
		[4161, 25742],
		[4162, 25744],
		[4163, 25746],
		[4164, 25748],
		[4165, 25750],
		[4166, 25752],
		[4167, 25754],
		[4168, 25756],
		[4169, 25758],
		[4170, 25760],
		[4215, 25866],
		[4216, 25868],
		[4217, 25870],
		[4218, 25872],
		[4219, 25874],
		[4220, 25876],
		[4221, 25878],
		[4222, 25880],
		[4223, 25882],
		[4224, 25884],
		[4225, 25886],
		[4226, 25888],
		[4227, 25890],
		[4228, 25892],
		[4229, 25894],
		[4230, 25896],
		[4231, 25898],
		[4232, 25900],
		[4233, 25902],
		[4234, 25904],
		[4235, 25906],
		[4236, 25908],
		[4237, 25910],
		[4238, 25912],
		[2728, 20543],
		[4147, 25712],
	];

  var posteArray = [
		[2000, 2],
		[2500, 3],
		[3000, 3],
		[3500, 3],
		[4000, 3],
		[4500, 4],
		[5000, 4],
		[5500, 4],
		[6000, 4],
		[6500, 5],
		[7000, 5],
		[7500, 5],
		[8000, 5],
		[8500, 6],
		[9000, 6],
		[9500, 6],
		[10000, 6],
		[10500, 7],
		[11000, 7],
		[11500, 7],
		[12000, 7],
		[12500, 8],
		[13000, 8],
		[13500, 8],
		[14000, 8],
		[14500, 9],
		[15000, 9],
		[15500, 9],
		[16000, 9],
		[16500, 10],
		[17000, 10],
		[17500, 10],
		[18000, 10],
		[18500, 11],
		[19000, 11],
		[19500, 11],
		[20000, 11],

		[20500, 12],
		[21000, 12],
		[21500, 12],
		[22000, 12],
		[22500, 13],
		[23000, 13],
		[23500, 13],
		[24000, 13],
		[24500, 14],
		[25000, 14],
		[25500, 14],
		[26000, 14],
		[26500, 15],
		[27000, 15],
		[27500, 15],
		[28000, 15],
		[28500, 16],
		[29000, 16],
		[29500, 16],
		[30000, 16],

    [30500, 17],
		[31000, 17],
		[31500, 17],
		[32000, 17],
		[32500, 18],
		[33000, 18],
		[33500, 18],
		[34000, 18],
		[34500, 19],
		[35000, 19],
		[35500, 19],
		[36000, 19],
		[36500, 20],
		[37000, 20],
		[37500, 20],
		[38000, 20],
		[38500, 21],
		[39000, 21],
		[39500, 21],
    [40000, 21],

    [40500, 22],
		[41000, 22],
		[41500, 22],
		[42000, 22],
		[42500, 23],
		[43000, 23],
		[43500, 23],
		[44000, 23],
		[44500, 24],
		[45000, 24],
		[45500, 24],
		[46000, 24],
		[46500, 25],
		[47000, 25],
		[47500, 25],
		[48000, 25],
		[48500, 26],
		[49000, 26],
		[49500, 26],
		[50000, 26],
	];

  var valeuLag = $(this).val();
  var valueInt = 26;
  for (i = 0; i < posteArray.length; i++) {
    if( valeuLag <= posteArray[i][0]){
      valueInt = posteArray[i][1] * 26;
      $(".cloturewidth").text(posteArray[i][1]);
      break;
    }
  }

	valueInt = valueInt.toFixed(2);
	var valuestring = valueInt.replace('.', ',');
	for (i = 0; i < accessoryArray.length; i++) {
    var pricedesc = parseFloat(valuestring)-(parseFloat(valuestring)*valorReducao);
		$('#descriptionPrice_'+accessoryArray[i][1]).html('<i> + <s>'+valuestring+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
		$(".img-value-" + accessoryArray[i][0] + "[data-id-value='" + accessoryArray[i][1] + "']").attr('data-price', valueInt);
		if ($(".ndkackFieldItem[data-field='" + accessoryArray[i][0] + "']")) {
			$(".selected-value[data-id-value='" + accessoryArray[i][1] + "']").trigger('click');
		}
	}

    ChangePriceServicePose(valeuLag);
});



$(document).on('change', '#ndkcsfield_2637, #ndkcsfield_2619, #ndkcsfield_2628, #ndkcsfield_2710', function () {

	var accessoryArray = [
		[2722, 20526],
		[2728, 20543],
		[4147, 25712],
		[4159, 25738],
		[4160, 25740],
		[4161, 25742],
		[4162, 25744],
		[4163, 25746],
		[4164, 25748],
		[4165, 25750],
		[4166, 25752],
		[4167, 25754],
		[4168, 25756],
		[4169, 25758],
		[4170, 25760],
		[4215, 25866],
		[4216, 25868],
		[4217, 25870],
		[4218, 25872],
		[4219, 25874],
		[4220, 25876],
		[4221, 25878],
		[4222, 25880],
		[4223, 25882],
		[4224, 25884],
		[4225, 25886],
		[4226, 25888],
		[4227, 25890],
		[4228, 25892],
		[4229, 25894],
		[4230, 25896],
		[4231, 25898],
		[4232, 25900],
		[4233, 25902],
		[4234, 25904],
		[4235, 25906],
		[4236, 25908],
		[4237, 25910],
		[4238, 25912],
		[2728, 20543],
		[4147, 25712],
	];

	var valeuLag = $(this).val();
	var arrayValeuLag = valeuLag.split('m');
	if (arrayValeuLag[0] == '2') {
		var valueInt = ((arrayValeuLag[0] / 2) + 1) * 26;
	} else {
		var arrayValeuLag2 = arrayValeuLag[1].split('=');
		var valueInt = ((arrayValeuLag2[1] / 2) + 1) * 26;
	}
	valueInt = valueInt.toFixed(2);
	var valuestring = valueInt.replace('.', ',');
	for (i = 0; i < accessoryArray.length; i++) {
    var pricedesc = parseFloat(valuestring)-(parseFloat(valuestring)*valorReducao);
		$('#descriptionPrice_'+accessoryArray[i][1]).html('<i> + <s>'+valuestring+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
		$(".img-value-" + accessoryArray[i][0] + "[data-id-value='" + accessoryArray[i][1] + "']").attr('data-price', valueInt);
		if ($(".ndkackFieldItem[data-field='" + accessoryArray[i][0] + "']")) {
			$(".selected-value[data-id-value='" + accessoryArray[i][1] + "']").trigger('click');
		}
	}
});


/*
-----------------------------------------------------------------------------
*				KIT CLÔTURE PROMO  (controlo de visivilidade)                       *
-----------------------------------------------------------------------------
*/

//  Controlo de Campos de Cores para fazer parecer a option Correspondente
$(document).on('click', '.color-ndk', function () {
	var arrayColorPorte = []
	arrayColorPorte = ["125", "2713", "2714", "2715", "2716", "2717", "2718", "2719", "2720", "2721", "2870"];
	var fieldShow = [];
	fieldShow = ["2728", "4147"];
	var dataId = 0
	dataId = $(this).attr('data-group');

	if ($.inArray(dataId, arrayColorPorte) !== -1) {
		campoCor = $("li[data-group='" + dataId + "'].color-ndk.selected-value").data("value");

		if (campoCor.match(/7016/)) {
			HideAllFields(fieldShow, "2728");
		} else if (campoCor.match(/9016/)) {
			HideAllFields(fieldShow, "4147");
		}
	}
});




/*
 _______________________________________________________________________________________________________________________
|                                          CLÔTURE PLEINE KIT                                          				    |
|_______________________________________________________________________________________________________________________|
*/
$(document).on('click', ".color-ndk[data-group='2621']", function () {
  $('#ndkcsfield_2626').trigger('change');
});

// $(document).on('change', "#ndkcsfield_2619", function () {
// 	var typeCor = GetPergentageColor(2621);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2619', 'dimension_text_width_3944');
// 	} else if (typeCor == '8%') {
// 		ChangeSelectToSelect('ndkcsfield_2619', 'dimension_text_width_3945');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2619', 'dimension_text_width_2577');
// 	}
// });

// $(document).on('click', ".color-ndk[data-group='2621']", function () {
// 	var idValueFieldNDK = $('option:selected', '#ndkcsfield_2626').attr('data-id-value');
// 	if (typeof idValueFieldNDK !== "undefined") {
// 		RemoverCustomizedImagemNDK();
// 		CustomizedImagemNDK(2621, idValueFieldNDK, 'cloture_pleine', 1, "jpg");
// 	}
// 	var typeCor = GetPergentageColor(2621);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2626', 'dimension_text_height_3944');
// 		ChangeSelectToSelect('ndkcsfield_2619', 'dimension_text_width_3944');
// 	} else if (typeCor == '8%') {
// 		if (typeof idValueFieldNDK !== "undefined") {
// 			GlobalCustomizedImagemNDK('tag-autres-ral_old', 'tag_ndk', 5, 'png');
// 		}
// 		ChangeSelectToSelect('ndkcsfield_2626', 'dimension_text_height_3945');
// 		ChangeSelectToSelect('ndkcsfield_2619', 'dimension_text_width_3945');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2626', 'dimension_text_height_2577');
// 		ChangeSelectToSelect('ndkcsfield_2619', 'dimension_text_width_2577');
// 	}
// });

// $(document).on('change', "#ndkcsfield_2626", function () {
// 	var idValueFieldNDK = $('option:selected', this).attr('data-id-value');
// 	RemoverCustomizedImagemNDK();
// 	CustomizedImagemNDK(2621, idValueFieldNDK, 'cloture_pleine', 1, "jpg");

// 	var typeCor = GetPergentageColor(2621);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2626', 'dimension_text_height_3944');
// 	} else if (typeCor == '8%') {
// 		GlobalCustomizedImagemNDK('tag-autres-ral_old', 'tag_ndk', 5, 'png');
// 		ChangeSelectToSelect('ndkcsfield_2626', 'dimension_text_height_3945');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2626', 'dimension_text_height_2577');
// 	}
// });


/*
 _______________________________________________________________________________________________________________________
|                                          CLÔTURE AJOURÉE KIT                                          				|
|_______________________________________________________________________________________________________________________|
*/

// $(document).on('change', "#ndkcsfield_2637", function () {
// 	var typeCor = GetPergentageColor(2641);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2637', 'dimension_text_width_3946');
// 	} else if (typeCor == '8%') {
// 		ChangeSelectToSelect('ndkcsfield_2637', 'dimension_text_width_3947');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2637', 'dimension_text_width_2574');
// 	}
// });

// $(document).on('click', ".color-ndk[data-group='2641']", function () {
// 	var idValueFieldNDK = $('option:selected', '#ndkcsfield_2638').attr('data-id-value');
// 	if (typeof idValueFieldNDK !== "undefined") {
// 		RemoverCustomizedImagemNDK();
// 		CustomizedImagemNDK(2641, idValueFieldNDK, 'cloture_ajouree', 1, "jpg");
// 	}
// 	var typeCor = GetPergentageColor(2641);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2638', 'dimension_text_height_3946');
// 		ChangeSelectToSelect('ndkcsfield_2637', 'dimension_text_width_3946');
// 	} else if (typeCor == '8%') {
// 		if (typeof idValueFieldNDK !== "undefined") {
// 			GlobalCustomizedImagemNDK('tag-autres-ral_old', 'tag_ndk', 5, 'png');
// 		}
// 		ChangeSelectToSelect('ndkcsfield_2638', 'dimension_text_height_3947');
// 		ChangeSelectToSelect('ndkcsfield_2637', 'dimension_text_width_3947');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2638', 'dimension_text_height_2574');
// 		ChangeSelectToSelect('ndkcsfield_2637', 'dimension_text_width_2574');
// 	}
// });

// $(document).on('change', "#ndkcsfield_2638", function () {
// 	var idValueFieldNDK = $('option:selected', this).attr('data-id-value');
// 	RemoverCustomizedImagemNDK();
// 	CustomizedImagemNDK(2641, idValueFieldNDK, 'cloture_ajouree', 1, "jpg");

// 	var typeCor = GetPergentageColor(2641);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2638', 'dimension_text_height_3946');
// 	} else if (typeCor == '8%') {
// 		GlobalCustomizedImagemNDK('tag-autres-ral_old', 'tag_ndk', 5, 'png');
// 		ChangeSelectToSelect('ndkcsfield_2638', 'dimension_text_height_3947');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2638', 'dimension_text_height_2574');
// 	}
// });


/*
 _______________________________________________________________________________________________________________________
|                                          CLÔTURE PRE KIT                                          				|
|_______________________________________________________________________________________________________________________|
*/
// $(document).on('change', "#ndkcsfield_2628", function () {
// 	var typeCor = GetPergentageColor(2631);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2628', 'dimension_text_width_3948');
// 	} else if (typeCor == '8%') {
// 		ChangeSelectToSelect('ndkcsfield_2628', 'dimension_text_width_3949');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2628', 'dimension_text_width_2579');
// 	}
// });

// $(document).on('click', ".color-ndk[data-group='2631']", function () {
// 	var idValueFieldNDK = $('option:selected', '#ndkcsfield_2634').attr('data-id-value');
// 	if (typeof idValueFieldNDK !== "undefined") {
// 		RemoverCustomizedImagemNDK();
// 		CustomizedImagemNDK(2631, idValueFieldNDK, 'cloture_persiennee', 1, "jpg");
// 	}
// 	var typeCor = GetPergentageColor(2631);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2634', 'dimension_text_height_3948');
// 		ChangeSelectToSelect('ndkcsfield_2628', 'dimension_text_width_3948');
// 	} else if (typeCor == '8%') {
// 		if (typeof idValueFieldNDK !== "undefined") {
// 			GlobalCustomizedImagemNDK('tag-autres-ral_old', 'tag_ndk', 5, 'png');
// 		}
// 		ChangeSelectToSelect('ndkcsfield_2634', 'dimension_text_height_3949');
// 		ChangeSelectToSelect('ndkcsfield_2628', 'dimension_text_width_3949');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2634', 'dimension_text_height_2579');
// 		ChangeSelectToSelect('ndkcsfield_2628', 'dimension_text_width_2579');
// 	}
// });

// $(document).on('change', "#ndkcsfield_2634", function () {
// 	var idValueFieldNDK = $('option:selected', this).attr('data-id-value');
// 	RemoverCustomizedImagemNDK();
// 	CustomizedImagemNDK(2631, idValueFieldNDK, 'cloture_persiennee', 1, "jpg");

// 	var typeCor = GetPergentageColor(2631);
// 	if (typeCor == '5%') {
// 		ChangeSelectToSelect('ndkcsfield_2634', 'dimension_text_height_3948');
// 	} else if (typeCor == '8%') {
// 		GlobalCustomizedImagemNDK('tag-autres-ral_old', 'tag_ndk', 5, 'png');
// 		ChangeSelectToSelect('ndkcsfield_2634', 'dimension_text_height_3949');
// 	} else {
// 		ChangeSelectToSelect('ndkcsfield_2634', 'dimension_text_height_2579');
// 	}
// });


/*
 _______________________________________________________________________________________________________________________
|                                          CLÔTURE PROMO KIT                                          					|
|_______________________________________________________________________________________________________________________|
*/

$(document).on('change', "#ndkcsfield_2710", function () {
	ChangeSelectToSelect('ndkcsfield_2710', 'dimension_text_width_126');
	$('.img-value-2729').trigger('click');
});

$(document).on('change', "#ndkcsfield_2712", function () {
	ChangeSelectToSelect('ndkcsfield_2712', 'dimension_text_height_126');
});


/*
 _______________________________________________________________________________________________________________________
|                                          CLÔTURE PROMO KIT Panneau                                          					|
|_______________________________________________________________________________________________________________________|
*/

$(document).on('change', "#ndkcsfield_4795", function () {
	ChangeSelectToSelect('ndkcsfield_4795', 'dimension_text_width_4797');
	$('.img-value-2729').trigger('click');
});

$(document).on('change', "#ndkcsfield_4796", function () {
	ChangeSelectToSelect('ndkcsfield_4796', 'dimension_text_height_4797');
});

// --------- Fim clôture  -----------

// ------- Inicio Brise Vue ---------

// $(document).on('change', "#ndkcsfield_2646", function () {
// 	ChangeSelectToSelect('ndkcsfield_2646', 'dimension_text_width_2627');
// });

// $(document).on('change', '#ndkcsfield_2647', function () {
// 	ChangeSelectToSelect('ndkcsfield_2647', 'dimension_text_height_2627');
// });

// $(document).on('change', "#ndkcsfield_2666", function () {
// 	ChangeSelectToSelect('ndkcsfield_2666', 'dimension_text_width_2665');
// });

// $(document).on('change', '#ndkcsfield_2668', function () {
// 	ChangeSelectToSelect('ndkcsfield_2668', 'dimension_text_height_2665');
// });

// $(document).on('change', "#ndkcsfield_2657", function () {
// 	ChangeSelectToSelect('ndkcsfield_2657', 'dimension_text_width_2655');
// });

// $(document).on('change', '#ndkcsfield_2658', function () {
// 	ChangeSelectToSelect('ndkcsfield_2658', 'dimension_text_height_2655');
// });

// -------- Fim Brise Vue ----------


//Poteau Aluminium 150x150 mm Sur Mesure
$('#dimension_text_width_3501').attr('placeholder', 'Hauteur');
$('#dimension_text_width_4312').attr('placeholder', 'Hauteur');
$('#dimension_text_width_4313').attr('placeholder', 'Hauteur');



// insere valor 1 para a altura (campo oculto) Poteau aluminium 150x150 sur mesure
$(document).on('change', '#dimension_text_width_3501', function () {
      $('#dimension_text_height_3501').val('1');
});

$(document).on('change', '#dimension_text_width_4312', function () {
  $('#dimension_text_height_4312').val('1');
});

$(document).on('change', '#dimension_text_width_4313', function () {
  $('#dimension_text_height_4313').val('1');
});
