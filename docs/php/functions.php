<?php

	// Add options for header/footer ACF
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Общие',
			'menu_title'	=> 'Общие',
			'menu_slug' 	=> 'acf-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

	}

	// Define shorter paths
	define("B_THEME_ROOT", get_template_directory_uri());
	define("B_FONTS_DIR", B_THEME_ROOT . "/fonts");
	define("B_CSS_DIR", B_THEME_ROOT . "/css");
	define("B_JS_DIR", B_THEME_ROOT . "/js");
	define("B_IMG_DIR", B_THEME_ROOT . "/img");

	// Bug - not linking styles and scripts though functions.php
	// function register_styles() {
	// 	wp_register_style( 'aos', B_JS_DIR . "/libs/aos.css" );
	// 	wp_register_style( 'theme_styles', B_CSS_DIR . "/main.css?", rand(1,9999) );

	// 	wp_enqueue_style( 'aos' );
	// 	wp_enqueue_style( 'theme_styles' );
	// }

	// function register_scripts() {
	// 	wp_deregister_script('jquery');

	// 	wp_register_script( 'jquery', B_JS_DIR . "/libs/jquery-3.5.1.min.js", array(), date("h:i:s"), false);
	// 	wp_register_script( 'slick', B_JS_DIR . "/libs/slick.min.js", array(), date("h:i:s"), false );
	// 	wp_register_script( 'aos', B_JS_DIR . "/libs/aos.js", array(), date("h:i:s"), false );
	// 	wp_register_script( 'maskedinput', B_JS_DIR . "/libs/jquery.maskedinput.min.js", array(), date("h:i:s"), false );
	// 	wp_register_script( 'mainjs', B_JS_DIR . "/main.js", array(), date("h:i:s"), true );

	// 	// Get API Key from ACF
	// 	// $apikey = get_field('gmaps_api_key', 'options');
	// 	// wp_register_script( 'gmaps', "https://maps.googleapis.com/maps/api/js?key=" . $apikey . "&callback=initMap", array('mainjs'), false, true );
	// 	wp_register_script( 'gmaps', "https://maps.googleapis.com/maps/api/js?key=AIzaSyDZmmcpk7hgCJk6xk54yD9G-A0-HaccLuQ&callback=initMap", array('mainjs'), false, true );

	// 	wp_enqueue_script( 'jquery' );
	// 	wp_enqueue_script( 'slick' );
	// 	wp_enqueue_script( 'aos' );
	// 	wp_enqueue_script( 'maskedinput' );
	// 	wp_enqueue_script( 'mainjs' );
	// 	wp_enqueue_script( 'gmaps' );
	// }

	function theme_setup() {
		add_action( 'wp_enqueue_scripts', 'register_styles' );
		add_action( 'wp_enqueue_scripts', 'register_scripts' );
	}
?>