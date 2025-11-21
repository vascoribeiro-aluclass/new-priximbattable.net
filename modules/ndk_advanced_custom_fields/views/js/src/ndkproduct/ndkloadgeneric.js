//** vasco aluclass  funcionalidades ndk apos carregamento da pagina     */
$(window).on("load", function () {


	$("div[data-id-value='16918']").removeClass('disabled_value_by');
	$("img[data-id-value='16918']").removeClass('disabled_value_by');
	$("div[data-id-value='16919']").addClass('disabled_value_by');
	$("img[data-id-value='16919']").addClass('disabled_value_by');
	$("div[data-id-value='16920']").addClass('disabled_value_by');
	$("img[data-id-value='16920']").addClass('disabled_value_by');
	$("div[data-id-value='17486']").addClass('disabled_value_by');
	$("img[data-id-value='17486']").addClass('disabled_value_by');
	$("div[data-id-value='17487']").addClass('disabled_value_by');
	$("img[data-id-value='17487']").addClass('disabled_value_by');


  /*var name_product = $(".h1").html();
	var product_array = name_product.split(" ");*/
	// $("#dataentrega").html('Sous 35 jours ouvrés'); //$("#dataentrega").html('Sous 20 jours ouvrés'); //** verificar se um porduto é a medida ou não para aplica a garantia */
	// product_array.forEach(function (ele) {
	// 	if (ele.toUpperCase() == 'MESURE') {
	// 		$("#dataentrega").html('Sous 35 jours ouvrés'); //$("#dataentrega").html('Sous 20 jours ouvrés');
	// 	}
	// });




	//** alexandre remove first field from the hauteur Augmentation array */
	/*	var aluclass_id_product = ["166"];
		if($.inArray(id_product, aluclass_id_product) !== -1){
			$("#dimension_text_height_2861").prepend("<option value='' selected='selected'>Selectionner</option>");
			$("#dimension_text_width_2861").prepend("<option value='' selected='selected'>Selectionner</option>");
			if(("#dimension_text_width_2861 <option value='' selected='selected'>Sélectionner</option>") != ("#dimension_text_height_2861 option[value='']"))
				$("#dimension_text_height_2861 option[value='']").remove(); //removes blanks within option
		}*/



	//** remover a pre-visualização porta acordião */
	var aluclass_id_product = ["554793", "554798"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [4401, 4391, 4386, 4402, 4438, 4410];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}


	//** remover a fecho de pergola*/
	var aluclass_id_product = ["943", "946", "1282", "1285", "1288", "29274", "29275", "29276"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [2873, 2874, 3751, 3763, 3761, 3767, 3784, 3790];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}


	//++ remove field Couleur du toile Pergola toile et */
	var aluclass_id_product = ["1529", "1535", "1538", "1532"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$("div[data-field='3102']").addClass("disable-field-ndk");
	}


	//** increase font size on box chevaux product */
	$(document).ready(function () {
		$("#descriptionimg_24313,#descriptionimg_24312,#descriptionimg_22505, #descriptionimg_22565, #descriptionimg_22506,#descriptionimg_24311,#descriptionimg_22510,#descriptionimg_24310,#descriptionimg_24839,#descriptionimg_24840,#descriptionimg_24866,#descriptionimg_24867,#descriptionimg_24863,#descriptionimg_24862,#descriptionimg_24874,#descriptionimg_24875,#descriptionimg_24908,#descriptionimg_24909,#descriptionimg_24920,#descriptionimg_24921").css("fontSize", "12px");
		$("#descriptionimg_22506 + i").css("fontSize", "12px");
		$("#descriptionimg_24311 + i").css("fontSize", "12px");
		$("#descriptionimg_22510 + i").css("fontSize", "12px");
		$("#descriptionimg_24310 + i").css("fontSize", "12px");
		$("#descriptionimg_24312 + i").css("fontSize", "12px");
		$("#descriptionimg_24313 + i").css("fontSize", "12px");
		$("#descriptionimg_24840 + i").css("fontSize", "12px");
		$("#descriptionimg_24867 + i").css("fontSize", "12px");
		$("#descriptionimg_24863 + i").css("fontSize", "12px");
		$("#descriptionimg_24875 + i").css("fontSize", "12px");
		$("#descriptionimg_24909 + i").css("fontSize", "12px");
		$("#descriptionimg_24921 + i").css("fontSize", "12px");
	});


});
