/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2017 Hendrik Masson
 *  @license   Tous droits réservés
*/

$(document).ready(function(){
	hideCartButtons();
	setFromPrices();
});

/*$(document).on('click', '.quick-view', function(){
	setTimeout(function(){
		hideCartButtons();
		setFromPrices();
	}, 1000)
	
});*/


function hideCartButtons(){
	$('.hideThisAddToCart').each(function(){
			id_product = $(this).attr('data-id-product');
			cartButton = $(this).parent().parent().parent().find('.ajax_add_to_cart_button');
			cartButton.attr('disabled', 'disabled').addClass('disabled');
			$(this).parent().parent().parent().find('.lnk_view span').text($(this).val());
			//link = $(this).attr('data-link');		
			
	});
}

$(document).on('mouseover', ".quickview", function(){
	if(!$(this).hasClass('overedNdkCart'))
	{
		id_product = $(this).attr('id').split('-')[2];
		link = $(".hideThisAddToCart[data-id-product='"+id_product+"']").attr('data-link');
		cartButtonModal = $("[id*='quickview-modal-"+id_product+"']").find('.add-to-cart');
		cartButtonModal.attr('disabled', 'disabled').addClass('disabled');
		$(this).addClass('overedNdkCart');
		$(this).find('.product-actions').append('<a class="btn btn-primary customize-btn" href="'+link+'"><span>'+customizeText+'</span></a>');
	}
	
});



function setFromPrices(){
	$('.ndkcfFromPriceProduct').each(function(){
		var me = $(this);
		//console.log(me);
		id_product = $(this).attr('data-id-product');
		priceBlock = $('body.product-'+id_product+' #our_price_display, body.product-'+id_product+'  .current-price:eq(0)');
		priceBlock.parent().find('.fromPrice').remove();
		priceBlock.addClass('hideImportant').hide();
		priceBlock.before('<span class="fromPrice">'+$(this).val()+'</span>');
			
				
	});
	
	$('.ndkcfFromPrice').each(function(){
			var me = $(this);
			id_product = $(this).attr('data-id-product');
						
			priceBlockList = me.parent().find('.product-price, .price');
			//priceBlockList.parent().find('.fromPrice').remove();
			priceBlockList.addClass('hideImportant').hide();
			//priceBlockList.before('<span class="fromPrice">'+me.val()+'</span>');
			
			$(document).on('mouseover', "[id*='quickview-modal-"+id_product+"'], [class*='quickview-modal-"+id_product+"']", function(){
				if(!$(this).hasClass('overedNdkPrice'))
				{
					$(this).addClass('overedNdkPrice');
					priceBlockModal = $("[id*='quickview-modal-"+id_product+"'], [class*='quickview-modal-"+id_product+"']").find('.current-price:eq(0), .product-price:eq(0)');
					priceBlockModal.addClass('hideImportant').hide();
					priceBlockModal.before('<span class="fromPrice">'+me.val()+'</span>');
				}
			});
	});
	
	$('#category .ndkcfFromPrice').each(function(){
			//priceBlock = $(this).parent().parent().parent().find('.price');
			//priceBlock.html($(this).val());
	});
}