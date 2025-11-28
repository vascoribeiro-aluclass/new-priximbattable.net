(function($){
	$(document).ready(function(){
		var csv = $('input#bestkit_ordersexport');
		if (csv.hasClass('ps15')) {
			csv.parent().html('<input type="submit" name="bestkit_ordersexport" value="Upload CSV" />');
		} else {
			csv.attr('type', 'submit');
		}
	});
})(jQuery);