$(window).on("load", function () {


	var aluclass_janelas = ["229", "30198", "30188", "29035", "19806", "29115", "29117", "76670", "29133", "29135", "29138", "29136", "29590", "29243", "29243", "29591", "29616", "30203", "30176", "29592", "29593", "29594", "29617", "30656", "30664", "35522"]; //**  remover a pre-visualização de N campos do ndk janelas*/
	if ($.inArray(id_product, aluclass_janelas) !== -1) {
		//janela 2 folhas
		// remove campo vidro janela que abre a direita
		RemoveField('1437');
		// remove campo vidro janela que abre a esquedra
		RemoveField('3193');
		// remove campo vidro janela que abre os duas
		ShowField('3194');
		//janela 3 folhas
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3211');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3210');
		// remove campo vidro janela que abre as três janelas
		ShowField('2521');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3235');
		//janela 4 folhas
		// remove campo vidro janela que abre 4
		ShowField('2525');
		// remove campo vidro janela que abre 2
		RemoveField('3229');
		//janela 3 folhas triplo vidro
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3215');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3214');
		// remove campo vidro janela que abre as três janelas
		RemoveField('3228');
		// remove campo vidro janela que abre as três janelas 2
		ShowField('3238');
		var aluclass_remove_preview = [];
		//janela de batenete 1 folha
		aluclass_remove_preview[29035] = [1429, 1428, 1427, 1426, 1425, 1424, 1407, 1406, 702, 1434];
		//janela de batenete 2 folha
		aluclass_remove_preview[19806] = [3194, 3193, 1437, 1483, 3181, 3182, 3183, 3184, 3185, 3186, 3187, 3188, 3189, 3190, 3233];
		//janela de batenete 3 folha
		aluclass_remove_preview[29115] = [3211, 3210, 2521, 3198, 3199, 3200, 3201, 3202, 3203, 3204, 3205, 3206, 3207, 3209, 3232, 3235];
		//janela de batenete 4 folha
		aluclass_remove_preview[29117] = [2531, 3217, 3218, 3219, 3220, 3221, 3222, 3223, 3224, 3225, 3226, 3227, 2525, 3229];
		//janela de batenete 4 folha
		aluclass_remove_preview[76670] = [3131, 3155, 3156, 3157, 3158, 3160, 3161, 3162, 3163, 3164, 3214, 3215, 3228, 3238, 3237, 3216];
		//janela de batente porta 1 folha
		aluclass_remove_preview[29133] = [3242, 3256, 3252, 3255];
		//janela de batente porta 2 folha
		aluclass_remove_preview[29135] = [3269, 3278, 3279, 3263, 3274, 3275, 707];
		//janela de batente porta 4 folha
		aluclass_remove_preview[29138] = [3299, 3309, 3310, 3311, 3312, 3313, 3298, 3307, 709];
		//janela de batente porta 3 folha
		aluclass_remove_preview[29136] = [3326, 3340, 3341, 3342, 3345, 3346, 3347, 3348, 3349, 3325, 3331, 3332, 708];
		//janela de corrente 3 folha
		aluclass_remove_preview[29590] = [3317, 3318, 3339, 3320];
		//janela de corrente 2 folha
		aluclass_remove_preview[29243] = [3282, 3281, 3280];
		//janela de corrente 4 folha
		aluclass_remove_preview[29591] = [3352];
		//janela de corrente 6 folha
		aluclass_remove_preview[29616] = [3355];
		//janela cintree 1 folha
		aluclass_remove_preview[30188] = [3450, 3455, 3456, 3465, 3467, 3467, 3472, 3390, 3473];
		//janela porta cintree 1 folha
		aluclass_remove_preview[30203] = [3398, 3399, 3417, 3418, 3419, 3420, 3402, 3405];
		//janela cintree 2 folha
		aluclass_remove_preview[30176] = [3444, 3445, 3446, 3447, 3453, 3454, 3448, 3449];
		//janela porta cintree 2 folha
		aluclass_remove_preview[30198] = [3462, 3466, 3469, 3468, 3470, 3471, 3463, 3464];
		//Porta janela de corrente 2 folha
		aluclass_remove_preview[29592] = [715, 3356, 3357];
		//Porta janela de corrente 3 folha
		aluclass_remove_preview[29593] = [716, 3366, 3367, 3368];
		//Porta janela de corrente 4 folha
		aluclass_remove_preview[29594] = [3385];
		//Porta janela de corrente 6 folha
		aluclass_remove_preview[29617] = [3396];
		//janela  triangulaire
		aluclass_remove_preview[30656] = [3437];
		//janela  Soufflet
		aluclass_remove_preview[30664] = [661];
		//janela  rectangulaire
		aluclass_remove_preview[35522] = [3428];
		//janela de corrente 2 folha stantard
		aluclass_remove_preview[229] = [3280];

		if (aluclass_remove_preview.hasOwnProperty(id_product)) {
			aluclass_remove_preview[id_product].forEach(function (num) {
				$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
			});
		}
		aluclass_remove_preview[1] = [1478, 1482, 1479];
		aluclass_remove_preview[1].forEach(function (num) {
			$(".form-group[data-field='" + num + "']").addClass("disable-field-ndk");
		});
	}

});

/*
  -----------------------  Inicio das Janelas ----------------------------------------
 Autor :: Vasco
 Altera no Codigo por causa das Janelas

 HideNDKFieldError(group);
ShowNDKFieldError(group,message);

*/


/*
 _______________________________________________________________________________________________________________________
|                                          Porte-Fenêtre e Fenêtre cintrée                                          	|
|_______________________________________________________________________________________________________________________|
*/
// Porte-Fenêtre aluminium cintrée - Inicio
$(document).on('change', '#text_3089, #text_3101', function () {

	var idFieldNDKArry = TextHeightLateral();

	var heightPE = $(".ndkackFieldItem:visible > div > p > .dimension_text_height").val();
	var dimensionTextHeight = $(this).val();

	AlertMedidaJanelaCintree(heightPE, dimensionTextHeight, idFieldNDKArry[id_product]);
});

$(document).on('change', '#dimension_text_height_4112,#dimension_text_height_4113,#dimension_text_height_4114,#dimension_text_height_4115,#dimension_text_height_4116,#dimension_text_height_4117,#dimension_text_height_4030,#dimension_text_height_4103,#dimension_text_height_4104,#dimension_text_height_4105,#dimension_text_height_4106,#dimension_text_height_4107, #dimension_text_height_4098 ,#dimension_text_height_4099,#dimension_text_height_4100,#dimension_text_height_4101,#dimension_text_height_4102, #dimension_text_height_4092, #dimension_text_height_4093, #dimension_text_height_4094, #dimension_text_height_4095, #dimension_text_height_4096, #dimension_text_height_677, #dimension_text_height_678, #dimension_text_height_655', function () {
	var heightPE = $(this).val();
	var dimensionTextHeightLateral = [];
	dimensionTextHeightLateral[30188] = "#text_3089"; // Fenêtre aluminium cintrée 1 vantail à rupture de pont thermique sur mesure
	dimensionTextHeightLateral[30203] = "#text_3089"; // Porte-Fenêtre aluminium cintrée 1 vantail à rupture de pont thermique sur mesure
	dimensionTextHeightLateral[30176] = "#text_3101"; // Fenêtre aluminium cintrée 2 vantaux à rupture de pont thermique sur mesure
	dimensionTextHeightLateral[30198] = "#text_3101"; // Porte-Fenêtre aluminium cintrée 2 vantaux à rupture de pont thermique sur mesure

	var idFieldNDKArry = TextHeightLateral();

	var dimensionTextHeight = $(dimensionTextHeightLateral[id_product]).val();
	AlertMedidaJanelaCintree(heightPE, dimensionTextHeight, idFieldNDKArry[id_product]);
});


// Porte-Fenêtre aluminium cintrée - fim

//janelas

// # janelas batentes
// # janelas batentes 3 folhas

$(document).on('click', '.img-value-3232, .img-value-3198, .img-value-3199, .img-value-3200, .img-value-3201, .img-value-3202, .img-value-3203, .img-value-3204, .img-value-3205, .img-value-3206, .img-value-3207, .img-value-3209', function () {

	var openThreeArray = [];
	openThreeArray = ["22746", "22750", "22649", "22653", "22641", "22645", "22633", "22637", "22625", "22629", "22617", "22621", "22658", "22662", "22609", "22613", "22601", "22605", "22593", "22597", "22585", "22589", "22580", "22576"];

	var openThreeArray2 = [];
	openThreeArray2 = ["22745", "22749", "22648", "22652", "22640", "22644", "22632", "22636", "22624", "22628", "22616", "22620", "22657", "22661", "22608", "22612", "22600", "22604", "22592", "22596", "22584", "22588", "22581", "22577"];

	var openTwoLeftArray = [];
	openTwoLeftArray = ["22748", "22752", "22651", "22655", "22643", "22647", "22635", "22639", "22627", "22631", "22619", "22623", "22660", "22664", "22611", "22615", "22603", "22607", "22595", "22599", "22587", "22591", "22583", "22579"];

	var openTwoRightArray = [];
	openTwoRightArray = ["22747", "22751", "22650", "22654", "22642", "22646", "22634", "22638", "22626", "22630", "22618", "22622", "22659", "22663", "22610", "22614", "22602", "22606", "22594", "22598", "22586", "22590", "22582", "22578"];
	if ($.inArray($(this).attr('data-id-value'), openThreeArray2) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3211');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3210');
		// remove campo vidro janela que abre as três janelas
		RemoveField('2521');
		// remove campo vidro janela que abre as três janelas 2
		ShowField('3235');
	}
	if ($.inArray($(this).attr('data-id-value'), openThreeArray) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3211');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3210');
		// remove campo vidro janela que abre as três janelas
		ShowField('2521');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3235');
	}
	if ($.inArray($(this).attr('data-id-value'), openTwoLeftArray) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3211');
		// remove campo vidro janela que abre a janela da esquedra
		ShowField('3210');
		// remove campo vidro janela que abre as três janelas
		RemoveField('2521');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3235');
	}

	if ($.inArray($(this).attr('data-id-value'), openTwoRightArray) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		ShowField('3211');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3210');
		// remove campo vidro janela que abre as três janelasjque
		RemoveField('2521');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3235');
	}
});
// # janelas batentes 3 folhas vidro triplo

$(document).on('click', '.img-value-3131, .img-value-3155, .img-value-3156, .img-value-3157, .img-value-3158, .img-value-3160, .img-value-3161, .img-value-3162, .img-value-3163, .img-value-3164, .img-value-3216, .img-value-3237', function () {

	var openThreeArray = [];
	openThreeArray = ["22767", "22771", "22454", "22458", "22446", "22450", "22438", "22442", "22430", "22434", "22422", "22426", "22680", "22684", "22406", "22410", "22398", "22402", "22390", "22394", "22310", "22252", "22385", "22381"];

	var openThreeArray2 = [];
	openThreeArray2 = ["22766", "22770", "22453", "22457", "22445", "22449", "22437", "22441", "22429", "22433", "22421", "22425", "22679", "22683", "22405", "22409", "22398", "22401", "22389", "22393", "22309", "22251", "22386", "22382"];

	var openTwoLeftArray = [];
	openTwoLeftArray = ["22769", "22773", "22456", "22460", "22448", "22452", "22440", "22444", "22432", "22436", "22424", "22428", "22682", "22679", "22408", "22412", "22400", "22404", "22392", "22396", "22312", "22277", "22388", "22384"];

	var openTwoRightArray = [];
	openTwoRightArray = ["22768", "22772", "22455", "22459", "22447", "22451", "22439", "22443", "22431", "22435", "22423", "22427", "22681", "22685", "22411", "22407", "22399", "22403", "22391", "22395", "22311", "22276", "22387", "22383"];

	if ($.inArray($(this).attr('data-id-value'), openThreeArray2) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3215');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3214');
		// remove campo vidro janela que abre as três janelas
		RemoveField('3228');
		// remove campo vidro janela que abre as três janelas 2
		ShowField('3238');
	}
	if ($.inArray($(this).attr('data-id-value'), openThreeArray) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3215');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3214');
		// remove campo vidro janela que abre as três janelas
		ShowField('3228');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3238');
	}
	if ($.inArray($(this).attr('data-id-value'), openTwoLeftArray) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		RemoveField('3215');
		// remove campo vidro janela que abre a janela da esquedra
		ShowField('3214');
		// remove campo vidro janela que abre as três janelas
		RemoveField('3228');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3238');
	}

	if ($.inArray($(this).attr('data-id-value'), openTwoRightArray) !== -1) {
		// remove campo vidro janela que abre a janela da direita
		ShowField('3215');
		// remove campo vidro janela que abre a janela da esquedra
		RemoveField('3214');
		// remove campo vidro janela que abre as três janelasjque
		RemoveField('3228');
		// remove campo vidro janela que abre as três janelas 2
		RemoveField('3238');
	}
});
// # janelas batentes 2 folhas

$(document).on('click', '.img-value-3233, .img-value-3181, .img-value-1483, .img-value-3182, .img-value-3183, .img-value-3184, .img-value-3185, .img-value-3186, .img-value-3187, .img-value-3188, .img-value-3189, .img-value-3190', function () {

	var openTwoArray = [];
	openTwoArray = ["22753", "22754", "22561", "22562", "22557", "22558", "22553", "22554", "22549", "22550", "22545", "22546", "22541", "22542", "22537", "22538", "22534", "22529", "22530", "22526", "22525", "13133", "13132"];

	var openLeftArray = [];
	openLeftArray = ["22756", "22523", "22564", "22560", "22556", "22552", "22548", "22544", "22540", "22536", "22532", "22528"];

	var openRightArray = [];
	openRightArray = ["22755", "22521", "22563", "22559", "22555", "22551", "22547", "22543", "22539", "22535", "22531", "22527"];


	if ($.inArray($(this).attr('data-id-value'), openTwoArray) !== -1) {
		// remove campo vidro janela que abre a direita
		RemoveField('1437');
		// remove campo vidro janela que abre a esquedra
		RemoveField('3193');
		// remove campo vidro janela que abre os duas
		ShowField('3194');
	}
	if ($.inArray($(this).attr('data-id-value'), openLeftArray) !== -1) {
		// remove campo vidro janela que abre a direita
		RemoveField('1437');
		// remove campo vidro janela que abre a esquedra
		ShowField('3193');
		// remove campo vidro janela que abre os duas
		RemoveField('3194');
	}

	if ($.inArray($(this).attr('data-id-value'), openRightArray) !== -1) {
		// remove campo vidro janela que abre a direita
		ShowField('1437');
		// remove campo vidro janela que abre a esquedra
		RemoveField('3193');
		// remove campo vidro janela que abre os duas
		RemoveField('3194');
	}
});

// # janelas batentes 4 folhas

$(document).on('click', '.img-value-3217, .img-value-2531, .img-value-3218, .img-value-3219, .img-value-3220, .img-value-3221, .img-value-3222, .img-value-3223, .img-value-3224, .img-value-3225, .img-value-3226, .img-value-3227', function () {

	var openFourArray = [];
	openFourArray = ["22690", "22689", "19722", "19721", "22694", "22693", "22698", "22697", "22702", "22701", "22706", "22705", "22710", "22709", "22714", "22713", "22718", "22717", "22722", "22721", "22726", "22725", "22730", "22729"];

	var openTwoArray = [];
	openTwoArray = ["22691", "22692", "22687", "22688", "22695", "22696", "22699", "22700", "22703", "22704", "22707", "22708", "22711", "22712", "22715", "22716", "22719", "22720", "22723", "22724", "22727", "22728", "22731", "22732"];


	if ($.inArray($(this).attr('data-id-value'), openFourArray) !== -1) {
		// remove campo vidro janela que abre 4
		ShowField('2525');
		// remove campo vidro janela que abre 2
		RemoveField('3229');
	}
	if ($.inArray($(this).attr('data-id-value'), openTwoArray) !== -1) {
		// remove campo vidro janela que abre 4
		RemoveField('2525');
		// remove campo vidro janela que abre 2
		ShowField('3229');
	}


});


$(document).on('click', '.ndkackFieldItem', function () {
	$("#visual_1341").addClass("disable-field-ndk");
	$("#visual_1385").addClass("disable-field-ndk");
	$("#visual_1384").addClass("disable-field-ndk");
	$("#visual_1383").addClass("disable-field-ndk");
	$("#visual_1410").addClass("disable-field-ndk");
	$("#visual_1341").addClass("disable-field-ndk");
	$("#visual_1443").addClass("disable-field-ndk");
	$("#visual_1446").addClass("disable-field-ndk");
	$("#visual_1475").addClass("disable-field-ndk");
	$("#visual_1474").addClass("disable-field-ndk");
	$("#visual_3117").addClass("disable-field-ndk");
	$("#visual_3251").addClass("disable-field-ndk");
	$("#visual_3262").addClass("disable-field-ndk");

	$("#visual_3295").addClass("disable-field-ndk");
	$("#visual_3302").addClass("disable-field-ndk");

	$("#visual_3323").addClass("disable-field-ndk");
	$("#visual_3329").addClass("disable-field-ndk");
	$("#visual_3337").addClass("disable-field-ndk");

	$("#visual_3272").addClass("disable-field-ndk");
	$("#visual_3273").addClass("disable-field-ndk");

	$("#visual_3308").addClass("disable-field-ndk");
	$("#visual_3319").addClass("disable-field-ndk");
	$("#visual_3267").addClass("disable-field-ndk");
	$("#visual_3474").addClass("disable-field-ndk");
	$("#visual_3354").addClass("disable-field-ndk");

	$("#visual_3351").addClass("disable-field-ndk");
	$("#visual_3360").addClass("disable-field-ndk");
	$("#visual_3476").addClass("disable-field-ndk");

	$("#visual_3364").addClass("disable-field-ndk");
	$("#visual_3480").addClass("disable-field-ndk");
	$("#visual_3482").addClass("disable-field-ndk");
	$("#visual_3387").addClass("disable-field-ndk");
	$("#visual_3394").addClass("disable-field-ndk");

	$("#visual_3436").addClass("disable-field-ndk");
	$("#visual_3452").addClass("disable-field-ndk");
	$("#visual_3432").addClass("disable-field-ndk");
	$("#visual_3478").addClass("disable-field-ndk");
});

// 4 folhas/
$(document).on('click', "div[data-field='1475']", function () {
	$("#visual_1475").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='1474']", function () {
	$("#visual_1474").removeClass("disable-field-ndk");
});

// 4 folhas porta/
$(document).on('click', "div[data-field='3295']", function () {
	$("#visual_3295").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='3302']", function () {
	$("#visual_3302").removeClass("disable-field-ndk");
});

// 4 folhas battente/
$(document).on('click', "div[data-field='3351']", function () {
	$("#visual_3351").removeClass("disable-field-ndk");
});

// 3 folhas/
$(document).on('click', "div[data-field='1385']", function () {
	$("#visual_1385").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='1384']", function () {
	$("#visual_1384").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='1383']", function () {
	$("#visual_1383").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='3117']", function () {
	$("#visual_3117").removeClass("disable-field-ndk");
});

// 3 folhas porta/
$(document).on('click', "div[data-field='3323']", function () {
	$("#visual_3323").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='3329']", function () {
	$("#visual_3329").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='3337']", function () {
	$("#visual_3337").removeClass("disable-field-ndk");
});

// 3 folhas porta Bantente/
$(document).on('click', "div[data-field='3308']", function () {
	$("#visual_3308").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='3319']", function () {
	$("#visual_3319").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3478']", function () {
	$("#visual_3478").removeClass("disable-field-ndk");
});


// 1 folha

$(document).on('click', "div[data-field='1410']", function () {
	$("#visual_1410").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='1341']", function () {
	$("#visual_1341").removeClass("disable-field-ndk");
});


// 1 folha porta

$(document).on('click', "div[data-field='3251']", function () {
	$("#visual_3251").removeClass("disable-field-ndk");
});

// 1 folha de correr

$(document).on('click', "div[data-field='3267']", function () {
	$("#visual_3267").removeClass("disable-field-ndk");
});


// 2 folha


$(document).on('click', "div[data-field='1443']", function () {
	$("#visual_1443").removeClass("disable-field-ndk");
});

$(document).on('click', "div[data-field='1446']", function () {
	$("#visual_1446").removeClass("disable-field-ndk");
});

// 2 folha porta

$(document).on('click', "div[data-field='3262']", function () {
	$("#visual_3262").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3272']", function () {
	$("#visual_3272").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3273']", function () {
	$("#visual_3273").removeClass("disable-field-ndk");
});

// 2 folha battente
$(document).on('click', "div[data-field='3267']", function () {
	$("#visual_3267").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3474']", function () {
	$("#visual_3474").removeClass("disable-field-ndk");
});

// Porta 2 folha battente
$(document).on('click', "div[data-field='3360']", function () {
	$("#visual_3360").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3476']", function () {
	$("#visual_3476").removeClass("disable-field-ndk");
});
// Porta 3 folha battente
$(document).on('click', "div[data-field='3364']", function () {
	$("#visual_3364").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3480']", function () {
	$("#visual_3480").removeClass("disable-field-ndk");
});
$(document).on('click', "div[data-field='3482']", function () {
	$("#visual_3482").removeClass("disable-field-ndk");
});
// 6 folhas battente/
$(document).on('click', "div[data-field='3354']", function () {
	$("#visual_3354").removeClass("disable-field-ndk");
});
// Porta 4 folhas battente/
$(document).on('click', "div[data-field='3387']", function () {
	$("#visual_3387").removeClass("disable-field-ndk");
});

// Porta 6 folhas battente/
$(document).on('click', "div[data-field='3394']", function () {
	$("#visual_3394").removeClass("disable-field-ndk");
});


// triangulaire

$(document).on('click', "div[data-field='3436']", function () {
	$("#visual_3436").removeClass("disable-field-ndk");
});

// Soufflet

$(document).on('click', "div[data-field='3452']", function () {
	$("#visual_3452").removeClass("disable-field-ndk");
});

// rectangulaire

$(document).on('click', "div[data-field='3432']", function () {
	$("#visual_3432").removeClass("disable-field-ndk");
});

var aluclass_id_field_type = [];
aluclass_id_field_type[29243] = ["J"];
aluclass_id_field_type[29590] = ["J"];
aluclass_id_field_type[29591] = ["J"];
aluclass_id_field_type[29616] = ["J"];
aluclass_id_field_type[29592] = ["P"];
aluclass_id_field_type[29593] = ["P"];
aluclass_id_field_type[29594] = ["P"];
aluclass_id_field_type[29617] = ["P"];
aluclass_id_field_type[29035] = ["J"];
aluclass_id_field_type[19806] = ["J"];
aluclass_id_field_type[29115] = ["J"];
aluclass_id_field_type[29117] = ["J"];
aluclass_id_field_type[29133] = ["P"];
aluclass_id_field_type[29135] = ["P"];
aluclass_id_field_type[29136] = ["P"];
aluclass_id_field_type[29138] = ["P"];
aluclass_id_field_type[30664] = ["J"];
aluclass_id_field_type[30656] = ["J"];
aluclass_id_field_type[35522] = ["J"];
aluclass_id_field_type[554793] = ["P"];
aluclass_id_field_type[554798] = ["P"];



// tapee e aile
//var aluclass_id_field_tapee = ["660","746"];
//var aluclass_id_field_aile = ["665"];
//var aluclass_id_product_windows = ["19806","29035","29243","29592"];
var aluclass_id_product_windows = ["29243", "29590", "29591", "29616", "29592", "29593", "29594", "29617", "29115", "29117"];
var aluclass_id_product_windows_new = ["29035", "19806", "29115", "29117", "76670", "29135", "29136", "29138", "29133"];
var aluclass_id_product_windows_fixe = ["35522", "30664", "30656"];
var aluclass_id_product_windows_acorddeon = ["554793", "554798"];

$(document).on('focusout', '.dimension_text_width, .dimension_text_height', function () {
	if ($.inArray(id_product, aluclass_id_product_windows_acorddeon) !== -1) {
		var groupvalue = $(this).attr('data-group');
		var widthPE = $('#dimension_text_width_' + groupvalue).val();
		var heightPE = $('#dimension_text_height_' + groupvalue).val();
		var options = $("input[type='radio'][name='ndkcsfield[4389]']");
		AlterPriceRadioWindows('T', options, heightPE, widthPE);
		var options = $("input[type='radio'][name='ndkcsfield[4390]']");
		AlterPriceRadioWindows('A', options, heightPE, widthPE);
		$("input[type='radio'][name='ndkcsfield[4390]']:checked").trigger('change');
		$("input[type='radio'][name='ndkcsfield[4389]']:checked").trigger('change');
	}
	if ($.inArray(id_product, aluclass_id_product_windows) !== -1) {
		var groupvalue = $(this).attr('data-group');
		var widthPE = $('#dimension_text_width_' + groupvalue).val();
		var heightPE = $('#dimension_text_height_' + groupvalue).val();
		var options = $("input[type='radio'][name='ndkcsfield[660]']");
		AlterPriceRadioWindows('T', options, heightPE, widthPE);
		var options = $("input[type='radio'][name='ndkcsfield[665]']");
		AlterPriceRadioWindows('A', options, heightPE, widthPE);
		$("input[type='radio'][name='ndkcsfield[665]']:checked").trigger('change');
		$("input[type='radio'][name='ndkcsfield[660]']:checked").trigger('change');
	}
	if ($.inArray(id_product, aluclass_id_product_windows_new) !== -1) {
		var groupvalue = $(this).attr('data-group');
		var widthPE = $('#dimension_text_width_' + groupvalue).val();
		var heightPE = $('#dimension_text_height_' + groupvalue).val();
		var options = $("input[type='radio'][name='ndkcsfield[1469]']");
		AlterPriceRadioWindows('T', options, heightPE, widthPE);
		var options = $("input[type='radio'][name='ndkcsfield[1461]']");
		AlterPriceRadioWindows('A', options, heightPE, widthPE);
		$("input[type='radio'][name='ndkcsfield[1469]']:checked").trigger('change');
		$("input[type='radio'][name='ndkcsfield[1461]']:checked").trigger('change');
	}

	if ($.inArray(id_product, aluclass_id_product_windows_fixe) !== -1) {
		var groupvalue = $(this).attr('data-group');
		var widthPE = $('#dimension_text_width_' + groupvalue).val();
		var heightPE = $('#dimension_text_height_' + groupvalue).val();
		var options = $("input[type='radio'][name='ndkcsfield[3426]']");
		AlterPriceRadioWindows('T', options, heightPE, widthPE);
		var options = $("input[type='radio'][name='ndkcsfield[3427]']");
		AlterPriceRadioWindows('A', options, heightPE, widthPE);
		$("input[type='radio'][name='ndkcsfield[3426]']:checked").trigger('change');
		$("input[type='radio'][name='ndkcsfield[3427]']:checked").trigger('change');
	}
});

// ----------------- Calculo Aile Or Tapee-----------------  janelas
$(document).on('change', "input[type='radio'][name='ndkcsfield[660]']", function () { // tapee
	if ($.inArray(id_product, aluclass_id_product_windows) !== -1) {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLtapee = $("input[type='radio'][name='ndkcsfield[660]']:checked").data('price'); //$(this).find(':checked').data('price'); //$("input:checked").data('price');;
			CalculoTapeeWindows(precoMLtapee, height, width, true);
		}
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[665]']", function () { // Aile
	if ($.inArray(id_product, aluclass_id_product_windows) !== -1) {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLaile = $("input[type='radio'][name='ndkcsfield[665]']:checked").data('price');
			CalculoAileWindows(precoMLaile, height, width, true);
		}
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[1469]']", function () { // tapee
	if ($.inArray(id_product, aluclass_id_product_windows_new) !== -1) {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLtapee = $("input[type='radio'][name='ndkcsfield[1469]']:checked").data('price'); //$(this).find(':checked').data('price'); //$("input:checked").data('price');;
			CalculoTapeeWindows(precoMLtapee, height, width, true);
		}
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[1461]']", function () { // Aile
	if ($.inArray(id_product, aluclass_id_product_windows_new) !== -1) {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLaile = $("input[type='radio'][name='ndkcsfield[1461]']:checked").data('price');
			CalculoAileWindows(precoMLaile, height, width, true);
		}
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[3426]']", function () { // tapee
	if ($.inArray(id_product, aluclass_id_product_windows_fixe) !== -1) {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLtapee = $("input[type='radio'][name='ndkcsfield[3426]']:checked").data('price'); //$(this).find(':checked').data('price'); //$("input:checked").data('price');;
			CalculoTapeeWindows(precoMLtapee, height, width, true);
		}
	}
});

$(document).on('change', "input[type='radio'][name='ndkcsfield[3427]']", function () { // Aile
	if ($.inArray(id_product, aluclass_id_product_windows_fixe) !== -1) {
		if (typeof width !== 'undefined' && typeof height !== 'undefined') {
			var precoMLaile = $("input[type='radio'][name='ndkcsfield[3427]']:checked").data('price');
			CalculoAileWindows(precoMLaile, height, width, true);
		}
	}
});

// ----------------- Tipo de medida que é preciso ----------------- janela
$(document).on('click', '.img-value-2993', function () {
	var id_value = $(this).data('id-value');

	if (id_value == 21745) {
		$("img[data-id-value='21659']").trigger('click');
		$("div[data-field='2992'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote du tableau.</p>");
	} else {
		$("img[data-id-value='21658']").trigger('click');
		$("div[data-field='1114'] div.field_notice").html("<p>Les dimensions (en mm) doivent être la cote de passage.</p>");
	}
});



$(document).on('change', '.dimension_text_729, .dimension_text_4118, .dimension_text_4119', function () {

  // [%area%], [%width%], [%height%]
var arrayOption = new Array();
arrayOption['operador'] = '<=';  // <=, >, <, >=, =
arrayOption['valor1'] = 4;  // area, width, height
arrayOption['valor2'] = 'area'; // area, width, height
 message = "<span style ='color: var(--red);'>  Attencion! </span> A partir de 4 m<sup>2</sup> vous devez impérativement mettre au milieu une traverse horizontale ou verticale afin de diminuer la surface de vitrage pour des raisons de sécurité et de performance. Superficie actuelle [%area%] m<sup>2</sup>";

MessageWarning($(this).data("group"),message,arrayOption);
});
