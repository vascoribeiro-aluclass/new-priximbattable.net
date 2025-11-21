$(window).on("load", function () {

  	//** remover a pre-visualização Verrière*/
	var aluclass_id_product = ["13534", "12327", "12326", "13402"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [2679, 2605, 3905, 3906, 3907, 3908, 3909];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}

});

/*
************************************************************************************************************************
*                                                                                                                      *
*                                          PRODUTOS VERRIèRES                                          				   *
*                                                                                                                      *
************************************************************************************************************************
*/

$(document).on('change',"#ndk-accessory-quantity-24684, #ndk-accessory-quantity-24758, #ndk-accessory-quantity-24770", function () {
	var quantverr = $(this).val();
	var dataIdValue = $(this).attr('data-id-value');
	$("#quantity_wanted").val(quantverr);
	$("p[data-name='ndkcsfield["+dataIdValue+"]']").remove();
	$(".form-group[data-field='"+dataIdValue+"']").css('background', '#FFFFFF').focus();
	VerreireLimitOptionOpen("24725",quantverr,"3676");
	VerreireLimitOptionOpen("24703",quantverr,"3683");
	VerreireLimitOptionOpen("24704",quantverr,"3684");
	VerreireLimitOptionOpen("24759",quantverr,"3712");
	VerreireLimitOptionOpen("24760",quantverr,"3713");
	VerreireLimitOptionOpen("24761",quantverr,"3714");
	VerreireLimitOptionOpen("24771",quantverr,"3719");
	VerreireLimitOptionOpen("24772",quantverr,"3720");
	VerreireLimitOptionOpen("24773",quantverr,"3721");
});


/*
*********************************************************
verrière acier Sur mesure
Vasco 24/11/2020
*********************************************************
*/

$(document).on('change', "#dimension_text_width_2604, #dimension_text_height_2604", function () {
	widthPE = $('#dimension_text_width_2604').val();
	heightPE = $('#dimension_text_height_2604').val();
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		var AreaPE = parseFloat((widthPE/1000)) * parseFloat((heightPE/1000));

		var precoTotal = parseFloat(AreaPE) * 39.55;
		$('label[for=radio_2603_20165]').text(' Verre sablé 33² feuilleté : + ' + (precoTotal).toFixed(2) + ' €');
		$('#radio_2603_20165:checked').trigger('change');
	}
});


$(document).on('change', "input[type='radio'][name='ndkcsfield[2603]']", function () {
	widthPE = $('#dimension_text_width_2604').val();
	heightPE = $('#dimension_text_height_2604').val();
	if (typeof width !== 'undefined' && typeof height !== 'undefined') {
		precoTotal = $(this).data('price');
		console.log(precoTotal);
		if(parseInt(precoTotal) == 0){
			updatePriceNdk(0, 2603);
		}else{
			var AreaPE = parseFloat((widthPE/1000)) * parseFloat((heightPE/1000));
			var precoTotal = parseFloat(AreaPE) * 39.55;

			//var precoMLaile = $("input[type='radio'][name='ndkcsfield[3940]']:checked").data('price');
			updatePriceNdk((precoTotal).toFixed(2), 2603);
		}

	}
});
