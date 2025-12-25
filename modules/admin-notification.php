<?php
/**
 * Add admin notification support
 *
 * @package szechenyi-2020-logo
 */
if (!defined('ABSPATH')) {
    exit;
}

function szechenyi_2020_619_notice()
{
    if (!get_transient('szechenyi_2020_619_review_notice')) {
        return;
    }

    $url = 'https://wordpress.org/support/plugin/szechenyi-2020/reviews/';

    // Store plain text only; escape on output.
    $title = __('Széchenyi 2020 Logo', 'szechenyi-2020');

    $message = sprintf(
    /* translators: %s is the reviews URL. */
        __('Please don\'t forget to <a href="%s" target="_blank">rate the plugin!</a>', 'szechenyi-2020'),
        esc_url($url)
    );

    echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html($title) . ':</strong> ' . wp_kses_post($message) . '</p></div>';

    delete_transient('szechenyi_2020_619_review_notice');
}

add_action('admin_notices', 'szechenyi_2020_619_notice');
