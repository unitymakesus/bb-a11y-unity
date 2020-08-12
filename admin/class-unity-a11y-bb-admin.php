<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Unity_A11y_Bb
 * @subpackage Unity_A11y_Bb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Unity_A11y_Bb
 * @subpackage Unity_A11y_Bb/admin
 * @author     Your Name <email@example.com>
 */
class Unity_A11y_Bb_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $unity_a11y_bb    The ID of this plugin.
     */
    private $unity_a11y_bb;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $unity_a11y_bb       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $unity_a11y_bb, $version ) {

        $this->unity_a11y_bb = $unity_a11y_bb;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Unity_A11y_Bb_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Unity_A11y_Bb_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->unity_a11y_bb, plugin_dir_url( __FILE__ ) . 'css/unity-a11y-bb-admin.css', [], $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Unity_A11y_Bb_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Unity_A11y_Bb_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->unity_a11y_bb, plugin_dir_url( __FILE__ ) . 'js/unity-a11y-bb-admin.js', ['jquery'], $this->version, false );

    }

    /**
     * Check for required WordPress plugins.
     *
     * @since    1.0.0
     */
    public function check_required_plugins() {
        add_action( 'admin_notices', function () {
            $requires = [];

            if ( !is_plugin_active('bb-plugin/fl-builder.php') ) {
                $required[] = [
                    'link' => 'https://www.wpbeaverbuilder.com/',
                    'name' => 'Beaver Builder',
                ];
            }

            if ( !empty($required) ) {
                foreach ($required as $req) {
                    ?>
                    <div class="notice notice-error"><p>
                        <?php printf( __('<b>%s Plugin</b>: <a href="%s" target="_blank" rel="noreferrer noopener">%s</a> must be installed and activated.', 'unity-a11y-bb'), __('Unity Accessible Modules', 'unity-a11y-bb'), $req['link'], $req['name'] ); ?>
                    </p></div>
                    <?php
                }
                deactivate_plugins( plugin_basename( __FILE__ ) );
            }
        } );
    }

}
