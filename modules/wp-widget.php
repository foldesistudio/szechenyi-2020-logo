<?php
/**
 * Add widget support
 * Description: A widget that displays an image from the plugin's library and adds a link to it.
 *
 * @package szechenyi-2020-logo
 */
class szechenyi_2020_619_Widget extends WP_Widget {

    /**
     * Set up the widget.
     */
    function __construct() {
        parent::__construct(
            'szechenyi_2020_619_Widget', // ID
            __('Széchenyi 2020 Logo', 'szechenyi-2020'), // Name
            array( 'description' =>  __('This widget displays a Széchenyi 2020 logo and adds a link to it.', 'szechenyi-2020'), ) // Description
        );
    }

    /**
     * Render the widget settings form (wp-admin).
     */
    public function form( $instance ) {
        $position = ! empty( $instance['position'] ) ? $instance['position'] : 'top'; // Default value: top
        $title    = ! empty( $instance['title'] ) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'position' ) ); ?>"><?php esc_html_e( 'Set image' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'position' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'position' ) ); ?>">
                <option value="top" <?php selected( $position, 'top' ); ?>> <?php esc_html_e( 'Style' ); ?> - <?php esc_html_e( 'Bottom' ); ?></option>
                <option value="bottom" <?php selected( $position, 'bottom' ); ?>><?php esc_html_e( 'Style' ); ?> - <?php esc_html_e( 'Top' ); ?></option>
            </select>
        </p>
        <?php
    }

    /**
     * Sanitize and persist widget settings.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['position'] = ! empty( $new_instance['position'] ) ? sanitize_text_field( $new_instance['position'] ) : '';
        return $instance;
    }

    /**
     * Render the widget output on the front end.
     */
    public function widget( $args, $instance ) {
        $options    = get_option( 'szechenyi_2020_options' );
        $position_y = ! empty( $instance['position'] ) ? $instance['position'] : 'top'; // Default value: top
        $url        = isset( $options['misi_szechenyi2020_page_url'] ) ? $options['misi_szechenyi2020_page_url'] : '';
        $image_url  = plugins_url( 'assets/images/szechenyi-2020-logo-' . $position_y . '.png', SZECHENYI_2020_619_PLUGIN_BASE );

        $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';

        echo wp_kses_post( $args['before_widget'] );

        if ( ! empty( $title ) ) {
            echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        }

        $content = '<div class="szechenyi-2020-widget">';
        if ( ! empty( $url ) ) {
            $content .= '<a href="' . esc_url( $url ) . '">';
        }
        $content .= '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr__( 'Széchenyi 2020 logo widget image', 'szechenyi-2020' ) . '" width="100%" loading="lazy" />';
        if ( ! empty( $url ) ) {
            $content .= '</a>';
        }
        $content .= '</div>';

        // Allowed HTML tags for output.
        $allowed_html = wp_kses_allowed_html( 'post' );

        // Output sanitized markup.
        echo wp_kses( $content, $allowed_html );

        echo wp_kses_post( $args['after_widget'] );
    }
}

// Register the widget.
function register_szechenyi_2020_619_widget() {
    register_widget('szechenyi_2020_619_Widget');
}
add_action( 'widgets_init', 'register_szechenyi_2020_619_widget' );