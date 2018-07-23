<?php
/* idc_simple_altitude /**
 *
 */
class Idc_Simple_Altitude_Post {

  /* format options */
  private $idc_meters_text = 'M';
  private $idc_feet_text = '\'';
  private $idc_class_name = 'idc_altitude';

  /* internal variables */
  private $plugin_file;

  /** constructor
  * Duties: add_action and add_filter
  */
  public function __construct($plugin_file) {

      $this->plugin_file = $plugin_file;

      add_action('wp_head', [$this, 'wp_head']);
      add_filter('the_content',[$this, 'content']);

  }

  /** init()
  * This sets some options in wp
  */
  public function init() {

    add_option( 'idc_altitude_meters_text', $idc_meters_text);
    add_option( 'idc_altitude_feet_text', $idc_feet_text);
  }

  /** wp_head()
   * prints the include for altitude converter .js
   */
  public function wp_head() {

    echo '<script type="text/javascript" src="' . plugin_dir_url($this->plugin_file) .
    'js/idc_altitude_converter.js"></script>';
    echo "<script type=\"text/javascript\">IDCSETTINGS.init([\"{$this->idc_class_name}\",";
    echo "\"{$this->idc_meters_text}\",\"{$this->idc_feet_text}\"]);";
    echo '</script>';
  }

  /** content()
  *filters the_content(), looking for altitudes and adding a <span>
  *for hooking with javascript
  */
  public function content($thePost) {

    /* We'll do the work here, by adding <span> */
    /* regex with markup... hmm */
    $altitudePattern = '/((\d+|\d{1,3}(,\d{3})*)(\.\d+)?\s*(meters|\'|m|ft|feet|&#8242;))/';
    $replace = '<span class="' . $this->idc_class_name . '">$1</span> ' .
      '<a href="#" onClick="idc_toFeet()">F</a>|<a href="#" onClick="idc_toMeters()">M</a> ';

    $thePost = preg_replace($altitudePattern,$replace,$thePost);

    return $thePost;
  }

}
