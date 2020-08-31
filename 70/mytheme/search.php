<?php get_header(); ?>

		<div class="content_wrapper">
			<div class="left_content">
				<?php 
				
				if(have_posts()) : ?>
				
				<h2>Search Results For: " <?php the_search_query(); ?> "</h2>
				
				<?php	while(have_posts()) : the_post(); ?>
					
					<article class="home_ar_wrap">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="featured_image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						
						<div class="post_meta">
							Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_time('M d, Y'); ?> | Posted In: <?php the_category(', '); ?> | <?php comments_popup_link('No Comment', '1 Comment', '% Comments', 'my_comment_Class', 'Comments Off'); ?>
						</div>
						<p><?php echo excerpt('30'); ?></p>
					</article>
					
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