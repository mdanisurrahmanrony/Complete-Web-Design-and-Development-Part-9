<?php get_header(); ?>

		<div class="content_wrapper">
			<div class="left_content">
				<?php 
				
				if(have_posts()) : ?>
				
				<h2 class="archive_heding">
				
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>

				<?php _e('Archive For'); ?> '<?php echo single_cat_title(); ?>' <?php _e('Category'); ?>                                    

			<?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>

				<?php _e('Archive For'); ?> <?php single_tag_title(); ?> <?php _e('Tag'); ?>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>

				<?php _e(' Archive For '); ?> <?php the_time('F jS, Y'); ?>                                        

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

				<?php _e('Archive For'); ?> <?php the_time('F, Y'); ?>                                    

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>

				<?php _e('Archive For'); ?> <?php the_time('Y'); ?>                                        

			<?php /* If this is a search */ } elseif (is_search()) { ?>

				<?php _e('Search Results'); ?>                            

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>

				<?php _e('Author Archive For'); ?> '<?php echo get_the_author(); ?>' 
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

				<?php _e('Blog Archives'); ?>                                        

	<?php } ?>							
				</h2>
				
				
				<?php 
					while(have_posts()) : the_post(); ?>
					
					<article class="home_ar_wrap">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="featured_image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						
						<div class="post_meta">
							Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_time('M d, Y'); ?> | Posted In: <?php the_category(', '); ?>
						</div>
						<p><?php echo excerpt('30'); ?></p>
					</article>
					
				<?php	endwhile;
				else:
				echo 'No Posts Found';
				endif;
				
				?>
			</div>
<?php get_sidebar(); ?>

			<br class="clear" />
		</div>	
<?php get_footer(); ?>