<?php
	
	if (!defined('ABSPATH')) exit;

?>
<h2 class="title"><?php esc_attr_e('Insert shortcode', 'szechenyi-2020'); ?></h2>


<input type="hidden" id="shortcode_id" name="shortcode_id" value="szechenyi-2020-logo"/>

<div>
	<?php esc_attr_e('Current slug:', 'szechenyi-2020'); ?>
    <input type="text" id="szechenyi_2020_slug_input" onkeyup="szechenyi_2020_619_update_slug();" value=""/>
</div>
<div>
	<?php esc_attr_e('Insert content from shortcode:', 'szechenyi-2020'); ?> <span id="szechenyi_2020_shortcode"></span>
    <button id="szechenyi_2020_shortcode_button" onclick="szechenyi_2020_619_copy_to_clipboard()" type="button"
            class="button button-primary">
		<?php esc_attr_e('Copy'); ?>
    </button>
</div>
<div style="clear: both;padding:0;"></div>
