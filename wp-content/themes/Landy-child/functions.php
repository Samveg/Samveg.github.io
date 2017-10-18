<?php
	
/*
*
*	Landy Functions - Child Theme
*	------------------------------------------------
*	These functions will override the parent theme
*	functions.
*	
*/

/*-----------------------------------------------------------------------------------*/

/*	01. INTIALIZE SCRIPTS AND STYLESHEETS

/*-----------------------------------------------------------------------------------*/

	function landy_child_enqueue_styles() {
	    wp_enqueue_style( 'landy-parent-style', get_template_directory_uri() . '/style.css' );

        wp_enqueue_script('landy-childscripts_js', get_stylesheet_directory_uri() . '/scripts.js', array( 'jquery' ), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'landy_child_enqueue_styles' );
	
/*-----------------------------------------------------------------------------------*/

/*	02. LANGUAGE

/*-----------------------------------------------------------------------------------*/
	
	//load_theme_textdomain('playne', get_stylesheet_directory().'/language');