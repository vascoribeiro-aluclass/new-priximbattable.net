/*
************************************************************************************************************************
*                                                                                                                      *
*                                          FUNÇÕES GLOBAIS NDK ALUCLASS                                                *
*                                                                                                                      *
************************************************************************************************************************
*/

function ActiveFieldNDK(obj) {
  var position = $(obj).closest('[data-position]');
  next_position = position.data('position') + 1;
  $(".form-group[data-position='" + next_position + "']").removeClass("aluclass-disable-div");
  var iteration = $(obj).closest('[data-iteration]');
  next_iteration = iteration.data('iteration') + 1;
  $(".form-group[data-iteration='" + next_iteration + "']").removeClass("aluclass-disable-div");
  var rposition = $(obj).closest('[data-rposition]');
  next_rposition = rposition.data('rposition') + 1;
  $(".form-group[data-rposition='" + next_rposition + "']").removeClass("aluclass-disable-div");
}

function GetRequiredProgressBar(required) {
  var requiredcount = 0;
  var group = 0;

  required.each(function () {
    $(".progress-field-ndk-" + $(this).parent().parent().parent().attr('data-field')).remove();
    if ($(this).is(':radio')) {
      if (parseInt($(this).parent().parent().parent().attr('data-field')) != parseInt(group)) {
        group = $(this).parent().parent().parent().attr('data-field');
        requiredcount++;
      }
    } else {
      var check_verificaCampo = ["11", "23", "17", "24"];
      verificaCampo = $(this).parent().parent().parent().attr('data-typefield'); /* paulo - ignora erro de qtd */
      if ($.inArray(verificaCampo, check_verificaCampo) === -1) {
        if (parseInt($(this).parent().parent().parent().attr('data-field')) != parseInt(group)) {
          group = $(this).parent().parent().parent().attr('data-field');
          requiredcount++;
        }
      }
    }
  });

  return requiredcount;
}


function GetSelectProgressBar(required) {
  var selectcount = 0;
  var groupSelect = 0;

  required.each(function () {

    val = $(this).val();
    if ($(this).is(':radio')) {
      if ($(this).is(':checked')) {
        groupSelect = $(this).parent().parent().parent().attr('data-field');

        selectcount++;
        $("div[data-field='" + groupSelect + "'] > label.toggler").append('<span class="progress-field progress-field-ndk-' + groupSelect + '"> <span class="material-icons progress-field-success"> done </span> </span>');
      }
    } else if ($(this).is('select')) {
      if (!val) {
      } else {
        if (parseInt($(this).parent().parent().parent().attr('data-field')) != parseInt(groupSelect)) {
          groupSelect = $(this).parent().parent().parent().attr('data-field');
          $("div[data-field='" + groupSelect + "'] > label.toggler").append('<span class="progress-field progress-field-ndk-' + groupSelect + '"> <span class="material-icons progress-field-success"> done </span> </span>');
          selectcount++;
        }
      }
    } else {
      if (val == '' || val.slice(-2) == ': ') {
      } else {
        if (parseInt($(this).parent().parent().parent().attr('data-field')) != parseInt(groupSelect)) {
          groupSelect = $(this).parent().parent().parent().attr('data-field');
          $("div[data-field='" + groupSelect + "'] > label.toggler").append('<span class="progress-field progress-field-ndk-' + groupSelect + '"> <span class="material-icons progress-field-success"> done </span> </span>');
          selectcount++;
        }
      }
    }
  });

  return selectcount;
}


//  progressBar
function ProgressBar() {
  var required = $(".form-group:not([class*='disabled_value_by'])").find('.required_field');
  var requiredcount = 0;
  var selectcount = 0;

  requiredcount = GetRequiredProgressBar(required);
  selectcount = GetSelectProgressBar(required);

  progress = (selectcount / requiredcount) * 100;

  if (parseInt(progress) >= 0 && parseInt(progress) < 20) {
    color = "#E22128";
  } else if (parseInt(progress) >= 20 && parseInt(progress) < 40) {
    color = "#e25821e7";
  } else if (parseInt(progress) >= 40 && parseInt(progress) < 60) {
    color = "#a78528";
  } else if (parseInt(progress) >= 60 && parseInt(progress) < 80) {
    color = "#d6e232";
  } else if (parseInt(progress) >= 80 && parseInt(progress) < 99) {
    color = "#81a728";
  } else {
    color = "#28a745";
  }

  if (progress > 0) {
    $('.progress-text-begin').hide();
  } else {
    $('.progress-text-begin').show();
  }

  $(".progress-bar").css({ 'background-color': color });
  $(".progress-bar").css({ 'width': parseInt(progress) + '%' });
  if (parseInt(progress) > 34)
    $(".progress-text").text('Progression : ' + parseInt(progress) + '%');
  else
    $(".progress-text").text('' + parseInt(progress) + '%');

}

    //open modal Devis - Vasco aluclass
$('#modalEmbedDevisProd_close').click(function () {
    $('#modalEmbedDevisProd').modal('hide');
    return false;
});

$('.embedAluDevisProd').click(function () {
    var required = $(".form-group:not([class*='disabled_value_by'])").find('.required_field');
    var requiredcount = 0;
    var selectcount = 0;

    requiredcount = GetRequiredProgressBar(required);
    selectcount = GetSelectProgressBar(required);

    progress = (selectcount / requiredcount) * 100;

    if(progress < 99){
      $("#modalinfomessage").html('Bitte füllen Sie alle Pflichtfelder aus, bevor Sie einen Kostenvoranschlag anfordern.');
      $('#modalEmbedDevisProd').modal('hide');
      $("#modalinfo").modal('show');
      return false;
    }else{
      $('#customer-information-prod').show();
      $('#devis-messagem-prod').hide();

      $('#modalEmbedDevisProd').modal('show');



      return false;
    }
});

// Mostra erro no próprio campo NDK [groupid = id do campo NDK; message = messagem a ser mostada]
function ShowNDKFieldError(groupid, message) {
  $('.submitContainer').hide();
  $('.div_PrazoEntregaDir').hide();
  $(".submitNdkcsfields").hide();
  $(".mon_devis").hide();
  $(".form-group[data-field='" + groupid + "']").css('background', '#F2DEDE').focus();
  $(".form-group[data-field='" + groupid + "']").parent().find('.error').remove();
  $(".form-group[data-field='" + groupid + "']").append(message);
}
// Remove erro no próprio campo NDK [groupid = id do campo NDK]
function HideNDKFieldError(groupid) {
  $(".form-group[data-field='" + groupid + "']").css('background', '#ffffff').focus();
  $(".form-group[data-field='" + groupid + "']").parent().find('.error').remove();
  $('.submitContainer').show();
  $('.div_PrazoEntregaDir').show();
  $(".submitNdkcsfields").show();
  $(".mon_devis").show();
}

//mostra campo ndk e coloca o campo como obrigatório [idFieldNDKAlu = id do campo NDK]
function ShowField(idFieldNDKAlu) {
  $("div[data-field='" + idFieldNDKAlu + "']").show();
  $("#ndkcsfield_" + idFieldNDKAlu + "").addClass("required_field");
}
//remove campo ndk e remove o obrigatório do campo, e a seleção [idFieldNDKAlu = id do campo NDK]
function RemoveField(idFieldNDKAlu) {
  $("img[data-group='" + idFieldNDKAlu + "']").removeClass("selected-value ");
  $("img[data-group='" + idFieldNDKAlu + "']").removeClass("selected-color");
  $("#ndkcsfield_" + idFieldNDKAlu + "").removeClass("required_field");
  $("div[data-field='" + idFieldNDKAlu + "']").hide();
  $("#visual_" + idFieldNDKAlu + "").remove();
}

//HideAllFields -> Desativa todos os campos e ativo só um (@arrayFields = array dos campso desativado,  @fieldShow = campos que vai ativar)

function HideAllFields(arrayFields, fieldShow) {
  for (var i = 0; i < arrayFields.length; i++) {
    if (arrayFields[i] == fieldShow) {
      ShowField(fieldShow);
    } else {
      RemoveField(arrayFields[i]);
      updatePriceNdk(0, arrayFields[i]);
      $('#ndkcsfield_' + arrayFields[i]).val('');
    }
  }
}

// Verifica se uma imagem existe [url = camindo da imagem]
function CheckSeImgExiste(url) {

  var http = new XMLHttpRequest();
  http.open('HEAD', url, false);
  http.send();
  return http.status != 404;
}

//Remove todas as imgens custemizadas
function RemoverCustomizedImagemNDK() {
  $("div").remove(".aluclass_img_customized");
}

//Remove todas as imgens custemizadas
function RemoverCustomizedSpecificImagemNDK(idFieldNDKSelect) {
  $("div").remove(".aluclass_customizedimagem_" + idFieldNDKSelect);
}

function GlobalCustomizedImagemNDK(nameImage, pastaImagens, zIndex, formatImagem) {
  if (CheckSeImgExiste("https://" + document.domain + "/img/" + pastaImagens + "/" + nameImage + "." + formatImagem)) {
    $("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_img_customized' style='z-index: " + zIndex + ";'><img class='composition_element img-reponsive'  src='/img/" + pastaImagens + "/" + nameImage + "." + formatImagem + "'/></div>");
  }
}

//Inserer uma imagem Custimizada
//[idFieldNDK = id do campo cor do NDK; idValueFieldNDK = id value do campo ndk que vai aparecer a imagem;
// pastaImagens =  pasta onde as imagens estão; zIndex = posição no eixo do Z (profundidade) 0 mais afastado 10 mais perto; formatImagem = formato da imagem PNG ou JPG ]
function CustomizedImagemNDK(idFieldNDK, idValueFieldNDK, pastaImagens, zIndex, formatImagem) {

  campoCor = $("li[data-group='" + idFieldNDK + "'].color-ndk.selected-value").data("value");
  if (campoCor.match(/7016/)) {
    cor = "7016";
  } else if (campoCor.match(/9016/)) {
    cor = "9016";
  } else if (campoCor.match(/9005/)) {
    cor = "9005";
  } else if (campoCor.match(/8019/)) {
    cor = "8019";
  } else if (campoCor.match(/8014/)) {
    cor = "8014";
  } else if (campoCor.match(/7035/)) {
    cor = "7035";
  } else if (campoCor.match(/6005/)) {
    cor = "6005";
  } else if (campoCor.match(/5015/)) {
    cor = "5015";
  } else if (campoCor.match(/5013/)) {
    cor = "5013";
  } else if (campoCor.match(/3005/)) {
    cor = "3005";
  } else if (campoCor.match(/1015/)) {
    cor = "1015";
  } else {
    cor = "7016";
  }

  if (!$("div.aluclass_" + idValueFieldNDK + "").length) {
    if (CheckSeImgExiste("https://" + document.domain + "/img/" + pastaImagens + "/" + idValueFieldNDK + "-" + cor + "." + formatImagem)) {
      $("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_img_customized aluclass_customizedimagem_" + idFieldNDK + " aluclass_" + idValueFieldNDK + "' style='z-index: " + zIndex + ";'><img class='composition_element img-reponsive aluclass_" + idValueFieldNDK + "' src='/img/" + pastaImagens + "/" + idValueFieldNDK + "-" + cor + "." + formatImagem + "'/></div>");
    }
  }
}

function CustomizedImagemNDKColor(campoCor, idFieldNDKSelect, idFieldNDK, pastaImagens, zIndex, formatImagem) {

  if (campoCor.match(/7016/)) {
    cor = "7016";
  } else if (campoCor.match(/9016/)) {
    cor = "9016";
  } else if (campoCor.match(/9005/)) {
    cor = "9005";
  } else if (campoCor.match(/8019/)) {
    cor = "8019";
  } else if (campoCor.match(/8014/)) {
    cor = "8014";
  } else if (campoCor.match(/7035/)) {
    cor = "7035";
  } else if (campoCor.match(/6005/)) {
    cor = "6005";
  } else if (campoCor.match(/5015/)) {
    cor = "5015";
  } else if (campoCor.match(/5013/)) {
    cor = "5013";
  } else if (campoCor.match(/3005/)) {
    cor = "3005";
  } else if (campoCor.match(/1015/)) {
    cor = "1015";
  } else {
    cor = "7016";
  }

  if (CheckSeImgExiste("https://" + document.domain + "/img/" + pastaImagens + "/" + idFieldNDK + "-" + cor + "." + formatImagem)) {
    $("#image-block").append("<div class='absolute-visu view-0 absolute-img aluclass_img_customized aluclass_customizedimagem_" + idFieldNDKSelect + "' style='z-index: " + zIndex + ";'><img class='composition_element img-reponsive aluclass_" + idFieldNDK + "' src='/img/" + pastaImagens + "/" + idFieldNDK + "-" + cor + "." + formatImagem + "'/></div>");
  }

}

function MessageCalculator(arrayOption) {
  var resultd = false;
  switch (arrayOption['operador']) {
    case '>':
      if (arrayOption['valor1'] > arrayOption['valor2'])
        resultd = true;
      break;
    case '<':
      if (arrayOption['valor1'] < arrayOption['valor2'])
        resultd = true;
      break;
    case '>=':
      if (arrayOption['valor1'] >= arrayOption['valor2'])
        resultd = true;
      break;
    case '<=':

      if (arrayOption['valor1'] <= arrayOption['valor2'])
        resultd = true;
      break;
    case '=':
      if (arrayOption['valor1'] == arrayOption['valor2'])
        resultd = true;
      break;

  }

  return resultd;

}

function MessageWarning(idNdkField, message, arrayOption) {
  $("#warning_text_" + idNdkField).html('');

  var showMessage = false;

  switch ($(".ndkackFieldItem[data-field='" + idNdkField + "']").data('typefield')) {
    case 18:
      var width = $("#dimension_text_width_" + idNdkField).val();
      message = message.replace("[%width%]", width);
      var height = $("#dimension_text_height_" + idNdkField).val();
      message = message.replace("[%height%]", height);
      var area = (parseInt(width) / 1000) * (parseInt(height) / 1000);
      message = message.replace("[%area%]", area.toFixed(2));

      if (arrayOption['valor2'] == 'area') {
        arrayOption['valor2'] = parseInt(area);
      } else if (arrayOption['valor2'] == 'width') {
        arrayOption['valor2'] = parseInt(width);
      } else if (arrayOption['valor2'] == 'height') {
        arrayOption['valor2'] = parseInt(height);
      }

      if (arrayOption['valor1'] == 'area') {
        arrayOption['valor1'] = parseInt(area);
      } else if (arrayOption['valor1'] == 'width') {
        arrayOption['valor1'] = parseInt(width);
      } else if (arrayOption['valor1'] == 'height') {
        arrayOption['valor1'] = parseInt(height);
      }

      showMessage = MessageCalculator(arrayOption)
      break;
  }

  if (showMessage) {

    $("#warning_text_" + idNdkField).html(message);
    $("#warning_text_" + idNdkField).effect("shake", "slow");
  }

}

//Remove Select Options acessorios
function RemoveSelectOptions(num, num2) {
  inputa = $("li[data-id-value='" + num + "']").find('.ndk-accessory-quantity:eq(0)');
  if (parseInt(inputa.val()) == 0) {

  }
  else {
    $("li[data-id-value='" + num + "']").removeClass('selected-accessory');
    inputa.val(0).trigger('change');
    var price = $('#ndk-accessory-quantity-' + num).attr('data-price');
    var finalprice = $("#price_" + num2).val();
    $("#price_" + num2).val(parseInt(finalprice) - parseInt(price));
  }
}



/*
************************************************************************************************************************
*                                                                                                                      *
*                                          FUNÇÕES PARA OS PRODUTOS CLÔTURE                                            *
*                                                                                                                      *
************************************************************************************************************************
*/

// Função  Passa os valores de um campo NDK para Outro [idOrigin = Campo quem tem o valor a ser passado; idDestiny = Campo a receber o valor origem]
function ChangeSelectToSelect(idOrigin, idDestiny) {
  $('#' + idDestiny + '').val($('#' + idOrigin + '').val());
  $('#' + idDestiny).trigger('change');
}
// Função  Dá a precentagem da cor [idFieldNDK = id do campo cor]
function GetPergentageColor(idFieldNDK) {
  var dataValueColor = $(".selected-color[data-group='" + idFieldNDK + "']").attr("data-value");
  var arraydataValueColor = dataValueColor.split('+');
  return (arraydataValueColor.length > 1 ? arraydataValueColor[1] : "");
}

/*
************************************************************************************************************************
*                                                                                                                      *
*                                          FUNÇÕES PARA OS PRODUTOS VERRIèRES                                          *
*                                                                                                                      *
************************************************************************************************************************
*/
// Função do preço verreire de abrir [idValueAcess = id value do campo, quantverr = quantidade de VERRIèRES,idFieldAcess = campo que vai alterar  ]
function VerreireLimitOptionOpen(idValueAcess, quantverr, idFieldAcess) {
  var price_data_value = $(".ndk-radio[data-id-value='" + idValueAcess + "']").attr('data-price');
  price_data_value = quantverr * parseInt(price_data_value);
  $('label[for=radio_' + idFieldAcess + '_' + idValueAcess + ']').text(' Ja, alle Trennwände haben eine Öffnungsoption.: + ' + price_data_value + ' €');
}

/*
************************************************************************************************************************
*                                                                                                                      *
*                                          FUNÇÕES PARA OS PRODUTOS PORTÕES                                            *
*                                                                                                                      *
************************************************************************************************************************
*/
//******* */

function RemoveAllOrtherSelectOptions(idvalue, idField) {
  inputa = $("li[data-id-value='" + idvalue + "']").find('.ndk-accessory-quantity:eq(0)');
  if (parseInt(inputa.val()) == 0) {

  }
  else {
    $("li[data-id-value='" + idvalue + "']").removeClass('selected-accessory');
    inputa.val(0).trigger('change');
    var price = $('#ndk-accessory-quantity-' + idvalue).attr('data-price');
    var finalprice = $("#price_" + idField).val();
    $("#price_" + idField).val(parseInt(finalprice) - parseInt(price));
  }
}


function ArrayShowPortillonMunich() {
  var arrayPortllon = {
    "1200": 4685,
    "1600": 4689,
    "1800": 4690,
    "1400": 4691,
  }
  return arrayPortllon;
}

function ArrayShowPortillonBerlin() {
  var arrayPortllon = {
    "1200": 4681,
    "1600": 4686,
    "1800": 4687,
    "1400": 4688,
  }
  return arrayPortllon;
}

function ArrayShowPortillonFrankfurt() {
  var arrayPortllon = {
    "1200": 4693,
    "1600": 4694,
    "1800": 4695,
    "1400": 4696,
  }
  return arrayPortllon;
}

function ArrayShowPortillonHamburg() {
  var arrayPortllon = {
    "1200": 4699,
    "1600": 4700,
    "1800": 4701,
    "1400": 4702,
  }
  return arrayPortllon;
}

function ArrayShowPortillonPotsdam() {
  var arrayPortllon = {
    "1200": 4704,
    "1600": 4705,
    "1800": 4706,
    "1400": 4707,
  }
  return arrayPortllon;
}

function ArrayShowPortillonKoln() {
  var arrayPortllon = {
    "1200": 4709,
    "1600": 4710,
    "1800": 4711,
    "1400": 4712,
  }
  return arrayPortllon;
}

function ArrayShowPortillonDresden() {
  var arrayPortllon = {
    "1200": 4717,
    "1600": 4714,
    "1800": 4715,
    "1400": 4716,
  }
  return arrayPortllon;
}

function ArrayShowPortillonDortmund() {
  var arrayPortllon = {
    "1200": 4720,
    "1600": 4721,
    "1800": 4722,
    "1400": 4723,
  }
  return arrayPortllon;
}

function ArrayShowPortillonEssen() {
  var arrayPortllon = {
    "1200": 4725,
    "1600": 4726,
    "1800": 4727,
    "1400": 4728,
  }
  return arrayPortllon;
}

function ArrayShowPortillonStuttgart() {
  var arrayPortllon = {
    "1200": 4729,
    "1600": 4731,
    "1800": 4732,
    "1400": 4733,
  }
  return arrayPortllon;
}

function ArrayShowPortillonNurnberg() {
  var arrayPortllon = {
    "1200": 4735,
    "1600": 4736,
    "1800": 4737,
    "1400": 4738,
  }
  return arrayPortllon;
}

function ArrayShowPortillonBremen() {
  var arrayPortllon = {
    "1200": 4740,
    "1600": 4741,
    "1800": 4742,
    "1400": 4743,
  }
  return arrayPortllon;
}

function ArrayShowPortillonHanover() {
  var arrayPortllon = {
    "1200": 4745,
    "1600": 4746,
    "1800": 4747,
    "1400": 4748,
  }
  return arrayPortllon;
}


function ArrayShowPortillonLabel() {
  var arrayPortllon = {
    "1200": 5192,
    "1600": 5222,
    "1800": 5223,
  }
  return arrayPortllon;
}


function PortailShowPortillon(selectValeu, arrayPortllon) {

  $.each(arrayPortllon, function (index, value) {
    RemoveField(value);
    $("li.accessory-ndk-no-quantity[data-group='" + value + "']").each(function (i) {
      idFieldValueNDKFor = $(this).attr('data-id-value');
      RemoveAllOrtherSelectOptions(idFieldValueNDKFor, value);
    });
  });

  ShowField(arrayPortllon[selectValeu.substring(0, 4)]);
}

/*
************************************************************************************************************************
*                                                                                                                      *
*                                          Porte-Fenêtre e Fenêtre cintrée                                             *
*                                                                                                                      *
************************************************************************************************************************
*/

function AlertMedidaJanelaCintree(heightPE, dimensionTextHeight, idFieldNDK) {
  var heightdif = parseInt(heightPE) - parseInt(dimensionTextHeight);
  if (parseInt(dimensionTextHeight) < 300) {
    message = '<span class="error alert-danger clear clearfix">Die Höhe der Seitenteile muss mehr als 300 mm betragen.</span>';
    HideNDKFieldError(idFieldNDK);
    ShowNDKFieldError(idFieldNDK, message);
  } else if (parseInt(dimensionTextHeight) < parseInt(heightdif)) {
    message = '<span class="error alert-danger clear clearfix">Die Seitenhöhe muss größer sein als die Höhe des unteren Teils des Fensters.</span>';
    HideNDKFieldError(idFieldNDK);
    ShowNDKFieldError(idFieldNDK, message);
  } else if (parseInt(dimensionTextHeight) > parseInt(heightPE)) {
    message = '<span class="error alert-danger clear clearfix">Die Seitenhöhe darf nicht höher sein als die Höhe des Durchgangs des Maßfeldes.</span>';
    HideNDKFieldError(idFieldNDK);
    ShowNDKFieldError(idFieldNDK, message);
  } else {
    HideNDKFieldError(idFieldNDK);
  }
}

function TextHeightLateral() {
  var idFieldNDKArry = [];
  idFieldNDKArry[30188] = 3089; // Fenêtre aluminium cintrée 1 vantail à rupture de pont thermique sur mesure
  idFieldNDKArry[30203] = 3089; // Porte-Fenêtre aluminium cintrée 1 vantail à rupture de pont thermique sur mesure
  idFieldNDKArry[30176] = 3101; // Fenêtre aluminium cintrée 2 vantaux à rupture de pont thermique sur mesure
  idFieldNDKArry[30198] = 3101; // Porte-Fenêtre aluminium cintrée 2 vantaux à rupture de pont thermique sur mesure
  return idFieldNDKArry;
}


function Cintreecheck(groupvalue, widthPE, heightPE) {
  widthCAL = parseInt(widthPE) + parseInt((widthPE / 2));
  if (parseInt(heightPE) > 749 && parseInt(widthPE) > 699) {
    if (parseInt(heightPE) > parseInt(widthCAL)) {
      HideNDKFieldError(groupvalue);
    } else {
      message = '<span class="error alert-danger clear clearfix">Die Maße ' + widthPE + 'mm x ' + heightPE + 'mm sind nicht herstellbar.</span>';
      HideNDKFieldError(groupvalue);
      ShowNDKFieldError(groupvalue, message);
    }
  }
}

/*
************************************************************************************************************************
*                                                                                                                      *
*                                          Portas de Entradas                                            			   *
*                                                                                                                      *
************************************************************************************************************************
*/

function HideDimensionsGlassDoor(idDimensions, dataIdValue, idDimensionsGo) {
  var glassNotHeight = [];
  glassNotHeight = ["8305", "8303", "8302", "8221", "8219", "8218", "8298", "8296", "8295", "8151", "8149", "8148", "8312", "8310", "8309", "8156", "8155", "8319", "8317", "8316", "8165", "8163", "8162", "8326", "8324", "8323", "8172", "8170", "8169", "8333", "8331", "8330", "8179", "8177", "8176", "8340", "8338", "8337", "8186", "8184", "8183", "8347", "8345", "8344", "8193", "8191", "8190", "8354", "8352", "8351", "8200", "8198", "8197", "8361", "8359", "8358", "8207", "8205", "8204", "8368", "8366", "8365", "8214", "8212", "8211", "12192", "12190", "12189", "12185", "12183", "12182", "12297", "12295", "12294", "12290", "12288", "12287", "11609", "11607", "11606", "11567", "11565", "11564", "11560", "11558", "11557", "11497", "11495", "11494", "11623", "11621", "11620", "11553", "11551", "11550", "11546", "11544", "11543", "11504", "11502", "11501", "11637", "11635", "11634", "11539", "11537", "11536", "11574", "11572", "11571", "11483", "11481", "11480", "11630", "11628", "11627", "11532", "11530", "11529", "11651", "11649", "11648", "11525", "11523", "11522", "11644", "11642", "11641", "11518", "11516", "11515", "11602", "11600", "11599", "11581", "11579", "11578", "11473", "11474", "11476", "11585", "11586", "11588"];

  var glassNotWidth = [];
  glassNotWidth = ["8304", "8220", "8297", "8150", "8311", "8157", "8318", "8164", "8325", "8171", "8332", "8178", "8339", "8185", "8346", "8192", "8353", "8199", "8360", "8206", "8367", "8213", "12191", "12184", "12296", "12289", "11608", "11566", "11559", "11496", "11622", "11552", "11545", "11503", "11636", "11538", "11573", "11482", "11629", "11531", "11650", "11524", "11643", "11517", "11601", "11580", "11475", "11587"];

  if (typeof (dataIdValue) != "undefined") {

    if ($.inArray(dataIdValue, glassNotHeight) !== -1) {
      console.log("glassNotHeight");
      $(".dimension_text_height_" + idDimensions).addClass('disabled_value_by');
      $("#dimension_text_height_" + idDimensions).addClass('disabled_value_by');
      $(".dimension_text_width_" + idDimensions).removeClass('disabled_value_by');
      $("#dimension_text_width_" + idDimensions).removeClass('disabled_value_by');

      $("#dimension_text_height_" + idDimensions).val($('#dimension_text_height_' + idDimensionsGo).val());
      $(".dimension_text_height_" + idDimensionsGo).html("Höhe der Tür (Max 2200 mm)");
      $(".dimension_text_width_" + idDimensionsGo).html("Breite (mm)");
    }
    if ($.inArray(dataIdValue, glassNotWidth) !== -1) {
      console.log("glassNotWidth");
      $("#dimension_text_height_" + idDimensions).removeClass('disabled_value_by');
      $(".dimension_text_height_" + idDimensions).removeClass('disabled_value_by');
      $(".dimension_text_width_" + idDimensions).addClass('disabled_value_by');
      $("#dimension_text_width_" + idDimensions).addClass('disabled_value_by');

      $("#dimension_text_width_" + idDimensions).val($('#dimension_text_width_' + idDimensionsGo).val());
      $(".dimension_text_width_" + idDimensionsGo).html("Breite der Tür ( Max 1090mm)");
      $(".dimension_text_height_" + idDimensionsGo).html("Höhe (mm)");

    }
    if ($.inArray(dataIdValue, glassNotWidth) === -1 && $.inArray(dataIdValue, glassNotHeight) === -1) {
      console.log("glassAll");
      $("#dimension_text_height_" + idDimensions).removeClass('disabled_value_by');
      $(".dimension_text_height_" + idDimensions).removeClass('disabled_value_by');
      $(".dimension_text_width_" + idDimensions).removeClass('disabled_value_by');
      $("#dimension_text_width_" + idDimensions).removeClass('disabled_value_by');
      $(".dimension_text_height_" + idDimensionsGo).html("Höhe (mm)");
      $(".dimension_text_width_" + idDimensionsGo).html("Breite (mm)");
    }

    $("#dimension_text_height_" + idDimensions).trigger('change');
    $("#dimension_text_width_" + idDimensions).trigger('change');
  }
}

function CalculoAileOrTapee(precoML, heightT, widthT, recalculate) {
  var dim = (parseInt(heightT * 2) + parseInt(widthT)) / 1000;
  var precoTotal = dim * precoML;
  if (recalculate)
    updatePriceNdk(precoTotal, group);

  return precoTotal;
}

function AlterPriceSelect(ndkcsfield, options, heightT, widthT) {
  var values = $.map(options, function (option) {
    return option.id;
  });
  values.forEach(function (ele) {
    text = $('label[for=' + ele + ']').text();

    if (text != 'Sans Aile ' && text != 'Sans tapée ' && (typeof widthT !== 'undefined' ? widthT : 0) != 0 && (typeof heightT !== 'undefined' ? heightT : 0) != 0) { // executa apenas se dimensoes forem inseridas
      var res = text.split(":");
      if (res[0] != '--') {
        precoTotal = $('#' + ele).data('price');
        precoTotal = (CalculoAileOrTapee(precoTotal, heightT, widthT, false)).toFixed(2);
        $('label[for=' + ele + ']').text(res[0] + ' : ' + precoTotal + ' €');
      }
    }
  });
}


function CalculoDimensaoVidro(AreaPET, AreaPE, groupTextMessage, groupPriceUpdate, widthPET, heightPET) {

  if (AreaPET > AreaPE) {
    result = AreaPET - AreaPE;
    resultM2 = (result / 1000000);
    $("div[data-field='" + groupTextMessage + "'] div.field_notice").html(" <p>Glasgröße: " + resultM2 + " m²</p>");
    updatePriceNdk((resultM2 * 700) * 1.2, groupPriceUpdate);
  } else if (AreaPET == AreaPE) {
    $("div[data-field='" + groupTextMessage + "'] div.field_notice").html(" ");
    updatePriceNdk(0, groupPriceUpdate);
  } else if (AreaPET < AreaPE) {
    $("div[data-field='" + groupTextMessage + "'] div.field_notice").html(" ");
    updatePriceNdk(0, groupPriceUpdate);
  }
}


/*
************************************************************************************************************************
*                                                                                                                      *
*                                          PERGOLAS BIOCLIMATIQUE                                           		   *
*                                                                                                                      *
************************************************************************************************************************
*/

function PregolaGrandLuxLarguraProfundidade(activities, ndkcsfieldValue, dimensionID) {
  lame = $('#' + ndkcsfieldValue + '').val();
  Nlames = lame.substring(0, 2);
  for (i = 0; i < activities.length; i++) {
    if (parseInt(Nlames) == parseInt(activities[i][1])) {
      $("#dimension_text_height_" + dimensionID).val(parseInt(activities[i][0]));
      document.getElementById("dimension_text_height_" + dimensionID).value = parseInt(activities[i][0]);
      $("#dimension_text_height_" + dimensionID).attr('value', parseInt(activities[i][0]))
      height = activities[i][0];
      width = $("#dimension_text_width_" + dimensionID).val();
      if (parseInt(width) > 0) {
        $("#dimension_text_height_" + dimensionID).trigger('change');
      }
      return activities[i][0];
    }
  }
  return 1;
}


function checkPilares(ValueDroit, ValueGauche, ID_ndk) {


  lame = $('#ndkcsfield_2292').val();
  Nlames = lame.substring(0, 2);
  for (i = 0; i < activitiesDP.length; i++) {
    if (parseInt(Nlames) == parseInt(activitiesDP[i][1])) {

      ValueMin = (parseInt(activitiesDP[i][0]) - 6000);
      ValueMax = (parseInt(activitiesDP[i][0]) - 4000);

      if ((parseInt(ValueDroit) + parseInt(ValueGauche)) < parseInt(ValueMin) && parseInt(ValueMin) > 500) {
        ValueMax = ValueMax / 2;
        if (parseInt(ValueMin) < 500) {
          ValueMin = 500;
        } else {
          ValueMin = ValueMin / 2;
        }
        /*message = '<span class="error alert-danger clear clearfix">Pergola avec largeur ' + parseInt(activitiesDP[i][0]) + ' mm les piliers (droit et gauche) doivent avoir une mesure minimale de' + parseInt(ValueMin) + 'mm ou maximum de ' + parseInt(ValueMax) + 'mm.</span>';*/

        if (parseInt(ValueMax) > 1500) {
          ValueMax = 1500;
        }
        message = '<span class="error alert-danger clear clearfix">Bei dieser Gesamtbreite muss der Versatz nach innen zwischen liegen ' + parseInt(ValueMin) + 'mm und ' + parseInt(ValueMax) + 'mm.</span>';

        if (parseInt($('#text_' + ID_ndk).val()) > parseInt(ValueMax) || parseInt(ValueMin) > parseInt($('#text_' + ID_ndk).val()))
          ShowNDKFieldError(ID_ndk, message);
        else
          HideNDKFieldError(ID_ndk);

        return false;
      }
      else//if ((parseInt(ValueDroit) + parseInt(ValueGauche)) > parseInt(ValueMax) )
      {
        ValueMax = ValueMax / 2;
        if (parseInt(ValueMin) < 500) {
          ValueMin = 500;
        } else {
          ValueMin = ValueMin / 2;
        }

        if (parseInt(ValueMax) > 1500) {
          ValueMax = 1500;
        }
        message = '<span class="error alert-danger clear clearfix">Bei dieser Gesamtbreite muss der Versatz nach innen zwischen liegen ' + parseInt(ValueMin) + 'mm und ' + parseInt(ValueMax) + 'mm.</span>';
        if (parseInt($('#text_' + ID_ndk).val()) > parseInt(ValueMax) || parseInt(ValueMin) > parseInt($('#text_' + ID_ndk).val()))
          ShowNDKFieldError(ID_ndk, message);
        else
          HideNDKFieldError(ID_ndk);

        return false;
      }
    }
  }
  return true;
}


function ShowFileTechnical(text, width, length, type) {

  $(".pdfplaning").show();
  $(".pdftext").text(text + length + 'mm x' + width + 'mm');
  $(".pdfplan").attr("data-pdf", 'https://dev.priximbattable.net/modules/ndk_advanced_custom_fields/PDF/pdf/PDFNDK.php?length=' + length + '&width=' + width + '&wall=' + type + '&text=' + text);
}

/*
************************************************************************************************************************
*                                                                                                                      *
*                                          Aile Tapee Windows                                        		   *
*                                                                                                                      *
************************************************************************************************************************
*/



function CalculoAileWindows(precoML, heightT, widthT, recalculate) {
  if (aluclass_id_field_type[id_product][0] == "J")
    var dim = (parseInt(heightT * 2) + parseInt(widthT * 2)) / 1000;
  else
    var dim = (parseInt(heightT * 2) + parseInt(widthT)) / 1000;

  var precoTotal = dim * precoML;
  if (recalculate)
    updatePriceNdk(precoTotal, group);

  return precoTotal;
}

function CalculoTapeeWindows(precoML, heightT, widthT, recalculate) {
  var dim = (parseInt(heightT * 2) + parseInt(widthT)) / 1000;
  var precoTotal = dim * precoML;
  if (recalculate)
    updatePriceNdk(precoTotal, group);

  return precoTotal;
}

function AlterPriceRadioWindows(typeApplication, options, heightT, widthT) {

  var values = $.map(options, function (option) {
    return option.id;
  });

  values.forEach(function (ele) {
    text = $('label[for=' + ele + ']').text();

    if (text != 'Sans Aile ' && text != 'Sans tapée ' && (typeof widthT !== 'undefined' ? widthT : 0) != 0 && (typeof heightT !== 'undefined' ? heightT : 0) != 0) { // executa apenas se dimensoes forem inseridas
      var res = text.split(":");
      if (res[0] != '--') {
        precoTotal = $('#' + ele).data('price');
        if (typeApplication == 'T') {
          precoTotal = (CalculoTapeeWindows(precoTotal, heightT, widthT, false)).toFixed(2);
        } else {
          precoTotal = (CalculoAileWindows(precoTotal, heightT, widthT, false)).toFixed(2);
        }

        $('label[for=' + ele + ']').text(res[0] + ' : ' + precoTotal + ' €');
      }
    }
  });
}



function CalculoPVCsWindows(precoML, heightT, widthT, recalculate) {
  var dim = ((parseInt(heightT)/ 1000) * (parseInt(widthT)/ 1000)) ;
  var precoTotal = dim * precoML;
  if (recalculate)
    updatePriceNdk(precoTotal, group);

  return precoTotal;
}

function AlterPriceCroisillonsWindows( croisillons, heightPE, widthPE) {
  for (var i=0;i<croisillons.length;i++) {
    precoTotal = croisillons.eq(i).attr("data-price");
    if(precoTotal > 0){
      precoTotal = (CalculoPVCsWindows(precoTotal, heightPE, widthPE, false)).toFixed(2);
      $('#descriptionPrice_'+croisillons.eq(i).attr("data-id-value")).text(' + ' + precoTotal + ' €');
    }
  }
}
