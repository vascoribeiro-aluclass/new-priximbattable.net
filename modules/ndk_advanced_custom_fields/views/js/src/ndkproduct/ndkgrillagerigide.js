var priceServicePoseGrilaage = 0;
$(window).on("load", function () {

  RemoveField(5524);
  priceServicePoseGrilaage = $(".accessory-ndk[data-id-value='30786']").attr("data-price");
	// $("li[data-id-value='12478'] center").html("<i>Vert RAL 6005 <div style='color: red; font-size: 12px;'>-10%</div></i>");
	// $("li[data-id-value='16207'] center").html("<i>Vert RAL 6005 <div style='color: red; font-size: 12px;'>-10%</div></i>");
	// $("li[data-id-value='16210'] center").html("<i>Vert RAL 6005 <div style='color: red; font-size: 12px;'>-10%</div></i>");

  //Grillage campo portillon resertar valores e meter um valor pre-definido.
	var arrayGrillageProductPortillonId = []
  arrayGrillageProductPortillonId = ["640146","640144","640142","640145","640143","640141","48485", "68667", "68627", "640023", "640024", "640025", "640216", "640217"];
	if ($.inArray(id_product, arrayGrillageProductPortillonId) !== -1) {
		var arrayPortllon = {
			"1025": 27292,
			"1225": 27293,
			"1525": 27294,
			"1725": 27295,
			"1925": 27295,
		}

		$.each(arrayPortllon,function( index,value ) {
			$("li[data-id-value='" + value + "']").hide();
		});

		$("li[data-id-value='27292']").show();
	}


/*
 _______________________________________________________________________________________________________________________
|                                           Grillage rigide                                                             |
|_______________________________________________________________________________________________________________________|
*/

var aluclass_id_product_grillage_or = ["640145","640143","640141","48485","68627","68667","640033","640034","640035", "640216"];
if($.inArray(id_product, aluclass_id_product_grillage_or) !== -1){
	var strval;
	$('option').each(function() {
		strval =$(this).val()
		if ( strval.indexOf(" 35m ") >= 0
    || strval.indexOf(" 37,5m ") >= 0
		|| strval.indexOf(" 40m ") >= 0
    || strval.indexOf(" 42,5m ") >= 0
		|| strval.indexOf(" 45m ") >= 0
    || strval.indexOf(" 47,5m ") >= 0
		|| strval.indexOf(" 50m ") >= 0
    || strval.indexOf(" 52,5m ") >= 0
		|| strval.indexOf(" 55m ") >= 0
    || strval.indexOf(" 57,5m ") >= 0
		|| strval.indexOf(" 60m ") >= 0
    || strval.indexOf(" 62,5m ") >= 0
		|| strval.indexOf(" 65m ") >= 0
    || strval.indexOf(" 67,5m ") >= 0
		|| strval.indexOf(" 70m ") >= 0
    || strval.indexOf(" 72,5m ") >= 0
		|| strval.indexOf(" 75m ") >= 0
    || strval.indexOf(" 77,5m ") >= 0
		|| strval.indexOf(" 80m ") >= 0
    || strval.indexOf(" 82,5m ") >= 0
		|| strval.indexOf(" 85m ") >= 0
    || strval.indexOf(" 87,5m ") >= 0
		|| strval.indexOf(" 90m ") >= 0
    || strval.indexOf(" 92,5m ") >= 0
		|| strval.indexOf(" 95m ") >= 0
    || strval.indexOf(" 97,5m ") >= 0
		|| strval.indexOf(" 100m ") >= 0
    || strval.indexOf(" 102,5m ") >= 0
		|| strval.indexOf(" 105m ") >= 0
    || strval.indexOf(" 107,5m ") >= 0
		|| strval.indexOf(" 110m ") >= 0
    || strval.indexOf(" 112,5m ") >= 0
		|| strval.indexOf(" 115m ") >= 0
    || strval.indexOf(" 117,5m ") >= 0
		|| strval.indexOf(" 120m ") >= 0) {
			$(this).remove();

		}
	});
 if(aluCustomization.length == 0){
	$('.dimension_text_width').prop("selectedIndex", 0);
	$('.dimension_text_height').prop("selectedIndex", 0);
 }

}

var aluclass_id_product_grillage_or = ["640146","640144","640142","640023","640024","640025","640056","640067", "640217"];
if($.inArray(id_product, aluclass_id_product_grillage_or) !== -1){
	var strval;
	$('option').each(function() {
		strval =$(this).val()
		if ( strval.indexOf(" 5m ") >= 0
    || strval.indexOf(" 7,5m ") >= 0
		|| strval.indexOf(" 10m ") >= 0
    || strval.indexOf(" 12,5m ") >= 0
		|| strval.indexOf(" 15m ") >= 0
    || strval.indexOf(" 17,5m ") >= 0
		|| strval.indexOf(" 20m ") >= 0
    || strval.indexOf(" 22,5m ") >= 0
		|| strval.indexOf(" 25m ") >= 0
    || strval.indexOf(" 27,5m ") >= 0
		|| strval.indexOf(" 30m ") >= 0
    || strval.indexOf(" 32,5m ") >= 0 )  {
			$(this).remove();
		}
	});

  if(aluCustomization.length == 0){
    $('.dimension_text_width').prop("selectedIndex", 0);
    $('.dimension_text_height').prop("selectedIndex", 0);
  }
}

});

// ***************************** GRILLAGE  ************************************


$(document).on('change', '#dimension_text_width_2738, #dimension_text_width_2737, #dimension_text_width_2736, #dimension_text_width_2735, #dimension_text_width_1396, #dimension_text_width_1395, #dimension_text_width_1388, #dimension_text_width_1387,#dimension_text_width_2709, #dimension_text_width_2708, #dimension_text_width_1366, #dimension_text_width_1365, #dimension_text_width_2685, #dimension_text_width_1370,  #dimension_text_width_1368, #dimension_text_width_2087, #dimension_text_width_2686, #dimension_text_width_2687, #dimension_text_width_2692, #dimension_text_width_2693', function () {
  if ($(".accessory-ndk[data-id-value='30786']").hasClass("selected-accessory")) {
    $("#img_div_30786").trigger('click');
  }
  RemoveField(5524);
  RemoveField(5525);
});

$(document).on('change', '#dimension_text_width_1371,#dimension_text_width_1379,#dimension_text_width_2688,#dimension_text_width_2689,#dimension_text_width_1394,#dimension_text_width_1393,#dimension_text_width_2740,#dimension_text_width_2739,#dimension_text_width_1364,#dimension_text_width_2707', function () {

  var selectValeu = $(this).val();

  var valorNum = selectValeu.match(/(\d+(?:,\d+)?)/);
  var valorNumResultado = valorNum ? valorNum[0].replace(',', '.') : null;

  if(parseInt(valorNumResultado) > 24){
    if ($(".accessory-ndk[data-id-value='30786']").hasClass("selected-accessory")) {
      $("#img_div_30786").trigger('click');
    }
    ShowField(5524);

    priceServicePoseGrilaage = (priceServicePoseGrilaage/1.2);

    var priceServicePosefinal = parseFloat(priceServicePoseGrilaage.toFixed(2)) * parseFloat(valorNumResultado);
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


});


// ***************************** GRILLAGE ************************************
$(document).on('change', '#dimension_text_height_2738, #dimension_text_height_2737, #dimension_text_height_2736, #dimension_text_height_2735, #dimension_text_height_1396, #dimension_text_height_1395, #dimension_text_height_1388, #dimension_text_height_1387, #dimension_text_height_2740, #dimension_text_height_2739, #dimension_text_height_1394, #dimension_text_height_1393,#dimension_text_height_2709, #dimension_text_height_2708, #dimension_text_height_1366, #dimension_text_height_1365,#dimension_text_height_2707, #dimension_text_height_1364, #dimension_text_height_2685, #dimension_text_height_1370, #dimension_text_height_1371, #dimension_text_height_1368, #dimension_text_height_1379, #dimension_text_height_2688, #dimension_text_height_2689, #dimension_text_height_2087, #dimension_text_height_2686, #dimension_text_height_2687, #dimension_text_height_2692, #dimension_text_height_2693', function () {

	var  selectValeu = $(this).val();
	var arrayPortllon = {
		"1025": 27292,
		"1225": 27293,
		"1525": 27294,
		"1725": 27295,
		"1925": 27295,
	}

	$.each(arrayPortllon,function( index,value ) {
		$("li[data-id-value='" + value + "']").hide();
		RemoveAllOrtherSelectOptions(value, 4655);
	});

	$("li[data-id-value='" + arrayPortllon[selectValeu.substring(0, 4)] + "']").show();
});
