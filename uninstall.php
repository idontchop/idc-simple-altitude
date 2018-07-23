<?php
/* Goodbye!
* We are deleting a whole lot of settings in your database!
*/

/* careful */
if ( !defined ('WP_UNINSTALL_PLUGIN') ) {
  echo "booyah steve";
  exit();
}

delete_option('idc_altitude_feet_text');
delete_option('idc_altitude_meters_text');
