<?php /*
Plugin Name: IDC Simple Altitude Converter
Description: Converts altitudes in posts between feet and meters
Version: 0.9
Author: Nathan Dunn
Author URI: http://www.idontchop.com
Plugin URI: http://www.idontchop.com/simple_altitude
License: GNU
*/

/* do not allow direct calls */
if ( ! defined('ABSPATH')) {
  echo 'booyah';
  exit;
}

require_once ( plugin_dir_path(__FILE__) . 'includes/idc_simple_altitude_post.php');

// class from include
// hooks and filters added in constructor
$idc_simple_altitude_post = new Idc_Simple_Altitude_Post(__FILE__);

// register activation
register_activation_hook(__FILE__, [$idc_simple_altitude_post, 'init']);
