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


function our_theme_setup(){
	register_nav_menus(array(
		'mainmenu' => __( 'Primary Menu' ),
	));
	
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme' , 'our_theme_setup');

// Excerpt Function
function excerpt($num) {
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)." <a href='" .get_permalink($post->ID) ." ' class='".readmore."'>[...]</a>";
	echo $excerpt;
}

/* Custom Pagination */
function pagination($pages = '', $range = 4){ 
    $showitems = ($range * 2)+1;        
	global $paged;     
	if(empty($paged)) $paged = 1;      
	if($pages == ''){         
		global $wp_query;         
		$pages = $wp_query->max_num_pages;         
		if(!$pages){$pages = 1;}
	}
	if(1 != $pages){
		echo "<div class=\"pagination\"><span>Page No- ".$paged." of ".$pages."</span>";
		
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
		
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";             
				}
		} 
		if ($paged < $pages && $showitems < $pages) 
			echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next Page &rsaquo;</a>";           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last Page &raquo;</a>";
		echo "</div>\n";
	}}




