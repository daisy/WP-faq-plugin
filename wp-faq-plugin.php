<?php

/*
Plugin Name: Daisy FAQ Content
Plugin URI: http://www.daisy.org/
Description: Used by millions to make WP better.
Author: Bradford Knowton
Version: 1.17.0
Author URI: http://bradknowlton.com/
License: GPLv2 or later
GitHub Plugin URI: https://github.com/daisy/WP-faq-plugin
GitHub Branch:     master
*/

class WPFAQPlugin {

	/*--------------------------------------------*
	 * Constants
	 *--------------------------------------------*/
	const name = 'WP FAQ Plugin';
	const slug = 'wp_faq_plugin';

	/**
	 * Constructor
	 */
	function __construct() {
		//Hook up to the init action
		add_action( 'init', array( &$this, 'init_wp_faq_plugin' ) );
	}

	/**
	 * Runs when the plugin is initialized
	 */
	function init_wp_faq_plugin() {
		// Load JavaScript and stylesheets
		$this->register_scripts_and_styles();


		if ( is_admin() ) {
			//this will run when in the WordPress admin
		} else {
			//this will run when on the frontend
		}

		$labels = array(
			'name' => _x( 'FAQ', 'faq' ),
			'singular_name' => _x( 'FAQ', 'faq' ),
			'add_new' => _x( 'Add New', 'faq' ),
			'add_new_item' => _x( 'Add New FAQ', 'faq' ),
			'edit_item' => _x( 'Edit FAQ', 'faq' ),
			'new_item' => _x( 'New FAQ', 'faq' ),
			'view_item' => _x( 'View FAQ', 'faq' ),
			'search_items' => _x( 'Search FAQs', 'faq' ),
			'not_found' => _x( 'No faq found', 'faq' ),
			'not_found_in_trash' => _x( 'No faq found in Trash', 'faq' ),
			'parent_item_colon' => _x( 'Parent FAQ:', 'faq' ),
			'menu_name' => _x( 'FAQ', 'faq' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title', 'author', 'revisions' ), // 'editor',  'custom-fields',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'taxonomies' => 'faq_categories',
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'menu_icon' => 'dashicons-editor-help'
		);
		register_post_type( 'faq', $args );

		$labels = array(
			'name' => _x( 'FAQ Categories', 'faq_categories' ),
			'singular_name' => _x( 'FAQ Category', 'faq_categories' ),
			'search_items' => _x( 'Search FAQ Categories', 'faq_categories' ),
			'popular_items' => _x( 'Popular FAQ Categories', 'faq_categories' ),
			'all_items' => _x( 'All FAQ Categories', 'faq_categories' ),
			'parent_item' => _x( 'Parent FAQ Category', 'faq_categories' ),
			'parent_item_colon' => _x( 'Parent FAQ Category:', 'faq_categories' ),
			'edit_item' => _x( 'Edit FAQ Category', 'faq_categories' ),
			'update_item' => _x( 'Update FAQ Category', 'faq_categories' ),
			'add_new_item' => _x( 'Add New FAQ Category', 'faq_categories' ),
			'new_item_name' => _x( 'New FAQ Category', 'faq_categories' ),
			'separate_items_with_commas' => _x( 'Separate faq categories with commas', 'faq_categories' ),
			'add_or_remove_items' => _x( 'Add or remove faq categories', 'faq_categories' ),
			'choose_from_most_used' => _x( 'Choose from the most used faq categories', 'faq_categories' ),
			'menu_name' => _x( 'FAQ Categories', 'faq_categories' ),
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'show_admin_column' => false,
			'hierarchical' => true,
			'rewrite' => true,
			'query_var' => true
		);
		register_taxonomy( 'faq_categories', array('faq'), $args );

	}


	/**
	 * Registers and enqueues stylesheets for the administration panel and the
	 * public facing site.
	 */
	private function register_scripts_and_styles() {
		if ( is_admin() ) {

		} else {

		} // end if/else
	} // end register_scripts_and_styles

} // end class

new WPFAQPlugin();