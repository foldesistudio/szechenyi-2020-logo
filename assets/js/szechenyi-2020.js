/*
    Plugin:  Széchenyi 2020 Logo
    Loading: szechenyi-2020.php
*/

(function ($) {
	$('.szechenyi_2020_close').click(function(){
		var szechenyi_2020_id = $(this).closest('div').attr('id');
		$('#'+szechenyi_2020_id).hide();
	});
})(jQuery);
