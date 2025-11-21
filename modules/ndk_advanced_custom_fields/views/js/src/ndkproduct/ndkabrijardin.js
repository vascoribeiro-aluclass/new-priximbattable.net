var heightCarport =0;
var widthCarport = 0;
$(window).on("load", function () {

  //** remove the preview Abris Jardin */
	var aluclass_id_product = ["640022","640021","640020","640018","640017","640016","640015","640014","640011","640010","640009","640008","640007","640006","640000","640001","640002","640003","640004","640005", "1524", "13439", "13436", "13435", "13437", "13438", "13440", "13441", "13443", "13444", "13445", "13446", "13447", "13450", "29000"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		var aluclass_remove_preview = [];
		aluclass_remove_preview[0] = [4539,4538,4537,4536,4541,4531,4530,4528,4523,4525,4520,4521,4518,4516,4514,4513,4512,4510,4506,4505,4503,4501,4495,4491,4487,4485,4481,4479,4478,4476,4473,4475,4470,4472,4467,4469,4465,4463,4462,4460,4459,4458,4451,4454,4453,4457,4444, 4446, 710, 2858, 2896, 2901, 2911, 2914, 2926, 2928, 2929, 2930, 2931, 2932, 2933, 2934, 2935, 2938, 2940, 2943, 2947, 2949, 2956, 2960, 2961, 2962, 2963, 2964, 2965, 2966, 2967, 2968, 2997, 2995, 2999, 2957, 3002, 3001, 3000, 2998, 3003, 3004, 3005, 3006, 2948, 3175, 3176, 3191, 3532, 3579, 3578, 3577, 3576, 3575, 3574, 3565, 3561, 3560, 3559, 2921, 2920, 2919, 3598, 3597, 3017, 3599, 3018, 3600, 3019, 2913, 3552, 2917, 3553, 3554, 3549, 3556, 3555, 3558, 3557, 2912, 2911, 3562, 2953, 3580, 3581, 3583, 3534, 3536, 3538, 3568, 3566, 3567, 3569, 3535, 3537, 3539, 3544, 3540, 3541, 3545, 3572, 3570, 3573, 3571, 3582, 2923, 3546, 3547, 3548, 2857, 3584, 3586, 3588, 2881, 2855, 3585, 3587, 3986, 3987, 3988, 3989, 2941, 3958, 3965, 3966, 3969, 3970, , 3950, 3951, 3952, 3953, 3954, 3955, 3956, 3957, 3990, 3991, 3992, 3993, 2945, 2946, 4003, 4004, 4005, 4006, 4007, 4008, 4009, 4043, 4044, 4045, 4046, 4047, 4048, 4049, 4050, 4051, 4052, 4031, 4032, 4033, 4034];
		aluclass_remove_preview[0].forEach(function (num) {
			$('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
		});
	}


	//++ remove field Détail Dimensions Combiné Carport et Abri*/
	var aluclass_id_product = ["640020"];
	if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$("div[data-field='4540']").addClass("disable-field-ndk");
	}

  	//  Miguel - Remove o campo options duplicado ao carregar págia Module Carport + Abris jardin
	var ID_Produto = []
	ID_Produto = ["13443"];
	var fieldShow = [];
	fieldShow = ["2948", "3003"];

	if ($.inArray(id_product, ID_Produto) !== -1) {
		HideAllFields(fieldShow, "2948");
	}


  var arrayAbrigProductId = []
	arrayAbrigProductId = ["640001","640002"];
	if ($.inArray(id_product, arrayAbrigProductId) !== -1) {
			RemoveField(4454);
			ShowField(4453);
			RemoveField(4459);
			ShowField(4460);
	}

  /* ----------------------------------- *
   *  Joana - Renomear placeholders      *
   * ----------------------------------- */

  //Carport Toit Plat Sur Mesure Autoporté - 640134
  $('#dimension_text_height_4812').attr('placeholder', 'longueur');
  $('#dimension_text_height_4813').attr('placeholder', 'longueur');
  $('#dimension_text_height_4814').attr('placeholder', 'longueur');

  //Carport Double Toit Plat Sur Mesure Autoporté - 640135
  $('#dimension_text_height_4816').attr('placeholder', 'longueur');
  $('#dimension_text_height_4817').attr('placeholder', 'longueur');
  $('#dimension_text_height_4818').attr('placeholder', 'longueur');
	

  var aluclass_id_product = ["640134", "640135", "640136", "640137", "640254", "640255", "640256", "640258", "640260", "640261", "640262", "640263", "640264", "640265", "640266", "640267"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    //Carport Toit Plat Sur Mesure Autoporté
    $('#dimension_text_width_4836').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_4836").css("display", "none");
    $("#dimension_text_height_4836").css("display", "none");
		$('#dimension_text_width_5328').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5328").css("display", "none");
    $("#dimension_text_height_5328").css("display", "none");
		$('#dimension_text_width_5329').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5329").css("display", "none");
    $("#dimension_text_height_5329").css("display", "none");

    //Carport Double Toit Plat Sur Mesure Autoporté
    $('#dimension_text_width_4837').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_4837").css("display", "none");
    $("#dimension_text_height_4837").css("display", "none");
		$('#dimension_text_width_5330').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5330").css("display", "none");
    $("#dimension_text_height_5330").css("display", "none");
		$('#dimension_text_width_5331').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5331").css("display", "none");
    $("#dimension_text_height_5331").css("display", "none");

  //Carport Toit Plat Avec Débord Autoporté Sur Mesure
		$('#dimension_text_width_4838').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_4838").css("display", "none");
		$("#dimension_text_height_4838").css("display", "none");
		$('#dimension_text_width_5332').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5332").css("display", "none");
		$("#dimension_text_height_5332").css("display", "none");
		$('#dimension_text_width_5333').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5333").css("display", "none");
		$("#dimension_text_height_5333").css("display", "none");

		//Carport Double Toit Plat Avec Débord Autoporté Sur Mesure
		$('#dimension_text_width_4839').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_4839").css("display", "none");
		$("#dimension_text_height_4839").css("display", "none");
		$('#dimension_text_width_5335').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5335").css("display", "none");
		$("#dimension_text_height_5335").css("display", "none");
		$('#dimension_text_width_5336').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5336").css("display", "none");
		$("#dimension_text_height_5336").css("display", "none");

		//Carport Toit Plat Avec Débord Adossé Sur Mesure
		$('#dimension_text_width_5343').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5343").css("display", "none");
		$("#dimension_text_height_5343").css("display", "none");
		$('#dimension_text_width_5344').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5344").css("display", "none");
		$("#dimension_text_height_5344").css("display", "none");
		$('#dimension_text_width_5345').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5345").css("display", "none");
		$("#dimension_text_height_5345").css("display", "none");

		//Carport Double Toit Plat Avec Débord Adosse Sur Mesure
		$('#dimension_text_width_5352').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5352").css("display", "none");
		$("#dimension_text_height_5352").css("display", "none");
		$('#dimension_text_width_5353').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5353").css("display", "none");
		$("#dimension_text_height_5353").css("display", "none");
		$('#dimension_text_width_5355').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5355").css("display", "none");
		$("#dimension_text_height_5355").css("display", "none");

		//Carport Cintré Sur Mesure - 640256
		$('#dimension_text_width_5361').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5361").css("display", "none");
		$("#dimension_text_height_5361").css("display", "none");
		$('#dimension_text_width_5362').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5362").css("display", "none");
		$("#dimension_text_height_5362").css("display", "none");
		$('#dimension_text_width_5363').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5363").css("display", "none");
		$("#dimension_text_height_5363").css("display", "none");

		//Carport Double Cintré Sur Mesure - 640258
		$('#dimension_text_width_5380').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5380").css("display", "none");
		$("#dimension_text_height_5380").css("display", "none");
		$('#dimension_text_width_5381').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5381").css("display", "none");
		$("#dimension_text_height_5381").css("display", "none");
		$('#dimension_text_width_5382').attr('placeholder', 'Hauteur');
		$(".dimension_text_height_5382").css("display", "none");
		$("#dimension_text_height_5382").css("display", "none");

    //Carport 2 Poteaux Double Sur Mesure - 640260
    $('#dimension_text_width_5394').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5394").css("display", "none");
    $("#dimension_text_height_5394").css("display", "none");
		$('#dimension_text_width_5395').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5395").css("display", "none");
    $("#dimension_text_height_5395").css("display", "none");
    $('#dimension_text_width_5396').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5396").css("display", "none");
    $("#dimension_text_height_5396").css("display", "none");

    //Carport 2 Poteaux Double Inversé Sur Mesure - 640261
    $('#dimension_text_width_5399').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5399").css("display", "none");
    $("#dimension_text_height_5399").css("display", "none");
		$('#dimension_text_width_5400').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5400").css("display", "none");
    $("#dimension_text_height_5400").css("display", "none");
    $('#dimension_text_width_5401').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5401").css("display", "none");
    $("#dimension_text_height_5401").css("display", "none");

    //Carport Contemporain 2 Poteaux Sur Mesure - 640262
    $('#dimension_text_width_5404').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5404").css("display", "none");
    $("#dimension_text_height_5404").css("display", "none");
		$('#dimension_text_width_5405').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5405").css("display", "none");
    $("#dimension_text_height_5405").css("display", "none");
    $('#dimension_text_width_5406').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5406").css("display", "none");
    $("#dimension_text_height_5406").css("display", "none");

    //Carport Contemporain 2 Poteaux Double Sur Mesure - 640263
    $('#dimension_text_width_5409').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5409").css("display", "none");
    $("#dimension_text_height_5409").css("display", "none");
		$('#dimension_text_width_5410').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5410").css("display", "none");
    $("#dimension_text_height_5410").css("display", "none");
    $('#dimension_text_width_5411').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5411").css("display", "none");
    $("#dimension_text_height_5411").css("display", "none");

    //Carport Contemporain 2 Poteaux Double Inverse Sur Mesure - 640264
    $('#dimension_text_width_5414').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5414").css("display", "none");
    $("#dimension_text_height_5414").css("display", "none");
    $('#dimension_text_width_5415').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5415").css("display", "none");
    $("#dimension_text_height_5415").css("display", "none");
    $('#dimension_text_width_5416').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5416").css("display", "none");
    $("#dimension_text_height_5416").css("display", "none");

    //Carport Autoporté Toit Plat avec Dégagement Sur Mesure - 640265
    $('#dimension_text_width_5421').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5421").css("display", "none");
    $("#dimension_text_height_5421").css("display", "none");
    $('#dimension_text_width_5422').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5422").css("display", "none");
    $("#dimension_text_height_5422").css("display", "none");
    $('#dimension_text_width_5423').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5423").css("display", "none");
    $("#dimension_text_height_5423").css("display", "none");

    //Carport Adossé Latéral Toit Plat avec Dégagement Sur Mesure - 640266
    $('#dimension_text_width_5430').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5430").css("display", "none");
    $("#dimension_text_height_5430").css("display", "none");
    $('#dimension_text_width_5431').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5431").css("display", "none");
    $("#dimension_text_height_5431").css("display", "none");
    $('#dimension_text_width_5432').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5432").css("display", "none");
    $("#dimension_text_height_5432").css("display", "none");

    //Carport Adossé Arrière Toit Plat avec Dégagement Sur Mesure - 640267
    $('#dimension_text_width_5436').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5436").css("display", "none");
    $("#dimension_text_height_5436").css("display", "none");
    $('#dimension_text_width_5437').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5437").css("display", "none");
    $("#dimension_text_height_5437").css("display", "none");
    $('#dimension_text_width_5438').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5438").css("display", "none");
    $("#dimension_text_height_5438").css("display", "none");
  }

  //Carport Toit Plat Double Avec Débord Adossé Sur Mesure
  $(document).on('change', '#dimension_text_width_5352', function () {
    $('#dimension_text_height_5352').val('1');
  });

	$(document).on('change', '#dimension_text_width_5353', function () {
    $('#dimension_text_height_5353').val('1');
  });

	$(document).on('change', '#dimension_text_width_5355', function () {
    $('#dimension_text_height_5355').val('1');
  });

  //Carport Toit Plat Sur Mesure Autoporté
  $(document).on('change', '#dimension_text_width_4836', function () {
    $('#dimension_text_height_4836').val('1');
  });

	$(document).on('change', '#dimension_text_width_5328', function () {
    $('#dimension_text_height_5328').val('1');
  });

	$(document).on('change', '#dimension_text_width_5329', function () {
    $('#dimension_text_height_5329').val('1');
  });

  //Carport Double Toit Plat Sur Mesure Autoporté
  $(document).on('change', '#dimension_text_width_4837', function () {
    $('#dimension_text_height_4837').val('1');
  });

	$(document).on('change', '#dimension_text_width_5330', function () {
    $('#dimension_text_height_5330').val('1');
  });

	$(document).on('change', '#dimension_text_width_5331', function () {
    $('#dimension_text_height_5331').val('1');
  });

  //Carport Toit Plat Avec Débord Autoporté Sur Mesure
  $(document).on('change', '#dimension_text_width_4838', function () {
    $('#dimension_text_height_4838').val('1');
  });

	$(document).on('change', '#dimension_text_width_5332', function () {
    $('#dimension_text_height_5332').val('1');
  });

	$(document).on('change', '#dimension_text_width_5333', function () {
    $('#dimension_text_height_5333').val('1');
  });

	//Carport Double Toit Plat Avec Débord Autoporté Sur Mesure
	$(document).on('change', '#dimension_text_width_4839', function () {
		$('#dimension_text_height_4839').val('1');
	});

	$(document).on('change', '#dimension_text_width_5335', function () {
		$('#dimension_text_height_5335').val('1');
	});

	$(document).on('change', '#dimension_text_width_5336', function () {
		$('#dimension_text_height_5336').val('1');
	});

	//Carport Toit Plat Avec Débord Adossé Sur Mesure
	$(document).on('change', '#dimension_text_width_5343', function () {
		$('#dimension_text_height_5343').val('1');
	});

	$(document).on('change', '#dimension_text_width_5344', function () {
		$('#dimension_text_height_5344').val('1');
	});

	$(document).on('change', '#dimension_text_width_5345', function () {
		$('#dimension_text_height_5345').val('1');
	});

  //Carport 2 Poteaux Double Sur Mesure - 640260
  $(document).on('change', '#dimension_text_width_5394', function () {
    $('#dimension_text_height_5394').val('6000');
  });

	$(document).on('change', '#dimension_text_width_5395', function () {
    $('#dimension_text_height_5395').val('6000');
  });

	$(document).on('change', '#dimension_text_width_5396', function () {
    $('#dimension_text_height_5396').val('6000');
  });

  //Carport 2 Poteaux Double Inversé Sur Mesure - 640261
  $(document).on('change', '#dimension_text_width_5399', function () {
    $('#dimension_text_height_5399').val('6000');
  });

	$(document).on('change', '#dimension_text_width_5400', function () {
    $('#dimension_text_height_5400').val('6000');
  });

	$(document).on('change', '#dimension_text_width_5401', function () {
    $('#dimension_text_height_5401').val('6000');
  });

  //Carport Contemporain 2 Poteaux Sur Mesure - 640262
  $(document).on('change', '#dimension_text_width_5404', function () {
    $('#dimension_text_height_5404').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5405', function () {
    $('#dimension_text_height_5405').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5406', function () {
    $('#dimension_text_height_5406').val('3000');
  });

  //Carport Contemporain 2 Poteaux Double Sur Mesure - 640263
  $(document).on('change', '#dimension_text_width_5409', function () {
    $('#dimension_text_height_5409').val('6000');
  });

  $(document).on('change', '#dimension_text_width_5410', function () {
    $('#dimension_text_height_5410').val('6000');
  });

  $(document).on('change', '#dimension_text_width_5411', function () {
    $('#dimension_text_height_5411').val('6000');
  });

  //Carport Contemporain 2 Poteaux Double Inverse Sur Mesure - 640264
  $(document).on('change', '#dimension_text_width_5414', function () {
    $('#dimension_text_height_5414').val('6000');
  });

  $(document).on('change', '#dimension_text_width_5415', function () {
    $('#dimension_text_height_5415').val('6000');
  });

  $(document).on('change', '#dimension_text_width_5416', function () {
    $('#dimension_text_height_5416').val('6000');
  });

  //Carport Autoporté Toit Plat avec Dégagement Sur Mesure - 640265
  $(document).on('change', '#dimension_text_width_5421', function () {
    $('#dimension_text_height_5421').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5422', function () {
    $('#dimension_text_height_5422').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5423', function () {
    $('#dimension_text_height_5423').val('3000');
  });

  //Carport Adossé Latéral Toit Plat avec Dégagement Sur Mesure - 640266
  $(document).on('change', '#dimension_text_width_5430', function () {
    $('#dimension_text_height_5430').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5431', function () {
    $('#dimension_text_height_5431').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5432', function () {
    $('#dimension_text_height_5432').val('3000');
  });

  //Carport Adossé Arrière Toit Plat avec Dégagement Sur Mesure - 640267
  $(document).on('change', '#dimension_text_width_5436', function () {
    $('#dimension_text_height_5436').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5437', function () {
    $('#dimension_text_height_5437').val('3000');
  });

  $(document).on('change', '#dimension_text_width_5438', function () {
    $('#dimension_text_height_5438').val('3000');
  });

  //Carport Toit Plat Avec Débord Sur Mesure
  $('#dimension_text_height_4820').attr('placeholder', 'longueur');
  $('#dimension_text_height_4821').attr('placeholder', 'longueur');
  $('#dimension_text_height_4822').attr('placeholder', 'longueur');

  //Carport Double Toit Plat Avec Débord Sur Mesure
  $('#dimension_text_height_4824').attr('placeholder', 'longueur');
  $('#dimension_text_height_4825').attr('placeholder', 'longueur');
  $('#dimension_text_height_4826').attr('placeholder', 'longueur');

	//Carport Double Toit Plat Avec Débord Sur Mesure
	$('#dimension_text_height_5340').attr('placeholder', 'longueur');
	$('#dimension_text_height_5341').attr('placeholder', 'longueur');
	$('#dimension_text_height_5342').attr('placeholder', 'longueur');

	//Carport Double Toit Plat Adosse Avec Débord Sur Mesure
	$('#dimension_text_height_5349').attr('placeholder', 'longueur');
	$('#dimension_text_height_5350').attr('placeholder', 'longueur');
	$('#dimension_text_height_5351').attr('placeholder', 'longueur');

	// Carport Cintré Sur Mesure - 640256
	$('#dimension_text_height_5358').attr('placeholder', 'longueur');
	$('#dimension_text_height_5359').attr('placeholder', 'longueur');
	$('#dimension_text_height_5360').attr('placeholder', 'longueur');

	// Carport Double Cintré Sur Mesure - 640258
	$('#dimension_text_height_5378').attr('placeholder', 'longueur');
	$('#dimension_text_height_5379').attr('placeholder', 'longueur');
	$('#dimension_text_height_5383').attr('placeholder', 'longueur');

	/* ----------------------------------- *
   *  Rita - Renomear placeholders       *
   * ----------------------------------- */

	//Carport Toit Plat Sur Mesure Adossé
	$('#dimension_text_height_5311').attr('placeholder', 'longueur');
	$('#dimension_text_height_5312').attr('placeholder', 'longueur');
	$('#dimension_text_height_5313').attr('placeholder', 'longueur');

	//Carport Aluminium Toit Plat Adossé Camping Car Design Sur Mesure - 640284
	$('#dimension_text_height_5554').attr('placeholder', 'longueur');
	$('#dimension_text_height_5555').attr('placeholder', 'longueur');
	$('#dimension_text_height_5556').attr('placeholder', 'longueur');
	
	// Carport Aluminium Toit Plat Autoporté Camping Car Design Sur Mesure  - 640285
	$('#dimension_text_height_5558').attr('placeholder', 'longueur');
	$('#dimension_text_height_5559').attr('placeholder', 'longueur');
	$('#dimension_text_height_5560').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640251"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5315').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5315").css("display", "none");
    $("#dimension_text_height_5315").css("display", "none");
		$('#dimension_text_width_5322').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5322").css("display", "none");
    $("#dimension_text_height_5322").css("display", "none");
		$('#dimension_text_width_5323').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5323").css("display", "none");
    $("#dimension_text_height_5323").css("display", "none");
  }

  $(document).on('change', '#dimension_text_width_5315', function () {
    $('#dimension_text_height_5315').val('1');
  });

	$(document).on('change', '#dimension_text_width_5322', function () {
    $('#dimension_text_height_5322').val('1');
  });

	$(document).on('change', '#dimension_text_width_5323', function () {
    $('#dimension_text_height_5323').val('1');
  });

  //Carport Double Toit Plat Sur Mesure Adossé
	$('#dimension_text_height_5318').attr('placeholder', 'longueur');
  $('#dimension_text_height_5319').attr('placeholder', 'longueur');
  $('#dimension_text_height_5320').attr('placeholder', 'longueur');


  var aluclass_id_product = ["640253"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5321').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5321").css("display", "none");
    $("#dimension_text_height_5321").css("display", "none");
		$('#dimension_text_width_5324').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5324").css("display", "none");
    $("#dimension_text_height_5324").css("display", "none");
		$('#dimension_text_width_5325').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5325").css("display", "none");
    $("#dimension_text_height_5325").css("display", "none");
  }

  $(document).on('change', '#dimension_text_width_5321', function () {
    $('#dimension_text_height_5321').val('1');
  });

	$(document).on('change', '#dimension_text_width_5324', function () {
    $('#dimension_text_height_5324').val('1');
  });

	$(document).on('change', '#dimension_text_width_5325', function () {
    $('#dimension_text_height_5325').val('1');
  });

  //Carport Aluminium 2 Poteaux Sur Mesure - 640259
	var aluclass_id_product = ["640259"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
		$('#dimension_text_width_5386').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5386").css("display", "none");
    $("#dimension_text_height_5386").css("display", "none");
		$('#dimension_text_width_5387').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5387").css("display", "none");
    $("#dimension_text_height_5387").css("display", "none");
    $('#dimension_text_width_5388').attr('placeholder', 'Longueur');
    $(".dimension_text_height_5388").css("display", "none");
    $("#dimension_text_height_5388").css("display", "none");
  }

  $(document).on('change', '#dimension_text_width_5385', function () {
    $('#dimension_text_height_5321').val('1');
  });

	$(document).on('change', '#dimension_text_width_5386', function () {
    $('#dimension_text_height_5324').val('1');
  });

	$(document).on('change', '#dimension_text_width_5387', function () {
    $('#dimension_text_height_5325').val('1');
  });

	//Carport Aluminium Excelsium Adossé Latéral - 640282
	$('#dimension_text_height_5527').attr('placeholder', 'longueur');
  $('#dimension_text_height_5528').attr('placeholder', 'longueur');
  $('#dimension_text_height_5529').attr('placeholder', 'longueur');


  var aluclass_id_product = ["640282"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5530').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5530").css("display", "none");
    $("#dimension_text_height_5530").css("display", "none");
		$('#dimension_text_width_5531').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5531").css("display", "none");
    $("#dimension_text_height_5531").css("display", "none");
		$('#dimension_text_width_5532').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5532").css("display", "none");
    $("#dimension_text_height_5532").css("display", "none");
  }

  $(document).on('change', '#dimension_text_width_5530', function () {
    $('#dimension_text_height_5530').val('2');
  });

	$(document).on('change', '#dimension_text_width_5531', function () {
    $('#dimension_text_height_5531').val('2');
  });

	$(document).on('change', '#dimension_text_width_5532', function () {
    $('#dimension_text_height_5532').val('2');
  });

  //Carport Aluminium Excelsium Adossé Arrière - 640283
	$('#dimension_text_height_5536').attr('placeholder', 'longueur');
  $('#dimension_text_height_5537').attr('placeholder', 'longueur');
  $('#dimension_text_height_5538').attr('placeholder', 'longueur');


  var aluclass_id_product = ["640283"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5539').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5539").css("display", "none");
    $("#dimension_text_height_5539").css("display", "none");
		$('#dimension_text_width_5540').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5540").css("display", "none");
    $("#dimension_text_height_5540").css("display", "none");
		$('#dimension_text_width_5541').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5541").css("display", "none");
    $("#dimension_text_height_5541").css("display", "none");
  }

  $(document).on('change', '#dimension_text_width_5539', function () {
    $('#dimension_text_height_5539').val('2');
  });

	$(document).on('change', '#dimension_text_width_5540', function () {
    $('#dimension_text_height_5540').val('2');
  });

	$(document).on('change', '#dimension_text_width_5541', function () {
    $('#dimension_text_height_5541').val('2');
  });


//  Carport Aluminium Toit Plat Autoporté Arche Sur Mesure - 640286
	$('#dimension_text_height_5565').attr('placeholder', 'longueur');
	$('#dimension_text_height_5566').attr('placeholder', 'longueur');
	$('#dimension_text_height_5567').attr('placeholder', 'longueur');


	var aluclass_id_product = ["640286"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5568').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5568").css("display", "none");
    $("#dimension_text_height_5568").css("display", "none");
		$('#dimension_text_width_5569').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5569").css("display", "none");
    $("#dimension_text_height_5569").css("display", "none");
		$('#dimension_text_width_5570').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5570").css("display", "none");
    $("#dimension_text_height_5570").css("display", "none");
  }
	 $(document).on('change', '#dimension_text_width_5568', function () {
    $('#dimension_text_height_5568').val('4');
  });

	$(document).on('change', '#dimension_text_width_5569', function () {
    $('#dimension_text_height_5569').val('4');
  });

	$(document).on('change', '#dimension_text_width_5570', function () {
    $('#dimension_text_height_5570').val('4');
  });

//   Carport Aluminium Toit Plat Adossé Latéral Arche Sur Mesure  - 640287
	$('#dimension_text_height_5573').attr('placeholder', 'longueur');
	$('#dimension_text_height_5574').attr('placeholder', 'longueur');
	$('#dimension_text_height_5575').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640287"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5576').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5576").css("display", "none");
    $("#dimension_text_height_5576").css("display", "none");
		$('#dimension_text_width_5577').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5577").css("display", "none");
    $("#dimension_text_height_5577").css("display", "none");
		$('#dimension_text_width_5578').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5578").css("display", "none");
    $("#dimension_text_height_5578").css("display", "none");
  }
	 $(document).on('change', '#dimension_text_width_5576', function () {
    $('#dimension_text_height_5576').val('2');
  });

	$(document).on('change', '#dimension_text_width_5577', function () {
    $('#dimension_text_height_5577').val('2');
  });

	$(document).on('change', '#dimension_text_width_5578', function () {
    $('#dimension_text_height_5578').val('2');
  });

//    Carport Aluminium Toit Plat Adossé Arrière Arche Sur Mesure   - 640288

	var aluclass_id_product = ["640288"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5584').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5584").css("display", "none");
    $("#dimension_text_height_5584").css("display", "none");
		$('#dimension_text_width_5585').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5585").css("display", "none");
    $("#dimension_text_height_5585").css("display", "none");
		$('#dimension_text_width_5586').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5586").css("display", "none");
    $("#dimension_text_height_5586").css("display", "none");

		$('#dimension_text_width_5581').attr('placeholder', 'Largeur');
    $(".dimension_text_height_5581").css("display", "none");
    $("#dimension_text_height_5581").css("display", "none");
    $('#dimension_text_width_5582').attr('placeholder', 'Largeur');
    $(".dimension_text_height_5582").css("display", "none");
    $("#dimension_text_height_5582").css("display", "none");
    $('#dimension_text_width_5583').attr('placeholder', 'Largeur ');
    $(".dimension_text_height_5583").css("display", "none");
    $("#dimension_text_height_5583").css("display", "none");
  }
	
	 $(document).on('change', '#dimension_text_width_5584', function () {
    $('#dimension_text_height_5584').val('2');
  });

	$(document).on('change', '#dimension_text_width_5585', function () {
    $('#dimension_text_height_5585').val('2');
  });

	$(document).on('change', '#dimension_text_width_5586', function () {
    $('#dimension_text_height_5586').val('2');
  });

	$(document).on('change', '#dimension_text_width_5581', function () {
    $('#dimension_text_height_5581').val('5000');
  });

  $(document).on('change', '#dimension_text_width_5582', function () {
    $('#dimension_text_height_5582').val('5000');
  });

  $(document).on('change', '#dimension_text_width_5583', function () {
    $('#dimension_text_height_5583').val('5000');
  });

	//  Carport Aluminium Toit Plat Adossé Géant Sur Mesure - 640289
	$('#dimension_text_height_5592').attr('placeholder', 'longueur');
	$('#dimension_text_height_5593').attr('placeholder', 'longueur');
	$('#dimension_text_height_5594').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640289"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5595').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5595").css("display", "none");
    $("#dimension_text_height_5595").css("display", "none");
		$('#dimension_text_width_5596').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5596").css("display", "none");
    $("#dimension_text_height_5596").css("display", "none");
		$('#dimension_text_width_5597').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5597").css("display", "none");
    $("#dimension_text_height_5597").css("display", "none");
  }
	 $(document).on('change', '#dimension_text_width_5595', function () {
    $('#dimension_text_height_5595').val('2');
  });

	$(document).on('change', '#dimension_text_width_5596', function () {
    $('#dimension_text_height_5596').val('2');
  });

	$(document).on('change', '#dimension_text_width_5597', function () {
    $('#dimension_text_height_5597').val('2');
  });

	//   Carport Aluminium Toit Plat Autoporté Géant Sur Mesure - 640290
	$('#dimension_text_height_5603').attr('placeholder', 'longueur');
	$('#dimension_text_height_5604').attr('placeholder', 'longueur');
	$('#dimension_text_height_5605').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640290"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5606').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5606").css("display", "none");
    $("#dimension_text_height_5606").css("display", "none");
		$('#dimension_text_width_5607').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5607").css("display", "none");
    $("#dimension_text_height_5607").css("display", "none");
		$('#dimension_text_width_5608').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5608").css("display", "none");
    $("#dimension_text_height_5608").css("display", "none");
  }
	 $(document).on('change', '#dimension_text_width_5606', function () {
    $('#dimension_text_height_5606').val('4');
  });

	$(document).on('change', '#dimension_text_width_5607', function () {
    $('#dimension_text_height_5607').val('4');
  });

	$(document).on('change', '#dimension_text_width_5608', function () {
    $('#dimension_text_height_5608').val('4');
  });

	//  Abri de Moto et Velo Aluminium Sur Mesure Toiture Polycarbonate  - 640291
	$('#dimension_text_height_5611').attr('placeholder', 'longueur');
	$('#dimension_text_height_5612').attr('placeholder', 'longueur');
	$('#dimension_text_height_5613').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640291"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5614').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5614").css("display", "none");
    $("#dimension_text_height_5614").css("display", "none");
		$('#dimension_text_width_5615').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5615").css("display", "none");
    $("#dimension_text_height_5615").css("display", "none");
		$('#dimension_text_width_5616').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5616").css("display", "none");
    $("#dimension_text_height_5616").css("display", "none");
  }
	 $(document).on('change', '#dimension_text_width_5614', function () {
    $('#dimension_text_height_5614').val('4');
  });

	$(document).on('change', '#dimension_text_width_5615', function () {
    $('#dimension_text_height_5615').val('4');
  });

	$(document).on('change', '#dimension_text_width_5616', function () {
    $('#dimension_text_height_5616').val('4');
  });

	//   Carport Aluminium Adossé Classique Sur Mesure   - 640292
	$('#dimension_text_height_5620').attr('placeholder', 'longueur');
	$('#dimension_text_height_5621').attr('placeholder', 'longueur');
	$('#dimension_text_height_5622').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640292"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5623').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5623").css("display", "none");
    $("#dimension_text_height_5623").css("display", "none");
		$('#dimension_text_width_5624').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5624").css("display", "none");
    $("#dimension_text_height_5624").css("display", "none");
		$('#dimension_text_width_5625').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5625").css("display", "none");
    $("#dimension_text_height_5625").css("display", "none");
  }

	// Carport Aluminium Adossé Classique Sur Mesure Renforce  - 640293
	$('#dimension_text_height_5630').attr('placeholder', 'longueur');
	$('#dimension_text_height_5631').attr('placeholder', 'longueur');
	$('#dimension_text_height_5632').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640293"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5633').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5633").css("display", "none");
    $("#dimension_text_height_5633").css("display", "none");
		$('#dimension_text_width_5634').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5634").css("display", "none");
    $("#dimension_text_height_5634").css("display", "none");
		$('#dimension_text_width_5635').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5635").css("display", "none");
    $("#dimension_text_height_5635").css("display", "none");
  }

	$(document).on('change', '#dimension_text_width_5633', function () {
		$('#dimension_text_height_5633').val('2');
  });

	$(document).on('change', '#dimension_text_width_5634', function () {
    $('#dimension_text_height_5634').val('2');
  });

	$(document).on('change', '#dimension_text_width_5635', function () {
    $('#dimension_text_height_5635').val('3');
  });

	//   Carport Aluminium Adossé Classique Sur Mesure   - 640294
	$('#dimension_text_height_5640').attr('placeholder', 'longueur');
	$('#dimension_text_height_5641').attr('placeholder', 'longueur');
	$('#dimension_text_height_5642').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640294"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5643').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5643").css("display", "none");
    $("#dimension_text_height_5643").css("display", "none");
		$('#dimension_text_width_5644').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5644").css("display", "none");
    $("#dimension_text_height_5644").css("display", "none");
		$('#dimension_text_width_5645').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5645").css("display", "none");
    $("#dimension_text_height_5645").css("display", "none");
  }

	//   Carport Aluminium Adossé Classique Sur Mesure REnforce   - 640295
	$('#dimension_text_height_5649').attr('placeholder', 'longueur');
	$('#dimension_text_height_5650').attr('placeholder', 'longueur');
	$('#dimension_text_height_5651').attr('placeholder', 'longueur');

	var aluclass_id_product = ["640295"];
  if ($.inArray(id_product, aluclass_id_product) !== -1) {
    $('#dimension_text_width_5652').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5652").css("display", "none");
    $("#dimension_text_height_5652").css("display", "none");
		$('#dimension_text_width_5653').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5653").css("display", "none");
    $("#dimension_text_height_5653").css("display", "none");
		$('#dimension_text_width_5654').attr('placeholder', 'Hauteur');
    $(".dimension_text_height_5654").css("display", "none");
    $("#dimension_text_height_5654").css("display", "none");
  }

	$(document).on('change', '#dimension_text_width_5652', function () {
		$('#dimension_text_height_5652').val('2');
  });

	$(document).on('change', '#dimension_text_width_5653', function () {
    $('#dimension_text_height_5653').val('2');
  });

	$(document).on('change', '#dimension_text_width_5654', function () {
    $('#dimension_text_height_5654').val('2');
  });

});

// Carport Cintré Sur Mesure (CC) - 640256
var lengthCC = 0;

$(document).on('change', '#dimension_text_height_5358, #dimension_text_height_5359, #dimension_text_height_5360', function () {

	var groupvalue = $(this).attr('data-group');
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (heightPE > 5000) {
		$('#carportcintre_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");
	}

  //2 postes - comprimento igual ou inferior a 5000 mm
  else {
		$('#carportcintre_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 4 poteaux.");
	}

  lengthCC = heightPE;

});

$(document).on('change', '#dimension_text_width_5361, #dimension_text_width_5362, #dimension_text_width_5363', function () {

  //3 postes -  comprimento superior a 5000 mm
  if (lengthCC > 5000) {
    $("#dimension_text_height_5361").val("6"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5362").val("6"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5363").val("6"); //NDK Hauteur Other RAL
  }

  //2 postes - comprimento igual ou inferior a 5000 mm
  else {
    $("#dimension_text_height_5361").val("4"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5362").val("4"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5363").val("4"); //NDK Hauteur Other RAL*/
  }
});


// Carport Double Cintré Sur Mesure (CDC) - 640258
var lengthCDC = 0;

$(document).on('change', '#dimension_text_height_5378, #dimension_text_height_5379, #dimension_text_height_5383', function () {

	var groupvalue = $(this).attr('data-group');
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (heightPE > 5000) {
		$('#carportcintre_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 9 poteaux.");
	}

	//2 postes - comprimento igual ou inferior a 5000 mm
	else {
		$('#carportcintre_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");
	}

	lengthCDC = heightPE;

});

$(document).on('change', '#dimension_text_width_5380, #dimension_text_width_5381, #dimension_text_width_5382', function () {

  //3 postes -  comprimento superior a 5000 mm
  if (lengthCDC > 5000) {
    $("#dimension_text_height_5380").val("9"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5381").val("9"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5382").val("9"); //NDK Hauteur Other RAL
  }

  //2 postes - comprimento igual ou inferior a 5000 mm
  else {
    $("#dimension_text_height_5380").val("6"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5381").val("6"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5382").val("6"); //NDK Hauteur Other RAL
  }
});

// Carport Aluminium 2 Poteaux Sur Mesure - 640259
$(document).on('change', '#dimension_text_width_5386, #dimension_text_width_5387, #dimension_text_width_5388', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 3 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 2 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, un poteau central est ajouté.");
  }
});

// Carport Aluminium 2 Poteaux Double Sur Mesure - 640260
$(document).on('change', '#dimension_text_width_5394, #dimension_text_width_5395, #dimension_text_width_5396', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 4 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, un poteau central est ajouté de chaque côté.");
  }
});

// Carport Aluminium 2 Poteaux Double Inversé Sur Mesure - 640261
$(document).on('change', '#dimension_text_width_5399, #dimension_text_width_5400, #dimension_text_width_5401', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 4 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, deux poteaux centraux sont ajoutés.");
  }
});

// Carport Contemporain 2 Poteaux Sur Mesure - 640262
$(document).on('change', '#dimension_text_width_5404, #dimension_text_width_5405, #dimension_text_width_5406', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 3 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 2 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, un poteau central est ajouté.");
  }
});

// Carport Contemporain 2 Poteaux Double Sur Mesure - 640263
$(document).on('change', '#dimension_text_width_5409, #dimension_text_width_5410, #dimension_text_width_5411', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 4 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, un poteau central est ajouté de chaque côté.");
  }
});

// Carport Contemporain 2 Poteaux Double Inverse Sur Mesure - 640264
$(document).on('change', '#dimension_text_width_5414, #dimension_text_width_5415, #dimension_text_width_5416', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 4 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, deux poteaux centraux sont ajoutés.");
  }
});

//  Carport Aluminium Adossé Classique Sur Mesure CAC- 640292

var lengthCAC = 0

$(document).on('change', '#dimension_text_width_5620, #dimension_text_width_5621, #dimension_text_width_5622, #dimension_text_height_5620, #dimension_text_height_5621, #dimension_text_height_5622', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

  //3 postes -  comprimento superior a 4000 mm
  if (heightPE > 4000 && heightPE <= 8000 && widthPE >= 2500 && widthPE <= 4000) {
		$('#carportclassiqueado_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 3 poteaux.");

  //2 postes - comprimento igual ou inferior a 4000 mm
	} else if (heightPE >= 2000 && heightPE <= 4000 && widthPE >= 2500 && widthPE <= 4000) {
		$('#carportclassiqueado_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 2 poteaux.");
	}

  else {
    $('#carportclassiqueado_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 4000 mm, un poteau central est ajouté.");
  }

	  lengthCAC = heightPE;


	//Toiture pré-selecionado
	$("img[data-id-value='31335']").addClass('selected-value').trigger('click');
});

$(document).on('change', '#dimension_text_width_5623, #dimension_text_width_5624, #dimension_text_width_5625', function () {

  //3 postes -  comprimento superior a 4000 mm
  if (lengthCAC > 4000) {
    $("#dimension_text_height_5623").val("3"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5624").val("3"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5625").val("3"); //NDK Hauteur Other RAL
  }

  //2 postes - comprimento igual ou inferior a 4000 mm
  else {
    $("#dimension_text_height_5623").val("2"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5624").val("2"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5625").val("2"); //NDK Hauteur Other RAL
  }
});

//  Carport Aluminium Adossé Classique Sur Mesure Renforcé - 640293
$(document).on('change', '#dimension_text_width_5630, #dimension_text_width_5631, #dimension_text_width_5632, #dimension_text_height_5630, #dimension_text_height_5631, #dimension_text_height_5632', function () {

	//Toiture pré-selecionado
	$("img[data-id-value='31361']").addClass('selected-value').trigger('click');
});

//  Carport Aluminium Adossé Classique Sur Mesure - 640294

var lengthCAA = 0

$(document).on('change', '#dimension_text_width_5640, #dimension_text_width_5641, #dimension_text_width_5642, #dimension_text_height_5640, #dimension_text_height_5641, #dimension_text_height_5642', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();
	var heightPE = $('#dimension_text_height_' + groupvalue).val();

  //3 postes -  comprimento superior a 4000 mm
  if (heightPE > 4000 && heightPE <= 8000 && widthPE >= 2500 && widthPE <= 4000) {
		$('#carportclassiqueado_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 3 poteaux.");

  //2 postes - comprimento igual ou inferior a 4000 mm
	} else if (heightPE >= 2000 && heightPE <= 4000 && widthPE >= 2500 && widthPE <= 4000) {
		$('#carportclassiqueado_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 2 poteaux.");
	}

  else {
    $('#carportclassiqueado_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 4000 mm, un poteau central est ajouté.");
  }

	lengthCAA = heightPE;


});

$(document).on('change', '#dimension_text_width_5414, #dimension_text_width_5415, #dimension_text_width_5416', function () {

	var groupvalue = $(this).attr('data-group');
	var widthPE = $('#dimension_text_width_' + groupvalue).val();

  //3 postes -  comprimento superior a 5000 mm
  if (widthPE > 5000 && widthPE <= 7000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 6 poteaux.");

  //2 postes - comprimento igual ou inferior a 5000 mm
	} else if (widthPE >= 3000 && widthPE <= 5000) {
		$('#carport2poteaux_' + groupvalue).html("Dans ces mesures, l'abri de voiture a 4 poteaux.");
	}

  else {
    $('#carport2poteaux_' + groupvalue).html("<b>Attention:</b> Pour une longueur supérieure à 5000 mm, deux poteaux centraux sont ajoutés.");
  }
});

$(document).on('change', '#dimension_text_width_5643, #dimension_text_width_5644, #dimension_text_width_5645', function () {

  //3 postes -  comprimento superior a 4000 mm
  if (lengthCAA > 4000) {
    $("#dimension_text_height_5643").val("3"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5644").val("3"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5645").val("3"); //NDK Hauteur Other RAL
  }

  //2 postes - comprimento igual ou inferior a 4000 mm
  else {
    $("#dimension_text_height_5643").val("2"); //NDK Hauteur RAL Standard
    $("#dimension_text_height_5644").val("2"); //NDK Hauteur RAL Not Standard
    $("#dimension_text_height_5645").val("2"); //NDK Hauteur Other RAL
  }
});


/*
-----------------------------------------------------------------------------
*			Migueel- 	ABRI Module Carport + Abris jardin  (controlo de visivilidade)     *
-----------------------------------------------------------------------------
HideAllFieldsCarpot -> Desativa todos os campos e ativo só um (@arrayFields = array dos campos desativado,  @fieldShow = campos que vai ativar)
*/

function HideAllFieldsCarpot(arrayFields, fieldShow) {
	for (var i = 0; i < arrayFields.length; i++) {
    console.log(	arrayFields[i] +' - '+ fieldShow);
		if (arrayFields[i] == fieldShow) {
			ShowField(fieldShow);
		} else {
			RemoveField(arrayFields[i]);
      $("li.accessory-ndk-no-quantity[data-group='"+arrayFields[i]+"']").each(function(i)
      {
        idFieldValueNDKFor = $(this).attr('data-id-value');
        RemoveAllOrtherSelectOptions(idFieldValueNDKFor, arrayFields[i]);
      });
		}
	}
}

//  Controlo de Campos de Cores para fazer parecer a option Correspondente
$(document).on('click', '.color-ndk', function () {
  var arrayColorPorte = []
  arrayColorPorte = ["2944", "4019", "4020", "4021", "4022", "4023", "4024", "4025", "4026", "4027", "4028", "4029"];
  var fieldShow = [];
  fieldShow = ["2948", "3003"];
  var dataId = 0
  dataId = $(this).attr('data-group');


  if ($.inArray(dataId, arrayColorPorte) !== -1) {
    campoCor = $("li[data-group='" + dataId + "'].color-ndk.selected-value").data("value");

    if (campoCor.match(/7016/)) {
      HideAllFieldsCarpot(fieldShow, "2948");
    } else if (campoCor.match(/9016/)) {
      HideAllFieldsCarpot(fieldShow, "3003");
    }
  }
});

/*
-----------------------  Inicio das abrigos  ----------------------------------------
 Autor :: Vasco


*/

// Abri oeillet - Aster
$(".img-value-4457").click(function () {
	var porteArray = [
		[26580, 26582],
		[26581, 26583],
		[26582, 26580],
		[26583, 26581],
	]
	porte1 = $(".img-value-4453.selected-value").attr("data-id-value");
	porte2 = $(".img-value-4454.selected-value").attr("data-id-value");

	if ("undefined" != typeof porte1)
		porteTMP = porte1;
	else if ("undefined" != typeof porte2) {
		porteTMP = porte2;
	} else {
		porteTMP = 26580;
	}

	dimenoes = $(this).attr("data-id-value");
	console.log(dimenoes);
	if (26590 == dimenoes) {
		RemoveField(4454);
		updatePriceNdk(0, 4454);
		ShowField(4453);
	}
	else {
		RemoveField(4453);
		updatePriceNdk(0, 4453);
		ShowField(4454);
	}

	if ("undefined" != typeof porte1 ||  "undefined" != typeof porte2){
		for (i = 0; i < porteArray.length; i++) {
			if (porteArray[i][0] == porteTMP) {
			   	$(".img-value[data-id-value='" + porteArray[i][1] + "']").trigger("click");
			}
		}
	}
});

$(".img-value-4453, .img-value-4454").click(function () {
	campoCor = $("li[data-group='4450'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4451.selected-value").attr("data-id-value");

	porte = $(this).attr("data-id-value");
	var 	dimenoesArray  = { 26580: 26590, 26581: 26590, 26582: 26591,  26583: 26591};

	dimenoes =	dimenoesArray[porte] ;

	if( "undefined" == typeof sentido){
		sentido = 26574;
	 }
	 console.log(sentido);
	 if("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4450);
		 CustomizedImagemNDK(4450, dimenoes + "-" + porte + "-" + sentido, "abri/aster", 2, "jpg")
	}
});

$(".color-ndk[data-group='4450']").click(function () {
	campoCor = $(this).data("value");
	porte1 = $(".img-value-4453.selected-value").attr("data-id-value");
	porte2 = $(".img-value-4454.selected-value").attr("data-id-value");

	if ("undefined" != typeof porte1)
		porte = porte1;
	else if ("undefined" != typeof porte2) {
		porte = porte2;
	} else {
		porte = 26580;
	}

	sentido = $(".img-value-4451.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4457.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26574;
	 }

	RemoverCustomizedSpecificImagemNDK(4450);
	CustomizedImagemNDKColor(campoCor, 4450, dimenoes + "-" + porte + "-" + sentido, "abri/aster", 2, "jpg");
});


$(".img-value-4451").click(function () {
	campoCor = $("li[data-group='4450'].color-ndk.selected-value").data("value");
	porte1 = $(".img-value-4453.selected-value").attr("data-id-value");
	porte2 = $(".img-value-4454.selected-value").attr("data-id-value");
	if ("undefined" != typeof porte1)
		porte = porte1;
	else if ("undefined" != typeof porte2) {
		porte = porte2;
	} else {
		porte = 26580;
	}
	dimenoes = $(".img-value-4457.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4450);
	sentido = $(this).attr("data-id-value"),
	CustomizedImagemNDK(4450, dimenoes + "-" + porte + "-" + sentido, "abri/aster", 2, "jpg")
});

// *****************************Abri Rose - Iris **********************************
$(".img-value-4458").click(function () {
		var porteArray = [
				[26594, 26596],
				[26595, 26597],
				[26596, 26594],
				[26597, 26595],
		]
		porte1 = $(".img-value-4459.selected-value").attr("data-id-value");
		porte2 = $(".img-value-4460.selected-value").attr("data-id-value");

		if ("undefined" != typeof porte1)
				porteTMP = porte1;
		else if ("undefined" != typeof porte2) {
				porteTMP = porte2;
		} else {
				porteTMP = 26596;
		}

		dimenoes = $(this).attr("data-id-value");
		console.log(dimenoes);
		if (26592 == dimenoes) {
				RemoveField(4459);
				updatePriceNdk(0, 4459);
				ShowField(4460);
		}
		else {
				RemoveField(4460);
				updatePriceNdk(0, 4460);
				ShowField(4459);
		}

		if ("undefined" != typeof porte1 ||  "undefined" != typeof porte2){
				for (i = 0; i < porteArray.length; i++) {
						if (porteArray[i][0] == porteTMP) {
								$(".img-value[data-id-value='" + porteArray[i][1] + "']").trigger("click");
						}
				}
		}
});

$(".img-value-4459, .img-value-4460").click(function () {
	campoCor = $("li[data-group='4461'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4462.selected-value").attr("data-id-value");

	porte = $(this).attr("data-id-value");
	var 	dimenoesArray  = { 26596: 26592, 26597: 26592, 26594: 26593,  26595: 26593};

	dimenoes =	dimenoesArray[porte] ;

	if( "undefined" == typeof sentido){
		sentido = 26600;
	 }
	 console.log(sentido);
	 if("undefined" != typeof campoCor ){
	 	RemoverCustomizedSpecificImagemNDK(4461);
		 CustomizedImagemNDK(4461, dimenoes + "-" + porte + "-" + sentido, "abri/iris", 2, "jpg")
	}
});

$(".color-ndk[data-group='4461']").click(function () {
	campoCor = $(this).data("value");
	porte1 = $(".img-value-4459.selected-value").attr("data-id-value");
	porte2 = $(".img-value-4460.selected-value").attr("data-id-value");

	if ("undefined" != typeof porte1)
		porte = porte1;
	else if ("undefined" != typeof porte2) {
		porte = porte2;
	} else {
		porte = 26596;
	}

	sentido = $(".img-value-4462.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4458.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26600;
	 }

	RemoverCustomizedSpecificImagemNDK(4461);
	CustomizedImagemNDKColor(campoCor, 4461, dimenoes + "-" + porte + "-" + sentido, "abri/iris", 2, "jpg");
});


$(".img-value-4462").click(function () {
	campoCor = $("li[data-group='4461'].color-ndk.selected-value").data("value");
	porte1 = $(".img-value-4459.selected-value").attr("data-id-value");
	porte2 = $(".img-value-4460.selected-value").attr("data-id-value");

	if ("undefined" != typeof porte1)
		porte = porte1;
	else if ("undefined" != typeof porte2) {
		porte = porte2;
	} else {
		porte = 26596;
	}
	dimenoes = $(".img-value-4458.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4461);
	sentido = $(this).attr("data-id-value"),
	CustomizedImagemNDK(4461, dimenoes + "-" + porte + "-" + sentido, "abri/iris", 2, "jpg")
});


// *****************************Abri Rose - Coquelicot **********************************
$(".img-value-4463").click(function () {
	campoCor = $("li[data-group='4464'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4465.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26608;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4464);
		CustomizedImagemNDK(4464, dimenoes + "-" + sentido, "abri/coquelicot", 2, "jpg")
	}
});

$(".color-ndk[data-group='4464']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4465.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4463.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26608;
	 }

	RemoverCustomizedSpecificImagemNDK(4464);
	CustomizedImagemNDKColor(campoCor, 4464, dimenoes + "-" + sentido, "abri/coquelicot", 2, "jpg");
});


$(".img-value-4465").click(function () {
	campoCor = $("li[data-group='4464'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4463.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4464);
	CustomizedImagemNDK(4464, dimenoes + "-" + sentido, "abri/coquelicot", 2, "jpg");
});


// *****************************Abri Orchidée - Bouton  **********************************
$(".img-value-4467").click(function () {
	campoCor = $("li[data-group='4468'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4469.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26622;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4468);
		CustomizedImagemNDK(4468, dimenoes + "-" + sentido, "abri/bouton", 2, "jpg")
	}
});

$(".color-ndk[data-group='4468']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4469.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4467.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26622;
	 }

	RemoverCustomizedSpecificImagemNDK(4468);
	CustomizedImagemNDKColor(campoCor, 4468, dimenoes + "-" + sentido, "abri/bouton", 2, "jpg");
});


$(".img-value-4469").click(function () {
	campoCor = $("li[data-group='4468'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4467.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4468);
	CustomizedImagemNDK(4468, dimenoes + "-" + sentido, "abri/bouton", 2, "jpg");
});

// *****************************Abri Mimosa - Trefle  **********************************
$(".img-value-4470").click(function () {
	campoCor = $("li[data-group='4471'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4472.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26638;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4471);
		CustomizedImagemNDK(4471, dimenoes + "-" + sentido, "abri/trefle", 2, "jpg")
	}
});

$(".color-ndk[data-group='4471']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4472.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4470.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26638;
	 }

	RemoverCustomizedSpecificImagemNDK(4471);
	CustomizedImagemNDKColor(campoCor, 4471, dimenoes + "-" + sentido, "abri/trefle", 2, "jpg");
});


$(".img-value-4472").click(function () {
	campoCor = $("li[data-group='4471'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4470.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4471);
	CustomizedImagemNDK(4471, dimenoes + "-" + sentido, "abri/trefle", 2, "jpg");
});


// *****************************Abri Jonquille - Marguerite   **********************************
$(".img-value-4473").click(function () {
	campoCor = $("li[data-group='4474'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4475.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26651;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4474);
		CustomizedImagemNDK(4474, dimenoes + "-" + sentido, "abri/jonquille", 2, "jpg")
	}
});

$(".color-ndk[data-group='4474']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4475.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4473.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26651;
	 }

	RemoverCustomizedSpecificImagemNDK(4474);
	CustomizedImagemNDKColor(campoCor, 4474, dimenoes + "-" + sentido, "abri/jonquille", 2, "jpg");
});


$(".img-value-4475").click(function () {
	campoCor = $("li[data-group='4474'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4473.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4474);
	CustomizedImagemNDK(4474, dimenoes + "-" + sentido, "abri/jonquille", 2, "jpg");
});

// *****************************Abri lavande - PISSENLIT   **********************************
$(".img-value-4476").click(function () {
	campoCor = $("li[data-group='4477'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4478.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26664;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4477);
		CustomizedImagemNDK(4477, dimenoes + "-" + sentido, "abri/lavande", 2, "jpg")
	}
});

$(".color-ndk[data-group='4477']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4478.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4476.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26664;
	 }

	RemoverCustomizedSpecificImagemNDK(4477);
	CustomizedImagemNDKColor(campoCor, 4477, dimenoes + "-" + sentido, "abri/lavande", 2, "jpg");
});


$(".img-value-4478").click(function () {
	campoCor = $("li[data-group='4477'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4476.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4477);
	CustomizedImagemNDK(4477, dimenoes + "-" + sentido, "abri/lavande", 2, "jpg");
});


// *****************************Abri anemone - pensee  **********************************
$(".img-value-4479").click(function () {
	campoCor = $("li[data-group='4480'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4481.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26677;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4480);
		CustomizedImagemNDK(4480, dimenoes + "-" + sentido, "abri/pensee", 2, "jpg")
	}
});

$(".color-ndk[data-group='4480']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4481.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4479.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26677;
	 }

	RemoverCustomizedSpecificImagemNDK(4480);
	CustomizedImagemNDKColor(campoCor, 4480, dimenoes + "-" + sentido, "abri/pensee", 2, "jpg");
});


$(".img-value-4481").click(function () {
	campoCor = $("li[data-group='4480'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4479.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4480);
	CustomizedImagemNDK(4480, dimenoes + "-" + sentido, "abri/pensee", 2, "jpg");
});

// *****************************Abri Azalée - camomille  **********************************
$(".img-value-4485").click(function () {
	campoCor = $("li[data-group='4486'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4487.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26695;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4486);
		CustomizedImagemNDK(4486, dimenoes + "-" + sentido, "abri/camomille", 2, "jpg")
	}
});

$(".color-ndk[data-group='4486']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4487.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4485.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26695;
	 }

	RemoverCustomizedSpecificImagemNDK(4486);
	CustomizedImagemNDKColor(campoCor, 4486, dimenoes + "-" + sentido, "abri/camomille", 2, "jpg");
});


$(".img-value-4487").click(function () {
	campoCor = $("li[data-group='4486'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4485.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4486);
	CustomizedImagemNDK(4486, dimenoes + "-" + sentido, "abri/camomille", 2, "jpg");
});

// ***************************** Garage - polygarage  **********************************
$(".img-value-4501").click(function () {
	campoCor = $("li[data-group='4502'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4503.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26738;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4502);
		CustomizedImagemNDK(4502, dimenoes + "-" + sentido, "abri/polygarage", 2, "jpg")
	}
});

$(".color-ndk[data-group='4502']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4503.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4501.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26738;
	 }

	RemoverCustomizedSpecificImagemNDK(4502);
	CustomizedImagemNDKColor(campoCor, 4502, dimenoes + "-" + sentido, "abri/polygarage", 2, "jpg");
});


$(".img-value-4503").click(function () {
	campoCor = $("li[data-group='4502'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4501.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4502);
	CustomizedImagemNDK(4502, dimenoes + "-" + sentido, "abri/polygarage", 2, "jpg");
});

// ***************************** Garage - Double polygarage  **********************************
$(".img-value-4510").click(function () {
	campoCor = $("li[data-group='4502'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4503.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26738;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4502);
		CustomizedImagemNDK(4502, dimenoes + "-" + sentido, "abri/polygarage", 2, "jpg")
	}
});

$(".color-ndk[data-group='4502']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4503.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4501.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26738;
	 }

	RemoverCustomizedSpecificImagemNDK(4502);
	CustomizedImagemNDKColor(campoCor, 4502, dimenoes + "-" + sentido, "abri/polygarage", 2, "jpg");
});


$(".img-value-4503").click(function () {
	campoCor = $("li[data-group='4502'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4501.selected-value").attr("data-id-value");
	sentido = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4502);
	CustomizedImagemNDK(4502, dimenoes + "-" + sentido, "abri/polygarage", 2, "jpg");
});


// ***************************** Garage - Double polygarage  **********************************
$(".img-value-4510").click(function () {
	campoCor = $("li[data-group='4511'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4512.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26770;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4511);
		CustomizedImagemNDK(4511, dimenoes + "-" + sentido, "abri/doublepolygarage", 2, "jpg")
	}
});

$(".color-ndk[data-group='4511']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4512.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4510.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26770;
	 }

	RemoverCustomizedSpecificImagemNDK(4511);
	CustomizedImagemNDKColor(campoCor, 4511, dimenoes + "-" + sentido, "abri/doublepolygarage", 2, "jpg");
});


$(".img-value-4512").click(function () {
	campoCor = $("li[data-group='4511'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4510.selected-value").attr("data-id-value");
	sentido 	   = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4511);
	CustomizedImagemNDK(4511, dimenoes + "-" + sentido, "abri/doublepolygarage", 2, "jpg");
});

// ***************************** Garage - Toit Plat  **********************************
$(".img-value-4514").click(function () {
	campoCor = $("li[data-group='4515'].color-ndk.selected-value").data("value");
	dimenoes   = $(this).attr("data-id-value");

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4515);
		CustomizedImagemNDK(4515, dimenoes, "abri/toitplatgarage", 2, "jpg")
	}
});

$(".color-ndk[data-group='4515']").click(function () {
	campoCor = $(this).data("value");
	dimenoes  = $(".img-value-4514.selected-value").attr("data-id-value");

	RemoverCustomizedSpecificImagemNDK(4511);
	CustomizedImagemNDKColor(campoCor, 4515, dimenoes, "abri/toitplatgarage", 2, "jpg");
});

// ***************************** Garage - Double Toit Plat   **********************************
$(".img-value-4518").click(function () {
	campoCor = $("li[data-group='4519'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4521.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26804;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4519);
		CustomizedImagemNDK(4519, dimenoes + "-" + sentido, "abri/doubletoitplatgarage", 2, "jpg")
	}
});

$(".color-ndk[data-group='4519']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4521.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4518.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26804;
	 }

	RemoverCustomizedSpecificImagemNDK(4519);
	CustomizedImagemNDKColor(campoCor, 4519, dimenoes + "-" + sentido, "abri/doubletoitplatgarage", 2, "jpg");
});


$(".img-value-4521").click(function () {
	campoCor = $("li[data-group='4519'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4518.selected-value").attr("data-id-value");
	sentido 	   = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4519);
	CustomizedImagemNDK(4519, dimenoes + "-" + sentido, "abri/doubletoitplatgarage", 2, "jpg");
});

// ***************************** Combiné Carport et Abri  **********************************
$(".img-value-4523").click(function () {
	campoCor = $("li[data-group='4524'].color-ndk.selected-value").data("value");
	sentido = $(".img-value-4525.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	var dimensoesCAArray = {
		"26810": 26874,
		"26811": 26875,
		"26812": 26876,
		"26813": 26877,
		"26814": 26878,
		"26815": 26879,
		"26822": 26880,
		"26823": 26881,
		"26824": 26882,
		"26825": 26883,
		"26826": 26884,
		"26827": 26885,
	}
	$(".img-value-4540[data-id-value='"+dimensoesCAArray [dimenoes]+"']").trigger('click');

	if( "undefined" == typeof sentido){
		sentido = 26818;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4524);
		CustomizedImagemNDK(4524, dimenoes + "-" + sentido, "abri/abricarport", 2, "jpg")
	}
});

$(".color-ndk[data-group='4524']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-4525.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4523.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26818;
	 }

	RemoverCustomizedSpecificImagemNDK(4524);
	CustomizedImagemNDKColor(campoCor, 4524, dimenoes + "-" + sentido, "abri/abricarport", 2, "jpg");
});


$(".img-value-4525").click(function () {
	campoCor = $("li[data-group='4524'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4523.selected-value").attr("data-id-value");
	sentido 	   = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4524);
	CustomizedImagemNDK(4524, dimenoes + "-" + sentido, "abri/abricarport", 2, "jpg");
});

// ***************************** Combiné Garage et Abri  **********************************

$(".img-value-4528").click(function () {
	campoCor = $("li[data-group='4529'].color-ndk.selected-value").data("value");
	sentido 	   = $(".img-value-4530.selected-value").attr("data-id-value");
	dimenoes = $(this).attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26836;
	 }

	if ("undefined" != typeof campoCor ){
		RemoverCustomizedSpecificImagemNDK(4529);
		CustomizedImagemNDK(4529, dimenoes + "-" + sentido, "abri/abrigarage", 2, "jpg")
	}
});

$(".color-ndk[data-group='4529']").click(function () {
	campoCor = $(this).data("value");
	sentido 	   = $(".img-value-4530.selected-value").attr("data-id-value");
	dimenoes = $(".img-value-4528.selected-value").attr("data-id-value");

	if( "undefined" == typeof sentido){
		sentido = 26836;
	 }

	RemoverCustomizedSpecificImagemNDK(4529);
	CustomizedImagemNDKColor(campoCor, 4529, dimenoes + "-" + sentido, "abri/abrigarage", 2, "jpg");
});


$(".img-value-4530").click(function () {
	campoCor = $("li[data-group='4529'].color-ndk.selected-value").data("value");
	dimenoes  = $(".img-value-4528.selected-value").attr("data-id-value");
	sentido 	   = $(this).attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(4529);
	CustomizedImagemNDK(4529, dimenoes + "-" + sentido, "abri/abrigarage", 2, "jpg");
});





// ***************************** mansion  **********************************

$(".color-ndk[data-group='4533']").click(function () {
	campoCor 	  = $(this).data("value");
	estrade		 = $(".img-value-4536.selected-value").attr("data-id-value");
	gardeCorps  = 26869;
	plancher	     = $(".img-value-4538.selected-value").attr("data-id-value");
	wood           = $(".img-value-4539.selected-value").attr("data-id-value");

	if( "undefined" == typeof estrade){
		estrade 		= 26864;
	}
	if( "undefined" == typeof gardeCorps){
		gardeCorps = 26869;
	}
	if( "undefined" == typeof plancher){
		plancher 	   = 26870;
	}
	if( "undefined" == typeof wood){
		wood 	    = 26872;
	}else{
		if( 26890 == wood){
			wood    = 26873;
		}
	}

	RemoverCustomizedSpecificImagemNDK(4533);
	CustomizedImagemNDKColor(campoCor, 4533, wood + "-" + plancher + "-" + gardeCorps + "-" + estrade, "abri/maison43", 2, "jpg");
});


$(".img-value-4536").click(function () {
	campoCor 	  = $("li[data-group='4533'].color-ndk.selected-value").data("value");
	estrade 	  	 = $(this).attr("data-id-value");
	gardeCorps  = 26869;
	plancher	     = $(".img-value-4538.selected-value").attr("data-id-value");
	wood           = $(".img-value-4539.selected-value").attr("data-id-value");

	if( "undefined" == typeof gardeCorps){
		gardeCorps = 26869;
	}
	if( "undefined" == typeof plancher){
		plancher 	   = 26870;
	}
	if( "undefined" == typeof wood){
		wood 	    = 26872;
	}else{
		if( 26890 == wood){
			wood    = 26873;
		}
	}

	RemoverCustomizedSpecificImagemNDK(4533);
	CustomizedImagemNDK(4533, wood + "-" + plancher + "-" + gardeCorps + "-" + estrade, "abri/maison43", 2, "jpg");
});

$(".img-value-4537").click(function () {
	campoCor 	  = $("li[data-group='4533'].color-ndk.selected-value").data("value");
	gardeCorps  = $(this).attr("data-id-value");

	RemoverCustomizedSpecificImagemNDK(4537);
	if(parseInt(gardeCorps) != 26869)
		CustomizedImagemNDKColor(campoCor, 4537, gardeCorps, "abri/maison43", 3, "png");
});

$(".img-value-4538").click(function () {
	campoCor 	  = $("li[data-group='4533'].color-ndk.selected-value").data("value");
	estrade		 = $(".img-value-4536.selected-value").attr("data-id-value");
	gardeCorps  = 26869;
	plancher 	     = $(this).attr("data-id-value");
	wood           = $(".img-value-4539.selected-value").attr("data-id-value");

	if( "undefined" == typeof wood){
		wood 	    = 26872;
	}else{
		if( 26890 == wood){
			wood    = 26873;
		}
	}

	RemoverCustomizedSpecificImagemNDK(4533);
	CustomizedImagemNDK(4533, wood + "-" + plancher + "-" + gardeCorps + "-" + estrade, "abri/maison43", 2, "jpg");
});

$(".img-value-4539").click(function () {
	campoCor 	  = $("li[data-group='4533'].color-ndk.selected-value").data("value");
	estrade		 = $(".img-value-4536.selected-value").attr("data-id-value");
	gardeCorps  = 26869;
	plancher 	     = $(".img-value-4538.selected-value").attr("data-id-value");
	wood           =  $(this).attr("data-id-value");

	if( 26890 == wood){
		wood    = 26873;
	}

	RemoverCustomizedSpecificImagemNDK(4533);
	CustomizedImagemNDK(4533, wood + "-" + plancher + "-" + gardeCorps + "-" + estrade, "abri/maison43", 2, "jpg");
});


// ****************** Carport Autoporté Toit Plat avec Dégagement Sur Mesure - 640265 ***********************
//Campo Sentido
$(".img-value-5419").click(function () {
	campoCor = $("li[data-group='5418'].color-ndk.selected-value").data("value");
	sentido = $(this).attr("data-id-value");

	if ("undefined" != typeof campoCor) {
    RemoverCustomizedSpecificImagemNDK(5418);
    CustomizedImagemNDK(5418, sentido, "abri/carportdegagementauto", 3, "png");
  }
});

//Campo Cor
$(".color-ndk[data-group='5418']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-5419.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(5418);
	CustomizedImagemNDKColor(campoCor, 5418, sentido, "abri/carportdegagementauto", 3, "png");
});

// ****************** Carport Adossé Latéral Toit Plat avec Dégagement Sur Mesure - 640266 ***********************
//Campo Sentido
$(".img-value-5429").click(function () {
	campoCor = $("li[data-group='5427'].color-ndk.selected-value").data("value");
	sentido = $(this).attr("data-id-value");

	if ("undefined" != typeof campoCor) {
    RemoverCustomizedSpecificImagemNDK(5427);
    CustomizedImagemNDK(5427, sentido, "abri/carportdegagementadolat", 3, "png");
  }
});

//Campo Cor
$(".color-ndk[data-group='5427']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-5429.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(5427);
	CustomizedImagemNDKColor(campoCor, 5427, sentido, "abri/carportdegagementadolat", 3, "png");
});

// ****************** Carport Adossé Arrière Toit Plat avec Dégagement Sur Mesure - 640267 ***********************
//Campo Sentido
$(".img-value-5435").click(function () {
	campoCor = $("li[data-group='5433'].color-ndk.selected-value").data("value");
	sentido = $(this).attr("data-id-value");

	if ("undefined" != typeof campoCor) {
    RemoverCustomizedSpecificImagemNDK(5433);
    CustomizedImagemNDK(5433, sentido, "abri/carportdegagementadoarr", 3, "png");
  }
});

//Campo Cor
$(".color-ndk[data-group='5433']").click(function () {
	campoCor = $(this).data("value");
	sentido = $(".img-value-5435.selected-value").attr("data-id-value");
	RemoverCustomizedSpecificImagemNDK(5433);
	CustomizedImagemNDKColor(campoCor, 5433, sentido, "abri/carportdegagementadoarr", 3, "png");
});

// Carport Aluminium Adossé Classique Sur Mesure - 640292 // 640293 // 640924 // 640295
var trapezeCarportClassique= [
  [2501, 625, ''],
  [3001, 800, ''],
  [3501, 998, ''],
  [4001, 1248, ''],
];

$(document).on('change', '#dimension_text_width_5620, #dimension_text_width_5621, #dimension_text_width_5622, #dimension_text_width_5630, #dimension_text_width_5631, #dimension_text_width_5632, #dimension_text_width_5640, #dimension_text_width_5641, #dimension_text_width_5642, #dimension_text_width_5649, #dimension_text_width_5650, #dimension_text_width_5651',function () {
	groupvalue = $(this).attr('data-group');
	heightPE = $('#dimension_text_width_' + groupvalue).val();

	for (i = 0; i < trapezeCarportClassique.length; i++) {
		if (heightPE < trapezeCarportClassique[i][0]) {
      var pricedesc = trapezeCarportClassique[i][1]-(trapezeCarportClassique[i][1]*valorReducao);
				$('#price_31328').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31328').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31329').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31329').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31359').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31359').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31360').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31360').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31385').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31385').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31386').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31386').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31409').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31409').attr('data-price', trapezeCarportClassique[i][1]);
				$('#price_31410').html('<i> + <s>'+trapezeCarportClassique[i][1]+' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span></i>');
				$('#ndk-accessory-quantity-31410').attr('data-price', trapezeCarportClassique[i][1]);
			break;
		}
	}

});

// Calculo area telhado carport

function CalculoToiture(precoML, heightT, widthT, recalculate) {
  var dim = ((parseInt(heightT)/ 1000) * (parseInt(widthT)/ 1000)) ;
  var precoTotal = dim * precoML;
  if (recalculate)
    updatePriceNdk(precoTotal, group);

  return precoTotal;
}

function AlterPriceToiture( toiture , heightPE, widthPE) {
  for (var i=0;i<toiture .length;i++) {
    precoTotal = toiture .eq(i).attr("data-price");
    if(precoTotal > 0){
      precoTotal = (CalculoToiture(precoTotal, heightPE, widthPE, false)).toFixed(2);
      var pricedesc = precoTotal-(precoTotal*valorReducao);
      $('#descriptionPrice_'+toiture .eq(i).attr("data-id-value")).html(' + <s>' + precoTotal + ' €</s><span style="color: red;"> '+pricedesc.toFixed(2)+' €</span>');
    }
  }
}
$(document).on('focusout', ".dimension_text_5620, .dimension_text_5621, .dimension_text_5622", function () { // tapee
  var toiture  = $(".img-value-5627");
	var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();
	heightCarport =widthPE;
	widthCarport = heightPE;
  AlterPriceToiture( toiture , heightPE, widthPE);
  $(".img-value-5627.selected-value").trigger('click');

});

$(document).on('focusout', ".dimension_text_5630, .dimension_text_5631 .dimension_text_5632", function () { // tapee
  var toiture  = $(".img-value-5637");
	var groupvalue = $(this).attr('data-group');
  var widthPE = $('#dimension_text_width_' + groupvalue).val();
  var heightPE = $('#dimension_text_height_' + groupvalue).val();
	heightCarport =widthPE;
	widthCarport = heightPE;
  AlterPriceToiture( toiture , heightPE, widthPE);
  $(".img-value-5637.selected-value").trigger('click');

});

$(document).on('click', ".img-value-5627", function () {
  if (typeof widthCarport !== 'undefined' && typeof heightCarport !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoToiture(precoMLaile, heightCarport, widthCarport, true);
  }
});

$(document).on('click', ".img-value-5637", function () {
  if (typeof widthCarport !== 'undefined' && typeof heightCarport !== 'undefined') {
    var precoMLaile = $(this).data('price');
    CalculoToiture(precoMLaile, heightCarport, widthCarport, true);
  }
});


