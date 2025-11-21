/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*/
/*var cliked = false;
$(document).ready(function(){
	$('.cart_ref').each(function () {
	  firstel = $(this);
	  row = $(this).parent().parent().clone();
	  subrow = $(this).parent().parent().next('tr');
	  subrow.find('td.cart_quantity').hide();
	  row2 = subrow.clone();
	  value = $(this).text().split(':') [1];
	  value = value.replace('custom', 'product');
	  value = value.replace(/-/gi, '_');
	  value = value.split('_');
	  id = '';
	  for (i = 0; i < value.length; i++) {
	    if (i != value.length - 1)
	    id += value[i] + '_';
	  }
	  targetRow = $('tr[id*=' + id + ']');
	  targetRow.find('.typedText li').each(function () {
	    id_to_find = firstel.parent().parent().attr('id').split('_') [1];
	    id_cus_prod = $(this).text().split(':') [2];
	    if (strpos($(this).text(), firstel.text().split(':') [1], 0) && parseFloat(id_cus_prod) == parseFloat(id_to_find))
	    target = $(this).parent().parent();
	  });
	  
	  if (typeof (target) != 'undefined') {
	  	container = '<table class="table table-bordered ndkcfTable"></table>';
	  	target.append(container);
	  	target.find('.ndkcfTable').append(row).append(row2);
	    //row.appendTo(target);
	    //row2.appendTo(target);
	    $(this).parent().parent().remove();
	    subrow.remove();
	    $('.ndkcfTable .product-name a, .ndkcfTable .cart_product a').attr('href', '#');
	  }
	});
	
	
	$('.cart_quantity_delete').live('click', function(e){
		url = $(this).parent().parent().find('.cart_quantity_delete').attr('href');
		$.ajax({
		            type: "GET",
		            url: url,
		            dataType: "json",
		            
		        });
		//$(this).parent().parent().find('.cart_quantity_delete').trigger('click');
	});
	
	$('.cart_quantity_input').live('change, keyup', function(){
			subTable = $(this).parent().parent().find('.ndkcfTable');
	  	subTable.find('.cart_quantity').show();	
			el = subTable.find('.cart_quantity .cart_quantity_input');
			el.val($(this).val());
			updateQty($(this).val(), true, el);
		});
	
});

function strpos(haystack, needle, offset) {
  var i = (haystack + '').indexOf(needle, (offset || 0));
  return i === - 1 ? false : i;
}*/

$(document).ready(function(){
	$.when(
		redesignTextFields()
	).done(function(){
		/*setTimeout(function(){
			equalheight('.typedText li');
		}, 2000)*/
	});
});

function redesignTextFields(){
	if (typeof(redesignTextFields_Override) == 'function') { 
		return redesignTextFields_Override();
	}
	$('.typedText li').each(function(){
		$(this).addClass('clearfix')
	  originalText = $(this).html();
	  splitted = originalText.split(':');
	  finalText = '<b class="clear clearfix">'+splitted[0]+'</b>'+splitted[1].replace(/;/gi, '<br/>')+(typeof(splitted[2])!='undefined' ? ':'+splitted[2].replace(/;/gi, '<br/>') : '');
	  //finalText = '<b>'+splitted[0]+'</b>'+splitted[1]+(typeof(splitted[2])!='undefined' ? ':'+splitted[2] : '');
	  $(this).html(finalText);
	});
	
	$('.product-customization-line .value').each(function(){
	  originalText = $(this).text();
	  finalText = originalText.replace(/;/gi, '<br/>');
	  $(this).html(finalText);
	});
}

equalheight = function(container){
	var currentTallest = 0,
	     currentRowStart = 0,
	     rowDivs = new Array(),
	     $el,
	     topPosition = 0;
	 $(container).each(function() {
	   $el = $(this);
	   //$el.height('auto');
	   topPostion = $el.position().top;
	     rowDivs.push($el);
	     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	     rowDivs[currentDiv].height(currentTallest);
	   }
	 });
}

equalheightbyRow = function(container){
	var currentTallest = 0,
	     currentRowStart = 0,
	     rowDivs = new Array(),
	     $el,
	     topPosition = 0;
	 $(container).each(function() {
	   $el = $(this);
	   $($el).height('auto')
	   topPostion = $el.position().top;
	   topPositionParent = $el.parent().parent().position().top;
	
	   if (currentRowStart != topPostion) {
	     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	       rowDivs[currentDiv].height(currentTallest);
	     }
	     rowDivs.length = 0; // empty the array
	     currentRowStart = topPostion;
	     currentTallest = $el.height();
	     rowDivs.push($el);
	   } else if (currentRowStart != topPositionParent) {
	   	for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	   	  rowDivs[currentDiv].height(currentTallest);
	   	}
	   	rowDivs.length = 0; // empty the array
	   	currentRowStart = topPositionParent;
	   	currentTallest = $el.height();
	   	rowDivs.push($el);
	   } else {
	     rowDivs.push($el);
	     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	  }
	   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	     rowDivs[currentDiv].height(currentTallest);
	   }
	 });
}



$(document).on('click', '.fancyboxButton', function(e){
	if($(window).width() > 400)
	{
		e.preventDefault();
		url = $(this).attr('href');
		if (!!$.prototype.fancybox)
			$.fancybox({
				'afterLoad' : function(){
					$contents = $(".fancybox-iframe").contents();
					$head = $contents.find("head");
					
					if($contents.find('.print-page-breaker').length > 4)
						$head.append('<style>.print-page-breaker{width:30%;display:inline-block;margin:1%; border:1px solid #efefef} body, html{display:table; text-align:center}</style>');
					else if($contents.find('.print-page-breaker').length > 1)
						$head.append('<style>.print-page-breaker{width:48%;display:inline-block;margin:1%;border:1px solid #efefef} body, html{display:table; text-align:center}</style>');
					else
					$head.append('<style>body, html{display:table; text-align:center;margin:auto} .print-page-breaker{display:inline-block}</style>');
					
				},
				'padding':  0,
				'type':     'iframe',
				'href':     url,
							
				
			});
		}
})