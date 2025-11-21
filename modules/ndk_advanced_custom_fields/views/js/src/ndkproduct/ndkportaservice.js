$(window).on("load", function () {
  $(".form-group[data-field='5442']").removeClass("aluclass-disable-div");
  $('#ndk-accessory-quantity-30509').val(0);

  var aluclass_id_product = ["3427", "3430"]; //** remover a pre-visualização de N campos do ndk */
	if ($.inArray(id_product, aluclass_id_product) !== -1) {

		var aluclass_remove_preview = [];

		//portas de Serviço
		aluclass_remove_preview[3427] = [921, 934, 916];
		aluclass_remove_preview[43715] = [921, 934, 916, 923];
		aluclass_remove_preview[3430] = [921, 934, 926, 927, 928, 929, 930, 931, 932, 933, 934, 935, 923, 916,4146,4148, 4149, 4150, 4151, 4152, 4153, 4154, 4155, 4156, 4157, 4158, 4207, 4208, 4209, 4210, 4211, 4212, 4213, 4214];

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

/*
*********************************************************
Porta de serviço
Vasco 20/11/2020 - Calculo do tape e aile
*********************************************************
*/
// ----------------- Calculo Aile Or Tapee-----------------
$(document).on('change', "input[type='radio'][name='ndkcsfield[746]']", function () { // tapee
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var precoMLtapee = $("input[type='radio'][name='ndkcsfield[746]']:checked").data('price'); //$(this).find(':checked').data('price'); //$("input:checked").data('price');;
		CalculoAileOrTapee(precoMLtapee, height, width, true);
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[3940]']", function () { // Aile
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var precoMLaile = $("input[type='radio'][name='ndkcsfield[3940]']:checked").data('price');
		CalculoAileOrTapee(precoMLaile, height, width, true);
	}
});

// ----------------- Alterar preços  Aile Or Tapee-----------------
$(document).on('focusout', '#dimension_text_width_4144, #dimension_text_height_4144, #dimension_text_width_4145, #dimension_text_height_4145, #dimension_text_width_922, #dimension_text_height_922 ', function () {
	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_'+groupvalue).val();
	var heightPE = $('#dimension_text_height_'+groupvalue).val();
	var options = $("input[type='radio'][name='ndkcsfield[3940]']");
	AlterPriceSelect('ndkcsfield_3940', options, heightPE, widthPE);
	var options = $("input[type='radio'][name='ndkcsfield[746]']");
	AlterPriceSelect('ndkcsfield_746', options, heightPE, widthPE);
});
