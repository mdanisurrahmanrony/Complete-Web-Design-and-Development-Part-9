<?php get_header(); ?>

		<div class="content_wrapper">
			<div class="left_content">
				<?php 
				
				if(have_posts()) : ?>
				
				<h2>Search Results For: " <?php the_search_query(); ?> "</h2>
				
				<?php	while(have_posts()) : the_post(); ?>
					
					<?php get_template_part('content'); ?>
					
				<?php	endwhile;
				else:
				echo 'No Posts Found';
				endif;
				
				?>
				
				<?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>
				
				
				
				
				
			</div>
<?php get_sidebar(); ?>

			<br class="clear" />
		</div>
<?php get_template_part('before_footer_widget'); ?>		
<?php get_footer(); ?>