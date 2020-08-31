<?php 

function calling_our_resources(){
	wp_enqueue_style('mainstyle' , get_stylesheet_uri(), '' , '1.0');
	
	wp_enqueue_style('nivo-default' , get_template_directory_uri() . '/themes/default/default.css', '' , '1.0');
	
	wp_enqueue_style('nivo-light' , get_template_directory_uri() . '/themes/light/light.css', '' , '1.0');
	
	wp_enqueue_style('nivo-dark' , get_template_directory_uri() . '/themes/dark/dark.css', '' , '1.0');
	
	wp_enqueue_style('nivo-bar' , get_template_directory_uri() . '/themes/bar/bar.css', '' , '1.0');
	
	wp_enqueue_style('nivo-slider' , get_template_directory_uri() . '/css/nivo-slider.css', '' , '1.0');
	
	wp_enqueue_script('nivo-js1' , get_template_directory_uri() . '/js/jquery-1.9.0.min.js', '' , '1.0');
	
	wp_enqueue_script('nivo-js2' , get_template_directory_uri() . '/js/jquery.nivo.slider.js', '' , '1.0');
}
add_action('wp_enqueue_scripts' , 'calling_our_resources');