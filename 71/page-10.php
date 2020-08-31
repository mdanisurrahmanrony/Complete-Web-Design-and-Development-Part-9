<?php get_header(); ?>

		<div class="content_wrapper">
			<div class="left_content">
				<?php 
				
				if(have_posts()) : 
					while(have_posts()) : the_post(); ?>
					
					<article class="home_ar_wrap">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="featured_image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						
						<div class="post_meta">
							Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_time('M d, Y'); ?> | Posted In: <?php the_category(', '); ?>
						</div>
						<p><?php the_content(); ?></p>
					</article>
					
				<?php	endwhile;
				else:
				echo 'No Posts Found';
				endif;
				
				?>
			</div>

			<br class="clear" />
		</div>	
<?php get_footer(); ?>