$(window).on("load", function () {

  var aluclass_janelas = ["640194","640196","640197","640198","640199","640195","640200","640201","640202","640203","640204","640205"]; //**  remover a pre-visualização de N campos do ndk janelas*/
	if ($.inArray(id_product, aluclass_janelas) !== -1) {

    var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [5003,5011,5012,5010,5029,5025,5033,5037,5044,5048,5052,5056];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
		aluclass_remove_preview[1] = [5006,5026,5030,5034,5038,5041,5039,5040,5045,5049,5053,5057];
		aluclass_remove_preview[1].forEach(function (num) {
			$(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
		});

    $(".img-value-28795").trigger('click');
    $(".img-value-28850").trigger('click');
    $(".img-value-28857").trigger('click');
    $(".img-value-28864").trigger('click');
    $(".img-value-28871").trigger('click');
    $(".img-value-28873").trigger('click');
    $(".img-value-28874").trigger('click');
    $(".img-value-28872").trigger('click');

    $(".img-value-28881").trigger('click');
    $(".img-value-28888").trigger('click');
    $(".img-value-28895").trigger('click');
    $(".img-value-28902").trigger('click');
	}

});
//f 1 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5009").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5009']", function () {
	$("#visual_5009").removeClass("disable-field-ndk");
});

//f 2 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_4996").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='4996']", function () {
	$("#visual_4996").removeClass("disable-field-ndk");
});
//f 3 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5007").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5007']", function () {
	$("#visual_5007").removeClass("disable-field-ndk");
});
//f 4 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5008").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5008']", function () {
	$("#visual_5008").removeClass("disable-field-ndk");
});

//PF 1 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5024").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5024']", function () {
	$("#visual_5024").removeClass("disable-field-ndk");
});

//PF 2 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5028").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5028']", function () {
	$("#visual_5028").removeClass("disable-field-ndk");
});

//PF 3 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5036").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5036']", function () {
	$("#visual_5036").removeClass("disable-field-ndk");
});

//PF 4 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5032").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5032']", function () {
	$("#visual_5032").removeClass("disable-field-ndk");
});

//Store F 1 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5043").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5043']", function () {
	$("#visual_5043").removeClass("disable-field-ndk");
});

//Store F 2 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5047").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5047']", function () {
	$("#visual_5047").removeClass("disable-field-ndk");
});

//Store F 3 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5051").addClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='5051']", function () {
	$("#visual_5051").removeClass("disable-field-ndk");
});

//Store F 4 PVC/
$(document).on('click', '.ndkackFieldItem', function () {
  $("#visual_5055").addClass("disable-field-ndk");
});


$(document).on('click', "div[data-field='5055']", function () {
	$("#visual_5055").removeClass("disable-field-ndk");
});
// dimension PVC 1
$(document).on('focusout', ".dimension_text_5021", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28814']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28814').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  // $('#descriptionPrice_28814').text(' + ' + precoTotal + ' €');
  $(".img-value-5010.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28812,"pregentage":50,"type":"color"},'
      +'{"idfield":28836,"pregentage":15,"type":"check"},'
      +'{"idfield":29202,"pregentage":15,"type":"check"},'
      +'{"idfield":28837,"pregentage":15,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});
// dimension PVC 2
$(document).on('focusout', ".dimension_text_4997", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28785']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28785').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5003.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28748,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});
// dimension PVC 3
$(document).on('focusout', ".dimension_text_5018", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28816']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28816').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5011.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28808,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});
// dimension PVC 4

$(document).on('focusout', ".dimension_text_5019", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28818']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28818').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5012.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28810,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

// dimension PVC 1
$(document).on('focusout', ".dimension_text_5023", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28848']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28848').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5025.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28846,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

// dimension PVC 2
$(document).on('focusout', ".dimension_text_5027", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28855']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28855').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5029.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28853,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});


// dimension PVC 3
$(document).on('focusout', ".dimension_text_5031", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28862']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28862').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5033.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28860,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

// dimension PVC 4
$(document).on('focusout', ".dimension_text_5035", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28869']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28869').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5037.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28867,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

//Store Fenetro PVC

//Store dimension PVC 1
$(document).on('focusout', ".dimension_text_5042", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28879']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28879').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5044.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28877,"pregentage":50,"type":"color"},'
      +'{"idfield":28836,"pregentage":15,"type":"check"},'
      +'{"idfield":29202,"pregentage":15,"type":"check"},'
      +'{"idfield":28837,"pregentage":15,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

//Store dimension PVC 2
$(document).on('focusout', ".dimension_text_5046", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28886']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28886').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5048.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28884,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});


//Store dimension PVC 3
$(document).on('focusout', ".dimension_text_5050", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28893']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28893').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5052.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28891,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

//Store dimension PVC 4
$(document).on('focusout', ".dimension_text_5054", function () { // tapee

  var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();

  var precosableverre = $("img[data-id-value='28900']").data('price');
  precoTotal = (CalculoPVCsWindows(precosableverre, height, width, false)).toFixed(2);
  var pricedesc = precoTotal-(precoTotal*valorReducao);
  $('#descriptionPrice_28900').html('<i> + <s>'+precoTotal+' €</s><span style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</span></i>');
  $(".img-value-5056.selected-value").trigger('click');

  var croisillons = $(".img-value-5001");
  AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE);
  $(".img-value-5001.selected-value").trigger('click');

  if (widthPE != null && heightPE != null) {
    $.ajax({
      type: "GET",
      async: true,
      url: baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php?action=getRangePricefield',
      data: { width: widthPE, height: heightPE, group: groupvalue, id_product: $("#ndkcf_id_product").val(),
      precentageuser: '[{"idfield":28898,"pregentage":50,"type":"color"},'
       +'{"idfield":28764,"pregentage":10,"type":"check"},'
      +'{"idfield":29203,"pregentage":10,"type":"check"},'
      +'{"idfield":28765,"pregentage":10,"type":"check"},'
      +'{"idfield":28769,"pregentage":3,"type":"check"},'
      +'{"idfield":28770,"pregentage":5,"type":"check"},'
      +'{"idfield":28771,"pregentage":9,"type":"check"},'
      +'{"idfield":28772,"pregentage":9,"type":"check"},'
      +'{"idfield":28830,"pregentage":11,"type":"check"}]' },
      success: function (data) {
        const objdata = JSON.parse(data);
        objdata.forEach(function (e) {
          switch(e.type){
            case 'color' :
              var stringtitle = $("li[data-id-value='"+e.idfield+"']").attr('title');
              var idfielddate = $("li[data-id-value='"+e.idfield+"']").attr('data-group');
              $("li[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("li[data-id-value='"+e.idfield+"'] > center > i").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("li[data-id-value='"+e.idfield+"'].selected-value").trigger('click');
            break;
            case 'check' :
              var stringtitle = $("input[data-id-value='"+e.idfield+"']").val();
              var idfielddate = $("input[data-id-value='"+e.idfield+"']").attr('data-group');
              $("input[data-id-value='"+e.idfield+"']").attr('data-price',e.price.toFixed(2));
              var pricedesc = e.price-(e.price*valorReducao);
              $("label[for=radio_" + idfielddate +"_"+ e.idfield + "]").html('<i>'+stringtitle+' : + <s>'+e.price.toFixed(2)+' €</s></i><i style="color: var(--red);"> '+pricedesc.toFixed(2)+' €</i>');
              $("input[type='radio'][name='ndkcsfield["+idfielddate+"]']:checked").trigger('change');
            break;
          }
        });

      }
    });
  }

});

$(document).on('click', ".img-value-5001", function () {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLaile = $(this).data('price');
			CalculoPVCsWindows(precoMLaile, height, width, true);
		}
});
// verre PVC 2
$(document).on('click', ".img-value-5003", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});
// verre PVC 3
$(document).on('click', ".img-value-5011", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});
// verre PVC 4
$(document).on('click', ".img-value-5012", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});
// verre PVC 1
$(document).on('click', ".img-value-5010", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});

// Porte  verre PVC 1
$(document).on('click', ".img-value-5026", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});

// Porte  verre PVC 2
$(document).on('click', ".img-value-5029", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});


// Porte  verre PVC 3
$(document).on('click', ".img-value-5033", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});

// Porte  verre PVC 3
$(document).on('click', ".img-value-5037", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});



// Store  verre PVC 1
$(document).on('click', ".img-value-5044", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});

// Store  verre PVC 2
$(document).on('click', ".img-value-5048", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});


// Store  verre PVC 3
$(document).on('click', ".img-value-5052", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});

// Store  verre PVC 3
$(document).on('click', ".img-value-5056", function () {
  if (typeof width !== 'undefined' && typeof height !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoPVCsWindows(precoMLaile, height, width, true);
  }
});
