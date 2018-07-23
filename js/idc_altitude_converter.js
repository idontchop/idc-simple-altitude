/* IDC_Simple_Altitude_Converter
* Plugin URI: http://www.idontchop.com
* License: GNU
*/

/* get settings passed from WP
 * how to label meters, feet, className */

var IDCSETTINGS = IDCSETTINGS || ( function () {
	var idcArgs = {};

	return {
		init: function(Args) {
			idcArgs = Args;
		},
		getArgs: function() {
			return idcArgs;
		}
	};
}());

function idc_toFeet() {
	var meters = idc_getAltitudes();

}

function idc_toMeters() {

}

function idc_getAltitudes() {
	return document.getElementsByClassName(IDCSETTINGS.getArgs()[0]);
}

function feetToMeters(f) {
	return f * .3048;
}

function metersToFeet(m) {
	return m * 3.28084;
}
