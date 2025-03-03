<?php
/**
 * Plugin Name:       Accessible Modules for Beaver Builder
 * Plugin URI:        https://accessiblebb.com
 * Description:       A set of accessible-first modules for Beaver Builder.
 * Version:           1.1.4
 * Author:            Unity Web Agency
 * Author URI:        https://unitywebagency.com
 * License:           GPL-3.0+
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       bb-a11y-unity
 * Domain Path:       /languages
 */

define('BB_A11Y_UNITY_VERSION', '1.1.4');
define('BB_A11Y_UNITY_DIR', plugin_dir_path(__FILE__));
define('BB_A11Y_UNITY_URL', plugins_url('/', __FILE__ ));

/**
 * Check for required WordPress plugins.
 *
 * @since 1.0.0
 */
add_action('admin_notices', function () {
    $required = [];

    if (!class_exists('FLBuilder')) {
        $required[] = [
            'link' => 'https://www.wpbeaverbuilder.com/',
            'name' => __('Beaver Builder', 'bb-a11y-unity'),
        ];
    }

    if (!empty($required)) {
        foreach ($required as $req) {
            ?>
            <div class="notice notice-error"><p>
                <?php printf(__('<strong>%s</strong>: <a href="%s" target="_blank" rel="noreferrer noopener">%s</a> must be installed and activated.', 'bb-a11y-unity'), __('Accessible Modules for Beaver Builder', 'bb-a11y-unity'), $req['link'], $req['name']); ?>
            </p></div>
            <?php
        }
        deactivate_plugins(plugin_basename(__FILE__));
    }
});

/**
 * Instantiate our Beaver Builder module classes.
 *
 * @since 1.0.0
 */
add_action('init', function () {
    require __DIR__ . '/vendor/autoload.php';

    if (!function_exists('get_a11y_text_color')) {
        require_once BB_A11Y_UNITY_DIR . 'inc/helpers.php';
    }

    if (!class_exists('UnityJsonManifest')) {
        require_once BB_A11Y_UNITY_DIR . 'classes/UnityJsonManifest.php';
    }

    if (class_exists('FLBuilder')) {
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-accordion/unity-accordion.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-audio/unity-audio.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-blockquote/unity-blockquote.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-jump-link/unity-jump-link.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-image-carousel/unity-image-carousel.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-lightbox/unity-lightbox.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-lightbox-gallery/unity-lightbox-gallery.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-numbers/unity-numbers.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-tabs/unity-tabs.php';
        require_once BB_A11Y_UNITY_DIR . 'modules/unity-video/unity-video.php';
    }

    /**
     * Add settings page to plugin action links.
     */
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), function ($actions) {
        $settings_link = [
            '<a href="options-general.php?page=bb-a11y-unity-settings">' . esc_html__('Settings', 'bb-a11y-unity') . '</a>',
        ];

        return array_merge($settings_link, $actions);
    }, 10, 1);
});
