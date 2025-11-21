/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*/

var priceResult = 0;
var reduc_Array = false;
var label = labelTotal; //Libellé affiché
var type = $('meta[itemprop=priceCurrency]').attr("content");
var message = priceMessage;
var message_specific = priceMessageSpecific;
var productPriceUp = 0;
var priceInitiated = [];
var last_qtty_sp = 0;
var last_id_combination_sp = 0;
var selectedConfigValue = [];
var totalUnitPrice = 0;
var productPrice;
var productPriceOLD = 0;
var ndkcfAttrStock = false;
var reduc_only_product = false;
var serviceiva10 = false;

var totalDescontos = 0;
var tipoReducao = "";
var valorReducao = 0;

function getDescontosCatalogo() {
  id_product = $("#ndkcf_id_product").val();
  $.ajax({
    'async': true,
    type: "GET",
    'global': false,
    'dataType': 'json',
    'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
    'data': { id_product: id_product, action: 'getDescontosCatalogo' },
    'success': function (data) {
      totalDescontos = data['totalDescontos'];
      tipoReducao = data['tipoReducao'];
      valorReducao = data['valorReducao'];
    },
  });
}

$(document).ready(function () {

  getDescontosCatalogo();

  if (isFields != 1 || $('#ndkcsfields-block').length < 1)
    return;

  initPriceVars();

  if (!$.isEmptyObject(reduc_Array) && typeof (reduc_Array['reduction_type'] != 'undefined')) {

    // $('span#old_price_display').after("<span id='oldPrice' class='specificBlock'></span><span id='specificReduct' class='specificBlock'></span><div class='blockPrice clear clearfix'><p class='contentPrice'><span class='labelPriceUp'>"+ label +"</span><span class='price productPriceUp' itemprop='price'></span><span class='price productPriceUpHT' itemprop='price'></span></p></div>");//Ajout du contenu
    // $('span#old_price_display').after("<span id='oldPrice' class='specificBlock'></span><span id='specificReduct' class='specificBlock'></span><div class='blockPrice clear clearfix'><p class='contentPrice'><span class='labelPriceUp'>"+ label +"</span><span class='price productPriceUp'></span><span class='price productPriceUpHT'></span></p></div>");//Ajout du contenu

    // $('span#old_price_display').after("<span id='specificPrice'></span>");
  }
  else {

    if (ps_version > 1.6) {
      // $('.product-prices:eq(0)').after("<span id='oldPrice' class='specificBlock'></span><span id='specificReduct' class='specificBlock'></span><div class='blockPrice clear clearfix'><p class='contentPrice'><span class='labelPriceUp'>"+ label +"</span><span class='price productPriceUp' itemprop='price'></span><span class='price productPriceUpHT' itemprop='price'></span></p></div>");//Ajout du contenu
      // $('.product-prices:eq(0)').after("<span id='oldPrice' class='specificBlock'></span><span id='specificReduct' class='specificBlock'></span><div class='blockPrice clear clearfix'><p class='contentPrice'><span class='labelPriceUp'>"+ label +"</span><span class='price productPriceUp'></span><span class='price productPriceUpHT'></span></p></div>");//Ajout du contenu
      // $('.product-prices:eq(0)').after("<span id='specificPrice'></span>");
    }
    else {
      // $('.current-price, #our_price_display').parent().append("<span id='oldPrice' class='specificBlock'></span><span id='specificReduct' class='specificBlock'></span><div class='blockPrice clear clearfix'><p class='contentPrice'><span class='labelPriceUp'>"+ label +"</span><span class='price productPriceUp' itemprop='price'></span><span class='price productPriceUpHT' itemprop='price'></span></p></div>");//Ajout du contenu
      // $('.current-price, #our_price_display').parent().append("<span id='oldPrice' class='specificBlock'></span><span id='specificReduct' class='specificBlock'></span><div class='blockPrice clear clearfix'><p class='contentPrice'><span class='labelPriceUp'>"+ label +"</span><span class='price productPriceUp'></span><span class='price productPriceUpHT'></span></p></div>");//Ajout du contenu
      // $('span#our_price_display').after("<span id='specificPrice'></span>");
    }

  }

  /*$("#quantity_wanted").keyup(function(){
    update_price_dynamic(0);
  });*/

  $("#quantity_wanted").change(function () {

    // $("#quantity_wanted").trigger('keyup');
    if (ps_version > 1.6) {
      var productDetails = $('#product-details').data('product');
      if (typeof productDetails != "undefined") {
        if (ndkcfAttrStock)
          attrStock = ndkcfAttrStock;
        else
          attrStock = productDetails.quantity;

        if (parseFloat(attrStock) < $(this).val() && parseInt(productDetails.allow_oosp) == 0) {
          if (productDetails.available_later != '')
            out_of_stock_text = productDetails.available_later;
          $('.ndkcsfields-block').fadeOut(600);
          $('#product-availability').fadeIn().text(out_of_stock_text).find('i').removeClass('product-available').addClass('product-unavailable');
        }
        else {
          if (productDetails.available_now != '')
            in_stock_text = productDetails.available_now;

          $('.ndkcsfields-block').fadeIn(600);
          $('#product-availability').fadeIn().text(in_stock_text).find('i').removeClass('product-unavailable').addClass('product-available');
        }
      }
    }


  });

  // setTimeout(function(){
  // 	$("#quantity_wanted").trigger('keyup');
  // }, 500);

  var resumeBlock = new HoverWatcher('#ndkcf_recap');
  $("#ndkcf_recap").hover(
    function () {
      $("#ndkcf_recap > .ndkcf_recap_content").stop(true, true).slideDown('slow');
      //$(this).addClass('showing');
    },
    function () {
      setTimeout(function () {
        if (!resumeBlock.isHoveringOver())
          $("#ndkcf_recap > .ndkcf_recap_content").stop(true, true).slideUp('slow');
        //$(this).removeClass('showing');
      }, 6000);
    }
  );


});



function initPriceVars() {
  if (typeof (initPriceVars_Override) == 'function') {
    return initPriceVars_Override();
  }
  if (isFields != 1 || $('#ndkcsfields-block').length < 1)
    return;

  id_product = $("#ndkcf_id_product").val();
  id_combination = $('input#idCombination').val();
  qtty = $("#quantity_wanted").val();
  $.ajax({
    'async': true,
    type: "GET",
    'global': false,
    'dataType': 'json',
    'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
    'data': { id_product: id_product, id_product_attribute: id_combination, quantity: 1, action: 'getAttributePrice' },
    'success': function (data) {
      if (parseFloat(addProductPrice) > 0) {
        productPrice = data;
        productPriceOLD = productPrice['price'];
      }
      else {
        productPrice = 0;
      }
      priceInitiated = true;
    }
  });


  var standard_reduc = false;

  last_qtty_sp = qtty;
  last_id_combination_sp = id_combination;

  $.ajax({
    'async': true,
    type: "GET",
    'global': false,
    'dataType': 'json',
    'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
    'data': { id_product: id_product, id_product_attribute: id_combination, quantity: qtty, action: 'getSpecificPrice' },
    'success': function (data) {
      reduc_Array = data;
      update_price_dynamic(0);
    }
  });



}



function update_price_dynamic(value) {
  setTimeout(function () {
    id_product = $("#ndkcf_id_product").val();
    id_combination = $('input#idCombination').val();
    qtty = $("#quantity_wanted").val();

    if (qtty != last_qtty_sp || id_combination != last_id_combination_sp) {
      last_qtty_sp = qtty;
      last_id_combination_sp = id_combination;
      $.ajax({
        'async': true,
        type: "GET",
        'global': false,
        'dataType': 'json',
        'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
        'data': { id_product: id_product, id_product_attribute: id_combination, quantity: qtty, action: 'getSpecificPrice' },
        'success': function (data) {
          reduc_Array = data;
          if (reduc_Array['old_price'] === data['old_price'])
            display_price_dynamic(value, data);
          else {
            update_price_dynamic(value);
          }
        }
      });
    }
    else {
      if (reduc_Array['old_price'] > 0)
        display_price_dynamic(value, reduc_Array);
      else {
        //update_price_dynamic(value);
        display_price_dynamic(value);
      }
    }
  }, 300)
}

/*function arraysEqual(a, b) {
  a = Array.isArray(a) ? a : [];
  b = Array.isArray(b) ? b : [];
  return a.length === b.length && a.every((el, ix) => el === b[ix]);
}*/


function getPriceHt(price, element, pure) {
  if (typeof (getPriceHt_Override) == 'function') {
    return getPriceHt_Override(price, element, pure);
  }
  element = element || '';
  pure = pure || false;
  ht_price = price / (1 + ndk_taxe_rate / 100);
  if (pure) {
    return ht_price;
  } else {
    if (element != '')
      formatCurrencyNdkCallback(ht_price * 1, element, labelTotalHT);
    else
      return formatCurrencyNdk(ht_price);
  }
}

function getPriceHt_back(price, element) {
  if (typeof (getPriceHt_Override) == 'function') {
    return getPriceHt_Override(price, element);
  }
  element = element || '';
  id_product = $("#ndkcf_id_product").val();
  $.ajax({
    'async': true,
    type: "GET",
    'global': false,
    'dataType': 'json',
    'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
    'data': { price: price, id_product: id_product, action: 'removePriceTaxes' },
    'success': function (data) {
      if (element != '')
        formatCurrencyNdkCallback(data * 1, element, labelTotalHT);
      else
        return formatCurrencyNdk(data);
    }
  });
}


function getPricesDiscount(group, value) {
  if (typeof (getPricesDiscount_Override) == 'function') {
    return getPricesDiscount_Override(group, value);
  }
  qtty = $("#quantity_wanted").val();
  id_product = $("#ndkcf_id_product").val();
  $.ajax({
    'async': true,
    type: "GET",
    'global': false,
    'dataType': 'json',
    'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
    'data': { id_product: id_product, group: group, value: value, quantity: qtty, action: 'getPricesDiscount' },
    'success': function (data) {
      if (isNaN(data))
        data = 0;
      price_type = $('#price_type_' + group).attr('data-price-type');

      if (groupAdded[group] > 0 && data != groupAdded[group] && data > 0) {
        if (parseFloat(data) > 0 && !isNaN(data))
          groupAdded[group] = data;
        $("#quantity_wanted").trigger('change');
        $("#quantity_wanted").trigger('touchspin.stopspin');
      }
    },
  });

}

function getAllPricesDiscount() {
  if (typeof (getAllPricesDiscount_Override) == 'function') {
    return getAllPricesDiscount_Override();
  }
  getSelectedValuesForPrice();
  qtty = $("#quantity_wanted").val();
  id_product = $("#ndkcf_id_product").val();
  $.ajax({
    'async': true,
    type: "GET",
    'global': false,
    'dataType': 'json',
    'url': baseUrl + 'modules/ndk_advanced_custom_fields/front_ajax.php',
    'data': { id_product: id_product, group: selectedConfigValue, quantity: qtty, action: 'getAllPricesDiscount' },
    'success': function (data) {
      for (idG in data) {
        if (parseFloat(data[idG]) > 0 && !isNaN(data[idG]) && parseFloat(groupAdded[idG]) != data[idG]) {
          groupAdded[idG] = data[idG];
          $("#quantity_wanted").trigger('change');
          $("#quantity_wanted").trigger('touchspin.stopspin');
        }
      }
    },
  });
}


function getSelectedValuesForPrice() {
  if (typeof (getSelectedValuesForPrice_Override) == 'function') {
    return getSelectedValuesForPrice_Override();
  }
  selectedConfigValue = [];
  $("*[name^='ndkcsfield[']").not('.recipient-field').each(function () {
    group = $(this).attr('id').replace('ndkcsfield_', '');
    //on applique la quantité min si l'option a un stock
    checkStockOption(group);
    if ($(this).is(':radio')) {
      group = $(this).attr('data-group');
      if ($(this).is(':checked')) {
        selectedConfigValue[group] = $(this).val();
      }
    }
    else
      selectedConfigValue[group] = $(this).val();
  });
  return selectedConfigValue;
}


function checkStockOption(group) {
  if (typeof (checkStockOption_Override) == 'function') {
    return checkStockOption_Override(group);
  }

  maxProductQuantity = 999999999;
  rootBlock = $(".form-group[data-field='" + group + "']");
  rootBlock.find("[data-quantity-available]").each(function () {
    if (($(this).is(':checked') || $(this).hasClass('selectedValue') || $(this).is(':selected')) && parseFloat($(this).attr('data-quantity-available')) < maxProductQuantity)
      maxProductQuantity = parseFloat($(this).attr('data-quantity-available'));
    if (maxProductQuantity < $('#quantity_wanted').attr('max'))
      $('#quantity_wanted').attr('max', maxProductQuantity);
  });

}


function display_price_dynamic(value, reduc_Array) {
  if (typeof (display_price_dynamic_Override) == 'function') {
    return display_price_dynamic_Override(value, reduc_Array);
  }
  //test provisoire : getAllPricesDiscount()
  $('.product_quantity_up').attr('onclick', 'update_price_dynamic(1);'); //Ajout la fonction onclick à l'élément  [+]
  $('.product_quantity_down').attr('onclick', 'update_price_dynamic(-1);');//Ajout la fonction onclick à l'élément  [-]
  //$('#quantity_wanted').val(1);//Initialise la quantité par défaut à 1

  //var productPrice = $.trim($('#our_price_display').text().replace(currencySign, '').replace(',', '.').replace(' ', '').replace('-', ''));
  id_product = $("#ndkcf_id_product").val();
  id_combination = $('input#idCombination').val();



  if (!$.isEmptyObject(reduc_Array) && reduc_Array['old_price'] != null) {

    formatCurrencyNdkCallback(parseFloat(reduc_Array['old_price']), '#old_price_display > span.price', '', '');
    if (addProductPrice == 1) {
      productPrice = parseFloat(reduc_Array['old_price']);
    }
    else
      productPrice = 0;
  }

  $('#our_price_display').show();
  $('#specificPrice').text('');
  var id_combination = $('input#idCombination').val();
  var specific_length_general = 0;
  var specific_length = 0;
  var total_specific_length = 0;
  var reduction_used_customization = 0;
  if (id_combination == '') {
    id_combination = 0;
  }

  var qty_wanted = $('#quantity_wanted').val();//Récupération de la quantité sélectionnée
  qty_wanted = parseFloat(qty_wanted);

  if (qty_wanted == quantityAvailable && value == 1) {
    qty_wanted = quantityAvailable - 1;
  }
  if (value == -1) {
    var value_available = 1;
  }
  else {
    var value_available = 0;
  }

  qty_wanted = parseFloat(qty_wanted);
  //qty_wanted = qty_wanted+value;
  $('.quantityAvailableAlert').hide();
  $('.contentPrice').show();
  selectedConfigValue = getSelectedValuesForPrice();

  /// Vasco Remover se der problemas
  if (!$.isEmptyObject(reduc_Array) && typeof (reduc_Array['reduction_type'] != 'undefined') && typeof (reduc_Array['reduction'] != 'undefined')) {
    if (reduc_Array['reduction_type'] == 'amount') {
      reduction_used_aluclass = parseFloat(reduc_Array['reduction']);
    }
  } else {
    reduction_used_aluclass = 0;
  }

  var customizationPrice = 0;
  var idPrice;
  var isNotdiscount = false;
  var arrayFieldNDKService = [5426, 5417, 5424, 5425, 5439, 5440, 5441, 5442, 5443, 5444, 5445, 5446, 5447, 5448, 5449, 5450, 5452, 5453, 5454, 5455, 5456, 5457, 5458, 5459, 5460, 5462, 5463, 5465, 5466, 5467, 5472, 5473, 5518, 5522, 5523, 5524,5546];

  for (idPrice in groupAdded) {

    var idPriceArray = idPrice.split("-");
    if ($.inArray(parseInt(idPriceArray[0]), arrayFieldNDKService) !== -1) {
      isNotdiscount = true;
    } else {
      isNotdiscount = false;
    }

    if (typeof (groupAdded[idPrice]) != 'undefined') {
      //valuePrice = getPricesDiscount(idPrice, selectedConfigValue[idPrice]);
      price_type = $('#price_type_' + idPrice).attr('data-price-type');

      if(price_type != 'percent'){
        customizationPrice = parseFloat(customizationPrice) + parseFloat( (!isNotdiscount ? ((groupAdded[idPrice])  - ((groupAdded[idPrice])  * valorReducao)) : groupAdded[idPrice] ) );
      }
      else if (typeof (price_type) != 'undefined' && price_type == 'percent') {
        multiplicator = groupAdded[idPrice] / 100;
        // totalPrice = (productPriceOLD)+ parseFloat(customizationPrice*1);
        //toAdd = totalPrice*multiplicator;
        //customizationPrice = parseFloat(customizationPrice) + toAdd;
        toAdd = (productPriceOLD / (1 - valorReducao)) * multiplicator;
        customizationPrice = parseFloat(customizationPrice) + toAdd;
      }
    }
  }

  /* for (idPrice in groupAdded) {
          if(typeof(groupAdded[idPrice]) != 'undefined'){
          valuePrice = getPricesDiscount(idPrice, selectedConfigValue[idPrice]);
          price_type = $('#price_type_'+idPrice).attr('data-price-type');
             if(typeof(price_type) != 'undefined' && price_type == 'percent'){
               multiplicator = groupAdded[idPrice]/100;
               totalPrice = parseFloat(productPrice*1) + parseFloat(customizationPrice*1);
               toAdd = totalPrice*multiplicator;
               customizationPrice = parseFloat(customizationPrice) + toAdd;
             }
          }
       }*/

  /* paulo - aplica desconto do catalogo */
  var portivaaumento = $('#portivaaumento').val();

  if (totalDescontos > 0) {
    if (tipoReducao == 'amount') {
      customizationPrice = customizationPrice - valorReducao;
    } else {
      //customizationPrice = (customizationPrice) - ((customizationPrice) * valorReducao);
      productPrice = productPrice + ((portivaaumento) - ((portivaaumento) * valorReducao));
    }
  }

  /* paulo - aplica desconto do catalogo */
  productPriceUp = parseFloat(productPrice);


  /*if(typeof priceWithDiscountsDisplay != 'undefined'){
    productPriceUp = priceWithDiscountsDisplay;
  }*/

  productPriceUp += parseFloat(customizationPrice);
  priceResult = qty_wanted * productPriceUp;

  if (!$.isEmptyObject(reduc_Array) && typeof (reduc_Array['reduction_type'] != 'undefined') && typeof (reduc_Array['reduction'] != 'undefined')) {//vérifie l'existance d'un prix spécifique

    var reduction = [];
    var reduction_type = [];
    var qty_required = [];
    var qty_required_value = [];
    var type_used = 0;
    var reduction_used = 0;
    var qty_required_used = 0;
    var libelle_reduction = 0;
    var new_price = '';
    var initial_price = productPrice + customizationPrice;



    $('#reduction_amount').hide();
    $('#reduction_percent').hide();

    if (!$.isEmptyObject(reduc_Array) && typeof (reduc_Array['reduction_type'] != 'undefined')) {
      type_used = reduc_Array['reduction_type'];
      standard_reduc = true;
      qty_required_used = 1;
      reduction_used = parseFloat(reduc_Array['reduction']);
    }


    if (type_used == 'percentage') {
      libelle_reduction = parseInt(reduction_used * 100) + '%';
      $('#reduction_percent_display').text('-' + libelle_reduction);
      $('#reduction_amount').hide();
      $('#reduction_percent').show();

      oldCustomizationPrice = formatCurrencyNdk(customizationPrice);


      if (reduc_only_product) {
        reduction_used = (productPriceUp - customizationPrice) * reduction_used;
        reduction_customization_used = 0;
        customizationPrice = customizationPrice - reduction_customization_used;
      }
      else {
        reduction_used = productPriceUp * reduction_used;
        reduction_customization_used = customizationPrice * reduction_used;
        customizationPrice = customizationPrice - reduction_customization_used;

        formatCurrencyNdkCallback(customizationPrice, '#additionnal_price', '(' + additionnalText + '+', ') <span class="old_price">(+' + oldCustomizationPrice + ')</span>');
      }

    }

    if (type_used == 'amount') {
      reduction_used = parseFloat(reduction_used);
      libelle_reduction = formatCurrencyNdk(parseFloat(reduction_used));
      $('#reduction_amount_display').text('-' + libelle_reduction);
      $('#reduction_amount').show();
      $('#reduction_percent').hide();
    }



    new_price = productPriceUp - reduction_used;
    reduced_price = productPrice - reduction_used;

    $('#specificReduct').text('-' + libelle_reduction);
    $("#specificReduct").addClass("specificReductStyle");
    $('#specificPrice').text(new_price + ' ' + currencySign);

    /*if(!isNaN(new_price))
    formatCurrencyNdkCallback(parseFloat(reduced_price) , '#our_price_display', '', '');*/



    if (!$.isEmptyObject(reduc_Array) && typeof (reduc_Array['reduction_type'] != 'undefined') && parseFloat(reduction_used) > 0) {

      formatCurrencyNdkCallback(parseFloat(reduc_Array['old_price']), '#oldPrice');
      priceResult = qty_wanted * (productPriceUp - reduction_used);
      if (parseFloat(priceResult) > 0 && !standard_reduc) {
        $('.specificBlock').slideDown("slow");
      }
    }

    else {
      priceResult = qty_wanted * productPriceUp;
      if (parseFloat(priceResult) > 0) {
        $('span#our_price_display').show();
        $('.specificBlock').fadeOut("normal");
        $('#specificPrice').hide();
      }
    }
  }
  else {
    if (parseFloat(priceResult) > 0) {
      $('span#our_price_display').show();
      $('.specificBlock').fadeOut("normal");
      $('#specificPrice').hide();

      var portivaaumento = $('#portivaaumento').val();

      if (totalDescontos > 0) {
        if (tipoReducao == 'amount') {
        } else {
          priceResult = priceResult + ((portivaaumento) - ((portivaaumento) * valorReducao));
        }
      }


      formatCurrencyNdkCallback(priceResult * 1, '.productPriceUp');
      formatCurrencyNdkCallback(productPriceUp * 1, '#unit_price_display');
      if (displayPriceHT == 1) {
        getPriceHt(priceResult, '.productPriceUpHT');
        getPriceHt(productPriceUp, '#unit_price_display');
      }

    }
  }
  if (parseFloat(priceResult) > 0) {
    $('span#our_price_display').show();
    $('.specificBlock').fadeOut("normal");
    $('#specificPrice').hide();

    // Correção no preço Chiffres à coller
    valorReducaoCC = (typeof (valorReducao) == 'undefined' ? 0 : valorReducao);
    var m = $(".current_price_aluclass").attr("content");

    if (parseFloat(id_product) == 4511 && (productPriceUp - (parseFloat(m) + 1)) > 0) {
      productPriceUp = productPriceUp - (parseFloat(m) - (valorReducaoCC * parseFloat(m)));
      priceResult = priceResult - (parseFloat(m) - (valorReducaoCC * parseFloat(m)));
    }
    // fim da correção

    if ((priceResult * 1) > 6001) {
      oneyX = 48;
      imgcredit = 'Oney48';
      textoney = "La solution de paiement 12x à 84x Oney vous permet de payer en 12 à 84 fois, les frais sont de 4,3% du montant total de la commande dans la limite de 21500 € maximum. Consultez le détail de l’offre sur le site du partenaire.";
      linkcredit = '/content/61-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable';
    } else {
      oneyX = 4;
      imgcredit = 'alma4x';
      linkcredit = '/content/67-payez-vos-achats-en-3-ou-4-fois-avec-alma';
      textoney = "La solution de paiement Alma vous permet de payer en 3 ou 4 fois, lesfrais sont de 1,6% du montant total de la commande pour les paiements en 3 fois et 2,4% du montant total de la commande pour les paiements en 4 fois.";
    }

    $(".tooltiptext-info-oney").html(textoney);
    $(".linkcreditpage").attr("href", linkcredit);


    reductionpercent = $("#reductionpercent").val();
    priceresultoney = (priceResult * 1);
    priceresultoneytext = '';
    if (reductionpercent > 0) {
      priceresultoneytext = 'Avec code ';
      priceresultoney = priceresultoney - (priceresultoney * (reductionpercent / 100));
    }

    var productPricebase = 0;

    if (serviceiva10) {
      let servicefirstiva = 1.2;
      let servicesecondiva = 1.1;

      priceresultoney = (priceresultoney / servicefirstiva) * servicesecondiva;
      priceResult = (priceResult / servicefirstiva) * servicesecondiva;
      productPriceUp = (productPriceUp / servicefirstiva) * servicesecondiva;

      if (valorReducao > 0)
        productPricebase = (((productPriceOLD / (1 - valorReducao)) + parseInt(portivaaumento)) / servicefirstiva) * servicesecondiva;
      else
        productPricebase = (((productPriceOLD) + parseInt(portivaaumento)) / servicefirstiva) * servicesecondiva;

    } else {
      if (valorReducao > 0)
        productPricebase = ((productPriceOLD / (1 - valorReducao)) + parseInt(portivaaumento));
      else
        productPricebase = productPriceOLD + parseInt(portivaaumento);
    }

    if (navigator.userAgent.match(/Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i)) {

      formatCu
      rrencyNdkCallback((priceresultoney) / oneyX, '.productPriceUpx4mobile', oneyX + 'x ' + priceresultoneytext, '<br><img src="/img/' + imgcredit + '.png" width="90px" height="auto">');
    }

    formatCurrencyNdkCallback((productPricebase) * 1, '.current_price_aluclass');

    formatCurrencyNdkCallback((priceresultoney) / oneyX, '.productPriceUpx4', oneyX + 'x ' + priceresultoneytext, '<img src="/img/' + imgcredit + '.png" width="110px" height="auto">');
    formatCurrencyNdkCallback(priceResult * 1, '.productPriceUp');
    formatCurrencyNdkCallback(priceresultoney * 1, '.productPriceUpbanner', priceresultoneytext);
    formatCurrencyNdkCallback(productPriceUp * 1, '#unit_price_display');
    if (displayPriceHT == 1) {
      getPriceHt(priceResult, '.productPriceUpHT');
      getPriceHt(productPriceUp, '#unit_price_display');
    }
  }


  $('.blockPrice').slideDown();

  if (showRecap == 1) {
    $('#ndkcf_recap').show();
    $('#ndkcf_recap_linear').parent().show();
    setRecap();
  }
  else {
    $('#ndkcf_recap').hide();
    $('#ndkcf_recap_linear').parent().hide();
  }

  totalUnitPrice = priceResult / qty_wanted;
}



/*$(document).on('change', '#our_price_display, #quantity_wanted, input#idCombination', function(){
  update_price_dynamic(0);
});*/

$(document).on('change', '.ndkcfLoaded #quantity_wanted, input#idCombination', function () {
  update_price_dynamic(0);
});

$(document).on('touchspin.stopspin', '#quantity_wanted', function () {
  update_price_dynamic(0);
})




//recap option
function setRecap() {
  if (typeof (setRecap_Override) == 'function') {
    return setRecap_Override();
  }
  getSelectedValuesForPrice();
  $('#ndkcf_recap').show();
  //initPriceVars();

  $("#ndkcf_recap > .ndkcf_recap_content").stop(true, true).slideDown('slow');
  $('.recap_group').remove();
  setRecapItemBaseProduct();
  setRecapRecipient();
  for (idGroup in selectedConfigValue) {
    if (selectedConfigValue[idGroup] != '' && selectedConfigValue[idGroup] != 0) {

      input = $('#' + idGroup);

      if (input.length < 1)
        input = $(".ndkackFieldItem[data-field='" + idGroup + "']").find('input:checked').eq(0);

      if (input.length < 1)
        input = $('#ndkcsfield_' + idGroup);

      if (input.hasClass('ndk-accessory-comb-tab')) {
        setRecapItemCombTab(idGroup, input);
      }
      else if (input.hasClass('dimension_text')) {
        setRecapItemDimensions(idGroup, input);
      }
      else if (input.hasClass('surface')) {
        setRecapItemSurface(idGroup, input);
      }
      else if (input.hasClass('ndk-checkbox')) {
        setRecapItemcheckbox(idGroup, input);
      }
      else if (input.hasClass('ndk-radio')) {
        setRecapItemRadio(idGroup, input);
      }
      else if (input.hasClass('ndk-accessory-quantity')) {
        setRecapItemAccessory(idGroup, input);
      }
      else {
        setRecapItemGlobal(idGroup, input);
      }
    } else {
      $('.recap_item_' + idGroup).remove();
      $('.recap_group_' + idGroup).remove();

    }

    if (!$.isEmptyObject(reduc_Array) && typeof (reduc_Array['reduction_type'] != 'undefined')) {
      type_used = reduc_Array['reduction_type'];
      standard_reduc = true;
      qty_required_used = 1;
      reduction_used = parseFloat(reduc_Array['reduction']);

      if (type_used == 'percentage') {
        reduction_customization_used = customizationPrice * reduction_used;
        reduction_used = productPriceUp * reduction_used;
      }
      if (type_used == 'amount') {
        reduction_used = parseFloat(reduction_used);
      }
      if (parseFloat(reduction_used) > 0) {
        libelle_reduction = formatCurrencyNdk(parseFloat(reduction_used));
        $('.reduc_total').remove();
        $('.ndkcf_recap_total').prepend('<p class="reduc_total">-' + libelle_reduction + '</p>');
      }
    }

    formatCurrencyNdkCallback(priceResult * 1, '.ndkcf_recap_total > .price');
    if (displayPriceHT == 1)
      getPriceHt(priceResult, '.ndkcf_recap_total > .priceht');
  }

  if ($(window).width() > 480) {

    $('#ndkcf_recap_linear').html($('#ndkcf_recap').html());
    $('#ndkcf_recap_linear .groupTotalPriceNo').parent().parent().remove();
    $('#ndkcf_recap_linear .ndkcf_recap_title').removeClass('ndkcf_recap_title').addClass('recap_title');
    $("#ndkcf_recap_linear > .ndkcf_recap_content").stop(true, true).slideDown();
    if (displayPriceHT == 1) {
      $('#ndkcf_recap_linear .groupTotalPrice').each(function () {
        id_group = $(this).parent().parent().attr('data-group');
        $(this).after('<span class="priceht" id="priceht_' + id_group + '"></span>');
        getPriceHt($(this).attr('content'), '#priceht_' + id_group);
      });
    }
  }


  setTimeout(function () {
    $("#ndkcf_recap > .ndkcf_recap_content").stop(true, true).slideUp('slow');
  }, 15000);

  if ($('#ndkcf_recap .recap_group_0').length > 1) {
    $('#ndkcf_recap .recap_group_0:eq(0)').remove();
  }
}

function setRecapItemBaseProduct() {
  if (typeof (setRecapItemBaseProduct_Override) == 'function') {
    return setRecapItemBaseProduct_Override();
  }
  productUnitPrice = $('#our_price_display').attr('content');
  //productUnitPrice = productPrice;
  productName = $("h1[itemprop='name']:eq(0)").text();
  if (isNaN(productPrice))
    productPrice = 0;

  $.when($('.recap_group_0').remove()).done(function () {
    if ($('.recap_group_0').length < 1)
      $('#ndkcf_recap > .ndkcf_recap_content').prepend('<div class="recap_group recap_group_0" data-group="0"><p class="recap_group_title">' + productName + ' : <span class="groupTotalPrice" content="' + productPrice + '">' + formatCurrencyNdk(productPrice) + '</span></p></div>');
  })

  if ($('#ndkcf_recap .recap_group_0').length > 1) {
    $('#ndkcf_recap .recap_group_0:eq(0)').remove();
  }
}

function setRecapItemGlobal(idGroup, input) {
  if (typeof (setRecapItemGlobal_Override) == 'function') {
    return setRecapItemGlobal_Override(idGroup, input);
  }
  price_percent = false;
  visu = input.val();
  rootGroup = idGroup;
  rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
  groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
  groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
  groupTitle = groupTitleEl.text();
  idprice = rootGroup;
  idpriceGroup = idprice;
  groupTotalPrice = groupAdded[idprice];

  price_type = $('#price_type_' + idprice).attr('data-price-type');


  if (typeof (price_type) != 'undefined' && price_type == 'percent') {
    /*multiplicator = groupAdded[idprice]/100;
    totalPrice = parseFloat(productPrice*1) + parseFloat(customizationPrice*1);
    groupTotalPrice = totalPrice*multiplicator;
    */
    price_percent = true;
  }

  $('.recap_item_' + idGroup).remove();
  if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
    $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + (price_percent ? '+' + groupTotalPrice + '%' : formatCurrencyNdk(groupTotalPrice)) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');


  itemPrice = groupAdded[idprice];
  /*if(typeof(price_type) != 'undefined' && price_type == 'percent'){
    multiplicator = groupAdded[idprice]/100;
    totalPrice = parseFloat(productPrice*1)+ parseFloat(customizationPrice*1);
    itemPrice = totalPrice*multiplicator;
  }*/

  recapHtml = '<div class="recap_item recap_item_' + idGroup + '">' + strReplaceAll(visu, '¶|\n|\r\n', '</br>') + (parseFloat(itemPrice) > 0 ? ' : ' + (price_percent ? '+' + itemPrice + '%' : formatCurrencyNdk(itemPrice)) : '') + '</div>';

  $('.recap_group_' + rootGroup).append(recapHtml);

  if (parseFloat(groupTotalPrice) > 0)
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html((price_percent ? '+' + groupTotalPrice + '%' : formatCurrencyNdk(groupTotalPrice))).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
  else
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}


function setRecapItemRadio(idGroup, input) {
  if (typeof (setRecapItemRadio_Override) == 'function') {
    return setRecapItemRadio_Override(idGroup, input);
  }
  if ($(input).is(':checked')) {
    visu = input.val();
    rootGroup = input.attr('data-group');
    rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
    groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
    groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
    groupTitle = groupTitleEl.text();
    idprice = rootGroup;
    idpriceGroup = rootGroup;
    itemPrice = groupAdded[idprice];
    groupTotalPrice = itemPrice;

    $('.recap_item_' + rootGroup).remove();
    if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
      $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');



    recapHtml = '<div class="recap_item recap_item_' + rootGroup + '">' + visu + (parseFloat(itemPrice) > 0 ? ' : ' + formatCurrencyNdk(itemPrice) : '') + '</div>';

    $('.recap_group_' + rootGroup).append(recapHtml);
    if (parseFloat(groupTotalPrice) > 0)
      $('.recap_group_' + rootGroup).find('.groupTotalPrice').html(formatCurrencyNdk(groupTotalPrice)).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
    else
      $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');
  }

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}

function setRecapItemCombTab(idGroup, input) {
  if (typeof (setRecapItemCombTab_Override) == 'function') {
    return setRecapItemCombTab_Override(idGroup, input);
  }
  visu = input.attr('data-attr-lang');
  rootGroup = input.attr('data-group');
  rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
  groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
  groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
  groupTitle = groupTitleEl.text();
  idprice = rootGroup + '-' + idGroup.replace('ndk-accessory-quantity-', '');
  idpriceGroup = idprice.split('-');
  idpriceGroup = idpriceGroup[0];
  groupTotalPrice = getPriceGroup(idpriceGroup);

  $('.recap_item_' + idGroup).remove();
  if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
    $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');


  itemPrice = groupAdded[idprice];
  recapHtml = '<div class="recap_item recap_item_' + idGroup + '">' + visu + ' x' + selectedConfigValue[idGroup] + (parseFloat(itemPrice) > 0 ? ' : ' + formatCurrencyNdk(itemPrice) : '') + '</div>';

  $('.recap_group_' + rootGroup).append(recapHtml);
  if (parseFloat(groupTotalPrice) > 0)
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html(formatCurrencyNdk(groupTotalPrice)).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
  else
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}

function setRecapItemAccessory(idGroup, input) {
  if (typeof (setRecapItemAccessory_Override) == 'function') {
    return setRecapItemAccessory_Override(idGroup, input);
  }
  visu = input.parent().parent().parent().find('b').html();
  rootGroup = input.parent().parent().parent().attr('data-group');
  rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
  groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
  groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
  groupTitle = groupTitleEl.text();
  idprice = rootGroup + '-' + idGroup.replace('ndk-accessory-quantity-', '');
  idpriceGroup = idprice.split('-');
  idpriceGroup = idpriceGroup[0];
  groupTotalPrice = getPriceGroup(idpriceGroup);

  $('.recap_item_' + idGroup).remove();
  if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
    $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');


  itemPrice = groupAdded[idprice];
  recapHtml = '<div class="recap_item recap_item_' + idGroup + '">' + visu + ' x' + selectedConfigValue[idGroup] + (parseFloat(itemPrice) > 0 ? ' : ' + formatCurrencyNdk(itemPrice) : '') + '</div>';

  $('.recap_group_' + rootGroup).append(recapHtml);
  if (parseFloat(groupTotalPrice) > 0)
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html(formatCurrencyNdk(groupTotalPrice)).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
  else
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}

function setRecapItemDimensions(idGroup, input) {
  if (typeof (setRecapItemDimensions_Override) == 'function') {
    return setRecapItemDimensions_Override(idGroup, input);
  }

  visu = input.prev().text() + ' : ' + input.val();
  rootGroup = input.attr('data-group');
  rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
  groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
  groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
  groupTitle = groupTitleEl.text();
  idprice = rootGroup;
  idpriceGroup = idprice;
  groupTotalPrice = groupAdded[idprice];

  $('.recap_item_' + idGroup).remove();
  if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
    $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');


  itemPrice = groupAdded[idprice];
  recapHtml = '<div class="recap_item recap_item_' + idGroup + '">' + visu + '</div>';

  $('.recap_group_' + rootGroup).append(recapHtml);
  if (parseFloat(groupTotalPrice) > 0)
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html(formatCurrencyNdk(groupTotalPrice)).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
  else
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}

function setRecapItemSurface(idGroup, input) {
  if (typeof (setRecapItemSurface_Override) == 'function') {
    return setRecapItemSurface_Override(idGroup, input);
  }
  visu = input.attr('placeholder') + ' : ' + input.val();
  rootGroup = input.attr('data-group');
  rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
  groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
  groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
  groupTitle = groupTitleEl.text();
  idprice = rootGroup;
  idpriceGroup = idprice;
  groupTotalPrice = groupAdded[idprice];

  $('.recap_item_' + idGroup).remove();
  if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
    $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');


  itemPrice = groupAdded[idprice];
  recapHtml = '<div class="recap_item recap_item_' + idGroup + '">' + visu + '</div>';

  $('.recap_group_' + rootGroup).append(recapHtml);
  if (parseFloat(groupTotalPrice) > 0)
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html(formatCurrencyNdk(groupTotalPrice)).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
  else
    $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}

function setRecapItemcheckbox(idGroup, input) {
  if (typeof (setRecapItemcheckbox_Override) == 'function') {
    return setRecapItemcheckbox_Override(idGroup, input);
  }
  rootGroup = input.attr('data-group');
  rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
  if ($(input).is(':checked')) {
    visu = input.val();

    groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
    groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
    groupTitle = groupTitleEl.text();

    idprice = input.attr('data-value-id');
    idpriceGroup = rootGroup;
    groupTotalPrice = 0;


    group = $(input).attr('data-group');
    rootBlock = $(".ndkackFieldItem[data-field='" + group + "']");
    others = rootBlock.find('input[type="checkbox"]');
    others.each(function () {
      if (typeof (groupAdded[$(this).attr('data-value-id')]) != 'undefined')
        groupTotalPrice += parseFloat(groupAdded[$(this).attr('data-value-id')]);
    });

    $('.recap_item_' + idGroup).remove();
    if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
      $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p></div>');


    itemPrice = groupAdded[idprice];
    recapHtml = '<div class="recap_item recap_item_' + idGroup + '">' + visu + (parseFloat(itemPrice) > 0 ? ' : ' + formatCurrencyNdk(itemPrice) : '') + '</div>';

    $('.recap_group_' + rootGroup).append(recapHtml);
    if (parseFloat(groupTotalPrice) > 0)
      $('.recap_group_' + rootGroup).find('.groupTotalPrice').html(formatCurrencyNdk(groupTotalPrice)).removeClass('groupTotalPriceNo').attr('content', groupTotalPrice);
    else
      $('.recap_group_' + rootGroup).find('.groupTotalPrice').html('').addClass('groupTotalPriceNo');
  }

  if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
    $('.recap_group_' + rootGroup).addClass('disabled_value_by');
  }
  else {
    $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
  }
}

$(document).on('blur', '.recipient-field', function () {
  setRecapRecipient()
});

function setRecapRecipient() {
  if (typeof (setRecapRecipient_Override) == 'function') {
    return setRecapRecipient_Override();
  }
  recipientRecap = [];
  rootGroupBlock = false;
  $('.recipient-group').each(function () {
    rootGroup = $(this).attr('data-field');
    rootGroupBlock = $(".form-group[data-field='" + rootGroup + "']:not(.submitContainer)");
    groupTitleEl = rootGroupBlock.find('label:eq(0)').clone();
    groupTitleEl.find('.toggleText, .tooltipDescription, .tooltipDescMark').remove();
    groupTitle = groupTitleEl.text();
    groupTotalPrice = 0;
    group = rootGroup;
    rootBlock = $(".ndkackFieldItem[data-field='" + group + "']");

    firstnameInput = rootGroupBlock.find("[name='ndkcsfield[" + rootGroup + "][recipient][firstname]']");
    lastnameInput = rootGroupBlock.find("[name='ndkcsfield[" + rootGroup + "][recipient][lastname]']");
    emailInput = rootGroupBlock.find("[name='ndkcsfield[" + rootGroup + "][recipient][email]']");
    messageInput = rootGroupBlock.find("[name='ndkcsfield[" + rootGroup + "][recipient][message]']");

    content = '<div class="recap_item recap_item_' + rootGroup + '">' + firstnameInput.parent().find('label').text() + ' : ' + firstnameInput.val() + '</div>';
    content += '<div class="recap_item recap_item_' + rootGroup + '">' + lastnameInput.parent().find('label').text() + ' : ' + lastnameInput.val() + '</div>';
    content += '<div class="recap_item recap_item_' + rootGroup + '">' + emailInput.parent().find('label').text() + ' : ' + emailInput.val() + '</div>';
    content += '<div class="recap_item recap_item_' + rootGroup + '">' + messageInput.parent().find('label').text() + ' : ' + messageInput.val() + '</div>';
    $('.recap_group_' + rootGroup).remove();
    if ($('#ndkcf_recap .recap_group_' + rootGroup).length < 1)
      $('#ndkcf_recap .recap_items').append('<div class="recap_group recap_group_' + rootGroup + '" data-group="' + rootGroup + '"><p class="recap_group_title">' + groupTitle + ' : ' + (groupTotalPrice > 0 ? '<span class="groupTotalPrice">' + formatCurrencyNdk(groupTotalPrice) + '</span>' : '<span class="groupTotalPrice groupTotalPriceNo">&nbsp;</span>') + '</p>' + content + '</div>');
  });
  if (rootGroupBlock) {
    if (rootGroupBlock.attr('class').indexOf('disabled_value_by') > -1) {
      $('.recap_group_' + rootGroup).addClass('disabled_value_by');
    }
    else {
      $('.recap_group_' + rootGroup).removeClass('disabled_value_by');
    }
  }
}


function getPriceGroup(idpriceGroup) {
  if (typeof (getPriceGroup_Override) == 'function') {
    return getPriceGroup_Override(idpriceGroup);
  }
  priceGroup = 0;
  for (idPrice in groupAdded) {
    if (idPrice.indexOf(idpriceGroup + '-') > -1) {
      priceGroup += groupAdded[idPrice];
    }
  }
  return priceGroup;
}



