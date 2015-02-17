<?php  


/**
 * Plugin Name: Easy Responsive Google Map
 * Plugin URI: http://nakshighor.com
 * Description:  Are you want to add a Responsive Google Maps in your website? No more work hard to add maps in your sites. This plugin give you the best oppurtunity to add your sites easily. Just install this plugin as like other wordpress plugin.Then where you want to add the map for example pages or posts you just click Google map button. Then you clink simple Google Map button on the top.Then going to https://www.google.com.bd/maps/@23.7806365,90.4193257,12z this link and select your place and then after clinking settins and copy the embed link and paste google map plugin embed option.Then fill up the option custom width and height as you wish.Now publish the page or posts and enjoy the Easy Responsive Google Map Plugin. Don't Forget to give us good rating.
 * Version: 1.0.0
 * Author: Theme Road
 * Author URI: http://nakshighor.com
 * License: GPL2
 * Text Domain: tmrd
 *  Copyright 2015 GIN_AUTHOR_NAME  (email : BestThemeRoad@gmail.com)
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License, version 2, as
 *	published by the Free Software Foundation.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */


add_shortcode('map','tmrd_map_shortcode');


function tmrd_map_shortcode($attr){

	$default=array(

		'src'=>'',
		'width'=>'600',
		'height'=>'450'
		);


	$gmaps= shortcode_atts($default,$attr);

	return '


<iframe src="'.$gmaps['src'].'" width="'.$gmaps['width'].'" height="'.$gmaps['height'].'" frameborder="5" style="0"></iframe>

	';
}



/*
 * *****************************************************************
 * Maps Tyne Mce Button
 * *****************************************************************
 * */




// Hooks your functions into the correct filters
function tmrd_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'tmrd_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'tmrd_register_mce_button' );
	}
}
add_action('admin_head', 'tmrd_add_mce_button');

// Declare script for new button
function tmrd_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['tmrd_mce_button'] =  plugins_url('/assets/js/main.js', __FILE__);
	return $plugin_array;
}

// Register new button in the editor
function tmrd_register_mce_button( $buttons ) {
	array_push( $buttons, 'tmrd_mce_button' );
	return $buttons;
}





function tmrd_shortcodes_mce_css() {
	wp_enqueue_style('symple_shortcodes-tc', plugins_url('assets/css/my-mce-style.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'tmrd_shortcodes_mce_css' );




