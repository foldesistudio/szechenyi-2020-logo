<?php
/**
 * Add Gutenberg Block support
 * Description: Gutenberg block to display Széchenyi logo.
 *
 * @package szechenyi-2020-logo
 */

defined('ABSPATH') || exit;

function szechenyi_block_init()
{
    // If Gutenberg/block editor isn't available for some reason, don't fatal.
    if (!function_exists('register_block_type')) {
        return;
    }

    // Register block script
    wp_register_script(
            'szechenyi-block-script',
            plugins_url('assets/js/wp-block-editor.js', SZECHENYI_2020_619_FILE),
            array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-api-fetch', 'wp-i18n'),
            filemtime(plugin_dir_path(SZECHENYI_2020_619_FILE) . 'assets/js/wp-block-editor.js'),
            true
    );

    // Load script translations for the block editor.
    if (function_exists('wp_set_script_translations')) {
        wp_set_script_translations(
                'szechenyi-block-script',
                'szechenyi-2020',
                plugin_dir_path(SZECHENYI_2020_619_FILE) . 'languages'
        );
    }

    // Register block editor style
    wp_register_style(
            'szechenyi-block-editor-style',
            plugins_url('assets/css/wp-block-editor.css', SZECHENYI_2020_619_FILE),
            array('wp-edit-blocks'),
            filemtime(plugin_dir_path(SZECHENYI_2020_619_FILE) . 'assets/css/wp-block-editor.css')
    );

    // Register block style
    wp_register_style(
            'szechenyi-block-style',
            plugins_url('assets/css/szechenyi-2020.css', SZECHENYI_2020_619_FILE),
            array(),
            filemtime(plugin_dir_path(SZECHENYI_2020_619_FILE) . 'assets/css/szechenyi-2020.css')
    );

    // Register block type (must match the name used in the JS file)
    register_block_type('szechenyi-2020/block', array(
            'editor_script' => 'szechenyi-block-script',
            'editor_style' => 'szechenyi-block-editor-style',
            'style' => 'szechenyi-block-style',
            'render_callback' => 'szechenyi_block_render',
            'attributes' => array(
                    'logoPosition' => array(
                            'type' => 'string',
                            'default' => 'bottom',
                    ),
            ),
    ));
}

add_action('init', 'szechenyi_block_init');

function szechenyi_block_render($attributes)
{
    $options    = get_option( 'szechenyi_2020_options' );
    $url = isset($options['misi_szechenyi2020_page_url']) ? $options['misi_szechenyi2020_page_url'] : '';

    $logo_position = 'bottom';
    if (is_array($attributes) && isset($attributes['logoPosition']) && in_array($attributes['logoPosition'], array('top', 'bottom'), true)) {
        $logo_position = $attributes['logoPosition'];
    }

    $logo_path = plugins_url('assets/images/szechenyi-2020-logo-bottom.png', SZECHENYI_2020_619_FILE);
    if ('top' === $logo_position) {
        $logo_path = plugins_url('assets/images/szechenyi-2020-logo-top.png', SZECHENYI_2020_619_FILE);
    }

    ob_start(); ?>

    <div class="szechenyi-2020-logo-container">
        <?php
        // Wrap the logo in a link only if a URL is provided.
        if (!empty($url)) {
            echo '<a href="' . esc_url($url) . '">';
        }
        ?>
        <img
                src="<?php echo esc_url($logo_path); ?>"
                class="szechenyi-2020-block-logo"
                alt="<?php echo esc_attr__('Széchenyi 2020 Logo', 'szechenyi-2020'); ?>"
        />
        <?php
        if (!empty($url)) {
            echo '</a>';
        }
        ?>
    </div>

    <?php
    return ob_get_clean();
}