<?php
/*
 * Plugin Name:       Udemy Plus
 * Description:       A plugin for adding blocks to a theme.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Jon Stead
 * Text Domain:       udemy-plus
 * Domain Path:       /languages
 */

 if (!function_exists('add_action')) {
    echo 'These are not the droids your looking for. Move along.';
    exit;
 }

 // Setups

define ('UP_PLUGIN_DIR', plugin_dir_path(__FILE__));

 // Includes

$rootFiles = glob(UP_PLUGIN_DIR . 'includes/*.php');
$subDirectoryFiles = glob(UP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subDirectoryFiles);

foreach($allFiles as $fileName) {
   include_once($fileName);
}

 // Hooks

 register_activation_hook(__FILE__, 'up_activate_plugin');
 add_action('init', 'up_register_blocks');
 add_action('rest_api_init', 'up_rest_api_init');
 add_action('wp_enqueue_scripts', 'up_enqueue_scripts');
 add_action('init', 'up_recipe_post_type');
 add_action( 'cuisine_add_form_fields', 'up_cuisine_add_form_fields' ); 
 add_action( 'create_cuisine', 'up_save_cuisine_meta');
 add_action( 'cuisine_edit_form_fields', 'up_cuisine_edit_form_fields');
 add_action( 'edited_cuisine', 'up_save_cuisine_meta');