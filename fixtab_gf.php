<?php
/*
Plugin Name: Enable  Fix Gravity Form Tabindex Conflicts in Gravity Forms
Plugin URI: http://oc.continental.edu.pe
Description:  Fix Gravity Form Tabindex Conflicts in Gravity Forms
Version: 0.1.0
Author: Oficina de Comunicaciones de la Corporacion Educativa continental
Author URI: http://oc.continental.edu.pe
Instructions: Active plugin.
*/

if (class_exists('GFForms')) {

	/**
	 * Fix Gravity Form Tabindex Conflicts
	 * https://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
	 */
	add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
	function gform_tabindexer( $tab_index, $form = false ) {
	    $starting_index = 1000; // if you need a higher tabindex, update this number
	    if( $form )
	        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
	    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
	}


}

