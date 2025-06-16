<?php
/**
 * Plugin Name: Contentract
 * Description: A template for registering third-party content types with Contentract.
 * Author: Develoship
 * Version: 1.0
 */

// Register third-party integrations with Contentract
add_action('init', function() {
    // Prevent execution on AJAX or REST API calls
    if (wp_doing_ajax() || defined('REST_REQUEST')) {
        return;
    }

    // Ensure Contentract registration function is available
    if (!function_exists('contentract_register_integration')) {
        return;
    }

    /**
     * Example Integration Template
     * Replace the conditions and values with your plugin's logic.
     */
    if (class_exists('Your_Plugin_Class') || post_type_exists('your_custom_post_type')) {
        contentract_register_integration('your_integration_key', [
            'post_type' => 'your_custom_post_type',
            'label' => __('Your Content Type Label', 'your-textdomain'),

            // Optional role mapping: map plugin roles to Contentract roles
            'role_mapping' => [
                'your_plugin_role_1' => 'editor',
                'your_plugin_role_2' => 'author',
                'your_plugin_role_3' => 'contributor',
            ],

            // Optional: define what each mapped role can do
            'capabilities' => [
                'editor' => ['edit_your_post_type', 'edit_others_your_post_type'],
                'author' => ['edit_your_post_type'],
                'contributor' => ['edit_your_post_type'],
            ],

            // Optional: additional flags or settings for extensibility
            'options' => [
                'supports_notes' => true,
                'track_signatures' => true,
            ],
        ]);

        // Optional log
        if (function_exists('sc_log')) {
            sc_log('Integration registered: post_type=your_custom_post_type', 'info');
        }
    }
}, 20);
