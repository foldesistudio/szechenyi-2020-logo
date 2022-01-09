<?php
/**
 * Display credits on the footer of each admin page.
 *
 * @package szechenyi-2020-logo
 */
	if ( ! defined( 'ABSPATH' ) ) exit;
?>

<style>
	.szechenyi-2020-ratings {
		margin: 30px 0;
		padding: 1px 15px;
		background: rgba( 255,255,200, 0.5 );
		border-radius: 5px;
		
	}
	.szechenyi-2020-links [role=separator] {
		margin: 0 0.5em;
		opacity: 0.5;
	}
	
	.szechenyi-2020-ratings p {
		font-size: 14px;
    }
</style>

<div class="card">
    <h2><?php esc_attr_e( 'Donate and Rating', 'szechenyi-2020' ); ?></h2>
<div class="szechenyi-2020-ratings">
	<p><?php esc_html_e( 'Szécehnyi 2020 Logo is a free plugin. If you find it useful then a review on wordpress.org would be most appreciated!', 'szechenyi-2020' ); ?></p>
	<p><a href="https://wordpress.org/support/plugin/szechenyi-2020-logo/reviews/" target="_blank"><?php esc_html_e( 'Leave a review and give ★★★★★ rating', 'szechenyi-2020' ); ?> &rsaquo;</a></p>
</div>
<nav class="szechenyi-2020-links">
    <strong><a href="https://www.paypal.com/donate/?business=47DJVT44PCDGW&no_recurring=0&currency_code=HUF" target="_blank">♥ <?php esc_html_e( 'Donate', 'szechenyi-2020' ); ?> &rsaquo;</a></strong>
    <span role="separator">|</span>
    <a href="https://github.com/foldesistudio" target="_blank"><?php esc_html_e( 'Join us on Github', 'szechenyi-2020' ); ?> &rsaquo;</a>
</nav>
</div>