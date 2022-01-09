/*
    Plugin:  Széchenyi 2020
    Loading: szechenyi-2020/libs/shortcodes/szechenyi-2020-logo-debug.php
*/

jQuery(document).ready(function() {
	jQuery('[data-plugin]').each(function(){
		if (jQuery(this).attr('data-plugin') == 'szechenyi_2020') {
            var token = jQuery(this).attr('data-token');
    		if (typeof token !== 'undefined' && token !== null) {
    			var variables = eval('szechenyi_2020_variables_' + token);
    			console.log('szechenyi_2020_variables_' + token + ': ');
    			console.log(variables);
    			
    			
    		}
		}
	});
});

