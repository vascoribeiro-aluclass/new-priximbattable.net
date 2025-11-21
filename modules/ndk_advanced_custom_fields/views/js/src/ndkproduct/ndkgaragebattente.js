$(window).on("load", function () {
  $(".form-group[data-field='5439']").removeClass("aluclass-disable-div");
  $('#ndk-accessory-quantity-30505').val(0);

  var aluclass_id_product = ["2128", "10975", "1689", "13665", "19426", "19428", "2031", "7612", "13648", "43148", "43150", "3205", "3208", "12235", "12239", "12231", "43715"]; //** remover a pre-visualização de N campos do ndk */
	if ($.inArray(id_product, aluclass_id_product) !== -1) {

		var aluclass_remove_preview = [];

		aluclass_remove_preview[12231] = [743, 744, 737, 920, 781];
		aluclass_remove_preview[12235] = [759, 760, 895, 791, 787];
		aluclass_remove_preview[12239] = [775, 777, 917, 796, 794];

		aluclass_remove_preview[3205] = [743];
		aluclass_remove_preview[3208] = [743, 744, 802, 803, 804, 805, 806, 807, 808, 809, 831, 737, 782, 792, 821, 822, 823, 824, 825, 826, 827, 828, 829, 920, 781, 780];
		aluclass_remove_preview[43148] = [759, 760, 896, 897, 898, 899, 900, 901, 902, 903, 904, 789, 793, 830, 851, 852, 853, 854, 855, 856, 857, 858, 895, 791, 787, 779];
		aluclass_remove_preview[43150] = [775, 777, 906, 907, 908, 909, 910, 911, 912, 913, 914, 798, 799, 885, 886, 887, 888, 889, 890, 891, 892, 893, 917, 796, 794, 784];

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


// Aluclass NFI (Ogliano @ aluclass[point]dev[at]gmail.com) - Calculo para tapee e aile
$(document).on('click', '.img-value-793, .img-value-782,.img-value-821,.img-value-822,.img-value-823,.img-value-824,.img-value-825,.img-value-826,.img-value-827,' +
	'.img-value-828,.img-value-829,.img-value-789,.img-value-830,.img-value-851,.img-value-852,.img-value-853,.img-value-890,.img-value-891,.img-value-892,' +
	'.img-value-855,.img-value-856,.img-value-857,.img-value-858,.img-value-798,.img-value-799,.img-value-885,.img-value-886,.img-value-887,.img-value-888,.img-value-889,' +
	'.img-value-893,.img-value-792', function () {
		// // decoracao - site pt
		var aluclass_id_decor_porta = ["793", "782", "821", "822", "823", "824", "824", "825", "826", "827", "828", "829", "830", "789", "851", "852", "853", "890", "891", "892", "855", "856", "857", "858"
			, "798", "799", "885", "886", "887", "888", "889", "893", "792"]; /* decoracao por porta site pt */
		var aluclass_id_prod_com_decor = ["3208", "43148", "43150"];  /* id dos produtos de decoracao */

		// decoracao
		if ($.inArray(group, aluclass_id_decor_porta) !== -1) {
			if ($.inArray(id_product, aluclass_id_prod_com_decor) !== -1) {
				var price = 0;
				if ($('#price_779').length && price < 1) {
					price = $('#price_779').val();
				}
				if ($('#price_780').length && price < 1) {
					price = $('#price_780').val();
				}
				if ($('#price_784').length && price < 1) {
					price = $('#price_784').val();
				}
				var qtd_folha = $(this).data('quantity-available');
				var atualiza_price = qtd_folha * price;
				atualiza_price = atualiza_price - price;
				updatePriceNdk(atualiza_price, group);
			}
		}
	});
