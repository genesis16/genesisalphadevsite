<?php
if (!defined('ABSPATH')) {
    exit;
}
$pgc_sgb_plugin_slug = 'pgc-simply-gallery-plugin';
$pgc_sgb_global_lightbox_use = false;

function pgc_sgb_plugin_init()
{
    global $pgc_sgb_global_lightbox_use;
    // if (get_option('pgc_sgb_global_lightbox_use', null) === null) {
    //     $pgc_sgb_global_lightbox_use = update_option('pgc_sgb_global_lightbox_use', true);
    // } else {
    $pgc_sgb_global_lightbox_use = get_option('pgc_sgb_global_lightbox_use');
    //}

    register_meta('post', 'pgc_sgb_lightbox_settings', array(
        'show_in_rest' => true,
        'type' => 'string',
        'single' => true,
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        }
    ));
}

function pgc_sgb_plugin_frontend_scripts()
{
    global $post, $pgc_sgb_global_lightbox_use;
    if (is_404() || is_archive() || is_search()) {
        return;
    }

    if ($pgc_sgb_global_lightbox_use && is_object($post) && ($post->post_type === 'post' || $post->post_type === 'page')) {

        $field_value = get_post_meta($post->ID, 'pgc_sgb_lightbox_settings', true);
        if ($field_value !== '') {
            $field_value =  json_decode($field_value);
            if (property_exists($field_value, 'enableLightbox')) {
                if ($field_value->enableLightbox === false) {
                    return;
                }
            }
        }
        global $pgc_sgb_plugin_slug, $pgc_sgb_version;
        wp_enqueue_script(
            $pgc_sgb_plugin_slug . '-lightbox-script',
            plugins_url('/plugins/pgc_sgb_lightbox.min.js', dirname(__FILE__)),
            false,
            $pgc_sgb_version,
            true
        );

        wp_localize_script(
            $pgc_sgb_plugin_slug . '-lightbox-script',
            'PGC_SGB_LIGHTBOX',
            array(
                'lightboxPreset' => get_option('pgc_sgb_lightbox'),
                'postType' => $post->post_type,
                'lightboxSettigs' => $field_value,
            )
        );
    }
}

function pgc_sgb_plugin_enqueue_assets()
{
    /** Block Editor - Global Lightbox Panel/Plugin */
    global $post, $pgc_sgb_plugin_slug,
        $pgc_sgb_version,
        $pgc_sgb_global_lightbox_use;

    if (!$pgc_sgb_global_lightbox_use || $pgc_sgb_global_lightbox_use === false) return;
    if (is_object($post) && ($post->post_type === 'post' || $post->post_type === 'page')) {
        wp_enqueue_style(
            $pgc_sgb_plugin_slug . '-editor', // Handle.
            plugins_url('dist/plugin.build.style.css', dirname(__FILE__)),
            array('wp-components'),
            $pgc_sgb_version
        );

        wp_enqueue_script(
            $pgc_sgb_plugin_slug . '-script',
            plugins_url('dist/plugin.build.js',  dirname(__FILE__)),
            array('wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data'),
            $pgc_sgb_version
        );

        wp_localize_script(
            $pgc_sgb_plugin_slug . '-script',
            'PGC_SGB_LIGHTBOX',
            array(
                'ajaxurl'   => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('pgc-sgb-nonce'),
                'lightboxPreset' => get_option('pgc_sgb_lightbox'),
                'globalLightbox' => $pgc_sgb_global_lightbox_use,
            )
        );
    }
}

function pgc_sgb_plugin_options_assets()
{
    global $pgc_sgb_plugin_slug,
        $pgc_sgb_version,
        $pgc_sgb_skins_presets,
        $pgc_sgb_global_lightbox_use;

    wp_enqueue_style(
        $pgc_sgb_plugin_slug . '-page-settings', // Handle.
        plugins_url('dist/page.build.style.css', dirname(__FILE__)),
        array('wp-components'),
        $pgc_sgb_version
    );
    wp_enqueue_script(
        $pgc_sgb_plugin_slug . '-page-settings-script',
        plugins_url('dist/page.build.js',  dirname(__FILE__)),
        array('wp-api', 'wp-element', 'wp-components'),
        $pgc_sgb_version,
        true
    );
    wp_localize_script(
        $pgc_sgb_plugin_slug . '-page-settings-script',
        'PGC_SGB_OPTIONS_PAGE',
        array(
            'ajaxurl'   => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('pgc-sgb-nonce'),
            'globalLightbox' => $pgc_sgb_global_lightbox_use,
            'lightboxPreset' => get_option('pgc_sgb_lightbox'),
            'skinsSettings' => $pgc_sgb_skins_presets,
            'version' => $pgc_sgb_version,
        )
    );
}
function pgc_sgb_plugin_lightbox_admin_menu()
{
    global $pgc_sgb_plugin_slug;
    $page_hook_suffix = add_options_page(
        'SimpLy Global Presets',
        'SimpLy Gallery',
        'manage_options',
        $pgc_sgb_plugin_slug,
        'pgc_sgb_plugin_lightbox_admin_page'
    );
    add_action("admin_print_scripts-{$page_hook_suffix}", 'pgc_sgb_plugin_options_assets');
}
function pgc_sgb_plugin_lightbox_admin_page()
{
    global $pgc_sgb_plugin_slug;
    echo '<div id="' . $pgc_sgb_plugin_slug . '-settings-page"></div>';
}
function pgc_sgb_add_plugin_page_settings_link($links)
{
    global $pgc_sgb_plugin_slug;
    $settings_link = '<a href="' . admin_url('options-general.php?page=' . $pgc_sgb_plugin_slug) . '">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
function pgc_sgb_plugin_activation($plugin, $network_activation)
{
    if (get_option('pgc_sgb_global_lightbox_use', null) === null) {
        add_option('pgc_sgb_global_lightbox_use', true);
        if ($plugin == plugin_basename('simply-gallery-block/plugin.php')) {
            exit(wp_redirect(admin_url('options-general.php?page=pgc-simply-gallery-plugin')));
        }
    }
}

add_filter('plugin_action_links_simply-gallery-block/plugin.php', 'pgc_sgb_add_plugin_page_settings_link');
add_action('init', 'pgc_sgb_plugin_init');
add_action('admin_menu', 'pgc_sgb_plugin_lightbox_admin_menu');
add_action('enqueue_block_editor_assets', 'pgc_sgb_plugin_enqueue_assets');
add_action('wp_enqueue_scripts', 'pgc_sgb_plugin_frontend_scripts');
add_action('activated_plugin', 'pgc_sgb_plugin_activation', 1, 2);
