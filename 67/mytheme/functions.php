<?php 

function calling_resources(){
	//Calling Styles
	wp_enqueue_style('style' , get_stylesheet_uri(), '', '1.0.0' );
	wp_enqueue_style('comment_style' , get_template_directory_uri() . '/css/comments.css', '', '1.0.0' );
}
add_action('wp_enqueue_scripts' , 'calling_resources');





function our_theme_setup(){

	// Register Nav
	register_nav_menus(array(
		'primary' => __( 'Primary Menu' ),
		'footer' => __( 'Footer Menu' ),
	));

	// Thumbnail Image
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme' , 'our_theme_setup');



// Sidebar Register
function ourWidgetInit(){
	register_sidebar(array(
		'name' => 'Primary Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="sidebar_single_area clear">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="wid_heading">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'name' => 'Footer Top Left',
		'id' => 'sidebar2',
		'before_widget' => '<div class="b_f_s_wrap">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="red">',
		'after_title' => '</h2>',
	));	
	register_sidebar(array(
		'name' => 'Footer Top Middle',
		'id' => 'sidebar3',
		'before_widget' => '<div class="b_f_s_wrap">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="green">',
		'after_title' => '</h2>',
	));	
	register_sidebar(array(
		'name' => 'Footer Top Right',
		'id' => 'sidebar4',
		'before_widget' => '<div class="b_f_s_wrap">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="orange">',
		'after_title' => '</h2>',
	));		
}
add_action('widgets_init' , 'ourWidgetInit');

// Excerpt Function
function excerpt($num) {
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)." <a href='" .get_permalink($post->ID) ." ' class='".readmore."'>Continue Reading &raquo;</a>";
	echo $excerpt;
}

